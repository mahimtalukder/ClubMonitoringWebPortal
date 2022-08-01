<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApiDirectorController extends Controller
{
    public function __construct()
    {
        $this->middleware('reactValidDirector');
    }
    public function dashboard()
    {
        
      return "success";
    }
}
