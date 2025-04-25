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

        /* Modal styles */
        .dentist-modal {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.6);
            animation: fadeIn 0.3s;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        .dentist-modal-content {
            position: relative;
            background-color: #fff;
            margin: 5% auto;
            padding: 0;
            width: 60%;
            max-width: 1000px;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
            animation: slideIn 0.4s;
        }

        @keyframes slideIn {
            from {
                transform: translateY(-50px);
                opacity: 0;
            }

            to {
                transform: translateY(0);
                opacity: 1;
            }
        }

        .close-modal {
            position: absolute;
            color: #aaa;
            right: 20px;
            top: 15px;
            font-size: 28px;
            font-weight: bold;
            cursor: pointer;
            z-index: 10;
            transition: color 0.2s;
        }

        .close-modal:hover {
            color: #333;
        }

        .modal-header {
            padding: 20px 25px;
            border-bottom: 1px solid #eee;
        }

        .modal-header h2 {
            margin: 0;
            color: #333;
            font-size: 24px;
        }

        .modal-body {
            padding: 25px;
        }

        .modal-grid {
            display: grid;
            grid-template-columns: 1fr 2fr;
            gap: 30px;
        }

        .dentist-profile {
            text-align: center;
            background-color: #f9f9f9;
            padding: 25px;
            border-radius: 8px;
        }

        .dentist-profile img {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            object-fit: cover;
            border: 5px solid #fff;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 15px;
        }

        .dentist-profile h3 {
            margin: 10px 0;
            color: #333;
        }

        .dentist-badges {
            display: flex;
            justify-content: center;
            gap: 10px;
            margin: 15px 0;
        }

        .status-badge,
        .specialty-badge {
            padding: 5px 12px;
            border-radius: 20px;
            font-size: 14px;
            font-weight: 600;
        }

        .status-badge.active {
            background-color: #d4edda;
            color: #155724;
        }

        .status-badge.pending {
            background-color: #fff3cd;
            color: #856404;
        }

        .status-badge.inactive {
            background-color: #f8d7da;
            color: #721c24;
        }

        .specialty-badge {
            background-color: #e2e3e5;
            color: #383d41;
        }

        .dentist-contact {
            margin-top: 20px;
            text-align: left;
        }

        .dentist-contact p {
            margin: 10px 0;
            color: #555;
        }

        .dentist-contact i {
            width: 20px;
            color: #666;
            margin-right: 8px;
        }

        .content-list {
            display: flex;
            flex-direction: column;
            gap: 15px;
            max-height: 500px;
            overflow-y: auto;
        }

        .content-item {
            padding: 15px;
            border-radius: 8px;
            background-color: #f9f9f9;
            border-left: 4px solid #4a90e2;
            transition: transform 0.2s;
        }

        .content-item:hover {
            transform: translateX(5px);
            background-color: #f0f4f8;
        }

        .content-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 10px;
        }

        .content-title {
            font-weight: 600;
            color: #333;
            margin: 0;
        }

        .content-date {
            font-size: 12px;
            color: #777;
        }

        .content-category {
            display: inline-block;
            font-size: 13px;
            padding: 3px 10px;
            background-color: #e9ecef;
            color: #495057;
            border-radius: 15px;
            margin-top: 5px;
        }

        .empty-content {
            padding: 30px;
            text-align: center;
            color: #777;
            font-style: italic;
            background-color: #f9f9f9;
            border-radius: 8px;
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
                    <div class="dentist-item" data-id="{{ $dentist->id }}"
                        data-name="Dr. {{ $dentist->user->nom }} {{ $dentist->user->prenom }}"
                        data-image="{{ $dentist->user->image }}" data-email="{{ $dentist->user->email }}"
                        data-status="{{ $dentist->user->status }}" data-specialty="{{ $dentist->speciality }}"
                        data-phone="{{ $dentist->user->phone ?? 'Non spécifié' }}"
                        data-address="{{ $dentist->user->address ?? 'Non spécifié' }}"
                        data-contents="{{ json_encode(
                            $dentist->contents->map(function ($content) {
                                return [
                                    'title' => $content->title,
                                    'created_at' => $content->created_at->format('d/m/Y'),
                                    'category' => $content->categorie ? $content->categorie->name : 'Sans catégorie',
                                ];
                            }),
                        ) }}">
                        <img src="{{ $dentist->user->image }}"
                            alt="Dr. {{ $dentist->user->nom }} {{ $dentist->user->prenom }}" class="dentist-img">
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
                                            <form action="{{ route('admin.Statistics.desactive', $user->id) }}"
                                                method="POST">
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
                                            <form action="{{ route('admin.Statistics.active', $user->id) }}"
                                                method="POST">
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

    <!-- Modal Détails Dentiste -->
    <div id="dentistModal" class="dentist-modal">
        <div class="dentist-modal-content">
            <span class="close-modal">&times;</span>
            <div class="modal-header">
                <h2>Détails du Dentiste</h2>
            </div>
            <div class="modal-body">
                <div class="modal-grid">
                    <div class="modal-left">
                        <div class="dentist-profile">
                            <img id="modal-dentist-img" src="" alt="Photo du dentiste">
                            <h3 id="modal-dentist-name"></h3>
                            <p id="modal-dentist-email"></p>
                            <div class="dentist-badges">
                                <span id="modal-dentist-status" class="status-badge"></span>
                                <span id="modal-dentist-specialty" class="specialty-badge"></span>
                            </div>
                            <div class="dentist-contact">
                                <p><i class="fas fa-phone"></i> <span id="modal-dentist-phone"></span></p>
                                <p><i class="fas fa-map-marker-alt"></i> <span id="modal-dentist-address"></span></p>
                            </div>
                        </div>
                    </div>
                    <div class="modal-right">
                        <h3>Contenus publiés</h3>
                        <div id="modal-dentist-contents" class="content-list">
                            <!-- Le contenu sera chargé dynamiquement -->
                        </div>
                    </div>
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
            // Sélectionner les éléments du DOM
            const viewButtons = document.querySelectorAll('.dentist-action.view');
            const modal = document.getElementById('dentistModal');
            const closeModalBtn = document.querySelector('.close-modal');

            // Fonction pour ouvrir le modal avec les détails du dentiste
            function openDentistModal(dentistItem) {
                // Récupérer les données depuis les attributs data
                const dentistData = dentistItem.dataset;
                const contents = JSON.parse(dentistData.contents || '[]');

                // Remplir le modal avec les données
                document.getElementById('modal-dentist-name').textContent = dentistData.name;
                document.getElementById('modal-dentist-img').src = dentistData.image ||
                    '/images/default-avatar.png';
                document.getElementById('modal-dentist-email').textContent = dentistData.email;
                document.getElementById('modal-dentist-phone').textContent = dentistData.phone;
                document.getElementById('modal-dentist-address').textContent = dentistData.address;

                // Status badge
                const statusBadge = document.getElementById('modal-dentist-status');
                statusBadge.textContent = dentistData.status;
                statusBadge.className = `status-badge ${dentistData.status.toLowerCase()}`;

                // Specialty badge
                document.getElementById('modal-dentist-specialty').textContent = dentistData.specialty;

                // Contenus
                const contentsContainer = document.getElementById('modal-dentist-contents');
                contentsContainer.innerHTML = '';

                if (contents && contents.length > 0) {
                    contents.forEach(content => {
                        const contentItem = document.createElement('div');
                        contentItem.className = 'content-item';
                        contentItem.innerHTML = `
                <div class="content-header">
                    <h4 class="content-title">${content.title}</h4>
                    <span class="content-date">${content.created_at}</span>
                </div>
                <span class="content-category">${content.category}</span>
            `;
                        contentsContainer.appendChild(contentItem);
                    });
                } else {
                    contentsContainer.innerHTML = `
            <div class="empty-content">
                <i class="fas fa-file-alt fa-2x mb-3"></i>
                <p>Ce dentiste n'a pas encore publié de contenu.</p>
            </div>
        `;
                }

                // Afficher le modal
                modal.style.display = 'block';
                document.body.style.overflow = 'hidden'; // Empêcher le défilement de la page
            }

            // Fonction pour fermer le modal
            function closeModal() {
                modal.style.display = 'none';
                document.body.style.overflow = 'auto'; // Réactiver le défilement de la page
            }

            // Événements
            viewButtons.forEach(button => {
                button.addEventListener('click', function() {
                    // Trouver l'élément parent dentist-item qui contient les données
                    const dentistItem = this.closest('.dentist-item');
                    openDentistModal(dentistItem);
                });
            });

            closeModalBtn.addEventListener('click', closeModal);

            // Fermer le modal en cliquant à l'extérieur
            window.addEventListener('click', function(event) {
                if (event.target === modal) {
                    closeModal();
                }
            });

            // Fermer le modal avec la touche Escape
            document.addEventListener('keydown', function(event) {
                if (event.key === 'Escape' && modal.style.display === 'block') {
                    closeModal();
                }
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
