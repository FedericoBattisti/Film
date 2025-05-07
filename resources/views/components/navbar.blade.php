<nav class="navbar navbar-expand-lg">
    <div class="container-fluid">
        <img src="https://seekvectors.com/files/download/2f011e704ba684c76c525947800754c4.jpg" class="logo-custom" alt="">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                <li>
                    <a class="nav-custom" aria-current="page" href="{{route ('home')}}">Home</a>
                </li>
                <li>
                    <a class="nav-custom" href="{{route('create')}}">Database</a>
                </li>
                <li>
                    <a class="nav-custom" href="{{route('index')}}">Lista dei film</a>
                </li>
                <li>
                    <a class="nav-custom" href="{{route('platform.index')}}">Piattaforme</a>
                </li>
                <li>
                    <a class="nav-custom" href="{{route('platform.create')}}">Inserisci piattaforma</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-custom dropdown-toggle" href="#" id="authDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        @auth
                            Ciao {{ Auth::user()->name }}
                        @else
                            Ciao ospite
                        @endauth
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="authDropdown">
                        @guest
                            <li><a class="dropdown-item" href="{{route('login')}}">Accedi</a></li>
                            <li><a class="dropdown-item" href="{{route('register')}}">Registrati</a></li>
                        @endguest
                        @auth
                            <li><a class="dropdown-item" href="{{route('dashboard')}}">Dashboard</a></li>
                            <li>
                                <form id="logout-form" method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="dropdown-item">Logout</button>
                                </form>
                            </li>
                        @endauth
                    </ul>
                </li>
            </ul>
            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/3/3e/Disney%2B_logo.svg/2560px-Disney%2B_logo.svg.png" class="logo-custom" alt="">
        </div>
    </div>
</nav>
