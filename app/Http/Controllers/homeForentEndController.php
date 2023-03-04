<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\settings;
use App\WhoWeAre;
use App\VisionMission;
use App\Department;
use App\Ourworks;
use App\product;
use App\photoes;
use App\filess;
use App\Objectives;
 use DB;
 
 
class homeForentEndController extends Controller
{
    public function index()
    {

           
   
 
              $photoes=photoes::orderBy('id', 'desc')->first();


                            $photoes=$photoes->id;


             $file_id=$photoes;
                            $filess=filess::where('relation_id',$file_id)->get();


        
  

      $departments=  DB::table('departments')->orderBy('order','ASC')->get();
 

     return view('forentend.home',compact('departments','filess'));

    }

       public function main()
    {


     
        session()->put('lang','en');


             $photoes=photoes::orderBy('id', 'desc')->first();


                            $photoes=$photoes->id;


             $file_id=$photoes;
                           $filess=filess::where('relation_id',$file_id)->get();


    
   $WhoWeAre=WhoWeAre::orderBy('id', 'asc')->first();
   $VisionMission=VisionMission::orderBy('id', 'asc')->first();
   $Objectives=Objectives::orderBy('id', 'asc')->first();


      
  $departments=  DB::table('departments')
            ->whereNull('parent')->orderBy('order','ASC')->get();

 

     return view('forentend.home',compact('WhoWeAre','VisionMission','Objectives','departments','filess'));
      
 

    }

    public function Aboutus()
    {


   $WhoWeAre=WhoWeAre::orderBy('id', 'asc')->first();
   $VisionMission=VisionMission::orderBy('id', 'asc')->first();
            
       return view('forentend.Aboutus.Aboutus',compact('WhoWeAre','VisionMission'));

    }


    

    
}


