@extends('layouts.app')

@section('content')
<div class="auth-container">
    <h2>Forgot Password?</h2>
    <p>Masukkan email yang terdaftar untuk menerima link reset password.</p>

    @if(session('success'))
        <p class="success">{{ session('success') }}</p>
    @endif

    @if($errors->any())
        <p class="error">{{ $errors->first() }}</p>
    @endif

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <label>Email Address</label>
        <input
            type="email"
            name="email"
            value="{{ old('email') }}"
            placeholder="Enter your email"
            required
        >

        <button type="submit">Send Reset Link</button>
    </form>

    <a href="{{ route('login') }}">Back to Login</a>
</div>
@endsection
