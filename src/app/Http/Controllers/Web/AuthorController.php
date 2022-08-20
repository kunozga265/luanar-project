<?php

namespace App\Http\Controllers\Web;


use App\Http\Controllers\AppController;
use App\Http\Controllers\Controller;
use App\Http\Resources\V1\AuthorCollection;
use App\Http\Resources\V1\AuthorResource;
use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use function PHPUnit\Framework\isEmpty;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function search(Request $request)
    {
//
       $authors=Author::where('firstName', 'like', '%' .$request->name. '%')
           ->orWhere('middleName', 'like', '%' .$request->name. '%')
           ->orWhere('lastName', 'like', '%' .$request->name. '%')
           ->orderBy('lastName','asc')->get();

        $name=$request->name;

        return view('pages.authors.search',compact('authors','name'));
    }

    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        $authors=Author::orderBy('lastName','ASC')->paginate((new AppController())->paginate);
        return view('pages.authors.index',compact('authors'));
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
     */
    public function store(Request $request)
    {
        Validator::make($request->all(),[
            'title'         =>  'required',
            'firstName'     =>  'required',
            'lastName'      =>  'required',
        ])->validate();

        $fileName=Str::slug($request->firstName. "-" . $request->lastName)."-".uniqid().".".$request->file->extension();
        $request->file->move(public_path('files/avatars'), $fileName);

        Author::create([
            'avatar'        =>  "files/avatars/$fileName",
            'title'         =>  $request->title,
            'firstName'     =>  $request->firstName,
            'middleName'    =>  $request->middleName,
            'lastName'      =>  $request->lastName,
            'biography'     =>  $request->biography,
        ]);

        return Redirect::route('experts');
    }

    public function create()
    {
        return view('pages.authors.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     */
    public function show($id)
    {
        $author=Author::find($id);
        if (is_object($author)){
            return view('pages.authors.show',compact('author'));
        }
        else
            return Redirect::route('experts');
    }

    public function edit($id)
    {
        $author=Author::find($id);
        if (is_object($author)){
            return view('pages.authors.edit',compact('author'));
        }
        else
            return Redirect::route('experts');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     */
    public function update(Request $request, $id)
    {
        $author=Author::find($id);
        if (is_object($author)){

            Validator::make($request->all(),[
                'title'     =>  'required',
                'firstName'     =>  'required',
                'lastName'      =>  'required',
            ])->validate();

            $author->update([
                'title'     =>  $request->title,
                'firstName'     =>  $request->firstName,
                'middleName'    =>  $request->middleName,
                'lastName'      =>  $request->lastName,
                'biography'     =>  $request->biography,
            ]);

            if(isset($request->file)){
                if(file_exists($author->avatar) && $author->avatar!=="images/avatar.png"){
                    Storage::disk("public_uploads")->delete($author->avatar);
                }

                $fileName=Str::slug($request->firstName. "-" . $request->lastName)."-".uniqid().".".$request->file->extension();
                $request->file->move(public_path('files/avatars'), $fileName);

                $author->update([
                   'avatar'        =>  "files/avatars/$fileName",
                ]);
            }

            return Redirect::route('experts.show',['id'=>$author->id]);
        }
        else
            return Redirect::route('experts');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     */
    public function trash($id)
    {
        $author=Author::find($id);
        if (is_object($author)){
            $author->delete();
            return Redirect::route('experts');
        }
        else
            return Redirect::route('experts');
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
