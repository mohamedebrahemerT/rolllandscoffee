<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class filess extends Model {
    protected $table    = 'files';
    protected $fillable = [
       
                'id',
                'name',
                'size',
                'file',
                'path',
                'full_file',
                'mum_type',
                'file_type',
                'relation_id',
    ];

    
     

}
