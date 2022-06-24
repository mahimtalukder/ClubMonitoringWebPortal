<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Http\Requests\StoreAdminRequest;
use App\Http\Requests\UpdateAdminRequest;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('validAdmin');
    }

    public function dashboard()
    {
      return view('admin.dashboard');
    }
}
