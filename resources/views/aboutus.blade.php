<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>About Us | SERALYN SPA</title>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@400;500;600;700&family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
        <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
        <link rel="stylesheet" href="{{ asset('assets/css/aboutus.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/header.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/responsive-pages.css') }}">
    </head>


    <body class="about-page">
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
                <span>ABOUT SERALYN SPA</span>
                <h1> A Sanctuary Where Serenity Meets Time</h1>
                <p> Every moment deserves a pause. Seralyn is created as a peaceful sanctuary where relaxation, beauty, and wellness become one timeless experience.</p>
            </div>
        </section>

        <section class="story">
            <div class="story-image reveal-left"><img src="{{ asset('assets/img/about.jpg') }}"></div>
            <div class="story-content reveal-right">
                <span>OUR STORY</span>
                <h2>The Meaning Behind Seralyn</h2>
                <p>The name <b>Seralyn</b> comes from the word <b>Serenity</b>, symbolizing peace and tranquility, combined with <b>Lyn</b>, inspired by the word timeline, representing precious moments reserved for self-care.</p>
                <p>Seralyn was born from the belief that everyone deserves a special time to pause, breathe, and reconnect with themselves through wellness and relaxation.</p>
            </div>
        </section>

        <section class="philosophy">
            <div class="section-title reveal">
                <span>OUR PHILOSOPHY</span>
                <h2>More Than A Spa Experience</h2>
            </div>
            <div class="philosophy-grid">
                <div class="card reveal-zoom">
                    <i class="fa-solid fa-spa"></i>
                    <h3>Serenity</h3>
                    <p>Creating a peaceful atmosphere that calms both body and mind.</p>
                </div>
                <div class="card reveal-zoom">
                    <i class="fa-solid fa-heart"></i>
                    <h3>Wellness</h3>
                    <p>Treatments designed to restore energy, beauty, and balance.</p>
                </div>
                <div class="card reveal-zoom">
                    <i class="fa-solid fa-clock"></i>
                    <h3>Your Time</h3>
                    <p>Because every person deserves dedicated moments for themselves.</p>
                </div>
            </div>
        </section>

        <section class="experience">
            <div class="experience-box reveal">
                <h2>1000+</h2>
                <p>Happy Guests</p>
            </div>
            <div class="experience-box reveal">
                <h2>15+</h2>
                <p>Luxury Treatments</p>
            </div>
            <div class="experience-box reveal">
                <h2>100%</h2>
                <p>Relaxation Experience</p>
            </div>
        </section>

        <section class="gallery-section">
            <div class="section-title reveal">
                <span>SERALYN ATMOSPHERE</span>
                <h2>Where Every Corner Brings Peace</h2>
            </div>
            <div class="gallery-grid">
                <div class="gallery-card tall reveal-zoom"><img src="{{ asset('assets/img/aboutquo1.jpg') }}"></div>
                <div class="gallery-card reveal-zoom"><img src="{{ asset('assets/img/aboutquo2.jpg') }}"></div>
                <div class="gallery-card wide reveal-zoom"><img src="{{ asset('assets/img/aboutquo3.jpg') }}"></div>
                <div class="gallery-card reveal-zoom"><img src="{{ asset('assets/img/aboutquo4.jpg') }}"></div>
                <div class="gallery-card wide reveal-zoom"><img src="{{ asset('assets/img/aboutquo5.jpg') }}"></div>
                <div class="gallery-card wide reveal-zoom"><img src="{{ asset('assets/img/aboutquo6.jpg') }}"></div>
            </div>
        </section>

        <section class="quote">
            <div class="quote-decoration">✦ ✦ ✦</div>
            <h2>
                At Seralyn, we believe true luxury is not about escaping life,
                but creating moments where you can slow down, breathe deeply,
                and rediscover your inner peace.
            </h2>
        </section>

        @include('components.footer')

        <a href="https://wa.me/628xxxxxxxxxx" class="wa-btn" target="_blank" title="Chat with us on WhatsApp">
            <i class="fa-brands fa-whatsapp"></i>
        </a>
        <script src="{{ asset('assets/js/aboutus.js') }}"></script>
    </body>
</html>