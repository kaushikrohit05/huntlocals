<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://kit.fontawesome.com/378f3e2d81.js" crossorigin="anonymous"></script>
    <link rel="canonical" href="{{ url(Request::url()) }}" />
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<script src="https://cdn.tiny.cloud/1/ud89g26pvdzj62qi0v8wzbfn489krhmeiqppec8zmgwkkhvo/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <title>Administrator</title>
  </head>
  <body><nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="/admin">ADMIN</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        @if(session()->has('LoggedUser'))
          
        
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{ route('dashboard') }}">Dashboard</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('pages') }}">Pages</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('blogs') }}">Blogs</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('users') }}">Users</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('ads') }}">Ads</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('categories') }}">Categories</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('locations') }}">Locations</a>
          </li>
           <li class="nav-item">
            <a class="nav-link" href="{{ route('seodata') }}">SEO Data</a>
          </li> 

         
          
        </ul>
        @endif
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
          @if(session()->has('LoggedUser'))
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{ route('admin.logout') }}">Logout <i class="fas fa-sign-out-alt"></i></a>
          </li>
          @endif

         
          
        </ul>
         
      </div>
    </div>
  </nav>
    <div class="container my-5">
        @yield('content')
    </div> 
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="{{asset('js/admin.js')}}"></script>
</body>
</html>
