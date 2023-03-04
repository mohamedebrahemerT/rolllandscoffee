<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\WhoWeAre;
use App\Objectives;
use App\ourTeam;
use App\VisionMission;
use App\Ourworks;

class AboutController extends Controller
{
    public function About()
    {

       
   $WhoWeAre=WhoWeAre::orderBy('id', 'asc')->first();
   $Objectives=Objectives::orderBy('id', 'asc')->first();



  
 

  return view('forentend.About.About',compact('WhoWeAre','Objectives'));

    }

    public function Values()
    {

       
   $WhoWeAre=WhoWeAre::where('id',2)->first();
   
 

  return view('forentend.About.Values',compact('WhoWeAre'));

    }

     

    public function VisionMission()
    {

       
   $WhoWeAre=WhoWeAre::orderBy('id', 'asc')->first();
   $Objectives=Objectives::get();
    $Vision=VisionMission::where('id', 1)->first();
   $Mission=VisionMission::where('id', 2)->first();

   $ourTeams=ourTeam::orderBy('id', 'asc')->take(6)->get();
   $ourTeams2=ourTeam::orderBy('id', 'des')->take(6)->get();
 

  return view('forentend.VisionMission.VisionMission',compact('WhoWeAre','Vision','Mission','Objectives','ourTeams','ourTeams2'));

    }


      public function WhyHonesty()
    {

       
   $Ourworks=Ourworks::get();
  return view('forentend.WhyHonesty.WhyHonesty',compact('Ourworks'));

    }





   public function Objectives()
    {

      
   $Objectives=Objectives::get();

  return view('forentend.Objectives.Objectives',compact('Objectives'));

    }

     public function ourTeam()
    {

       
   $ourTeams=ourTeam::orderBy('id', 'asc')->take(6)->get();
  

  return view('forentend.ourTeam.ourTeam',compact('ourTeams'));

    }



    
}
