<?php

use App\Http\Controllers\Auth\GetAccessController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/dashboard', [\App\Http\Controllers\DashboardController::class, 'create'])
    ->middleware(['auth', 'verified','member'])->name('dashboard');
Route::get('/invoices', [\App\Http\Controllers\InvoiceController::class, 'create'])
    ->middleware(['auth', 'verified','member'])->name('invoices');
Route::get('/docs', [\App\Http\Controllers\DashboardController::class, 'create'])
    ->middleware(['auth', 'verified','member'])->name('docs');
Route::get('/fees', [\App\Http\Controllers\FeeController::class, 'create'])
    ->middleware(['auth', 'verified','member'])->name('fees');

Route::middleware(['auth','member'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('getaccess', [GetAccessController::class, 'create'])
    ->name('getaccess');

//Route::get('enrolment', [\App\Http\Controllers\EnrolmentController::class, 'index']);

//Route::get('autocomplete', [GetAccessController::class, 'autocomplete'])->name('autocomplete');

Route::get('wizard', [ 'middleware' => 'wizard', function () {
    return view('default');
}]);

require __DIR__.'/auth.php';
