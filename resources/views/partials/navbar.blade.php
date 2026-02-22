<aside class="sidebar" id="sidebar">
    <div class="sidebar__brand">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#2B78E4" stroke-width="2"
            stroke-linecap="round" stroke-linejoin="round">
            <polygon points="3 11 22 2 13 21 11 13 3 11"></polygon>
        </svg>
        <span>ABPE WebApp</span>
    </div>
    <nav class="sidebar__nav">
        <a href="{{ route('dashboard.index') }}"
            class="sidebar__link{{ request()->routeIs('dashboard.index') ? ' sidebar__link--active' : '' }}">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                stroke-width="2">
                <rect x="3" y="3" width="7" height="7"></rect>
                <rect x="14" y="3" width="7" height="7"></rect>
                <rect x="14" y="14" width="7" height="7"></rect>
                <rect x="3" y="14" width="7" height="7"></rect>
            </svg> Dashboard
        </a>
        <a href="{{ route('dashboard.penjualan') }}"
            class="sidebar__link{{ request()->routeIs('dashboard.penjualan') ? ' sidebar__link--active' : '' }}">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                stroke-width="2">
                <polyline points="9 11 12 14 22 4"></polyline>
                <path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path>
            </svg> Penjualan
        </a>
        <a href="{{ route('dashboard.pembelian') }}"
            class="sidebar__link{{ request()->routeIs('dashboard.pembelian') ? ' sidebar__link--active' : '' }}">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                stroke-width="2">
                <polyline points="9 11 12 14 22 4"></polyline>
                <path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path>
            </svg> Pembelian
        </a>
        <a href="{{ route('dashboard.produksi') }}"
            class="sidebar__link{{ request()->routeIs('dashboard.produksi') ? ' sidebar__link--active' : '' }}">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                stroke-width="2">
                <rect x="2" y="7" width="20" height="14" rx="2" ry="2"></rect>
                <path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"></path>
            </svg> Produksi
        </a>
        <a href="{{ route('dashboard.gudang') }}"
            class="sidebar__link{{ request()->routeIs('dashboard.gudang') ? ' sidebar__link--active' : '' }}">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                stroke-width="2">
                <path
                    d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z">
                </path>
                <polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline>
                <line x1="12" y1="22.08" x2="12" y2="12"></line>
            </svg> Gudang
        </a>
        <a href="{{ route('dashboard.qc') }}"
            class="sidebar__link{{ request()->routeIs('dashboard.qc') ? ' sidebar__link--active' : '' }}">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                stroke-width="2">
                <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                <polyline points="22 4 12 14.01 9 11.01"></polyline>
            </svg> QC
        </a>
        <a href="{{ route('dashboard.pengiriman') }}"
            class="sidebar__link{{ request()->routeIs('dashboard.pengiriman') ? ' sidebar__link--active' : '' }}">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                stroke-width="2">
                <rect x="1" y="3" width="15" height="13"></rect>
                <polygon points="16 8 20 8 23 11 23 16 16 16 16 8"></polygon>
                <circle cx="5.5" cy="18.5" r="2.5"></circle>
                <circle cx="18.5" cy="18.5" r="2.5"></circle>
            </svg> Pengiriman
        </a>
        <a href="{{ route('dashboard.keuangan') }}"
            class="sidebar__link{{ request()->routeIs('dashboard.keuangan') ? ' sidebar__link--active' : '' }}">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                stroke-width="2">
                <line x1="12" y1="1" x2="12" y2="23"></line>
                <path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path>
            </svg> Keuangan
        </a>
        <a href="{{ route('dashboard.hr') }}"
            class="sidebar__link{{ request()->routeIs('dashboard.hr') ? ' sidebar__link--active' : '' }}">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                stroke-width="2">
                <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                <circle cx="12" cy="7" r="4"></circle>
            </svg> HR
        </a>
    </nav>
</aside>
