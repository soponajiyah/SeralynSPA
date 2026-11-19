<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Admin Dashboard | Seralyn</title>

    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Playfair+Display:wght@400;500;600&display=swap" rel="stylesheet">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'DM Sans', sans-serif;
            background: #f5f2ed;
            color: #40382f;
        }

        .admin-header {
            background: #776754;
            color: white;
            padding: 20px 6%;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
        }

        .brand {
            font-family: 'Playfair Display', serif;
            font-size: 27px;
            letter-spacing: 3px;
        }

        .admin-header p {
            font-size: 11px;
            color: #e8dfd3;
            margin-top: 4px;
        }

        .logout-btn {
            padding: 10px 20px;
            color: white;
            background: transparent;
            border: 1px solid rgba(255,255,255,.5);
            border-radius: 30px;
            cursor: pointer;
        }

        .logout-btn:hover {
            background: white;
            color: #776754;
        }

        .admin-container {
            max-width: 1250px;
            margin: auto;
            padding: 45px 25px;
        }

        .welcome h1 {
            font-family: 'Playfair Display', serif;
            font-size: 35px;
        }

        .welcome p {
            color: #92877b;
            font-size: 13px;
            margin-top: 8px;
        }

        .stats {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 18px;
            margin: 35px 0;
        }

        .stat-card {
            background: white;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 8px 25px rgba(68,54,39,.04);
        }

        .stat-card p {
            color: #92877b;
            font-size: 12px;
        }

        .stat-card h2 {
            font-family: 'Playfair Display', serif;
            font-size: 32px;
            margin-top: 12px;
            color: #776754;
        }

        .table-card {
            background: white;
            padding: 28px;
            border-radius: 10px;
            overflow-x: auto;
        }

        .table-card h2 {
            font-family: 'Playfair Display', serif;
            font-size: 25px;
            margin-bottom: 25px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 700px;
        }

        th, td {
            padding: 15px 12px;
            text-align: left;
            border-bottom: 1px solid #eee7de;
            font-size: 12px;
        }

        th {
            color: #9a826a;
            font-weight: 600;
        }

        td {
            color: #62584e;
        }

        .status {
            display: inline-block;
            padding: 6px 10px;
            background: #f3eee7;
            color: #806b55;
            border-radius: 30px;
            font-size: 10px;
        }

        .empty {
            text-align: center;
            color: #92877b;
            padding: 30px;
        }

        @media(max-width: 900px) {
            .stats {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media(max-width: 500px) {
            .stats {
                grid-template-columns: 1fr;
            }

            .admin-header {
                padding: 18px;
            }

            .welcome h1 {
                font-size: 28px;
            }
        }
    </style>
</head>

<body>

    <header class="admin-header">

        <div>
            <div class="brand">SERALYN</div>
            <p>ADMINISTRATOR DASHBOARD</p>
        </div>

        <form action="{{ route('logout') }}" method="POST">
            @csrf

            <button type="submit" class="logout-btn">
                Logout
            </button>
        </form>

    </header>

    <main class="admin-container">

        <section class="welcome">

            <h1>Welcome, {{ Auth::user()->nama }}</h1>

            <p>
                Manage your Seralyn spa reservation system here.
            </p>

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

            <table>

                <thead>
                    <tr>
                        <th>Reservation Code</th>
                        <th>Customer</th>
                        <th>Date</th>
                        <th>Treatment</th>
                        <th>Total Price</th>
                        <th>Status</th>
                    </tr>
                </thead>

                <tbody>

                    @forelse ($reservasiTerbaru as $reservation)

                        <tr>

                            <td>
                                {{ $reservation->kode_reservasi }}
                            </td>

                            <td>
                                {{ $reservation->user?->nama ?? '-' }}
                            </td>

                            <td>
                                @if ($reservation->schedule)
                                    {{ \Carbon\Carbon::parse($reservation->schedule->tanggal)->format('d M Y') }}
                                @else
                                    -
                                @endif
                            </td>

                            <td>
                                @forelse ($reservation->items as $item)
                                    {{ $item->treatment?->nama_treatment }}@if (!$loop->last), @endif
                                @empty
                                    -
                                @endforelse
                            </td>

                            <td>
                                Rp{{ number_format($reservation->total_harga, 0, ',', '.') }}
                            </td>

                            <td>
                                <span class="status">
                                    {{ ucfirst(str_replace('_', ' ', $reservation->status_reservasi)) }}
                                </span>
                            </td>

                        </tr>

                    @empty

                        <tr>
                            <td colspan="6" class="empty">
                                Belum ada reservasi.
                            </td>
                        </tr>

                    @endforelse

                </tbody>

            </table>

        </section>

    </main>

</body>
</html>
