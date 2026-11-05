
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Customer Dashboard | Seralyn</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background: #f5f2ed;
            color: #40382f;
            padding: 40px 20px;
        }

        .dashboard {
            max-width: 750px;
            margin: 50px auto;
            background: white;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 10px 35px rgba(0,0,0,0.06);
        }

        h1 {
            margin-bottom: 12px;
        }

        p {
            margin-top: 12px;
            color: #756b60;
        }

        .logout {
            margin-top: 30px;
            padding: 12px 25px;
            background: #776754;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
</head>

<body>

    <div class="dashboard">

        <h1>Welcome to Seralyn</h1>

        <p>Halo, {{ Auth::user()->nama }}!</p>

        <p>Email: {{ Auth::user()->email }}</p>

        <p>Role: {{ Auth::user()->role }}</p>

        <form action="{{ route('logout') }}" method="POST">
            @csrf

            <button type="submit" class="logout">
                Logout
            </button>
        </form>

    </div>

</body>
</html>
