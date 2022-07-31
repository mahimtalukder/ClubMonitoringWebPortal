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

class ApiUserController extends Controller
{
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
                    $api_token = Str::random(64);
                    $Token = new Token();
                    $Token->user_id = $user->user_id;
                    $Token->token = $api_token;
                    $Token->created_at = new DateTime();
                    $Token->user_type = 'admin';
                    $Token->save();
                    return $token;
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
}
