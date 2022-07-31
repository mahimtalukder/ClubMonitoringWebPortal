<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Admin;
use App\Models\Director;
use App\Models\Member;
use App\Models\Executive;
use App\Models\Token;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Session;
use App\Mail\ResetPassword;
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
        if (Session::has('error_message')) {
            $error_message = session()->get('error_message');
            session()->forget('error_message');
            return view('user.signin')->with('error_message', $error_message);
        }
        if (Session::has('admin')) {
            return redirect()->route('adminDash');
        } else if (Session::has('executive')) {
            return redirect()->route('executiveDash');
        } else if (Session::has('member')) {
            return redirect()->route('memberDash');
        }
        return view('user.signin');
    }

    public function signinSubmitted(Request $request)
    {
        $rules = [
            "id" => "required",
            'password' => 'required|min:6'
        ];
        $messages = [
            'id' => "Please fill this fild",
            'password.min' => 'Minimum 6 Character',
        ];
        $this->validate($request, $rules, $messages);
        $user = User::where([['user_id', "=", $request->id],["status", "=", '1']])->first();

        if (!empty($user)) {
            if (Hash::check($request->password, $user['password'])) {
                if ($user['user_type'] == 'admin') {
                    $admin = Admin::whereRaw("BINARY user_id = '$request->id'")->first();
                    $request->session()->put('admin', $admin);
                    //token code
                    // $api_token = Str::random(64);
                    // $Token = new Token();
                    // $Token->user_id = $user->user_id;
                    // $Token->token = $api_token;
                    // $Token->created_at = new DateTime();
                    // $Token->user_type = 'admin';
                    // $Token->save();
                    // return $token;
                    // return redirect()->route('adminDash');
                } else if ($user['user_type'] == 'director') {
                    $director = Director::whereRaw("BINARY user_id = '$request->id'")->first();
                    $request->session()->put('director', $director);
                    //token code
                    $api_token = Str::random(64);
                    $Token = new Token();
                    $Token->user_id = $user->user_id;
                    $Token->token = $api_token;
                    $Token->created_at = new DateTime();
                    $Token->user_type = 'director';
                    $Token->save();
                    return $token;
                    //return redirect()->route('directorDash');
                } else if ($user['user_type'] == 'member') {
                    $member = Member::whereRaw("BINARY user_id = '$request->id'")->first();
                    $executive = Executive::whereRaw("BINARY user_id = '$request->id'")->first();
                    if (!empty($executive)) {
                        $request->session()->put('executive', $member);
                        //token code
                        $api_token = Str::random(64);
                        $Token = new Token();
                        $Token->user_id = $user->user_id;
                        $Token->token = $api_token;
                        $Token->created_at = new DateTime();
                        $Token->user_type = 'executive';
                        $Token->save();
                        return $token;
                        //return redirect()->route('executiveDash');
                    }
                    $request->session()->put('member', $member);
                    //token code
                    $api_token = Str::random(64);
                    $token = new Token();
                    $Token->user_id = $user->user_id;
                    $Token->token = $api_token;
                    $Token->created_at = new DateTime();
                    $Token->user_type = 'member';
                    $Token->save();
                    return $token;
                    //return redirect()->route('memberDash');
                }
            } else {
                return redirect()->route('signin')->with(['error_message' => "Information not found"]);
            }
        } else {
            return redirect()->route('signin')->with(['error_message' => "Information not found"]);
        }
    }

    public function logout()
    {
        if (Session::has('admin')) {
            session()->forget('admin');
        } else if (Session::has('member')) {
            session()->forget('member');
        } else if (Session::has('executive')) {
            session()->forget('executive');
        } else if (Session::has('director')) {
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

        $user = User::where("user_id", $request->id)->first();
        if (!empty($user)) {
            if ($user['user_type'] == 'admin') {
                $admin = Admin::where('user_id', $request->id)->first();
                $otp = (int)rand(100000, 900000);

                $adminUpdate = User::where("user_id", $admin["user_id"])->update([
                    'reset_password_otp' => $otp
                ]);
                $data = array(
                    'name' => $admin['name'],
                    'email' => $admin->email,
                    'reset_password_otp' => $otp
                );

                Mail::to($admin->email)->send(new ResetPassword($data));
                return redirect()->route('resetPassword',['user_id' => $admin->user_id])
                ->with('message', 'A 6 digit otp has been sent to your registered email!');
            } 
            else if ($user['user_type'] == 'director') {
                $director = Director::where('user_id', $request->id)->first();
                $otp = (int)rand(100000, 900000);

                $directorUpdate = User::where("user_id", $director["user_id"])->update([
                    'reset_password_otp' => $otp
                ]);
                $data = array(
                    'name' => $director['name'],
                    'email' => $director->email,
                    'reset_password_otp' => $otp
                );

                Mail::to($director->email)->send(new ResetPassword($data));
                return redirect()->route('resetPassword',['user_id' => $director->user_id])
                ->with('message', 'A 6 digit otp has been sent to your registered email!');
            } 
            else if ($user['user_type'] == 'member') {
                $member = Member::where('user_id', $request->id)->first();
                $otp = (int)rand(100000, 900000);

                $memberUpdate = User::where("user_id", $member["user_id"])->update([
                    'reset_password_otp' => $otp
                ]);
                $data = array(
                    'name' => $member['name'],
                    'email' => $member->email,
                    'reset_password_otp' => $otp
                );

                Mail::to($member->email)->send(new ResetPassword($data));
                return redirect()->route('resetPassword',['user_id' => $member->user_id])
                ->with('message', 'A 6 digit otp has been sent to your registered email!');
            }
        } 
        else {
            return redirect()->route('signin')->with(['error_message' => "Information not found"]);
        }
    }


    public function resetPassword(Request $request)
    {
        if (Session::has('message')){
            $message = session()->get('message');
            session()->forget('message');
            return view('user.resetPassword')->with('message', $message)->with('user_id', $request->user_id);
        }

        return view('user.resetPassword')->with('user_id', $request->user_id);
    }

    public function resetPasswordSubmitted(Request $request)
    {
        $validate = $request->validate([
            "*" => "required",
            'otp' => 'required|min:6|max:6',
            'confirm_password' => 'required|same:password'
        ]);

        $user = User::where([['user_id', "=", $request->user_id],["reset_password_otp", "=", (int)$request->otp]])->first();
        if (!empty($user)) {
            $userUpdate = User::where("user_id", $request->user_id)->update([
                'reset_password_otp'=>null,
                'password' => Hash::make($request->password)
            ]);
            return view('user.signin')->with('message', "Password reset successfully done!");
        } 
        else {
            return view('user.resetPassword')->with(['error_message' => "Information not found"])->with('user_id', $request->user_id);
        }
    }
}
