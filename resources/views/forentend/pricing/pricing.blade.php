 @extends('forentend.index')

@section('content')
 <!-- Start all page -->
<div class="page-hf-banner">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h2>Pricing Table</h2>
      </div>
    </div>
  </div>
  <div class="page-banner-breadcrumb">
    <div class="container">
      <div class="col-md-12">
        <ul class="breadcrumb">
          <li><a href="#">Home</a></li>
          <li class="active">Pricing Table</li>
        </ul>
      </div>
    </div>
  </div>
</div>
<!-- End all page --> 

<!-- Start Pricing Table-->
<div class="pricing-table-main wow animated fadeIn">
  <div class="container">
    <div class="row">
      <div class="pricing-title">
        <h2>Web Hostin <span>Pricing  </span></h2>
         
      </div>
    </div>
    <div class="row">
      <div class="tabbable pricing-tabs">
         
        <div class="tab-content clearfix">
          <div class="tab-pane fade active" id="one">
           @foreach(App\subcategories::get() as $Pricing)
            <div class="col-md-3 col-sm-6">
              <div class="pricingTable-2">
                <div class="pricingTable-2-header">
                  <h3 class="heading">{{$Pricing->measure_name_en}}</h3>
                  <span class="price-value"> <span class="currency">$</span> {{$Pricing->measure_name_ar}} <span class="month">/ month</span> </span> </div>
                <div class="pricing-content">
                  {!! $Pricing->subcategories_name_en !!}
                  <a href="{{url('/')}}/register" class="read">sign up</a> </div>
              </div>
            </div>
            @endforeach

           
          </div>

           
        </div>
      </div>
    </div>
  </div>
</div>
<!-- End Pricing Table --> 

@endsection
