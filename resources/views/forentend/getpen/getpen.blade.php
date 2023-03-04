   
@extends('forentend.index')

@section('content')
 
  
    
    <!-- Page Content -->
    <div class="container">
     <img src="{{Storage::url($department->icon2)}}" >
             <a href="{{url('/')}}/Services" class="btn btn-primary">{{trans('admin.back')}}</a>
     
    </div>

 
    <div class="services-bar">
        <div class="container">
            <h1 class="py-4">
            	@if(session('lang')=='ar')
            	{{$department->dep_name_ar}}
            	@endif
            	@if(session('lang')=='en')
            	{{$department->dep_name_en}}
            	@endif
      
        </h1>
            <!-- Services Section -->
            <div class="row">
 
           @foreach($products as $product)
               <div class="col-lg-4 mb-4">
                    <div class="card h-100">
                        <div class="card-img">
                            <a href="{{url('/')}}/pen/{{$product->id}}/{{$department->id}}">
                            <img class="img-fluid" src="{{Storage::url($product->photo)}}" alt="" />
                            </a>
                        </div>
                        <div class="card-body">
                            <a href="{{url('/')}}/pen/{{$product->id}}/{{$department->id}}">
                            
                            <h4 class="card-header"> 

                  @if(session('lang')=='ar')
{{$product->title_name_ar }}

@endif

  @if(session('lang')=='en')
{{$product->title_name_en }}

@endif 
            </h4>
                            </a>
                             
                        </div>
                    </div>
               </div>
           @endforeach
              
          
              
             
            </div>
            <!-- /.row -->
        </div>
    </div>
 
@endsection