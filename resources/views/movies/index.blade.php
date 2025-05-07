<x-layout>
    <div class="container mb-3">
        <div class="row">
            <div class="col-12 col-md-6 mx-auto">
                <h1 class="text-center mb-4 insegna-custom">Lista dei film</h1>
            </div>
        </div>
    </div>
    <div class="container my-5">
        <div class="row justify-content-center">
            @forelse ($movies as $movie)
                <div class="col-12 col-md-4">
                    <div class="card border-0 shadow mb-3 card-equal">
                        <img src="{{ Storage::url($movie->cover) }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Titolo: {{ $movie->title }}</h5>
                            <a href="{{ route('movies.show', $movie) }}" class="btn border shadow mt-3 btn-custom">Apri
                                il dettaglio</a>
                        </div>
                    </div>
                </div>
            @empty
                <h3 class="text-center">Non sono ancora stati aggiunti dei film</h3>
            @endforelse
        </div>
    </div>
    <div class="container my-5">
        <div class="row">
            <div class="col-12 d-flex justify-content-center">
                <a href="{{ route('create') }}" class="btn border shadow mt-3 btn-custom">Aggiungi un film al
                    database</a>
            </div>
        </div>
    </div>
</x-layout>
