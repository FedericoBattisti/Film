<x-layout>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8 text-center">
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                @if (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif
            </div>
        </div>
    </div>
    <div class="container my-2">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow">
                    <h2 class="card-title text-center my-2">{{ $movie->title }}</h2>
                    <img src="{{ Storage::url($movie->cover) }}" class="card-img-top" alt="Copertina">
                    <div class="card-body">
                        <p><strong>Genere:</strong> {{ $movie->genre }}</p>
                        <p><strong>Regia:</strong> {{ $movie->director }}</p>
                        <p><strong>Anno di uscita:</strong> {{ $movie->release_date }}</p>
                        <p><strong>Lingua:</strong> {{ $movie->language }}</p>
                        <p><strong>Paese:</strong> {{ $movie->country }}</p>
                        <p><strong>Sinossi:</strong> {!! nl2br(e($movie->description)) !!}</p>
                        {{-- <p><strong>Inserito da:</strong> {{$movie->user_id ?$movie->user->name : 'Ospite'}}</p> --}}
                        <p><strong>Inserito da:</strong> {{ $movie->user->name ?? 'Ospite' }}</p>
                        @if (count($movie->platforms) > 0)
                            <p><strong>Disponibile su:</strong></p>
                            <ul>
                                @foreach ($movie->platforms as $platform)
                                    <li>{{ $platform->name }}</li>
                                @endforeach
                            </ul>
                        @else
                            <p><strong>Non disponibile su nessuna piattaforma</strong></p>
                        @endif
                        @if (Auth::user() && Auth::user()->id == $movie->user_id)
                            <a href="{{ route('index') }}" class="btn mt-3 btn-custom">Torna alla lista</a>
                            <a href="{{ route('movie.edit', $movie) }}" class="btn mt-3 ms-4 btn-custom">Modifica</a>
                            <form action="{{ route('movie.delete', $movie) }}" method="POST"
                                class="d-inline-block mt-3">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn mt-3 ms-4 btn-outline-danger">Elimina film</button>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>
