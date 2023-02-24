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
<div class="col-md-9"><h3 class="mb-3">Dashboard</h3>
  <div class="mb-3 small">Dashboard > </div>
  <div class="card">
    <div class="card-body"><h4>Welcome to your Account</h4>
      <div class="mb-3">You can make changes in your profile by clicking on the email. You can also add your alternate email address here.</div>
      <div class="row">
        <div class="col-md-6">
          <div class="card"><div class="card-header"><b>Account Info</b></div>
            <div class="card-body">
              <ul class="list-group list-group-flush">
                <li class="list-group-item"><strong>Email Address</strong> : {{ $userinfo->email_address }}</li>
                <li class="list-group-item"><strong>Member Since</strong> : {{ $userinfo->created_at }}</li>                 
              </ul></div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="card"><div class="card-header"><b>Posted Ads</b></div>
            <div class="card-body">
              <ul class="list-group list-group-flush">
                <li class="list-group-item"><strong> Active Ads</strong> : <strong class="text-success">{{ $active_ads }} Ads</strong></li>
                <li class="list-group-item"><strong>Inactive Ads</strong> : <strong class="text-danger">{{ $inactive_ads }} Ads</strong></li>
                 
              </ul>
            </div>
          </div>
        </div>
      </div></div>
  </div>
  
  
  
  
    
   
  </div>
</div>
@endsection