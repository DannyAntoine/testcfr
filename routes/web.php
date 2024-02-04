<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthManager;
use App\Http\Controllers\orderitemController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RequestInsertController;
use App\HTTP\Controllers\pendingcaseController;
use App\HTTP\Controllers\UserProfileController;
use App\HTTP\Controllers\addAgencyController;
use App\HTTP\Controllers\listAgenciesController;
use App\Http\Controllers\NotesController;
use App\Http\Controllers\referrals;
use App\Http\Controllers\listrefferals;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\FileController;
use App\Http\Controllers\ShowEvidenceController;
use App\Http\Controllers\ListReferralController;
use App\Http\Controllers\SaveReferralTypeController;
use App\Http\Controllers\SaveProfileEditsController;
use App\Http\Controllers\CaseController;
use App\Http\Controllers\listFulfillCasesController;
use App\Http\Controllers\FulfilledCaseController;
use App\Http\Controllers\ListDeclinedCasesController;
use App\Http\Controllers\DeclinedCasesController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AddProductController;
use App\Http\Controllers\ListProductController;
use App\Http\Controllers\ClientRecordPdfController;
use App\Http\Controllers\GraphController;
//use App\Http\Controllers\ModalController;
use App\Models\pendingcases;



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

// the following code routs dashboard

//Route:: get('/dashboard', function(){
//   return view('dashboard');
//  });

  
// all the routes should be in the middleware inorder to access them when log in 
Route::middleware(['redirectIfNotLoggedIn'])->group(function () {
  
  Route::get('/dashboard', function () {
      return view('dashboard');
  })->name('dashboard');


Route::get('/pdf-preview', function() {
  $pdf = PDF::loadView('pdf_layout');
return $pdf ->stream();
}) ->name('pdf-preview');  // this route is for testing of the pdf layout after the client is satified with the layout style delete this route 


  Route::get('/view-pdf/{documentId}', [ClientRecordPdfController::class, 'viewPdf'])->name('viewPdf');
  


  Route::get('/dashboard', [DashboardController::class, 'dashboard']) -> name('dashboard');

  // web.php

  Route::get('/_todolist',[DashboardController::class, 'fetchTodoList']) -> name('_todolist');


  // Other protected routes...
  
  Route::get('/allUsers', function(){
      return view('allUsers');
  });
  
  Route::get('/requestform', function(){
      return view('requestform');
  });

  // display route to pendingcases

   Route::get('/pendingcase', function(){
      return view(view:'pendingcase');
  });


  Route::get('/fullfiledcases', [listFulfillCasesController::class, 'showfulfilledcases']);

  Route::get('/updateInventory', [ListProductController:: class,'listProductData']);


  // route to fetch data for graphs 
  Route::get('/fetch-data',[GraphController::class, 'fetchData']);
  Route::get('/fetch-DeclineData', [GraphController::class, 'fetchDeclinedCaseData']);
  Route::get('/fetch-CaseReferalTypeData', [GraphController::class, 'fetchCaseReferalType']);
  Route::get('/fetch-CaseDataByYear', [GraphController::class, 'fetchCaseDataByYear']);
  Route::get('/totalcases', [GraphController::class, 'totalcases']);
  Route::get('/pending-cases-by-year', [GraphController::class, 'fetchPendingCaseDataByYear']);

///************************************************ */
// generate PDF

Route::get('/check-latest-cases', [ClientRecordPdfController:: class, 'checkLatestCases']);




////////////////////////////////////////


  // pulling  items for the pendingcase view from the database and passing it the pendingcase 
   Route::get('pendingcase',[pendingcaseController:: class,'showpendingcases']);

  // return to pending case view from the profile 

  Route::get('/pending-case', [PendingCaseController::class, 'showpendingcases'])->name('pending-case');

   // display route to fullfiled cases

  // Route::get('/fullfiledcases', function(){
    // return view(view:'fullfiledcases');
  //});

  // display route to declined cases

   /*Route::get('/decline', function(){
    return view(view:'decline');
   }); */
   Route::get('/decline', [ListDeclinedCasesController::class, 'showdeclinedcases'])->name('decline');

   // display add agency

   Route::get('/addagency', function(){
     return view(view:'addagency');
   });

   // pulling  items for the listAgency view from the database and passing it the pendingcase 
   Route::get('viewagency',[listAgenciesController::class,'listAgencies']);

  
   Route::post('/upload', [FileController::class, 'uploadFile'])->name('uploadFile');


  

  


  //////////////////////////////////////////////////////////////////////////////////////////////
  //********** adddind routs for the dashboard side nav bar *////////////////////

  //Route::get('/allUsers', [AuthManager::class,'allUsers']) -> name(name:'allUsers');


  Route:: post ('/submit-agency-data', [addAgencyController::class,'postagencydata']) -> name ('submit-agency-data');

  // addeding referrals to the db

  Route:: post ('/submit-referral-data', [referrals::class, 'postreferralType']) -> name ('submit-referral-data');

// pulling items for the viewreferraltype view from the databaae 

Route::get('viewreferraltype', [ListReferralController::class, 'listreferraltypes']);

// the following route is for deleteFile in the evidence section

Route::delete('deleteFile/{id}', [FileController::class, 'deleteFile']) -> name('deleteFile');

// edit documents name 

Route::put('saveNewDocumentName/{id}', [FileController::class, 'saveNewDocumentName']) -> name('saveNewDocumentName');

// save profile edits 

Route::put('saveProfileEdits/{id}', [SaveProfileEditsController::class, 'SaveProfileEdits']) -> name('SaveProfileEdits');
Route::put('SaveFamDemoEdits/{id}', [SaveProfileEditsController::class, 'SavefamdemoEdits']) -> name('SaveFamDemoEdits'); 

// submit case or process the case route

 Route::post('/process-case', [CaseController::class, 'fulfillment'])->name('process-case');



 // this route add a note
  Route::post ('/submit-post-data', [NotesController::class,'postnotes']) -> name ('submit-post-data');
 // this route is for delete a note
  Route::delete('delete/{note_id}', [NotesController::class, 'deleteNote'])->name('delete-note');
  // this route is for edit note
 //This allows the route to handle both GET and PUT requests, so you can use either method to access it.
  Route::match(['get', 'put'], 'edit/{note_id}', [NotesController::class, 'editNote'])->name('edit-note');

  // have note on the text view 
  Route::get('edit-note/{note_id}', [NotesController::class, 'editNoteForm'])->name('edit-note-form'); // to open notes on the modal 

  Route::put('saveEdits/{note_id}', [NotesController::class, 'saveEdits']) -> name('saveEdits');

  // completing case
  Route::post('/fulfillment', [CaseController::class, 'fulfillment'])->name('fulfillment.store');
  Route::post('/decline', [CaseController::class, 'decline'])->name('decline.store');

// adding items to inventory 

Route::post('/product.add', [AddProductController::class ,'addItem'])->name('product.add');

  Route::post('/save-checkboxes', [SaveReferralTypeController::class,'saveReferralCheckBoxes']) -> name('savereferral');


  // Route::get('modal', [NotesController::class, 'modaldata'])->name('modal'); i dont have modal data cant remember why i have this here

 // testing this 
 Route::get('modal/{note_id}', [ModalController::class, 'loadModal'])->name('modal');
 


 // *** todo list routes **

 // Route for creating a task
Route::post('/save-todo', [DashboardController::class, 'create_task'])->name('save-todo');

// test pull current state

Route::post('/pull-current-state', [DashboardController::class, 'updatedState']) -> name('pull-current-state');

// Route for updating task status
Route::post('/update-todo-status/{id}', [DashboardController::class, 'update_status'])->name('update-todo-status');








 // display route to profile 
 Route::get('/profile', function(){
  return view (view:'profile');
 }); 

 Route::get('/fulfilled-cases-profile', function(){
  return view (view:'fulfilled-cases-profile');
 }) -> name('fulfilled-cases-profile'); 
 // get addreferraltype view


 Route::match(['get', 'put'], 'fulfilled-cases-profile', [FulfilledCaseController::class, 'showProfile'])->name('fulfilled-cases-profile');

 // open declined case profile

 Route::match(['get', 'put'], 'declinedcasesprofile', [DeclinedCasesController::class, 'showProfile']) ->name ('declinedcasesprofile');


  Route::get('/addreferraltype', function() {
     return view (view: 'addreferraltype');
  });

  // get viewreferraltype view 

  //Route::get('/viewreferraltype', function() {
    //return view (view: 'viewreferraltype');
  //});


  
   // route to view agency migh come back here 
  // Route::get('/viewagency', function(){
  //return view(view:'viewagency');
 // });
  
 Route::get('/family-demographics', function(){
   return view(view:'family-demographics');
 });


 /*Route:: get('/updateInventory', function(){
  return view(view:'updateInventory');
 }); */


 Route:: get('/viewInventory', function(){
  return view(view:'viewInventory');
 });
 ///////////////////////////////////////////////////////////////////////////////////////////////


 // pulling  items for the request view from the database and passing it the request from 
 Route::get('requestform',[orderitemController:: class,'showkitchenitems']);


 // route to handle submission of request form data into database

 Route::get('postdata','RequestInsertController@insform'); // this route is used to display the form view when /postdata is accessed 

   
 Route::post('requestFormData',[RequestInsertController::class, 'postdata'])->name('postdata');

 //Route::get('profile', [UserProfileController::class, 'showProfile'])->name('profile');  wee can reuse this later
 Route::match(['get', 'put'], 'profile', [UserProfileController::class, 'showProfile'])->name('profile'); // experemental 

// the following code creates a get request for logout 

Route::get('/logout', [AuthManager::class, 'logout']) -> name(name:'logout');


});


////////////////////////////////////////////////////////////////////////////////
//                                                                            //
//    OUTSIDE THE MIDDLE WARE                                                 //
////////////////////////////////////////////////////////////////////////////////

// the following code creates the GET request for the login
Route::get('/', [AuthManager::class, 'login']) -> name(name: 'login');
Route::get('login', [AuthManager::class, 'login']) -> name(name: 'login'); // was a test might remove it 
// the following code creates the  POST request for the login 
Route::post('login', [AuthManager::class, 'loginPOST']) -> name(name: 'login.post');

// the following code creates the GET request for the register 
Route::get('/register', [AuthManager::class, 'register']) -> name(name:'register');
// the following code creates the POST request for the registration
Route::post('/register', [AuthManager::class,'registerPOST']) -> name(name:'register.post');
