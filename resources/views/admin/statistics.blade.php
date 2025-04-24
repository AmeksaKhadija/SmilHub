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
            grid-template-columns: 1fr;
            gap: 30px;
            margin-bottom: 40px;
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
            margin-top: 20px;
        }

        .dentist-item {
            display: flex;
            align-items: center;
            gap: 20px;
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
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .user-table-btn {
            background-color: #ffdddd;
            border: none;
            border-radius: 8px;
            padding: 6px 10px;
            font-size: 16px;
            color: #d10000;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }

        .user-table-btn-unlock {
            background-color: #9dffc9;
            border: none;
            border-radius: 8px;
            padding: 6px 10px;
            font-size: 16px;
            color: #00d12a9a;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }

        .user-table-btn-unlock:hover {
            background-color: #06fe3893;
            transform: scale(1.05);
            color: #06fe38;
        }

        .user-table-btn:hover {
            background-color: #ffb3b3;
            transform: scale(1.05);
            color: #8b0000;
        }

        .user-table-btn i {
            pointer-events: none;
        }

        .user-table-btn-unlock i {
            pointer-events: none;
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
            <div class="stats-card-icon green">
                <i class="fas fa-users"></i>
            </div>
            <div class="stats-card-content">
                <h3 class="stats-card-title">Total des utilisateurs</h3>
                <p class="stats-card-value">{{ $userCount }}</p>
                <div class="stats-card-change up">
                    <i class="fas fa-arrow-up"></i> +124 ce mois-ci
                </div>
            </div>
        </div>
        <div class="stats-card">
            <div class="stats-card-icon blue">
                <i class="fas fa-user-md"></i>
            </div>
            <div class="stats-card-content">
                <h3 class="stats-card-title">Dentistes actifs</h3>
                <p class="stats-card-value">{{ $dentistsActifs }}</p>
                <div class="stats-card-change up">
                    <i class="fas fa-arrow-up"></i> +2 ce mois-ci
                </div>
            </div>
        </div>
        <div class="stats-card">
            <div class="stats-card-icon blue">
                <i class="fas fa-user-md"></i>
            </div>
            <div class="stats-card-content">
                <h3 class="stats-card-title">Dentistes inactifs</h3>
                <p class="stats-card-value">{{ $dentistsInactifs }}</p>
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
                <p class="stats-card-value">{{ $patientsCount }}</p>
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
                <p class="stats-card-value">{{ $appointmentsCount }}</p>
                <div class="stats-card-change up">
                    <i class="fas fa-arrow-up"></i> +18% ce mois-ci
                </div>
            </div>
        </div>
    </div>

    <!-- Dashboard Grid -->
    <div class="dashboard-grid">
        <!-- Dentist Management -->
        <div class="dashboard-card">
            <div class="dashboard-card-header">
                <h3 class="dashboard-card-title">Dentistes</h3>
            </div>
            @foreach ($dentists as $dentist)
                <div class="dentist-list">
                    <div class="dentist-item">
                        <img src="{{ $dentist->user->image }}" alt="Dr. Thomas Dubois" class="dentist-img">
                        <div class="dentist-info">
                            <h4 class="dentist-name">Dr. {{ $dentist->user->nom }} {{ $dentist->user->prenom }}</h4>
                            <div class="dentist-details">
                                <div class="dentist-detail">
                                    <i class="fas fa-tooth"></i> {{ $dentist->speciality }}
                                </div>
                                <div class="dentist-detail">
                                    <i class="fas fa-calendar-alt"></i> {{ $dentist->contents->count() }}
                                </div>
                            </div>
                        </div>
                        <div class="dentist-status {{ strtolower($dentist->user->status) }}">{{ $dentist->user->status }}
                        </div>
                        <div class="dentist-actions">
                            <div class="dentist-action view">
                                <i class="fas fa-eye"></i>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    </div>

    <!-- Second Row -->
    <div class="dashboard-grid">
        <!-- User Management -->
        <div class="dashboard-card">
            <div class="dashboard-card-header">
                <h3 class="dashboard-card-title">Gestion des utilisateurs</h3>
            </div>
            <table class="user-table">
                <thead>
                    <tr>
                        <th>Utilisateur</th>
                        <th>Numéro du téléphone</th>
                        <th>Rôle</th>
                        <th>Statut</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>
                                <div class="user-table-user">
                                    <img src="{{ $user->image }}" alt="Dr. Thomas Dubois" class="user-table-img">
                                    <div>
                                        @if ($user->role == 'dentiste')
                                            <div class="user-table-name">Dr. {{ $user->nom }} {{ $user->prenom }}</div>
                                        @else
                                            <div class="user-table-name">{{ $user->nom }} {{ $user->prenom }}</div>
                                        @endif
                                        <div class="user-table-email">{{ $user->email }}</div>
                                    </div>
                                </div>
                            </td>
                            <td>{{ $user->phone }}</td>
                            <td>{{ $user->role }}</td>
                            <td><span class="user-table-status {{ strtolower($user->status) }}">{{ $user->status }}</span>
                            </td>
                            <td>
                                <div class="user-table-actions">
                                    <div class="user-table-action">
                                        @if ($dentist->user->status)
                                            <form action="{{ route('admin.Statistics.desactive', $user->id) }}" method="POST">
                                                @csrf
                                                @method('PATCH')
                                                <button type="submit" class="user-table-btn" title="Rendre inactif">
                                                    <i class="fa fa-lock" aria-hidden="true"></i>
                                                </button>
                                            </form>
                                        @endif
                                    </div>
                                    <div class="user-table-action">
                                        @if ($dentist->user->status)
                                            <form action="{{ route('admin.Statistics.active', $user->id) }}" method="POST">
                                                @csrf
                                                @method('PATCH')
                                                <button type="submit" class="user-table-btn-unlock" title="Rendre active">
                                                    <i class="fa fa-unlock-alt" aria-hidden="true"></i>
                                                </button>
                                            </form>
                                        @endif
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
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

            viewButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const dentistItem = this.closest('.dentist-item');
                    const dentistName = dentistItem.querySelector('.dentist-name').textContent;
                    alert(`Affichage du profil de ${dentistName}`);
                });
            });


            // User Table Actions
            const userTableActions = document.querySelectorAll('.user-table-action');

            userTableActions.forEach(action => {
                action.addEventListener('click', function() {
                    const row = this.closest('tr');
                    const userName = row.querySelector('.user-table-name').textContent;
                    if (this.querySelector('.fa-trash')) {
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
