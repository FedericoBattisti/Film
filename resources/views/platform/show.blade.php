<x-layout>
    <header>
        <h1 class="text-center insegna-custom">Dettaglio piattaforma {{ $platform->name }}</h1>
    </header>
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-12 col-md-6">
                <div class="card border-0 shadow mb-3 card-equal">
                    <img src="{{ Storage::url($platform->logo) }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <p class="card-text">Descrizione: {{ $platform->description }}</p>
                        @if ($platform->movies->count() > 0)
                            <p><strong>Film disponibili su questa piattaforma:</strong></p>
                            <ul>
                                @foreach ($platform->movies as $movie)
                                    <li>{{ $movie->title }}</li>
                                @endforeach
                            </ul>
                        @else
                            <p><strong>Nessun film disponibile su questa piattaforma</strong></p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>
