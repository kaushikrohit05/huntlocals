@extends('layouts/admin')

@section('content')
 
<div class="row"><div class="col"><h1>User Ad Gallery</h1></div><div class="col text-end"> </div></div>
<div class="row my-5">
  
  

   
<div class="col-md-12"><div class="card my-3">
  <div class="card-body">
    <div class="row">
  <div class="col" style="position: relative">
    <form action="/user/savegallery/{{ $adid }}" method="POST" enctype="multipart/form-data">
      @csrf
     <div class="text-center"> <input type="file" name="files[]" placeholder="Choose files" multiple required>
       
      <p>Drag your files here or click in this area.</p>
      <div class="upload_btn"><button type="submit">Upload</button></div></div>
      <input type="hidden" name="mode" value="admineditgallery" >
    </form>

     </div>
   
</div></div></div>
  <div class="card my-3"><div class="card-body">
      
<div class="row">
    @foreach ( $Gallery as $image )    
    <div class="col-md-3 text-center mb-5">
    <img src="{{ asset('user_images/'.$image->ad_image ) }}" alt="" class="img-fluid mb-2">
    <a href="/user/deleteadimage/{{ $image->adid }}/{{ $image->id }} " class="btn btn-danger btn-sm" role="button" ><i class="fas fa-trash-alt"></i> Delete</a></div>
    @endforeach
</div>


</div></div>
    
   
  </div>
</div>

@endsection

