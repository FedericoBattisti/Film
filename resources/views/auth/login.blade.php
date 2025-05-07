<x-layout>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="text-center mb-4 insegna-custom">Effettua il log-in</h1>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label">Indirizzo e-mail</label>
                        <input type="email" name="email" id="email"
                            class="form-control @error('email') is-invalid @enderror" required autofocus>
                        @error('email')
                            <span class="invalid-feedback" role="alert">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="password" id="password"
                            class="form-control @error('password') is-invalid @enderror" required>
                        @error('password')
                            <span class="invalid-feedback" role="alert">{{ $message }}</span>
                        @enderror
                        <div class="form-check mt-3">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember">
                            <label class="form-check-label" for="remember">
                                Ricordami
                            </label>
                        </div>
                        <div class="mt-3">
                            <a href="{{ route('register') }}">Non hai un account? Registrati</a>
                        </div>
                    </div>
                    <button type="submit" class="btn border shadow btn-white btn-custom">Accedi</button>
                </form>
            </div>
        </div>
    </div>
</x-layout>
