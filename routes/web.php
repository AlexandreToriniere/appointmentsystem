<?php

use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\BusinessHourController;
use App\Models\BusinessHour;
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

Route::get('business-hours', [BusinessHourController::class, 'index']);
Route::post('business-hours', [BusinessHourController::class, 'update'])->name('business_hours.update');
Route::get('reserve', [AppointmentController::class, 'index']);
Route::post('reserve', [AppointmentController::class, 'reserve'])->name('reserve');

Route::get('/dashboard', function () {
    return view('welcome');
})->middleware(['auth', 'verified'])->name('dashboard');



require __DIR__.'/auth.php';

