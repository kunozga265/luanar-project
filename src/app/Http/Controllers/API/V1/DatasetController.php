<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;

use App\Http\Resources\V1\DatasetCollection;
use App\Http\Resources\V1\DatasetResource;
use App\Models\Author;
use App\Models\Dataset;
use App\Models\Keyword;
use Illuminate\Http\Request;
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
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $datasets=Dataset::orderBy('title','ASC')->paginate((new AppController())->paginate);
        return response()->json(new DatasetCollection($datasets));
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

        $slug=Str::slug($request->title).date("-Y-m-d");
        $file=(new AppController)->uploadFile($slug,$request->file);

        $dataset=Dataset::create([
            'file'          =>  $file,
            'title'         =>  $request->title,
            'year'          =>  $request->year,
            'abstract'      =>  $request->abstract,
            'downloadCount' =>  0,
            'journal_id'    =>  $request->journalId,
        ]);

        //Attach Keywords
        (new AppController())->attachKeywords($dataset,$request->keywords);

        //Attach Authors
        (new AppController())->attachAuthors($dataset,$request->authors);

        return response()->json(new DatasetResource($dataset),201);
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

                $slug=Str::slug($request->title).date("-Y-m-d");
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
     * @return \Illuminate\Http\JsonResponse
     */
    public function trash($id)
    {
        $dataset=Dataset::find($id);
        if (is_object($dataset)){
            $dataset->delete();
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
}
