<?php

namespace App\Http\Controllers;

use App\Models\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ApiComponentController extends Controller
{
    public function components(){

        $components = Component::all();
        return $components;
    }
}
