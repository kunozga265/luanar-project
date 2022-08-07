<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
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

class AppController extends Controller
{
    public $paginate=30;
    /**
     * Upload image
     *
     * @param  string $encodedFile
     * @return string
     */
    public function uploadFile($name,$encodedFile){

        //upload new picture
        $explodedFile=explode(',',$encodedFile);
        //$decodedFile=base64_decode($explodedFile[1]);

        //develop name
        $ext=$this->getExtension($explodedFile);
        $filename="files/".$name."-".uniqid().".".$ext;

        if($ext=='jpg' || $ext=='png'){
            try{
                Storage::disk('public_uploads')->put(
                    $filename,file_get_contents($encodedFile)
                );
            }catch (\RuntimeException $e){
                return response()->json([
                    'message' => "Failed to upload",
                ],501);
            }
        }else {
            return response()->json([
                'message' => "Invalid extension",
            ],415);
        }

        return $filename;
    }

    private function getExtension($explodedImage)
    {
        $imageExtensionDecode=explode('/',$explodedImage[0]);
        $imageExtension=explode(';',$imageExtensionDecode[1]);
        $lowercaseExt=strtolower($imageExtension[0]);
        if($lowercaseExt=='jpeg')
            return 'jpg';
        else
            return $lowercaseExt;
    }

    public function attachKeywords($object, $keywords){
        if (isset($keywords)){
            foreach ($keywords as $keyword){
                //Search the DB for the keyword by slug
                $slug=Str::slug($keyword);
                $keywordDb=Keyword::where('slug',$slug)->first();

                //If none existent add a new entry of the keyword
                if (!is_object($keywordDb)){
                    $keywordDb=Keyword::create([
                        'name'   => ucwords($keyword),
                        'slug'   => $slug
                    ]);
                }

                $object->keywords()->attach($keywordDb);
            }
        }
    }

    public function attachAuthors($object, $authors){
        if(isset($authors)){
            foreach ($authors as $author){
                //Search DB if author exists and add it
                $authorDb=Author::find($author);
                if(is_object($authorDb)){
                    $object->authors()->attach($authorDb);
                }
            }
        }
    }

    public function search(Request $request)
    {
        $articles=null;
        $datasets=null;
//        dd(isset($request->title),isset($request->author),isset($request->type));
        if (isset($request->title) && isset($request->author) && isset($request->type)){
            $author=Author::find($request->author);
            $articles=$author->articles()->where('type_id',$request->type)->where('title', 'like', '%' .$request->title. '%')->orderBy($request->sort,'asc')->get();
            $datasets=$author->datasets()->where('type_id',$request->type)->where('title', 'like', '%' .$request->title. '%')->orderBy($request->sort,'asc')->get();
        }else if(isset($request->title) && isset($request->author)){
            $articles=Article::where('title', 'like', '%' .$request->title. '%')->orderBy($request->sort,'asc')->get();
            $datasets=Dataset::where('title', 'like', '%' .$request->title. '%')->orderBy($request->sort,'asc')->get();
        }else if(isset($request->title) && isset($request->type)){
            $articles=Article::where('type_id',$request->type)->where('title', 'like', '%' .$request->title. '%')->orderBy($request->sort,'asc')->get();
            $datasets=Dataset::where('type_id',$request->type)->where('title', 'like', '%' .$request->title. '%')->orderBy($request->sort,'asc')->get();
        }else if(isset($request->author) && isset($request->type)){
            $author=Author::find($request->author);
            $articles=$author->articles()->where('type_id',$request->type)->orderBy($request->sort,'asc')->get();
            $datasets=$author->datasets()->where('type_id',$request->type)->orderBy($request->sort,'asc')->get();
        }else if(isset($request->author)){
            $author=Author::find($request->author);
            $articles=$author->articles()->orderBy($request->sort,'asc')->get();
            $datasets=$author->datasets()->orderBy($request->sort,'asc')->get();
        }else if(isset($request->title)){
            $articles=Article::where('title', 'like', '%' .$request->title. '%')->orderBy($request->sort,'asc')->get();
            $datasets=Dataset::where('title', 'like', '%' .$request->title. '%')->orderBy($request->sort,'asc')->get();
        }else if(isset($request->type)){
            $articles=Article::where('type_id',$request->type)->orderBy($request->sort,'asc')->get();
            $datasets=Dataset::where('type_id',$request->type)->orderBy($request->sort,'asc')->get();
        }


        $keywords=Keyword::orderBy('name','asc')->get();

        //Search
        $authors=Author::orderBy('firstName','asc')->get();
        $types=Type::orderBy('name','asc')->get();

        $title=$request->title;
        $authorId=$request->author;
        $typeId=$request->type;
        $sort=$request->sort;

        return view('pages.search',compact('articles','datasets','keywords','authors','types','title','authorId','typeId','sort'));
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

        return view('pages.create',compact('keywords','authors','types','journals','years'));
    }

    public function store(Request $request)
    {

        Validator::make($request->all(), [
            'kind'             =>  ['required'],
            'title'             =>  ['required'],
            'file'              =>  ['required'],
        ])->validate();


        if ($request->kind == 'article'){
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
            $this->attachKeywords($article,$keywords);

            //Attach Authors
            $this->attachAuthors($article,$request->authors);

            return Redirect::route('publications');


        }else if ($request->kind == 'dataset'){
        $fileName=Str::slug($request->title)."-".uniqid().".".$request->file->extension();
        $request->file->move(public_path('files/datasets'), $fileName);

        $dataset=Dataset::create([
            'title'             =>  $request->title,
            'abstract'          =>  $request->abstract,
            'journal_id'        =>  $request->journal,
            'type_id'           =>  $request->type,
            'year'              =>  $request->year,
            'file'              =>  'files/articles/'.$fileName,
        ]);

        //Attach Keywords
        $keywords=explode(',',$request->keywords);
        $this->attachKeywords($dataset,$keywords);

        //Attach Authors
        $this->attachAuthors($dataset,$request->authors);

        return Redirect::route('datasets');


    }

    }
}
