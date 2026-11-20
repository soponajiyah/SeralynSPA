
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Reservation Detail | Seralyn</title>

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
            align-items: center;
        }

        header a {
            color: white;
            text-decoration: none;
        }

        main {
            max-width: 1000px;
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
            margin-bottom: 20px;
            box-shadow: 0 8px 25px rgba(68,54,39,.04);
        }

        .grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
        }

        .item {
            margin-top: 16px;
        }

        .item small {
            display: block;
            color: #92877b;
            margin-bottom: 5px;
        }

        .item strong {
            color: #62584e;
        }

        .message {
            padding: 12px;
            background: #e9f5eb;
            color: #28733c;
            border-radius: 7px;
            margin-bottom: 15px;
        }

        .error {
            padding: 12px;
            background: #fff0ed;
            color: #b42318;
            border-radius: 7px;
            margin-bottom: 15px;
        }

        .actions {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin-top: 20px;
        }

        button {
            padding: 12px 18px;
            border: none;
            border-radius: 7px;
            background: #806b55;
            color: white;
            cursor: pointer;
        }

        .danger {
            background: #a84c43;
        }

        .proof {
            max-width: 350px;
            width: 100%;
            margin-top: 15px;
            border-radius: 8px;
        }

        @media(max-width: 600px) {
            .grid { grid-template-columns: 1fr; }
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

    @if (session('success'))
        <div class="message">{{ session('success') }}</div>
    @endif

    @if ($errors->any())
        <div class="error">{{ $errors->first() }}</div>
    @endif

    <div class="card">

        <h1>Reservation Detail</h1>

        <div class="grid">

            <div class="item">
                <small>Reservation Code</small>
                <strong>{{ $reservation->kode_reservasi }}</strong>
            </div>

            <div class="item">
                <small>Reservation Status</small>
                <strong>
                    {{ ucfirst(str_replace('_', ' ', $reservation->status_reservasi)) }}
                </strong>
            </div>

            <div class="item">
                <small>Customer Name</small>
                <strong>{{ $reservation->user?->nama }}</strong>
            </div>

            <div class="item">
                <small>Phone Number</small>
                <strong>{{ $reservation->user?->no_telepon ?? '-' }}</strong>
            </div>

            <div class="item">
                <small>Email</small>
                <strong>{{ $reservation->user?->email }}</strong>
            </div>

            <div class="item">
                <small>Address</small>
                <strong>{{ $reservation->user?->alamat ?? '-' }}</strong>
            </div>

            <div class="item">
                <small>Date</small>
                <strong>{{ $reservation->schedule?->tanggal ?? '-' }}</strong>
            </div>

            <div class="item">
                <small>Time</small>
                <strong>
                    {{ $reservation->schedule?->jam_mulai ?? '-' }}
                    -
                    {{ $reservation->schedule?->jam_selesai ?? '-' }}
                </strong>
            </div>

            <div class="item">
                <small>Therapist</small>
                <strong>
                    {{ $reservation->schedule?->therapist?->nama_terapis ?? '-' }}
                </strong>
            </div>

            <div class="item">
                <small>Room</small>
                <strong>
                    {{ $reservation->schedule?->room?->nomor_kamar ?? '-' }}
                </strong>
            </div>

        </div>

    </div>

    <div class="card">

        <h2>Treatment Details</h2>

        @foreach ($reservation->items as $item)

            <div class="item">
                <strong>
                    {{ $item->treatment?->nama_treatment }}
                </strong>

                <p>
                    {{ $item->durasi }} minutes
                    —
                    Rp{{ number_format($item->harga, 0, ',', '.') }}
                </p>
            </div>

        @endforeach

        <div class="item">
            <small>Additional Time</small>
            <strong>{{ $reservation->additional_minutes }} minutes</strong>
        </div>

        <div class="item">
            <small>Room Fee</small>
            <strong>
                Rp{{ number_format($reservation->room_fee, 0, ',', '.') }}
            </strong>
        </div>

        <div class="item">
            <small>Total Reservation</small>
            <h2>
                Rp{{ number_format($reservation->total_harga, 0, ',', '.') }}
            </h2>
        </div>

        <div class="item">
            <small>Customer Notes</small>
            <p>{{ $reservation->catatan ?? '-' }}</p>
        </div>

    </div>

    <div class="card">

        <h2>Payment Information</h2>

        <div class="item">
            <small>Payment Method</small>
            <strong>{{ $reservation->payment?->payment_method ?? '-' }}</strong>
        </div>

        <div class="item">
            <small>Payment Status</small>
            <strong>
                {{ $reservation->payment?->payment_status ?? '-' }}
            </strong>
        </div>

        <div class="item">
            <small>DP Amount (30%)</small>
            <strong>
                Rp{{ number_format($reservation->payment?->dp_amount ?? 0, 0, ',', '.') }}
            </strong>
        </div>

        @if ($reservation->payment?->proof_image)

            <p style="margin-top:20px">Payment Proof</p>

            <a
                href="{{ asset('storage/' . $reservation->payment->proof_image) }}"
                target="_blank"
            >
                <img
                    src="{{ asset('storage/' . $reservation->payment->proof_image) }}"
                    class="proof"
                    alt="Payment Proof"
                >
            </a>

        @else

            <p style="margin-top:20px">
                Customer belum mengunggah bukti pembayaran.
            </p>

        @endif

    </div>

    <div class="card">

        <h2>Reservation Actions</h2>

        <div class="actions">

            @if ($reservation->status_reservasi === 'pending_verification')

                <form
                    action="{{ route('admin.reservation.verify', $reservation->reservation_id) }}"
                    method="POST"
                >
                    @csrf
                    @method('PATCH')

                    <button type="submit">
                        Verify Payment
                    </button>
                </form>

            @endif

            @if ($reservation->status_reservasi === 'confirmed')

                <form
                    action="{{ route('admin.reservation.checkin', $reservation->reservation_id) }}"
                    method="POST"
                >
                    @csrf
                    @method('PATCH')

                    <button type="submit">
                        Check-in
                    </button>
                </form>

            @endif

            @if ($reservation->status_reservasi === 'checked_in')

                <form
                    action="{{ route('admin.reservation.checkout', $reservation->reservation_id) }}"
                    method="POST"
                >
                    @csrf
                    @method('PATCH')

                    <button type="submit">
                        Checkout / Complete
                    </button>
                </form>

            @endif

            @if (!in_array($reservation->status_reservasi, [
                'checked_in',
                'completed',
                'cancelled',
                'rejected',
            ]))

                <form
                    action="{{ route('admin.reservation.reject', $reservation->reservation_id) }}"
                    method="POST"
                    onsubmit="return confirm('Yakin ingin menolak reservasi ini?')"
                >
                    @csrf
                    @method('PATCH')

                    <button type="submit" class="danger">
                        Reject Reservation
                    </button>
                </form>

            @endif

        </div>

    </div>

</main>

</body>
</html>
