 @extends('forentend.index')

@section('content')

 <!-- Start Feature-->
<div class="feature-main wow animated fadeIn">
  <div class="container">
    <div class="row">
      <div class="feature-title">
        <h2>Our <span>Features</span></h2>
         
      </div>
      <div class="feature-box-in clearfix">
        <div class="col-md-3 col-sm-3">
          <div class="iconright">
            <hr class="vertical-space">
            @foreach(App\product::take(3)->get() as $Features)
            <article class="feature-icon-box wow animated fadeInLeft" data-wow-duration="1.5s" data-wow-delay="0s">
              <div class="feature-icon"> <img src="{{url('/')}}/images/{{$Features->photo}}" alt="" /> </div>
              <h3>{{$Features->title_name_en}}</h3>
              <p>{{$Features->content_name_en}} </p>
                </article>

             @endforeach
            
          </div>
        </div>
        <div class="col-md-6 col-sm-6">
          <div class="single-image wow animated fadeInUp" data-wow-duration="1.5s" data-wow-delay=".5s"> <img src="{{url('/')}}/forentend/new/images/hosting-center-01.jpg" alt="" /> </div>
        </div>
        <div class="col-md-3 col-sm-3">
          <div class="iconleft wow animated fadeInRight" data-wow-duration="1.5s" data-wow-delay="0s">
            <hr class="vertical-space">
            @foreach(App\product::orderBy('id','desc')->take(3)->get() as $Features)

            <article class="text-left feature-icon-box wow animated fadeInRight" data-wow-duration="1.5s" data-wow-delay="0">
              <div class="feature-icon"> <img src="{{url('/')}}/images/{{$Features->photo}}" alt="" /> </div>
              <h3>{{$Features->title_name_en}}</h3>
              <p>{{$Features->content_name_en}} </p>
              </article>
             @endforeach

          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- End Feature -->

<div class="feature-list wow animated fadeIn">
  <div class="container">
    <div class="row">
        <div class="about-box-how clearfix">
        <div class="col-sm-6">
      <div class="about-w">
        <h2>
           @if(session('lang')=='ar')
                            {{WhoWeAre()->title_name_ar }}

                        @endif

                        @if(session('lang')=='en')
                            {{WhoWeAre()->title_name_en }}

                        @endif
        </h2>
        <div class="panel-group who-b" id="accordion" role="tablist" aria-multiselectable="true">
@php
 $Speed=App\WhoWeAre::where('id','=',4)->first();
 $Quality=App\WhoWeAre::where('id','=',5)->first();
 $Performance=App\WhoWeAre::where('id','=',6)->first();
@endphp
        <div class="panel panel-default">
          <div class="panel-heading active" role="tab" id="headingOne">
          <h4 class="panel-title"> <a role="button" data-toggle="collapse" data-parent="#accordion" href="{{url('/')}}/forentend/new/#collapseOne" aria-expanded="true" aria-controls="collapseOne"> <i class="more-less glyphicon glyphicon-plus"></i> 
@if(session('lang')=='ar')
                            {{$Speed->title_name_ar }}

                        @endif

                        @if(session('lang')=='en')
                            {{$Speed->title_name_en }}

                        @endif

           </a> </h4>
          </div>
          <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
          <div class="panel-body"> 
@if(session('lang')=='ar')
                            {!! $Speed->WhoWeAre_name_ar !!}

                        @endif

                        @if(session('lang')=='en')
                            {!! $Speed->WhoWeAre_name_en !!}

                        @endif

           </div>
          </div>
        </div>
      

        <div class="panel panel-default">
          <div class="panel-heading" role="tab" id="headingTwo">
          <h4 class="panel-title"> <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="{{url('/')}}/forentend/new/#collapseTwo" aria-expanded="false" aria-controls="collapseTwo"> <i class="more-less glyphicon glyphicon-plus"></i> @if(session('lang')=='ar')
                            {{$Quality->title_name_ar }}

                        @endif

                        @if(session('lang')=='en')
                            {{$Quality->title_name_en }}

                        @endif </a> </h4>
          </div>
          <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
          <div class="panel-body"> 
                        @if(session('lang')=='ar')
                            {!! $Quality->WhoWeAre_name_ar !!}

                        @endif

                        @if(session('lang')=='en')
                            {!! $Quality->WhoWeAre_name_en !!}

                        @endif
           </div>
          </div>
        </div>
        <div class="panel panel-default">
          <div class="panel-heading" role="tab" id="headingThree">
          <h4 class="panel-title"> <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="{{url('/')}}/forentend/new/#collapseThree" aria-expanded="false" aria-controls="collapseThree"> <i class="more-less glyphicon glyphicon-plus"></i> 
                        @if(session('lang')=='ar')

{{$Performance->title_name_ar }}

                        @endif

                        @if(session('lang')=='en')
                            {{$Performance->title_name_en }}

                        @endif 
           </a> </h4>
          </div>
          <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
          <div class="panel-body"> 


@if(session('lang')=='ar')
                            {!! $Performance->WhoWeAre_name_ar !!}

                        @endif

                        @if(session('lang')=='en')
                            {!! $Performance->WhoWeAre_name_en !!}

                        @endif
           </div>
          </div>
        </div>
        </div>
      </div>  
        </div>
        <div class="col-sm-6">
      <div class="about-w">
        <h2>Our Skills</h2>
        <div class="skills-b">
        <h3 class="progress-title">Marketing</h3>
        <div class="progress">
          <div class="progress-bar" style="width:65%; background:#5cb85c; color:#00a79c;">
          <div class="progress-value">65%</div>
          </div>
        </div>
        <h3 class="progress-title">Business</h3>
        <div class="progress">
          <div class="progress-bar" style="width:90%; background:#f0ad4e; color:#3498db;">
          <div class="progress-value">90%</div>
          </div>
        </div>
        <h3 class="progress-title">Great ideas</h3>
        <div class="progress">
          <div class="progress-bar" style="width:70%; background:#d9534f; color:#3498db;">
          <div class="progress-value">70%</div>
          </div>
        </div>
        <h3 class="progress-title">Awesomeness</h3>
        <div class="progress">
          <div class="progress-bar" style="width:85%; background:#5bc0de; color:#3498db;">
          <div class="progress-value">85%</div>
          </div>
        </div>
        </div>
      </div>  
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
