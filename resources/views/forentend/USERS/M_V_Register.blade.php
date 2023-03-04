 
 <!DOCTYPE html>
 <html>
 <head>
     <title></title>
       <title></title>
      <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="{{url('Desgin/Adminlte')}}/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{url('Desgin/Adminlte')}}/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{url('Desgin/Adminlte')}}/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{url('Desgin/Adminlte')}}/dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{url('Desgin/Adminlte')}}/plugins/iCheck/square/blue.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
 </head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="{{url('')}}"><b> register site  </b></a>

  
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">

    <form method="POST" action="M_V_L_R_post_register" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-12 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-12">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-12 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-12">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                           <div class="form-group row">
                            <label for="phone" class="col-md-12 col-form-label text-md-right">{{ __('Phone') }}</label>

                            <div class="col-md-12">
                                <input id="phone" type="text" class="form-control" name="phone" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-12 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-12">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-12 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-12">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>



                          <div class="form-group row">
                            <label for="password-confirm" class="col-md-12 col-form-label text-md-right">{{ __('level') }}</label>

                          

                            <div class="col-md-12">
                               
            {!! Form::select('level',['user' => trans('admin.user'),'vendor'=>trans('admin.vendor'),'company'=>trans('admin.company')], null, ['class' => 'form-control','id'=>'drop']) !!}
                            </div>
                        </div>


                                 <div class="form-group row vendor_area hidden">
                          
                            <label for="password-confirm" class="col-md-12 col-form-label text-md-right">{{ trans('user.chiosePDF') }}</label>

                          

                            <div class="col-md-12">
                               
              <input type="file" name=" tmp[]" class="form-control">
                            </div>
                        </div>

           <div class="form-group row   vendor_area hidden">
                          
                            <label for="password-confirm" class="col-md-12 col-form-label text-md-right">{{ trans('user.chiosePDF') }}</label>

                          

                            <div class="col-md-12">
                               
              <input type="file" name=" tmp[]" class="form-control">
                            </div>
                        </div>

         <div class="form-group row vendor_area hidden">
                          
                            <label for="password-confirm" class="col-md-12 col-form-label text-md-right">{{ trans('user.chiosePDF') }}</label>

                          

                            <div class="col-md-12">
                               
              <input type="file" name=" tmp[]" class="form-control">
                            </div>
                        </div>

 
                     <div class="div_inpute">
                         
                     </div>

                          <div class="form-group row vendor_area hidden ">
                            <label for="password-confirm" class="col-md-6 col-form-label text-md-right">{{ trans('user.addinpute') }}</label>

                          

                            <div class="col-md-6" >
           <a href="#" class="add_inpute btn btn-info"><i class="fa fa-plus"></i> </a>
        
                            </div>
                        </div>

                        


                         

                      
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
    

              <a href="{{url('M_V_L_R_get_login')}}" class="text-center">login</a>

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->
   



<script src="{{url('Desgin/Adminlte')}}/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{url('Desgin/Adminlte')}}/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="{{url('Desgin/Adminlte')}}/plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' /* optional */
    });
  });
</script>


 

 <script type="text/javascript" src="{{url('/')}}/customJquiry/jquery.min.js"></script>

         <script type="text/javascript">
             
 $("#drop").change(function () 
 {
        var status = this.value;

       if ( status == 'vendor' )
        {
            $('.vendor_area').removeClass('hidden');


        }
        else
        {
            $('.vendor_area').addClass('hidden');
            $('.cc').addClass('hidden');


                
        }
    });



    var x=1;
            $(document).on('click','.add_inpute',function(){

                var max_inpute=10;
                
                if (x < max_inpute) 
                {
                    //$('.div_inpute').append('<h1>test</h1>');

        $('.div_inpute').append('<div>'+ '<div class="form-group row cc ">'+
'<label for="password-confirm" class="col-md-12 col-form-label text-md-right"></label>'+

                          

                           '<div class="col-md-12" >'+
                    ' {!! Form::label("icon",trans("admin.chiose PDF only")) !!}'+
        '<input type="file" name=" tmp[]" class="form-control"></input>'+
           
                            '</div>'+
                        '+</div>'+
'<a href="#" class="remove_inpute btn btn-danger cc"><i class="fa fa-trash"></i> </a>'+   '</div>'
          
                      
                        );
                    x+=1;
         
                    return false;
                }
            });

            $(document).on('click','.remove_inpute',function(){

                $(this).parent('div').remove();
                x-=1;
                return false;
            });

         </script>
 </body>
 </html>
 

         

 
 
