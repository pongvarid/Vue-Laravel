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
