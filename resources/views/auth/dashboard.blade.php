<x-layout>
    <div class="container my-5">
        <div class="row">
            <div class="col-12">
                <h1 class="text-center insegna-custom">Dashboard dell'utente {{ Auth::user()->name }}</h1>
            </div>
        </div>
    </div>
    <div class="container border rounded shadow-sm bg-light p-4 mb-5">
        <div class="row d-flex justify-content-center mb-4">
            <div class="col-12 col-md-6">
                <p><strong>Nome utente: </strong> {{Auth::user()->name}}</p>
                <p><strong>Email: </strong> {{Auth::user()->email}}</p>
                <p><strong>Numero inserimenti: </strong> {{ Auth::user()->movies->count() }}</p>
                <p><strong>REGISTRATO IL: </strong> {{ Auth::user()->created_at->format('l d/m/Y')}} alle {{ Auth::user()->created_at->format('H:i') }}.</p>
            </div>
        </div>
    </div>
    <div class="container my-5">
        <div class="row justify-content-center">
            @foreach (Auth::user()->movies as $movie)
                <div class="col-12 col-md-4">
                    <div class="card border-0 shadow mb-3 card-equal">
                        <img src="{{Storage::url($movie->cover)}}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Titolo: {{$movie->title}}</h5>
                            <a href="{{route('movies.show', $movie)}}" class="btn border shadow mt-3 btn-custom">Apri il dettaglio</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-layout>