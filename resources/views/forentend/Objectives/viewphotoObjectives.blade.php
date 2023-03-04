  
@extends('forentend.index')

@section('content')
 
     <!-- full Title -->
    <div class="full-title">
        <div class="container">
            <!-- Page Heading/Breadcrumbs -->
            <h1 class="mt-4 mb-3">                       @if(session('lang')=='ar')
{{$Ob->title_name_ar }}

@endif

  @if(session('lang')=='en')
{{$Ob->title_name_en }}

@endif</h1>
            <div class="breadcrumb-main">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{url('/')}}">{{trans('admin.Home')}}</a>
                    </li>
                    <li class="breadcrumb-item active">                       @if(session('lang')=='ar')
{{$Ob->title_name_ar }}

@endif

  @if(session('lang')=='en')
{{$Ob->title_name_en }}

@endif</li>
                </ol>
            </div>
        </div>
    </div>
    
    <!-- Page Content -->
   <!-- <div class="container">
             <a href="{{url('/')}}" class="btn btn-primary">{{trans('admin.back')}}</a>
    </div> -->

  
    <div class="services-bar">
        <div class="container">
            <h1 class="py-4">                       @if(session('lang')=='ar')
{{$Ob->title_name_ar }}

@endif

  @if(session('lang')=='en')
{{$Ob->title_name_en }}

@endif</h1>
            <!-- Services Section -->
            <div class="row">
 
               <div class="col-lg-3 mb-3">
        </div>
               <div class="col-lg-6 mb-6">
                    <div class="card h-100">
                        <div class="card-img">
                              <a href="{{url('/')}}/Objectives/{{$Ob->id}}"> 
                            <img class="img-fluid" src="{{url('/')}}/{{substr($Ob->photo, -29) }}" alt=""  style="height:370px;height: 270px" />
                         </a>
                        </div>
                         
                    </div>
               </div>
       
              
            <div class="col-lg-3 mb-3">
        </div>
              
             
            </div>
            <!-- /.row -->
        </div>
    </div>
 
@endsection