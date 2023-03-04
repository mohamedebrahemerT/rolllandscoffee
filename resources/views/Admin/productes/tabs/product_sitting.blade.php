
  
    @push('js')
 


  <script type="text/javascript">        
  $('.datetpicker').datepicker({
  	    rtl:true,
  	    language:'{{ session("lang") }}',
  	    todayBtn:true,
  	    utoclose:false,
  	    clearBtn:true,
  });
           
             
              $(document).on('change','.status',function(){

                   var status=$('.status option:selected').val();
           if (status == 'refused' || status == 'مرفوض')
            {
            	  $('.reason').removeClass('hidden');
               
            }
             else
             {
               $('.reason').addClass('hidden');

             }

              });
        </script>
@endpush


    <div id="menu1" class="tab-pane fade">
      <h3>{{trans('admin.product_sitting')}}</h3>

               <div class="form-group col-md-3 col-lg-3 col-sm-3">
            {!! Form::label('price',trans('admin.price')) !!}
            {!! Form::text('price',$productes->price,['class'=>'form-control']) !!}
        </div>
                
               <div class="form-group col-md-3 col-lg-3 col-sm-3">
            {!! Form::label('start_at',trans('admin.start_at')) !!}
            {!! Form::text('start_at',$productes->start_at,['class'=>'form-control datetpicker','autocomplete'=>'off']) !!}
        </div>
                 <div class="form-group col-md-3 col-lg-3 col-sm-3">
            {!! Form::label('end_at',trans('admin.end_at')) !!}
            {!! Form::text('end_at',$productes->end_at,['class'=>'form-control datetpicker','autocomplete'=>'off']) !!}
        </div>
        <div class="form-group col-md-3 col-lg-3 col-sm-3">
            
        </div>
         <div class="form-group col-md-4 col-lg-4 col-sm-4">
            {!! Form::label('price_offer',trans('admin.price_offer')) !!}
            {!! Form::text('price_offer',$productes->price_offer,['class'=>'form-control']) !!}
        </div>
           <div class="form-group col-md-4 col-lg-4 col-sm-4">
            {!! Form::label('start_offer_at',trans('admin.start_offer_at')) !!}
            {!! Form::text('start_offer_at',$productes->start_offer_at,['class'=>'form-control datetpicker ','autocomplete'=>'off']) !!}
        </div>
           <div class="form-group col-md-4 col-lg-4 col-sm-4">
            {!! Form::label('end_offer_at',trans('admin.end_offer_at')) !!}
            {!! Form::text('end_offer_at',$productes->end_offer_at,['class'=>'form-control  datetpicker ','autocomplete'=>'off']) !!}
        </div>
        


   <div class="form-group"> 
            {!! Form::select('status', [$productes->status=> $productes->status] + [ trans('admin.pending') => trans('admin.pending'),trans('admin.refused')=>trans('admin.refused'),trans('admin.active')=>trans('admin.active')], null, ['class' => 'form-control status']) !!}
                     </div> 



         <div class="form-group reason {{$productes->status !='refused'?'hidden':'' }}">
            {!! Form::label('reason',trans('admin.reason')) !!}
            {!! Form::textarea('reason',$productes->reason,['class'=>'form-control']) !!}
        </div>
         

   

      
    </div>





 