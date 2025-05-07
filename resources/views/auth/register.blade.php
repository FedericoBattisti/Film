<x-layout>
    <div class="container">
        <div class="row justify-content-center mb-4">
            <div class="col-12 text-center">
                <h1 class="mb-4 insegna-custom">Registrati</h1>
            </div>
        </div>
    </div>
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-12 col-md-6">
                <form method="POST" action="{{ route('register') }}" class="p-4 border rounded shadow-sm bg-light">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Nome utente</label>
                        <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus
                            class="form-control @error('name') is-invalid @enderror">
                        @error('name')
                            <span class="invalid-feedback d-block" role="alert">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Indirizzo e-mail</label>
                        <input id="email" type="email" name="email" value="{{ old('email') }}" required
                            class="form-control @error('email') is-invalid @enderror">
                        @error('email')
                            <span class="invalid-feedback d-block" role="alert">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input id="password" type="password" name="password" required
                            class="form-control @error('password') is-invalid @enderror">
                        @error('password')
                            <span class="invalid-feedback d-block" role="alert">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="password_confirmation" class="form-label">Conferma Password</label>
                        <input id="password_confirmation" type="password" name="password_confirmation" required
                            class="form-control">
                    </div>
                    <div>
                        <button type="submit" class="btn border shadow btn-white btn-custom w-100">Registrati</button>
                    </div>
                </form>
                <div class="text-center mt-3">
                    <a href="{{ route('login') }}">Hai già un account? Accedi</a>
                </div>
            </div>
        </div>
    </div>
</x-layout>
