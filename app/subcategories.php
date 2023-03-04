<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class subcategories extends Model
{
   protected $table="subcategories";
   protected $fillable=[
       "id",
   
 'subcategories_name_en',
'subcategories_name_ar',

'Maincategories_name_en',
'Maincategories_name_ar',

'measure_name_en',
'measure_name_ar',

'Maincategories_id',
'photo',

   ];

   	 
 function Maincategories_idd()
   {
   	         return $this->hasOne('App\Maincategories','id','Maincategories_id');
   }


}
