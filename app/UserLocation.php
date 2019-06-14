<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserLocation extends Model
{
    protected $primaryKey = 'id';
	protected $fillable = ['user_id','visit','lat','lng'];
}
