<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    
    public function home()
    {
        return view('home');
    }

    public function login()
    {
        return view('auth.login');
    }

    public function admin()
    {
        return view('pages.admin');
    }

    public function index()
    {
        return view('welcome');
    }

    public function dashboard()
    {
        return view('pages.dashboard');
    }

    public function user()
    {
        return view('pages.user');
    }

    public function course()
    {
        return view('pages.course');
    }

    public function announcement()
    {
        return view('pages.announcement');
    }
    
    public function profile()
    {
        return view('pages.profile');
    }
}
