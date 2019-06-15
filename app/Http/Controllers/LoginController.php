<?php

namespace App\Http\Controllers;


use Request;
use Redirect;
use App\User;
use Validator;
use Hash;
use Auth;

class LoginController extends Controller
{

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function login(){
        $request = Request::all();
      //  dd($request);
        $username = $request['username'];
        $pass = $request['password'];



        if (Auth::attempt(['username' => $username,'password' => $pass])) {
            if (Auth::user()->status == 'Approved') {
                if(Auth::user()->role == 'Admin'){
                    return Redirect::intended('/Administrator/index');
                }
                elseif (Auth::user()->role == 'Normal User'){
                    return Redirect::intended('/Normal-User/index');
                }
                elseif (Auth::user()->role == 'Pharmacist'){
                    return Redirect::intended('/Pharmacist/index');
                }
                elseif (Auth::user()->role == 'PWD'){
                    return Redirect::intended('/PWD/index');
                }
                elseif (Auth::user()->role == 'Senior Citizen'){
                    return Redirect::intended('/SeniorCitizen/index');
                }
                elseif (Auth::user()->role == 'Courier'){
                    return Redirect::intended('/Courier/index');
                }
            }else{
                return Redirect::to('/')->with('message', 'Please Verify your email!');
            }
        }
        else{
            // Session::flash('message', 'Something is wrong'); 
            return Redirect::to('/')->with('message', 'Username/Password is incorrect!');
        }

    }


    public function logout(){
        Auth::logout();
        return Redirect::to('/'); 
    }
}
