<header>
    <div class="logo">
        <img src="{{ asset('assets/img/LOGO.jpg') }}" alt="Seralyn Spa">
    </div>

    <nav>
        <a href="{{ url('/') }}"
           class="{{ request()->is('/') ? 'active' : '' }}">
            Home
        </a>
        <a href="{{ url('/aboutus') }}"
           class="{{ request()->is('aboutus') ? 'active' : '' }}">
            About Us
        </a>
        <a href="{{ url('/treatments') }}"
           class="{{ request()->is('treatments') ? 'active' : '' }}">
            Treatments
        </a>
        <a href="{{ url('/gallery') }}"
           class="{{ request()->is('gallery') ? 'active' : '' }}">
            Gallery
        </a>
        <a href="#" class="reservation-btn">Reservation</a>
    </nav>

    <div class="account">
        <a href="#">Login</a>
        <a href="#">Sign Up</a>
    </div>
</header>