<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AppController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\People\FoodpartnersController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/welcome', function () {
    return view('welcome');
});

Route::controller(AppController::class)->group(function () {
    Route::get('/dashboard', 'index')->name('app.index');

    Route::get('/settings', 'settings')->name('app.settings');
    Route::post('/settings/categories', 'categories')->name('app.settings.categories');
   
})->middleware(['auth', 'verified']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    // Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::controller(App\Http\Controllers\People\AdminsController::class)->group(function(){
    Route::get('/admins', 'index')->name('admins.index');
    Route::post('/admins', 'store')->name('admins.store');
    Route::get('/admins/{admin}', 'admin')->name('admins.admin');
})->middleware(['auth', 'verified']);

Route::controller(App\Http\Controllers\People\FoodpartnersController::class)->group(function(){
    Route::get('/foodpartners', 'index')->name('foodpartners.index');
    Route::get('/foodpartners/{partner}', 'partner')->name('foodpartners.partner');
})->middleware(['auth', 'verified']);

require __DIR__.'/auth.php';
