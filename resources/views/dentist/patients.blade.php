@extends('dentist.layout')
@section('patients')
    <style>
        /* Styles pour la gestion des rendez-vous */
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

        .btn-outline {
            background-color: transparent;
            border: 2px solid var(--gray);
            color: var(--text-dark);
        }

        .btn-outline:hover {
            border-color: var(--primary);
            color: var(--primary);
            transform: translateY(-3px);
            box-shadow: var(--shadow-sm);
        }

        .appointment-table-container {
            background-color: var(--white);
            border-radius: 10px;
            box-shadow: var(--shadow);
            overflow: hidden;
            margin-bottom: 20px;
        }

        .appointment-table {
            width: 100%;
            border-collapse: collapse;
        }

        .appointment-table th {
            background-color: var(--light-gray);
            color: var(--text-dark);
            font-weight: 600;
            text-align: left;
            padding: 15px;
            border-bottom: 1px solid var(--gray);
        }

        .appointment-table td {
            padding: 15px;
            border-bottom: 1px solid var(--gray);
            color: var(--text-dark);
        }

        .appointment-table tr:last-child td {
            border-bottom: none;
        }

        .appointment-table tr:hover {
            background-color: var(--light-gray);
        }

        .appointment-patient {
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

        .appointment-patient-email {
            color: var(--text-light);
            font-size: 0.85rem;
        }

        .appointment-dentist {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .appointment-dentist-img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            object-fit: cover;
        }

        .appointment-dentist-info {
            display: flex;
            flex-direction: column;
        }

        .appointment-dentist-name {
            font-weight: 400;
        }

        .appointment-dentist-specialty {
            color: var(--text-light);
            font-size: 0.85rem;
        }

        .appointment-status {
            display: inline-block;
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

        .appointment-status.completed {
            background-color: rgba(59, 130, 246, 0.1);
            color: var(--info);
        }

        .user-table-actions {
            display: flex;
            gap: 10px;
            /* justify-content: space-between */
        }

        .user-table-action {
            display: flex;
            align-items: center;
            justify-content: center;
        }



        .user-table-btn-view {
            background-color: #81dde9;
            border: none;
            border-radius: 8px;
            padding: 6px 10px;
            font-size: 16px;
            color: #099dff;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }

        .user-table-btn-view:hover {
            background-color: #1aaeee;
            transform: scale(1.05);
            color: #64e8ff;
        }

        .user-table-btn-view i {
            pointer-events: none;
        }

        .user-table-btn-unlock {
            background-color: #9dffc9;
            border: none;
            border-radius: 8px;
            padding: 6px 10px;
            font-size: 16px;
            color: #00b2249a;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }

        .user-table-btn-unlock:hover {
            background-color: #06fe3893;
            transform: scale(1.05);
            color: #1f5d17;
        }

        .user-table-btn-unlock i {
            pointer-events: none;
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

        .user-table-btn:hover {
            background-color: #ffb3b3;
            transform: scale(1.05);
            color: #8b0000;
        }

        .user-table-btn i {
            pointer-events: none;
        }

        .user-table-btn-done {
            background-color: #f1ddff;
            border: none;
            border-radius: 8px;
            padding: 6px 10px;
            font-size: 16px;
            color: #6a0fab;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }

        .user-table-btn-done:hover {
            background-color: #e0b4ff;
            transform: scale(1.05);
            color: #560c8b;
        }

        .user-table-btn-done i {
            pointer-events: none;
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
        .patient-modal {
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

        .patient-modal-content {
            position: relative;
            background-color: #fff;
            margin: 5% auto;
            padding: 0;
            width: 80%;
            max-width: 800px;
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
            background-color: #f8f9fa;
            border-radius: 10px 10px 0 0;
        }

        .modal-header h2 {
            margin: 0;
            color: #333;
            font-size: 24px;
        }

        .modal-body {
            padding: 25px;
        }

        .modal-patient-info {
            display: flex;
            align-items: center;
            margin-bottom: 25px;
            padding-bottom: 15px;
            border-bottom: 1px solid #eee;
        }

        .modal-patient-info img {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            object-fit: cover;
            border: 3px solid #fff;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.1);
            margin-right: 20px;
        }

        .modal-patient-info h3 {
            margin: 0;
            font-size: 22px;
            color: #333;
        }

        .medical-history-section {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }

        .medical-card {
            background-color: #f8f9fa;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05);
            transition: transform 0.2s;
        }

        .medical-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .medical-card h4 {
            color: #4a5568;
            margin-top: 0;
            margin-bottom: 15px;
            font-size: 18px;
            border-bottom: 1px solid #e2e8f0;
            padding-bottom: 10px;
        }

        .medical-card h4 i {
            margin-right: 8px;
            color: #4299e1;
        }

        .medical-card p {
            margin: 0;
            color: #4a5568;
            line-height: 1.6;
            white-space: pre-line;
        }

        .dental-history {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .dental-history-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 5px 0;
        }

        .dental-history-item .label {
            font-weight: 500;
            color: #4a5568;
        }

        .dental-history-item .value {
            font-weight: 600;
            padding: 3px 12px;
            border-radius: 20px;
            font-size: 14px;
        }

        .dental-history-item .value.yes {
            background-color: #d4edda;
            color: #155724;
        }

        .dental-history-item .value.no {
            background-color: #f8d7da;
            color: #721c24;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .medical-history-section {
                grid-template-columns: 1fr;
            }

            .patient-modal-content {
                width: 95%;
                margin: 10% auto;
            }

            .modal-patient-info {
                flex-direction: column;
                text-align: center;
            }

            .modal-patient-info img {
                margin-right: 0;
                margin-bottom: 15px;
            }
        }

        /* Responsive */
        @media (max-width: 992px) {
            .filter-bar {
                flex-direction: column;
                align-items: flex-start;
            }

            .filter-item {
                width: 100%;
            }

            .filter-select,
            .filter-input,
            .filter-date {
                width: 100%;
            }
        }

        @media (max-width: 768px) {
            .appointment-table {
                display: block;
                overflow-x: auto;
            }

            .page-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 15px;
            }
        }

        .patient-status {
            display: inline-block;
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 0.75rem;
            font-weight: 500;
        }

        .patient-status.active {
            background-color: rgba(34, 197, 94, 0.1);
            color: var(--success);
        }

        .patient-status.inactive {
            background-color: rgba(239, 68, 68, 0.1);
            color: var(--danger);
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
    </style>

    <div class="page-header">
        <h2 class="page-title">Gestion des Patients</h2>
    </div>


    <div class="appointment-table-container">
        <table class="appointment-table">
            <thead>
                <tr>
                    <th>Patient</th>
                    <th>Dernière visite</th>
                    <th>Prochain RDV</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($patients as $patient)
                    @php
                        $lastVisit = $patient->appointments->where('status', 'completed')->sortByDesc('date')->first();
                        $nextAppointment = $patient->appointments->where('date', '>', now())->sortBy('date')->first();
                        $medicalHistory = json_decode($patient->medical_history ?? '{}', true);
                    @endphp

                    <tr>
                        <td>
                            <div class="appointment-patient">
                                <img src="{{ $patient->user->image }}" alt="{{ $patient->user->nom }}"
                                    class="appointment-patient-img">
                                <div class="appointment-patient-info">
                                    <div class="appointment-patient-name">{{ $patient->user->nom }}
                                        {{ $patient->user->prenom }}</div>
                                    <div class="appointment-patient-email">{{ $patient->user->email }}</div>
                                    <div class="appointment-patient-email">{{ $patient->user->phone }}</div>
                                </div>
                            </div>
                        </td>
                        <td>
                            @if ($lastVisit)
                                {{ \Carbon\Carbon::parse($lastVisit->date)->format('M d, Y H:i') }}
                            @else
                                ---
                            @endif
                        </td>
                        <td>
                            @if ($nextAppointment)
                                {{ \Carbon\Carbon::parse($nextAppointment->date)->format('M d, Y H:i') }}
                            @else
                                ---
                            @endif
                        </td>
                        <td><span class="patient-status active">{{ $patient->status }}</span></td>
                        <td>
                            <div class="appointment-dentist">
                                <div class="dentist-actions">
                                    <div class="dentist-action view" data-id="{{ $patient->id }}"
                                        data-name="{{ $patient->user->nom }} {{ $patient->user->prenom }}"
                                        data-image="{{ $patient->user->image }}"
                                        data-allergies="{{ $medicalHistory['allergies'] ?? 'Non spécifié' }}"
                                        data-conditions="{{ $medicalHistory['conditions'] ?? 'Non spécifié' }}"
                                        data-medications="{{ $medicalHistory['medications'] ?? 'Non spécifié' }}"
                                        data-previous-surgery="{{ isset($medicalHistory['previous_surgery']) && $medicalHistory['previous_surgery'] ? 'Oui' : 'Non' }}"
                                        data-braces="{{ isset($medicalHistory['braces']) && $medicalHistory['braces'] ? 'Oui' : 'Non' }}"
                                        data-gum-disease="{{ isset($medicalHistory['gum_disease']) && $medicalHistory['gum_disease'] ? 'Oui' : 'Non' }}">
                                        <i class="fas fa-eye"></i>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>

    <!-- Modal Historique Médical -->
    <div id="patientMedicalModal" class="patient-modal">
        <div class="patient-modal-content">
            <span class="close-modal">&times;</span>
            <div class="modal-header">
                <h2>Historique Médical du Patient</h2>
            </div>
            <div class="modal-body">
                <div class="modal-patient-info">
                    <img id="modal-patient-img" src="" alt="Photo du patient">
                    <h3 id="modal-patient-name"></h3>
                </div>

                <div class="medical-history-section">
                    <div class="medical-card">
                        <h4><i class="fas fa-exclamation-triangle"></i> Allergies</h4>
                        <p id="modal-allergies"></p>
                    </div>

                    <div class="medical-card">
                        <h4><i class="fas fa-heartbeat"></i> Conditions Médicales</h4>
                        <p id="modal-conditions"></p>
                    </div>

                    <div class="medical-card">
                        <h4><i class="fas fa-pills"></i> Médicaments Actuels</h4>
                        <p id="modal-medications"></p>
                    </div>

                    <div class="medical-card">
                        <h4><i class="fas fa-tooth"></i> Antécédents Dentaires</h4>
                        <div class="dental-history">
                            <div class="dental-history-item">
                                <span class="label">Chirurgie dentaire précédente:</span>
                                <span id="modal-surgery" class="value"></span>
                            </div>
                            <div class="dental-history-item">
                                <span class="label">Appareil dentaire précédent:</span>
                                <span id="modal-braces" class="value"></span>
                            </div>
                            <div class="dental-history-item">
                                <span class="label">Maladie des gencives:</span>
                                <span id="modal-gum-disease" class="value"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        const viewButtons = document.querySelectorAll('.dentist-action.view');
        const patientModal = document.getElementById('patientMedicalModal');
        const closeModalBtn = document.querySelector('.close-modal');

        function openPatientMedicalModal(button) {
            const patientData = button.dataset;

            document.getElementById('modal-patient-name').textContent = patientData.name;
            document.getElementById('modal-patient-img').src = patientData.image;

            document.getElementById('modal-allergies').textContent = patientData.allergies;
            document.getElementById('modal-conditions').textContent = patientData.conditions;
            document.getElementById('modal-medications').textContent = patientData.medications;

            const surgeryElement = document.getElementById('modal-surgery');
            surgeryElement.textContent = patientData.previousSurgery;
            surgeryElement.className = `value ${patientData.previousSurgery === 'Oui' ? 'yes' : 'no'}`;

            const bracesElement = document.getElementById('modal-braces');
            bracesElement.textContent = patientData.braces;
            bracesElement.className = `value ${patientData.braces === 'Oui' ? 'yes' : 'no'}`;

            const gumDiseaseElement = document.getElementById('modal-gum-disease');
            gumDiseaseElement.textContent = patientData.gumDisease;
            gumDiseaseElement.className = `value ${patientData.gumDisease === 'Oui' ? 'yes' : 'no'}`;

            patientModal.style.display = 'block';
            document.body.style.overflow = 'hidden';
        }

        function closeModal() {
            patientModal.style.display = 'none';
            document.body.style.overflow = 'auto';
        }

        viewButtons.forEach(button => {
            button.addEventListener('click', function() {
                openPatientMedicalModal(this);
            });
        });

        closeModalBtn.addEventListener('click', closeModal);

        window.addEventListener('click', function(event) {
            if (event.target === patientModal) {
                closeModal();
            }
        });

        document.addEventListener('keydown', function(event) {
            if (event.key === 'Escape' && patientModal.style.display === 'block') {
                closeModal();
            }
        });
    </script>
@endsection
