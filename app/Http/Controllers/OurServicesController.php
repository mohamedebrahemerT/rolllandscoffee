<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Department;

class OurServicesController extends Controller
{

	   public function OurServices()
    {
    	            $departments= Department::get();

    

   return view('forentend.OurServices.OurServices',compact('departments'));
    }

    	   public function OurServicesOverview($id)
       {
    	 
       $departments= Department::where('id',$id)->first();

                   $randdepartments= Department::take(5)->get();

   return view('forentend.OurServicesOverview.OurServicesOverview',compact('departments','randdepartments'));
       }

    
    
}
