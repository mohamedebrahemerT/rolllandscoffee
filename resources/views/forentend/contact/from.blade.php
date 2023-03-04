  

@extends('forentend.index')



@section('content')

 <img src="{{url('/')}}/forentend/images/all-title-bg.jpg" class="img-fluid">


 

    <div class="contact-main">

        <div class="container">

            <!-- Content Row -->

          <div class="row">

            <!-- Map Column -->

                <div class="col-lg-8 mb-4 contact-left">

                    <h3>استمارة تسجيل عملائنا   </h3>

                    <form name="sentMessage" id="contactForm" novalidate method="post" action="{{url('/')}}/Sendcontact">

                    @csrf



                        <div class="control-group form-group" >

                            <div class="controls">

                                <input type="text" placeholder=" {{trans('admin.name')}}  " class="form-control" id="name" required data-validation-required-message="Please enter your name." name="name" style="text-align: right;">

                                <p class="help-block"></p>

                            </div>

                        </div>

                        <div class="control-group form-group">

                            <div class="controls">

                                <input type="tel" placeholder=" {{trans('admin.phone')}}  " class="form-control" id="phone" required data-validation-required-message="Please enter your phone number." name="phone" style="text-align: right;">

                            </div>

                        </div>

                        <div class="control-group form-group">

                            <div class="controls">

                                <input type="email" placeholder="   {{trans('admin.Email')}}" class="form-control" id="email" required data-validation-required-message="Please enter your email address." name="email" style="text-align: right;">

                            </div>

                        </div>

                    

                        <div id="success"></div>

                        <!-- For success/fail messages -->

                        <button type="submit" class="btn btn-primary" id="sendMessageButton"> {{trans('admin.SubmitMessage')}}   </button>

                    </form>

                </div>

             
            </div>

            <!-- /.row -->

        </div>

        <!-- /.container -->

    </div>

    
 
 

@endsection