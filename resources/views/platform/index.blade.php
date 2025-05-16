<x-layout>
    <!-- Header -->
    <div class="container-fluid bg-light py-4 mb-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <h1 class="insegna-custom mb-2">
                        <i class="fas fa-tv text-primary me-2"></i>Piattaforme di streaming
                    </h1>
                    <p class="text-muted">
                        Esplora le {{ $platforms->count() }} piattaforme disponibili nella tua collezione
                    </p>
                </div>
                <div class="col-md-4 text-md-end mt-3 mt-md-0">
                    <a href="{{ route('platform.create') }}" class="btn btn-primary rounded-pill">
                        <i class="fas fa-plus-circle me-2"></i>Aggiungi piattaforma
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Notifiche -->
    @if(session('success'))
        <div class="container mt-4">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    @endif

    <!-- Elenco piattaforme -->
    <div class="container my-5">
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
            @forelse ($platforms as $platform)
                <div class="col">
                    <div class="card h-100 border-0 shadow-sm rounded-3 overflow-hidden transform-on-hover">
                        <div class="platform-logo-container">
                            <img src="{{ Storage::url($platform->logo) }}" class="card-img-top platform-logo" alt="{{ $platform->name }}">
                        </div>
                        <div class="card-body d-flex flex-column p-4">
                            <h5 class="card-title fw-bold mb-3">{{ $platform->name }}</h5>
                            
                            <p class="card-text text-muted small mb-3">
                                @if(isset($platform->description) && strlen($platform->description) > 100)
                                    {{ substr($platform->description, 0, 100) }}...
                                @else
                                    {{ $platform->description ?? 'Nessuna descrizione disponibile' }}
                                @endif
                            </p>
                            
                            @if(isset($platform->price))
                                <p class="card-text">
                                    <span class="badge bg-light text-dark border">
                                        <i class="fas fa-tag text-primary me-1"></i> € {{ number_format($platform->price, 2) }}/mese
                                    </span>
                                </p>
                            @endif
                            
                            <div class="d-flex justify-content-between align-items-center mt-auto">
                                <span class="text-muted small">
                                    <i class="fas fa-film me-1"></i> {{ $platform->movies->count() }} film
                                </span>
                                <a href="{{ route('platform.show', $platform) }}" class="btn btn-outline-primary">
                                    <i class="fas fa-eye me-2"></i>Dettagli
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <div class="alert alert-info text-center py-5">
                        <i class="fas fa-tv fa-3x mb-3"></i>
                        <h4>Non sono ancora state aggiunte delle piattaforme</h4>
                        <p class="mb-3">Inizia aggiungendo la tua prima piattaforma di streaming!</p>
                        <a href="{{ route('platform.create') }}" class="btn btn-primary">
                            <i class="fas fa-plus-circle me-2"></i>Aggiungi piattaforma
                        </a>
                    </div>
                </div>
            @endforelse
        </div>
    </div>

    <style>
        .platform-logo-container {
            height: 160px;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #f8f9fa;
            overflow: hidden;
            padding: 20px;
        }
        
        .platform-logo {
            max-height: 100%;
            max-width: 100%;
            object-fit: contain;
        }
        
        .transform-on-hover {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        
        .transform-on-hover:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.1) !important;
        }
    </style>
</x-layout>