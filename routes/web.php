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
    return view('welcome');
});

use App\Http\Controllers\MemoController;
Route::controller(MemoController::class)->middleware('auth')->group(function() {
    Route::get('memo/create', 'add')->name('memo.add');
    Route::post('memo/create', 'create')->name('memo.create');
    Route::get('memo/create', 'index')->name('memo.index');
    Route::get('memo/edit', 'edit')->name('memo.edit');
    Route::post('memo/edit', 'update')->name('memo.update');
    Route::get('memo/delete', 'delete')->name('memo.delete');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

