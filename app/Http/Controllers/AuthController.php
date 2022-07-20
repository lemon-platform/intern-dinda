<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Validation\Rules\Password;

class AuthController extends Controller
{
    public function viewLogin()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            RateLimiter::clear('login:'.$request->ip());

            return redirect()->intended('/member');
        }

        $executed = RateLimiter::attempt(
            'login:'.$request->ip(),
            $perMinute = 5,
            function() {
                // Send message...
            }
        );

        if (! $executed) {
            return 'Too many login attempts!';
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }

    public function viewRegister()
    {
        return view('register');
    }

    public function register(Request $request)
    {
        $credentials = $request->validate([
            'nama' => ['required'],
            'email' => ['required', 'email'],
            'password' => [
                'required',
                'confirmed',
                Password::min(8),
            ],
        ]);

        $user = User::create([
            'name' => $credentials['nama'],
            'email' => $credentials['email'],
            'password' => bcrypt($credentials['password']),
        ]);

        auth()->login($user);

        return redirect()->to('/member');
    }

    public function viewForgetPassword()
    {
        # code...
    }

    public function forgetPassword()
    {
        # code...
    }

    public function viewResetPassword()
    {
        # code...
    }

    public function resetPassword()
    {
        # code...
    }
}
