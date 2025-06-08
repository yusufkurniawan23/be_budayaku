        <header class="header_section">

            <div class="header_bottom">
                <div class="container-fluid">
                    <nav class="navbar navbar-expand-lg custom_nav-container ">
                        <a class="navbar-brand navbar_brand_mobile" href="index.html"> Tro<span>Weld</span> </a>

                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class=""> </span>
                        </button>

                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav ms-auto align-items-center">

                                <!-- Menu Utama -->
                                <li
                                    class="nav-item {{ request()->routeIs('layouts.homepage') ? 'active fw-bold' : '' }}">
                                    <a class="nav-link" href="{{ route('layouts.homepage') }}">Home</a>
                                </li>
                                <li class="nav-item {{ request()->routeIs('agenda') ? 'active fw-bold' : '' }}">
                                    <a class="nav-link" href="{{ route('agenda') }}">Agenda</a>
                                </li>
                                <li class="nav-item {{ request()->routeIs('seniman') ? 'active fw-bold' : '' }}">
                                    <a class="nav-link" href="{{ route('seniman') }}">Seniman</a>
                                </li>
                                <li class="nav-item {{ request()->routeIs('budaya') ? 'active fw-bold' : '' }}">
                                    <a class="nav-link" href="{{ route('budaya') }}">Kebudayaan</a>
                                </li>
                                <li class="nav-item {{ request()->routeIs('contact') ? 'active fw-bold' : '' }}">
                                    <a class="nav-link" href="{{ route('contact') }}">Contact</a>
                                </li>

                                <!-- Autentikasi -->
                                @auth
                                    @if (auth()->user()->role === 'admin')
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('layouts.app') }}">
                                                <i class="fa fa-user-shield"></i> Admin Dashboard
                                            </a>
                                        </li>
                                    @endif

                                    <!-- Dropdown User -->
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle d-flex align-items-center" href="#"
                                            role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="fa fa-user me-1"></i> {{ auth()->user()->name }}
                                        </a>
                                        <ul class="dropdown-menu dropdown-menu-end">
                                            <!-- Menu Profile -->
                                            <li>
                                                <a class="dropdown-item" href="{{ route('profile.index') }}">
                                                    <i class="fa fa-id-card me-1"></i> Profile
                                                </a>
                                            </li>

                                            <li>
                                                <hr class="dropdown-divider">
                                            </li>

                                            <!-- Menu Logout -->
                                            <li>
                                                <a class="dropdown-item text-danger" href="#"
                                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                                    <i class="fa fa-sign-out-alt me-1"></i> Logout
                                                </a>
                                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                    style="display: none;">
                                                    @csrf
                                                </form>
                                            </li>
                                        </ul>
                                    </li>

                                @endauth

                                @guest
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('login') }}">
                                            <i class="fa fa-sign-in-alt"></i> Login
                                        </a>
                                    </li>
                                @endguest

                                <!-- Pencarian -->
                                {{-- <li class="nav-item ms-2">
                                    <form class="d-flex" role="search">
                                        <input class="form-control me-2" type="search" placeholder="Search"
                                            aria-label="Search">
                                        <button class="btn btn-outline-light" type="submit">
                                            <i class="fa fa-search"></i>
                                        </button>
                                    </form>
                                </li> --}}

                            </ul>
                        </div>



                    </nav>
                </div>
            </div>
        </header>
