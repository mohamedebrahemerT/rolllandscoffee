 

 <div class="wrapper-main">

	<!-- Top Bar -->

	<div class="top-bar">

		<div class="container">

			<div class="row">

				<div class="col-lg-6">

					<div class="social-media">

						<ul>

		<li>



			<a href="{{settings()->facebookLink}}" target="_blank">

			<i class="fab fa-facebook-f" ></i>

		</a>

		</li>

		<li>

			<a href="{{settings()->TwitterLink}}" target="_blank"><i class="fab fa-twitter"></i></a>

		</li>

	<!--li>

		<a href="{{settings()->GmailLink}}" target="_blank"><i class="fab fa-google-plus-g"></i></a></li >

	<li>

		<a href="{{settings()->LinkedinLink}}" target="_blank"><i class="fab fa-linkedin-in"></i></a>

	</li -->

	<li>

		<a href="{{settings()->instagramLink}}" target="_blank"><i class="fab fa-instagram"></i></a>

	</li>

						</ul>

					</div>

				</div>

				<div class="col-lg-6">

					<div class="contact-details">

						<ul>

						 

							<li>



	@if(session('lang')=='ar')

		{{settings()->address_ar}}

		@endif

		@if(session('lang')=='en')

		{{settings()->address_en}}

		@endif

		<i class="fas fa-map-marker-alt"></i>

							 

							</li>

						</ul>

					</div>

				</div>

			</div>

		</div>

	</div>

