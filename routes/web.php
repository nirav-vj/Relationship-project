<?php

use App\Http\Controllers\BusinessController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Models\User;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;




// ->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

Route::get('/', function () {
    return view('dashboard');
});

Route::get('/user/create',[UserController::class,'create'])->name('user');

Route::group([],function () {
    
        Route::post('/user',[UserController::class,'store']);
        Route::get('/users',[UserController::class,'index']);
        Route::get('/user/edit/{id}',[UserController::class,'edit']);
        Route::post('/user/update/{id}',[UserController::class,'update']);
        Route::get('/user/delete/{id}',[UserController::class,'destroy']);
        Route::get('/user/trash',[UserController::class,'trash']);
        Route::get('/user/restore/{id}',[UserController::class,'restore']);
        Route::get('/user/force-delete/{id}',[UserController::class,'forcedelete']);
        Route::post('/user/upload',[UserController::class,'upload']);

});

Route::group([],function () {
        Route::get('/business/create',[BusinessController::class,'create'])->name('business');
        Route::post('/business',[BusinessController::class,'store']);
        Route::get('/businesses',[BusinessController::class,'index']);
        Route::get('/business/edit/{id}',[BusinessController::class,'edit']);
        Route::post('/business/update/{id}',[BusinessController::class,'update']);
        Route::get('/business/delete/{id}',[BusinessController::class,'destroy']);
        Route::get('/business/trash',[BusinessController::class,'trash']);
        Route::get('/business/restore/{id}',[BusinessController::class,'restore']);
        Route::get('/business/force-delete/{id}',[BusinessController::class,'forcedelete']);
        Route::post('/business/upload',[BusinessController::class,'upload']);

});

Route::group([],function () {
        Route::get('/location/create',[LocationController::class,'create'])->name('location');
        Route::post('/location',[LocationController::class,'store']);
        Route::get('/locations',[LocationController::class,'index']);
        Route::get('/location/edit/{id}',[LocationController::class,'edit']);
        Route::post('/location/update/{id}',[LocationController::class,'update']);
        Route::get('/location/delete/{id}',[LocationController::class,'destroy']);
        Route::get('/location/trash',[LocationController::class,'trash']);
        Route::get('/location/restore/{id}',[LocationController::class,'restore']);
        Route::get('/location/force-delete/{id}',[LocationController::class,'forcedelete']);
        Route::post('/location/upload',[LocationController::class,'upload']);

});
require __DIR__.'/auth.php';