 

@extends('forentend.index')



@section('content')



 <img src="{{url('/')}}/forentend/images/all-title-bg.jpg" class="img-fluid">

 <div class="container">

             <a href="{{url('/')}}" class="btn btn-primary">{{trans('admin.back')}}</a>

    </div>

    <div class="container">

        <!-- About Content -->

        <div class="about-main">

            <div class="row">

                <div class="col-lg-6">

                    <img class="img-fluid rounded mb-4" src="{{Storage::url($WhoWeAre->photo)}}" alt="" />

                </div>

                <div class="col-lg-6">

                    <h2>



@if(session('lang')=='ar')

{{$WhoWeAre->title_name_ar }}



@endif



  @if(session('lang')=='en')

{{$WhoWeAre->title_name_en }}



@endif 

                        </h2>

                    <p>

                    

@if(session('lang')=='ar')

{{$WhoWeAre->WhoWeAre_name_ar }}



@endif



  @if(session('lang')=='en')

{{$WhoWeAre->WhoWeAre_name_en }}



@endif 

                </p>

                   

                </div>

            </div>

            <!-- /.row -->

        </div>

    </div>

    

   

    

    

     

@endsection