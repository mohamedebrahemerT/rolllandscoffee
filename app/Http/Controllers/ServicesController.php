<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
 use App\Department;
use App\product;
use App\otherData;
use App\filess;
use DB;
class ServicesController extends Controller
{
      public function Services()
    {
   $products=product::get();

              $departments=DB::table('departments')
            ->whereNull('parent')->inrandomOrder()->take(6)->get();

  return view('forentend.Services.Services',compact('departments','products'));

    }

     public function getpen($id)
    {
             $products=Department::where('parent',$id)->get();
            $department=Department::where('id',$id)->first();

  return view('forentend.getpen.getpen',compact('department','products'));

    }

      public function pen($id,$dep)
    {
                $pen=product::where('id',$id)->first();

                $department=Department::where('id',$dep)->first();
       
    $products=product::where('department_id',$dep)->inRandomOrder()->take(3)->get();


                  $filess=filess::where('file_type','productes')->
                where('relation_id',$id)->get();

                  
  return view('forentend.pen.pen',compact('pen','department','products','filess'));

    }

        public function pencat($id)
    {
                $pen=product::where('id',$id)->first();
                $dep=$pen->department_id;



                $department=Department::where('id',$dep)->first();
       
    $products=product::where('department_id',$dep)->inRandomOrder()->take(3)->get();

         $filess=filess::where('file_type','productes')->
                where('relation_id',$id)->get();
                  
  return view('forentend.pen.pen',compact('pen','department','products','filess'));

    }

    

    
}
