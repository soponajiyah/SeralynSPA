
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password | Seralyn</title>

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

        .auth-card {
            width: 100%;
            max-width: 440px;
            background: white;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 10px 35px rgba(68,54,39,.08);
        }

        .brand {
            color: #806b55;
            font-size: 13px;
            letter-spacing: 4px;
            text-align: center;
        }

        h1 {
            font-family: 'Playfair Display', serif;
            text-align: center;
            margin: 18px 0 10px;
        }

        .description {
            color: #92877b;
            text-align: center;
            font-size: 13px;
            line-height: 1.7;
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

        a {
            display: block;
            text-align: center;
            margin-top: 20px;
            color: #806b55;
            text-decoration: none;
            font-size: 13px;
        }

        .message {
            padding: 12px;
            margin-bottom: 18px;
            border-radius: 7px;
            font-size: 13px;
        }

        .success {
            background: #e9f5eb;
            color: #28733c;
        }

        .error {
            background: #fff0ed;
            color: #b42318;
        }
    </style>
</head>

<body>

<div class="auth-card">

    <div class="brand">SERALYN</div>

    <h1>Forgot Password?</h1>

    <p class="description">
        Masukkan email yang terdaftar untuk menerima tautan
        pengaturan ulang password.
    </p>

    @if (session('success'))
        <div class="message success">
            {{ session('success') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="message error">
            {{ $errors->first() }}
        </div>
    @endif

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <label for="email">Email Address</label>

        <input
            type="email"
            id="email"
            name="email"
            value="{{ old('email') }}"
            placeholder="Enter your registered email"
            required
        >

        <button type="submit">
            SEND RESET LINK
        </button>
    </form>

    <a href="{{ route('login') }}">Back to Login</a>

</div>

</body>
</html>
