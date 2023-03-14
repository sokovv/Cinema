<?php

namespace App\Http\Controllers;

class UserController extends Controller
{

    public function create(): \Illuminate\Http\Response
    {
        return redirect()->route('login');
    }
}
