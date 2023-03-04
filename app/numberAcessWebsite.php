<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class numberAcessWebsite extends Model
{
   protected $table    = 'numberAcessWebsite';
   protected $fillable = [
      'id',
      'numberAcess',
      'dateCheck',
      
   ];
 
}


 

