   @extends('forentend.index')

	@section('content')
	 

    <!-- full Title -->
    <div class="full-title">
        <div class="container">
            <!-- Page Heading/Breadcrumbs -->
            <h1 class="mt-4 mb-3">    {{trans('admin.newes')}}  </h1>
            <div class="breadcrumb-main">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="index.html"> {{trans('admin.Home')}} </a>
                    </li>
                    <li class="breadcrumb-item active">  {{trans('admin.newes')}}    </li>
                </ol>
            </div>
        </div>
    </div>
 <div class="container">
             <a href="{{url('/')}}/newess" class="btn btn-primary">{{trans('admin.back')}}</a>
    </div>
    <div class="blog-main">
        <div class="container">
            <div class="row">
            <!-- Post Content Column -->
                <div class="col-lg-8">
                    <!-- Preview Image -->
                    <img class="img-fluid rounded" src="{{ Storage::url($newes->photo) }}" alt="" />
                    <hr>
                        <!-- Date/Time -->
                        <p>Posted on January 1, 2018 at 18:00 PM</p>
                    <hr>
                    <!-- Post Content -->

                          <blockquote class="blockquote">
                        <p class="mb-0">
                                    
                         @if(session('lang')=='ar')
{{$newes->title_name_ar }}

@endif

  @if(session('lang')=='en')
{{$newes->title_name_en }}
@endif
                    </p>
                         
                    </blockquote>
                    <p class="lead">
                                    
                         @if(session('lang')=='ar')
{{$newes->newes_name_ar }}

@endif

  @if(session('lang')=='en')
{{$newes->newes_name_en }}
@endif
                     </p>

                   
                <hr>
                <div class="blog-right-side">
                    <!-- Comments Form -->
                    <div class="card my-4">
                        <h5 class="card-header">Leave a Comment:</h5>
                        <div class="card-body">
                            <form>
                                <div class="form-group">
                                    <textarea class="form-control" rows="3"></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
              

            </div>

            <!-- Sidebar Widgets Column -->
            <div class="col-md-4 blog-right-side">

              <!-- Search Widget -->
              <div class="card mb-4">
                    <div class="widget clearfix">
                            <h4 class="widget-title">{{trans('admin.Publications')}}</h4>
                            <div class="category-widget">
                                <img src="{{url('/')}}/forentend/images/index.jpg" alt="" class="img-responsive img-thumbnail">
                            </div><!-- end category -->
                        </div><!-- end widget -->
              </div>

              <!-- Side Widget -->
              <div class="card my-4">
                <h5 class="card-header"> {{trans('admin.mostviewnewes')}}  </h5>
                <div class="card-body">
                    <ul style="list-style: none;">
                                     
                                    @foreach($randomNewess as $randomNewes)
                                    <li><a href="{{url('/')}}/blog/{{$randomNewes->id}}">

                                         
  @if(session('lang')=='ar')
{{$randomNewes->title_name_ar }}

@endif

  @if(session('lang')=='en')
{{$randomNewes->title_name_en }}
@endif


                                    </a></li>
                                       
                                    @endforeach 
                                </ul>
                </div>
              </div>
              
             
            </div>

          </div>
          <!-- /.row -->
        </div>
        <!-- /.container -->
    </div>
 
	@endsection
