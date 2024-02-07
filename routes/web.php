<?php

use App\Models\BusinessHour;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\BusinessHourController;
use App\Http\Controllers\UserController;

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
Route::get('/success',[AppointmentController::class, 'success'])->name('success');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'admin'])->name('admin.')->prefix('admin')->group(function(){
Route::get('/', [AdminController::class, 'index'])->name('index');
Route::get('business-hours', [BusinessHourController::class, 'index']);
Route::post('business-hours', [BusinessHourController::class, 'update'])->name('business_hours.update');
Route::get('user_list',[UserController::class, 'index'])->name('userlist');
});

require __DIR__.'/auth.php';

