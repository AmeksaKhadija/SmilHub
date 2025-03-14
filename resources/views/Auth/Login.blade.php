<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion - SmileHub</title>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        :root {
            --primary: #0369a1;
            --primary-light: #0ea5e9;
            --primary-dark: #075985;
            --secondary: #14b8a6;
            --secondary-light: #5eead4;
            --secondary-dark: #0f766e;
            --accent: #f97316;
            --accent-light: #fb923c;
            --accent-dark: #c2410c;
            --text-dark: #1e293b;
            --text-light: #64748b;
            --text-lighter: #94a3b8;
            --white: #ffffff;
            --off-white: #f8fafc;
            --light-gray: #f1f5f9;
            --gray: #e2e8f0;
            --dark-gray: #cbd5e1;
            --shadow-sm: 0 1px 2px rgba(0, 0, 0, 0.05);
            --shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            --shadow-md: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
            --shadow-lg: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            color: var(--text-dark);
            line-height: 1.6;
            background: linear-gradient(135deg, var(--primary-light) 0%, var(--secondary-light) 100%);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        a {
            text-decoration: none;
            color: inherit;
            transition: all 0.3s ease;
        }

        .container {
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        .btn {
            display: inline-block;
            padding: 12px 24px;
            border-radius: 8px;
            font-weight: 500;
            text-align: center;
            cursor: pointer;
            transition: all 0.3s ease;
            border: none;
            font-family: 'Poppins', sans-serif;
            font-size: 1rem;
        }

        .btn-primary {
            background-color: var(--primary);
            color: var(--white);
        }

        .btn-primary:hover {
            background-color: var(--primary-dark);
            transform: translateY(-3px);
            box-shadow: var(--shadow-md);
        }

        .btn-social {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            width: 100%;
            padding: 12px;
            border-radius: 8px;
            background-color: var(--white);
            color: var(--text-dark);
            border: 1px solid var(--gray);
            transition: all 0.3s ease;
        }

        .btn-social:hover {
            background-color: var(--light-gray);
            transform: translateY(-2px);
            box-shadow: var(--shadow);
        }

        .btn-social i {
            font-size: 1.2rem;
        }

        .btn-google i {
            color: #DB4437;
        }

        .btn-facebook i {
            color: #4267B2;
        }

        /* Header Styles */
        .header {
            background-color: transparent;
            padding: 20px 0;
        }

        .header-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .logo-text {
            font-size: 1.8rem;
            font-weight: 700;
            color: var(--white);
        }

        .back-link {
            display: flex;
            align-items: center;
            gap: 8px;
            color: var(--white);
            font-weight: 500;
            transition: all 0.3s ease;
            padding: 8px 16px;
            border-radius: 50px;
            background-color: rgba(255, 255, 255, 0.2);
        }

        .back-link:hover {
            background-color: rgba(255, 255, 255, 0.3);
            transform: translateX(-5px);
        }

        /* Auth Section */
        .auth-section {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 40px 0;
        }

        .auth-card {
            background-color: var(--white);
            border-radius: 16px;
            box-shadow: var(--shadow-lg);
            overflow: hidden;
            width: 100%;
            max-width: 900px;
            margin: 0 auto;
            display: flex;
            position: relative;
        }

        .auth-sidebar {
            width: 40%;
            background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%);
            padding: 40px;
            color: var(--white);
            display: flex;
            flex-direction: column;
            justify-content: center;
            position: relative;
            overflow: hidden;
        }

        .auth-sidebar::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(255, 255, 255, 0.1) 0%, transparent 60%);
            z-index: 0;
        }

        .auth-sidebar-content {
            position: relative;
            z-index: 1;
        }

        .auth-sidebar-title {
            font-size: 2rem;
            font-weight: 700;
            margin-bottom: 20px;
        }

        .auth-sidebar-text {
            margin-bottom: 30px;
            opacity: 0.9;
        }

        .auth-sidebar-features {
            margin-top: 40px;
        }

        .auth-sidebar-feature {
            display: flex;
            align-items: center;
            gap: 15px;
            margin-bottom: 20px;
        }

        .auth-sidebar-feature-icon {
            width: 36px;
            height: 36px;
            background-color: rgba(255, 255, 255, 0.2);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        .auth-sidebar-feature-text {
            font-size: 0.95rem;
        }

        .auth-content {
            width: 60%;
            padding: 40px;
        }

        .auth-form-title {
            font-size: 1.8rem;
            font-weight: 700;
            color: var(--text-dark);
            margin-bottom: 10px;
        }

        .auth-form-subtitle {
            color: var(--text-light);
            margin-bottom: 30px;
        }

        .form-group {
            margin-bottom: 20px;
            position: relative;
        }

        .form-label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
            color: var(--text-dark);
        }

        .form-control {
            width: 100%;
            padding: 14px 16px;
            border: 1px solid var(--gray);
            border-radius: 8px;
            font-family: 'Poppins', sans-serif;
            font-size: 1rem;
            transition: all 0.3s ease;
            background-color: var(--light-gray);
        }

        .form-control:focus {
            outline: none;
            border-color: var(--primary);
            background-color: var(--white);
            box-shadow: 0 0 0 3px rgba(3, 105, 161, 0.1);
        }

        .form-icon {
            position: absolute;
            top: 42px;
            right: 16px;
            color: var(--text-light);
        }

        .form-check {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 25px;
        }

        .form-check-group {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .form-check-input {
            width: 18px;
            height: 18px;
            cursor: pointer;
        }

        .form-check-label {
            font-size: 0.9rem;
            color: var(--text-light);
            cursor: pointer;
        }

        .form-link {
            color: var(--primary);
            font-weight: 500;
            font-size: 0.9rem;
        }

        .form-link:hover {
            color: var(--primary-dark);
            text-decoration: underline;
        }

        .form-divider {
            display: flex;
            align-items: center;
            margin: 25px 0;
            color: var(--text-lighter);
        }

        .form-divider::before,
        .form-divider::after {
            content: '';
            flex: 1;
            height: 1px;
            background-color: var(--gray);
        }

        .form-divider span {
            padding: 0 15px;
            font-size: 0.9rem;
        }

        .social-buttons {
            display: flex;
            gap: 15px;
            margin-bottom: 25px;
        }

        .form-footer {
            margin-top: 25px;
            text-align: center;
            font-size: 0.9rem;
            color: var(--text-light);
        }

        /* Floating shapes */
        .shape {
            position: absolute;
            background-color: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
        }

        .shape-1 {
            width: 150px;
            height: 150px;
            top: -75px;
            right: -75px;
        }

        .shape-2 {
            width: 100px;
            height: 100px;
            bottom: 50px;
            left: -50px;
        }

        .shape-3 {
            width: 80px;
            height: 80px;
            bottom: -40px;
            right: 50px;
        }

        /* Animations */
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .auth-form {
            animation: fadeIn 0.5s ease;
        }

        /* Responsive Styles */
        @media (max-width: 992px) {
            .auth-card {
                flex-direction: column;
                max-width: 500px;
            }

            .auth-sidebar,
            .auth-content {
                width: 100%;
            }

            .auth-sidebar {
                padding: 30px;
            }

            .auth-sidebar-title {
                font-size: 1.8rem;
            }

            .auth-content {
                padding: 30px;
            }
        }

        @media (max-width: 576px) {
            .auth-section {
                padding: 20px 0;
            }

            .auth-sidebar,
            .auth-content {
                padding: 20px;
            }

            .auth-form-title {
                font-size: 1.5rem;
            }

            .social-buttons {
                flex-direction: column;
            }

            .header {
                padding: 15px 0;
            }

            .logo-text {
                font-size: 1.5rem;
            }
        }
    </style>
</head>

<body>
    <!-- Header -->
    <header class="header">
        <div class="container">
            <div class="header-content">
                <div class="logo">
                    <svg width="40" height="40" viewBox="0 0 50 50" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <!-- Fond circulaire -->
                        <circle cx="25" cy="25" r="24" fill="white" />

                        <!-- Dent stylisée -->
                        <path d="M25 10C21.5 10 19 12 18 14C17 16 16 18 15 22C14 26 13 30 15 33C17 36 19 37 21 37C23 37 24 35 25 33C26 35 27 37 29 37C31 37 33 36 35 33C37 30 36 26 35 22C34 18 33 16 32 14C31 12 28.5 10 25 10Z" fill="#0369a1" />

                        <!-- Sourire sous la dent -->
                        <path d="M18 28C20 31 23 33 25 33C27 33 30 31 32 28" stroke="#0369a1" stroke-width="2" stroke-linecap="round" />
                    </svg>
                    <span class="logo-text">SmileHub</span>
                </div>
                <a href="/" class="back-link">
                    <i class="fas fa-arrow-left"></i>
                    Retour à l'accueil
                </a>
            </div>
        </div>
    </header>

    <!-- Auth Section -->
    <section class="auth-section">
        <div class="container">
            <div class="auth-card">
                <div class="auth-sidebar">
                    <div class="shape shape-1"></div>
                    <div class="shape shape-2"></div>
                    <div class="shape shape-3"></div>

                    <div class="auth-sidebar-content">
                        <h2 class="auth-sidebar-title">Bon retour parmi nous!</h2>
                        <p class="auth-sidebar-text">Connectez-vous pour accéder à nos services dentaires de qualité.</p>

                        <div class="auth-sidebar-features">
                            <div class="auth-sidebar-feature">
                                <div class="auth-sidebar-feature-icon">
                                    <i class="fas fa-calendar-check"></i>
                                </div>
                                <p class="auth-sidebar-feature-text">Prenez rendez-vous en ligne facilement</p>
                            </div>
                            <div class="auth-sidebar-feature">
                                <div class="auth-sidebar-feature-icon">
                                    <i class="fas fa-history"></i>
                                </div>
                                <p class="auth-sidebar-feature-text">Accédez à votre historique de soins</p>
                            </div>
                            <div class="auth-sidebar-feature">
                                <div class="auth-sidebar-feature-icon">
                                    <i class="fas fa-bell"></i>
                                </div>
                                <p class="auth-sidebar-feature-text">Recevez des rappels pour vos rendez-vous</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="auth-content">
                    <div class="auth-form">
                        <h3 class="auth-form-title">Connexion</h3>
                        <p class="auth-form-subtitle">Connectez-vous pour accéder à votre compte</p>

                        <form id="login-form">
                            <div class="form-group">
                                <label for="login-email" class="form-label">Adresse email</label>
                                <input type="email" id="login-email" class="form-control" placeholder="exemple@email.com" required>
                                <i class="fas fa-envelope form-icon"></i>
                            </div>

                            <div class="form-group">
                                <label for="login-password" class="form-label">Mot de passe</label>
                                <input type="password" id="login-password" class="form-control" placeholder="••••••••" required>
                                <i class="fas fa-lock form-icon"></i>
                            </div>

                            <div class="form-check">
                                <div class="form-check-group">
                                    <input type="checkbox" id="remember-me" class="form-check-input">
                                    <label for="remember-me" class="form-check-label">Se souvenir de moi</label>
                                </div>
                                <a href="#" class="form-link">Mot de passe oublié?</a>
                            </div>

                            <button type="submit" class="btn btn-primary" style="width: 100%;">Se connecter</button>

                            <div class="form-divider">
                                <span>ou continuer avec</span>
                            </div>

                            <div class="social-buttons">
                                <button type="button" class="btn-social btn-google">
                                    <i class="fab fa-google"></i>
                                    Google
                                </button>
                                <button type="button" class="btn-social btn-facebook">
                                    <i class="fab fa-facebook-f"></i>
                                    Facebook
                                </button>
                            </div>

                            <div class="form-footer">
                                Vous n'avez pas de compte? <a href="Register" class="form-link">S'inscrire</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- JavaScript -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Form Validation
            const loginForm = document.getElementById('login-form');

            loginForm.addEventListener('submit', function(e) {
                e.preventDefault();
                // Here you would normally send the form data to your server
                // alert('Connexion réussie! Redirection vers votre tableau de bord...');
                // Redirect to dashboard or home page
                window.location.href = 'prendre_rendez_vous';
            });

            // Password visibility toggle
            const togglePassword = function(inputId) {
                const input = document.getElementById(inputId);
                const type = input.getAttribute('type') === 'password' ? 'text' : 'password';
                input.setAttribute('type', type);
            };
        });
    </script>
</body>

</html>