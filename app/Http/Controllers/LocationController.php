<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Location;
use App\Models\Catlocseo;
use App\Models\Category;
 
class LocationController extends Controller
{
    public function index()
    {
         $location = Location::whereNull('parent')
         ->with(['children'])
         ->orderby('sort_id')
         ->paginate(10);
         $location = Location::whereNull('parent')->orderby('location')->get();

       // dd($location);
//

          return view('admin/locations', ['location' => $location]);

    }
    public function add_location()
    {
        $locations = Location::whereNull('parent')->get();
        return view('admin/add_location', ['locations' => $locations]);

        

    }
    public function save_location(Request $request)
    {
        $category = Category::orderby('sort_id')->get();
        //return view('admin/categories', ['categories' => $category]);
        
        $location = new Location;
        $location->parent =$request->parent_location; 
        $location->location =$request->location; 
        $location->location_slug =$request->location_slug; 
        $location->save();
        $location_id = $location->id;

        foreach($category as $row)
        {
                $category = $row['category'];
                $category_id = $row['id'];
                 
         

 
        $Catlocseo                            = new Catlocseo;
        $Catlocseo->category_id               = $category_id; 
        $Catlocseo->location_id               = $location_id; 
        $Catlocseo->meta_title                = $category.' in '.$request->location;
        $Catlocseo->meta_description          = $category.' in '.$request->location;

         $save=$Catlocseo->save();
 
        }
                

         

         return redirect('admin/locations');

    } 
    
    
    public function edit_location($id)
    {
        $parent_locations = Location::whereNull('parent')->orderby('location')->get();
        $selected_location = Location::all()->where('id',$id)->first();
        return view('admin/edit_location', ['parent_locations' => $parent_locations, 'selected_location' => $selected_location]);
    }

    public function getlocations($id = null)
    {
       // return $id;
        if($id!=0)
        {
            $location = Location::where('parent',$id)->orderby('location')->get()->toArray();
        }
        else
        {
            $location = Location::whereNotNull ('parent')->orderby('location')->get()->toArray();

        }
        return $location;
    }


    public function update_location(Request $request, $id)
    {
        $location = Location::find($id);
        $location->parent           =$request->parent_location; 
        $location->location         =$request->location; 
        $location->location_slug    =$request->location_slug; 
        $location->save();

        return redirect('admin/locations');

    }
    
    public function delete_location($id = null)
    {
        $location = Location::find($id);
        $location->delete();

        
       // Location::where('parent', $id)->delete();
        Catlocseo::where('location_id', $id)->delete(); 

        //Catlocseo::destroy('location_id',$id);
        
       // $Catlocseo = Catlocseo::where('location_id',$id)->get();
       // $Catlocseo->delete();

        return redirect('admin/locations');



    }


    //////////AJAX REQUEST///////////

    public function sortlocation($id = null, $val=null)
    {
        $location = Location::find($id);
        $location->sort_id    =$val;
        $location->save(); 
    }
    
    public function featured_location($id = null, $val=null)
    {
        $location = Location::find($id);
        $location->featured = $val;
        $location->save(); 
    }


}
