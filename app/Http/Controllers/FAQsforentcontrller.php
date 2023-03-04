<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FAQs;

class FAQsforentcontrller extends Controller
{
    public function FAQs()
    {

       

 
   $FAQs2=FAQs::get();
  

  return view('forentend.FAQs.FAQs',compact('FAQs2'));

    }
}
