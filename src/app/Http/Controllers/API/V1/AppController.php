<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Models\Author;
use App\Models\Keyword;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class AppController extends Controller
{
    public $paginate=10;
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
                        'name'   => $keyword,
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
}
