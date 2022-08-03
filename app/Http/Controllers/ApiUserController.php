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
use Carbon\Carbon;
use Illuminate\Support\Str;
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
                    //token code
                    $api_token = Str::random(64);
                    $token = new Token();
                    $token->user_id = $user->user_id;
                    $token->token = $api_token;
                    $token->created_at = Carbon::now()->format('Y-m-d H:i:s');
                    $token->user_type = 'admin';
                    $token->save();
                    $admin['user_type']='admin';
                    $admin['token']=$api_token;
                    return $admin;
                    // return redirect()->route('adminDash');
                } else if ($user['user_type'] == 'director') {
                    $director = Director::whereRaw("BINARY user_id = '$request->id'")->first();
                    //token code
                    $api_token = Str::random(64);
                    $token = new Token();
                    $token->user_id = $user->user_id;
                    $token->token = $api_token;
                    $token->created_at = Carbon::now()->format('Y-m-d H:i:s');
                    $token->user_type = 'director';
                    $token->save();
                    $director['token']=$api_token;
            ○        $director['user_type']='director';
                    return $director;
                    //return redirect()->route('directorDash');
                } else if ($user['user_type'] == 'member') {
                    $member = Member::whereRaw("BINARY user_id = '$request->id'")->first();
                    $executive = Executive::whereRaw("BINARY user_id = '$request->id'")->first();
                    if (!empty($executive)) {
                        $request->session()->put('executive', $member);
                        //token code
                        $api_token = Str::random(64);
                        $token = new Token();
                        $token->user_id = $user->user_id;
                        $token->token = $api_token;
                        $token->created_at = Carbon::now()->format('Y-m-d H:i:s');
                        $token->user_type = 'executive';
                        $token->save();
                        $member['token']=$api_token;
                        $member['user_type']='executive';
                        return $member;
                        //return redirect()->route('executiveDash');
                    }
                    $request->session()->put('member', $member);
                    //token code
                    $api_token = Str::random(64);
                    $token = new Token();
                    $token->user_id = $user->user_id;
                    $token->token = $api_token;
                    $token->created_at = Carbon::now()->format('Y-m-d H:i:s');
                    $token->user_type = 'member';
                    $token->save();
                    $member['token']=$api_token;
                    $member['user_type']='member';
                    return $member;
                    //return redirect()->route('memberDash');
                }
            } else {
                return "Information not found";
            }
        } else {
            return "Information not found";
        }
    }

    public function logout(Request $request){
        $token = Token::where("token", $request->token)->update([
            'expired_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ]);

        return "logout success";
    }
}
