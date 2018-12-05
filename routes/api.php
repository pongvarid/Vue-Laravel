<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

include('mbs.company/mbs.php');
include('mbs.company/root.php');

Route::resource('/mbs/table/test', MbsController\Table\TableController::class);
Route::get('/mbs/table/multi/{table_name}', MbsController\Table\TableController::class.'@multipleTable');


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => ['auth']], function() {
 
});


   // --------------------------menu setting--------------------------------------
   Route::resource('/setting/company/branch', Setting\BranchController::class);
   Route::resource('/setting/company/veritrans', Setting\CompanyController::class);
   Route::resource('/setting/user', Setting\UserController::class);
   
   // --------------------------account-------------------------------------------
   Route::resource('/account', Account\AccountController::class);
   Route::resource('/account_call', Account\CallController::class);
   Route::resource('/account_task', Account\TaskController::class);
   Route::resource('/account_event', Account\EventController::class);
   Route::resource('/account_notification', Account\NotificationController::class);

   // --------------------------opportunity-------------------------------------------
   Route::resource('/opportunity', Opportunity\OpportunityController::class);
   Route::resource('/opportunity_call', Opportunity\CallController::class);
   Route::resource('/opportunity_task', Opportunity\TaskController::class);
   Route::resource('/opportunity_event', Opportunity\EventController::class);
   Route::resource('/opportunity_product', Opportunity\OpportunityProductController::class);

   // --------------------------contact-----------------------------------------------
   Route::resource('/contact', Contact\ContactController::class);
   Route::resource('/contact_call', Contact\CallController::class);
   Route::resource('/contact_task', Contact\TaskController::class);
   Route::resource('/contact_event', Contact\EventController::class);

   // --------------------------lead-----------------------------------------------
   Route::resource('/lead', lead\LeadController::class);
   Route::resource('/lead_call', lead\CallController::class);
   Route::resource('/lead_task', lead\TaskController::class);
   Route::resource('/lead_event', lead\EventController::class);
   
   // --------------------------master data-------------------------------------------
   Route::resource('/agent', AgentController::class);
   Route::resource('/product', ProductController::class);
   Route::resource('/supplier', SupplierController::class);
