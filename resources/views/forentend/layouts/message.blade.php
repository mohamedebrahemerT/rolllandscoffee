 
@if(session()->has('success') )
  <div class="alert alert-success" style="text-align: center;
font-size: 34px;">

    {{session('success')}}
    
  </div>
@endif

   


 