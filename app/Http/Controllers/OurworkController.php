<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ourworks;
 
class OurworkController extends Controller
{
  
  	   public function Ourwork()
    {
    	            $Ourworks= Ourworks::get();

    

   return view('forentend.Ourwork.Ourwork',compact('Ourworks'));
    }

    


    	   public function OurworkOverview($id)
       {
    	 
       $Ourworks= Ourworks::where('id',$id)->first();

                   $randOurworks= Ourworks::take(5)->get();

   return view('forentend.OurworkOverview.OurworkOverview',compact('Ourworks','randOurworks'));
       }
    
}
