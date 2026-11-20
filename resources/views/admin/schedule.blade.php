
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Schedule | Seralyn Admin</title>

    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Playfair+Display:wght@400;500;600&display=swap" rel="stylesheet">

    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; }

        body {
            background: #f5f2ed;
            font-family: 'DM Sans', sans-serif;
            color: #40382f;
        }

        header {
            background: #776754;
            color: white;
            padding: 22px 6%;
            display: flex;
            justify-content: space-between;
        }

        header a {
            color: white;
            text-decoration: none;
        }

        main {
            max-width: 1200px;
            margin: auto;
            padding: 40px 20px;
        }

        h1, h2 {
            font-family: 'Playfair Display', serif;
        }

        .card {
            background: white;
            padding: 25px;
            border-radius: 12px;
            margin-top: 25px;
        }

        form {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
            margin-top: 20px;
        }

        input, button {
            padding: 12px;
            border-radius: 6px;
        }

        input {
            border: 1px solid #e5ded5;
        }

        button {
            border: none;
            background: #806b55;
            color: white;
            cursor: pointer;
        }

        .table-wrap {
            overflow-x: auto;
            margin-top: 20px;
        }

        table {
            width: 100%;
            min-width: 750px;
            border-collapse: collapse;
        }

        th, td {
            padding: 14px;
            border-bottom: 1px solid #eee7de;
            text-align: left;
            font-size: 13px;
        }

        th { color: #9a826a; }

        .status {
            display: inline-block;
            background: #f3eee7;
            color: #806b55;
            padding: 6px 10px;
            border-radius: 20px;
        }
    </style>
</head>

<body>

<header>
    <h2>SERALYN ADMIN</h2>

    <a href="{{ route('admin.dashboard') }}">
        Back to Dashboard
    </a>
</header>

<main>

    <h1>Schedule Management</h1>

    <p style="color:#92877b;margin-top:8px">
        Monitor available therapists, rooms, and reservation times.
    </p>

    <div class="card">

        <h2>Filter Schedule</h2>

        <form method="GET" action="{{ route('admin.schedule') }}">

            <input
                type="date"
                name="tanggal"
                value="{{ request('tanggal') }}"
            >

            <button type="submit">Apply Filter</button>

            <a href="{{ route('admin.schedule') }}">
                Reset
            </a>

        </form>

    </div>

    <div class="card">

        <h2>Schedule List</h2>

        <div class="table-wrap">

            <table>

                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Therapist</th>
                        <th>Room</th>
                        <th>Schedule Status</th>
                        <th>Reservation</th>
                    </tr>
                </thead>

                <tbody>

                    @forelse ($schedules as $schedule)

                        <tr>

                            <td>{{ $schedule->tanggal }}</td>

                            <td>
                                {{ $schedule->jam_mulai }}
                                -
                                {{ $schedule->jam_selesai }}
                            </td>

                            <td>
                                {{ $schedule->therapist?->nama_terapis ?? '-' }}
                            </td>

                            <td>
                                {{ $schedule->room?->nomor_kamar ?? '-' }}
                            </td>

                            <td>
                                <span class="status">
                                    {{ ucfirst($schedule->status) }}
                                </span>
                            </td>

                            <td>
                                @forelse ($schedule->reservations as $reservation)
                                    <a href="{{ route('admin.reservation.show', $reservation->reservation_id) }}">
                                        {{ $reservation->kode_reservasi }}
                                    </a>
                                @empty
                                    -
                                @endforelse
                            </td>

                        </tr>

                    @empty

                        <tr>
                            <td colspan="6">
                                Belum ada jadwal untuk tanggal tersebut.
                            </td>
                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

        <div style="margin-top:20px">
            {{ $schedules->links() }}
        </div>

    </div>

</main>

</body>
</html>
