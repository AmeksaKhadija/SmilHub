@extends('dentist.layout')
@section('style')
    <style>
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
@endsection
@section('dentistDashbord')
    <!-- Stats Cards -->
    <div class="stats-cards">
        <div class="stats-card">
            <div class="stats-card-icon blue">
                <i class="fas fa-calendar-check"></i>
            </div>
            <div class="stats-card-content">
                <h3 class="stats-card-title">Rendez-vous aujourd'hui</h3>
                <p class="stats-card-value">8</p>
                <div class="stats-card-change up">
                    <i class="fas fa-arrow-up"></i> +2 par rapport à hier
                </div>
            </div>
        </div>
        <div class="stats-card">
            <div class="stats-card-icon green">
                <i class="fas fa-user-plus"></i>
            </div>
            <div class="stats-card-content">
                <h3 class="stats-card-title">Nouveaux patients</h3>
                <p class="stats-card-value">12</p>
                <div class="stats-card-change up">
                    <i class="fas fa-arrow-up"></i> +5 cette semaine
                </div>
            </div>
        </div>
        <div class="stats-card">
            <div class="stats-card-icon orange">
                <i class="fas fa-euro-sign"></i>
            </div>
            <div class="stats-card-content">
                <h3 class="stats-card-title">Revenus du mois</h3>
                <p class="stats-card-value">8,540 €</p>
                <div class="stats-card-change up">
                    <i class="fas fa-arrow-up"></i> +12% ce mois-ci
                </div>
            </div>
        </div>
        <div class="stats-card">
            <div class="stats-card-icon purple">
                <i class="fas fa-clipboard-check"></i>
            </div>
            <div class="stats-card-content">
                <h3 class="stats-card-title">Traitements terminés</h3>
                <p class="stats-card-value">24</p>
                <div class="stats-card-change down">
                    <i class="fas fa-arrow-down"></i> -3 par rapport à la semaine dernière
                </div>
            </div>
        </div>
    </div>

    <!-- Dashboard Grid -->
    <div class="dashboard-grid">
        <!-- Today's Appointments -->
        <div class="dashboard-card">
            <div class="dashboard-card-header">
                <h3 class="dashboard-card-title">Rendez-vous d'aujourd'hui</h3>
                <a href="#" class="dashboard-card-action">Voir tout</a>
            </div>
            <div class="appointment-list">
                <div class="appointment-item">
                    <div class="appointment-time">09:00</div>
                    <div class="appointment-patient">
                        <img src="https://randomuser.me/api/portraits/women/65.jpg" alt="Sophie Martin"
                            class="appointment-patient-img">
                        <div class="appointment-patient-info">
                            <h4 class="appointment-patient-name">Sophie Martin</h4>
                            <p class="appointment-patient-service">Nettoyage dentaire</p>
                        </div>
                    </div>
                    <div class="appointment-status confirmed">Confirmé</div>
                    <div class="appointment-actions">
                        <div class="appointment-action view">
                            <i class="fas fa-eye"></i>
                        </div>
                        <div class="appointment-action edit">
                            <i class="fas fa-edit"></i>
                        </div>
                    </div>
                </div>
                <div class="appointment-item">
                    <div class="appointment-time">10:30</div>
                    <div class="appointment-patient">
                        <img src="https://randomuser.me/api/portraits/men/45.jpg" alt="Jean Dupont"
                            class="appointment-patient-img">
                        <div class="appointment-patient-info">
                            <h4 class="appointment-patient-name">Jean Dupont</h4>
                            <p class="appointment-patient-service">Examen de routine</p>
                        </div>
                    </div>
                    <div class="appointment-status confirmed">Confirmé</div>
                    <div class="appointment-actions">
                        <div class="appointment-action view">
                            <i class="fas fa-eye"></i>
                        </div>
                        <div class="appointment-action edit">
                            <i class="fas fa-edit"></i>
                        </div>
                    </div>
                </div>
                <div class="appointment-item">
                    <div class="appointment-time">13:45</div>
                    <div class="appointment-patient">
                        <img src="https://randomuser.me/api/portraits/women/42.jpg" alt="Marie Lefevre"
                            class="appointment-patient-img">
                        <div class="appointment-patient-info">
                            <h4 class="appointment-patient-name">Marie Lefevre</h4>
                            <p class="appointment-patient-service">Traitement de canal</p>
                        </div>
                    </div>
                    <div class="appointment-status pending">En attente</div>
                    <div class="appointment-actions">
                        <div class="appointment-action view">
                            <i class="fas fa-eye"></i>
                        </div>
                        <div class="appointment-action edit">
                            <i class="fas fa-edit"></i>
                        </div>
                    </div>
                </div>
                <div class="appointment-item">
                    <div class="appointment-time">15:30</div>
                    <div class="appointment-patient">
                        <img src="https://randomuser.me/api/portraits/men/22.jpg" alt="Pierre Moreau"
                            class="appointment-patient-img">
                        <div class="appointment-patient-info">
                            <h4 class="appointment-patient-name">Pierre Moreau</h4>
                            <p class="appointment-patient-service">Extraction dentaire</p>
                        </div>
                    </div>
                    <div class="appointment-status cancelled">Annulé</div>
                    <div class="appointment-actions">
                        <div class="appointment-action view">
                            <i class="fas fa-eye"></i>
                        </div>
                        <div class="appointment-action delete">
                            <i class="fas fa-trash"></i>
                        </div>
                    </div>
                </div>
                <div class="appointment-item">
                    <div class="appointment-time">17:00</div>
                    <div class="appointment-patient">
                        <img src="https://randomuser.me/api/portraits/women/28.jpg" alt="Claire Dubois"
                            class="appointment-patient-img">
                        <div class="appointment-patient-info">
                            <h4 class="appointment-patient-name">Claire Dubois</h4>
                            <p class="appointment-patient-service">Consultation orthodontique</p>
                        </div>
                    </div>
                    <div class="appointment-status confirmed">Confirmé</div>
                    <div class="appointment-actions">
                        <div class="appointment-action view">
                            <i class="fas fa-eye"></i>
                        </div>
                        <div class="appointment-action edit">
                            <i class="fas fa-edit"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Calendar -->
        <div class="dashboard-card">
            <div class="dashboard-card-header">
                <h3 class="dashboard-card-title">Calendrier</h3>
                <a href="#" class="dashboard-card-action">Planifier</a>
            </div>
            <div class="calendar-header">
                <h4 class="calendar-title">Mai 2025</h4>
                <div class="calendar-nav">
                    <button class="calendar-nav-btn">
                        <i class="fas fa-chevron-left"></i>
                    </button>
                    <button class="calendar-nav-btn">
                        <i class="fas fa-chevron-right"></i>
                    </button>
                </div>
            </div>
            <table class="calendar">
                <thead>
                    <tr>
                        <th>Lun</th>
                        <th>Mar</th>
                        <th>Mer</th>
                        <th>Jeu</th>
                        <th>Ven</th>
                        <th>Sam</th>
                        <th>Dim</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <div class="calendar-day other-month">28</div>
                        </td>
                        <td>
                            <div class="calendar-day other-month">29</div>
                        </td>
                        <td>
                            <div class="calendar-day other-month">30</div>
                        </td>
                        <td>
                            <div class="calendar-day">1</div>
                        </td>
                        <td>
                            <div class="calendar-day">2</div>
                        </td>
                        <td>
                            <div class="calendar-day has-events">3</div>
                        </td>
                        <td>
                            <div class="calendar-day">4</div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="calendar-day has-events">5</div>
                        </td>
                        <td>
                            <div class="calendar-day">6</div>
                        </td>
                        <td>
                            <div class="calendar-day has-events">7</div>
                        </td>
                        <td>
                            <div class="calendar-day">8</div>
                        </td>
                        <td>
                            <div class="calendar-day has-events">9</div>
                        </td>
                        <td>
                            <div class="calendar-day">10</div>
                        </td>
                        <td>
                            <div class="calendar-day">11</div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="calendar-day">12</div>
                        </td>
                        <td>
                            <div class="calendar-day has-events">13</div>
                        </td>
                        <td>
                            <div class="calendar-day">14</div>
                        </td>
                        <td>
                            <div class="calendar-day today">15</div>
                        </td>
                        <td>
                            <div class="calendar-day has-events">16</div>
                        </td>
                        <td>
                            <div class="calendar-day">17</div>
                        </td>
                        <td>
                            <div class="calendar-day">18</div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="calendar-day has-events">19</div>
                        </td>
                        <td>
                            <div class="calendar-day">20</div>
                        </td>
                        <td>
                            <div class="calendar-day has-events">21</div>
                        </td>
                        <td>
                            <div class="calendar-day">22</div>
                        </td>
                        <td>
                            <div class="calendar-day">23</div>
                        </td>
                        <td>
                            <div class="calendar-day has-events">24</div>
                        </td>
                        <td>
                            <div class="calendar-day">25</div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="calendar-day">26</div>
                        </td>
                        <td>
                            <div class="calendar-day has-events">27</div>
                        </td>
                        <td>
                            <div class="calendar-day">28</div>
                        </td>
                        <td>
                            <div class="calendar-day">29</div>
                        </td>
                        <td>
                            <div class="calendar-day has-events">30</div>
                        </td>
                        <td>
                            <div class="calendar-day">31</div>
                        </td>
                        <td>
                            <div class="calendar-day other-month">1</div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Second Row -->
    <div class="dashboard-grid">
        <!-- Recent Patients -->
        <div class="dashboard-card">
            <div class="dashboard-card-header">
                <h3 class="dashboard-card-title">Patients récents</h3>
                <a href="#" class="dashboard-card-action">Voir tous les patients</a>
            </div>
            <div class="patient-list">
                <div class="patient-item">
                    <img src="https://randomuser.me/api/portraits/women/65.jpg" alt="Sophie Martin" class="patient-img">
                    <div class="patient-info">
                        <h4 class="patient-name">Sophie Martin</h4>
                        <div class="patient-details">
                            <div class="patient-detail">
                                <i class="fas fa-calendar-alt"></i> 15 Mai 2025
                            </div>
                            <div class="patient-detail">
                                <i class="fas fa-tooth"></i> Nettoyage dentaire
                            </div>
                        </div>
                    </div>
                    <div class="patient-action">
                        <i class="fas fa-file-medical"></i>
                    </div>
                </div>
                <div class="patient-item">
                    <img src="https://randomuser.me/api/portraits/men/45.jpg" alt="Jean Dupont" class="patient-img">
                    <div class="patient-info">
                        <h4 class="patient-name">Jean Dupont</h4>
                        <div class="patient-details">
                            <div class="patient-detail">
                                <i class="fas fa-calendar-alt"></i> 14 Mai 2025
                            </div>
                            <div class="patient-detail">
                                <i class="fas fa-tooth"></i> Examen de routine
                            </div>
                        </div>
                    </div>
                    <div class="patient-action">
                        <i class="fas fa-file-medical"></i>
                    </div>
                </div>
                <div class="patient-item">
                    <img src="https://randomuser.me/api/portraits/women/42.jpg" alt="Marie Lefevre" class="patient-img">
                    <div class="patient-info">
                        <h4 class="patient-name">Marie Lefevre</h4>
                        <div class="patient-details">
                            <div class="patient-detail">
                                <i class="fas fa-calendar-alt"></i> 12 Mai 2025
                            </div>
                            <div class="patient-detail">
                                <i class="fas fa-tooth"></i> Traitement de canal
                            </div>
                        </div>
                    </div>
                    <div class="patient-action">
                        <i class="fas fa-file-medical"></i>
                    </div>
                </div>
                <div class="patient-item">
                    <img src="https://randomuser.me/api/portraits/men/22.jpg" alt="Pierre Moreau" class="patient-img">
                    <div class="patient-info">
                        <h4 class="patient-name">Pierre Moreau</h4>
                        <div class="patient-details">
                            <div class="patient-detail">
                                <i class="fas fa-calendar-alt"></i> 10 Mai 2025
                            </div>
                            <div class="patient-detail">
                                <i class="fas fa-tooth"></i> Extraction dentaire
                            </div>
                        </div>
                    </div>
                    <div class="patient-action">
                        <i class="fas fa-file-medical"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- Performance Chart -->
        <div class="dashboard-card">
            <div class="dashboard-card-header">
                <h3 class="dashboard-card-title">Performance mensuelle</h3>
                <a href="#" class="dashboard-card-action">Rapport détaillé</a>
            </div>
            <div class="chart-container">
                <canvas id="performanceChart"></canvas>
            </div>
        </div>
    </div>
@endsection

<!-- JavaScript -->
@section('scriptContent')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Mobile Menu Toggle
            const menuToggle = document.getElementById('menuToggle');
            const sidebar = document.getElementById('sidebar');
            const sidebarClose = document.getElementById('sidebarClose');

            menuToggle.addEventListener('click', function() {
                sidebar.classList.toggle('active');
            });

            sidebarClose.addEventListener('click', function() {
                sidebar.classList.remove('active');
            });

            // Performance Chart
            const ctx = document.getElementById('performanceChart').getContext('2d');
            const performanceChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: ['Jan', 'Fév', 'Mar', 'Avr', 'Mai', 'Juin'],
                    datasets: [{
                        label: 'Patients',
                        data: [65, 59, 80, 81, 56, 55],
                        backgroundColor: 'rgba(3, 105, 161, 0.2)',
                        borderColor: 'rgba(3, 105, 161, 1)',
                        borderWidth: 2,
                        tension: 0.4
                    }, {
                        label: 'Revenus (k€)',
                        data: [28, 48, 40, 19, 86, 27],
                        backgroundColor: 'rgba(20, 184, 166, 0.2)',
                        borderColor: 'rgba(20, 184, 166, 1)',
                        borderWidth: 2,
                        tension: 0.4
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });

            // Calendar Day Click
            const calendarDays = document.querySelectorAll('.calendar-day');

            calendarDays.forEach(day => {
                day.addEventListener('click', function() {
                    calendarDays.forEach(d => d.classList.remove('today'));
                    this.classList.add('today');

                    // Here you would normally fetch appointments for the selected day
                    alert(`Affichage des rendez-vous pour le ${this.textContent} Mai 2025`);
                });
            });

            // Appointment Actions
            const viewButtons = document.querySelectorAll('.appointment-action.view');
            const editButtons = document.querySelectorAll('.appointment-action.edit');
            const deleteButtons = document.querySelectorAll('.appointment-action.delete');

            viewButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const appointmentItem = this.closest('.appointment-item');
                    const patientName = appointmentItem.querySelector('.appointment-patient-name')
                        .textContent;
                    alert(`Affichage des détails du rendez-vous avec ${patientName}`);
                });
            });

            editButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const appointmentItem = this.closest('.appointment-item');
                    const patientName = appointmentItem.querySelector('.appointment-patient-name')
                        .textContent;
                    alert(`Modification du rendez-vous avec ${patientName}`);
                });
            });

            deleteButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const appointmentItem = this.closest('.appointment-item');
                    const patientName = appointmentItem.querySelector('.appointment-patient-name')
                        .textContent;

                    if (confirm(
                            `Êtes-vous sûr de vouloir supprimer le rendez-vous avec ${patientName} ?`
                            )) {
                        appointmentItem.style.opacity = '0.5';
                        setTimeout(() => {
                            appointmentItem.remove();
                        }, 500);
                    }
                });
            });

            // Patient Actions
            const patientActions = document.querySelectorAll('.patient-action');

            patientActions.forEach(action => {
                action.addEventListener('click', function() {
                    const patientItem = this.closest('.patient-item');
                    const patientName = patientItem.querySelector('.patient-name').textContent;
                    alert(`Affichage du dossier médical de ${patientName}`);
                });
            });
        });
    </script>
@endsection
