<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Executive;
use App\Models\Member;
use App\Models\Club;
use App\Http\Requests\StoreExecutiveRequest;
use App\Http\Requests\UpdateExecutiveRequest;
use Illuminate\Http\Request;
//for image
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Postimage;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageServiceProvider;

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
      'image' => '',
  ] );
  $member_session = session()->get('executive');
  $member = Member::where("user_id", $member_session["user_id"])->first();


  if(!empty($request->image)){
    $filename=$request->image;
    $path = public_path('C:/Users/mdali/Desktop/images' . $filename);
    // $file->store('image');
    // $path->save();
    Image::make($request->image->getRealPath())->save($path);
  }




  // // $data= new Postimage();
  // $image=$request->image;


  //   $file= $request->file('image');
  //   // $image = Input::file('img')
  //   $filename = $image->getClientOriginalExtension();
  //   // $path = public_path('C:/Users/mdali/Desktop/images' . $filename);
  //   $file-> move(public_path('/images'), $filename);
  //   Image::make($image->getRealPath())->save($file);
  //   // $data['image']= $filename;
  //   // $data->save();
  //   $Member->image = $file;
  //   $Member->save();


  return redirect()->route('executiveEditProfile');
  }

  public function ViewAllMamber(){

    $Member = Member::paginate(6);

    return view('executive.ViewMember')->with('MemberList', $Member);
  }

  public function CreateNewMamber(){

    return view('executive.NewMember');

  }

  public function CreateMamber(Request $request){

    $validate = $request->validate([
      "name" => "required|regex:/^[a-zA-Z]+(([',. -][a-zA-Z ])?[a-zA-Z]*)*$/u",
      "email" => "email",
      "password" => "required"
      
      ] );

      $member_session = session()->get('executive');
      $member = Member::where("user_id", $member_session["user_id"])->first();

      static::created(function ($obj) {
        // $obj->id= Member::"13-"."$Id+1"."-3";
        $obj->save();
    });

      $User = new  User();
      $User->user_id = $request->user_id;
      $User->password =$request->password;
      $User->user_type="member";
      $User->save();

      $Member = new  Member();
      $Member->user_id = $request->user_id;
      $Member->club_id = $request->club_id;
      $Member->name = $request->name;
      $Member->email = $request->email;
      $Member->phone = $request->phone;
      $Member->gender = $request->gender;
      $Member->dob = $request->dob;
      $Member->blood_group = $request->blood_group;
      $Member->address = $request->address;
      $Member->save();

      return redirect()->route("executiveCreateMambersubmitted");
      }

      public function MemberDelete(Request $request)
      {
        $User = User::where('username',$request->user_id)->delete();
        $Member = Member::where('username',$request->user_id)->delete();
        
        return redirect()->route('employeeList')->with([ 'error_message' => "Employee deleted" ]);
      }


}
