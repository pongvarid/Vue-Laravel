<?php

Route::resource('/mbs/setting', MbsController\SettingController::class);
Route::post('/mbs/setting/image', MbsController\SettingController::class.'@imageUpoad');
Route::resource('/mbs/choice', MbsController\Choice\ChoiceController::class);
Route::resource('/mbs/choice/detail', MbsController\Choice\ChoiceDetailController::class);

?>