<?php

namespace sisHotel\Http\Controllers;

use Illuminate\Http\Request;

class rol extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
}
