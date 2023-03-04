<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class comment extends Model
{
    
	protected $table="comments";
	protected $fillable = [ 
		            'id', 
		            'comment',
		            'user_id',
		            'newes_id',
    ];
             // to act like this {{ $comment->user_id()->first()->name }} 
    public function user_id()   
                  
    {
    	return $this->hasOne('App\User','id','user_id');
    	 
    }
                  // to  direct interactive  with  object  like  this  user->name
    //// to  direct interactive    {{ $comment->user->name }}  
      public function user()
    {
    	return $this->hasOne('App\User','id','user_id');
    	 
    }

       public function user1() //the  same hasOne but we reverse paramter or no paramters
    {
    	return $this->belongsTo('App\User','user_id','id');
    	 
    }
}
