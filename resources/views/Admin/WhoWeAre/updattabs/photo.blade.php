    @push('js')

      <link rel="stylesheet" href="{{url('/')}}/Desgin/Adminlte/dist/css/dropzone.min.css">
 

   <script src="{{url('/')}}/Desgin/Adminlte/dist/js/dropzone.min.js"></script>
   
  
  <script type="text/javascript">   


            Dropzone.autoDiscover =false;
         $(document).ready(function(){
         $('#dropzone_main_photo').dropzone({

            url:'{{ url("admin/update_img_dropzon_WhoWeAre/img/".$WhoWeAre->id) }}',
            paramName:'file',
            //uploadMultiple:true,
            maxFile:0,
            maxFilesize:3,
            acceptedFiles:'image/*',
            dictDefaultMessage:'<i class="fa fa-camera"></i> '+ '{{trans("admin.photo")}}',
            dictRemoveFile:'{{trans("admin.dictRemoveFile")}}',
            removedfile:function(file)
            {
              //alert(file.id);
              $.ajax({
                dataType:'json',
                type:'post',
                url:'{{ url("admin/delete_img_dropzon_WhoWeAre/img/".$WhoWeAre->id)}}',
                data:{
                  _token:'{{ csrf_token() }}',
                },

              });
               
           return (fmock = file.previewElement) != null ? fmock.parentNode.removeChild(file.previewElement) : void 0;

 
            },
            params:{
              _token:'{{ csrf_token() }}'
            },
            addRemoveLinks:true,
            init:function()
            {
                 
                @if (!empty($WhoWeAre->photo))
               var mock={
                name:'{{ $WhoWeAre->id }}',
                size:'',
                type:'',
                id:' ',
               };
               this.emit('addedfile',mock);
this.options.thumbnail.call(this,mock,"{{Storage::url($WhoWeAre->photo)}}" );
               $('.dz-progress').remove();
               @endif

               this.on('sending',function(file,xhr,formData){
                   formData.append('id','');
                   file.id='';
               });

               this.on('success',function(file,response){

                file.id=response.id
               });
            }



         });


  });     

               </script>
        <style type="text/css">
          .dz-image img 
          {
            width: 100px;
            height: 100px;
          }
        </style>
         @endpush


  <div id="menu5" class="tab-pane fade">
      <h3>{{trans('admin.photo')}}</h3>
 

             
      <div class="dropzone" id="dropzone_main_photo"> </div>
      <br>
   

</div>