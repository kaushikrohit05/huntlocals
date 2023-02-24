@extends('layouts/frontend1')

@section('content')
<div class="row my-3 py-3 singup_login_box"  >
  <div class="col-md-8 text-center"><div class="content py-5"><h2>NOT SIGNED IN YET?</h2>
    Signing in you can<br>
    
    Manage your ads easily<br>
    
    Publish without waiting for the e-mail notification<br><br>
    
    <a class="btn btn-outline-primary" href="/signup" role="button">SIGN UP HERE</a></div></div>
  <div class="col-md-4">
    
    <div class="card"><div class="cord-body p-4"><h1>Login</h1>

@if(Session::get('success'))
  <div class="alert alert-success">
    {{ Session::get('success') }}
  </div>
@endif

@if(Session::get('fail'))
  <div class="alert alert-danger">
    {{ Session::get('fail') }}
  </div>
@endif

<form method="POST" action="{{ route('loginaction') }}" >
    @csrf
    <div class="input-group-lg mb-3">
      <label for="exampleInputEmail1" class="form-label">Email Address</label>
      <input type="text" class="form-control" id="email_address" name="email_address" placeholder="Email Address" value="{{ old('email_address') }}">
      <span class="text-danger">@error('email_address')
        {{ $message }}
      @enderror</span>
    </div>
    <div class="input-group-lg mb-3">
      <label for="exampleInputEmail1" class="form-label">Password</label>
      <input type="password" class="form-control" id="password" name="password" placeholder="Password" > 
      <span class="text-danger">@error('password')
        {{ $message }}
      @enderror</span>       
    </div>  
    
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div></div></div>
 
</div>
@endsection