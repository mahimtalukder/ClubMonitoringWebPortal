<?php

namespace App\Http\Controllers;

use App\Mail\DirectorAccountLoginCredentials;
use App\Models\Director;
use App\Models\ExecutiveCommitteeCart;
use App\Models\User;
use App\Models\Application;
use App\Models\Club;
use App\Models\Member;
use App\Models\Executive;
use App\Http\Requests\StoreDirectorRequest;
use App\Http\Requests\UpdateDirectorRequest;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class DirectorController extends Controller
{
    public function __construct()
    {
        $this->middleware('validDirector');
    }

    public function dashboard()
    {
        $users = User::all();
        $numberOfuser = [];
        $numberOfuser['admin'] = 0;
        $numberOfuser['director'] = 0;
        $numberOfuser['member'] = 0;

        foreach ($users as $user) {
            if ($user->user_type == "director") {
                $numberOfuser['director'] += 1;
            } else if ($user->user_type == "admin") {
                $numberOfuser['admin'] += 1;
            } else if ($user->user_type == "member") {
                $numberOfuser['member'] += 1;
            }
        }

        $clubs = Club::all();
        $members = Member::all();

        foreach ($clubs as $club) {
            $club['total_member'] = 0;
        }

        foreach ($members as $member) {
            foreach ($clubs as $club) {
                if ($club['id'] == $member->club_id) {
                    $club['total_member'] += 1;
                }
            }
        }


        $all_applications = Application::where('created_at', '>', date('Y-m-d', strtotime("-7 days")))
            ->get();

        $data = array();

        for($i=15; $i>=0; $i--){
            $array = [
                "label" => date('M d', strtotime('-'. $i .' days')),
                "value" => 0
            ];
            array_push($data, $array);

        }


        foreach ($all_applications as $application) {
            $i=0;
            foreach ($data as $d){
                if(date('M d', strtotime($application->created_at)) == $d['label']){
                    $data[$i]['value'] += 1;
                    break;
                }
                $i++;
            }
        }


        return view('director.dashboard')
            ->with('numberOfuser', $numberOfuser)
            ->with('clubs', $clubs)
            ->with('applications', $data);
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
            ->paginate(3);

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
        $clubs = Club::orderBy("created_at", "desc")->paginate(2);

        return view('director.allClub')->with('clubs', $clubs);
    }

    public function clubInfo(Request $request)
    {
        $members = Member::where('club_id', $request->id)->get();
        $total_member = $members->count();

        $applications = Application::where('club_id', $request->id)->get();
        $total_application = $applications->count();

        $executives = Executive::where('club_id', $request->id)->get();
        $total_executive = $executives->count();

        $clubinfo = Club::where('id', $request->id)->first();
        $club = $clubinfo->name;

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


    public function committeeList(){
        $clubs = Club::orderBy("created_at", "desc")->get();

        if (Session::has('committees')){
            $committees = session()->get('committees');
            $selectedClub = session()->get('selectedClub');
            $club_id = session()->get('club_id');

            session()->forget('committees');
            session()->forget('selectedClub');
            session()->forget('club_id');

            return view('director.executivesList')
                ->with('executive_committes', $committees)
                ->with('selectedClub', $selectedClub)
                ->with('club_id', $club_id)
                ->with('status', 1)
                ->with('clubs', $clubs);
        }

        if (Session::has('executives')){
            $executives = session()->get('executives');
            $selectedClub = session()->get('selectedClub');
            $committee_no = session()->get('committee_no');
            $executive_committes = session()->get('executive_committes');

            session()->forget('executives');
            session()->forget('selectedClub');
            session()->forget('committee_no');
            session()->forget('executive_committes');

            return view('director.executivesList')
                ->with('executives', $executives)
                ->with('selectedClub', $selectedClub)
                ->with('committee_no', $committee_no)
                ->with('executive_committes', $executive_committes)
                ->with('status', 2)
                ->with('clubs', $clubs);
        }
        return view('director.executivesList')->with('clubs', $clubs)->with('executive_committes', 'none')->with('status', 0);
    }

    public function assignExecutive(){

        $clubs = Club::all();
        $director_session = session()->get('director');
        $carts = ExecutiveCommitteeCart::where('added_by', $director_session->user_id)->get();

        $cart_selected_club = ExecutiveCommitteeCart::where('added_by', $director_session->user_id)->first();
        if($cart_selected_club == ""){
            $cart_selected_club = new ExecutiveCommitteeCart();
            $cart_selected_club->club_id = '';
            $cart_selected_club->name = '';

            return view('director.assignExecutive')
                ->with('clubs', $clubs)
                ->with('selected', 'none');

        }

        $selected_club_info = Club::where('id', $cart_selected_club->club_id)->first();

        $committee = Executive::where('club_id', $cart_selected_club->club_id)->first();

        $new_committee_no = 1;
        if(!empty($committee->committee_number)){
            $new_committee_no = 1+$committee->committee_number;
        }

        if (Session::has('message')){
            $message = session()->get('message');
            session()->forget('message');
            return view('director.assignExecutive')
                ->with('clubs', $clubs)->with('carts', $carts)
                ->with('message', $message)
                ->with('committee_no', $new_committee_no)
                ->with('selected_club', $cart_selected_club)
                ->with('selected', $cart_selected_club->club_id);
        }


        return view('director.assignExecutive')
            ->with('clubs', $clubs)
            ->with('carts', $carts)
            ->with('selected_club', $selected_club_info)
            ->with('selected', $cart_selected_club->club_id)
            ->with('committee_no', $new_committee_no);

    }

    public function assignExecutiveSubmitted(Request $request){
        $validate = $request->validate([
            "club_id" => "required|exists:clubs,id",
            "id" => ['required','unique:executives,user_id', 'exists:members,user_id,club_id,'.$request->club_id],
            "designation" => "required"
        ]);

        $member = Member::where('user_id', $request->id)->first();

        $committee = Executive::where('club_id', $request->club_id)->first();

        $new_committee_no = 1;
        if(!empty($committee->committee_number)){
            $new_committee_no = 1+$committee->committee_number;
        }

        $director_session = session()->get('director');

        $cart_selected_club = ExecutiveCommitteeCart::where('added_by', $director_session->user_id)->first();



        if(!empty($cart_selected_club->club_id)){

            if ($cart_selected_club->club_id == $request->club_id){
                $executiveCart = new ExecutiveCommitteeCart();
                $executiveCart->user_id = $request->id;
                $executiveCart->name = $member->name;
                $executiveCart->designation = $request->designation;
                $executiveCart->club_id = $request->club_id;
                $executiveCart->committee_number = $new_committee_no;
                $executiveCart->added_by = $director_session->user_id;
                $executiveCart->save();
            }
            else
            {
                return redirect()->route('directorAssignExecutive')->with('message', 'Sorry! You  cannot add multiple club executive at a time. You have to cancel or complete this first.');
            }
        }
        else{
            $executiveCart = new ExecutiveCommitteeCart();
            $executiveCart->user_id = $request->id;
            $executiveCart->name = $member->name;
            $executiveCart->designation = $request->designation;
            $executiveCart->club_id = $request->club_id;
            $executiveCart->committee_number = $new_committee_no;
            $executiveCart->added_by = $director_session->user_id;
            $executiveCart->save();
        }


        return redirect()->route('directorAssignExecutive');
    }

    public function removeAssignExecutive(Request $request){
        ExecutiveCommitteeCart::where('user_id', $request->id)->delete();
        return redirect()->route('directorAssignExecutive');
    }

    public function confirmExecutive(){
        $director_session = session()->get('director');
        $carts = ExecutiveCommitteeCart::where('added_by', $director_session->user_id)->get();
        $info = ExecutiveCommitteeCart::where('added_by', $director_session->user_id)->first();
        try {
            DB::transaction(function () use ($carts, $info, $director_session){
                //Expire old team
                Executive::where('club_id',$info->club_id)
                    ->update(['end_at'=>Carbon::now()->format('Y-m-d H:i:s')]);

                //insert new team
                foreach ($carts as $new){
                    $executive = new Executive();
                    $executive->user_id = $new->user_id;
                    $executive->designation = $new->designation;
                    $executive->committee_number = $new->committee_number;
                    $executive->club_id = $new->club_id;
                    $executive->join_at = Carbon::now()->format('Y-m-d H:i:s');
                    $executive->save();
                }

                //truncate cart
                ExecutiveCommitteeCart::where('added_by', $director_session->user_id)->delete();

//                /*Mail login credentials to the user*/
//                $data = array(
//                    'name' => $request->name,
//                    'email' => $request->name,
//                    'user_id' => $unique_id,
//                    'password' => $unique_pass
//                );
//
//                Mail::to($request->email)->send(new DirectorAccountLoginCredentials($data));
//                /* Mail end */

            }, 5);

        }
        catch (\Exception $e){
            DB::rollBack();
            return $e->getMessage();
        }

        return redirect()->route('directorAssignExecutive');
    }

    public function clubWiseCommitteeList(Request $request){

        $committees = Executive::select('committee_number')
            ->where('club_id', $request->club_id)
            ->groupBy('committee_number')
            ->orderBy('join_at', 'desc')
            ->get();

        $selectedClub = Club::where('id', $request->club_id)->first();

        return redirect()->route('directorCommitteeList')
            ->with('selectedClub', $selectedClub)
            ->with('club_id', $request->club_id)
            ->with('committees', $committees);
    }

    public function committeeWiseExecutiveList(Request $request){

        $executives = Executive::where('club_id', $request->club_id)
            ->where('committee_number', $request->committee_no)
            ->get();


        $selectedClub = Club::where('id', $request->club_id)->first();
        return redirect()->route('directorCommitteeList')
            ->with('selectedClub', $selectedClub)
            ->with('executive_committes', 'list')
            ->with('committee_no', $request->committee_no)
            ->with('executives', $executives);
    }
}
