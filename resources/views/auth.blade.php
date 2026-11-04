
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account | Seralyn</title>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Playfair+Display:wght@400;500;600&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'DM Sans', sans-serif;
            background: #f5f2ed;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 35px 20px;
            color: #40382f;
        }

        .auth-container {
            width: 100%;
            max-width: 1050px;
            min-height: 650px;
            display: grid;
            grid-template-columns: 1fr 1fr;
            background: #fff;
            border-radius: 18px;
            overflow: hidden;
            box-shadow: 0 15px 55px rgba(68, 54, 39, 0.09);
        }

        .auth-image {
            position: relative;
            background:
                linear-gradient(rgba(47, 43, 35, 0.25), rgba(47, 43, 35, 0.55)),
                url('/assets/img/towl.jpg') center/cover;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            padding: 45px;
            color: #fff;
        }

        .back-home {
            position: absolute;
            top: 10px;
            left: 10px;
            display: inline-flex;
            align-items: center;
            gap: 9px;
            padding: 10px 17px;
            color: #fff;
            text-decoration: none;
            background: rgba(100, 67, 46, 0.53);
            border: 1px solid rgba(255, 255, 255, 0.35);
            border-radius: 30px;
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            transition: 0.3s ease;
            z-index: 5;
        }

        .back-home:hover {
            background: rgba(255, 255, 255, 0.28);
            transform: translateX(-3px);
        }

        .brand {
            font-family: 'Playfair Display', serif;
            font-size: 35px;
            letter-spacing: 3px;
            padding-top: 10px;
        }

        .brand-subtitle {
            font-size: 10px;
            letter-spacing: 4px;
            margin-top: 5px;
        }

        .image-content h2 {
            font-family: 'Playfair Display', serif;
            font-size: 38px;
            font-weight: 400;
            line-height: 1.3;
            margin-bottom: 15px;
        }

        .image-content p {
            font-size: 13px;
            line-height: 1.9;
            color: #eee9e1;
            max-width: 330px;
        }

        .image-footer {
            font-size: 10px;
            letter-spacing: 2px;
            color: #e5dfd5;
        }

        .auth-form-container {
            padding: 55px 65px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .form-content {
            width: 100%;
            max-width: 370px;
            margin: auto;
        }

        .form-heading {
            margin-bottom: 30px;
        }

        .form-heading span {
            color: #9a826a;
            font-size: 10px;
            letter-spacing: 3px;
            font-weight: 600;
        }

        .form-heading h1 {
            font-family: 'Playfair Display', serif;
            font-size: 35px;
            font-weight: 500;
            margin: 12px 0;
            color: #40382f;
        }

        .form-heading p {
            color: #92877b;
            font-size: 12px;
            line-height: 1.7;
        }

        .form-group {
            margin-bottom: 17px;
        }

        .form-group label {
            display: block;
            font-size: 11px;
            font-weight: 600;
            margin-bottom: 8px;
            color: #51473c;
        }

        .form-group input {
            width: 100%;
            height: 47px;
            border: 1px solid #e5ded5;
            border-radius: 5px;
            padding: 0 14px;
            font-family: 'DM Sans', sans-serif;
            font-size: 12px;
            color: #40382f;
            outline: none;
            background: #fff;
            transition: 0.3s;
        }

        .form-group input:focus {
            border-color: #a38b72;
            box-shadow: 0 0 0 3px rgba(163, 139, 114, 0.08);
        }

        .form-group input::placeholder {
            color: #b9b0a6;
        }

        .form-options {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin: 4px 0 22px;
            font-size: 10px;
            color: #82786d;
        }

        .remember {
            display: flex;
            align-items: center;
            gap: 7px;
        }

        .remember input {
            accent-color: #88745f;
        }

        .form-options a,
        .terms a {
            color: #947b61;
            text-decoration: none;
        }

        .submit-btn {
            width: 100%;
            height: 48px;
            background: #776754;
            border: none;
            border-radius: 5px;
            color: #fff;
            font-family: 'DM Sans', sans-serif;
            font-size: 11px;
            font-weight: 600;
            letter-spacing: 2px;
            cursor: pointer;
            transition: 0.3s;
        }

        .submit-btn:hover {
            background: #5e5040;
        }

        .terms {
            display: flex;
            align-items: flex-start;
            gap: 8px;
            font-size: 10px;
            color: #91877d;
            line-height: 1.7;
            margin: 5px 0 22px;
        }

        .terms input {
            margin-top: 3px;
            accent-color: #88745f;
        }

        .switch-text {
            text-align: center;
            font-size: 11px;
            color: #94897e;
            margin-top: 25px;
        }

        .switch-text button {
            border: none;
            background: none;
            color: #806b55;
            font-family: inherit;
            font-weight: 700;
            cursor: pointer;
            margin-left: 4px;
        }

        .switch-text button:hover {
            text-decoration: underline;
        }

        .auth-form {
            display: none;
        }

        .auth-form.active {
            display: block;
            animation: appear 0.35s ease;
        }

        @keyframes appear {
            from {
                opacity: 0;
                transform: translateY(8px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @media (max-width: 800px) {
            .auth-container {
                grid-template-columns: 1fr;
                max-width: 480px;
            }

            .auth-image {
                min-height: 230px;
                padding: 75px 30px 25px;
            }

            .back-home {
                top: 18px;
                left: 20px;
                font-size: 11px;
                padding: 9px 14px;
            }

            .brand {
                font-size: 27px;
            }

            .image-content h2 {
                font-size: 27px;
            }

            .image-content p,
            .image-footer {
                display: none;
            }

            .auth-form-container {
                padding: 40px 30px;
            }
        }

        @media (max-width: 400px) {
            body {
                padding: 20px 12px;
            }

            .auth-form-container {
                padding: 35px 22px;
            }

            .form-heading h1 {
                font-size: 30px;
            }

            .auth-image {
                min-height: 210px;
            }
        }
    </style>
</head>

<body>

    <div class="auth-container">

        <div class="auth-image">

            <a href="{{ url('/') }}" class="back-home">
                <span>⮜</span>
            </a>

            <div>
                <div class="brand">SERALYN</div>
                <div class="brand-subtitle">SERENITY IN TIMELINE</div>
            </div>

            <div class="image-content">
                <h2>A Moment of Peace, Just for You.</h2>
                <p>
                    Discover a place where relaxation meets comfort.
                    Take a moment to reconnect with yourself and
                    experience the care you deserve.
                </p>
            </div>

            <div class="image-footer">
                RELAX · RESTORE · RECONNECT
            </div>

        </div>

        <div class="auth-form-container">

            <div class="form-content">

                <form id="signupForm" class="auth-form active">

                    <div class="form-heading">
                        <span>JOIN OUR COMMUNITY</span>
                        <h1>Create Account</h1>
                        <p>Create your Seralyn account and start your wellness journey with us.</p>
                    </div>

                    <div class="form-group">
                        <label for="signupName">Full Name</label>
                        <input type="text" id="signupName" name="nama" placeholder="Enter your full name" required>
                    </div>

                    <div class="form-group">
                        <label for="signupEmail">Email Address</label>
                        <input type="email" id="signupEmail" name="email" placeholder="Enter your email address" required>
                    </div>

                    <div class="form-group">
                        <label for="signupPhone">Phone Number</label>
                        <input type="tel" id="signupPhone" name="no_telepon" placeholder="Enter your phone number" required>
                    </div>

                    <div class="form-group">
                        <label for="signupPassword">Password</label>
                        <input type="password" id="signupPassword" name="password" placeholder="Create your password" minlength="8" required>
                    </div>

                    <div class="form-group">
                        <label for="confirmPassword">Confirm Password</label>
                        <input type="password" id="confirmPassword" name="password_confirmation" placeholder="Confirm your password" minlength="8" required>
                    </div>

                    <div class="terms">
                        <input type="checkbox" id="agreeTerms" required>
                        <label for="agreeTerms">I agree to the Terms of Service and Privacy Policy.</label>
                    </div>

                    <button type="submit" class="submit-btn">CREATE ACCOUNT</button>

                    <div class="switch-text">
                        Already have an account?
                        <button type="button" onclick="showLogin()">Log In</button>
                    </div>

                </form>

                <form id="loginForm" class="auth-form">

                    <div class="form-heading">
                        <span>WELCOME BACK</span>
                        <h1>Welcome Back</h1>
                        <p>Log in to your account and continue your wellness journey.</p>
                    </div>

                    <div class="form-group">
                        <label for="loginEmail">Email Address</label>
                        <input type="email" id="loginEmail" name="email" placeholder="Enter your email address" required>
                    </div>

                    <div class="form-group">
                        <label for="loginPassword">Password</label>
                        <input type="password" id="loginPassword" name="password" placeholder="Enter your password" required>
                    </div>

                    <div class="form-options">
                        <label class="remember">
                            <input type="checkbox" name="remember">
                            Remember me
                        </label>
                        <a href="#">Forgot Password?</a>
                    </div>

                    <button type="submit" class="submit-btn">LOG IN</button>

                    <div class="switch-text">
                        Don't have an account?
                        <button type="button" onclick="showSignup()">Sign Up</button>
                    </div>

                </form>

            </div>

        </div>

    </div>

    <script>
        const signupForm = document.getElementById('signupForm');
        const loginForm = document.getElementById('loginForm');

        function showLogin() {
            signupForm.classList.remove('active');
            loginForm.classList.add('active');
        }

        function showSignup() {
            loginForm.classList.remove('active');
            signupForm.classList.add('active');
        }

        signupForm.addEventListener('submit', function(event) {
            event.preventDefault();
        });

        loginForm.addEventListener('submit', function(event) {
            event.preventDefault();
        });
    </script>

</body>
</html>
