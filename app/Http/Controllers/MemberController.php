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
      $member = member::where("user_id", $member_session["user_id"])->first();
      return view('member.profile')->with('member', $member);
  }

  public function editProfile(){
      $member_session = session()->get('member');
      $member = member::where("user_id", $member_session["user_id"])->first();
      return view('member.EditProfile')->with('member_info', $member);
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
        $member_session = session()->get('member');
        $member = member::where("user_id", $member_session["user_id"])->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'gender' => $request->gender,
            'dob' => $request->dob,
            'blood_group' =>$request->blood_group,
            'address' => $request->address,
            ]);
        return redirect()->route('memberEditProfile');
    }

    public function memberImageUpload(Request $request){
        $request->validate([
          'image' => 'mimes:jpeg,jpg,png,gif|required|max:1000000',
      ]);
    
    
    
        if($request->hasFile('image')){
            $member_session = session()->get('member');
            $imageName = time()."_".$request->file('image')->getClientOriginalName();
            $request->image->move(public_path('assets_2/images'), $imageName);
            $imageName = "assets_2/images/".$imageName;
    
      
              /* New File name */
              $newFileName = 'assets_2/images/'.time()."_".$member_session['user_id'].'.'.$request->file('image')->getClientOriginalExtension();
              rename($imageName, $newFileName);
                
            $imageName='../'.$newFileName;
                     
            $member = Member::where("user_id", $member_session["user_id"])->update([
                'images' => $imageName
                ]);
            $member_session['images'] = $imageName;
    
            session()->put('member', $member_session);
            return redirect()->route('memberEditProfile');
        }
      }

}
