@extends('layouts/admin')

@section('content')
<h1>Add SEO Data</h1>

<form method="POST" action="{{ url('/admin/savecatlocseo') }}" enctype="multipart/form-data" >
    @csrf
  
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Category</label>
        <select class="form-select" aria-label="Default select" name="category">
             
            @foreach ($categories as $category)
            <option value="{{ $category->id }}">{{ $category->category }}</option>
            @endforeach
          </select>
        <span class="text-danger">@error('category')
          {{ $message }}
        @enderror</span>
      </div>
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Region</label>
        <select class="form-select" aria-label="Default select" name="region" id="region" >
             
            @foreach ($locations as $location)
            <option value="{{ $location->id }}">{{ $location->location }}</option>
            @endforeach
          </select>
        <span class="text-danger">@error('region')
          {{ $message }}
        @enderror</span>
      </div>
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Location</label>
        <select class="form-select" aria-label="Default select" name="location" id="location">
             <option value="0">Select Location</option>
          </select>
        <span class="text-danger">@error('location')
          {{ $message }}
        @enderror</span>
      </div>      
      <div class="mb-3">
        <label  class="form-label">Meta Title</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" name="meta_title" rows="3"></textarea>
      </div>
      <div class="mb-3">
        <label  class="form-label">Meta Description</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" name="meta_description" rows="3"></textarea>
      </div>   
	   <div class="mb-3">
        <label  class="form-label">Description</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" name="description" rows="5"></textarea>
      </div>    
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>

@endsection


