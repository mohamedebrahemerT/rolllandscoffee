<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AfterPaymentorder_product extends Model {
	protected $table    = 'AfterPaymentorder_product';
	protected $fillable = [
		        'id',
			'order_id',
			'product_id',
			 'price',
			'quantity',
			'Total',
	];

	 	   public function order_id() {
        return $this->hasOne('App\AfterPaymentOrders', 'id', 'order_id');
    }

    	 	   public function product_idd() {
        return $this->hasOne('App\product', 'id', 'product_id');
    }



}
