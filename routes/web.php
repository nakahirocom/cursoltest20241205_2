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

Route::middleware('auth')->group(function () {
    Route::get('/', App\Http\Controllers\Santaku\IndexController::class)->name('index');

    Route::get('/new', App\Http\Controllers\Santaku\NewController::class)->name('new');

    Route::get('/santakuset', App\Http\Controllers\Santaku\SantakusetController::class)->name('santakuset');

    Route::get('/edit/{questionId}', App\Http\Controllers\Santaku\EditController::class)->name('edit');

    Route::get('/list', App\Http\Controllers\Santaku\ListController::class)->name('list');

    Route::get('/question', App\Http\Controllers\Santaku\QuestionController::class)->name('question');

    Route::post('/create', App\Http\Controllers\Santaku\CreateController::class)->name('create.index');

    Route::get('/answer', App\Http\Controllers\Santaku\AnswerController::class)->name('answer');

    Route::post('/answer', App\Http\Controllers\Santaku\AnswerController::class)->name('answer.index');

    Route::get('/update/{questionId}', App\Http\Controllers\Santaku\UpdateController::class)->name('update.put');

    //Route::post('/update', App\Http\Controllers\Santaku\UpdateController::class)->name('update.list');
    Route::put('/update/{questionId}', App\Http\Controllers\Santaku\UpdateController::class)->name('update.put');

    Route::delete('/delete/{questionId}', \App\Http\Controllers\Santaku\DeleteController::class)->name('delete');

 //とき直しモード
    Route::get('/mistake', App\Http\Controllers\Santaku\MistakeController::class);

    Route::get('/incorrect', App\Http\Controllers\Santaku\IncorrectListController::class);

    Route::post('/check_register', [App\Http\Controllers\TestController::class,'register'])->name('check.register');


});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
