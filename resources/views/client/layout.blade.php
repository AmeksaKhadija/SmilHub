<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SmileHub - Centre de Soins Dentaires</title>

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
            background-color: var(--off-white);
        }

        a {
            text-decoration: none;
            color: inherit;
            transition: all 0.3s ease;
        }

        ul {
            list-style: none;
        }

        img {
            max-width: 100%;
            height: auto;
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
            border-radius: 50px;
            font-weight: 500;
            text-align: center;
            cursor: pointer;
            transition: all 0.3s ease;
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

        .btn-secondary {
            background-color: var(--secondary);
            color: var(--white);
        }

        .btn-secondary:hover {
            background-color: var(--secondary-dark);
            transform: translateY(-3px);
            box-shadow: var(--shadow-md);
        }

        .btn-accent {
            background-color: var(--accent);
            color: var(--white);
        }

        .btn-accent:hover {
            background-color: var(--accent-dark);
            transform: translateY(-3px);
            box-shadow: var(--shadow-md);
        }

        .btn-outline {
            background-color: var(--primary-light);
            /* border: 2px solid var(--primary-light); */
            color: var(--primary);
        }

        .btn-outline:hover {
            background-color: var(--primary);
            color: var(--white);
            transform: translateY(-3px);
            box-shadow: var(--shadow-md);
        }

        .section-title {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 1rem;
            color: var(--primary);
            position: relative;
            display: inline-block;
        }

        .section-title::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 0;
            width: 60px;
            height: 4px;
            background: var(--secondary);
            border-radius: 2px;
        }

        .section-subtitle {
            font-size: 1.1rem;
            color: var(--text-light);
            margin-bottom: 2rem;
            max-width: 100%;
        }

        .text-center {
            text-align: center;
        }

        .text-center .section-title::after {
            left: 50%;
            transform: translateX(-50%);
        }

        /* Header Styles */
        .header {
            background-color: var(--white);
            box-shadow: var(--shadow);
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .top-header {
            background-color: var(--primary);
            color: var(--white);
            padding: 10px 0;
        }

        .top-header-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .contact-info {
            display: flex;
            gap: 20px;
        }

        .contact-info-item {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 0.9rem;
        }

        .social-links {
            display: flex;
            gap: 15px;
        }

        .social-link:hover {
            color: var(--secondary-light);
            transform: translateY(-3px);
        }

        .main-header {
            padding: 15px 0;
        }

        .main-header-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .logo img {
            width: 50px;
            height: 50px;
            object-fit: cover;
        }

        .logo-text {
            font-size: 1.8rem;
            font-weight: 700;
            color: var(--primary);
        }

        .main-nav ul {
            display: flex;
            gap: 30px;
        }

        .nav-item {
            position: relative;
            font-weight: 500;
        }

        .nav-item::after {
            content: '';
            position: absolute;
            bottom: -5px;
            left: 0;
            width: 0;
            height: 2px;
            background-color: var(--primary);
            transition: width 0.3s ease;
        }

        .nav-item:hover {
            color: var(--primary);
        }

        .nav-item:hover::after {
            width: 100%;
        }

        .mobile-menu-btn {
            display: none;
            background: none;
            border: none;
            font-size: 1.5rem;
            color: var(--primary);
            cursor: pointer;
        }

        .auth-buttons {
            display: flex;
            gap: 15px;
            align-items: center;
        }

        .auth-btn {
            display: flex;
            align-items: center;
            gap: 8px;
            padding: 6px 12px;
            border-radius: 50px;
            font-size: 0.9rem;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .login-btn {
            background-color: transparent;
            border: 1px solid rgba(255, 255, 255, 0.3);
            color: var(--white);
        }

        .login-btn:hover {
            background-color: rgba(255, 255, 255, 0.1);
            transform: translateY(-2px);
        }

        .register-btn {
            background-color: var(--secondary);
            color: var(--white);
        }

        .register-btn:hover {
            background-color: var(--secondary-dark);
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        /* Footer */
        .footer {
            background-color: var(--text-dark);
            color: var(--white);
            padding-top: 80px;
            position: relative;
            margin-top: 80px;
        }

        .footer::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.03'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
        }

        .footer-container {
            display: grid;
            grid-template-columns: 2fr 1fr 1fr 1fr;
            gap: 50px;
            position: relative;
            z-index: 1;
        }

        .footer-about .logo {
            margin-bottom: 20px;
        }

        .footer-about .logo-text {
            color: var(--white);
        }

        .footer-about-text {
            color: var(--text-lighter);
            margin-bottom: 20px;
            line-height: 1.8;
        }

        .footer-social {
            display: flex;
            gap: 15px;
        }

        .footer-social-link {
            width: 40px;
            height: 40px;
            background-color: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
        }

        .footer-social-link:hover {
            background-color: var(--primary);
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(3, 105, 161, 0.3);
        }

        .footer-title {
            font-size: 1.3rem;
            font-weight: 600;
            margin-bottom: 25px;
            position: relative;
            padding-bottom: 15px;
        }

        .footer-title::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 40px;
            height: 3px;
            background-color: var(--primary);
            border-radius: 2px;
        }

        .footer-links {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .footer-link {
            color: var(--text-lighter);
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .footer-link:hover {
            color: var(--white);
            transform: translateX(5px);
        }

        .footer-contact-item {
            display: flex;
            gap: 15px;
            margin-bottom: 20px;
            color: var(--text-lighter);
        }

        .footer-contact-icon {
            color: var(--primary-light);
            font-size: 1.2rem;
            flex-shrink: 0;
        }

        .footer-bottom {
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            padding: 20px 0;
            margin-top: 60px;
            text-align: center;
            color: var(--text-lighter);
            font-size: 0.9rem;
        }
    </style>
</head>

<body>


    <!-- Header -->
    <header class="header">
        <div class="top-header">
            <div class="container">
                <div class="top-header-content">
                    <div class="contact-info">
                        <div class="contact-info-item">
                            <i class="fas fa-phone-alt"></i>
                            <span>+33 1 23 45 67 89</span>
                        </div>
                        <div class="contact-info-item">
                            <i class="fas fa-envelope"></i>
                            <span>contact@SmileHub.fr</span>
                        </div>
                        <div class="contact-info-item">
                            <i class="fas fa-map-marker-alt"></i>
                            <span>123 Avenue de la Santé, 75001 Paris</span>
                        </div>
                    </div>
                    <div class="auth-buttons">
                        <a href="Login" class="auth-btn login-btn"><i class="fas fa-sign-in-alt"></i> Connexion</a>
                        <a href="Register" class="auth-btn register-btn"><i class="fas fa-user-plus"></i>
                            Inscription</a>
                    </div>
                    <div class="social-links">
                        <a href="#" class="social-link"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="social-link"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="social-link"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="social-link"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="main-header">
            <div class="container">
                <div class="main-header-content">
                    <div class="logo">
                        <svg width="50" height="50" viewBox="0 0 50 50" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <!-- Fond circulaire -->
                            <circle cx="25" cy="25" r="24" fill="#0369a1" />

                            <!-- Dent stylisée -->
                            <path
                                d="M25 10C21.5 10 19 12 18 14C17 16 16 18 15 22C14 26 13 30 15 33C17 36 19 37 21 37C23 37 24 35 25 33C26 35 27 37 29 37C31 37 33 36 35 33C37 30 36 26 35 22C34 18 33 16 32 14C31 12 28.5 10 25 10Z"
                                fill="white" />

                            <!-- Sourire sous la dent -->
                            <path d="M18 28C20 31 23 33 25 33C27 33 30 31 32 28" stroke="white" stroke-width="2"
                                stroke-linecap="round" />
                        </svg>
                        <a href="/" class="logo-text">SmileHub</a>
                    </div>
                    <nav class="main-nav" id="mainNav">
                        <ul>
                            <li><a href="#" class="nav-item">Accueil</a></li>
                            <li><a href="#" class="nav-item">À propos</a></li>
                            <li><a href="" class="nav-item">Services</a></li>
                            <li><a href="#" class="nav-item">Médecins</a></li>
                            <li><a href="#" class="nav-item">Témoignages</a></li>
                            <li><a href="#" class="nav-item">Blog</a></li>
                            <li><a href="#" class="nav-item">Contact</a></li>
                        </ul>
                    </nav>
                    <button class="mobile-menu-btn" id="mobileMenuBtn">
                        <i class="fas fa-bars"></i>
                    </button>
                </div>
            </div>
        </div>
    </header>
    <main>
        @yield('index')
        @yield('detailDentist')
    </main>
    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="footer-container">
                <div class="footer-about">
                    <div class="logo">
                        <svg width="40" height="40" viewBox="0 0 50 50" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <!-- Fond circulaire -->
                            <circle cx="25" cy="25" r="24" fill="white" />

                            <!-- Dent stylisée -->
                            <path
                                d="M25 10C21.5 10 19 12 18 14C17 16 16 18 15 22C14 26 13 30 15 33C17 36 19 37 21 37C23 37 24 35 25 33C26 35 27 37 29 37C31 37 33 36 35 33C37 30 36 26 35 22C34 18 33 16 32 14C31 12 28.5 10 25 10Z"
                                fill="#0369a1" />

                            <!-- Sourire sous la dent -->
                            <path d="M18 28C20 31 23 33 25 33C27 33 30 31 32 28" stroke="#0369a1" stroke-width="2"
                                stroke-linecap="round" />
                        </svg>
                        <span class="logo-text">SmileHub</span>
                    </div>
                    <p class="footer-about-text">SmileHub est une clinique dentaire moderne offrant une gamme complète
                        de services dentaires pour toute la famille dans un environnement confortable et accueillant.
                    </p>
                    <div class="footer-social">
                        <a href="#" class="footer-social-link"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="footer-social-link"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="footer-social-link"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="footer-social-link"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
                <div class="footer-links">
                    <h3 class="footer-title">Liens rapides</h3>
                    <a href="index.html" class="footer-link"><i class="fas fa-chevron-right"></i> Accueil</a>
                    <a href="#" class="footer-link"><i class="fas fa-chevron-right"></i> À propos</a>
                    <a href="#" class="footer-link"><i class="fas fa-chevron-right"></i> Services</a>
                    <a href="#" class="footer-link"><i class="fas fa-chevron-right"></i> Médecins</a>
                    <a href="educational-content.html" class="footer-link"><i class="fas fa-chevron-right"></i>
                        Ressources</a>
                    <a href="#" class="footer-link"><i class="fas fa-chevron-right"></i> Contact</a>
                </div>
                <div class="footer-links">
                    <h3 class="footer-title">Nos services</h3>
                    <a href="#" class="footer-link"><i class="fas fa-chevron-right"></i> Soins préventifs</a>
                    <a href="#" class="footer-link"><i class="fas fa-chevron-right"></i> Dentisterie
                        esthétique</a>
                    <a href="#" class="footer-link"><i class="fas fa-chevron-right"></i> Implants dentaires</a>
                    <a href="#" class="footer-link"><i class="fas fa-chevron-right"></i> Orthodontie</a>
                    <a href="#" class="footer-link"><i class="fas fa-chevron-right"></i> Endodontie</a>
                    <a href="#" class="footer-link"><i class="fas fa-chevron-right"></i> Parodontie</a>
                    <a href="#" class="footer-link"><i class="fas fa-chevron-right"></i> Chirurgie buccale</a>
                </div>
                <div class="footer-contact">
                    <h3 class="footer-title">Contact</h3>
                    <div class="footer-contact-item">
                        <div class="footer-contact-icon">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <p>123 Avenue de la Santé, 75001 Paris, France</p>
                    </div>
                    <div class="footer-contact-item">
                        <div class="footer-contact-icon">
                            <i class="fas fa-phone-alt"></i>
                        </div>
                        <p>+33 1 23 45 67 89</p>
                    </div>
                    <div class="footer-contact-item">
                        <div class="footer-contact-icon">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <p>contact@smilehub.fr</p>
                    </div>
                    <div class="footer-contact-item">
                        <div class="footer-contact-icon">
                            <i class="fas fa-clock"></i>
                        </div>
                        <p>Lun-Ven: 9h-19h | Sam: 9h-17h</p>
                    </div>
                </div>
            </div>
            <div class="footer-bottom">
                <p>&copy; 2025 SmileHub. Tous droits réservés. Conçu avec <i class="fas fa-heart"
                        style="color: var(--accent);"></i> pour votre santé dentaire.</p>
            </div>
        </div>
    </footer>
</body>

</html>
