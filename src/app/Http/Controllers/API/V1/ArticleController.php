<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\AppController;
use App\Http\Controllers\Controller;
use App\Http\Resources\V1\ArticleCollection;
use App\Http\Resources\V1\ArticleResource;
use App\Models\Article;
use App\Models\Author;
use App\Models\Keyword;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use function PHPUnit\Framework\isEmpty;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function search($query)
    {
//        $articles=Article::search($query)->paginate((new AppController())->paginate);
        $articles=Article::where('title', 'like', '%' .$query. '%')
            ->orderBy('title','asc')->paginate((new AppController())->paginate);
        return response()->json(new ArticleCollection($articles));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $articles=Article::orderBy('title','ASC')->paginate((new AppController())->paginate);
        return response()->json(new ArticleCollection($articles));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function indexTrashed()
    {
        $articles=Article::onlyTrashed()->paginate((new AppController())->paginate);
        return response()->json(new ArticleCollection($articles));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        Validator::make($request->all(),[
            'title'     =>  'required',
            'file'      =>  'required',
        ])->validate();

        $slug="articles/".Str::slug($request->title).date("-Y-m-d");
        $file=(new AppController)->uploadFile($slug,$request->file);

        $article=Article::create([
            'file'          =>  $file,
            'title'         =>  $request->title,
            'year'          =>  $request->year,
            'abstract'      =>  $request->abstract,
            'downloadCount' =>  0,
            'journal_id'    =>  $request->journalId,
        ]);

        //Attach Keywords
        (new AppController())->attachKeywords($article,$request->keywords);

        //Attach Authors
        (new AppController())->attachAuthors($article,$request->authors);

        return response()->json(new ArticleResource($article),201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $article=Article::find($id);
        if (is_object($article)){
            return response()->json(new ArticleResource($article));
        }
        else
            return response()->json([],404);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {
        $article=Article::find($id);
        if (is_object($article)){

            Validator::make($request->all(),[
                'title'     =>  'required',
            ])->validate();

            $article->update([
                'title'         =>  $request->title,
                'year'          =>  $request->year,
                'abstract'      =>  $request->abstract,
                'journal_id'    =>  $request->journal_id,
            ]);

            if(isset($request->file)){
                if(file_exists($article->file)){
                    Storage::disk("public_uploads")->delete($article->file);
                }

                $slug="articles/".Str::slug($request->title).date("-Y-m-d");
                $file=(new AppController)->uploadFile($slug,$request->file);
                $article->update([
                    "file" => $file
                ]);
            }

            //Detach and reattach keywords
            $article->keywords()->detach();
            (new AppController())->attachKeywords($article,$request->keywords);

            //Detach and reattach authors
            $article->authors()->detach();
            (new AppController())->attachAuthors($article,$request->authors);

            return response()->json(new ArticleResource($article));
        }
        else
            return response()->json([],404);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function trash($id)
    {
        $article=Article::find($id);
        if (is_object($article)){
            $article->delete();
            return response()->json([]);
        }
        else
            return response()->json([],404);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function restore($id)
    {
        $article=Article::where('id',$id)->onlyTrashed()->first();
        if (is_object($article)){
            $article->restore();
            return response()->json(new ArticleResource($article));
        }
        else
            return response()->json([],404);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        $article=Article::where('id',$id)->onlyTrashed()->first();
        if (is_object($article)){
            //permanently detach authors
            $article->authors()->detach();

            //permanently detach keywords
            $article->keywords()->detach();

            //delete avatar
            if(file_exists($article->file)){
                Storage::disk("public_uploads")->delete($article->file);
            }

            $article->forceDelete();
            return response()->json([]);
        }
        else
            return response()->json([],404);
    }
}
