<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password as PasswordFacade;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules\Password as PasswordRule;

class AuthController extends Controller
{
    // ==============================
    // MENAMPILKAN HALAMAN LOGIN
    // ==============================

    public function showLogin()
    {
        return view('auth', ['mode' => 'login']);
    }

    // ==============================
    // MENAMPILKAN HALAMAN REGISTER
    // ==============================

    public function showRegister()
    {
        return view('auth', ['mode' => 'register']);
    }

    // ==============================
    // PROSES REGISTER
    // ==============================

    public function register(Request $request)
    {
        $validated = $request->validate([
            'nama' => ['required', 'string', 'max:200'],
            'email' => [
                'required',
                'email',
                'max:100',
                'unique:users,email'
            ],
            'no_telepon' => ['required', 'string', 'max:20'],
            'password' => [
                'required',
                'confirmed',
                PasswordRule::min(8)
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

        return redirect()
            ->route('customer.dashboard')
            ->with('success', 'Registrasi berhasil!');
    }

    // ==============================
    // PROSES LOGIN
    // ==============================

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'string'],
        ]);

        if (!Auth::attempt(
            $credentials,
            $request->boolean('remember')
        )) {
            return back()
                ->withErrors([
                    'email' => 'Email atau password salah.',
                ])
                ->withInput($request->only('email'));
        }

        $request->session()->regenerate();

        if (Auth::user()->role === 'admin') {
            return redirect()->route('admin.dashboard');
        }

        if (Auth::user()->role === 'customer') {
            return redirect()->route('customer.dashboard');
        }

        Auth::logout();

        return redirect()->route('login')
            ->withErrors([
                'email' => 'Role akun tidak dikenali.',
            ]);
    }

    // ==============================
    // MENAMPILKAN FORM FORGOT PASSWORD
    // ==============================

    public function showForgotPassword()
    {
        return view('auth.forgot-password');
    }

    // ==============================
    // MENGIRIM LINK RESET PASSWORD
    // ==============================

    public function sendResetLink(Request $request)
    {
        $validated = $request->validate([
            'email' => ['required', 'email'],
        ]);

        $status = PasswordFacade::sendResetLink([
            'email' => $validated['email'],
        ]);

        if ($status === PasswordFacade::RESET_LINK_SENT) {
            return back()->with(
                'success',
                'Link reset password berhasil dikirim ke email.'
            );
        }

        return back()->withErrors([
            'email' => __($status),
        ]);
    }

    // ==============================
    // MENAMPILKAN FORM RESET PASSWORD
    // ==============================

    public function showResetPassword(
        Request $request,
        string $token
    ) {
        return view('auth.reset-password', [
            'token' => $token,
            'email' => $request->query('email'),
        ]);
    }

    // ==============================
    // MENYIMPAN PASSWORD BARU
    // ==============================

    public function resetPassword(Request $request)
    {
        $validated = $request->validate([
            'token' => ['required'],
            'email' => ['required', 'email'],
            'password' => [
                'required',
                'confirmed',
                PasswordRule::min(8),
            ],
        ]);

        $status = PasswordFacade::reset(
            [
                'email' => $validated['email'],
                'password' => $validated['password'],
                'password_confirmation' =>
                    $request->password_confirmation,
                'token' => $validated['token'],
            ],
            function ($user, $password) {
                $user->forceFill([
                    'password' => Hash::make($password),
                    'remember_token' => Str::random(60),
                ])->save();
            }
        );

        if ($status === PasswordFacade::PASSWORD_RESET) {
            return redirect()
                ->route('login')
                ->with(
                    'success',
                    'Password berhasil diubah. Silakan login.'
                );
        }

        return back()->withErrors([
            'email' => __($status),
        ]);
    }

    // ==============================
    // LOGOUT
    // ==============================

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()
            ->route('login')
            ->with('success', 'Berhasil logout.');
    }
}
