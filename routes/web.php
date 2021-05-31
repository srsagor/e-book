<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\ItemTypeController;
use App\Http\Controllers\BookListController;
use App\Http\Controllers\EbookController;
use Illuminate\Support\Facades\Route;

require __DIR__.'/auth.php';

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

Route::get('/', [AuthenticatedSessionController::class, 'create']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::resource('itemstypes', ItemTypeController::class);
Route::get('itemstypes/delete/{id}','App\Http\Controllers\ItemTypeController@destroy');
Route::resource('E-Book', EbookController::class);
Route::match(['get', 'post'],'book-list', 'App\Http\Controllers\BookListController@index');

Route::get('book_details/{id}','App\Http\Controllers\BookListController@details');



