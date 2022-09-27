<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\AppController;
use App\Http\Controllers\Controller;

use App\Http\Resources\V1\DatasetCollection;
use App\Http\Resources\V1\DatasetResource;
use App\Models\Article;
use App\Models\Author;
use App\Models\Dataset;
use App\Models\Journal;
use App\Models\Keyword;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class DatasetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function search($query)
    {
        $datasets=Dataset::search($query)->paginate((new AppController())->paginate);
        return response()->json(new DatasetCollection($datasets));
    }

    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        $datasets=Dataset::where('verified',1)->orderBy('title','ASC')->paginate((new AppController())->paginate);
        $unverifiedDatasets=Dataset::where('verified',0)->orderBy('title','ASC')->paginate((new AppController())->paginate);
        $keywords=Keyword::orderBy('name','asc')->get();
        //Search
        $authors=Author::orderBy('firstName','asc')->get();
        $types=Type::orderBy('name','asc')->get();

        return view('pages.datasets.index',compact('datasets','unverifiedDatasets','keywords','authors','types'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function indexTrashed()
    {
        $datasets=Dataset::onlyTrashed()->paginate((new AppController())->paginate);
        return response()->json(new DatasetCollection($datasets));

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

        return view('pages.datasets.create',compact('keywords','authors','types','journals','years'));
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
        $request->file->move(public_path('files/datasets'), $fileName);

        $dataset=Dataset::create([
            'title'             =>  $request->title,
            'abstract'          =>  $request->abstract,
            'journal_id'        =>  $request->journal,
            'type_id'           =>  $request->type,
            'year'              =>  $request->year,
            'file'              =>  'files/datasets/'.$fileName,
        ]);

        //Attach Keywords
        if (isset($request->keywords)) {
            $keywords = explode(',', $request->keywords);
            (new AppController())->attachKeywords($dataset, $keywords);
        }

        //Attach Authors
        (new AppController())->attachAuthors($dataset,$request->authors);

        return Redirect::route('datasets');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $dataset=Dataset::find($id);
        if (is_object($dataset)){
            return response()->json(new DatasetResource($dataset));
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
        $dataset=Dataset::find($id);
        if (is_object($dataset)){

            Validator::make($request->all(),[
                'title'     =>  'required',
            ])->validate();

            $dataset->update([
                'title'         =>  $request->title,
                'year'          =>  $request->year,
                'abstract'      =>  $request->abstract,
                'journal_id'    =>  $request->journal_id,
            ]);

            if(isset($request->file)){
                if(file_exists($dataset->file)){
                    Storage::disk("public_uploads")->delete($dataset->file);
                }

                $slug="datasets/".Str::slug($request->title).date("-Y-m-d");
                $file=(new AppController)->uploadFile($slug,$request->file);
                $dataset->update([
                    "file" => $file
                ]);
            }

            //Detach and reattach keywords
            $dataset->keywords()->detach();
            (new AppController())->attachKeywords($dataset,$request->keywords);

            //Detach and reattach authors
            $dataset->authors()->detach();
            (new AppController())->attachAuthors($dataset,$request->authors);

            return response()->json(new DatasetResource($dataset));
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
        $dataset=Dataset::find($id);
        if (is_object($dataset)){
            $dataset->delete();
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
        $dataset=Dataset::where('id',$id)->onlyTrashed()->first();
        if (is_object($dataset)){
            $dataset->restore();
            return response()->json(new DatasetResource($dataset));
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
        $dataset=Dataset::where('id',$id)->onlyTrashed()->first();
        if (is_object($dataset)){
            //permanently detach authors
            $dataset->authors()->detach();

            //permanently detach keywords
            $dataset->keywords()->detach();

            //delete avatar
            if(file_exists($dataset->file)){
                Storage::disk("public_uploads")->delete($dataset->file);
            }

            $dataset->forceDelete();
            return response()->json([]);
        }
        else
            return response()->json([],404);
    }

    public function verify(Request $request,$id)
    {
        $dataset=Dataset::find($id);
        if (is_object($dataset)){
            $dataset->update([
                'verified'  =>  true
            ]);
        }
        return Redirect::route('datasets');

    }
}
