<header class="header_area sticky-header">
    <div class="main_menu">
        <nav class="navbar navbar-expand-lg navbar-light main_box">
            <div class="container">
                <a class="navbar-brand logo_h" href=""><img src="{{ asset('themes/img/logo-new.png') }}" alt="">
                    <b>RODITRI MOBIL</b></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                    <ul class="nav navbar-nav menu_nav ml-auto">
                        <li class="nav-item active"><a class="nav-link" href="{{ route('home') }}">Beranda</a></li>
                        <li class="nav-item submenu dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button"
                                aria-haspopup="true" aria-expanded="false">Tentang</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('mobil') }}" class="nav-link dropdown-toggle" role="button"
                                aria-haspopup="true" aria-expanded="false">Mobil</a>
                        </li>
                        <li class="nav-item submenu dropdown">
                            <a href="#" class="nav-link dropdown-toggle" role="button"
                                aria-haspopup="true" aria-expanded="false">Pesanan</a>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('kontak') }}">Kontak</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <a href="{{ route('login') }}" class="genric-btn primary radius btn-sm ml-4">Login</a>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</header>