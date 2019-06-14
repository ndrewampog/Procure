<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserInformation extends Model
{
    protected $primaryKey = 'id';
	protected $fillable = ['user_id','fname','mname','lname','birthday','civil_status','gender','contact','lat','lng','profile_image','pwd_id_number','pwd_image_id','senior_id_number','senior_image_id','pharma_name','pharma_logo','pharma_website','date_certified','date_expiration'];
}
