<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Http\Requests\StoreMemberRequest;
use App\Http\Requests\UpdateMemberRequest;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function __construct()
    {
        $this->middleware('validMember');
    }

    public function dashboard()
    {
      return view('member.dashboard');
    }

    public function profile(){
      $member_session = session()->get('member');
      $member = member::where("id", "13-10002-3")->first();
      return view('member.profile')->with('member', $member);
  }

  public function editProfile(){
      $member_session = session()->get('member');
      $member = member::where("id", "13-10002-3")->first();
      return view('member.EditProfile')->with('member', $member);
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
