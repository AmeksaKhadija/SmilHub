@extends('./admin/layout')
@section('dashbord')
    <style>
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
            color: var(--purple);
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

        /* Dentist List */
        .dentist-list {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .dentist-item {
            display: flex;
            align-items: center;
            gap: 15px;
            padding-bottom: 15px;
            border-bottom: 1px solid var(--gray);
        }

        .dentist-item:last-child {
            padding-bottom: 0;
            border-bottom: none;
        }

        .dentist-img {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            object-fit: cover;
        }

        .dentist-info {
            flex: 1;
        }

        .dentist-name {
            font-weight: 600;
            margin-bottom: 3px;
        }

        .dentist-details {
            display: flex;
            gap: 15px;
            color: var(--text-light);
            font-size: 0.85rem;
        }

        .dentist-detail {
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .dentist-status {
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 0.75rem;
            font-weight: 500;
        }

        .dentist-status.active {
            background-color: rgba(34, 197, 94, 0.1);
            color: var(--success);
        }

        .dentist-status.inactive {
            background-color: rgba(239, 68, 68, 0.1);
            color: var(--danger);
        }

        .dentist-status.pending {
            background-color: rgba(234, 179, 8, 0.1);
            color: var(--warning);
        }

        .dentist-actions {
            display: flex;
            gap: 10px;
        }

        .dentist-action {
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

        .dentist-action.view {
            background-color: var(--info);
        }

        .dentist-action.edit {
            background-color: var(--warning);
        }

        .dentist-action.delete {
            background-color: var(--danger);
        }

        .dentist-action:hover {
            opacity: 0.9;
            transform: translateY(-2px);
        }

        /* Recent Activity */
        .activity-list {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .activity-item {
            display: flex;
            gap: 15px;
            padding-bottom: 15px;
            border-bottom: 1px solid var(--gray);
        }

        .activity-item:last-child {
            padding-bottom: 0;
            border-bottom: none;
        }

        .activity-icon {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1rem;
            flex-shrink: 0;
        }

        .activity-icon.blue {
            background-color: rgba(3, 105, 161, 0.1);
            color: var(--primary);
        }

        .activity-icon.green {
            background-color: rgba(20, 184, 166, 0.1);
            color: var(--secondary);
        }

        .activity-icon.orange {
            background-color: rgba(249, 115, 22, 0.1);
            color: var(--accent);
        }

        .activity-icon.purple {
            background-color: rgba(124, 58, 237, 0.1);
            color: var(--purple);
        }

        .activity-icon.pink {
            background-color: rgba(236, 72, 153, 0.1);
            color: var(--pink);
        }

        .activity-content {
            flex: 1;
        }

        .activity-text {
            margin-bottom: 5px;
        }

        .activity-text strong {
            font-weight: 600;
        }

        .activity-time {
            color: var(--text-light);
            font-size: 0.85rem;
            display: flex;
            align-items: center;
            gap: 5px;
        }

        /* Performance Chart */
        .chart-container {
            height: 300px;
            margin-top: 20px;
        }

        /* User Table */
        .user-table {
            width: 100%;
            border-collapse: collapse;
        }

        .user-table th {
            text-align: left;
            padding: 12px 15px;
            background-color: var(--light-gray);
            color: var(--text-dark);
            font-weight: 600;
            font-size: 0.9rem;
        }

        .user-table td {
            padding: 12px 15px;
            border-bottom: 1px solid var(--gray);
        }

        .user-table tr:last-child td {
            border-bottom: none;
        }

        .user-table-user {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .user-table-img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            object-fit: cover;
        }

        .user-table-name {
            font-weight: 600;
        }

        .user-table-email {
            color: var(--text-light);
            font-size: 0.85rem;
        }

        .user-table-status {
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 0.75rem;
            font-weight: 500;
            display: inline-block;
        }

        .user-table-status.active {
            background-color: rgba(34, 197, 94, 0.1);
            color: var(--success);
        }

        .user-table-status.inactive {
            background-color: rgba(239, 68, 68, 0.1);
            color: var(--danger);
        }

        .user-table-status.pending {
            background-color: rgba(234, 179, 8, 0.1);
            color: var(--warning);
        }

        .user-table-actions {
            display: flex;
            gap: 10px;
        }

        .user-table-action {
            width: 30px;
            height: 30px;
            border-radius: 5px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--text-light);
            cursor: pointer;
            transition: all 0.3s ease;
            background-color: var(--light-gray);
        }

        .user-table-action:hover {
            background-color: var(--gray);
            color: var(--text-dark);
        }

        /* System Status */
        .system-status {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .system-status-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding-bottom: 15px;
            border-bottom: 1px solid var(--gray);
        }

        .system-status-item:last-child {
            padding-bottom: 0;
            border-bottom: none;
        }

        .system-status-label {
            display: flex;
            align-items: center;
            gap: 10px;
            font-weight: 500;
        }

        .system-status-icon {
            width: 30px;
            height: 30px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.9rem;
        }

        .system-status-icon.green {
            background-color: rgba(34, 197, 94, 0.1);
            color: var(--success);
        }

        .system-status-icon.orange {
            background-color: rgba(234, 179, 8, 0.1);
            color: var(--warning);
        }

        .system-status-icon.red {
            background-color: rgba(239, 68, 68, 0.1);
            color: var(--danger);
        }

        .system-status-value {
            font-weight: 600;
        }

        .system-status-value.green {
            color: var(--success);
        }

        .system-status-value.orange {
            color: var(--warning);
        }

        .system-status-value.red {
            color: var(--danger);
        }

        /* Progress Bar */
        .progress-container {
            width: 100%;
            height: 8px;
            background-color: var(--light-gray);
            border-radius: 4px;
            overflow: hidden;
            margin-top: 5px;
        }

        .progress-bar {
            height: 100%;
            border-radius: 4px;
            transition: width 0.3s ease;
        }

        .progress-bar.green {
            background-color: var(--success);
        }

        .progress-bar.orange {
            background-color: var(--warning);
        }

        .progress-bar.red {
            background-color: var(--danger);
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

            .user-table {
                display: block;
                overflow-x: auto;
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

            .dentist-item {
                flex-direction: column;
                align-items: flex-start;
                gap: 10px;
            }

            .dentist-actions {
                align-self: flex-end;
            }
        }
    </style>
    <!-- Stats Cards -->
    <div class="stats-cards">
        <div class="stats-card">
            <div class="stats-card-icon blue">
                <i class="fas fa-user-md"></i>
            </div>
            <div class="stats-card-content">
                <h3 class="stats-card-title">Dentistes actifs</h3>
                <p class="stats-card-value">15</p>
                <div class="stats-card-change up">
                    <i class="fas fa-arrow-up"></i> +2 ce mois-ci
                </div>
            </div>
        </div>
        <div class="stats-card">
            <div class="stats-card-icon green">
                <i class="fas fa-users"></i>
            </div>
            <div class="stats-card-content">
                <h3 class="stats-card-title">Patients inscrits</h3>
                <p class="stats-card-value">1,248</p>
                <div class="stats-card-change up">
                    <i class="fas fa-arrow-up"></i> +124 ce mois-ci
                </div>
            </div>
        </div>
        <div class="stats-card">
            <div class="stats-card-icon orange">
                <i class="fas fa-calendar-check"></i>
            </div>
            <div class="stats-card-content">
                <h3 class="stats-card-title">Rendez-vous</h3>
                <p class="stats-card-value">328</p>
                <div class="stats-card-change up">
                    <i class="fas fa-arrow-up"></i> +18% ce mois-ci
                </div>
            </div>
        </div>
        <div class="stats-card">
            <div class="stats-card-icon purple">
                <i class="fas fa-euro-sign"></i>
            </div>
            <div class="stats-card-content">
                <h3 class="stats-card-title">Revenus totaux</h3>
                <p class="stats-card-value">42,580 €</p>
                <div class="stats-card-change up">
                    <i class="fas fa-arrow-up"></i> +8% ce mois-ci
                </div>
            </div>
        </div>
    </div>

    <!-- Dashboard Grid -->
    <div class="dashboard-grid">
        <!-- Dentist Management -->
        <div class="dashboard-card">
            <div class="dashboard-card-header">
                <h3 class="dashboard-card-title">Gestion des dentistes</h3>
                <a href="#" class="dashboard-card-action">Ajouter un dentiste</a>
            </div>
            <div class="dentist-list">
                <div class="dentist-item">
                    <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="Dr. Thomas Dubois" class="dentist-img">
                    <div class="dentist-info">
                        <h4 class="dentist-name">Dr. Thomas Dubois</h4>
                        <div class="dentist-details">
                            <div class="dentist-detail">
                                <i class="fas fa-tooth"></i> Dentiste général
                            </div>
                            <div class="dentist-detail">
                                <i class="fas fa-calendar-alt"></i> 128 rendez-vous
                            </div>
                        </div>
                    </div>
                    <div class="dentist-status active">Actif</div>
                    <div class="dentist-actions">
                        <div class="dentist-action view">
                            <i class="fas fa-eye"></i>
                        </div>
                        <div class="dentist-action edit">
                            <i class="fas fa-edit"></i>
                        </div>
                    </div>
                </div>
                <div class="dentist-item">
                    <img src="https://randomuser.me/api/portraits/women/42.jpg" alt="Dr. Marie Leroy" class="dentist-img">
                    <div class="dentist-info">
                        <h4 class="dentist-name">Dr. Marie Leroy</h4>
                        <div class="dentist-details">
                            <div class="dentist-detail">
                                <i class="fas fa-tooth"></i> Orthodontiste
                            </div>
                            <div class="dentist-detail">
                                <i class="fas fa-calendar-alt"></i> 95 rendez-vous
                            </div>
                        </div>
                    </div>
                    <div class="dentist-status active">Actif</div>
                    <div class="dentist-actions">
                        <div class="dentist-action view">
                            <i class="fas fa-eye"></i>
                        </div>
                        <div class="dentist-action edit">
                            <i class="fas fa-edit"></i>
                        </div>
                    </div>
                </div>
                <div class="dentist-item">
                    <img src="https://randomuser.me/api/portraits/men/45.jpg" alt="Dr. Pierre Moreau" class="dentist-img">
                    <div class="dentist-info">
                        <h4 class="dentist-name">Dr. Pierre Moreau</h4>
                        <div class="dentist-details">
                            <div class="dentist-detail">
                                <i class="fas fa-tooth"></i> Implantologue
                            </div>
                            <div class="dentist-detail">
                                <i class="fas fa-calendar-alt"></i> 76 rendez-vous
                            </div>
                        </div>
                    </div>
                    <div class="dentist-status inactive">Inactif</div>
                    <div class="dentist-actions">
                        <div class="dentist-action view">
                            <i class="fas fa-eye"></i>
                        </div>
                        <div class="dentist-action edit">
                            <i class="fas fa-edit"></i>
                        </div>
                    </div>
                </div>
                <div class="dentist-item">
                    <img src="https://randomuser.me/api/portraits/women/28.jpg" alt="Dr. Claire Dubois" class="dentist-img">
                    <div class="dentist-info">
                        <h4 class="dentist-name">Dr. Claire Dubois</h4>
                        <div class="dentist-details">
                            <div class="dentist-detail">
                                <i class="fas fa-tooth"></i> Pédodontiste
                            </div>
                            <div class="dentist-detail">
                                <i class="fas fa-calendar-alt"></i> 112 rendez-vous
                            </div>
                        </div>
                    </div>
                    <div class="dentist-status pending">En attente</div>
                    <div class="dentist-actions">
                        <div class="dentist-action view">
                            <i class="fas fa-eye"></i>
                        </div>
                        <div class="dentist-action edit">
                            <i class="fas fa-edit"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Recent Activity -->
        <div class="dashboard-card">
            <div class="dashboard-card-header">
                <h3 class="dashboard-card-title">Activité récente</h3>
                <a href="#" class="dashboard-card-action">Voir tout</a>
            </div>
            <div class="activity-list">
                <div class="activity-item">
                    <div class="activity-icon blue">
                        <i class="fas fa-user-plus"></i>
                    </div>
                    <div class="activity-content">
                        <p class="activity-text"><strong>Nouveau patient</strong> inscrit sur la plateforme</p>
                        <p class="activity-time"><i class="far fa-clock"></i> Il y a 5 minutes</p>
                    </div>
                </div>
                <div class="activity-item">
                    <div class="activity-icon green">
                        <i class="fas fa-calendar-plus"></i>
                    </div>
                    <div class="activity-content">
                        <p class="activity-text"><strong>Nouveau rendez-vous</strong> créé par Dr. Thomas Dubois
                        </p>
                        <p class="activity-time"><i class="far fa-clock"></i> Il y a 15 minutes</p>
                    </div>
                </div>
                <div class="activity-item">
                    <div class="activity-icon orange">
                        <i class="fas fa-file-invoice-dollar"></i>
                    </div>
                    <div class="activity-content">
                        <p class="activity-text"><strong>Paiement reçu</strong> de 120€ pour consultation</p>
                        <p class="activity-time"><i class="far fa-clock"></i> Il y a 45 minutes</p>
                    </div>
                </div>
                <div class="activity-item">
                    <div class="activity-icon purple">
                        <i class="fas fa-user-md"></i>
                    </div>
                    <div class="activity-content">
                        <p class="activity-text"><strong>Nouveau dentiste</strong> a rejoint la plateforme</p>
                        <p class="activity-time"><i class="far fa-clock"></i> Il y a 2 heures</p>
                    </div>
                </div>
                <div class="activity-item">
                    <div class="activity-icon pink">
                        <i class="fas fa-calendar-times"></i>
                    </div>
                    <div class="activity-content">
                        <p class="activity-text"><strong>Rendez-vous annulé</strong> par un patient</p>
                        <p class="activity-time"><i class="far fa-clock"></i> Il y a 3 heures</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Second Row -->
    <div class="dashboard-grid">
        <!-- User Management -->
        <div class="dashboard-card">
            <div class="dashboard-card-header">
                <h3 class="dashboard-card-title">Gestion des utilisateurs</h3>
                <a href="#" class="dashboard-card-action">Voir tous les utilisateurs</a>
            </div>
            <table class="user-table">
                <thead>
                    <tr>
                        <th>Utilisateur</th>
                        <th>Rôle</th>
                        <th>Statut</th>
                        <th>Dernière connexion</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <div class="user-table-user">
                                <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="Dr. Thomas Dubois"
                                    class="user-table-img">
                                <div>
                                    <div class="user-table-name">Dr. Thomas Dubois</div>
                                    <div class="user-table-email">thomas.dubois@smilehub.fr</div>
                                </div>
                            </div>
                        </td>
                        <td>Dentiste</td>
                        <td><span class="user-table-status active">Actif</span></td>
                        <td>Il y a 10 minutes</td>
                        <td>
                            <div class="user-table-actions">
                                <div class="user-table-action">
                                    <i class="fas fa-eye"></i>
                                </div>
                                <div class="user-table-action">
                                    <i class="fas fa-edit"></i>
                                </div>
                                <div class="user-table-action">
                                    <i class="fas fa-trash"></i>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="user-table-user">
                                <img src="https://randomuser.me/api/portraits/women/65.jpg" alt="Sophie Martin"
                                    class="user-table-img">
                                <div>
                                    <div class="user-table-name">Sophie Martin</div>
                                    <div class="user-table-email">sophie.martin@gmail.com</div>
                                </div>
                            </div>
                        </td>
                        <td>Patient</td>
                        <td><span class="user-table-status active">Actif</span></td>
                        <td>Il y a 2 heures</td>
                        <td>
                            <div class="user-table-actions">
                                <div class="user-table-action">
                                    <i class="fas fa-eye"></i>
                                </div>
                                <div class="user-table-action">
                                    <i class="fas fa-edit"></i>
                                </div>
                                <div class="user-table-action">
                                    <i class="fas fa-trash"></i>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="user-table-user">
                                <img src="https://randomuser.me/api/portraits/women/42.jpg" alt="Dr. Marie Leroy"
                                    class="user-table-img">
                                <div>
                                    <div class="user-table-name">Dr. Marie Leroy</div>
                                    <div class="user-table-email">marie.leroy@smilehub.fr</div>
                                </div>
                            </div>
                        </td>
                        <td>Dentiste</td>
                        <td><span class="user-table-status active">Actif</span></td>
                        <td>Il y a 1 jour</td>
                        <td>
                            <div class="user-table-actions">
                                <div class="user-table-action">
                                    <i class="fas fa-eye"></i>
                                </div>
                                <div class="user-table-action">
                                    <i class="fas fa-edit"></i>
                                </div>
                                <div class="user-table-action">
                                    <i class="fas fa-trash"></i>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="user-table-user">
                                <img src="https://randomuser.me/api/portraits/men/45.jpg" alt="Jean Dupont"
                                    class="user-table-img">
                                <div>
                                    <div class="user-table-name">Jean Dupont</div>
                                    <div class="user-table-email">jean.dupont@outlook.com</div>
                                </div>
                            </div>
                        </td>
                        <td>Patient</td>
                        <td><span class="user-table-status inactive">Inactif</span></td>
                        <td>Il y a 15 jours</td>
                        <td>
                            <div class="user-table-actions">
                                <div class="user-table-action">
                                    <i class="fas fa-eye"></i>
                                </div>
                                <div class="user-table-action">
                                    <i class="fas fa-edit"></i>
                                </div>
                                <div class="user-table-action">
                                    <i class="fas fa-trash"></i>
                                </div>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- System Status -->
        <div class="dashboard-card">
            <div class="dashboard-card-header">
                <h3 class="dashboard-card-title">État du système</h3>
                <a href="#" class="dashboard-card-action">Paramètres</a>
            </div>
            <div class="system-status">
                <div class="system-status-item">
                    <div class="system-status-label">
                        <div class="system-status-icon green">
                            <i class="fas fa-server"></i>
                        </div>
                        Serveur
                    </div>
                    <div class="system-status-value green">Opérationnel</div>
                </div>
                <div class="system-status-item">
                    <div class="system-status-label">
                        <div class="system-status-icon green">
                            <i class="fas fa-database"></i>
                        </div>
                        Base de données
                    </div>
                    <div class="system-status-value green">Opérationnel</div>
                </div>
                <div class="system-status-item">
                    <div class="system-status-label">
                        <div class="system-status-icon orange">
                            <i class="fas fa-hdd"></i>
                        </div>
                        Espace disque
                    </div>
                    <div class="system-status-value orange">75% utilisé</div>
                    <div class="progress-container">
                        <div class="progress-bar orange" style="width: 75%"></div>
                    </div>
                </div>
                <div class="system-status-item">
                    <div class="system-status-label">
                        <div class="system-status-icon green">
                            <i class="fas fa-memory"></i>
                        </div>
                        Mémoire
                    </div>
                    <div class="system-status-value green">42% utilisé</div>
                    <div class="progress-container">
                        <div class="progress-bar green" style="width: 42%"></div>
                    </div>
                </div>
                <div class="system-status-item">
                    <div class="system-status-label">
                        <div class="system-status-icon green">
                            <i class="fas fa-shield-alt"></i>
                        </div>
                        Sécurité
                    </div>
                    <div class="system-status-value green">Protégé</div>
                </div>
                <div class="system-status-item">
                    <div class="system-status-label">
                        <div class="system-status-icon green">
                            <i class="fas fa-clock"></i>
                        </div>
                        Dernière sauvegarde
                    </div>
                    <div class="system-status-value">Il y a 2 heures</div>
                </div>
            </div>
        </div>
    </div>

    </main>

    <!-- JavaScript -->
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

            // Dentist Actions
            const viewButtons = document.querySelectorAll('.dentist-action.view');
            const editButtons = document.querySelectorAll('.dentist-action.edit');

            viewButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const dentistItem = this.closest('.dentist-item');
                    const dentistName = dentistItem.querySelector('.dentist-name').textContent;
                    alert(`Affichage du profil de ${dentistName}`);
                });
            });

            editButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const dentistItem = this.closest('.dentist-item');
                    const dentistName = dentistItem.querySelector('.dentist-name').textContent;
                    alert(`Modification du profil de ${dentistName}`);
                });
            });

            // User Table Actions
            const userTableActions = document.querySelectorAll('.user-table-action');

            userTableActions.forEach(action => {
                action.addEventListener('click', function() {
                    const row = this.closest('tr');
                    const userName = row.querySelector('.user-table-name').textContent;

                    if (this.querySelector('.fa-eye')) {
                        alert(`Affichage du profil de ${userName}`);
                    } else if (this.querySelector('.fa-edit')) {
                        alert(`Modification du profil de ${userName}`);
                    } else if (this.querySelector('.fa-trash')) {
                        if (confirm(`Êtes-vous sûr de vouloir supprimer ${userName} ?`)) {
                            row.style.opacity = '0.5';
                            setTimeout(() => {
                                row.remove();
                            }, 500);
                        }
                    }
                });
            });
        });
    </script>
@endsection
