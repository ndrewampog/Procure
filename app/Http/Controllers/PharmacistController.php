<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Request as RequestFacade;
use Illuminate\Http\Request;
use App\Medicine;
use App\MedicineImage;
use App\Categories;
use Auth;
use Redirect;


class PharmacistController extends Controller
{
    public function indexPharmacist()
    {
        return view('page.Pharmacist.index');
    }

    
    public function Pharmacistprofile()
    {

        return view('page.Pharmacist.profile');
    }



    public function PharmaitemList()
    {
      $medicines = Medicine::where('user_id','=',Auth::User()->id)->get();


      $category = \App\Categories::where('category_status','=','Approved')->get();

      return view('page.Pharmacist.store-item-list',compact('medicines','category'));
  }

    public function UpdatePharmaitemList($id)
    { 
        
        $medicine = Medicine::find($id);
        $category = Categories::where('category_status','=','Approved')->get(); 

            
      return view('page.Pharmacist.update-item-list',compact('medicine','category'));
  }

      public function StorePharmaitemList(Request $request,$id)
    { 
        
        $a = Medicine::find($id);

        $a->category_id = $request['category_id']; 

        $a->save();
            
      return Redirect('/Pharmacist/item-list');
  }
  


  public function PharmaaddList(Request $request)
  {
    
   

    if($request->hasFile('medicines')){
        $path = $request->file('medicines')->getRealPath();
        $data = \Excel::load($path)->get();
        if($data->count()){
            foreach ($data as $key => $value) {
                $product_list[] = [
                    'user_id' => Auth::User()->id, 
                    'medicine_generic_name' => $value->medicine_generic_name, 
                    'medicine_brand_name' => $value->medicine_brand_name,
                    'medicine_classification' => $value->medicine_classification, 
                    'medicine_price' => $value->medicine_price, 
                    'medicine_quantity' => $value->medicine_quantity, 
                    'medicine_description' => $value->medicine_description, 
                    'medicine_volume' => $value->medicine_volume, 
                    'medicine_type' => $value->medicine_type, 
                    'medicine_stocks' => "Yes",
                    // 'medicine_stocks_status' => "Yes"

                ];
                // dd($product_list);
                }
                if(!empty($product_list)){
                    Medicine::insert($product_list);

                    \Session::flash('success','File imported successfully.');
                }
            }
        }else{
            \Session::flash('warning','There is no file to import');
        }

        

        return Redirect::back();
    }

    public function PharmadownloadCSV($id){
        $type = 'csv';
        $medicines = Medicine::select('medicine_generic_name','medicine_brand_name','medicine_price','medicine_quantity','medicine_description','medicine_volume','medicine_category','medicine_stocks')->where('user_id','=',Auth::User()->id)->get()->toArray();
        return \Excel::create('Medicines', function($excel) use ($medicines) {
            $excel->sheet('Medicine Details', function($sheet) use ($medicines)
            {
                $sheet->fromArray($medicines);
            });
        })->download($type);

    }




    public function PharmaUploadMedicine(Request $request){


        $a = Medicine::findOrFail($request->medicine_id);


        $medicine_image = RequestFacade::file('medicine_image');
        $destination_path = 'Medicine/';
        $filename = str_random(6).'_'.$medicine_image->getClientOriginalName();
        $medicine_image->move($destination_path, $filename);
        $a->medicine_image = $destination_path . $filename;  
  
        $a->medicine_price         = $request['medicine_price'];
        $a->medicine_quantity     = $request['medicine_quantity'];

      
        $a->save();

        // $category = \App\Category::where('category_status','=','Approved')->get();


        return back();
    }
    /*



    public function PharmaImageUpload(Request $request)
    {
        $fileupload = RequestFacade::file('fileupload');


        $count = 0;
        foreach ($fileupload as $id2) {

            $image = new MedicineImage;

            $image->user_id = Auth::User()->id;
            $destination_path = 'Medicine/';
            $filename = str_random(6).'_'.$id2->getClientOriginalName();
            $id2->move($destination_path, $filename);
            $image->medicine_image = $destination_path . $filename;  

            $image->save();
            $count++;
        }

        return Redirect::back();
    }
*/
    public function PharmaitemInfo($id)
    {
        $medicine = Medicine::find($id);
        return view('page.Pharmacist.item-information',compact('medicine'));
    }


    public function PharmasalesList()
    {   
         $b = \App\Categories::all();
         // $c = \App\Category::where('category_status','=','Approved')->get();
         $c = Medicine::where('category_id','=','1')->get();
         dd($c);
        return view('page.Pharmacist.sales-list');
    }

    public function PharmasalesHistory()
    {
        return view('page.Pharmacist.sales-history');
    }



}
