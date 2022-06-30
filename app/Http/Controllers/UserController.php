<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Admin;
use App\Models\Director;
use App\Models\Member;
use App\Models\Executive;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Session;
use App\Mail\ResetPassword;
use App\Models\Subscriber;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function home()
    {
        return redirect()->route('signin');
    }

    public function signin()
    {
        if(Session::has('error_message'))
        {
          $error_message = session()->get('error_message');
          session()->forget('error_message');
          return view('user.signin')->with('error_message', $error_message);
        }
        if(Session::has('admin')){
            return redirect()->route('adminDash');
        }
        else if(Session::has('executive')){
            return redirect()->route('executiveDash');
        }
        else if(Session::has('member')){
            return redirect()->route('memberDash');
        }
        return view('user.signin');
    }

    public function signinSubmitted(Request $request){
        $rules=[
            "id"=>"required",
            'password'=>'required|min:6'
        ];
        $messages = [
            'id'=>"Please fill this fild",
            'password.min' => 'Minimum 6 Character',
        ];
        $this->validate($request, $rules, $messages );

        $user = User::whereRaw("BINARY user_id = '$request->id'")->first();


        if(!empty($user)){
            if (Hash::check($request->password, $user['password'])) {
                if($user['user_type'] == 'admin'){
                    $admin = Admin::whereRaw("BINARY user_id = '$request->id'")->first();
                    $request->session()->put('admin', $admin);
                    return redirect()->route('adminDash');
                }
                else if($user['user_type'] == 'director'){
                    $director = Director::whereRaw("BINARY user_id = '$request->id'")->first();
                    $request->session()->put('director', $director);
                    return redirect()->route('directorDash');
                }
                else if($user['user_type'] == 'member'){
                    $member = Member::whereRaw("BINARY user_id = '$request->id'")->first();
                    $executive =Executive::whereRaw("BINARY user_id = '$request->id'")->first();
                    if(!empty($executive)){
                        $request->session()->put('executive', $member);
                        return redirect()->route('executiveDash');
                    }
                    $request->session()->put('member', $member);
                    return redirect()->route('memberDash'); 
                }
            }
            else{
                return redirect()->route('signin')->with([ 'error_message' => "Information not found"]);
            }
        }
        else{
            return redirect()->route('signin')->with([ 'error_message' => "Information not found"]);
        }

    }

    public function logout(){
        if( Session::has('admin') ){
            session()->forget('admin');
        }
        else if( Session::has('member') ){
            session()->forget('member');
        }
        else if( Session::has('executive') ){
            session()->forget('executive');
        }
        else if( Session::has('director') ){
            session()->forget('director');
        }

        return redirect()->route('signin');
    }

    public function singup()
    {
        return view('user.singup');
    }

    public function forgetPassword()
    {
        return view('user.forgetPassword');
    }

    public function forgotPasswordSubmitted(Request $request)
    {
        $validate = $request->validate([
            "id" => "required",
        ]);

        $user = User::where("user_id",$request->id)->first();

        $director = Director::where('user_id',$request->id)->first();
        Mail::to($director->email)->send(new ResetPassword($director->email));

            return new JsonResponse(
            [
                'success' => true, 
                'message' => "Thank you for subscribing to our email, please check your inbox"
            ], 
            200
        );

    }
}
