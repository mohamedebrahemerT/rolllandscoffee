@extends('forentend.index')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header" style="background-color: #374e91;color: white;">{{ __('Update Profile') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('update-profile') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group row"@if(app()->getLocale() == "ar") dir="rtl" @endif>
                                <label for="email" class="col-sm-4 col-form-label text-md-right">{{ __('Name') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ auth()->user()->name }}" required autofocus>

                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row"@if(app()->getLocale() == "ar") dir="rtl" @endif>
                                <label for="email" class="col-sm-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ auth()->user()->email }}" required autofocus>

                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row"@if(app()->getLocale() == "ar") dir="rtl" @endif>
                                <label for="password" class="col-sm-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" >

                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row"@if(app()->getLocale() == "ar") dir="rtl" @endif>
                                <label for="password_confirmation" class="col-sm-4 col-form-label text-md-right">{{ __('password_confirmation') }}</label>

                                <div class="col-md-6">
                                    <input id="password_confirmation" type="password" class="form-control{{ $errors->has('password_confirmation') ? ' is-invalid' : '' }}" name="password_confirmation">

                                    @if ($errors->has('password_confirmation'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row"@if(app()->getLocale() == "ar") dir="rtl" @endif>
                                <label for="avatar" class="col-sm-4 col-form-label text-md-right">{{ __('avatar') }}</label>

                                <div class="col-md-6">
                                    <input id="avatar" type="file" class="form-control{{ $errors->has('avatar') ? ' is-invalid' : '' }}" name="avatar">

                                    @if ($errors->has('avatar'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('avatar') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-secondary">
                                        {{ __('Save') }}
                                    </button>

                                    {{--<a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>--}}
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">{{trans('Hr Links')}}</div>
                    <div class="card-body">
                        <a href="#" class="btn btn-secondary">Link1</a>
                        <a href="#" class="btn btn-secondary">Link2</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
