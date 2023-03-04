<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
 

class product extends Model
{

 
	    

   protected $table    = 'productes';
   protected $fillable = [
			 "id",
			"title",
			"photo",
			"content",
			"department_id",
			"trad_id",
			"manuf_id",
			"color_id",
			"size_id",
			"currency_id",
			"price",
			"stock",
			"start_at",
			"end_at",
			"start_offer_at",
			"end_offer_at",
			"price_offer",
			"other_data",
			"weight",
			"weight_id",
			"status",
			"reason",
			'calories',
			'order'
			      


   ];
     public function department_name() {
        return $this->hasOne('App\Department', 'id', 'department_id');
    }


     public function filesss() {
      return $this->hasMany('App\filess', 'relation_id', 'id')->where('file_type','productes');
    }

    public function other_data_R() {
		return $this->hasMany('App\otherData', 'product_id', 'id');
	}
///////////////////////////
	  public function trad_idd() {
        return $this->hasOne('App\TradeMark', 'id', 'trad_id');
    }

      public function manuf_idd() {
        return $this->hasOne('App\Manufacturers', 'id', 'manuf_id');
    }

  public function color_idd() {
        return $this->hasOne('App\Color', 'id', 'color_id');
    }

  public function size_idd() {
        return $this->hasOne('App\sizes', 'id', 'size_id');
    }

  public function weight_idd() {
        return $this->hasOne('App\weight', 'id', 'weight_id');
    }




	







    


}
