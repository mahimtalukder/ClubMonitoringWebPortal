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
use Illuminate\Support\Facades\Session;
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
      $day=15;
      $member_session = session()->get('executive');
      $all_applications = Application::where([['created_at', '>', date('Y-m-d', strtotime("-".$day." days"))],['club_id', '=', $member_session->club_id]])
      ->get();

      $data = array();

      for($i=$day; $i>=0; $i--){
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
      return view('executive.dashboard') ->with('applications', $data);;
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
    $request->validate([
      'image' => 'mimes:jpeg,jpg,png,gif|required|max:1000000',
  ]);



    if($request->hasFile('image')){
        $member_session = session()->get('executive');
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

        session()->put('executive', $member_session);
        return redirect()->route('executiveEditProfile');
    }
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


 

  public function ViewAllMamber(){

    $member = User::select('members.*', 'users.status')
    ->join('members', 'users.user_id', '=', 'members.user_id')
    ->get();


    if (Session::has('message')){
      $message = session()->get('message');
      session()->forget('message');
      return view('executive.ViewMember')->with('MemberList', $member)->with('message', $message);
  }

    return view('executive.ViewMember')->with('MemberList', $member);
  }

  public function CreateNewMamber(){

    return view('executive.NewMember');

  }

  public function CreateMamber(Request $request){

    $validate = $request->validate([
      "name" => "required|regex:/^[a-zA-Z]+(([',. -][a-zA-Z ])?[a-zA-Z]*)*$/u",
      "email" => "email|unique:directors,email",
      "phone" => "required|numeric||unique:directors,phone"
  ]);

  //Generating unique id for director
  $members = json_encode(Member::all());
  $members = json_decode($members);
  $unique_id = "";
  if(!empty($members)) {
      $last_members = end($members);
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

  $member_session = session()->get('executive');
  $executive = Member::where("user_id", $member_session["user_id"])->first();


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
              $Member->club_id = $executive->club_id;
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
              }, 5);
          }
          catch (\Exception $e){
              DB::rollBack();
              return $e->getMessage();
          }


      return view("executive.NewMember")->with('message', "Account created successfully. Note: User ID and Password sent to his email address.");
      }

      public function MemberDelete(Request $request)
      {
        $User = User::where('username',$request->user_id)->delete();
        $Member = Member::where('username',$request->user_id)->delete();
        
        return redirect()->route('employeeList')->with([ 'error_message' => "Employee deleted" ]);
      }


      public function MemberStatusUpdate(Request $request){
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

        return redirect()->route('executiveViewAllMamber')->with('message', $message);
    }


    public function UpdateMamber(Request $request){

      $member = Member::where('user_id', $request->user_id)->first();
      if (Session::has('message')){
          $message = session()->get('message');
          session()->forget('message');
          return view('executive.updateMember')->with('MemberList', $member)->with('message', $message);
      }

      return view('executive.updateMember')->with('MemberList', $member);
    }


    public function UpdateMemberSubmitted(Request $request){


      $member = Member::where('user_id', $request->user_id)->update([
          'name' => $request->name,
          'email' => $request->email,
          'phone' => $request->phone,
          'gender' => $request->gender,
          'dob' => $request->dob,
          'blood_group' =>$request->blood_group,
          'address' => $request->address,
          ]);
          return redirect()->route('executiveViewAllMamber',['user_id' => $request->user_id])->with('message', 'Account information updated');
    }


    public function SendNotice(){

      return view('executive.sendNotice');
    }
    

    public function SendNoticePost(Request $request){

      $validate = $request->validate([
        "title" => "required",
        "notice" => "required"

    ]);


    $member_session = session()->get('executive');
    $executive = Member::where("user_id", $member_session["user_id"])->first();
    
      $Notice = new  Notice();
      $Notice->title = $request->title;
      $Notice->notice = $request->notice;
      $Notice->club_id = $executive->club_id;
      $Notice->save();

      return view('executive.sendNotice')->with('message','Notice sucsessfully posted');

    }

    public function ViewNotice(){

      $member_session = session()->get('executive');

      $Notice = Notice::where("club_id", $member_session["club_id"])->paginate(6);

      return view('executive.viewNotice')->with('NoticeList', $Notice);


    }



}
