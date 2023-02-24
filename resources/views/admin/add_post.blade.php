@extends('layouts/admin')

@section('content')
<script>
tinymce.init({
  selector: 'textarea#post_description',
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
  'removeformat | code |  help',
  content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:16px }'
});
</script>
<h1>Add Page</h1>
 
<form method="POST" action="{{ url('/admin/savepost') }}" >
    @csrf
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Blog Title</label>
        <input type="text" class="form-control" id="blog_title" name="blog_title" placeholder="Blog Title"  value="{{ old('blog_title') }}">
        <span class="text-danger">@error('blog_title')
          {{ $message }}
        @enderror</span>
      </div>

      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Blog Slug</label>
        <input type="text" class="form-control" id="blog_slug" name="blog_slug" placeholder="Blog Slug" value="{{ old('blog_slug') }}"  >  
        <span class="text-danger">@error('blog_slug')
          {{ $message }}
        @enderror</span>      
      </div> 
      <div class="mb-3">
        <label  class="form-label">Meta Title</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" name="meta_title" rows="3">{{ old('meta_title') }}</textarea>
      </div>
      <div class="mb-3">
        <label  class="form-label">Meta Description</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" name="meta_description" rows="3">{{ old('meta_description') }}</textarea>
      </div>
      <div class="mb-3">
        <label  class="form-label">Page Content</label>
        <textarea class="form-control" id="post_description" name="post_description" rows="3">{{ old('post_description') }}</textarea>
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