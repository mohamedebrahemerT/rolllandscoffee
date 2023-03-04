<!DOCTYPE html>

<html lang="en">

    <head>

        <meta charset="utf-8">

        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <meta name="viewport" content="width=device-width, initial-scale=1">

        

        <link rel="icon" href="{{url('/')}}/forentend/outsourse/img/fav-icon.png" type="image/x-icon" />

        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

        <title>@if(session('lang')=='ar')

                {{settings()->namear}}

                @endif

                @if(session('lang')=='en')

                {{settings()->nameaen}}

                @endif </title>



        <!-- Icon css link -->

        <link href="{{url('/')}}/forentend/outsourse/css/font-awesome.min.css" rel="stylesheet">

        <link href="{{url('/')}}/forentend/outsourse/vendors/line-icon/css/simple-line-icons.css" rel="stylesheet">

        <link href="{{url('/')}}/forentend/outsourse/vendors/elegant-icon/style.css" rel="stylesheet">

        <!-- Bootstrap -->

        <link href="{{url('/')}}/forentend/outsourse/css/bootstrap.min.css" rel="stylesheet">

        

        <!-- Rev slider css -->

        <link href="{{url('/')}}/forentend/outsourse/vendors/revolution/css/settings.css" rel="stylesheet">

        <link href="{{url('/')}}/forentend/outsourse/vendors/revolution/css/layers.css" rel="stylesheet">

        <link href="{{url('/')}}/forentend/outsourse/vendors/revolution/css/navigation.css" rel="stylesheet">

        

        <!-- Extra plugin css -->

        <link href="{{url('/')}}/forentend/outsourse/vendors/owl-carousel/owl.carousel.min.css" rel="stylesheet">

        <link href="{{url('/')}}/forentend/outsourse/vendors/bootstrap-selector/css/bootstrap-select.min.css" rel="stylesheet">

        <link href="{{url('/')}}/forentend/outsourse/vendors/jquery-ui/jquery-ui.css" rel="stylesheet">

        

        <link href="{{url('/')}}/forentend/outsourse/css/style.css" rel="stylesheet">

        <link href="{{url('/')}}/forentend/outsourse/css/responsive.css" rel="stylesheet">



         <link rel="stylesheet" href="http://fonts.googleapis.com/earlyaccess/droidarabickufi.css">

    </head>

    <body style="font-family: font-family: 'Droid Arabic Kufi', sans-serif;">

        

@include('forentend.layouts.header')

@include('forentend.layouts.navbar')

@include('forentend.layouts.menue')

@include('forentend.layouts.message')

        

       



    @isset($Department)



@endisset

   <div class="full-title">
        <div class="container">
            <!-- Page Heading/Breadcrumbs -->
            <h1 class="mt-4 mb-3"> {{trans('admin.services')}}</h1>
            <div class="breadcrumb-main">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="index.html">{{trans('admin.Home')}}</a>
                    </li>
                    <li class="breadcrumb-item active">  {{trans('admin.services')}} </li>
                </ol>
            </div>
        </div>
        
    </div>
 
        
        <!--================Categories Product Area =================-->
        <section class="categories_product_main p_80">
            <div class="container">
                <div class="categories_main_inner">
                    <div class="row row_disable">
                             <div class="col-lg-3 float-md-right">
                            <div class="categories_sidebar">
                                <aside class="l_widgest l_p_categories_widget">
                                    <div class="l_w_title">
                                        <h3>{{ $categoryName }}</h3>
                                    </div>
                                    <ul class="navbar-nav">
                                        
      @foreach($Departments as  $Department)

                                        <li class="nav-item dropdown">
                                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            @if(session('lang')=='ar')

 {{$Department->dep_name_ar }}

@endif

  @if(session('lang')=='en')
{{$Department->dep_name_en }}

@endif
                                            <i class="icon_plus" aria-hidden="true"></i>
                                            <i class="icon_minus-06" aria-hidden="true"></i>
                                            </a>
                                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">

      @foreach(App\Department::where('parent',$Department->id)->get() as  $cc)

                                                <li class="nav-item"><a class="nav-link" href="{{ route('shop.index',['id'=>$cc->id]) }}">
                                                    @if(session('lang')=='ar')
   <span style="text-align: right;">
 {{$cc->dep_name_ar }}
 </span>

@endif

  @if(session('lang')=='en')
{{$cc->dep_name_en }}

@endif
                                                </a></li>
                                          @endforeach 

                                                
                                            </ul>
                                        </li>
                                          @endforeach 

                                        
                                    </ul>
                                </aside>
                               
                                
                                <aside class="l_widgest l_feature_widget">
                                    <div class="l_w_title">
                <h3>{{trans('admin.FeaturedProducts')}} </h3>
                                        
                                    </div>
                         @foreach($FeaturedProducts as  $FeaturedProduct)

                                    <div class="media">
                                        <div class="d-flex">
                                           
                                            <img src="{{ Storage::url($FeaturedProduct->photo) }}" alt="" width="100" height="100">
                                        </div>
                                        <div class="media-body">
                                            <h4>
                                                
                                                 @if(session('lang')=='ar')



         {{$FeaturedProduct->title_name_ar }}



@endif



  @if(session('lang')=='en')

{{$FeaturedProduct->title_name_en }}

@endif
                                            </h4>
                                          
                                        </div>
                                    </div>

                                @endforeach

                                    
                                </aside>
                            </div>
                        </div>
                        <div class="col-lg-9 float-md-right">
                          
                            <div class="categories_product_area">
                                <div class="row">
           @foreach($products  as $product)

                                    <div class="col-lg-4 col-sm-6">
                                        <div class="l_product_item">
                                            <div class="l_p_img">
                         <a href="{{url('/')}}/pen/{{$product->id}}">

               <img src="{{Storage::url($product->photo)}}" alt="" height="400">
                                                </a>
                                                  <h5 class="new">  
   @if(session('lang')=='ar')

{{$product->title_name_ar }}



@endif



  @if(session('lang')=='en')

{{$product->title_name_en }}



@endif 
                                    </h5>
                                            </div>
                                            
                                        </div>
                                    </div>
                                          @endforeach 
                                    
                                </div>
                                <nav aria-label="Page navigation example" class="pagination_area">
                                  <ul class="pagination">
            {{ $products->links() }}
                                  
                                  </ul>
                                </nav>
                            </div>
                        </div>

                   
                    </div>
                </div>
            </div>
        </section>
        <!--================End Categories Product Area =================-->
        
    
                

    <footer class="footer">

        <div class="container bottom_border">

            <div class="row">

                    <div class="col-lg-3 col-md-6 col-sm-6 ">

                    <div class="news-box">

                          <a href="{{url('/')}}">

                <img src="" alt="logo" />

            </a>

                        <h5 class="headin5_amrc col_white_amrc pt2">{{trans('admin.Subscribe')}}</h5>

                        <p>{{trans('admin.Subscribe2')}}</p>

                        <form action="#">

                            <div class="input-group">

                                <input class="form-control" placeholder="{{trans('admin.email')}}" type="text">

                                <span class="input-group-btn">

                                  <button class="btn btn-secondary" type="button">{{trans('admin.Subscribe')}}!</button>

                                </span>

                            </div>

                        </form>

                    </div>

                </div>

                <div class="col-lg-3 col-md-6 col-sm-6">

                    <h5 class="headin5_amrc col_white_amrc pt2">{{trans('admin.Quicklinks')}} </h5>

                    <!--headin5_amrc-->

                    <ul class="footer_ul_amrc">

                        <li><a href="{{url('/')}}"><i class="fas fa-long-arrow-alt-right"></i>{{trans('admin.Home')}}</a></li>

                        <li><a href="{{url('/')}}/About"><i class="fas fa-long-arrow-alt-right"></i> {{trans('admin.About')}}  </a></li>

                        <li><a href="{{url('/')}}/Services"><i class="fas fa-long-arrow-alt-right"></i>   {{trans('admin.services')}} </a></li>

                        <li><a href="#"><i class="fas fa-long-arrow-alt-right"></i>About Us</a></li>

                        <li><a href="{{url('/')}}/newess"><i class="fas fa-long-arrow-alt-right"></i> {{trans('admin.Blog')}}  </a></li>

                        <li><a href="{{url('/')}}/contact"><i class="fas fa-long-arrow-alt-right"></i>{{trans('admin.Contact')}}</a></li>

                    </ul>

                    <!--footer_ul_amrc ends here-->

                </div>

                <div class="col-lg-3 col-md-6 col-sm-6 col">

                    <h5 class="headin5_amrc col_white_amrc pt2">{{trans('admin.Followus')}}</h5>

                    <!--headin5_amrc ends here-->

                    <ul class="footer_ul2_amrc">

                        <li>

                            <a href="{{settings()->facebookLink}}">

                                <i class="fab fa-facebook fleft padding-right"></i>

                                 </a>

                            <p>

                                {{trans('admin.facebookLink')}}

                                <a href="{{settings()->facebookLink}}"> {{settings()->facebookLink}}</a>

                            </p>

                        </li>



                        <li>

                            <a href="{{settings()->TwitterLink}}">

                                <i class="fab fa-twitter fleft padding-right"></i>

                                 </a>

                            <p>

                                {{trans('admin.TwitterLink')}}

                                <a href="{{settings()->TwitterLink}}">  {{settings()->TwitterLink}}</a>

                            </p>

                        </li>



                        <li>

                            <a href="{{settings()->GmailLink}}">

                                <i class="fab fa-youtube fleft padding-right"></i>

                                 </a>

                            <p>

                                {{trans('admin.GmailLink')}}

                                <a href="{{settings()->GmailLink}}">    {{settings()->GmailLink}}</a>

                            </p>

                        </li>



                        <li>

                            <a href="{{settings()->LinkedinLink}}">

                                <i class="fab fa-linkedin fleft padding-right"></i>

                                 </a>

                            <p>

                                {{trans('admin.LinkedinLink')}}

                                <a href="{{settings()->LinkedinLink}}"> {{settings()->LinkedinLink}}</a>

                            </p>

                        </li>



                            <li>

                            <a href="{{settings()->instagramLink}}">

                                <i class="fab fa-instagram fleft padding-right"></i>

                                 </a>

                            <p>

                                {{trans('admin.instagramLink')}}

                                <a href="{{settings()->instagramLink}}">    {{settings()->instagramLink}}</a>

                            </p>

                        </li>

                         



                         

                    </ul>

                    <!--footer_ul2_amrc ends here-->

                </div>



                <div class="col-lg-3 col-md-6 col-sm-6 col">

                    <h5 class="headin5_amrc col_white_amrc pt2">

                     @if(session('lang')=='ar')

{{WhoWeAre()->title_name_ar }}



@endif



  @if(session('lang')=='en')

{{WhoWeAre()->title_name_en }}



@endif

                </h5>

                    <!--headin5_amrc-->

                    <p class="mb10">

                       @if(session('lang')=='ar')

{{WhoWeAre()->WhoWeAre_name_ar }}



@endif



  @if(session('lang')=='en')

{{WhoWeAre()->WhoWeAre_name_en }}



@endif

                </p>

                    <!--ul class="footer-social">

                        <li>

                            <a class="facebook hb-xs-margin" href="{{settings()->facebookLink}}">

                                <span class="hb hb-xs spin hb-facebook">

                                    <i class="fab fa-facebook-f"></i>

                                </span>

                            </a>

                        </li>

                        <li>

                            <a class="twitter hb-xs-margin" href="{{settings()->TwitterLink}}"><span class="hb hb-xs spin hb-twitter"><i class="fab fa-twitter"></i></span></a>

                        </li>

                        <li>

                            <a class="instagram hb-xs-margin" href="{{settings()->instagramLink}}"><span class="hb hb-xs spin hb-instagram"><i class="fab fa-instagram"></i></span></a>

                        </li>

                        <li>

                            <a class="googleplus hb-xs-margin" href="{{settings()->GmailLink}}"><span class="hb hb-xs spin hb-google-plus"><i class="fab fa-google-plus-g"></i></span></a>

                        </li>

                     

                    </ul -->

                </div>  



            





            </div>

        </div>

         

    </footer>

    

</div>

    
 
        

        

        

        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->

        <script src="{{url('/')}}/forentend/outsourse/js/jquery-3.2.1.min.js"></script>

        <!-- Include all compiled plugins (below), or include individual files as needed -->

        <script src="{{url('/')}}/forentend/outsourse/js/popper.min.js"></script>

        <script src="{{url('/')}}/forentend/outsourse/js/bootstrap.min.js"></script>

        <!-- Rev slider js -->

        <script src="{{url('/')}}/forentend/outsourse/vendors/revolution/js/jquery.themepunch.tools.min.js"></script>

        <script src="{{url('/')}}/forentend/outsourse/vendors/revolution/js/jquery.themepunch.revolution.min.js"></script>

        <script src="{{url('/')}}/forentend/outsourse/vendors/revolution/js/extensions/revolution.extension.actions.min.js"></script>

        <script src="{{url('/')}}/forentend/outsourse/vendors/revolution/js/extensions/revolution.extension.video.min.js"></script>

        <script src="{{url('/')}}/forentend/outsourse/vendors/revolution/js/extensions/revolution.extension.slideanims.min.js"></script>

        <script src="{{url('/')}}/forentend/outsourse/vendors/revolution/js/extensions/revolution.extension.layeranimation.min.js"></script>

        <script src="{{url('/')}}/forentend/outsourse/vendors/revolution/js/extensions/revolution.extension.navigation.min.js"></script>

        <script src="{{url('/')}}/forentend/outsourse/vendors/revolution/js/extensions/revolution.extension.slideanims.min.js"></script>

        <!-- Extra plugin css -->

        <script src="{{url('/')}}/forentend/outsourse/vendors/counterup/jquery.waypoints.min.js"></script>

        <script src="{{url('/')}}/forentend/outsourse/vendors/counterup/jquery.counterup.min.js"></script>

        <script src="{{url('/')}}/forentend/outsourse/vendors/owl-carousel/owl.carousel.min.js"></script>

        <script src="{{url('/')}}/forentend/outsourse/vendors/bootstrap-selector/js/bootstrap-select.min.js"></script>

        <script src="{{url('/')}}/forentend/outsourse/vendors/image-dropdown/jquery.dd.min.js"></script>

        <script src="{{url('/')}}/forentend/outsourse/js/smoothscroll.js"></script>

        <script src="{{url('/')}}/forentend/outsourse/vendors/isotope/imagesloaded.pkgd.min.js"></script>

        <script src="{{url('/')}}/forentend/outsourse/vendors/isotope/isotope.pkgd.min.js"></script>

        <script src="{{url('/')}}/forentend/outsourse/vendors/magnify-popup/jquery.magnific-popup.min.js"></script>

        <script src="{{url('/')}}/forentend/outsourse/vendors/vertical-slider/js/jQuery.verticalCarousel.js"></script>

        <script src="{{url('/')}}/forentend/outsourse/vendors/jquery-ui/jquery-ui.js"></script>

        

        <script src="{{url('/')}}/forentend/outsourse/js/theme.js"></script>

    </body>

</html>