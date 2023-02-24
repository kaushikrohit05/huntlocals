<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\Category;
use App\Models\Catlocseo;
use App\Models\Location;

class Catlocseocontroller extends Controller
{
    public function index()
    {
        $catlocseo = DB::table('tblcatlocseo as seo')
        ->join('tblcategory as cat','cat.id', '=', 'seo.category_id')
        ->join('tbllocation as loc','loc.id', '=', 'seo.location_id') 
        ->select('seo.*','cat.category as category','loc.location as location')
        ->get();        
        //->paginate(10);
        
 
        //$catlocseo = Catlocseo::orderby('category_id')->paginate(10);
        return view('admin/catlocseo', ['catlocseo' => $catlocseo]);          
    }

    public function add_catlocseo()
    {
        $categories = Category::all(); 
        $locations = Location::whereNull('parent')
         ->with(['children'])
         ->get(); 

        return view('/admin/add_catlocseo', ['categories' => $categories, 'locations' => $locations ]);
    }
    public function save_catlocseo(Request $request)
    {
       // return $request->all();
        $validator = Validator::make($request->all(), [
            'category' => 'required',
            'region' => 'required',
            'location' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('/admin/addad')
                        ->withErrors($validator)
                        ->withInput();
        }

        if($request->location==0)
        {
            $location_id=$request->region;
        }
        else
        {
            $location_id=$request->location;
        }


        $Catlocseo                            = new Catlocseo;
        $Catlocseo->category_id               =$request->category; 
        $Catlocseo->location_id               =$location_id; 
        $Catlocseo->meta_title                =$request->meta_title;
        $Catlocseo->meta_description          =$request->meta_description;

        $save=$Catlocseo->save();
        if($save){
            //return back()->with('success','New User has been successfuly added to database');
            return redirect('admin/catlocseo')->with('success','New User has been successfuly added to database');

         }else{
             return back()->with('fail','Something went wrong, try again later');
         }  
    }

    public function edit_location($id)
    {
        $parent_locations = Location::whereNull('parent')->orderby('location')->get();
        $selected_location = Location::all()->where('id',$id)->first();
        return view('admin/edit_location', ['parent_locations' => $parent_locations, 'selected_location' => $selected_location]);
    }
    
    public function edit_catlocseo($id)
    {
        $categories = Category::all(); 
        
        $locations = Location::whereNull('parent')
         ->with(['children'])
         ->get(); 
         $locations = Location::all();

        $selected = Catlocseo::all()->where('id',$id)->first();
        return view('/admin/edit_catlocseo', ['categories' => $categories, 'locations' => $locations, 'data' => $selected ]);
    }
    



	public function update_catlocseo($id, Request $request)
    {
        // return $request->all();
        
        $Catlocseo                            =	Catlocseo::find($id);
        $Catlocseo->meta_title                =	$request->meta_title;
        $Catlocseo->meta_description          =	$request->meta_desc;
		$Catlocseo->description		          =	$request->desc;

       $save=$Catlocseo->save();
       return redirect('admin/catlocseo');
  
    }


    public function update_catlocseo_title($id = null, $val=null)
    {
        $Catlocseo = Catlocseo::find($id);
        $Catlocseo->meta_title    =$val;
        $Catlocseo->save(); 
    }
 
    public function update_catlocseo_desc($id = null, $val=null)
    {
        $Catlocseo = Catlocseo::find($id);
        $Catlocseo->meta_description    =$val;
        $Catlocseo->save(); 
    }

 	public function update_catlocseo_long_desc($id = null, $val=null)
    {
        $Catlocseo = Catlocseo::find($id);
        $Catlocseo->description    =$val;
        $Catlocseo->save(); 
    }




    public function delete_catlocseo($id = null)
    {
        $catlocseo = Catlocseo::find($id);
        $catlocseo->delete();
        return redirect('admin/catlocseo');

    }



}
