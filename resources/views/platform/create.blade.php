<x-layout>
    <div class="container my-5">
        <div class="row justify-content-center mb-4">
            <div class="col-md-8 text-center">
                <h1 class="insegna-custom mb-2">
                    <i class="fas fa-tv text-primary me-2"></i>Inserisci una nuova piattaforma
                </h1>
                <p class="text-muted">Aggiungi una nuova piattaforma di streaming alla tua collezione</p>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-12 col-md-8 col-lg-6">
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
                            <i class="fas fa-plus-circle me-2"></i>Dettagli piattaforma
                        </h4>
                    </div>
                    <div class="card-body p-4">
                        <form action="{{ route('platform.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">
                                    <i class="fas fa-signature text-primary me-1"></i> Nome piattaforma
                                </label>
                                <input type="text" name="name" id="name" class="form-control"
                                    value="{{ old('name') }}" placeholder="Es. Netflix, Disney+, Prime Video"
                                    required>
                                <small class="text-muted">Inserisci il nome della piattaforma di streaming</small>
                            </div>

                            <div class="mb-3">
                                <label for="logo" class="form-label">
                                    <i class="fas fa-image text-primary me-1"></i> Logo
                                </label>
                                <input type="file" name="logo" id="logo" class="form-control"
                                    value="{{ old('logo') }}">
                                <small class="text-muted">Carica un'immagine del logo (formato consigliato: PNG con
                                    sfondo trasparente)</small>
                            </div>

                            <div class="mb-4">
                                <label for="description" class="form-label">
                                    <i class="fas fa-align-left text-primary me-1"></i> Descrizione
                                </label>
                                <textarea name="description" id="description" class="form-control" rows="4"
                                    placeholder="Inserisci una breve descrizione della piattaforma">{{ old('description') }}</textarea>
                                <small class="text-muted">Una breve descrizione della piattaforma e dei suoi
                                    contenuti</small>
                            </div>
                            <div class="d-flex justify-content-between mt-4">
                                <a href="{{ route('platform.index') }}" class="btn btn-outline-secondary">
                                    <i class="fas fa-arrow-left me-2"></i>Torna alla lista
                                </a>
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save me-2"></i>Salva piattaforma
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
                                <p class="mb-0">Aggiungendo una piattaforma potrai successivamente associarla ai film
                                    nella tua collezione, facilitando la ricerca in base al servizio di streaming.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .form-label {
            font-weight: 500;
        }
    </style>
</x-layout>
