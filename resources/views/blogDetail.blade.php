@extends('layouts/frontend1')
@section('content')
<div class="row my-3 breadcrumb"><div class="col small"><a href="/"><i class="fas fa-home"></i></a> > 
<a href="/blog">Blog</a > 
  </div></div>
<div class="row my-5">
    <div class="col-md-12"><h1 class="mb-3">{{ $post->post_name }}</h1>
    <div class="content">{!! $post->post_description !!}</div></div>
</div> 
 

@endsection

