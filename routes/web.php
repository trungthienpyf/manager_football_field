<?php

use App\Http\Controllers\AreaController;
use App\Http\Controllers\CategoryPeopleController;
use App\Http\Controllers\FootBallFieldController;
use Illuminate\Support\Facades\Route;
Route::get('/', function () {
    return view('welcome');
});


Route::get('/area', [AreaController::class,'index'])->name('area.index');
Route::get('/area/create', [AreaController::class,'create'])->name('area.create');
Route::post('/area', [AreaController::class, 'store'])->name('area.store');
Route::get('/area/edit/{area}', [AreaController::class, 'edit'])->name('area.edit');
Route::put('/area/{area}', [AreaController::class, 'update'])->name('area.update');
Route::delete('/area/{area}', [AreaController::class, 'destroy'])->name('area.destroy');



Route::get('/category_people', [CategoryPeopleController::class,'index'])->name('category_people.index');
Route::get('/category_people/create', [CategoryPeopleController::class,'create'])->name('category_people.create');
Route::post('/category_people', [CategoryPeopleController::class, 'store'])->name('category_people.store');
Route::get('/category_people/edit/{category}', [CategoryPeopleController::class, 'edit'])->name('category_people.edit');
Route::put('/category_people/{category}', [CategoryPeopleController::class, 'update'])->name('category_people.update');
Route::delete('/category_people/{category}', [CategoryPeopleController::class, 'destroy'])->name('category_people.destroy');

Route::get('/football_field', [FootBallFieldController::class,'index'])->name('football_field.index');
Route::get('/football_field/create', [FootBallFieldController::class,'create'])->name('football_field.create');
Route::post('/football_field', [FootBallFieldController::class, 'store'])->name('football_field.store');
Route::get('/football_field/edit/{category}', [FootBallFieldController::class, 'edit'])->name('football_field.edit');
Route::put('/football_field/{category}', [FootBallFieldController::class, 'update'])->name('football_field.update');
Route::delete('/football_field/{category}', [FootBallFieldController::class, 'destroy'])->name('football_field.destroy');
