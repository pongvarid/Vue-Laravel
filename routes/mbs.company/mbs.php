<?php

Route::resource('/mbs/setting', MbsController\SettingController::class);

Route::resource('/mbs/form', MbsController\FormController::class);

Route::post('/mbs/setting/image', MbsController\SettingController::class.'@imageUpoad');
Route::resource('/mbs/choice', MbsController\Choice\ChoiceController::class);
Route::resource('/mbs/choice/detail', MbsController\Choice\ChoiceDetailController::class);
Route::resource('/mbs/choice/table', MbsController\Choice\ChoiceTableController::class);

Route::get('/mbs/join/{table_name}', MbsController\Table\TableController::class.'@join');

?>