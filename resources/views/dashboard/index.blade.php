<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kassia Dashboard</title>
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>

<body>

    <header class="navbar">
        <div class="logo">
            <span class="logo-k">ABPE</span> <strong>WEBAPP</strong>
        </div>
        <div class="user-profile">
            <i class="fa-regular fa-bell"></i>
            <div class="profile-info">
                <img src="https://via.placeholder.com/40" alt="Avatar">
                <div class="text">
                    <span class="name">{{ auth()->user()->name }}</span>
                    <span class="role">{{ auth()->user()->role->name }} <i class="fa-solid fa-chevron-down"></i></span>
                </div>
            </div>
        </div>
    </header>

    <div class="main-wrapper">
        <aside class="sidebar">
            <nav>
                <ul>
                    <li class="{{ request()->routeIs('dashboard.index') ? 'active' : '' }}">
                        <a href="{{ route('dashboard.index') }}"><i class="fa-solid fa-house"></i> Dashboard</a>
                    </li>
                    <li class="{{ request()->routeIs('dashboard.penjualan') ? 'active' : '' }}">
                        <a href="{{ route('dashboard.penjualan') }}"><i class="fa-solid fa-cart-shopping"></i>
                            Penjualan</a>
                    </li>
                    <li class="{{ request()->routeIs('dashboard.produksi') ? 'active' : '' }}">
                        <a href="{{ route('dashboard.produksi') }}"><i class="fa-solid fa-industry"></i> Produksi</a>
                    </li>
                    <li class="{{ request()->routeIs('dashboard.gudang') ? 'active' : '' }}">
                        <a href="{{ route('dashboard.gudang') }}"><i class="fa-solid fa-warehouse"></i> Gudang</a>
                    </li>
                    <li class="{{ request()->routeIs('dashboard.qc') ? 'active' : '' }}">
                        <a href="{{ route('dashboard.qc') }}"><i class="fa-solid fa-circle-check"></i> QC</a>
                    </li>
                    <li class="{{ request()->routeIs('dashboard.pengiriman') ? 'active' : '' }}">
                        <a href="{{ route('dashboard.pengiriman') }}"><i class="fa-solid fa-truck-fast"></i>
                            Pengiriman</a>
                    </li>
                    <li class="{{ request()->routeIs('dashboard.keuangan') ? 'active' : '' }}">
                        <a href="{{ route('dashboard.keuangan') }}"><i class="fa-solid fa-wallet"></i> Keuangan</a>
                    </li>
                    <li class="{{ request()->routeIs('dashboard.hr') ? 'active' : '' }}">
                        <a href="{{ route('dashboard.hr') }}"><i class="fa-solid fa-user-tie"></i> HR</a>
                    </li>
                    <li>
                        <form action="{{ route('auth.logout') }}" method="POST" >
                            @csrf
                            <button type="submit">Logout</button>
                        </form>
                    </li>
                </ul>
            </nav>
        </aside>

        <main class="content">
            <section class="welcome-section">
                <h1>Selamat Datang {{ auth()->user()->name }}👋</h1>
                <p>Kelola toko dan transaksi Anda dengan lebih rapi dan efisien.</p>
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
                            <small>Subscription End</small>
                            <p>18 Februari 2026</p>
                        </div>
                    </div>
                    <div class="detail-box clickable">
                        <div class="icon-bg gray"><i class="fa-solid fa-user"></i></div>
                        <div class="info-text">
                            <small>Role</small>
                            <p>{{ auth()->user()->role->name }}</p>
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
                            <p>Ringkasan performa toko</p>
                        </div>
                    </div>
                </a>

                <a href="{{ route('dashboard.penjualan') }}" class="menu-link">
                    <div class="menu-item">
                        <div class="icon-box purple"><i class="fa-solid fa-cart-shopping"></i></div>
                        <div class="menu-text">
                            <h4>Penjualan</h4>
                            <p>Kelola pesanan & transaksi</p>
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

                <a href="{{ route('dashboard.gudang') }}" class="menu-link">
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

                <a href="{{ route('dashboard.pengiriman') }}" class="menu-link">
                    <div class="menu-item active">
                        <div class="icon-box active-bg"><i class="fa-solid fa-truck-fast"></i></div>
                        <div class="menu-text">
                            <h4>Pengiriman</h4>
                            <p>Status kurir & logistik</p>
                        </div>
                    </div>
                </a>

                <a href="{{ route('dashboard.keuangan') }}" class="menu-link">
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
