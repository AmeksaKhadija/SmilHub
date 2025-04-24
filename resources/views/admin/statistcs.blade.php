@extends('./admin/layout')
@section('statistics')
<style>
    /* Styles pour les statistiques */
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

    .stats-period {
        display: flex;
        gap: 10px;
        margin-bottom: 20px;
    }

    .stats-period-btn {
        padding: 8px 15px;
        background-color: var(--white);
        border-radius: 8px;
        font-weight: 500;
        cursor: pointer;
        transition: all 0.3s ease;
        box-shadow: var(--shadow-sm);
    }

    .stats-period-btn.active {
        background-color: var(--primary);
        color: var(--white);
    }

    .stats-period-btn:hover:not(.active) {
        background-color: var(--light-gray);
        transform: translateY(-3px);
        box-shadow: var(--shadow);
    }

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

    .chart-grid {
        display: grid;
        grid-template-columns: 2fr 1fr;
        gap: 20px;
        margin-bottom: 30px;
    }

    .chart-card {
        background-color: var(--white);
        border-radius: 10px;
        padding: 20px;
        box-shadow: var(--shadow);
    }

    .chart-card-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 20px;
    }

    .chart-card-title {
        font-size: 1.2rem;
        font-weight: 600;
    }

    .chart-card-action {
        color: var(--primary);
        font-size: 0.9rem;
        font-weight: 500;
    }

    .chart-card-action:hover {
        text-decoration: underline;
    }

    .chart-container {
        height: 300px;
        position: relative;
    }

    .chart-legend {
        display: flex;
        justify-content: center;
        gap: 20px;
        margin-top: 20px;
    }

    .chart-legend-item {
        display: flex;
        align-items: center;
        gap: 5px;
        font-size: 0.9rem;
        color: var(--text-light);
    }

    .chart-legend-color {
        width: 12px;
        height: 12px;
        border-radius: 50%;
    }

    .chart-legend-color.blue {
        background-color: var(--primary);
    }

    .chart-legend-color.green {
        background-color: var(--secondary);
    }

    .chart-legend-color.orange {
        background-color: var(--accent);
    }

    .stats-table-container {
        background-color: var(--white);
        border-radius: 10px;
        box-shadow: var(--shadow);
        overflow: hidden;
        margin-bottom: 30px;
    }

    .stats-table {
        width: 100%;
        border-collapse: collapse;
    }

    .stats-table th {
        background-color: var(--light-gray);
        color: var(--text-dark);
        font-weight: 600;
        text-align: left;
        padding: 15px;
        border-bottom: 1px solid var(--gray);
    }

    .stats-table td {
        padding: 15px;
        border-bottom: 1px solid var(--gray);
        color: var(--text-dark);
    }

    .stats-table tr:last-child td {
        border-bottom: none;
    }

    .stats-table tr:hover {
        background-color: var(--light-gray);
    }

    .progress-bar-container {
        width: 100%;
        height: 8px;
        background-color: var(--light-gray);
        border-radius: 4px;
        overflow: hidden;
    }

    .progress-bar {
        height: 100%;
        border-radius: 4px;
    }

    .progress-bar.blue {
        background-color: var(--primary);
    }

    .progress-bar.green {
        background-color: var(--secondary);
    }

    .progress-bar.orange {
        background-color: var(--accent);
    }

    .progress-bar.purple {
        background-color: var(--purple);
    }

    /* Responsive */
    @media (max-width: 1200px) {
        .stats-cards {
            grid-template-columns: repeat(2, 1fr);
        }
    }

    @media (max-width: 992px) {
        .chart-grid {
            grid-template-columns: 1fr;
        }
    }

    @media (max-width: 768px) {
        .stats-table {
            display: block;
            overflow-x: auto;
        }

        .page-header {
            flex-direction: column;
            align-items: flex-start;
            gap: 15px;
        }

        .stats-cards {
            grid-template-columns: 1fr;
        }

        .stats-period {
            width: 100%;
            overflow-x: auto;
            padding-bottom: 5px;
        }
    }
</style>

<div class="page-header">
    <h2 class="page-title">Statistiques et analyses</h2>
    <button class="btn btn-primary">
        <i class="fas fa-download"></i> Exporter le rapport
    </button>
</div>

<div class="stats-period">
    <div class="stats-period-btn active">Aujourd'hui</div>
    <div class="stats-period-btn">Cette semaine</div>
    <div class="stats-period-btn">Ce mois</div>
    <div class="stats-period-btn">Ce trimestre</div>
    <div class="stats-period-btn">Cette année</div>
    <div class="stats-period-btn">Personnalisé</div>
</div>

<div class="stats-cards">
    <div class="stats-card">
        <div class="stats-card-icon blue">
            <i class="fas fa-user-md"></i>
        </div>
        <div class="stats-card-content">
            <h3 class="stats-card-title">Dentistes actifs</h3>
            <p class="stats-card-value">15</p>
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
            <p class="stats-card-value">1,248</p>
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
            <p class="stats-card-value">328</p>
            <div class="stats-card-change up">
                <i class="fas fa-arrow-up"></i> +18% ce mois-ci
            </div>
        </div>
    </div>
    <div class="stats-card">
        <div class="stats-card-icon purple">
            <i class="fas fa-euro-sign"></i>
        </div>
        <div class="stats-card-content">
            <h3 class="stats-card-title">Revenus totaux</h3>
            <p class="stats-card-value">42,580 €</p>
            <div class="stats-card-change up">
                <i class="fas fa-arrow-up"></i> +8% ce mois-ci
            </div>
        </div>
    </div>
</div>

<div class="chart-grid">
    <div class="chart-card">
        <div class="chart-card-header">
            <h3 class="chart-card-title">Évolution des rendez-vous</h3>
            <div class="chart-card-action">Voir les détails</div>
        </div>
        <div class="chart-container">
            <canvas id="appointmentsChart"></canvas>
        </div>
        <div class="chart-legend">
            <div class="chart-legend-item">
                <div class="chart-legend-color blue"></div>
                <span>Confirmés</span>
            </div>
            <div class="chart-legend-item">
                <div class="chart-legend-color green"></div>
                <span>Terminés</span>
            </div>
            <div class="chart-legend-item">
                <div class="chart-legend-color orange"></div>
                <span>Annulés</span>
            </div>
        </div>
    </div>
    <div class="chart-card">
        <div class="chart-card-header">
            <h3 class="chart-card-title">Répartition des patients</h3>
            <div class="chart-card-action">Voir les détails</div>
        </div>
        <div class="chart-container">
            <canvas id="patientsChart"></canvas>
        </div>
    </div>
</div>

<div class="chart-grid">
    <div class="chart-card">
        <div class="chart-card-header">
            <h3 class="chart-card-title">Revenus mensuels</h3>
            <div class="chart-card-action">Voir les détails</div>
        </div>
        <div class="chart-container">
            <canvas id="revenueChart"></canvas>
        </div>
    </div>
    <div class="chart-card">
        <div class="chart-card-header">
            <h3 class="chart-card-title">Types de traitements</h3>
            <div class="chart-card-action">Voir les détails</div>
        </div>
        <div class="chart-container">
            <canvas id="treatmentsChart"></canvas>
        </div>
    </div>
</div>

<div class="stats-table-container">
    <table class="stats-table">
        <thead>
            <tr>
                <th>Dentiste</th>
                <th>Patients</th>
                <th>Rendez-vous</th>
                <th>Taux de complétion</th>
                <th>Revenus générés</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Dr. Thomas Dubois</td>
                <td>325</td>
                <td>128</td>
                <td>
                    <div class="progress-bar-container">
                        <div class="progress-bar blue" style="width: 92%"></div>
                    </div>
                    <div style="text-align: right; font-size: 0.9rem; margin-top: 5px;">92%</div>
                </td>
                <td>12,450 €</td>
            </tr>
            <tr>
                <td>Dr. Marie Leroy</td>
                <td>287</td>
                <td>95</td>
                <td>
                    <div class="progress-bar-container">
                        <div class="progress-bar green" style="width: 88%"></div>
                    </div>
                    <div style="text-align: right; font-size: 0.9rem; margin-top: 5px;">88%</div>
                </td>
                <td>10,820 €</td>
            </tr>
            <tr>
                <td>Dr. Pierre Moreau</td>
                <td>198</td>
                <td>76</td>
                <td>
                    <div class="progress-bar-container">
                        <div class="progress-bar orange" style="width: 78%"></div>
                    </div>
                    <div style="text-align: right; font-size: 0.9rem; margin-top: 5px;">78%</div>
                </td>
                <td>8,340 €</td>
            </tr>
            <tr>
                <td>Dr. Claire Dubois</td>
                <td>245</td>
                <td>112</td>
                <td>
                    <div class="progress-bar-container">
                        <div class="progress-bar purple" style="width: 85%"></div>
                    </div>
                    <div style="text-align: right; font-size: 0.9rem; margin-top: 5px;">85%</div>
                </td>
                <td>9,780 €</td>
            </tr>
            <tr>
                <td>Dr. Jean Martin</td>
                <td>193</td>
                <td>89</td>
                <td>
                    <div class="progress-bar-container">
                        <div class="progress-bar blue" style="width: 82%"></div>
                    </div>
                    <div style="text-align: right; font-size: 0.9rem; margin-top: 5px;">82%</div>
                </td>
                <td>7,890 €</td>
            </tr>
        </tbody>
    </table>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Gestion des périodes
        const periodButtons = document.querySelectorAll('.stats-period-btn');
        
        periodButtons.forEach(button => {
            button.addEventListener('click', function() {
                periodButtons.forEach(btn => btn.classList.remove('active'));
                this.classList.add('active');
                
                // Ici, vous pourriez ajouter une logique pour mettre à jour les données en fonction de la période sélectionnée
                updateChartsForPeriod(this.textContent.toLowerCase());
            });
        });
        
        function updateChartsForPeriod(period) {
            // Simuler une mise à jour des graphiques
            console.log(`Mise à jour des graphiques pour la période: ${period}`);
            // Dans une application réelle, vous feriez une requête AJAX pour obtenir de nouvelles données
            // puis mettriez à jour les graphiques avec ces données
        }
        
        // Graphique des rendez-vous
        const appointmentsCtx = document.getElementById('appointmentsChart').getContext('2d');
        const appointmentsChart = new Chart(appointmentsCtx, {
            type: 'line',
            data: {
                labels: ['Jan', 'Fév', 'Mar', 'Avr', 'Mai', 'Juin', 'Juil', 'Août', 'Sep', 'Oct', 'Nov', 'Déc'],
                datasets: [
                    {
                        label: 'Confirmés',
                        data: [65, 59, 80, 81, 56, 55, 40, 45, 60, 70, 75, 80],
                        backgroundColor: 'rgba(3, 105, 161, 0.2)',
                        borderColor: 'rgba(3, 105, 161, 1)',
                        borderWidth: 2,
                        tension: 0.4
                    },
                    {
                        label: 'Terminés',
                        data: [28, 48, 40, 19, 86, 27, 30, 35, 40, 50, 55, 60],
                        backgroundColor: 'rgba(20, 184, 166, 0.2)',
                        borderColor: 'rgba(20, 184, 166, 1)',
                        borderWidth: 2,
                        tension: 0.4
                    },
                    {
                        label: 'Annulés',
                        data: [10, 15, 8, 12, 9, 11, 7, 8, 10, 12, 9, 11],
                        backgroundColor: 'rgba(249, 115, 22, 0.2)',
                        borderColor: 'rgba(249, 115, 22, 1)',
                        borderWidth: 2,
                        tension: 0.4
                    }
                ]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
        
        // Graphique de répartition des patients
        const patientsCtx = document.getElementById('patientsChart').getContext('2d');
        const patientsChart = new Chart(patientsCtx, {
            type: 'doughnut',
            data: {
                labels: ['Nouveaux', 'Réguliers', 'Inactifs'],
                datasets: [{
                    data: [124, 985, 139],
                    backgroundColor: [
                        'rgba(3, 105, 161, 0.8)',
                        'rgba(20, 184, 166, 0.8)',
                        'rgba(249, 115, 22, 0.8)'
                    ],
                    borderColor: [
                        'rgba(3, 105, 161, 1)',
                        'rgba(20, 184, 166, 1)',
                        'rgba(249, 115, 22, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'bottom'
                    }
                }
            }
        });
        
        // Graphique des revenus
        const revenueCtx = document.getElementById('revenueChart').getContext('2d');
        const revenueChart = new Chart(revenueCtx, {
            type: 'bar',
            data: {
                labels: ['Jan', 'Fév', 'Mar', 'Avr', 'Mai', 'Juin', 'Juil', 'Août', 'Sep', 'Oct', 'Nov', 'Déc'],
                datasets: [{
                    label: 'Revenus (€)',
                    data: [3250, 3800, 4200, 3900, 4500, 5100, 4800, 5200, 5600, 6100, 5800, 6300],
                    backgroundColor: 'rgba(124, 58, 237, 0.8)',
                    borderColor: 'rgba(124, 58, 237, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
        
        // Graphique des types de traitements
        const treatmentsCtx = document.getElementById('treatmentsChart').getContext('2d');
        const treatmentsChart = new Chart(treatmentsCtx, {
            type: 'pie',
            data: {
                labels: ['Nettoyage', 'Extraction', 'Canal', 'Orthodontie', 'Implant'],
                datasets: [{
                    data: [45, 15, 20, 10, 10],
                    backgroundColor: [
                        'rgba(3, 105, 161, 0.8)',
                        'rgba(20, 184, 166, 0.8)',
                        'rgba(249, 115, 22, 0.8)',
                        'rgba(124, 58, 237, 0.8)',
                        'rgba(236, 72, 153, 0.8)'
                    ],
                    borderColor: [
                        'rgba(3, 105, 161, 1)',
                        'rgba(20, 184, 166, 1)',
                        'rgba(249, 115, 22, 1)',
                        'rgba(124, 58, 237, 1)',
                        'rgba(236, 72, 153, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'bottom'
                    }
                }
            }
        });
    });
</script>
@endsection