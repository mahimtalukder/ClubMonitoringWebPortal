<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\RequestedComponent;
use App\Models\Club;
use App\Models\Component;
use App\Http\Requests\StoreApplicationRequest;
use App\Http\Requests\UpdateApplicationRequest;
use Illuminate\Http\Request;
use Session;

class ApplicationController extends Controller
{
    public function applicationCompose()
    {
      $executive = session()->get('executive');
      $club = Club::where("id", $executive['club_id'])->first();
      $components = Component::all();

      if(Session::has('message')){
          $message = session()->get('message');
          session()->forget('message');
        return view('executive.createApplication')->with('club', $club)->with('components', $components)->with('message', $message);
        }

      return view('executive.createApplication')->with('club', $club)->with('components', $components);
    }


    public function applicationComposeSubmitted(Request $request)
    {
        $total_componet=(int)$request->total_componet;
        if($total_componet>0){
            $validate = $request->validate([
                '*' => 'required'
            ],
            );


            $applications = json_encode(Application::all());
            $applications = json_decode($applications);
            if(!empty($applications)){
                $last_application=end($applications);
                $last_application_id = $last_application->application_id;
                $arr=explode("-",$last_application_id);
                $id_mid=(int)$arr[1];
                $id_changed=$id_mid+1;
                $new_id= date("y")."-".$id_changed."-".date("m");

                $executive = session()->get('executive');

                $applicaion = new  Application();
                $applicaion->application_id = $new_id;
                $applicaion->subject = $request->subject;
                $applicaion->description = $request->description;
                $applicaion->executive_id = $executive->user_id;
                $applicaion->sent_to = $request->sent_to;
                $applicaion->request_date = $request->date;
                $applicaion->is_approved = "pending";
                $applicaion->save();

                for ($i = 1; $i <= $total_componet; $i++) {
                    $start_time = "start_time".(string)$i;
                    $end_time = "end_time".(string)$i;
                    $quantity = "quantity".(string)$i;
                    $name = "component".(string)$i;

                    $request_componet = new RequestedComponent();
                    $request_componet->application_id = $new_id;
                    $components= Component::where('name', $request[$name])->get(['id']);
                    $component_id='';
                    foreach($components as $cp){
                        $component_id = $cp['id'];
                    }
                    $request_componet->component_id = $component_id;
                    $request_componet->start_time = $request[$start_time];
                    $request_componet->end_time = $request[$end_time];
                    $request_componet->quantity = $request[$quantity];
                    $request_componet->save();
                }

                return redirect()->route('executiveApplicationCompose')->with([ 'message' => "Application successfully submitted!"]);
            }
            else{
                $new_id= date("y")."-"."10001"."-".date("m");

                $executive = session()->get('executive');

                $applicaion = new  Application();
                $applicaion->application_id = $new_id;
                $applicaion->subject = $request->subject;
                $applicaion->description = $request->description;
                $applicaion->executive_id = $executive->user_id;
                $applicaion->sent_to = $request->sent_to;
                $applicaion->request_date = $request->date;
                $applicaion->is_approved = "pending";
                $applicaion->save();

                for ($i = 1; $i <= $total_componet; $i++) {
                    $start_time = "start_time".(string)$i;
                    $end_time = "end_time".(string)$i;
                    $quantity = "quantity".(string)$i;
                    $name = "component".(string)$i;

                    $request_componet = new RequestedComponent();
                    $request_componet->application_id = $new_id;
                    $components= Component::where('name', $request[$name])->get(['id']);
                    $component_id='';
                    foreach($components as $cp){
                        $component_id = $cp['id'];
                    }
                    $request_componet->component_id = $component_id;
                    $request_componet->start_time = $request[$start_time];
                    $request_componet->end_time = $request[$end_time];
                    $request_componet->quantity = $request[$quantity];
                    $request_componet->save();
                }

                return redirect()->route('executiveApplicationCompose')->with([ 'message' => "Application successfully submitted!"]);
            }

        }
        else{
            $validate = $request->validate([
                '*' => 'required'
            ],
            );


            $applications = json_encode(Application::all());
            $applications = json_decode($applications);
            if(!empty($applications)){
                $last_application=end($applications);
                $last_application_id = $last_application->application_id;
                $arr=explode("-",$last_application_id);
                $id_mid=(int)$arr[1];
                $id_changed=$id_mid+1;
                $new_id= date("y")."-".$id_changed."-".date("m");

                $executive = session()->get('executive');

                $applicaion = new  Application();
                $applicaion->application_id = $new_id;
                $applicaion->subject = $request->subject;
                $applicaion->description = $request->description;
                $applicaion->executive_id = $executive->user_id;
                $applicaion->sent_to = $request->sent_to;
                $applicaion->request_date = $request->date;
                $applicaion->is_approved = "pending";
                $applicaion->save();

                return redirect()->route('executiveApplicationCompose')->with([ 'message' => "Application successfully submitted!"]);
            }
            else{
                $new_id= date("y")."-"."10001"."-".date("m");

                $executive = session()->get('executive');

                $applicaion = new  Application();
                $applicaion->application_id = $new_id;
                $applicaion->subject = $request->subject;
                $applicaion->description = $request->description;
                $applicaion->executive_id = $executive->user_id;
                $applicaion->sent_to = $request->sent_to;
                $applicaion->request_date = $request->date;
                $applicaion->is_approved = "pending";
                $applicaion->save();

                return redirect()->route('executiveApplicationCompose')->with([ 'message' => "Application successfully submitted!"]);
            }
        }

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
