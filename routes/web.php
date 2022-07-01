<?php



use App\Http\Controllers\PitchIndexController;
use Illuminate\Support\Facades\Route;
Route::get('/', [PitchIndexController::class,'index'])->name('index');
Route::get('/{pitch}', [PitchIndexController::class,'detail_pitch'])->name('detail');
Route::get('/booking/{pitch}', [PitchIndexController::class,'booking'])->name('booking');
Route::post('/pending/{pitch}', [PitchIndexController::class,'pending'])->name('pending');
