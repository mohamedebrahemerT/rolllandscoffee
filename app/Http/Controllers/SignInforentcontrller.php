<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
    use App\photoes;
    use App\filess;

class SignInforentcontrller extends Controller
{
     public function SignIn()
    {
                    $photoes=photoes::orderBy('id', 'decs')->first();


                            $photoes=$photoes->id;


             $file_id=$photoes;
                           $filess=filess::where('relation_id',$file_id)->get();
  return view('forentend.SignIn.SignIn',compact('filess'));

    }
}
