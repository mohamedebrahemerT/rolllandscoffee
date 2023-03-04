<!DOCTYPE html>



<html lang="en">



    <head>



        <meta charset="utf-8">



        <meta http-equiv="X-UA-Compatible" content="IE=edge">



        <meta name="viewport" content="width=device-width, initial-scale=1">



        



    <link rel="icon" type="image/ico" href="{{Storage::url(settings()->siteflag)}}" />
    

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



        @if($Department)
 <img src="{{ Storage::url($Department->icon2) }}" class="img-fluid">
@else
  <div class="full-title">

        <div class="container">

            <!-- Page Heading/Breadcrumbs -->

            <h1 class="mt-4 mb-3"> {{trans('admin.departments')}}</h1>

            <div class="breadcrumb-main">

                <ol class="breadcrumb">

                    <li class="breadcrumb-item">

                        <a href="index.html">{{trans('admin.Home')}}</a>

                    </li>

                    <li class="breadcrumb-item active">  {{trans('admin.departments')}} </li>

                </ol>

            </div>

        </div>

        

    </div>

@endif



        <!--================Categories Product Area =================-->



        <section class="categories_product_main p_80">



            <div class="container">



                <div class="categories_main_inner">



                    <div class="row">



                        <div class="col-lg-9">



                            



                            <div class="categories_product_area">



                                <div class="row">



           @foreach($products  as $product)

                                      



 <div class="col-lg-4 mb-4">

                    <div class="card h-100">

                        <div class="card-img">

                            <a href="{{url('/')}}/pen/{{$product->id}}">

                            <img class="img-fluid" src="{{Storage::url($product->photo)}}" alt="" />

                            </a>

                        </div>

                        <div class="card-body">

                            <a href="{{url('/')}}/pen/{{$product->id}}">

                            

                            <h6 class="card-header" style="text-align:center;"> 



                 @if(session('lang')=='ar')



{{$product->title_name_ar }}







@endif







  @if(session('lang')=='en')



{{$product->title_name_en }}







@endif 

            </h6>

                            </a>

                             

                        </div>

                    </div>

               </div>

 



                                          @endforeach 







                                   



                                



                                     



                                </div>



                                <nav aria-label="Page navigation example" class="pagination_area">



                                  <ul class="pagination">



          

             {{ $products->appends(request()->input())->links() }}



                                    



                                  </ul>



                                </nav>



                            </div>



                        </div>



                        <div class="col-lg-3">



                            <div class="categories_sidebar">



                               <aside class="l_widgest l_p_categories_widget">

                                    <div class="l_w_title">

                                        <h3> {{ $categoryName }}</h3>

                                    </div>

                                    <ul class="navbar-nav">



                                        

      @foreach($Departments as  $Department)

                                         



                                        <li class="nav-item dropdown">

                                            <a  href="{{ route('shop.index',['id'=>$Department->id]) }}" >

   @if(session('lang')=='ar')



 {{$Department->dep_name_ar }}



@endif



  @if(session('lang')=='en')

{{$Department->dep_name_en }}



@endif


 
 

                                            </a>

                 <ul class="dropdown-menu" aria-labelledby="navbarDropdown">

      @foreach(App\Department::where('parent',$Department->id)->get() as  $cc)



   <li class="nav-item"><a class="nav-link" 

    href="{{ route('shop.index',['id'=>$cc->id]) }}">



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



            <a href="{{url('/')}}/pen/{{$FeaturedProduct->id}}">







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



 


                                                 </a>



                                        </div>



                                    </div>



                                @endforeach



                                    







                                </aside>

                                

                            

                                

                              



                            </div>



                        </div>



                    </div>



                </div>



            </div>



        </section>



        <!--================End Categories Product Area =================-->



       



        

    <!-- Contact Us -->



    <div class="touch-line">



        <div class="container">



            <div class="row">



                <div class="col-md-8">



                   <p style="color: #fff">



           



            @if(session('lang')=='ar')

   ‏رولاندز كافيه || Rolllands Coffee جلسات خارجية قسم للافراد وقسم للعوائل مساحة الكافيه 1100متر نسعد بخدمتكم 



    @endif

    @if(session('lang')=='en')

If you have any questions or concerns regarding hayawe products, please contact us directly by attaching your name, email and the text of the message to be delivered to us.

    @endif



         </p>



                </div>



                <div class="col-md-4">



                   <a class="btn btn-lg btn-secondary btn-block" href="{{url('/')}}/contact"> {{trans('admin.Contact')}}</a>



                </div>



            </div>



        </div>



    </div>







 



    <!-- /.container -->



    <!--footer starts from here-->



    <footer class="footer">



        <div class="container bottom_border">



            <div class="row">



                     



             

                <div class="col-lg-12 col-md-12 col-sm-12 col">



                    <h5 class="headin5_amrc col_white_amrc pt2">{{trans('admin.Followus')}}</h5>



                    <!--headin5_amrc ends here-->

                             

                    <ul class="footer_ul2_amrc iconffooter" >





                         <li style="margin-right: 5%"> 

                               <li style="margin-right: 7%"> 

                    <a href="{{settings()->TwitterLink}}">

                        <img src="{{url('/')}}/forentend/icon/twitter.png" width="200" height="200">

                        

                    </a>

                </li>

                  <li style="margin-right: 7%">  

                    <a href="{{settings()->instagramLink}}">

                        <img src="{{url('/')}}/forentend/icon/instagram.png" width="200" height="200">

                        

                    </a>

                    </li>



<li style="margin-right: 7%"> 

                    <a href="{{settings()->GmailLink}}" >

                        <img src="{{url('/')}}/forentend/icon/youtube.png" width="200" height="200">

                        

                    </a>



                    </li>

                    <li style="margin-right: 7%">



                    <a href="{{settings()->facebookLink}}">

                        <img src="{{url('/')}}/forentend/icon/facebook.png" width="200" height="200" style="background-color:#fff;border-rrights:5%">

                    </a>

                    </li>

                





                  

                     

                    </ul>



                    <!--footer_ul2_amrc ends here-->



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