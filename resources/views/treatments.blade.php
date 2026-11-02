<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Treatments | Seralyn Spa</title>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@400;500;600;700&family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
        <link rel="stylesheet" href="{{ asset('assets/css/treatment.css') }}">
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

        <section class="treatment-hero">
            <div class="hero-overlay"></div>
            <div class="treatment-hero-content reveal">
                <span>SERALYN TREATMENT COLLECTION</span>
                <h1>Rituals Designed<br>Around You</h1>
                <p>Discover thoughtfully curated treatments designed to restore your body, refresh your senses, and create moments of complete serenity.</p>

                <div class="hero-line"></div>
            </div>
        </section>
        <section class="treatment-intro reveal">
            <div class="section-title">
                <span>THE SERALYN EXPERIENCE</span>
                <h2>A Treatment for<br>Every Kind of You</h2>
                <p>From soothing massage rituals to luxurious facial therapies and internationally inspired experiences, every Seralyn treatment is created to help you slow down, reconnect, and enjoy a moment entirely for yourself.</p>
            </div>
            <div class="treatment-stat">
                <div class="stat-item">
                    <strong>18</strong>
                    <span>Signature Treatments</span>
                </div>
                <div class="stat-item">
                    <strong>4</strong>
                    <span>Treatment Collections</span>
                </div>
                <div class="stat-item">
                    <strong>60–150</strong>
                    <span>Minutes of Serenity</span>
                </div>
            </div>
        </section>
        <section class="treatment-menu">
            <div class="section-title reveal">
                <span>EXPLORE OUR COLLECTIONS</span>
                <h2>Find Your Ritual</h2>
                <p>Choose a collection that matches the way you want to relax, restore, and rejuvenate.</p>
            </div>
            <div class="category-filter reveal">
                <button class="filter-btn active" data-filter="all">All Treatments</button>
                <button class="filter-btn" data-filter="massage">Serenity Massage</button>
                <button class="filter-btn" data-filter="facial">Facial & Beauty</button>
                <button class="filter-btn" data-filter="body">Body Ritual</button>
                <button class="filter-btn" data-filter="international">International</button>
            </div>
            <div class="treatment-category reveal" data-category="massage">
                <div class="category-heading">
                    <div>
                        <span>COLLECTION 01</span>
                        <h2>Serenity Massage Collection</h2>
                    </div>
                    <p>A collection dedicated to therapeutic and relaxation massage rituals, from the head, shoulders, and feet to full-body experiences. Each treatment is designed to release tension, restore comfort, and bring the body into a calmer state.</p>
                </div>
                <div class="treatment-grid">
                    <article class="treatment-card">
                        <div class="treatment-image">
                            <img src="{{ asset('assets/img/serenity head&shoulder.jpg') }}" alt="Serenity Head & Shoulder Escape">
                            <span class="treatment-number">01</span>
                        </div>
                        <div class="treatment-info">
                            <span class="treatment-tag">MASSAGE</span>
                            <h3>Serenity Head & Shoulder Escape</h3>
                            <div class="treatment-meta">
                                <span><i class="fa-regular fa-clock"></i>60 Min</span>
                                <strong>Rp290.000</strong>
                            </div>
                            <p>A calming head, neck, and shoulder ritual designed to release everyday tension and create a sense of lightness.</p>
                            <a href="detail-treatment.html?id=head-shoulder" class="detail-btn">Explore Treatment <i class="fa-solid fa-arrow-right"></i></a>
                        </div>
                    </article>
                    <article class="treatment-card">
                        <div class="treatment-image">
                            <img src="{{ asset('assets/img/foot harmony reflexology.jpg') }}" alt="Foot Harmony Reflexology">
                            <span class="treatment-number">02</span>
                        </div>
                        <div class="treatment-info">
                            <span class="treatment-tag">MASSAGE</span>
                            <h3>Foot Harmony Reflexology</h3>
                            <div class="treatment-meta">
                                <span><i class="fa-regular fa-clock"></i>60 Min</span>
                                <strong>Rp260.000</strong>
                            </div>
                            <p>A soothing foot reflexology experience created to ease tired feet and restore a feeling of balance.</p>
                            <a href="detail-treatment.html?id=foot-reflexology" class="detail-btn">Explore Treatment <i class="fa-solid fa-arrow-right"></i></a>
                        </div>
                    </article>
                    <article class="treatment-card">
                        <div class="treatment-image">
                            <img src="{{ asset('assets/img/Lavender Dream Hand Ritual.jpg') }}" onerror="this.src='assets/img/face.jpg'" alt="Lavender Dream Hand Ritual">
                            <span class="treatment-number">03</span>
                        </div>
                        <div class="treatment-info">
                            <span class="treatment-tag">MASSAGE</span>
                            <h3>Lavender Dream Hand Ritual</h3>
                            <div class="treatment-meta">
                                <span><i class="fa-regular fa-clock"></i>60 Min</span>
                                <strong>Rp260.000</strong>
                            </div>
                            <p>A delicate hand ritual combining exfoliation, massage, hydration, and calming lavender aromatherapy.</p>
                            <a href="detail-treatment.html?id=lavender-hand" class="detail-btn">Explore Treatment <i class="fa-solid fa-arrow-right"></i></a>
                        </div>
                    </article>
                    <article class="treatment-card">
                        <div class="treatment-image">
                            <img src="{{ asset('assets/img/Golden Jasmine Relaxation.jpg') }}" alt="Golden Jasmine Relaxation Massage">
                            <span class="treatment-number">04</span>
                        </div>
                        <div class="treatment-info">
                            <span class="treatment-tag">MASSAGE</span>
                            <h3>Golden Jasmine Relaxation</h3>
                            <div class="treatment-meta">
                                <span><i class="fa-regular fa-clock"></i>60 Min</span>
                                <strong>Rp300.000</strong>
                            </div>
                            <p>A full-body relaxation ritual infused with jasmine aromatherapy and gentle Balinese-inspired massage techniques.</p>
                            <a href="detail-treatment.html?id=golden-jasmine" class="detail-btn">Explore Treatment <i class="fa-solid fa-arrow-right"></i></a>
                        </div>
                    </article>
                    <article class="treatment-card">
                        <div class="treatment-image">
                            <img src="{{ asset('assets/img/warm candle.jpg') }}" onerror="this.src='assets/img/massage.jpg'" alt="Warm Candle Therapy">
                            <span class="treatment-number">05</span>
                        </div>
                        <div class="treatment-info">
                            <span class="treatment-tag">MASSAGE</span>
                            <h3>Warm Candle Therapy</h3>
                            <div class="treatment-meta">
                                <span><i class="fa-regular fa-clock"></i>60 Min</span>
                                <strong>Rp420.000</strong>
                            </div>
                            <p>A warm candle massage ritual designed to release muscle tension while creating a deeply soothing and luxurious experience.</p>
                            <a href="detail-treatment.html?id=warm-candle" class="detail-btn">Explore Treatment <i class="fa-solid fa-arrow-right"></i></a>
                        </div>
                    </article>
                    <article class="treatment-card">
                        <div class="treatment-image">
                            <img src="{{ asset('assets/img/Refreshing Herbal Compress.jpg') }}" alt="Refreshing Herbal Compress">
                            <span class="treatment-number">06</span>
                        </div>
                        <div class="treatment-info">
                            <span class="treatment-tag">MASSAGE</span>
                            <h3>Refreshing Herbal Compress</h3>
                            <div class="treatment-meta">
                                <span><i class="fa-regular fa-clock"></i>60 Min</span>
                                <strong>Rp380.000</strong>
                            </div>
                            <p>A soothing herbal compress and massage ritual created to release body tension and restore a sense of relaxation.</p>
                            <a href="detail-treatment.html?id=herbal-compress" class="detail-btn">Explore Treatment <i class="fa-solid fa-arrow-right"></i></a>
                        </div>
                    </article>
                    <article class="treatment-card">
                        <div class="treatment-image">
                            <img src="{{ asset('assets/img/Volcanic Hot Stone Escape.jpg') }}" alt="Volcanic Hot Stone Escape">
                            <span class="treatment-number">07</span>
                        </div>
                        <div class="treatment-info">
                            <span class="treatment-tag">MASSAGE</span>
                            <h3>Volcanic Hot Stone Escape</h3>
                            <div class="treatment-meta">
                                <span><i class="fa-regular fa-clock"></i>60 Min</span>
                                <strong>Rp480.000</strong>
                            </div>
                            <p>Heated volcanic stones meet relaxing massage techniques to create a deeply grounding spa ritual.</p>
                            <a href="detail-treatment.html?id=hot-stone" class="detail-btn">Explore Treatment <i class="fa-solid fa-arrow-right"></i></a>
                        </div>
                    </article>
                    <article class="treatment-card">
                        <div class="treatment-image">
                            <img src="{{ asset('assets/img/Royal Bamboo Harmony Massage.jpg') }}" alt="Royal Bamboo Harmony Massage">
                            <span class="treatment-number">08</span>
                        </div>
                        <div class="treatment-info">
                            <span class="treatment-tag">MASSAGE</span>
                            <h3>Royal Bamboo Harmony Massage</h3>
                            <div class="treatment-meta">
                                <span><i class="fa-regular fa-clock"></i>75 Min</span>
                                <strong>Rp550.000</strong>
                            </div>
                            <p>Warm bamboo rolling techniques meet full-body massage for a unique and immersive relaxation experience.</p>
                            <a href="detail-treatment.html?id=bamboo" class="detail-btn">Explore Treatment <i class="fa-solid fa-arrow-right"></i></a>
                        </div>
                    </article>

                </div>
            </div>

            <div class="treatment-category reveal" data-category="facial">
                <div class="category-heading">
                    <div>
                        <span>COLLECTION 02</span>
                        <h2>Luxury Facial & Beauty Therapy</h2>
                    </div>
                    <p>A refined collection of facial and beauty rituals created to cleanse, nourish, hydrate, and refresh the skin while surrounding you with a calming spa experience.</p>
                </div>
                <div class="treatment-grid">
                    <article class="treatment-card">
                        <div class="treatment-image">
                            <img src="{{ asset('assets/img/Diamond Glow Facial.jpg') }}" alt="Diamond Glow Facial">
                            <span class="treatment-number">09</span>
                        </div>
                        <div class="treatment-info">
                            <span class="treatment-tag">FACIAL</span>
                            <h3>Diamond Glow Facial</h3>
                            <div class="treatment-meta">
                                <span><i class="fa-regular fa-clock"></i>80 Min</span>
                                <strong>Rp650.000</strong>
                            </div>
                            <p>A premium facial ritual combining cleansing, exfoliation, serum infusion, and a brightening mask.</p>
                            <a href="detail-treatment.html?id=diamond-glow" class="detail-btn">Explore Treatment <i class="fa-solid fa-arrow-right"></i></a>
                        </div>
                    </article>
                    <article class="treatment-card">
                        <div class="treatment-image">
                            <img src="{{ asset('assets/img/Ultimate Collagen Lift Therapy.jpg') }}" alt="Ultimate Collagen Lift Therapy">
                            <span class="treatment-number">10</span>
                        </div>
                        <div class="treatment-info">
                            <span class="treatment-tag">FACIAL</span>
                            <h3>Ultimate Collagen Lift Therapy</h3>
                            <div class="treatment-meta">
                                <span><i class="fa-regular fa-clock"></i>80 Min</span>
                                <strong>Rp720.000</strong>
                            </div>
                            <p>A collagen-focused facial ritual designed around hydration, nourishment, and a lifting massage experience.</p>
                            <a href="detail-treatment.html?id=collagen-lift" class="detail-btn">Explore Treatment <i class="fa-solid fa-arrow-right"></i></a>
                        </div>
                    </article>
                    <article class="treatment-card">
                        <div class="treatment-image">
                            <img src="{{ asset('assets/img/Platinum Youth Infusion.jpg') }}" alt="Platinum Youth Infusion">
                            <span class="treatment-number">11</span>
                        </div>
                        <div class="treatment-info">
                            <span class="treatment-tag">FACIAL</span>
                            <h3>Platinum Youth Infusion</h3>
                            <div class="treatment-meta">
                                <span><i class="fa-regular fa-clock"></i>60 Min</span>
                                <strong>Rp780.000</strong>
                            </div>
                            <p>An exclusive hydration ritual with premium active ingredients for a refreshed and luminous appearance.</p>
                            <a href="detail-treatment.html?id=platinum-youth" class="detail-btn">Explore Treatment <i class="fa-solid fa-arrow-right"></i></a>
                        </div>
                    </article>

                </div>
            </div>

            <div class="treatment-category reveal" data-category="body">
                <div class="category-heading">
                    <div>
                        <span>COLLECTION 03</span>
                        <h2>Body Ritual Collection</h2>
                    </div>
                    <p>Body-focused rituals combining natural exfoliation, nourishing masks, wraps, and relaxing spa ceremonies to leave the skin feeling refreshed and cared for.</p>
                </div>
                <div class="treatment-grid">
                    <article class="treatment-card">
                        <div class="treatment-image">
                            <img src="{{ asset('assets/img/Royal Coconut Body Polish.jpg') }}" alt="Royal Coconut Body Polish">
                            <span class="treatment-number">12</span>
                        </div>
                        <div class="treatment-info">
                            <span class="treatment-tag">BODY RITUAL</span>
                            <h3>Royal Coconut Body Polish</h3>
                            <div class="treatment-meta">
                                <span><i class="fa-regular fa-clock"></i>60 Min</span>
                                <strong>Rp490.000</strong>
                            </div>
                            <p>A coconut-based body polish designed to gently exfoliate and nourish the skin.</p>
                            <a href="detail-treatment.html?id=coconut-polish" class="detail-btn">Explore Treatment <i class="fa-solid fa-arrow-right"></i></a>
                        </div>
                    </article>
                    <article class="treatment-card">
                        <div class="treatment-image">
                            <img src="{{ asset('assets/img/Tropical Sea Salt Body Scrub.jpg') }}" alt="Tropical Sea Salt Body Scrub">
                            <span class="treatment-number">13</span>
                        </div>
                        <div class="treatment-info">
                            <span class="treatment-tag">BODY RITUAL</span>
                            <h3>Tropical Sea Salt Body Scrub</h3>
                            <div class="treatment-meta">
                                <span><i class="fa-regular fa-clock"></i>60 Min</span>
                                <strong>Rp520.000</strong>
                            </div>
                            <p>A mineral-rich sea salt exfoliation ritual for a refreshed and renewed body experience.</p>
                            <a href="detail-treatment.html?id=sea-salt" class="detail-btn">Explore Treatment <i class="fa-solid fa-arrow-right"></i></a>
                        </div>
                    </article>
                    <article class="treatment-card">
                        <div class="treatment-image">
                            <img src="{{ asset('assets/img/Golden Clay Purifying Body Mask.jpg') }}" alt="Golden Clay Purifying Body Mask">
                            <span class="treatment-number">14</span>
                        </div>
                        <div class="treatment-info">
                            <span class="treatment-tag">BODY RITUAL</span>
                            <h3>Golden Clay Purifying Body Mask</h3>
                            <div class="treatment-meta">
                                <span><i class="fa-regular fa-clock"></i>75 Min</span>
                                <strong>Rp620.000</strong>
                            </div>
                            <p>A mineral clay body ritual combining cleansing, wrapping, and hydration.</p>
                            <a href="detail-treatment.html?id=golden-clay" class="detail-btn">Explore Treatment <i class="fa-solid fa-arrow-right"></i></a>
                        </div>
                    </article>
                    <article class="treatment-card">
                        <div class="treatment-image">
                            <img src="{{ asset('assets/img/Royal Milk Body Wrap Ceremony.jpg') }}" alt="Royal Milk Body Wrap Ceremony">
                            <span class="treatment-number">15</span>
                        </div>
                        <div class="treatment-info">
                            <span class="treatment-tag">BODY RITUAL</span>
                            <h3>Royal Milk Body Wrap Ceremony</h3>
                            <div class="treatment-meta">
                                <span><i class="fa-regular fa-clock"></i>150 Min</span>
                                <strong>Rp1.250.000</strong>
                            </div>
                            <p>A complete premium spa ceremony combining massage, body exfoliation, mask, milk bath, and refreshing wellness rituals.</p>
                            <a href="detail-treatment.html?id=milk-wrap" class="detail-btn">Explore Treatment <i class="fa-solid fa-arrow-right"></i></a>
                        </div>
                    </article>
                </div>
            </div>

            <div class="treatment-category international-category reveal" data-category="international">
                <div class="category-heading">
                    <div>
                        <span>COLLECTION 04</span>
                        <h2>Premium International Treatments</h2>
                    </div>
                    <p>Exclusive treatments inspired by renowned wellness traditions from around the world, carefully adapted into a luxurious Seralyn experience.</p>
                </div>
                <div class="treatment-grid">
                    <article class="treatment-card">
                        <div class="treatment-image">
                            <img src="{{ asset('assets/img/Japanese Sakura Healing Ritual.jpg') }}" alt="Japanese Sakura Head Spa Ritual">
                            <span class="treatment-number">16</span>
                            <span class="international-badge">JAPAN</span>
                        </div>
                        <div class="treatment-info">
                            <span class="treatment-tag">INTERNATIONAL</span>
                            <h3>Japanese Sakura Head Spa Ritual</h3>
                            <div class="treatment-meta">
                                <span><i class="fa-regular fa-clock"></i>150 Min</span>
                                <strong>Rp1.650.000</strong>
                            </div>
                            <p>An immersive Japanese-inspired ritual combining head spa therapy, body massage, scalp care, and Sakura-inspired relaxation.</p>
                            <a href="detail-treatment.html?id=japanese-sakura" class="detail-btn">Explore Treatment <i class="fa-solid fa-arrow-right"></i></a>
                        </div>
                    </article>
                    <article class="treatment-card">
                        <div class="treatment-image">
                            <img src="{{ asset('assets/img/Korean Ginseng Scalp Rejuvenation.jpg') }}" alt="Korean Ginseng Scalp Rejuvenation">
                            <span class="treatment-number">17</span>
                            <span class="international-badge">KOREA</span>
                        </div>
                        <div class="treatment-info">
                            <span class="treatment-tag">INTERNATIONAL</span>
                            <h3>Korean Ginseng Scalp Rejuvenation</h3>
                            <div class="treatment-meta">
                                <span><i class="fa-regular fa-clock"></i>150 Min</span>
                                <strong>Rp1.750.000</strong>
                            </div>
                            <p>A premium Korean-inspired scalp and relaxation ritual featuring ginseng, scalp care, massage, and warm steam therapy.</p>
                            <a href="detail-treatment.html?id=korean-ginseng" class="detail-btn">Explore Treatment <i class="fa-solid fa-arrow-right"></i></a>
                        </div>
                    </article>
                    <article class="treatment-card">
                        <div class="treatment-image">
                            <img src="{{ asset('assets/img/Thai Harmony Massage.jpg') }}" alt="Royal Thai Harmony Massage">
                            <span class="treatment-number">18</span>
                            <span class="international-badge">THAILAND</span>
                        </div>
                        <div class="treatment-info">
                            <span class="treatment-tag">INTERNATIONAL</span>
                            <h3>Royal Thai Harmony Massage</h3>
                            <div class="treatment-meta">
                                <span><i class="fa-regular fa-clock"></i>150 Min</span>
                                <strong>Rp1.850.000</strong>
                            </div>
                            <p>A Thai-inspired wellness journey combining massage, gentle assisted stretching, pressure point techniques, and herbal rituals.</p>
                            <a href="detail-treatment.html?id=thai-harmony" class="detail-btn">Explore Treatment <i class="fa-solid fa-arrow-right"></i></a>
                        </div>
                    </article>
                </div>
            </div>
        </section>

        <section class="treatment-cta reveal">
            <div class="cta-decoration">✦</div>
            <span>YOUR MOMENT OF SERENITY</span>
            <h2>Ready to Find<br>Your Perfect Ritual?</h2>
            <p>Let your body slow down and your senses reconnect. Choose the treatment that feels right for you.</p>
            <a href="reservasi.html" class="cta-button">Reserve Your Experience <i class="fa-solid fa-arrow-right"></i></a>
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


        <a href="#" class="wa-btn"><i class="fa-brands fa-whatsapp"></i></a>
        <script src="{{ asset('assets/js/treatment.js') }}"></script>
    </body>
</html>