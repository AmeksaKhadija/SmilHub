@extends('dentist.layout')

@section('style')
    <style>
        /* Additional styles for content management */
        .content-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .content-title {
            font-size: 1.8rem;
            font-weight: 700;
            margin: 0;
        }

        .content-actions {
            display: flex;
            gap: 10px;
        }

        .btn {
            display: inline-block;
            padding: 10px 20px;
            border-radius: 8px;
            font-weight: 500;
            text-align: center;
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

        .btn-secondary {
            background-color: var(--secondary);
            color: var(--white);
            box-shadow: 0 4px 6px rgba(20, 184, 166, 0.2);
        }

        .btn-secondary:hover {
            background-color: var(--secondary-dark);
            transform: translateY(-3px);
            box-shadow: var(--shadow-md);
        }

        .btn-danger {
            background-color: var(--danger);
            color: var(--white);
        }

        .btn-danger:hover {
            background-color: #dc2626;
            transform: translateY(-3px);
            box-shadow: var(--shadow-md);
        }

        .btn-sm {
            padding: 6px 12px;
            font-size: 0.9rem;
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

        .content-category {
            display: inline-block;
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 0.8rem;
            background-color: rgba(3, 105, 161, 0.1);
            color: var(--primary);
        }

        .content-status {
            display: inline-block;
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 0.8rem;
        }

        .content-status.published {
            background-color: rgba(34, 197, 94, 0.1);
            color: var(--success);
        }

        .content-status.draft {
            background-color: rgba(234, 179, 8, 0.1);
            color: var(--warning);
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




        .empty-state {
            text-align: center;
            padding: 50px 20px;
        }

        .empty-state-icon {
            font-size: 3rem;
            color: var(--gray);
            margin-bottom: 20px;
        }

        .empty-state-title {
            font-size: 1.5rem;
            font-weight: 600;
            margin-bottom: 10px;
            color: var(--text-dark);
        }

        .empty-state-description {
            color: var(--text-light);
            margin-bottom: 20px;
            max-width: 500px;
            margin-left: auto;
            margin-right: auto;
        }
    </style>
@endsection

@section('content')
    <div class="content-header">
        <h1 class="content-title">Gestion du contenu</h1>
        <div class="content-actions">
            <a href="{{ route('contents.create') }}" class="btn btn-primary">
                <i class="fas fa-plus"></i> Créer un nouvel article
            </a>
        </div>
    </div>

    <div class="appointment-table-container">
        <table class="appointment-table">
            <thead>
                <tr>
                    <th>Titre</th>
                    <th>Catégorie</th>
                    <th>Type</th>
                    <th>Date de création</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                {{-- {{ dd( $contents)}} --}}
                @forelse($contents as $content)
                    <tr>
                        <td>{{ $content->title }}</td>
                        <td><span class="content-category">{{ $content->categorie->name }}</span></td>
                        <td>{{ ucfirst($content->type) }}</td>
                        <td>{{ $content->created_at->format('d/m/Y') }}</td>
                        <td>
                            <div class="content-actions-cell">
                                <a href="{{ route('contents.show', $content->id) }}" class="content-action view">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ route('contents.edit', $content->id) }}" class="content-action edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('contents.destroy', $content->id) }}" method="POST"
                                    style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="content-action delete"
                                        onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet article?')">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6">
                            <div class="empty-state">
                                <div class="empty-state-icon">
                                    <i class="fas fa-file-alt"></i>
                                </div>
                                <h3 class="empty-state-title">Aucun contenu trouvé</h3>
                                <p class="empty-state-description">Vous n'avez pas encore créé de contenu. Commencez par
                                    créer votre premier article!</p>
                                <a href="{{ route('contents.create') }}" class="btn btn-primary">
                                    <i class="fas fa-plus"></i> Créer un nouvel article
                                </a>
                            </div>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection

@section('scriptContent')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Simple filtering functionality
            const categoryFilter = document.getElementById('categoryFilter');
            const typeFilter = document.getElementById('typeFilter');

            const tableRows = document.querySelectorAll('.appointment-table tbody tr');

            function applyFilters() {
                const categoryValue = categoryFilter.value;
                const typeValue = typeFilter.value;

                tableRows.forEach(row => {
                    const categoryCell = row.querySelector('td:nth-child(2)').textContent;
                    const typeCell = row.querySelector('td:nth-child(3)').textContent.toLowerCase();
                    const statusCell = row.querySelector('td:nth-child(5)').textContent.trim()
                        .toLowerCase();

                    const categoryMatch = !categoryValue || categoryCell.includes(categoryValue);
                    const typeMatch = !typeValue || typeCell === typeValue;

                    if (categoryMatch && typeMatch) {
                        row.style.display = '';
                    } else {
                        row.style.display = 'none';
                    }
                });
            }

            categoryFilter.addEventListener('change', applyFilters);
            typeFilter.addEventListener('change', applyFilters);
        });
    </script>
@endsection
