class DashboardManager {
    constructor() {
        // 1. Dummy Data
        this.state = {
            summary: {
                penjualan: 128500000,
                pembelian: 74300000,
                laba: 54200000,
                tagihan: 18000000
            },
            chart: [
                { label: 'Jan', value: 9000000 },
                { label: 'Feb', value: 12000000 },
                { label: 'Mar', value: 8500000 },
                { label: 'Apr', value: 14000000 },
                { label: 'Mei', value: 15300000 },
                { label: 'Jun', value: 11000000 },
                { label: 'Jul', value: 19000000 }
            ],
            production: [
                { label: 'Order Aktif', value: 12, max: 20, color: '#3b82f6' },
                { label: 'Sedang Berjalan', value: 7, max: 20, color: '#f59e0b' },
                { label: 'QC Tertunda', value: 3, max: 20, color: '#ef4444' },
                { label: 'Selesai Hari Ini', value: 5, max: 20, color: '#16a34a' }
            ],
            stock: {
                sku: 124,
                rendah: 8,
                kritis: 2,
                nilai: 312450000
            },
            activities: [
                { text: 'Pesanan #SO-021 Dikirim ke PT Sentosa', time: '1 jam lalu', type: 'blue', icon: '<path d="M12 19V5M5 12l7-7 7 7"/>' },
                { text: 'Produksi WO-105 Selesai di Mesin A1', time: 'Hari ini', type: 'blue', icon: '<polyline points="20 6 9 17 4 12"/>' },
                { text: 'Pembelian #PO-115 Barang Diterima', time: 'Kemarin', type: 'green', icon: '<path d="M4 22h14a2 2 0 0 0 2-2V7.5L14.5 2H6a2 2 0 0 0-2 2v4"/> <polyline points="14 2 14 8 20 8"/>' },
                { text: 'Stok Produk A001 Habis', time: '2 hari lalu', type: 'red', icon: '<line x1="5" y1="12" x2="19" y2="12"/>' }
            ]
        };

        this.init();
    }

    init() {
        this.renderSummary();
        this.renderProduction();
        this.renderStock();
        this.renderActivities();

        // Ensure chart renders properly with calculated dimensions
        setTimeout(() => this.renderChart(), 100);
        window.addEventListener('resize', () => this.renderChart());
    }

    // 5. Format Rupiah
    formatIDR(value) {
        return new Intl.NumberFormat('id-ID', {
            style: 'currency',
            currency: 'IDR',
            minimumFractionDigits: 0,
            maximumFractionDigits: 0
        }).format(value);
    }

    // Render logic separated from state
    renderSummary() {
        document.getElementById('valPenjualan').textContent = this.formatIDR(this.state.summary.penjualan);
        document.getElementById('valPembelian').textContent = this.formatIDR(this.state.summary.pembelian);
        document.getElementById('valLaba').textContent = this.formatIDR(this.state.summary.laba);
        document.getElementById('valTagihan').textContent = this.formatIDR(this.state.summary.tagihan);
    }

    renderProduction() {
        const container = document.getElementById('productionList');
        container.innerHTML = '';

        this.state.production.forEach(item => {
            const percentage = (item.value / item.max) * 100;
            const html = `
                <div class="prod-item">
                    <div class="prod-label">
                        <span>${item.label}:</span>
                        <span class="prod-value">${item.value}</span>
                    </div>
                    <div class="prod-bar-bg">
                        <div class="prod-bar-fill" style="background-color: ${item.color}; width: 0;" data-target="${percentage}%"></div>
                    </div>
                </div>
            `;
            container.insertAdjacentHTML('beforeend', html);
        });

        // 4. Animate progress bar width
        setTimeout(() => {
            document.querySelectorAll('.prod-bar-fill').forEach(bar => {
                bar.style.width = bar.getAttribute('data-target');
            });
        }, 100);
    }

    renderStock() {
        document.getElementById('valSku').textContent = this.state.stock.sku;
        document.getElementById('valStokRendah').textContent = this.state.stock.rendah;
        document.getElementById('valStokKritis').textContent = this.state.stock.kritis;
        document.getElementById('valInventaris').textContent = this.formatIDR(this.state.stock.nilai);
    }

    renderActivities() {
        const container = document.getElementById('activitiesList');
        container.innerHTML = '';

        this.state.activities.forEach(item => {
            const html = `
                <div class="activity-item">
                    <div class="activity-icon bg-${item.type}">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">${item.icon}</svg>
                    </div>
                    <div class="activity-text">${item.text}</div>
                    <div class="activity-time">${item.time}</div>
                </div>
            `;
            container.insertAdjacentHTML('beforeend', html);
        });
    }

    // 2. Render chart via Canvas API
    renderChart() {
        const container = document.getElementById('chartContainer');
        const canvas = document.getElementById('salesChart');
        const tooltip = document.getElementById('chartTooltip');
        const ctx = canvas.getContext('2d');

        // Handle High DPI displays
        const dpr = window.devicePixelRatio || 1;
        const rect = container.getBoundingClientRect();

        canvas.width = rect.width * dpr;
        canvas.height = rect.height * dpr;
        ctx.scale(dpr, dpr);
        canvas.style.width = `${rect.width}px`;
        canvas.style.height = `${rect.height}px`;

        const padding = { top: 20, right: 20, bottom: 30, left: 20 };
        const width = rect.width;
        const height = rect.height;
        const drawWidth = width - padding.left - padding.right;
        const drawHeight = height - padding.top - padding.bottom;

        const data = this.state.chart;
        const maxValue = Math.max(...data.map(d => d.value)) * 1.2; // Add 20% headroom

        // Calculate points
        const points = data.map((d, i) => {
            const x = padding.left + (i * (drawWidth / (data.length - 1)));
            const y = padding.top + drawHeight - ((d.value / maxValue) * drawHeight);
            return { x, y, value: d.value, label: d.label };
        });

        ctx.clearRect(0, 0, width, height);

        // Draw gradient area
        ctx.beginPath();
        ctx.moveTo(points[0].x, points[0].y);

        // Smooth bezier curve generator
        for (let i = 0; i < points.length - 1; i++) {
            const cx = (points[i].x + points[i+1].x) / 2;
            ctx.bezierCurveTo(cx, points[i].y, cx, points[i+1].y, points[i+1].x, points[i+1].y);
        }

        ctx.lineTo(points[points.length - 1].x, height - padding.bottom);
        ctx.lineTo(points[0].x, height - padding.bottom);
        ctx.closePath();

        const gradient = ctx.createLinearGradient(0, 0, 0, height);
        gradient.addColorStop(0, 'rgba(59, 130, 246, 0.4)');
        gradient.addColorStop(1, 'rgba(59, 130, 246, 0.0)');
        ctx.fillStyle = gradient;
        ctx.fill();

        // Draw line
        ctx.beginPath();
        ctx.moveTo(points[0].x, points[0].y);
        for (let i = 0; i < points.length - 1; i++) {
            const cx = (points[i].x + points[i+1].x) / 2;
            ctx.bezierCurveTo(cx, points[i].y, cx, points[i+1].y, points[i+1].x, points[i+1].y);
        }
        ctx.strokeStyle = '#3b82f6';
        ctx.lineWidth = 3;
        ctx.stroke();

        // Draw points and labels
        ctx.fillStyle = '#6b7280';
        ctx.font = '12px Inter, sans-serif';
        ctx.textAlign = 'center';

        points.forEach(p => {
            ctx.beginPath();
            ctx.arc(p.x, p.y, 4, 0, Math.PI * 2);
            ctx.fillStyle = '#ffffff';
            ctx.fill();
            ctx.lineWidth = 2;
            ctx.strokeStyle = '#3b82f6';
            ctx.stroke();

            // Labels
            ctx.fillStyle = '#9ca3af';
            ctx.fillText(p.label, p.x, height - 10);
        });

        // 3. Tooltip logic
        canvas.onmousemove = (e) => {
            const rect = canvas.getBoundingClientRect();
            const mouseX = e.clientX - rect.left;
            const mouseY = e.clientY - rect.top;

            let hoveredPoint = null;
            for (let p of points) {
                const distance = Math.hypot(mouseX - p.x, mouseY - p.y);
                if (distance < 20) {
                    hoveredPoint = p;
                    break;
                }
            }

            if (hoveredPoint) {
                tooltip.style.opacity = '1';
                tooltip.style.left = `${hoveredPoint.x}px`;
                tooltip.style.top = `${hoveredPoint.y}px`;
                tooltip.innerHTML = `${hoveredPoint.label}<br><span style="color:#3b82f6">${this.formatIDR(hoveredPoint.value)}</span>`;
                canvas.style.cursor = 'pointer';
            } else {
                tooltip.style.opacity = '0';
                canvas.style.cursor = 'default';
            }
        };

        canvas.onmouseleave = () => {
            tooltip.style.opacity = '0';
        };
    }
}

// Initialize on load
document.addEventListener('DOMContentLoaded', () => {
    new DashboardManager();
});
