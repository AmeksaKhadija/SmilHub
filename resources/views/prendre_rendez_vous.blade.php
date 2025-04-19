<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prise de Rendez-vous - SmileHub</title>

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
            border-radius: 8px;
            font-weight: 500;
            text-align: center;
            cursor: pointer;
            transition: all 0.3s ease;
            border: none;
            font-family: 'Poppins', sans-serif;
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

        .btn-outline {
            background-color: transparent;
            border: 2px solid var(--primary);
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
            max-width: 700px;
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

        /* Page Header */
        .page-header {
            background: linear-gradient(rgba(3, 105, 161, 0.8), rgba(3, 105, 161, 0.8)), url('https://images.unsplash.com/photo-1606811971618-4486d14f3f99?q=80&w=1974&auto=format&fit=crop') no-repeat center center/cover;
            color: var(--white);
            padding: 80px 0;
            text-align: center;
        }

        .page-title {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 1rem;
        }

        .page-subtitle {
            font-size: 1.2rem;
            max-width: 700px;
            margin: 0 auto;
            opacity: 0.9;
        }

        /* Appointment Section */
        .appointment-section {
            padding: 80px 0;
            background-color: var(--white);
        }

        .appointment-container {
            display: grid;
            grid-template-columns: 1fr 2fr;
            gap: 40px;
        }

        /* Service Selection */
        .dentist-selection {
            background-color: var(--light-gray);
            border-radius: 10px;
            padding: 30px;
            box-shadow: var(--shadow);
        }

        .service-selection {
            margin-bottom: 30px;
        }

        .service-selection-title {
            font-size: 1.4rem;
            font-weight: 600;
            margin-bottom: 20px;
            color: var(--primary);
            position: relative;
            padding-bottom: 10px;
            border-bottom: 2px solid var(--primary-light);
        }

        .service-options {
            display: flex;
            flex-direction: column;
            gap: 12px;
        }

        .service-option {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 15px;
            background-color: var(--white);
            border-radius: 10px;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: var(--shadow-sm);
        }

        .service-option:hover {
            transform: translateY(-3px);
            box-shadow: var(--shadow);
            background-color: rgba(3, 105, 161, 0.05);
        }

        .service-option.selected {
            background-color: rgba(3, 105, 161, 0.1);
            border-left: 4px solid var(--primary);
            box-shadow: var(--shadow);
        }

        .service-option-radio {
            width: 22px;
            height: 22px;
            border-radius: 50%;
            border: 2px solid var(--gray);
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            transition: all 0.3s ease;
        }

        .service-option.selected .service-option-radio {
            border-color: var(--primary);
        }

        .service-option.selected .service-option-radio::after {
            content: '';
            width: 12px;
            height: 12px;
            border-radius: 50%;
            background-color: var(--primary);
        }

        .service-option-label {
            font-weight: 500;
            font-size: 1.05rem;
        }

        .service-option-duration {
            margin-left: auto;
            font-size: 0.9rem;
            color: var(--text-light);
            background-color: var(--light-gray);
            padding: 4px 10px;
            border-radius: 15px;
        }

        /* Calendar Section */
        .calendar-section {
            background-color: var(--white);
            border-radius: 10px;
            padding: 30px;
            box-shadow: var(--shadow);
        }

        .calendar-header {
            margin-bottom: 20px;
        }

        .calendar-title {
            font-size: 1.5rem;
            font-weight: 600;
            color: var(--primary);
            margin-bottom: 20px;
            position: relative;
            padding-bottom: 10px;
            border-bottom: 2px solid var(--primary-light);
        }

        /* Dentist Cards */
        .dentist-availability-section {
            margin-bottom: 30px;
            padding: 20px;
            background-color: var(--white);
            border-radius: 12px;
            box-shadow: var(--shadow);
            transition: all 0.3s ease;
            border-left: 4px solid transparent;
        }

        .dentist-availability-section:hover {
            transform: translateY(-5px);
            box-shadow: var(--shadow-md);
        }

        .dentist-availability-section.selected {
            border-left: 4px solid var(--primary);
            background-color: rgba(3, 105, 161, 0.05);
        }

        .dentist-header {
            display: flex;
            align-items: center;
            gap: 15px;
            margin-bottom: 15px;
        }

        .dentist-avatar {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            overflow: hidden;
            border: 3px solid var(--primary-light);
        }

        .dentist-avatar img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .dentist-info {
            flex: 1;
        }

        .dentist-name {
            font-size: 1.2rem;
            font-weight: 600;
            color: var(--primary);
            margin-bottom: 5px;
        }

        .dentist-specialty {
            font-size: 0.95rem;
            color: var(--text-light);
            margin-bottom: 5px;
        }

        .dentist-rating {
            display: flex;
            align-items: center;
            gap: 3px;
            color: var(--accent);
            font-size: 0.9rem;
        }

        .availability-days {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
            margin: 15px 0;
        }

        .day-badge {
            background-color: var(--primary-light);
            color: white;
            padding: 5px 12px;
            border-radius: 15px;
            font-size: 0.9rem;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .day-badge:hover {
            background-color: var(--primary-dark);
            transform: translateY(-2px);
        }

        .day-badge.selected {
            background-color: var(--accent);
            box-shadow: var(--shadow);
        }

        .availability-details {
            display: grid;
            grid-template-columns: auto 1fr;
            gap: 10px;
            margin-bottom: 20px;
            background-color: var(--light-gray);
            padding: 15px;
            border-radius: 8px;
        }

        .availability-label {
            font-weight: 500;
            color: var(--text-dark);
        }

        .availability-value {
            color: var(--text-light);
        }

        .time-slots-title {
            font-size: 1.1rem;
            font-weight: 600;
            margin: 20px 0 15px;
            color: var(--primary);
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .time-slots-title::before {
            content: '\f017';
            font-family: 'Font Awesome 5 Free';
            font-weight: 900;
            color: var(--primary-light);
        }

        .time-slots-container {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 12px;
        }

        .time-slot {
            padding: 12px;
            text-align: center;
            border-radius: 8px;
            background-color: var(--light-gray);
            cursor: pointer;
            transition: all 0.3s ease;
            font-weight: 500;
        }

        .time-slot:hover {
            background-color: rgba(3, 105, 161, 0.1);
            transform: translateY(-3px);
            box-shadow: var(--shadow);
        }

        .time-slot.selected {
            background-color: var(--primary);
            color: var(--white);
            box-shadow: var(--shadow);
        }

        .time-slot.disabled {
            color: var(--dark-gray);
            background-color: var(--gray);
            cursor: not-allowed;
        }

        /* Appointment Summary */
        .appointment-summary {
            margin-top: 40px;
            background-color: var(--light-gray);
            border-radius: 12px;
            padding: 25px;
            box-shadow: var(--shadow);
            border-top: 4px solid var(--primary);
        }

        .summary-title {
            font-size: 1.3rem;
            font-weight: 600;
            margin-bottom: 20px;
            color: var(--primary);
            text-align: center;
            position: relative;
            padding-bottom: 10px;
        }

        .summary-title::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 60px;
            height: 3px;
            background-color: var(--primary-light);
            border-radius: 2px;
        }

        .summary-item {
            display: flex;
            margin-bottom: 15px;
            padding-bottom: 15px;
            border-bottom: 1px solid var(--gray);
        }

        .summary-item:last-child {
            border-bottom: none;
            margin-bottom: 0;
            padding-bottom: 0;
        }

        .summary-label {
            width: 120px;
            font-weight: 600;
            color: var(--text-dark);
        }

        .summary-value {
            flex: 1;
            color: var(--text-light);
            font-weight: 500;
        }

        .appointment-actions {
            margin-top: 25px;
            display: flex;
            justify-content: space-between;
            gap: 15px;
        }

        /* Footer */
        .footer {
            background-color: var(--text-dark);
            color: var(--white);
            padding-top: 80px;
        }

        .footer-container {
            display: grid;
            grid-template-columns: 2fr 1fr 1fr 1fr;
            gap: 50px;
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
        }

        .footer-title {
            font-size: 1.3rem;
            font-weight: 600;
            margin-bottom: 25px;
            position: relative;
            padding-bottom: 10px;
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

        /* Modal */
        .modal {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 1000;
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s ease;
        }

        .modal.active {
            opacity: 1;
            visibility: visible;
        }

        .modal-content {
            background-color: var(--white);
            border-radius: 10px;
            padding: 30px;
            width: 100%;
            max-width: 500px;
            box-shadow: var(--shadow-lg);
            transform: translateY(-20px);
            transition: all 0.3s ease;
        }

        .modal.active .modal-content {
            transform: translateY(0);
        }

        .modal-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .modal-title {
            font-size: 1.5rem;
            font-weight: 600;
            color: var(--primary);
        }

        .modal-close {
            background: none;
            border: none;
            font-size: 1.5rem;
            color: var(--text-light);
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .modal-close:hover {
            color: var(--text-dark);
        }

        .modal-body {
            margin-bottom: 20px;
        }

        .modal-footer {
            display: flex;
            justify-content: flex-end;
            gap: 15px;
        }

        /* Responsive Styles */
        @media (max-width: 1200px) {
            .container {
                padding: 0 30px;
            }
        }

        @media (max-width: 992px) {
            .appointment-container {
                grid-template-columns: 1fr;
            }

            .time-slots-container {
                grid-template-columns: repeat(3, 1fr);
            }
        }

        @media (max-width: 768px) {
            .main-nav {
                display: none;
                position: absolute;
                top: 100%;
                left: 0;
                width: 100%;
                background-color: var(--white);
                box-shadow: var(--shadow);
                padding: 20px;
                z-index: 100;
            }

            .main-nav.active {
                display: block;
            }

            .main-nav ul {
                flex-direction: column;
                gap: 15px;
            }

            .mobile-menu-btn {
                display: block;
            }

            .time-slots-container {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 576px) {
            .time-slots-container {
                grid-template-columns: 1fr;
            }

            .appointment-actions {
                flex-direction: column;
            }

            .appointment-actions .btn {
                width: 100%;
            }
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
                            <span>contact@smilehub.fr</span>
                        </div>
                        <div class="contact-info-item">
                            <i class="fas fa-map-marker-alt"></i>
                            <span>123 Avenue de la Santé, 75001 Paris</span>
                        </div>
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
                        <svg width="40" height="40" viewBox="0 0 50 50" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <!-- Fond circulaire -->
                            <circle cx="25" cy="25" r="24" fill="#0369a1" />

                            <!-- Dent stylisée -->
                            <path d="M25 10C21.5 10 19 12 18 14C17 16 16 18 15 22C14 26 13 30 15 33C17 36 19 37 21 37C23 37 24 35 25 33C26 35 27 37 29 37C31 37 33 36 35 33C37 30 36 26 35 22C34 18 33 16 32 14C31 12 28.5 10 25 10Z" fill="white" />

                            <!-- Sourire sous la dent -->
                            <path d="M18 28C20 31 23 33 25 33C27 33 30 31 32 28" stroke="white" stroke-width="2" stroke-linecap="round" />
                        </svg>
                        <a href="/" class="logo-text">SmileHub</a>
                    </div>
                    <nav class="main-nav" id="mainNav">
                        <ul>
                            <li><a href="/" class="nav-item">Accueil</a></li>
                            <li><a href="#" class="nav-item">À propos</a></li>
                            <li><a href="#" class="nav-item">Services</a></li>
                            <li><a href="#" class="nav-item">Médecins</a></li>
                            <li><a href="educational-content.html" class="nav-item">Ressources</a></li>
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

    <!-- Page Header -->
    <section class="page-header">
        <div class="container">
            <h1 class="page-title">Prendre Rendez-vous</h1>
            <p class="page-subtitle">Réservez facilement un rendez-vous avec l'un de nos dentistes qualifiés en quelques clics</p>
        </div>
    </section>

    <!-- Appointment Section -->
    <section class="appointment-section">
        <div class="container">
            <div class="appointment-container">
                <div class="dentist-selection">
                    <div class="service-selection">
                        <h2 class="service-selection-title">Sélectionnez un service</h2>
                        <div class="service-options">
                            <div class="service-option" data-service="checkup">
                                <div class="service-option-radio"></div>
                                <span class="service-option-label">Examen de routine</span>
                                <span class="service-option-duration">30 min</span>
                            </div>
                            <div class="service-option" data-service="cleaning">
                                <div class="service-option-radio"></div>
                                <span class="service-option-label">Nettoyage dentaire</span>
                                <span class="service-option-duration">45 min</span>
                            </div>
                            <div class="service-option" data-service="whitening">
                                <div class="service-option-radio"></div>
                                <span class="service-option-label">Blanchiment des dents</span>
                                <span class="service-option-duration">60 min</span>
                            </div>
                            <div class="service-option" data-service="consultation">
                                <div class="service-option-radio"></div>
                                <span class="service-option-label">Consultation orthodontique</span>
                                <span class="service-option-duration">40 min</span>
                            </div>
                            <div class="service-option" data-service="implant">
                                <div class="service-option-radio"></div>
                                <span class="service-option-label">Consultation implant</span>
                                <span class="service-option-duration">50 min</span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="appointment-summary">
                        <h3 class="summary-title">Résumé du rendez-vous</h3>
                        <div class="summary-item">
                            <div class="summary-label">Dentiste:</div>
                            <div class="summary-value" id="summaryDentist">À sélectionner</div>
                        </div>
                        <div class="summary-item">
                            <div class="summary-label">Service:</div>
                            <div class="summary-value" id="summaryService">À sélectionner</div>
                        </div>
                        <div class="summary-item">
                            <div class="summary-label">Jour:</div>
                            <div class="summary-value" id="summaryDay">À sélectionner</div>
                        </div>
                        <div class="summary-item">
                            <div class="summary-label">Heure:</div>
                            <div class="summary-value" id="summaryTime">À sélectionner</div>
                        </div>
                        <div class="summary-item">
                            <div class="summary-label">Durée:</div>
                            <div class="summary-value" id="summaryDuration">À sélectionner</div>
                        </div>
                        <div class="appointment-actions">
                            <button class="btn btn-outline" id="resetBtn">Réinitialiser</button>
                            <button class="btn btn-primary" id="confirmBtn">Confirmer le rendez-vous</button>
                        </div>
                    </div>
                </div>

                <!-- Calendar Section -->
                <div class="calendar-section">
                    <div class="calendar-header">
                        <h2 class="calendar-title">Créneaux disponibles par dentiste</h2>

                        <!-- Time Slots Section -->
                        <div class="time-slots">
                            @foreach($dentists as $dentist)
                            <div class="dentist-availability-section" data-dentist-id="{{ $dentist->id }}">
                                <div class="dentist-header">
                                    <div class="dentist-avatar">
                                        <img src="{{ $dentist->profile_photo ? asset('storage/'.$dentist->profile_photo) : 'https://randomuser.me/api/portraits/' . ($loop->index % 2 == 0 ? 'men' : 'women') . '/' . (30 + $loop->index) . '.jpg' }}" alt="Dr. {{ $dentist->user->nom }} {{ $dentist->user->prenom }}">
                                    </div>
                                    <div class="dentist-info">
                                        <h4 class="dentist-name">Dr. {{ $dentist->user->nom }} {{ $dentist->user->prenom }}</h4>
                                        <p class="dentist-specialty">{{ $dentist->speciality ?: 'Dentiste généraliste' }}</p>
                                        <div class="dentist-rating">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star-half-alt"></i>
                                            <span>(4.5)</span>
                                        </div>
                                    </div>
                                </div>
                                
                                @if(isset($dentist->available_slots) && !empty($dentist->available_slots))
                                    @if(is_array($dentist->available_slots))
                                        <!-- Si available_slots est un tableau de créneaux par date -->
                                        @if(isset($dentist->available_slots[0]) && isset($dentist->available_slots[0]['date']))
                                            @foreach($dentist->available_slots as $slot)
                                                @if(isset($slot['date']) && isset($slot['slots']) && is_array($slot['slots']))
                                                    <div>
                                                        <h5 class="time-slots-title">Pour le {{ $slot['date'] }}</h5>
                                                        <div class="time-slots-container">
                                                            @foreach($slot['slots'] as $hour)
                                                                <div class="time-slot" data-dentist-id="{{ $dentist->id }}" data-dentist-name="Dr. {{ $dentist->user->nom }} {{ $dentist->user->prenom }}" data-date="{{ $slot['date'] }}">{{ $hour }}</div>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                @endif
                                            @endforeach
                                        @else
                                            <!-- Si available_slots est un objet avec jours, heures, etc. -->
                                            <div>
                                                <h5 class="time-slots-title">Jours disponibles</h5>
                                                <div class="availability-days">
                                                    @if(isset($dentist->available_slots['days']) && is_array($dentist->available_slots['days']))
                                                        @foreach($dentist->available_slots['days'] as $day)
                                                            <span class="day-badge" data-dentist-id="{{ $dentist->id }}" data-dentist-name="Dr. {{ $dentist->user->nom }} {{ $dentist->user->prenom }}" data-day="{{ $day }}">{{ $day }}</span>
                                                        @endforeach
                                                    @endif
                                                </div>

                                                <div class="availability-details">
                                                    <div class="availability-label">Heures de travail:</div>
                                                    <div class="availability-value">
                                                        {{ $dentist->available_slots['start_time'] ?? '09:00' }} -
                                                        {{ $dentist->available_slots['end_time'] ?? '17:00' }}
                                                    </div>

                                                    <div class="availability-label">Pause déjeuner:</div>
                                                    <div class="availability-value">
                                                        {{ $dentist->available_slots['break_start'] ?? '12:00' }} -
                                                        {{ $dentist->available_slots['break_end'] ?? '13:00' }}
                                                    </div>

                                                    <div class="availability-label">Durée des rendez-vous:</div>
                                                    <div class="availability-value">{{ $dentist->available_slots['appointment_duration'] ?? '30' }} minutes</div>
                                                </div>

                                                <!-- Créneaux horaires (initialement cachés) -->
                                                <div class="day-time-slots" style="display: none;">
                                                    <h5 class="time-slots-title">Créneaux disponibles</h5>
                                                    <div class="time-slots-container">
                                                        @php
                                                        $start = isset($dentist->available_slots['start_time']) ? strtotime($dentist->available_slots['start_time']) : strtotime('09:00');
                                                        $end = isset($dentist->available_slots['end_time']) ? strtotime($dentist->available_slots['end_time']) : strtotime('17:00');
                                                        $breakStart = isset($dentist->available_slots['break_start']) ? strtotime($dentist->available_slots['break_start']) : strtotime('12:00');
                                                        $breakEnd = isset($dentist->available_slots['break_end']) ? strtotime($dentist->available_slots['break_end']) : strtotime('13:00');
                                                        $duration = isset($dentist->available_slots['appointment_duration']) ? $dentist->available_slots['appointment_duration'] * 60 : 30 * 60;
                                                        $today = date('Y-m-d');
                                                        @endphp

                                                        @for($time = $start; $time < $end; $time += $duration)
                                                            @if($time < $breakStart || $time >= $breakEnd)
                                                                <div class="time-slot" data-dentist-id="{{ $dentist->id }}" data-dentist-name="Dr. {{ $dentist->user->nom }} {{ $dentist->user->prenom }}" data-date="">{{ date('H:i', $time) }}</div>
                                                            @endif
                                                        @endfor
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    @elseif(is_object($dentist->available_slots))
                                        <!-- Si available_slots est un objet -->
                                        <div>
                                            <p>Informations de disponibilité stockées sous forme d'objet. Veuillez contacter l'administrateur.</p>
                                        </div>
                                    @else
                                        <div>
                                            <p>Format de disponibilité non reconnu. Veuillez contacter l'administrateur.</p>
                                        </div>
                                    @endif
                                @else
                                    <p>Aucune information de disponibilité pour ce dentiste.</p>
                                @endif
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Confirmation Modal -->
    <div class="modal" id="confirmationModal">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title">Confirmation du rendez-vous</h2>
                <button class="modal-close" id="modalClose">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <div class="modal-body">
                <p>Votre rendez-vous a été confirmé avec succès !</p>
                <p>Vous recevrez bientôt un email de confirmation avec les détails de votre rendez-vous.</p>
                <p>Un rappel vous sera également envoyé 24 heures avant votre rendez-vous.</p>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" id="modalOkBtn">OK</button>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="footer-container">
                <div class="footer-about">
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
                    <p class="footer-about-text">SmileHub est une clinique dentaire moderne offrant une gamme complète de services dentaires pour toute la famille dans un environnement confortable et accueillant.</p>
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
                    <a href="educational-content.html" class="footer-link"><i class="fas fa-chevron-right"></i> Ressources</a>
                    <a href="#" class="footer-link"><i class="fas fa-chevron-right"></i> Contact</a>
                </div>
                <div class="footer-links">
                    <h3 class="footer-title">Nos services</h3>
                    <a href="#" class="footer-link"><i class="fas fa-chevron-right"></i> Soins préventifs</a>
                    <a href="#" class="footer-link"><i class="fas fa-chevron-right"></i> Dentisterie esthétique</a>
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
                <p>&copy; 2025 SmileHub. Tous droits réservés. Conçu avec <i class="fas fa-heart" style="color: var(--accent);"></i> pour votre santé dentaire.</p>
            </div>
        </div>
    </footer>

    <!-- JavaScript -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Mobile Menu Toggle
            const mobileMenuBtn = document.getElementById('mobileMenuBtn');
            const mainNav = document.getElementById('mainNav');

            mobileMenuBtn.addEventListener('click', function() {
                mainNav.classList.toggle('active');

                if (mobileMenuBtn.querySelector('i').classList.contains('fa-bars')) {
                    mobileMenuBtn.querySelector('i').classList.remove('fa-bars');
                    mobileMenuBtn.querySelector('i').classList.add('fa-times');
                } else {
                    mobileMenuBtn.querySelector('i').classList.remove('fa-times');
                    mobileMenuBtn.querySelector('i').classList.add('fa-bars');
                }
            });

            // Service Selection
            const serviceOptions = document.querySelectorAll('.service-option');
            let selectedService = null;

            serviceOptions.forEach(option => {
                option.addEventListener('click', function() {
                    serviceOptions.forEach(o => o.classList.remove('selected'));
                    this.classList.add('selected');
                    selectedService = this.dataset.service;

                    // Update summary
                    document.getElementById('summaryService').textContent = this.querySelector('.service-option-label').textContent;
                    document.getElementById('summaryDuration').textContent = this.querySelector('.service-option-duration').textContent;
                });
            });

            // Sélectionner le premier service par défaut
            if (serviceOptions.length > 0) {
                serviceOptions[0].click();
            }

            // Day Badge Selection
            const dayBadges = document.querySelectorAll('.day-badge');
            let selectedDentistId = null;
            let selectedDay = null;

            dayBadges.forEach(badge => {
                badge.addEventListener('click', function() {
                    const dentistId = this.dataset.dentistId;
                    const dentistName = this.dataset.dentistName;
                    const day = this.dataset.day;
                    
                    // Désélectionner tous les badges du même dentiste
                    document.querySelectorAll(`.day-badge[data-dentist-id="${dentistId}"]`).forEach(b => {
                        b.classList.remove('selected');
                    });
                    
                    // Sélectionner ce badge
                    this.classList.add('selected');
                    
                    selectedDentistId = dentistId;
                    selectedDay = day;
                    
                    // Mettre à jour le résumé
                    document.getElementById('summaryDentist').textContent = dentistName;
                    document.getElementById('summaryDay').textContent = day;
                    
                    // Mettre en évidence la section du dentiste sélectionné
                    document.querySelectorAll('.dentist-availability-section').forEach(section => {
                        if (section.dataset.dentistId === dentistId) {
                            section.classList.add('selected');
                            
                            // Afficher les créneaux horaires pour ce jour
                            const dayTimeSlots = section.querySelector('.day-time-slots');
                            if (dayTimeSlots) {
                                dayTimeSlots.style.display = 'block';
                                
                                // Mettre à jour la date pour les créneaux horaires
                                const today = new Date();
                                const dayIndex = ['Dim', 'Lun', 'Mar', 'Mer', 'Jeu', 'Ven', 'Sam'].indexOf(day);
                                
                                if (dayIndex !== -1) {
                                    const currentDayIndex = today.getDay();
                                    const daysToAdd = (dayIndex - currentDayIndex + 7) % 7;
                                    
                                    const targetDate = new Date(today);
                                    targetDate.setDate(today.getDate() + daysToAdd);
                                    
                                    const formattedDate = targetDate.toISOString().split('T')[0];
                                    const displayDate = `${targetDate.getDate()}/${targetDate.getMonth() + 1}/${targetDate.getFullYear()}`;
                                                                    
                                    // Mettre à jour les attributs data-date des créneaux horaires
                                    dayTimeSlots.querySelectorAll('.time-slot').forEach(slot => {
                                        slot.dataset.date = displayDate;
                                        slot.dataset.day = day;
                                    });
                                }
                            }
                        } else {
                            section.classList.remove('selected');
                        }
                    });
                });
            });

            // Time Slot Selection
            const timeSlots = document.querySelectorAll('.time-slot:not(.disabled)');

            timeSlots.forEach(slot => {
                slot.addEventListener('click', function() {
                    // Désélectionner tous les créneaux
                    timeSlots.forEach(s => s.classList.remove('selected'));
                    // Sélectionner ce créneau
                    this.classList.add('selected');

                    // Récupérer les informations du dentiste et du créneau
                    const dentistId = this.dataset.dentistId;
                    const dentistName = this.dataset.dentistName;
                    const date = this.dataset.date;
                    const day = this.dataset.day;
                    const time = this.textContent.trim();

                    // Mettre à jour le résumé
                    document.getElementById('summaryDentist').textContent = dentistName;
                    if (day) document.getElementById('summaryDay').textContent = day;
                    document.getElementById('summaryTime').textContent = time;
                });
            });

            // Confirmation Modal
            const confirmBtn = document.getElementById('confirmBtn');
            const confirmationModal = document.getElementById('confirmationModal');
            const modalClose = document.getElementById('modalClose');
            const modalOkBtn = document.getElementById('modalOkBtn');

            confirmBtn.addEventListener('click', function() {
                // Valider les sélections
                if (document.getElementById('summaryDentist').textContent === 'À sélectionner') {
                    alert('Veuillez sélectionner un dentiste en choisissant un jour disponible.');
                    return;
                }
                if (document.getElementById('summaryService').textContent === 'À sélectionner') {
                    alert('Veuillez sélectionner un service.');
                    return;
                }
                if (document.getElementById('summaryDay').textContent === 'À sélectionner') {
                    alert('Veuillez sélectionner un jour disponible.');
                    return;
                }
                if (document.getElementById('summaryTime').textContent === 'À sélectionner') {
                    alert('Veuillez sélectionner un horaire.');
                    return;
                }

                confirmationModal.classList.add('active');
            });

            modalClose.addEventListener('click', function() {
                confirmationModal.classList.remove('active');
            });

            modalOkBtn.addEventListener('click', function() {
                confirmationModal.classList.remove('active');
                window.location.href = '/suivi_soin';
            });

            // Reset Button
            const resetBtn = document.getElementById('resetBtn');

            resetBtn.addEventListener('click', function() {
                // Réinitialiser la sélection de service
                serviceOptions.forEach(o => o.classList.remove('selected'));
                if (serviceOptions.length > 0) {
                    serviceOptions[0].click();
                } else {
                    selectedService = null;
                    document.getElementById('summaryService').textContent = 'À sélectionner';
                    document.getElementById('summaryDuration').textContent = 'À sélectionner';
                }
                
                // Réinitialiser la sélection de jour
                dayBadges.forEach(b => b.classList.remove('selected'));
                
                // Cacher tous les créneaux horaires
                document.querySelectorAll('.day-time-slots').forEach(slots => {
                    slots.style.display = 'none';
                });

                // Réinitialiser la sélection de créneau
                timeSlots.forEach(s => s.classList.remove('selected'));
                
                // Réinitialiser la mise en évidence des sections de dentiste
                document.querySelectorAll('.dentist-availability-section').forEach(section => {
                    section.classList.remove('selected');
                });

                // Réinitialiser le résumé
                document.getElementById('summaryDentist').textContent = 'À sélectionner';
                document.getElementById('summaryDay').textContent = 'À sélectionner';
                document.getElementById('summaryTime').textContent = 'À sélectionner';
            });
        });
    </script>
</body>

</html>