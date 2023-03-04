<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tbl_login extends Model
{
     protected $table='tbl_login';
    protected $fillable = [
			"first_name",
			"last_name",
			"gender",
			"email",
			"password",
			"address",
			"mobile_no",


    ];
}

