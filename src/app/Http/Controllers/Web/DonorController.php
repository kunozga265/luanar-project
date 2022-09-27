<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\AppController;
use App\Http\Controllers\Controller;
use App\Models\Donor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class DonorController extends Controller
{
    public function index()
    {
        $donors = Donor::orderBy('name','asc')->paginate((new AppController())->paginate);
        return view('pages.donors',compact('donors'));
    }

    public function store(Request $request)
    {
        Validator::make($request->all(),[
            'name'     =>  'required',
        ])->validate();

        Donor::create([
            'name'         =>  $request->name,
        ]);

        return Redirect::route('donors');

    }

    public function trash($id)
    {
        $donor=Donor::find($id);
        if (is_object($donor)){
            $donor->delete();
            return Redirect::back();
        }
        else
            return Redirect::back();
    }
}
