
<header class="seralyn-header">
    <div class="logo">
        <a href="{{ url('/') }}">
            <img src="{{ asset('assets/img/LOGO.png') }}" alt="Seralyn Spa">
        </a>
    </div>

    <nav class="desktop-nav" aria-label="Main navigation">
        <a href="{{ url('/') }}" class="{{ request()->is('/') ? 'active' : '' }}">Home</a>
        <a href="{{ url('/aboutus') }}" class="{{ request()->is('aboutus') ? 'active' : '' }}">About Us</a>
        <a href="{{ url('/treatments') }}" class="{{ request()->is('treatments') ? 'active' : '' }}">Treatments</a>
        <a href="{{ url('/gallery') }}" class="{{ request()->is('gallery') ? 'active' : '' }}">Gallery</a>
        <a href="#" class="reservation-btn">Reservation</a>
    </nav>

    <div class="account">
        <a href="#">Login</a>
        <a href="#">Sign Up</a>
    </div>

    <button
        type="button"
        class="mobile-menu-btn"
        id="mobileMenuBtn"
        aria-label="Open navigation menu"
        aria-expanded="false"
        aria-controls="mobileDrawer"
    >
        <i class="fa-solid fa-bars"></i>
    </button>
</header>

<div class="mobile-overlay" id="mobileOverlay"></div>

<aside class="mobile-drawer" id="mobileDrawer" aria-hidden="true">
    <div class="drawer-header">
        <span class="drawer-title">SERALYN</span>

        <button
            type="button"
            class="drawer-close"
            id="drawerClose"
            aria-label="Close navigation menu"
        >
            <i class="fa-solid fa-xmark"></i>
        </button>
    </div>

    <p class="drawer-subtitle">Relax. Rejuvenate. Renew.</p>

    <div class="drawer-links">
        <a href="{{ url('/') }}" class="{{ request()->is('/') ? 'active' : '' }}">
            <i class="fa-solid fa-house"></i>
            Home
        </a>

        <a href="{{ url('/aboutus') }}" class="{{ request()->is('aboutus') ? 'active' : '' }}">
            <i class="fa-solid fa-spa"></i>
            About Us
        </a>

        <a href="{{ url('/treatments') }}" class="{{ request()->is('treatments') ? 'active' : '' }}">
            <i class="fa-solid fa-leaf"></i>
            Treatments
        </a>

        <a href="{{ url('/gallery') }}" class="{{ request()->is('gallery') ? 'active' : '' }}">
            <i class="fa-regular fa-images"></i>
            Gallery
        </a>

        <a href="#" class="drawer-reservation">
            <i class="fa-regular fa-calendar-check"></i>
            Reservation
        </a>
    </div>

    <div class="drawer-account">
        <a href="#">Login</a>
        <a href="#">Sign Up</a>
    </div>

    <div class="drawer-footer">
        <span>YOUR MOMENT OF SERENITY</span>
    </div>
</aside>

<script src="{{ asset('assets/js/mobile-nav.js') }}" defer></script>

