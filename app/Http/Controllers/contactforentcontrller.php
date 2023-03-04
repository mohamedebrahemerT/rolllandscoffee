<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sendcontact;

class contactforentcontrller extends Controller
{
      public function from()
    {
    	
  return view('forentend.contact.from');

    }

     public function contact()
    {
      
  return view('forentend.contact.contact');

    }

       public function Sendcontact()
         {

 
      
            
                   $data= $this->validate(request(),[
               'name' => 'required',
          
                 'email' =>'required',
                'phone'    => 'sometimes|nullable|',
                'CompanyName'    => 'sometimes|nullable|',
                'subject'    => 'sometimes|nullable|',
                'message'    => 'sometimes|nullable|',
            
             
            
            ],[],[
          'name'=>trans('admin.fname'),
          'email'=>trans('admin.email'),
          'phone'=>trans('admin.phone'),
          'CompanyName'=>trans('admin.CompanyName'),
          'subject'=>trans('admin.subject'),
          'message'=>trans('admin.message'),
           
       
          
            

            ]);

                   

         Sendcontact::create($data);


             session()->flash('success',trans('admin.subsharesucess'));
          

         return back();
               


       
            }

}
