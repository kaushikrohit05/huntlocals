<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
 
use App\Models\Ads;
use App\Models\Category;
use App\Models\Siteuser;
use App\Models\Location;
use App\Models\Gallery;

class AdsController extends Controller
{
    public function index()
    {

        $ads = DB::table('tbluserads as ads')
        ->join('tblcategory as cat','cat.id', '=', 'ads.category_id')
        ->join('tbluser as user','user.id', '=', 'ads.userid')
        ->join('tbllocation as loc','loc.id', '=', 'ads.region_id') 
        ->join('tbllocation as loc1','loc1.id', '=', 'ads.location_id') 
        ->select('ads.id','ads.title','user.email_address as user','ads.created_at','cat.category','loc.location as region','loc1.location as location')        
        ->orderby('ads.id', 'DESC') 
        ->paginate(40);
  
        return view('admin/ads', ['ads' => $ads]);


    }
    public function add_ad()
    {
        $categories = Category::all(); 
        $users = Siteuser::all(); 
        $locations = Location::whereNull('parent')
         ->with(['children'])
         ->get(); 

        return view('/admin/add_ad', ['categories' => $categories, 'users' => $users, 'locations' => $locations ]);

    }

    public function save_ad(Request $request)
    {
         // return $request->all();
         //die();
                
         $validator = Validator::make($request->all(), [
            'user'              => 'required',
            'category'          => 'required',
            'region'            => 'required',
            'location'          => 'required',
            'zip'               => 'required',
            'area'              => 'required',
            'address'           => 'required',
            'ad_title'          => 'required',
            'ad_desc'           => 'required',
            'phone_number'      => 'required',
            'age'               => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('/admin/addad')
                        ->withErrors($validator)
                        ->withInput();
        }
        
        /*
        
        $validator = Validator::make($request->all(), [
            'user' => 'required',
            'category' => 'required',
            'region' => 'required',
            'location' => 'required',
            'ad_title' => 'required',
            'ad_desc' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('/admin/addad')
                        ->withErrors($validator)
                        ->withInput();
        }

        */

        $Ads                            = new Ads;
        $Ads->userid                    =$request->user; 
       // $Ads->category_id               =$request->category; 
       // $Ads->region_id                 =$request->region;          
       // $Ads->location_id               =$request->location; 
       // $Ads->title                     =$request->ad_title; 
       ///// $Ads->description               =$request->ad_desc;
       // $Ads->isActive                  =$request->isActive; 

        $Ads->category_id               =   $request->category; 
        $Ads->region_id                 =   $request->region;          
        $Ads->location_id               =   $request->location; 
        $Ads->title                     =   $request->ad_title; 
        $Ads->description               =   $request->ad_desc;
        $Ads->email                     =   $request->email_address;
        $Ads->phone                     =   $request->phone_number;
        $Ads->user_age                  =   $request->age;
        $Ads->zip_code                  =   $request->zip;
        $Ads->area                      =   $request->area;
        $Ads->address                   =   $request->address; 
        $Ads->whatsapp_active           =   $request->whatsapp; 
        $Ads->isActive                  =   $request->isActive; 



        $save=$Ads->save();

        $Adsid=$Ads->id;

        $Ads = Ads::find($Adsid);
        $Ads->title_slug               =   'es22'.$Adsid;
        $Ads->save();


        if($save){
            //return back()->with('success','New User has been successfuly added to database');
            return redirect('admin/ads')->with('success','New User has been successfuly added to database');

         }else{
             return back()->with('fail','Something went wrong, try again later');
         }        
    }
    public function edit_ad($id = null)
    {
        $categories = Category::all(); 
        $users = Siteuser::all(); 
        $locations = Location::whereNull('parent')
         //->with(['children'])
         ->get(); 
         
        $Ads = Ads::all()->where('id',$id)->first();
        $Adsid=$Ads->id;
        $region_id=$Ads->region_id;

        $child_locations = Location::where('parent',$region_id)
        //->with(['children'])
        ->get();


        return view('admin/edit_ad', ['ad' => $Ads,'categories' => $categories, 'users' => $users, 'locations' => $locations,'child_locations'=>$child_locations ]);
    }
    public function update_ad(Request $request,$id)
    {
        
           //return $request->all();
           //die();
         
          if($request->whatsapp=='on')
          { 
              $whatsapp=1; 
            }
          else
          { $whatsapp=0; }

         $Ads = Ads::find($id);
         $Ads->category_id               =   $request->category; 
         $Ads->region_id                 =   $request->region;          
         $Ads->location_id               =   $request->location; 
         $Ads->title                     =   $request->ad_title; 
         $Ads->description               =   $request->ad_desc;
         $Ads->email                     =   $request->email_address;
         $Ads->phone                     =   $request->phone_number;
         $Ads->user_age                  =   $request->age;
         $Ads->zip_code                  =   $request->zip;
         $Ads->area                      =   $request->area;
         $Ads->address                   =   $request->address; 
         $Ads->whatsapp_active           =   $whatsapp; 
         $Ads->isActive                  =   $request->isActive; 
 
 
 
         $save=$Ads->save();

         
        if($save){
            //return back()->with('success','New User has been successfuly added to database');
            return redirect('/admin/ads')->with('success','New User has been successfuly added to database');

         }else{
             return back()->with('fail','Something went wrong, try again later');
         }
    }
    
    
    public function adgallery($id = null)
    {
        //return $id;
        // die();
        // return view('admin/adgallery');
        //return view('user/adgallery',['Page_name'=>'adgallery', 'adid' => $id,'Page_data'=>'']);

        $Gallery = Gallery::where('adid','=',$id)->get(); 
        return view('admin/adgallery', ['Gallery' => $Gallery, 'adid' => $id ]);
    }

    public function delete_ad($id = null)
    {
        $Ads = Ads::find($id);
        $Ads->delete();
        return redirect('admin/ads');
    }
}
