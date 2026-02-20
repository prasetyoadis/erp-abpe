@extends('layouts.app')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/dashboard/keuangan.css') }}">

    <div class="admin-layout">
        <aside class="sidebar">
            <div class="sidebar__header">
                <svg class="sidebar__logo-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <polygon points="3 11 22 2 13 21 11 13 3 11"></polygon>
                </svg>
                <h1 class="sidebar__title">ABPE WebApp</h1>
            </div>
            <nav class="sidebar__nav">
                <a href="{{ route('dashboard.index') }}"
                    class="sidebar__link {{ request()->routeIs('dashboard.index') ? 'sidebar__link--active' : '' }}">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <rect x="3" y="3" width="7" height="7"></rect>
                        <rect x="14" y="3" width="7" height="7"></rect>
                        <rect x="14" y="14" width="7" height="7"></rect>
                        <rect x="3" y="14" width="7" height="7"></rect>
                    </svg>
                    Dashboard
                </a>

                <a href="{{ route('dashboard.penjualan') }}"
                    class="sidebar__link {{ request()->routeIs('dashboard.penjualan') ? 'sidebar__link--active' : '' }}">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <polyline points="9 11 12 14 22 4"></polyline>
                        <path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path>
                    </svg>
                    Penjualan
                </a>

                <a href="{{ route('dashboard.produksi') }}"
                    class="sidebar__link {{ request()->routeIs('dashboard.produksi') ? 'sidebar__link--active' : '' }}">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <rect x="2" y="7" width="20" height="14" rx="2" ry="2"></rect>
                        <path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"></path>
                    </svg>
                    Produksi
                </a>

                <a href="{{ route('dashboard.gudang') }}"
                    class="sidebar__link {{ request()->routeIs('dashboard.gudang') ? 'sidebar__link--active' : '' }}">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path
                            d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z">
                        </path>
                        <polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline>
                        <line x1="12" y1="22.08" x2="12" y2="12"></line>
                    </svg>
                    Gudang
                </a>

                <a href="{{ route('dashboard.qc') }}"
                    class="sidebar__link {{ request()->routeIs('dashboard.qc') ? 'sidebar__link--active' : '' }}">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                        <polyline points="22 4 12 14.01 9 11.01"></polyline>
                    </svg>
                    QC
                </a>

                <a href="{{ route('dashboard.pengiriman') }}"
                    class="sidebar__link {{ request()->routeIs('dashboard.pengiriman') ? 'sidebar__link--active' : '' }}">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <rect x="1" y="3" width="15" height="13"></rect>
                        <polygon points="16 8 20 8 23 11 23 16 16 16 16 8"></polygon>
                        <circle cx="5.5" cy="18.5" r="2.5"></circle>
                        <circle cx="18.5" cy="18.5" r="2.5"></circle>
                    </svg>
                    Pengiriman
                </a>

                <a href="{{ route('dashboard.keuangan') }}"
                    class="sidebar__link {{ request()->routeIs('dashboard.keuangan') ? 'sidebar__link--active' : '' }}">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <line x1="12" y1="1" x2="12" y2="23"></line>
                        <path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path>
                    </svg>
                    Keuangan
                </a>

                <a href="{{ route('dashboard.hr') }}"
                    class="sidebar__link {{ request()->routeIs('dashboard.hr') ? 'sidebar__link--active' : '' }}">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                        <circle cx="12" cy="7" r="4"></circle>
                    </svg>
                    HR
                </a>
            </nav>
        </aside>

        <main class="main-content">
            <header class="topbar">
                <div class="topbar__search">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <circle cx="11" cy="11" r="8"></circle>
                        <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                    </svg>
                    <input type="text" placeholder="Cari..." class="topbar__search-input">
                </div>
                <div class="topbar__actions">
                    <button class="topbar__notif">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path>
                            <path d="M13.73 21a2 2 0 0 1-3.46 0"></path>
                        </svg>
                        <span class="topbar__badge">3</span>
                    </button>
                    <div class="topbar__profile">
                        <img src="https://ui-avatars.com/api/?name=Andi+Admin&background=EBF4FF&color=3b82f6"
                            alt="User" class="profile__avatar">
                        <span class="profile__name">Andi <span class="profile__role">• Admin</span></span>
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            class="profile__chevron">
                            <polyline points="6 9 12 15 18 9"></polyline>
                        </svg>
                    </div>
                </div>
            </header>

            <div class="page-container">
                <div class="page-header">
                    <h2 class="page-title">Keuangan</h2>
                    <button class="btn btn--primary" id="btnTambahTransaksi">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <line x1="12" y1="5" x2="12" y2="19"></line>
                            <line x1="5" y1="12" x2="19" y2="12"></line>
                        </svg>
                        Tambah Transaksi
                    </button>
                </div>

                <section class="summary-cards">
                    <div class="card summary-card">
                        <div class="summary-card__header">
                            <h3 class="summary-card__title">Pendapatan</h3>
                            <div class="summary-card__icon bg-primary-light text-primary">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <rect x="2" y="6" width="20" height="12" rx="2"></rect>
                                    <circle cx="12" cy="12" r="2"></circle>
                                    <path d="M6 12h.01M18 12h.01"></path>
                                </svg>
                            </div>
                        </div>
                        <p class="summary-card__value" id="valPendapatan">Rp 0</p>
                        <div class="summary-card__footer">
                            <span class="trend-badge text-success">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <polyline points="20 6 9 17 4 12"></polyline>
                                </svg>
                                18% dari Total
                            </span>
                        </div>
                    </div>

                    <div class="card summary-card">
                        <div class="summary-card__header">
                            <h3 class="summary-card__title">Pengeluaran</h3>
                            <div class="summary-card__icon bg-warning-light text-warning">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path
                                        d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z">
                                    </path>
                                    <polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline>
                                    <line x1="12" y1="22.08" x2="12" y2="12"></line>
                                </svg>
                            </div>
                        </div>
                        <p class="summary-card__value" id="valPengeluaran">Rp 0</p>
                        <div class="summary-card__footer summary-card__footer--progress">
                            <span class="trend-badge text-warning" style="margin-bottom:4px; display:inline-block;"><svg
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <polyline points="23 6 13.5 15.5 8.5 10.5 1 18"></polyline>
                                    <polyline points="17 6 23 6 23 12"></polyline>
                                </svg> 29%</span>
                            <div class="progress-bar">
                                <div class="progress-bar__fill bg-warning" id="barPengeluaran" style="width: 0%"
                                    data-target="29%"></div>
                            </div>
                        </div>
                    </div>

                    <div class="card summary-card">
                        <div class="summary-card__header">
                            <h3 class="summary-card__title">Laba Bersih</h3>
                            <div class="summary-card__icon bg-success-light text-success">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>
                                    <path d="M21 8a2 2 0 0 0-2-2H6l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>
                                </svg>
                            </div>
                        </div>
                        <p class="summary-card__value" id="valLaba">Rp 0</p>
                        <div class="summary-card__footer summary-card__footer--progress">
                            <div class="progress-bar">
                                <div class="progress-bar__fill bg-success" id="barLaba" style="width: 0%"
                                    data-target="100%"></div>
                            </div>
                        </div>
                    </div>

                    <div class="card summary-card">
                        <div class="summary-card__header">
                            <h3 class="summary-card__title">Piutang Belum Lunas</h3>
                            <div class="summary-card__icon bg-danger-light text-danger">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <circle cx="12" cy="12" r="10"></circle>
                                    <line x1="12" y1="8" x2="12" y2="12"></line>
                                    <line x1="12" y1="16" x2="12.01" y2="16"></line>
                                </svg>
                            </div>
                        </div>
                        <p class="summary-card__value" id="valPiutang">Rp 0</p>
                        <div class="summary-card__footer">
                            <span class="badge-alert bg-danger-light text-danger">Segera Tagih</span>
                        </div>
                    </div>
                </section>

                <section class="card table-section">
                    <div class="table-header">
                        <h3 class="section-title">Laporan Ringkas</h3>
                        <div class="table-header-actions">
                            <select class="form-select select-small">
                                <option>Bulan Ini</option>
                            </select>
                            <button class="btn btn--outline btn--small">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                                    <polyline points="7 10 12 15 17 10"></polyline>
                                    <line x1="12" y1="15" x2="12" y2="3"></line>
                                </svg>
                                Export
                            </button>
                        </div>
                    </div>

                    <div class="table-toolbar">
                        <div class="table-filters">
                            <span class="filter-label text-muted">All Status <span class="filter-count"
                                    id="filterCount">0</span></span>

                            <div class="select-wrapper">
                                <select class="form-select" id="filterJenis">
                                    <option value="Semua">Semua Jenis</option>
                                    <option value="Pemasukan">Pemasukan</option>
                                    <option value="Pengeluaran">Pengeluaran</option>
                                </select>
                            </div>

                            <div class="select-wrapper">
                                <select class="form-select" id="filterKategori">
                                    <option value="Semua">Semua Kategori</option>
                                    <option value="Penjualan Produk">Penjualan Produk</option>
                                    <option value="Bahan Baku">Bahan Baku</option>
                                    <option value="Operasional">Operasional</option>
                                    <option value="Gaji Karyawan">Gaji Karyawan</option>
                                </select>
                            </div>

                            <div class="select-wrapper">
                                <select class="form-select" id="filterStatus">
                                    <option value="Semua">Semua Status</option>
                                    <option value="Lunas">Lunas</option>
                                    <option value="Pending">Pending</option>
                                </select>
                            </div>

                            <div class="date-wrapper">
                                <input type="text" class="form-input" id="filterDate"
                                    placeholder="Mulai Tanggal - Sampai Tanggal" readonly>
                            </div>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="data-table">
                            <thead>
                                <tr>
                                    <th>Tanggal</th>
                                    <th>ID Transaksi</th>
                                    <th>Deskripsi</th>
                                    <th>Jenis</th>
                                    <th>Kategori</th>
                                    <th>Status</th>
                                    <th>Nominal</th>
                                    <th>Lokasi</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody id="transactionTableBody">
                            </tbody>
                        </table>
                    </div>

                    <div class="pagination-container">
                        <div class="pagination-info" id="paginationInfo">1-8 dari 0</div>
                        <div class="pagination-controls" id="paginationControls">
                        </div>
                    </div>
                </section>
            </div>
        </main>
    </div>

    <script src="{{ asset('js/dashboard/keuangan.js') }}"></script>
@endsection
