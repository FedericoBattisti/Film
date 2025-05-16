<x-layout>
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">
                <div class="card shadow border-0 rounded-3">
                    <div class="card-header bg-primary text-white text-center py-3">
                        <h2 class="insegna-custom mb-0">Crea il tuo account</h2>
                    </div>
                    <div class="card-body p-4">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            
                            <div class="mb-4">
                                <label for="name" class="form-label">Nome utente</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                                    <input id="name" type="text" name="name" value="{{ old('name') }}" 
                                        class="form-control @error('name') is-invalid @enderror"
                                        placeholder="Il tuo nome utente" required autofocus>
                                </div>
                                @error('name')
                                    <span class="invalid-feedback d-block" role="alert">{{ $message }}</span>
                                @enderror
                            </div>
                            
                            <div class="mb-4">
                                <label for="email" class="form-label">Indirizzo e-mail</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                    <input id="email" type="email" name="email" value="{{ old('email') }}" 
                                        class="form-control @error('email') is-invalid @enderror"
                                        placeholder="La tua email" required>
                                </div>
                                @error('email')
                                    <span class="invalid-feedback d-block" role="alert">{{ $message }}</span>
                                @enderror
                            </div>
                            
                            <div class="mb-4">
                                <label for="password" class="form-label">Password</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                    <input id="password" type="password" name="password" 
                                        class="form-control @error('password') is-invalid @enderror"
                                        placeholder="Crea una password sicura" required>
                                </div>
                                @error('password')
                                    <span class="invalid-feedback d-block" role="alert">{{ $message }}</span>
                                @enderror
                            </div>
                            
                            <div class="mb-4">
                                <label for="password_confirmation" class="form-label">Conferma Password</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fas fa-check-circle"></i></span>
                                    <input id="password_confirmation" type="password" name="password_confirmation" 
                                        class="form-control" placeholder="Ripeti la password" required>
                                </div>
                            </div>
                            
                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-primary btn-custom py-2">
                                    <i class="fas fa-user-plus me-2"></i>Registrati
                                </button>
                            </div>
                            
                            <div class="mt-4 text-center">
                                <p class="mb-0">Hai già un account? <a href="{{ route('login') }}" class="text-decoration-none fw-bold">Accedi ora</a></p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>
