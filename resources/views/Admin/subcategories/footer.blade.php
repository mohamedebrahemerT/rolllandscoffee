   <footer class="footer">

        <div class="container">

            <div class="row">

                <div class="col-md-4 col-sm-4 col-xs-12">

                    <div class="widget clearfix">

                        <div class="widget-title">


                          @if(session('lang')=='ar')

                            <img src="{{url('/')}}/forentend/images/logos/052f4f18e9.png" alt="" width="280px" />

                          @endif


                           @if(session('lang')=='en')

                            <img src="{{url('/')}}/forentend/images/logos/english.jpg" alt="" width="280px" />

                          @endif

                          

                        </div>

                       {{trans('admin.space')}}

                       

                    </div><!-- end clearfix -->

                </div><!-- end col -->



				<div class="col-md-4 col-sm-4 col-xs-12">

                    <div class="widget clearfix">

                        <div class="widget-title">

                            <h3>{{trans('admin.Pages')}}</h3>

                        </div>



                        <ul class="footer-links hov">

                            <li><a href="http://ac4mt.org">{{trans('admin.Home')}} <span class="icon icon-arrow-right2"></span></a></li>

							<li><a href="http://ac4mt.org/Oscar/AboutUs">{{trans('admin.Aboutus')}}<span class="icon icon-arrow-right2"></span></a></li>

							<li><a href="http://ac4mt.org/Oscar/Portfolio">{{trans('admin.media')}}<span class="icon icon-arrow-right2"></span></a></li>

							<li><a href="http://ac4mt.org/Oscar/Pricing">{{trans('admin.applynow')}}<span class="icon icon-arrow-right2"></span></a></li>

							<li><a href="http://ac4mt.org/Oscar/votnowmaincat">{{trans('admin.votnowmaincat')}} <span class="icon icon-arrow-right2"></span></a></li>

							<li><a href="http://ac4mt.org/Oscar/PrevPrize">{{trans('admin.PrevPrize2')}}<span class="icon icon-arrow-right2"></span></a></li>

                        </ul><!-- end links -->

                    </div><!-- end clearfix -->

                </div><!-- end col -->

				

                <div class="col-md-4 col-sm-4 col-xs-12">

                    <div class="footer-distributed widget clearfix">

                        <div class="widget-title">

                            <h3>{{trans('admin.Subscribe')}}</h3>

							<p>{{trans('admin.fo2')}}</p>

                        </div>

						

						<div class="footer-right">
                       {{trans('admin.space')}}

							 

						</div>                        

                    </div><!-- end clearfix -->

                </div><!-- end col -->

            </div><!-- end row -->

        </div><!-- end container -->

    </footer><!-- end footer -->



    <div class="copyrights">

        <div class="container">

            <div class="footer-distributed">

                <div class="footer-left">                   

                    <p class="footer-company-name">{{trans('admin.fo3')}}   <a href="#">{{trans('admin.center2')}}</a>   </a></p>

                </div>



                

            </div>

        </div><!-- end container -->

    </div><!-- end copyrights -->



    <a href="#" id="scroll-to-top" class="dmtop global-radius"><i class="fa fa-angle-up"></i></a>



    <!-- ALL JS FILES -->

    <script src="{{url('/')}}/forentend/js/all.js"></script>

    <!-- ALL PLUGINS -->

    <script src="{{url('/')}}/forentend/js/custom.js"></script>

    <script src="{{url('/')}}/forentend/js/portfolio.js"></script>

    <script src="{{url('/')}}/forentend/js/hoverdir.js"></script> 

    



    <script src="{{url('/')}}/forentend/js/jssocials.min.js"></script> 

  



       <script type="text/javascript">

         

         $("#shareRoundIcons").jsSocials({

    showLabel: false,

    showCount: false,

    shares: ["email", "twitter", "facebook", "googleplus", "linkedin", "pinterest", "stumbleupon", "whatsapp"]

});





       </script>



    <script>

// Set the date we're counting down to

var countDownDate = new Date("Nov 20, 2019 15:37:25").getTime();



// Update the count down every 1 second

var x = setInterval(function() {



  // Get today's date and time

  var now = new Date().getTime();



  // Find the distance between now and the count down date

  var distance = countDownDate - now;



  // Time calculations for days, hours, minutes and seconds

  var days = Math.floor(distance / (1000 * 60 * 60 * 24));

  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));

  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));

  var seconds = Math.floor((distance % (1000 * 60)) / 1000);



  // Display the result in the element with id="demo"

 // document.getElementById("demo").innerHTML = days + "ي " + hours + "س "

 // + minutes + "د " + seconds + "ث ";



    document.getElementById("demo").innerHTML =  "ي " +days +  "س " +hours 

   + "د " + minutes+ "ث " +seconds ;



  // If the count down is finished, write some text

  if (distance < 0) {

    clearInterval(x);

    document.getElementById("demo").innerHTML = "EXPIRED";

  }

}, 1000);

</script>  





  <script>

// Set the date we're counting down to

var countDownDate = new Date("Dec 20, 2019 15:37:25").getTime();



// Update the count down every 1 second

var x = setInterval(function() {



  // Get today's date and time

  var now = new Date().getTime();



  // Find the distance between now and the count down date

  var distance = countDownDate - now;



  // Time calculations for days, hours, minutes and seconds

  var days = Math.floor(distance / (1000 * 60 * 60 * 24));

  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));

  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));

  var seconds = Math.floor((distance % (1000 * 60)) / 1000);



  // Display the result in the element with id="demo"

  document.getElementById("demo2").innerHTML = days + "ي " + hours + "س "

  + minutes + "د " + seconds + "ث ";



  // If the count down is finished, write some text

  if (distance < 0) {

    clearInterval(x);

    document.getElementById("demo2").innerHTML = "EXPIRED";

  }

}, 1000);

</script>  



 @stack('js')





</body>

</html>