<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservation | Seralyn</title>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@400;500;600;700&family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --cream: #f8f5ef;
            --white: #ffffff;
            --brown: #806b57;
            --dark: #40362f;
            --muted: #94877c;
            --line: #e9e2d9;
            --light: #eee8df;
            --green: #647b68;
        }

        body {
            background: var(--cream);
            color: var(--dark);
            font-family: 'Poppins', sans-serif;
            font-size: 13px;
        }

        button, input, select, textarea {
            font-family: inherit;
        }

        button {
            cursor: pointer;
        }

        .navbar {
            height: 85px;
            background: white;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 8%;
            border-bottom: 1px solid var(--line);
        }

        .logo {
            font-family: 'Cormorant Garamond', serif;
            font-size: 30px;
            color: var(--brown);
        }

        .nav-back {
            color: var(--brown);
            text-decoration: none;
            font-size: 12px;

            padding: 10px 10px;
            border-radius: 50px;

            background: rgba(80, 68, 43, 0.25);
            border: 1px solid rgba(255, 255, 255, 0.3);
        }

        .hero {
            text-align: center;
            padding: 55px 20px 35px;
        }

        .hero span {
            color: var(--brown);
            font-size: 10px;
            letter-spacing: 4px;
        }

        .hero h1 {
            font-family: 'Cormorant Garamond', serif;
            font-size: 48px;
            font-weight: 500;
            margin: 12px 0;
        }

        .hero p {
            color: var(--muted);
            font-size: 12px;
        }

        .booking-container {
            max-width: 1150px;
            margin: auto;
            padding: 0 25px 80px;
        }

        .steps {
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 25px auto 45px;
            max-width: 800px;
        }

        .step {
            display: flex;
            align-items: center;
            gap: 9px;
            color: #b5aaa0;
            white-space: nowrap;
        }

        .step-number {
            width: 32px;
            height: 32px;
            border: 1px solid #d9cec2;
            border-radius: 50%;
            display: grid;
            place-items: center;
            font-size: 12px;
        }

        .step.active {
            color: var(--brown);
        }

        .step.active .step-number,
        .step.completed .step-number {
            background: var(--brown);
            border-color: var(--brown);
            color: white;
        }

        .step-line {
            height: 1px;
            width: 65px;
            background: var(--line);
            margin: 0 15px;
        }

        .step-content {
            display: none;
            animation: fade .35s ease;
        }

        .step-content.active {
            display: block;
        }

        @keyframes fade {
            from {
                opacity: 0;
                transform: translateY(8px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .section-heading {
            margin-bottom: 30px;
        }

        .section-heading span {
            color: var(--brown);
            letter-spacing: 3px;
            font-size: 10px;
        }

        .section-heading h2 {
            font-family: 'Cormorant Garamond', serif;
            font-size: 35px;
            font-weight: 500;
            margin: 8px 0;
        }

        .section-heading p {
            color: var(--muted);
            font-size: 12px;
        }

        .collection {
            margin-bottom: 38px;
        }

        .collection-heading {
            display: flex;
            justify-content: space-between;
            align-items: end;
            margin-bottom: 18px;
            border-bottom: 1px solid var(--line);
            padding-bottom: 12px;
        }

        .collection-heading h3 {
            font-family: 'Cormorant Garamond', serif;
            font-size: 25px;
            font-weight: 500;
        }

        .collection-heading span {
            color: var(--brown);
            font-size: 10px;
            letter-spacing: 2px;
        }

        .treatment-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
        }

        .treatment-card {
            background: white;
            border: 1px solid var(--line);
            transition: .3s;
            position: relative;
        }

        .treatment-card.selected {
            border: 1px solid var(--brown);
            box-shadow: 0 5px 20px #806b571c;
        }

        .treatment-card img {
            width: 100%;
            height: 175px;
            object-fit: cover;
        }

        .treatment-info {
            padding: 17px;
        }

        .treatment-info .category-label {
            color: var(--brown);
            font-size: 9px;
            letter-spacing: 2px;
        }

        .treatment-info h4 {
            font-family: 'Cormorant Garamond', serif;
            font-size: 22px;
            font-weight: 600;
            margin: 7px 0;
        }

        .treatment-info p {
            font-size: 11px;
            line-height: 1.8;
            color: var(--muted);
            min-height: 60px;
        }

        .treatment-meta {
            display: flex;
            justify-content: space-between;
            margin: 15px 0;
            font-size: 11px;
        }

        .treatment-meta span {
            color: var(--muted);
        }

        .treatment-meta strong {
            color: var(--brown);
        }

        .select-treatment {
            width: 100%;
            padding: 10px;
            border: 1px solid var(--brown);
            background: white;
            color: var(--brown);
            font-size: 11px;
            transition: .2s;
        }

        .selected .select-treatment {
            background: var(--brown);
            color: white;
        }

        .selection-summary {
            background: white;
            border: 1px solid var(--line);
            padding: 22px;
            margin-top: 30px;
        }

        .selection-summary h3 {
            font-family: 'Cormorant Garamond', serif;
            font-size: 23px;
            margin-bottom: 12px;
        }

        .summary-row {
            display: flex;
            justify-content: space-between;
            gap: 15px;
            padding: 9px 0;
            border-bottom: 1px solid var(--line);
            font-size: 11px;
        }

        .summary-row:last-child {
            border: none;
        }

        .summary-row span:last-child {
            font-weight: 500;
        }

        .form-card {
            background: white;
            border: 1px solid var(--line);
            padding: 30px;
            margin-bottom: 25px;
        }

        .form-card h3 {
            font-family: 'Cormorant Garamond', serif;
            font-size: 25px;
            font-weight: 500;
            margin-bottom: 20px;
        }

        .field-group {
            margin-bottom: 20px;
        }

        .field-group label {
            display: block;
            font-size: 11px;
            margin-bottom: 9px;
            color: var(--dark);
        }

        .field-group input,
        .field-group select,
        .field-group textarea {
            width: 100%;
            padding: 13px;
            border: 1px solid var(--line);
            background: #fdfcf9;
            outline: none;
            font-size: 12px;
            color: var(--dark);
        }

        .field-group input:focus,
        .field-group textarea:focus {
            border-color: var(--brown);
        }

        .date-wrapper {
            background: white;
            padding: 25px;
            border: 1px solid var(--line);
            max-width: 500px;
        }

        .date-wrapper input {
            width: 100%;
            padding: 15px;
            border: 1px solid var(--line);
            font-size: 13px;
        }

        .availability-note {
            color: var(--muted);
            font-size: 11px;
            margin-top: 15px;
            line-height: 1.8;
        }

        .booking-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 25px;
        }

        .booking-panel {
            background: white;
            border: 1px solid var(--line);
            padding: 25px;
            margin-bottom: 25px;
        }

        .booking-panel h3 {
            font-family: 'Cormorant Garamond', serif;
            font-size: 25px;
            font-weight: 500;
            margin-bottom: 7px;
        }

        .booking-panel > p {
            color: var(--muted);
            font-size: 11px;
            margin-bottom: 20px;
        }

        .time-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 10px;
        }

        .option-btn {
            border: 1px solid var(--line);
            background: white;
            padding: 13px 5px;
            font-size: 11px;
            color: var(--dark);
        }

        .option-btn:hover,
        .option-btn.selected {
            background: var(--brown);
            color: white;
            border-color: var(--brown);
        }

        .option-list {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 10px;
        }

        .option-card {
            border: 1px solid var(--line);
            background: white;
            padding: 15px;
            text-align: left;
            color: var(--dark);
        }

        .option-card.selected {
            border: 1px solid var(--brown);
            background: #f8f5ef;
        }

        .option-card strong {
            display: block;
            font-size: 12px;
            margin-bottom: 6px;
        }

        .option-card span {
            font-size: 10px;
            color: var(--muted);
        }

        .room-type {
            display: flex;
            gap: 10px;
            margin-bottom: 15px;
        }

        .room-type button {
            flex: 1;
            padding: 12px;
            border: 1px solid var(--line);
            background: white;
            color: var(--brown);
            font-size: 11px;
        }

        .room-type button.selected {
            background: var(--brown);
            color: white;
        }

        .total-box {
            background: #eee8df;
            padding: 25px;
            margin-top: 25px;
        }

        .total-box h3 {
            font-family: 'Cormorant Garamond', serif;
            font-size: 25px;
            font-weight: 500;
            margin-bottom: 15px;
        }

        .total-price {
            font-family: 'Cormorant Garamond', serif;
            font-size: 35px;
            color: var(--brown);
            margin-top: 10px;
        }

        .button-group {
            display: flex;
            justify-content: space-between;
            gap: 15px;
            margin-top: 35px;
        }

        .btn {
            padding: 14px 28px;
            border: 1px solid var(--brown);
            font-size: 11px;
            letter-spacing: 1px;
            transition: .2s;
        }

        .btn-primary {
            background: var(--brown);
            color: white;
        }

        .btn-primary:hover {
            background: var(--dark);
        }

        .btn-secondary {
            background: transparent;
            color: var(--brown);
        }

        .btn-secondary:hover {
            background: var(--light);
        }

        .empty-message {
            color: var(--muted);
            font-size: 11px;
            padding: 15px 0;
        }

        .policy {
            display: flex;
            gap: 10px;
            font-size: 11px;
            line-height: 1.7;
            margin-top: 20px;
        }

        .footer {
            text-align: center;
            padding: 30px;
            color: var(--muted);
            border-top: 1px solid var(--line);
            font-size: 10px;
            letter-spacing: 1px;
        }

        @media(max-width: 800px) {
            .treatment-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .booking-grid {
                grid-template-columns: 1fr;
                gap: 0;
            }

            .step-line {
                width: 20px;
                margin: 0 5px;
            }

            .step {
                gap: 5px;
                font-size: 9px;
            }

            .step-number {
                width: 27px;
                height: 27px;
            }
        }

        @media(max-width: 520px) {
            .treatment-grid {
                grid-template-columns: 1fr;
            }

            .hero h1 {
                font-size: 37px;
            }

            .step-line {
                width: 10px;
            }

            .step {
                flex-direction: column;
                font-size: 8px;
            }

            .booking-container {
                padding: 0 15px 50px;
            }

            .form-card {
                padding: 20px;
            }

            .time-grid {
                grid-template-columns: repeat(3, 1fr);
            }
        }
    </style>
</head>

<body>

<header class="navbar">
    <div class="logo">SERALYN</div>
    <a href="{{ url('/') }}" class="nav-back">
        <i class="fa-solid fa-arrow-left"></i> Back to Home
    </a>
</header>

<section class="hero">
    <span>YOUR MOMENT OF SERENITY</span>
    <h1>Reserve Your Experience</h1>
    <p>Choose your preferred treatments and create your own moment of relaxation.</p>
</section>

<main class="booking-container">

    <div class="steps">
        <div class="step active" data-step="1">
            <div class="step-number">01</div>
            <span>Treatment</span>
        </div>
        <div class="step-line"></div>
        <div class="step" data-step="2">
            <div class="step-number">02</div>
            <span>Date</span>
        </div>
        <div class="step-line"></div>
        <div class="step" data-step="3">
            <div class="step-number">03</div>
            <span>Schedule</span>
        </div>
        <div class="step-line"></div>
        <div class="step" data-step="4">
            <div class="step-number">04</div>
            <span>Details</span>
        </div>
    </div>

    <section class="step-content active" id="step1">

        <div class="section-heading">
            <span>01 / SELECT YOUR TREATMENT</span>
            <h2>Discover Your Ritual</h2>
            <p>Select one or more treatments to create your preferred spa experience.</p>
        </div>

        <div id="treatmentCollections"></div>

        <div class="selection-summary">
            <h3>Your Selected Treatments</h3>
            <div id="selectedTreatments">
                <p class="empty-message">You haven't selected any treatment yet.</p>
            </div>
            <div class="summary-row">
                <span>Total Duration</span>
                <strong id="selectedDuration">0 minutes</strong>
            </div>
            <div class="summary-row">
                <span>Treatment Subtotal</span>
                <strong id="selectedPrice">Rp0</strong>
            </div>
        </div>

        <div class="button-group">
            <span></span>
            <button class="btn btn-primary" onclick="goToDate()">
                CONTINUE <i class="fa-solid fa-arrow-right"></i>
            </button>
        </div>

    </section>

    <section class="step-content" id="step2">

        <div class="section-heading">
            <span>02 / SELECT YOUR DATE</span>
            <h2>Choose Your Day</h2>
            <p>Select your preferred reservation date.</p>
        </div>

        <div class="date-wrapper">
            <label for="reservationDate">Reservation Date</label>
            <input type="date" id="reservationDate">
            <p class="availability-note">
                Available appointment times will be displayed in the next step based on your selected treatments and their total duration.
            </p>
        </div>

        <div class="button-group">
            <button class="btn btn-secondary" onclick="showStep(1)">
                <i class="fa-solid fa-arrow-left"></i> BACK
            </button>
            <button class="btn btn-primary" onclick="goToSchedule()">
                CONTINUE <i class="fa-solid fa-arrow-right"></i>
            </button>
        </div>

    </section>

    <section class="step-content" id="step3">

        <div class="section-heading">
            <span>03 / YOUR APPOINTMENT</span>
            <h2>Complete Your Experience</h2>
            <p>Choose your preferred time, therapist, additional duration, and room.</p>
        </div>

        <div class="booking-grid">

            <div class="booking-panel">
                <h3>Available Time</h3>
                <p id="scheduleInformation">Select your preferred starting time.</p>
                <div class="time-grid" id="timeSlots"></div>
            </div>

            <div class="booking-panel">
                <h3>Choose Your Therapist</h3>
                <p>Select one therapist for your entire treatment session.</p>
                <div class="option-list" id="therapistList"></div>
            </div>

        </div>

        <div class="booking-panel">
            <h3>Additional Time</h3>
            <p>Extend your relaxation experience with additional time.</p>

            <div class="option-list" id="extraTimeOptions"></div>
        </div>

        <div class="booking-panel">
            <h3>Choose Your Room</h3>
            <p>Select your preferred private treatment room.</p>

            <div class="room-type">
                <button type="button" class="selected" id="serenityType" onclick="selectRoomType('serenity')">
                    Serenity Room
                    <br>Rp45.000
                </button>
                <button type="button" id="harmonyType" onclick="selectRoomType('harmony')">
                    Harmony Room
                    <br>Rp60.000
                </button>
            </div>

            <div class="option-list" id="roomList"></div>
        </div>

        <div class="total-box">
            <h3>Booking Summary</h3>
            <div id="scheduleSummary"></div>
            <div class="total-price" id="scheduleTotal">Rp0</div>
        </div>

        <div class="button-group">
            <button class="btn btn-secondary" onclick="showStep(2)">
                <i class="fa-solid fa-arrow-left"></i> BACK
            </button>
            <button class="btn btn-primary" onclick="goToDetails()">
                CONTINUE <i class="fa-solid fa-arrow-right"></i>
            </button>
        </div>

    </section>

    <section class="step-content" id="step4">

        <div class="section-heading">
            <span>04 / CUSTOMER INFORMATION</span>
            <h2>Almost There</h2>
            <p>Please complete your information to proceed with your reservation.</p>
        </div>

        <form id="customerForm">

            <div class="form-card">
                <h3>Personal Information</h3>

                <div class="field-group">
                    <label for="customerName">Full Name *</label>
                    <input type="text" id="customerName" placeholder="Enter your full name" required>
                </div>

                <div class="field-group">
                    <label for="customerPhone">Phone Number *</label>
                    <input type="tel" id="customerPhone" placeholder="Example: 081234567890" required>
                </div>

                <div class="field-group">
                    <label for="customerEmail">Email Address</label>
                    <input type="email" id="customerEmail" placeholder="Enter your email address">
                </div>

                <div class="field-group">
                    <label for="customerAddress">Address</label>
                    <textarea id="customerAddress" rows="3" placeholder="Enter your address"></textarea>
                </div>

                <div class="field-group">
                    <label for="customerNotes">Special Requests</label>
                    <textarea id="customerNotes" rows="3" placeholder="Any preferences or special requests?"></textarea>
                </div>
            </div>

            <div class="form-card">
                <h3>Final Reservation Summary</h3>
                <div id="finalSummary"></div>
                <div class="total-box">
                    <span>Total Reservation Cost</span>
                    <div class="total-price" id="finalTotal">Rp0</div>
                </div>

                <label class="policy">
                    <input type="checkbox" id="agreePolicy" required>
                    <span>I confirm that the information provided is correct and agree to the reservation terms and conditions.</span>
                </label>
            </div>

            <div class="button-group">
                <button type="button" class="btn btn-secondary" onclick="showStep(3)">
                    <i class="fa-solid fa-arrow-left"></i> BACK
                </button>
                <button type="submit" class="btn btn-primary">
                    CONFIRM RESERVATION <i class="fa-solid fa-check"></i>
                </button>
            </div>

        </form>

    </section>

</main>

<footer class="footer">
    SERALYN SPA & WELLNESS EXPERIENCE
</footer>

<script>
    const collections = [
        {
            name: "Serenity Massage Collection",
            number: "COLLECTION 01",
            treatments: [
                {
                    name: "Serenity Head & Shoulder Escape",
                    duration: 60,
                    price: 300000,
                    image: "serenity head&shoulder.jpg",
                    description: "A calming head, neck, and shoulder ritual designed to release everyday tension."
                },
                {
                    name: "Foot Harmony Reflexology",
                    duration: 60,
                    price: 260000,
                    image: "foot harmony reflexology.jpg",
                    description: "A soothing foot reflexology experience created to ease tired feet."
                },
                {
                    name: "Lavender Dream Hand Ritual",
                    duration: 60,
                    price: 260000,
                    image: "Lavender Dream Hand Ritual.jpg",
                    description: "A delicate hand ritual combining exfoliation, massage, hydration, and lavender aromatherapy."
                },
                {
                    name: "Golden Jasmine Relaxation",
                    duration: 40,
                    price: 330000,
                    image: "Golden Jasmine Relaxation.jpg",
                    description: "A full-body relaxation ritual infused with jasmine aromatherapy."
                },
                {
                    name: "Warm Candle Therapy",
                    duration: 60,
                    price: 420000,
                    image: "warm candle.jpg",
                    description: "A warm candle massage ritual designed to create a deeply soothing experience."
                },
                {
                    name: "Refreshing Herbal Compress",
                    duration: 60,
                    price: 380000,
                    image: "refreshing herbal compress.jpg",
                    description: "A soothing herbal compress and massage ritual for body relaxation."
                },
                {
                    name: "Volcanic Hot Stone Escape",
                    duration: 60,
                    price: 480000,
                    image: "Volcanic Hot Stone Escape.jpg",
                    description: "Heated volcanic stones meet relaxing massage techniques."
                },
                {
                    name: "Royal Bamboo Harmony Massage",
                    duration: 75,
                    price: 550000,
                    image: "Royal Bamboo Harmony Massage.jpg",
                    description: "Warm bamboo rolling techniques meet full-body massage."
                }
            ]
        },
        {
            name: "Luxury Facial & Beauty Therapy",
            number: "COLLECTION 02",
            treatments: [
                {
                    name: "Diamond Glow Facial",
                    duration: 80,
                    price: 650000,
                    image: "Diamond Glow Facial.jpg",
                    description: "A premium facial ritual combining cleansing, exfoliation, serum infusion, and a brightening mask."
                },
                {
                    name: "Ultimate Collagen Lift Therapy",
                    duration: 80,
                    price: 720000,
                    image: "Ultimate Collagen Lift Therapy.jpg",
                    description: "A collagen-focused facial ritual designed around hydration and nourishment."
                },
                {
                    name: "Platinum Youth Infusion",
                    duration: 60,
                    price: 780000,
                    image: "Platinum Youth Infusion.jpg",
                    description: "An exclusive hydration ritual with premium active ingredients."
                }
            ]
        },
        {
            name: "Body Ritual Collection",
            number: "COLLECTION 03",
            treatments: [
                {
                    name: "Royal Coconut Body Polish",
                    duration: 60,
                    price: 490000,
                    image: "Royal Coconut Body Polish.jpg",
                    description: "A coconut-based body polish designed to gently exfoliate and nourish the skin."
                },
                {
                    name: "Tropical Sea Salt Body Scrub",
                    duration: 60,
                    price: 520000,
                    image: "Tropical Sea Salt Body Scrub.jpg",
                    description: "A mineral-rich sea salt exfoliation ritual for a refreshed experience."
                },
                {
                    name: "Golden Clay Purifying Body Mask",
                    duration: 75,
                    price: 620000,
                    image: "Golden Clay Purifying Body Mask.jpg",
                    description: "A mineral clay body ritual combining cleansing, wrapping, and hydration."
                },
                {
                    name: "Royal Milk Body Wrap Ceremony",
                    duration: 150,
                    price: 1250000,
                    image: "Royal Milk Body Wrap Ceremony.jpg",
                    description: "A complete premium spa ceremony combining massage, exfoliation, and a milk bath."
                }
            ]
        },
        {
            name: "Premium International Treatments",
            number: "COLLECTION 04",
            treatments: [
                {
                    name: "Sakura Head Spa Ritual",
                    duration: 150,
                    price: 1650000,
                    image: "Japanese Sakura Healing Ritual.jpg",
                    description: "A Japanese-inspired ritual combining head spa therapy, body massage, and scalp care."
                },
                {
                    name: "Ginseng Scalp Rejuvenation",
                    duration: 150,
                    price: 1750000,
                    image: "Korean Ginseng Scalp Rejuvenation.jpg",
                    description: "A Korean-inspired scalp and relaxation ritual featuring ginseng and scalp care."
                },
                {
                    name: "Royal Harmony Massage",
                    duration: 150,
                    price: 1850000,
                    image: "Thai Harmony Massage.jpg",
                    description: "A Thai-inspired wellness journey combining massage and assisted stretching."
                }
            ]
        }
    ];

    const therapists = [
        "Alya",
        "Keisha",
        "Nadine",
        "Sabrina",
        "Clarissa",
        "Maya"
    ];

    const state = {
        selected: [],
        date: "",
        time: "",
        therapist: "",
        extra: 0,
        roomType: "serenity",
        room: ""
    };

    const extraOptions = [
        { minutes: 0, price: 0, label: "No Additional Time" },
        { minutes: 10, price: 20000, label: "10 Minutes" },
        { minutes: 20, price: 40000, label: "20 Minutes" },
        { minutes: 30, price: 60000, label: "30 Minutes" },
        { minutes: 40, price: 80000, label: "40 Minutes" },
        { minutes: 50, price: 100000, label: "50 Minutes" },
        { minutes: 60, price: 120000, label: "60 Minutes" }
    ];

    const rooms = {
        serenity: {
            name: "Serenity Room",
            price: 45000,
            count: 7
        },
        harmony: {
            name: "Harmony Room",
            price: 60000,
            count: 5
        }
    };

    function formatPrice(price) {
        return "Rp" + Number(price).toLocaleString("id-ID");
    }

    function getDuration() {
        return state.selected.reduce((total, item) => total + item.duration, 0);
    }

    function getTreatmentPrice() {
        return state.selected.reduce((total, item) => total + item.price, 0);
    }

    function getTotalDuration() {
        return getDuration() + state.extra;
    }

    function getRoomPrice() {
        return rooms[state.roomType].price;
    }

    function getTotalPrice() {
        return getTreatmentPrice() + (state.extra / 10 * 20000) + getRoomPrice();
    }

    function renderTreatments() {
        const container = document.getElementById("treatmentCollections");

        container.innerHTML = collections.map((collection, collectionIndex) => `
            <div class="collection">
                <div class="collection-heading">
                    <div>
                        <span>${collection.number}</span>
                        <h3>${collection.name}</h3>
                    </div>
                </div>

                <div class="treatment-grid">
                    ${collection.treatments.map((item, itemIndex) => {
                        const id = `${collectionIndex}-${itemIndex}`;
                        const selected = state.selected.some(t => t.id === id);

                        return `
                            <article class="treatment-card ${selected ? 'selected' : ''}">
                                <img src="{{ asset('assets/img') }}/${item.image}" alt="${item.name}" onerror="this.style.display='none'">
                                <div class="treatment-info">
                                    <span class="category-label">${collection.number}</span>
                                    <h4>${item.name}</h4>
                                    <p>${item.description}</p>
                                    <div class="treatment-meta">
                                        <span><i class="fa-regular fa-clock"></i> ${item.duration} Minutes</span>
                                        <strong>${formatPrice(item.price)}</strong>
                                    </div>
                                    <button type="button" class="select-treatment" onclick="toggleTreatment('${id}', ${collectionIndex}, ${itemIndex})">
                                        ${selected ? '✓ SELECTED' : '+ SELECT TREATMENT'}
                                    </button>
                                </div>
                            </article>
                        `;
                    }).join("")}
                </div>
            </div>
        `).join("");

        renderSelectedTreatments();
    }

    function toggleTreatment(id, collectionIndex, itemIndex) {
        const existing = state.selected.findIndex(item => item.id === id);

        if (existing >= 0) {
            state.selected.splice(existing, 1);
        } else {
            const item = collections[collectionIndex].treatments[itemIndex];
            state.selected.push({
                id,
                ...item
            });
        }

        renderTreatments();
    }

    function renderSelectedTreatments() {
        const container = document.getElementById("selectedTreatments");

        if (state.selected.length === 0) {
            container.innerHTML = '<p class="empty-message">You haven\'t selected any treatment yet.</p>';
        } else {
            container.innerHTML = state.selected.map(item => `
                <div class="summary-row">
                    <span>${item.name} (${item.duration} min)</span>
                    <strong>${formatPrice(item.price)}</strong>
                </div>
            `).join("");
        }

        document.getElementById("selectedDuration").textContent = getDuration() + " minutes";
        document.getElementById("selectedPrice").textContent = formatPrice(getTreatmentPrice());
    }

    function showStep(step) {
        document.querySelectorAll(".step-content").forEach(section => {
            section.classList.remove("active");
        });

        document.querySelectorAll(".step").forEach(item => {
            const number = Number(item.dataset.step);
            item.classList.toggle("active", number === step);
            item.classList.toggle("completed", number < step);
        });

        document.getElementById("step" + step).classList.add("active");

        window.scrollTo({
            top: 0,
            behavior: "smooth"
        });
    }

    function goToDate() {
        if (state.selected.length === 0) {
            alert("Please select at least one treatment.");
            return;
        }

        showStep(2);
    }

    function goToSchedule() {
        const date = document.getElementById("reservationDate").value;

        if (!date) {
            alert("Please select your reservation date.");
            return;
        }

        const selectedDate = new Date(date + "T00:00:00");
        const today = new Date();
        today.setHours(0, 0, 0, 0);

        if (selectedDate < today) {
            alert("Please select a valid reservation date.");
            return;
        }

        state.date = date;
        state.time = "";
        state.therapist = "";
        state.room = "";

        renderSchedule();
        showStep(3);
    }

    function renderSchedule() {
        const duration = getDuration();

        document.getElementById("scheduleInformation").textContent =
            `Total treatment duration: ${duration} minutes. Operating hours: 09:00–21:00.`;

        renderTimeSlots();
        renderTherapists();
        renderExtraTime();
        renderRooms();
        renderScheduleSummary();
    }

    function renderTimeSlots() {
        const container = document.getElementById("timeSlots");
        const totalDuration = getTotalDuration();
        const opening = 9 * 60;
        const closing = 21 * 60;
        const slots = [];

        for (let minute = opening; minute + totalDuration <= closing; minute += 30) {
            const hours = String(Math.floor(minute / 60)).padStart(2, "0");
            const minutes = String(minute % 60).padStart(2, "0");
            const time = `${hours}:${minutes}`;

            slots.push(`
                <button type="button" class="option-btn ${state.time === time ? 'selected' : ''}" onclick="selectTime('${time}')">
                    ${time}
                </button>
            `);
        }

        container.innerHTML = slots.length
            ? slots.join("")
            : '<p class="empty-message">No suitable time available.</p>';
    }

    function selectTime(time) {
        state.time = time;
        renderTimeSlots();
        renderScheduleSummary();
    }

    function renderTherapists() {
        const container = document.getElementById("therapistList");

        container.innerHTML = therapists.map((name, index) => `
            <button type="button" class="option-card ${state.therapist === name ? 'selected' : ''}" onclick="selectTherapist('${name}')">
                <strong><i class="fa-solid fa-user"></i> ${name}</strong>
                <span>Therapist ${String(index + 1).padStart(2, "0")}</span>
            </button>
        `).join("");
    }

    function selectTherapist(name) {
        state.therapist = name;
        renderTherapists();
        renderScheduleSummary();
    }

    function renderExtraTime() {
        const container = document.getElementById("extraTimeOptions");

        container.innerHTML = extraOptions.map(item => `
            <button type="button" class="option-card ${state.extra === item.minutes ? 'selected' : ''}" onclick="selectExtraTime(${item.minutes})">
                <strong>${item.label}</strong>
                <span>${formatPrice(item.price)}</span>
            </button>
        `).join("");
    }

    function selectExtraTime(minutes) {
        state.extra = minutes;
        state.time = "";
        renderExtraTime();
        renderTimeSlots();
        renderScheduleSummary();
    }

    function selectRoomType(type) {
        state.roomType = type;
        state.room = "";

        document.getElementById("serenityType").classList.toggle("selected", type === "serenity");
        document.getElementById("harmonyType").classList.toggle("selected", type === "harmony");

        renderRooms();
        renderScheduleSummary();
    }

    function renderRooms() {
        const container = document.getElementById("roomList");
        const selectedRoom = rooms[state.roomType];

        container.innerHTML = Array.from({ length: selectedRoom.count }, (_, index) => {
            const roomName = `${selectedRoom.name} ${index + 1}`;

            return `
                <button type="button" class="option-card ${state.room === roomName ? 'selected' : ''}" onclick="selectRoom('${roomName}')">
                    <strong>${roomName}</strong>
                    <span>${formatPrice(selectedRoom.price)}</span>
                </button>
            `;
        }).join("");
    }

    function selectRoom(name) {
        state.room = name;
        renderRooms();
        renderScheduleSummary();
    }

    function getEndTime() {
        if (!state.time) return "-";

        const [hours, minutes] = state.time.split(":").map(Number);
        const end = hours * 60 + minutes + getTotalDuration();

        return `${String(Math.floor(end / 60)).padStart(2, "0")}:${String(end % 60).padStart(2, "0")}`;
    }

    function renderScheduleSummary() {
        const container = document.getElementById("scheduleSummary");

        container.innerHTML = `
            <div class="summary-row">
                <span>Date</span>
                <strong>${state.date}</strong>
            </div>
            <div class="summary-row">
                <span>Starting Time</span>
                <strong>${state.time || 'Not selected'}</strong>
            </div>
            <div class="summary-row">
                <span>Estimated End Time</span>
                <strong>${getEndTime()}</strong>
            </div>
            <div class="summary-row">
                <span>Total Duration</span>
                <strong>${getTotalDuration()} minutes</strong>
            </div>
            <div class="summary-row">
                <span>Therapist</span>
                <strong>${state.therapist || 'Not selected'}</strong>
            </div>
            <div class="summary-row">
                <span>Room</span>
                <strong>${state.room || 'Not selected'}</strong>
            </div>
            <div class="summary-row">
                <span>Treatment Subtotal</span>
                <strong>${formatPrice(getTreatmentPrice())}</strong>
            </div>
            <div class="summary-row">
                <span>Additional Time</span>
                <strong>${formatPrice(state.extra / 10 * 20000)}</strong>
            </div>
            <div class="summary-row">
                <span>Room Fee</span>
                <strong>${formatPrice(getRoomPrice())}</strong>
            </div>
        `;

        document.getElementById("scheduleTotal").textContent = formatPrice(getTotalPrice());
    }

    function goToDetails() {
        if (!state.time) {
            alert("Please select your appointment time.");
            return;
        }

        if (!state.therapist) {
            alert("Please select your therapist.");
            return;
        }

        if (!state.room) {
            alert("Please select your treatment room.");
            return;
        }

        renderFinalSummary();
        showStep(4);
    }

    function renderFinalSummary() {
        const container = document.getElementById("finalSummary");

        container.innerHTML = `
            <div class="summary-row">
                <span>Treatments</span>
                <strong>${state.selected.length} Selected</strong>
            </div>
            ${state.selected.map(item => `
                <div class="summary-row">
                    <span>${item.name}</span>
                    <strong>${formatPrice(item.price)}</strong>
                </div>
            `).join("")}
            <div class="summary-row">
                <span>Date</span>
                <strong>${state.date}</strong>
            </div>
            <div class="summary-row">
                <span>Appointment</span>
                <strong>${state.time} - ${getEndTime()}</strong>
            </div>
            <div class="summary-row">
                <span>Therapist</span>
                <strong>${state.therapist}</strong>
            </div>
            <div class="summary-row">
                <span>Room</span>
                <strong>${state.room}</strong>
            </div>
            <div class="summary-row">
                <span>Additional Time</span>
                <strong>${state.extra} minutes</strong>
            </div>
            <div class="summary-row">
                <span>Room Fee</span>
                <strong>${formatPrice(getRoomPrice())}</strong>
            </div>
        `;

        document.getElementById("finalTotal").textContent = formatPrice(getTotalPrice());
    }

    document.getElementById("customerForm").addEventListener("submit", function(event) {
        event.preventDefault();

        if (!this.reportValidity()) return;

        alert(
            "Reservation form completed!\n\n" +
            "Name: " + document.getElementById("customerName").value +
            "\nDate: " + state.date +
            "\nTime: " + state.time +
            "\nTotal: " + formatPrice(getTotalPrice()) +
            "\n\nThis is a frontend prototype. Your reservation has not been saved to the database yet."
        );
    });

    const today = new Date();
    const localToday = new Date(today.getTime() - today.getTimezoneOffset() * 60000)
        .toISOString().split("T")[0];

    document.getElementById("reservationDate").min = localToday;

    renderTreatments();
</script>

</body>
</html>