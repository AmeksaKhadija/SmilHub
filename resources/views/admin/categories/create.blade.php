@extends('./admin.layout')

<style>
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
        background-color: #0369a1;
        color: white;
        box-shadow: 0 4px 6px rgba(3, 105, 161, 0.2);
    }

    .btn-primary:hover {
        background-color: #03557f;
        transform: translateY(-3px);
        box-shadow: 0 4px 10px rgba(3, 105, 161, 0.3);
    }

    .btn-outline {
        background-color: transparent;
        border: 2px solid #ccc;
        color: #333;
    }

    .btn-outline:hover {
        border-color: #0369a1;
        color: #0369a1;
        transform: translateY(-3px);
        box-shadow: 0 2px 6px rgba(3, 105, 161, 0.2);
    }

    .form-container {
        background-color: white;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.05);
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
        color: #222;
    }

    .form-control {
        width: 100%;
        padding: 12px 15px;
        border: 1px solid #ccc;
        border-radius: 8px;
        font-family: 'Poppins', sans-serif;
        font-size: 1rem;
        color: #333;
        transition: all 0.3s ease;
    }

    .form-control:focus {
        outline: none;
        border-color: #60a5fa;
        box-shadow: 0 0 0 3px rgba(96, 165, 250, 0.2);
    }

    .form-footer {
        display: flex;
        justify-content: flex-end;
        gap: 15px;
        margin-top: 30px;
    }

    .form-help {
        color: #666;
        font-size: 0.9rem;
        margin-top: 5px;
    }

    .alert {
        background-color: #fee2e2;
        color: #ef4444;
        padding: 15px;
        border-radius: 8px;
    }

    .alert ul {
        margin: 0;
        padding-left: 20px;
    }
</style>


@section('categories')
    <div class="content-header">
        <h1 class="content-title">Créer une nouvelle categorie</h1>
        <div class="content-actions">
            <a href="{{ route('categories.index') }}" class="btn btn-outline">
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

        <form action="{{ route('categories.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="dentist_id" value="{{ Auth::user()->admin->id }}">

            <div class="form-group">
                <label for="name" class="form-label">Nom du categories :</label>
                <input type="text" id="name" name="name" class="form-control" value="{{ old('name') }}"
                    required>
                <p class="form-help">Choisissez un Nom clair et descriptif pour votre categorie.</p>
            </div>

            <div class="form-group">
                <label for="description" class="form-label">Description</label>
                <input type="text" id="description" name="description" class="form-control"
                    value="{{ old('description') }}" required>
            </div>
            <div class="form-footer">
                <a href="{{ route('categories.index') }}" class="btn btn-outline">Annuler</a>
                <button type="submit" class="btn btn-primary">Enregistrer</button>
            </div>
        </form>
    </div>
@endsection
