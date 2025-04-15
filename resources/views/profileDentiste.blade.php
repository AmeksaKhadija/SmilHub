<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Dentiste - MedSmile</title>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

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
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 15px;
        }

        .profile-header {
            background-color: var(--primary);
            color: var(--white);
            padding: 30px 0;
            margin-bottom: 30px;
        }

        .profile-header h1 {
            font-size: 2rem;
            font-weight: 600;
        }

        .profile-header p {
            opacity: 0.9;
            margin-bottom: 0;
        }

        .profile-container {
            display: flex;
            flex-wrap: wrap;
            gap: 30px;
            margin-bottom: 50px;
        }

        .profile-sidebar {
            flex: 1;
            min-width: 250px;
            max-width: 300px;
        }

        .profile-content {
            flex: 3;
            min-width: 0;
        }

        .profile-card {
            background-color: var(--white);
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            margin-bottom: 30px;
        }

        .profile-card-header {
            background-color: var(--primary-light);
            color: var(--white);
            padding: 20px;
            position: relative;
        }

        .profile-card-header h2 {
            font-size: 1.5rem;
            margin-bottom: 0;
        }

        .profile-info {
            padding: 20px;
        }

        .profile-avatar {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            background-color: var(--primary-light);
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
            color: var(--white);
            font-size: 3rem;
            border: 5px solid var(--white);
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .profile-name {
            font-size: 1.5rem;
            font-weight: 600;
            text-align: center;
            margin-bottom: 5px;
        }

        .profile-role {
            color: var(--text-light);
            text-align: center;
            margin-bottom: 20px;
        }

        .profile-status {
            display: inline-block;
            padding: 5px 15px;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 500;
            margin-bottom: 20px;
            text-align: center;
            width: 100%;
        }

        .status-active {
            background-color: rgba(16, 185, 129, 0.1);
            color: #10b981;
        }

        .status-pending {
            background-color: rgba(245, 158, 11, 0.1);
            color: #f59e0b;
        }

        .status-blocked {
            background-color: rgba(239, 68, 68, 0.1);
            color: #ef4444;
        }

        .profile-nav {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .profile-nav-item {
            border-bottom: 1px solid var(--gray);
        }

        .profile-nav-link {
            display: flex;
            align-items: center;
            padding: 15px 20px;
            color: var(--text-dark);
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .profile-nav-link:hover {
            background-color: var(--light-gray);
            color: var(--primary);
        }

        .profile-nav-link.active {
            background-color: var(--primary-light);
            color: var(--white);
        }

        .profile-nav-link i {
            margin-right: 10px;
            width: 20px;
            text-align: center;
        }

        .tab-content {
            display: none;
        }

        .tab-content.active {
            display: block;
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

        .form-select {
            width: 100%;
            padding: 12px 15px;
            border: 1px solid var(--gray);
            border-radius: 5px;
            font-family: 'Poppins', sans-serif;
            font-size: 1rem;
            transition: all 0.3s ease;
            appearance: none;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='%231e293b' viewBox='0 0 16 16'%3E%3Cpath d='M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 15px center;
            background-size: 16px 12px;
        }

        .form-select:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(3, 105, 161, 0.1);
        }

        .form-check {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
        }

        .form-check-input {
            margin-right: 10px;
            width: 18px;
            height: 18px;
        }

        .btn {
            display: inline-block;
            padding: 12px 24px;
            border-radius: 5px;
            font-weight: 500;
            text-align: center;
            cursor: pointer;
            transition: all 0.3s ease;
            border: none;
            font-family: 'Poppins', sans-serif;
            font-size: 1rem;
        }

        .btn-primary {
            background-color: var(--primary);
            color: var(--white);
        }

        .btn-primary:hover {
            background-color: var(--primary-dark);
            transform: translateY(-2px);
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .btn-secondary {
            background-color: var(--secondary);
            color: var(--white);
        }

        .btn-secondary:hover {
            background-color: var(--secondary-dark);
            transform: translateY(-2px);
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .alert {
            padding: 15px 20px;
            border-radius: 5px;
            margin-bottom: 20px;
        }

        .alert-success {
            background-color: rgba(16, 185, 129, 0.1);
            color: #10b981;
            border-left: 4px solid #10b981;
        }

        .alert-danger {
            background-color: rgba(239, 68, 68, 0.1);
            color: #ef4444;
            border-left: 4px solid #ef4444;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
        }

        .table th,
        .table td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid var(--gray);
        }

        .table th {
            font-weight: 600;
            color: var(--text-dark);
            background-color: var(--light-gray);
        }

        .table tr:hover {
            background-color: var(--light-gray);
        }

        .badge {
            display: inline-block;
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 0.75rem;
            font-weight: 500;
        }

        .badge-success {
            background-color: rgba(16, 185, 129, 0.1);
            color: #10b981;
        }

        .badge-warning {
            background-color: rgba(245, 158, 11, 0.1);
            color: #f59e0b;
        }

        .badge-danger {
            background-color: rgba(239, 68, 68, 0.1);
            color: #ef4444;
        }

        .text-end {
            text-align: right;
        }

        .row {
            display: flex;
            flex-wrap: wrap;
            margin: -10px;
        }

        .col-6 {
            flex: 0 0 50%;
            max-width: 50%;
            padding: 10px;
        }

        .col-12 {
            flex: 0 0 100%;
            max-width: 100%;
            padding: 10px;
        }

        @media (max-width: 992px) {
            .profile-container {
                flex-direction: column;
            }

            .profile-sidebar {
                max-width: 100%;
            }

            .col-6 {
                flex: 0 0 100%;
                max-width: 100%;
            }
        }
    </style>
</head>

<body>
    <!-- Header -->
    <header class="profile-header">
        <div class="container">
            <h1>Profil Dentiste</h1>
            <p>Gérez vos informations personnelles et professionnelles</p>
        </div>
    </header>

    <div class="container">
        <!-- Alert Messages -->
        @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif

        @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
        @endif

        <div class="profile-container">
            <!-- Sidebar -->
            <div class="profile-sidebar">
                <div class="profile-card">
                    <div class="profile-card-header">
                        <h2>Mon Profil</h2>
                    </div>
                    <div class="profile-info">
                        <div class="profile-avatar">
                            <i class="fas fa-user-md"></i>
                        </div>
                        <h3 class="profile-name">Dr. {{ $user->prenom }} {{ $user->nom }}</h3>
                        <p class="profile-role">{{ $dentist->speciality ?? 'Dentiste' }}</p>
                        <div class="profile-status {{ $user->status === 'active' ? 'status-active' : ($user->status === 'pending' ? 'status-pending' : 'status-blocked') }}">
                            @if($user->status === 'active')
                            Actif
                            @elseif($user->status === 'pending')
                            En attente d'approbation
                            @else
                            Bloqué
                            @endif
                        </div>

                        <ul class="profile-nav">
                            <li class="profile-nav-item">
                                <a href="#personal-info" class="profile-nav-link active" data-tab="personal-info">
                                    <i class="fas fa-user"></i> Informations personnelles
                                </a>
                            </li>
                            <li class="profile-nav-item">
                                <a href="#speciality" class="profile-nav-link" data-tab="speciality">
                                    <i class="fas fa-tooth"></i> Spécialité
                                </a>
                            </li>
                            <li class="profile-nav-item">
                                <a href="#availability" class="profile-nav-link" data-tab="availability">
                                    <i class="fas fa-clock"></i> Disponibilité
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Content -->
            <div class="profile-content">
                <!-- Personal Information Tab -->
                <div id="personal-info" class="tab-content active">
                    <div class="profile-card">
                        <div class="profile-card-header">
                            <h2>Informations personnelles</h2>
                        </div>
                        <div class="profile-info">
                            <form action="{{ route('profile.update') }}" method="POST">
                                @csrf
                                <input type="hidden" name="section" value="personal">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="nom" class="form-label">Nom</label>
                                            <input type="text" class="form-control @error('nom') is-invalid @enderror" id="nom" name="nom" value="{{ old('nom', $user->nom) }}">
                                            @error('nom')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="prenom" class="form-label">Prénom</label>
                                            <input type="text" class="form-control @error('prenom') is-invalid @enderror" id="prenom" name="prenom" value="{{ old('prenom', $user->prenom) }}">
                                            @error('prenom')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="email" class="form-label">Email</label>
                                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email', $user->email) }}">
                                            @error('email')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="phone" class="form-label">Téléphone</label>
                                            <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" value="{{ old('phone', $user->phone) }}">
                                            @error('phone')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="text-end">
                                    <button type="submit" class="btn btn-primary">Enregistrer les modifications</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Speciality Tab -->
                <div id="speciality" class="tab-content">
                    <div class="profile-card">
                        <div class="profile-card-header">
                            <h2>Spécialité et informations professionnelles</h2>
                        </div>
                        <div class="profile-info">
                            <form action="{{ route('profile.update') }}" method="POST">
                                @csrf
                                <input type="hidden" name="section" value="speciality">
                                <div class="form-group">
                                    <label for="speciality" class="form-label">Spécialité</label>
                                    <select class="form-select @error('speciality') is-invalid @enderror" id="speciality" name="speciality">
                                        <option value="">Sélectionnez une spécialité</option>
                                        <option value="Dentiste généraliste" {{ $dentist && $dentist->speciality === 'Dentiste généraliste' ? 'selected' : '' }}>Dentiste généraliste</option>
                                        <option value="Orthodontiste" {{ $dentist && $dentist->speciality === 'Orthodontiste' ? 'selected' : '' }}>Orthodontiste</option>
                                        <option value="Endodontiste" {{ $dentist && $dentist->speciality === 'Endodontiste' ? 'selected' : '' }}>Endodontiste</option>
                                        <option value="Parodontiste" {{ $dentist && $dentist->speciality === 'Parodontiste' ? 'selected' : '' }}>Parodontiste</option>
                                        <option value="Chirurgien oral" {{ $dentist && $dentist->speciality === 'Chirurgien oral' ? 'selected' : '' }}>Chirurgien oral</option>
                                        <option value="Pédodontiste" {{ $dentist && $dentist->speciality === 'Pédodontiste' ? 'selected' : '' }}>Pédodontiste</option>
                                    </select>
                                    @error('speciality')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="text-end">
                                    <button type="submit" class="btn btn-primary">Enregistrer les modifications</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Availability Tab -->
                <div id="availability" class="tab-content">
                    <div class="profile-card">
                        <div class="profile-card-header">
                            <h2>Disponibilité</h2>
                        </div>
                        <div class="profile-info">
                            <form action="{{ route('profile.update') }}" method="POST">
                                @csrf
                                <input type="hidden" name="section" value="availability">
                                <div class="form-group">
                                    <label class="form-label">Jours de travail</label>
                                    <div class="row">
                                        @php
                                        $days = ['Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi', 'Dimanche'];
                                        $availableDays = $dentist && isset($dentist->available_slots['days']) ? $dentist->available_slots['days'] : [];
                                        @endphp

                                        @foreach($days as $day)
                                        <div class="col-6">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="day-{{ $loop->index }}" name="available_slots[days][]" value="{{ $day }}" {{ in_array($day, $availableDays) ? 'checked' : '' }}>
                                                <label class="form-check-label" for="day-{{ $loop->index }}">
                                                    {{ $day }}
                                                </label>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="start_time" class="form-label">Heure de début</label>
                                            <input type="time" class="form-control" id="start_time" name="available_slots[start_time]" value="{{ $dentist && isset($dentist->available_slots['start_time']) ? $dentist->available_slots['start_time'] : '09:00' }}">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="end_time" class="form-label">Heure de fin</label>
                                            <input type="time" class="form-control" id="end_time" name="available_slots[end_time]" value="{{ $dentist && isset($dentist->available_slots['end_time']) ? $dentist->available_slots['end_time'] : '18:00' }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="appointment_duration" class="form-label">Durée d'un rendez-vous (en minutes)</label>
                                    <select class="form-select" id="appointment_duration" name="available_slots[appointment_duration]">
                                        <option value="15" {{ $dentist && isset($dentist->available_slots['appointment_duration']) && $dentist->available_slots['appointment_duration'] == 15 ? 'selected' : '' }}>15 minutes</option>
                                        <option value="30" {{ $dentist && isset($dentist->available_slots['appointment_duration']) && $dentist->available_slots['appointment_duration'] == 30 ? 'selected' : '' }}>30 minutes</option>
                                        <option value="45" {{ $dentist && isset($dentist->available_slots['appointment_duration']) && $dentist->available_slots['appointment_duration'] == 45 ? 'selected' : '' }}>45 minutes</option>
                                        <option value="60" {{ $dentist && isset($dentist->available_slots['appointment_duration']) && $dentist->available_slots['appointment_duration'] == 60 ? 'selected' : '' }}>60 minutes</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label class="form-label">Pause déjeuner</label>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="break_start" class="form-label">Début</label>
                                                <input type="time" class="form-control" id="break_start" name="available_slots[break_start]" value="{{ $dentist && isset($dentist->available_slots['break_start']) ? $dentist->available_slots['break_start'] : '12:00' }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="break_end" class="form-label">Fin</label>
                                            <input type="time" class="form-control" id="break_end" name="available_slots[break_end]" value="{{ $dentist && isset($dentist->available_slots['break_end']) ? $dentist->available_slots['break_end'] : '13:00' }}">
                                        </div>
                                    </div>
                                </div>
                        </div>

                        <div class="text-end">
                            <button type="submit" class="btn btn-primary">Enregistrer les modifications</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
    </div>

    <!-- JavaScript -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Tab Navigation
            const tabLinks = document.querySelectorAll('.profile-nav-link');
            const tabContents = document.querySelectorAll('.tab-content');

            tabLinks.forEach(link => {
                link.addEventListener('click', function(e) {
                    e.preventDefault();

                    // Remove active class from all links and contents
                    tabLinks.forEach(l => l.classList.remove('active'));
                    tabContents.forEach(c => c.classList.remove('active'));

                    // Add active class to clicked link
                    this.classList.add('active');

                    // Show corresponding content
                    const tabId = this.getAttribute('data-tab');
                    document.getElementById(tabId).classList.add('active');
                });
            });
        });
    </script>
</body>

</html>