<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\newes;
use App\Objectives;

class newesforentcontrller extends Controller
{
   public function newes()
    {
    $newess= newes::paginate(3);
                   $randomNewess= newes::inrandomOrder()->take(3)->get();
  return view('forentend.newes.newes',compact('newess','randomNewess'));

    }

     public function show($id)
    {
            $randomNewess= newes::take(5)->inRandomOrder()->get();
             
              

              
        $newes=newes::find($id);

         $NumberOFcomment=$newes->comment->count();

         if ($NumberOFcomment)
          {
             $NumberOFcomment=$NumberOFcomment;
         }
         else
         {
            $NumberOFcomment=0;
         }

        return view('forentend.blog-single.blog-single',compact('newes','NumberOFcomment','randomNewess'));
    }

     public function projects($id)
    {
            $randomNewess= Objectives::take(5)->inRandomOrder()->get();
             
              

              
        $newes=Objectives::find($id);

         

        return view('forentend.blog-single.projects',compact('newes','randomNewess'));
    }

    
}
