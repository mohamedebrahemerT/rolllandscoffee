   <div id="menu1" class="tab-pane fade">
      <h3>{{trans('admin.Sendcontact_name_fr')}}</h3>

        <div class="form-group"> 
              
                     {{ Form::label('title_name_fr', trans('admin.title_name_fr'))  }}
                    {{ Form::text('title_name_fr',$Sendcontact->title_name_fr,['class'=>'form-control title_name_fr'])  }}
                     </div> 

 <div class="box box-info">
            <div class="box-header">
              <i class=" fa fa-desktop  

"></i>

              <h3 class="box-title">{{trans('admin.Sendcontact_name_fr')}}</h3>
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
                  <textarea name="Sendcontact_name_fr"   >{{$Sendcontact->Sendcontact_name_fr}}</textarea>
                </div>
           
            </div>
          
          </div>

</div>