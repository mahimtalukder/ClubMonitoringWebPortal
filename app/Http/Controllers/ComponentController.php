<?php

namespace App\Http\Controllers;

use App\Models\Component;
use App\Http\Requests\StoreComponentRequest;
use App\Http\Requests\UpdateComponentRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ComponentController extends Controller
{
    public function components(){

        $components = Component::paginate(3);
        if (Session::has('message')){
            $message = session()->get('message');
            session()->forget('message');
            return view('director.components') -> with('components', $components)->with('message', $message);
        }
        return view('director.components') -> with('components', $components);
    }

    public function addComponents(Request $request){
        $validate = $request->validate([
            "name" => "required",
            "description" => "required"
        ]);

        $director= session()->get('director');

        $components = new Component();
        $components->name = $request->name;
        $components->description = $request->description;
        $components->added_by = $director->user_id;
        $components->save();

        return redirect()->route('components')->with('message', 'Component added successfully!');

    }

}
