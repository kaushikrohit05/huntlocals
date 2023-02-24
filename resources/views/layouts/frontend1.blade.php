<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="content-language" content="en-in">
    <meta name="language" content="en-in">    
    <link rel="icon" type="image/x-icon" href="{{ asset('/images/favicon.png') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="canonical" href="{{ url(Request::url()) }}@if(app('request')->input('page'))
      {{ app('request')->input('page') }}
      @endif " />
    <script src="https://kit.fontawesome.com/378f3e2d81.js" crossorigin="anonymous"></script>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('/css/style.css') }}">
     
     
    @if ($Page_data)      
    <title>{{ $Page_data->meta_title }} @if( request()->get('page') ) | Page {{ request()->get('page') }} @endif @ HuntLocals</title>
    <meta name="description" content="{{ $Page_data->meta_description }}">
    @endif 
     
	 @if($Page_name=='add_detail')      
    <title>{{ $ads->title }} - HuntLocals</title>
    <meta name="description" content="{{ $ads->title }}">
    @endif
    @if($Page_name=='blog_post')      
    <title>{{ $post->meta_title }} - HuntLocals</title>
    <meta name="description" content="{{ $post->meta_description }}">
    @endif


  </head>
  <body>
    @include('layouts.nav')

    <div class="container">
        @yield('content')
    </div>
    
    
    @include('layouts.footer')
</body>
</html>