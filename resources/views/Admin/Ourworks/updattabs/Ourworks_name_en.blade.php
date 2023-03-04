   <div id="home" class="tab-pane fade in active">
      <h3>{{trans('admin.Ourworks_name_en')}}</h3>

             <div class="form-group"> 
              
                     {{ Form::label('title_name_en', trans('admin.title_name_ar22'))  }}
                    {{ Form::text('title_name_en',$Ourworks->title_name_en,['class'=>'form-control title_name_en'])  }}
                     </div> 
 

               <div class="box box-info">
            <div class="box-header">
              <i class="fa fa-check-square	
"></i>
            
              <h3 class="box-title">{{trans('admin.Ourworks_name_en')}}</h3>
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
                  <textarea name="Ourworks_name_en" class="form-control Ourworks_name_en"   
                             >{{$Ourworks->Ourworks_name_en}}</textarea>
                </div>
           
            </div>
          
          </div>

    </div>
