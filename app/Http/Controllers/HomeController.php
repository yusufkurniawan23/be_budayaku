<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        return view('layouts.homepage');
    }

    public function contact(){
        return view('frontend.contact');
    }

    public function agenda(){
        return view('frontend.agenda');
    }

    public function seniman(){
        return view('frontend.seniman');
    }

    public function budaya(){
        return view('frontend.budaya');
    }
}
