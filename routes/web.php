<?php
use App\Events\NotificationEvent;
use App\Events\TasksEvent;
use App\Events\EventsEvent;
use App\Events\BirthdayEvent;
use App\Model\Agent;

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

Route::get('/', function () {
    return view('welcome');
});


// Route::get('/noti', function () {
//     event(new NotificationEvent);
//     return 'noti run';
// });

Route::get('/bd', function () {
        $data = Agent::where('id', 1)->first();
        event(new BirthdayEvent($data));
        return  'bd run';
    });

// Route::get('/task', function () {
//     event(new TasksEvent);
//     return 'task run';
// });

// Route::get('/event', function () {
//     event(new EventsEvent);
//     return 'event run';
// });


/********************mbs sitting*********************** */

Route::get('/setting', function () {
    return view('/mbs/setting');
});
Route::get('/choice', function () {
    return view('/Mbs/choice');
});

Route::get('/choice-detail', function () {
    return view('/Mbs/choice.detail');
});


Route::get('/admin', function () {
    return view('/mbs/admin');
});

Route::resource('/mbs/setting', MbsController\SettingController::class);

/********************mbs sitting*********************** */

Route::get('user/all', 'UserController@user');
Route::post('register', 'UserController@register');
Route::post('login', 'UserController@authenticate');
Route::get('open', 'DataController@open');

Route::group(['middleware' => ['jwt.verify']], function() {
    Route::get('user', 'UserController@getAuthenticatedUser');
    Route::get('closed', 'DataController@closed');
});