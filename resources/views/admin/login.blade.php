@extends('layouts/admin')

@section('content')
<div class="row">
    <div class="col-md-4"></div>
    <div class="col-md-4">
<h1>Administrator Login</h1>

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

<form method="POST" action="{{ route('admin.loginaction') }}" >
    @csrf
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Email Address</label>
      <input type="text" class="form-control" id="email_address" name="email_address" placeholder="Email Address" value="{{ old('email_address') }}">
      <span class="text-danger">@error('email_address')
        {{ $message }}
      @enderror</span>
    </div>
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Password</label>
      <input type="password" class="form-control" id="admin_password" name="admin_password" placeholder="Password" > 
      <span class="text-danger">@error('admin_password')
        {{ $message }}
      @enderror</span>       
    </div>  
    
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>
<div class="col-md-4"></div>
</div>
@endsection