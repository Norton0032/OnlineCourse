<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WithOutHomeController extends Controller
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

    public function index()
    {
        return redirect()->route('home');
    }
}
