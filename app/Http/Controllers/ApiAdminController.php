<?php

namespace App\Http\Controllers;
use App\Models\User;

use Illuminate\Http\Request;

class ApiAdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('reactValidUser');
    }
    public function dashboard()
    {
        
      return "success";
    }

    public function directorList(){
      $directors = User::select('directors.*', 'users.status')
          ->join('directors', 'users.user_id', '=', 'directors.user_id')
          ->get();

      return $directors;
  }
}
