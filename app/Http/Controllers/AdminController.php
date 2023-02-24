<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Ads;
use App\Models\Category;
use App\Models\Location;
use App\Models\Siteuser;
use App\Models\Page;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index()
    {
        $data = ['LoggedUserInfo'=>Admin::where('id','=', session('LoggedUser'))->first()];
      // return $data;
       
        return view('admin/dashboard',$data);

    }

    public function register()
    {
        return view('admin/register');
    }
    
    public function register_action(Request $request)
    {
        //return $request->all();
        $validator = Validator::make($request->all(), [
            'adminname' => 'required',
            'email_address' => 'required|email|unique:tbladmin,adminemail',
            'admin_password' => 'required|min:5|max:12'
        ]);

        if ($validator->fails()) {
            return redirect('admin/register')
                        ->withErrors($validator)
                        ->withInput();
        }

        $admin = new Admin;
        $admin->adminname   =   $request->adminname; 
        $admin->adminemail  =   $request->email_address; 
        $admin->adminpass   =   Hash::make($request->admin_password);         
        $save=$admin->save();

        if($save){
            //return back()->with('success','New User has been successfuly added to database');
            return redirect('admin/login')->with('success','New User has been successfuly added to database');

         }else{
             return back()->with('fail','Something went wrong, try again later');
         }
    }



    public function login()
    {
        return view('admin/login');
    }

    public function login_action(Request $request)
    { 
        $validator = Validator::make($request->all(), [
            'email_address' => 'required|email',
            'admin_password' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect('admin/login')
                        ->withErrors($validator)
                        ->withInput();
        }

        $userinfo = Admin::where('adminemail','=',$request->email_address)->first();

        if(!$userinfo){
            return back()->with('fail','We do not recognize your email address');
        }else{
            //check password
            if(Hash::check($request->admin_password, $userinfo->adminpass)){
                $request->session()->put('LoggedUser', $userinfo->id);
                return redirect('admin/');

            }else{
                return back()->with('fail','Incorrect password');
            }
        }        

    }

    public function logout(){
        if(session()->has('LoggedUser')){
            session()->pull('LoggedUser');
            return redirect('/admin/login');
        }
    }


    


    

    public function ads()
    {
        $ads = Ads::all();
        return view('admin/ads', ['ads' => $ads]);

    }
    public function users()
    {
        $users =Siteuser::all();
        return view('admin/users',['users'=>$users]);

    }
    public function add_user()
    {         
        return view('admin/add_user');
    }
    public function save_user(Request $request)
    {
        $user = new Siteuser;
        $user->fname =$request->fname; 
        $user->lname =$request->lname;
        $user->email_address =$request->email_address;
        $user->password =$request->user_password;
        $user->phone =$request->phone_number;
        $user->save();

        return redirect('admin/users');

    }


    public function pages()
    {
        $pages = Page::all();
        return view('admin/pages',['pages'=>$pages]);

    }

}
