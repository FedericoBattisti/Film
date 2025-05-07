<x-layout>
    <div class="container mb-3">
        <div class="row">
            <div class="col-12 col-md-6 mx-auto">
                <h1 class="text-center mb-4 insegna-custom">Lista delle piattaforme</h1>
            </div>
        </div>
    </div>
    @if(session('success'))
        <div class="alert alert-success text-center">
            {{ session('success') }}
        </div>
    @endif
    <div class="container my-5">
        <div class="row justify-content-center">
            @forelse ($platforms as $platform)
                <div class="col-12 col-md-4">
                    <div class="card border-0 shadow mb-3 card-equal">
                        <img src="{{Storage::url($platform->logo)}}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Nome piattafroma: {{$platform->name}}</h5>
                            <a href="{{route('platform.show', $platform)}}" class="btn border shadow mt-3 btn-custom">Apri il dettaglio</a>
                        </div>
                    </div>
                </div>
            @empty
                <h3 class="text-center">Non sono ancora state aggiunte delle piattaforme</h3>
                <a href="{{route('platform.create')}}" class="text-center text-black btn border shadow btn-white ">Inseriscine una</a>
            @endforelse
        </div>
    </div>
</x-layout>