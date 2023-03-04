<?php



namespace App;



use Illuminate\Database\Eloquent\Model;



class AfterPyment extends Model

{

   protected $table="AfterPyment";

   protected $fillable=[

       "id",

   'PAYID',
'email',
'first_name',
'last_name',
'last_name',
'payer_id',
'recipient_name',
'line1',
'city',
'state',
'postal_code',
'country_code',
'total',
'currency',


   ];



   	 







}

