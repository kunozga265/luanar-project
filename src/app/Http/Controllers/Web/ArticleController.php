<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\AppController;
use App\Http\Controllers\Controller;
use App\Http\Resources\V1\ArticleCollection;
use App\Http\Resources\V1\ArticleResource;
use App\Models\Article;
use App\Models\Author;
use App\Models\Journal;
use App\Models\Keyword;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
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
        $articles=Article::search($query)->paginate((new AppController())->paginate);
        return response()->json(new ArticleCollection($articles));
    }

    /**
     * Display a listing of the resource.
     *
     * @return
     */
    public function index()
    {
        $articles=Article::orderBy('title','ASC')->where('verified',1)->paginate((new AppController())->paginate);
        $unverifiedArticles=Article::orderBy('title','ASC')->where('verified',0)->paginate((new AppController())->paginate);
        $keywords=Keyword::orderBy('name','asc')->get();

        //Search
        $authors=Author::orderBy('firstName','asc')->get();
        $types=Type::orderBy('name','asc')->get();

        return view('pages.articles.index',compact('articles','unverifiedArticles','keywords','authors','types'));
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

    public function create()
    {
        //Search
        $authors=Author::orderBy('firstName','asc')->get();
        $types=Type::orderBy('name','asc')->get();
        $journals=Journal::orderBy('title','asc')->get();
        $years=[];
        $keywords=Keyword::orderBy('name','asc')->get();

        $currentYear = intval(date('Y'));
        $year=1990;
        while ($year <= $currentYear) {
            $years[]=$year;
            $year++;
        }
        $years=array_reverse($years);

        return view('pages.articles.create',compact('keywords','authors','types','journals','years'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function store(Request $request)
    {

        Validator::make($request->all(), [
            'title'             =>  ['required'],
            'file'              =>  ['required'],
        ])->validate();


        $fileName=Str::slug($request->title)."-".uniqid().".".$request->file->extension();
        $request->file->move(public_path('files/articles'), $fileName);

        $article=Article::create([
            'title'             =>  $request->title,
            'abstract'          =>  $request->abstract,
            'journal_id'        =>  $request->journal,
            'type_id'           =>  $request->type,
            'year'              =>  $request->year,
            'file'              =>  'files/articles/'.$fileName,
        ]);

        //Attach Keywords
        $keywords=explode(',',$request->keywords);
        (new AppController())->attachKeywords($article,$keywords);

        //Attach Authors
        (new AppController())->attachAuthors($article,$request->authors);

        return Redirect::route('articles');

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
     */
    public function trash($id)
    {
        $article=Article::find($id);
        if (is_object($article)){
            $article->delete();
            return Redirect::back();
        }
        else
            return Redirect::back();
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

    public function verify(Request $request,$id)
    {
        $article=Article::find($id);
        if (is_object($article)){
            $article->update([
                'verified'  =>  true
            ]);
        }
        return Redirect::route('articles');

    }
}
