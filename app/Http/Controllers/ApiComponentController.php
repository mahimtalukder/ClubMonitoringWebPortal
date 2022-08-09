<?php

namespace App\Http\Controllers;

use App\Models\Component;
use App\Models\RequestedComponent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use function PHPUnit\Framework\isEmpty;

class ApiComponentController extends Controller
{
    public function components(){

        $components = Component::all();
        return $components;
    }

    public function addComponents(Request $request){
        $validate = $request->validate([
            "name" => "required",
            "description" => "required"
        ]);


        $components = new Component();
        $components->name = $request->name;
        $components->description = $request->description;
        $components->added_by = $request->user_id;
        $components->save();

        return "success";

    }
    public function IsComponentNameExist(Request $request){
        $isExist = Component::where("name", $request->name)
            ->distinct()->first();

        if($isExist){
            return false;
        }else{
            return true;
        }
    }

    public function deleteComponent(Request $request){

        $components = RequestedComponent::all();
        $hasComponent = "false";
        foreach($components as $component){
            if($component->component_id == $request->id && $component->is_approved == 'pending'){
                $hasComponent = "true";
            }
        }
        
        if($hasComponent == "false"){
            $deleteComponent = Component::where("id", $request->id)->delete();
            return "success";
        }else{
            return "This component is requested with a application and that application is in pending state.";
        }
    }
}
