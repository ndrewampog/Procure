<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;


use App\User;
use App\Notification;
use Auth;
use View;
use Cookie;
use Carbon\Carbon;

abstract class Controller extends BaseController
{
	use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
	public function __construct()
	{
		
		$lists = User::where('role','=','Normal User')->count();

view()->share('lists',$lists);
			

	
	}
}