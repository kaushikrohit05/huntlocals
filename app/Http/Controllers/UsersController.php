<?php

namespace App\Http\Controllers;

use App\Models\Siteuser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
//use App\Models\Siteuser;


class UsersController extends Controller
{
    public function index()
    {
         $users = Siteuser::paginate(10);
         return view('admin/users', ['users' => $users]);

    }
    public function add_user()
    {
        return view('/admin/add_user');

    }
    public function save_user( Request $request )
    {
        $validator = Validator::make($request->all(), [
            'email_address' => 'required|email|unique:tbluser,email_address',
            'user_password' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect('admin/adduser')
                        ->withErrors($validator)
                        ->withInput();
        }
    

        $user                               =   new Siteuser;
        $user->email_address                =   $request->email_address; 
        $user->password                     =   Hash::make($request->user_password); 
        $user->isActive                     =   $request->isActive; 

        $save=$user->save();
        if($save){
            //return back()->with('success','New User has been successfuly added to database');
            return redirect('admin/users')->with('success','New User has been successfuly added to database');

         }else{
             return back()->with('fail','Something went wrong, try again later');
         }
    }

    public function edit_user($id = null)
    { 
        $user = Siteuser::all()->where('id',$id)->first();
        return view('admin/edit_user', ['user' => $user]); 
    }

    public function update_user(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'user_password' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect('admin/edituser/'.$id)
                        ->withErrors($validator)
                        ->withInput();
        }
    

        $user                               =   Siteuser::find($id);
        $user->password                     =   Hash::make($request->user_password); 
        $user->isActive                     =   $request->isActive; 

        $save=$user->save();
        if($save){
            //return back()->with('success','New User has been successfuly added to database');
            return redirect('admin/users')->with('success','New User has been successfuly added to database');

         }else{
             return back()->with('fail','Something went wrong, try again later');
         }
    }
    public function delete_user($id = null)
    {
        $user = Siteuser::find($id);
        $user->delete();
        return redirect('admin/users');
    }


}
 