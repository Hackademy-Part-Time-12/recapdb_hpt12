<nav class="navbar navbar-expand-lg bg-custom">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Libreria</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                <a class="nav-link" aria-current="page" href="{{route('homepage')}}">Home</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="#">Inserisci libro</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="#">Lista dei libri</a>
                </li>
            </ul>
        </div>
        <ul class="navbar-nav justify-content-end">
            @auth
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="#">{{Auth::user()->name}}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" onclick="event.preventDefault(); document.querySelector('#form-logout').submit();">Logout</a>
                    <form action="{{route('logout')}}" method="POST" id="form-logout">
                        @csrf
                    </form>
                </li>
            @endauth
            @guest
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="{{route('login')}}">Accedi</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('register')}}">Registrati</a>
                </li>
            @endguest
        </ul>
    </div>
</nav>