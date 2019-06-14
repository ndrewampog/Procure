<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Penaltize extends Model
{
 	protected $primaryKey = 'penalty_id';
	protected $fillable = ['user_id','penalty_count','penalty_duration','penalty_status'];
}
