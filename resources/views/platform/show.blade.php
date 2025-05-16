<x-layout>
    <!-- Notifiche -->
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-10 text-center">
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
            </div>
        </div>
    </div>
    
    <!-- Intestazione -->
    <div class="container mt-4 mb-5">
        <div class="row">
            <div class="col-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('platform.index') }}">Piattaforme</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ $platform->name }}</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    
    <!-- Contenuto principale -->
    <div class="container my-4">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="card border-0 shadow-sm rounded-3 overflow-hidden">
                    <div class="row g-0">
                        <!-- Logo piattaforma -->
                        <div class="col-md-4 d-flex align-items-center justify-content-center bg-light p-4">
                            <img src="{{ Storage::url($platform->logo) }}" class="img-fluid platform-logo" alt="{{ $platform->name }}">
                        </div>
                        
                        <!-- Dettagli piattaforma -->
                        <div class="col-md-8">
                            <div class="card-body p-4">
                                <div class="d-flex justify-content-between align-items-start mb-3">
                                    <h1 class="card-title insegna-custom mb-0">{{ $platform->name }}</h1>
                                    
                                    @if (Auth::user() && (Auth::user()->id == $platform->user_id || Auth::user()->hasRole('admin')))
                                        <div class="dropdown">
                                            <button class="btn btn-light btn-sm rounded-circle" type="button" data-bs-toggle="dropdown">
                                                <i class="fas fa-ellipsis-v"></i>
                                            </button>
                                            <ul class="dropdown-menu dropdown-menu-end">
                                                <li>
                                                    <a class="dropdown-item" href="{{ route('platform.edit', $platform) }}">
                                                        <i class="fas fa-edit me-2 text-primary"></i>Modifica
                                                    </a>
                                                </li>
                                                <li>
                                                    <form action="{{ route('platform.delete', $platform) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="dropdown-item text-danger">
                                                            <i class="fas fa-trash-alt me-2"></i>Elimina
                                                        </button>
                                                    </form>
                                                </li>
                                            </ul>
                                        </div>
                                    @endif
                                </div>
                                <div class="mb-4">
                                    <h5 class="border-bottom pb-2 mb-3">
                                        <i class="fas fa-info-circle text-primary me-2"></i>Descrizione
                                    </h5>
                                    <p class="card-text">
                                        {{ $platform->description ?? 'Nessuna descrizione disponibile per questa piattaforma.' }}
                                    </p>
                                </div>
                                
                                <!-- Azioni -->
                                <div class="mt-4">
                                    <a href="{{ route('platform.index') }}" class="btn btn-outline-secondary">
                                        <i class="fas fa-arrow-left me-2"></i>Torna alle piattaforme
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Film sulla piattaforma -->
                <div class="card border-0 shadow-sm rounded-3 overflow-hidden mt-4">
                    <div class="card-header bg-light py-3">
                        <h4 class="mb-0">
                            <i class="fas fa-film text-primary me-2"></i>Film disponibili su {{ $platform->name }}
                        </h4>
                    </div>
                    <div class="card-body p-4">
                        @if ($platform->movies->count() > 0)
                            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
                                @foreach ($platform->movies as $movie)
                                    <div class="col">
                                        <div class="card h-100 border-0 shadow-sm rounded-3 overflow-hidden transform-on-hover">
                                            <img src="{{ Storage::url($movie->cover) }}" class="card-img-top movie-cover" alt="{{ $movie->title }}">
                                            <div class="card-body">
                                                <h5 class="card-title">{{ $movie->title }}</h5>
                                                <p class="card-text text-muted small">
                                                    <i class="fas fa-user-tie me-1"></i> {{ $movie->director }}
                                                </p>
                                                <a href="{{ route('movies.show', $movie) }}" class="btn btn-sm btn-outline-primary mt-2">
                                                    <i class="fas fa-eye me-1"></i> Dettagli
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <div class="text-center py-5">
                                <i class="fas fa-film fa-3x text-muted mb-3"></i>
                                <h5 class="text-muted">Nessun film disponibile su questa piattaforma</h5>
                                <p class="text-muted mb-4">Aggiungi un film e associalo a questa piattaforma</p>
                                <a href="{{ route('create') }}" class="btn btn-primary">
                                    <i class="fas fa-plus-circle me-2"></i>Aggiungi un film
                                </a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <style>
        .platform-logo {
            max-height: 180px;
            object-fit: contain;
        }
        
        .movie-cover {
            height: 200px;
            object-fit: cover;
        }
        
        .transform-on-hover {
            transition: transform 0.3s ease;
        }
        
        .transform-on-hover:hover {
            transform: translateY(-5px);
        }
    </style>
</x-layout>
