@extends('layouts/admin')

@section('content')
<script>
    tinymce.init({
      selector: 'textarea.catlocseo_description',
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
      'removeformat | code | help',
      content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:16px }'
    });
    </script>
<h1>Edit SEO Data</h1>
 
<form method="POST" action="{{ url('/admin/updatecatlocseo') }}/{{ $data->id }}" enctype="multipart/form-data" >
    @csrf
  
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Category</label>
        <select class="form-select" aria-label="Default select" name="category" disabled>
            
            @foreach ($categories as $category)
            <option value="{{ $category->id }}" @if ($category->id==$data->category_id)
                selected
            @endif    >{{ $category->category }}</option>
            @endforeach
          </select>
        
      </div>
      
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Location</label>
        <select class="form-select" aria-label="Default select" name="location" id="location" disabled>
            @foreach ($locations as $location)
            <option value="{{ $location->id }}" @if ($location->id==$data->location_id)
                selected
            @endif    >{{ $location->location }}</option>
            @endforeach
          </select>
          </select>
         
      </div>      
      <div class="mb-3">
        <label  class="form-label">Meta Title</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" name="meta_title" rows="3">{{ $data->meta_title }}</textarea>
      </div>
      <div class="mb-3">
        <label  class="form-label">Meta Description</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" name="meta_desc" rows="3">{{ $data->meta_description }}</textarea>
      </div>   
	   <div class="mb-3">
        <label  class="form-label">Description</label>
        <textarea class="form-control catlocseo_description" id="exampleFormControlTextarea1" name="desc" rows="5">{{ $data->description }}</textarea>
      </div>    
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>

@endsection


