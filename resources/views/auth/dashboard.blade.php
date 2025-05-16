<x-layout>
    <div class="container my-5">
        <div class="row">
            <div class="col-12">
                <h1 class="text-center insegna-custom mb-4">Dashboard di {{ Auth::user()->name }}</h1>
            </div>
        </div>
        
        <!-- Profilo utente con card e icone -->
        <div class="row justify-content-center mb-5">
            <div class="col-lg-8">
                <div class="card border-0 shadow-sm rounded-3 overflow-hidden">
                    <div class="card-header bg-primary text-white py-3">
                        <h4 class="mb-0"><i class="fas fa-user-circle me-2"></i>Informazioni profilo</h4>
                    </div>
                    <div class="card-body p-4">
                        <div class="row">
                            <div class="col-md-2 text-center mb-3 mb-md-0">
                                <div class="bg-light rounded-circle d-inline-flex align-items-center justify-content-center" style="width: 80px; height: 80px;">
                                    <span class="display-4 text-primary">{{ substr(Auth::user()->name, 0, 1) }}</span>
                                </div>
                            </div>
                            <div class="col-md-10">
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <p class="mb-2">
                                            <i class="fas fa-user text-primary me-2"></i>
                                            <strong>Nome utente:</strong> {{Auth::user()->name}}
                                        </p>
                                        <p class="mb-2">
                                            <i class="fas fa-envelope text-primary me-2"></i>
                                            <strong>Email:</strong> {{Auth::user()->email}}
                                        </p>
                                    </div>
                                    <div class="col-md-6">
                                        <p class="mb-2">
                                            <i class="fas fa-film text-primary me-2"></i>
                                            <strong>Film inseriti:</strong> {{ Auth::user()->movies->count() }}
                                        </p>
                                        <p class="mb-2">
                                            <i class="fas fa-calendar-alt text-primary me-2"></i>
                                            <strong>Registrato il:</strong> {{ Auth::user()->created_at->format('d/m/Y')}} 
                                            <small class="text-muted">
                                                alle {{ Auth::user()->created_at->format('H:i') }}
                                            </small>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Sezione film -->
        <div class="row mb-3">
            <div class="col-12">
                <h2 class="border-bottom pb-2 mb-4">
                    <i class="fas fa-film me-2 text-primary"></i>
                    I tuoi film
                    <span class="badge bg-primary ms-2">{{ Auth::user()->movies->count() }}</span>
                </h2>
            </div>
        </div>
        
        @if(Auth::user()->movies->count() > 0)
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
                @foreach (Auth::user()->movies as $movie)
                    <div class="col">
                        <div class="card h-100 border-0 shadow-sm rounded-3 overflow-hidden transform-on-hover">
                            <div class="position-relative">
                                <img src="{{Storage::url($movie->cover)}}" class="card-img-top" alt="{{ $movie->title }}" style="height: 200px; object-fit: cover;">
                                <div class="position-absolute top-0 end-0 p-2">
                                    <span class="badge bg-primary">Film</span>
                                </div>
                            </div>
                            <div class="card-body p-4">
                                <h5 class="card-title fw-bold mb-3">{{ $movie->title }}</h5>
                                <div class="d-grid">
                                    <a href="{{route('movies.show', $movie)}}" class="btn btn-outline-primary">
                                        <i class="fas fa-eye me-2"></i>Visualizza dettagli
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="row">
                <div class="col-12">
                    <div class="alert alert-info text-center">
                        <i class="fas fa-info-circle me-2"></i>
                        Non hai ancora inserito nessun film. 
                        <a href="{{ route('movies.create') }}" class="alert-link">Aggiungine uno ora!</a>
                    </div>
                </div>
            </div>
        @endif
    </div>
    
    <style>
        .transform-on-hover {
            transition: transform 0.3s ease-in-out;
        }
        
        .transform-on-hover:hover {
            transform: translateY(-5px);
        }
    </style>
</x-layout>