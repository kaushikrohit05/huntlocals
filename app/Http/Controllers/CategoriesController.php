<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Location;
use App\Models\Category;
use App\Models\Catlocseo;
use App\Models\Ads;

class CategoriesController extends Controller
{
    public function index()
    {
        $category = Category::orderby('sort_id')->paginate(10);
        return view('admin/categories', ['categories' => $category]);
    }

    public function add_category()
    {         
        return view('admin/add_category');
    }
    public function save_category(Request $request)
    {
        //return $request->all();
         
        $validator = Validator::make($request->all(), [
            'category' => 'required|unique:tblcategory,category',
            'category_slug' => 'required|unique:tblcategory,category_slug'
        ]);

        if ($validator->fails()) {
            return redirect('admin/addcategory')
                        ->withErrors($validator)
                        ->withInput();
        }
        //$ext  = $request->file('category_image')->getClientOriginalExtension();
      //  $filename=$request->category_slug.'.'.$ext;

        //$fileupload = $request->file('category_image')->storeAs('public/uploads',$filename);
       // $fileupload = $request->file('category_image')->storeAs('public/uploads',$filename);
       // $fileupload = $request->file('category_image')->move(public_path('uploads'),$filename);  


        $category                               = new Category;
        $category->category                     =$request->category; 
        $category->category_slug                =strtolower($request->category_slug); 
        $category->category_small_description   =$request->small_desc;
		$category->category_description   		=$request->long_desc;


        if($request->hasFile('category_image'))
        {

        $ext  = $request->file('category_image')->getClientOriginalExtension();
        $filename=$request->category_slug.'.'.$ext;
        $category->category_image =$filename; 
        $fileupload = $request->file('category_image')->move(public_path('uploads'),$filename);  

        }

          
        $category->meta_title =$request->meta_title; 
        $category->meta_description =$request->meta_description; 
        $category->isActive =$request->isActive; 

        $save=$category->save();
        if($save){
            //return back()->with('success','New User has been successfuly added to database');
            return redirect('admin/categories')->with('success','New User has been successfuly added to database');

         }else{
             return back()->with('fail','Something went wrong, try again later');
         }        

    }
    public function edit_category($id = null)
    {
         //echo $id; 
         //return view('admin/edit_category');
        $category = Category::all()->where('id',$id)->first();
        return view('admin/edit_category', ['category' => $category]);
    }


    public function update_category(Request $request, $id)
    {
       // return $request->all();
      //  die();
        $validator = Validator::make($request->all(), [
            'category' => 'required',
            'category_slug' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect('admin/addcategory')
                        ->withErrors($validator)
                        ->withInput();
        }

        $category = Category::find($id);
        $category->category                     =$request->category; 
        $category->category_slug                =$request->category_slug;
        $category->category_small_description   =$request->small_desc;
		$category->category_description   		=$request->long_desc;
        
        if($request->hasFile('category_image'))
        {

        $ext  = $request->file('category_image')->getClientOriginalExtension();
        $filename=$request->category_slug.'.'.$ext;
        $category->category_image =$filename; 
        $fileupload = $request->file('category_image')->move(public_path('uploads'),$filename);  

        }

        $category->meta_title =$request->meta_title; 
        $category->meta_description =$request->meta_description; 
        $category->isActive =$request->isActive; 

        $category->save();

        return redirect('admin/categories');
    }
    
    public function delete_category($id = null)
    {
        $category = Category::find($id);
        $category->delete();

       // Catlocseo::destroy('category_id',$id);
        Catlocseo::where('category_id', $id)->delete(); 

        return redirect('admin/categories');
    }

    public function sort_category($id = null, $val=null)
    {
        $category = Category::find($id);
        $category->sort_id    =$val;
        $category->save(); 
    }


/***************front End  */

public function category_escorts()
{
     $all_category       = Category::orderby('sort_id')->get();      
     $location           = Location::whereNull('parent')->orderby('sort_id')->get();
     $child_locations    = Location::whereNotNull('parent')->orderby('sort_id')->get();     
     $category           = Category::all()->where('category_slug', 'escorts')->first();
     $category_id        = $category['id']; 

     $ads = Ads::where('tbluserads.category_id',$category_id)
     ->join('tblcategory as cat','cat.id', '=', 'tbluserads.category_id')
     ->join('tbllocation as loc','loc.id', '=', 'tbluserads.region_id') 
     ->join('tbllocation as loc1','loc1.id', '=', 'tbluserads.location_id')         
     ->select('tbluserads.*','cat.category','loc.location as region','loc1.location as location')        
     ->paginate(10); 

     return view('ads', ['ads' => $ads,'search_categories' => $all_category,'search_locations' => $location, 'search_child_locations' => $child_locations, 's_category' => $category, 's_location' => '' ]);          
}

public function category_male_escorts()
{
     $all_category       = Category::orderby('sort_id')->get();      
     $location           = Location::whereNull('parent')->orderby('sort_id')->get();
     $child_locations    = Location::whereNotNull('parent')->orderby('sort_id')->get();     
     $category           = Category::all()->where('category_slug', 'male-escorts')->first();
     $category_id        = $category['id']; 

     $ads = Ads::where('tbluserads.category_id',$category_id)
     ->join('tblcategory as cat','cat.id', '=', 'tbluserads.category_id')
     ->join('tbllocation as loc','loc.id', '=', 'tbluserads.region_id') 
     ->join('tbllocation as loc1','loc1.id', '=', 'tbluserads.location_id')         
     ->select('tbluserads.*','cat.category','loc.location as region','loc1.location as location')        
     ->paginate(10); 

     return view('ads', ['ads' => $ads,'search_categories' => $all_category,'search_locations' => $location, 'search_child_locations' => $child_locations, 's_category' => $category, 's_location' => '' ]);          
}

public function category_massage()
{
     $all_category       = Category::orderby('sort_id')->get();      
     $location           = Location::whereNull('parent')->orderby('sort_id')->get();
     $child_locations    = Location::whereNotNull('parent')->orderby('sort_id')->get();     
     $category           = Category::all()->where('category_slug', 'massage')->first();
     $category_id        = $category['id']; 

     $ads = Ads::where('tbluserads.category_id',$category_id)
     ->join('tblcategory as cat','cat.id', '=', 'tbluserads.category_id')
     ->join('tbllocation as loc','loc.id', '=', 'tbluserads.region_id') 
     ->join('tbllocation as loc1','loc1.id', '=', 'tbluserads.location_id')         
     ->select('tbluserads.*','cat.category','loc.location as region','loc1.location as location')        
     ->paginate(10); 

     return view('ads', ['ads' => $ads,'search_categories' => $all_category,'search_locations' => $location, 'search_child_locations' => $child_locations, 's_category' => $category, 's_location' => '' ]);          
}


}
