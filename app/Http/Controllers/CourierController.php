<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Redirect;
use App\Medicine;
use App\Mycart;
use App\HistoryItem;
use App\HistoryCart;
use App\User;
use App\UserInformation;
use App\UserLocation;
use App\Penaltize;
use App\ShippingFee;
use App\Notification;
use Auth;
use Cookie;
use Input;
use Carbon\Carbon;


class CourierController extends Controller
{
    public function CourierUserprofile()
    {
        return view('page.Courier.profile');
    }
    public function indexCourier()
    {  


        return view('page.Courier.index');
    }

    
}