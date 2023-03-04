@extends('forentend.index')
@section('content')

<!-- Start all page -->
<div class="page-hf-banner">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h2>Register</h2>
      </div>
    </div>
  </div>
  <div class="page-banner-breadcrumb">
    <div class="container">
      <div class="col-md-12">
        <ul class="breadcrumb">
          <li><a href="#">Home</a></li>
          <li class="active">Register</li>
        </ul>
      </div>
    </div>
  </div>
</div>
<!-- End all page --> 

<!-- Start Registration form-->
<div class="form-login wow animated fadeIn">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="login-form-in clearfix">
          <form class="form-signin" method="POST" action="{{ route('register') }}">
                  @csrf
            <h2 class="form-signin-heading">Please <span>Register</span></h2>
            <div class="col-md-12">
              <div class="form-group">
                <input type="text" name="name"  placeholder="Enter   Name Here.." class="form-control" required />
                @if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
              </div>
            </div>
           
            <div class="col-md-12">
              <div class="form-group">
                <input type="text" class="form-control" name="email" placeholder="Email Address" required />
                  @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <input type="password" class="form-control" name="password"placeholder="Password" required/>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <input type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password" required/>
              </div>
            </div>
            
            <div class="col-md-12">
              <label class="checkbox">
                <input type="checkbox" value="remember-me" id="rememberMe" name="rememberMe">
                <span>I agree the User Agreement and Terms & Condition.</span> </label>
            </div>
            <div class="col-md-12">
              <button class="btn btn-lg btn-primary btn-block" type="submit">Register</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- End Registration form --> 

 
@endsection
