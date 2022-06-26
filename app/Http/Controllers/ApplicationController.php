<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Club;
use App\Models\Component;
use App\Http\Requests\StoreApplicationRequest;
use App\Http\Requests\UpdateApplicationRequest;

class ApplicationController extends Controller
{
    public function applicationCompose()
    {
      $executive = session()->get('executive');
      $club = Club::where("id", $executive['club_id'])->first();
      $components = Component::all();

      return view('executive.createApplication')->with('club', $club)->with('components', $components);
    }

    public function applicationApproved(){
        return view('executive.approvedApplication');
    }
    public function applicationPending(){

    }
    public function applicationRejected(){

    }

}
