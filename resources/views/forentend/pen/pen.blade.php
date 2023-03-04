   @extends('forentend.index')



@section('content')



@push('js')



<style type="text/css">

  

.products-section {

  display: grid;

  grid-template-columns: 1fr 3fr;

  margin: 80px auto 80px;

}



.products-section .sidebar li.active {

  font-weight: 500;

}



.products-section .products {

  display: grid;

  grid-template-columns: 1fr 1fr 1fr;

  grid-gap: 60px 30px;

}



.products-section .products .product-price {

  color: #919191;

}



.products-header {

  display: -webkit-box;

  display: -ms-flexbox;

  display: flex;

  -webkit-box-pack: justify;

      -ms-flex-pack: justify;

          justify-content: space-between;

}



.product-section {

  display: grid;

  grid-template-columns: 1fr 1fr;

  grid-gap: 120px;

  
}



.product-section .selected {

  border: 1px solid #979797;

}



.product-section-images {

  display: grid;

  grid-template-columns: repeat(6, 1fr);

  grid-gap: 20px;

  margin-top: 20px;

}



.product-section-thumbnail {

  display: -webkit-box;

  display: -ms-flexbox;

  display: flex;

  -webkit-box-align: center;

      -ms-flex-align: center;

          align-items: center;

  border: 1px solid lightgray;

  min-height: 66px;

  cursor: pointer;

}



.product-section-thumbnail:hover {

  border: 1px solid #979797;

}



.product-section-image {

  display: -webkit-box;

  display: -ms-flexbox;

  display: flex;

  -webkit-box-pack: center;

      -ms-flex-pack: center;

          justify-content: center;

  -webkit-box-align: center;

      -ms-flex-align: center;

          align-items: center;

  border: 1px solid #979797;

  padding: 30px;

  text-align: center;

  height: 400px;

}



.product-section-image img {

  opacity: 0;

  -webkit-transition: opacity .10s ease-in-out;

  transition: opacity .10s ease-in-out;

  max-height: 100%;

}



.product-section-image img.active {

  opacity: 1;

}



.product-section-information p {

  margin-bottom: 16px;

}



.product-section-title {

  margin-bottom: 0;

}



.product-section-subtitle {

  font-size: 20px;

  font-weight: bold;

  color: #919191;

}



.product-section-price {

  font-size: 38px;

  color: #212121;

  margin-bottom: 16px;

}



</style>



     <script>

        (function(){

            const currentImage = document.querySelector('#currentImage');

            const images = document.querySelectorAll('.product-section-thumbnail');



            images.forEach((element) => element.addEventListener('click', thumbnailClick));



            function thumbnailClick(e) {

                currentImage.classList.remove('active');



                currentImage.addEventListener('transitionend', () => {

                    currentImage.src = this.querySelector('img').src;

                    currentImage.classList.add('active');

                })



                images.forEach((element) => element.classList.remove('selected'));

                this.classList.add('selected');

            }



        })();

    </script>

@endpush



  



    <div class="item-pro" >

		<div class="container">

			<!-- Portfolio Item Row -->

			<div class="row">





				<div class="col-md-6">



 <div class="product-section container">

        <div>

            <div class="product-section-image">

                <img src="{{Storage::url($pen->photo)}}" alt="product" class="active" id="currentImage">

            </div>



            <div class="product-section-images">   

                     @foreach($filess as $file) 

                    <div class="product-section-thumbnail">

                <img src="{{Storage::url($file->full_file)}}" alt="product" height="100" width="60">

                    </div>

                    @endforeach

              

            </div>

        </div>

        </div>



 



				</div>





				<div class="col-md-6">

          <h6 class="my-3"> {{trans('admin.department_id')}}:  @if(session('lang')=='ar')

                        {{$pen->department_name->dep_name_ar }}

                        @endif

                        @if(session('lang')=='en')

                        {{$pen->department_name->dep_name_en }}

                        @endif</h6>
					<h6 class="my-3">



                  @if(session('lang')=='ar')

{{$pen->title_name_ar }}



@endif



  @if(session('lang')=='en')

{{$pen->title_name_en }}



@endif 

				</h3>
                 <div>
                  {{$pen->price }} :  {{trans('admin.price')}} 
               </div>
               <div>
                  {{$pen->title_name_en }} :  {{trans('admin.calories')}}
               </div>

                <div>
             <h5>:{{trans('admin.allergens')}}</h5>    {!! $pen->content_name_en  !!} 
               </div>


               <div>
             <h5>:{{trans('admin.desc')}}</h5>    {!! $pen->content_name_ar !!} 
               </div>

               
 
                 
 
         
				</div>

            <br>



   <!--div class="row" style="margin-top:20px">

    <div class="col-md-2"></div>

        <div class="col-md-8">

               <u style="display:block ruby">

               @foreach($filess as $file) 

                

                        <li class="thumb__element">

      <a href="{{Storage::url($file->full_file)}}" class="product-single__thumbnail">

                     <img src="{{Storage::url($file->full_file)}}" alt="Reprehenderit qui in ea" width="80" height="80">

                        </a>

                      </li>



                      @endforeach

                     </u>



        </div>

    <div class="col-md-2"></div>

 

     

   </div -->



			</div>

		 

			<!-- /.row -->

		 

		</div>

		<!-- /.container -->

	</div>





	 <div class="services-bar">

        <div class="container">

            <h1 class="py-4">



            	{{trans('admin.relatedproduct')}}

            	@if(session('lang')=='ar')

            	{!! $department->dep_name_ar !!}

            	@endif

            	@if(session('lang')=='en')

            	{!! $department->dep_name_en !!}

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