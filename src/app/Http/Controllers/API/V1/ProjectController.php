<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\AppController;
use App\Http\Controllers\Controller;
use App\Http\Resources\V1\ProjectCollection;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function search($query)
    {
        $projects=Project::where('verified',1)
            ->where('name', 'like', '%' .$query. '%')
            ->orderBy('name','asc')
            ->paginate((new AppController())->paginate);

        return response()->json(new ProjectCollection($projects));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $projects=Project::where('verified',1)
            ->orderBy('name','asc')
            ->paginate((new AppController())->paginate);
        return response()->json(new ProjectCollection($projects));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
