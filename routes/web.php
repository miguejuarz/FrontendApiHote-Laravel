<?php

use App\Http\Controllers\CitiesController;
use App\Http\Controllers\CountriesController;
use App\Http\Controllers\HotelsController;
use App\Http\Controllers\PayController;
use App\Http\Controllers\PaymentsMethodsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoomsController;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Route::get('/dashboard', function () { 
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

//Routes countries-------------------------------------------
Route::get('/countries', [CountriesController::class, 'index'])->name('countries.index');
Route::get('/country', [CountriesController::class, 'create'])->name('country.create');
Route::post('/country', [CountriesController::class, 'store'])->name('country.store');
Route::get('/country/show/{idCountry}', [CountriesController::class, 'show'])->name('country.show');
Route::get('/country/{idCountry}', [CountriesController::class, 'view'])->name('country.view');
Route::put('/country/update', [CountriesController::class, 'update'])->name('country.update');
Route::get('/country/delete/{idCountry}', [CountriesController::class, 'delete'])->name('country.delete');

//Routes cities--------------------------------------------------
Route::get('/cities', [CitiesController::class, 'index'])->name('cities.index');
Route::get('/city', [CitiesController::class, 'create'])->name('city.create');
Route::post('/city', [CitiesController::class, 'store'])->name('city.store');
Route::get('/city/show/{idCity}', [CitiesController::class, 'show'])->name('city.show');
Route::get('/city/{idCity}', [CitiesController::class, 'view'])->name('city.view');
Route::put('/city/update', [CitiesController::class, 'update'])->name('city.update');
Route::get('/city/delete/{idCity}', [CitiesController::class, 'delete'])->name('city.delete');

//Routes Hotels----------------------------------------------------------
Route::get('/hotels', [HotelsController::class, 'index'])->name('hotels.index');
Route::get('/hotel', [HotelsController::class, 'create'])->name('hotel.create');
Route::post('/hotel', [HotelsController::class, 'store'])->name('hotel.store');
Route::get('/hotel/show/{idHotel}', [HotelsController::class, 'show'])->name('hotel.show');
Route::get('/hotel/{idHotel}', [HotelsController::class, 'view'])->name('hotel.view');
Route::put('/hotel/update', [HotelsController::class, 'update'])->name('hotel.update');
Route::get('/hotel/delete/{idHotel}', [HotelsController::class, 'delete'])->name('hotel.delete');

//Routes PaymentsMethods-----------------------------------------------
Route::get('/payments', [PaymentsMethodsController::class, 'index'])->name('payments.index');
Route::get('/payment', [PaymentsMethodsController::class, 'create'])->name('payment.create');
Route::post('/payment', [PaymentsMethodsController::class, 'store'])->name('payment.store');
Route::get('/payment/show/{idPayment}', [PaymentsMethodsController::class, 'show'])->name('payment.show');
Route::get('/payment/{idPayment}', [PaymentsMethodsController::class, 'view'])->name('payment.view');
Route::put('/payment/update', [PaymentsMethodsController::class, 'update'])->name('payment.update');
Route::get('/payment/delete/{idPayment}', [PaymentsMethodsController::class, 'delete'])->name('payment.delete');

//Routes for Pays--------------------------------------------------------
Route::get('/pays', [PayController::class, 'index'])->name('pays.index');
Route::get('/pay', [PayController::class, 'create'])->name('pay.create');
Route::post('/pay', [PayController::class, 'store'])->name('pay.store');
Route::get('/pay/show/{idPay}', [PayController::class, 'show'])->name('pay.show');
Route::get('/pay/{idPay}', [PayController::class, 'view'])->name('pay.view');
Route::put('/pay/update', [PayController::class, 'update'])->name('pay.update');
Route::get('/pay/delete/{idPay}', [PayController::class, 'delete'])->name('pay.delete');

//Routes for Rooms ----------------------------------------------------------
Route::get('/rooms', [RoomsController::class, 'index'])->name('rooms.index');
Route::get('/room', [RoomsController::class, 'create'])->name('room.create');
Route::post('/room', [RoomsController::class, 'store'])->name('room.store');
Route::get('/room/show/{idRoom}', [RoomsController::class, 'show'])->name('room.show');
Route::get('/room/{idRoom}', [RoomsController::class, 'view'])->name('room.view');
Route::put('/room/update', [RoomsController::class, 'update'])->name('room.update');
Route::get('/room/delete/{idRoom}', [RoomsController::class, 'delete'])->name('room.delete');





