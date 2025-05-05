@extends('./client/layout')
@section('index')
    <style>
        /* Hero Section */
        .hero {
            position: relative;
            height: 600px;
            background: linear-gradient(rgba(3, 105, 161, 0.8), rgba(3, 105, 161, 0.8)), url('https://images.unsplash.com/photo-1606811971618-4486d14f3f99?q=80&w=1974&auto=format&fit=crop') no-repeat center center/cover;
            color: var(--white);
            display: flex;
            align-items: center;
            overflow: hidden;
        }

        .hero-content {
            max-width: 600px;
            animation: fadeInUp 1s ease;
        }

        .hero-title {
            font-size: 3rem;
            font-weight: 700;
            line-height: 1.2;
            margin-bottom: 1rem;
        }

        .hero-subtitle {
            font-size: 1.5rem;
            margin-bottom: 1.5rem;
            opacity: 0.9;
        }

        .hero-text {
            margin-bottom: 2rem;
            opacity: 0.8;
        }

        .hero-btns {
            display: flex;
            gap: 15px;
        }

        .hero-image {
            position: absolute;
            right: 0;
            bottom: 0;
            width: 500px;
            animation: fadeInRight 1s ease;
        }

        /* Features Section */
        .features {
            padding: 80px 0;
            background-color: var(--white);
        }

        .features-container {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 30px;
            margin-top: 50px;
        }

        .feature-card {
            background-color: var(--light-gray);
            border-radius: 10px;
            padding: 30px;
            box-shadow: var(--shadow);
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
            z-index: 1;
        }

        .feature-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 0;
            background-color: var(--primary);
            opacity: 0.05;
            transition: height 0.5s ease;
            z-index: -1;
        }

        .feature-card:hover {
            transform: translateY(-10px);
            box-shadow: var(--shadow-lg);
        }

        .feature-card:hover::before {
            height: 100%;
        }

        .feature-icon {
            font-size: 3rem;
            color: var(--primary);
            margin-bottom: 20px;
            transition: all 0.3s ease;
        }

        .feature-card:hover .feature-icon {
            transform: scale(1.1);
            color: var(--secondary);
        }

        .feature-title {
            font-size: 1.3rem;
            font-weight: 600;
            margin-bottom: 15px;
            color: var(--primary-dark);
        }

        .feature-text {
            color: var(--text-light);
        }

        /* Services Section */
        .services {
            padding: 80px 0;
            background-color: var(--light-gray);
        }

        .services-container {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 30px;
            margin-top: 50px;
        }

        .service-card {
            background-color: var(--white);
            border-radius: 10px;
            overflow: hidden;
            box-shadow: var(--shadow);
            transition: all 0.3s ease;
        }

        .service-card:hover {
            transform: translateY(-10px);
            box-shadow: var(--shadow-lg);
        }

        .service-image {
            height: 200px;
            overflow: hidden;
        }

        .service-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s ease;
        }

        .service-card:hover .service-image img {
            transform: scale(1.1);
        }

        .service-content {
            padding: 25px;
        }

        .service-title {
            font-size: 1.3rem;
            font-weight: 600;
            margin-bottom: 15px;
            color: var(--primary-dark);
        }

        .service-text {
            color: var(--text-light);
            margin-bottom: 20px;
        }

        .service-link {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            color: var(--primary);
            font-weight: 500;
        }

        .service-link:hover {
            color: var(--secondary);
            gap: 10px;
        }

        /* About Section */
        .about {
            padding: 80px 0;
            background-color: var(--white);
        }

        .about-container {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 50px;
            align-items: center;
        }

        .about-image {
            position: relative;
        }

        .about-image img {
            width: 100%;
            border-radius: 10px;
            box-shadow: var(--shadow-lg);
        }

        .about-experience {
            position: absolute;
            bottom: -30px;
            right: -30px;
            background-color: var(--secondary);
            color: var(--white);
            padding: 20px;
            border-radius: 10px;
            box-shadow: var(--shadow);
            text-align: center;
            animation: pulse 2s infinite;
        }

        .about-experience-number {
            font-size: 2.5rem;
            font-weight: 700;
            line-height: 1;
        }

        .about-experience-text {
            font-size: 1rem;
            font-weight: 500;
        }

        .about-content .section-title {
            margin-bottom: 2rem;
        }

        .about-text {
            color: var(--text-light);
            margin-bottom: 20px;
        }

        .about-features {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
            margin-top: 30px;
        }

        .about-feature {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .about-feature-icon {
            width: 50px;
            height: 50px;
            background-color: var(--light-gray);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--primary);
            font-size: 1.2rem;
            flex-shrink: 0;
        }

        .about-feature-text {
            font-weight: 500;
        }

        /* Appointment Section */
        .appointment {
            padding: 80px 0;
            background: linear-gradient(rgba(3, 105, 161, 0.9), rgba(3, 105, 161, 0.9)), url('https://images.unsplash.com/photo-1629909613654-28e377c37b09?q=80&w=2068&auto=format&fit=crop') no-repeat center center/cover;
            color: var(--white);
        }

        .appointment-container {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 50px;
            align-items: center;
        }

        .appointment-content .section-title {
            color: var(--white);
        }

        .appointment-content .section-title::after {
            background-color: var(--white);
        }

        .appointment-text {
            margin-bottom: 30px;
            opacity: 0.9;
        }

        .appointment-info {
            display: flex;
            flex-direction: column;
            gap: 20px;
            margin-bottom: 30px;
        }

        .appointment-info-item {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .appointment-info-icon {
            width: 40px;
            height: 40px;
            background-color: rgba(255, 255, 255, 0.2);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        .appointment-form {
            background-color: var(--white);
            border-radius: 10px;
            padding: 40px;
            box-shadow: var(--shadow-lg);
        }

        .form-title {
            font-size: 1.5rem;
            font-weight: 600;
            color: var(--primary);
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-control {
            width: 100%;
            padding: 12px 15px;
            border: 1px solid var(--gray);
            border-radius: 5px;
            font-family: 'Poppins', sans-serif;
            font-size: 1rem;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(3, 105, 161, 0.1);
        }

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }

        .form-btn {
            width: 100%;
            padding: 15px;
            border: none;
            border-radius: 5px;
            background-color: var(--primary);
            color: var(--white);
            font-family: 'Poppins', sans-serif;
            font-size: 1rem;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .form-btn:hover {
            background-color: var(--primary-dark);
        }

        /* Team Section */
        .team {
            padding: 80px 0;
            background-color: var(--light-gray);
        }

        .team-container {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 30px;
            margin-top: 50px;
        }

        .team-card {
            background-color: var(--white);
            border-radius: 10px;
            overflow: hidden;
            box-shadow: var(--shadow);
            transition: all 0.3s ease;
        }

        .team-card:hover {
            transform: translateY(-10px);
            box-shadow: var(--shadow-lg);
        }

        .team-image {
            height: 250px;
            overflow: hidden;
        }

        .team-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: all 0.5s ease;
            filter: grayscale(30%);
        }

        .team-card:hover .team-image img {
            transform: scale(1.05);
            filter: grayscale(0%);
        }

        .team-content {
            padding: 20px;
            text-align: center;
        }

        .team-name {
            font-size: 1.2rem;
            font-weight: 600;
            color: var(--primary-dark);
            margin-bottom: 5px;
        }

        .team-position {
            color: var(--secondary);
            font-weight: 500;
            margin-bottom: 15px;
        }

        .team-social {
            display: flex;
            justify-content: center;
            gap: 15px;
        }

        .team-social-link {
            width: 35px;
            height: 35px;
            background-color: var(--light-gray);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--primary);
            transition: all 0.3s ease;
        }

        .team-social-link:hover {
            background-color: var(--primary);
            color: var(--white);
            transform: translateY(-3px);
        }

        /* Testimonials Section */
        .testimonials {
            padding: 80px 0;
            background-color: var(--white);
        }

        .testimonials-container {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 30px;
            margin-top: 50px;
        }

        .testimonial-card {
            background-color: var(--light-gray);
            border-radius: 10px;
            padding: 30px;
            box-shadow: var(--shadow);
            transition: all 0.3s ease;
            position: relative;
        }

        .testimonial-card:hover {
            transform: translateY(-10px);
            box-shadow: var(--shadow-lg);
        }

        .testimonial-card::before {
            content: '\f10d';
            font-family: 'Font Awesome 6 Free';
            font-weight: 900;
            position: absolute;
            top: 20px;
            left: 20px;
            font-size: 1.5rem;
            color: var(--primary);
            opacity: 0.2;
        }

        .testimonial-content {
            margin-bottom: 20px;
            color: var(--text-light);
            font-style: italic;
        }

        .testimonial-author {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .testimonial-author-image {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            overflow: hidden;
        }

        .testimonial-author-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .testimonial-author-info {
            display: flex;
            flex-direction: column;
        }

        .testimonial-author-name {
            font-weight: 600;
            color: var(--primary-dark);
        }

        .testimonial-author-position {
            font-size: 0.9rem;
            color: var(--text-lighter);
        }

        .testimonial-rating {
            display: flex;
            gap: 3px;
            color: var(--accent);
            margin-top: 5px;
        }

        /* Newsletter Section */
        .newsletter {
            padding: 80px 0;
            background: linear-gradient(to right, var(--primary), var(--primary-dark));
            color: var(--white);
        }

        .newsletter-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
        }

        .newsletter-title {
            font-size: 2rem;
            font-weight: 700;
            margin-bottom: 1rem;
        }

        .newsletter-text {
            max-width: 600px;
            margin-bottom: 2rem;
            opacity: 0.9;
        }

        .newsletter-form {
            display: flex;
            gap: 10px;
            width: 100%;
            max-width: 600px;
        }

        .newsletter-input {
            flex: 1;
            padding: 15px 20px;
            border: none;
            border-radius: 50px;
            font-family: 'Poppins', sans-serif;
            font-size: 1rem;
        }

        .newsletter-input:focus {
            outline: none;
        }

        .newsletter-btn {
            padding: 15px 30px;
            border: none;
            border-radius: 50px;
            background-color: var(--accent);
            color: var(--white);
            font-family: 'Poppins', sans-serif;
            font-size: 1rem;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .newsletter-btn:hover {
            background-color: var(--accent-dark);
            transform: translateY(-3px);
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

        /* Back to Top Button */
        .back-to-top {
            position: fixed;
            bottom: 30px;
            right: 30px;
            width: 50px;
            height: 50px;
            background-color: var(--primary);
            color: var(--white);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
            cursor: pointer;
            box-shadow: var(--shadow-md);
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s ease;
            z-index: 99;
        }

        .back-to-top.active {
            opacity: 1;
            visibility: visible;
        }

        .back-to-top:hover {
            background-color: var(--primary-dark);
            transform: translateY(-5px);
        }

        /* Style des boutons d'authentification */


        /* Responsive pour les boutons d'authentification */
        @media (max-width: 768px) {
            .auth-buttons {
                margin: 10px 0;
                width: 100%;
                justify-content: center;
            }
        }

        /* Animations */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes fadeInRight {
            from {
                opacity: 0;
                transform: translateX(-30px);
            }

            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        @keyframes fadeInLeft {
            from {
                opacity: 0;
                transform: translateX(30px);
            }

            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        @keyframes pulse {
            0% {
                transform: scale(1);
                box-shadow: var(--shadow);
            }

            50% {
                transform: scale(1.05);
                box-shadow: var(--shadow-md);
            }

            100% {
                transform: scale(1);
                box-shadow: var(--shadow);
            }
        }

        /* Responsive Styles */
        @media (max-width: 1200px) {
            .container {
                padding: 0 30px;
            }
        }

        @media (max-width: 992px) {

            .features-container,
            .services-container,
            .team-container,
            .testimonials-container {
                grid-template-columns: repeat(2, 1fr);
            }

            .about-container,
            .appointment-container,
            .footer-container {
                grid-template-columns: 1fr;
                gap: 40px;
            }

            .about-image {
                order: -1;
            }

            .about-experience {
                bottom: -20px;
                right: 20px;
            }

            .hero {
                height: auto;
                padding: 80px 0;
            }

            .hero-image {
                display: none;
            }

            .hero-content {
                max-width: 100%;
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

            .top-header-content {
                flex-direction: column;
                gap: 10px;
            }

            .contact-info {
                flex-wrap: wrap;
                justify-content: center;
            }

            .form-row {
                grid-template-columns: 1fr;
            }

            .newsletter-form {
                flex-direction: column;
            }

            .newsletter-btn {
                width: 100%;
            }
        }

        @media (max-width: 576px) {

            .features-container,
            .services-container,
            .team-container,
            .testimonials-container {
                grid-template-columns: 1fr;
            }

            .hero-title {
                font-size: 2.5rem;
            }

            .hero-subtitle {
                font-size: 1.2rem;
            }

            .hero-btns {
                flex-direction: column;
                gap: 10px;
            }

            .section-title {
                font-size: 2rem;
            }

            .about-features {
                grid-template-columns: 1fr;
            }

            .footer-container {
                grid-template-columns: 1fr;
            }
        }
    </style>
    </head>

    <body>
        <!-- Back to Top Button -->
        <div class="back-to-top" id="backToTop">
            <i class="fas fa-arrow-up"></i>
        </div>
        <!-- Hero Section -->
        <section class="hero">
            <div class="container">
                <div class="hero-content">
                    <h1 class="hero-title">Des soins dentaires d'excellence pour votre sourire</h1>
                    <h2 class="hero-subtitle">Votre santé bucco-dentaire est notre priorité</h2>
                    <p class="hero-text">Nous combinons expertise médicale et technologies de pointe pour vous offrir des
                        soins dentaires de qualité dans un environnement confortable et accueillant.</p>
                    <div class="hero-btns">
                        <a href="prendre_rendez_vous" class="btn btn-secondary">Prendre rendez-vous</a>
                        <a href="#" class="btn btn-outline">Découvrir nos services</a>
                    </div>
                </div>
            </div>
        </section>

        <!-- Features Section -->
        <section class="features">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-title">Pourquoi nous choisir</h2>
                    <p class="section-subtitle">Nous nous engageons à fournir des soins dentaires exceptionnels dans un
                        environnement confortable et accueillant</p>
                </div>
                <div class="features-container">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-tooth"></i>
                        </div>
                        <h3 class="feature-title">Équipements modernes</h3>
                        <p class="feature-text">Nous utilisons les technologies les plus avancées pour garantir des soins de
                            qualité et minimiser l'inconfort pendant les traitements.</p>
                    </div>
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-user-md"></i>
                        </div>
                        <h3 class="feature-title">Dentistes qualifiés</h3>
                        <p class="feature-text">Notre équipe de dentistes expérimentés et certifiés s'engage à vous offrir
                            les meilleurs soins possibles.</p>
                    </div>
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-clock"></i>
                        </div>
                        <h3 class="feature-title">Horaires flexibles</h3>
                        <p class="feature-text">Nous proposons des horaires de rendez-vous flexibles pour s'adapter à votre
                            emploi du temps chargé.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Services Section -->
        <section class="services" id="service">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-title">Nos services</h2>
                    <p class="section-subtitle">Découvrez notre gamme complète de services dentaires pour toute la famille
                    </p>
                </div>
                <div class="services-container">
                    <div class="service-card">
                        <div class="service-image">
                            <img src="https://images.unsplash.com/photo-1588776814546-1ffcf47267a5?q=80&w=2070&auto=format&fit=crop"
                                alt="Soins préventifs">
                        </div>
                        <div class="service-content">
                            <h3 class="service-title">Soins préventifs</h3>
                            <p class="service-text">Examens réguliers, nettoyages professionnels et conseils personnalisés
                                pour maintenir une bonne santé bucco-dentaire.</p>
                            <a href="#" class="service-link">En savoir plus <i class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                    <div class="service-card">
                        <div class="service-image">
                            <img src="https://cdn.pixabay.com/photo/2017/07/23/10/44/dentist-2530990_1280.jpg"
                                alt="Dentisterie esthétique">
                        </div>
                        <div class="service-content">
                            <h3 class="service-title">Dentisterie esthétique</h3>
                            <p class="service-text">Blanchiment des dents, facettes, couronnes et autres traitements pour
                                améliorer l'apparence de votre sourire.</p>
                            <a href="#" class="service-link">En savoir plus <i class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                    <div class="service-card">
                        <div class="service-image">
                            <img src="https://images.unsplash.com/photo-1606811841689-23dfddce3e95?q=80&w=2074&auto=format&fit=crop"
                                alt="Implants dentaires">
                        </div>
                        <div class="service-content">
                            <h3 class="service-title">Implants dentaires</h3>
                            <p class="service-text">Solutions permanentes pour remplacer les dents manquantes et restaurer
                                votre sourire et votre confiance.</p>
                            <a href="#" class="service-link">En savoir plus <i class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- About Section -->
        <section class="about" id="about">
            <div class="container">
                <div class="about-container">
                    <div class="about-content">
                        <h2 class="section-title">À propos de SmileHub</h2>
                        <p class="about-text">Fondée en 2010, SmileHub est devenue l'une des cliniques dentaires les plus
                            réputées de Paris. Notre mission est de fournir des soins dentaires exceptionnels dans un
                            environnement confortable et accueillant.</p>
                        <p class="about-text">Nous nous engageons à utiliser les technologies les plus avancées et à suivre
                            les dernières avancées en matière de soins dentaires pour offrir à nos patients les meilleurs
                            traitements possibles.</p>
                        <div class="about-features">
                            <div class="about-feature">
                                <div class="about-feature-icon">
                                    <i class="fas fa-check"></i>
                                </div>
                                <p class="about-feature-text">Équipements de pointe</p>
                            </div>
                            <div class="about-feature">
                                <div class="about-feature-icon">
                                    <i class="fas fa-check"></i>
                                </div>
                                <p class="about-feature-text">Personnel attentionné</p>
                            </div>
                            <div class="about-feature">
                                <div class="about-feature-icon">
                                    <i class="fas fa-check"></i>
                                </div>
                                <p class="about-feature-text">Environnement stérile</p>
                            </div>
                            <div class="about-feature">
                                <div class="about-feature-icon">
                                    <i class="fas fa-check"></i>
                                </div>
                                <p class="about-feature-text">Prix transparents</p>
                            </div>
                        </div>
                        <a href="#" class="btn btn-primary" style="margin-top: 30px;">En savoir plus</a>
                    </div>
                    <div class="about-image">
                        <img src="https://images.unsplash.com/photo-1629909615184-74f495363b67?q=80&w=2069&auto=format&fit=crop"
                            alt="À propos de SmileHub">
                        <div class="about-experience">
                            <div class="about-experience-number">15+</div>
                            <div class="about-experience-text">Années d'expérience</div>
                        </div>
                    </div>
                </div>
            </div>
        </section>



        <!-- Team Section -->
        <section class="team" id="team">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-title">Notre équipe</h2>
                    <p class="section-subtitle">Rencontrez nos dentistes expérimentés qui s'engagent à vous offrir les
                        meilleurs soins dentaires</p>
                </div>
                <div class="team-container">
                    @foreach ($dentists as $dentist)
                        @if ($dentist->status == 'active')
                            <div class="team-card">
                                <div class="team-image">
                                    <img src="{{ $dentist->user->image }}"
                                        alt="Dr. {{ $dentist->user->nom }} {{ $dentist->user->prenom }}">
                                </div>
                                <div class="team-content">
                                    <h3 class="team-name">Dr. {{ $dentist->user->nom }} {{ $dentist->user->prenom }}</h3>
                                    <p class="team-position">{{ $dentist->speciality }}</p>
                                    <div class="team-social">
                                        <a href="#" class="team-social-link"><i class="fab fa-facebook-f"></i></a>
                                        <a href="#" class="team-social-link"><i class="fab fa-twitter"></i></a>
                                        <a href="#" class="team-social-link"><i class="fab fa-linkedin-in"></i></a>
                                    </div>
                                    <a href="{{ route('dentists.show', $dentist->id) }}" style="margin-top:10%"
                                        class="btn btn-secondary">Voir plus</a>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </section>

        <!-- Testimonials Section -->
        <section class="testimonials" id="temoignage">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-title">Témoignages</h2>
                    <p class="section-subtitle">Découvrez ce que nos patients disent de nous</p>
                </div>
                <div class="testimonials-container">
                    <div class="testimonial-card">
                        <p class="testimonial-content">J'avais très peur des dentistes, mais l'équipe de SmileHub a su me
                            mettre en confiance. Le traitement a été indolore et les résultats sont impressionnants. Je
                            recommande vivement cette clinique !</p>
                        <div class="testimonial-author">
                            <div class="testimonial-author-image">
                                <img src="https://randomuser.me/api/portraits/women/65.jpg" alt="Émilie Dupont">
                            </div>
                            <div class="testimonial-author-info">
                                <h4 class="testimonial-author-name">Émilie Dupont</h4>
                                <p class="testimonial-author-position">Patiente depuis 2019</p>
                                <div class="testimonial-rating">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="testimonial-card">
                        <p class="testimonial-content">Service exceptionnel ! J'ai eu besoin d'un traitement d'urgence et
                            ils m'ont pris en charge immédiatement. Le personnel est professionnel et attentionné. Prix
                            raisonnables pour une qualité de soins supérieure.</p>
                        <div class="testimonial-author">
                            <div class="testimonial-author-image">
                                <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="Lucas Bernard">
                            </div>
                            <div class="testimonial-author-info">
                                <h4 class="testimonial-author-name">Lucas Bernard</h4>
                                <p class="testimonial-author-position">Patient depuis 2021</p>
                                <div class="testimonial-rating">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star-half-alt"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="testimonial-card">
                        <p class="testimonial-content">Mes enfants avaient peur d'aller chez le dentiste, mais l'approche
                            douce et patiente du Dr. Sophie les a complètement rassurés. Maintenant, ils sont impatients d'y
                            retourner ! Un grand merci à toute l'équipe.</p>
                        <div class="testimonial-author">
                            <div class="testimonial-author-image">
                                <img src="https://randomuser.me/api/portraits/women/42.jpg" alt="Nathalie Petit">
                            </div>
                            <div class="testimonial-author-info">
                                <h4 class="testimonial-author-name">Nathalie Petit</h4>
                                <p class="testimonial-author-position">Patiente depuis 2018</p>
                                <div class="testimonial-rating">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Newsletter Section -->
        <section class="newsletter">
            <div class="container">
                <div class="newsletter-container">
                    <h2 class="newsletter-title">Abonnez-vous à notre newsletter</h2>
                    <p class="newsletter-text">Recevez nos dernières actualités, conseils de santé bucco-dentaire et offres
                        spéciales directement dans votre boîte mail.</p>
                    <form class="newsletter-form">
                        <input type="email" class="newsletter-input" placeholder="Votre adresse email" required>
                        <button type="submit" class="newsletter-btn">S'abonner</button>
                    </form>
                </div>
            </div>
        </section>

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

                // Back to Top Button
                const backToTopBtn = document.getElementById('backToTop');

                window.addEventListener('scroll', function() {
                    if (window.pageYOffset > 300) {
                        backToTopBtn.classList.add('active');
                    } else {
                        backToTopBtn.classList.remove('active');
                    }
                });

                backToTopBtn.addEventListener('click', function() {
                    window.scrollTo({
                        top: 0,
                        behavior: 'smooth'
                    });
                });

                // Scroll Animation
                const scrollElements = document.querySelectorAll(
                    '.features-container, .services-container, .about-container, .appointment-container, .team-container, .testimonials-container'
                );

                const elementInView = (el, dividend = 1) => {
                    const elementTop = el.getBoundingClientRect().top;
                    return (
                        elementTop <= (window.innerHeight || document.documentElement.clientHeight) / dividend
                    );
                };

                const elementOutofView = (el) => {
                    const elementTop = el.getBoundingClientRect().top;
                    return (
                        elementTop > (window.innerHeight || document.documentElement.clientHeight)
                    );
                };

                const displayScrollElement = (element) => {
                    element.style.opacity = "1";
                    element.style.transform = "translateY(0)";
                    element.style.transition = "all 1s ease";
                };

                const hideScrollElement = (element) => {
                    element.style.opacity = "0";
                    element.style.transform = "translateY(30px)";
                };

                const handleScrollAnimation = () => {
                    scrollElements.forEach((el) => {
                        if (elementInView(el, 1.25)) {
                            displayScrollElement(el);
                        } else if (elementOutofView(el)) {
                            hideScrollElement(el);
                        }
                    });
                };

                // Initialize
                scrollElements.forEach(hideScrollElement);

                window.addEventListener("scroll", () => {
                    handleScrollAnimation();
                });

                // Trigger once on load
                handleScrollAnimation();
            });
        </script>
    </body>

    </html>
@endsection
