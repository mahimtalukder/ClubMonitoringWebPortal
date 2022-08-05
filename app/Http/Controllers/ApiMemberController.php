<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApiMemberController extends Controller
{
    public function __construct()
    {
        $this->middleware('reactValidUser');
    }
    public function dashboard()
    {
        
      return "success";
    }
}
