<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@400;500;600;700&family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
        <link rel="stylesheet" href="{{ asset('assets/css/index.css') }}">
        <title>SERALYN SPA</title>
    </head>


    <body>
        <div class="page-transition"></div>
        <div class="particles">
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
        </div>
        <header>
            <div class="logo"><img src="{{ asset('assets/img/LOGO.jpg') }}" alt="Seralyn Spa"></div>
            <nav>
                <a href="{{ url('/') }}">Home</a>
                <a href="{{ url('/aboutus') }}">About Us</a>
                <a href="{{ url('/treatments') }}">Treatments</a>
                <a href="{{ url('/gallery') }}">Gallery</a>
                <a href="#" class="reservation-btn">Reservation</a>
            </nav>
            <div class="account">
                <a href="#">Login</a>
                <a href="#">Sign Up</a>
            </div>
        </header>

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
                        <a href="treatment.html#massage" class="filter-btn" data-filter="massage">
                            View Details
                            <i class="fa-solid fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
                <div class="category-card reveal-zoom">
                    <img src="{{ asset('assets/img/category2(facial).jpg') }}">
                    <div class="category-overlay">
                        <h3>LUXURY FACIAL & BEAUTY THERAPY</h3>
                        <a href="treatment.html#facial" class="filter-btn" data-filter="facial">
                            View Details
                            <i class="fa-solid fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
                <div class="category-card reveal-zoom">
                    <img src="{{ asset('assets/img/category3(body rituals).jpg') }}">
                    <div class="category-overlay">
                        <h3>BODY RITUALS</h3>
                        <a href="treatment.html#body" class="filter-btn" data-filter="body">
                            View Details
                            <i class="fa-solid fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
                <div class="category-card reveal-zoom">
                    <img src="{{ asset('assets/img/category4 (international).jpg') }}">
                    <div class="category-overlay">
                        <h3>INTERNATIONAL TREATMENTS</h3>
                        <a href="treatment.html#international" class="filter-btn" data-filter="international">
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

        <footer>
            <div class="footer-box">
                <img src="{{ asset('assets/img/LOGO.jpg') }}" class="footer-logo">
                <p>Premium Spa & Wellness Experience with serenity, beauty, and comfort.</p>
                <div class="footer-social">
                    <a href="#"><i class="fa-brands fa-instagram"></i></a>
                    <a href="#"><i class="fa-brands fa-tiktok"></i></a>
                    <a href="#"><i class="fa-brands fa-x-twitter"></i></a>
                    <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
                </div>
            </div>
            <div class="footer-box">
                <h3>Menu</h3>
                <a href="index.html">Home</a>
                <a href="gallery.html">Gallery</a>
                <a href="treatment.html">Treatment</a>
                <a href="aboutus.html">About Us</a>
            </div>
            <div class="footer-box">
                <h3>Contact</h3>
                <a href="#">WhatsApp</a>
                <a href="#">Email</a>
                <a href="#">Address</a>
            </div>
        </footer>

        <a href="https://wa.me/628xxxxxxxxxx" class="wa-btn" target="_blank" title="Chat with us on WhatsApp">
            <i class="fa-brands fa-whatsapp"></i>
        </a>
        <script src="{{ asset('assets/js/index.js') }}"></script>
    </body>
</html>