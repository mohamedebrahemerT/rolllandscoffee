<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
 use App\Department;
use App\product;
use App\otherData;

class sectionsController extends Controller
{
      public function index()
    {
  
        $departments=Department::take(6)->get();

  return view('forentend.ustralia.ustralia',compact('departments'));

    }

    

 

    

    
}
