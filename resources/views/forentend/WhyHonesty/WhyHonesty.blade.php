  
@extends('forentend.index')

@section('content')


<!-- full Title -->
    <div class="full-title">
        <div class="container">
            <!-- Page Heading/Breadcrumbs -->
            <h1 class="mt-4 mb-3"> {{trans('admin.WhyHonesty')}}</h1>
            <div class="breadcrumb-main">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="index.html">{{trans('admin.Home')}}</a>
                    </li>
                    <li class="breadcrumb-item active">  {{trans('admin.WhyHonesty')}} </li>
                </ol>
            </div>
        </div>
    </div>


 <div class="container">
             <a href="{{url('/')}}" class="btn btn-primary">{{trans('admin.back')}}</a>
    </div>



     <div class="services-bar">
        <div class="container">
             <img src="{{url('/')}}/forentend/images/ThatIswhy.png" width="80" height="80" style="border-style: none;
position: absolute;
margin-top: 23px;">

            <h1 class="py-4">{{trans('admin.WhyHonesty')}}</h1>
            <!-- Services Section -->
            <div class="row">
 
           @foreach($Ourworks as $Ourwork)
               <div class="col-lg-4 mb-4">
                    <div class="card h-100">
                        <div class="card-img">
                            <a href="#">
                            <img class="img-fluid" src="{{Storage::url($Ourwork->photo)}}" alt="" />
                            </a>
                        </div>
                        <div class="card-body">
                            <a href="#">
                            
                            <h4 class="card-header"> 

                  @if(session('lang')=='ar')
{{$Ourwork->title_name_ar }}

@endif

  @if(session('lang')=='en')
{{$Ourwork->title_name_en }}

@endif 
            </h4>
                            </a>
                             
                        </div>
                    </div>
               </div>
           @endforeach
              
          
              
             
            </div>
            <!-- /.row -->
        </div>
    </div>
    
    
     
@endsection