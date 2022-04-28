<nav class="navbar navbar-expand">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <ul class="navbar-nav mr-auto">
        <li class="nav-item small-screens-sidebar-link">
            <a href="#" class="nav-link"><i class="material-icons-outlined">menu</i></a>
        </li>
        <li class="nav-item nav-profile dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true">
                <img src="{{ asset('images/profile.png') }}" alt="profile image" />
                <span>{{ auth()->user()->name }}</span><i class="material-icons dropdown-icon">keyboard_arrow_down</i>
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                    Log out
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        </li>
    </ul>
    <ul class="navbar-nav">
        <li class="nav-item">
            <a href="#" class="nav-link"><i class="material-icons-outlined">notifications</i></a>
        </li>
    </ul>
</nav>