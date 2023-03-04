<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#dell_admin{{$id}}">{{trans('admin.delete') }}</button>
 
<!-- Modal -->
<div id="dell_admin{{$id}}" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">{{trans('admin.delete') }} </h4>
      </div>

         	  
   {!! Form::open(['url'=>['admin/FAQs/'.$id],'method'=>'delete']) !!}
      <div class="modal-body">
<p>{{ trans('admin.FAQs') }}</p>
      </div>
      <div class="modal-footer">
      	 


     {!! Form::submit(trans('admin.delete'),['class'=>'btn btn-danger']) !!}
        <button type="button" class="btn btn-default" data-dismiss="modal">{{trans('admin.close') }}</button>

     
      </div>
      {{Form::close() }}
    </div>

  </div>
</div>