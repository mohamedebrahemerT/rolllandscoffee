 <!DOCTYPE html>

<html lang="en">

<head>

	<meta charset="utf-8">

	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<meta name="description" content="{{settings()->sitemeta}}">

 

	<title>

				@if(session('lang')=='ar')

				{{settings()->namear}}

				@endif

				@if(session('lang')=='en')

				{{settings()->nameaen}}

				@endif  

	</title>



	<link rel="icon" type="image/ico" href="{{Storage::url(settings()->siteflag)}}" />

 

 

 

 

 

	<!-- Bootstrap core CSS -->

	<link href="{{url('/')}}/forentend/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

	<!-- Fontawesome CSS -->

	<link href="{{url('/')}}/forentend/css/all.css" rel="stylesheet">

	<!-- Owl Carousel CSS -->

	<link href="{{url('/')}}/forentend/css/owl.carousel.min.css" rel="stylesheet">

	<!-- Owl Carousel CSS -->

	<link href="{{url('/')}}/forentend/css/jquery.fancybox.min.css" rel="stylesheet">

	<!-- Custom styles for this template -->





 

       @if(session('lang') == 'ar')

 



	<link href="{{url('/')}}/forentend/css/droidarabickufi.css" rel="stylesheet">



	<link href="{{url('/')}}/forentend/css/AR.css" rel="stylesheet">

    



       @endif



          @if(session('lang') == 'en')

       

	<link href="{{url('/')}}/forentend/css/EN.css" rel="stylesheet">

    

	 <link rel="stylesheet" href="http://fonts.googleapis.com/earlyaccess/droidarabickufi.css">

       @endif



      <style>

.alert {

  padding: 20px;

  background-color: #ff9800;

  color: white;

}



.closebtn {

  margin-left: 15px;

  color: white;

  font-weight: bold;

  float: right;

  font-size: 22px;

  line-height: 20px;

  cursor: pointer;

  transition: 0.3s;

}



.closebtn:hover {

  color: black;

}

</style>


<style type="text/css">
	.top-nav 
	{
  background-color:#3c584a !important;
}
.top-bar {
  background: #000;
  padding: 4px 0px;
}
</style>
</head>

<body>