<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengiriman - ABPE WebApp</title>
    <link rel="stylesheet" href="{{ asset('css/dashboard/pengiriman.css') }}">
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
                    </svg>
                    Dashboard
                </a>
                <a href="{{ route('dashboard.penjualan') }}"
                    class="sidebar__item {{ request()->routeIs('dashboard.penjualan') ? 'sidebar__link--active' : '' }}">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2">
                        <polyline points="9 11 12 14 22 4"></polyline>
                        <path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path>
                    </svg>
                    Penjualan
                </a>
                <a href="{{ route('dashboard.produksi') }}"
                    class="sidebar__item {{ request()->routeIs('dashboard.produksi') ? 'sidebar__link--active' : '' }}">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2">
                        <rect x="2" y="7" width="20" height="14" rx="2" ry="2"></rect>
                        <path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"></path>
                    </svg>
                    Produksi
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
                    </svg>
                    Gudang
                </a>
                <a href="{{ route('dashboard.qc') }}"
                    class="sidebar__item {{ request()->routeIs('dashboard.qc') ? 'sidebar__link--active' : '' }}">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2">
                        <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                        <polyline points="22 4 12 14.01 9 11.01"></polyline>
                    </svg>
                    QC
                </a>
                <a href="{{ route('dashboard.pengiriman') }}"
                    class="sidebar__item {{ request()->routeIs('dashboard.pengiriman') ? 'sidebar__link--active' : '' }}">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2">
                        <rect x="1" y="3" width="15" height="13"></rect>
                        <polygon points="16 8 20 8 23 11 23 16 16 16 16 8"></polygon>
                        <circle cx="5.5" cy="18.5" r="2.5"></circle>
                        <circle cx="18.5" cy="18.5" r="2.5"></circle>
                    </svg>
                    Pengiriman
                </a>
                <a href="{{ route('dashboard.keuangan') }}"
                    class="sidebar__item {{ request()->routeIs('dashboard.keuangan') ? 'sidebar__link--active' : '' }}">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2">
                        <line x1="12" y1="1" x2="12" y2="23"></line>
                        <path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path>
                    </svg>
                    Keuangan
                </a>
                <a href="{{ route('dashboard.hr') }}"
                    class="sidebar__item {{ request()->routeIs('dashboard.hr') ? 'sidebar__link--active' : '' }}">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2">
                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                        <circle cx="12" cy="7" r="4"></circle>
                    </svg>
                    HR
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

            <div class="topbar__right">
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
                        alt="User Avatar" class="user__avatar">
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
                <h1 class="page-title">Pengiriman</h1>
                <button class="btn btn--primary" id="btnTambahPengiriman">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2">
                        <line x1="12" y1="5" x2="12" y2="19"></line>
                        <line x1="5" y1="12" x2="19" y2="12"></line>
                    </svg>
                    Tambah Pengiriman
                </button>
            </div>

            <div class="summary-grid">
                <div class="summary-card">
                    <div class="summary-card__header">
                        <span class="summary-card__title">Total Terkirim</span>
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#2B78E4"
                            stroke-width="2">
                            <rect x="1" y="3" width="15" height="13"></rect>
                            <polygon points="16 8 20 8 23 11 23 16 16 16 16 8"></polygon>
                            <circle cx="5.5" cy="18.5" r="2.5"></circle>
                            <circle cx="18.5" cy="18.5" r="2.5"></circle>
                        </svg>
                    </div>
                    <div class="summary-card__value">98</div>
                    <div class="progress-bar">
                        <div class="progress-bar__fill bg-blue" style="width: 75%"></div>
                    </div>
                </div>

                <div class="summary-card">
                    <div class="summary-card__header">
                        <span class="summary-card__title">Lolos QC</span>
                        <div class="icon-circle bg-green-light"><svg width="14" height="14"
                                viewBox="0 0 24 24" fill="none" stroke="#10B981" stroke-width="3">
                                <polyline points="20 6 9 17 4 12"></polyline>
                            </svg></div>
                    </div>
                    <div class="summary-card__value">14</div>
                    <div class="summary-card__subtitle text-green">
                        <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2">
                            <polyline points="20 6 9 17 4 12"></polyline>
                        </svg> 67% dari Total WO
                    </div>
                </div>

                <div class="summary-card">
                    <div class="summary-card__header">
                        <span class="summary-card__title">Tidak Lolos QC</span>
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#F59E0B"
                            stroke-width="2">
                            <path
                                d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z">
                            </path>
                        </svg>
                    </div>
                    <div class="summary-card__value">72</div>
                    <div class="progress-bar">
                        <div class="progress-bar__fill bg-orange" style="width: 85%"></div>
                    </div>
                </div>

                <div class="summary-card">
                    <div class="summary-card__header">
                        <span class="summary-card__title">Pending QC</span>
                        <div class="icon-circle bg-red-light"><svg width="14" height="14" viewBox="0 0 24 24"
                                fill="none" stroke="#EF4444" stroke-width="3">
                                <line x1="12" y1="8" x2="12" y2="12"></line>
                                <line x1="12" y1="16" x2="12.01" y2="16"></line>
                            </svg></div>
                    </div>
                    <div class="summary-card__value">6</div>
                    <div class="progress-bar">
                        <div class="progress-bar__fill bg-red" style="width: 15%"></div>
                    </div>
                </div>
            </div>

            <div class="table-section">
                <div class="table-header">
                    <h2 class="table-title">Daftar Pengiriman</h2>
                    <div class="table-actions">
                        <button class="btn btn--outline" id="btnFilter">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="2">
                                <polygon points="22 3 2 3 10 12.46 10 19 14 21 14 12.46 22 3"></polygon>
                            </svg>
                            Filter
                        </button>
                        <button class="btn btn--outline" id="btnExport">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="2">
                                <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                                <polyline points="7 10 12 15 17 10"></polyline>
                                <line x1="12" y1="15" x2="12" y2="3"></line>
                            </svg>
                            Export
                        </button>
                    </div>
                </div>

                <div class="table-controls">
                    <div class="filter-dropdown">
                        <span class="text-muted">Pengiriman : 98</span>
                        <select class="select-input" id="filterStatusDropdown">
                            <option value="Semua">Semua</option>
                            <option value="Selesai">Selesai</option>
                            <option value="Dalam Perjalanan">Dalam Perjalanan</option>
                            <option value="QC Tertunda">QC Tertunda</option>
                        </select>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="data-table" id="pengirimanTable">
                        <thead>
                            <tr>
                                <th>Nomor Pengiriman</th>
                                <th>Order ID</th>
                                <th>Customer</th>
                                <th>Tanggal Kirim</th>
                                <th>Status</th>
                                <th>Lokasi Tujuan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="tableBody">
                        </tbody>
                    </table>
                </div>

                <div class="pagination-wrapper">
                    <div class="pagination-info" id="paginationInfo">1-8 dari 98</div>
                    <div class="pagination-controls" id="paginationControls">
                    </div>
                </div>
            </div>
        </main>
    </div>
    <!-- Modal Tambah Pengiriman -->
<div class="modal-overlay" id="modalTambahPengiriman">
    <div class="modal-wrapper">

        <!-- Header -->
        <div class="modal-header">
            <h3 class="modal-title">Tambah Pengiriman</h3>
            <button class="modal-close" id="closePengirimanModal">
                ✕
            </button>
        </div>

        <!-- Body -->
        <div class="modal-body">

            <div class="form-grid">

                <!-- Order -->
                <div class="form-group full-width">
                    <label class="form-label">
                        Order ID <span class="text-danger">*</span>
                    </label>
                    <select class="form-control" id="salesOrderSelect">
                        <option value="">Pilih Sales Order</option>
                        <option value="1" data-customer="PT Maju Sejahtera">
                            #SO-013
                        </option>
                        <option value="2" data-customer="CV Hasta Karya">
                            #SO-012
                        </option>
                    </select>
                </div>

                <!-- Customer -->
                <div class="form-group full-width">
                    <label class="form-label">
                        Customer <span class="text-danger">*</span>
                    </label>
                    <select class="form-control" id="customerSelect">
                        <option value="">Pilih Customer</option>
                        <option value="1">PT Maju Sejahtera</option>
                        <option value="2">CV Hasta Karya</option>
                        <option value="3">PT Makmur Bersama</option>
                    </select>
                </div>

                <!-- Tanggal Kirim -->
                <div class="form-group">
                    <label class="form-label">
                        Tanggal Kirim <span class="text-danger">*</span>
                    </label>
                    <input type="date" class="form-control" id="tanggalKirim">
                </div>

                <!-- Status -->
                <div class="form-group">
                    <label class="form-label">Status</label>
                    <select class="form-control" id="statusPengiriman">
                        <option value="diproses">Diproses</option>
                        <option value="dalam_perjalanan">Dalam Perjalanan</option>
                        <option value="selesai">Selesai</option>
                        <option value="tertunda">QC Tertunda</option>
                    </select>
                </div>

                <!-- Lokasi Tujuan -->
                <div class="form-group full-width">
                    <label class="form-label">
                        Lokasi Tujuan <span class="text-danger">*</span>
                    </label>
                    <input type="text" class="form-control" placeholder="Contoh: Surabaya">
                </div>

                <!-- Catatan -->
                <div class="form-group full-width">
                    <label class="form-label">Catatan</label>
                    <textarea class="form-control" rows="3"></textarea>
                </div>

            </div>

        </div>

        <!-- Footer -->
        <div class="modal-footer">
            <button class="btn btn--outline" id="batalPengiriman">
                Batal
            </button>
            <button class="btn btn--primary">
                Simpan Pengiriman
            </button>
        </div>

    </div>
</div>
    <script src="{{ asset('js/dashboard/pengiriman.js') }}"></script>
</body>

</html>
