
       
<div class="col col-md-6">

 <div class="form-group">
            {!! Form::label('sizes',trans('admin.sizes')) !!}
            {!! Form::select('size_id',$sizes,$productcc->size_id,['class'=>'form-control','placeholder'=>trans('admin.type_of_size')]) !!}
        </div>
             <div class="form-group">
          {!! Form::label('sizes',trans('admin.sizes')) !!}
            {!! Form::text('size',$productcc->size,['class'=>'form-control']) !!}
        </div>

 </div>
 
<div class="col col-md-6">
            
        <div class="form-group">
            {!! Form::label('weight',trans('admin.weight')) !!}
            {!! Form::select('weight_id',$weight,$productcc->weight_id,['class'=>'form-control','placeholder'=>trans('admin.type_of_weight')]) !!}
        </div>
             <div class="form-group">
          {!! Form::label('weight',trans('admin.weight')) !!}
            {!! Form::text('weight',$productcc->weight,['class'=>'form-control']) !!}
        </div>
    </div>
      
  

 



           