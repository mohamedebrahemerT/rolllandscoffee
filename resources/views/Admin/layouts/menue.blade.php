   <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                
                @if(auth()->guard('admin')->user()->photo)
            <img src="{{Storage::url(auth()->guard('admin')->user()->photo)}}" class="img-circle" alt="User Image" width="30px" height="30px">
                @endif

                    @if(!auth()->guard('admin')->user()->photo)
            <img src="
{{url('/')}}/forentend/logo.jpg" class="img-circle" alt="User Image" width="30px" height="30px">
                @endif

             

              <span class="hidden-xs">{{ auth()->guard('admin')->user()->name }}</span>

            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                    @if(auth()->guard('admin')->user()->photo)
            <img src="{{Storage::url(auth()->guard('admin')->user()->photo)}}" class="img-circle" alt="User Image" width="30px" height="30px">
                @endif

                    @if(!auth()->guard('admin')->user()->photo)
            <img src="
{{url('/')}}/forentend/logo.jpg" class="img-circle" alt="User Image" >
                @endif



                <p>
                 {{ auth()->guard('admin')->user()->name }}  
                  
                </p>
              </li>
              
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="{{url('admin/admins/'. auth()->guard('admin')->user()->id.'/edit')}}" class="btn btn-default btn-flat">الملف الشخصي</a>
                </div>
                <div class="pull-right">
                  <a href="Admin_logout" class="btn btn-default btn-flat">خروج</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->

          
           <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              
              <span class="hidden-xs">language </span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
           
              <!-- Menu Body -->
              <li class="user-body">
                
                 <a href="{{url('admin/lang/en')}}" class="fa fa-flag"> english</a>
               
              </li>
              
              <li class="user-footer">

        <a href="{{url('admin/lang/ar')}}" class="fa fa-flag cheeck">عربي</a>
              </li>
            </ul>

          </li>

          
        </ul>
      </div>