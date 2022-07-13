<?php



use App\Http\Controllers\ClientProcessController;
use Illuminate\Support\Facades\Route;
Route::get('/', [ClientProcessController::class,'index'])->name('index');
Route::get('/{pitch}', [ClientProcessController::class,'detail_pitch'])->name('detail');
Route::get('/booking/{pitch}', [ClientProcessController::class,'booking'])->name('booking');
Route::post('/pending/{pitch}', [ClientProcessController::class,'pending'])->name('pending');
