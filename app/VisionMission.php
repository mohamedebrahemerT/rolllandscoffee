<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VisionMission extends Model
{
   protected $table="VisionMission";
   protected $fillable=[
       "id",
	'VisionMission_name_en',
	'VisionMission_name_ar',
 

	'title_name_en',
	'title_name_ar',
	 
	'photo',

   ];

   	 



}
