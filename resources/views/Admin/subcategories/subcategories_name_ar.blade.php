
  <div id="department" class="tab-pane fade">
      <h3>{{trans('admin.subcategories_name_ar')}}</h3>



              
    
   <div class="form-group"> 
                     {{ Form::label('Maincategories_id', trans('admin.Maincategories_id'))  }}
{{ Form::select('Maincategories_id',App\Maincategories::pluck('Maincategories_name_ar','id'),$subcategories->Maincategories_id,['class'=>'form-control Maincategories_id',"placeholder"=>"........"] )  }}
                     </div> 
                       
 
  <div class="form-group"> 
              
                     {{ Form::label('measure_name_ar', trans('admin.measure_name_ar'))  }}
                    {{ Form::text('measure_name_ar',$subcategories->measure_name_ar,['class'=>'form-control measure_name_ar'])  }}
                     </div> 

                   
     
                    


 <div class="box box-info">
            <div class="box-header">
              <i class="fa fa-cube  
	
"></i>

              <h3 class="box-title">{{trans('admin.subcategories_name_arr')}}</h3>
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
                  <textarea name="subcategories_name_ar"   > {{$subcategories->subcategories_name_ar}}</textarea>
                </div>
           
            </div>
          
          </div>

</div>