class PengirimanModule {
    constructor() {
        // 1. Dummy Data Array
        this.initialData = [
            {
                no: "SHP-0098",
                orderId: "#SO-013",
                customer: "PT Maju Sejahtera",
                date: "19 Februari 2026",
                statusType: "progress",
                statusValue: 45,
                text: "#5%",
                location: "Surabaya",
            },
            {
                no: "SHP-0097",
                orderId: "#SO-012",
                customer: "CV Hasta Karya",
                date: "18 Februari 2026",
                statusType: "text-progress",
                statusValue: 70,
                text: "Dalam Perjalanan",
                location: "-",
            },
            {
                no: "SHP-0096",
                orderId: "#SO-011",
                customer: "PT Makmur Bersama",
                date: "17 Februari 2026",
                statusType: "badge",
                statusClass: "warning",
                text: "QC Tertunda",
                location: "Jakarta",
            },
            {
                no: "SHP-0095",
                orderId: "#SO-010",
                customer: "PT Sejahtera Abadi",
                date: "16 Februari 2026",
                statusType: "progress-success",
                statusValue: 100,
                text: "100%",
                location: "-",
            },
            {
                no: "SHP-0094",
                orderId: "#SO-009",
                customer: "UD Makmur Jaya",
                date: "15 Februari 2026",
                statusType: "badge-icon",
                statusClass: "warning",
                text: "Selesai 1",
                location: "Bandung",
            },
            {
                no: "SHP-0093",
                orderId: "#SO-008",
                customer: "PT Toko Sejahtera",
                date: "14 Februari 2026",
                statusType: "badge-icon",
                statusClass: "success",
                text: "Selesai T",
                location: "Semarang",
            },
            {
                no: "SHP-0092",
                orderId: "#SO-007",
                customer: "PT TokSumber Rejeki",
                date: "13 Februari 2026",
                statusType: "badge-icon",
                statusClass: "success",
                text: "Selesai T",
                location: "Bekasi",
            },
            {
                no: "SHP-0001",
                orderId: "#SO-006",
                customer: "PT Sentosa",
                date: "12 Februari 2026",
                statusType: "badge-icon",
                statusClass: "success",
                text: "Selesai T",
                location: "Bogor",
            },
            {
                no: "SHP-0092",
                orderId: "#SO-003",
                customer: "PT Berkah Jaya",
                date: "12 Februari 2026",
                statusType: "badge-icon",
                statusClass: "success",
                text: "Selesai T",
                location: "Bogor",
            },
        ];

        this.currentData = [...this.initialData];
        this.itemsPerPage = 8;
        this.totalItems = 98; // Simulated total

        this.initElements();
        this.bindEvents();
        this.renderTable();
        this.renderPagination();
    }

    initElements() {
        this.tableBody = document.getElementById("tableBody");
        this.filterDropdown = document.getElementById("filterStatusDropdown");
        this.btnExport = document.getElementById("btnExport");
        this.btnTambah = document.getElementById("btnTambahPengiriman");
        this.paginationControls = document.getElementById("paginationControls");
        this.paginationInfo = document.getElementById("paginationInfo");
    }
    bindEvents() {
        // Filter dropdown interaktif
        this.filterDropdown.addEventListener("change", (e) => {
            const val = e.target.value;
            if (val === "Semua") {
                this.currentData = [...this.initialData];
            } else {
                this.currentData = this.initialData.filter((item) => {
                    if (val === "Selesai") return item.text.includes("Selesai");
                    return item.text.includes(val);
                });
            }
            this.renderTable();
            this.renderPagination();
        });

        // Export button simulasi
        this.btnExport.addEventListener("click", () => {
            console.log("Export triggered! Mengunduh data CSV/Excel...");
            alert("Proses export berjalan. Cek console log.");
        });

        // ==========================================
        // LOGIKA MODAL TAMBAH PENGIRIMAN
        // ==========================================
        const modalOverlay = document.getElementById("modalTambahPengiriman");
        const btnClose = document.getElementById("closePengirimanModal");
        const btnBatal = document.getElementById("batalPengiriman");

        // Input elemen untuk Auto-fill
        const selectSO = document.getElementById("salesOrderSelect");
        const inputCustomer = document.getElementById("customerName");

        // Buka modal saat tombol "Tambah Pengiriman" diklik
        if (this.btnTambah && modalOverlay) {
            this.btnTambah.addEventListener("click", () => {
                modalOverlay.classList.add("is-active");
            });
        }

        // Fungsi tutup modal
        const closeModal = (e) => {
            if (e) e.preventDefault();
            modalOverlay.classList.remove("is-active");
        };

        // Event listener tutup modal
        if (btnClose) btnClose.addEventListener("click", closeModal);
        if (btnBatal) btnBatal.addEventListener("click", closeModal);

        // Tutup modal jika user mengklik area gelap (backdrop) di luar modal
        window.addEventListener("click", (e) => {
            if (e.target === modalOverlay) {
                closeModal();
            }
        });

        // Auto-fill Customer berdasarkan pilihan Order ID
        if (selectSO && inputCustomer) {
            selectSO.addEventListener("change", function () {
                // Ambil option yang sedang dipilih
                const selectedOption = this.options[this.selectedIndex];

                // Ambil nilai dari attribute data-customer="..."
                const customerName =
                    selectedOption.getAttribute("data-customer");

                // Set valuenya ke input readonly
                inputCustomer.value = customerName ? customerName : "";
            });
        }
    }

    renderStatusColumn(item) {
        let html = "";
        switch (item.statusType) {
            case "progress":
                html = `
                    <div class="table-progress">
                        <div class="bar-container"><div class="bar-fill" style="width: 0%" data-target="${item.statusValue}%"></div></div>
                        <span class="percent text-muted">${item.text}</span>
                    </div>`;
                break;
            case "text-progress":
                html = `
                    <div class="table-progress">
                        <div class="bar-container" style="width:80px; flex-grow:0;"><div class="bar-fill" style="width: 0%" data-target="${item.statusValue}%"></div></div>
                        <span class="percent text-muted" style="margin-left:8px;">${item.text}</span>
                    </div>`;
                break;
            case "progress-success":
                html = `
                    <div class="table-progress">
                        <div class="bar-container"><div class="bar-fill bar-fill--success" style="width: 0%" data-target="${item.statusValue}%"></div></div>
                        <span class="percent text-green">${item.text}</span>
                    </div>`;
                break;
            case "badge":
                html = `<span class="status-badge status-badge--${item.statusClass}">${item.text}</span>`;
                break;
            case "badge-icon":
                html = `
                    <span class="status-badge status-badge--${item.statusClass}">
                        ${item.text}
                        <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="12" y1="19" x2="12" y2="5"></line><polyline points="5 12 12 5 19 12"></polyline></svg>
                    </span>`;
                break;
        }
        return html;
    }

    // Render table via JS
    renderTable() {
        this.tableBody.innerHTML = "";

        const displayData = this.currentData.slice(0, this.itemsPerPage);

        if (displayData.length === 0) {
            this.tableBody.innerHTML = `<tr><td colspan="7" style="text-align:center; padding: 20px;">Data tidak ditemukan</td></tr>`;
            return;
        }

        displayData.forEach((item) => {
            const tr = document.createElement("tr");
            tr.innerHTML = `
                <td class="text-muted">${item.no}</td>
                <td>${item.orderId}</td>
                <td class="text-muted">${item.customer}</td>
                <td>${item.date}</td>
                <td>${this.renderStatusColumn(item)}</td>
                <td>${item.location}</td>
                <td>
                    <button class="btn btn--primary detail-btn" data-no="${item.no}" style="padding: 6px 12px;">Detail ></button>
                </td>
            `;
            this.tableBody.appendChild(tr);
        });

        setTimeout(() => {
            const progressBars = this.tableBody.querySelectorAll(".bar-fill");
            progressBars.forEach((bar) => {
                bar.style.width = bar.getAttribute("data-target");
            });
        }, 50);

        document.querySelectorAll(".detail-btn").forEach((btn) => {
            btn.addEventListener("click", (e) => {
                const noPengiriman = e.currentTarget.getAttribute("data-no");
                console.log(
                    `Membuka detail untuk Nomor Pengiriman: ${noPengiriman}`,
                );
            });
        });
    }

    // Client-side pagination render
    renderPagination() {
        this.paginationControls.innerHTML = `
            <button class="page-btn" aria-label="First">&laquo;</button>
            <button class="page-btn" aria-label="Previous">&lsaquo;</button>
            <button class="page-btn">1</button>
            <button class="page-btn">2</button>
            <button class="page-btn page-btn--active">3</button>
            <button class="page-btn" disabled>...</button>
            <button class="page-btn">13</button>
            <button class="page-btn" aria-label="Next">&rsaquo;</button>
            <button class="page-btn" aria-label="Last">&raquo;</button>
        `;

        const totalRendered = Math.min(
            this.currentData.length,
            this.itemsPerPage,
        );
        this.paginationInfo.textContent = `1-${totalRendered} dari ${this.totalItems}`;
    }
}

document.addEventListener('DOMContentLoaded', function() {
            const modal = document.getElementById('modalTambahPengiriman');
            const btnTambah = document.getElementById('btnTambahPengiriman');
            const btnClose = document.getElementById('closePengirimanModal');
            const btnBatal = document.getElementById('batalPengiriman');

            // Fungsi toggle modal dengan CSS Class 'is-active'
            const toggleModal = () => {
                if (modal) modal.classList.toggle('is-active');
            };

            // Event Listeners
            if (btnTambah) btnTambah.addEventListener('click', toggleModal);
            if (btnClose) btnClose.addEventListener('click', toggleModal);
            if (btnBatal) btnBatal.addEventListener('click', toggleModal);

            // Tutup modal jika user klik area gelap di luar modal
            if (modal) {
                modal.addEventListener('click', function(e) {
                    if (e.target === modal) toggleModal();
                });
            }
        });
// Initialize on DOM Load
document.addEventListener("DOMContentLoaded", () => {
    new PengirimanModule();
});
