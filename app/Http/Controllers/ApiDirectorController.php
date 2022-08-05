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
        // $this->middleware('reactValidUser');
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

    
    // public function profile(){
    //     $director_session = session()->get('director');
    //     $director = director::where("user_id", $director_session["user_id"])->first();
    //     return view('director.profile')->with('director', $director);
    // }
}
