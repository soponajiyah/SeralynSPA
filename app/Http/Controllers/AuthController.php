<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth');
    }

    public function showRegister()
    {
        return view('auth');
    }

    public function register(Request $request)
{
    $validated = $request->validate([
        'nama' => ['required', 'string', 'max:100'],

        'email' => [
            'required',
            'email',
            'max:100',
            'unique:users,email',
        ],

        'no_telepon' => [
            'required',
            'string',
            'max:20',
        ],

        'password' => [
            'required',
            'confirmed',
            Password::min(8),
        ],
    ]);

    $user = User::create([
        'nama' => $validated['nama'],
        'email' => $validated['email'],
        'no_telepon' => $validated['no_telepon'],
        'password' => Hash::make($validated['password']),
        'role' => 'customer',
    ]);

    Auth::login($user);

    $request->session()->regenerate();

    return redirect()->route('customer.dashboard')
        ->with('success', 'Registrasi berhasil!');
}


    public function login(Request $request)
{
    $validator = Validator::make($request->all(), [
        'email' => ['required', 'email'],
        'password' => ['required', 'string'],
    ]);

    if ($validator->fails()) {
        return back()
            ->withErrors($validator)
            ->withInput($request->only('email'))
            ->with('auth_form', 'login');
    }

    $credentials = $validator->validated();

    $remember = $request->boolean('remember');

    if (!Auth::attempt($credentials, $remember)) {
        return back()
            ->withErrors([
                'email' => 'Email atau password salah.',
            ])
            ->withInput($request->only('email'))
            ->with('auth_form', 'login');
    }

    $request->session()->regenerate();

    $user = Auth::user();

    if ($user->role === 'admin') {
        return redirect()->route('admin.dashboard');
    }

    if ($user->role === 'customer') {
        return redirect()->route('customer.dashboard');
    }

    Auth::logout();

    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect()->route('login')
        ->withErrors([
            'email' => 'Role akun tidak dikenali.',
        ])
        ->with('auth_form', 'login');
}

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('login')
            ->with('success', 'Berhasil logout.');
    }
}