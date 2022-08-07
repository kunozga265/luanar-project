<?php

use App\Http\Controllers\AppController;
use App\Http\Controllers\Web\ArticleController;
use App\Http\Controllers\Web\DatasetController;
use App\Http\Controllers\Web\KeywordController;
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
    return view('pages.home');
})->name('home');

Route::get('/publications',[
    ArticleController::class,'index'
])->name('publications');

Route::get('/datasets', [
    DatasetController::class,'index'
])->name('datasets');

Route::get('/keywords/{slug}', [
    KeywordController::class,'show'
])->name('keywords');

Route::post('/search', [
    AppController::class,'search'
])->name('search');

Route::get('/upload', [
    AppController::class,'create'
])->name('upload');

Route::post('/upload/store', [
    AppController::class,'store'
])->name('upload.store');
