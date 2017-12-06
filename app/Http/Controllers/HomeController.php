<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->hasRole('cysy'))
        {
            return redirect()->route('cysy.dashboard');
        }
        if(Auth::user()->hasRole('managers'))
        {
            return redirect()->route('managers.dashboard');
        }
        if(Auth::user()->hasRole('owners'))
        {
            return redirect()->route('owners.dashboard');
        }
        else
        {
            return redirect('/');
        }

        return view('home');
    }
}
