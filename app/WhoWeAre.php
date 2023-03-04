<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WhoWeAre extends Model
{
   protected $table="WhoWeAre";
   protected $fillable=[
       "id",
     'title_name_en',
	'title_name_ar',
 

	'WhoWeAre_name_en',
	'WhoWeAre_name_ar',
 
	'photo',

   ];

   	 



}
