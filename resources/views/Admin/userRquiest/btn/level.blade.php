
<span style="font-size:15px; " class="label
 {{$level=='user'?'label-primary' :'' }}
 {{$level=='vendor'?'label-info' :'' }}
  {{$level=='company'?'label-success' :'' }}
  

">
 {{ trans('admin.'.$level)}}

 </span>