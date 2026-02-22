document.addEventListener("DOMContentLoaded", () => {
    // --- 1. DUMMY DATA ---
    const initialData = [
        {
            id: "#SO-005",
            customer: "PT Maju Sejahtera",
            date: "20 Februari 2026",
            status: "Draft",
            total: 8200000,
            paymentStatus: "Draft",
        },
        {
            id: "#SO-004",
            customer: "UD Makmur Jaya",
            date: "18 Februari 2026",
            status: "Dikirim",
            total: 3600000,
            paymentStatus: "Belum Lunas",
        },
        {
            id: "#SO-003",
            customer: "PT Sentosa",
            date: "17 Februari 2026",
            status: "Selesai",
            total: 25750000,
            paymentStatus: "Lunas",
        },
        {
            id: "#SO-002",
            customer: "CV Hasta Karya",
            date: "16 Februari 2026",
            status: "Dikirim",
            total: 11200000,
            paymentStatus: "Belum Lunas",
        },
        {
            id: "#SO-001",
            customer: "Toko Sumber Rejeki",
            date: "15 Februari 2026",
            status: "Dibatalkan",
            total: 9500000,
            paymentStatus: "Dibatalkan",
        },
        {
            id: "#SO-000",
            customer: "PT Berkah Jaya",
            date: "14 Februari 2026",
            status: "Draft",
            total: 10450000,
            paymentStatus: "Draft",
        },
        {
            id: "#SO-109",
            customer: "PT Sejahtera Abadi",
            date: "14 Februari 2026",
            status: "Selesai",
            total: 18300000,
            paymentStatus: "Lunas",
        },
        {
            id: "#SO-108",
            customer: "PT Makmur Bersama",
            date: "12 Februari 2026",
            status: "Dikirim",
            total: 7200000,
            paymentStatus: "Belum Lunas",
        },
    ];

    let currentData = [...initialData];
    let currentPage = 1;
    const itemsPerPage = 8;
    const totalItemsSystem = 120; // Simulated total from DB

    // --- 2. DOM ELEMENTS ---
    const tableBody = document.getElementById("tableBody");
    const filterStatus = document.getElementById("filterStatus");
    const filterCustomer = document.getElementById("filterCustomer");
    const paginationControls = document.getElementById("paginationControls");
    const paginationInfo = document.getElementById("paginationInfo");
    const mobileToggle = document.getElementById("mobileToggle");
    const sidebar = document.getElementById("sidebar");

    // --- 3. UTILITY FUNCTIONS ---

    // Format Rupiah
    const formatRupiah = (number) => {
        return new Intl.NumberFormat("id-ID", {
            style: "currency",
            currency: "IDR",
            minimumFractionDigits: 0,
            maximumFractionDigits: 0,
        }).format(number);
    };

    // Get Badge Class for Main Status
    const getStatusBadgeClass = (status) => {
        switch (status.toLowerCase()) {
            case "draft":
                return "badge--draft";
            case "dikirim":
                return "badge--dikirim";
            case "selesai":
                return "badge--selesai";
            case "dibatalkan":
                return "badge--dibatalkan";
            default:
                return "badge--draft";
        }
    };

    // Get Badge Class for Payment Status
    const getPaymentBadgeClass = (status) => {
        switch (status.toLowerCase()) {
            case "lunas":
                return "badge-outline--lunas";
            case "belum lunas":
                return "badge-outline--belum-lunas";
            case "dibatalkan":
                return "badge-outline--dibatalkan";
            case "draft":
                return "text-muted";
            default:
                return "text-muted";
        }
    };

    // --- 4. RENDER FUNCTIONS ---

    const renderTable = (data) => {
        tableBody.innerHTML = "";

        if (data.length === 0) {
            tableBody.innerHTML = `<tr><td colspan="7" style="text-align:center; padding: 24px;">Tidak ada data ditemukan</td></tr>`;
            return;
        }

        data.forEach((order) => {
            const tr = document.createElement("tr");

            // Handle specific payment status text display
            let paymentHtml = `<span class="badge-outline ${getPaymentBadgeClass(order.paymentStatus)}">${order.paymentStatus}</span>`;
            if (
                order.paymentStatus.toLowerCase() === "draft" ||
                order.paymentStatus === "-"
            ) {
                paymentHtml = `<span class="${getPaymentBadgeClass(order.paymentStatus)}">${order.paymentStatus}</span>`;
            }

            tr.innerHTML = `
                <td class="text-muted">${order.id}</td>
                <td>${order.customer}</td>
                <td class="text-muted">${order.date}</td>
                <td><span class="badge ${getStatusBadgeClass(order.status)}">${order.status}</span></td>
                <td><strong>${formatRupiah(order.total)}</strong></td>
                <td>${paymentHtml}</td>
                <td>
                    <button class="btn btn--sm-outline btn-lihat" data-id="${order.id}">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="margin-right:4px; vertical-align: middle;"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
                        Lihat
                    </button>
                </td>
            `;
            tableBody.appendChild(tr);
        });

        // Add Event Listeners to Action Buttons
        document.querySelectorAll(".btn-lihat").forEach((btn) => {
            btn.addEventListener("click", (e) => {
                const orderId = e.currentTarget.getAttribute("data-id");
                console.log(`Membuka detail order untuk ID: ${orderId}`);
                // Implement redirect to detail page if needed:
                // window.location.href = `/penjualan/${orderId.replace('#', '')}`;
            });
        });
    };

    const renderPagination = () => {
        // Build simple pagination structure mapping the image
        paginationControls.innerHTML = `
            <button class="page-btn" aria-label="First">&laquo;</button>
            <button class="page-btn" aria-label="Previous">&lsaquo;</button>
            <button class="page-btn page-btn--active">1</button>
            <button class="page-btn">2</button>
            <button class="page-btn">3</button>
            <button class="page-btn" disabled>...</button>
            <button class="page-btn">15</button>
            <button class="page-btn" aria-label="Next">&rsaquo;</button>
            <button class="page-btn" aria-label="Last">&raquo;</button>
        `;

        // Update Info text
        const totalRendered = currentData.length;
        paginationInfo.textContent = `1-${totalRendered} dari ${totalItemsSystem}`;
    };

    // --- 5. EVENT LISTENERS ---

    const applyFilters = () => {
        const statusVal = filterStatus.value;
        const customerVal = filterCustomer.value;

        currentData = initialData.filter((item) => {
            const matchStatus =
                statusVal === "Semua" || item.status === statusVal;
            const matchCustomer =
                customerVal === "Semua" || item.customer === customerVal;
            return matchStatus && matchCustomer;
        });

        renderTable(currentData);
        renderPagination();
    };

    filterStatus.addEventListener("change", applyFilters);
    filterCustomer.addEventListener("change", applyFilters);

    // Sidebar Mobile Toggle
    if (mobileToggle && sidebar) {
        mobileToggle.addEventListener("click", () => {
            sidebar.classList.toggle("open");
        });
    }

    // ==========================================
    // LOGIKA MODAL TAMBAH ORDER (MULTIPLE ITEMS)
    // ==========================================

    const modalOverlay = document.getElementById("modalTambahOrder");
    const btnTambahOrder = document.getElementById("btnTambahOrder"); // Tombol Buka Modal di halaman utama

    // Elemen di dalam modal
    const tbodyItems = document.querySelector(".items-table tbody");
    const btnAddItem = document.querySelector(".items-header .btn--sm-outline");
    const summaryStrong = document.querySelectorAll(
        ".summary-box .summary-row strong",
    );

    // Sembunyikan modal saat pertama kali dimuat (karena di CSS Anda defaultnya display: flex)
    if (modalOverlay) modalOverlay.style.display = "none";

    // Fungsi Format Rupiah
    const formatUang = (angka) => {
        return new Intl.NumberFormat("id-ID", {
            style: "currency",
            currency: "IDR",
            minimumFractionDigits: 0,
            maximumFractionDigits: 0,
        }).format(angka);
    };

    // Fungsi Format Angka Biasa (untuk input)
    const formatAngka = (angka) => {
        return new Intl.NumberFormat("id-ID").format(angka);
    };

    // Fungsi Menghitung Semua Total
    const calculateTotals = () => {
        if (!tbodyItems) return;

        let subtotal = 0;
        const rows = tbodyItems.querySelectorAll("tr");

        // Looping setiap baris produk
        rows.forEach((row) => {
            const inputs = row.querySelectorAll("input");
            // Pastikan ada 3 input: [0] Qty, [1] Harga, [2] Total
            if (inputs.length >= 3) {
                const qty = parseFloat(inputs[0].value) || 0;
                const harga = parseFloat(inputs[1].value) || 0;
                const rowTotal = qty * harga;

                // Update input "Total" di baris tersebut
                inputs[2].value = formatAngka(rowTotal);

                // Tambahkan ke subtotal
                subtotal += rowTotal;
            }
        });

        // Hitung Pajak (11%) dan Grand Total
        const pajak = subtotal * 0.11;
        const grandTotal = subtotal + pajak;

        // Update teks di UI Summary (Subtotal, Pajak, Grand Total)
        if (summaryStrong.length >= 3) {
            summaryStrong[0].textContent = formatUang(subtotal);
            summaryStrong[1].textContent = formatUang(pajak);
            summaryStrong[2].textContent = formatUang(grandTotal);
        }
    };

    // 1. EVENT: Tambah Baris Baru
    if (btnAddItem && tbodyItems) {
        btnAddItem.addEventListener("click", (e) => {
            e.preventDefault();
            const tr = document.createElement("tr");
            tr.innerHTML = `
                <td>
                    <select class="form-control">
                        <option>Pilih Produk</option>
                        <option>Produk A</option>
                        <option>Produk B</option>
                        <option>Produk C</option>
                    </select>
                </td>
                <td>
                    <input type="number" class="form-control" value="1" min="1">
                </td>
                <td>
                    <input type="number" class="form-control" value="0" min="0">
                </td>
                <td>
                    <input type="text" class="form-control" value="0" readonly>
                </td>
                <td>
                    <button class="btn-delete">&times;</button>
                </td>
            `;
            tbodyItems.appendChild(tr);
            calculateTotals(); // Kalkulasi ulang
        });
    }

    // 2. EVENT: Hapus Baris & Perubahan Input (Event Delegation)
    if (tbodyItems) {
        // Handle perubahan angka pada Qty atau Harga
        tbodyItems.addEventListener("input", (e) => {
            if (e.target.tagName === "INPUT" && e.target.type === "number") {
                calculateTotals(); // Kalkulasi ulang setiap ada ketikan
            }
        });

        // Handle klik tombol hapus baris
        tbodyItems.addEventListener("click", (e) => {
            if (e.target.classList.contains("btn-delete")) {
                e.preventDefault();
                e.target.closest("tr").remove();
                calculateTotals(); // Kalkulasi ulang setelah dihapus
            }
        });
    }

    // 3. EVENT: Buka Tutup Modal
    if (btnTambahOrder && modalOverlay) {
        btnTambahOrder.addEventListener("click", () => {
            modalOverlay.style.display = "flex"; // Tampilkan modal
            calculateTotals(); // Hitung awal saat modal dibuka
        });
    }

    // Tombol close header (X) dan tombol Batal
    if (modalOverlay) {
        const closeButtons = modalOverlay.querySelectorAll(
            ".modal-close, .modal-footer .btn--sm-outline",
        );
        closeButtons.forEach((btn) => {
            btn.addEventListener("click", (e) => {
                e.preventDefault();
                modalOverlay.style.display = "none"; // Sembunyikan modal
            });
        });

        // Tutup saat klik di luar area putih modal (backdrop)
        window.addEventListener("click", (e) => {
            if (e.target === modalOverlay) {
                modalOverlay.style.display = "none";
            }
        });
    }

    // Hitung inisial untuk baris pertama (dummy awal) saat halaman dimuat
    calculateTotals();
    // --- 6. INITIALIZATION ---
    renderTable(currentData);
    renderPagination();
});
