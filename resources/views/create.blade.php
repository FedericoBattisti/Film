<x-layout>
    <div class="container my-5">
        <div class="row justify-content-center mb-4">
            <div class="col-md-10 text-center">
                <h1 class="insegna-custom">
                    <i class="fas fa-film text-primary me-2"></i>Aggiungi un nuovo film
                </h1>
                <p class="text-muted">Aiutaci a integrare nuovi film nel database compilando tutti i campi</p>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-8">
                @if ($errors->any())
                    <div class="alert alert-danger shadow-sm rounded-3 mb-4" role="alert">
                        <div class="d-flex align-items-center">
                            <i class="fas fa-exclamation-circle fs-4 me-2"></i>
                            <div>
                                <h5 class="mb-1">Attenzione!</h5>
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                @endif

                <div class="card border-0 shadow-sm rounded-3 overflow-hidden">
                    <div class="card-header bg-primary text-white py-3">
                        <h4 class="mb-0 text-center">
                            <i class="fas fa-plus-circle me-2"></i>Informazioni film
                        </h4>
                    </div>
                    <div class="card-body p-4">
                        <form action="{{ route('store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            
                            <div class="row g-4">
                                <!-- Prima colonna -->
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="title" class="form-label">
                                            <i class="fas fa-heading text-primary me-1"></i> Titolo
                                        </label>
                                        <input type="text" name="title" id="title" class="form-control" 
                                            value="{{old('title')}}" placeholder="Inserisci il titolo">
                                    </div>
                                    
                                    <div class="mb-3">
                                        <label for="director" class="form-label">
                                            <i class="fas fa-user-tie text-primary me-1"></i> Regia
                                        </label>
                                        <input type="text" name="director" id="director" class="form-control" 
                                            value="{{old('director')}}" placeholder="Inserisci il regista">
                                    </div>
                                    
                                    <div class="mb-3">
                                        <label for="genre" class="form-label">
                                            <i class="fas fa-theater-masks text-primary me-1"></i> Genere
                                        </label>
                                        <input type="text" name="genre" id="genre" class="form-control" 
                                            value="{{old('genre')}}" placeholder="Inserisci il genere">
                                    </div>
                                    
                                    <div class="mb-3">
                                        <label for="release_date" class="form-label">
                                            <i class="fas fa-calendar-alt text-primary me-1"></i> Anno di uscita
                                        </label>
                                        <input type="date" name="release_date" id="release_date" class="form-control" 
                                            value="{{old('release_date')}}">
                                    </div>
                                </div>
                                
                                <!-- Seconda colonna -->
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="language" class="form-label">
                                            <i class="fas fa-language text-primary me-1"></i> Lingua originale
                                        </label>
                                        <input type="text" name="language" id="language" class="form-control" 
                                            value="{{old('language')}}" placeholder="Inserisci la lingua originale">
                                    </div>
                                    
                                    <div class="mb-3">
                                        <label for="country" class="form-label">
                                            <i class="fas fa-globe-europe text-primary me-1"></i> Paese d'origine
                                        </label>
                                        <input type="text" name="country" id="country" class="form-control" 
                                            value="{{old('country')}}" placeholder="Inserisci il paese d'origine">
                                    </div>
                                    
                                    <div class="mb-3">
                                        <label for="img" class="form-label">
                                            <i class="fas fa-image text-primary me-1"></i> Copertina
                                        </label>
                                        <input type="file" name="cover" id="img" class="form-control">
                                        <small class="text-muted">Carica un'immagine rappresentativa del film</small>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Riga sinossi -->
                            <div class="mb-4 mt-2">
                                <label for="description" class="form-label">
                                    <i class="fas fa-align-left text-primary me-1"></i> Sinossi
                                </label>
                                <textarea name="description" id="description" class="form-control" rows="4"
                                    placeholder="Inserisci una breve descrizione">{{old('description')}}</textarea>
                                <small class="text-muted">Una breve descrizione della trama del film</small>
                            </div>
                            
                            <!-- Piattaforme -->
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
                                                           value="{{$platform->id}}" id="platform_{{$platform->id}}" 
                                                           name="platforms[]" {{ (is_array(old('platforms')) && in_array($platform->id, old('platforms'))) ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="platform_{{$platform->id}}">
                                                        {{ $platform->name }}
                                                    </label>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <small class="text-muted">Seleziona le piattaforme su cui è disponibile il film</small>
                            </div>
                            
                            <!-- Pulsanti -->
                            <div class="d-flex justify-content-between mt-4">
                                <a href="{{ route('index') }}" class="btn btn-outline-secondary">
                                    <i class="fas fa-arrow-left me-2"></i>Torna alla lista
                                </a>
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save me-2"></i>Salva film
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                
                <div class="card border-0 shadow-sm rounded-3 mt-4 bg-light">
                    <div class="card-body p-4">
                        <div class="d-flex">
                            <div class="me-3 text-primary">
                                <i class="fas fa-lightbulb fa-2x"></i>
                            </div>
                            <div>
                                <h5>Suggerimento</h5>
                                <p class="mb-0">Ti consigliamo di compilare tutti i campi per un'esperienza più immersiva. In particolare, l'immagine di copertina e la sinossi aiutano gli utenti a riconoscere meglio il film.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>
