<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    protected $primaryKey = 'bank_id';
	protected $fillable = ['payment_id','bank_name','bank_account','bank_password','amount'];

}
