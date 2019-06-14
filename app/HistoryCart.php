<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HistoryCart extends Model
{
    protected $primaryKey = 'historycart_id';
	protected $fillable = ['user_id','historycart_discount','status_delivery','historycart_total_items','historycart_shipping_fee','historycart_total_price'];

	   public function AllPurchase(){
        return $this->hasMany('App\HistoryItem','historycart_id','historycart_id');
    }  
}
