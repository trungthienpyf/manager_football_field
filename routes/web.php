<?php
//
//use App\Http\Controllers\AreaController;
//
//use App\Http\Controllers\PitchController;
//
//
//use App\Http\Controllers\PitchIndexController;
//use Illuminate\Support\Facades\Route;
//Route::get('/', [PitchIndexController::class,'index']);
//Route::get('/', function (){
//    return view('layout.master');
//});
//Route::get('/checkout/{id}', [PitchIndexController::class,'addToCard'])->name('checkout');
//
//
//Route::get('/area', [AreaController::class,'index'])->name('area.index');
//Route::get('/area/create', [AreaController::class,'create'])->name('area.create');
//Route::post('/area', [AreaController::class, 'store'])->name('area.store');
//Route::get('/area/edit/{area}', [AreaController::class, 'edit'])->name('area.edit');
//Route::put('/area/{area}', [AreaController::class, 'update'])->name('area.update');
//Route::delete('/area/{area}', [AreaController::class, 'destroy'])->name('area.destroy');
//
//
//
//
//
//Route::get('/pitch', [PitchController::class,'index'])->name('pitch.index');
//Route::get('/pitch/create', [PitchController ::class,'create'])->name('pitch.create');
//Route::post('/pitch', [PitchController ::class, 'store'])->name('pitch.store');
//Route::get('/pitch/edit/{pitch}', [PitchController ::class, 'edit'])->name('pitch.edit');
//Route::put('/pitch/{pitch}', [PitchController ::class, 'update'])->name('pitch.update');
//Route::delete('/pitch/{pitch}', [PitchController ::class, 'destroy'])->name('pitch.destroy');
