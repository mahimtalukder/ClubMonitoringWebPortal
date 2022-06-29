<?php

namespace App\Http\Controllers;

use App\Models\Executive;
use App\Models\Member;
use App\Models\Club;
use App\Http\Requests\StoreExecutiveRequest;
use App\Http\Requests\UpdateExecutiveRequest;
use Illuminate\Http\Request;

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
    //   $executive_session = session()->get('executive');
    //   $member_session = session()->get('member');
    //   $executive = member::where("user_id", $member_session["user_id"])->first();
    $member_session = session()->get('executive');
    $member = Member::where("user_id", $member_session["user_id"])->first();

      return view('executive.profile')->with('executive', $member);
  }

  public function editProfile(){
    //   $executive_session = session()->get('executive');
    //   $executive = member::where("user_id", $member_session["user_id"])->first();

      $member_session = session()->get('executive');
      $member = Member::where("user_id", $member_session["user_id"])->first();
      return view('executive.EditProfile')->with('executive_info', $member);
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
      ] );

      $member_session = session()->get('executive');
      $member = Member::where("user_id", $member_session["user_id"])->update([
          'name' => $request->name,
          'email' => $request->email,
          'phone' => $request->phone,
          'gender' => $request->gender,
          'dob' => $request->dob,
          'blood_group' =>$request->blood_group,
          'address' => $request->address,
          ]);
          return redirect()->route('executiveEditProfile');

  }


  public function executiveImageUpload(Request $request){
    $validate = $request->validate([
      'image' => 'dimensions:width=100px,height=100px',
  ] );
  return redirect()->route('executiveEditProfile');
  }

}
