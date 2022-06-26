<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Http\Requests\StoreApplicationRequest;
use App\Http\Requests\UpdateApplicationRequest;

class ApplicationController extends Controller
{
    public function applicationCompose(){
        return view('executive.createApplication');
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
