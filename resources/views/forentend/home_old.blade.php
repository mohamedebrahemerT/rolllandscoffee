

@extends('forentend.index')



@section('content')



  

      
           @foreach(App\Maincategories::get() as $slider)

  <img class="mySlides" src="{{Storage::url($slider->photo)}}" style="width:100%">
 
                    @endforeach
         

<script>

var myIndex = 0;

carousel();



function carousel() {

  var i;

  var x = document.getElementsByClassName("mySlides");

  for (i = 0; i < x.length; i++) {

    x[i].style.display = "none";  

  }

  myIndex++;

  if (myIndex > x.length) {myIndex = 1}    

  x[myIndex-1].style.display = "block";  

  setTimeout(carousel, 2000); // Change image every 2 seconds

}

</script>

 

	

    <!-- Page Content -->

    <div class="container">        

        <!-- About Section -->

       

	    <div class="services-bar">

        <div class="container">

            <h1 class="py-4">{{trans('admin.departments')}}</h1>

            <!-- Services Section -->

            <div class="row">

 

           @foreach($departments as $department)

               <div class="col-lg-4 mb-4">

                    <div class="card h-100">

                        <div class="card-img">

                            <a href="{{url('/')}}/shop?id={{$department->id}} ">

                            <img class="img-fluid" src="{{Storage::url($department->icon)}}" alt="" />

                            </a>

                        </div>

                        <div class="card-body">

                            <a href="{{url('/')}}/shop?id={{$department->id}}">

                            

                            <h4 class="card-header"> 



                  @if(session('lang')=='ar')

{{$department->dep_name_ar }}



@endif



  @if(session('lang')=='en')

{{$department->dep_name_en }}



@endif 

            </h4>

                            </a>

                             

                        </div>

                    </div>

               </div>

           @endforeach



           <div class="container">

  <div class="row">

    <div class="col text-center">

       <a  class="btn btn-success" href="{{url('/')}}/shop" style="text-align: center;background-color: #fbb745">{{trans('admin.more')}}</a> 

    </div>

  </div>

</div>

              

            

          

              

             

            </div>

            <!-- /.row -->

        </div>

    </div>



     <!--div class="services-bar">

        <div class="container">

            <h1 class="py-4">{{trans('admin.Pictures')}}</h1>

        

            <div class="row">

  

               <div class="col-lg-4 mb-4">

                    <div class="card h-100">

                        <div class="card-img">

                         

                            <img class="img-fluid" src="{{url('/')}}/forentend/photos/menu-image1.jpg" alt="" />

                            

                        </div>

                       

                    </div>

               </div>



                 <div class="col-lg-4 mb-4">

                    <div class="card h-100">

                        <div class="card-img">

                         

                            <img class="img-fluid" src="{{url('/')}}/forentend/photos/menu-image2.jpg" alt="" />

                            

                        </div>

                       

                    </div>

               </div>

        



 

                 <div class="col-lg-4 mb-4">

                    <div class="card h-100">

                        <div class="card-img">

                         

                            <img class="img-fluid" src="{{url('/')}}/forentend/photos/menu-image3.jpg" alt="" />

                            

                        </div>

                       

                    </div>

               </div>





                <div class="col-lg-4 mb-4">

                    <div class="card h-100">

                        <div class="card-img">

                         

                            <img class="img-fluid" src="{{url('/')}}/forentend/photos/menu-image4.jpg" alt="" />

                            

                        </div>

                       

                    </div>

               </div>



                   <div class="col-lg-4 mb-4">

                    <div class="card h-100">

                        <div class="card-img">

                         

                            <img class="img-fluid" src="{{url('/')}}/forentend/photos/menu-image5.jpg" alt="" />

                            

                        </div>

                       

                    </div>

               </div>



                     <div class="col-lg-4 mb-4">

                    <div class="card h-100">

                        <div class="card-img">

                         

                            <img class="img-fluid" src="{{url('/')}}/forentend/photos/menu-image6.jpg" alt="" />

                            

                        </div>

                       

                    </div>

               </div>

        



        

            

          

              

             

            </div>

       

        </div>

    </div -->

    </div>

		

	 

 

@endsection