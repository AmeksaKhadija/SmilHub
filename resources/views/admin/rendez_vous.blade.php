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
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <script></script>
@endsection
