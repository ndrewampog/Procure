<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HistoryItem extends Model
{
    protected $primaryKey = 'historyitem_id';
	protected $fillable = ['historycart_id','medicine_id','historyitem_quantity','historyitem_price'];

         public function carts(){
 	return $this->belongTo('App\HistoryCart');
 }


	public function medicineHistoryList(){
		return $this->hasOne('App\Medicine','medicine_id','medicine_id');
	}	
}
