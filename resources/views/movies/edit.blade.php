<x-layout>
    <div class="container mb-3">
        <div class="row">
            <div class="col-12 col-md-6 mx-auto">
                <h1 class="text-center mb-4 insegna-custom">Modifica film</h1>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-12">
                @if ($errors->any())
                    <div class="alert alert-danger" role="alert">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li class="text-center list-unstyled">{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <form action="{{ route('movie.update', $movie) }}" method="POST" class="p-4 "
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="title" class="form-label">Titolo</label>
                        <input type="text" name="title" id="title" class="form-control"
                            value="{{ old('title', $movie->title) }}" placeholder="Inserisci il titolo">
                    </div>
                    <div class="mb-3">
                        <label for="director" class="form-label">Regia</label>
                        <input type="text" name="director" id="director" class="form-control"
                            value="{{ old('director', $movie->director) }}" placeholder="Inserisci il regista">
                    </div>
                    <div class="mb-3">
                        <label for="genre" class="form-label">Genere</label>
                        <input type="text" name="genre" id="genre" class="form-control"
                            value="{{ old('genre', $movie->genre) }}" placeholder="Inserisci il genere">
                    </div>
                    <div class="mb-3">
                        <label for="release_date" class="form-label">Anno di uscita</label>
                        <input type="date" name="release_date" id="release_date" class="form-control"
                            value="{{ old('release_date', $movie->release_date) }}" placeholder="Inserisci l'anno di uscita">
                    </div>
                    <div class="mb-3">
                        <label for="language" class="form-label">Lingua originale</label>
                        <input type="text" name="language" id="language" class="form-control"
                            value="{{ old('language', $movie->language) }}" placeholder="Inserisci la lingua originale">
                    </div>
                    <div class="mb-3">
                        <label for="country" class="form-label">Paese d'origine</label>
                        <input type="text" name="country" id="country" class="form-control"
                            value="{{ old('country', $movie->country) }}" placeholder="Inserisci il paese d'origine">
                    </div>
                    <div class="mb-3">
                        <label for="img" class="form-label">Copertina</label>
                        <input type="file" name="cover" id="img" class="form-control" value="{{ old('cover'), $movie->cover }}">
                    </div>
                    <div class="mb-3">
                        <span>Immagine attuale</span><br>
                        <img src="{{ Storage::url($movie->cover) }}" alt="Copertina" class="img-fluid">
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Sinossi</label>
                        <textarea name="description" id="description" class="form-control" rows="4"
                            placeholder="Inserisci una breve descrizione">{{ old('description', $movie->description) }}</textarea>
                    </div>
                    <div class="form-group mb-3">
                        <label>Piattaforme:</label>
                        <div>
                            @foreach($platforms as $platform)
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" name="platforms[]" id="platform_{{ $platform->id }}" value="{{ $platform->id }}"
                                        {{ $movie->platforms->contains($platform->id) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="platform_{{ $platform->id }}">{{ $platform->name }}</label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn border shadow btn-white btn-custom">Modifica</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layout>
