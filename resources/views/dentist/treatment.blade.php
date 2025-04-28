@extends('dentist.layout')

@section('treatment')
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

        .content-actions-cell {
            display: flex;
            gap: 10px;
        }

        .content-action {
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

        .content-action.view {
            background-color: var(--info);
        }

        .content-action.edit {
            background-color: var(--warning);
        }

        .content-action.delete {
            background-color: var(--danger);
        }

        .content-action:hover {
            opacity: 0.9;
            transform: translateY(-2px);
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
    </style>

    <div class="page-header">
        <h2 class="page-title">Gestion des Traitements</h2>
    </div>


    <div class="appointment-table-container">
        <table class="appointment-table">
            <thead>
                <tr>
                    <th>Patient</th>
                    <th>Date & Heure</th>
                    <th>Description du Traitement</th>
                    <th>Médicaments</th>
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
                        <td>{{ Carbon\Carbon::parse($appointement->date)->format('M d, Y H:i') }}</td>
                        <td>
                            @if ($appointement->treatment)
                                {{ $appointement->treatment->description }}
                            @else
                                <em>Pas encore de traitement</em>
                            @endif
                        </td>
                        <td>
                            @if ($appointement->treatment)
                                {{ $appointement->treatment->medications }}
                            @else
                                <em>Pas encore de traitement</em>
                            @endif
                        </td>
                        <td>
                            @if ($appointement->treatment)
                                <div class="content-actions-cell">
                                    <a href="{{ route('treatment.edit', $appointement->treatment->id) }}"
                                        class="content-action edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('treatment.destroy', $appointement->treatment->id) }}"
                                        method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="content-action delete"
                                            onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce traitement?')">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            @else
                                <em>Pas d'actions disponibles</em>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
