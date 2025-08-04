<div class="aside-menu flex-column-fluid">
    <div class="hover-scroll-overlay-y" id="kt_aside_menu_wrapper" data-kt-scroll="true"
        data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-height="auto"
        data-kt-scroll-dependencies="#kt_aside_logo, #kt_aside_footer" data-kt-scroll-wrappers="#kt_aside_menu"
        data-kt-scroll-offset="0">
        <div class="menu menu-column menu-title-gray-800 menu-state-title-primary menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-500"
            id="#kt_aside_menu" data-kt-menu="true">
            <div class="menu-item pt-5">
                <div class="menu-content">
                    <span class="menu-heading fw-bold text-uppercase fs-7">Dashboard</span>
                </div>
                <div class="menu-item">
                    <a class="menu-link {{ request()->routeIs('dashboard.index') ? 'active' : '' }}"
                        href="{{ route('dashboard.index') }}">
                        <span class="menu-icon">
                            <i class="ki-outline ki-element-11 fs-2"></i>
                        </span>
                        <span class="menu-title">Dashboard</span>
                    </a>
                </div>
            </div>
            <div class="menu-item pt-5">
                <div class="menu-content">
                    <span class="menu-heading fw-bold text-uppercase fs-7">Menu</span>
                </div>
            </div>
            @if (Auth::user()->role == 'owner')
            <div class="menu-item">
                <a class="menu-link {{ request()->routeIs('laporan_penjualan.*') ? 'active' : '' }}"
                    href="{{ route('laporan_penjualan.index') }}">
                    <span class="menu-icon">
                        <i class="ki-outline ki-abstract-41 fs-2"></i>
                    </span>
                    <span class="menu-title">Laporan Penjualan</span>
                </a>
            </div>
            @endif
            @if (Auth::user()->role == 'admin')
            <div class="menu-item">
                <a class="menu-link {{ request()->routeIs('produk.*') ? 'active' : '' }}"
                    href="{{ route('produk.index') }}">
                    <span class="menu-icon">
                        <i class="ki-outline ki-abstract-41 fs-2"></i>
                    </span>
                    <span class="menu-title">Produk</span>
                </a>
            </div>
            <div class="menu-item">
                <a class="menu-link {{ request()->routeIs('fitur.index') ? 'active' : '' }}"
                    href="{{ route('fitur.index') }}">
                    <span class="menu-icon">
                        <i class="ki-outline ki-abstract-41 fs-2"></i>
                    </span>
                    <span class="menu-title">Fitur</span>
                </a>
            </div>
            <div class="menu-item">
                <a class="menu-link {{ request()->routeIs('pemesanan.*') ? 'active' : '' }}"
                    href="{{ route('pemesanan.index') }}">
                    <span class="menu-icon">
                        <i class="ki-outline ki-abstract-41 fs-2"></i>
                    </span>
                    <span class="menu-title">Pemesanan</span>
                </a>
            </div>
            <div class="menu-item">
                <a class="menu-link {{ request()->routeIs('pemesanan.*') ? 'active' : '' }}"
                    href="{{ route('pemesanan.index') }}">
                    <span class="menu-icon">
                        <i class="ki-outline ki-abstract-41 fs-2"></i>
                    </span>
                    <span class="menu-title">Tunggakan Kredit</span>
                </a>
            </div>

            <div class="menu-item pt-5">
                <div class="menu-content">
                    <span class="menu-heading fw-bold text-uppercase fs-7">Pengaturan</span>
                </div>
            </div>
            <div data-kt-menu-trigger="click"
                class="menu-item menu-accordion {{ request()->routeIs('user.index') ? 'show' : '' }}">
                <span class="menu-link">
                    <span class="menu-icon">
                        <i class="ki-outline ki-address-book fs-2"></i>
                    </span>
                    <span class="menu-title">Pengaturan User</span>
                    <span class="menu-arrow"></span>
                </span>
                <div class="menu-sub menu-sub-accordion">
                    <div class="menu-item">
                        <a class="menu-link {{ request()->routeIs('user.index') ? 'active' : '' }}"
                            href="{{ route('user.index') }}">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title">User</span>
                        </a>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>