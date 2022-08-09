<?php

namespace App\Http\Controllers;
use App\Models\Director;
use App\Models\ExecutiveCommitteeCart;
use App\Models\User;
use App\Models\Application;
use App\Models\Club;
use App\Models\Member;
use App\Models\Executive;

use Illuminate\Http\Request;

class ApiDirectorController extends Controller
{
    public function __construct()
    {
        $this->middleware('reactValidUser');
    }
    public function dashboard()
    {
        
      return "success";
    }
    public function allApplication(){
      $clubs = Club::all();
      $applications = Application::all();
      
      $values["applications"] = $applications;
      $values["clubs"] = $clubs;

      return $values;
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

    $values['application'] = $application_info;
    $values['requested_components'] = $requested_components;
    $values['club'] = $club;
    $values['clubs'] = $clubs;


    return $values;
}

    
    // public function profile(){
    //     $director_session = session()->get('director');
    //     $director = director::where("user_id", $director_session["user_id"])->first();
    //     return view('director.profile')->with('director', $director);
    // }
}
