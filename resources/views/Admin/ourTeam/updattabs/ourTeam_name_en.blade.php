   <div id="home" class="tab-pane fade in active">
    

             <div class="form-group"> 
              
                     {{ Form::label('jobTitle_name_en', trans('admin.jobTitle_name_en'))  }}
                    {{ Form::text('jobTitle_name_en',$ourTeam->jobTitle_name_en,['class'=>'form-control jobTitle_name_en'])  }}
                     </div> 

                     
             <div class="form-group"> 
              
                     {{ Form::label('name_name_en', trans('admin.name_name_en'))  }}
                    {{ Form::text('name_name_en',$ourTeam->name_name_en,['class'=>'form-control name_name_en'])  }}
                     </div> 
 
 

               <div class="box box-info">
            <div class="box-header">
              <i class="fa fa-check-square	
"></i>
            
              <h3 class="box-title">{{trans('admin.desc_name_en')}}</h3>
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
                  <textarea name="desc_name_en" class="form-control desc_name_en"   
                             >{{$ourTeam->desc_name_en}}</textarea>
                </div>
           
            </div>
          
          </div>

    </div>
