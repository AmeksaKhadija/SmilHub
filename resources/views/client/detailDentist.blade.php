@extends('./client/layout')
@section('detailDentist')

<style>
    /* Page Header */
    .page-header {
        background: linear-gradient(rgba(3, 105, 161, 0.85), rgba(3, 105, 161, 0.85)), url('https://images.unsplash.com/photo-1606811971618-4486d14f3f99?q=80&w=1974&auto=format&fit=crop') no-repeat center center/cover;
        color: var(--white);
        padding: 100px 0;
        text-align: center;
        position: relative;
        overflow: hidden;
    }
    .page-header::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.05'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
        opacity: 0.1;
    }
    .page-title {
        font-size: 3rem;
        font-weight: 700;
        margin-bottom: 1.5rem;
        text-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        position: relative;
        display: inline-block;
    }
    .page-title::after {
        content: '';
        position: absolute;
        bottom: -15px;
        left: 50%;
        transform: translateX(-50%);
        width: 80px;
        height: 4px;
        background: var(--white);
        border-radius: 2px;
    }
    .page-subtitle {
        font-size: 1.3rem;
        max-width: 700px;
        margin: 2rem auto 0;
        opacity: 0.9;
    }
    /* Dentist Profile Section */
    .dentist-profile-section {
        padding: 80px 0;
        background-color: var(--off-white);
        position: relative;
    }
    .dentist-profile-section::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%230369a1' fill-opacity='0.03'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
    }
    .profile-container {
        display: flex;
        flex-wrap: wrap;
        gap: 40px;
        position: relative;
        z-index: 1;
    }
    /* Dentist Profile Card */
    .dentist-profile-card {
        background: var(--white);
        border-radius: 16px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
        width: 100%;
        max-width: 350px;
        padding: 30px;
        position: relative;
        overflow: hidden;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        display: flex;
        flex-direction: column;
        align-items: center;
        text-align: center;
    }
    .dentist-profile-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
    }
    .dentist-avatar-large {
        width: 150px;
        height: 150px;
        border-radius: 50%;
        object-fit: cover;
        border: 5px solid var(--primary-light);
        box-shadow: 0 4px 10px rgba(3, 105, 161, 0.2);
        margin-bottom: 20px;
        transition: transform 0.3s ease;
    }
    .dentist-profile-card:hover .dentist-avatar-large {
        transform: scale(1.05);
    }
    .dentist-name-large {
        font-size: 24px;
        font-weight: 700;
        color: var(--primary);
        margin-bottom: 10px;
    }
    .dentist-specialty-large {
        font-size: 16px;
        color: var(--text-light);
        background-color: var(--light-gray);
        padding: 5px 15px;
        border-radius: 20px;
        display: inline-block;
        margin-bottom: 15px;
    }
    .dentist-rating-large {
        display: flex;
        gap: 5px;
        align-items: center;
        justify-content: center;
        margin-bottom: 20px;
    }
    .dentist-rating-large i {
        color: #FFD700;
        font-size: 18px;
    }
    .dentist-rating-large span {
        font-size: 16px;
        color: var(--text-light);
        font-weight: 500;
    }
    .dentist-bio {
        color: var(--text-light);
        margin-bottom: 25px;
        line-height: 1.7;
    }
    .dentist-contact-info {
        width: 100%;
        margin-top: 20px;
    }
    .contact-item {
        display: flex;
        align-items: center;
        gap: 10px;
        margin-bottom: 15px;
        color: var(--text-light);
        font-size: 14px;
    }
    .contact-item i {
        color: var(--primary);
        font-size: 16px;
        width: 20px;
        text-align: center;
    }
    .appointment-btn {
        margin-top: 20px;
        width: 100%;
    }
    /* Content Section */
    .content-section {
        flex: 1;
        min-width: 0;
    }
    .content-header {
        margin-bottom: 30px;
    }
    .content-title {
        font-size: 28px;
        font-weight: 700;
        color: var(--primary);
        margin-bottom: 15px;
        position: relative;
        display: inline-block;
        padding-bottom: 10px;
    }
    .content-title::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        width: 60px;
        height: 4px;
        background: var(--secondary);
        border-radius: 2px;
    }
    /* Category Filter */
    .category-filter {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
        margin-bottom: 30px;
    }
    .category-btn {
        padding: 8px 16px;
        background-color: var(--light-gray);
        border-radius: 20px;
        font-size: 14px;
        font-weight: 500;
        color: var(--text-light);
        cursor: pointer;
        transition: all 0.3s ease;
        border: none;
    }
    .category-btn:hover,
    .category-btn.active {
        background-color: var(--primary);
        color: var(--white);
        transform: translateY(-3px);
        box-shadow: var(--shadow-sm);
    }
    /* Content Cards */
    .content-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
        gap: 30px;
    }
    .content-card {
        background: var(--white);
        border-radius: 12px;
        overflow: hidden;
        box-shadow: var(--shadow);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        height: 100%;
        display: flex;
        flex-direction: column;
    }
    .content-card:hover {
        transform: translateY(-5px);
        box-shadow: var(--shadow-md);
    }
    .content-card-img {
        width: 100%;
        height: 180px;
        object-fit: cover;
    }
    .content-card-body {
        padding: 20px;
        flex: 1;
        display: flex;
        flex-direction: column;
    }
    .content-card-category {
        font-size: 12px;
        color: var(--primary);
        background-color: rgba(3, 105, 161, 0.1);
        padding: 4px 10px;
        border-radius: 20px;
        display: inline-block;
        margin-bottom: 10px;
    }
    .content-card-title {
        font-size: 18px;
        font-weight: 600;
        color: var(--text-dark);
        margin-bottom: 10px;
        line-height: 1.4;
    }
    .content-card-excerpt {
        color: var(--text-light);
        font-size: 14px;
        margin-bottom: 15px;
        line-height: 1.6;
        flex: 1;
    }
    .content-card-footer {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-top: auto;
    }
    .content-card-date {
        font-size: 12px;
        color: var(--text-lighter);
    }
    .read-more {
        font-size: 14px;
        color: var(--primary);
        font-weight: 500;
        display: flex;
        align-items: center;
        gap: 5px;
        transition: all 0.3s ease;
    }
    .read-more:hover {
        color: var(--primary-dark);
        transform: translateX(3px);
    }
    .read-more i {
        font-size: 12px;
        transition: transform 0.3s ease;
    }
    .read-more:hover i {
        transform: translateX(3px);
    }
    /* Content Modal */
    .modal {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        display: flex;
        align-items: center;
        justify-content: center;
        z-index: 1000;
        opacity: 0;
        visibility: hidden;
        transition: all 0.3s ease;
        backdrop-filter: blur(5px);
    }
    .modal.active {
        opacity: 1;
        visibility: visible;
    }
    .modal-content {
        background-color: var(--white);
        border-radius: 16px;
        padding: 40px;
        width: 100%;
        max-width: 800px;
        max-height: 90vh;
        overflow-y: auto;
        box-shadow: var(--shadow-lg);
        transform: translateY(-20px);
        transition: all 0.3s ease;
    }
    .modal.active .modal-content {
        transform: translateY(0);
    }
    .modal-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 20px;
        padding-bottom: 15px;
        border-bottom: 1px solid var(--gray);
    }
    .modal-title {
        font-size: 24px;
        font-weight: 700;
        color: var(--primary);
    }
    .modal-close {
        background: none;
        border: none;
        font-size: 1.5rem;
        color: var(--text-light);
        cursor: pointer;
        transition: all 0.3s ease;
        width: 40px;
        height: 40px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .modal-close:hover {
        color: var(--text-dark);
        background-color: var(--light-gray);
    }
    .modal-category {
        font-size: 14px;
        color: var(--primary);
        background-color: rgba(3, 105, 161, 0.1);
        padding: 5px 12px;
        border-radius: 20px;
        display: inline-block;
        margin-bottom: 15px;
    }
    .modal-body {
        margin-bottom: 30px;
        line-height: 1.8;
    }
    .modal-body p {
        margin-bottom: 15px;
    }
    .modal-body img {
        max-width: 100%;
        border-radius: 8px;
        margin: 20px 0;
    }
    .modal-body h2,
    .modal-body h3 {
        margin-top: 25px;
        margin-bottom: 15px;
        color: var(--primary);
    }
    .modal-body ul,
    .modal-body ol {
        margin-left: 20px;
        margin-bottom: 15px;
    }
    .modal-body li {
        margin-bottom: 8px;
    }
    .modal-footer {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding-top: 20px;
        border-top: 1px solid var(--gray);
    }
    .modal-date {
        font-size: 14px;
        color: var(--text-light);
    }
    .modal-share {
        display: flex;
        gap: 10px;
    }
    .share-btn {
        width: 36px;
        height: 36px;
        border-radius: 50%;
        background-color: var(--light-gray);
        color: var(--text-dark);
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.3s ease;
    }
    .share-btn:hover {
        background-color: var(--primary);
        color: var(--white);
        transform: translateY(-3px);
    }
    /* No Content Message */
    .no-content {
        text-align: center;
        padding: 40px;
        background-color: var(--white);
        border-radius: 12px;
        box-shadow: var(--shadow);
    }
    .no-content i {
        font-size: 48px;
        color: var(--gray);
        margin-bottom: 20px;
    }
    .no-content h3 {
        font-size: 20px;
        color: var(--text-dark);
        margin-bottom: 10px;
    }
    .no-content p {
        color: var(--text-light);
    }
    
    /* Responsive Styles */
    @media (max-width: 1200px) {
        .container {
            padding: 0 30px;
        }
        .footer-container {
            grid-template-columns: 1fr 1fr;
            gap: 40px 60px;
        }
    }
    @media (max-width: 992px) {
        .profile-container {
            flex-direction: column;
            align-items: center;
        }
        .dentist-profile-card {
            max-width: 100%;
        }
        .content-section {
            width: 100%;
        }
        .content-grid {
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
        }
    }
    @media (max-width: 768px) {
        .page-title {
            font-size: 2.5rem;
        }
        .page-subtitle {
            font-size: 1.1rem;
        }
        .dentist-profile-section {
            padding: 60px 0;
        }
        .content-title {
            font-size: 24px;
        }
        .main-nav {
            display: none;
            position: absolute;
            top: 100%;
            left: 0;
            width: 100%;
            background-color: var(--white);
            box-shadow: var(--shadow);
            padding: 20px;
            z-index: 100;
        }
        .main-nav.active {
            display: block;
        }
        .main-nav ul {
            flex-direction: column;
            gap: 15px;
        }
        .mobile-menu-btn {
            display: block;
        }
        .footer-container {
            grid-template-columns: 1fr;
            gap: 40px;
        }
        .contact-info {
            flex-direction: column;
            gap: 10px;
        }
        .top-header-content {
            flex-direction: column;
            gap: 15px;
        }
        .modal-content {
            padding: 25px;
            max-width: 90%;
        }
    }
    @media (max-width: 576px) {
        .page-header {
            padding: 70px 0;
        }
        .page-title {
            font-size: 2rem;
        }
        .content-grid {
            grid-template-columns: 1fr;
        }
        .category-filter {
            justify-content: center;
        }
    }
</style>

    <section class="page-header">
        <div class="container">
            <h1 class="page-title">Dr. {{ $dentist->user->nom }} {{ $dentist->user->prenom }}</h1>
            <p class="page-subtitle">Découvrez les articles et ressources éducatives de notre spécialiste</p>
        </div>
    </section>

    <!-- Dentist Profile Section -->
    <section class="dentist-profile-section">
        <div class="container">
            <div class="profile-container">
                <!-- Dentist Profile Card -->
                <div class="dentist-profile-card">
                    <img src="{{ $dentist->user->image}}" alt="Dr. {{ $dentist->user->nom }} {{ $dentist->user->prenom }}" class="dentist-avatar-large">
                    <h2 class="dentist-name-large">Dr. {{ $dentist->user->nom }} {{ $dentist->user->prenom }}</h2>
                    <span class="dentist-specialty-large">{{ $dentist->speciality ?: 'Dentiste généraliste' }}</span>
                    <div class="dentist-rating-large">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                        <span>(4.5)</span>
                    </div>
                    <p class="dentist-bio">{{ $dentist->bio ?? 'Dr. ' . $dentist->user->nom . ' ' . $dentist->user->prenom . ' est un dentiste expérimenté spécialisé dans ' . ($dentist->speciality) . '. Avec plusieurs années d\'expérience, il/elle s\'engage à fournir des soins dentaires de qualité dans un environnement confortable et accueillant.' }}</p>

                    <div class="dentist-contact-info">
                        <div class="contact-item">
                            <i class="fas fa-envelope"></i>
                            <span>{{ $dentist->user->email}}</span>
                        </div>
                        <div class="contact-item">
                            <i class="fas fa-phone"></i>
                            <span>{{ $dentist->phone ?? '+33 1 23 45 67 89' }}</span>
                        </div>
                    </div>

                </div>

                <!-- Content Section -->
                <div class="content-section">
                    <div class="content-header">
                        <h2 class="content-title">Articles et ressources</h2>
                        <p>Découvrez les articles éducatifs et conseils de santé dentaire rédigés par Dr. {{ $dentist->user->nom }} {{ $dentist->user->prenom }}.</p>
                    </div>

                    <!-- Category Filter -->
                    <div class="category-filter">
                        <button class="category-btn active" data-category="all">Tous</button>
                        @foreach($categories as $category)
                        <button class="category-btn" data-category="{{ $category->id }}">{{ $category->name }}</button>
                        @endforeach
                    </div>

                    <!-- Content Grid -->
                    <div class="content-grid">
                        @forelse($contents as $content)
                        <div class="content-card" data-category="{{ $content->category_id }}">
                            <img src="{{ $content->image }}" alt="{{ $content->title }}" class="content-card-img">
                            <div class="content-card-body">
                                <span class="content-card-category">{{ $content->categorie->name }}</span>
                                <h3 class="content-card-title">{{ $content->title }}</h3>
                                <p class="content-card-excerpt">{{ Str::limit(strip_tags($content->content), 120) }}</p>
                                <div class="content-card-footer">
                                    <span class="content-card-date">{{ $content->created_at->format('d M Y') }}</span>
                                    <a href="#" class="read-more" data-content-id="{{ $content->id }}">Lire plus <i class="fas fa-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                        @empty
                        <div class="no-content">
                            <i class="fas fa-file-alt"></i>
                            <h3>Aucun contenu disponible</h3>
                            <p>Dr. {{ $dentist->user->nom }} {{ $dentist->user->prenom }} n'a pas encore publié d'articles ou de ressources.</p>
                        </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Content Modal -->
    <div class="modal" id="contentModal">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title" id="modalTitle"></h2>
                <button class="modal-close" id="modalClose">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <span class="modal-category" id="modalCategory"></span>
            <div class="modal-body" id="modalBody">
                <!-- Content will be loaded here -->
            </div>
            <div class="modal-footer">
                <span class="modal-date" id="modalDate"></span>
                <div class="modal-share">
                    <a href="#" class="share-btn"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="share-btn"><i class="fab fa-twitter"></i></a>
                    <a href="#" class="share-btn"><i class="fab fa-linkedin-in"></i></a>
                </div>
            </div>
        </div>
    </div>

   

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Category filter
            const categoryButtons = document.querySelectorAll('.category-btn');
            const contentCards = document.querySelectorAll('.content-card');

            categoryButtons.forEach(button => {
                button.addEventListener('click', function() {
                    // Remove active class from all buttons
                    categoryButtons.forEach(btn => btn.classList.remove('active'));

                    // Add active class to clicked button
                    this.classList.add('active');

                    // Get selected category
                    const selectedCategory = this.getAttribute('data-category');

                    // Show/hide content cards based on category
                    contentCards.forEach(card => {
                        if (selectedCategory === 'all' || card.getAttribute('data-category') === selectedCategory) {
                            card.style.display = 'block';
                        } else {
                            card.style.display = 'none';
                        }
                    });
                });
            });

            // Modal handling
            const modal = document.getElementById('contentModal');
            const closeBtn = document.getElementById('modalClose');
            const readMoreLinks = document.querySelectorAll('.read-more');

            // Close modal
            if (closeBtn) {
                closeBtn.addEventListener('click', function() {
                    modal.classList.remove('active');
                });
            }

            // Open modal with content
            readMoreLinks.forEach(link => {
                link.addEventListener('click', function(e) {
                    e.preventDefault();

                    const contentId = this.getAttribute('data-content-id');

                    // In a real application, you would fetch the content from the server
                    // For this example, we'll use the data already in the page
                    const card = this.closest('.content-card');
                    const title = card.querySelector('.content-card-title').textContent;
                    const category = card.querySelector('.content-card-category').textContent;
                    const date = card.querySelector('.content-card-date').textContent;

                    // Set modal content
                    document.getElementById('modalTitle').textContent = title;
                    document.getElementById('modalCategory').textContent = category;
                    document.getElementById('modalDate').textContent = date;

                    // For demo purposes, we'll create some dummy content
                    // In a real app, you would fetch the full content from the server
                    document.getElementById('modalBody').innerHTML = `
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed euismod, nisl vel ultricies lacinia, nisl nisl aliquam nisl, eget aliquam nisl nisl sit amet nisl. Sed euismod, nisl vel ultricies lacinia, nisl nisl aliquam nisl, eget aliquam nisl nisl sit amet nisl.</p>
                        <p>Sed euismod, nisl vel ultricies lacinia, nisl nisl aliquam nisl, eget aliquam nisl nisl sit amet nisl. Sed euismod, nisl vel ultricies lacinia, nisl nisl aliquam nisl, eget aliquam nisl nisl sit amet nisl.</p>
                        <img src="${card.querySelector('.content-card-img').src}" alt="${title}">
                        <h3>Sous-titre important</h3>
                        <p>Sed euismod, nisl vel ultricies lacinia, nisl nisl aliquam nisl, eget aliquam nisl nisl sit amet nisl. Sed euismod, nisl vel ultricies lacinia, nisl nisl aliquam nisl, eget aliquam nisl nisl sit amet nisl.</p>
                        <ul>
                            <li>Point important numéro 1</li>
                            <li>Point important numéro 2</li>
                            <li>Point important numéro 3</li>
                        </ul>
                        <p>Sed euismod, nisl vel ultricies lacinia, nisl nisl aliquam nisl, eget aliquam nisl nisl sit amet nisl.</p>
                    `;

                    // Show modal
                    modal.classList.add('active');
                });
            });

            // Mobile menu toggle
            const mobileMenuBtn = document.getElementById('mobileMenuBtn');
            const mainNav = document.getElementById('mainNav');

            if (mobileMenuBtn && mainNav) {
                mobileMenuBtn.addEventListener('click', function() {
                    mainNav.classList.toggle('active');
                });
            }
        });
    </script>
@endsection