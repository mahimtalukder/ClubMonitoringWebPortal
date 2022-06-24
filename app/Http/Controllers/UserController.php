<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;

class UserController extends Controller
{
    public function home()
    {
        return redirect()->route('signin');
    }

    public function signin()
    {
        return view('user.signin');
    }

    public function singup()
    {
        return view('user.singup');
    }
}
