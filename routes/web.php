<?php



use App\Http\Controllers\PitchIndexController;
use Illuminate\Support\Facades\Route;
Route::get('/', [PitchIndexController::class,'index']);
Route::get('/{pitch}', [PitchIndexController::class,'detail_pitch'])->name('detail');

Route::post('/checkout/{id}', [PitchIndexController::class,'addToCard'])->name('checkout');
