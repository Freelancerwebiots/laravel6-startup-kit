<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setting;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
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

    public function welcome()
    {
        $address = Setting::where('slug', 'address')->value('value');
        $email = Setting::where('slug', 'email')->value('value');
        $mobile = Setting::where('slug', 'mobile')->value('value');
        return view('welcome', compact('address', 'email', 'mobile'));
    }
}
