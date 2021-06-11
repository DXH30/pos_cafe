<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{

    public function __construct(Request $request) {
        $this->middleware('auth');
    }

    public function page(Request $request) {
        $obj = array(
            'title' => 'Dashboard'
        );
        return view('dashboard', $obj);
    }

    public function profile(Request $request) {
        $obj = array(
            'title' => 'Profile'
        );
        return view('profile', $obj);
    }
}
