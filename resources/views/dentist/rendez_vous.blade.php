@extends('dentist.layout')
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



        .user-table-btn-user {
            background-color: #81dde9;
            border: none;
            border-radius: 8px;
            padding: 6px 10px;
            font-size: 16px;
            color: #099dff;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }

        .user-table-btn-user:hover {
            background-color: #1aaeee;
            transform: scale(1.05);
            color: #64e8ff;
        }

        .user-table-btn-user i {
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

        /* Style du Modal */
        .custom-modal {
            display: none;
            /* Cache le modal par défaut */
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            /* Fond semi-transparent */
            justify-content: center;
            align-items: center;
        }

        /* Contenu du Modal */
        .modal-content {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            width: 400px;
            max-width: 100%;
        }

        /* Bouton de fermeture */
        .close-modal {
            position: absolute;
            top: 10px;
            right: 10px;
            font-size: 20px;
            color: #333;
            cursor: pointer;
        }

        .close-modal:hover {
            color: red;
        }

        /* Footer du Modal */
        .modal-footer {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }

        /* Style des boutons */
        .btn {
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
            border: none;
        }

        .btn-secondary {
            background-color: #ccc;
        }

        .btn-primary {
            background-color: #007bff;
            color: white;
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
                    <th>Télephone</th>
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
                                <div class="appointment-dentist-info">
                                    <div class="appointment-dentist-name">{{ $appointement->patient->user->phone }}</div>
                                </div>
                            </div>
                        </td>
                        <td>{{ Carbon\Carbon::parse($appointement->date)->format('M d, Y H:i') }}</td>
                        <td><span
                                class="appointment-status {{ strtolower($appointement->status) }}">{{ $appointement->status }}</span>
                        </td>
                        <td>
                            <div class="user-table-actions">
                                <div class="user-table-action">
                                    @if ($appointement->status == 'completed')
                                        <button type="button" class="user-table-btn-user" id="openTreatmentModal"
                                            data-id="{{ $appointement->id }}" title="Ajouter un traitement">
                                            <i class="fa fa-user-md" aria-hidden="true"></i>
                                        </button>
                                    @endif
                                </div>
                                <div class="user-table-action">
                                    @if ($appointement->status != 'confirmed' && $appointement->status != 'completed')
                                        <form action="{{ route('dentist.appointement.accepter', $appointement->id) }}"
                                            method="POST">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit" class="user-table-btn-unlock"
                                                title="accepter appointement">
                                                <i class="fa fa-check" aria-hidden="true"></i>
                                            </button>
                                        </form>
                                    @endif
                                </div>
                                <div class="user-table-action">
                                    @if ($appointement->status != 'completed' && $appointement->status != 'cancelled')
                                        <form action="{{ route('dentist.appointement.annuler', $appointement->id) }}"
                                            method="POST">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit" class="user-table-btn" title="annuler appointement">
                                                <i class="fa fa-times" aria-hidden="true"></i>
                                            </button>
                                        </form>
                                    @endif
                                </div>
                                <div class="user-table-action">
                                    @if ($appointement->status == 'confirmed')
                                        <form action="{{ route('dentist.appointement.compliter', $appointement->id) }}"
                                            method="POST">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit" class="user-table-btn-done"
                                                title="complète appointement">
                                                <i class="fa fa-thumbs-up" aria-hidden="true"></i>
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


    <!-- Modal Ajouter un traitement -->
    <div id="treatmentModal" class="custom-modal">
        <div class="modal-content">
            <span class="close-modal" id="closeModal">&times;</span>
            <h5>Ajouter un traitement</h5>
            <form action="{{ route('dentist.appointement.addTraitement') }}" id="addTreatment" method="POST">
                @csrf
                @method('POST')
                <div class="mb-3">
                    <label for="description" class="form-label">Description du traitement</label>
                    <textarea name="description" id="description" class="form-control" rows="3" required></textarea>
                </div>
                <div class="mb-3">
                    <label for="medications" class="form-label">Médicaments</label>
                    <textarea name="medications" id="medications" class="form-control" rows="3" required></textarea>
                </div>
                <div class="modal-footer">

                    <input type="hidden" name="appointment_id" id="appId" value="{{ $appointement->id }}">
                    <button type="button" class="btn btn-secondary" id="closeModalBtn">Fermer</button>
                    <button type="submit" id="submit" class="btn btn-primary">Enregistrer</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        // Obtenez les éléments nécessaires
        const modal = document.getElementById('treatmentModal');
        const openModalButton = document.getElementById('openTreatmentModal');
        const closeModalButton = document.getElementById('closeModal');
        const closeModalBtn = document.getElementById('closeModalBtn');

        openModalButton.addEventListener('click', () => {
            const form = document.getElementById('addTreatment');
            form.reset();
            const appointementId = openModalButton.getAttribute('data-id');
            document.getElementById('appId').value = appointementId;
            modal.style.display = 'flex';
            document.body.style.overflow = 'hidden';
        });

        function closeModal() {
            modal.style.display = 'none';
            document.body.style.overflow = 'auto';
        }

        closeModalButton.addEventListener('click', closeModal);
        closeModalBtn.addEventListener('click', closeModal);

        // Fermeture du modal si on clique en dehors du contenu du modal
        window.addEventListener('click', (event) => {
            if (event.target === modal) {
                closeModal();
            }
        });

        // Fermeture du modal avec la touche "Échap"
        document.addEventListener('keydown', (event) => {
            if (event.key === 'Escape' && modal.style.display === 'flex') {
                closeModal();
            }
        });
    </script>
@endsection
