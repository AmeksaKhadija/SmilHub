@extends('dentist.layout')
@section('statistics')
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
    </style>

    <!-- Stats Cards -->
    <div class="stats-cards">
        <div class="stats-card">
            <div class="stats-card-icon green">
                <i class="fas fa-users"></i>
            </div>
            <div class="stats-card-content">
                <h3 class="stats-card-title">Total des utilisateurs</h3>
                <p class="stats-card-value">{{ $contents }}</p>
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
                <h3 class="stats-card-title">Patients actifs</h3>
                <p class="stats-card-value"> </p>
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
                <h3 class="stats-card-title">Patients inactifs</h3>
                <p class="stats-card-value"></p>
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
                <p class="stats-card-value"></p>
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
                <p class="stats-card-value"></p>
                <div class="stats-card-change up">
                    <i class="fas fa-arrow-up"></i> +18% ce mois-ci
                </div>
            </div>
        </div>
    </div>
@endsection
