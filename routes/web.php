<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/','GuestController@index');


Route::post('/Login-User', 'LoginController@login');
Route::get('/Logout', 'LoginController@logout');


Route::get('/normal-user-registration-form','RegistrationController@registrationFormNormalUser');
Route::post('/normal-user-registration-form','RegistrationController@registrationFormNormalSave');
Route::get('/pharmacy-registration-form','RegistrationController@registrationFormPharmacy');
Route::post('/pharmacy-registration-form','RegistrationController@registrationFormPharmacySave');
Route::get('/pwd-registration-form','RegistrationController@registrationFormPwd');
Route::post('/pwd-registration-form','RegistrationController@registrationFormPwdSave');
Route::get('/senior-citizen-registration-form','RegistrationController@registrationFormSeniorCitizen');
Route::post('/senior-citizen-registration-form','RegistrationController@registrationFormSeniorCitizenSave');

/*Administrator*/
Route::get('/Administrator/index','AdministratorController@indexAdmin');
Route::get('/Administrator/list-of-clients','AdministratorController@listOfClients');
Route::post('/Administrator/Registration-Approval/{id}','AdministratorController@PharmacyRegistrationApproval');
Route::post('/Administrator/Registration-Decline/{id}','AdministratorController@PharmacyRegistrationDecline');

/*Normal User*/
Route::get('/Normal-User/index','NormalUserController@indexUser');
Route::post('/Normal-User/use-register-location','NormalUserController@indexUseruseregloc');
Route::post('/Normal-User/location-update','NormalUserController@indexUserlocupda');

Route::get('/Normal-User/profile/{id}','NormalUserController@indexUserprofile');
Route::get('/Normal-User/list-of-medicine','NormalUserController@userlistMed');

Route::post('/Normal-User/list-of-searched-medicine-categories','NormalUserController@usersearchcategories');

Route::get('/Normal-User/medicine-information/{id}','NormalUserController@usermedInfo');
Route::post('/Normal-User/add-to-cart','NormalUserController@useraddCart');
Route::get('/Normal-User/my-cart','NormalUserController@usermyCart');
Route::post('/Normal-User/delete-order/{id}','NormalUserController@usermydeleteCart');
Route::post('/Normal-User/proceed-with-your-order','NormalUserController@userproceedOrder');
Route::post('/Normal-User/repurchase-your-order','NormalUserController@userreproceedOrder');

Route::get('/Normal-User/history-purchase-list','NormalUserController@userhistoryCartList');
Route::get('/Normal-User/history-view-purchase-information/{id}','NormalUserController@userhistoryPurchaseInfo');
Route::post('/Normal-User/cancel-purchase/{id}','NormalUserController@userhistoryPurchasecancel');
Route::get('/Normal-User/view-history-for-repurchase-information/{id}','NormalUserController@userhistoryForRePurchaseInfo');

Route::post('/Normal-User/list-of-searched-medicine-brand','NormalUserController@MedicineSearch');


Route::get('/Normal-User/nearest-pharmacy','NormalUserController@usernearestPharmacy');
Route::get('/Normal-User/cheaper-nearest-medicine','NormalUserController@usercheaperMedicine');
Route::get('/Normal-User/branded-nearest-medicine','NormalUserController@userbrandedMedicine');

/*Pharmacist*/
Route::get('/Pharmacist/profile/{id}','PharmacistController@Pharmacistprofile');
Route::get('/Pharmacist/index','PharmacistController@indexPharmacist');
Route::get('/Pharmacist/item-list','PharmacistController@PharmaitemList');
Route::get('/Pharmacist/sales-list','PharmacistController@PharmasalesList');
Route::post('/Pharmacist/add-new-medicine','PharmacistController@PharmaaddList');
Route::post('/Pharmacist/upload_medicine_image','PharmacistController@PharmaImageUpload');
Route::post('/Pharmacist/update-medicine','PharmacistController@PharmaUploadMedicine');
Route::get('/Pharmacist/download-csv/{id}','PharmacistController@PharmadownloadCSV');
Route::get('/Pharmacist/update-csv','PharmacistController@PharmaupdateList');
Route::get('/Pharmacist/item-information/{id}','PharmacistController@PharmaitemInfo');
Route::get('/Pharmacist/sale-history','PharmacistController@PharmasalesHistory');

/*PWD*/
Route::get('/PWD/index','PWDController@indexPWD');
Route::post('/PWD/use-register-location','PWDController@PWDuseregloc');
Route::post('/PWD/location-update','PWDController@PWDlocupda');

Route::get('/PWD/profile/{id}','PWDController@PWDprofile');
Route::get('/PWD/list-of-medicine','PWDController@PWDlistMed');

Route::post('/PWD/list-of-searched-medicine-categories','PWDController@usersearchcategories');

Route::get('/PWD/medicine-information/{id}','PWDController@PWDmedInfo');
Route::post('/PWD/add-to-cart','PWDController@PWDaddCart');
Route::get('/PWD/my-cart','PWDController@PWDmyCart');
Route::post('/PWD/delete-order/{id}','PWDController@PWDmydeleteCart');
Route::post('/PWD/proceed-with-your-order','PWDController@PWDproceedOrder');
Route::post('/PWD/repurchase-your-order','PWDController@PWDreproceedOrder');

Route::get('/PWD/history-purchase-list','PWDController@PWDhistoryCartList');
Route::get('/PWD/history-view-purchase-information/{id}','PWDController@PWDhistoryPurchaseInfo');
Route::post('/PWD/cancel-purchase/{id}','PWDController@PWDhistoryPurchasecancel');
Route::get('/PWD/view-history-for-repurchase-information/{id}','PWDController@PWDhistoryForRePurchaseInfo');

Route::post('/PWD/list-of-searched-medicine-brand','PWDController@MedicineSearch');


Route::get('/PWD/nearest-pharmacy','PWDController@PWDnearestPharmacy');
Route::get('/PWD/cheaper-nearest-medicine','PWDController@PWDcheaperMedicine');
Route::get('/PWD/branded-nearest-medicine','PWDController@PWDbrandedMedicine');

/*Senior Citizen*/

Route::get('/SeniorCitizen/index','SeniorCitizenController@indexSeniorCitizen');
Route::post('/SeniorCitizen/use-register-location','SeniorCitizenController@SeniorCitizenuseregloc');
Route::post('/SeniorCitizen/location-update','SeniorCitizenController@SeniorCitizenlocupda');

Route::get('/SeniorCitizen/profile/{id}','SeniorCitizenController@SeniorCitizenprofile');
Route::get('/SeniorCitizen/list-of-medicine','SeniorCitizenController@SeniorCitizenlistMed');

Route::post('/SeniorCitizen/list-of-searched-medicine-categories','SeniorCitizenController@SeniorCitizensearchcategories');

Route::get('/SeniorCitizen/medicine-information/{id}','SeniorCitizenController@SeniorCitizenmedInfo');
Route::post('/SeniorCitizen/add-to-cart','SeniorCitizenController@SeniorCitizenaddCart');
Route::get('/SeniorCitizen/my-cart','SeniorCitizenController@SeniorCitizenmyCart');
Route::post('/SeniorCitizen/delete-order/{id}','SeniorCitizenController@SeniorCitizenmydeleteCart');
Route::post('/SeniorCitizen/proceed-with-your-order','SeniorCitizenController@SeniorCitizenproceedOrder');
Route::post('/SeniorCitizen/repurchase-your-order','SeniorCitizenController@SeniorCitizenreproceedOrder');

Route::get('/SeniorCitizen/history-purchase-list','SeniorCitizenController@SeniorCitizenhistoryCartList');
Route::get('/SeniorCitizen/history-view-purchase-information/{id}','SeniorCitizenController@SeniorCitizenhistoryPurchaseInfo');
Route::post('/SeniorCitizen/cancel-purchase/{id}','SeniorCitizenController@SeniorCitizenhistoryPurchasecancel');
Route::get('/SeniorCitizen/view-history-for-repurchase-information/{id}','SeniorCitizenController@SeniorCitizenhistoryForRePurchaseInfo');

Route::post('/SeniorCitizen/list-of-searched-medicine-brand','SeniorCitizenController@MedicineSearch');


Route::get('/SeniorCitizen/nearest-pharmacy','SeniorCitizenController@SeniorCitizennearestPharmacy');
Route::get('/SeniorCitizen/cheaper-nearest-medicine','SeniorCitizenController@SeniorCitizencheaperMedicine');
Route::get('/SeniorCitizen/branded-nearest-medicine','SeniorCitizenController@SeniorCitizenbrandedMedicine');