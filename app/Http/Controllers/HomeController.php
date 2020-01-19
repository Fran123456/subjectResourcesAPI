<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except('inicio_invitado');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {   $url = "https://api.apiuesfia.website/public/api";
        return view('home',compact('url'));
    }
   
    public function inicio_invitado(){
        $url = "https://api.apiuesfia.website/public/api";
        return view('welcome', compact('url'));
    }
}
