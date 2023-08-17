<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class PageController extends Controller
{

    function home()
    {
        return view('index');
    }
    function about()
    {
        return view('pages.about');
    }
    function stock()
    {
        return view('pages.stock');
    }
    /*function register()
    {
        return view('auth.page.register');
    }
    function login()
    {
        return view('auth.page.login');
    }*/
}
