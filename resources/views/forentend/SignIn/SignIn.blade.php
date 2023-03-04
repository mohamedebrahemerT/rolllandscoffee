  
@extends('forentend.index')

@section('content')
 
  <!-- full Title -->
  <div class="full-title">
    <div class="container">
      <!-- Page Heading/Breadcrumbs -->
      <h1 class="mt-4 mb-3"> {{trans('admin.Pictures')}} </h1>
      <div class="breadcrumb-main">
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="index.html">{{trans('admin.Home')}}</a>
          </li>
          <li class="breadcrumb-item active">{{trans('admin.Pictures')}}</li>
        </ol>
      </div>
    </div>
  </div>
 
   <div class="services-bar">
        <div class="container">
            <h1 class="py-4">{{trans('admin.Pictures')}}</h1>
            <!-- Services Section -->
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
            <!-- /.row -->
        </div>
    </div>
 
@endsection