<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Registration Page</title>
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
<body class="hold-transition register-page">
<div class="register-box">
  <div class="register-logo">
    <a href="{{url('Desgin/Adminlte')}}/index2.html"><b>Admin</b>LTE</a>
  </div>
    @foreach ($errors->all() as $error)
                <li class="alert alert-danger">{{ $error }}</li>
            @endforeach
        </ul>

  <div class="register-box-body">
    <p class="login-box-msg">Register a new membership</p>
   {!! Form::open(['url'=>url('rr'),'files'=>true]) !!}
                     <div class="form-group"> 
                     {{ Form::label('name', trans('admin.name'))  }}
                    {{ Form::text('name',old('name'),['class'=>'form-control'])  }}
                     </div> 
                       <div class="form-group"> 
                     {{ Form::label('email', trans('admin.email'))  }}
                    {{ Form::text('email',old('email'),['class'=>'form-control'])  }}
                     </div> 
                      <div class="form-group"> 
                     {{ Form::label('password', trans('admin.adminpassword'))  }}
                    {{ Form::password('password',['class'=>'form-control'])  }}
                     </div> 
                   <div class="form-group"> 
    {{ Form::label('photo', trans('admin.photo'))  }}
     {{ Form::file('photo',['class'=>'form-control'])  }}
     
                      
     </div> 
              
                    {{ Form::submit(trans('admin.register'),['class'=>'form-control btn btn-primary'])  }}
                    

                    {{Form::close() }}

    <div class="social-auth-links text-center">
      <p>- OR -</p>
      <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign up using
        Facebook</a>
      <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign up using
        Google+</a>
    </div>

    <a href="{{url('admin_login')}}" class="text-center">I already have a membership</a>
 </div> 
  </div>
  <!-- /.form-box -->
</div>
<!-- /.register-box -->

<!-- jQuery 3 -->
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
</body>
</html>
