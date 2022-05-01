<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = 'tbl_customer_registration';
	public $timestamps = false;
	protected $primaryKey = 'cu_id';
}
