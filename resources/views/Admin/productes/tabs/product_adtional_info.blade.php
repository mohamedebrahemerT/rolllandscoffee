         @push('js')
         <script type="text/javascript">
         	var x=1;
         	$(document).on('click','.add_inpute',function(){

         		var max_inpute=10;
         		
         		if (x < max_inpute) 
         		{
         			//$('.div_inpute').append('<h1>test</h1>');

         			$('.div_inpute').append('<div>'+
         	'<div class="col-sm-6 col-sm-6 col-md-6 col-lg-6">'+
         	   '{!! Form::label('input_key',trans('admin.input_key')) !!}'+
            '{!! Form::text('input_key[]','',['class'=>'form-control']) !!}'+

         '</div>'+

         '<div class="col-sm-6 col-sm-6 col-md-6 col-lg-6">'+
         	  ' {!! Form::label('input_value',trans('admin.input_value')) !!} '+
          '{!! Form::text('input_value[]','',['class'=>'form-control']) !!}'+
         	
         '</div>'+
         '<div class="clearfix"> </div>'+
                '<br>'+
           '<a href="#" class="remove_inpute btn btn-danger"><i class="fa fa-trash"> </i>'+ '</a>'+
           '<div class="clearfix"> </div>'+
                '<br>'+
         '</div>');
         			x+=1;
         
         			return false;
         		}
         	});

         	$(document).on('click','.remove_inpute',function(){

         		$(this).parent('div').remove();
         		x-=1;
         		return false;
         	});
         </script>
         @endpush

        
<div id="menu4" class="tab-pane fade">
      <h3>{{trans('admin.product_adtional_info')}}</h3>

         <div class="div_inpute col-sm-12 col-sm-12 col-md-12 col-lg-12">
         	@foreach($productes->other_data_R()->get() as $data)
         <div>
         	<div class="col-sm-6 col-sm-6 col-md-6 col-lg-6">
         	   {!! Form::label('input_key',trans('admin.input_key')) !!}
            {!! Form::text('input_key[]',$data->input_key,['class'=>'form-control']) !!}

         </div>

         <div class="col-sm-6 col-sm-6 col-md-6 col-lg-6">
         	   {!! Form::label('input_value',trans('admin.input_value')) !!}
            {!! Form::text('input_value[]',$data->input_value,['class'=>'form-control']) !!}
         	
         </div>
         <div class="clearfix"> </div>
                <br>
           <a href="#" class="remove_inpute btn btn-danger"><i class="fa fa-trash"> </i> </a>
           <div class="clearfix"> </div>
                <br>
         </div>
            
            @endforeach
         </div>

           <a href="#" class="add_inpute btn btn-info"><i class="fa fa-plus"> </i> </a>
                <div class="clearfix"> </div>
                <br>
    </div>

   