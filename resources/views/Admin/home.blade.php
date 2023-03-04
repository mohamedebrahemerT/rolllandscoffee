
@extends('Admin.index')
@section('content')

       @push('js')
              <script type="text/javascript">
                $(document).ready(function() {
        $('.mall_select2').select2();
});
              </script>
              @endpush
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
          <div class="row">
                        <img src="{{url('/')}}/forentend/logo.jpg" class="img-fluid" style="  height: 400px; margin-right:30%;">
                </div>
                <!-- /.col -->
              </div>
              
              <!-- /.row -->
           

        </section>
        <!-- right col -->
      </div>
      <!-- /.row (main row) -->

      @include('Admin.layouts.message');


    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  @endsection
  