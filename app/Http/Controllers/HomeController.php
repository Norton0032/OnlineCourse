<?php

namespace App\Http\Controllers;

use App\Models\User;
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
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function update()
    {
        $data = request()->validate([
            'name' => 'string'
        ]);
        auth()->user()->name = $data['name'];
        auth()->user()->save();
        return redirect()->route('home');
    }
    public function edit()
    {
        return view('home_edit');
    }
}
