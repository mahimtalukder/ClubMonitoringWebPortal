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
        $director = director::where("user_id", $director_session["user_id"])->first();
        return view('director.profile')->with('director', $director);
    }

    public function editProfile(){
        $director_session = session()->get('director');
        $director = director::where("user_id", $director_session["user_id"])->first();
        return view('director.EditProfile')->with('director_info', $director);
    }

    public function editProfileSubmitted(Request $request){

        $validate = $request->validate([
            "name" => "required|regex:/^[a-zA-Z]+(([',. -][a-zA-Z ])?[a-zA-Z]*)*$/u",
            "email" => "email",
            "phone" => "required|numeric",
            "gender" => "required",
            "dob" => "required",
            "blood_group" => "required",
            'address' => 'required'
        ]);
        $director_session = session()->get('director');
        $director = director::where("user_id", $director_session["user_id"])->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'gender' => $request->gender,
            'dob' => $request->dob,
            'blood_group' =>$request->blood_group,
            'address' => $request->address,
            ]);
            return redirect()->route('directorEditProfile');


    }

    public function allApplication(){
        $clubs = Club::all();
        $applications = Application::where('sent_to', 'director')
            ->orderBy("created_at", "desc")
            ->paginate(1);

        return view('director.applications')
            ->with('applications', $applications)
            ->with('clubs', $clubs)
            ->with('labelName', 'Applications');
    }

    public function applicationRead(Request $request){

        $application_info = Application::where("application_id", $request->id)->first();
        $is_approved ="no";

        $requested_components = Application::select('requested_components.*', 'components.name')
            ->join('requested_components', 'applications.application_id', '=', 'requested_components.application_id')
            ->join('components', 'requested_components.component_id', '=', 'components.id')
            ->where([['requested_components.application_id', "=", $request->id],["requested_components.is_approved", "=", "pending"]])
            ->get();

        $club = Club::where("id", $application_info->club_id)->first();
        $clubs = Club::all();


        return view('director.readUpdateApplication')
        ->with('application_info', $application_info)
        ->with('requested_components',$requested_components)
        ->with('club',$club)
        ->with('clubs',$clubs)
        ->with('labelName', 'Read Applications');
    }

    public function clubWiseApplication(Request $request){
        $director_session = session()->get('director');
        $clubs = Club::all();
        $club_info = Club::where("id", $request->id)->first();
        $applications = Application::where('club_id', $request->id)
            ->orderBy("created_at", "desc")
            ->paginate(1);

        return view('director.applications')
            ->with('club_info', $club_info)
            ->with('clubs', $clubs)
            ->with('applications', $applications)
            ->with('labelName', 'Applications of '.$club_info->name);
    }
}
