<?php

namespace sisHotel\Http\Controllers;

use Illuminate\Http\Request;

class contratocontroller extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
          return view('contrato.contrato');
}
}
