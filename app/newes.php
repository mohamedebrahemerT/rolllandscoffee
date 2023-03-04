<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class newes extends Model
{
    protected $table = 'newes';
    protected $fillable = [
        'id',
        'title',
        'adby',
        'desc',
        'continent',
        'file',
    ];
	

    public function user_id()
    {
        return $this->hasOne('App\User', 'id', 'adby');

    }

    public function comment()
    {
        return $this->hasMany('App\comment', 'newes_id', 'id');

    }


}
