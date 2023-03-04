 @if($department_id != null)
   {{App\Department::where('id',$department_id)->first()->dep_name_ar}}
                      @endif