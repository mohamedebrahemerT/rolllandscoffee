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
                        <a href="/"> {{trans('admin.Home')}} </a>
                    </li>
                    <li class="breadcrumb-item active">  {{trans('admin.newes')}}    </li>
                </ol>
            </div>
        </div>
    </div>

    <div class="blog-main">
        <div class="container">
            <div class="row">
                <!-- Post Content Column -->
                <div class="col-lg-8">
                    <div class="blog-right-side">
                        <!-- Comments Form -->
                        <div class="card my-4">
                            <h5 class="card-header">{{__('Your Comment')}}</h5>
                            <div class="card-body">
                                <form method="post" action="{{route("comment.update",$comment->id)}}">
                                    @method('PUT')
                                    @csrf
                                    <div class="form-group">
                                        <textarea class="form-control" rows="3" name="comment">{{$comment->comment}}</textarea>
                                    </div>
                                    <button type="submit" class="btn btn-primary">{{__("Submit")}}</button>
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
                                <img src="{{url('/')}}/forentend/images/index.jpg" alt=""
                                     class="img-responsive img-thumbnail">
                            </div><!-- end category -->
                        </div><!-- end widget -->
                    </div>


                </div>

            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
    </div>

@endsection
