
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Admin Dashboard | Seralyn</title>
</head>

<body style="font-family: Arial; background: #f5f2ed; padding: 40px;">

    <h1>Welcome to Seralyn Admin</h1>

    <h2>Halo, {{ Auth::user()->nama }}!</h2>

    <p>Email: {{ Auth::user()->email }}</p>

    <p>Role: {{ Auth::user()->role }}</p>

    <form action="{{ route('logout') }}" method="POST">
        @csrf

        <button type="submit">Logout</button>
    </form>

</body>
</html>
