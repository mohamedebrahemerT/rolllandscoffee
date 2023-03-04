  
@extends('forentend.index')

@section('content')

 <br>
 

   <div id="wrapper" class="clearfix">
  <!-- Start main-content -->
  <div class="main-content">
    <!-- Section: home -->
    <section id="home">
        
      <!-- Slider Revolution Start -->
      <div class="rev_slider_wrapper">
        <div class="rev_slider" data-version="5.0">
          <ul>
             @foreach(App\Maincategories::where('page','Our Partners')->get() as  $Maincategoy )
           


                <!-- SLIDE 2 -->
            <li data-index="rs-{{$Maincategoy->id}}" data-transition="slidingoverlayhorizontal" data-slotamount="default" data-easein="default" data-easeout="default" data-masterspeed="default" data-thumb="{{url('/')}}/{{substr($Maincategoy->photo, -29) }}" data-rotate="0" data-saveperformance="off" data-title="Slide {{$Maincategoy->id}}" data-description="">
              <!-- MAIN IMAGE -->
              <img src="{{url('/')}}/{{substr($Maincategoy->photo, -29) }}"  alt=""  data-bgposition="center 40%" data-bgfit="cover" data-bgrepeat="no-repeat" class="rev-slidebg" data-bgparallax="10" data-no-retina>
              <!-- LAYERS -->

            

              <!-- LAYER NR. 2 -->
              <div class="tp-caption tp-resizeme text-uppercase bg-theme-colored-transparent text-white font-raleway pl-30 pr-30"
                id="rs-{{$Maincategoy->id}}-layer-2"

                data-x="['center']"
                data-hoffset="['0']"
                data-y="['middle']"
                data-voffset="['-20']"
                data-fontsize="['48']"
                data-lineheight="['70']"
                data-width="none"
                data-height="none"
                data-whitespace="nowrap"
                data-transform_idle="o:1;s:500"
                data-transform_in="y:100;scaleX:1;scaleY:1;opacity:0;"
                data-transform_out="x:left(R);s:1000;e:Power3.easeIn;s:1000;e:Power3.easeIn;"
                data-mask_in="x:0px;y:0px;s:inherit;e:inherit;"
                data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;"
                data-start="1000" 
                data-splitin="none" 
                data-splitout="none" 
                data-responsive_offset="on"
                style="z-index: 7; white-space: nowrap; font-weight:700; border-radius: 30px;">

                 @if(session('lang')=='ar')
                            {{$Maincategoy->title_name_ar }}

                        @endif

                        @if(session('lang')=='en')
                            {{$Maincategoy->title_name_en }}

                        @endif
              </div>

              <!-- LAYER NR. 3 -->
              <div class="tp-caption tp-resizeme text-white text-center" 
                id="rs-{{$Maincategoy->id}}-layer-3"

                data-x="['center']"
                data-hoffset="['0']"
                data-y="['middle']"
                data-voffset="['50']"
                data-fontsize="['16']"
                data-lineheight="['28']"
                data-width="none"
                data-height="none"
                data-whitespace="nowrap"
                data-transform_idle="o:1;s:500"
                data-transform_in="y:100;scaleX:1;scaleY:1;opacity:0;"
                data-transform_out="x:left(R);s:1000;e:Power3.easeIn;s:1000;e:Power3.easeIn;"
                data-mask_in="x:0px;y:0px;s:inherit;e:inherit;"
                data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;"
                data-start="1400" 
                data-splitin="none" 
                data-splitout="none" 
                data-responsive_offset="on"
                style="z-index: 5; white-space: nowrap; letter-spacing:0px; font-weight:400;">

               
                   @if(session('lang')=='ar')
                            {!! $Maincategoy->Maincategories_name_ar !!}

                        @endif

                        @if(session('lang')=='en')
                            {!! $Maincategoy->Maincategories_name_en !!}

                        @endif
             
              </div>

               
            </li>

         @endforeach
           

          </ul>
        </div>
        <!-- end .rev_slider -->
      </div>
     

    </section>

  
<div class="home-intro" id="home-intro" style="background: url(https://www.its.ws/PublishingImages/home-intro.png);
    background-color: rgba(0, 0, 0, 0);
    background-size: auto;
margin-bottom: 0;
position: relative;
text-align: center;
background-color: transparent;
border-top: 6px solid #c1c1c1;
height: 115px;
padding: 3px 0;
background-size: cover;">
    <div>
        <div class="container">
            <div class="owl-carousel owl-theme full-width owl-loaded owl-drag owl-carousel-init" data-plugin-options="{&quot;items&quot;: 1, &quot;loop&quot;: true, &quot;nav&quot;: false, &quot;dots&quot;: false ,&quot;autoplay&quot;:true}">


                
            <div class="owl-stage-outer"><div class="owl-stage"></div></div><div class="owl-nav disabled"><div class="owl-prev"></div><div class="owl-next"></div></div><div class="owl-dots disabled"></div></div>
        </div>
</div>
</div>
           

  </div>
  <!-- end main-content -->
  
</div>

  <!-- end here-->

<!-- full Title -->
    <div class="full-title" style="    padding: 100px 0px 0px 0px;
    background: url(../Ourparnter.png) no-repeat center;
        background-size: auto;
    position: relative;
}">
        <div class="container">
            <!-- Page Heading/Breadcrumbs -->
            <h1 class="mt-4 mb-3">        @if(session('lang')=='ar')
{{$Ourwork->title_name_ar }}

@endif

  @if(session('lang')=='en')
{{$Ourwork->title_name_en }}

@endif </h1>
            <div class="breadcrumb-main">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{url('/')}}">{{trans('admin.Home')}}</a>
                    </li>
                    <li class="breadcrumb-item active">         @if(session('lang')=='ar')
{{$Ourwork->title_name_ar }}

@endif

  @if(session('lang')=='en')
{{$Ourwork->title_name_en }}

@endif  </li>
                </ol>
            </div>
        </div>
    </div>


<!-- <div class="container">
             <a href="{{url('/')}}" class="btn btn-primary">{{trans('admin.back')}}</a>
    </div> -->



     <div class="services-bar">
        <div class="container">
             

            <h1 class="py-4">       @if(session('lang')=='ar')
{{$Ourwork->title_name_ar }}

@endif

  @if(session('lang')=='en')
{{$Ourwork->title_name_en }}

@endif </h1>
            <!-- Services Section -->

                  @if(session('lang')=='ar')

            <div class="row"  style="direction: rtl;">
@endif
 


                  @if(session('lang')=='en')
            
            <div class="row" >
@endif
 
               <div class="col-lg-3 mb-3">
        </div>
               <div class="col-lg-6 mb-6">
                    <div class="card h-100">
                        <div class="card-img">
                                   <a href="{{url('/')}}/WhyHonesty/{{$Ourwork->id }}">
                            <img class="img-fluid" src="{{url('/')}}/{{substr($Ourwork->photo, -29) }}" alt="" />
                            </a>
                        </div>
                        <div class="card-body">
                            <h href="">
                            
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
        <div class="col-lg-3 mb-3">
        </div>
              
          
              
             
            </div>
            <!-- /.row -->
        </div>
    </div>
     


     
@endsection