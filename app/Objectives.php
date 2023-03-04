<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Objectives extends Model
{
   protected $table="Objectives";
   protected $fillable=[
       "id",
     'title_name_en',
	'title_name_ar',
 

	'Objectives_name_en',
	'Objectives_name_ar',
 
	'photo',

   ];

   	 



}
