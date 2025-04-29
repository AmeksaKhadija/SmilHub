@extends('dentist.layout')

@section('style')
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

    .btn-danger {
        background-color: var(--danger);
        color: var(--white);
    }

    .btn-danger:hover {
        background-color: #dc2626;
        transform: translateY(-3px);
        box-shadow: var(--shadow-md);
    }

    .content-container {
        background-color: var(--white);
        border-radius: 10px;
        box-shadow: var(--shadow);
        overflow: hidden;
        margin-bottom: 30px;
    }

    .content-meta {
        padding: 20px;
        border-bottom: 1px solid var(--gray);
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
    }

    .content-meta-item {
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .content-meta-label {
        font-weight: 600;
        color: var(--text-dark);
    }

    .content-meta-value {
        color: var(--text-light);
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

    .content-body {
        padding: 30px;
    }

    .content-body h1, .content-body h2, .content-body h3, .content-body h4, .content-body h5, .content-body h6 {
        color: var(--text-dark);
        margin-top: 1.5em;
        margin-bottom: 0.5em;
    }

    .content-body h1 {
        font-size: 2rem;
    }

    .content-body h2 {
        font-size: 1.75rem;
    }

    .content-body h3 {
        font-size: 1.5rem;
    }

    .content-body p {
        margin-bottom: 1em;
        line-height: 1.7;
    }

    .content-body ul, .content-body ol {
        margin-bottom: 1em;
        padding-left: 2em;
    }

    .content-body li {
        margin-bottom: 0.5em;
    }

    .content-body img {
        max-width: 100%;
        height: auto;
        border-radius: 8px;
        margin: 1em 0;
    }

    .content-body a {
        color: var(--primary);
        text-decoration: underline;
    }

    .content-body a:hover {
        color: var(--primary-dark);
    }

    .content-body blockquote {
        border-left: 4px solid var(--primary-light);
        padding-left: 1em;
        margin-left: 0;
        margin-right: 0;
        font-style: italic;
        color: var(--text-light);
    }

    .content-body table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 1em;
    }

    .content-body table th, .content-body table td {
        border: 1px solid var(--gray);
        padding: 0.5em;
    }

    .content-body table th {
        background-color: var(--light-gray);
    }

    .content-footer {
        padding: 20px;
        border-top: 1px solid var(--gray);
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .content-footer-left {
        color: var(--text-light);
        font-size: 0.9rem;
    }

    .content-footer-right {
        display: flex;
        gap: 10px;
    }

    .share-btn {
        width: 36px;
        height: 36px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        background-color: var(--light-gray);
        color: var(--text-dark);
        transition: all 0.3s ease;
    }

    .share-btn:hover {
        background-color: var(--primary);
        color: var(--white);
        transform: translateY(-3px);
        box-shadow: var(--shadow-sm);
    }
</style>
@endsection

@section('content')
<div class="content-header">
    <h1 class="content-title">Détails de l'article</h1>
    <div class="content-actions">
        <a href="{{ route('contents.index') }}" class="btn btn-outline">
            <i class="fas fa-arrow-left"></i> Retour à la liste
        </a>
        <a href="{{ route('contents.edit', $content->id) }}" class="btn btn-primary">
            <i class="fas fa-edit"></i> Modifier
        </a>
        <form action="{{ route('contents.destroy', $content->id) }}" method="POST" style="display: inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet article?')">
                <i class="fas fa-trash"></i> Supprimer
            </button>
        </form>
    </div>
</div>

<div class="content-container">
    <div class="content-meta">
        <div class="content-meta-item">
            <span class="content-meta-label">Catégorie:</span>
            <span class="content-category">{{ $content->categorie->name }}</span>
        </div>
        <div class="content-meta-item">
            <span class="content-meta-label">Type:</span>
            <span class="content-meta-value">{{ ucfirst($content->type) }}</span>
        </div>
        <div class="content-meta-item">
            <span class="content-meta-label">Créé le:</span>
            <span class="content-meta-value">{{ $content->created_at->format('d/m/Y à H:i') }}</span>
        </div>
        <div class="content-meta-item">
            <span class="content-meta-label">Dernière modification:</span>
            <span class="content-meta-value">{{ $content->updated_at->format('d/m/Y à H:i') }}</span>
        </div>
    </div>
    <div class="content-body">
        <h1>{{ $content->title }}</h1>
        {!! $content->content !!}
    </div>
    <div class="content-footer">
        <div class="content-footer-left">
            <span>Auteur: Dr. {{ $content->dentist->user->nom }} {{ $content->dentist->user->prenom }}</span>
        </div>
        <div class="content-footer-right">
            <a href="#" class="share-btn" title="Partager sur Facebook">
                <i class="fab fa-facebook-f"></i>
            </a>
            <a href="#" class="share-btn" title="Partager sur Twitter">
                <i class="fab fa-twitter"></i>
            </a>
            <a href="#" class="share-btn" title="Partager sur LinkedIn">
                <i class="fab fa-linkedin-in"></i>
            </a>
            <a href="#" class="share-btn" title="Partager par email">
                <i class="fas fa-envelope"></i>
            </a>
        </div>
    </div>
</div>
@endsection