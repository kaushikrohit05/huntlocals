<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use File;
use App\Mail\WelcomeMail;
use Image;


use App\Models\Siteuser;
use App\Models\Category;
use App\Models\Ads;
use App\Models\Location;
use App\Models\Gallery;
use App\Models\Page;
use App\Models\Catlocseo;
 

class MainController extends Controller
{
   public function index()
   {
        $Page_data = Page::all()->where('page_slug', 'home')->first();
        $category = Category::orderby('sort_id')->get();      
        $location = Location::whereNull('parent')->orderby('location')->get();
        $child_locations = Location::whereNotNull('parent')->orderby('location')->get();  
        $featured_locations = Location::where('featured',1)->orderby('location')->get(); 

        session()->pull('ses_Category');
        session()->pull('ses_keyword');
        session()->pull('ses_region');
        session()->pull('ses_location');

        return view('index', ['Page_name'=>'home','Page_data'=>$Page_data,'categories' => $category, 'featured_locations' => $featured_locations,'search_categories' => $category,'search_locations' => $location, 'search_child_locations' => $child_locations ]);   

   }





  
 /////////////// ADS LIST //////////////////////////

   public function category($id)
   {
        $all_category       = Category::orderby('sort_id')->get();      
        $location           = Location::whereNull('parent')->orderby('location')->get();
        $child_locations    = Location::whereNotNull('parent')->orderby('location')->get();     
        $category           = Category::all()->where('category_slug', $id)->first();
        if ($category === null) {
            return redirect('/404');
         }
        $category_id        = $category['id'];

        session()->put('ses_Category', $category_id);

        $ads = Ads::where('tbluserads.category_id',$category_id)
        ->where('tbluserads.isActive', 1)
        ->join('tblcategory as cat','cat.id', '=', 'tbluserads.category_id')
        ->join('tbllocation as loc','loc.id', '=', 'tbluserads.region_id') 
        ->join('tbllocation as loc1','loc1.id', '=', 'tbluserads.location_id')         
        ->select('tbluserads.*','cat.category','cat.category_slug','loc.location as region','loc1.location as location','loc1.location_slug as location_slug')
        ->orderby('tbluserads.id', 'DESC')       
        ->paginate(10); 
 
        return view('ads', ['Page_name'=>'home','Page_data'=>$category, 'ads' => $ads,'search_categories' => $all_category,'search_locations' => $location, 'search_child_locations' => $child_locations, 's_category' => $category, 's_location' => '' ]);          
   }





   public function category_location($category, $location)
   {
        // echo "test";
       //die();
    
    
        $all_category = Category::orderby('sort_id')->get();      
        $all_location = Location::whereNull('parent')->orderby('location')->get();
        $all_child_locations = Location::whereNotNull('parent')->orderby('location')->get(); 

        $category = Category::where('category_slug', $category)->first();
        $location = Location::where('location_slug', $location)->first();

        if (($category === null) || ($location === null)) {
            return redirect('/404');
         }
        
        $category_id        =   $category['id']; 
        $location_id        =   $location['id'];  
        $location_parent    =   $location['parent']; 


        session()->put('ses_Category', $category_id);
        //$request->session()->put('ses_region', $region);
        session()->put('ses_location', $location_id);

       // $category   = Category::where('id', $category)->value('category_slug');
        //$location   = Location::where('id', $location)->value('location_slug');

        if($location_parent==null)
        {
            $ads = Ads::where('category_id',$category_id)
            ->Where('region_id',$location_id)
            ->paginate(10);

            $ads = Ads::where('tbluserads.category_id',$category_id)
            ->Where('region_id',$location_id)
            ->where('tbluserads.isActive', 1)
            ->join('tblcategory as cat','cat.id', '=', 'tbluserads.category_id')
            ->join('tbllocation as loc','loc.id', '=', 'tbluserads.region_id') 
            ->join('tbllocation as loc1','loc1.id', '=', 'tbluserads.location_id')         
            ->select('tbluserads.*','cat.category','cat.category_slug','loc.location as region','loc.location_slug as region_slug','loc1.location as location','loc1.location_slug as location_slug')         
            ->orderby('tbluserads.id', 'DESC')     
            ->paginate(10);

        }
        else
        {
            $ads = Ads::where('category_id',$category_id)
            ->where('location_id',$location_id)
            ->paginate(10);

            $ads = Ads::where('tbluserads.category_id',$category_id)
            ->where('location_id',$location_id)
            ->where('tbluserads.isActive', 1)
            ->join('tblcategory as cat','cat.id', '=', 'tbluserads.category_id')
            ->join('tbllocation as loc','loc.id', '=', 'tbluserads.region_id') 
            ->join('tbllocation as loc1','loc1.id', '=', 'tbluserads.location_id')         
            ->select('tbluserads.*','cat.category','cat.category_slug','loc.location as region','loc.location_slug as region_slug','loc1.location as location','loc1.location_slug as location_slug')        
            ->orderby('tbluserads.id', 'DESC')  
            ->paginate(10); 

        }
       
        $catlocseo = Catlocseo::where('category_id',$category_id)
        ->where('location_id',$location_id)->first();
        
        return view('ads', ['Page_name'=>'home','Page_data'=>$catlocseo,'ads' => $ads,'search_categories' => $all_category,'search_locations' => $all_location, 'search_child_locations' => $all_child_locations, 's_category' => $category, 's_location' => $location  ]);          

   }



   public function getgallery($adid)
   {
        $Gallery = Gallery::where('adid','=',$adid)->get(); 
        return $Gallery;  
   }


    public function search_ads(Request $request )
    {
        $all_category = Category::orderby('sort_id')->get();      
        $all_location = Location::whereNull('parent')->orderby('location')->get();
        $all_child_locations = Location::whereNotNull('parent')->orderby('location')->get(); 

       
        
        //return $request->all();
        //
        $category=$request->category; 
        $keyword=$request->keyword; 
        $region=$request->region; 
        $location=$request->location; 

        $request->session()->put('ses_Category', $category);
        $request->session()->put('ses_keyword', $keyword);
        $request->session()->put('ses_region', $region);
        $request->session()->put('ses_location', $location);

        $category   = Category::where('id', $category)->value('category_slug');
        $location   = Location::where('id', $location)->value('location_slug');
        $region     = Location::where('id', $region)->value('location_slug');

         
 

        /* $ads = Ads::where('category_id',$category)
        ->where('region_id',$region)
        ->where('location_id',$location)
        ->paginate(10);
        */

        if(!$location && !$region)
        {
            return redirect('/'.$category);
        }
        elseif($region && $location)
        {
           return redirect('/'.$category.'/'.$location);
        }
        elseif($region && $location ==0 )
        {
            return redirect('/'.$category.'/'.$region);
        }
        elseif($region==0 && $location )
        {
            return redirect('/'.$category.'/'.$location);
        }

    }


/////////////// ADS Detail //////////////////////////

   public function ad_detail($id)
   {
       
    //return($id);   
    $addata = Ads::where('tbluserads.id',$id)
        ->join('tblcategory as cat','cat.id', '=', 'tbluserads.category_id')
        ->join('tbllocation as loc','loc.id', '=', 'tbluserads.region_id') 
        ->join('tbllocation as loc1','loc1.id', '=', 'tbluserads.location_id') 
        ->select('tbluserads.id','tbluserads.isActive','tbluserads.title','tbluserads.title_slug','tbluserads.description','tbluserads.created_at','cat.category' ,'loc.location as region','loc1.location as location')        
        ->first();
 
        $gallery = Gallery::all()->where('adid', $id);


        return view('adDetail', ['Page_name'=>'home','Page_data'=>'','ads' => $addata, 'gallery'=>$gallery]);
   }
   public function ad_detail_new($category, $location, $ad)
   {
       
    //return($id);   
        $addata = Ads::where('tbluserads.title_slug',$ad)
        ->join('tblcategory as cat','cat.id', '=', 'tbluserads.category_id')
        ->join('tbllocation as loc','loc.id', '=', 'tbluserads.region_id') 
        ->join('tbllocation as loc1','loc1.id', '=', 'tbluserads.location_id') 
        ->select('tbluserads.id','tbluserads.isActive','tbluserads.user_age','tbluserads.title','tbluserads.title_slug','tbluserads.description','tbluserads.phone','tbluserads.created_at','cat.category', 'cat.category_slug' ,'loc.location as region','loc.location_slug as region_slug','loc1.location as location','loc1.location_slug as location_slug')        
        ->first();

        if ($addata === null) {

            return redirect('/404', ['Page_data'=>'']);
            
         }
         else
         {
            $gallery = Gallery::all()->where('adid', $addata->id);		 
            return view('adDetail', ['Page_name'=>'add_detail','Page_data'=>'','ads' => $addata, 'gallery'=>$gallery]);
         }
 
        
   }
   

///////////////////////////////////////////////////////////////
    
   public function signup()
   {
      if(session()->has('SiteUser'))
      {
          return redirect('myaccount');
      }
      else
      {
        $Page_data = Page::all()->where('page_slug', 'signup')->first();
        return view('user/signup',['Page_name'=>'signup','Page_data'=>$Page_data]);
      }
   }

   public function register_action(Request $request )
   {
       //return $request->all();
      $validator = Validator::make($request->all(), [
 
      'email_address' => 'required|email|unique:tbluser,email_address',
      'password' => 'required'
      ]);

      if ($validator->fails())
      {
         return redirect('/signup')
         ->withErrors($validator)
         ->withInput();
      }


      $user                               =   new Siteuser;
      $user->email_address                =   $request->email_address; 
      $user->password                     =   Hash::make($request->password); 
      $user->isActive                     =   0;
      $save=$user->save();
      $userid=$user->id;


      if($save)
      {         
       // Mail
        
        $data = array(
        'subject' => 'New User registration', 
        'emailaddress'=> $request->email_address,
         );
        Mail::to($request->email_address)->send(new WelcomeMail($data));
        //return back()->with('success', 'Sent Successfully !');
        
       /// Mail end 
        return redirect('/thankyou');


      }
      else
      {
         return back()->with('fail','Something went wrong, try again later');
      }
   }

   
   public function registrationthankyou()
    {
       
        return view('user/registrationthankyou',['Page_name'=>'login','Page_data'=>'']);
           
    }




   public function verifyaccount($id)
   {
        $userinfo   =   Siteuser::where('email_address','=',$id)->first();
        if(!$userinfo){
            return redirect('/login')->with('fail','Invalid Request');
        }else
        {
            $userinfo->isActive = 1;
            $userinfo->save();
            return redirect('/login')->with('success','Account activated successfuly');
        }
        
   }



    public function login()
    {
      if(session()->has('SiteUser'))
      {
          return redirect('myaccount');
      }
      else
      {
        $Page_data = Page::all()->where('page_slug', 'login')->first();
        return view('user/login',['Page_name'=>'login','Page_data'=>$Page_data]);
      }     
    }

    public function login_action(Request $request)
    { 
        $validator = Validator::make($request->all(), [
            'email_address' => 'required|email',
            'password' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect('login')
                        ->withErrors($validator)
                        ->withInput();
        }

        $userinfo = Siteuser::where('email_address','=',$request->email_address)
        ->where('isActive','=',1)
        ->first();

        if(!$userinfo){
            return back()->with('fail','We do not recognize your email address or your email is not verified');
        }else{
            //check password
            if(Hash::check($request->password, $userinfo->password)){
                $request->session()->put('SiteUser', $userinfo->id);
                $request->session()->put('SiteUserEmail', $userinfo->email_address);
                return redirect('myaccount');

            }else{
                return back()->with('fail','Incorrect password');
            }
        }        

    }

    public function logout(){
      if(session()->has('SiteUser')){
          session()->pull('SiteUser');
          return redirect('/login');
      }
    }

    public function myaccount()
    {
        $SiteUserEmail = Session('SiteUserEmail');
        $SiteUser = session('SiteUser');        
        $userinfo = Siteuser::where('email_address','=',$SiteUserEmail)->first();   
        
        $active_ads = Ads::where('isActive','=','1')->where('userid','=',$SiteUser)->count();
        $inactive_ads = Ads::where('isActive','=','0')->where('userid','=',$SiteUser)->count();
        return view("user/myaccount",['Page_name'=>'myaccount','Page_data'=>'','userinfo' => $userinfo, 'active_ads'=>$active_ads,'inactive_ads'=>$inactive_ads]);


    }
    public function profile()
    {
       return view("user/profile",['Page_data'=>'','Page_name'=>'login']);
    }
    public function delete_account()
    {
       return view("user/delete_account" ,['Page_data'=>'','Page_name'=>'login']);
    }


    
   public function user_ads()
    {
        $SiteUser = session('SiteUser');
        $ads = DB::table('tbluserads as ads')        
        ->join('tblcategory as cat','cat.id', '=', 'ads.category_id')
        ->join('tbluser as user','user.id', '=', 'ads.userid')
        ->join('tbllocation as loc','loc.id', '=', 'ads.region_id') 
        ->join('tbllocation as loc1','loc1.id', '=', 'ads.location_id') 
        ->select('ads.id','ads.title','ads.title_slug','user.fname as user','ads.created_at','ads.isActive','cat.category','cat.category_slug','loc.location as region','loc1.location as location','loc1.location_slug as location_slug')        
        ->where('ads.userid', '=', $SiteUser)
        ->paginate(10);
  
        return view('user/ads', ['Page_name'=>'user_ads', 'ads' => $ads, 'Page_data'=>'']);
    }
    

    public function postadd()
    {
      $categories = Category::all();      
      $locations = Location::whereNull('parent')
       ->with(['children'])
       ->orderby('location')
       ->get(); 

       $Page_data = Page::all()->where('page_slug', 'postadd')->first();       
      return view('user/postadd', ['Page_name'=>'postadd', 'Page_data'=>$Page_data,'categories' => $categories, 'locations' => $locations ]);       
    }

    public function save_ad(Request $request)
    {
          //return $request->all();
          //die();
          $SiteUser = session('SiteUser');
 
                
        $validator = Validator::make($request->all(), [
            'category'          => 'required',
            'region'            => 'required|numeric|min:1',
            'location'          => 'required|numeric|min:1',
            'zip'               => 'required',
            'area'              => 'required',
            'address'           => 'required',
            'ad_title'          => 'required',
            'ad_desc'           => 'required',
            'email_address'     => 'required',
            'phone_number'      => 'required',
            'age'               => 'required|numeric|min:18|max:70',
        ]);

        if ($validator->fails()) {
            return redirect('/user/postadd')
                        ->withErrors($validator)
                        ->withInput();
        }

        //$ad_slug=strtolower(preg_replace('/[^a-zA-Z0-9-_\.]/','-', $request->ad_title));

        if($request->whatsapp=='on')
          { $whatsapp=1; }
          else
          { $whatsapp=0; }

          $ad_desc = preg_replace('~<a(.*?)</a>~Usi', "", $request->ad_desc);

        $Ads                            =   new Ads;
        $Ads->userid                    =   $SiteUser; 
        $Ads->category_id               =   $request->category; 
         $Ads->region_id                 =   $request->region;          
         $Ads->location_id               =   $request->location; 
         $Ads->title                     =   $request->ad_title; 
         $Ads->description               =   $ad_desc;
         $Ads->email                     =   $request->email_address;
         $Ads->phone                     =   $request->phone_number;
         $Ads->user_age                  =   $request->age;
         $Ads->zip_code                  =   $request->zip;
         $Ads->area                      =   $request->area;
         $Ads->address                   =   $request->address; 
         $Ads->whatsapp_active           =   $whatsapp; 
         $Ads->isActive                  =   1;

        $save=$Ads->save();
        $Adsid=$Ads->id;

        $Adsid=$Ads->id;			
			
        $Ads = Ads::find($Adsid);
        $Ads->title_slug               =   'es22'.$Adsid;
        $Ads->save();



        if($save){
            //return back()->with('success','New User has been successfuly added to database');
            //return redirect('/adgallery')->with('success','New User has been successfuly added to database');
            return redirect('/user/adgallery/'.$Adsid);

         }else{
             return back()->with('fail','Something went wrong, try again later');
         }        
    }


    public function new_user_new_ad(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'category'          => 'required',
            'region'            => 'required|numeric|min:1',
            'location'          => 'required|numeric|min:1',
            'zip'               => 'required',
            'area'              => 'required',
            'address'           => 'required',
            'ad_title'          => 'required',
            'ad_desc'           => 'required',
            'email_address'     => 'required|email|unique:tbluser,email_address',
            'password'          => 'required',
            'phone_number'      => 'required',
            'age'               => 'required|numeric|min:18|max:70',
        ]);

        if ($validator->fails()) {
            return redirect('/user/postadd')
                        ->withErrors($validator)
                        ->withInput();
        }


         $user                               =   new Siteuser;
         $user->email_address                =   $request->email_address;
         $user->password                     =   Hash::make($request->password); 
         $save=$user->save();

         

         if($save)
         {         
          // return redirect('/login')->with('success','New User has been successfuly added to database');
         }
         else
         {
            return back()->with('fail','Something went wrong, try again later');
         }

            $userinfo = Siteuser::where('email_address','=',$request->email_address)->first();   
            
            if($request->whatsapp=='on')
          { $whatsapp=1; }
          else
          { $whatsapp=0; }

            $ad_desc = preg_replace('~<a(.*?)</a>~Usi', "", $request->ad_desc);
         
            $userId                         =   $userinfo->id;
            $Ads                            =   new Ads;           
        
            $Ads->userid                    =   $userId; 
            $Ads->category_id               =   $request->category; 
            $Ads->region_id                 =   $request->region;          
            $Ads->location_id               =   $request->location; 
            $Ads->title                     =   $request->ad_title; 
            $Ads->description               =   $ad_desc;
            $Ads->email                     =   $request->email_address;
            $Ads->phone                     =   $request->phone_number;
            $Ads->user_age                  =   $request->age;
            $Ads->zip_code                  =   $request->zip;
            $Ads->area                      =   $request->area;
            $Ads->address                   =   $request->address; 
            $Ads->whatsapp_active           =   $whatsapp; 
            $Ads->isActive                  =   1; 

            $save=$Ads->save();
            $Adsid=$Ads->id;
			
			
			$Ads = Ads::find($Adsid);
			$Ads->title_slug               =   'es22'.$Adsid;
        	$Ads->save();
			
			

            if($save)
            {
                 return redirect('/user/adgallery/'.$Adsid);
            }
            else
            {
                return back()->with('fail','Something went wrong, try again later');
            }        
    }


    public function adgallery($id)
    {
        return view('user/adgallery',['Page_name'=>'adgallery', 'adid' => $id,'Page_data'=>'']);

    }
    

    public function savegallery(Request $request,$id)
    {
          // return $request->all();
           //die();

           //$this->validate($request, [
           // 'files' => 'required|image|mimes:jpg,jpeg,png,gif,svg',
           // ]);

           
    		$path = public_path('user_images/'.$id);
			
			if(!File::isDirectory($path))
            {
			    File::makeDirectory($path, 0777, true, true);			  
		 	} 

          if($request->hasfile('files'))
          {
             foreach($request->file('files') as $key => $file)
             {
                $filename       =       $id."_".$file->getClientOriginalName();
                $fileext        =       $file->getClientOriginalExtension();
                $filename_rand  =       $id."_".substr(md5(microtime()), 0, 10).".".$fileext; 

                $img = Image::make($file->path());

                $img->resize(150, 150, function ($constraint) {
                $constraint->aspectRatio();
                });
                //->save($path.'thumb_'.$filename_rand);
                $img->save($path.'/thumb_'.$filename_rand); 
                

                $fileupload = $file->move($path,$filename_rand); 

                $gallery                =   new Gallery();
  
                $gallery->adid          =   $id; 
                $gallery->ad_image      =   $id.'/'.$filename_rand; 
                $gallery->save();
  
             }
          }

          if($request->mode=='editgallery')
          {
            return redirect('/user/editgallery/'.$id);  
          }
          elseif($request->mode=='admineditgallery')
          {
            return redirect('/admin/editgallery/'.$id);  
          }
          else
          {
            return redirect('/user/postsuccess/');
          }          

    }

    public function postsuccess()
    {
        return view('/user/adthanks', ['Page_name'=>'postsuccess', 'Page_data'=>'']);

    }

    public function editadd($id)
    {
        $adinfo = Ads::where('id','=',$id)->first();
        $categories = Category::all();      
        $locations = Location::whereNull('parent')->orderby('sort_id')->get();
        $child_locations = Location::whereNotNull('parent')->orderby('sort_id')->get(); 

        return view('user/editad', 
        [   'Page_name'=>'editadd',
            'Page_data'=>'',
            'categories' => $categories, 
            'locations' => $locations, 
            'adinfo'=>$adinfo, 
            'child_locations'=>$child_locations ]
        );    
    }

    public function update_user_ad(Request $request,$id)
    {
       // return $request->all();
      //  echo $id;

        $validator = Validator::make($request->all(), [
            'category'          => 'required',
            'region'            => 'required|numeric|min:1',
            'location'          => 'required|numeric|min:1',
            'zip'               => 'required',
            'area'              => 'required',
            'address'           => 'required',
            'ad_title'          => 'required',
            'ad_desc'           => 'required',
            'phone_number'      => 'required',
            'age'               => 'required|numeric|min:18|max:70',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

         
        if($request->whatsapp)
        { $whatsapp=1; }
        else
        { $whatsapp=0; }

        $ad_desc = preg_replace('~<a(.*?)</a>~Usi', "", $request->ad_desc);

        $Ads = Ads::find($id);
        $Ads->category_id               =   $request->category; 
        $Ads->region_id                 =   $request->region;          
        $Ads->location_id               =   $request->location; 
        $Ads->title                     =   $request->ad_title;
		$Ads->title_slug               	=   'es22'.$id;
        $Ads->phone                     =   $request->phone_number;
        $Ads->zip_code                  =   $request->zip;
        $Ads->area                      =   $request->area;
        $Ads->address                   =   $request->address; 
        $Ads->description               =   $ad_desc;
        $Ads->whatsapp_active           =   $request->whatsapp; 
        $Ads->isActive                  =   1; 
        $Ads->save();

        return redirect('/user/ads');
        
    }
    public function editgallery($id)
    {
        $Gallery = Gallery::where('adid','=',$id)->get();
        return view('user/editgallery',['Page_data'=>'','Page_name'=>'adgallery','adid' => $id,'gallery' => $Gallery]);  
    }

    public function deleteadimage($adid=null, $id = null)
    {
        $Gallery = Gallery::find($id);
        $Gallery->delete();
        return redirect('/user/editgallery/'.$adid);
    }

    public function delete_ad($id = null)
    {
        $Ads = Ads::find($id);
        $Ads->delete();
        return redirect('/user/ads');
    }


    
    public function sendmail()
    {
        $student_detail = [
            'first_name' => 'test',
            'last_name' => 'xyz',
            'address' => 'test xyz'
        ]; 

        $data = array(
            'subject' => 'SubjectTesting Mail', 
            'message'=> 'Smessage Mail' ,
             );
            Mail::to('jamestracy1980@gmail.com')->send(new WelcomeMail($data));
            return back()->with('success', 'Sent Successfully !');
            

    }

   
}
