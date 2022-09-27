<?php

use App\Http\Controllers\AppController;
use App\Http\Controllers\Web\ArticleController;
use App\Http\Controllers\Web\AuthorController;
use App\Http\Controllers\Web\DatasetController;
use App\Http\Controllers\Web\DonorController;
use App\Http\Controllers\Web\JournalController;
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

Route::group(['prefix'=>'publications'],function (){
    Route::get('/',[
        ArticleController::class,'index'
    ])->name('articles');

    Route::get('/new',[
        ArticleController::class,'create'
    ])->name('articles.new');

    Route::post('/store',[
        ArticleController::class,'store'
    ])->name('articles.store');

    Route::post('/verify/{id}', [
        ArticleController::class,'verify'
    ])->name('articles.verify');

    Route::post('/trash/{id}', [
        ArticleController::class,'trash'
    ])->name('articles.trash');
});

Route::group(['prefix'=>'datasets'],function (){
    Route::get('/', [
        DatasetController::class,'index'
    ])->name('datasets');

    Route::get('/new', [
        DatasetController::class,'create'
    ])->name('datasets.new');

    Route::post('/store', [
        DatasetController::class,'store'
    ])->name('datasets.store');

    Route::post('/trash/{id}', [
        DatasetController::class,'trash'
    ])->name('datasets.trash');

    Route::post('/verify/{id}', [
        DatasetController::class,'verify'
    ])->name('datasets.verify');
});

Route::group(['prefix'=>'projects-and-outreach-programs'],function (){
    Route::get('/', [
        ProjectController::class,'index'
    ])->name('projects');

    Route::post('/verify/{id}', [
        ProjectController::class,'verify'
    ])->name('projects.verify');

    Route::post('/trash/{id}', [
        ProjectController::class,'trash'
    ])->name('projects.trash');

    Route::get('/upload', [
        ProjectController::class,'create'
    ])->name('projects.create');

    Route::post('/upload', [
        ProjectController::class,'store'
    ])->name('projects.store');

    Route::post('/search', [
        ProjectController::class,'search'
    ])->name('projects.search');
});

Route::group(['prefix'=>'experts'],function (){
    Route::get('/', [
        AuthorController::class,'index'
    ])->name('experts');

    Route::post('/search', [
        AuthorController::class,'search'
    ])->name('experts.search');

    Route::post('/verify/{id}', [
        AuthorController::class,'verify'
    ])->name('experts.verify');

    Route::get('/view/{id}', [
        AuthorController::class,'show'
    ])->name('experts.show');

    Route::get('/add', [
        AuthorController::class,'create'
    ])->name('experts.create');

    Route::post('/store', [
        AuthorController::class,'store'
    ])->name('experts.store');

    Route::get('/edit/{id}', [
        AuthorController::class,'edit'
    ])->name('experts.edit');

    Route::post('/update/{id}', [
        AuthorController::class,'update'
    ])->name('experts.update');

    Route::post('/delete/{id}', [
        AuthorController::class,'trash'
    ])->name('experts.delete');
});

Route::post('/search', [
    AppController::class,'search'
])->name('search');

Route::get('/keywords/{slug}', [
    KeywordController::class,'show'
])->name('keywords');

Route::group(['prefix'=>'journals'],function () {
    Route::get('/', [
        JournalController::class, 'index'
    ])->name('journals');

    Route::post('/', [
        JournalController::class, 'store'
    ])->name('journals.store');

    Route::post('/trash/{id}', [
        JournalController::class, 'trash'
    ])->name('journals.trash');
});

Route::group(['prefix'=>'donors'],function () {
    Route::get('/', [
        DonorController::class, 'index'
    ])->name('donors');

    Route::post('/', [
        DonorController::class, 'store'
    ])->name('donors.store');

    Route::post('/trash/{id}', [
        DonorController::class, 'trash'
    ])->name('donors.trash');
});

/*Route::get('/upload', [
    AppController::class,'create'
])->name('upload');

Route::post('/upload/store', [
    AppController::class,'store'
])->name('upload.store');*/
