<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Gallery | SERALYN SPA</title>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@400;500;600;700&family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
        <link rel="stylesheet" href="{{ asset('assets/css/gallery.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/header.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/responsive-pages.css') }}">
    </head>


    <body class="gallery-page">
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

        <section class="gallery-hero">
            <div class="overlay"></div>
            <div class="gallery-hero-content reveal">
                <span>Moments of Serenity </span>
                <h1>
                    Discover the Beauty<br>
                    Behind Seralyn Spa
                </h1>
                <p>Every corner of Seralyn is thoughtfully designed to create a peaceful atmosphere where relaxation, beauty, and wellness become one unforgettable experience.</p>
                <div class="hero-stat">
                    <div>
                        <h3>15+</h3>
                        <span>Treatments</span>
                    </div>
                    <div>
                        <h3>2</h3>
                        <span>Rooms Category</span>
                    </div>
                    <div>
                        <h3>1000+</h3>
                        <span>Happy Guests</span>
                    </div>
                </div>
            </div>
        </section>

        <section class="rooms reveal">
            <div class="section-title">
                <span>Happy Spaces</span>
                <h2>Our Category Treatment Rooms</h2>
                <p>
                    Experience comfort and tranquility in our specially designed rooms, each created to provide a unique wellness journey.
                </p>
            </div>
            <div class="room-grid">
                <div class="room-card reveal-zoom">
                    <img src="{{ asset('assets/img/private room (staff2).jpg') }}">
                    <div class="room-overlay">
                        <h3>Serenity Room</h3>
                        <p>A Single bed Luxurious treatment room dedicated to massage and body therapy experiences, surrounded by warm lighting and calming aromas.</p>
                        <a href="#">Reserve Now</a>
                    </div>
                </div>
                <div class="room-card reveal-zoom">
                    <img src="{{ asset('assets/img/combined room (staff).jpg') }}">
                    <div class="room-overlay">
                        <h3>Harmony Room</h3>
                        <p>A Two bed peaceful sanctuary designed for facial and beauty treatments, creating a private and elegant atmosphere.</p>
                        <a href="#">Reserve Now</a>
                    </div>
                </div>
            </div>
        </section>

        <section class="gallery-section reveal">
            <div class="section-title">
                <span>Our Collection</span>
                <h2>Moments at Seralyn</h2>
                <p>Explore the warmth and serenity of our carefully captured moments and beautiful details.</p>
            </div>
            <div class="gallery-grid">
                <div class="gallery-item reveal-zoom">
                    <img src="{{ asset('assets/img/herbal.jpg') }}">
                </div>
                <div class="gallery-item tall reveal-zoom">
                    <img src="{{ asset('assets/img/gallery2.jpg') }}">
                </div>
                <div class="gallery-item reveal-zoom">
                    <img src="{{ asset('assets/img/gallery3.jpg') }}">
                </div>
                <div class="gallery-item wide reveal-zoom">
                    <img src="{{ asset('assets/img/gallery4.jpg')}}">
                </div>
                <div class="gallery-item reveal-zoom">
                    <img src="{{ asset('assets/img/private 1.jpg') }}">
                </div>
                <div class="gallery-item reveal-zoom">
                    <img src="{{ asset('assets/img/sleep.jpg') }}">
                </div>
                <div class="gallery-item tall reveal-zoom">
                    <img src="{{ asset('assets/img/waiting room.jpg') }}">
                </div>
                <div class="gallery-item reveal-zoom">
                    <img src="{{ asset('assets/img/private room (staff).jpg') }}">
                </div>
                <div class="gallery-item reveal-zoom">
                    <img src="{{ asset('assets/img/couple.jpg') }}">
                </div>
                <div class="gallery-item reveal-zoom">
                    <img src="{{ asset('assets/img/Japanese Head Spa.jpg') }}">
                </div>
                <div class="gallery-item reveal-zoom">
                    <img src="{{ asset('assets/img/face.jpg') }}">
                </div>
                <div class="gallery-item reveal-zoom">
                    <img src="{{ asset('assets/img/pah.jpg') }}">
                </div>
                <div class="gallery-item reveal-zoom">
                    <img src="{{ asset('assets/img/coridoor.jpg') }}">
                </div>
                <div class="gallery-item reveal-zoom">
                    <img src="{{ asset('assets/img/massage.jpg') }}">
                </div>
                <div class="gallery-item reveal-zoom">
                    <img src="{{ asset('assets/img/bamboo.jpg') }}">
                </div>
                <div class="gallery-item reveal-zoom">
                    <img src="{{ asset('assets/img/waitng drink.jpg') }}">
                </div>
                <div class="gallery-item reveal-zoom">
                    <img src="{{ asset('assets/img/bodyclay.jpg') }}">
                </div>
                <div class="gallery-item reveal-zoom">
                    <img src="{{ asset('assets/img/footbam.jpg') }}">
                </div>
            </div>
        </section>
        <section class="quote reveal">
            <div class="quote-decoration">✦ ✦ ✦</div>
            <h2>The beauty of wellness lies not only in the treatments we offer, but in the peaceful moments we create and the memories our guests take home.</h2>
            <p>Luxury Spa & Wellness Experience</p>
        </section>

        
        @include('components.footer')

        <a href="https://wa.me/628xxxxxxxxxx" class="wa-btn" target="_blank"> <i class="fa-brands fa-whatsapp"></i></a>
        <script src="{{ asset('assets/js/gallery.js') }}"></script>
    </body>
</html>