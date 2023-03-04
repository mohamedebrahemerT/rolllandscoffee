<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FAQs extends Model
{
   protected $table="FAQs";
   protected $fillable=[
       "id",
     'title_name_en',
	'title_name_ar',
 

	'FAQs_name_en',
	'FAQs_name_ar',
 
	'photo',

   ];

   	 



}
