<?php

namespace App\Http\Controllers;

use App\Models\Director;
use App\Models\Application;
use App\Models\Club;
use App\Models\Member;
use App\Models\Executive;
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
            ->where([['requested_components.application_id', "=", $request->id]])
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

    public function allClub()
    {
        $clubs = Club::orderBy("created_at", "desc")->paginate(1);

        return view('director.allClub')->with('clubs', $clubs);
    }

    public function clubInfo(Request $request)
    {
        $members = Member::where('club_id', '<=', $request->id)->get();
        $total_member = $members->count();

        $applications = Application::where('club_id', '<=', $request->id)->get();
        $total_application = $applications->count();

        $executives = Executive::where('club_id', '<=', $request->id)->get();
        $total_executive = $executives->count();

        $club = Club::where('id', '<=', $request->id)->first();

        return view('director.clubInfo')
        ->with('total_member',$total_member)
        ->with('total_application',$total_application)
        ->with('total_executive',$total_executive)
        ->with('club',$club);
    }

    public function createClub()
    {
        return view('director.createClub');
    }

    public function createClubSubmitted(Request $request)
    {
        $validate = $request->validate([
            "name" => "required|unique:clubs,name",
        ]);

        $director_session = session()->get('director');

        $club = new Club();
        $club->name = $request->name;
        $club->created_by = $director_session->user_id;
        $club->save();

        return view('director.createClub')->with('message','New club successfully added!');
    }


    public function directorImageUpload(Request $request){
        $request->validate([
          'image' => 'mimes:jpeg,jpg,png,gif|required|max:1000000',
      ]);
    
    
    
        if($request->hasFile('image')){
            $director_session = session()->get('director');
            $imageName = time()."_".$request->file('image')->getClientOriginalName();
            $request->image->move(public_path('assets_2/images'), $imageName);
            $imageName = "assets_2/images/".$imageName;
    
      
              /* New File name */
              $newFileName = 'assets_2/images/'.time()."_".$director_session['user_id'].'.'.$request->file('image')->getClientOriginalExtension();
              rename($imageName, $newFileName);
                
            $imageName='../'.$newFileName;
                     
            $director = director::where("user_id", $director_session["user_id"])->update([
                'images' => $imageName
                ]);
            $director_session['images'] = $imageName;
    
            session()->put('director', $director_session);
            return redirect()->route('directorEditProfile');
        }
      }
}
