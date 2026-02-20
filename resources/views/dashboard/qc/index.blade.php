<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QC - ABPE WebApp</title>
    <link rel="stylesheet" href="{{ asset('css/dashboard/qc.css') }}">
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
                    class="sidebar__item {{ request()->routeIs('dashboard.index') ? 'sidebar__item--active' : '' }}">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2">
                        <rect x="3" y="3" width="7" height="7"></rect>
                        <rect x="14" y="3" width="7" height="7"></rect>
                        <rect x="14" y="14" width="7" height="7"></rect>
                        <rect x="3" y="14" width="7" height="7"></rect>
                    </svg> Dashboard
                </a>

                <a href="{{ route('dashboard.penjualan') }}"
                    class="sidebar__item {{ request()->routeIs('dashboard.penjualan') ? 'sidebar__item--active' : '' }}">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2">
                        <polyline points="9 11 12 14 22 4"></polyline>
                        <path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path>
                    </svg> Penjualan
                </a>

                <a href="{{ route('dashboard.produksi') }}"
                    class="sidebar__item {{ request()->routeIs('dashboard.produksi') ? 'sidebar__item--active' : '' }}">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2">
                        <rect x="2" y="7" width="20" height="14" rx="2" ry="2"></rect>
                        <path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"></path>
                    </svg> Produksi
                </a>

                <a href="{{ route('dashboard.gudang') }}"
                    class="sidebar__item {{ request()->routeIs('dashboard.gudang') ? 'sidebar__item--active' : '' }}">
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
                    class="sidebar__item {{ request()->routeIs('dashboard.qc') ? 'sidebar__item--active' : '' }}">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2">
                        <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                        <polyline points="22 4 12 14.01 9 11.01"></polyline>
                    </svg> QC
                </a>

                <a href="{{ route('dashboard.pengiriman') }}"
                    class="sidebar__item {{ request()->routeIs('dashboard.pengiriman') ? 'sidebar__item--active' : '' }}">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2">
                        <rect x="1" y="3" width="15" height="13"></rect>
                        <polygon points="16 8 20 8 23 11 23 16 16 16 16 8"></polygon>
                        <circle cx="5.5" cy="18.5" r="2.5"></circle>
                        <circle cx="18.5" cy="18.5" r="2.5"></circle>
                    </svg> Pengiriman
                </a>

                <a href="{{ route('dashboard.keuangan') }}"
                    class="sidebar__item {{ request()->routeIs('dashboard.keuangan') ? 'sidebar__item--active' : '' }}">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2">
                        <line x1="12" y1="1" x2="12" y2="23"></line>
                        <path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path>
                    </svg> Keuangan
                </a>

                <a href="{{ route('dashboard.hr') }}"
                    class="sidebar__item {{ request()->routeIs('dashboard.hr') ? 'sidebar__item--active' : '' }}">
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
                <h1 class="page-title">QC</h1>
                <button class="btn btn--primary" id="btnTambahQC">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2">
                        <line x1="12" y1="5" x2="12" y2="19"></line>
                        <line x1="5" y1="12" x2="19" y2="12"></line>
                    </svg>
                    Tambah QC
                </button>
            </div>

            <div class="summary-grid">
                <div class="summary-card">
                    <div class="summary-card__header">
                        <span class="summary-card__title">Total Work Order</span>
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#2B78E4"
                            stroke-width="2">
                            <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                            <polyline points="14 2 14 8 20 8"></polyline>
                            <line x1="16" y1="13" x2="8" y2="13"></line>
                            <line x1="16" y1="17" x2="8" y2="17"></line>
                            <polyline points="10 9 9 9 8 9"></polyline>
                        </svg>
                    </div>
                    <div class="summary-card__value" id="valTotalWO">18</div>
                    <div class="progress-bar">
                        <div class="progress-bar__fill bg-primary" id="barTotalWO" style="width: 100%"></div>
                    </div>
                </div>

                <div class="summary-card">
                    <div class="summary-card__header">
                        <span class="summary-card__title">Lolos QC</span>
                        <div class="icon-circle bg-success-light"><svg width="14" height="14"
                                viewBox="0 0 24 24" fill="none" stroke="#10B981" stroke-width="3">
                                <polyline points="20 6 9 17 4 12"></polyline>
                            </svg></div>
                    </div>
                    <div class="summary-card__value" id="valLolosQC">12</div>
                    <div class="summary-card__subtitle text-success" id="subLolosQC">
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
                                d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z">
                            </path>
                            <line x1="12" y1="9" x2="12" y2="13"></line>
                            <line x1="12" y1="17" x2="12.01" y2="17"></line>
                        </svg>
                    </div>
                    <div class="summary-card__value" id="valTidakLolos">2</div>
                    <div class="progress-bar">
                        <div class="progress-bar__fill bg-warning" id="barTidakLolos" style="width: 0%"></div>
                    </div>
                </div>

                <div class="summary-card">
                    <div class="summary-card__header">
                        <span class="summary-card__title">Stok Tertunda</span>
                        <div class="icon-circle bg-danger-light"><svg width="14" height="14"
                                viewBox="0 0 24 24" fill="none" stroke="#EF4444" stroke-width="3">
                                <line x1="12" y1="8" x2="12" y2="12"></line>
                                <line x1="12" y1="16" x2="12.01" y2="16"></line>
                            </svg></div>
                    </div>
                    <div class="summary-card__value" id="valStokTertunda">4</div>
                    <div class="progress-bar">
                        <div class="progress-bar__fill bg-danger" id="barStokTertunda" style="width: 0%"></div>
                    </div>
                </div>
            </div>

            <div class="content-card">
                <div class="table-header">
                    <h2 class="table-title">Daftar QC</h2>
                    <button class="btn btn--outline" id="btnFilterTrigger">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2">
                            <polygon points="22 3 2 3 10 12.46 10 19 14 21 14 12.46 22 3"></polygon>
                        </svg>
                        Filter
                    </button>
                </div>

                <div class="filters-row">
                    <div class="filter-group">
                        <label class="filter-label">Status</label>
                        <select class="filter-input" id="filterStatus">
                            <option value="Semua">Semua</option>
                            <option value="Lolos QC">Lolos QC</option>
                            <option value="Tidak Lolos QC">Tidak Lolos QC</option>
                            <option value="QC Tertunda">QC Tertunda</option>
                            <option value="Stok Kritis">Stok Kritis</option>
                        </select>
                    </div>
                    <div class="filter-group">
                        <label class="filter-label">Mesin</label>
                        <select class="filter-input" id="filterMesin">
                            <option value="Semua">Semua</option>
                            <option value="A1">A1</option>
                            <option value="A2">A2</option>
                            <option value="B1">B1</option>
                            <option value="C2">C2</option>
                            <option value="D4">D4</option>
                        </select>
                    </div>
                    <div class="filter-group">
                        <label class="filter-label">&nbsp;</label>
                        <input type="text" class="filter-input" placeholder="Mulai Tanggal - Sampai Tanggal"
                            readonly>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="data-table">
                        <thead>
                            <tr>
                                <th>WO ID :</th>
                                <th>Work Order</th>
                                <th>Mesin</th>
                                <th>Produksi :</th>
                                <th>Status QC</th>
                                <th>Aksi</th>
                                <th>Gudang</th>
                            </tr>
                        </thead>
                        <tbody id="tableBodyQC">
                        </tbody>
                    </table>
                </div>

                <div class="pagination-section">
                    <div class="pagination-info" id="paginationInfo">1-6 dari 16</div>
                    <div class="pagination-controls" id="paginationControls">
                    </div>
                </div>
            </div>
        </main>
    </div>

    <script src="{{ asset('js/dashboard/qc.js') }}"></script>
</body>

</html>
