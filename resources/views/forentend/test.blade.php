@extends('forentend.index')

@section('content')



      @push('js')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      <script type="text/javascript">
      	$(document).ready(function() {
  $(".cc").on("input", ".quantity", function() {
    var price = +$(".price").data("price");
    var quantity = +$(this).val();
    $("#total").text("$" + price * quantity);
  })

  var $buttonPlus = $('.increase');
  var $buttonMin = $('.decrease');
  var $quantity = $('.quantity');
  
  /*For plus and minus buttons*/
  $buttonPlus.click(function() {
    $quantity.val(parseInt($quantity.val()) + 1).trigger('input');
  });
  
  $buttonMin.click(function() {
    $quantity.val(Math.max(parseInt($quantity.val()) - 1, 0)).trigger('input');
  });
})
      </script>

      <div class="cc">
  <h1 class="title">Checkout</h1>
  <p class="price" data-price="2">$2 per month</p>
  <p class="description">Quantity:</p>

  <button type="button" class="decrease">-</button>
  <input type="text" class="quantity" value="1">
  <button type="button" class="increase">+</button>

  <p class="total">Total: <span id="total">$21</span></p>
</div>
@endsection
