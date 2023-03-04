@extends('forentend.index')
@section('content')


<!-- Start all page -->
<div class="page-hf-banner">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h2>login</h2>
      </div>
    </div>
  </div>
  <div class="page-banner-breadcrumb">
    <div class="container">
      <div class="col-md-12">
        <ul class="breadcrumb">
          <li><a href="#">Home</a></li>
          <li class="active">login</li>
        </ul>
      </div>
    </div>
  </div>
</div>
<!-- End all page --> 

<!-- Start Login form-->
<div class="form-login wow animated fadeIn">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="login-form-in">
          <form class="form-signin"  method="POST" action="{{ route('login') }}">
                            @csrf

            <h2 class="form-signin-heading">Please <span>login</span></h2>
            <div class="form-group">
              <input type="text" class="form-control" name="email" placeholder="Email Address" required autofocus />
              @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
            </div>
            <div class="form-group">
              <input type="password" class="form-control" name="password" placeholder="Password" required/>
              @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
            </div>
            <label class="checkbox">
              <input type="checkbox" value="remember-me" id="rememberMe" name="rememberMe">
              <span>Remember me</span> </label>
            <button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- End Login form --> 


 
@endsection
