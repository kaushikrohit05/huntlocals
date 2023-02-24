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
<h1 class="text-center  my-5">Publish for free in just a few steps!</h1>
<div class="row text-center my-5">
  <div class="col-4"><span class="fa-stack fa-1x">
    <i class="fas fa-circle fa-stack-2x"></i>     
    <i class="fas fa-user fa-stack-1x fa-inverse"></i>
  </span><br><b>Ad Details</b></div>
   
    <div class="col-4"><span class="fa-stack fa-1x">
      <i class="fas fa-circle fa-stack-2x"></i>     
      <i class="fas fa-camera fa-stack-1x fa-inverse"></i>
    </span><br>
     <b>Your Gallery</b></div>
   
    <div class="col-4"><span class="fa-stack fa-1x">
      <i class="fas fa-circle fa-stack-2x"></i>     
      <i class="fas fa-check fa-stack-1x fa-inverse"></i>
    </span><br>
     <b>Thank You</b></div>
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
    </form>

     </div>
   
</div></div></div>

@endsection