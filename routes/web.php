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

//三択アプリのログイン後のホーム画面
Route::get('/', App\Http\Controllers\Santaku\IndexController::class);

Route::get('/new', App\Http\Controllers\Santaku\NewController::class);

Route::get('/santakuset', App\Http\Controllers\Santaku\SantakusetController::class);

//Route::post('/create', App\Http\Controllers\Santaku\CreateController::class);
Route::match(['get','post'],'/create', App\Http\Controllers\Santaku\CreateController::class);


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
