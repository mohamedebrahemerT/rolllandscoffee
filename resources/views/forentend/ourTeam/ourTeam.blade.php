 
@extends('forentend.index')

@section('content')


<!-- full Title -->
    <div class="full-title">
        <div class="container">
            <!-- Page Heading/Breadcrumbs -->
            <h1 class="mt-4 mb-3"> {{trans('admin.ourTeam')}}</h1>
            <div class="breadcrumb-main">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="index.html">{{trans('admin.Home')}}</a>
                    </li>
                    <li class="breadcrumb-item active">  {{trans('admin.ourTeam')}} </li>
                </ol>
            </div>
        </div>
    </div>
 <div class="container">
             <a href="{{url('/')}}" class="btn btn-primary">{{trans('admin.back')}}</a>
    </div>
   
    
    <div class="container">
 
        <div class="team-members-box">  
            <h2>{{trans('admin.ourTeam')}}   </h2>
            <div class="row">
  @foreach($ourTeams as  $ourTeam)

                <div class="col-lg-4 mb-4">
                    <div class="card h-100 text-center">
                        <div class="our-team">
                            <img class="img-fluid" src="{{Storage::url($ourTeam->photo)}}" alt="" />
                            <div class="team-content">
                                <h3 class="title">
                      
 @if(session('lang')=='ar')
{{$ourTeam->name_name_ar }}

@endif

  @if(session('lang')=='en')
{{$ourTeam->name_name_en }}

@endif

                            </h3>
                                <span class="post">
                                    @if(session('lang')=='ar')
{{$ourTeam->jobTitle_name_ar }}

@endif

  @if(session('lang')=='en')
{{$ourTeam->jobTitle_name_en }}

@endif   
                            </span>
                                <ul class="social">
                                    <li><a href="#"><i class="fab fa-facebook"></i></a></li>
                                    <li><a href="#"><i class="fab fa-google-plus"></i></a></li>
                                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fab fa-linkedin"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                  @endforeach

             
            </div>
            </row>
        </div>


    </div>
    
    
     
@endsection