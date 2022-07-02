<?php

namespace App\Http\Controllers;

use App\Models\Component;
use App\Http\Requests\StoreComponentRequest;
use App\Http\Requests\UpdateComponentRequest;
use Illuminate\Http\Request;

class ComponentController extends Controller
{
    public function components(){

        $components = Component::all();
        return view('director.components') -> with('components', $components);
    }

    public function addComponents(Request $request){

    }
}
