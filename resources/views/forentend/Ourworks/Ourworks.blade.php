 
@extends('forentend.index')

@section('content')
 
    
    <section id="top_banner">
        <div class="banner">
            <div class="inner text-center">
                <h2>{{trans('admin.Ourworks1')}}</h2>
            </div>
        </div>
        <div class="page_info">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-sm-8 col-xs-6">
                        <h4>{{trans('admin.Ourworks')}}</h4>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-6" style="text-align:right;">{{trans('admin.Home')}}<span class="sep"> / </span><span class="current">{{trans('admin.Ourworks')}}</span></div>
                </div>
            </div>
        </div>

        </div>
    </section>



    <section id="portfolio">
        <div class="container">
            <div class="row">
                <div class="section-heading text-center">
                    <div class="col-md-12 col-xs-12">
                        <h1>{{trans('admin.Ourworks3')}} <span>{{trans('admin.Ourworks4')}}</span></h1>
                        <p class="subheading">
                            {{trans('admin.Ourworks5')}}
                        </p>
                    </div>
                </div>
            </div>
            <div class="row">

  @foreach($Ourworks as  $Ourwork)

  <a  href="{!! $Ourwork->title_name_ar !!}">

                <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 portfolio-item">
                    <div class="portfolio-one">
                        <div class="portfolio-head">
                            <div class="portfolio-img">
             <img alt="" src="{{Storage::url($Ourwork->photo)}}">
                            </div>
                            <div class="portfolio-hover">
    <a class="portfolio-link" href="{!! $Ourwork->title_name_ar !!}"><i class="fa fa-link"></i></a>
  <a class="portfolio-zoom" href="{!! $Ourwork->title_name_ar !!}"><i class="fa fa-search"></i></a>
                            </div>
                        </div>
                        <!-- End portfolio-head -->
                        <div class="portfolio-content">
                            <h5 class="title">
   @if(session('lang')=='ar')
{{$Ourwork->Ourworks_name_ar }}

@endif

  @if(session('lang')=='en')
{{$Ourwork->Ourworks_name_en }}

@endif
                        </h5>
                            <p>

                            </p>
                        </div>
                        <!-- End portfolio-content -->
                    </div>
                    <!-- End portfolio-item -->
                </div>

</a>

                                      @endforeach
        

            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination pagination-lg justify-content-end">
                            <li class="page-item">

                    <?php  echo $Ourworks->render();?>

                            </li>
                        </ul>
                    </nav>

                </div>
            </div>

            </div>
          <!---------------------------------------->

        </div>



    </section>


 
@endsection