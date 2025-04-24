@extends('./admin/layout')
@section('dentists')
    <style>
        /* Styles pour la gestion des dentistes */
        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .page-title {
            font-size: 1.5rem;
            font-weight: 600;
            color: var(--text-dark);
        }

        .btn {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 10px 20px;
            border-radius: 8px;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s ease;
            border: none;
            font-family: 'Poppins', sans-serif;
        }

        .btn-primary {
            background-color: var(--primary);
            color: var(--white);
            box-shadow: 0 4px 6px rgba(3, 105, 161, 0.2);
        }

        .btn-primary:hover {
            background-color: var(--primary-dark);
            transform: translateY(-3px);
            box-shadow: var(--shadow-md);
        }

        .btn-success {
            background-color: var(--success);
            color: var(--white);
            box-shadow: 0 4px 6px rgba(34, 197, 94, 0.2);
        }

        .btn-success:hover {
            background-color: #16a34a;
            transform: translateY(-3px);
            box-shadow: var(--shadow-md);
        }

        .btn-warning {
            background-color: var(--warning);
            color: var(--white);
            box-shadow: 0 4px 6px rgba(234, 179, 8, 0.2);
        }

        .btn-warning:hover {
            background-color: #ca8a04;
            transform: translateY(-3px);
            box-shadow: var(--shadow-md);
        }

        .btn-danger {
            background-color: var(--danger);
            color: var(--white);
            box-shadow: 0 4px 6px rgba(239, 68, 68, 0.2);
        }

        .btn-danger:hover {
            background-color: #dc2626;
            transform: translateY(-3px);
            box-shadow: var(--shadow-md);
        }

        .filter-bar {
            display: flex;
            gap: 15px;
            margin-bottom: 20px;
            background-color: var(--white);
            padding: 15px;
            border-radius: 10px;
            box-shadow: var(--shadow);
            flex-wrap: wrap;
        }

        .filter-item {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .filter-label {
            font-weight: 500;
            color: var(--text-dark);
        }

        .filter-select {
            padding: 8px 12px;
            border: 1px solid var(--gray);
            border-radius: 5px;
            font-family: 'Poppins', sans-serif;
            color: var(--text-dark);
        }

        .filter-select:focus {
            outline: none;
            border-color: var(--primary-light);
        }

        .filter-input {
            padding: 8px 12px;
            border: 1px solid var(--gray);
            border-radius: 5px;
            font-family: 'Poppins', sans-serif;
            color: var(--text-dark);
        }

        .filter-input:focus {
            outline: none;
            border-color: var(--primary-light);
        }

        .dentist-table-container {
            background-color: var(--white);
            border-radius: 10px;
            box-shadow: var(--shadow);
            overflow: hidden;
            margin-bottom: 20px;
        }

        .dentist-table {
            width: 100%;
            border-collapse: collapse;
        }

        .dentist-table th {
            background-color: var(--light-gray);
            color: var(--text-dark);
            font-weight: 600;
            text-align: left;
            padding: 15px;
            border-bottom: 1px solid var(--gray);
        }

        .dentist-table td {
            padding: 15px;
            border-bottom: 1px solid var(--gray);
            color: var(--text-dark);
        }

        .dentist-table tr:last-child td {
            border-bottom: none;
        }

        .dentist-table tr:hover {
            background-color: var(--light-gray);
        }

        .dentist-profile {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .dentist-profile-img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            object-fit: cover;
        }

        .dentist-profile-info {
            display: flex;
            flex-direction: column;
        }

        .dentist-profile-name {
            font-weight: 600;
        }

        .dentist-profile-email {
            color: var(--text-light);
            font-size: 0.85rem;
        }

        .dentist-status {
            display: inline-block;
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
            width: 32px;
            height: 32px;
            border-radius: 6px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--white);
            cursor: pointer;
            transition: all 0.3s ease;
        }


        .dentist-action.delete {
            background-color: var(--danger);
        }

        .dentist-action:hover {
            opacity: 0.9;
            transform: translateY(-2px);
        }



        .page-item {
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 8px;
            background-color: var(--white);
            color: var(--text-dark);
            font-weight: 500;
            transition: all 0.3s ease;
            box-shadow: var(--shadow-sm);
        }

        .page-item:hover {
            background-color: var(--light-gray);
            transform: translateY(-3px);
            box-shadow: var(--shadow);
        }

        .page-item.active {
            background-color: var(--primary);
            color: var(--white);
        }

        .page-item.disabled {
            opacity: 0.5;
            cursor: not-allowed;
        }

        /* Modal styles */
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 1000;
            overflow: auto;
            justify-content: center;
            align-items: center;
        }

        .modal.active {
            display: flex;
        }

        .modal-content {
            background-color: var(--white);
            border-radius: 10px;
            box-shadow: var(--shadow-lg);
            width: 100%;
            max-width: 500px;
            position: relative;
            animation: modalFadeIn 0.3s ease;
        }

        @keyframes modalFadeIn {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .modal-header {
            padding: 20px;
            border-bottom: 1px solid var(--gray);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .modal-title {
            font-size: 1.2rem;
            font-weight: 600;
            color: var(--text-dark);
        }

        .modal-close {
            background: none;
            border: none;
            font-size: 1.2rem;
            color: var(--text-light);
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .modal-close:hover {
            color: var(--danger);
        }

        .modal-body {
            padding: 20px;
        }

        .modal-footer {
            padding: 20px;
            border-top: 1px solid var(--gray);
            display: flex;
            justify-content: flex-end;
            gap: 10px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
            color: var(--text-dark);
        }

        .form-control {
            width: 100%;
            padding: 10px 15px;
            border: 1px solid var(--gray);
            border-radius: 8px;
            font-family: 'Poppins', sans-serif;
            font-size: 1rem;
            color: var(--text-dark);
            transition: all 0.3s ease;
        }

        .form-control:focus {
            outline: none;
            border-color: var(--primary-light);
            box-shadow: 0 0 0 3px rgba(3, 105, 161, 0.1);
        }

        .form-select {
            width: 100%;
            padding: 10px 15px;
            border: 1px solid var(--gray);
            border-radius: 8px;
            font-family: 'Poppins', sans-serif;
            font-size: 1rem;
            color: var(--text-dark);
            appearance: none;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' viewBox='0 0 24 24' fill='none' stroke='%230369a1' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpolyline points='6 9 12 15 18 9'%3E%3C/polyline%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 15px center;
            padding-right: 40px;
            transition: all 0.3s ease;
        }

        .form-select:focus {
            outline: none;
            border-color: var(--primary-light);
            box-shadow: 0 0 0 3px rgba(3, 105, 161, 0.1);
        }

        .form-check {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 10px;
        }

        .form-check-input {
            width: 18px;
            height: 18px;
            border-radius: 4px;
            border: 1px solid var(--gray);
            cursor: pointer;
        }

        .form-check-label {
            font-size: 0.95rem;
            color: var(--text-dark);
            cursor: pointer;
        }

        /* Responsive */
        @media (max-width: 992px) {
            .filter-bar {
                flex-direction: column;
                align-items: flex-start;
            }

            .menu-toggle {
                display: block;
            }

            .filter-item {
                width: 100%;
            }

            .filter-select,
            .filter-input {
                width: 100%;
            }
        }

        @media (max-width: 768px) {
            .dentist-table {
                display: block;
                overflow-x: auto;
            }

            .page-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 15px;
            }
        }
    </style>

    <div class="page-header">
        <h2 class="page-title">Gestion des dentistes</h2>
    </div>

    <div class="filter-bar">
        <div class="filter-item">
            <label class="filter-label">Statut:</label>
            <select class="filter-select" id="statusFilter">
                <option value="">Tous les statuts</option>
                <option value="active">Actif</option>
                <option value="pending">En attente</option>
                <option value="inactive">Inactif</option>
            </select>
        </div>
        <div class="filter-item">
            <label class="filter-label">Spécialité:</label>
            <select class="filter-select" id="specialtyFilter">
                <option value="">Toutes les spécialités</option>
                <option value="general">Dentiste général</option>
                <option value="orthodontist">Orthodontiste</option>
                <option value="pedodontist">Pédodontiste</option>
                <option value="implantologist">Implantologue</option>
                <option value="periodontist">Parodontiste</option>
            </select>
        </div>
        <div class="filter-item">
            <label class="filter-label">Recherche:</label>
            <input type="text" class="filter-input" id="searchInput" placeholder="Nom, email...">
        </div>
    </div>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <div class="dentist-table-container">
        <table class="dentist-table">
            <thead>
                <tr>
                    <th>Dentiste</th>
                    <th>Spécialité</th>
                    <th>Date d'inscription</th>
                    <th>Rendez-vous</th>
                    <th>numero de contenu</th>
                    <th>Statut</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($dentists as $dentist)
                    <tr>
                        <td>
                            <div class="dentist-profile">
                                <img src="{{ $dentist->user->image }}" alt="Dr. Thomas Dubois" class="dentist-profile-img">
                                <div class="dentist-profile-info">
                                    <div class="dentist-profile-name">Dr. {{ $dentist->user->nom }}
                                        {{ $dentist->user->prenom }}</div>
                                    <div class="dentist-profile-email">{{ $dentist->user->email }}</div>
                                </div>
                            </div>
                        </td>
                        <td>{{ $dentist->speciality }}</td>
                        <td>{{ $dentist->created_at }}</td>
                        <td>{{ $dentist->appointments->count() }}</td>
                        <td>{{ $dentist->contents->count() }}</td>
                        <td><span
                                class="dentist-status {{ strtolower($dentist->user->status) }}">{{ $dentist->user->status }}</span>
                        </td>

                        {{-- desactivate dentist  --}}
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>



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

        });
    </script>
@endsection
