<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\UserInformation;
use App\Categories;
use Input;
use Auth;

class AdministratorController extends Controller
{

public function indexAdmin()
    {
        return view('page.Administrator.index');


    }

    public function AddNewCategory()
    {
        return view('page.Administrator.add-new-category');
    }

    public function AddNewCategorySave(Request $request)
    {


        $category = new Categories;
        $category->user_id = Auth::User()->id;

        $category->category_name        = Input::get('category_name');
       
        $category->category_status      = 'Approved';


        $category->save();
        
      
        return redirect('/Administrator/add-new-category/');
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

        return redirect('/Administrator/list-of-clients/');
    }
    public function PharmacyRegistrationDecline(Request $request, $id)
    {
        $a = User::find($id);
        $a->status = 'Declined';
        $a->save();

        return redirect('/Administrator/list-of-clients/');
    }
    public function ApprovalofCategories(){

        return view('page.Administrator.category-approval');
    }

    public function CategoryApproval(Request $request, $id){
        $a = Categories::find($id);
        // where user is pharmacist
        $a->category_status  = 'Approved';
        $a->save();

        return redirect('/Administrator/list-of-categories/');

    }
        public function CategoryDecline(Request $request, $id){
        $a = Categories::find($id);
        // where user is pharmacist
        $a->category_status  = 'Approved';
        $a->save();

        return redirect('/Administrator/list-of-categories/');

    }
    public function adminprofile(){

        $user = User::find(Auth::User()->id);

     return view('page.Administrator.profile', compact('user'));
    }
    public function adminprofileedit($id){
        $user = User::find($id);
        return view('page.Administrator.update-profile', compact('user'));
    }
    public function adminprofilestore(Request $request,$id){
        $user = User::find($id);
        $user->save();
        $userinfo = UserInformation::find($request['user_info_id']);

        $userinfo->lname  = $request['lname'];
        $userinfo->fname  = $request['fname'];
        $userinfo->mname  = $request['mname'];
        $userinfo->save();
        return redirect('/Administrator/profile');
    }
    public function listOfCategories()
    {   

        $categories = Categories::where('category_status','=','Pending')->get();

        return view('page.Administrator.list-of-categories', compact('categories'));
    }



}
