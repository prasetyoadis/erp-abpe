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
            <div>
                <form method="GET" id="tabelFilter" class="filters-section">
                    <div class="filter-group">
                        <label class="filter-label">Status</label>
                        <select name="status" class="filter-input" id="filterStatus" onchange="this.form.requestSubmit()">
                            <option value="">Semua</option>
                            <option value="draft" {{ request('status') == "draft" ? 'selected' : '' }}>Draft</option>
                            <option value="confirmed" {{ request('status') == "confirmed" ? 'selected' : '' }}>Dikonfirmasi</option>
                            <option value="shipped" {{ request('status') == "shipped" ? 'selected' : '' }}>Dikirim</option>
                            <option value="completed" {{ request('status') == "completed" ? 'selected' : '' }}>Selesai</option>
                            <option value="cancelled" {{ request('status') == "cancelled" ? 'selected' : '' }}>Dibatalkan</option>
                        </select>
                    </div>
                    @if (request('search'))
                        <input type="hidden" name="search" value="{{ request('search') }}">
                    @endif
                    <div class="filter-group">
                        <label class="filter-label">Customer</label>
                        <select name="customer" class="filter-input" id="filterCustomer" onchange="this.form.requestSubmit()">
                            @if ($customers->count())
                                <option value="">Semua</option>
                            @foreach ($customers as $customer)
                                <option value="{{ $customer->id }}" {{ request('customer') == $customer->id ? 'selected' : '' }}>{{ $customer->name }}</option>
                            @endforeach
                            @else
                                <option>Data Tidak Ada</option>
                            @endif
                        </select>
                    </div>
                    <div class="filter-group">
                        <label class="filter-label">Date Range</label>
                        <div style="display:flex; gap:8px; align-items: center;">
                            <input type="date" name="from" class="form-control" style="width: 50%" value="{{ request('from') }}" onchange="this.form.requestSubmit()">
                            <span>-</span>
                            <input type="date" name="to" class="form-control" style="width: 50%" value="{{ request('to') }}" onchange="this.form.requestSubmit()">
                        </div>
                    </div>
                </form>
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
                        @if ($orders->count())
                        @foreach ($orders as $order)
                            <tr>
                                <td class="text-muted">{{ $order->order_num }}</td>
                                <td>{{ $order->customer->name }}</td>
                                <td class="text-muted">{{ $order->created_at->format('d/m/Y') }}</td>
                                <td><span class="badge {{ $order->status->badgeClass() }}">{{ $order->status->label() }}</span></td>
                                <td style="text-align: end"><strong>Rp{{ number_format($order->total_amount, 0, ',', '.') }}</strong></td>
                                <td><span class="badge-outline {{ $order->payment_status->badgeClass() }}">{{ $order->payment_status->label() }}</span></td>
                                <td>
                                    <a href="/dashboard/sales/{{ $order->id }}" class="btn btn--sm-outline btn-lihat">
                                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="margin-right:4px; vertical-align: middle;"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
                                        Lihat
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        @else
                            <td colspan="7" style="text-align: center">Data Tidak Ada</option>
                        @endif
                    </tbody>
                </table>
            </div>

            <div>
                {{ $orders->links('vendor.pagination.custom') }}
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
                <form action="{{ route('dashboard.sales.create') }}" method="POST">
                    @csrf
                    <!-- ===== SECTION 1 : HEADER ===== -->
                <div class="form-grid">
                        <div class="form-group">
                            <label>Customer <span>*</span></label>
                            <select id="customer_id" name="customer_id" class="form-control" required>
                                @if ($customers->count())
                                    <option value="">Pilih Customer</option>
                                @foreach ($customers as $customer)
                                    <option 
                                        value="{{ $customer->id }}"
                                        data-limit="{{ $customer->credit_limit }}"
                                        data-terms="{{ $customer->payment_terms }}"
                                    >{{ $customer->name }}</option>
                                @endforeach
                                @else
                                    <option>Data Tidak Ada</option>
                                @endif
                            </select>
                            <small class="form-hint">
                                Credit Limit: <span id="limit-credit">0</span> • Terms: <span id="terms-credit">0 Days</span>
                            </small>
                        </div>

                        <div class="form-group">
                            <label>Tanggal Order <span>*</span></label>
                            <input type="date" name="order_date" class="form-control" value="{{ date('Y-m-d') }}" required>
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

                    <!-- ===== SECTION 2 : ITEMS ===== -->
                    <div class="items-section">

                        <div class="items-header">
                            <h3>Detail Produk</h3>
                            <div style="display:flex; gap:16px; justify-content:end;">
                                <select id="product-selector" class="form-control" style="width:50%;">
                                    @if ($products->count())
                                        <option value="">Pilih Product</option>
                                    @foreach ($products as $product)
                                        <option 
                                            value="{{ $product->id }}"
                                            data-price="{{ $product->selling_price }}"
                                            data-name="{{ $product->name }}"
                                        >{{ $product->name }}</option>
                                    @endforeach
                                    @else
                                        <option>Data Tidak Ada</option>
                                    @endif
                                </select>
                                <button id="btn-add-item" class="btn btn--sm-outline" type="button">+ Tambah Item</button>
                            </div>
                        </div>

                        <div class="table-responsive table-modal">
                            <table class="data-table items-table">
                                <thead>
                                    <tr>
                                        <th style="width:25%;">Produk</th>
                                        <th style="width:25%;">Qty</th>
                                        <th style="width:25%;">Harga</th>
                                        <th style="width:25%;">Total</th>
                                        <th style="width:25%;"></th>
                                    </tr>
                                </thead>
                                <tbody id="items-body">
                                    <tr>
                                        <td colspan="5" style="text-align: center">
                                            Item belum ditambahkan
                                        </td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- ===== SECTION 3 : SUMMARY ===== -->
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

                <!-- Modal Footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn--sm-outline">Batal</button>
                    <button type="submit" class="btn btn--primary">Simpan Order</button>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        document.getElementById('tabelFilter').addEventListener('submit', function(e) {
            const form = this;
            const inputs = form.querySelectorAll('input, select');

            inputs.forEach(input => {
                if (!input.value) {
                    input.disabled = true;
                }
            });
        });
    </script>
    <script src="{{ asset('js/dashboard/penjualan.js') }}"></script>
@endpush