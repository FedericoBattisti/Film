<x-layout>
    <div class="container-fluid bg-light py-4 mb-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <h1 class="insegna-custom mb-2">
                        <i class="fas fa-film text-primary me-2"></i>Esplora i film
                    </h1>
                    <p class="text-muted">
                        Scopri la nostra collezione di {{ $movies->count() }} film disponibili
                    </p>
                </div>
                <div class="col-md-4 text-md-end mt-3 mt-md-0">
                    <a href="{{ route('create') }}" class="btn btn-primary rounded-pill">
                        <i class="fas fa-plus-circle me-2"></i>Aggiungi nuovo film
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="container mb-5">
        <!-- Filtri e ricerca -->
        <div class="row mb-4">
            <div class="col-md-8 mb-3 mb-md-0">
                <div class="input-group">
                    <span class="input-group-text bg-white border-end-0">
                        <i class="fas fa-search text-muted"></i>
                    </span>
                    <input type="text" id="searchInput" class="form-control border-start-0"
                        placeholder="Cerca per titolo, regista o genere...">
                </div>
            </div>
        </div>

        <!-- Elenco film -->
        <div class="row row-cols-1 row-cols-md-3 row-cols-lg-4 g-4 justify-content-center" id="movieContainer">
            @forelse ($movies as $movie)
                <div class="col movie-card">
                    <div class="card h-100 border-0 shadow-sm rounded-3 overflow-hidden transform-on-hover">
                        <div class="position-relative">
                            <img src="{{ Storage::url($movie->cover) }}" class="card-img-top movie-cover"
                                alt="{{ $movie->title }}">
                            <div class="position-absolute top-0 end-0 p-2">
                                <span class="badge bg-primary">{{ $movie->genre }}</span>
                            </div>
                        </div>
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title fw-bold mb-2">{{ $movie->title }}</h5>
                            <p class="card-text text-muted small mb-1">
                                <i class="fas fa-user-tie me-1"></i> {{ $movie->director }}
                            </p>
                            <p class="card-text text-muted small mb-3">
                                <i class="fas fa-calendar-alt me-1"></i>
                                {{ date('Y', strtotime($movie->release_date)) }}
                            </p>

                            <div class="mt-auto">
                                <a href="{{ route('movies.show', $movie) }}" class="btn btn-outline-primary w-100">
                                    <i class="fas fa-eye me-2"></i>Dettagli
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <div class="alert alert-info text-center py-5">
                        <i class="fas fa-film fa-3x mb-3"></i>
                        <h4>Non sono ancora stati aggiunti dei film</h4>
                        <p class="mb-0">Inizia aggiungendo il tuo primo film!</p>
                        <div class="mt-3">
                            <a href="{{ route('create') }}" class="btn btn-primary">
                                <i class="fas fa-plus-circle me-2"></i>Aggiungi film
                            </a>
                        </div>
                    </div>
                </div>
            @endforelse
        </div>

        <!-- Paginazione -->
        @if ($movies->count() > 0 && method_exists($movies, 'links'))
            <div class="row mt-5">
                <div class="col-12 d-flex justify-content-center">
                    {{ $movies->links() }}
                </div>
            </div>
        @endif
    </div>

    <style>
        .movie-cover {
            height: 240px;
            object-fit: cover;
        }

        .transform-on-hover {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .transform-on-hover:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1) !important;
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Ricerca 
            const searchInput = document.getElementById('searchInput');
            const movieCards = document.querySelectorAll('.movie-card');

            searchInput.addEventListener('input', function() {
                const searchTerm = this.value.toLowerCase();

                movieCards.forEach(card => {
                    const title = card.querySelector('.card-title').textContent.toLowerCase();
                    const director = card.querySelector('.card-text:nth-of-type(1)').textContent
                        .toLowerCase();
                    const genre = card.querySelector('.badge').textContent.toLowerCase();

                    if (title.includes(searchTerm) || director.includes(searchTerm) || genre
                        .includes(searchTerm)) {
                        card.style.display = '';
                    } else {
                        card.style.display = 'none';
                    }
                });
            });
        });
    </script>
</x-layout>
