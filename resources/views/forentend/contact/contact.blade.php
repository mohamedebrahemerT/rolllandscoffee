  

@extends('forentend.index')



@section('content')

 <img src="{{url('/')}}/forentend/images/all-title-bg.jpg" class="img-fluid">


 <div class="container">

             <a href="{{url('/')}}" class="btn btn-primary">{{trans('admin.back')}}</a>

    </div>

    <div class="contact-main">

        <div class="container">

            <!-- Content Row -->

          <div class="row">

            <!-- Map Column -->

                <div class="col-lg-8 mb-4 contact-left">

                    <h3>{{trans('admin.Dropyour')}}   <span>{{trans('admin.Message')}}</h3>

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

                        <div class="control-group form-group">

                            <div class="controls">

                                <textarea rows="5" cols="100" placeholder=" {{trans('admin.Message')}}" class="form-control" id="message" required data-validation-required-message="Please enter your message" maxlength="999" style="resize:none" name="message" style="text-align: right;"></textarea>

                            </div>

                        </div>

                        <div id="success"></div>

                        <!-- For success/fail messages -->

                        <button type="submit" class="btn btn-primary" id="sendMessageButton"> {{trans('admin.SubmitMessage')}}   </button>

                    </form>

                </div>

                <!-- Contact Details Column -->

                <div class="col-lg-4 mb-4 contact-right">

                    <h3>{{trans('admin.ContactDetails')}}</h3>

                    <p>

                                 

                       @if(session('lang')=='ar')

        {{settings()->address_ar}}

        @endif

        @if(session('lang')=='en')

        {{settings()->address_en}}

        @endif

                    </p>

                    <p>

                        <abbr title="Phone">{{trans('admin.phone')}}</abbr>: {{settings()->phone}}

                    </p>

                    <p>

           

                        <a href="mailto:info@vital.com"> info@rolllandscoffee.com </a>

                       :  <abbr title="Email">{{trans('admin.info1')}}</abbr>

                    </p>

                    <p>

                       Monday - Friday: 9:00 AM to 5:00 PM :

                        <abbr title="Hours">{{trans('admin.H')}}</abbr>



                    </p>

                </div>

            </div>

            <!-- /.row -->

        </div>

        <!-- /.container -->

    </div>

    

    <div class="map-main">

       

        <!-- Embedded Google Map -->

        <iframe width="100%" height="300px" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3623.2527586598935!2d46.72352448560166!3d24.7525214841049!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3e2f0271cae823b1%3A0x422f78d765af019b!2zMTE2NDIg2LfYsdmK2YIg2KfZhNmF2YTZgyDYudio2K_Yp9mE2YTZhyDYp9mE2YHYsdi52YrYjCDYp9mE2YXYutix2LLYp9iq2Iwg2KfZhNix2YrYp9i2IDEyNDgx2Iwg2KfZhNiz2LnZiNiv2YrYqQ!5e0!3m2!1sar!2seg!4v1647204151801!5m2!1sar!2seg"></iframe>



      

    </div>

 

@endsection