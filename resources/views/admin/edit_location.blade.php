@extends('layouts/admin')

@section('content')
 
<h1>Add Location</h1>
<form method="POST" action="{{ url('/admin/updatelocation') }}/{{ $selected_location->id }}" >
    @csrf
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Parent</label>
      <select class="form-select" aria-label="Default select" name="parent_location">
          <option value="">Top</option>
          @foreach ($parent_locations as $parent_location)
          <option value="{{ $parent_location->id }}" 
            @if ( $selected_location->parent == $parent_location->id)
            selected
            @endif
          >{{ $parent_location->location }}</option>
          @endforeach
        </select>
      <span class="text-danger">@error('category')
        {{ $message }}
      @enderror</span>
    </div>
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Location</label>
      <input type="text" class="form-control" id="location" name="location"  value="{{ $selected_location->location }}">
      
    </div>
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Location Slug</label>
      <input type="text" class="form-control" id="location_slug" name="location_slug" placeholder="Location Slug"   value="{{ $selected_location->location_slug }} "required >        
    </div> 
     
       
    
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>

@endsection