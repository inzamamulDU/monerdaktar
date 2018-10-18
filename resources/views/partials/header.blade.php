<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
<div class="container">
    <a class="navbar-brand" href="{{ url('/')  }}">
        <span class="logo-name">Amar Doctar</span>
    </a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link nav-link-color" href="{{route('home.welcome')}}">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link nav-link-color" href="about.html">Doctors</a>
            </li>
            <li class="nav-item">
                <a class="nav-link nav-link-color" href="services.html">Services</a>
            </li>
            <li class="nav-item">
                <a class="nav-link nav-link-color" href="contact.html">Appointment</a>
            </li>
            <li class="nav-item">
                <a class="nav-link nav-link-color" href="contact.html">Contact</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle nav-link-color" href="#" id="navbarDropdownPortfolio" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Pages
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownPortfolio">
                    <a class="dropdown-item" href="portfolio-1-col.html">1 Column Portfolio</a>
                    <a class="dropdown-item" href="portfolio-2-col.html">2 Column Portfolio</a>
                    <a class="dropdown-item" href="portfolio-3-col.html">3 Column Portfolio</a>
                </div>
            </li>

            <li class="nav-item dropdown">
                @guest
                <li class="nav-item"><a class="nav-link nav-link-color" href="{{ route('login') }}">Login</a></li>
                <li class="nav-item"><a class="nav-link nav-link-color" href="{{ route('register') }}">Register</a></li>
                @else
                    <a class="nav-link dropdown-toggle nav-link-color" href="#" id="navbarDropdownPortfolio" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{ Auth::user()->name }}
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownPortfolio">
                        <a class="dropdown-item nav-link-color"href="{{ route('user.edit') }}">Profile Info</a>

                        <a href="{{ route('logout') }}" class=" dropdown-item nav-link-color"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                Logout
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>

                    </div>
                @endguest

            </li>
        </ul>
    </div>
</div>
</nav>