<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
    use App\settings;
    use Storage; 
    use up;

class setting extends Controller
{
    
     public function index()
     {
     	return view('Admin.setting.settings');
     } 

          public function setting_store(Request $request)
     {

           


     	     $data= $this->validate(request(),[
             'namear' => 'sometimes|nullable',
             'nameaen' => ['required', 'string', 'max:255'],
             'email' => ['required', 'string', 'email', 'max:255' ],
           'siteflag' => 'sometimes|nullable',
            'sitesymol' => 'sometimes|nullable',
             'sitesdiscreption' => ['required', 'string', 'max:255'],
             'sitemeta' => ['required', 'string', 'max:255'],
             'language' => ['required', 'string', 'max:255'],
             'status' => ['required', 'string', 'max:255'],

             'facebookLink' => ['required', 'string', 'max:255'],
             'TwitterLink' => ['required', 'string', 'max:255'],
             'GmailLink' => ['required', 'string', 'max:255'],
             'LinkedinLink' => ['required', 'string', 'max:255'],
             'instagramLink' => ['required', 'string', 'max:255'],
             'mapLink' => ['required', 'string', 'max:255'],
             'phone' => ['required', 'string', 'max:255'],
             'address_ar' => ['required', 'string', 'max:255'],
             'address_en' => ['required', 'string', 'max:255'],
             'maintenance' => ['required', 'string', 'max:255'],
              



               ],[],[
	          'namear'=>trans('admin.nameofsitearbic'),
	          'nameaen'=>trans('admin.nameofsiteenglish'),
	          'email'=>trans('admin.email'),
	          'siteflag'=>trans('admin.siteflag'),
	          'sitesymol'=>trans('admin.sitesymol'),
	          'sitesdiscreption'=>trans('admin.sitesdiscreption'),
	          'sitemeta'=>trans('admin.sitemeta'),
	          'language'=>trans('admin.language'),
	          'status'=>trans('admin.status'),
              'maintenance'=>trans('admin.maintenance'),
              
              'facebookLink'=>trans('admin.facebookLink'),
              'TwitterLink'=>trans('admin.TwitterLink'),
              'GmailLink'=>trans('admin.GmailLink'),
              'LinkedinLink'=>trans('admin.LinkedinLink'),
              'instagramLink'=>trans('admin.instagramLink'),
            'mapLink'=>trans('admin.mapLink'),
            'phone'=>trans('admin.mapLink'),
            'address_en'=>trans('admin.address_en'),
	          'address_ar'=>trans('admin.address_ar'),
            


                ]);  
 
 
              /*   $data= $this->validate(request(),
               ['siteflag' => 'required| image|mimes:jpg,png,gif,jpeg|max:2048',
            'sitesymol' => 'required|image|mimes:jpg,png,gif,jpeg|max:2048'],
           
             
            
        [],[
            'siteflag'=>trans('admin.siteflag'),
            'sitesymol'=>trans('admin.sitesymol'),
            
            ]);
         */
                 //return request();
             
             
                  $data['siteflag']  = up::upload(
                     [
                        "file"=>"siteflag",
                        "upload_type"=> "single",
                        "delte_file"=> settings()->siteflag,
                        "path" => "settings",

                        

                     ]

                  ); 

                     $data['sitesymol']  = up::upload(
                     [
                        "file"=>"sitesymol",
                        "upload_type"=> "single",
                        "path" => "settings",
                        "delte_file"=>settings()->sitesymol,
                      

                     ]

                  ); 
                  /*
 
                 if (request()->has('siteflag') ) 
                 {
                    if (!empty(settings()->siteflag))
                     {
                        Storage::delete(settings()->siteflag);
                     }
                   $data['siteflag']=request()->file('siteflag')->store('settings');

                      
                  
                 }
                 if (request()->hasfile('sitesymol'))
                  {
                    if (!empty(settings()->sitesymol))
                     {
                        Storage::delete(settings()->sitesymol);
                     }
                     $data['sitesymol']=request()->file('sitesymol')->store('settings');
                     
                 
                     
                 }
                 */

             // $data=request()->except('_token','_method');  

               settings::orderBy('id','desc')->update($data);
             session()->flash('success',trans('admin.dataaddsuccessfully'));
       

        return redirect('admin/settings');

     	//return Request();*/
     } 


}
