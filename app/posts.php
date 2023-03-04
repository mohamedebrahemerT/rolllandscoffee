<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class posts extends Model
{
    	protected $table='posts';
    protected $fillable = ['ID','Title', 'Description','user_id'];

    public function user()
    {
        return $this->belongsTo('App\User'); // links this->course_id to courses.id
    }


}


   