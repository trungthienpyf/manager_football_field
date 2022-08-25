<?php

use App\Http\Controllers\AreaController;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\PitchController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/login', [AuthController::class,'viewSignIn'])->name('login');
Route::get('/register', [AuthController::class,'viewSignUp'])->name('register');
Route::post('/signup', [AuthController::class,'adminSignUp'])->name('signup');
Route::post('/signin', [AuthController::class,'adminSignIn'])->name('signin');
Route::get('/logout', [AuthController::class,'logout'])->name('logout');
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function (){
        return view('admin.layout.master');
    })->name('index');

    Route::get('/area', [AreaController::class,'index'])->name('area.index');
    Route::get('/area/create', [AreaController::class,'create'])->name('area.create');
    Route::get('/area/{id}', [AreaController::class,'show'])->name('area.show');
    Route::get('/area/calendar/{id}', [AreaController::class,'calendarBooking'])->name('area.calendarBooking');
    Route::post('/area', [AreaController::class, 'store'])->name('area.store');
    Route::get('/area/edit/{area}', [AreaController::class, 'edit'])->name('area.edit');
    Route::put('/area/{area}', [AreaController::class, 'update'])->name('area.update');
    Route::delete('/area/{area}', [AreaController::class, 'destroy'])->name('area.destroy');
    Route::post('/area/create_multiple', [PitchController::class, 'CreatePitchMultiple'])->name('area.create_multiple');


    Route::get('/pitch', [PitchController::class,'index'])->name('pitch.index');
    Route::get('/pitch/create', [PitchController ::class,'create'])->name('pitch.create');
    Route::post('/pitch', [PitchController ::class, 'store'])->name('pitch.store');
    Route::get('/pitch/edit/{pitch}', [PitchController ::class, 'edit'])->name('pitch.edit');
    Route::put('/pitch/{pitch}', [PitchController ::class, 'update'])->name('pitch.update');
    Route::delete('/pitch/{pitch}', [PitchController ::class, 'destroy'])->name('pitch.destroy');

    Route::get('/booking', [BookingController::class,'index'])->name('booking.index');
    Route::post('/booking/accept', [BookingController ::class, 'accept_booking'])->name('booking.accept');
    Route::post('/booking/checkBill', [BookingController ::class, 'checkBill'])->name('booking.checkBill');
    Route::get('/booking/detail/{bill}', [BookingController ::class, 'detail_Bill'])->name('booking.detail_Bill');

    Route::delete('/booking/cancel', [BookingController ::class, 'cancel_booking'])->name('booking.cancel');

});
