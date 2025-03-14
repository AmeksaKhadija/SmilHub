<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Suivi des Soins - SmileHub</title>

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
            --success: #10b981;
            --warning: #f59e0b;
            --danger: #ef4444;
            --info: #3b82f6;
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
            padding: 10px 20px;
            border-radius: 8px;
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

        /* Treatment Tracking Section */
        .treatment-section {
            padding: 80px 0;
            background-color: var(--white);
        }

        .treatment-container {
            display: grid;
            grid-template-columns: 1fr 2fr;
            gap: 40px;
        }

        /* Patient Info */
        .patient-info {
            background-color: var(--light-gray);
            border-radius: 10px;
            padding: 30px;
            box-shadow: var(--shadow);
        }

        .patient-header {
            display: flex;
            align-items: center;
            gap: 20px;
            margin-bottom: 30px;
        }

        .patient-avatar {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            overflow: hidden;
            border: 3px solid var(--primary);
        }

        .patient-avatar img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .patient-name {
            font-size: 1.5rem;
            font-weight: 600;
            color: var(--primary);
            margin-bottom: 5px;
        }

        .patient-id {
            font-size: 0.9rem;
            color: var(--text-light);
        }

        .patient-details {
            margin-bottom: 30px;
        }

        .patient-detail {
            display: flex;
            margin-bottom: 15px;
        }

        .patient-detail-label {
            width: 120px;
            font-weight: 500;
            color: var(--text-dark);
        }

        .patient-detail-value {
            color: var(--text-light);
        }

        .health-indicators {
            margin-bottom: 30px;
        }

        .health-indicator-title {
            font-size: 1.2rem;
            font-weight: 600;
            margin-bottom: 15px;
            color: var(--primary);
        }

        .health-indicator {
            background-color: var(--white);
            border-radius: 8px;
            padding: 15px;
            margin-bottom: 15px;
            box-shadow: var(--shadow-sm);
        }

        .health-indicator-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 10px;
        }

        .health-indicator-name {
            font-weight: 500;
        }

        .health-indicator-value {
            font-weight: 600;
        }

        .health-indicator-value.good {
            color: var(--success);
        }

        .health-indicator-value.warning {
            color: var(--warning);
        }

        .health-indicator-value.danger {
            color: var(--danger);
        }

        .health-indicator-progress {
            height: 8px;
            background-color: var(--gray);
            border-radius: 4px;
            overflow: hidden;
        }

        .health-indicator-bar {
            height: 100%;
            border-radius: 4px;
        }

        .health-indicator-bar.good {
            background-color: var(--success);
            width: 85%;
        }

        .health-indicator-bar.warning {
            background-color: var(--warning);
            width: 60%;
        }

        .health-indicator-bar.danger {
            background-color: var(--danger);
            width: 30%;
        }

        .next-appointment {
            background-color: var(--white);
            border-radius: 8px;
            padding: 20px;
            box-shadow: var(--shadow-sm);
        }

        .next-appointment-title {
            font-size: 1.2rem;
            font-weight: 600;
            margin-bottom: 15px;
            color: var(--primary);
        }

        .next-appointment-date {
            display: flex;
            align-items: center;
            gap: 15px;
            margin-bottom: 15px;
        }

        .next-appointment-calendar {
            width: 50px;
            height: 60px;
            background-color: var(--primary);
            color: var(--white);
            border-radius: 8px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        .next-appointment-day {
            font-size: 1.5rem;
            font-weight: 700;
            line-height: 1;
        }

        .next-appointment-month {
            font-size: 0.8rem;
            text-transform: uppercase;
        }

        .next-appointment-info {
            flex: 1;
        }

        .next-appointment-time {
            font-weight: 600;
            color: var(--primary);
            margin-bottom: 5px;
        }

        .next-appointment-doctor {
            font-size: 0.9rem;
            color: var(--text-light);
        }

        .next-appointment-actions {
            display: flex;
            gap: 10px;
        }

        /* Treatment Plan */
        .treatment-plan {
            background-color: var(--white);
            border-radius: 10px;
            padding: 30px;
            box-shadow: var(--shadow);
        }

        .treatment-plan-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }

        .treatment-plan-title {
            font-size: 1.5rem;
            font-weight: 600;
            color: var(--primary);
        }

        .treatment-plan-status {
            padding: 8px 15px;
            border-radius: 20px;
            font-size: 0.9rem;
            font-weight: 500;
        }

        .treatment-plan-status.active {
            background-color: rgba(16, 185, 129, 0.1);
            color: var(--success);
        }

        .treatment-plan-info {
            display: flex;
            gap: 30px;
            margin-bottom: 30px;
        }

        .treatment-plan-info-item {
            flex: 1;
            background-color: var(--light-gray);
            border-radius: 8px;
            padding: 15px;
        }

        .treatment-plan-info-label {
            font-size: 0.9rem;
            color: var(--text-light);
            margin-bottom: 5px;
        }

        .treatment-plan-info-value {
            font-size: 1.2rem;
            font-weight: 600;
            color: var(--text-dark);
        }

        /* Timeline */
        .treatment-timeline {
            margin-top: 40px;
        }

        .timeline-title {
            font-size: 1.2rem;
            font-weight: 600;
            margin-bottom: 20px;
            color: var(--primary);
        }

        .timeline {
            position: relative;
            padding-left: 30px;
        }

        .timeline::before {
            content: '';
            position: absolute;
            top: 0;
            bottom: 0;
            left: 10px;
            width: 2px;
            background-color: var(--gray);
        }

        .timeline-item {
            position: relative;
            margin-bottom: 30px;
        }

        .timeline-item:last-child {
            margin-bottom: 0;
        }

        .timeline-item::before {
            content: '';
            position: absolute;
            top: 0;
            left: -30px;
            width: 20px;
            height: 20px;
            border-radius: 50%;
            background-color: var(--white);
            border: 2px solid var(--primary);
            z-index: 1;
        }

        .timeline-item.completed::before {
            background-color: var(--success);
            border-color: var(--success);
        }

        .timeline-item.current::before {
            background-color: var(--primary);
            border-color: var(--primary);
        }

        .timeline-item.upcoming::before {
            background-color: var(--white);
            border-color: var(--gray);
        }

        .timeline-date {
            font-size: 0.9rem;
            color: var(--text-light);
            margin-bottom: 5px;
        }

        .timeline-content {
            background-color: var(--light-gray);
            border-radius: 8px;
            padding: 20px;
        }

        .timeline-item.completed .timeline-content {
            border-left: 3px solid var(--success);
        }

        .timeline-item.current .timeline-content {
            border-left: 3px solid var(--primary);
            background-color: rgba(3, 105, 161, 0.05);
        }

        .timeline-item.upcoming .timeline-content {
            border-left: 3px solid var(--gray);
            opacity: 0.8;
        }

        .timeline-title {
            font-weight: 600;
            margin-bottom: 10px;
            color: var(--text-dark);
        }

        .timeline-description {
            color: var(--text-light);
            margin-bottom: 15px;
        }

        .timeline-meta {
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 0.9rem;
        }

        .timeline-doctor {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .timeline-doctor-avatar {
            width: 30px;
            height: 30px;
            border-radius: 50%;
            overflow: hidden;
        }

        .timeline-doctor-avatar img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .timeline-doctor-name {
            font-weight: 500;
        }

        .timeline-status {
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 500;
        }

        .timeline-status.completed {
            background-color: rgba(16, 185, 129, 0.1);
            color: var(--success);
        }

        .timeline-status.in-progress {
            background-color: rgba(3, 105, 161, 0.1);
            color: var(--primary);
        }

        .timeline-status.upcoming {
            background-color: rgba(203, 213, 225, 0.3);
            color: var(--text-light);
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

        /* Responsive Styles */
        @media (max-width: 1200px) {
            .container {
                padding: 0 30px;
            }
        }

        @media (max-width: 992px) {
            .treatment-container {
                grid-template-columns: 1fr;
            }

            .treatment-plan-info {
                flex-direction: column;
                gap: 15px;
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

            .footer-container {
                grid-template-columns: 1fr 1fr;
            }
        }

        @media (max-width: 576px) {
            .patient-header {
                flex-direction: column;
                text-align: center;
            }

            .next-appointment-date {
                flex-direction: column;
                text-align: center;
            }

            .next-appointment-actions {
                flex-direction: column;
            }

            .next-appointment-actions .btn {
                width: 100%;
            }

            .footer-container {
                grid-template-columns: 1fr;
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
                        <span class="logo-text">SmileHub</span>
                    </div>
                    <nav class="main-nav" id="mainNav">
                        <ul>
                            <li><a href="index.html" class="nav-item">Accueil</a></li>
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
            <h1 class="page-title">Suivi des Soins</h1>
            <p class="page-subtitle">Suivez l'évolution de vos traitements dentaires et votre plan de soins personnalisé</p>
        </div>
    </section>

    <!-- Treatment Tracking Section -->
    <section class="treatment-section">
        <div class="container">
            <div class="treatment-container">
                <!-- Patient Info -->
                <div class="patient-info">
                    <div class="patient-header">
                        <div class="patient-avatar">
                            <img src="https://randomuser.me/api/portraits/women/65.jpg" alt="Sophie Martin">
                        </div>
                        <div>
                            <h2 class="patient-name">Sophie Martin</h2>
                            <p class="patient-id">ID Patient: #SM12345</p>
                        </div>
                    </div>

                    <div class="patient-details">
                        <div class="patient-detail">
                            <div class="patient-detail-label">Âge:</div>
                            <div class="patient-detail-value">34 ans</div>
                        </div>
                        <div class="patient-detail">
                            <div class="patient-detail-label">Téléphone:</div>
                            <div class="patient-detail-value">+33 6 12 34 56 78</div>
                        </div>
                        <div class="patient-detail">
                            <div class="patient-detail-label">Email:</div>
                            <div class="patient-detail-value">sophie.martin@email.com</div>
                        </div>
                        <div class="patient-detail">
                            <div class="patient-detail-label">Adresse:</div>
                            <div class="patient-detail-value">45 Rue des Fleurs, 75008 Paris</div>
                        </div>
                        <div class="patient-detail">
                            <div class="patient-detail-label">Dentiste:</div>
                            <div class="patient-detail-value">Dr. Thomas Dubois</div>
                        </div>
                    </div>

                    <div class="health-indicators">
                        <h3 class="health-indicator-title">Indicateurs de santé bucco-dentaire</h3>
                        
                        <div class="health-indicator">
                            <div class="health-indicator-header">
                                <div class="health-indicator-name">Santé des gencives</div>
                                <div class="health-indicator-value good">Bon</div>
                            </div>
                            <div class="health-indicator-progress">
                                <div class="health-indicator-bar good"></div>
                            </div>
                        </div>
                        
                        <div class="health-indicator">
                            <div class="health-indicator-header">
                                <div class="health-indicator-name">Niveau de plaque</div>
                                <div class="health-indicator-value warning">Moyen</div>
                            </div>
                            <div class="health-indicator-progress">
                                <div class="health-indicator-bar warning"></div>
                            </div>
                        </div>
                        
                        <div class="health-indicator">
                            <div class="health-indicator-header">
                                <div class="health-indicator-name">Risque de carie</div>
                                <div class="health-indicator-value danger">Élevé</div>
                            </div>
                            <div class="health-indicator-progress">
                                <div class="health-indicator-bar danger"></div>
                            </div>
                        </div>
                    </div>

                    <div class="next-appointment">
                        <h3 class="next-appointment-title">Prochain rendez-vous</h3>
                        <div class="next-appointment-date">
                            <div class="next-appointment-calendar">
                                <div class="next-appointment-day">15</div>
                                <div class="next-appointment-month">Mai</div>
                            </div>
                            <div class="next-appointment-info">
                                <div class="next-appointment-time">11:00 - 11:45</div>
                                <div class="next-appointment-doctor">Dr. Thomas Dubois</div>
                            </div>
                        </div>
                        <div class="next-appointment-actions">
                            <a href="appointment-booking.html" class="btn btn-outline">Reporter</a>
                            <a href="#" class="btn btn-primary">Confirmer</a>
                        </div>
                    </div>
                </div>

                <!-- Treatment Plan -->
                <div class="treatment-plan">
                    <div class="treatment-plan-header">
                        <h2 class="treatment-plan-title">Plan de traitement</h2>
                        <div class="treatment-plan-status active">En cours</div>
                    </div>

                    <div class="treatment-plan-info">
                        <div class="treatment-plan-info-item">
                            <div class="treatment-plan-info-label">Date de début</div>
                            <div class="treatment-plan-info-value">10 Mars 2025</div>
                        </div>
                        <div class="treatment-plan-info-item">
                            <div class="treatment-plan-info-label">Date de fin estimée</div>
                            <div class="treatment-plan-info-value">25 Juin 2025</div>
                        </div>
                        <div class="treatment-plan-info-item">
                            <div class="treatment-plan-info-label">Progression</div>
                            <div class="treatment-plan-info-value">2/5 étapes</div>
                        </div>
                    </div>

                    <div class="treatment-timeline">
                        <h3 class="timeline-title">Chronologie du traitement</h3>
                        
                        <div class="timeline">
                            <div class="timeline-item completed">
                                <div class="timeline-date">10 Mars 2025</div>
                                <div class="timeline-content">
                                    <h4 class="timeline-title">Consultation initiale et diagnostic</h4>
                                    <p class="timeline-description">Examen complet, radiographies panoramiques et établissement du plan de traitement personnalisé.</p>
                                    <div class="timeline-meta">
                                        <div class="timeline-doctor">
                                            <div class="timeline-doctor-avatar">
                                                <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="Dr. Thomas Dubois">
                                            </div>
                                            <div class="timeline-doctor-name">Dr. Thomas Dubois</div>
                                        </div>
                                        <div class="timeline-status completed">Complété</div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="timeline-item completed">
                                <div class="timeline-date">25 Mars 2025</div>
                                <div class="timeline-content">
                                    <h4 class="timeline-title">Nettoyage professionnel et détartrage</h4>
                                    <p class="timeline-description">Élimination de la plaque dentaire et du tartre, polissage des dents et conseils d'hygiène personnalisés.</p>
                                    <div class="timeline-meta">
                                        <div class="timeline-doctor">
                                            <div class="timeline-doctor-avatar">
                                                <img src="https://randomuser.me/api/portraits/women/42.jpg" alt="Dr. Marie Leroy">
                                            </div>
                                            <div class="timeline-doctor-name">Dr. Marie Leroy</div>
                                        </div>
                                        <div class="timeline-status completed">Complété</div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="timeline-item current">
                                <div class="timeline-date">15 Mai 2025</div>
                                <div class="timeline-content">
                                    <h4 class="timeline-title">Traitement des caries et restaurations</h4>
                                    <p class="timeline-description">Élimination des caries sur les dents 16, 25 et 36, et mise en place de restaurations composites.</p>
                                    <div class="timeline-meta">
                                        <div class="timeline-doctor">
                                            <div class="timeline-doctor-avatar">
                                                <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="Dr. Thomas Dubois">
                                            </div>
                                            <div class="timeline-doctor-name">Dr. Thomas Dubois</div>
                                        </div>
                                        <div class="timeline-status in-progress">En cours</div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="timeline-item upcoming">
                                <div class="timeline-date">10 Juin 2025</div>
                                <div class="timeline-content">
                                    <h4 class="timeline-title">Traitement de canal sur la dent 46</h4>
                                    <p class="timeline-description">Dévitalisation de la dent 46 et mise en place d'une couronne provisoire.</p>
                                    <div class="timeline-meta">
                                        <div class="timeline-doctor">
                                            <div class="timeline-doctor-avatar">
                                                <img src="https://randomuser.me/api/portraits/men/45.jpg" alt="Dr. Pierre Moreau">
                                            </div>
                                            <div class="timeline-doctor-name">Dr. Pierre Moreau</div>
                                        </div>
                                        <div class="timeline-status upcoming">À venir</div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="timeline-item upcoming">
                                <div class="timeline-date">25 Juin 2025</div>
                                <div class="timeline-content">
                                    <h4 class="timeline-title">Pose de la couronne définitive</h4>
                                    <p class="timeline-description">Retrait de la couronne provisoire et mise en place de la couronne définitive sur la dent 46.</p>
                                    <div class="timeline-meta">
                                        <div class="timeline-doctor">
                                            <div class="timeline-doctor-avatar">
                                                <img src="https://randomuser.me/api/portraits/men/45.jpg" alt="Dr. Pierre Moreau">
                                            </div>
                                            <div class="timeline-doctor-name">Dr. Pierre Moreau</div>
                                        </div>
                                        <div class="timeline-status upcoming">À venir</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
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
    </body>

</html>