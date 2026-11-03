<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@400;500;600;700&family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
        <link rel="stylesheet" href="{{ asset('assets/css/header.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/index.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/responsive-pages.css') }}">
        <title>SERALYN SPA</title>
    </head>


    <body class="home-page">
        <div class="page-transition"></div>
        <div class="particles">
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
        </div>
        @include('components.header')

        <section class="hero">
            <div class="overlay"></div>
            <div class="hero-content">
                <div class="hero-left">
                    <span>Luxury Spa & Wellness Experience</span>
                    <img src="{{ asset('assets/img/seralynteks-logo.jpg') }}" alt="Seralyn">
                    <p>Serenity Meets Your Time</p>
                    <button>Reserve Now</button>
                </div>
                <div class="hero-right">
                    <img src="{{ asset('assets/img/hero.jpg') }}" alt="Spa">
                </div>
            </div>
        </section>

        <section class="categories reveal">
            <div class="section-title">
                <span>Explore Our Treatments</span>
                <h2>Find Your Perfect Serenity</h2>
                <p>Discover our carefully curated spa experiences designed to relax, restore, and rejuvenate your body and soul.</p>
            </div>
            <div class="category-grid">
                <div class="category-card reveal-zoom">
                    <img src="{{ asset('assets/img/category1(serenity massage).jpg') }}">
                    <div class="category-overlay">
                        <h3>SERENITY MASSAGE</h3>
                        <a href="{{ url('/treatments') }}#massage" class="filter-btn" data-filter="massage">
                            View Details
                            <i class="fa-solid fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
                <div class="category-card reveal-zoom">
                    <img src="{{ asset('assets/img/category2(facial).jpg') }}">
                    <div class="category-overlay">
                        <h3>LUXURY FACIAL & BEAUTY THERAPY</h3>
                        <a href="{{ url('/treatments') }}#facial" class="filter-btn" data-filter="facial">
                            View Details
                            <i class="fa-solid fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
                <div class="category-card reveal-zoom">
                    <img src="{{ asset('assets/img/category3(body rituals).jpg') }}">
                    <div class="category-overlay">
                        <h3>BODY RITUALS</h3>
                        <a href="{{ url('/treatments') }}#body" class="filter-btn" data-filter="body">
                            View Details
                            <i class="fa-solid fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
                <div class="category-card reveal-zoom">
                    <img src="{{ asset('assets/img/category4 (international).jpg') }}">
                    <div class="category-overlay">
                        <h3>INTERNATIONAL TREATMENTS</h3>
                        <a href="{{ url('/treatments') }}#international" class="filter-btn" data-filter="international">
                            View Details
                            <i class="fa-solid fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <section class="quote">
            <section class="quote reveal"></section>
            <h2 class="reveal"></h2>
            <div class="quote-decoration">✦ ✦ ✦</div>
            <h2>Every journey requires a break, and every soul deserves peace. Seralyn is a sanctuary where time is devoted not to obligations, but to relaxation, renewal, and the gentle art of self-care.</h2>
            <p>Luxury Spa & Wellness Experience</p>
            <div class="quote-gallery">
                <div class="gallery-card reveal-zoom"><img src="{{ asset('assets/img/quo1.jpg') }}"></div>
                <div class="gallery-card reveal-zoom"><img src="{{ asset('assets/img/quo2.jpg') }}"></div>
                <div class="gallery-card reveal-zoom"><img src="{{ asset('assets/img/quo3.jpg') }}"></div>
            </div>
        </section>

        @include('components.footer')

        <a href="https://wa.me/628xxxxxxxxxx" class="wa-btn" target="_blank" title="Chat with us on WhatsApp">
            <i class="fa-brands fa-whatsapp"></i>
        </a>
        <script src="{{ asset('assets/js/index.js') }}"></script>
    </body>
</html>