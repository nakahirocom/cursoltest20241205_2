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
Route::get('/', App\Http\Controllers\Santaku\IndexController::class)->name('index');

Route::get('/new', App\Http\Controllers\Santaku\NewController::class);

Route::get('/santakuset', App\Http\Controllers\Santaku\SantakusetController::class);

Route::get('/edit', App\Http\Controllers\Santaku\EditController::class);

Route::get('/list', App\Http\Controllers\Santaku\ListController::class);

Route::get('/question', App\Http\Controllers\Santaku\QuestionController::class);

Route::post('/create', App\Http\Controllers\Santaku\CreateController::class)->name('create.index');

Route::post('/anser', App\Http\Controllers\Santaku\AnserController::class)->name('anser.index');

Route::get('/update/{santakuId}', \App\Http\Controllers\Santaku\updateController::class)->name('update.index');

//Route::post('/update', App\Http\Controllers\Santaku\UpdateController::class)->name('update.list');
Route::put('/update/{santakuId}', App\Http\Controllers\Santaku\UpdateController::class)->name('update.put');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
