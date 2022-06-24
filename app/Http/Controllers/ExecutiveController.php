<?php

namespace App\Http\Controllers;

use App\Models\Executive;
use App\Http\Requests\StoreExecutiveRequest;
use App\Http\Requests\UpdateExecutiveRequest;

class ExecutiveController extends Controller
{
    public function __construct()
    {
        $this->middleware('validExecutive');
    }
}
