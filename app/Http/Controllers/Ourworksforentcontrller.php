<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ourworks;

class Ourworksforentcontrller extends Controller
{
      public function Ourworks()
    {
    	            $Ourworks= Ourworks::paginate(12);

  return view('forentend.Ourworks.Ourworks',compact('Ourworks'));

    }
}
