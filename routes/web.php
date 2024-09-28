<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CarController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Frontend\PageController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Auth\AdminLoginController;
use App\Http\Controllers\Frontend\RentalController;
use App\Http\Controllers\Frontend\CarController as FrontendCarController;
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


// Frontend

Route::get('/',[PageController::class,'index'])->name('front.index');
Route::get('/about',[PageController::class,'about'])->name('front.about');
Route::get('/car',[PageController::class,'car'])->name('front.car');
Route::get('/contact',[PageController::class,'contact'])->name('front.contact');
Route::get('/car/details/{id}',[FrontendCarController::class,'car_details'])->name('front.car.details');
Route::post('/car/booking',[FrontendCarController::class,'booking_car'])->name('booking.car');


Route::get('/admin/login',[AdminLoginController::class,'login'])->name('login');
Route::post('/admin/authentication',[AdminLoginController::class,'authentication'])->name('admin.authentication');



Route::get('/user/registration',[LoginController::class,'registration'])->name('user.registration');
Route::post('/user/registration/store',[LoginController::class,'registration_store'])->name('user.registration.store');
Route::get('/user/login',[LoginController::class,'user_login'])->name('user.login');
Route::post('/user/authentication',[LoginController::class,'login'])->name('user.authentication');


Route::group(['middleware' => 'auth'], function () {

    Route::group(['as' => 'admin.', 'prefix' => 'admin'], function () {
        Route::get('/dashboard',[AdminController::class,'index'])->name('dashboard');
        Route::get('/get/all/customer', [CustomerController::class, 'get_all_customers'])->name('customer.all.customers');
        Route::get('/get/all/cars', [CarController::class, 'get_all_cars'])->name('car.all.cars');
        Route::resource('/customer', CustomerController::class);
        Route::resource('/car', CarController::class);
        Route::get('/get/all/rentals', [App\Http\Controllers\Admin\RentalController::class, 'get_all_rentals'])->name('all.rentals.info');
        Route::resource('/rental', App\Http\Controllers\Admin\RentalController::class);
    });

});

Route::group(['middleware' => 'auth.customer'], function () {
    Route::get('rental/history', [RentalController::class, 'get_all_rental_history'])->name('user.all.rental.history');
    Route::get('/rentals', [RentalController::class, 'index'])->name('rental.index');
    Route::get('/rental/cancel/{id}', [RentalController::class, 'cancel'])->name('rental.cancel');
});

Route::get('/user/logout', [LoginController::class, 'logout'])->name('user.logout');
