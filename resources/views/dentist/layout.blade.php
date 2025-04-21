<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de Bord Dentiste - SmileHub</title>

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
            background-color: var(--white);
            height: 100vh;
            position: fixed;
            left: 0;
            top: 0;
            overflow-y: auto;
            box-shadow: var(--shadow);
            z-index: 100;
            transition: all 0.3s ease;
        }

        .sidebar-header {
            padding: 20px;
            display: flex;
            align-items: center;
            background-color: var(--primary);
            color: var(--white);
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
            border-bottom: 1px solid var(--gray);
        }

        .sidebar-profile-img {
            width: 100px;
            height: 100px;
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
            color: var(--text-light);
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
            color: var(--text-light);
            font-weight: 500;
            transition: all 0.3s ease;
            border-left: 3px solid transparent;
        }

        .sidebar-nav-link.active {
            background-color: var(--light-gray);
            color: var(--primary);
            border-left-color: var(--primary);
        }

        .sidebar-nav-link:hover {
            background-color: var(--light-gray);
            color: var(--primary);
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

        /* Stats Cards */
        .stats-cards {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
            margin-bottom: 30px;
        }

        .stats-card {
            background-color: var(--white);
            border-radius: 10px;
            padding: 20px;
            box-shadow: var(--shadow);
            display: flex;
            align-items: center;
            gap: 20px;
            transition: all 0.3s ease;
        }

        .stats-card:hover {
            transform: translateY(-5px);
            box-shadow: var(--shadow-md);
        }

        .stats-card-icon {
            width: 60px;
            height: 60px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.8rem;
        }

        .stats-card-icon.blue {
            background-color: rgba(3, 105, 161, 0.1);
            color: var(--primary);
        }

        .stats-card-icon.green {
            background-color: rgba(20, 184, 166, 0.1);
            color: var(--secondary);
        }

        .stats-card-icon.orange {
            background-color: rgba(249, 115, 22, 0.1);
            color: var(--accent);
        }

        .stats-card-icon.purple {
            background-color: rgba(124, 58, 237, 0.1);
            color: #7c3aed;
        }

        .stats-card-content {
            flex: 1;
        }

        .stats-card-title {
            color: var(--text-light);
            font-size: 0.9rem;
            margin-bottom: 5px;
        }

        .stats-card-value {
            font-size: 1.8rem;
            font-weight: 700;
        }

        .stats-card-change {
            display: flex;
            align-items: center;
            gap: 5px;
            font-size: 0.8rem;
            margin-top: 5px;
        }

        .stats-card-change.up {
            color: var(--success);
        }

        .stats-card-change.down {
            color: var(--danger);
        }

        /* Dashboard Grid */
        .dashboard-grid {
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 20px;
            margin-bottom: 30px;
        }

        .dashboard-card {
            background-color: var(--white);
            border-radius: 10px;
            padding: 20px;
            box-shadow: var(--shadow);
        }

        .dashboard-card-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .dashboard-card-title {
            font-size: 1.2rem;
            font-weight: 600;
        }

        .dashboard-card-action {
            color: var(--primary);
            font-size: 0.9rem;
            font-weight: 500;
        }

        .dashboard-card-action:hover {
            text-decoration: underline;
        }

        /* Appointments */
        .appointment-list {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .appointment-item {
            display: flex;
            align-items: center;
            gap: 15px;
            padding-bottom: 15px;
            border-bottom: 1px solid var(--gray);
        }

        .appointment-item:last-child {
            padding-bottom: 0;
            border-bottom: none;
        }

        .appointment-time {
            width: 80px;
            text-align: center;
            font-weight: 600;
            color: var(--primary);
        }

        .appointment-patient {
            flex: 1;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .appointment-patient-img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            object-fit: cover;
        }

        .appointment-patient-info {
            display: flex;
            flex-direction: column;
        }

        .appointment-patient-name {
            font-weight: 600;
        }

        .appointment-patient-service {
            color: var(--text-light);
            font-size: 0.85rem;
        }

        .appointment-status {
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 0.75rem;
            font-weight: 500;
        }

        .appointment-status.confirmed {
            background-color: rgba(34, 197, 94, 0.1);
            color: var(--success);
        }

        .appointment-status.pending {
            background-color: rgba(234, 179, 8, 0.1);
            color: var(--warning);
        }

        .appointment-status.cancelled {
            background-color: rgba(239, 68, 68, 0.1);
            color: var(--danger);
        }

        .appointment-actions {
            display: flex;
            gap: 10px;
        }

        .appointment-action {
            width: 30px;
            height: 30px;
            border-radius: 5px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--white);
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .appointment-action.view {
            background-color: var(--info);
        }

        .appointment-action.edit {
            background-color: var(--warning);
        }

        .appointment-action.delete {
            background-color: var(--danger);
        }

        .appointment-action:hover {
            opacity: 0.9;
            transform: translateY(-2px);
        }

        /* Recent Patients */
        .patient-list {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .patient-item {
            display: flex;
            align-items: center;
            gap: 15px;
            padding-bottom: 15px;
            border-bottom: 1px solid var(--gray);
        }

        .patient-item:last-child {
            padding-bottom: 0;
            border-bottom: none;
        }

        .patient-img {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            object-fit: cover;
        }

        .patient-info {
            flex: 1;
        }

        .patient-name {
            font-weight: 600;
            margin-bottom: 3px;
        }

        .patient-details {
            display: flex;
            gap: 15px;
            color: var(--text-light);
            font-size: 0.85rem;
        }

        .patient-detail {
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .patient-action {
            color: var(--primary);
            font-size: 1.2rem;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .patient-action:hover {
            color: var(--primary-dark);
            transform: translateY(-2px);
        }

        /* Calendar */
        .calendar-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
        }

        .calendar-title {
            font-weight: 600;
            font-size: 1.1rem;
        }

        .calendar-nav {
            display: flex;
            gap: 10px;
        }

        .calendar-nav-btn {
            width: 30px;
            height: 30px;
            border-radius: 5px;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: var(--light-gray);
            color: var(--text-dark);
            cursor: pointer;
            transition: all 0.3s ease;
            border: none;
        }

        .calendar-nav-btn:hover {
            background-color: var(--gray);
        }

        .calendar {
            width: 100%;
            border-collapse: collapse;
        }

        .calendar th {
            padding: 10px;
            text-align: center;
            font-weight: 500;
            color: var(--text-light);
            font-size: 0.9rem;
        }

        .calendar td {
            padding: 5px;
            text-align: center;
        }

        .calendar-day {
            width: 36px;
            height: 36px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto;
            border-radius: 50%;
            cursor: pointer;
            transition: all 0.3s ease;
            position: relative;
        }

        .calendar-day:hover {
            background-color: var(--light-gray);
        }

        .calendar-day.today {
            background-color: var(--primary-light);
            color: var(--white);
            font-weight: 600;
        }

        .calendar-day.has-events::after {
            content: '';
            position: absolute;
            bottom: 2px;
            width: 4px;
            height: 4px;
            border-radius: 50%;
            background-color: var(--accent);
        }

        .calendar-day.other-month {
            color: var(--text-lighter);
            opacity: 0.5;
        }

        /* Performance Chart */
        .chart-container {
            height: 300px;
            margin-top: 20px;
        }

        /* Responsive */
        @media (max-width: 1200px) {
            .stats-cards {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 992px) {
            .sidebar {
                transform: translateX(-100%);
                z-index: 1000;
            }

            .sidebar.active {
                transform: translateX(0);
            }

            .sidebar-close {
                display: block;
            }

            .main-content {
                margin-left: 0;
            }

            .menu-toggle {
                display: block;
            }

            .dashboard-grid {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 768px) {
            .header-search input {
                width: 200px;
            }

            .stats-cards {
                grid-template-columns: 1fr;
            }

            .header-profile-info {
                display: none;
            }
        }

        @media (max-width: 576px) {
            .header {
                flex-direction: column;
                align-items: flex-start;
                gap: 15px;
            }

            .header-search {
                width: 100%;
            }

            .header-search input {
                width: 100%;
            }

            .header-right {
                width: 100%;
                justify-content: space-between;
            }

            .appointment-item {
                flex-direction: column;
                align-items: flex-start;
                gap: 10px;
            }

            .appointment-time {
                width: auto;
                text-align: left;
            }

            .appointment-actions {
                align-self: flex-end;
            }
        }
    </style>
</head>

<body>
    <!-- Sidebar -->
    <aside class="sidebar" id="sidebar">
        <div class="sidebar-header">
            <div class="sidebar-logo">
                <svg width="30" height="30" viewBox="0 0 50 50" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <!-- Fond circulaire -->
                    <circle cx="25" cy="25" r="24" fill="white" />

                    <!-- Dent stylisée -->
                    <path d="M25 10C21.5 10 19 12 18 14C17 16 16 18 15 22C14 26 13 30 15 33C17 36 19 37 21 37C23 37 24 35 25 33C26 35 27 37 29 37C31 37 33 36 35 33C37 30 36 26 35 22C34 18 33 16 32 14C31 12 28.5 10 25 10Z" fill="#0369a1" />

                    <!-- Sourire sous la dent -->
                    <path d="M18 28C20 31 23 33 25 33C27 33 30 31 32 28" stroke="#0369a1" stroke-width="2" stroke-linecap="round" />
                </svg>
                <span class="sidebar-logo-text">SmileHub</span>
            </div>
            <button class="sidebar-close" id="sidebarClose">
                <i class="fas fa-times"></i>
            </button>
        </div>
        <div class="sidebar-profile">
            <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="Dr. Thomas Dubois" class="sidebar-profile-img">
            <h3 class="sidebar-profile-name">Dr. Thomas Dubois</h3>
            <p class="sidebar-profile-role">Dentiste</p>
            <div class="sidebar-profile-status online">En ligne</div>
        </div>
        <div class="sidebar-nav">
            <h4 class="sidebar-nav-title">Menu principal</h4>
            <ul class="sidebar-nav-items">
                <li class="sidebar-nav-item">
                    <a href="#" class="sidebar-nav-link active">
                        <i class="fas fa-home sidebar-nav-icon"></i>
                        Tableau de bord
                    </a>
                </li>
                <li class="sidebar-nav-item">
                    <a href="#" class="sidebar-nav-link">
                        <i class="fas fa-calendar-alt sidebar-nav-icon"></i>
                        Rendez-vous
                        <span class="sidebar-nav-badge">8</span>
                    </a>
                </li>
                <li class="sidebar-nav-item">
                    <a href="#" class="sidebar-nav-link">
                        <i class="fas fa-users sidebar-nav-icon"></i>
                        Patients
                    </a>
                </li>
                <li class="sidebar-nav-item">
                    <a href="#" class="sidebar-nav-link">
                        <i class="fas fa-clipboard-list sidebar-nav-icon"></i>
                        Traitements
                    </a>
                </li>
                <li class="sidebar-nav-item">
                    <a href="#" class="sidebar-nav-link">
                        <i class="fas fa-chart-line sidebar-nav-icon"></i>
                        Statistiques
                    </a>
                </li>
            </ul>
            <h4 class="sidebar-nav-title" style="margin-top: 20px;">Gestion</h4>
            <ul class="sidebar-nav-items">
                <li class="sidebar-nav-item">
                    <a href="#" class="sidebar-nav-link">
                        <i class="fas fa-file-invoice-dollar sidebar-nav-icon"></i>
                        Facturation
                    </a>
                </li>
                <li class="sidebar-nav-item">
                    <a href="#" class="sidebar-nav-link">
                        <i class="fas fa-pills sidebar-nav-icon"></i>
                        Médicaments
                    </a>
                </li>
                <li class="sidebar-nav-item">
                    <a href="#" class="sidebar-nav-link">
                        <i class="fas fa-cog sidebar-nav-icon"></i>
                        Paramètres
                    </a>
                </li>
            </ul>
        </div>
    </aside>
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
                    <span class="header-icon-badge">3</span>
                </div>
                <div class="header-icon">
                    <i class="far fa-envelope"></i>
                    <span class="header-icon-badge">5</span>
                </div>
                <div class="header-profile">
                    <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="Dr. Thomas Dubois" class="header-profile-img">
                    <div class="header-profile-info">
                        <span class="header-profile-name">Dr. Thomas Dubois</span>
                        <span class="header-profile-role">Dentiste</span>
                    </div>
                </div>
            </div>
        </header>
        <!-- Dashboard Content -->
        <h1 class="dashboard-title">Tableau de bord</h1>
        <p class="dashboard-subtitle">Bienvenue, Dr. Dubois ! Voici un aperçu de votre journée.</p>

    @yield('content')

    </main>
    @yield('scriptContent')

</body>

</html>