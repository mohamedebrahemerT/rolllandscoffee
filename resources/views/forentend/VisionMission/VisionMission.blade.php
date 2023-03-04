 

@extends('forentend.index')



@section('content')



 <img src="{{url('/')}}/forentend/images/all-title-bg.jpg" class="img-fluid">
 



 <div class="container">

             <a href="{{url('/')}}" class="btn btn-primary">{{trans('admin.back')}}</a>

    </div>

    

    <div class="about-inner">

        <div class="container">

            <div class="row mb-4">

                <div class="col-lg-6">

                    <div class="left-ab">

                        <h3 style="color:#E9C10C">



@if(session('lang')=='ar')

{{$Vision->title_name_ar }}



@endif



  @if(session('lang')=='en')

{{$Vision->title_name_en }}



@endif 

                       



                    </h3>

                        <p>

                             

@if(session('lang')=='ar')

{{$Vision->VisionMission_name_ar }}



@endif



  @if(session('lang')=='en')

{{$Vision->VisionMission_name_en }}



@endif 

                    </p>

                       

                    </div>

                </div>

                <div class="col-lg-6">

                    <div class="right-ab">

                        <img class="img-fluid rounded mb-4" src="{{Storage::url($Vision->photo)}}" alt="" />

                    </div>

                </div>

            </div>

            

        </div>

    </div>

    





    <!------------------------------------------->



     <div class="about-inner">

        <div class="container">

            <div class="row mb-4">

                <div class="col-lg-6">

                    <div class="left-ab">

                        <h3 style="color:#E9C10C">



@if(session('lang')=='ar')

{{$Mission->title_name_ar }}



@endif



  @if(session('lang')=='en')

{{$Mission->title_name_en }}



@endif 

                       



                    </h3>

                        <p>

                             

@if(session('lang')=='ar')

{{$Mission->VisionMission_name_ar }}



@endif



  @if(session('lang')=='en')

{{$Mission->VisionMission_name_en }}



@endif 

                    </p>

                       

                    </div>

                </div>

                <div class="col-lg-6">

                    <div class="right-ab">

                        <img class="img-fluid rounded mb-4" src="{{Storage::url($Mission->photo)}}" alt="" />

                    </div>

                </div>

            </div>

            

        </div>

    </div>

    

    

    

     

@endsection