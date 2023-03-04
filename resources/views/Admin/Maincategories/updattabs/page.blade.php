
  <div id="department1" class="tab-pane fade">
      <h3>{{trans('admin.page')}}</h3>

      <div class="form-group"> 
              
                     {{ Form::label('page', trans('admin.page'))  }}
                     <select name="page" id="page" class="form-control page">
  <option value="Home"  @if($Maincategories->page  ==  'Home')selected @endif>{{trans('admin.Home')}}</option>
 
  <option value="WhoWeAre" @if($Maincategories->page  =='WhoWeAre')selected @endif>{{trans('admin.WhoWeAre')}}</option>
  <option value="VisionMission"  @if($Maincategories->page  =='VisionMission')selected @endif>{{trans('admin.VisionMission')}}</option>
  <option value="ourTeam"  @if($Maincategories->page  =='ourTeam')selected @endif>{{trans('admin.ourTeam')}}</option>
  <option value="Services"  @if($Maincategories->page  =='Services')selected @endif>{{trans('admin.Services')}}</option>
  <option value="Objectives11"  @if($Maincategories->page  =='Objectives11')selected @endif>{{trans('admin.Objectives11')}}</option>
  <option value="Our Partners"  @if($Maincategories->page  =='Our Partners')selected @endif>{{trans('admin.Our Partners')}}</option>
  <option value="employeeArea"  @if($Maincategories->page  =='employeeArea')selected @endif>{{trans('admin.employeeArea')}}</option>
  <option value="Blog"  @if($Maincategories->page  == 'Blog')selected @endif>{{trans('admin.Blog')}}</option>
  
  <option value="Contact"  @if($Maincategories->page  =='Contact')selected @endif>{{trans('admin.Contact')}}</option>

</select>
                     </div> 

  

</div>