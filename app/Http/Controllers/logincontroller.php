<?php

namespace sisHotel\Http\Controllers;

use Illuminate\Http\Request;

class logincontroller extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        return view('auth.login');
    }
    public function admin(){
        return view('layouts.header');
    }

}
