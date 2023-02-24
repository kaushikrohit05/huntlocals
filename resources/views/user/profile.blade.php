@extends('layouts/frontend1')

@section('content')
<div class="row my-5">
  
  

  <div class="col-md-3">
 
  <div class="text-center mb-3"  style="color:gray">
    <i class="fas fa-user-circle fa-10x"></i>
  </div>

 
  
<div class="list-group"> 
  
    <a class="list-group-item list-group-item-action"   href="/myaccount"><i class="fas fa-user"></i> Dashboard</a>
   
    <a class="list-group-item list-group-item-action" href="/user/ads"><i class="fas fa-address-card"></i> My Ads</a>
   
    <a class="list-group-item list-group-item-action" href="/user/profile"><i class="fas fa-cog"></i> Account Info</a>
   
    <a class="list-group-item list-group-item-action" href="/user/profile"><i class="fas fa-trash-alt"></i> Delete Account</a>
   </div>


 
    
  </div>
<div class="col-md-9"><h3 class="mb-3">Account Information</h3>
  <div class="mb-3 small">Dashboard > Account Information</div>



  <div class="card"><div class="card-body">
<div class="row">
   
  <div class="col-md-12"><h4 class="mb-4"><i class="fas fa-key"></i> Change Password</h4>
    <form action="/change_password/" method="POST" class="mb-5">
      @csrf
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Email address</label>
        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email_address" readonly value="">
         
      </div>
      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Current Password</label>
        <input type="password" class="form-control" id="exampleInputPassword1" name="current_password" placeholder="Current Password">
      </div>
      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">New Password</label>
        <input type="password" class="form-control" id="exampleInputPassword1"  name="new_password" placeholder="New Password">
      </div>
      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Confirm New Password</label>
        <input type="password" class="form-control" id="exampleInputPassword1"  name="confirm_new_password" placeholder="Confirm New Password">
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    <hr>
    <h4 class="mb-4"><i class="fas fa-trash-alt"></i> Delete Account</h4>
        <form action="/delete_account/" method="POST" class="mb-5">
          @csrf
          <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">I am hereby consent the processing of my personal data. I have read the <a href="http://">Terms and Conditions</a>  
              for the purposes related to the provision of the web service.</label>
          </div>
          
          <button type="submit" class="btn btn-danger my-3"><i class="fas fa-trash-alt"></i> Delete Account</button>
        </form></div>
</div>
    

   </div></div>
    
   
  </div>
</div>
@endsection