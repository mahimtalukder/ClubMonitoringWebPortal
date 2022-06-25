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
        $admin = Admin::where("id", "12-10001-3")->first();
        return view('admin.profile')->with('admin', $admin);
    }
    public function editProfile(){
        $admin_session = session()->get('admin');
        $admin = Admin::where("id", "12-10001-3")->first();
        return view('admin.profile')->with('admin', $admin);
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
