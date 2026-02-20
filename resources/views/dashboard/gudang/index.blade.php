<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gudang - ABPE WebApp</title>
    <link rel="stylesheet" href="{{ asset('css/dashboard/gudang.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
</head>

<body>
    <div class="app-layout">
        <aside class="sidebar">
            <div class="sidebar__brand">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#2B78E4" stroke-width="2"
                    stroke-linecap="round" stroke-linejoin="round">
                    <polygon points="3 11 22 2 13 21 11 13 3 11"></polygon>
                </svg>
                <span>ABPE WebApp</span>
            </div>
            <nav class="sidebar__menu">
                <a href="{{ route('dashboard.index') }}"
                    class="sidebar__item {{ request()->routeIs('dashboard.index') ? 'sidebar__link--active' : '' }}">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2">
                        <rect x="3" y="3" width="7" height="7"></rect>
                        <rect x="14" y="3" width="7" height="7"></rect>
                        <rect x="14" y="14" width="7" height="7"></rect>
                        <rect x="3" y="14" width="7" height="7"></rect>
                    </svg> Dashboard
                </a>

                <a href="{{ route('dashboard.penjualan') }}"
                    class="sidebar__item {{ request()->routeIs('dashboard.penjualan') ? 'sidebar__link--active' : '' }}">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2">
                        <polyline points="9 11 12 14 22 4"></polyline>
                        <path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path>
                    </svg> Penjualan
                </a>

                <a href="{{ route('dashboard.produksi') }}"
                    class="sidebar__item {{ request()->routeIs('dashboard.produksi') ? 'sidebar__link--active' : '' }}">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2">
                        <rect x="2" y="7" width="20" height="14" rx="2" ry="2"></rect>
                        <path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"></path>
                    </svg> Produksi
                </a>

                <a href="{{ route('dashboard.gudang') }}"
                    class="sidebar__item {{ request()->routeIs('dashboard.gudang') ? 'sidebar__link--active' : '' }}">
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
                    class="sidebar__item {{ request()->routeIs('dashboard.qc') ? 'sidebar__link--active' : '' }}">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2">
                        <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                        <polyline points="22 4 12 14.01 9 11.01"></polyline>
                    </svg> QC
                </a>

                <a href="{{ route('dashboard.pengiriman') }}"
                    class="sidebar__item {{ request()->routeIs('dashboard.pengiriman') ? 'sidebar__link--active' : '' }}">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2">
                        <rect x="1" y="3" width="15" height="13"></rect>
                        <polygon points="16 8 20 8 23 11 23 16 16 16 16 8"></polygon>
                        <circle cx="5.5" cy="18.5" r="2.5"></circle>
                        <circle cx="18.5" cy="18.5" r="2.5"></circle>
                    </svg> Pengiriman
                </a>

                <a href="{{ route('dashboard.keuangan') }}"
                    class="sidebar__item {{ request()->routeIs('dashboard.keuangan') ? 'sidebar__link--active' : '' }}">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2">
                        <line x1="12" y1="1" x2="12" y2="23"></line>
                        <path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path>
                    </svg> Keuangan
                </a>

                <a href="{{ route('dashboard.hr') }}"
                    class="sidebar__item {{ request()->routeIs('dashboard.hr') ? 'sidebar__link--active' : '' }}">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2">
                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                        <circle cx="12" cy="7" r="4"></circle>
                    </svg> HR
                </a>
            </nav>
        </aside>

        <header class="topbar">
            <div class="topbar__search">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#94A3B8"
                    stroke-width="2">
                    <circle cx="11" cy="11" r="8"></circle>
                    <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                </svg>
                <input type="text" placeholder="Cari..." aria-label="Search">
            </div>

            <div class="topbar__actions">
                <button class="topbar__notif" aria-label="Notifications">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2">
                        <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path>
                        <path d="M13.73 21a2 2 0 0 1-3.46 0"></path>
                    </svg>
                    <span class="topbar__badge">2</span>
                </button>
                <div class="topbar__user">
                    <img src="https://ui-avatars.com/api/?name=Andi+Admin&background=EBF4FF&color=2B78E4"
                        alt="Andi Admin" class="user__avatar">
                    <div class="user__info">
                        <span class="user__name">Andi <span class="user__role">• Admin</span></span>
                    </div>
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#64748B"
                        stroke-width="2">
                        <polyline points="6 9 12 15 18 9"></polyline>
                    </svg>
                </div>
            </div>
        </header>

        <main class="main-content">
            <div class="page-header">
                <h1 class="page-title">Gudang</h1>
                <button class="btn btn--primary" id="btnTambahStok">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2">
                        <line x1="12" y1="5" x2="12" y2="19"></line>
                        <line x1="5" y1="12" x2="19" y2="12"></line>
                    </svg>
                    Tambah Stok Baru
                </button>
            </div>

            <div class="summary-grid">
                <div class="summary-card">
                    <div class="summary-card__header">
                        <span class="summary-card__title">Total SKU</span>
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#2B78E4"
                            stroke-width="2">
                            <path
                                d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z">
                            </path>
                            <polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline>
                            <line x1="12" y1="22.08" x2="12" y2="12"></line>
                        </svg>
                    </div>
                    <div class="summary-card__value" id="valTotalSKU">0</div>
                    <div class="progress-bar">
                        <div class="progress-bar__fill bg-primary" style="width: 100%"></div>
                    </div>
                </div>

                <div class="summary-card">
                    <div class="summary-card__header">
                        <span class="summary-card__title">Total Stok</span>
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#2B78E4"
                            stroke-width="2">
                            <rect x="2" y="7" width="20" height="14" rx="2" ry="2"></rect>
                            <path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"></path>
                        </svg>
                    </div>
                    <div class="summary-card__value"><span id="valTotalStok">0</span> <span
                            style="font-size:14px; font-weight:500;">pcs</span></div>
                    <div class="summary-card__subtitle" id="valTotalNilai">Rp 0</div>
                </div>

                <div class="summary-card">
                    <div class="summary-card__header">
                        <span class="summary-card__title">Stok Rendah</span>
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#F59E0B"
                            stroke-width="2">
                            <path
                                d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z">
                            </path>
                            <line x1="12" y1="9" x2="12" y2="13"></line>
                            <line x1="12" y1="17" x2="12.01" y2="17"></line>
                        </svg>
                    </div>
                    <div class="summary-card__value" id="valStokRendah">0</div>
                    <div class="progress-bar">
                        <div class="progress-bar__fill bg-warning" id="barStokRendah" style="width: 0%"></div>
                    </div>
                </div>

                <div class="summary-card">
                    <div class="summary-card__header">
                        <span class="summary-card__title">Stok Kritis</span>
                        <div class="icon-circle"><svg width="14" height="14" viewBox="0 0 24 24"
                                fill="none" stroke="#EF4444" stroke-width="3">
                                <circle cx="12" cy="12" r="10"></circle>
                                <line x1="12" y1="8" x2="12" y2="12"></line>
                                <line x1="12" y1="16" x2="12.01" y2="16"></line>
                            </svg></div>
                    </div>
                    <div class="summary-card__value" id="valStokKritis">0</div>
                    <div class="progress-bar">
                        <div class="progress-bar__fill bg-danger" id="barStokKritis" style="width: 0%"></div>
                    </div>
                </div>
            </div>

            <div class="overview-grid">
                <div class="card chart-card">
                    <div class="card__header">
                        <h2 class="card__title">Overview Stok</h2>
                        <select class="select-input select-input--small">
                            <option>6 Bulan Terakhir</option>
                        </select>
                    </div>
                    <div class="chart-wrapper">
                        <div class="chart-value-display">
                            <span class="chart-label">Nilai Stok (Rp)</span>
                            <h3 class="chart-total-value" id="chartTotalValue">Rp 0</h3>
                        </div>

                        <div class="css-chart" id="overviewChart">
                            <div class="css-chart__y-axis">
                                <span>30.000.000</span>
                                <span>22.000.000</span>
                                <span>12.000.000</span>
                                <span>0</span>
                            </div>
                            <div class="css-chart__bars" id="chartBarsContainer">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card movements-card">
                    <div class="card__header">
                        <h2 class="card__title">Pergerakan Stok Terakhir</h2>
                        <button class="btn btn--outline btn--small">
                            <svg width="12" height="12" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="2">
                                <polygon points="22 3 2 3 10 12.46 10 19 14 21 14 12.46 22 3"></polygon>
                            </svg> Filter
                        </button>
                    </div>
                    <div class="movement-list">
                        <div class="movement-item">
                            <div class="movement-icon bg-success-light text-success">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="2">
                                    <rect x="2" y="7" width="20" height="14" rx="2" ry="2">
                                    </rect>
                                    <path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"></path>
                                </svg>
                            </div>
                            <div class="movement-details">
                                <h4>Produk Masuk</h4>
                                <p>PT Sentosa - 710 pcs</p>
                            </div>
                            <div class="movement-date">19 Feb 2026</div>
                        </div>
                        <div class="movement-item">
                            <div class="movement-icon bg-danger-light text-danger">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="2">
                                    <path
                                        d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z">
                                    </path>
                                    <polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline>
                                    <line x1="12" y1="22.08" x2="12" y2="12"></line>
                                </svg>
                            </div>
                            <div class="movement-details">
                                <h4>Produk Keluar</h4>
                                <p>Bahan Produksi</p>
                            </div>
                            <div class="movement-date">19 Feb 2026</div>
                        </div>
                        <div class="movement-item">
                            <div class="movement-icon bg-primary-light text-primary">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="2">
                                    <path
                                        d="M8 3H5a2 2 0 0 0-2 2v3m18 0V5a2 2 0 0 0-2-2h-3m0 18h3a2 2 0 0 0 2-2v-3M3 16v3a2 2 0 0 0 2 2h3">
                                    </path>
                                </svg>
                            </div>
                            <div class="movement-details">
                                <h4>Mutasi Stok</h4>
                                <p>UD Makmur Jaya</p>
                            </div>
                            <div class="movement-date">18 Feb 2026</div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card table-card">
                <div class="table-header-toolbar">
                    <h2 class="card__title">Daftar Stok</h2>
                    <div class="table-tabs" id="inventoryTabs">
                        <button class="tab-btn tab-btn--active" data-filter="all">All Status</button>
                        <button class="tab-btn" data-filter="rendah">Stok Rendah</button>
                        <button class="tab-btn" data-filter="kritis">Stok Kritis</button>
                    </div>
                    <div class="table-actions">
                        <button class="btn btn--outline btn--small">
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="2">
                                <polygon points="22 3 2 3 10 12.46 10 19 14 21 14 12.46 22 3"></polygon>
                            </svg> Filter
                        </button>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="data-table">
                        <thead>
                            <tr>
                                <th>Kode Item</th>
                                <th>Nama Produk</th>
                                <th>SKU</th>
                                <th>Stok Saat Ini <svg width="12" height="12" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2">
                                        <polyline points="6 9 12 15 18 9"></polyline>
                                    </svg></th>
                                <th>Stok Minimum</th>
                                <th>Nilai Stok</th>
                                <th>Status</th>
                                <th>Lokasi Gudang</th>
                            </tr>
                        </thead>
                        <tbody id="inventoryTableBody">
                        </tbody>
                    </table>
                </div>

                <div class="pagination-wrapper">
                    <div class="pagination-controls" id="paginationControls">
                    </div>
                </div>
            </div>
        </main>
    </div>

    <script src="{{ asset('js/dashboard/gudang.js') }}"></script>
</body>

</html>
