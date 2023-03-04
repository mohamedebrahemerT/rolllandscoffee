<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ourworks extends Model
{
   protected $table="Ourworks";
   protected $fillable=[
       "id",
     'title_name_en',
	'title_name_ar',
 

	'Ourworks_name_en',
	'Ourworks_name_ar',
 
	'photo',

   ];

   	 



}
