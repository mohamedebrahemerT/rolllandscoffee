  <div id="home" class="tab-pane fade in active">

      <h3>{{trans('admin.product_info')}}</h3>



                 

                

        <div class="form-group col-sm-12 col-lg-12 col-md-12">
            {!! Form::label('department_id',trans('admin.department_id')) !!}

 <select class="form-group form-control department_id" style="padding: 3px"  name="department_id" >

          
           @foreach(App\Department::orderBy('order','ASC')->get() as $department)

            <option @if($department->id == $productes->department_id) selected  @endif 

            value="{{$department->id}}" > {{$department->dep_name_ar}} </option>
           @endforeach
                                  
                                </select>
        </div>


        <div class="form-group col-sm-6 col-lg-6 col-md-6">

            {!! Form::label('title_name_ar',trans('admin.title_name_ar')) !!}

            {!! Form::text('title_name_ar',$productes->title_name_ar,['class'=>'form-control title_name_ar']) !!}

        </div>



         <div class="form-group col-sm-6 col-lg-6 col-md-6">

            {!! Form::label('title_name_en',trans('admin.title_name_en')) !!}

            {!! Form::text('title_name_en',$productes->title_name_en,['class'=>'form-control title_name_en']) !!}

        </div>



             <div class="form-group col-sm-6 col-lg-6 col-md-6">

            {!! Form::label('content_name_ar',trans('admin.content_name_ar')) !!}

            {!! Form::textarea('content_name_ar',$productes->content_name_ar,['class'=>'form-control content_name_ar']) !!}

        </div>





           

        

             <div class="form-group col-sm-6 col-lg-6 col-md-6">

            {!! Form::label('content_name_en',trans('admin.content_name_en')) !!}

            {!! Form::textarea('content_name_en',$productes->content_name_en,['class'=>'form-control content_name_en']) !!}

        </div>

      

         <div class="form-group col-md-6 col-lg-6 col-sm-6">

            {!! Form::label('price',trans('admin.price')) !!}

            {!! Form::text('price',$productes->price,['class'=>'form-control price']) !!}

        </div>
 
    
   <div class="form-group col-md-6 col-lg-6 col-sm-6">

            {!! Form::label('calories',trans('admin.calories')) !!}

            {!! Form::text('calories',$productes->calories,['class'=>'form-control calories']) !!}

        </div>
      
  <div class="form-group col-md-12 col-lg-12 col-sm-12"> 
            {!! Form::label('status',trans('admin.status')) !!}
    
            {!! Form::select('status', [$productes->status=> $productes->status] + [ 'pending' => trans('admin.pending'),'active'=>trans('admin.active')], null, ['class' => 'form-control status']) !!}
                     </div> 

    </div>



                   

 

            

 



       