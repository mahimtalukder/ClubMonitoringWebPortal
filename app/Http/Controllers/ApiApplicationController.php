<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\RequestedComponent;
use App\Models\Club;
use App\Models\Component;
use App\Http\Requests\StoreApplicationRequest;
use App\Http\Requests\UpdateApplicationRequest;
use Illuminate\Http\Request;

class ApiApplicationController extends Controller
{
    public function removeComponent(Request $request){

        $removeComponent = RequestedComponent::where("id", $request->id)->update([
            'is_approved' => "rejected",
            'remarks' => $request->remarks
            ]);

        return "success";
    }
}
