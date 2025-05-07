<x-layout>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="text-center insegna-custom">Inserisci una piattaforma</h1>
            </div>
        </div>
    </div>
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-12 col-md-6">
                <form action="{{route('platform.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Nome piattaforma</label>
                        <input type="text" name="name" id="name" class="form-control" placeholder="Inserisci il nome" required>
                    </div>
                    <div class="mb-3">
                        <label for="logo" class="form-label">Logo</label>
                        <input type="file" name="logo" id="logo" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Descrizione</label>
                        <textarea name="description" id="description" class="form-control" placeholder="Inserisci la descrizione"></textarea>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-custom">Aggiungi la piattaforma</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layout>
