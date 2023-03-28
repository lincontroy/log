<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('/home');
});

Auth::routes();




Route::group(['middleware' => 'auth'], function () {

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

   // more route definitions

   Route::get('/banklogs/{id}', [App\Http\Controllers\BanklogsController::class, 'index'])->name('index');
   Route::get('/buylogs/{id}', [App\Http\Controllers\BanklogsController::class, 'buylogs'])->name('buylogs');

   Route::get('/buycard/{id}', [App\Http\Controllers\CardsController::class, 'cards'])->name('cards');

   Route::get('/buycarditem/{id}', [App\Http\Controllers\CardsController::class, 'buycard'])->name('buycard');
   Route::get('/deposit', [App\Http\Controllers\HomeController::class, 'deposit'])->name('deposit');
   Route::post('post/deposit', [App\Http\Controllers\DepositsController::class, 'store'])->name('store');

   Route::get('accounts/{id}', [App\Http\Controllers\AccountsController::class, 'index'])->name('index');
   Route::get('buyaccount/{id}', [App\Http\Controllers\AccountsController::class, 'index'])->name('index');


});