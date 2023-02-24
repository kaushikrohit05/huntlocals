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

<div class="row"><div class="col"><h1>Categories Location SEO Data</h1> </div><div class="col text-end"><a class="btn btn-primary" href="{{ url('/admin/addcatlocseo') }}" role="button"><i class="fas fa-plus"></i> Add</a></div></div>


<div class="row"   >

@foreach ($catlocseo as $row) 
  <div class="col-md-6 my-2">
    <div class="card">
      <div class="card-body">
        #{{ $row->id }} : {{ $row->category }} > {{ $row->location }}  &nbsp; &nbsp; <a href="/admin/editcatlocseo/{{ $row->id }}">Edit</a> &nbsp; &nbsp; &nbsp; <a href="deletecatlocseo/{{ $row->id }}"  ><i class="fas fa-trash-alt"></i></a>
      </div>
    </div>


   
     
  </div>
 @endforeach  
   
</div>





@endsection

