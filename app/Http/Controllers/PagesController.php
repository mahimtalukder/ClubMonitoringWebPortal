<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    /*-- Home routing function --*/
    public function home()
    {
        return view('publicPages.home');
    }

}
