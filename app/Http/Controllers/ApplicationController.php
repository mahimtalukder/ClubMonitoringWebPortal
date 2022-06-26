<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Club;
use App\Models\Component;
use App\Http\Requests\StoreApplicationRequest;
use App\Http\Requests\UpdateApplicationRequest;
use App\Models\RequestedComponent;

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
        $applications = Application::where('is_approved', 'approved')->get();
        return view('executive.applications')->with('applications', $applications)->with('labelName', 'Approved Applications');
    }
    public function allApplication(){
        $applications = Application::all();
        return view('executive.applications')->with('applications', $applications)->with('labelName', 'Applications');
    }
    public function applicationPending(){
        $applications = Application::where('is_approved', 'pending')->get();
        return view('executive.applications')->with('applications', $applications)->with('labelName', 'Pending Applications');
    }
    public function applicationRejected(){
        $applications = Application::where('is_approved', 'rejected')->get();
        return view('executive.applications')->with('applications', $applications)->with('labelName', 'Rejected Applications');
    }



    public function applicationRead(){
        $application_info = Application::where("application_id", '10-101')->first();

        $requested_components = Application::select('requested_components.*', 'components.name')
            ->join('requested_components', 'applications.application_id', '=', 'requested_components.application_id')
            ->join('components', 'requested_components.component_id', '=', 'components.id')
            ->where(['requested_components.application_id' => '10-101'])
            ->get();


        return view('executive.readApplication')->with('application_info', $application_info)->with('requested_components',$requested_components);
    }

}
