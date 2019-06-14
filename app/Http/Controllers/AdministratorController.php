<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\UserInformation;

class AdministratorController extends Controller
{

public function indexAdmin()
    {
        return view('page.Administrator.index');


    }

    public function listOfClients()
    {

        $users = User::where('role','=','Pharmacist')->where('status','=','Waiting')->get();

        return view('page.Administrator.list-of-clients', compact('users'));
    }
    
    public function PharmacyRegistrationApproval(Request $request, $id)
    {

        $a = User::find($id);
        // where user is pharmacist
        $a->status  = 'Approved';
        $a->save();

        return redirect('/Administrator/Registration-Approval/');
    }
    public function PharmacyRegistrationDecline(Request $request, $id)
    {
        $a = User::find($id);
        $a->status = 'Declined';
        $a->save();

        return redirect('/Administrator/Registration-Decline/');
    }


}
