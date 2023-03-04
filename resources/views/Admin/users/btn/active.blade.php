@if($active == 0)
<a class="btn btn-danger" href="/admin/users/{{$id}}/activation"><i class="fa fa-edit" onclick="if(!confirm('Confirm ?')){return false;}"></i> {{trans('admin.inactive') }}   </a>
@else
    <a class="btn btn-primary" href="/admin/users/{{$id}}/activation"><i class="fa fa-edit" onclick="if(!confirm('Confirm ?')){return false;}"></i> {{trans('admin.active') }}   </a>
@endif
