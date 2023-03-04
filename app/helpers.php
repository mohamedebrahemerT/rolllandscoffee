<?php

if (!function_exists('ccc'))
 {
	  function aurl($url=null)
	{
         return  ('/admin'.$url);

	}
}


if (!function_exists('comm')) {
    function comm($id) 

    {
          $newes=App\newes::find($id);

         $NumberOFcomment=$newes->comment->count();

        return $NumberOFcomment;
    }
}

if (!function_exists('WhoWeAre')) {
    function WhoWeAre() 

    {
   $WhoWeAre=App\WhoWeAre::orderBy('id', 'asc')->first();
        

        

        return $WhoWeAre;
    }
}



if (!function_exists('Department')) {
    function Department() 

    {
             $Department=  DB::table('departments')
            ->whereNull('parent')->get();

      

        return $Department;
    }
}

if (!function_exists('newes')) {
    function newes() 

    {
          $newes=App\newes::take(3)->get();

        return $newes;
    }
}


function getStockLevel($quantity)
{
    if ($quantity > 5) 
    {
        $stockLevel = '<div class="badge badge-success">'.trans('admin.inStock').'</div>';
    } elseif ($quantity <= 5 && $quantity > 0) {
        $stockLevel = '<div class="badge badge-warning">'.trans('admin.LowStock').'</div>';
    } else {
        $stockLevel = '<div class="badge badge-danger">'.trans('admin.Notavailable').'</div>';
    }

    return $stockLevel;
}


function setActiveCategory($category, $output = 'active')
{
    return request()->category == $category ? $output : '';
}


if (!function_exists('comm')) {
    function comm($id) 

    {
          $newes=App\newes::find($id);

         $NumberOFcomment=$newes->comment->count();

        return $NumberOFcomment;
    }
}


if (!function_exists('langs'))
 {
	  function langs()
	{
         if (session()->has('lang'))
          {
         	return session('lang');
         }
         else
         {
         	return settings()->language;
         }

	}

}


if (!function_exists('dirction'))
 {
	  function dirction()
	{
         if (session()->has('lang'))
          {
         	 if (session('lang') == 'ar')
         	 {
         	 	return 'rtl';
         	 }
         	 else
         	 {
         	    return 'ltr';	
         	 }
         }
         else
         {
         	return 'ltr';
         }

	}
	
}

if (!function_exists('settings'))
 {
     function settings()
   {
         return   App\settings::orderBy('id','desc')->first();

   }
}


 


   if (!function_exists('departments'))
 {
     function departments()
   {
         return   App\department::get();

   }
}



///////////////////

if (!function_exists('UserRegistration'))
 {
     function UserRegistration()
   {
         return   App\User::count('id');

   }
}
//////////////////

/////////////////////

if (!function_exists('numberAcessWebsite'))
 {
     function numberAcessWebsite()
   {
    $maxValue=DB::table('numberAcessWebsite')->select('*')->max('numberAcess');
         
           return  $maxValue;
   }
}

/////////////////////

if (!function_exists('get_parent')) {
    function get_parent($id) 
    {
          $dep_arr = [];
           

        $departments = \App\Department::find($id);

       if ( $departments->parent !==null  && $departments->parent > 0)
         {

              
               return get_parent($departments->parent).','.$id;
        }
        else
        {
            return $id;
        }
      
       
       // return json_encode($dep_arr, JSON_UNESCAPED_UNICODE);
    }
}

if (!function_exists('load_dep')) {
    function load_dep($select = null, $dep_hide = null) {

        $departments = \App\Department::selectRaw('dep_name_'.session('lang').' as text')
            ->selectRaw('id as id')
            ->selectRaw('parent as parent')
            ->get(['text', 'parent', 'id']);
        $dep_arr = [];
        foreach ($departments as $department) {
            $list_arr             = [];
            $list_arr['icon']     = '';
            $list_arr['li_attr']  = '';
            $list_arr['a_attr']   = '';
            $list_arr['children'] = [];

            if ($select !== null and $select == $department->id) {

                $list_arr['state'] = [
                    'opened'   => true,
                    'selected' => true,
                    'disabled' => false,
                ];
            }

            if ($dep_hide !== null and $dep_hide == $department->id) {

                $list_arr['state'] = [
                    'opened'   => false,
                    'selected' => false,
                    'disabled' => true,
                    'hidden'   => true,
                ];
            }

            $list_arr['id']     = $department->id;
            $list_arr['parent'] = $department->parent > 0?$department->parent:'#';
            $list_arr['text']   = $department->text;
            array_push($dep_arr, $list_arr);
        }

        return json_encode($dep_arr, JSON_UNESCAPED_UNICODE);
    }
}

if (!function_exists('active_menu')) {
    function active_menu($link) {

        if (preg_match('/'.$link.'/i', Request::segment(2))) {
            return ['menu-open', 'display:block'];
        } else {
            return ['', ''];
        }
    }
}

if (!function_exists('v_image')) {
    function v_image($ext = null) {
        if ($ext === null) {
            return 'image|mimes:jpg,jpeg,png,gif,bmp';
        } else {
            return 'image|mimes:'.$ext;
        }

    }
}

if (!function_exists('aurl')) {
    function aurl($url = null) {
        return url('admin/'.$url);
    }
}

if (!function_exists('datatable_lang')) {
    function datatable_lang() {
        return ['sProcessing' => trans('admin.sProcessing'),
            'sLengthMenu'        => trans('admin.sLengthMenu'),
            'sZeroRecords'       => trans('admin.sZeroRecords'),
            'sEmptyTable'        => trans('admin.sEmptyTable'),
            'sInfo'              => trans('admin.sInfo'),
            'sInfoEmpty'         => trans('admin.sInfoEmpty'),
            'sInfoFiltered'      => trans('admin.sInfoFiltered'),
            'sInfoPostFix'       => trans('admin.sInfoPostFix'),
            'sSearch'            => trans('admin.sSearch'),
            'sUrl'               => trans('admin.sUrl'),
            'sInfoThousands'     => trans('admin.sInfoThousands'),
            'sLoadingRecords'    => trans('admin.sLoadingRecords'),
            'oPaginate'          => [
                'sFirst'            => trans('admin.sFirst'),
                'sLast'             => trans('admin.sLast'),
                'sNext'             => trans('admin.sNext'),
                'sPrevious'         => trans('admin.sPrevious'),
            ],
            'oAria'            => [
                'sSortAscending'  => trans('admin.sSortAscending'),
                'sSortDescending' => trans('admin.sSortDescending'),
            ],
        ];
    }
}

 