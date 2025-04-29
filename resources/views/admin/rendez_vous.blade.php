@extends('./admin/layout')
@section('rendez_vous')
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

        .filter-date {
            padding: 8px 12px;
            border: 1px solid var(--gray);
            border-radius: 5px;
            font-family: 'Poppins', sans-serif;
            color: var(--text-dark);
        }

        .filter-date:focus {
            outline: none;
            border-color: var(--primary-light);
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
            font-weight: 600;
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

        .appointment-actions {
            display: flex;
            gap: 10px;
        }

        .appointment-action {
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
    </style>

    <div class="page-header">
        <h2 class="page-title">Gestion des rendez-vous</h2>
    </div>



    <div class="appointment-table-container">
        <table class="appointment-table">
            <thead>
                <tr>
                    <th>Patient</th>
                    <th>Dentiste</th>
                    <th>Date & Heure</th>
                    <th>Statut</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($appointements as $appointement)
                    <tr>
                        <td>
                            <div class="appointment-patient">
                                <img src="{{ $appointement->patient->user->image }}"
                                    alt="{{ $appointement->patient->user->nom }}" class="appointment-patient-img">
                                <div class="appointment-patient-info">
                                    <div class="appointment-patient-name">{{ $appointement->patient->user->nom }}
                                        {{ $appointement->patient->user->prenom }}</div>
                                    <div class="appointment-patient-email">{{ $appointement->patient->user->email }}</div>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="appointment-dentist">
                                <img src="{{ $appointement->dentist->user->image }}" alt="Dr. Thomas Dubois"
                                    class="appointment-dentist-img">
                                <div class="appointment-dentist-info">
                                    <div class="appointment-dentist-name">Dr. {{ $appointement->dentist->user->nom }}
                                        {{ $appointement->dentist->user->prenom }}</div>
                                    <div class="appointment-dentist-specialty">{{ $appointement->dentist->speciality }}
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td>{{ Carbon\Carbon::parse($appointement->date)->format('M d, Y H:i') }}</td>
                        <td><span
                                class="appointment-status {{ strtolower($appointement->status) }}">{{ $appointement->status }}</span>
                        </td>
                        <td>
                            <div class="appointment-actions">
                                <button class="appointment-action view" title="Voir les détails">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Gestion des onglets
            const tabs = document.querySelectorAll('.appointment-tab');

            tabs.forEach(tab => {
                tab.addEventListener('click', function() {
                    tabs.forEach(t => t.classList.remove('active'));
                    this.classList.add('active');

                    // Filtrer les rendez-vous en fonction de l'onglet sélectionné
                    const tabText = this.textContent.split(' ')[0].toLowerCase();
                    filterAppointmentsByTab(tabText);
                });
            });

            function filterAppointmentsByTab(tabText) {
                const rows = document.querySelectorAll('.appointment-table tbody tr');

                rows.forEach(row => {
                    const statusText = row.querySelector('.appointment-status').textContent.toLowerCase();
                    const dateText = row.querySelector('td:nth-child(3)').textContent;

                    // Logique de filtrage en fonction de l'onglet
                    if (tabText === 'tous') {
                        row.style.display = '';
                    } else if (tabText === 'aujourd\'hui') {
                        const today = new Date().toLocaleDateString('fr-FR');
                        const appointmentDate = dateText.split(' - ')[0];
                        row.style.display = appointmentDate === today ? '' : 'none';
                    } else if (tabText === 'cette') {
                        // Logique pour filtrer cette semaine
                        row.style.display = ''; // Simplifié pour l'exemple
                    } else if (tabText === 'confirmés' && statusText === 'confirmé') {
                        row.style.display = '';
                    } else if (tabText === 'en' && statusText === 'en attente') {
                        row.style.display = '';
                    } else if (tabText === 'annulés' && statusText === 'annulé') {
                        row.style.display = '';
                    } else if (tabText === 'terminés' && statusText === 'terminé') {
                        row.style.display = '';
                    } else {
                        row.style.display = 'none';
                    }
                });
            }

            // Filtrage des rendez-vous
            const statusFilter = document.getElementById('statusFilter');
            const dentistFilter = document.getElementById('dentistFilter');
            const dateFilter = document.getElementById('dateFilter');
            const searchInput = document.getElementById('searchInput');
            const appointmentRows = document.querySelectorAll('.appointment-table tbody tr');

            function applyFilters() {
                const statusValue = statusFilter.value.toLowerCase();
                const dentistValue = dentistFilter.options[dentistFilter.selectedIndex].text.toLowerCase();
                const dateValue = dateFilter.value ? new Date(dateFilter.value) : null;
                const searchValue = searchInput.value.toLowerCase();

                appointmentRows.forEach(row => {
                    const statusText = row.querySelector('.appointment-status').textContent.toLowerCase();
                    const dentistText = row.querySelector('.appointment-dentist-name').textContent
                        .toLowerCase();
                    const patientText = row.querySelector('.appointment-patient-name').textContent
                        .toLowerCase();
                    const dateText = row.querySelector('td:nth-child(3)').textContent.split(' - ')[0];
                    const typeText = row.querySelector('td:nth-child(4)').textContent.toLowerCase();

                    // Convertir la date du rendez-vous au format YYYY-MM-DD pour la comparaison
                    const dateParts = dateText.split('/');
                    const appointmentDate = new Date(`${dateParts[2]}-${dateParts[1]}-${dateParts[0]}`);

                    const matchesStatus = !statusValue || statusText.includes(statusValue);
                    const matchesDentist = !dentistValue || dentistValue === "tous les dentistes" ||
                        dentistText.includes(dentistValue);
                    const matchesDate = !dateValue || (
                        appointmentDate.getFullYear() === dateValue.getFullYear() &&
                        appointmentDate.getMonth() === dateValue.getMonth() &&
                        appointmentDate.getDate() === dateValue.getDate()
                    );
                    const matchesSearch = !searchValue ||
                        patientText.includes(searchValue) ||
                        dentistText.includes(searchValue) ||
                        typeText.includes(searchValue);

                    if (matchesStatus && matchesDentist && matchesDate && matchesSearch) {
                        row.style.display = '';
                    } else {
                        row.style.display = 'none';
                    }
                });
            }

            statusFilter.addEventListener('change', applyFilters);
            dentistFilter.addEventListener('change', applyFilters);
            dateFilter.addEventListener('change', applyFilters);
            searchInput.addEventListener('input', applyFilters);

            // Actions des boutons
            const viewButtons = document.querySelectorAll('.appointment-action.view');
            const editButtons = document.querySelectorAll('.appointment-action.edit');
            const deleteButtons = document.querySelectorAll('.appointment-action.delete');

            viewButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const row = this.closest('tr');
                    const patient = row.querySelector('.appointment-patient-name').textContent;
                    const dentist = row.querySelector('.appointment-dentist-name').textContent;
                    const date = row.querySelector('td:nth-child(3)').textContent;

                    alert(
                        `Détails du rendez-vous:\nPatient: ${patient}\nDentiste: ${dentist}\nDate: ${date}`
                    );
                });
            });

            editButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const row = this.closest('tr');
                    const patient = row.querySelector('.appointment-patient-name').textContent;
                    const dentist = row.querySelector('.appointment-dentist-name').textContent;

                    alert(`Modification du rendez-vous pour ${patient} avec ${dentist}`);
                });
            });

            deleteButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const row = this.closest('tr');
                    const patient = row.querySelector('.appointment-patient-name').textContent;
                    const dentist = row.querySelector('.appointment-dentist-name').textContent;

                    if (confirm(
                            `Êtes-vous sûr de vouloir supprimer le rendez-vous de ${patient} avec ${dentist} ?`
                        )) {
                        // Simuler la suppression
                        row.style.opacity = '0.5';
                        setTimeout(() => {
                            row.remove();
                        }, 500);
                    }
                });
            });
        });
    </script>
@endsection
