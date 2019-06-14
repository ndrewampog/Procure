<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mycart extends Model
{
	protected $primaryKey = 'mycart_id';
	protected $fillable = ['user_id','medicine_id','medicine_price','medicine_quantity'];

	public function medicineList(){
		return $this->hasOne('App\Medicine','medicine_id','medicine_id');
	}	
}
