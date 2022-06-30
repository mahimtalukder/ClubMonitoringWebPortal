<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Director;
use App\Http\Requests\StoreAdminRequest;
use App\Http\Requests\UpdateAdminRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /**
     * @var string
     */

    public function __construct()
    {
        $this->middleware('validAdmin');
    }

    public function dashboard()
    {
      return view('admin.dashboard');
    }

    public function profile(){
        $admin_session = session()->get('admin');
        $admin = Admin::where("user_id", $admin_session["user_id"])->first();
        return view('admin.profile')->with('admin', $admin);
    }

    public function editProfile(){
        $admin_session = session()->get('admin');
        $admin = Admin::where("user_id", $admin_session["user_id"])->first();
        return view('admin.editProfile')->with('admin_info', $admin);
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
        $admin_session = session()->get('admin');
        $admin = Admin::where("user_id", $admin_session["user_id"])->update([
        'name' => $request->name,
        'email' => $request->email,
        'phone' => $request->phone,
        'gender' => $request->gender,
        'dob' => $request->dob,
        'blood_group' =>$request->blood_group,
        'address' => $request->address,
        ]);
        return redirect()->route('adminEditProfile');
    }

    public function adminCreateDirector(){
        return view('admin.createDirector');
    }

    public function adminCreateDirectorSubmitted(Request $request){
        $validate = $request->validate([
            "name" => "required|regex:/^[a-zA-Z]+(([',. -][a-zA-Z ])?[a-zA-Z]*)*$/u",
            "email" => "email|unique:directors,email",
            "phone" => "required|numeric||unique:directors,phone"
        ]);

        //Generating unique id for director
        $directors = json_encode(Director::all());
        $directors = json_decode($directors);
        $unique_id = "";
        if(!empty($directors)) {
            $last_director = end($directors);
            $last_director_id = $last_director->user_id;
            $arr = explode("-", $last_director_id);
            $id_mid = (int)$arr[1];
            $id_changed = $id_mid + 1;
            $unique_id = "11" . "-" . $id_changed . "-" . "3";
        }
        else{
            $unique_id= "11" . "-" ."10001"."-". "3";
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


        try {
            DB::transaction(function () use ($unique_id, $unique_pass, $request){
                $user = new User();
                $user->user_id = $unique_id;
                $user->password = Hash::make($unique_pass);
                $user->user_type = "director";
                $user->save();

                $director = new Director();
                $director->user_id = $unique_id;
                $director->name = $request->name;
                $director->designation = $request->designation;
                $director->email = $request->email;
                $director->phone = $request->phone;
                $director->blood_group = $request->blood_group;
                $director->gender = $request->gender;
                $director->dob = $request->dob;
                $director->address = $request->address;
                $director->images = "../assets_2/images/faces/default.png";
                $director->save();
            }, 5);
        }
        catch (\Exception $e){
            DB::rollBack();
            return $e->getMessage();
        }


        return view('admin.createDirector')->with('message', "Account created successfully. Note: User ID and Password sent to his email address.");
    }



    public function directorList(){
        $directors = User::select('directors.*', 'users.status')
            ->join('directors', 'users.user_id', '=', 'directors.user_id')
            ->get();
        return view('admin.directorList')->with('directors', $directors);
    }


    public function directorUpdate(Request $request){
        $directors = Director::where('user_id', $request->id)->first();
        return view('admin.updateDirector')->with('director', $directors);
    }

    public function directorUpdateSubmitted(Request $request){
        Director::where('user_id', $request->id)->update([
            'name' => $request->name,
            'designation' => $request->designation,
            'email' => $request->email,
            'phone' => $request->phone,
            'blood_group' => $request->blood_group,
            'gender' => $request->gender,
            'dob' => $request->dob,
            'address' => $request->address

        ]);


        return redirect()->route('adminDirectorUpdate',['id' => $request->id]);
    }

    public function directorStatusUpdate(Request  $request){
        User::where('user_id', $request->id)->update([
            'status' => $request->status_code
        ]);
        return redirect()->route('adminDirectorList');
    }

}
