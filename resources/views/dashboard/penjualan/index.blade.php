@extends('layouts.app') @section('title', 'Penjualan - ABPE WebApp')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/dashboard/penjualan.css') }}">
@endpush

@section('content')
    <main class="main-content">
        <div class="page-header">
            <h1 class="page-title">Penjualan</h1>
            <button class="btn btn--primary" id="btnTambahOrder">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <line x1="12" y1="5" x2="12" y2="19"></line>
                    <line x1="5" y1="12" x2="19" y2="12"></line>
                </svg>
                Tambah Order
            </button>
        </div>

        <div class="card">
            <div class="filters-section">
                <div class="filter-group">
                    <label class="filter-label">Status</label>
                    <select class="filter-input" id="filterStatus">
                        <option value="Semua">Semua</option>
                        <option value="Draft">Draft</option>
                        <option value="Dikirim">Dikirim</option>
                        <option value="Selesai">Selesai</option>
                        <option value="Dibatalkan">Dibatalkan</option>
                    </select>
                </div>
                <div class="filter-group">
                    <label class="filter-label">Customer</label>
                    <select class="filter-input" id="filterCustomer">
                        <option value="Semua">Semua</option>
                        <option value="PT Maju Sejahtera">PT Maju Sejahtera</option>
                        <option value="UD Makmur Jaya">UD Makmur Jaya</option>
                        <option value="PT Sentosa">PT Sentosa</option>
                    </select>
                </div>
                <div class="filter-group">
                    <label class="filter-label">Date Range</label>
                    <input type="text" class="filter-input" placeholder="Mulai Tanggal - Sampai Tanggal" readonly>
                </div>
            </div>

            <div class="table-responsive">
                <table class="data-table" id="penjualanTable">
                    <thead>
                        <tr>
                            <th>Order ID <svg width="12" height="12" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="2">
                                    <polyline points="7 15 12 20 17 15"></polyline>
                                    <polyline points="7 9 12 4 17 9"></polyline>
                                </svg></th>
                            <th>Customer</th>
                            <th>Tanggal Order</th>
                            <th>Status</th>
                            <th>Total <svg width="12" height="12" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="2">
                                    <polyline points="7 15 12 20 17 15"></polyline>
                                    <polyline points="7 9 12 4 17 9"></polyline>
                                </svg></th>
                            <th>Status Pembayaran</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="tableBody">
                    </tbody>
                </table>
            </div>

            <div class="pagination-section">
                <div class="pagination-info" id="paginationInfo">1-8 dari 120</div>
                <div class="pagination-controls" id="paginationControls"></div>
            </div>
        </div>
    </main>

    <div class="modal-overlay" id="modalTambahOrder" style="display: none;">
        <div class="modal-container">
            <div class="modal-header">
                <h2>Tambah Sales Order</h2>
                <button class="modal-close">&times;</button>
            </div>

            <div class="modal-body">
                <div class="form-grid">
                    <div class="form-group">
                        <label>Customer <span>*</span></label>
                        <select name="customer_name" class="form-control" required>
                            <option value="">Pilih Customer</option>
                            <option value="PT Maju Sejahtera">PT Maju Sejahtera</option>
                            <option value="UD Makmur Jaya">UD Makmur Jaya</option>
                        </select>
                        <small class="form-hint">Credit Limit: Rp 50.000.000 • Terms: 30 Hari</small>
                    </div>
                    <div class="form-group">
                        <label>Tanggal Order <span>*</span></label>
                        <input type="date" name="order_date" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Status Order</label>
                        <select name="status" class="form-control">
                            <option value="Draft" selected>Draft</option>
                            <option value="Dikirim">Dikirim</option>
                            <option value="Selesai">Selesai</option>
                            <option value="Dibatalkan">Dibatalkan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Status Pembayaran</label>
                        <select name="payment_status" class="form-control">
                            <option value="Draft" selected>Draft</option>
                            <option value="Belum Lunas">Belum Lunas</option>
                            <option value="Lunas">Lunas</option>
                            <option value="Dibatalkan">Dibatalkan</option>
                        </select>
                    </div>
                    <div class="form-group full">
                        <label>Catatan</label>
                        <textarea name="notes" class="form-control" rows="3" placeholder="Tambahkan catatan opsional..."></textarea>
                    </div>
                </div>

                <div class="items-section">
                    <div class="items-header">
                        <h3>Detail Produk</h3>
                        <button class="btn btn--sm-outline">+ Tambah Item</button>
                    </div>
                    <div class="table-responsive">
                        <table class="data-table items-table">
                            <thead>
                                <tr>
                                    <th>Produk</th>
                                    <th width="100">Qty</th>
                                    <th width="150">Harga</th>
                                    <th width="150">Total</th>
                                    <th width="60"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <select class="form-control">
                                            <option>Pilih Produk</option>
                                            <option>Produk A</option>
                                            <option>Produk B</option>
                                        </select>
                                    </td>
                                    <td><input type="number" class="form-control" value="1"></td>
                                    <td><input type="number" class="form-control" value="100000"></td>
                                    <td><input type="text" class="form-control" value="100000" readonly></td>
                                    <td><button class="btn-delete">×</button></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="summary-section">
                    <div class="summary-box">
                        <div class="summary-row">
                            <span>Subtotal</span>
                            <strong>Rp 100.000</strong>
                        </div>
                        <div class="summary-row">
                            <span>Pajak (11%)</span>
                            <strong>Rp 11.000</strong>
                        </div>
                        <div class="summary-row total">
                            <span>Grand Total</span>
                            <strong>Rp 111.000</strong>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button class="btn btn--sm-outline">Batal</button>
                <button class="btn btn--primary">Simpan Order</button>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('js/dashboard/penjualan.js') }}"></script>
@endpush
