<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Author;
use App\Models\Donor;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    public function index()
    {
        //Search
        $authors=Author::orderBy('firstName','asc')->get();
        $donors=Donor::orderBy('name','asc')->get();

        $projects=Project::orderBy('name','asc')->get();
        return view('pages.projects.index',compact('projects','authors','donors'));
    }

    public function search(Request $request)
    {
        $projects=null;
//
        if (isset($request->name) && isset($request->author) && isset($request->donor)){
            $projects=Project::where('author_id',$request->author)->where('donor_id',$request->donor)->where('name', 'like', '%' .$request->name. '%')->orderBy($request->sort,$request->order)->get();
        }else if(isset($request->name) && isset($request->author)){
            $projects=Project::where('author_id',$request->author)->where('name', 'like', '%' .$request->name. '%')->orderBy($request->sort,$request->order)->get();
        }else if(isset($request->name) && isset($request->donor)){
            $projects=Project::where('donor_id',$request->donor)->where('name', 'like', '%' .$request->name. '%')->orderBy($request->sort,$request->order)->get();
        }else if(isset($request->author) && isset($request->donor)){
            $projects=Project::where('author_id',$request->author)->where('donor_id',$request->donor)->orderBy($request->sort,$request->order)->get();
        }else if(isset($request->author)){
            $projects=Project::where('author_id',$request->author)->orderBy($request->sort,$request->order)->get();
        }else if(isset($request->name)){
            $projects=Project::where('name', 'like', '%' .$request->name. '%')->orderBy($request->sort,$request->order)->get();
        }else if(isset($request->donor)){
            $projects=Project::where('donor_id',$request->donor)->orderBy($request->sort,$request->order)->get();
        }else{
            $projects=Project::orderBy($request->sort,$request->order)->get();
        }

        //Search
        $authors=Author::orderBy('firstName','asc')->get();
        $donors=Donor::orderBy('name','asc')->get();

        $name=$request->name;
        $authorId=$request->author;
        $donorId=$request->donor;
        $sort=$request->sort;
        $order=$request->order;

        return view('pages.projects.search',compact('projects','authors','donors','name','authorId','donorId','sort','order'));
    }

    public function create()
    {
        //Search
        $authors=Author::orderBy('firstName','asc')->get();
        $donors=Donor::orderBy('name','asc')->get();

        return view('pages.projects.create',compact('authors','donors'));
    }

    public function store(Request $request)
    {

        Validator::make($request->all(), [
            'name'          =>  ['required'],
            'pi'            =>  ['required'],
            'description'   =>  ['required'],
            'donor'         =>  ['required'],
            'currency'      =>  ['required'],
            'budget'        =>  ['required'],
            'duration'      =>  ['required'],
            'startDate'     =>  ['required'],
            'endDate'       =>  ['required'],
            'file'          =>  ['required'],
        ])->validate();


        $fileName=Str::slug($request->name)."-".uniqid().".".$request->file->extension();
        $request->file->move(public_path('files/projects'), $fileName);

        $project=Project::create([
            "photo"             =>'files/projects/'.$fileName,
            'name'              =>$request->name,
            'description'       =>$request->description,
            "duration"          =>$request->duration,
            "startDate"         =>$request->startDate,
            "endDate"           =>$request->endDate,
            "currency"          =>$request->currency,
            "budget"            =>$request->budget,
            "author_id"         =>$request->pi,
            "donor_id"          =>$request->donor,
        ]);

        //Attach Authors
        $project->collaborators()->attach($request->collaborators);

        return Redirect::route('projects');

    }
}


