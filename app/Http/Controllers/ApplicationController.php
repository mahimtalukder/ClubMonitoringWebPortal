<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Club;
use App\Models\Component;
use App\Http\Requests\StoreApplicationRequest;
use App\Http\Requests\UpdateApplicationRequest;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    public function applicationCompose()
    {
      $executive = session()->get('executive');
      $club = Club::where("id", $executive['club_id'])->first();
      $components = Component::all();

      return view('executive.createApplication')->with('club', $club)->with('components', $components);
    }


    public function applicationComposeSubmitted(Request $request)
    {
        return view('executive.createApplication');
        $total_componet=(int)$request->total_componet;
        if($total_componet>0){
            $rules=[
                '*' => 'required'
            ];
            $messages = [
                'required'=>"Please fill all the filds",
            ];
            $this->validate($request, $rules, $messages );
            return view('executive.createApplication');

        }else{
            return view('executive.createApplication');
        }

    }

    public function applicationApproved(){
        return view('executive.approvedApplication');
    }
    public function allApplication(){
        $applications = Application::all();
        return view('executive.allApplication')->with('applications', $applications);
    }
    public function applicationPending(){

    }
    public function applicationRejected(){

    }
    public function applicationRead(){
        return view('executive.readApplication');
    }

}
