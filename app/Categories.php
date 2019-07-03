<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    protected $primaryKey = 'category_id';
	protected $fillable = ['category_name','category_message','category_status'];

	    public function UserCategory(){
        return $this->hasOne('App\User','id','user_id');
    }

}
