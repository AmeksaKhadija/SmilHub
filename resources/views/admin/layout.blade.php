<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de Bord Administrateur - SmileHub</title>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

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
            --success: #22c55e;
            --warning: #eab308;
            --danger: #ef4444;
            --info: #3b82f6;
            --purple: #8b5cf6;
            --purple-light: #a78bfa;
            --purple-dark: #7c3aed;
            --pink: #ec4899;
            --pink-light: #f472b6;
            --pink-dark: #db2777;
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
            background-color: var(--light-gray);
            min-height: 100vh;
            display: flex;
        }

        a {
            text-decoration: none;
            color: inherit;
            transition: all 0.3s ease;
        }

        /* Sidebar */
        .sidebar {
            width: 280px;
            background-color: var(--text-dark);
            height: 100vh;
            position: fixed;
            left: 0;
            top: 0;
            overflow-y: auto;
            box-shadow: var(--shadow);
            z-index: 100;
            transition: all 0.3s ease;
            color: var(--white);
        }

        .sidebar-header {
            padding: 20px;
            display: flex;
            align-items: center;
            background-color: rgba(255, 255, 255, 0.05);
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .sidebar-logo {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .sidebar-logo-text {
            font-size: 1.5rem;
            font-weight: 700;
        }

        .sidebar-close {
            margin-left: auto;
            background: none;
            border: none;
            color: var(--white);
            font-size: 1.2rem;
            cursor: pointer;
            display: none;
        }

        .sidebar-profile {
            padding: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .sidebar-profile-img {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            object-fit: cover;
            border: 3px solid var(--primary-light);
            margin-bottom: 15px;
        }

        .sidebar-profile-name {
            font-weight: 600;
            font-size: 1.1rem;
            margin-bottom: 5px;
        }

        .sidebar-profile-role {
            color: var(--text-lighter);
            font-size: 0.9rem;
            margin-bottom: 10px;
        }

        .sidebar-profile-status {
            display: flex;
            align-items: center;
            gap: 5px;
            font-size: 0.85rem;
            color: var(--success);
        }

        .sidebar-profile-status.online::before {
            content: '';
            display: inline-block;
            width: 8px;
            height: 8px;
            background-color: var(--success);
            border-radius: 50%;
        }

        .sidebar-nav {
            padding: 20px 0;
        }

        .sidebar-nav-title {
            padding: 0 20px;
            font-size: 0.8rem;
            text-transform: uppercase;
            color: var(--text-lighter);
            font-weight: 600;
            margin-bottom: 10px;
            margin-top: 20px;
        }

        .sidebar-nav-items {
            list-style: none;
        }

        .sidebar-nav-item {
            margin-bottom: 5px;
        }

        .sidebar-nav-link {
            display: flex;
            align-items: center;
            padding: 12px 20px;
            color: var(--text-lighter);
            font-weight: 500;
            transition: all 0.3s ease;
            border-left: 3px solid transparent;
        }

        .sidebar-nav-link.active {
            background-color: rgba(170, 221, 155, 0.099);
            color: var(--white);
            border-left-color: var(--primary);
        }

        .sidebar-nav-link:hover {
            background-color: rgba(255, 255, 255, 0.05);
            color: var(--white);
        }

        .sidebar-nav-icon {
            margin-right: 10px;
            width: 20px;
            text-align: center;
        }

        .sidebar-nav-badge {
            margin-left: auto;
            background-color: var(--primary);
            color: var(--white);
            font-size: 0.7rem;
            padding: 2px 8px;
            border-radius: 10px;
        }

        /* Main Content */
        .main-content {
            flex: 1;
            margin-left: 280px;
            padding: 20px;
            transition: all 0.3s ease;
        }

        /* Header */
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
            background-color: var(--white);
            padding: 15px 20px;
            border-radius: 10px;
            box-shadow: var(--shadow);
        }

        .header-left {
            display: flex;
            align-items: center;
        }

        .menu-toggle {
            background: none;
            border: none;
            color: var(--text-dark);
            font-size: 1.2rem;
            cursor: pointer;
            margin-right: 15px;
            display: none;
        }

        .header-search {
            position: relative;
        }

        .header-search input {
            padding: 10px 15px 10px 40px;
            border: 1px solid var(--gray);
            border-radius: 5px;
            font-family: 'Poppins', sans-serif;
            width: 300px;
            transition: all 0.3s ease;
        }

        .header-search input:focus {
            outline: none;
            border-color: var(--primary-light);
            box-shadow: 0 0 0 3px rgba(3, 105, 161, 0.1);
        }

        .header-search i {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--text-light);
        }

        .header-right {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .header-icon {
            position: relative;
            color: var(--text-light);
            font-size: 1.2rem;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .header-icon:hover {
            color: var(--primary);
        }

        .header-icon-badge {
            position: absolute;
            top: -5px;
            right: -5px;
            background-color: var(--danger);
            color: var(--white);
            font-size: 0.7rem;
            width: 18px;
            height: 18px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .header-profile {
            display: flex;
            align-items: center;
            gap: 10px;
            cursor: pointer;
        }

        .header-profile-img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            object-fit: cover;
        }

        .header-profile-info {
            display: flex;
            flex-direction: column;
        }

        .header-profile-name {
            font-weight: 600;
            font-size: 0.9rem;
        }

        .header-profile-role {
            color: var(--text-light);
            font-size: 0.8rem;
        }

        /* Dashboard Content */
        .dashboard-title {
            font-size: 1.8rem;
            font-weight: 700;
            margin-bottom: 5px;
        }

        .dashboard-subtitle {
            color: var(--text-light);
            margin-bottom: 30px;
        }
    </style>
</head>

<body>
    <!-- Sidebar -->
    <aside class="sidebar" id="sidebar">
        <div class="sidebar-header">
            <div class="sidebar-logo">
                <svg width="30" height="30" viewBox="0 0 50 50" fill="none"
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
                <span class="sidebar-logo-text">SmileHub</span>
            </div>
            <button class="sidebar-close" id="sidebarClose">
                <i class="fas fa-times"></i>
            </button>
        </div>
        <div class="sidebar-profile">
            <img src="https://randomuser.me/api/portraits/men/75.jpg" alt="Admin" class="sidebar-profile-img">
            <h3 class="sidebar-profile-name">Alexandre Martin</h3>
            <p class="sidebar-profile-role">Administrateur</p>
            <div class="sidebar-profile-status online">En ligne</div>
        </div>
        <div class="sidebar-nav">
            <h4 class="sidebar-nav-title">Menu principal</h4>
            <ul class="sidebar-nav-items">
                <li class="sidebar-nav-item">
                    <a href="{{ route('statistics.dashboard') }}" class="sidebar-nav-link">
                        <i class="fas fa-chart-line sidebar-nav-icon"></i>
                        Statistiques
                    </a>
                </li>
                <li class="sidebar-nav-item">
                    <a href="{{ route('dentists.index') }}" class="sidebar-nav-link">
                        <i class="fas fa-user-md sidebar-nav-icon"></i>
                        Dentistes
                    </a>
                </li>
                <li class="sidebar-nav-item">
                    <a href="{{ route('patients.index') }}" class="sidebar-nav-link">
                        <i class="fas fa-users sidebar-nav-icon"></i>
                        Patients
                    </a>
                </li>
                <li class="sidebar-nav-item">
                    <a href="categoriess" class="sidebar-nav-link">
                        <i class="fa fa-tag sidebar-nav-icon" aria-hidden="true"></i>
                        Categories
                    </a>
                </li>
                <li class="sidebar-nav-item">
                    <a href="{{ route('rendez_vous.index') }}" class="sidebar-nav-link">
                        <i class="fas fa-calendar-alt sidebar-nav-icon"></i>
                        Rendez-vous
                    </a>
                </li>
            </ul>
            <h4 class="sidebar-nav-title">Support</h4>
            <ul class="sidebar-nav-items">
                <li class="sidebar-nav-item">
                    <a href="" class="sidebar-nav-link">
                        <i class="fas fa-question-circle sidebar-nav-icon"></i>
                        Aide
                    </a>
                </li>
                <li class="sidebar-nav-item">
                    <a href="logout" class="sidebar-nav-link">
                        <i class="fas fa-sign-out-alt sidebar-nav-icon"></i>
                        Déconnexion
                    </a>
                </li>
            </ul>
        </div>
    </aside>

    <!-- Main Content -->
    <main class="main-content">
        <!-- Header -->
        <header class="header">
            <div class="header-left">
                <button class="menu-toggle" id="menuToggle">
                    <i class="fas fa-bars"></i>
                </button>
                <div class="header-search">
                    <input type="text" placeholder="Rechercher...">
                    <i class="fas fa-search"></i>
                </div>
            </div>
            <div class="header-right">
                <div class="header-icon">
                    <i class="far fa-bell"></i>
                    <span class="header-icon-badge">5</span>
                </div>
                <div class="header-icon">
                    <i class="far fa-envelope"></i>
                    <span class="header-icon-badge">3</span>
                </div>
                <div class="header-profile">
                    <img src="https://randomuser.me/api/portraits/men/75.jpg" alt="Admin" class="header-profile-img">
                    <div class="header-profile-info">
                        <span class="header-profile-name">Alexandre Martin</span>
                        <span class="header-profile-role">Administrateur</span>
                    </div>
                </div>
            </div>
        </header>

        <!-- Dashboard Content -->
        <h1 class="dashboard-title">Tableau de bord administrateur</h1>
        <p class="dashboard-subtitle">Bienvenue, Alexandre ! Voici un aperçu de la plateforme SmileHub.</p>
        @if (session('success'))
            <div class="alert alert-success"
                style="background-color: #10b981; color: white; padding: 15px; margin: 20px 0; border-radius: 8px;">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger"
                style="background-color: #ef4444; color: white; padding: 15px; margin: 20px 0; border-radius: 8px;">
                {{ session('error') }}
            </div>
        @endif
        @yield('dashbord')
        @yield('dentists')
        @yield('patients')
        @yield('categories')
        @yield('rendez_vous')
        @yield('statistics')
    </main>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const currentUrl = window.location.pathname;
            const navLinks = document.querySelectorAll(".sidebar-nav-link");

            navLinks.forEach(link => {
                const linkPath = new URL(link.href).pathname;

                if (currentUrl === linkPath) {
                    link.classList.add("active");
                    // console.log("Lien actif trouvé :", link.href);
                }
            });
        });
    </script>

</body>

</html>
