
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Admin Dashboard | Seralyn</title>

    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Playfair+Display:wght@400;500;600&display=swap" rel="stylesheet">

    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; }

        body {
            font-family: 'DM Sans', sans-serif;
            background: #f5f2ed;
            color: #40382f;
        }

        header {
            background: #776754;
            color: white;
            padding: 20px 6%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 20px;
        }

        .brand {
            font-family: 'Playfair Display', serif;
            font-size: 27px;
            letter-spacing: 3px;
        }

        header nav {
            display: flex;
            gap: 20px;
            flex-wrap: wrap;
        }

        header a {
            color: white;
            text-decoration: none;
            font-size: 13px;
        }

        .container {
            max-width: 1250px;
            margin: auto;
            padding: 40px 25px;
        }

        h1, h2 {
            font-family: 'Playfair Display', serif;
        }

        .welcome p {
            color: #92877b;
            margin-top: 8px;
        }

        .stats {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 18px;
            margin: 30px 0;
        }

        .stat-card, .table-card {
            background: white;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 8px 25px rgba(68,54,39,.04);
        }

        .stat-card p {
            color: #92877b;
            font-size: 13px;
        }

        .stat-card h2 {
            color: #776754;
            font-size: 30px;
            margin-top: 12px;
        }

        .filters {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
            margin: 20px 0;
        }

        input, select {
            padding: 11px;
            border: 1px solid #e5ded5;
            border-radius: 6px;
        }

        button {
            padding: 11px 17px;
            background: #806b55;
            color: white;
            border: none;
            border-radius: 6px;
            cursor: pointer;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 850px;
        }

        th, td {
            padding: 14px 12px;
            text-align: left;
            border-bottom: 1px solid #eee7de;
            font-size: 12px;
        }

        th { color: #9a826a; }

        td { color: #62584e; }

        .table-wrap { overflow-x: auto; }

        .status {
            display: inline-block;
            padding: 6px 10px;
            background: #f3eee7;
            color: #806b55;
            border-radius: 30px;
        }

        .detail-link {
            color: #806b55;
            text-decoration: none;
            font-weight: 600;
        }

        .message {
            padding: 12px;
            background: #e9f5eb;
            color: #28733c;
            margin-bottom: 15px;
            border-radius: 7px;
        }

        @media(max-width: 850px) {
            .stats { grid-template-columns: repeat(2, 1fr); }
        }

        @media(max-width: 550px) {
            .stats { grid-template-columns: 1fr; }
            header { align-items: flex-start; flex-direction: column; }
        }
    </style>
</head>

<body>

<header>
    <div>
        <div class="brand">SERALYN</div>
        <p>ADMINISTRATOR DASHBOARD</p>
    </div>

    <nav>
        <a href="{{ route('admin.dashboard') }}">
            Dashboard
        </a>

        <a href="{{ route('admin.schedule') }}">
            Schedule
        </a>

        <a href="{{ route('admin.dashboard') }}">
            New Reservations ({{ $reservasiBaru }})
        </a>

        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit">Logout</button>
        </form>
    </nav>
</header>

<main class="container">

    @if (session('success'))
        <div class="message">{{ session('success') }}</div>
    @endif

    <section class="welcome">
        <h1>Welcome, {{ Auth::user()->nama }}</h1>
        <p>Manage your Seralyn spa reservation system here.</p>
    </section>

    <section class="stats">

        <div class="stat-card">
            <p>Total Customers</p>
            <h2>{{ $totalCustomer }}</h2>
        </div>

        <div class="stat-card">
            <p>Total Reservations</p>
            <h2>{{ $totalReservasi }}</h2>
        </div>

        <div class="stat-card">
            <p>Waiting Process</p>
            <h2>{{ $reservasiPending }}</h2>
        </div>

        <div class="stat-card">
            <p>Completed Reservations</p>
            <h2>{{ $reservasiSelesai }}</h2>
        </div>

    </section>

    <section class="table-card">

        <h2>Recent Reservations</h2>

        <form method="GET" action="{{ route('admin.dashboard') }}" class="filters">

            <input
                type="text"
                name="q"
                value="{{ request('q') }}"
                placeholder="Search code or customer"
            >

            <select name="periode">
                <option value="7" @selected($periode === 7)>
                    Last 7 Days
                </option>

                <option value="30" @selected($periode === 30)>
                    Last 30 Days
                </option>
            </select>

            <button type="submit">Search</button>

        </form>

        <div class="table-wrap">

            <table>

                <thead>
                    <tr>
                        <th>Code</th>
                        <th>Customer</th>
                        <th>Date</th>
                        <th>Treatment</th>
                        <th>Total</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>

                    @forelse ($reservasiTerbaru as $reservation)

                        <tr>

                            <td>{{ $reservation->kode_reservasi }}</td>

                            <td>{{ $reservation->user?->nama ?? '-' }}</td>

                            <td>
                                {{ $reservation->schedule?->tanggal ?? '-' }}
                            </td>

                            <td>
                                @foreach ($reservation->items as $item)
                                    {{ $item->treatment?->nama_treatment }}
                                    @if (!$loop->last), @endif
                                @endforeach
                            </td>

                            <td>
                                Rp{{ number_format($reservation->total_harga, 0, ',', '.') }}
                            </td>

                            <td>
                                <span class="status">
                                    {{ ucfirst(str_replace('_', ' ', $reservation->status_reservasi)) }}
                                </span>
                            </td>

                            <td>
                                <a
                                    class="detail-link"
                                    href="{{ route('admin.reservation.show', $reservation->reservation_id) }}"
                                >
                                    View Detail
                                </a>
                            </td>

                        </tr>

                    @empty

                        <tr>
                            <td colspan="7">Belum ada reservasi.</td>
                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

        <div style="margin-top:20px">
            {{ $reservasiTerbaru->links() }}
        </div>

    </section>

</main>

</body>
</html>
