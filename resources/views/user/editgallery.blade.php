@extends('layouts/frontend1')
@section('content')
<style>
  form{
   
  width: 100%;
  height: 200px;
  border: 1px dashed #000;
}
form p{
  width: 100%;
  height: 100%;
  text-align: center;
  line-height: 170px;
  color: #000;
   
}
form input{
  position: absolute;
  margin: 0 auto;
  padding: 0;
  width: 100%;
  height: 100%;
  outline: none;
  opacity: 0;
}
form .upload_btn{ position: absolute; width: 100%; bottom: 30px; text-align: center; }
form button{ color: #fff; background: #16a085; border: none; width: 100px; height: 35px; }
form button:hover{
  background: #149174;
	color: #0C5645;
}
form button:active{
  border:0;
}
</style>
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
<div class="col-md-9"><h3 class="mb-3">Edit Gallery</h3>
  <div class="mb-3 small">Dashboard > My Ads > Edit Gallery</div>
  <div class="card my-3"><div class="card-body">
      
<div class="row">
    @foreach ( $gallery as $image )    
    <div class="col-md-3 text-center mb-5">
    <img src="{{ asset('user_images/'.$image->ad_image ) }}" alt="" class="img-fluid mb-2">
    <a href="/user/deleteadimage/{{ $image->adid }}/{{ $image->id }} " class="btn btn-danger btn-sm" role="button" ><i class="fas fa-trash-alt"></i> Delete</a></div>
    @endforeach
</div>


<div class="card my-3">
  <div class="card-body">
    <div class="row">
  <div class="col" style="position: relative">
    <form action="/user/savegallery/{{ $adid }}" method="POST" enctype="multipart/form-data">
      @csrf
      <input type="file" name="files[]" placeholder="Choose files" multiple required>
       
      <p>Drag your files here or click in this area.</p>
      <div class="upload_btn"><button type="submit">Upload</button></div>

      <input type="hidden" name="mode" value="editgallery" >
    </form>

     </div>
   
</div></div></div>
</div></div>
    
   
  </div>
</div>




 
 




@endsection