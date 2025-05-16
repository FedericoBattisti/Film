<footer class="bg-light py-5 mt-5 border-top">
    <div class="container">
        <div class="row g-4">
            <!-- Logo e descrizione -->
            <div class="col-lg-4 mb-3">
                <div class="d-flex align-items-center mb-2">
                    <img src="https://seekvectors.com/files/download/2f011e704ba684c76c525947800754c4.jpg" alt="Logo" height="40" class="me-2">
                    <h5 class="mb-0 text-primary fw-bold">CinemaDB</h5>
                </div>
                <p class="text-muted small">
                    Il tuo database personale di film e piattaforme streaming, per tenere traccia di tutto ciò che guardi.
                </p>
            </div>
            
            <!-- Link rapidi -->
            <div class="col-lg-4 mb-3">
                <h5 class="mb-3 text-dark">Link rapidi</h5>
                <ul class="list-unstyled">
                    <li class="mb-2">
                        <a href="{{ route('home') }}" class="text-decoration-none text-muted">
                            <i class="fas fa-home me-2"></i>Home
                        </a>
                    </li>
                    <li class="mb-2">
                        <a href="{{ route('index') }}" class="text-decoration-none text-muted">
                            <i class="fas fa-film me-2"></i>Film
                        </a>
                    </li>
                    <li class="mb-2">
                        <a href="{{ route('platform.index') }}" class="text-decoration-none text-muted">
                            <i class="fas fa-tv me-2"></i>Piattaforme
                        </a>
                    </li>
                    <li class="mb-2">
                        <a href="#" class="text-decoration-none text-muted">
                            <i class="fas fa-question-circle me-2"></i>FAQs
                        </a>
                    </li>
                </ul>
            </div>
            
            <!-- Contatti e social -->
            <div class="col-lg-4 mb-3">
                <h5 class="mb-3 text-dark">Seguici</h5>
                <div class="d-flex mb-4">
                    <a href="#" class="text-decoration-none me-3">
                        <i class="fab fa-facebook-f fs-5 text-primary"></i>
                    </a>
                    <a href="#" class="text-decoration-none me-3">
                        <i class="fab fa-twitter fs-5 text-info"></i>
                    </a>
                    <a href="#" class="text-decoration-none me-3">
                        <i class="fab fa-instagram fs-5 text-danger"></i>
                    </a>
                    <a href="#" class="text-decoration-none me-3">
                        <i class="fab fa-youtube fs-5 text-danger"></i>
                    </a>
                </div>
                <p class="text-muted small mb-0">
                    <i class="fas fa-envelope me-2"></i>info@cinemadb.com
                </p>
            </div>
        </div>
        
        <!-- Copyright e privacy -->
        <div class="row mt-4 pt-4 border-top">
            <div class="col-md-6 text-center text-md-start">
                <p class="text-muted small mb-0">
                    © CinemaDB {{ date('Y') }}. Tutti i diritti riservati.
                </p>
            </div>
            <div class="col-md-6 text-center text-md-end">
                <a href="#" class="text-decoration-none text-muted small me-3">Termini di servizio</a>
                <a href="#" class="text-decoration-none text-muted small">Privacy Policy</a>
            </div>
        </div>
    </div>
</footer>
