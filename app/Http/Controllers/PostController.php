<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;

use Illuminate\Http\Request;
use App\Models\Siteuser;
use App\Models\Category;
use App\Models\Ads;
use App\Models\Location;
use App\Models\Gallery;
use App\Models\Post;
use App\Models\Page;

class PostController extends Controller
{
    public function index()
    {
         $posts = Post::paginate(10);
         return view('admin/posts', ['posts' => $posts]);
    }

    public function add_post ()
    {
        return view('admin/add_post');

    }
    public function save_post(Request $request)
    {
        //return $request->all();
         
        $validator = Validator::make($request->all(), [
            'blog_title' => 'required|unique:tblposts,post_name',
            'blog_slug' => 'required|unique:tblposts,post_slug'
        ]);

        if ($validator->fails()) {
            return redirect('admin/add_post')
                        ->withErrors($validator)
                        ->withInput();
        }
    

        $post                               =   new Post();
        $post->post_name                    =   $request->blog_title; 
        $post->post_slug                    =   strtolower($request->blog_slug); 
        $post->meta_title                   =   $request->meta_title; 
        $post->meta_description             =   $request->meta_description; 
        $post->post_description             =   $request->post_description;
        $post->isActive                     =   $request->isActive; 

        $save=$post->save();
        if($save){
            //return back()->with('success','New User has been successfuly added to database');
            return redirect('admin/posts')->with('success','New User has been successfuly added to database');

         }else{
             return back()->with('fail','Something went wrong, try again later');
         }        

    }
    public function edit_post($id = null)
    { 
        $post = post::all()->where('id',$id)->first();
        return view('admin/edit_post', ['post' => $post]); 
    }
    public function update_post(Request $request, $id)
    {
        // return $request->all();
        // die();
      $validator = Validator::make($request->all(), [
        'blog_title' => 'required',
        'blog_slug' => 'required'
    ]);

    if ($validator->fails()) {
        return redirect('admin/editpost/'.$id)
                    ->withErrors($validator)
                    ->withInput();
    }

        $post = post::find($id);
        $post->post_name                    =   $request->blog_title; 
        $post->post_slug                    =   strtolower($request->blog_slug); 
        $post->meta_title                   =   $request->meta_title; 
        $post->meta_description             =   $request->meta_description; 
        $post->post_description             =   $request->post_description;
        $post->isActive                     =   $request->isActive; 

        $save=$post->save();

        if($save){
            return redirect('admin/posts')->with('success','New User has been successfuly added to database');

         }else{
             return back()->with('fail','Something went wrong, try again later');
         }  

    }
    
    public function delete_post($id = null)
    {
        $post = post::find($id);
        $post->delete();
        return redirect('admin/posts');
    }

    /////////////front/////////////////

    public function bloglist()
    {
         $posts = Post::paginate(10);
         $page_data = Page::where('page_slug','blog')->first();
         return view('blog', ['posts' => $posts,'Page_name'=>'Blog','Page_data'=>$page_data]);
    }

    //public function posts($post=null)
    public function blogDetail($id)
    {
      
        $post = post::all()->where('post_slug',$id)->first();
        return view('blogDetail', ['post' => $post,'Page_name'=>'blog_post','Page_data'=>'']);
        
        
        /* $category = Category::orderby('sort_id')->get();      
         $location = Location::whereNull('parent')->orderby('sort_id')->get();
         $child_locations = Location::whereNotNull('parent')->orderby('sort_id')->get();  
 
         $post_data = post::where('post_slug','=',$postname)->first();
         return view('posts', ['post_data'=>$post_data,'post_name'=>'adgallery','search_categories' => $category,'search_locations' => $location, 'search_child_locations' => $child_locations ]);
           */        
    }

     

    public function notfound()
    {      
         return view('404',['post_data'=>'','post_name'=>'',]);                
    }

    




}
