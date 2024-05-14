<?php
use App\Models\Admin\HomeGallery;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\SliderController;


use App\Http\Controllers\Frontend\IndexController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\HomeIntroController;
use App\Http\Controllers\Admin\HomeGalleryController;

use App\Http\Controllers\Admin\YoutubeLinkController;
use App\Http\Controllers\Admin\TrainingProgramController;

Route::get('/', [IndexController::class, 'index']);

// Route::group(['prefix' => 'admin'], function () {
//     // Routes accessible only when authenticated as admin
//       Route::group(['middleware' => ['AdminAuthenticate']], function () {
//         Route::get('/login', [LoginController::class, 'index'])->name('login');
//         Route::post('/authenticate', [LoginController::class, 'authenticate'])->name('authenticate');
//         Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
//         Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
       
//      });
// });

Route::resource('/admin/menu',MenuController::class);

// Route::group(['prefix'=> 'admin'], function(){
    // Route::group(['middleware'=> 'admin'], function(){
        Route::get('/login',[LoginController::class,'index'])->name('login');
        Route::post('/authenticate',[LoginController::class,'authenticate'])->name('authenticate');
        Route::get('/logout',[LoginController::class,'logout'])->name('logout');
        Route::get('/dashboard',[DashboardController::class,'dashboard'])->name('dashboard');
    // });
// });


Route::resource('/training', TrainingProgramController::class);
Route::resource('/youtube', YoutubeLinkController::class);
Route::resource('/home_gallery', HomeGalleryController::class);
Route::resource('/home_intro', HomeIntroController::class);