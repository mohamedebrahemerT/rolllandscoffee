<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class product_sreach extends Controller
{
   public function product_sreach(Request $request)
   {
             $query = $request->get('query');
       $productes =DB::table('productes')
        ->where('title_name_ar', 'LIKE', "%{$query}%")
        ->get();


        
   }
}
