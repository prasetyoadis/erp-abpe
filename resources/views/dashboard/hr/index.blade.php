@extends('layouts.app')

@section('title', 'HR - ABPE WebApp')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/dashboard/hr.css') }}">
@endpush

@section('content')
    <main class="main-content">
        <div class="page-container">
            <div class="page-header">
                <h2 class="page-title">Karyawan</h2>
                <button class="btn btn--primary" id="btnTambahKaryawan">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="16"
                        height="16">
                        <line x1="12" y1="5" x2="12" y2="19"></line>
                        <line x1="5" y1="12" x2="19" y2="12"></line>
                    </svg>
                    Tambah Karyawan
                </button>
            </div>

            <section class="summary-cards">
                <div class="card summary-card">
                    <div class="summary-card__top">
                        <div class="summary-card__header">
                            <h3 class="summary-card__title">Total Karyawan</h3>
                            <div class="summary-card__icon bg-primary-light text-primary">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    width="18" height="18">
                                    <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                    <circle cx="9" cy="7" r="4"></circle>
                                    <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                                    <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                                </svg>
                            </div>
                        </div>
                        <p class="summary-card__value" id="valTotal">156</p>
                    </div>
                    <div class="summary-card__bottom">
                        <div class="summary-card__footer">
                            <span class="trend-badge text-success">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    width="14" height="14">
                                    <polyline points="23 6 13.5 15.5 8.5 10.5 1 18"></polyline>
                                    <polyline points="17 6 23 6 23 12"></polyline>
                                </svg>
                                +12% bulan ini
                            </span>
                        </div>
                    </div>
                </div>

                <div class="card summary-card">
                    <div class="summary-card__top">
                        <div class="summary-card__header">
                            <h3 class="summary-card__title">Full-Time</h3>
                            <div class="summary-card__icon bg-success-light text-success">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    width="18" height="18">
                                    <rect x="2" y="7" width="20" height="14" rx="2" ry="2"></rect>
                                    <path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"></path>
                                </svg>
                            </div>
                        </div>
                        <p class="summary-card__value" id="valFullTime">124</p>
                    </div>
                    <div class="summary-card__bottom">
                        <div class="summary-card__footer">
                            <span class="trend-badge text-success">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    width="14" height="14">
                                    <polyline points="23 6 13.5 15.5 8.5 10.5 1 18"></polyline>
                                    <polyline points="17 6 23 6 23 12"></polyline>
                                </svg>
                                +26%
                            </span>
                        </div>
                    </div>
                </div>

                <div class="card summary-card">
                    <div class="summary-card__top">
                        <div class="summary-card__header">
                            <h3 class="summary-card__title">Part-Time</h3>
                            <div class="summary-card__icon bg-warning-light text-warning">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    width="18" height="18">
                                    <circle cx="12" cy="12" r="10"></circle>
                                    <polyline points="12 6 12 12 16 14"></polyline>
                                </svg>
                            </div>
                        </div>
                        <p class="summary-card__value" id="valPartTime">24</p>
                    </div>
                    <div class="summary-card__bottom">
                        <div class="summary-card__footer" style="width: 100%;">
                            <div class="progress-bar">
                                <div class="progress-bar__fill bg-warning w-60"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card summary-card">
                    <div class="summary-card__top">
                        <div class="summary-card__header">
                            <h3 class="summary-card__title">On Leave</h3>
                            <div class="summary-card__icon bg-danger-light text-danger">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    width="18" height="18">
                                    <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>
                                </svg>
                            </div>
                        </div>
                        <p class="summary-card__value" id="valOnLeave">8</p>
                    </div>
                    <div class="summary-card__bottom">
                        <div class="summary-card__footer" style="width: 100%;">
                            <div class="progress-bar">
                                <div class="progress-bar__fill bg-danger w-25"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="card table-section">
                <div class="table-toolbar">
                    <div class="table-filters">
                        <span class="filter-label">Karyawan <span class="filter-count" id="filterCount">156</span></span>

                        <div class="select-wrapper">
                            <select class="form-select" id="filterDepartment">
                                <option value="Semua">Semua Departemen</option>
                                <option value="IT">IT</option>
                                <option value="Human Resources">Human Resources</option>
                                <option value="Sales">Sales</option>
                                <option value="Produksi">Produksi</option>
                            </select>
                        </div>

                        <div class="select-wrapper">
                            <select class="form-select" id="filterStatus">
                                <option value="Semua">Semua Status</option>
                                <option value="Full-Time">Full-Time</option>
                                <option value="Part-Time">Part-Time</option>
                                <option value="On Leave">On Leave</option>
                            </select>
                        </div>

                        <div class="search-wrapper">
                            <input type="text" class="form-input" id="searchName" placeholder="Cari nama...">
                        </div>
                    </div>

                    <div class="table-actions">
                        <button class="btn btn--outline">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                width="14" height="14">
                                <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                                <polyline points="7 10 12 15 17 10"></polyline>
                                <line x1="12" y1="15" x2="12" y2="3"></line>
                            </svg>
                            Export
                        </button>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="data-table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nama</th>
                                <th>Posisi</th>
                                <th>Departemen
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        class="icon-sort" width="12" height="12">
                                        <polyline points="6 9 12 15 18 9"></polyline>
                                    </svg>
                                </th>
                                <th>Status</th>
                                <th>Tanggal Gabung</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="employeeTableBody">
                            <tr>
                                <td class="td-id">#EMP-001</td>
                                <td>
                                    <div class="employee-cell">
                                        <img src="https://ui-avatars.com/api/?name=Budi+Santoso&background=eff6ff&color=3b82f6"
                                            class="employee-avatar" alt="Avatar">
                                        <div class="employee-info">
                                            <span class="employee-name">Budi Santoso</span>
                                            <span class="employee-email">budi@abpe.com</span>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="position-cell">
                                        <span class="position-title">Senior Developer</span>
                                        <span class="position-dept-badge">IT</span>
                                    </div>
                                </td>
                                <td>IT</td>
                                <td><span class="badge badge--full-time">Full-Time</span></td>
                                <td>12 Jan 2023</td>
                                <td><button class="btn btn--outline" style="padding: 6px 12px; font-size: 12px;">Detail
                                        ></button></td>
                            </tr>
                            <tr>
                                <td class="td-id">#EMP-002</td>
                                <td>
                                    <div class="employee-cell">
                                        <img src="https://ui-avatars.com/api/?name=Siti+Aminah&background=dcfce7&color=16a34a"
                                            class="employee-avatar" alt="Avatar">
                                        <div class="employee-info">
                                            <span class="employee-name">Siti Aminah</span>
                                            <span class="employee-email">siti@abpe.com</span>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="position-cell">
                                        <span class="position-title">HR Manager</span>
                                        <span class="position-dept-badge">Human Resources</span>
                                    </div>
                                </td>
                                <td>Human Resources</td>
                                <td><span class="badge badge--full-time">Full-Time</span></td>
                                <td>05 Mar 2022</td>
                                <td><button class="btn btn--outline" style="padding: 6px 12px; font-size: 12px;">Detail
                                        ></button></td>
                            </tr>
                            <tr>
                                <td class="td-id">#EMP-003</td>
                                <td>
                                    <div class="employee-cell">
                                        <img src="https://ui-avatars.com/api/?name=Andi+Pratama&background=fef3c7&color=f59e0b"
                                            class="employee-avatar" alt="Avatar">
                                        <div class="employee-info">
                                            <span class="employee-name">Andi Pratama</span>
                                            <span class="employee-email">andi@abpe.com</span>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="position-cell">
                                        <span class="position-title">Marketing Staff</span>
                                        <span class="position-dept-badge">Marketing</span>
                                    </div>
                                </td>
                                <td>Marketing</td>
                                <td><span class="badge badge--part-time">Part-Time</span></td>
                                <td>20 Agu 2024</td>
                                <td><button class="btn btn--outline" style="padding: 6px 12px; font-size: 12px;">Detail
                                        ></button></td>
                            </tr>
                            <tr>
                                <td class="td-id">#EMP-004</td>
                                <td>
                                    <div class="employee-cell">
                                        <img src="https://ui-avatars.com/api/?name=Dewi+Lestari&background=fee2e2&color=ef4444"
                                            class="employee-avatar" alt="Avatar">
                                        <div class="employee-info">
                                            <span class="employee-name">Dewi Lestari</span>
                                            <span class="employee-email">dewi@abpe.com</span>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="position-cell">
                                        <span class="position-title">Sales Executive</span>
                                        <span class="position-dept-badge">Sales</span>
                                    </div>
                                </td>
                                <td>Sales</td>
                                <td><span class="badge badge--on-leave">On Leave</span></td>
                                <td>10 Nov 2023</td>
                                <td><button class="btn btn--outline" style="padding: 6px 12px; font-size: 12px;">Detail
                                        ></button></td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="pagination-container">
                    <div class="pagination-info" id="paginationInfo">1-4 dari 156</div>
                    <div class="pagination-controls" id="paginationControls">
                        <button class="page-btn">←</button>
                        <button class="page-btn page-btn--active">1</button>
                        <button class="page-btn">2</button>
                        <button class="page-btn">3</button>
                        <button class="page-btn">→</button>
                    </div>
                </div>
            </section>
        </div>
    </main>
@endsection

@push('scripts')
    <script src="{{ asset('js/dashboard/hr.js') }}"></script>
@endpush
