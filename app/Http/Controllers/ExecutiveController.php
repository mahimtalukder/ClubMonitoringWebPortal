<?php

namespace App\Http\Controllers;

use App\Models\Executive;
use App\Http\Requests\StoreExecutiveRequest;
use App\Http\Requests\UpdateExecutiveRequest;

class ExecutiveController extends Controller
{
    public function __construct()
    {
        $this->middleware('validExecutive');
    }

    public function dashboard()
    {
      return view('executive.dashboard');
    }

    public function profile(){
      $executive_session = session()->get('executive');
      $executive = executive::where("id", "13-10001-3")->first();
      return view('executive.profile')->with('executive', $executive);
  }

  public function editProfile(){
      $executive_session = session()->get('executive');
      $executive = executive::where("id", "13-10001-3")->first();
      return view('executive.EditProfile')->with('executive', $executive);
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
