<nav id="second-header" class="navbar navbar-expand-lg navbar-dark header p-3 bg-white">
    <div class="container">
      <a class="text-uppercase" href="{{ route('home') }}">Bravo</a>

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

        <div class="collapse navbar-collapse flex-grow-0" id="navbarNav">
            <ul class="navbar-nav">
                @guest
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Rooms</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Facilities</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">Register</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">Login</a>
                </li>
            @endguest
            
            @auth   
                <li class="nav-item active">
                    <a class="nav-link" href="#">{{ auth()->user()->username }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Rooms</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Facilities</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('user.bookings') }}">My Bookings</a>
                </li>
                <li class="nav-item d-flex align-items-center">
                    <form action="{{ route('logout') }}" method="post">
                        @csrf
                        <button type="submit" class="d-inline bg-none border-0 bg-transparent text-white text-uppercase font-weight-light">Logout</button>
                    </form>
                </li>
            @endauth
            </ul>
        </div>
    </div>
</nav>