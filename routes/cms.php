<?php

Route::middleware(['web', 'auth', 'cms'])
     ->namespace('CMS')->group(function(){

  Route::resource('settings', SettingsController::class);
  Route::resource('security', SecurityController::class);
  Route::resource('activity', ActivityController::class);

  Route::resource('calendar', CalendarController::class);
  Route::resource('shopping', ShoppingController::class);
  Route::resource('Blogger', BlogController::class);

  Route::resource('theme', ThemeController::class);
  Route::resource('pages', PageController::class);
  Route::resource('media', MediaController::class);  

  Route::any('{view?}', AdminController::class);
});
