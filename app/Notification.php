<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
	protected $primaryKey = 'notification_id';
	protected $fillable = ['sender_id','receive_id','notification_message'];
}
