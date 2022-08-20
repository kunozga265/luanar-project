<?php

use App\Http\Controllers\AppController;
use App\Http\Controllers\Web\ArticleController;
use App\Http\Controllers\Web\AuthorController;
use App\Http\Controllers\Web\DatasetController;
use App\Http\Controllers\Web\KeywordController;
use App\Http\Controllers\Web\ProjectController;
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

Route::post('/publications/verify/{id}', [
    ArticleController::class,'verify'
])->name('publications.verify');

Route::get('/datasets', [
    DatasetController::class,'index'
])->name('datasets');

Route::post('/datasets/verify/{id}', [
    DatasetController::class,'verify'
])->name('datasets.verify');

Route::get('/keywords/{slug}', [
    KeywordController::class,'show'
])->name('keywords');

Route::get('/projects-and-outreach-programs', [
    ProjectController::class,'index'
])->name('projects');

Route::post('/projects-and-outreach-programs/verify/{id}', [
    ProjectController::class,'verify'
])->name('projects.verify');

Route::get('/projects-and-outreach-programs/upload', [
    ProjectController::class,'create'
])->name('projects.create');

Route::post('/projects-and-outreach-programs/upload', [
    ProjectController::class,'store'
])->name('projects.store');

Route::post('/projects/search', [
    ProjectController::class,'search'
])->name('projects.search');

Route::get('/experts', [
    AuthorController::class,'index'
])->name('experts');

Route::post('/experts/search', [
    AuthorController::class,'search'
])->name('experts.search');

Route::post('/experts/verify/{id}', [
    AuthorController::class,'verify'
])->name('experts.verify');

Route::get('/experts/view/{id}', [
    AuthorController::class,'show'
])->name('experts.show');

Route::get('/experts/add', [
    AuthorController::class,'create'
])->name('experts.create');

Route::post('/experts/store', [
    AuthorController::class,'store'
])->name('experts.store');

Route::get('/experts/edit/{id}', [
    AuthorController::class,'edit'
])->name('experts.edit');

Route::post('/experts/update/{id}', [
    AuthorController::class,'update'
])->name('experts.update');

Route::post('/experts/delete/{id}', [
    AuthorController::class,'trash'
])->name('experts.delete');

Route::post('/search', [
    AppController::class,'search'
])->name('search');

Route::get('/upload', [
    AppController::class,'create'
])->name('upload');

Route::post('/upload/store', [
    AppController::class,'store'
])->name('upload.store');
