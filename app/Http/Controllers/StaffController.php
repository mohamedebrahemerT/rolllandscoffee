<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
 
class StaffController extends Controller
{
      public function Staff()
    {
            
       return view('forentend.Staff.Staff',compact('WhoWeAre','Objectives'));

    }

       public function Ourcustomers()
    {
     
       return view('forentend.Ourcustomers.Ourcustomers');

    }

    
}
