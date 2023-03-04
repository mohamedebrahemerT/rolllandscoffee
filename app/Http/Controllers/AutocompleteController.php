<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class AutocompleteController extends Controller
{
      function index()
    {
     return view('autocomplete');
    }

    function fetch(Request $request)
    {

     if($request->get('query'))
     {
     

     if (session('lang')=='ar')
      {
           $query = $request->get('query');
      $data = DB::table('productes')
        ->where('title_name_ar', 'LIKE', "%{$query}%")
        ->get();
      $output = '<ul class="dropdown-menu" style="display:block; position:absolute">';
      foreach($data as $row)
      {
       $output .= '
       <li><a href='.url('/').'/single-product_sreach/'.$row->id.'>'.$row->title_name_ar.'</a></li>
       ';
      }
      $output .= '</ul>';
      echo $output;
     }
     elseif (session('lang')=='en')

      {
          
           $query = $request->get('query');
      $data = DB::table('productes')
        ->where('title_name_en', 'LIKE', "%{$query}%")
        ->get();
      $output = '<ul class="dropdown-menu" style="display:block; position:relative">';
      foreach($data as $row)
      {
       $output .= '
       <li><a href='.url('/').'/single-product_sreach/'.$row->id.'>'.$row->title_name_en.'</a></li>
       ';
      }
      $output .= '</ul>';
      echo $output;
     }


     }

    }
}
