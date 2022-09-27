<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\AppController;
use App\Http\Controllers\Controller;
use App\Models\Journal;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class JournalController extends Controller
{
    public function index()
    {
        $journals = Journal::orderBy('title','asc')->paginate((new AppController())->paginate);
        return view('pages.journals',compact('journals'));
    }

    public function store(Request $request)
    {
        Validator::make($request->all(),[
            'title'     =>  'required',
            'volume'    =>  'required',
        ])->validate();

        Journal::create([
            'title'         =>  $request->title,
            'volume'        =>  $request->volume,
        ]);

        return Redirect::route('journals');

    }

    public function trash($id)
    {
        $journals=Journal::find($id);
        if (is_object($journals)){
            $journals->delete();
            return Redirect::back();
        }
        else
            return Redirect::back();
    }
}
