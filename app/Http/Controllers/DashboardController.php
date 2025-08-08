<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $redirectTo = $request->user()->isAdmin() ? '/admin/dashboard' : '/my-account';

        return redirect()->intended($redirectTo);
        // return view('dashboard');
    }
}
