class EmployeeManager {
    constructor() {
        this.state = {
            data: [],
            filteredData: [],
            currentPage: 1,
            itemsPerPage: 8,
            filters: {
                department: 'Semua',
                status: 'Semua',
                search: ''
            }
        };

        this.init();
    }

    init() {
        this.cacheDOM();
        this.generateDummyData();
        this.bindEvents();
        this.applyFilters(); // Initial render triggered by filter
    }

    cacheDOM() {
        this.dom = {
            tbody: document.getElementById('employeeTableBody'),
            valTotal: document.getElementById('valTotal'),
            valFullTime: document.getElementById('valFullTime'),
            valPartTime: document.getElementById('valPartTime'),
            valOnLeave: document.getElementById('valOnLeave'),
            filterCount: document.getElementById('filterCount'),
            filterDepartment: document.getElementById('filterDepartment'),
            filterStatus: document.getElementById('filterStatus'),
            searchName: document.getElementById('searchName'),
            paginationInfo: document.getElementById('paginationInfo'),
            paginationControls: document.getElementById('paginationControls')
        };
    }

    bindEvents() {
        this.dom.filterDepartment.addEventListener('change', (e) => {
            this.state.filters.department = e.target.value;
            this.applyFilters();
        });

        this.dom.filterStatus.addEventListener('change', (e) => {
            this.state.filters.status = e.target.value;
            this.applyFilters();
        });

        this.dom.searchName.addEventListener('input', (e) => {
            this.state.filters.search = e.target.value.toLowerCase();
            this.applyFilters();
        });

        // Event delegation for dynamically rendered detail buttons
        this.dom.tbody.addEventListener('click', (e) => {
            const btn = e.target.closest('.btn-detail');
            if (btn) {
                const id = btn.getAttribute('data-id');
                console.log(`Detail clicked for Employee ID: ${id}`);
            }
        });
    }

    generateDummyData() {
        const departments = ['IT', 'Human Resources', 'Sales', 'Customer Support', 'Warehouse', 'Produksi', 'Marketing'];
        const statuses = ['Full-Time', 'Part-Time', 'On Leave'];

        const firstNames = ['Andi', 'Dita', 'Agung', 'Sari', 'Ricky', 'Feby', 'Reza', 'Lala', 'Budi', 'Citra', 'Eko', 'Fajar', 'Gita', 'Hadi', 'Indah'];
        const lastNames = ['Setiawan', 'Anjani', 'Pratama', 'Lestari', 'Wijaya', 'Ananda', 'Mahardika', 'Dewi', 'Santoso', 'Putri', 'Nugroho', 'Saputra', 'Rahmawati', 'Kusuma', 'Sari'];
        const positions = ['Web Developer', 'HR Manager', 'Sales Executive', 'Customer Service', 'Warehouse Staff', 'UI/UX Designer', 'Production Suprv', 'Marketing Specialist', 'Data Analyst', 'Accountant'];

        const data = [];
        // Generate 35 dummy employees
        for (let i = 1; i <= 35; i++) {
            const fName = firstNames[Math.floor(Math.random() * firstNames.length)];
            const lName = lastNames[Math.floor(Math.random() * lastNames.length)];
            const dept = departments[Math.floor(Math.random() * departments.length)];

            // Bias status slightly towards Full-Time
            const statusRoll = Math.random();
            const status = statusRoll < 0.6 ? 'Full-Time' : (statusRoll < 0.9 ? 'Part-Time' : 'On Leave');

            // Random date in past 3 years
            const pastDate = new Date(Date.now() - Math.floor(Math.random() * 100000000000));

            data.push({
                id: `SHP-${String(i).padStart(4, '0')}`,
                name: `${fName} ${lName}`,
                email: `${fName.toLowerCase()}.${lName.toLowerCase()}@abpe.com`,
                avatar: `https://ui-avatars.com/api/?name=${fName}+${lName}&background=random`,
                position: positions[Math.floor(Math.random() * positions.length)],
                department: dept,
                status: status,
                joinDate: pastDate
            });
        }

        // Ensure specific data from screenshot exists at the top for visual match
        data.unshift(
            { id: 'SHP-0098', name: 'Andi Setiawan', email: 'andi@abpe.com', avatar: 'https://ui-avatars.com/api/?name=Andi+Setiawan&background=EBF4FF&color=3b82f6', position: 'Web Developer', department: 'IT', status: 'Full-Time', joinDate: new Date('2024-01-10') },
            { id: 'SHP-0097', name: 'Dita Anjani', email: 'dita@abpe.com', avatar: 'https://ui-avatars.com/api/?name=Dita+Anjani&background=random', position: 'HR Manager', department: 'Human Resources', status: 'Full-Time', joinDate: new Date('2023-06-22') },
            { id: 'SHP-0096', name: 'Agung Pratama', email: 'agung@abpe.com', avatar: 'https://ui-avatars.com/api/?name=Agung+Pratama&background=random', position: 'Sales Executive', department: 'Sales', status: 'Full-Time', joinDate: new Date('2024-03-17') },
            { id: 'SHP-0095', name: 'Sari Lestari', email: 'sari@abpe.com', avatar: 'https://ui-avatars.com/api/?name=Sari+Lestari&background=random', position: 'Customer Service', department: 'Customer Support', status: 'Full-Time', joinDate: new Date('2023-01-05') },
            { id: 'SHP-0094', name: 'Ricky Wijaya', email: 'ricky@abpe.com', avatar: 'https://ui-avatars.com/api/?name=Ricky+Wijaya&background=random', position: 'Warehouse Staff', department: 'Warehouse', status: 'Part-Time', joinDate: new Date('2026-02-12') }
        );

        this.state.data = data;
    }

    formatDateIndo(dateStr) {
        const date = new Date(dateStr);
        const months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
        return `${date.getDate()} ${months[date.getMonth()]} ${date.getFullYear()}`;
    }

    getBadgeClass(status) {
        switch(status) {
            case 'Full-Time': return 'badge--full-time';
            case 'Part-Time': return 'badge--part-time';
            case 'On Leave': return 'badge--on-leave';
            default: return 'badge--full-time';
        }
    }

    applyFilters() {
        const { department, status, search } = this.state.filters;

        this.state.filteredData = this.state.data.filter(emp => {
            const matchDept = department === 'Semua' || emp.department === department;
            const matchStatus = status === 'Semua' || emp.status === status;
            const matchSearch = emp.name.toLowerCase().includes(search) || emp.id.toLowerCase().includes(search);

            return matchDept && matchStatus && matchSearch;
        });

        this.state.currentPage = 1; // Reset to page 1 on filter
        this.updateSummaryCards();
        this.renderTable();
    }

    updateSummaryCards() {
        const total = this.state.filteredData.length;
        let full = 0, part = 0, leave = 0;

        this.state.filteredData.forEach(emp => {
            if (emp.status === 'Full-Time') full++;
            else if (emp.status === 'Part-Time') part++;
            else if (emp.status === 'On Leave') leave++;
        });

        this.dom.filterCount.textContent = total;
        this.dom.valTotal.textContent = total;
        this.dom.valFullTime.textContent = full;
        this.dom.valPartTime.textContent = part;
        this.dom.valOnLeave.textContent = leave;
    }

    renderTable() {
        const start = (this.state.currentPage - 1) * this.state.itemsPerPage;
        const end = start + this.state.itemsPerPage;
        const paginatedData = this.state.filteredData.slice(start, end);

        this.dom.tbody.innerHTML = '';

        if (paginatedData.length === 0) {
            this.dom.tbody.innerHTML = `<tr><td colspan="7" style="text-align: center; color: var(--gray);">Data tidak ditemukan</td></tr>`;
            this.renderPagination(0);
            return;
        }

        const fragment = document.createDocumentFragment();

        paginatedData.forEach(emp => {
            const tr = document.createElement('tr');

            tr.innerHTML = `
                <td class="td-id">${emp.id}</td>
                <td>
                    <div class="employee-cell">
                        <img src="${emp.avatar}" alt="${emp.name}" class="employee-avatar">
                        <div class="employee-info">
                            <span class="employee-name">${emp.name}</span>
                            <span class="employee-email">${emp.email}</span>
                        </div>
                    </div>
                </td>
                <td>
                    <div class="position-cell">
                        <span class="position-title">${emp.position}</span>
                        <span class="position-dept-badge">${emp.department}</span>
                    </div>
                </td>
                <td>${emp.department}</td>
                <td><span class="badge ${this.getBadgeClass(emp.status)}">${emp.status}</span></td>
                <td>${this.formatDateIndo(emp.joinDate)}</td>
                <td>
                    <button class="btn btn--primary btn-detail" data-id="${emp.id}" style="padding: 6px 12px; font-size: 12px;">Detail ></button>
                </td>
            `;
            fragment.appendChild(tr);
        });

        this.dom.tbody.appendChild(fragment);
        this.renderPagination(this.state.filteredData.length);
    }

    renderPagination(totalItems) {
        if (totalItems === 0) {
            this.dom.paginationInfo.textContent = `0 dari 0`;
            this.dom.paginationControls.innerHTML = '';
            return;
        }

        const totalPages = Math.ceil(totalItems / this.state.itemsPerPage);
        const start = (this.state.currentPage - 1) * this.state.itemsPerPage + 1;
        const end = Math.min(start + this.state.itemsPerPage - 1, totalItems);

        this.dom.paginationInfo.textContent = `${start}-${end} dari ${totalItems}`;

        let buttonsHTML = '';

        // Prev button
        buttonsHTML += `<button class="page-btn" ${this.state.currentPage === 1 ? 'disabled' : ''} data-page="${this.state.currentPage - 1}">&laquo;</button>`;

        // Build logic for pagination visual: << 1 2 3 ... 10 >>
        let pagesToShow = [];
        if (totalPages <= 5) {
            for (let i = 1; i <= totalPages; i++) pagesToShow.push(i);
        } else {
            if (this.state.currentPage <= 3) {
                pagesToShow = [1, 2, 3, '...', totalPages];
            } else if (this.state.currentPage >= totalPages - 2) {
                pagesToShow = [1, '...', totalPages - 2, totalPages - 1, totalPages];
            } else {
                pagesToShow = [1, '...', this.state.currentPage, '...', totalPages];
            }
        }

        pagesToShow.forEach(p => {
            if (p === '...') {
                buttonsHTML += `<button class="page-btn" disabled>...</button>`;
            } else {
                const activeClass = p === this.state.currentPage ? 'page-btn--active' : '';
                buttonsHTML += `<button class="page-btn ${activeClass}" data-page="${p}">${p}</button>`;
            }
        });

        // Next button
        buttonsHTML += `<button class="page-btn" ${this.state.currentPage === totalPages ? 'disabled' : ''} data-page="${this.state.currentPage + 1}">&raquo;</button>`;

        this.dom.paginationControls.innerHTML = buttonsHTML;

        // Attach events to pagination buttons
        this.dom.paginationControls.querySelectorAll('.page-btn:not([disabled])').forEach(btn => {
            btn.addEventListener('click', (e) => {
                const newPage = parseInt(e.currentTarget.getAttribute('data-page'));
                if (newPage && newPage !== this.state.currentPage) {
                    this.state.currentPage = newPage;
                    this.renderTable();
                }
            });
        });
    }
}

// Initialize when DOM is ready
document.addEventListener('DOMContentLoaded', () => {
    new EmployeeManager();
});
