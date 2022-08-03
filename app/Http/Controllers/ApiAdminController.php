<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApiAdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('ReactValidAdmin');
    }
    public function dashboard()
    {
        
      return "success";
    }
}
