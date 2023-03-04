 
@extends('forentend.index')

@section('content')
 
 <section id="top_banner">
        <div class="banner">
            <div class="inner text-center">
                <h2>{{trans('admin.logtoacount')}}</h2>
            </div>
        </div>
    </section>



    <section id="login-reg">
        <div class="container">
            <!-- Top content -->
            <div class="row">
                <div class="col-md-6 col-sm-12 forms-right-icons">
                    <div class="section-heading">
                             <h2>{{trans('admin.SignInWith')}}<span> {{trans('admin.Us')}}</span></h2>
                        <p class="subheading">{{trans('admin.logtoacount')}} </p>
                    </div>
                    <div class="row">
                        <div class="col-xs-2 icon"><i class="fa fa-laptop"></i></div>
                        <div class="col-xs-10 datablock">
                            <h4>{{trans('admin.100%Responsive')}}</h4>
                            <p>{{trans('admin.100%Responsive2')}}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-2 icon"><i class="fa fa-bullhorn"></i></div>
                        <div class="col-xs-10 datablock">
                              <h4>{{trans('admin.PowerfulFeatures')}}</h4>
                            <p>{{trans('admin.PowerfulFeatures2')}}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-2 icon"><i class="fa fa-support"></i></div>
                        <div class="col-xs-10 datablock">
                          <h4> {{trans('admin.CustomerSupport')}}  </h4>
                            <p> {{trans('admin.CustomerSupport2')}}</p>
                        </div>
                    </div>

                </div>
                <!--forms-right-icons-->
                <div class="col-md-6 col-sm-12">
                    <div class="form-box">
                        <div class="form-top">
                             @if(session('lang') == 'ar')
 <div class="form-top-right">
                                <i class="fa fa-pencil"></i>
                            </div>

   @endif
                            <div class="form-top-left">
                                <h3>{{trans('admin.Signupnow')}}</h3>
                                <p>{{trans('admin.Signupnow1')}}</p>

                                   @if(session('verfyAcountFirst'))
   <div class="alert alert-danger ">
   {{session('verfyAcountFirst')}}

     </div>
   @endif

                                             @if(session('success'))
   <div class="alert alert-success ">
   {{session('success')}}

     </div>
   @endif

                                                @if(session('danger'))
   <div class="alert alert-danger ">
   {{session('danger')}}

     </div>
   @endif
                            </div>
 @if(session('lang') == 'en')
 <div class="form-top-right">
                                <i class="fa fa-pencil"></i>
                            </div>

   @endif

                            
                        </div>
                        <div class="form-bottom">
 <form method="POST" role="form" action="M_V_L_R_post_register" class="login-form">
                        @csrf

                                <div class="input-group form-group">
                                 
      @if(session('lang') == 'ar')
         <span class="input-group-addon" id="basic-addon1"><i class="fa fa-user"></i></span>
       <input type="text" class="form-control" placeholder=" {{trans('admin.name')}}  " aria-describedby="basic-addon1" name="name" style="text-align: right;">
   @endif
     @if(session('lang') == 'en')
         <span class="input-group-addon" id="basic-addon1"><i class="fa fa-user"></i></span>
       <input type="text" class="form-control" placeholder=" {{trans('admin.name')}}  " aria-describedby="basic-addon1" name="name">
   @endif


                                         @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                                </div>
                                
                                <div class="input-group form-group">
                                   
@if(session('lang') == 'ar')
 <span class="input-group-addon" id="basic-addon1"><i class="fa fa-envelope"></i></span>
     <input type="text" class="form-control" placeholder="{{trans('admin.email')}}" aria-describedby="basic-addon1" name="email" style="text-align: right;">
                                        
   @endif
 @if(session('lang') == 'en')
  <span class="input-group-addon" id="basic-addon1"><i class="fa fa-envelope"></i></span>
     <input type="text" class="form-control" placeholder="{{trans('admin.email')}}" aria-describedby="basic-addon1" name="email">
                                     
@endif
                                
                                  @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                                </div>
                                <div class="input-group form-group">
                                

  @if(session('lang') == 'ar')
      <span class="input-group-addon" id="basic-addon1"><i class="fa fa-phone"></i></span>
        <input type="tel" class="form-control" placeholder="{{trans('admin.Phone')}}" aria-describedby="basic-addon1" name="phone" style="text-align: right;">
   @endif
 @if(session('lang') == 'en')
   <span class="input-group-addon" id="basic-addon1"><i class="fa fa-phone"></i></span>
        <input type="tel" class="form-control" placeholder="{{trans('admin.Phone')}}" aria-describedby="basic-addon1" name="phone">
@endif
                                  
                                      @if ($errors->has('phone'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                @endif
                                </div>

                                  <div class="input-group form-group">
                                   
                                    @if(session('lang') == 'ar')
                                     <span class="input-group-addon" id="basic-addon1"><i class="fa fa-key"></i></span>

                                    <input type="password" class="form-control" placeholder="{{trans('admin.password')}}" aria-describedby="basic-addon1" name="password" style="text-align: right;">

   @endif
 @if(session('lang') == 'en')
    <span class="input-group-addon" id="basic-addon1"><i class="fa fa-key"></i></span>

                                    <input type="password" class="form-control" placeholder="{{trans('admin.password')}}" aria-describedby="basic-addon1" name="password" >
@endif

                                     @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                                </div>

                        <input type="hidden" name="level" value="user">



                                
                                <button type="submit" class="btn">{{trans('admin.signup')}}</button>
                            </form>
                        </div>
                    </div>

                </div>


    </section>
@endsection
    