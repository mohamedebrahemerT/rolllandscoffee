<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdvantagesOfPipes extends Model
{
   protected $table="AdvantagesOfPipes";
   protected $fillable=[
       "id",
     'title_name_en',
	'title_name_ar',
 

	'AdvantagesOfPipes_name_en',
	'AdvantagesOfPipes_name_ar',
 
	'photo',

   ];

   	 



}
