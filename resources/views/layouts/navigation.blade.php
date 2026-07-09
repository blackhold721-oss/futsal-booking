<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm border-bottom">

<div class="container-fluid px-4">

    <!-- Logo -->

    <a class="navbar-brand font-weight-bold text-primary"
       href="{{ route('dashboard') }}">

        <i class="fas fa-futbol mr-2"></i>

        FUTSAL BOOKING

    </a>

    <!-- Mobile Button -->

    <button class="navbar-toggler"
            type="button"
            data-toggle="collapse"
            data-target="#navbarUser">

        <span class="navbar-toggler-icon"></span>

    </button>

    <!-- Menu -->

    <div class="collapse navbar-collapse"
         id="navbarUser">

        <ul class="navbar-nav mx-auto">

            <li class="nav-item mx-2">

                <a class="nav-link font-weight-bold
                    {{ request()->routeIs('dashboard') ? 'text-primary border-bottom border-primary' : '' }}"
                   href="{{ route('dashboard') }}">

                    <i class="fas fa-home mr-1"></i>

                    Beranda

                </a>

            </li>

            <li class="nav-item mx-2">

                <a class="nav-link font-weight-bold
                    {{ request()->routeIs('booking.*') ? 'text-primary border-bottom border-primary' : '' }}"
                   href="{{ route('user.booking.index') }}">

                    <i class="fas fa-futbol mr-1"></i>

                    Lapangan

                </a>

            </li>

            <li class="nav-item mx-2">

                <a class="nav-link font-weight-bold
                    {{ request()->routeIs('pembayaran.*') ? 'text-primary border-bottom border-primary' : '' }}"
                   href="{{ route('user.pembayaran.index') }}">

                    <i class="fas fa-history mr-1"></i>

                    Riwayat Booking

                </a>

            </li>

        </ul>

        <!-- User -->

        <ul class="navbar-nav">

            <li class="nav-item dropdown no-arrow">

                <a class="nav-link dropdown-toggle"
                   href="#"
                   id="userDropdown"
                   role="button"
                   data-toggle="dropdown">

                    <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}"
                         class="rounded-circle mr-2"
                         width="35">

                    <span class="font-weight-bold text-dark">

                        {{ Auth::user()->name }}

                    </span>

                </a>

                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in">

                    <a class="dropdown-item"
                       href="{{ route('profile.edit') }}">

                        <i class="fas fa-user text-primary mr-2"></i>

                        Profil Saya

                    </a>

                    <div class="dropdown-divider"></div>

                    <form method="POST"
                          action="{{ route('logout') }}">

                        @csrf

                        <button type="submit"
                                class="dropdown-item text-danger">

                            <i class="fas fa-sign-out-alt mr-2"></i>

                            Logout

                        </button>

                    </form>

                </div>

            </li>

        </ul>

    </div>

</div>

</nav>

<style>

.navbar .nav-link{
    color:#444 !important;
    transition:0.3s;
}

.navbar .nav-link:hover{
    color:#4e73df !important;
}

.border-primary{
    border-width:3px !important;
}

</style>
