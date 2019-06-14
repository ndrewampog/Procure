<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\UserInformation;
use App\UserImage;
use Input;
use Redirect;
use Hash;
use Request;

class RegistrationController extends Controller
{

    public function registrationFormNormalUser()
    {
        return view('page.normal-user-registration-form');
    }

    public function registrationFormNormalSave(Request $request)
    {

        $userexist = User::where('username','=', Input::get('username'))->first();
        if ($userexist === null ) {
            if (Input::get('password') == Input::get('conpass')) {
                $user = new User;
                $user->username         = Input::get('username');
                $user->email            = Input::get('email');
                $user->password         = Hash::make(Input::get('password'));
                $user->role             = 'Normal User';
                $user->status           = 'Waiting';
            }
            $userinfo = new UserInformation;

            $getnumber     =  Input::get('contact');
            $getcode     =  Input::get('code');
            if($getcode == 'ph'){
                $code = 63;
            }elseif($getcode == 'jpn'){
                $code = 81;
            }elseif($getcode == 'kor'){
                $code = 82;
            }
            $cellnum = $code.$getnumber;
            $userinfo->contact = $cellnum;
            $userinfo->fname        = Input::get('fname');
            $userinfo->mname        = Input::get('mname');
            $userinfo->lname        = Input::get('lname');
            $userinfo->gender       = Input::get('gender');
            $userinfo->birthday     = Input::get('birthday');
            $userinfo->civil_status = Input::get('civil_status');  
            $userinfo->lat          = Input::get('lat');  
            $userinfo->lng          = Input::get('lng'); 

            $profile_image = Request::file('profile_image');
            $destination_path = 'Profile/';
            $filename = str_random(6).'_'.$profile_image->getClientOriginalName();
            $profile_image->move($destination_path, $filename);
            $userinfo->profile_image = $destination_path . $filename;  
            
            $user->save();
            $userinfo->user_id = $user->id; 
            $userinfo->save();
        }

        return redirect('/');

    }

    public function registrationFormPharmacy()
    {
        return view('page.pharmacy-registration-form');
    }

    public function registrationFormPharmacySave(Request $request)
    {

        $userexist = User::where('username','=', Input::get('username'))->first();
        if ($userexist === null ) {
            if (Input::get('password') == Input::get('conpass')) {
                $user = new User;
                $user->username         = Input::get('username');
                $user->email            = Input::get('email');
                $user->password         = Hash::make(Input::get('password'));
                $user->role             = 'Pharmacist';
                $user->status           = 'Waiting';
            }
            $userinfo = new UserInformation;

            $getnumber     =  Input::get('contact');
            $getcode     =  Input::get('code');
            if($getcode == 'ph'){
                $code = 63;
            }elseif($getcode == 'jpn'){
                $code = 81;
            }elseif($getcode == 'kor'){
                $code = 82;
            }
            $cellnum = $code.$getnumber;
            $userinfo->contact = $cellnum;
            $userinfo->pharma_name        = Input::get('pharma_name');
            $userinfo->pharma_website        = Input::get('pharma_website');
            $userinfo->date_certified        = Input::get('date_certified');
            $userinfo->date_expiration       = Input::get('date_expiration');
            $userinfo->lat          = Input::get('lat');  
            $userinfo->lng          = Input::get('lng'); 
            $userinfo->pharma_logo     = Input::get('pharma_logo');

            $pharma_logo = Request::file('pharma_logo');
            $destination_path = 'Pharmacist_logo/';
            $filename = str_random(6).'_'.$pharma_logo->getClientOriginalName();
            $pharma_logo->move($destination_path, $filename);
            $userinfo->pharma_logo = $destination_path . $filename;  
            
            $user->save();
            $userinfo->user_id = $user->id; 
            $userinfo->save();
            
            $fileupload       = Request::file('fileupload');


            $count = 0;
            foreach ($fileupload as $id2) {
            $image = new UserImage;

                $image->user_id       = $user->id; 
                $destination_path = 'Pharmacist_logo/';
                $filename = str_random(6).'_'.$id2->getClientOriginalName();
                $id2->move($destination_path, $filename);
                $image->pharma_certificate = $destination_path . $filename;  


                $image->save();
                $count++;
            }
        }

        return redirect('/');

    }

    public function registrationFormPwd()
    {
        return view('page.pwd-registration-form');
    }

    public function registrationFormPwdSave(Request $request)
    {

        $userexist = User::where('username','=', Input::get('username'))->first();
        if ($userexist === null ) {
            if (Input::get('password') == Input::get('conpass')) {
                $user = new User;
                $user->username         = Input::get('username');
                $user->email            = Input::get('email');
                $user->password         = Hash::make(Input::get('password'));
                $user->role             = 'PWD';
                $user->status           = 'Waiting';
            }
            $userinfo = new UserInformation;

            $getnumber     =  Input::get('contact');
            $getcode     =  Input::get('code');
            if($getcode == 'ph'){
                $code = 63;
            }elseif($getcode == 'jpn'){
                $code = 81;
            }elseif($getcode == 'kor'){
                $code = 82;
            }
            $cellnum = $code.$getnumber;
            $userinfo->contact = $cellnum;
            $userinfo->fname            = Input::get('fname');
            $userinfo->mname            = Input::get('mname');
            $userinfo->lname            = Input::get('lname');
            $userinfo->gender           = Input::get('gender');
            $userinfo->birthday         = Input::get('birthday');
            $userinfo->civil_status     = Input::get('civil_status');  
            $userinfo->lat              = Input::get('lat');  
            $userinfo->lng              = Input::get('lng'); 
            $userinfo->senior_id_number = Input::get('senior_id_number'); 

            $profile_image = Request::file('profile_image');
            $destination_path = 'Profile/';
            $filename = str_random(6).'_'.$profile_image->getClientOriginalName();
            $profile_image->move($destination_path, $filename);
            $userinfo->profile_image = $destination_path . $filename;  
            

            $pwd_image_id = Request::file('pwd_image_id');
            $destination_path = 'Profile/';
            $filename = str_random(6).'_'.$pwd_image_id->getClientOriginalName();
            $pwd_image_id->move($destination_path, $filename);
            $userinfo->pwd_image_id = $destination_path . $filename;  
            
            $user->save();
            $userinfo->user_id = $user->id; 
            $userinfo->save();
        }

        return redirect('/');

    }
    public function registrationFormSeniorCitizen()
    {
        return view('page.senior-citizen-registration-form');
    }


    public function registrationFormSeniorCitizenSave(Request $request)
    {

        $userexist = User::where('username','=', Input::get('username'))->first();
        if ($userexist === null ) {
            if (Input::get('password') == Input::get('conpass')) {
                $user = new User;
                $user->username         = Input::get('username');
                $user->email            = Input::get('email');
                $user->password         = Hash::make(Input::get('password'));
                $user->role             = 'Senior Citizen';
                $user->status           = 'Waiting';
            }
            $userinfo = new UserInformation;

            $getnumber     =  Input::get('contact');
            $getcode     =  Input::get('code');
            if($getcode == 'ph'){
                $code = 63;
            }elseif($getcode == 'jpn'){
                $code = 81;
            }elseif($getcode == 'kor'){
                $code = 82;
            }
            $cellnum = $code.$getnumber;
            $userinfo->contact = $cellnum;
            $userinfo->fname            = Input::get('fname');
            $userinfo->mname            = Input::get('mname');
            $userinfo->lname            = Input::get('lname');
            $userinfo->gender           = Input::get('gender');
            $userinfo->birthday         = Input::get('birthday');
            $userinfo->civil_status     = Input::get('civil_status');  
            $userinfo->lat              = Input::get('lat');  
            $userinfo->lng              = Input::get('lng'); 
            $userinfo->senior_id_number = Input::get('senior_id_number'); 

            $profile_image = Request::file('profile_image');
            $destination_path = 'Profile/';
            $filename = str_random(6).'_'.$profile_image->getClientOriginalName();
            $profile_image->move($destination_path, $filename);
            $userinfo->profile_image = $destination_path . $filename;  
            
            $senior_image_id = Request::file('senior_image_id');
            $destination_path = 'Profile/';
            $filename = str_random(6).'_'.$senior_image_id->getClientOriginalName();
            $senior_image_id->move($destination_path, $filename);
            $userinfo->senior_image_id = $destination_path . $filename;  
            
            $user->save();
            $userinfo->user_id = $user->id; 
            $userinfo->save();
        }

        return redirect('/');

    }
}
