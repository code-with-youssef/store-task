<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class LoginController extends Controller
{
    // Showing the login page
    public function index()
    {
        return view('login');
    }

    // Login base on the chosen role.
    public function login(Request $request)
    {
        $user = User::where('role', $request->role)->first();
        if ($user) {
            Auth::login($user);
        }
        return redirect(route('home'));
    }

    // Logout 
    public function logout()
    {
        Auth::logout();
        return redirect(route('home'));
    }
}
