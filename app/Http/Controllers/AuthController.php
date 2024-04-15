<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

class AuthController extends Controller
{
    public function create()
{
    return view('auth.login');
}


    public function store(Request $request)
{
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    $credentials = $request->only('email', 'password');

    if (Auth::attempt($credentials)) {
        // Authentication passed...
        return redirect('/dashboard')->with('success', 'Login successful.');
    }

    return back()->withInput()->withErrors(['email' => 'Invalid credentials. Check the email address and password entered.']);
}

}
