<x-layout>
    <!-- Hero Banner -->
    <div class="hero-section py-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 mb-4 mb-lg-0">
                    <h1 class="display-4 fw-bold insegna-custom text-white mb-3">Benvenuto nel tuo cinema personale</h1>
                    <p class="lead text-white-50 mb-4">Archivia, organizza e scopri film da guardare sulle principali piattaforme di streaming.</p>
                    <div class="d-flex gap-3">
                        <a href="{{ route('index') }}" class="btn btn-light btn-lg">
                            <i class="fas fa-film me-2"></i>Esplora film
                        </a>
                        <a href="{{ route('create') }}" class="btn btn-primary btn-lg">
                            <i class="fas fa-plus-circle me-2"></i>Aggiungi film
                        </a>
                    </div>
                </div>
                <div class="col-lg-6 text-center">
                    <img src="https://cdn-icons-png.flaticon.com/512/3163/3163478.png" alt="Illustrazione cinema" class="img-fluid hero-image" style="max-height: 350px;">
                </div>
            </div>
        </div>
    </div>

    <!-- Notifiche -->
    @if (session('message'))
        <div class="container mt-4">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="fas fa-check-circle me-2"></i>{{ session('message') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    @endif

    <livewire:gemini-chat />

    <!-- Caratteristiche -->
    <div class="container my-5 py-4">
        <div class="text-center mb-5">
            <h2 class="insegna-custom">Cosa puoi fare</h2>
            <p class="text-muted">Gestisci facilmente la tua libreria di film con queste funzionalità</p>
        </div>
        <div class="row g-4">
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm rounded-3 text-center p-4">
                    <div class="icon-wrapper mb-3">
                        <i class="fas fa-plus-circle fa-3x text-primary"></i>
                    </div>
                    <h3 class="h5 mb-3">Aggiungi film</h3>
                    <p class="text-muted mb-3">Inserisci nuovi film con tutti i dettagli, copertina e piattaforme dove sono disponibili.</p>
                    <div class="mt-auto">
                        <a href="{{ route('create') }}" class="btn btn-outline-primary">Inizia ora</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm rounded-3 text-center p-4">
                    <div class="icon-wrapper mb-3">
                        <i class="fas fa-search fa-3x text-primary"></i>
                    </div>
                    <h3 class="h5 mb-3">Cerca e filtra</h3>
                    <p class="text-muted mb-3">Trova rapidamente i film per titolo, genere, regista o piattaforma di streaming.</p>
                    <div class="mt-auto">
                        <a href="{{ route('index') }}" class="btn btn-outline-primary">Esplora film</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm rounded-3 text-center p-4">
                    <div class="icon-wrapper mb-3">
                        <i class="fas fa-tv fa-3x text-primary"></i>
                    </div>
                    <h3 class="h5 mb-3">Gestisci piattaforme</h3>
                    <p class="text-muted mb-3">Organizza i film in base alle piattaforme di streaming dove sono disponibili.</p>
                    <div class="mt-auto">
                        <a href="{{ route('platform.index') }}" class="btn btn-outline-primary">Vedi piattaforme</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Powered by -->
    <div class="container-fluid bg-light py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 text-center mb-4">
                    <h2 class="insegna-custom mb-0">Powered by</h2>
                </div>
            </div>
            <div class="row justify-content-center align-items-center">
                <div class="col-6 col-md-3 text-center mb-4 mb-md-0">
                    <img src="https://www.ovhcloud.com/sites/default/files/styles/large_screens_1x/public/2021-09/ECX-1909_Hero_MySQL_600x400%402x-1_0.png" 
                         class="img-fluid px-3" alt="MySQL" style="max-height: 80px;">
                </div>
                <div class="col-6 col-md-3 text-center mb-4 mb-md-0">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/3/3e/Disney%2B_logo.svg/2560px-Disney%2B_logo.svg.png" 
                         class="img-fluid px-3" alt="Disney+" style="max-height: 70px;">
                </div>
                <div class="col-6 col-md-3 text-center">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/9/9a/Laravel.svg/1200px-Laravel.svg.png" 
                         class="img-fluid px-3" alt="Laravel" style="max-height: 80px;">
                </div>
                <div class="col-6 col-md-3 text-center">
                    <img src="https://getbootstrap.com/docs/5.0/assets/brand/bootstrap-logo.svg" 
                         class="img-fluid px-3" alt="Bootstrap" style="max-height: 80px;">
                </div>
            </div>
        </div>
    </div>

    <style>
        .hero-section {
            background-color: #1a237e;
            background-image: linear-gradient(135deg, #1a237e 0%, #3949ab 100%);
            padding: 80px 0;
            margin-bottom: 30px;
        }
        
        .hero-image {
            filter: drop-shadow(0 10px 15px rgba(0,0,0,0.2));
            animation: float 3s ease-in-out infinite;
        }
        
        @keyframes float {
            0% { transform: translateY(0px); }
            50% { transform: translateY(-15px); }
            100% { transform: translateY(0px); }
        }
        
        .icon-wrapper {
            height: 80px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
    </style>
</x-layout>
