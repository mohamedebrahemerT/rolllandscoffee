@extends('forentend.index')

@section('content')


<!-- Start all page -->
<div class="page-hf-banner">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h2>Testimonials</h2>
      </div>
    </div>
  </div>
  <div class="page-banner-breadcrumb">
    <div class="container">
      <div class="col-md-12">
        <ul class="breadcrumb">
          <li><a href="#">Home</a></li>
          <li class="active">Testimonials</li>
        </ul>
      </div>
    </div>
  </div>
</div>
<!-- End all page --> 

<!-- Start Testimonials-->
<div class="testimonials-main wow animated fadeIn">
  <div class="container">
    <div class="row">
      <div class="testimonials-title">
        <h2>how <span>Testimonials</span> will work.</h2>
        
      </div>
      <div class="testimonial-slider-a clearfix">
        <div class="col-md-12">
          <div id="testimonial-slider" class="owl-carousel">
          @foreach(App\Objectives::get() as $Obj)

            <div class="testimonial">
              <div class="pic"> <img src="{{url('/')}}/images/{{$Obj->photo}}" alt=""> </div>
              <div class="testimonial-review">
                <h4 class="testimonial-title">  {{$Obj->title_name_en}}  </h4>
                <p> {!! $Obj->Objectives_name_en !!}  </p>
              </div>
            </div>
            @endforeach
           
          </div>
        </div>
      </div>
      <div class="testimonial-slider-b clearfix">
        <div class="col-md-12">
          <div id="testimonial-slider-1" class="owl-carousel">
          @foreach(App\Objectives::get() as $Obj)

            <div class="testimonial-new-a">
              <div class="description">
                <p>{!! $Obj->Objectives_name_en !!}  </p>
              </div>
              <div class="testimonial-pic"> <img src="{{url('/')}}/images/{{$Obj->photo}}" alt=""> </div>
              <div class="testimonial-review">
                <h3 class="testimonial-title">{{$Obj->title_name_en}} </div>
            </div>
            @endforeach
             
          </div>
        </div>
      </div>
      <div class="testimonial-slider-c">
        <div class="content">
          <div class="slider single-item">
          @foreach(App\Objectives::get() as $Obj)

            <div class="quote-container">
              <div class="portrait octogon"> <img src="{{url('/')}}/images/{{$Obj->photo}}" alt="" /> </div>
              <div class="quote">
                <blockquote>
                  <p>{!! $Obj->Objectives_name_en !!}</p>
                  <cite> <span>{{$Obj->title_name_en}}</span> </blockquote>
              </div>
            </div>
            @endforeach


          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- End Testimonials --> 
@endsection
