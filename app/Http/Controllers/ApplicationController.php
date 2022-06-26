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

    }
    public function applicationPending(){

    }
    public function applicationRejected(){

    }

}
