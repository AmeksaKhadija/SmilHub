@extends('./patient/layout')
@section('prendreRendezVous')
    <style>
        /* Page Header */
        .page-header {
            background: linear-gradient(rgba(3, 105, 161, 0.85), rgba(3, 105, 161, 0.85)), url('https://images.unsplash.com/photo-1606811971618-4486d14f3f99?q=80&w=1974&auto=format&fit=crop') no-repeat center center/cover;
            color: var(--white);
            padding: 100px 0;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .page-header::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.05'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
            opacity: 0.1;
        }

        .page-title {
            font-size: 3rem;
            font-weight: 700;
            margin-bottom: 1.5rem;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            position: relative;
            display: inline-block;
        }

        .page-title::after {
            content: '';
            position: absolute;
            bottom: -15px;
            left: 50%;
            transform: translateX(-50%);
            width: 80px;
            height: 4px;
            background: var(--white);
            border-radius: 2px;
        }

        .page-subtitle {
            font-size: 1.3rem;
            max-width: 700px;
            margin: 2rem auto 0;
            opacity: 0.9;
        }

        /* Style global pour la section de rendez-vous */
        .appointment-section {
            padding: 80px 0;
            background-color: var(--off-white);
            position: relative;
        }

        .appointment-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%230369a1' fill-opacity='0.03'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
        }

        .appointment-container {
            display: flex;
            flex-wrap: wrap;
            gap: 30px;
            justify-content: center;
            position: relative;
            z-index: 1;
        }

        .calendar-header {
            margin-bottom: 40px;
            text-align: center;
        }

        .calendar-title {
            font-size: 2rem;
            color: var(--primary);
            margin-bottom: 1.5rem;
            position: relative;
            display: inline-block;
            padding-bottom: 15px;
        }

        .calendar-title::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 60px;
            height: 4px;
            background: var(--secondary);
            border-radius: 2px;
        }

        /* Style pour la carte du dentiste */
        .dentist-availability-section {
            background: var(--white);
            border-radius: 16px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
            width: 100%;
            max-width: 1200px;
            display: flex;
            justify-content: space-between;
            padding: 30px;
            margin-bottom: 40px;
            position: relative;
            overflow: hidden;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .dentist-availability-section:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
        }

        /* Ligne séparatrice entre les deux parties (dentiste et formulaire) */
        .dentist-availability-section::before {
            content: '';
            position: absolute;
            top: 10%;
            left: 50%;
            height: 80%;
            width: 1px;
            background-color: var(--gray);
            transform: translateX(-50%);
        }

        /* Section gauche : informations du dentiste */
        .dentist-header {
            display: flex;
            align-items: start;
            gap: 20px;
            width: 45%;
            flex-direction: column;
            padding: 20px;
        }

        .dentist-head {
            display: flex;
            gap: 21px;
            align-items: center;
            margin-bottom: 20px;
        }

        .dentist-avatar img {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            object-fit: cover;
            border: 3px solid var(--primary-light);
            box-shadow: 0 4px 10px rgba(3, 105, 161, 0.2);
            transition: transform 0.3s ease;
        }

        .dentist-availability-section:hover .dentist-avatar img {
            transform: scale(1.05);
        }

        .dentist-info {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .dentist-name {
            font-size: 22px;
            font-weight: 700;
            color: var(--primary);
            margin-bottom: 5px;
        }

        .dentist-specialty {
            font-size: 15px;
            color: var(--text-light);
            background-color: var(--light-gray);
            padding: 4px 12px;
            border-radius: 20px;
            display: inline-block;
            margin-bottom: 10px;
        }

        .dentist-rating {
            display: flex;
            gap: 5px;
            align-items: center;
        }

        .dentist-rating i {
            color: #FFD700;
            font-size: 16px;
        }

        .dentist-rating span {
            font-size: 14px;
            color: var(--text-light);
            font-weight: 500;
        }

        /* Disponibilité */
        .available-days {
            background-color: var(--light-gray);
            border-radius: 12px;
            padding: 20px;
            margin-top: 20px;
        }

        .available-days-title {
            font-size: 18px;
            color: var(--primary);
            margin-bottom: 15px;
            font-weight: 600;
            position: relative;
            padding-left: 28px;
        }

        .available-days-title::before {
            content: '\f073';
            font-family: 'Font Awesome 5 Free';
            font-weight: 900;
            position: absolute;
            left: 0;
            color: var(--primary);
        }

        .days-list {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin-top: 10px;
        }

        .day-item {
            background-color: var(--white);
            padding: 8px 15px;
            border-radius: 20px;
            font-size: 14px;
            font-weight: 500;
            color: var(--primary);
            border: 1px solid var(--primary-light);
            display: inline-flex;
            align-items: center;
            gap: 5px;
        }

        .day-item::before {
            content: '\f058';
            font-family: 'Font Awesome 5 Free';
            font-weight: 900;
            color: var(--secondary);
            font-size: 12px;
        }

        .availability-details {
            display: flex;
            flex-direction: column;
            gap: 10px;
            margin-top: 15px;
        }

        .availability-label {
            font-size: 14px;
            color: var(--text-light);
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .availability-label::before {
            content: '\f017';
            font-family: 'Font Awesome 5 Free';
            font-weight: 900;
            color: var(--secondary);
        }

        .time-slots-title {
            font-size: 18px;
            color: var(--primary);
            margin-bottom: 15px;
            font-weight: 600;
            position: relative;
            padding-left: 28px;
            margin-top: 25px;
        }

        .time-slots-title::before {
            content: '\f017';
            font-family: 'Font Awesome 5 Free';
            font-weight: 400;
            position: absolute;
            left: 0;
            color: var(--primary);
        }

        .time-slots-container {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
            margin-top: 15px;
        }

        .time-slot {
            background-color: var(--light-gray);
            padding: 10px 15px;
            border-radius: 8px;
            font-size: 14px;
            cursor: pointer;
            transition: all 0.3s ease;
            border: 1px solid transparent;
            font-weight: 500;
        }

        .time-slot:hover {
            background-color: var(--primary-light);
            color: var(--white);
            transform: translateY(-3px);
            box-shadow: 0 4px 8px rgba(3, 105, 161, 0.2);
        }

        .time-slot.active {
            background-color: var(--primary);
            color: var(--white);
            border-color: var(--primary-dark);
            box-shadow: 0 4px 8px rgba(3, 105, 161, 0.2);
        }

        /* Section droite : formulaire résumé du rendez-vous */
        .appointment-summary {
            width: 45%;
            display: flex;
            flex-direction: column;
            gap: 20px;
            background-color: var(--white);
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            position: sticky;
            top: 100px;
        }

        .appointment-summary h3 {
            font-size: 22px;
            color: var(--primary);
            font-weight: 700;
            margin-bottom: 10px;
            position: relative;
            padding-bottom: 15px;
        }

        .appointment-summary h3::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 50px;
            height: 3px;
            background: var(--secondary);
            border-radius: 2px;
        }

        .form-group {
            display: flex;
            flex-direction: column;
            gap: 8px;
            margin-bottom: 20px;
        }

        label {
            font-size: 15px;
            color: var(--text-dark);
            font-weight: 500;
        }

        .form-control,
        .form-select {
            padding: 12px 15px;
            font-size: 15px;
            border-radius: 8px;
            border: 1px solid var(--gray);
            width: 100%;
            background-color: var(--light-gray);
            transition: all 0.3s ease;
            font-family: 'Poppins', sans-serif;
        }

        .form-control:focus,
        .form-select:focus {
            border-color: var(--primary-light);
            background-color: var(--white);
            outline: none;
            box-shadow: 0 0 0 3px rgba(3, 105, 161, 0.1);
        }

        .form-select {
            appearance: none;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' viewBox='0 0 24 24' fill='none' stroke='%230369a1' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpolyline points='6 9 12 15 18 9'%3E%3C/polyline%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 15px center;
            padding-right: 40px;
        }

        .alert {
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        .alert-danger {
            background-color: #fee2e2;
            border: 1px solid #fecaca;
            color: #b91c1c;
        }

        .alert ul {
            list-style: disc;
            margin-left: 20px;
        }

        .date-instruction {
            background-color: #e0f2fe;
            border-left: 4px solid var(--primary);
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 20px;
            font-size: 14px;
            line-height: 1.6;
            color: var(--text-dark);
        }

        .date-instruction i {
            color: var(--primary);
            margin-right: 8px;
        }



        /* Modal */
        .modal {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 1000;
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s ease;
            backdrop-filter: blur(5px);
        }

        .modal.active {
            opacity: 1;
            visibility: visible;
        }

        .modal-content {
            background-color: var(--white);
            border-radius: 16px;
            padding: 40px;
            width: 100%;
            max-width: 500px;
            box-shadow: var(--shadow-lg);
            transform: translateY(-20px);
            transition: all 0.3s ease;
        }

        .modal.active .modal-content {
            transform: translateY(0);
        }

        .modal-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }

        .modal-title {
            font-size: 1.8rem;
            font-weight: 700;
            color: var(--primary);
        }

        .modal-close {
            background: none;
            border: none;
            font-size: 1.5rem;
            color: var(--text-light);
            cursor: pointer;
            transition: all 0.3s ease;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .modal-close:hover {
            color: var(--text-dark);
            background-color: var(--light-gray);
        }

        .modal-body {
            margin-bottom: 30px;
            line-height: 1.8;
        }

        .modal-body p {
            margin-bottom: 15px;
        }

        .modal-footer {
            display: flex;
            justify-content: flex-end;
            gap: 15px;
        }

        /* Responsive Styles */
        @media (max-width: 1200px) {
            .container {
                padding: 0 30px;
            }

            .footer-container {
                grid-template-columns: 1fr 1fr;
                gap: 40px 60px;
            }
        }

        @media (max-width: 992px) {
            .dentist-availability-section {
                flex-direction: column;
                padding: 25px;
            }

            .dentist-availability-section::before {
                display: none;
            }

            .dentist-header,
            .appointment-summary {
                width: 100%;
            }

            .dentist-header {
                margin-bottom: 30px;
                padding: 0;
            }

            .appointment-summary {
                position: static;
                padding: 25px;
                margin-top: 20px;
            }
        }

        @media (max-width: 768px) {
            .page-title {
                font-size: 2.5rem;
            }

            .page-subtitle {
                font-size: 1.1rem;
            }

            .appointment-section {
                padding: 60px 0;
            }

            .calendar-title {
                font-size: 1.8rem;
            }

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
                grid-template-columns: 1fr;
                gap: 40px;
            }

            .contact-info {
                flex-direction: column;
                gap: 10px;
            }

            .top-header-content {
                flex-direction: column;
                gap: 15px;
            }
        }

        @media (max-width: 576px) {
            .page-header {
                padding: 70px 0;
            }

            .page-title {
                font-size: 2rem;
            }

            .dentist-head {
                flex-direction: column;
                text-align: center;
                align-items: center;
            }

            .dentist-info {
                align-items: center;
            }

            .modal-content {
                padding: 25px;
            }

            .days-list {
                justify-content: center;
            }
        }
    </style>

    <section class="page-header">
        <div class="container">
            <h1 class="page-title">Prendre Rendez-vous</h1>
            <p class="page-subtitle">Réservez facilement un rendez-vous avec l'un de nos dentistes qualifiés en quelques
                clics</p>
        </div>
    </section>

    <!-- Appointment Section -->
    <section class="appointment-section">
        <div class="container">
            <div class="calendar-header">
                <h2 class="calendar-title">Créneaux disponibles par dentiste</h2>
            </div>
            <div class="appointment-container">
                <!-- Dentist Cards -->
                @foreach ($dentists as $dentist)
                    <div class="dentist-availability-section" data-dentist-id="{{ $dentist->id }}">
                        <div class="dentist-header">
                            <div class="dentist-head">
                                <div class="dentist-avatar">
                                    <img src="{{ $dentist->user->image }}"
                                        alt="Dr. {{ $dentist->user->nom }} {{ $dentist->user->prenom }}">
                                </div>
                                <div class="dentist-info">
                                    <h4 class="dentist-name">Dr. {{ $dentist->user->nom }} {{ $dentist->user->prenom }}</h4>
                                    <input type="hidden" name="dentist_id" value="{{ $dentist->id }}">
                                    <p class="dentist-specialty">{{ $dentist->speciality ?: 'Dentiste généraliste' }}</p>
                                    <div class="dentist-rating">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star-half-alt"></i>
                                        <span>(4.5)</span>
                                    </div>
                                </div>
                            </div>

                            <!-- Available Days Section -->
                            @if (isset($dentist->available_slots) && !empty($dentist->available_slots))
                                @if (is_array($dentist->available_slots))
                                    <!-- Si available_slots est un tableau de créneaux par date -->
                                    @if (isset($dentist->available_slots[0]) && isset($dentist->available_slots[0]['date']))
                                        @foreach ($dentist->available_slots as $slot)
                                            @if (isset($slot['date']) && isset($slot['slots']) && is_array($slot['slots']))
                                                <div>
                                                    <h5 class="time-slots-title">Pour le {{ $slot['date'] }}</h5>
                                                    <div class="time-slots-container">
                                                        @foreach ($slot['slots'] as $hour)
                                                            <div class="time-slot" data-dentist-id="{{ $dentist->id }}"
                                                                data-dentist-name="Dr. {{ $dentist->user->nom }} {{ $dentist->user->prenom }}"
                                                                data-date="{{ $slot['date'] }}"
                                                                data-time="{{ $hour }}">
                                                                {{ $hour }}
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            @endif
                                        @endforeach
                                    @else
                                        <!-- Si available_slots est un objet avec jours, heures, etc. -->
                                        <div class="available-days">
                                            <h5 class="available-days-title">Jours disponibles</h5>
                                            <div class="days-list">
                                                @if (isset($dentist->available_slots['days']) && is_array($dentist->available_slots['days']))
                                                    @foreach ($dentist->available_slots['days'] as $day)
                                                        <span class="day-item">{{ $day }}</span>
                                                    @endforeach
                                                @endif
                                            </div>

                                            <div class="availability-details">
                                                <div class="availability-label">Heures de travail:
                                                    {{ $dentist->available_slots['start_time'] }} -
                                                    {{ $dentist->available_slots['end_time'] }}
                                                </div>
                                                <div class="availability-label">Pause déjeuner:
                                                    {{ $dentist->available_slots['break_start'] }} -
                                                    {{ $dentist->available_slots['break_end'] }}
                                                </div>
                                                <div class="availability-label">Durée des rendez-vous:
                                                    {{ $dentist->available_slots['appointment_duration'] }} minutes
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @elseif(is_object($dentist->available_slots))
                                    <div>
                                        <p>Informations de disponibilité stockées sous forme d'objet. Veuillez contacter
                                            l'administrateur.</p>
                                    </div>
                                @else
                                    <div>
                                        <p>Format de disponibilité non reconnu. Veuillez contacter l'administrateur.</p>
                                    </div>
                                @endif
                            @else
                                <p>Aucune information de disponibilité pour ce dentiste.</p>
                            @endif
                        </div>

                        <div class="appointment-summary">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <h3>Résumé du rendez-vous</h3>

                            <div class="date-instruction">
                                <i class="fas fa-info-circle"></i>
                                Veuillez sélectionner une date parmi les jours disponibles indiqués à gauche. Seuls les
                                rendez-vous pris durant ces jours seront acceptés.
                            </div>

                            <form method="POST" action="{{ route('appointments.store') }}">
                                @csrf
                                <input type="hidden" name="dentist_id" value="{{ $dentist->id }}">

                                <div class="form-group">
                                    <label for="date">Date</label>
                                    <input type="date" id="date" name="date" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="time">Heure</label>
                                    <input type="time" id="time" name="time" class="form-control">
                                </div>
                                <button type="submit" name="submit" class="btn btn-primary">Réserver</button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Confirmation Modal -->
    <div class="modal" id="confirmationModal">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title">Confirmation du rendez-vous</h2>
                <button class="modal-close" id="modalClose">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <div class="modal-body">
                <p>Votre rendez-vous a été confirmé avec succès !</p>
                <p>Vous recevrez bientôt un email de confirmation avec les détails de votre rendez-vous.</p>
                <p>Un rappel vous sera également envoyé 24 heures avant votre rendez-vous.</p>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" id="modalOkBtn">OK</button>
            </div>
        </div>
    </div>


    <script>
        // Time slot selection
        document.addEventListener('DOMContentLoaded', function() {
            const timeSlots = document.querySelectorAll('.time-slot');

            timeSlots.forEach(slot => {
                slot.addEventListener('click', function() {
                    // Remove active class from all slots
                    timeSlots.forEach(s => s.classList.remove('active'));

                    // Add active class to clicked slot
                    this.classList.add('active');

                    // Get data attributes
                    const dentistId = this.getAttribute('data-dentist-id');
                    const date = this.getAttribute('data-date');
                    const time = this.getAttribute('data-time');

                    // Find the corresponding form
                    const form = document.querySelector(
                        `.dentist-availability-section[data-dentist-id="${dentistId}"] form`);

                    if (form) {
                        // Update form fields
                        form.querySelector('#date').value = date;
                        form.querySelector('#time').value = time;
                    }
                });
            });

            // Modal handling
            const modal = document.getElementById('confirmationModal');
            const closeBtn = document.getElementById('modalClose');
            const okBtn = document.getElementById('modalOkBtn');

            if (closeBtn) {
                closeBtn.addEventListener('click', function() {
                    modal.classList.remove('active');
                });
            }

            if (okBtn) {
                okBtn.addEventListener('click', function() {
                    modal.classList.remove('active');
                });
            }

            // Mobile menu toggle
            const mobileMenuBtn = document.getElementById('mobileMenuBtn');
            const mainNav = document.getElementById('mainNav');

            if (mobileMenuBtn && mainNav) {
                mobileMenuBtn.addEventListener('click', function() {
                    mainNav.classList.toggle('active');
                });
            }
        });
    </script>
@endsection
