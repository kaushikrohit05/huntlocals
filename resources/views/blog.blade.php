@extends('layouts/frontend1')

@section('content')
<div class="row my-5">
    <div class="col-md-12"><h1 class="mb-3">Blog</h1>
    <div class="content">
    <div class="row my-3 breadcrumb"><div class="col small"><a href="/"><i class="fas fa-home"></i></a> > 
Blog > 
  </div></div>
         @foreach ($posts as $row)
           <div class="row my-5">
            <div class="col-md-12">
            <h2><a class="post_title" href="/blog/{{ $row['post_slug'] }}">{{ $row['post_name'] }}</a></h2>
                <small>{{ $row['created_at'] }} </small>
                <div>{{ Str::limit(str_replace('&nbsp;', ' ',strip_tags($row['post_description'])), 280) }} </div>
            </div>
            </div>
             @endforeach
                 
              {{ $posts->links() }}
            
    </div>
</div>
</div>


@endsection

