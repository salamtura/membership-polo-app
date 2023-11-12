<?php

use App\Http\Controllers\Auth\GetAccessController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PitchController;
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
Route::middleware(['auth','member','verified'])->group(function () {
    Route::get('/dashboard', [\App\Http\Controllers\DashboardController::class, 'create'])
        ->name('dashboard');
    Route::get('/invoices', [\App\Http\Controllers\InvoiceController::class, 'index'])
        ->name('invoices');
    Route::get('/invoice-details/{id}', [
        function ($id) {
            return view('invoice-details',
                ['invoice' => \App\Models\Invoice::query()->where('id','=',$id)->first()] );
        }
    ])->name('invoice-details');
    Route::get('/subscriptions', [
        function () {
            return view('subscriptions',
                ['user'=> Auth::user()] );
        }
    ])->name('subscriptions');
    Route::get('/penalties', [
        function () {
            return view('penalties',
                ['user'=> Auth::user()] );
        }
    ])->name('penalties');
    Route::get('/chukkers', [
        function () {
            return view('chukkers',
                ['user'=> Auth::user()] );
        }
    ])->name('chukkers');
    Route::get('/docs', [\App\Http\Controllers\DocumentController::class, 'index'])
        ->name('docs');
    Route::get('/fees', [\App\Http\Controllers\FeeController::class, 'index'])
        ->name('fees');
    Route::get('/notice-board', [\App\Http\Controllers\PostController::class, 'index'])
        ->name('notice-board');
    Route::get('/post-details/{id}', [
        function ($id) {
            return view('post-details',
                ['post' => \App\Models\Post::query()->where('id','=',$id)->first()] );
        }
    ])->name('post-details');
    Route::get('/members', [\App\Http\Controllers\MembersController::class, 'index'])
        ->name('members');
    Route::get('/profile-details', [
        function () {
            return view('profile',
                ['user' => Auth::user()] );
        }
    ])->name('profile-details');
    Route::post('/pay', [PaymentController::class, 'redirectToGateway'])
        ->name('pay');
    Route::get('/payment/callback', [PaymentController::class,'handleGatewayCallback']);


    Route::controller(PitchController::class)->group(function(){
        Route::get('pitch-calendar', 'index');
        Route::post('fullcalenderAjax', 'ajax');

    });
});

Route::middleware(['auth', 'member'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::get('getaccess', [GetAccessController::class, 'create'])
    ->name('getaccess');

Route::get('wizard', [ 'middleware' => 'wizard', function () {
    return view('default');
}]);

require __DIR__.'/auth.php';
