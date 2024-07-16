<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $user = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8|max:255',
        ]);

        if (!Auth::attempt($user)) {
            return redirect()->back()->with(['message' => 'Email Or Password Incorrect!']);
        }

        return redirect()->route('dashboard')->with(['message' => 'Login Success!']);
    }

    public function logout(){
        Auth::logout();
        return redirect('/');
    }
}
