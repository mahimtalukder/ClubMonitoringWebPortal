<?php

namespace App\Http\Controllers;

use App\Models\Director;
use App\Models\Application;
use App\Models\Club;
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

    public function allApplication(){
        $applications = Application::where('sent_to', 'director')->get();
        return view('director.applications')->with('applications', $applications)->with('labelName', 'Applications');
    }

    public function applicationRead(Request $request){

        $application_info = Application::where("application_id", $request->id)->first();

        $requested_components = Application::select('requested_components.*', 'components.name')
            ->join('requested_components', 'applications.application_id', '=', 'requested_components.application_id')
            ->join('components', 'requested_components.component_id', '=', 'components.id')
            ->where([['requested_components.application_id', "=", $request->id]])
            ->get();
        return $requested_components;

        $club = Club::where("id", $application_info->club_id)->first();

        if($application_info->is_approved == "pending"){
            return view('director.updateApplication')
            ->with('application_info', $application_info)
            ->with('requested_components',$requested_components)
            ->with('club',$club)
            ->with('labelName', 'Read Applications');
        }

        return view('director.readApplication')
        ->with('application_info', $application_info)
        ->with('requested_components',$requested_components)
        ->with('club',$club)
        ->with('labelName', 'Read Applications');
    }
}
