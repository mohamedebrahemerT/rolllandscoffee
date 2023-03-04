   <div id="home" class="tab-pane fade in active">
      <h3>{{trans('admin.subcategories_name_en')}}</h3>

 
    
   <div class="form-group"> 
                     {{ Form::label('Maincategories_id', trans('admin.Maincategories_id'))  }}
{{ Form::select('Maincategories_id',App\Maincategories::pluck('Maincategories_name_en','id'),$subcategories->Maincategories_id,['class'=>'form-control Maincategories_id',"placeholder"=>"........"] )  }}
                     </div> 
                       
                
                   <div class="form-group"> 
              
                     {{ Form::label('measure_name_en', trans('admin.measure_name_en'))  }}
                    {{ Form::text('measure_name_en',$subcategories->measure_name_en,['class'=>'form-control measure_name_en'])  }}
                     </div> 

                  

               <div class="box box-info">
            <div class="box-header">
              <i class="fa fa-check-square	
"></i>
            
              <h3 class="box-title">{{trans('admin.subcategories_name_en')}}</h3>
              <!-- tools box -->
              <div class="pull-right box-tools">
                <button type="button" class="btn btn-info btn-sm RRR" data-widget="remove" data-toggle="tooltip"
                        title="Remove">
                  <i class="fa fa-times"></i></button>
              </div>
              <!-- /. tools -->
            </div>
            <div class="box-body">  
                <div>
                  <textarea name="subcategories_name_en"    class="form-control subcategories_name_en" 
                             >{{$subcategories->subcategories_name_en}}</textarea>
                </div>
           
            </div>
          
          </div>

    </div>
