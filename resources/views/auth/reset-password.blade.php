<!DOCTYPE html>
<html lang="id">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Reset Password | Seralyn</title>

        <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Playfair+Display:wght@400;500;600&display=swap" rel="stylesheet">

        <style>
            * {
                box-sizing: border-box;
                margin: 0;
                padding: 0;
            }

            body {
                min-height: 100vh;
                display: flex;
                align-items: center;
                justify-content: center;
                padding: 20px;
                background: #f5f2ed;
                font-family: 'DM Sans', sans-serif;
                color: #40382f;
            }

            .card {
                width: 100%;
                max-width: 440px;
                padding: 40px;
                background: white;
                border-radius: 15px;
                box-shadow: 0 10px 35px rgba(68,54,39,.08);
            }

            h1 {
                font-family: 'Playfair Display', serif;
                margin-bottom: 12px;
                text-align: center;
            }

            p {
                color: #92877b;
                text-align: center;
                font-size: 13px;
                margin-bottom: 25px;
            }

            label {
                display: block;
                font-size: 13px;
                margin-bottom: 8px;
            }

            input {
                width: 100%;
                padding: 13px;
                border: 1px solid #e5ded5;
                border-radius: 7px;
                margin-bottom: 18px;
            }

            button {
                width: 100%;
                padding: 14px;
                background: #806b55;
                color: white;
                border: none;
                border-radius: 7px;
                cursor: pointer;
            }

            .error {
                color: #b42318;
                font-size: 13px;
                margin-bottom: 15px;
            }
        </style>
    </head>

    <body>

        <div class="card">

            <h1>Create New Password</h1>

            <p>Masukkan password baru untuk akun Seralyn kamu.</p>

            @if ($errors->any())
                <div class="error">
                    {{ $errors->first() }}
                </div>
            @endif

            <form method="POST" action="{{ route('password.update') }}">
                @csrf

                <input
                    type="hidden"
                    name="token"
                    value="{{ $token }}"
                >

                <input
                    type="email"
                    name="email"
                    value="{{ old('email', $email) }}"
                    required
                >

                <input
                    type="password"
                    name="password"
                    placeholder="Password baru"
                    required
                >

                <input
                    type="password"
                    name="password_confirmation"
                    placeholder="Konfirmasi password baru"
                    required
                >

                @if($errors->any())
                    @foreach($errors->all() as $error)
                        <p>{{ $error }}</p>
                    @endforeach
                @endif

                <button type="submit">
                    Ubah Password
                </button>
            </form>

        </div>

    </body>
</html>
