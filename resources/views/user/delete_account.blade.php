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
   
    <a class="list-group-item list-group-item-action" href="/user/delete_account"><i class="fas fa-trash-alt"></i> Delete Account</a>
   </div>


 
    
  </div>
<div class="col-md-9"><h3 class="mb-3">Delete Account</h3>
  <div class="mb-3 small">Dashboard > Delete Account</div>
  <div class="card"><div class="card-body">

    I am hereby consent the processing of my personal data. I have read the Terms and Conditions Terms and Conditions 
for the purposes related to the provision of the web service.
    <form action="/delete_account/" method="POST" class="mb-5">
      @csrf
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Email address</label>
        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email_address" readonly value="">
         
      </div>
      
      <button type="submit" class="btn btn-primary">Delete Account</button>
    </form>

   </div></div>
    
   
  </div>
</div>
@endsection