  <!-- Navigation -->

    <nav class="navbar navbar-expand-lg navbar-dark bg-light top-nav">

        <div class="container">

            <a class="navbar-brand" href="{{url('/')}}">

				<img src="{{Storage::url(settings()->siteflag)}}" alt="logo"  />

            </a>

            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">

				<span class="fas fa-bars"></span>

            </button>



            <div class="collapse navbar-collapse" id="navbarResponsive">

				<ul class="navbar-nav ml-auto">


 




					 
			 	<li class="nav-item">

		<a class="nav-link" href="{{url('/')}}/from"> استمارة تسجيل عملائنا</a>

					</li>

					<li class="nav-item">

		<a class="nav-link" href="{{url('/')}}/contact">{{trans('admin.Contact')}}</a>

					</li>
 


		  <li class="nav-item dropdown">

						<a class="nav-link" href="{{route('shop.index')}}" id="navbarDropdownPortfolio" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{trans('admin.departments')}} <i class="fas fa-sort-down"></i></a>

						<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownPortfolio">



							@foreach(Department() as $Department )

							<a class="dropdown-item" href="{{ route('shop.index',['id'=>$Department->id]) }}">

								  @if(session('lang')=='ar')

{{$Department->dep_name_ar }}



@endif



  @if(session('lang')=='en')

{{$Department->dep_name_en }}



@endif

							</a>

                              @endforeach



						 

						</div>

					</li>

					 





					<li class="nav-item dropdown">

						<a class="nav-link" href="#" id="navbarDropdownPortfolio" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{trans('admin.About')}} <i class="fas fa-sort-down"></i></a>

						<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownPortfolio">

							<a class="dropdown-item" href="{{url('/')}}/About">{{trans('admin.WhoWeAre')}}</a>



							<a class="dropdown-item" href="{{url('/')}}/VisionMission">{{trans('admin.VisionMission')}}</a>
 

						</div>

					</li>



					<li class="nav-item">

			<a class="nav-link active" href="{{url('/')}}">{{trans('admin.Home')}}</a>

					</li>






				</ul>

            </div>





        </div>

    </nav>