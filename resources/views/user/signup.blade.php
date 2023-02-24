@extends('layouts/frontend1')

@section('content')
<div class="row my-3 py-3 singup_login_box"  >
    <div class="col-md-8 text-center"><div class="content py-5"><h2>ALREADY HAVE AN ACCOUNT?</h2> 
      Signup Today and become a part of India's #1 Adult Classified Portal<br><br>
      Publish without a confirmation e-mail address (Free)<br><br>
      
      Manage your ads easily (Free)<br><br>
      
      <a class="btn btn-outline-primary" href="/login" role="button">LOGIN HERE</a></div></div>
    <div class="col-md-4"><div class="card"><div class="cord-body p-4"><h1>Sign Up</h1>
      <form method="POST" action="/registeraction" >
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
              <input type="password" class="form-control" id="admin_password" name="password" placeholder="Password" > 
              <span class="text-danger">@error('password')
                {{ $message }}
              @enderror</span>       
            </div>  
          
          <button type="submit" class="btn btn-primary">Submit</button>
        </form></div></div>

</div>
 
</div>
@endsection