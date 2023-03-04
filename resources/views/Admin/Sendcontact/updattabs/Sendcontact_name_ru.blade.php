

   <div id="menu4" class="tab-pane fade">
      <h3>{{trans('admin.Sendcontact_name_ru')}}</h3>

            <div class="form-group"> 
              
                     {{ Form::label('title_name_ru', trans('admin.title_name_ru'))  }}
                    {{ Form::text('title_name_ru',$Sendcontact->title_name_ru,['class'=>'form-control title_name_ru'])  }}
                     </div> 

 <div class="box box-info">
            <div class="box-header">
              <i class="fa fa-fighter-jet 
	
"></i>

              <h3 class="box-title">{{trans('admin.Sendcontact_name_ru')}}</h3>
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
                  <textarea name="Sendcontact_name_ru"   >{{$Sendcontact->Sendcontact_name_ru}}</textarea>
                </div>
           
            </div>
          
          </div>

</div>

