   <div id="home" class="tab-pane fade in active">
      <h3>{{trans('admin.Maincategories_name_en')}}</h3>

           

               <div class="box box-info">
            <div class="box-header">
              <i class="fa fa-check-square	
"></i>
            
              <h3 class="box-title">{{trans('admin.Maincategories_name_en')}}</h3>
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
                  <textarea name="Maincategories_name_en"  class="form-control Maincategories_name_en"  
                             >{{$Maincategories->Maincategories_name_en}}</textarea>
                </div>
           
            </div>
          
          </div>

    </div>
