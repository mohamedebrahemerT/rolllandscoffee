  
@extends('forentend.index')

@section('content')
 
     <!-- full Title -->
    <div class="full-title">
        <div class="container">
            <!-- Page Heading/Breadcrumbs -->
            <h1 class="mt-4 mb-3">{{trans('admin.services')}}</h1>
            <div class="breadcrumb-main">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="index.html">{{trans('admin.Home')}}</a>
                    </li>
                    <li class="breadcrumb-item active">{{trans('admin.services')}}</li>
                </ol>
            </div>
        </div>
    </div>
    
    <!-- Page Content -->
    <div class="container">
             <a href="{{url('/')}}" class="btn btn-primary">{{trans('admin.back')}}</a>
    </div>

  
    <div class="services-bar">
        <div class="container">
            <h1 class="py-4">{{trans('admin.departments')}}</h1>
            <!-- Services Section -->
            <div class="row">
 
           @foreach($departments as $department)
               <div class="col-lg-4 mb-4">
                    <div class="card h-100">
                        <div class="card-img">
                            <a href="{{url('/')}}/shop?id={{$department->id}}">
                            <img class="img-fluid" src="{{Storage::url($department->icon)}}" alt="" />
                            </a>
                        </div>
                        <div class="card-body">
                            <a href="{{url('/')}}/shop?id={{$department->id}}">
                            
                            <h4 class="card-header"> 

                  @if(session('lang')=='ar')
{{$department->dep_name_ar }}

@endif

  @if(session('lang')=='en')
{{$department->dep_name_en }}

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