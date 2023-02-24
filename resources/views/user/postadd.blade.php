@extends('layouts/frontend1')

@section('content')
<script src="https://cdn.tiny.cloud/1/ud89g26pvdzj62qi0v8wzbfn489krhmeiqppec8zmgwkkhvo/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
<script>
  tinymce.init({
    selector: 'textarea#ad_desc',
    paste_enable_default_filters: true,
    height: 500,
    menubar: false,
    plugins: [
      'advlist', 'autolink', 'lists', 'link', 'image', 'charmap', 'preview',
      'anchor', 'searchreplace', 'visualblocks', 'code', 'fullscreen',
      'insertdatetime', 'media', 'table', 'code', 'help', 'wordcount'
    ],
    toolbar: 'undo redo | blocks | ' +
    'bold italic backcolor | alignleft aligncenter ' +
    'alignright alignjustify | bullist numlist outdent indent | ' +
    'removeformat | help',
    content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:16px }'
  });
  </script>
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


<div class="card my-3"><div class="card-body"><div class="row">
  <div class="col">
    <form method="POST" action="
    @if(session()->has('SiteUser'))
    /user/savead
    @else
    /user/saveadwithuser
    @endif
    " enctype="multipart/form-data" >
      @csrf
      <div class="row mb-3"> 
        <div class="col-md-4">
          <label class="form-label">Category*</label>
          <select class="form-select" aria-label="Default select" name="category">
              <option value="">Select Category</option>
              @foreach ($categories as $category)
              <option value="{{ $category->id }}">{{ $category->category }}</option>
              @endforeach
            </select>
          <span class="text-danger">@error('category')
            {{ $message }}
          @enderror</span>
        </div>
        <div class="col-md-4">
          <label class="form-label">Region*</label>
          <select class="form-select" aria-label="Default select" name="region" id="region" >
              <option value="">Select Region</option>
              @foreach ($locations as $location)
              <option value="{{ $location->id }}">{{ $location->location }}</option>
              @endforeach
            </select>
          <span class="text-danger">@error('region')
            {{ $message }}
          @enderror</span>
        </div>
        <div class="col-md-4">
          <label class="form-label">City*</label>
          <select class="form-select" aria-label="Default select" name="location" id="location">
               <option value="">Select City</option>
            </select>
          <span class="text-danger">@error('location')
            {{ $message }}
          @enderror</span>
        </div></div>
        <div class="row mb-3"> 
          <div class="col-md-4">
            <label class="form-label">ZIP*</label>
            <input type="text" class="form-control" id="zip" name="zip" placeholder="ZIP" value="{{ old('zip') }}"  >
            <span class="text-danger">@error('zip')
              {{ $message }}
            @enderror</span>
          </div>
          <div class="col-md-8">
            <label  class="form-label">Area / District / Neighbourhood*</label>
            <input type="text" class="form-control" id="area" name="area" placeholder="Area / District / Neighbourhood" value="{{ old('area') }}"  >
            <span class="text-danger">@error('area')
              {{ $message }}
            @enderror</span>
          </div>
          </div>

          <div class="mb-3">
            <label class="form-label">Address*</label>
            <input type="text" class="form-control" id="ad_title" name="address" placeholder="Address" value="{{ old('address') }}"  >  
            <span class="text-danger">@error('address')
              {{ $message }}
            @enderror</span>      
          </div> 
  
        <div class="mb-3">
          <label class="form-label">Ad Title*</label>
          <input type="text" class="form-control" id="ad_title" name="ad_title" placeholder="Ad Title" value="{{ old('ad_title') }}"  >  
          <span class="text-danger">@error('ad_title')
            {{ $message }}
          @enderror</span>      
        </div> 
        <div class="mb-3">
          <label  class="form-label">Ad Description*</label>
          <textarea class="form-control" id="ad_desc" name="ad_desc" rows="5">{{ old('ad_desc') }}</textarea>
          <span class="text-danger">@error('ad_desc')
            {{ $message }}
          @enderror</span> 
        </div> 
         
        
        

        
    
    
        <div class="mt-5 mb-3">
            <h5>POST AD DETAILS</h5>
          
        </div>
        <div class="row mb-3">
          <div class="col-md-4">
            @if(session()->has('SiteUser'))
             
              <label class="form-label">Email Address*</label>
              <input type="email" class="form-control" id="email_address" name="email_address" placeholder="Email Address" value="{{ session('SiteUserEmail') }}" readonly  >  
              <span class="text-danger">@error('email_address')
                {{ $message }}
              @enderror</span>      
             
            @else
             
              <label class="form-label">Email Address*</label>
              <input type="email" class="form-control" id="email_address" name="email_address" placeholder="Email Address" value="{{ old('email_address') }}"  >  
              <span class="text-danger">@error('email_address')
                {{ $message }}
              @enderror</span>      
             
            @endif
          </div>
          <div class="col-md-4">  
            @if(!session()->has('SiteUser'))          
            <label for="exampleInputEmail1" class="form-label">Password*</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Password" > 
            <span class="text-danger">@error('password')
              {{ $message }}
            @enderror</span>   
            @endif        
        </div>
        </div>
        <div class="row mb-3"> 
           
          <div class="col-md-4 mb-3">
            <label class="form-label">Phone Number*</label>
            <input type="text" class="form-control" id="phone_number" name="phone_number" placeholder="Phone Number" value="{{ old('phone_number') }}"  >  
            <span class="text-danger">@error('phone_number')
              {{ $message }}
            @enderror</span>      
          </div>
          <div class="col-md-2 mb-3">
            <label class="form-label">Age*</label>
            <input type="text" class="form-control" id="age" name="age" placeholder="Age" value="{{ old('age') }}"  >  
            <span class="text-danger">@error('age')
              {{ $message }}
            @enderror</span>      
          </div>          
          
          <div class="col-md-2 mb-3">
            <label class="form-label">Whatsapp</label>
            <div class="form-check form-switch">
              <input class="form-check-input" type="checkbox" role="switch" name="whatsapp" id="flexSwitchCheckChecked" checked>
              <label class="form-check-label" for="flexSwitchCheckChecked"></label>
            </div>    
          </div>
          </div>

         
         
        
      <button type="submit" class="btn btn-primary">Submit</button>
    </form></div>
   
</div></div></div>

@endsection