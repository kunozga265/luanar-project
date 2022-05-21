<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\V1\JournalCollection;
use App\Http\Resources\V1\JournalResource;
use App\Models\Journal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class JournalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function search($query)
    {
        $journals=Journal::search($query)->paginate((new AppController())->paginate);
        return response()->json(new JournalCollection($journals));
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $journals=Journal::orderBy('title','ASC')->paginate((new AppController())->paginate);
        return response()->json(new JournalCollection($journals));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function indexTrashed()
    {
        $journals=Journal::onlyTrashed()->paginate((new AppController())->paginate);
        return response()->json(new JournalCollection($journals));

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
        ])->validate();

        $journal=Journal::create([
            'title'         =>  $request->title,
            'volume'        =>  $request->volume,
        ]);

        return response()->json(new JournalResource($journal),201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $journal=Journal::find($id);
        if (is_object($journal)){
            return response()->json(new JournalResource($journal));
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
        $journal=Journal::find($id);
        if (is_object($journal)){

            Validator::make($request->all(),[
                'title'     =>  'required',
            ])->validate();

            $journal->update([
                'title'         =>  $request->title,
                'volume'        =>  $request->volume,
            ]);

            return response()->json(new JournalResource($journal));
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
        $journal=Journal::find($id);
        if (is_object($journal)){
            $journal->delete();
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
        $journal=Journal::where('id',$id)->onlyTrashed()->first();
        if (is_object($journal)){
            $journal->restore();
            return response()->json(new JournalResource($journal));
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
        $journal=Journal::where('id',$id)->onlyTrashed()->first();
        if (is_object($journal)){

            $journal->forceDelete();
            return response()->json([]);
        }
        else
            return response()->json([],404);
    }
}
