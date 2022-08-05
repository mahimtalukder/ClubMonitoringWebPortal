<?php

namespace App\Http\Controllers;

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

    
    // public function profile(){
    //     $director_session = session()->get('director');
    //     $director = director::where("user_id", $director_session["user_id"])->first();
    //     return view('director.profile')->with('director', $director);
    // }
}
