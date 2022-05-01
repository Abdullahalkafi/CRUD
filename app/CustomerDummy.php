<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CustomerDummy extends Model
{

	protected $table = 'tbl_customer_registration_dummy';
	public $timestamps = false;
	protected $primaryKey = 'cu_id';
	//protected 

	//protected $table = 'tbl_customer_registration_dummy';
	//public $timestamps = true;
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	//protected $fillable = ['cu_name','ty_id','station','cu_company','cu_contactno','cu_email','cu_short_name','cu_address','cu_ip','cu_bandwith','cu_youtube','cu_facebook','cu_data','cu_bdix','connect_dt','index_no'];
}
