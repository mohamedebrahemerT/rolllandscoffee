<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class settings extends Model
{
	protected $table='settings';
    protected $fillable =[

					"namear",
					"nameaen",
					"email",
					"siteflag",
					"sitesymol",
					"sitesdiscreption",
					"sitemeta",
					"language",
					"status",
					"maintenance",
					'facebookLink',
					'TwitterLink',
					'GmailLink',
					'LinkedinLink',
					'instagramLink',
					'mapLink',
					'phone',
					'address_ar',
					'address_en',
					 ];
}
