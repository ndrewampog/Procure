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


class SeniorCitizenController extends Controller
{
    public function SeniorCitizenprofile()
    {
        return view('page.SeniorCitizen.sc-profile');
    }
    public function indexSeniorCitizen()
    {  

        $UserLoc = UserLocation::where('user_id','=',Auth::User()->id)->where('visit','=','1')->count();

        return view('page.SeniorCitizen.sc-index',compact('UserLoc'));
    }

    public function SeniorCitizenuseregloc(Request $request)
    {   
        $UserLoc = UserLocation::where('user_id','=',Auth::User()->id)->count();
        if ($UserLoc > 0) {

            $user = UserLocation::where('user_id','=',Auth::User()->id)->get();
            $user_id = [];
            foreach ($user as $ids) {
                array_push($user_id, $ids->id);
            }
            $id = implode(',',$user_id);
            $user2 = UserLocation::find($id);

            $location = UserLocation::find($user2->id);
            $location->user_id     = $user2->user_id;
            $location->visit       = '1';
            $location->lat         = $user2->lat;
            $location->lng         = $user2->lng;
            $location->save();

        }else{

            $user = UserInformation::where('user_id','=',Auth::User()->id)->get();
            $user_id = [];
            foreach ($user as $ids) {
                array_push($user_id, $ids->id);
            }
            $id = implode(',',$user_id);
            $user2 = UserInformation::find($id);

            $location = new UserLocation;
            $location->user_id     = $user2->user_id;
            $location->visit       = '1';
            $location->lat         = $user2->lat;
            $location->lng         = $user2->lng;
            $location->save();
        }
        return Redirect::back();
    }

    public function SeniorCitizenlocupda(Request $request)
    {   
        $UserLoc = UserLocation::where('user_id','=',Auth::User()->id)->count();
        if ($UserLoc > 0) {

            $user = UserLocation::where('user_id','=',Auth::User()->id)->get();
            $user_id = [];
            foreach ($user as $ids) {
                array_push($user_id, $ids->id);
            }
            $id = implode(',',$user_id);
            $user2 = UserLocation::find($id);

            $location = UserLocation::find($user2->id);
            $location->visit       = '1';
            $location->lat         = Input::get('lat');
            $location->lng         = Input::get('lng');
            $location->save();

        }else{


            $location = new UserLocation;
            $location->user_id     = Auth::User()->id;
            $location->visit       = '1';
            $location->lat         = Input::get('lat');
            $location->lng         = Input::get('lng');
            $location->save();

        }
        return Redirect::back();
    }

    public function SeniorCitizenmedInfo($medicine_id)
    {
        $medicine = Medicine::find($medicine_id);
        return view('page.SeniorCitizen.sc-medicine-information',compact('medicine'));
    }

    public function SeniorCitizenaddCart(Request $request)
    {
        $cart = Mycart::where('user_id','=',Auth::User()->id)->count();
        if ($cart > 0) {
            $medicine_id = $request['medicine_id'];
            $medicine = Mycart::where('medicine_id','=',$medicine_id)->count();
            if ($medicine > 0) {
                $medicine_id = Mycart::where('medicine_id','=',$medicine_id)->get();
                $medi_id = [];
                foreach ($medicine_id as $id) {
                    array_push($medi_id, $id->mycart_id);
                }
                $medici_id = implode(',',$medi_id);
                $medi = Mycart::where('mycart_id','=',$medici_id)->get();
                $medi_quantity = [];
                foreach ($medi as $id) {
                    array_push($medi_quantity, $id->medicine_quantity);
                }
                $quantity = implode(',',$medi_quantity);

                $new = $request['medicine_quantity'];

                $cart = Mycart::find($medici_id);
                $cart->medicine_quantity = $quantity + $new;
                $cart->save();

                //pagmenus sa quantity sa medicine
                $medini = Medicine::where('medicine_id','=',$request['medicine_id'])->get();

                $quantity = [];
                foreach ($medini as $id) {
                    array_push($quantity, $id->medicine_quantity);
                }
                $quantity_old = implode(',',$quantity);
                $update_medicine = Medicine::find($request['medicine_id']);
                $update_medicine->medicine_quantity = $quantity_old - $request['medicine_quantity'];
                $update_medicine->save();

            }else{
                $cart = new Mycart;
                $cart->user_id     = $request['user_id'];
                $cart->medicine_id         = $request['medicine_id'];
                $cart->medicine_price         = $request['medicine_price'];
                $cart->medicine_quantity     = $request['medicine_quantity'];
                $cart->save();

                //pagmenus sa quantity sa medicine
                $medini = Medicine::where('medicine_id','=',$request['medicine_id'])->get();

                $quantity = [];
                foreach ($medini as $id) {
                    array_push($quantity, $id->medicine_quantity);
                }
                $quantity_old = implode(',',$quantity);



                $update_medicine = Medicine::find($request['medicine_id']);
                $update_medicine->medicine_quantity = $quantity_old - $request['medicine_quantity'];
                $update_medicine->save();
            }
        }else{
            $cart = new Mycart;
            $cart->user_id     = $request['user_id'];
            $cart->medicine_id         = $request['medicine_id'];
            $cart->medicine_price         = $request['medicine_price'];
            $cart->medicine_quantity     = $request['medicine_quantity'];
            $cart->save();

                //pagmenus sa quantity sa medicine
            $medini = Medicine::where('medicine_id','=',$request['medicine_id'])->get();

            $quantity = [];
            foreach ($medini as $id) {
                array_push($quantity, $id->medicine_quantity);
            }
            $quantity_old = implode(',',$quantity);



            $update_medicine = Medicine::find($request['medicine_id']);
            $update_medicine->medicine_quantity = $quantity_old - $request['medicine_quantity'];
            $update_medicine->save();
        }

        return Redirect::back();
    }

    public function SeniorCitizenmyCart()
    {
        $carts = Mycart::where('user_id','=',Auth::User()->id)->get();

        $carts_id = [];
        foreach ($carts as $id) {
            array_push($carts_id, $id->medicine_id);
        } 
        $count = 0;
        //get all the id of userinformation
        $info = array();
        foreach ($carts_id as $id2) {
            $medicineinfo = Medicine::where('medicine_id','=',$id2)->get();
            foreach ($medicineinfo as $id3) {
                array_push($info, $id3->user_id);
            }
            $count++;
        }
        $vals = array_count_values($info);
        $pharmacistCount= count($vals);

        $count_carts = Mycart::where('user_id','=',Auth::User()->id)->count();
        $shippingfee = ShippingFee::all();

        $fee = [];
        foreach ($shippingfee as $id) {
            array_push($fee, $id->shipping_fees);
        } 

        $totalfee = implode(',',$fee);
        return view('page.SeniorCitizen.sc-my-cart',compact('carts','count_carts','pharmacistCount','totalfee'));

    }        

    public function SeniorCitizenmydeleteCart($id)
    {     
        $delete = Mycart::find($id);
        $delete->delete();

        return Redirect::back();

    }    

    public function SeniorCitizenproceedOrder(Request $request)
    {
        $cart = new HistoryCart;
        $cart->user_id = Auth::User()->id;
        $cart->historycart_discount =  $request['historycart_discount'];
        $cart->status_delivery =  'Order Confirmation';
        $cart->historycart_total_item =  $request['historycart_total_item'];
        $cart->historycart_shipping_fee =  $request['historycart_shipping_fee'];
        $cart->historycart_total_price =  $request['historycart_total_prices'];

        $cart->save();
        $historycart_id = $cart->historycart_id;
        $medicine_order = $request['mycart_id'];
        $count = 0;
        foreach ($medicine_order as $id) {
            $med = Mycart::find($id);

            $order = new HistoryItem;
            $order->historycart_id = $historycart_id;
            $order->medicine_id = $med->medicine_id;
            $order->historyitem_price = $med->medicine_price;
            $order->historyitem_quantity = $med->medicine_quantity;
            $order->save();

            $delete = Mycart::find($id);
            $delete->delete();

            $count++;
        }
        return Redirect::back();
    }

    public function SeniorCitizenreproceedOrder(Request $request)
    {
        $cart = new HistoryCart;
        $cart->user_id = Auth::User()->id;
        $cart->historycart_discount =  $request['historycart_discount'];
        $cart->status_delivery =  'Order Confirmation';
        $cart->historycart_total_item =  $request['historycart_total_item'];
        $cart->historycart_shipping_fee =  $request['historycart_shipping_fee'];
        $cart->historycart_total_price =  $request['historycart_total_prices'];
        $cart->save();

        $historycart_id = $cart->historycart_id;
        $medicine_id =  $request['medicine_id'];
        $historyitem_quantity =  $request['historyitem_quantity'];
        $historyitem_price =  $request['historyitem_price'];

        $count = 0;
        foreach ($medicine_id as $id1) {
            $order = new HistoryItem;
            $order->historycart_id = $historycart_id;
            $order->medicine_id = $id1;
            //$historyitem_quantity[$count]  purpose ana word na [$count] kay array man ang $historyitem_quantity 
            $order->historyitem_quantity = $historyitem_quantity[$count];
            $order->historyitem_price = $historyitem_price[$count];
            $order->save();
            $count++;
        }
        return Redirect::back();
    }

    public function SeniorCitizenhistoryCartList()
    {
        $cart_order_confirmations = HistoryCart::where('user_id','=',Auth::User()->id)->where('status_delivery','=','Order Confirmation')->get();
        $cart_shippeds = HistoryCart::where('user_id','=',Auth::User()->id)->where('status_delivery','=','Shipped')->get();
        $cart_cancel_purchases = HistoryCart::where('user_id','=',Auth::User()->id)->where('status_delivery','=','Cancel Order')->get();
        $cart_delivereds = HistoryCart::where('user_id','=',Auth::User()->id)->where('status_delivery','=','Delivered')->get();
        return view('page.SeniorCitizen.sc-history-purchase-list',compact('cart_cancel_purchases','cart_order_confirmations','cart_shippeds','cart_delivereds'));
    }   

    public function SeniorCitizenhistoryPurchaseInfo($historycart_id)
    {
        $cart = HistoryCart::find($historycart_id);
        $items = HistoryItem::where('historycart_id','=',$historycart_id)->get();

        $carts_id = [];
        foreach ($items as $id) {
            array_push($carts_id, $id->medicine_id);
        } 
        //get all the id of userinformation
        $count = 0;
        $info = array();
        foreach ($carts_id as $id2) {
            $medicineinfo = Medicine::where('medicine_id','=',$id2)->get();
            foreach ($medicineinfo as $id3) {
                array_push($info, $id3->user_id);
            }
            $count++;
        }
        $vals = array_count_values($info);
        $pharmacistCount= count($vals);

        $shippingfee = ShippingFee::all();

        $fee = [];
        foreach ($shippingfee as $id) {
            array_push($fee, $id->shipping_fees);
        } 

        $totalfee = implode(',',$fee);
        return view('page.SeniorCitizen.sc-history-view-purchase-information',compact('cart','items','totalfee','pharmacistCount'));
    }   

    public function SeniorCitizenhistoryForRePurchaseInfo($historycart_id)
    {
        $cart = HistoryCart::find($historycart_id);
        $items = HistoryItem::where('historycart_id','=',$historycart_id)->get();

        //kuhaon nimo ang id sa tanan medicine
        $medicine_id = [];
        foreach ($items as $id) {
            array_push($medicine_id, $id->medicine_id);
        } 

        //next kay kuhaon nimo ang quantity sa tanan medicine na naa sa historyitem 
        $count = 0;
        $qty = array();
        foreach ($medicine_id as $id2) {
            $medicinequan = Medicine::where('medicine_id','=',$id2)->get();
            foreach ($medicinequan as $id3) {
                array_push($qty, $id3->medicine_quantity);
            }
            $count++;
        }


        //next kay kuhaon nimo ang quantity sa tanan historyitem katong gepalit na sa user ha 

        $quantity = [];
        foreach ($items as $id) {
            array_push($quantity, $id->historyitem_quantity);
        } 
        //ecompare nimo ang current quantity sa gepalit sauna sa user
        $result = [];
        for($i = 0; $i < count($qty);$i++){
            $result[] = (($qty[$i] <= $quantity[$i]) ? 'Not Available': 'Available');
        }
        //diri kay etrap niya if naa bay not available na medicine
        if (in_array("Not Available", $result)) 
        { 
            $stock = "Not Available";
        } 
        else
        { 
            $stock = "Available";
        } 

        $carts_id = [];
        foreach ($items as $id) {
            array_push($carts_id, $id->medicine_id);
        } 
        $count = 0;
        //get all the id of userinformation
        $info = array();
        foreach ($carts_id as $id2) {
            $medicineinfo = Medicine::where('medicine_id','=',$id2)->get();
            foreach ($medicineinfo as $id3) {
                array_push($info, $id3->user_id);
            }
            $count++;
        }
        $vals = array_count_values($info);
        $pharmacistCount= count($vals);
        $shippingfee = ShippingFee::all();
        $fee = [];
        foreach ($shippingfee as $id) {
            array_push($fee, $id->shipping_fees);
        } 
        $totalfee = implode(',',$fee);

        $medicines = Medicine::all();

        return view('page.SeniorCitizen.sc-view-history-for-repurchase-information',compact('cart','items','stock','totalfee','pharmacistCount','medicines'));
    }   


    public function SeniorCitizenhistoryPurchasecancel($historycart_id)
    {

        $update = HistoryCart::find($historycart_id);
        $update->status_delivery = 'Cancel Order';
       $update->save();


$current = Carbon::now()->toDateString();
       
        $penalty = Penaltize::where('user_id','=',Auth::User()->id)->count();
        $penalty_info = Penaltize::where('user_id','=',Auth::User()->id)->get();
        $penalty_id = [];
        foreach ($penalty_info as $id) {
            array_push($penalty_id, $id->penalty_id);
        } 


        if($penalty == 0){
            $pena = new Penaltize;
            $pena->user_id = Auth::User()->id;
            $pena->penalty_count = '1';
            $pena->penalty_duration = $current;
            $pena->penalty_status = "Normal";
            $pena->save();

        }else{
            foreach ($penalty_id as $id) {
                $pena = Penaltize::find($id);
                if ($pena->penalty_count == 1) {
                    $pena->penalty_count = $pena->penalty_count +'1';
                    $pena->penalty_duration = $current;
                    $pena->save();


                    $pena = new Notification;
                    $pena->sender_id = '1';
                    $pena->receive_id = Auth::User()->id;
                    $pena->notification_message = 'mao si bla naa nalang ka last na pag cancel sa order kay ma suspenso ka 7 if mo cancel pajd ka lain';
                    $pena->save();



                }elseif ($pena->penalty_count == 2) {
                    $pena->penalty_count = $pena->penalty_count +'1';

                    $pena->penalty_duration = $current;
                    $pena->penalty_status = "Suspended";  
                    $pena->save();

                    $pena = new Notification;
                    $pena->sender_id = '1';
                    $pena->receive_id = Auth::User()->id;
                    $pena->notification_message = 'mao si bla naa nalang ka last na pag cancel sa order kay ma suspenso ka 7 if mo cancel pajd ka lain';
                    $pena->save();

                }elseif ($pena->penalty_count == 4) {
                    $pena->penalty_count = $pena->penalty_count +'1';
                    $pena->penalty_duration = $current;
                    $pena->penalty_status = "Normal";  
                    $pena->save();

                    $pena = new Notification;
                    $pena->sender_id = '1';
                    $pena->receive_id = Auth::User()->id;
                    $pena->notification_message = 'mao si bla naa nalang ka last na pag cancel sa order kay ma suspenso ka 7 if mo cancel pajd ka lain';
                    $pena->save();

                }elseif ($pena->penalty_count == 5) {
                    $pena->penalty_count = $pena->penalty_count +'1';
                    $pena->penalty_duration = $current;
                    $pena->penalty_status = "Permanent Suspension";  
                    $pena->save();

                    $pena = new Notification;
                    $pena->sender_id = '1';
                    $pena->receive_id = Auth::User()->id;
                    $pena->notification_message = 'mao si bla naa nalang ka last na pag cancel sa order kay ma suspenso ka 7 if mo cancel pajd ka lain';
                    $pena->save();

                } else {
                }
            }
        }




        return Redirect::back();
    }   


    public function SeniorCitizenlistMed(Request $request)
    {

        /*get all the pharmacist that status are approved*/
        $pharma = User::where('role', '=','Pharmacist')->where('status','=','Approved')->get();
        $pharmaID = [];
        foreach ($pharma as $id1) {
            array_push($pharmaID, $id1->id);
        }
        $count = 0;
        //get all the id of userinformation
        $info = array();
        foreach ($pharmaID as $id2) {
            $pharmaInfo = UserInformation::where('user_id','=',$id2)->get();
            foreach ($pharmaInfo as $id3) {
                array_push($info, $id3->id);
            }
            $count++;
        }
        /*end get the get all the pharmacist that status are approved*/

        /*get the location from */
        $location = UserLocation::where('user_id','=',Auth::User()->id)->get();
        $user_id = [];
        foreach ($location as $ids) {
            array_push($user_id, $ids->id);
        }
        $id = implode(',',$user_id);
        $user = UserLocation::find($id);
        $location_lat = $user->lat;
        $location_lng = $user->lng;
        /*end get the location from */

       // this is the process that how to sort all medicine using the location
        $med_loc = array();
        foreach ($info as $id4) {
            $pharmacy = UserInformation::find($id4);
            $latitudeFrom = $location_lat;
            $longitudeFrom = $location_lng;

            $latitudeTo = $pharmacy->lat;
            $longitudeTo = $pharmacy->lng;

        //Calculate distance from latitude and longitude
            $theta = $longitudeFrom - $longitudeTo;
            $dist = sin(deg2rad($latitudeFrom)) * sin(deg2rad($latitudeTo)) +  cos(deg2rad($latitudeFrom)) * cos(deg2rad($latitudeTo)) * cos(deg2rad($theta));
            $dist    = acos($dist);
            $dist    = rad2deg($dist);
            $miles    = $dist * 60 * 1.1515;
            // Conversion of miles  to kilometers
            $distance = ($miles * 1.609344);


            // 0.62 is a kilometer of a mile 
            // Multiply it by 5 to get the 5 kilometer distance and youll get 3.10686

            if($distance < '3.10686'){
                $med_loc[] = $pharmacy->user_id;
            }
        }
        $medicines = Medicine::whereIn('user_id',$med_loc)->paginate(6);
        $categories = Medicine::whereIn('user_id',$med_loc)->distinct()->get(['medicine_category']);



        return view('page.SeniorCitizen.sc-list-of-medicine',compact('medicines','categories'));
    }   

    public function SeniorCitizensearchcategories(Request $request)
    {


        $search_category =  $request['search_category'];
        $search_range =  $request['search_range'];
        /*get all the pharmacist that status are approved*/
        $pharma = User::where('role', '=','Pharmacist')->where('status','=','Approved')->get();
        $pharmaID = [];
        foreach ($pharma as $id1) {
            array_push($pharmaID, $id1->id);
        }
        $count = 0;
        //get all the id of userinformation
        $info = array();
        foreach ($pharmaID as $id2) {
            $pharmaInfo = UserInformation::where('user_id','=',$id2)->get();
            foreach ($pharmaInfo as $id3) {
                array_push($info, $id3->id);
            }
            $count++;
        }
        /*end get the get all the pharmacist that status are approved*/

        $location = UserLocation::where('user_id','=',Auth::User()->id)->get();
        $user_id = [];
        foreach ($location as $ids) {
            array_push($user_id, $ids->id);
        }
        $id = implode(',',$user_id);
        $user = UserLocation::find($id);
        $location_lat = $user->lat;
        $location_lng = $user->lng;

        $med_loc = array();

        foreach ($info as $id4) {
            $pharmacy = UserInformation::find($id4);
            $latitudeFrom = $location_lat;
            $longitudeFrom = $location_lng;

            $latitudeTo = $pharmacy->lat;
            $longitudeTo = $pharmacy->lng;


            $theta = $longitudeFrom - $longitudeTo;
            $dist = sin(deg2rad($latitudeFrom)) * sin(deg2rad($latitudeTo)) +  cos(deg2rad($latitudeFrom)) * cos(deg2rad($latitudeTo)) * cos(deg2rad($theta));
            $dist = acos($dist);
            $dist = rad2deg($dist);
            $miles = $dist * 60 * 1.1515;


            $distance = ($miles * 1.609344);


            $km = $search_range * 0.62;

            if($distance <= $km){
                $med_loc[] = $pharmacy->user_id;

            } 
        }


        if ($search_category == 'select_all') {
            $medicines = Medicine::all();
        }else{
            $medicines = Medicine::whereIn('user_id',$med_loc)->where('medicine_category','=',$search_category)->get();
        }

        $categories = Medicine::whereIn('user_id',$med_loc)->distinct()->get(['medicine_category']);

        

        return view('page.SeniorCitizen.sc-list-of-searched-medicine-categories',compact('medicines','categories','search_category','search_range'));
    }   






















    public function usercheaperMedicine()
    {
        $carts = HistoryCart::where('user_id','=',Auth::User()->id)->get();
        return view('page.Normal-User.cheaper-nearest-medicine',compact('carts'));

    }   


    public function userbrandedMedicine()
    {
        $carts = HistoryCart::where('user_id','=',Auth::User()->id)->get();
        return view('page.Normal-User.branded-nearest-medicine',compact('carts'));

    }   

   public function MedicineSearch(Request $request)
    {

        $search = Input::get ( 'search_medicine' );
        $medicines = Medicine::where ( 'medicine_brand_name', 'LIKE', '%' . $search . '%' )->orWhere ( 'medicine_generic_name', 'LIKE', '%' . $search . '%' )->paginate(6);

    return view('page.Normal-User.list-of-searched-medicine-brand',compact('medicines'));

    }   




}