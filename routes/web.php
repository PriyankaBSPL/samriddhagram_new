<?php

use App\Http\Controllers\Admin\SliderController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\DashboardController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('slider_add',[SliderController::class,'add'])->name('slider_add');
Route::get('slider_list',[SliderController::class,'list'])->name('slider_list');
// Route::group(['prefix'=> 'admin'], function(){
    // Route::group(['middleware'=> 'admin'], function(){
        Route::get('/login',[LoginController::class,'index'])->name('login');
        Route::post('/authenticate',[LoginController::class,'authenticate'])->name('authenticate');
        Route::get('/logout',[LoginController::class,'logout'])->name('logout');
        Route::get('/dashboard',[DashboardController::class,'dashboard'])->name('dashboard');
    // });
// });
