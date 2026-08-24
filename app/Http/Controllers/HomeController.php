<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class HomeController extends Controller
{
    public function home()
    {
        return view('frontend.pages.home');
    }
    public function about()
    {
        return view('frontend.pages.about');
    }
    public function blog()
    {
        return view('frontend.pages.blog');
    }
    public function dblog()
    {
        return view('frontend.pages.dblog');
    }
    public function carerr()
    {
        return view('frontend.pages.carerr');
    }
    public function dcarerr()
    {
        return view('frontend.pages.dcarerr');
    }
    public function dportfolio()
    {
        return view('frontend.pages.dportfolio');
    }
}
