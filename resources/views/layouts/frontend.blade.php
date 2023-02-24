<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <link rel="icon" type="image/x-icon" href="{{ asset('/images/favicon.png') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="canonical" href="{{ url(Request::url()) }}@if(app('request')->input('page'))?page={{ app('request')->input('page') }}@endif" />
    <script src="https://kit.fontawesome.com/378f3e2d81.js" crossorigin="anonymous"></script>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('/css/style.css') }}">
    @if ($Page_data)      
    <title>{{ $Page_data->meta_title }} @if( request()->get('page') ) | Page {{ request()->get('page') }} @endif @ HuntLocals</title>
    <meta name="description" content="{{ $Page_data->meta_description }}">
    @endif
     
    
  </head>
  <body><nav class="navbar navbar-expand-lg  navbar-dark bg-dark">
    <div class="container">
      <a class="navbar-brand" href="/">HuntLocals</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
           
        </ul>
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
          
          @if(!session()->has('SiteUser'))
          <li class="nav-item">
            <a class="nav-link " aria-current="page" href="/login"><i class="fas fa-user"></i> Login</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/signup"><i class="fas fa-sign-out-alt"></i> Sign Up</a>
          </li>
          @endif
          @if(session()->has('SiteUser'))
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <i class="fas fa-user-circle"></i> My Account
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="/myaccount"><i class="fas fa-address-card"></i> My Ads</a></li> 
              <li><a class="dropdown-item" href="/profile"><i class="fas fa-cog"></i> Account Info.</a></li>
                           
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link " aria-current="page" href="{{ route('logout') }}"><i class="fas fa-sign-out-alt"></i> Logout</a>
          </li>
          @endif
          <li class="nav-item">
            <a class="nav-link" href="/user/postadd"><span class="postadd_btn">Post Your Ad <i class="fas fa-long-arrow-alt-right"></i></span></a>
          </li>          
        </ul>         
      </div>
    </div>
  </nav>
  @include('layouts.searchform')

    <div class="container">
        @yield('content')
    </div>
    
	
   <div class="disclaimer py-4 mt-5"> 
    <div class="container">
	  <div class="row"><div class="col-md-12 small"><strong>We are an advertising and information resource having no connection with any of the listings featured here. </strong>
HuntLocals is working as an advertising agency rather than an escort platform. Our team is not responsible for the content posted by third-party individuals or platforms here. All the resources posted here are reviewed before publishing.</div></div>
</div>
</div>

@include('layouts.footer')
</body>
</html>