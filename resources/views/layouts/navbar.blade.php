<nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm">

    <a class="navbar-brand font-weight-bold"
       href="{{ route('dashboard') }}">
        Río Claro
    </a>

    <button class="navbar-toggler"
            type="button"
            data-toggle="collapse"
            data-target="#mainNavbar">

        <span class="navbar-toggler-icon"></span>

    </button>

    <div class="collapse navbar-collapse"
         id="mainNavbar">

        <ul class="navbar-nav ml-auto">

            <li class="nav-item dropdown">

                <a class="nav-link dropdown-toggle"
                   href="#"
                   id="navbarDropdown"
                   role="button"
                   data-toggle="dropdown">

                    {{ auth()->user()->name }}

                </a>

                <div class="dropdown-menu dropdown-menu-right">

                    <form method="POST"
                          action="{{ route('logout') }}">

                        @csrf

                        <button type="submit"
                                class="dropdown-item">

                            Cerrar sesión

                        </button>

                    </form>

                </div>

            </li>

        </ul>

    </div>

</nav>