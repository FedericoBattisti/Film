<x-layout>

    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="text-center insegna-custom">Aiutaci a integrare nuovi film nel database</h1>
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
    <div class="container ">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <form action="{{ route('store') }}" method="POST" class="p-4 " enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="title" class="form-label">Titolo</label>
                        <input type="text" name="title" id="title" class="form-control" value="{{old('title')}}"
                            placeholder="Inserisci il titolo">
                    </div>
                    <div class="mb-3">
                        <label for="director" class="form-label">Regia</label>
                        <input type="text" name="director" id="director" class="form-control" value="{{old('director')}}"
                            placeholder="Inserisci il regista">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Piattaforme disponibili</label>
                        @foreach ($platforms as $platform)
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="{{$platform->id}}" id={{$platform->id}} name="platforms[]">
                                <label class="form-check-label" for="{{$platform->id}}">{{ $platform->name }}</label><br>
                            </div>
                        @endforeach
                    <div class="mb-3">
                        <label for="genre" class="form-label">Genere</label>
                        <input type="text" name="genre" id="genre" class="form-control" value="{{old('genre')}}"
                            placeholder="Inserisci il genere">
                    </div>
                    <div class="mb-3">
                        <label for="release_date" class="form-label">Anno di uscita</label>
                        <input type="date" name="release_date" id="release_date" class="form-control" value="{{old('release_date')}}"
                            placeholder="Inserisci l'anno di uscita">
                    </div>
                    <div class="mb-3">
                        <label for="language" class="form-label">Lingua originale</label>
                        <input type="text" name="language" id="language" class="form-control" value="{{old('language')}}"
                            placeholder="Inserisci la lingua originale">
                    </div>
                    <div class="mb-3">
                        <label for="country" class="form-label">Paese d'origine</label>
                        <input type="text" name="country" id="country" class="form-control" value="{{old('country')}}"
                            placeholder="Inserisci il paese d'origine">
                    </div>
                    <div class="mb-3">
                        <label for="img" class="form-label">Copertina</label>
                        <input type="file" name="cover" id="img" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Sinossi</label>
                        <textarea name="description" id="description" class="form-control" value="{{old('description')}}" rows="4"
                            placeholder="Inserisci una breve descrizione"></textarea>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn border shadow btn-white btn-custom">Salva</button>
                    </div>
                </form>
            </div>
            <div class="col-12 col-md-4 d-flex justify-content-center align-items-center">
                <h2>Mi raccomando riempite tutti i campi per un'esperienza più immersiva possibile!</h2>
            </div>
        </div>
    </div>
</x-layout>
