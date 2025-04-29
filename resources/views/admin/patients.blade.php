@extends('./admin/layout')
@section('patients')
    <style>
        /* Styles pour la gestion des patients */
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

        .stats-row {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
            margin-bottom: 30px;
        }

        .stat-card {
            background-color: var(--white);
            border-radius: 10px;
            padding: 20px;
            box-shadow: var(--shadow);
            display: flex;
            align-items: center;
            gap: 20px;
            transition: all 0.3s ease;
        }

        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: var(--shadow-md);
        }

        .stat-card-icon {
            width: 60px;
            height: 60px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.8rem;
        }

        .stat-card-icon.blue {
            background-color: rgba(3, 105, 161, 0.1);
            color: var(--primary);
        }

        .stat-card-icon.green {
            background-color: rgba(20, 184, 166, 0.1);
            color: var(--secondary);
        }

        .stat-card-icon.orange {
            background-color: rgba(249, 115, 22, 0.1);
            color: var(--accent);
        }

        .stat-card-icon.purple {
            background-color: rgba(124, 58, 237, 0.1);
            color: var(--purple);
        }

        .stat-card-content {
            flex: 1;
        }

        .stat-card-title {
            color: var(--text-light);
            font-size: 0.9rem;
            margin-bottom: 5px;
        }

        .stat-card-value {
            font-size: 1.8rem;
            font-weight: 700;
        }

        .stat-card-change {
            display: flex;
            align-items: center;
            gap: 5px;
            font-size: 0.8rem;
            margin-top: 5px;
        }

        .stat-card-change.up {
            color: var(--success);
        }

        .stat-card-change.down {
            color: var(--danger);
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

        .patient-table-container {
            background-color: var(--white);
            border-radius: 10px;
            box-shadow: var(--shadow);
            overflow: hidden;
            margin-bottom: 20px;
        }

        .patient-table {
            width: 100%;
            border-collapse: collapse;
        }

        .patient-table th {
            background-color: var(--light-gray);
            color: var(--text-dark);
            font-weight: 600;
            text-align: left;
            padding: 15px;
            border-bottom: 1px solid var(--gray);
        }

        .patient-table td {
            padding: 15px;
            border-bottom: 1px solid var(--gray);
            color: var(--text-dark);
        }

        .patient-table tr:last-child td {
            border-bottom: none;
        }

        .patient-table tr:hover {
            background-color: var(--light-gray);
        }

        .patient-profile {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .patient-profile-img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            object-fit: cover;
        }

        .patient-profile-info {
            display: flex;
            flex-direction: column;
        }

        .patient-profile-name {
            font-weight: 600;
        }

        .patient-profile-email {
            color: var(--text-light);
            font-size: 0.85rem;
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

        .patient-actions {
            display: flex;
            gap: 10px;
        }

        .patient-action {
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

        .patient-action.view {
            background-color: var(--info);
        }

        .patient-action.edit {
            background-color: var(--warning);
        }

        .patient-action.delete {
            background-color: var(--danger);
        }

        .patient-action:hover {
            opacity: 0.9;
            transform: translateY(-2px);
        }

        

        /* Responsive */
        @media (max-width: 1200px) {
            .stats-row {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 992px) {
            .filter-bar {
                flex-direction: column;
                align-items: flex-start;
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
            .patient-table {
                display: block;
                overflow-x: auto;
            }

            .page-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 15px;
            }

            .stats-row {
                grid-template-columns: 1fr;
            }
        }
    </style>

    <div class="page-header">
        <h2 class="page-title">Gestion des patients</h2>
    </div>

    <div class="patient-table-container">
        <table class="patient-table">
            <thead>
                <tr>
                    <th>Patient</th>
                    <th>Téléphone</th>
                    <th>Dentiste assigné</th>
                    <th>Dernière visite</th>
                    <th>Prochain RDV</th>
                    <th>Statut</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($patients as $patient)
                    <tr>
                        <td>
                            <div class="patient-profile">
                                <img src="{{ $patient->user->image }}" alt="Sophie Martin" class="patient-profile-img">
                                <div class="patient-profile-info">
                                    <div class="patient-profile-name">{{ $patient->user->nom }} {{ $patient->user->prenom }}
                                    </div>
                                    <div class="patient-profile-email">{{ $patient->user->email }}</div>
                                </div>
                            </div>
                        </td>
                        <td>{{ $patient->user->phone }}</td>
                        <td>

                            @if ($patient->appointments->isNotEmpty())
                                @if (count($patient->appointments) > 1)
                                    Multiple
                                @else
                                    Dr. {{ $patient->appointments->last()->dentist->user->nom }}
                                    {{ $patient->appointments->last()->dentist->user->prenom }}
                                @endif
                            @else
                                -
                            @endif
                        </td>
                        <td>{{ Carbon\Carbon::parse($patient->appointments->last()->date)->format('M d, Y') }}</td>
                        <td>
                            @if ($patient->next_appointement != null)
                                {{ Carbon\Carbon::parse($patient->next_appointement->date)->format('M d, Y H:i') }}
                            @else
                                -------
                            @endif
                        </td>
                        <td><span class="patient-status active">{{ $patient->status }}</span></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Filtrage des patients
            const statusFilter = document.getElementById('statusFilter');
            const dentistFilter = document.getElementById('dentistFilter');
            const searchInput = document.getElementById('searchInput');
            const patientRows = document.querySelectorAll('.patient-table tbody tr');

            function applyFilters() {
                const statusValue = statusFilter.value.toLowerCase();
                const dentistValue = dentistFilter.options[dentistFilter.selectedIndex].text.toLowerCase();
                const searchValue = searchInput.value.toLowerCase();

                patientRows.forEach(row => {
                    const statusText = row.querySelector('.patient-status').textContent.toLowerCase();
                    const dentistText = row.querySelector('td:nth-child(3)').textContent.toLowerCase();
                    const nameText = row.querySelector('.patient-profile-name').textContent.toLowerCase();
                    const emailText = row.querySelector('.patient-profile-email').textContent.toLowerCase();
                    const phoneText = row.querySelector('td:nth-child(2)').textContent.toLowerCase();

                    const matchesStatus = !statusValue || statusText.includes(statusValue);
                    const matchesDentist = !dentistValue || dentistValue === "tous les dentistes" ||
                        dentistText.includes(dentistValue);
                    const matchesSearch = !searchValue ||
                        nameText.includes(searchValue) ||
                        emailText.includes(searchValue) ||
                        phoneText.includes(searchValue);

                    if (matchesStatus && matchesDentist && matchesSearch) {
                        row.style.display = '';
                    } else {
                        row.style.display = 'none';
                    }
                });
            }

            statusFilter.addEventListener('change', applyFilters);
            dentistFilter.addEventListener('change', applyFilters);
            searchInput.addEventListener('input', applyFilters);

        });
    </script>
@endsection
