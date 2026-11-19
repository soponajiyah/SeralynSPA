@extends('layouts.app')

@section('content')
<div class="auth-container">
    <h2>Create New Password</h2>
    <p>Masukkan password baru untuk akunmu.</p>

    @if($errors->any())
        <p class="error">{{ $errors->first() }}</p>
    @endif

    <form method="POST" action="{{ route('password.update') }}">
        @csrf

        <input type="hidden" name="token" value="{{ $token }}">

        <label>Email</label>
        <input
            type="email"
            name="email"
            value="{{ old('email', $email) }}"
            required
        >

        <label>New Password</label>
        <input
            type="password"
            name="password"
            required
            minlength="8"
        >

        <label>Confirm Password</label>
        <input
            type="password"
            name="password_confirmation"
            required
            minlength="8"
        >

        <button type="submit">Reset Password</button>
    </form>
</div>
@endsection
