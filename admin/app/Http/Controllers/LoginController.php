<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        if (auth()->check()) {
            return to_route('admin.dashboard');
        }

        return view('admin.auth.login');
    }
}
