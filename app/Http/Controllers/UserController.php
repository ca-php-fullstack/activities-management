<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserActivity;

class UserController extends Controller
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
    public function index(UserActivity $userActivity)
    {
        $userActivity = UserActivity::all();
        return view('profile.index', compact('userActivity'));
    }
}
