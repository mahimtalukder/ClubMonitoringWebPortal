<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Http\Requests\StoreAdminRequest;
use App\Http\Requests\UpdateAdminRequest;
use Illuminate\Http\Request;

class AdminController extends Controller
{
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

}
