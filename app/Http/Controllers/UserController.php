<?php

namespace App\Http\Controllers;

use Illuminate\Validation\Rule;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // show Register/create form

    public function create()
    {
        return view('users.register');
    }

    // create new user  
    public function store(Request $request)
    {
        $formFields = $request->validate([
            'name' => 'required',
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => 'required|confirmed|min:8',
        ]);

        // Hash password
        $formFields['password'] = bcrypt($formFields['password']);

        // Create user
        $user =  User::create($formFields);

        // Login user
        auth()->login($user);

        return redirect("/")->with('success', 'User created and logged in successfully');
    }

    // Logout user
    public function logout(Request $request)
    {
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect("/")->with('success', 'User logged out successfully');
    }

    // Show login form
    public function login()
    {
        return view('users.login');
    }


    // Show Authenticate form
    public function Authenticate(Request $request)
    {
        $formFields = $request->validate([

            'email' => ['required', 'email'],
            'password' =>  'required',
        ]);

        if (auth()->attempt($formFields)) {
            $request->session()->regenerate();

            return redirect("/")->with('success', 'User logged in successfully');
        }
        return back()->withErrors([
            'email' => 'Invalid credentials ',
        ])->onlyInput('email');
    }
}
 