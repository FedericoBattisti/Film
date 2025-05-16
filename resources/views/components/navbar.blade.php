<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm py-2">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center" href="{{ route('home') }}">
            <img src="https://seekvectors.com/files/download/2f011e704ba684c76c525947800754c4.jpg" class="logo-custom"
                alt="Logo" height="40">
            <span class="ms-2 fw-bold text-primary">CinemaDB</span>
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link nav-custom px-3" aria-current="page" href="{{ route('home') }}">
                        <i class="fas fa-home me-1"></i> Home
                    </a>
                </li>

                <!-- Menu Film -->
                <li class="nav-item dropdown">
                    <a class="nav-link nav-custom dropdown-toggle px-3" href="#" id="filmDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-film me-1"></i> Film
                    </a>
                    <ul class="dropdown-menu dropdown-menu-animated" aria-labelledby="filmDropdown">
                        <li><a class="dropdown-item" href="{{ route('index') }}">Lista dei film</a></li>
                        <li><a class="dropdown-item" href="{{ route('create') }}">Inserisci film</a></li>
                    </ul>
                </li>

                <!-- Menu Piattaforme -->
                <li class="nav-item dropdown">
                    <a class="nav-link nav-custom dropdown-toggle px-3" href="#" id="platformDropdown"
                        role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-tv me-1"></i> Piattaforme
                    </a>
                    <ul class="dropdown-menu dropdown-menu-animated" aria-labelledby="platformDropdown">
                        <li><a class="dropdown-item" href="{{ route('platform.index') }}">Lista piattaforme</a></li>
                        <li><a class="dropdown-item" href="{{ route('platform.create') }}">Inserisci piattaforma</a>
                        </li>
                    </ul>
                </li>
            </ul>

            <!-- Menu Utente -->
            <div class="d-flex align-items-center">
                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/3/3e/Disney%2B_logo.svg/2560px-Disney%2B_logo.svg.png"
                    class="logo-custom me-3" alt="Disney+" height="30">

                <div class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle btn btn-outline-primary rounded-pill px-3" href="#"
                        id="authDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-user-circle me-1"></i>
                        @auth
                            {{ Auth::user()->name }}
                        @else
                            Accedi/Registrati
                        @endauth
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-animated" aria-labelledby="authDropdown">
                        @guest
                            <li><a class="dropdown-item" href="{{ route('login') }}"><i
                                        class="fas fa-sign-in-alt me-2"></i>Accedi</a></li>
                            <li><a class="dropdown-item" href="{{ route('register') }}"><i
                                        class="fas fa-user-plus me-2"></i>Registrati</a></li>
                        @endguest
                        @auth
                            <li><a class="dropdown-item" href="{{ route('dashboard') }}"><i
                                        class="fas fa-tachometer-alt me-2"></i>Dashboard</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                                <form id="logout-form" method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="dropdown-item text-danger">
                                        <i class="fas fa-sign-out-alt me-2"></i>Logout
                                    </button>
                                </form>
                            </li>
                        @endauth
                    </ul>
                </div>
            </div>
        </div>
    </div>
</nav>

<style>
    .nav-custom {
        font-weight: 500;
        transition: all 0.3s ease;
    }

    .nav-custom:hover {
        color: #0d6efd !important;
    }

    .dropdown-menu-animated {
        animation: fadeIn 0.3s ease-in-out;
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(-10px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .logo-custom {
        max-height: 40px;
        width: auto;
    }
</style>
