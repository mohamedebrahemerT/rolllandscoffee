



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



					 
<div class="col-lg-2 col-md-2 col-sm-2 col">
	
</div>


			 

				<div class="col-lg-10 col-md-10 col-sm-10 col">



					<h5 class="headin5_amrc col_white_amrc pt2">{{trans('admin.Followus')}}</h5>



					<!--headin5_amrc ends here-->

                             

					<ul class="footer_ul2_amrc iconffooter" >





						 <li style="margin-right: 5%"> 

						 	   <li style="margin-right: 7%"> 

					<a href="{{settings()->TwitterLink}}">

						<img src="{{url('/')}}/forentend/icon/twitter.png" width="50" height="50">

						

					</a>

				</li>

				  <li style="margin-right: 7%">  

					<a href="{{settings()->instagramLink}}">

						<img src="{{url('/')}}/forentend/icon/instagram.png" width="50" height="50">

						

					</a>

					</li>



<li style="margin-right: 7%"> 

					<a href="{{settings()->GmailLink}}" >

						<img src="{{url('/')}}/forentend/icon/youtube.png" width="50" height="50">

						

					</a>



					</li>

					<li style="margin-right: 7%">



					<a href="{{settings()->facebookLink}}">

						<img src="{{url('/')}}/forentend/icon/facebook.png" width="50" height="50" style="border-rrights:5%">

					</a>

					</li>

		        





				  

                	 

					</ul>



					<!--footer_ul2_amrc ends here-->



				</div>



<div class="col-lg-2 col-md-2 col-sm-2 col">
	
</div>



			 











			</div>



		</div>



         



    </footer>



    



</div>



	  



<!-- Bootstrap core JavaScript -->



<script src="{{url('/')}}/forentend/vendor/jquery/jquery.min.js"></script>



<script src="{{url('/')}}/forentend/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>



<script src="{{url('/')}}/forentend/js/imagesloaded.pkgd.min.js"></script>



<script src="{{url('/')}}/forentend/js/isotope.pkgd.min.js"></script>



<script src="{{url('/')}}/forentend/js/filter.js"></script>



<script src="{{url('/')}}/forentend/js/jquery.appear.js"></script>



<script src="{{url('/')}}/forentend/js/owl.carousel.min.js"></script>



<script src="{{url('/')}}/forentend/js/jquery.fancybox.min.js"></script>



<script src="{{url('/')}}/forentend/js/script.js"></script>

<script src="{{url('/')}}/forentend/js/jquery.zoom.min.js"></script>



 <script type="text/javascript">

 	

  // PRODUCT DETAILS SLICK

  $('#product-main-view').slick({

    infinite: true,

    speed: 300,

    dots: false,

    arrows: true,

    fade: true,

    asNavFor: '#product-view',

  });



  $('#product-view').slick({

    slidesToShow: 3,

    slidesToScroll: 1,

    arrows: true,

    centerMode: true,

    focusOnSelect: true,

    asNavFor: '#product-main-view',

  });



  // PRODUCT ZOOM

  $('#product-main-view .product-view').zoom();



  // PRICE SLIDER

  var slider = document.getElementById('price-slider');

  if (slider) {

    noUiSlider.create(slider, {

      start: [1, 999],

      connect: true,

      tooltips: [true, true],

      format: {

        to: function(value) {

          return value.toFixed(2) + '$';

        },

        from: function(value) {

          return value

        }

      },

      range: {

        'min': 1,

        'max': 999

      }

    });

  }



})(jQuery);



</script>

 



@stack('js')





<script type="text/javascript">(function () {
        var options = {
            whatsapp: "+966590968866", // WhatsApp number
            snapchat: " حلول", // Snapchat username
            sms: "+966590968866", // Sms phone number
            call: "+966590968866", // Call phone number
            company_logo_url: "https://rolllandscoffee.com//storage/app/public/settings/AG2RIedP2sFvheCakPYXHn8rfisShj7u2JlDyfyh.png", // URL of company logo (png, jpg, gif)
            greeting_message: " احجز الان ", // Text of greeting message
            call_to_action: "احجز الان", // Call to action
            button_color: "#1e91ce", // Color of button
            position: "left", // Position may be 'right' or 'left'
            order: "whatsapp", // Order of buttons
            ga: true, // Google Analytics enabled
            branding: true, // Show branding string
            mobile: true, // Mobile version enabled
            desktop: true, // Desktop version enabled
            greeting: false, // Greeting message enabled
            shift_vertical: 0, // Vertical position, px
            shift_horizontal: 0, // Horizontal position, px
            domain: "rowad-alkhaleej.edu.sa", // site domain
            key: "ORmspsJFSc--aYssQ1w5lQ", // pro-widget key
        };
        var proto = document.location.protocol, host = "whatshelp.io", url = proto + "//static." + host;
        var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true; s.src = url + '/widget-send-button/js/init.js';
        s.onload = function () { WhWidgetSendButton.init(host, proto, options); };
        var x = document.getElementsByTagName('script')[0]; x.parentNode.insertBefore(s, x);
    })();</script>




</body>



</html>