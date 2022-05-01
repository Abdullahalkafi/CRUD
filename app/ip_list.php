<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ip_list extends Model
{
    protected $table = 'ip_list';
	public $timestamps = false;
	protected $primaryKey = 'id';
}
