<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BALE Dashboard</title>
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>

<body>

    <header class="topbar">
        <div class="topbar__mobile-toggle" id="mobileToggle">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                stroke-width="2">
                <line x1="3" y1="12" x2="21" y2="12"></line>
                <line x1="3" y1="6" x2="21" y2="6"></line>
                <line x1="3" y1="18" x2="21" y2="18"></line>
            </svg>
        </div>

        <div class="topbar__search">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#94A3B8" stroke-width="2">
                <circle cx="11" cy="11" r="8"></circle>
                <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
            </svg>
            <input type="text" placeholder="Cari..." aria-label="Search">
        </div>

        <div class="topbar__actions">
            <button class="topbar__notification" aria-label="Notifications">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                    stroke-width="2">
                    <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path>
                    <path d="M13.73 21a2 2 0 0 1-3.46 0"></path>
                </svg>
                <span class="topbar__badge">2</span>
            </button>
            <div class="topbar__profile" id="profileToggle">
                <img src="https://ui-avatars.com/api/?name={{ auth()->user()->name }}&background=EBF4FF&color=2B78E4" alt="Admin"
                    class="profile__avatar">
                <div class="profile__info">
                    <span class="profile__name"> 
                        {{ auth()->user()->name }}<br>
                        <span class="profile__role">{{ auth()->user()->role->name }}</span>
                    </span>
                </div>
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#64748B" stroke-width="2">
                    <polyline points="6 9 12 15 18 9"></polyline>
                </svg>

                <div class="profile__dropdown" id="profileDropdown">
                    <div class="dropdown__header">
                        <p class="dropdown__name">{{ auth()->user()->name }}</p>
                        <p class="dropdown__email">{{ auth()->user()->role->name }}</p>
                    </div>
                    <hr class="dropdown__divider">
                    <a href="#" class="dropdown__item">
                        <i class="fa-regular fa-user"></i> Profil Saya
                    </a>
                    <a href="#" class="dropdown__item">
                        <i class="fa-solid fa-gear"></i> Pengaturan
                    </a>
                    <hr class="dropdown__divider">

                    <form method="POST" action="{{ route('auth.logout') }}">
                        @csrf
                        <button type="submit" class="dropdown__item text-danger">
                            <i class="fa-solid fa-arrow-right-from-bracket"></i> Keluar
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </header>

    <div class="main-wrapper">
        <aside class="sidebar" id="sidebar">
            <div class="sidebar__brand">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#2B78E4" stroke-width="2"
                    stroke-linecap="round" stroke-linejoin="round">
                    <polygon points="3 11 22 2 13 21 11 13 3 11"></polygon>
                </svg>
                <span>BALE ERP</span>
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
                <a href="{{ route('dashboard.sales') }}"
                    class="sidebar__link{{ request()->routeIs('dashboard.sales') ? ' sidebar__link--active' : '' }}">
                    {{-- <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2">
                        <polyline points="9 11 12 14 22 4"></polyline>
                        <path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path>
                    </svg>  --}}
                    <svg 
                        xmlns="http://www.w3.org/2000/svg" 
                        width="20" 
                        height="20" 
                        viewBox="0 0 24 24" 
                        fill="none" 
                        stroke="currentColor" 
                        stroke-width="2" 
                        stroke-linecap="round" 
                        stroke-linejoin="round"
                    >
                        <path d="M6 2l1.5 4h9L18 2"/>
                        <path d="M3 6h18l-1.5 14h-15L3 6z"/>
                    </svg> Penjualan
                </a>
                <a href="{{ route('dashboard.purchase') }}"
                    class="sidebar__link{{ request()->routeIs('dashboard.purchase') ? ' sidebar__link--active' : '' }}">
                    <svg 
                        xmlns="http://www.w3.org/2000/svg" 
                        width="20" 
                        height="20" 
                        viewBox="0 0 24 24" 
                        fill="none" 
                        stroke="currentColor" 
                        stroke-width="2" 
                        stroke-linecap="round" 
                        stroke-linejoin="round"
                    >
                        <path d="M4 2h16v20l-4-2-4 2-4-2-4 2V2z"/>
                        <line x1="8" y1="7" x2="16" y2="7"/>
                        <line x1="8" y1="11" x2="16" y2="11"/>
                        <line x1="8" y1="15" x2="13" y2="15"/>
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
                <a href="{{ route('dashboard.warehouse') }}"
                    class="sidebar__link{{ request()->routeIs('dashboard.warehouse') ? ' sidebar__link--active' : '' }}">
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
                <a href="{{ route('dashboard.shipment') }}"
                    class="sidebar__link{{ request()->routeIs('dashboard.shipment') ? ' sidebar__link--active' : '' }}">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2">
                        <rect x="1" y="3" width="15" height="13"></rect>
                        <polygon points="16 8 20 8 23 11 23 16 16 16 16 8"></polygon>
                        <circle cx="5.5" cy="18.5" r="2.5"></circle>
                        <circle cx="18.5" cy="18.5" r="2.5"></circle>
                    </svg> Pengiriman
                </a>
                <a href="{{ route('dashboard.finance') }}"
                    class="sidebar__link{{ request()->routeIs('dashboard.finance') ? ' sidebar__link--active' : '' }}">
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

        <main class="content">
            <section class="welcome-section">
                <h1>Selamat Datang {{ auth()->user()->name ?? 'Admin' }} 👋</h1>
            </section>

            <div class="account-info-card">
                <div class="card-header">
                    <h3>Informasi Akun</h3>
                    <i class="fa-solid fa-ellipsis"></i>
                </div>
                <div class="account-details">
                    <div class="detail-box">
                        <div class="icon-bg blue"><i class="fa-regular fa-calendar"></i></div>
                        <div class="info-text">
                            <p>{{ auth()->user()->created_at->format('d F Y') }}</p>
                        </div>
                    </div>
                    <div class="detail-box clickable">
                        <div class="icon-bg gray"><i class="fa-solid fa-user"></i></div>
                        <div class="info-text">
                            <small>Role</small>
                            <p>{{ auth()->user()->role->name ?? 'Administrator' }}</p>
                        </div>
                        <i class="fa-solid fa-chevron-right arrow-right"></i>
                    </div>
                </div>
            </div>

            <div class="menu-grid">
                <a href="{{ route('dashboard.index') }}" class="menu-link">
                    <div class="menu-item">
                        <div class="icon-box blue"><i class="fa-solid fa-house"></i></div>
                        <div class="menu-text">
                            <h4>Dashboard</h4>
                            <p>Ringkasan performa sistem</p>
                        </div>
                    </div>
                </a>

                <a href="{{ route('dashboard.sales') }}" class="menu-link">
                    <div class="menu-item">
                        <div class="icon-box purple"><i class="fa-solid fa-cart-shopping"></i></div>
                        <div class="menu-text">
                            <h4>Penjualan</h4>
                            <p>Kelola pesanan & transaksi</p>
                        </div>
                    </div>
                </a>

                <a href="{{ route('dashboard.purchase') }}" class="menu-link">
                    <div class="menu-item">
                        <div class="icon-box purple"><i class="fa-solid fa-cart-shopping"></i></div>
                        <div class="menu-text">
                            <h4>Pembelian</h4>
                            <p>Kelola pembelian</p>
                        </div>
                    </div>
                </a>

                <a href="{{ route('dashboard.produksi') }}" class="menu-link">
                    <div class="menu-item">
                        <div class="icon-box orange"><i class="fa-solid fa-industry"></i></div>
                        <div class="menu-text">
                            <h4>Produksi</h4>
                            <p>Monitor alur produksi</p>
                        </div>
                    </div>
                </a>

                <a href="{{ route('dashboard.warehouse') }}" class="menu-link">
                    <div class="menu-item">
                        <div class="icon-box gray"><i class="fa-solid fa-warehouse"></i></div>
                        <div class="menu-text">
                            <h4>Gudang</h4>
                            <p>Stok & inventaris barang</p>
                        </div>
                    </div>
                </a>

                <a href="{{ route('dashboard.qc') }}" class="menu-link">
                    <div class="menu-item">
                        <div class="icon-box teal"><i class="fa-solid fa-circle-check"></i></div>
                        <div class="menu-text">
                            <h4>QC</h4>
                            <p>Quality Control produk</p>
                        </div>
                    </div>
                </a>

                <a href="{{ route('dashboard.shipment') }}" class="menu-link">
                    <div class="menu-item">
                        <div class="icon-box blue"><i class="fa-solid fa-truck-fast"></i></div>
                        <div class="menu-text">
                            <h4>Pengiriman</h4>
                            <p>Status kurir & logistik</p>
                        </div>
                    </div>
                </a>

                <a href="{{ route('dashboard.finance') }}" class="menu-link">
                    <div class="menu-item">
                        <div class="icon-box green"><i class="fa-solid fa-wallet"></i></div>
                        <div class="menu-text">
                            <h4>Keuangan</h4>
                            <p>Laporan arus kas & biaya</p>
                        </div>
                    </div>
                </a>

                <a href="{{ route('dashboard.hr') }}" class="menu-link">
                    <div class="menu-item">
                        <div class="icon-box red"><i class="fa-solid fa-user-tie"></i></div>
                        <div class="menu-text">
                            <h4>HR</h4>
                            <p>Kelola staf & kehadiran</p>
                        </div>
                    </div>
                </a>
            </div>
        </main>
    </div>

    <script src="{{ asset('js/dashboard.js') }}"></script>
</body>

</html>
