
  <div id="department" class="tab-pane fade">
      <h3>{{trans('admin.Ourworks_name_ar')}}</h3>

        <div class="form-group"> 
              
                     {{ Form::label('title_name_ar', trans('admin.title_name_ar22'))  }}
                    {{ Form::text('title_name_ar',$Ourworks->title_name_ar,['class'=>'form-control title_name_ar'])  }}
                     </div> 

 <div class="box box-info">
            <div class="box-header">
              <i class="fa fa-cube  
	
"></i>

              <h3 class="box-title">{{trans('admin.Ourworks_name_arr')}}</h3>
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
                  <textarea name="Ourworks_name_ar"  class="form-control Ourworks_name_ar" > {{$Ourworks->Ourworks_name_ar}}</textarea>
                </div>
           
            </div>
          
          </div>

</div>