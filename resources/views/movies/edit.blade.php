<x-layout>
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="card border-0 shadow-sm rounded-3 overflow-hidden">
                    <div class="card-header bg-primary text-white py-3">
                        <h2 class="text-center mb-0 insegna-custom">
                            <i class="fas fa-edit me-2"></i>Modifica film
                        </h2>
                    </div>

                    <div class="card-body p-4">
                        @if ($errors->any())
                            <div class="alert alert-danger" role="alert">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li class="text-center list-unstyled">{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('movie.update', $movie) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="row g-4">
                                <!-- Prima colonna -->
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="title" class="form-label">
                                            <i class="fas fa-heading text-primary me-1"></i> Titolo
                                        </label>
                                        <input type="text" name="title" id="title" class="form-control"
                                            value="{{ old('title', $movie->title) }}" placeholder="Inserisci il titolo">
                                    </div>

                                    <div class="mb-3">
                                        <label for="director" class="form-label">
                                            <i class="fas fa-user-tie text-primary me-1"></i> Regia
                                        </label>
                                        <input type="text" name="director" id="director" class="form-control"
                                            value="{{ old('director', $movie->director) }}"
                                            placeholder="Inserisci il regista">
                                    </div>

                                    <div class="mb-3">
                                        <label for="genre" class="form-label">
                                            <i class="fas fa-theater-masks text-primary me-1"></i> Genere
                                        </label>
                                        <input type="text" name="genre" id="genre" class="form-control"
                                            value="{{ old('genre', $movie->genre) }}" placeholder="Inserisci il genere">
                                    </div>

                                    <div class="mb-3">
                                        <label for="release_date" class="form-label">
                                            <i class="fas fa-calendar-alt text-primary me-1"></i> Anno di uscita
                                        </label>
                                        <input type="date" name="release_date" id="release_date" class="form-control"
                                            value="{{ old('release_date', $movie->release_date) }}">
                                    </div>
                                </div>

                                <!-- Seconda colonna -->
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="language" class="form-label">
                                            <i class="fas fa-language text-primary me-1"></i> Lingua originale
                                        </label>
                                        <input type="text" name="language" id="language" class="form-control"
                                            value="{{ old('language', $movie->language) }}"
                                            placeholder="Inserisci la lingua originale">
                                    </div>

                                    <div class="mb-3">
                                        <label for="country" class="form-label">
                                            <i class="fas fa-globe-europe text-primary me-1"></i> Paese d'origine
                                        </label>
                                        <input type="text" name="country" id="country" class="form-control"
                                            value="{{ old('country', $movie->country) }}"
                                            placeholder="Inserisci il paese d'origine">
                                    </div>

                                    <div class="mb-3">
                                        <label for="img" class="form-label">
                                            <i class="fas fa-image text-primary me-1"></i> Copertina
                                        </label>
                                        <input type="file" name="cover" id="img" class="form-control">
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label d-block">Immagine attuale</label>
                                        <div class="border rounded p-2 text-center">
                                            <img src="{{ Storage::url($movie->cover) }}" alt="Copertina"
                                                class="img-thumbnail" style="max-height: 150px;">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Sinossi e piattaforme -->
                            <div class="mb-4 mt-2">
                                <label for="description" class="form-label">
                                    <i class="fas fa-align-left text-primary me-1"></i> Sinossi
                                </label>
                                <textarea name="description" id="description" class="form-control" rows="4"
                                    placeholder="Inserisci una breve descrizione">{{ old('description', $movie->description) }}</textarea>
                            </div>

                            <div class="mb-4">
                                <label class="form-label">
                                    <i class="fas fa-tv text-primary me-1"></i> Piattaforme disponibili
                                </label>
                                <div class="border rounded p-3">
                                    <div class="row">
                                        @foreach ($platforms as $platform)
                                            <div class="col-md-4 col-lg-3 mb-2">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox"
                                                        name="platforms[]" id="platform_{{ $platform->id }}"
                                                        value="{{ $platform->id }}"
                                                        {{ $movie->platforms->contains($platform->id) ? 'checked' : '' }}>
                                                    <label class="form-check-label"
                                                        for="platform_{{ $platform->id }}">
                                                        {{ $platform->name }}
                                                    </label>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex justify-content-between mt-4">
                                <a href="{{ route('movies.show', $movie) }}" class="btn btn-outline-secondary">
                                    <i class="fas fa-arrow-left me-2"></i>Annulla
                                </a>
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save me-2"></i>Salva modifiche
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>
