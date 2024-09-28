<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function registration()
    {
        return view('auth.registration');
    }

    public function registration_store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);

        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->role = 'customer';
        $user->save();

        return redirect()->route('user.login')->with('message', 'Registration successfully!');

    }

    public function user_login()
    {
        return view('auth.customer_login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            if (Auth::user()->isCustomer()) {
                return redirect()->route('rental.index')->with('success', 'Login successful!');
            }else{

                return redirect()->route('user.login')->with('error', 'Invalid credentials');
            }

        } else {
            return redirect()->route('user.login')->with('error', 'Login failed!');
        }
    }
    public function logout(Request $request)
    {
        Auth::logout();

        return redirect()->route('user.login')->with('success', 'Successfully logged out!');
    }

}
