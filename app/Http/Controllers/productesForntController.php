<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\product;

class productesForntController extends Controller
{
     

       public function productes()
   {
      
         $productes= product::get();
      return view('forentend.productes.productes',compact('productes'));
   }


        public function productesOverView($id)
   {
         
  $productes=product::inrandomOrder()->take(4)->get();

      
         $product= product::where('id',$id)->first();
      return view('forentend.productesOverView.productesOverView',compact('product','productes'));
   }
}
