<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;
 

class Userss extends Controller
{
    
    public function index()
    {
        //
        return view('c2');
    }


    public function getpost()
    {
        //
        //return  Request()->all();

        $remeber=Request()->has('remember')? true:false ;
     
if ( auth()->attempt( ['email'=>Request('email'),'password'=>Request('password') ],$remeber) )
 {
        return redirect('home');
     }
     else
     {
        return  view('c');
     }
 
}

}