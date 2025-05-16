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
                @if (session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <i class="fas fa-exclamation-circle me-2"></i>{{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <!-- Contenuto principale -->
    <div class="container my-4">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="card border-0 shadow-sm rounded-3 overflow-hidden">
                    <div class="row g-0">
                        <!-- Immagine film -->
                        <div class="col-md-4 position-relative">
                            <img src="{{ Storage::url($movie->cover) }}" class="img-fluid h-100 w-100 movie-cover"
                                alt="{{ $movie->title }}">
                            <div class="position-absolute top-0 start-0 p-3">
                                <a href="{{ route('index') }}" class="btn btn-light btn-sm rounded-circle">
                                    <i class="fas fa-arrow-left"></i>
                                </a>
                            </div>
                            <div class="position-absolute top-0 end-0 p-3">
                                <span class="badge bg-primary fs-6">{{ $movie->genre }}</span>
                            </div>
                        </div>

                        <!-- Dettagli film -->
                        <div class="col-md-8">
                            <div class="card-body p-4">
                                <div class="d-flex justify-content-between align-items-start mb-3">
                                    <h1 class="card-title insegna-custom mb-0">{{ $movie->title }}</h1>

                                    @if (Auth::user() && Auth::user()->id == $movie->user_id)
                                        <div class="dropdown">
                                            <button class="btn btn-light btn-sm rounded-circle" type="button"
                                                data-bs-toggle="dropdown">
                                                <i class="fas fa-ellipsis-v"></i>
                                            </button>
                                            <ul class="dropdown-menu dropdown-menu-end">
                                                <li>
                                                    <a class="dropdown-item" href="{{ route('movie.edit', $movie) }}">
                                                        <i class="fas fa-edit me-2 text-primary"></i>Modifica
                                                    </a>
                                                </li>
                                                <li>
                                                    <form action="{{ route('movie.delete', $movie) }}" method="POST">
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

                                <div class="row mb-4">
                                    <div class="col-md-6">
                                        <p class="mb-2">
                                            <i class="fas fa-user-tie text-primary me-2"></i>
                                            <strong>Regia:</strong> {{ $movie->director }}
                                        </p>
                                        <p class="mb-2">
                                            <i class="fas fa-calendar-alt text-primary me-2"></i>
                                            <strong>Anno:</strong> {{ date('Y', strtotime($movie->release_date)) }}
                                        </p>
                                        <p class="mb-2">
                                            <i class="fas fa-language text-primary me-2"></i>
                                            <strong>Lingua:</strong> {{ $movie->language }}
                                        </p>
                                    </div>
                                    <div class="col-md-6">
                                        <p class="mb-2">
                                            <i class="fas fa-globe-europe text-primary me-2"></i>
                                            <strong>Paese:</strong> {{ $movie->country }}
                                        </p>
                                        <p class="mb-2">
                                            <i class="fas fa-user text-primary me-2"></i>
                                            <strong>Inserito da:</strong> {{ $movie->user->name ?? 'Ospite' }}
                                        </p>
                                    </div>
                                </div>

                                <div class="mb-4">
                                    <h5 class="border-bottom pb-2 mb-3">
                                        <i class="fas fa-align-left text-primary me-2"></i>Sinossi
                                    </h5>
                                    <p class="card-text text-muted">
                                        {!! nl2br(e($movie->description)) !!}
                                    </p>
                                </div>

                                <!-- Piattaforme disponibili -->
                                <div class="mb-3">
                                    <h5 class="border-bottom pb-2 mb-3">
                                        <i class="fas fa-tv text-primary me-2"></i>Disponibilità
                                    </h5>

                                    @if (count($movie->platforms) > 0)
                                        <div class="d-flex flex-wrap gap-2">
                                            @foreach ($movie->platforms as $platform)
                                                <span class="badge bg-light text-dark border p-2">
                                                    {{ $platform->name }}
                                                </span>
                                            @endforeach
                                        </div>
                                    @else
                                        <p class="text-muted fst-italic">
                                            <i class="fas fa-info-circle me-2"></i>
                                            Non disponibile su nessuna piattaforma
                                        </p>
                                    @endif
                                </div>

                                <!-- Pulsanti azione -->
                                <div class="mt-5 d-flex">
                                    <a href="{{ route('index') }}" class="btn btn-outline-secondary me-2">
                                        <i class="fas fa-arrow-left me-2"></i>Torna alla lista
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .movie-cover {
            object-fit: cover;
            object-position: center;
            max-height: 500px;
        }

        @media (max-width: 767px) {
            .movie-cover {
                max-height: 300px;
            }
        }
    </style>
</x-layout>
