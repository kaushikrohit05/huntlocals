@extends('layouts/admin')

@section('content')
<h1>Create User</h1>
<form method="POST" action="{{ url('/admin/updateuser') }}/{{ $user->id }}" >
  @csrf
     
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Email address</label>
      <input type="text" class="form-control" aria-describedby="emailHelp"   name="email_address" placeholder="Email Address" disabled  value="{{ $user->email_address }}" >
      <span class="text-danger">@error('email_address')
        {{ $message }}
      @enderror</span>
    </div>
    <div class="mb-3">
      <label for="exampleInputPassword1" class="form-label">Password</label>
      <input type="password" class="form-control"  name="user_password" placeholder="Password"   >
      <span class="text-danger">@error('user_password')
        {{ $message }}
      @enderror</span>
    </div>
    <div class="mb-3">
      <label  class="form-label">Staus</label>
      <select class="form-select" aria-label="Default select example" name="isActive">
        <option value="1" @if ($user->isActive==1) selected  @endif>Active</option>
        <option value="0" @if ($user->isActive!=1) selected  @endif>Inactive</option>
      </select>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>

@endsection