<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payments extends Model
{
    protected $primaryKey = 'payment_id';
	protected $fillable = ['user_id','cart_id','address','payment_type'];


    

}
