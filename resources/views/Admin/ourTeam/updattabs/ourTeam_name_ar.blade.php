
  <div id="department" class="tab-pane fade">
    

        <div class="form-group"> 
              
                     {{ Form::label('jobTitle_name_ar', trans('admin.jobTitle_name_ar'))  }}
                    {{ Form::text('jobTitle_name_ar',$ourTeam->jobTitle_name_ar,['class'=>'form-control jobTitle_name_ar'])  }}
                     </div> 

                          <div class="form-group"> 
              
                     {{ Form::label('name_name_ar', trans('admin.name_name_ar'))  }}
                    {{ Form::text('name_name_ar',$ourTeam->name_name_ar,['class'=>'form-control name_name_ar'])  }}
                     </div> 

                     

 <div class="box box-info">
            <div class="box-header">
              <i class="fa fa-cube  
	
"></i>

              <h3 class="box-title">{{trans('admin.desc_name_ar')}}</h3>
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
                  <textarea name="desc_name_ar"  class="form-control desc_name_ar" > {{$ourTeam->desc_name_ar}}</textarea>
                </div>
           
            </div>
          
          </div>

</div>