<?php

use App\Http\Controllers\Admin\AboutController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\ProgramController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Frontend\IndexController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\HomeIntroController;
use App\Http\Controllers\Admin\HomeBannerController;
use App\Http\Controllers\Admin\HomeGalleryController;
use App\Http\Controllers\Admin\YoutubeLinkController;
use App\Http\Controllers\Admin\LatestTrainingController;
use App\Http\Controllers\Admin\TrainingProgramController;
use App\Http\Controllers\Admin\LatestTrainingImageController;
use App\Http\Controllers\Admin\ProgramAndTrainingController;
use App\Http\Controllers\Admin\StatePageController;

Route::get('/', [IndexController::class, 'index']);
Route::resource('/admin/slider', SliderController::class);
Route::resource('/admin/category',CategoryController::class);
Route::resource('/admin/gallery',GalleryController::class);


Route::any('/category_image/delete/{id}', [AdminController::class,'delete_image']);
Route::any('/category_image/update_image/', [AdminController::class,'update_image']);
Route::any('/category_image/add_image/', [AdminController::class,'add_image']);
Route::any('admin/delete_gallery_images/', [AdminController::class,'delete_gallery_images']);

//Route::any('/category_image/add_gallery_image/', [AdminController::class,'add_gallery_image']);

Route::resource('/admin/menu', MenuController::class);

Route::group(['prefix' => 'admin'], function () {
    // Route::group(['middleware'=> 'admin'], function(){
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/authenticate', [LoginController::class, 'authenticate'])->name('authenticate');
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
    // });

    Route::resource('/training', TrainingProgramController::class);
    Route::resource('/youtube', YoutubeLinkController::class);
    Route::resource('/home_gallery', HomeGalleryController::class);
    Route::resource('/home_intro', HomeIntroController::class);
    Route::resource('/program', ProgramController::class);
    Route::resource('/home_banner', HomeBannerController::class);
    Route::resource('/latest_training', LatestTrainingController::class);
    Route::resource('/latest_training_image', LatestTrainingImageController::class);
    Route::resource('/about', AboutController::class);
    Route::resource('/state_page', StatePageController::class);
    Route::resource('/program_and_training', ProgramAndTrainingController::class);
});

Route::get('/about', [IndexController::class, 'about']);
Route::get('/program/{slug}/{id}', [IndexController::class, 'program']);

Route::get('/contact-us', [IndexController::class, 'contact_us']);
Route::post('contactsave', [IndexController::class, 'contactsave'])->name('contactsave');