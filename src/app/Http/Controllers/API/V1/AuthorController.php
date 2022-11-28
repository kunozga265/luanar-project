<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\AppController;
use App\Http\Controllers\Controller;
use App\Http\Resources\V1\AuthorCollection;
use App\Http\Resources\V1\AuthorResource;
use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use function PHPUnit\Framework\isEmpty;

class AuthorController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function search($query)
    {
        $authors=Author::where('firstName', 'like', '%' .$query. '%')
            ->orWhere('middleName', 'like', '%' .$query. '%')
            ->orWhere('lastName', 'like', '%' .$query. '%')
            ->orderBy('lastName','asc')->paginate((new AppController())->paginate);
//        $authors=Author::search($query)->paginate((new AppController())->paginate);
        return response()->json(new AuthorCollection($authors));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $authors=Author::orderBy('lastName','ASC')->paginate((new AppController())->paginate);
        return response()->json(new AuthorCollection($authors));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function indexTrashed()
    {
        $authors=Author::onlyTrashed()->paginate((new AppController())->paginate);
        return response()->json(new AuthorCollection($authors));

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
            'firstName'     =>  'required',
            'lastName'      =>  'required',
        ])->validate();

        $slug="avatars/".Str::slug($request->firstName. "-" . $request->lastName);
        $avatar=isset($request->avatar)? (new AppController)->uploadFile($slug,$request->avatar) : "images/avatar.png";

        $author=Author::create([
            'avatar'        =>  $avatar,
            'firstName'     =>  $request->firstName,
            'middleName'    =>  $request->middleName,
            'lastName'      =>  $request->lastName,
            'biography'     =>  $request->biography,
        ]);

        return response()->json(new AuthorResource($author),201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $author=Author::find($id);
        if (is_object($author)){
            return response()->json(new AuthorResource($author));
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
        $author=Author::find($id);
        if (is_object($author)){

            Validator::make($request->all(),[
                'firstName'     =>  'required',
                'lastName'      =>  'required',
            ])->validate();

            $author->update([
                'firstName'     =>  $request->firstName,
                'middleName'    =>  $request->middleName,
                'lastName'      =>  $request->lastName,
                'biography'     =>  $request->biography,
            ]);

            if(isset($request->avatar)){
                if(file_exists($author->avatar) && $author->avatar!=="images/avatar.png"){
                    Storage::disk("public_uploads")->delete($author->avatar);
                }

                $slug="avatars/".Str::slug($request->firstName. "-" . $request->lastName);
                $avatar=(new AppController)->uploadFile($slug,$request->avatar);
                $author->update([
                    "avatar" => $avatar
                ]);
            }

            return response()->json(new AuthorResource($author));
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
        $author=Author::find($id);
        if (is_object($author)){
            $author->delete();
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
        $author=Author::where('id',$id)->onlyTrashed()->first();
        if (is_object($author)){
            $author->restore();
            return response()->json(new AuthorResource($author));
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
        $author=Author::where('id',$id)->onlyTrashed()->first();
        if (is_object($author)){
            //permanently detach from articles
            $author->articles()->detach();

            //permanently detach from datasets
            $author->datasets()->detach();

            //delete avatar
            if(file_exists($author->avatar) && $author->avatar!=="images/avatar.png"){
                Storage::disk("public_uploads")->delete($author->avatar);
            }

            $author->forceDelete();
            return response()->json([]);
        }
        else
            return response()->json([],404);
    }


}
