<?php


use App\Http\Controllers\API\V1\ArticleController;
use App\Http\Controllers\API\V1\AuthorController;
use App\Http\Controllers\API\V1\DatasetController;
use App\Http\Controllers\API\V1\JournalController;
use App\Http\Controllers\API\V1\ProjectController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix'=>'v1'],function (){

    Route::group(['prefix'=>'authors'],function (){

        /*
        |-------------------------------------------------------------------------------
        | Searches authors
        |-------------------------------------------------------------------------------
        | URL:              /api/v1/authors/search/{query}
        | Method:           GET
        | Controller:       API\V1\AuthorController
        | Parameters:       query -> string being searched for
        | Response Body:    Author objects with datasets and articles
        */
        Route::get('/search/{query}',[AuthorController::class,'search']);

        /*
        |-------------------------------------------------------------------------------
        | Gets all the authors
        |-------------------------------------------------------------------------------
        | URL:              /api/v1/authors
        | Method:           GET
        | Controller:       API\V1\AuthorController
        | Response Body:    Author objects with datasets and articles
        */
        Route::get('/',[AuthorController::class,'index']);

        /*
        |-------------------------------------------------------------------------------
        | Gets a single author
        |-------------------------------------------------------------------------------
        | URL:              /api/v1/authors/get/{id}
        | Method:           GET
        | Controller:       API\V1\AuthorController
        | Parameters:       id -> ID of the author
        | Response Body:    Author object with datasets and articles
        */
        Route::get('/get/{id}',[AuthorController::class,'show']);

        /*
        |-------------------------------------------------------------------------------
        | Adds a new author
        |-------------------------------------------------------------------------------
        | URL:              /api/v1/authors
        | Method:           POST
        | Controller:       API\V1\AuthorController
        | Body:             avatar, firstName, middleName, lastName, biography
        | Response Body:    Author object with datasets and articles
        */
        Route::post('/',[AuthorController::class,'store']);

        /*
        |-------------------------------------------------------------------------------
        | Updates author details
        |-------------------------------------------------------------------------------
        | URL:              /api/v1/authors/{id}
        | Method:           POST
        | Controller:       API\V1\AuthorController
         | Body:             avatar, firstName, middleName, lastName, biography
        | Parameters:       id -> ID of the author
        | Response Body:    Author object with datasets and articles
        */
        Route::post('/{id}',[AuthorController::class,'update']);

        /*
        |-------------------------------------------------------------------------------
        | Sends an author to trash
        |-------------------------------------------------------------------------------
        | URL:              /api/v1/authors/trash/{id}
        | Method:           DELETE
        | Controller:       API\V1\AuthorController
        | Parameters:       id -> ID of the author
        | Response Body:    Empty
        */
        Route::delete('/trash/{id}',[AuthorController::class,'trash']);

        /*
        |-------------------------------------------------------------------------------
        | Gets all trashed authors
        |-------------------------------------------------------------------------------
        | URL:              /api/v1/authors/trashed
        | Method:           GET
        | Controller:       API\V1\AuthorController
        | Response Body:    Author objects with datasets and articles
        */
        Route::get('/trashed',[AuthorController::class,'indexTrashed']);

        /*
        |-------------------------------------------------------------------------------
        | Restores trashed author
        |-------------------------------------------------------------------------------
        | URL:              /api/v1/authors/restore/{id}
        | Method:           GET
        | Controller:       API\V1\AuthorController
        | Parameters:       id -> ID of the author
        | Response Body:    Author object
        */
        Route::get('/restore/{id}',[AuthorController::class,'restore']);

        /*
        |-------------------------------------------------------------------------------
        |  Permanently deletes an author and detaches them from existing datasets and articles
        |-------------------------------------------------------------------------------
        | URL:              /api/v1/authors/destroy/{id}
        | Method:           DELETE
        | Controller:       API\V1\AuthorController
        | Parameters:       id -> ID of the author
        | Response Body:    Empty
        */
        Route::delete('/destroy/{id}',[AuthorController::class,'destroy']);

    });

    Route::group(['prefix'=>'articles'],function (){
        /*
       |-------------------------------------------------------------------------------
       | Searches articles
       |-------------------------------------------------------------------------------
       | URL:              /api/v1/articles/search/{query}
       | Method:           GET
       | Controller:       API\V1\ArticleController
       | Parameters:       query -> string being searched for
       | Response Body:    Article objects with journal, keywords and authors
       */
        Route::get('/search/{query}',[ArticleController::class,'search']);

        /*
        |-------------------------------------------------------------------------------
        | Gets all the articles
        |-------------------------------------------------------------------------------
        | URL:              /api/v1/articles
        | Method:           GET
        | Controller:       API\V1\ArticleController
        | Response Body:    Article objects with journal, keywords and authors
        */
        Route::get('/',[ArticleController::class,'index']);

        /*
        |-------------------------------------------------------------------------------
        | Gets a single article
        |-------------------------------------------------------------------------------
        | URL:              /api/v1/articles/get/{id}
        | Method:           GET
        | Controller:       API\V1\ArticleController
        | Parameters:       id -> ID of the article
        | Response Body:    Article object with journal, keywords and authors
        */
        Route::get('/get/{id}',[ArticleController::class,'show']);

        /*
        |-------------------------------------------------------------------------------
        | Adds a new article
        |-------------------------------------------------------------------------------
        | URL:              /api/v1/articles
        | Method:           POST
        | Controller:       API\V1\ArticleController
        | Body:             file, title, year, keywords, authors, abstract, journal_id
        | Response Body:    Article object with journal, keywords and authors
        */
        Route::post('/',[ArticleController::class,'store']);

        /*
       |-------------------------------------------------------------------------------
       | Updates article details
       |-------------------------------------------------------------------------------
       | URL:              /api/v1/articles/{id}
       | Method:           POST
       | Controller:       API\V1\ArticleController
       | Body:             file, title, year, keywords, authors, abstract, journal_id
       | Parameters:       id -> ID of the article
       | Response Body:    Article object with journal, keywords and authors
       */
        Route::post('/{id}',[ArticleController::class,'update']);

        /*
        |-------------------------------------------------------------------------------
        | Sends an article to trash
        |-------------------------------------------------------------------------------
        | URL:              /api/v1/articles/trash/{id}
        | Method:           DELETE
        | Controller:       API\V1\ArticleController
        | Parameters:       id -> ID of the article
        | Response Body:    Empty
        */
        Route::delete('/trash/{id}',[ArticleController::class,'trash']);

        /*
        |-------------------------------------------------------------------------------
        | Gets all trashed articles
        |-------------------------------------------------------------------------------
        | URL:              /api/v1/articles/trashed
        | Method:           GET
        | Controller:       API\V1\ArticleController
        | Response Body:     Article objects with journal, keywords and authors
        */
        Route::get('/trashed',[ArticleController::class,'indexTrashed']);

        /*
        |-------------------------------------------------------------------------------
        | Restores trashed article
        |-------------------------------------------------------------------------------
        | URL:              /api/v1/articles/restore/{id}
        | Method:           GET
        | Controller:       API\V1\ArticleController
        | Parameters:       id -> ID of the article
        | Response Body:     Article object with journal, keywords and authors
        */
        Route::get('/restore/{id}',[ArticleController::class,'restore']);

        /*
        |-------------------------------------------------------------------------------
        | Permanently deletes an article and detaches them from existing keywords and authors
        |-------------------------------------------------------------------------------
        | URL:              /api/v1/articles/destroy/{id}
        | Method:           DELETE
        | Controller:       API\V1\ArticleController
        | Parameters:       id -> ID of the article
        | Response Body:    Empty
        */
        Route::delete('/destroy/{id}',[ArticleController::class,'destroy']);

    });

    Route::group(['prefix'=>'datasets'],function (){
        /*
        |-------------------------------------------------------------------------------
        | Searches datasets
        |-------------------------------------------------------------------------------
        | URL:              /api/v1/datasets/search/{query}
        | Method:           GET
        | Controller:       API\V1\DatasetController
        | Parameters:       query -> string being searched for
        | Response Body:    Dataset objects with journal, keywords and authors
        */
        Route::get('/search/{query}',[DatasetController::class,'search']);

        /*
        |-------------------------------------------------------------------------------
        | Gets all the datasets
        |-------------------------------------------------------------------------------
        | URL:              /api/v1/datasets
        | Method:           GET
        | Controller:       API\V1\DatasetController
        | Response Body:    Dataset objects with journal, keywords and authors
        */
        Route::get('/',[DatasetController::class,'index']);

        /*
        |-------------------------------------------------------------------------------
        | Gets a single dataset
        |-------------------------------------------------------------------------------
        | URL:              /api/v1/datasets/get/{id}
        | Method:           GET
        | Controller:       API\V1\DatasetController
        | Parameters:       id -> ID of the dataset
        | Response Body:    Dataset object with journal, keywords and authors
        */
        Route::get('/get/{id}',[DatasetController::class,'show']);

        /*
        |-------------------------------------------------------------------------------
        | Adds a new dataset
        |-------------------------------------------------------------------------------
        | URL:              /api/v1/datasets
        | Method:           POST
        | Controller:       API\V1\DatasetController
        | Body:             file, title, year, keywords, authors, abstract, journal_id
        | Response Body:    Dataset object with journal, keywords and authors
        */
        Route::post('/',[DatasetController::class,'store']);

        /*
       |-------------------------------------------------------------------------------
       | Updates dataset details
       |-------------------------------------------------------------------------------
       | URL:              /api/v1/datasets/{id}
       | Method:           POST
       | Controller:       API\V1\DatasetController
       | Body:             file, title, year, keywords, authors, abstract, journal_id
       | Parameters:       id -> ID of the dataset
       | Response Body:    Dataset object with journal, keywords and authors
       */
        Route::post('/{id}',[DatasetController::class,'update']);

        /*
        |-------------------------------------------------------------------------------
        | Sends an dataset to trash
        |-------------------------------------------------------------------------------
        | URL:              /api/v1/datasets/trash/{id}
        | Method:           DELETE
        | Controller:       API\V1\DatasetController
        | Parameters:       id -> ID of the dataset
        | Response Body:    Empty
        */
        Route::delete('/trash/{id}',[DatasetController::class,'trash']);

        /*
        |-------------------------------------------------------------------------------
        | Gets all trashed datasets
        |-------------------------------------------------------------------------------
        | URL:              /api/v1/datasets/trashed
        | Method:           GET
        | Controller:       API\V1\DatasetController
        | Response Body:    Dataset objects with journal, keywords and authors
        */
        Route::get('/trashed',[DatasetController::class,'indexTrashed']);

        /*
        |-------------------------------------------------------------------------------
        | Restores trashed author
        |-------------------------------------------------------------------------------
        | URL:              /api/v1/datasets/restore/{id}
        | Method:           GET
        | Controller:       API\V1\DatasetController
        | Parameters:       id -> ID of the dataset
        | Response Body:    Dataset object with journal, keywords and authors
        */
        Route::get('/restore/{id}',[DatasetController::class,'restore']);

        /*
        |-------------------------------------------------------------------------------
        | Permanently deletes an dataset and detaches them from existing keywords and authors
        |-------------------------------------------------------------------------------
        | URL:              /api/v1/datasets/destroy/{id}
        | Method:           DELETE
        | Controller:       API\V1\DatasetController
        | Parameters:       id -> ID of the dataset
        | Response Body:    Empty
        */
        Route::delete('/destroy/{id}',[DatasetController::class,'destroy']);

    });

    Route::group(['prefix'=>'journals'],function (){
        /*
        |-------------------------------------------------------------------------------
        | Searches journals
        |-------------------------------------------------------------------------------
        | URL:              /api/v1/journals/search/{query}
        | Method:           GET
        | Controller:       API\V1\JournalController
        | Parameters:       query -> string being searched for
        | Response Body:   Journal objects with articles and datasets
        */
        Route::get('/search/{query}',[JournalController::class,'search']);

        /*
        |-------------------------------------------------------------------------------
        | Gets all the journals
        |-------------------------------------------------------------------------------
        | URL:              /api/v1/journals
        | Method:           GET
        | Controller:       API\V1\JournalController
        | Response Body:    Journal objects with articles and datasets
        */
        Route::get('/',[JournalController::class,'index']);

        /*
        |-------------------------------------------------------------------------------
        | Gets a single journal
        |-------------------------------------------------------------------------------
        | URL:              /api/v1/journals/get/{id}
        | Method:           GET
        | Controller:       API\V1\JournalController
        | Parameters:       id -> ID of the journal
        | Response Body:    Journal object with articles and datasets
        */
        Route::get('/get/{id}',[JournalController::class,'show']);

        /*
        |-------------------------------------------------------------------------------
        | Adds a new journal
        |-------------------------------------------------------------------------------
        | URL:              /api/v1/journals
        | Method:           POST
        | Controller:       API\V1\JournalController
        | Body:             title, volume
        | Response Body:    Journal object with articles and datasets
        */
        Route::post('/',[JournalController::class,'store']);

        /*
       |-------------------------------------------------------------------------------
       | Updates journal details
       |-------------------------------------------------------------------------------
       | URL:              /api/v1/journals/{id}
       | Method:           POST
       | Controller:       API\V1\JournalController
       | Body:             title, volume
       | Parameters:       id -> ID of the journal
       | Response Body:    Journal object with articles and datasets
       */
        Route::post('/{id}',[JournalController::class,'update']);

        /*
        |-------------------------------------------------------------------------------
        | Sends an journal to trash
        |-------------------------------------------------------------------------------
        | URL:              /api/v1/journals/trash/{id}
        | Method:           DELETE
        | Controller:       API\V1\JournalController
        | Parameters:       id -> ID of the journal
        | Response Body:    Empty
        */
        Route::delete('/trash/{id}',[JournalController::class,'trash']);

        /*
        |-------------------------------------------------------------------------------
        | Gets all trashed journals
        |-------------------------------------------------------------------------------
        | URL:              /api/v1/journals/trashed
        | Method:           GET
        | Controller:       API\V1\JournalController
        | Response Body:    Journal objects with articles and datasets
        */
        Route::get('/trashed',[JournalController::class,'indexTrashed']);

        /*
        |-------------------------------------------------------------------------------
        | Restores trashed author
        |-------------------------------------------------------------------------------
        | URL:              /api/v1/journals/restore/{id}
        | Method:           GET
        | Controller:       API\V1\JournalController
        | Parameters:       id -> ID of the journal
        | Response Body:    Journal object with articles and datasets
        */
        Route::get('/restore/{id}',[JournalController::class,'restore']);

        /*
        |-------------------------------------------------------------------------------
        | Permanently deletes an journal and detaches them from existing keywords and authors
        |-------------------------------------------------------------------------------
        | URL:              /api/v1/journals/destroy/{id}
        | Method:           DELETE
        | Controller:       API\V1\JournalController
        | Parameters:       id -> ID of the journal
        | Response Body:    Empty
        */
        Route::delete('/destroy/{id}',[JournalController::class,'destroy']);

    });

    Route::group(['prefix'=>'projects'],function () {
        /*
       |-------------------------------------------------------------------------------
       | Searches projects
       |-------------------------------------------------------------------------------
       | URL:              /api/v1/projects/search/{query}
       | Method:           GET
       | Controller:       API\V1\ProjectController
       | Parameters:       query -> string being searched for
       | Response Body:    Project objects with collaborators
       */
        Route::get('/search/{query}', [ProjectController::class, 'search']);

        /*
        |-------------------------------------------------------------------------------
        | Gets all the projects
        |-------------------------------------------------------------------------------
        | URL:              /api/v1/projects
        | Method:           GET
        | Controller:       API\V1\ProjectController
        | Response Body:    Project objects with collaborators
        */
        Route::get('/', [ProjectController::class, 'index']);
    });

});
