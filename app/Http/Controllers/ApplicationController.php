<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\RequestedComponent;
use App\Models\Club;
use App\Models\Component;
use App\Http\Requests\StoreApplicationRequest;
use App\Http\Requests\UpdateApplicationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

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
          return view('executive.createApplication')->with('club', $club)->with('components', $components)->with('message', $message)->with('labelName', 'New Applications');
        }

      return view('executive.createApplication')->with('club', $club)->with('components', $components)->with('labelName', 'New Applications');
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
                $applicaion->club_id = $executive->club_id;
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
                    $request_componet->is_approved = "pending";
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
                $applicaion->club_id = $executive->club_id;
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
                    $request_componet->is_approved = "pending";
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
                $applicaion->club_id = $executive->club_id;
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
                $applicaion->club_id = $executive->club_id;
                $applicaion->save();

                return redirect()->route('executiveApplicationCompose')->with([ 'message' => "Application successfully submitted!"]);
            }
        }

    }

    public function applicationApproved(){
        $executive = session()->get('executive');
        $club = Club::where("id", $executive['club_id'])->first();

        $applications = Application::where('is_approved', 'approved')
            ->where('club_id', $club->id)
            ->orderBy("created_at", "desc")
            ->paginate(1);

        return view('executive.applications')->with('club', $club)->with('applications', $applications)->with('labelName', 'Approved Applications');
    }
    public function allApplication(){
        $executive = session()->get('executive');
        $club = Club::where("id", $executive['club_id'])->first();

        $applications = Application::where('club_id', $club->id)->orderBy("created_at", "desc")->paginate(1);

        return view('executive.applications')
            ->with('club', $club)
            ->with('applications', $applications)
            ->with('labelName', 'Applications');
    }
    public function applicationPending(){
        $executive = session()->get('executive');
        $club = Club::where("id", $executive['club_id'])->first();

        $applications = Application::where('is_approved', 'pending')
            ->where('club_id', $club->id)
            ->orderBy("created_at", "desc")
            ->paginate(1);


        return view('executive.applications')
            ->with('club', $club)->with('applications', $applications)
            ->with('labelName', 'Pending Applications');
    }
    public function applicationRejected(){
        $executive = session()->get('executive');
        $club = Club::where("id", $executive['club_id'])->first();

        $applications = Application::where('is_approved', 'rejected')
            ->where('club_id', $club->id)
            ->orderBy("created_at", "desc")
            ->paginate(1);

        return view('executive.applications')
            ->with('club', $club)
            ->with('applications', $applications)
            ->with('labelName', 'Rejected Applications');
    }
    public function applicationRead(Request $request){

        $executive = session()->get('executive');
        $club = Club::where("id", $executive['club_id'])->first();

        $application_info = Application::where("application_id", $request->id)->first();

        $requested_components = Application::select('requested_components.*', 'components.name')
            ->join('requested_components', 'applications.application_id', '=', 'requested_components.application_id')
            ->join('components', 'requested_components.component_id', '=', 'components.id')
            ->where(['requested_components.application_id' => $application_info->application_id])
            ->get();

//        if($executive['club_id']) == $application_info->club_id){
//
//        }
        return view('executive.readApplication')
            ->with('club', $club)
            ->with('application_info', $application_info)
            ->with('labelName', 'Read Applications')
            ->with('requested_components',$requested_components);
    }

    public function searchExecutiveApplication(Request $request){
        $executive = session()->get('executive');
        $club = Club::where("id", $executive['club_id'])->first();

        $search = $request->input('search');

        $applications = Application::where('club_id', $club->id)->where(function($query) use ($search){
            $query->where('subject', 'LIKE', "%{$search}%")
                ->orWhere('description', 'LIKE', "%{$search}%");
        })
            ->orderBy("created_at", "desc")
            ->paginate(1);
//


        return view('executive.applications')
            ->with('club', $club)
            ->with('applications', $applications)
            ->with('labelName', 'Search Results');
    }

    public function removeComponent(Request $request){
        
        $removeComponent = RequestedComponent::where("id", $request->id)->update([
            'is_approved' => "rejected",
            'remarks' => $request->remarks
            ]);
        
        return redirect()->route('directorApplicationRead',['id'=>$request->application_id]);
    }

    public function rejectApplication(Request $request){

        $rejectApplication = Application::where("application_id", $request->application_id )->update([
            'is_approved' => "rejected",
            'rejection_msg' => $request->remarks
            ]);

        $rejectComponent = RequestedComponent::where("application_id", $request->application_id )
        ->update([
            'is_approved' => "rejected",
            'remarks' => $request->remarks
            ]);
        
        return redirect()->route('directorAllApplication');
    }

    public function applicationUpdateSubmitted(Request $request){
        $validate = $request->validate([
            '*' => 'required'
        ],
        );

        if((int)$request->total_component>0)
        {
            for ($i = 1; $i <= $request->total_component; $i++){
                $approvedComponent = RequestedComponent::where("id", $request['component['.$i.'][id]'] )
                ->update([
                    'is_approved' => "approved",
                    'approved_start_time' => $request['component['.$i.'][approved_start_time]'],
                    'approved_end_time' => $request['component['.$i.'][approved_end_time]'], 
                    'quantity' => $request['component['.$i.'][approved_quantity]']
                    ]);
            }

            $approvedApplication = Application::where("application_id", $request->application_id )->update([
                'is_approved' => "approved",
                'approve_date' => $request->date
                ]);
        }

        return redirect()->route('directorAllApplication');

    }
}
