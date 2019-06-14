<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserImage extends Model
{
    protected $primaryKey = 'id';
	protected $fillable = ['user_id','pharma_certificate'];
}
