<header class="header_area sticky-header">
    <div class="main_menu">
        <nav class="navbar navbar-expand-lg navbar-light main_box">
            <div class="container">
                <a class="navbar-brand logo_h" href="{{ route('home') }}"><img src="{{ asset('themes/img/logo/logo-new.png') }}"
                        alt="">
                    <b>RODITRI MOBIL</b></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                    <ul class="nav navbar-nav menu_nav ml-auto">
                        <li class="nav-item {{ request()->routeIs('home') ? 'active' : '' }}"><a class="nav-link"
                                href="{{ route('home') }}">Home</a></li>
                        <li class="nav-item {{ request()->routeIs('tentang') ? 'active' : '' }}">
                            <a href="{{ route('tentang') }}" class="nav-link dropdown-toggle" role="button"
                                aria-haspopup="true" aria-expanded="false">Tentang</a>
                        </li>
                        {{-- <li class="nav-item {{ request()->routeIs(['produk', 'detail-produk']) ? 'active' : '' }}">
                            <a href="{{ route('produk') }}" class="nav-link dropdown-toggle" role="button"
                                aria-haspopup="true" aria-expanded="false">Produk</a>
                        </li> --}}
                        <li class="nav-item {{ request()->routeIs('pesanan') ? 'active' : '' }}">
                            <a href="{{ route('pesanan') }}" class="nav-link dropdown-toggle" role="button"
                                aria-haspopup="true" aria-expanded="false">Pesanan</a>
                        </li>
                        <li class="nav-item {{ request()->routeIs('kontak') ? 'active' : '' }}"><a class="nav-link"
                                href="{{ route('kontak') }}">Kontak</a></li>
                    </ul>
                    @if (Auth::check())
                        <ul class="nav navbar-nav navbar-right">
                            <li class="nav-item"><a href="" class="cart"><span class="ti-user"></span></a></li>
                            <li class="nav-item">
                                <span class="">{{ Auth::user()->nama }}</span>
                            </li>
                        </ul>
                    @endif
                    <ul class="nav navbar-nav navbar-right">
                        @if (!Auth::check())
                            <a href="{{ route('login') }}" class="genric-btn primary radius btn-sm ml-4">Masuk</a>
                        @else
                            <a href="{{ route('logout') }}" class="genric-btn primary radius btn-sm ml-4">Keluar</a>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</header>
