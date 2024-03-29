<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Medicine extends Model
{
	protected $primaryKey = 'medicine_id';
	protected $fillable = ['user_id','category_id','medicine_image','medicine_generic_name','medicine_brand_name','medicine_classification','medicine_price','medicine_quantity','medicine_description','medicine_volume','medicine_category','medicine_stocks','medicine_status'];

    public function userpharma(){
        return $this->hasOne('App\User','id','user_id');
    }
	public function medicineCategoryList(){
		return $this->hasOne('App\Medicine','medicine_id','medicine_id');
	}

}