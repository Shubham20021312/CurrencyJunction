<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home(){
        return view('home');
    }
    public function aboutus(){
        return view('aboutus');
    }
    public function service(){
        return view('service');
    }
    public function roadmap(){
        return view('roadmap');
    }
    public function feature(){
        return view('feature');
    }
    public function faq(){
        return view('faq');
    }
    public function contact(){
        return view('contact');
    }

}
