<?php

namespace App\Http\Controllers;

use App\Models\Director;
use App\Http\Requests\StoreDirectorRequest;
use App\Http\Requests\UpdateDirectorRequest;
use Illuminate\Http\Request;

class DirectorController extends Controller
{
    public function __construct()
    {
        $this->middleware('validDirector');
    }

    public function dashboard(){
        return view('director.dashboard');
    }

    public function profile(){
        $director_session = session()->get('director');
        $director = director::where("id", "11-10002-3")->first();
        return view('director.profile')->with('director', $director);
    }

    public function editProfile(){
        $director_session = session()->get('director');
        $director = director::where("id", "11-10002-3")->first();
        return view('director.EditProfile')->with('director', $director);
    }

    public function editProfileSubmitted(Request $request){

        $validate = $request->validate([
            "name" => "required|regex:/(^([a-zA-z]+)(\d+)?$)/u",
            "email" => "email",
            "phone" => "required|numeric|digits:10",
            "gender" => "required",
            "dob" => "required",
            "blood_group" => "required",
            'address' => 'required'
        ],
//            ['name.required'=>"Please put you name here"],

        );

    }
}
