<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ourTeam extends Model
{
   protected $table="ourTeam";
   protected $fillable=[
       "id",
    'jobTitle_name_en',
'jobTitle_name_ar',
'name_name_en',
'name_name_ar',
'desc_name_en',
'desc_name_ar',
'photo',
   ];

   	 



}
