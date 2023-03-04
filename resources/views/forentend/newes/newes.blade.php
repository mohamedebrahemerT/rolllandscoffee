  @extends('forentend.index')

@section('content')

    <!-- full Title -->
    <div class="full-title">
        <div class="container">
            <!-- Page Heading/Breadcrumbs -->
            <h1 class="mt-4 mb-3">  {{trans('admin.projects')}} </h1>
            <div class="breadcrumb-main">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="index.html">{{trans('admin.Home')}}</a>
                    </li>
                    <li class="breadcrumb-item active">{{trans('admin.projects')}}</li>
                </ol>
            </div>
        </div>
    </div>
 <div class="container">
             <a href="{{url('/')}}" class="btn btn-primary">{{trans('admin.back')}}</a>
    </div>
    <div class="blog-main">
        <div class="container">
            <div class="row">
                <!-- Blog Entries Column -->
                <div class="col-md-8 blog-entries">

                       
 @foreach($newess as $Ob)
                   
                    <div class="card mb-4">
                        <img class="card-img-top" src="{{ Storage::url($Ob->photo) }}" alt="Card image Blog" />
                        <div class="card-body">
                            
                            <h2 class="card-title">
                           @if(session('lang')=='ar')
{{$Ob->title_name_ar }}

@endif

  @if(session('lang')=='en')
{{$Ob->title_name_en }}

@endif
                        </h2>
                            <p class="card-text">
                             @if(session('lang')=='ar')
{{$Ob->newes_name_ar }}

@endif

  @if(session('lang')=='en')
{{$Ob->newes_name_en }}
@endif

                        </p>
                         
                            <a class="btn btn-primary" href="{{url('/')}}/blog/{{$Ob->id}}"> {{trans('admin.Readmore')}} </a>
                        </div>
                    </div>
                        @endforeach
                  
                   
                    <div class="pagination_bar_arrow">
                      <!-- Pagination -->
                        <div class="pagination-wrapper row">
                          
                    <?php  echo $newess->render(); ?>

        

                        </div><!-- ne dpagi -->
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
                        <h5 class="card-header">{{trans('admin.mostviewnewes')}}</h5>
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
                    <!-- Categories Widget -->
                     
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
    </div>
     
@endsection