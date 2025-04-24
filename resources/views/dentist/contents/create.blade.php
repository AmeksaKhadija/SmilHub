@extends('dentist.layout')

@section('style')
    <style>
        /* Form styles */
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

        .form-container {
            background-color: var(--white);
            border-radius: 10px;
            box-shadow: var(--shadow);
            padding: 30px;
            margin-bottom: 30px;
        }

        .form-group {
            margin-bottom: 25px;
        }

        .form-label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
            color: var(--text-dark);
        }

        .form-control {
            width: 100%;
            padding: 12px 15px;
            border: 1px solid var(--gray);
            border-radius: 8px;
            font-family: 'Poppins', sans-serif;
            font-size: 1rem;
            color: var(--text-dark);
            transition: all 0.3s ease;
        }

        .form-control:focus {
            outline: none;
            border-color: var(--primary-light);
            box-shadow: 0 0 0 3px rgba(3, 105, 161, 0.1);
        }

        .form-select {
            width: 100%;
            padding: 12px 15px;
            border: 1px solid var(--gray);
            border-radius: 8px;
            font-family: 'Poppins', sans-serif;
            font-size: 1rem;
            color: var(--text-dark);
            appearance: none;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' viewBox='0 0 24 24' fill='none' stroke='%230369a1' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpolyline points='6 9 12 15 18 9'%3E%3C/polyline%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 15px center;
            padding-right: 40px;
            transition: all 0.3s ease;
        }

        .form-select:focus {
            outline: none;
            border-color: var(--primary-light);
            box-shadow: 0 0 0 3px rgba(3, 105, 161, 0.1);
        }

        .form-textarea {
            min-height: 150px;
            resize: vertical;
        }

        .form-footer {
            display: flex;
            justify-content: flex-end;
            gap: 15px;
            margin-top: 30px;
        }

        .form-error {
            color: var(--danger);
            font-size: 0.9rem;
            margin-top: 5px;
        }

        .form-help {
            color: var(--text-light);
            font-size: 0.9rem;
            margin-top: 5px;
        }

        /* Status toggle */
        .status-toggle {
            display: flex;
            align-items: center;
            gap: 15px;
            margin-top: 10px;
        }

        .toggle-label {
            font-weight: 500;
            color: var(--text-dark);
        }

        .toggle-switch {
            position: relative;
            display: inline-block;
            width: 60px;
            height: 30px;
        }

        .toggle-switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        .toggle-slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: var(--gray);
            transition: .4s;
            border-radius: 30px;
        }

        .toggle-slider:before {
            position: absolute;
            content: "";
            height: 22px;
            width: 22px;
            left: 4px;
            bottom: 4px;
            background-color: white;
            transition: .4s;
            border-radius: 50%;
        }

        input:checked+.toggle-slider {
            background-color: var(--success);
        }

        input:focus+.toggle-slider {
            box-shadow: 0 0 1px var(--success);
        }

        input:checked+.toggle-slider:before {
            transform: translateX(30px);
        }

        .toggle-status {
            font-size: 0.9rem;
            font-weight: 500;
        }

        .toggle-status.draft {
            color: var(--warning);
        }

        .toggle-status.published {
            color: var(--success);
        }
    </style>
@endsection

@section('content')
    <div class="content-header">
        <h1 class="content-title">Créer un nouvel article</h1>
        <div class="content-actions">
            <a href="{{ route('contents.index') }}" class="btn btn-outline">
                <i class="fas fa-arrow-left"></i> Retour à la liste
            </a>
        </div>
    </div>

    <div class="form-container">
        @if ($errors->any())
            <div class="alert alert-danger"
                style="margin-bottom: 20px; padding: 15px; background-color: #fee2e2; border-radius: 8px; color: #ef4444;">
                <ul style="margin: 0; padding-left: 20px;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('contents.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @auth
                @if (Auth::user()->role == 'dentist')
                    <input type="hidden" name="dentist_id" value="{{ Auth::user()->dentist->id }}">
                @endauth
            @endif

            <div class="form-group">
                <label for="title" class="form-label">Titre</label>
                <input type="text" id="title" name="title" class="form-control" value="{{ old('title') }}"
                    required>
                <p class="form-help">Choisissez un titre clair et descriptif pour votre article.</p>
            </div>

            <div class="form-group">
                <label for="type" class="form-label">Type</label>
                <select id="type" name="type" class="form-select" required>
                    <option value="">Sélectionnez un type</option>
                    <option value="article" {{ old('type') == 'article' ? 'selected' : '' }}>Article</option>
                    <option value="guide" {{ old('type') == 'guide' ? 'selected' : '' }}>Guide</option>
                    <option value="conseil" {{ old('type') == 'conseil' ? 'selected' : '' }}>Conseil</option>
                    <option value="faq" {{ old('type') == 'faq' ? 'selected' : '' }}>FAQ</option>
                </select>
            </div>

            <div class="form-group">
                <label for="categorie_id" class="form-label">Catégorie</label>
                <select id="categorie_id" name="categorie_id" class="form-select" required>
                    <option value="">Sélectionnez une catégorie</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ old('categorie_id') == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="content" class="form-label">Contenu</label>
                <textarea id="content" name="content" class="form-control form-textarea" required>{{ old('content') }}</textarea>
                <p class="form-help">Rédigez votre contenu en utilisant les outils de mise en forme ci-dessus.</p>
            </div>
            <div class="form-group">
                <label for="content" class="form-label">Image</label>
                <input type="file" id="image" name="image" class="form-control" required>
                <p class="form-help">Rédigez votre contenu en utilisant les outils de mise en forme ci-dessus.</p>
            </div>
            <div class="form-footer">
                <a href="{{ route('contents.index') }}" class="btn btn-outline">Annuler</a>
                <button type="submit" class="btn btn-primary">Enregistrer</button>
            </div>
        </form>
    </div>
@endsection

@section('scriptContent')
    <script>
        document.addEventListener('DOMContentLoaded', function() {


            // Status toggle
            const statusToggle = document.querySelector('input[name="status"]');
            const statusText = document.getElementById('statusText');
            const statusInput = document.getElementById('statusInput');

            statusToggle.addEventListener('change', function() {
                if (this.checked) {
                    statusText.textContent = 'Publié';
                    statusText.className = 'toggle-status published';
                    statusInput.value = 'published';
                } else {
                    statusText.textContent = 'Brouillon';
                    statusText.className = 'toggle-status draft';
                    statusInput.value = 'draft';
                }
            });
        });
    </script>
@endsection
