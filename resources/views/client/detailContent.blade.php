@extends('./client/layout')

@section('title', $content->title . ' - Détail du contenu')

<style>
    .content-detail-container {
        max-width: 1200px;
        margin: 3rem auto;
        padding: 0 1.5rem;
    }

    .content-detail-header {
        text-align: center;
        margin-bottom: 2rem;
    }

    .content-detail-category {
        display: inline-block;
        background-color: #4fd1c5;
        color: white;
        padding: 0.4rem 1rem;
        border-radius: 2rem;
        font-size: 0.9rem;
        margin-bottom: 1rem;
    }

    .content-detail-title {
        font-size: 2.5rem;
        color: #2d3748;
        margin-bottom: 1rem;
        font-weight: 700;
    }

    .content-detail-meta {
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 2rem;
        margin-bottom: 2rem;
        color: #718096;
        font-size: 0.95rem;
    }

    .content-detail-meta div {
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .content-detail-meta i {
        color: #4fd1c5;
    }

    .content-detail-image {
        width: 100%;
        height: auto;
        max-height: 500px;
        object-fit: cover;
        border-radius: 8px;
        margin-bottom: 2rem;
    }

    .content-detail-body {
        background-color: white;
        padding: 2.5rem;
        border-radius: 8px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
        margin-bottom: 2rem;
        line-height: 1.8;
        color: #4a5568;
    }

    .content-detail-body h2 {
        font-size: 1.8rem;
        color: #2d3748;
        margin: 1.5rem 0 1rem;
    }

    .content-detail-body h3 {
        font-size: 1.5rem;
        color: #2d3748;
        margin: 1.5rem 0 1rem;
    }

    .content-detail-body p {
        margin-bottom: 1.5rem;
    }

    .content-detail-body ul,
    .content-detail-body ol {
        margin-bottom: 1.5rem;
        padding-left: 2rem;
    }

    .content-detail-body li {
        margin-bottom: 0.5rem;
    }

    .content-detail-body img {
        max-width: 100%;
        height: auto;
        border-radius: 6px;
        margin: 1.5rem 0;
    }

    .content-detail-body blockquote {
        border-left: 4px solid #4fd1c5;
        padding-left: 1.5rem;
        font-style: italic;
        margin: 1.5rem 0;
        color: #718096;
    }

    .dentist-info {
        background-color: #f7fafc;
        border-radius: 8px;
        padding: 1.5rem;
        display: flex;
        align-items: center;
        gap: 1.5rem;
        margin-bottom: 2rem;
    }

    .dentist-info-image {
        width: 80px;
        height: 80px;
        border-radius: 50%;
        object-fit: cover;
    }

    .dentist-info-text h3 {
        font-size: 1.2rem;
        color: #2d3748;
        margin-bottom: 0.3rem;
    }

    .dentist-info-text p {
        color: #718096;
        font-size: 0.95rem;
        margin-bottom: 0.5rem;
    }

    .related-content {
        margin-top: 3rem;
    }

    .related-content h2 {
        font-size: 1.8rem;
        color: #2d3748;
        margin-bottom: 1.5rem;
        text-align: center;
    }

    .related-content-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
        gap: 2rem;
    }

    .related-card {
        background-color: white;
        border-radius: 8px;
        overflow: hidden;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
        transition: transform 0.3s ease;
    }

    .related-card:hover {
        transform: translateY(-5px);
    }

    .related-card-img {
        width: 100%;
        height: 200px;
        object-fit: cover;
    }

    .related-card-body {
        padding: 1.5rem;
    }

    .related-card-category {
        display: inline-block;
        background-color: #4fd1c5;
        color: white;
        padding: 0.3rem 0.8rem;
        border-radius: 2rem;
        font-size: 0.8rem;
        margin-bottom: 0.8rem;
    }

    .related-card-title {
        font-size: 1.2rem;
        color: #2d3748;
        margin-bottom: 0.8rem;
    }

    .related-card-footer {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-top: 1rem;
    }

    .related-card-date {
        color: #718096;
        font-size: 0.9rem;
    }

    .read-more {
        color: #4fd1c5;
        font-weight: 600;
        text-decoration: none;
        display: flex;
        align-items: center;
        gap: 0.5rem;
        transition: color 0.3s ease;
    }

    .read-more:hover {
        color: #38b2ac;
    }

    .back-button {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        background-color: #4fd1c5;
        color: white;
        padding: 0.8rem 1.5rem;
        border-radius: 4px;
        text-decoration: none;
        font-weight: 600;
        transition: background-color 0.3s ease;
        margin-bottom: 2rem;
    }

    .back-button:hover {
        background-color: #38b2ac;
    }

    @media (max-width: 768px) {
        .content-detail-title {
            font-size: 2rem;
        }

        .content-detail-meta {
            flex-direction: column;
            gap: 0.8rem;
        }

        .content-detail-body {
            padding: 1.5rem;
        }

        .related-content-grid {
            grid-template-columns: 1fr;
        }
    }
</style>

@section('detailDentist')
    <div class="content-detail-container">
        <a href="{{ url()->previous() }}" class="back-button">
            <i class="fas fa-arrow-left"></i> Retour
        </a>

        <div class="content-detail-header">
            <span class="content-detail-category">{{ $content->categorie->name }}</span>
            <h1 class="content-detail-title">{{ $content->title }}</h1>
            <div class="content-detail-meta">
                <div>
                    <i class="far fa-calendar"></i>
                    <span>{{ $content->created_at->format('d M Y') }}</span>
                </div>
                <div>
                    <i class="far fa-user"></i>
                    <span>Dr. {{ $content->dentist->user->nom }} {{ $content->dentist->user->prenom }}</span>
                </div>
            </div>
        </div>

        <img src="/{{ $content->image }}" alt="{{ $content->title }}" class="content-detail-image">

        <div class="content-detail-body">
            {!! $content->content !!}
        </div>

        <div class="dentist-info">

            <img src="/{{ $content->dentist->user->image }}" alt="Dr. {{ $content->dentist->user->nom }}"
                class="dentist-info-image">
            <div class="dentist-info-text">
                <h3>Dr. {{ $content->dentist->user->nom }} {{ $content->dentist->user->prenom }}</h3>
                <p>{{ $content->dentist->specialite }}</p>
                <p>{{ $content->dentist->adresse }}</p>
            </div>
        </div>
    </div>
@endsection
