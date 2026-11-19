<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account | Seralyn</title>
    <link rel="stylesheet" href="{{ asset('assets/css/header.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/responsive-pages.css') }}">
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
        .account-page {
            max-width: 1150px;
            margin: 0 auto;
            padding: 155px 25px 70px;
        }
        .page-heading {
            margin-bottom: 35px;
        }
        .page-heading span {
            color: #9a826a;
            font-size: 11px;
            letter-spacing: 3px;
        }
        .page-heading h1 {
            font-family: 'Playfair Display', serif;
            font-size: 38px;
            margin: 10px 0;
        }
        .page-heading p {
            color: #92877b;
            font-size: 13px;
        }
        .account-grid {
            display: grid;
            grid-template-columns: 270px 1fr;
            gap: 25px;
        }
        .profile-card,
        .content-card {
            background: white;
            border-radius: 12px;
            padding: 30px;
            box-shadow: 0 8px 30px rgba(68,54,39,.05);
        }
        .profile-card {
            height: fit-content;
            text-align: center;
        }
        .avatar {
            width: 75px;
            height: 75px;
            margin: 0 auto 18px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #eee6da;
            color: #776754;
            border-radius: 50%;
            font-family: 'Playfair Display', serif;
            font-size: 30px;
        }
        .profile-card h2 {
            font-family: 'Playfair Display', serif;
            font-size: 22px;
        }
        .profile-card p {
            color: #92877b;
            font-size: 12px;
            margin-top: 7px;
            word-break: break-word;
        }
        .profile-role {
            display: inline-block;
            margin-top: 15px;
            padding: 7px 15px;
            border-radius: 30px;
            background: #f3eee7;
            color: #806b55;
            font-size: 10px;
            letter-spacing: 1px;
        }

        .logout-btn {
            display: block;
            width: 100%;
            margin-top: 25px;
            padding: 12px;
            background: transparent;
            border: 1px solid #d9cfc2;
            border-radius: 5px;
            color: #ec3d3d;
            cursor: pointer;
        }

        .password-section {
            margin-top: 30px;
            padding: 22px;
            background: #f8f5f0;
            border-radius: 12px;
        }

        .password-section h3 {
            color: #705b47;
            margin-bottom: 8px;
        }

        .password-section p {
            color: #888;
            font-size: 13px;
            margin-bottom: 18px;
        }

        .password-input-wrapper {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .password-input-wrapper input {
            flex: 1;
            min-width: 0;
        }

        .password-input-wrapper button {
            border: none;
            background: #806b55;
            color: white;
            padding: 10px 15px;
            border-radius: 6px;
            cursor: pointer;
        }

        .save-profile-btn {
            background: #806b55;
            color: white;
            border: none;
            padding: 12px 25px;
            border-radius: 7px;
            cursor: pointer;
            margin-top: 20px;
        }

        .logout-btn:hover {
            background: #776754;
            color: white;
        }

        .section-title {
            font-family: 'Playfair Display', serif;
            font-size: 25px;
            margin-bottom: 25px;
        }

        .profile-photo-section {
            margin-bottom: 25px;
        }

        .profile-photo-section label {
            display: block;
            margin-bottom: 12px;
            font-weight: 600;
        }

        .profile-photo-preview {
            margin-bottom: 15px;
        }

        .profile-preview,
        .profile-placeholder {
            width: 110px;
            height: 110px;
            border-radius: 50%;
            object-fit: cover;
        }

        .profile-placeholder {
            display: flex;
            justify-content: center;
            align-items: center;
            background: #e8d9c7;
            color: #806b57;
            font-size: 36px;
            font-weight: 600;
        }

        .profile-photo-section small {
            display: block;
            margin-top: 8px;
            color: #888;
        }

        .form-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 18px;
        }

        .form-group {
            margin-bottom: 18px;
        }

        .form-group.full {
            grid-column: 1 / -1;
        }

        .form-group label {
            display: block;
            font-size: 12px;
            font-weight: 600;
            margin-bottom: 8px;
        }

        .form-group input,
        .form-group textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid #e5ded5;
            border-radius: 5px;
            font-family: inherit;
            font-size: 13px;
            outline: none;
        }

        .form-group input:focus,
        .form-group textarea:focus {
            border-color: #a38b72;
        }

        .form-group textarea {
            min-height: 80px;
            resize: vertical;
        }

        .save-btn {
            padding: 13px 25px;
            background: #776754;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .save-btn:hover {
            background: #5e5040;
        }

        .success-message {
            padding: 13px;
            margin-bottom: 20px;
            background: #eaf4ea;
            color: #28733b;
            border-radius: 5px;
            font-size: 13px;
        }

        .error-message {
            color: #b42318;
            font-size: 12px;
            margin-bottom: 15px;
        }

        .history-section {
            margin-top: 25px;
        }

        .booking-card {
            padding: 20px;
            border: 1px solid #eee7de;
            border-radius: 9px;
            margin-bottom: 15px;
        }

        .booking-top {
            display: flex;
            justify-content: space-between;
            gap: 15px;
            margin-bottom: 15px;
        }

        .booking-code {
            color: #9a826a;
            font-size: 11px;
            letter-spacing: 1px;
        }

        .booking-card h3 {
            font-family: 'Playfair Display', serif;
            font-size: 20px;
            margin: 8px 0;
        }

        .booking-info {
            color: #82786d;
            font-size: 12px;
            line-height: 1.9;
        }

        .booking-status {
            height: fit-content;
            padding: 7px 12px;
            border-radius: 30px;
            background: #f3eee7;
            color: #806b55;
            font-size: 10px;
        }

        .booking-price {
            margin-top: 12px;
            font-weight: 700;
            font-size: 15px;
        }

        .empty-history {
            text-align: center;
            padding: 35px 15px;
            color: #92877b;
            font-size: 13px;
            background: #faf8f5;
            border-radius: 8px;
        }

        @media (max-width: 750px) {
            .account-grid {
                grid-template-columns: 1fr;
            }

            .form-grid {
                grid-template-columns: 1fr;
            }

            .form-group.full {
                grid-column: auto;
            }

            .page-heading h1 {
                font-size: 30px;
            }

            .profile-card,
            .content-card {
                padding: 22px;
            }
        }
    </style>
</head>

<body>

    <x-header />

    <main class="account-page">

        <div class="page-heading">
            <span>MY SERALYN ACCOUNT</span>
            <h1>Welcome, {{ $user->nama }}</h1>
            <p>Manage your personal information and view your booking history.</p>
        </div>

        @if (session('success'))
            <div class="success-message">
                {{ session('success') }}
            </div>
        @endif

        <div class="account-grid">

            <aside class="profile-card">


                <form action="{{ route('logout') }}" method="POST">
                    @csrf

                    <button type="submit" class="logout-btn">
                        Logout
                    </button>
                </form>

            </aside>

            <div>

                <section class="content-card">

                    <h2 class="section-title">Edit Profile</h2>

                    @if ($errors->any())
                        <div class="error-message">
                            @foreach ($errors->all() as $error)
                                <p>{{ $error }}</p>
                            @endforeach
                        </div>
                    @endif

                    <form
                        action="{{ route('customer.profile.update') }}"
                        method="POST"
                        enctype="multipart/form-data"
                    >
                        @csrf
                        @method('PUT')

                        <div class="form-grid">

                            <div class="profile-photo-section">

                                <label for="foto_profil">Profile Photo</label>

                                <div class="profile-photo-preview">

                                    @if (Auth::user()->foto_profil)

                                        <img
                                            src="{{ asset('storage/' . Auth::user()->foto_profil) }}"
                                            alt="Profile Photo"
                                            class="profile-preview"
                                        >

                                    @else

                                        <div class="profile-placeholder">
                                            {{ strtoupper(substr(Auth::user()->nama, 0, 1)) }}
                                        </div>

                                    @endif

                                </div>

                                <input
                                    type="file"
                                    id="foto_profil"
                                    name="foto_profil"
                                    accept="image/jpeg,image/png,image/webp"
                                >

                                @error('foto_profil')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror

                            </div>

                            <div class="form-group">
                                <label for="nama">Full Name</label>

                                <input
                                    type="text"
                                    id="nama"
                                    name="nama"
                                    value="{{ old('nama', Auth::user()->nama) }}"
                                    required
                                >

                                @error('nama')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="email">Email Address</label>

                                <input
                                    type="email"
                                    id="email"
                                    name="email"
                                    value="{{ old('email', Auth::user()->email) }}"
                                    required
                                >

                                @error('email')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="no_telepon">Phone Number</label>

                                <input
                                    type="text"
                                    id="no_telepon"
                                    name="no_telepon"
                                    value="{{ old('no_telepon', Auth::user()->no_telepon) }}"
                                >

                                @error('no_telepon')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="alamat">Address</label>

                                <textarea
                                    id="alamat"
                                    name="alamat"
                                    rows="3"
                                >{{ old('alamat', Auth::user()->alamat) }}</textarea>

                                @error('alamat')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="password-section">

                                <h3>Change Password</h3>

                                <p>
                                    Leave blank if you don't want to change your password.
                                </p>

                                <div class="form-group">

                                    <label for="password">New Password</label>

                                    <div class="password-input-wrapper">

                                        <input
                                            type="password"
                                            id="password"
                                            name="password"
                                            placeholder="Enter new password (optional)"
                                            autocomplete="new-password"
                                        >

                                        <button
                                            type="button"
                                            onclick="togglePassword('password', this)"
                                        >
                                            Show
                                        </button>

                                    </div>

                                    @error('password')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror

                                </div>

                                <div class="form-group">

                                    <label for="password_confirmation">
                                        Confirm New Password
                                    </label>

                                    <div class="password-input-wrapper">

                                        <input
                                            type="password"
                                            id="password_confirmation"
                                            name="password_confirmation"
                                            placeholder="Repeat new password"
                                            autocomplete="new-password"
                                        >

                                        <button
                                            type="button"
                                            onclick="togglePassword('password_confirmation', this)"
                                        >
                                            Show
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="profile-save-container">
                            <button type="submit" class="save-profile-btn">
                                Save Changes
                            </button>
                        </div>
                    </form>
                </section>

                <section class="content-card history-section">

                    <h2 class="section-title">Booking History</h2>

                    @forelse ($reservations as $reservation)

                        <article class="booking-card">

                            <div class="booking-top">

                                <div>
                                    <span class="booking-code">
                                        {{ $reservation->kode_reservasi }}
                                    </span>

                                    <h3>
                                        @forelse ($reservation->items as $item)
                                            {{ $item->treatment?->nama_treatment }}@if (!$loop->last), @endif
                                        @empty
                                            Treatment
                                        @endforelse
                                    </h3>
                                </div>

                                <span class="booking-status">
                                    {{ ucfirst(str_replace('_', ' ', $reservation->status_reservasi)) }}
                                </span>

                            </div>

                            <div class="booking-info">

                                <p>
                                    Date:
                                    @if ($reservation->schedule)
                                        {{ \Carbon\Carbon::parse($reservation->schedule->tanggal)->format('d M Y') }}
                                    @else
                                        -
                                    @endif
                                </p>

                                <p>
                                    Time:
                                    {{ $reservation->schedule?->jam_mulai ?? '-' }}
                                    -
                                    {{ $reservation->schedule?->jam_selesai ?? '-' }}
                                </p>

                                <p>
                                    Therapist:
                                    {{ $reservation->schedule?->therapist?->nama_terapis ?? '-' }}
                                </p>

                                <p>
                                    Room:
                                    {{ $reservation->schedule?->room?->nomor_kamar ?? '-' }}
                                </p>

                            </div>

                            <div class="booking-price">
                                Rp{{ number_format($reservation->total_harga, 0, ',', '.') }}
                            </div>

                        </article>

                    @empty

                        <div class="empty-history">
                            <p>You don't have any bookings yet.</p>
                            <p>Start your relaxation journey with Seralyn.</p>
                        </div>

                    @endforelse
                </section>
            </div>
        </div>
    </main>

    <script>
        function togglePassword(inputId, button) {

            const input = document.getElementById(inputId);

            if (input.type === 'password') {
                input.type = 'text';
                button.textContent = 'Hide';
            } else {
                input.type = 'password';
                button.textContent = 'Show';
            }

        }
    </script>

</body>
</html>
