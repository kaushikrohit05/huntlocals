@extends('layouts/admin')

@section('content')
<script>
  tinymce.init({
    selector: 'textarea#ad_desc',
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
<h1>Edit Ad</h1>
 
<form method="POST" action="{{ url('/admin/updatead/'.$ad->id) }}" enctype="multipart/form-data" >
    @csrf
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">User</label>
        <select class="form-select" aria-label="Default select" name="user">
            <option value="">Select User</option>
            @foreach ($users as $user)
            <option value="{{ $user->id }}" {{$ad->userid == $user->id  ? 'selected' : ''}}>{{ $user->fname }} {{ $user->lname }} ( {{ $user->email_address }} )</option>
            @endforeach
          </select>
        <span class="text-danger">@error('user')
          {{ $message }}
        @enderror</span>
      </div>
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Category</label>
        <select class="form-select" aria-label="Default select" name="category">
            <option value="">Select Category</option>
            @foreach ($categories as $category)
            <option value="{{ $category->id }}" {{$ad->category_id == $category->id  ? 'selected' : ''}}>{{ $category->category }}</option>
            @endforeach
          </select>
        <span class="text-danger">@error('category')
          {{ $message }}
        @enderror</span>
      </div>
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Region</label>
        <select class="form-select" aria-label="Default select" name="region" id="region" >
            <option value="">Select Region</option>
            @foreach ($locations as $location)
            <option value="{{ $location->id }}"  {{$ad->region_id == $location->id  ? 'selected' : ''}}>{{ $location->location }}</option>
            @endforeach
          </select>
        <span class="text-danger">@error('region')
          {{ $message }}
        @enderror</span>
      </div>
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Location</label>

        <select class="form-select" aria-label="Default select" name="location" id="location">
             <option value="">Select Location</option>
             @foreach ($child_locations as $child_location )
             <option value="{{ $child_location->id }}"  {{$ad->location_id == $child_location->id  ? 'selected' : ''}}>{{ $child_location->location }}</option>
             @endforeach
          </select>
        <span class="text-danger">@error('location')
          {{ $message }}
        @enderror</span>
      </div>
      <div class="row mb-3"> 
        <div class="col-md-4">
          <label class="form-label">ZIP*</label>
          <input type="text" class="form-control" id="zip" name="zip" placeholder="ZIP" value="{{ $ad->zip_code }}"  >
          <span class="text-danger">@error('zip')
            {{ $message }}
          @enderror</span>
        </div>
        <div class="col-md-8">
          <label  class="form-label">Area / District / Neighbourhood*</label>
          <input type="text" class="form-control" id="area" name="area" placeholder="Area / District / Neighbourhood" value="{{ $ad->area }}"  >
          <span class="text-danger">@error('area')
            {{ $message }}
          @enderror</span>
        </div>
        </div>

        <div class="mb-3">
          <label class="form-label">Address*</label>
          <input type="text" class="form-control" id="ad_title" name="address" placeholder="Address" value="{{ $ad->address }}"  >  
          <span class="text-danger">@error('address')
            {{ $message }}
          @enderror</span>      
        </div> 

      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Ad Title</label>
        <input type="text" class="form-control" id="ad_title" name="ad_title" placeholder="Ad Title" value="{{ $ad->title }}"  >  
        <span class="text-danger">@error('ad_title')
          {{ $message }}
        @enderror</span>       
      </div> 
      <div class="mb-3">
        <label  class="form-label">Ad Description</label>
        <textarea class="form-control" id="ad_desc" name="ad_desc" rows="3">{{ $ad->description }}</textarea>
        <span class="text-danger">@error('ad_desc')
          {{ $message }}
        @enderror</span> 
      </div> 
      <div class="row mb-3"> 
           
        <div class="col-md-4 mb-3">
          <label class="form-label">Phone Number*</label>
          <input type="text" class="form-control" id="phone_number" name="phone_number" placeholder="Phone Number" value="{{ $ad->phone }}"  >  
          <span class="text-danger">@error('phone_number')
            {{ $message }}
          @enderror</span>      
        </div>
        <div class="col-md-2 mb-3">
          <label class="form-label">Age*</label>
          <input type="text" class="form-control" id="age" name="age" placeholder="Age" value="{{ $ad->user_age }}"  >  
          <span class="text-danger">@error('age')
            {{ $message }}
          @enderror</span>      
        </div>          
        
        <div class="col-md-2 mb-3">
          <label class="form-label">Whatsapp</label>
          <div class="form-check form-switch">
            <input class="form-check-input" type="checkbox" role="switch" name="whatsapp" id="flexSwitchCheckChecked" 
            @if ($ad->whatsapp_active==1)
             checked  
             
            @endif
            >
            <label class="form-check-label" for="flexSwitchCheckChecked"></label>
          </div>    
        </div>
        </div>
     <div class="mb-3">
        <label  class="form-label">Staus</label>
        <select class="form-select" aria-label="Default select example" name="isActive">
          <option value="1">Active</option>
          <option value="2">Inactive</option>
        </select>
      </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>

@endsection


