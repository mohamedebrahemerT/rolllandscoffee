<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Storage;
use App\filess;

class upload extends Controller
{


    public static function upload($test = [])
{
	if (in_array('photo_name',$test))
	 {     
	 	 if ($test['photo_name'] ===null )
	 	  {
	 	           return $test['photo_name']=time();
	 	  }
	 	  else
	 	  {
	 	  	        return $test['photo_name']=$test['photo_name'];
	 	  }
	}

	  if (request()->has($test['file']) &&  $test['upload_type'] == 'single' ) 
                 {
                    if (!empty($test['file']))
                     {
                        Storage::delete($test['delte_file']);
                     }
              return $test['file']=request()->file($test['file'])->store($test['path']);
   
                  
                 }

               
               
                     
                 
                     
                 }


                 public function  delete_image($id)
                 {
                       $file=filesss::find($id);
                       if (!empty($file)) 
                       {
                          Storage::delete($file->full_file);
                        $file->delete();
  
                       }

                        

                 }
               
}
	
    

