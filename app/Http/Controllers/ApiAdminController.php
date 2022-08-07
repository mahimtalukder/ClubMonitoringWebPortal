<?php

namespace App\Http\Controllers;
use App\Mail\DirectorAccountLoginCredentials;
use App\Models\Director;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class ApiAdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('reactValidUser');
    }
    public function dashboard()
    {

      return "success";
    }

    public function directorList(){
      $directors = User::select('directors.*', 'users.status')
          ->join('directors', 'users.user_id', '=', 'directors.user_id')
          ->get();

      return $directors;
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
                $user->status = 1;
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

                /*Mail login credentials to the user*/
                $data = array(
                    'name' => $request->name,
                    'email' => $request->name,
                    'user_id' => $unique_id,
                    'password' => $unique_pass
                );

                Mail::to($request->email)->send(new DirectorAccountLoginCredentials($data));
                /* Mail end */

            }, 5);

        }
        catch (\Exception $e){
            DB::rollBack();
            return "error";
        }

        return "Account created successfully. Note: User ID and Password sent to his email address.";
    }

    public function directorStatusUpdate(Request $request){
        User::where('user_id', $request->user_id)->where('user_type', 'director')->update([
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


}
