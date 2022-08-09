<?php

namespace App\Http\Controllers;


use App\Models\User;
use App\Models\Notice;
use App\Models\Executive;
use App\Models\Member;
use App\Models\Application;
use App\Models\Club;
use App\Http\Requests\StoreExecutiveRequest;
use App\Http\Requests\UpdateExecutiveRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\MemberAccountLoginCredentials;

class ApiExecutiveController extends Controller
{
    public function __construct()
    {
        $this->middleware('reactValidUser');
    }
    public function dashboard()
    {
        
      return "success";
    }
    public function CreateMamber(Request $request){

    $validate = $request->validate([
      "name" => "required|regex:/^[a-zA-Z]+(([',. -][a-zA-Z ])?[a-zA-Z]*)*$/u",
      "email" => "email|unique:directors,email",
      "phone" => "required|numeric||unique:directors,phone"
  ]);

  //Generating unique id for director
  $Members = json_encode(Member::all());
  $Members = json_decode($Members);
  $unique_id = "";
  if(!empty($Members)) {
      $last_members = end($Members);
      $last_members_id = $last_members->user_id;
      $arr = explode("-", $last_members_id);
      $id_mid = (int)$arr[1];
      $id_changed = $id_mid + 1;
      $unique_id = "13" . "-" . $id_changed . "-" . "3";
  }
  else{
      $unique_id= "13" . "-" ."10001"."-". "3";
  }

  //generating unique password
  $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
  $pass = array(); //remember to declare $pass as an array
  $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
  for ($i = 0; $i < 8; $i++) {
      $n = rand(0, $alphaLength);
      $pass[] = $alphabet[$n];
  }
  $unique_pass = implode($pass);


  $executive = Member::where([['user_id', "=", $request->id]])->first();


      try {
          DB::transaction(function () use ($unique_id, $unique_pass,$executive, $request){
              $user = new User();
              $user->user_id = $unique_id;
              $user->password = Hash::make($unique_pass);
              $user->user_type = "member";
              $user->status=1;
              $user->save();

              $Member = new  Member();
              $Member->user_id = $unique_id;
              $Member->club_id =2 ;// $executive->club_id;
              $Member->name = $request->name;
              $Member->designation = $request->designation;
              $Member->email = $request->email;
              $Member->phone = $request->phone;
              $Member->blood_group = $request->blood_group;
              $Member->gender = $request->gender;
              $Member->dob = $request->dob;
              $Member->address = $request->address;
              $Member->images = "../assets_2/images/faces/default.png";
              $Member->save();

              /*Mail login credentials to the user*/
                $data = array(
                    'name' => $request->name,
                    'email' => $request->email,
                    'user_id' => $unique_id,
                    'password' => $unique_pass
                );

                Mail::to($request->email)->send(new MemberAccountLoginCredentials($data));
                /* Mail end */
              }, 5);
          }
          catch (\Exception $e){
              DB::rollBack();
              return $e->getMessage();
          }


      return "success";
      }

      public function editProfileSubmitted(Request $request){

      // $validate = $request->validate([
      //     "name" => "required|regex:/^[a-zA-Z]+(([',. -][a-zA-Z ])?[a-zA-Z]*)*$/u",
      //     "email" => "email",
      //     "phone" => "required|numeric",
      //     "gender" => "required",
      //     "dob" => "required",
      //     "blood_group" => "required",
      //     'address' => 'required'
      // ] );

      $Member = Member::where([['user_id', "=", $request->id]])->update([
          'name' => $request->name,
          'email' => $request->email,
          'phone' => $request->phone,
          'gender' => $request->gender,
          'dob' => $request->dob,
          'blood_group' =>$request->blood_group,
          'address' => $request->address,
          ]);
          return "success";

      }

      public function memberList(){
      $members = User::select('members.*', 'users.status')
          ->join('members', 'users.user_id', '=', 'members.user_id')
          ->get();

        return $members;
      }
      public function memberStatusUpdate(Request $request){
        User::where('user_id', $request->user_id)->where('user_type', 'member')->update([
            'status' => $request->status_code
        ]);

        $message = "";
        if($request->status_code == 0){
            $message = $request->user_id." blocked successfully. To unblock press the Unblock button";
        }
        else
        {
            $message = $request->user_id." unblocked successfully. To block press the block button";
        }

        return $message;
    }

    public function memberInfo(Request $request){

        $member = Member::where('user_id', $request->id)->first();
        return $member;
    }

     public function SendNoticePost(Request $request){

    //   $validate = $request->validate([
    //     "title" => "required",
    //     "notice" => "required"

    // ]);


    $executive = Member::where('user_id', $request->id)->first();
    
      $Notice = new  Notice();
      $Notice->title = $request->title;
      $Notice->notice = $request->notice;
      $Notice->club_id =2;// $executive->club_id;
      $Notice->save();

      return "success";

    }

    public function ViewNotice(){

      $member_session = session()->get('executive');

      $Notice = Notice::where("club_id", $member_session["club_id"])->paginate(6);

      return view('executive.viewNotice')->with('NoticeList', $Notice);


    }

}
