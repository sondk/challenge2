<?php

namespace App\Http\Controllers;

use Auth;
use Hash;
use App\Models\User;
use Illuminate\Http\Request;

class LoginController extends Controller
{




    public function login()
    {
        return view('auth/login');
    }

    public function teacher()
    {
        $users = User::orderBy('name', 'asc')->get();

        return view('teacher', [
            'teacher' => $users
        ]);
    }

    public function student()
    {
        return view('student');
    }

    public function authenticate(Request $request)
    {
        request()->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials)) {
            if (Auth::user()->is_teacher == 1) {
                return redirect()->intended('teacher');
            } else {
                return redirect()->intended('student');
            }
        }
        return view('auth/login')->withErrors(Hash::make('1234567'));
    }

}
