<nav class="navbar navbar-expand-lg  navbar-dark bg-dark">
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
            <a class="nav-link active" aria-current="page" href="{{ route('logout') }}"><i class="fas fa-sign-out-alt"></i> Logout </a>
          </li>
          @endif
          <li class="nav-item">
            <a class="nav-link" href="/user/postadd"><span class="postadd_btn">Post Your Ad <i class="fas fa-long-arrow-alt-right"></i></span></a>
          </li>          
        </ul>         
      </div>
    </div>
  </nav>