<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class otherData extends Model
{
        	protected $table='other_datas';
    protected $fillable = ['id','product_id', 'input_key','input_value'];
}



	

