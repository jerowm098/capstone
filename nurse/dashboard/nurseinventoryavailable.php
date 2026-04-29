<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="0">
    <title>Inventory Available | PUPBC CareLink</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        :root {
            --standard-padding: 1.5rem;
            --border-subtle: 1px solid rgba(40, 49, 58, 0.1);
            --brand-primary: #28313a;      
            --medical-blue: #475867;        
            --medical-blue-dark: #1a2127; 
            --medical-blue-light: #667f94;
            --medical-blue-soft: rgba(71, 88, 103, 0.08); 
            --white: #ffffff;
            --text-main: #28313a;          
            --text-muted: #5c7285;     
            --clay-bg: #f4f7f6;
            --success-green: #28a745;
            --stable-bg: #e3f7ec;
            --stable-text: #2e7d32;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: transparent;
            color: var(--text-main);
            margin: 0;
            padding: 0;
        }

        .inventory-wrapper {
            width: 100%;
            background: transparent;
        }

        .form-content {
            padding: var(--standard-padding);
        }

        /* ===== SEARCH SECTION ===== */
        .search-section {
            display: flex;
            justify-content: flex-end;
            margin-bottom: 20px;
        }

        .search-wrapper {
            position: relative;
            display: inline-block;
        }

        .search-box {
            background: var(--clay-bg);
            border: 1px solid rgba(0,0,0,0.05);
            border-radius: 10px;
            padding: 8px 15px 8px 38px;
            width: 300px;
            transition: 0.2s;
            font-family: 'Poppins', sans-serif;
            font-size: 0.85rem;
        }

        .search-box:focus {
            outline: none;
            border-color: var(--medical-blue-light);
            background: var(--white);
            box-shadow: none;
        }

        .search-icon {
            position: absolute;
            left: 14px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--text-muted);
            font-size: 0.85rem;
            pointer-events: none;
        }

        /* Counter + Pagination row (stable) */
        .counter-pagination-row {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            justify-content: space-between;
            gap: 15px;
            margin-bottom: 16px;
        }

        .total-counter {
            background: var(--medical-blue-soft);
            color: var(--medical-blue-dark);
            padding: 8px 18px;
            border-radius: 30px;
            font-size: 0.85rem;
            font-weight: 500;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            white-space: nowrap;
        }

        .total-counter i {
            color: var(--success-green);
            font-size: 1rem;
        }

        .pagination-wrapper {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            background: transparent;
            flex-wrap: wrap;
            justify-content: flex-end;
            min-height: 42px;
        }

        .pagination-btn {
            background: var(--white);
            border: 1px solid rgba(40, 49, 58, 0.2);
            color: var(--brand-primary);
            padding: 0.4rem 0.9rem;
            border-radius: 8px;
            font-weight: 500;
            font-size: 0.8rem;
            transition: all 0.2s ease;
            cursor: pointer;
            font-family: 'Poppins', sans-serif;
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }

        .pagination-btn i {
            font-size: 0.7rem;
        }

        .pagination-btn:hover:not(:disabled) {
            background-color: var(--brand-primary);
            border-color: var(--brand-primary);
            color: white;
            transform: translateY(-1px);
        }

        .pagination-btn:disabled {
            opacity: 0.45;
            cursor: not-allowed;
            background: #f1f2f4;
        }

        .page-number.active-page {
            background: var(--brand-primary);
            border-color: var(--brand-primary);
            color: white;
            font-weight: 600;
        }

        /* Separator line */
        .separator-line {
            border-bottom: var(--border-subtle);
            margin-bottom: 16px;
        }

        /* Sortable headers */
        .sortable-header {
            cursor: pointer;
            user-select: none;
            transition: background 0.2s;
        }
        .sortable-header:hover {
            background: rgba(71, 88, 103, 0.05);
        }
        .sort-icon {
            margin-left: 5px;
            font-size: 0.7rem;
            opacity: 0.6;
        }

        /* TABLE STYLES */
        .table-custom {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0 8px;
            margin-bottom: 0;
            font-size: 0.82rem;
        }

        .table-custom thead th {
            color: var(--text-muted);
            font-weight: 600;
            font-size: 0.77rem;
            text-transform: uppercase;
            padding: 10px 12px;
            border: none;
            background: transparent;
            letter-spacing: 0.3px;
            border-bottom: var(--border-subtle);
        }

        .table-custom tbody tr {
            background-color: var(--white);
            transition: all 0.2s ease;
            cursor: default;
        }

        .table-custom tbody tr:hover td {
            background-color: var(--medical-blue-soft) !important;
        }

        .table-custom td {
            padding: 12px 12px;
            vertical-align: middle;
            border-top: var(--border-subtle);
            border-bottom: var(--border-subtle);
            background-color: var(--white);
            font-size: 0.82rem;
        }

        .table-custom td:first-child { 
            border-left: var(--border-subtle); 
            border-radius: 10px 0 0 10px; 
        }
        .table-custom td:last-child { 
            border-right: var(--border-subtle); 
            border-radius: 0 10px 10px 0; 
        }

        /* Drug image icon + name container */
        .drug-info-wrapper {
            display: flex;
            align-items: center;
            gap: 12px;
        }
        .drug-icon {
            width: 38px;
            height: 38px;
            border-radius: 12px;
            background: var(--medical-blue-soft);
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--medical-blue);
            font-size: 1.2rem;
            flex-shrink: 0;
            transition: transform 0.2s;
        }
        .drug-icon:hover {
            transform: scale(1.03);
        }
        .drug-name {
            font-weight: 600;
            color: var(--brand-primary);
            font-size: 0.88rem;
        }

        /* Stock level badge - only "in stock" */
        .stock-badge {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 5px 12px;
            border-radius: 30px;
            font-weight: 600;
            font-size: 0.7rem;
            background: var(--stable-bg);
            color: var(--stable-text);
        }

        /* Expiration status badge - only "stable" */
        .exp-status-badge {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 5px 12px;
            border-radius: 30px;
            font-weight: 600;
            font-size: 0.7rem;
            background: var(--stable-bg);
            color: var(--stable-text);
        }

        /* View Button */
        .btn-view-drug {
            background: rgba(40, 49, 58, 0.08);
            color: var(--brand-primary);
            border: none;
            padding: 6px 16px;
            border-radius: 8px;
            font-weight: 500;
            font-size: 0.75rem;
            transition: all 0.2s ease;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            height: 33px;
        }
        .btn-view-drug:hover {
            background: var(--brand-primary);
            color: white;
            transform: translateY(-1px);
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        }

        .empty-state {
            text-align: center;
            padding: 2.5rem;
            color: var(--text-muted);
        }

        /* MODAL styling */
        .modal.top-aligned-modal .modal-dialog {
            margin-top: 0.5rem !important;
            align-items: flex-start !important;
        }
        .modal-content {
            border-radius: 20px;
            border: none;
        }
        .detail-row {
            display: flex;
            margin-bottom: 12px;
            border-bottom: 1px solid #f0f0f0;
            padding-bottom: 8px;
        }
        .detail-label {
            width: 130px;
            font-weight: 600;
            color: var(--text-muted);
            font-size: 0.8rem;
        }
        .detail-value {
            flex: 1;
            font-weight: 500;
            color: var(--brand-primary);
        }
        .info-note {
            background: var(--medical-blue-soft);
            padding: 10px;
            border-radius: 12px;
            font-size: 0.75rem;
        }

        @media (max-width: 768px) {
            .form-content {
                padding: 1rem;
            }
            .counter-pagination-row {
                flex-direction: column;
                align-items: stretch;
            }
            .total-counter {
                justify-content: center;
                width: fit-content;
                margin: 0 auto;
            }
            .pagination-wrapper {
                justify-content: center;
            }
            .search-section {
                justify-content: center;
            }
            .search-box {
                width: 100%;
            }
            .search-wrapper {
                width: 100%;
            }
            .table-responsive-custom {
                overflow-x: auto;
            }
        }
    </style>
</head>
<body>

<div class="inventory-wrapper">
    <div class="form-content">
        <!-- SEARCH BAR -->
        <div class="search-section">
            <div class="search-wrapper">
                <i class="fas fa-search search-icon"></i>
                <input type="text" class="search-box" id="searchAvailableInput" placeholder="Search drugs...">
            </div>
        </div>

        <!-- COUNTER + PAGINATION (fixed row) -->
        <div class="counter-pagination-row">
            <div class="total-counter" id="totalDrugCounter">
                <i class="fa-solid fa-check-circle"></i> 
                Available Drugs: <span id="totalCount">0</span>
            </div>
            <div class="pagination-wrapper" id="paginationControlsTop">
                <!-- pagination injected -->
            </div>
        </div>

        <div class="separator-line"></div>

        <!-- TABLE CONTAINER with sortable columns -->
        <div class="table-responsive-custom">
            <table class="table table-custom" id="availableTable">
                <thead>
                    <tr>
                        <th class="sortable-header" data-sort="drugName">Drug Details <span class="sort-icon"><i class="fa-solid fa-arrow-down-wide-short"></i></span></th>
                        <th class="sortable-header" data-sort="drugId">Drug ID <span class="sort-icon"><i class="fa-solid fa-arrow-down-wide-short"></i></span></th>
                        <th class="sortable-header" data-sort="dosage">Dosage <span class="sort-icon"><i class="fa-solid fa-arrow-down-wide-short"></i></span></th>
                        <th class="sortable-header" data-sort="quantity">Drug Quantity <span class="sort-icon"><i class="fa-solid fa-arrow-down-wide-short"></i></span></th>
                        <th class="sortable-header" data-sort="stockLevel">Stock Level <span class="sort-icon"><i class="fa-solid fa-arrow-down-wide-short"></i></span></th>
                        <th class="sortable-header" data-sort="expDate">Expiration Date <span class="sort-icon"><i class="fa-solid fa-arrow-down-wide-short"></i></span></th>
                        <th class="sortable-header" data-sort="expStatus">Expiration Status <span class="sort-icon"><i class="fa-solid fa-arrow-down-wide-short"></i></span></th>
                        <th style="width: 100px; text-align: center;">Action</th>
                    </tr>
                </thead>
                <tbody id="availableTableBody">
                    <!-- dynamic rows: 4 per page -->
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- VIEW DETAILS MODAL -->
<div class="modal fade top-aligned-modal" id="viewDrugModal" tabindex="-1" aria-hidden="true" data-bs-backdrop="static">
    <div class="modal-dialog modal-dialog-centered modal-md">
        <div class="modal-content">
            <div class="modal-header" style="background: var(--brand-primary); color: white; border-radius: 20px 20px 0 0;">
                <h5 class="modal-title"><i class="fa-solid fa-eye me-2"></i>Drug Details</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body" style="padding: 1.5rem;">
                <div class="detail-row">
                    <div class="detail-label">Drug Name:</div>
                    <div class="detail-value" id="modalDrugName">-</div>
                </div>
                <div class="detail-row">
                    <div class="detail-label">Drug ID:</div>
                    <div class="detail-value" id="modalDrugId">-</div>
                </div>
                <div class="detail-row">
                    <div class="detail-label">Dosage:</div>
                    <div class="detail-value" id="modalDosage">-</div>
                </div>
                <div class="detail-row">
                    <div class="detail-label">Quantity:</div>
                    <div class="detail-value" id="modalQuantity">-</div>
                </div>
                <div class="detail-row">
                    <div class="detail-label">Stock Level:</div>
                    <div class="detail-value" id="modalStockLevel">-</div>
                </div>
                <div class="detail-row">
                    <div class="detail-label">Expiration Date:</div>
                    <div class="detail-value" id="modalExpDate">-</div>
                </div>
                <div class="detail-row">
                    <div class="detail-label">Expiration Status:</div>
                    <div class="detail-value" id="modalExpStatus">-</div>
                </div>
                <!-- tinanggal ko ngaun -->
<!--                 <div class="info-note mt-3">
                    <i class="fa-solid fa-info-circle me-2"></i>
                    This drug is currently available and ready for dispensing.
                </div> -->
            </div>
            <div class="modal-footer" style="border-top: none;">
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal" style="background: var(--medical-blue);"><i class="fa-solid fa-check me-1"></i> Close</button>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    // ============================================================
    // NURSE INVENTORY AVAILABLE MANAGEMENT
    // Features: Only shows drugs with "in stock" stock level AND "stable" expiration status
    // Columns: Drug Details (icon+name), Drug ID, Dosage, Quantity, Stock Level (in stock only), 
    //          Expiration Date, Expiration Status (stable only), Action (View button)
    // Pagination: max 4 items per page, fixed positioning.
    // ============================================================

    // Complete drug inventory (master data)
    let masterDrugList = [
        { id: "drug1", drugName: "Paracetamol", drugId: "2026-00001-RX-0", dosage: "500mg", quantity: 245, expDate: "2026-12-15" },
        { id: "drug2", drugName: "Ibuprofen", drugId: "2026-00002-RX-0", dosage: "400mg", quantity: 12, expDate: "2026-05-10" },
        { id: "drug3", drugName: "Amoxicillin", drugId: "2026-00003-RX-0", dosage: "250mg", quantity: 0, expDate: "2025-11-20" },
        { id: "drug4", drugName: "Cetirizine", drugId: "2026-00004-RX-0", dosage: "10mg", quantity: 87, expDate: "2027-01-30" },
        { id: "drug5", drugName: "Metformin", drugId: "2026-00005-RX-0", dosage: "850mg", quantity: 32, expDate: "2026-04-28" },
        { id: "drug6", drugName: "Loperamide", drugId: "2026-00006-RX-0", dosage: "2mg", quantity: 8, expDate: "2025-12-01" },
        { id: "drug7", drugName: "Aspirin", drugId: "2026-00007-RX-0", dosage: "100mg", quantity: 120, expDate: "2026-08-14" },
        { id: "drug8", drugName: "Omeprazole", drugId: "2026-00008-RX-0", dosage: "20mg", quantity: 45, expDate: "2026-04-05" },
        { id: "drug9", drugName: "Salbutamol", drugId: "2026-00009-RX-0", dosage: "100mcg", quantity: 54, expDate: "2027-02-18" },
        { id: "drug10", drugName: "Losartan", drugId: "2026-00010-RX-0", dosage: "50mg", quantity: 3, expDate: "2026-03-20" },
        { id: "drug11", drugName: "Ciprofloxacin", drugId: "2026-00011-RX-0", dosage: "500mg", quantity: 210, expDate: "2026-09-12" },
        { id: "drug12", drugName: "Diazepam", drugId: "2026-00012-RX-0", dosage: "5mg", quantity: 15, expDate: "2025-10-10" }
    ];

    // Helper: Get current date (YYYY-MM-DD)
    function getTodayDate() {
        const today = new Date();
        return today.toISOString().split('T')[0];
    }

    // Calculate expiration status based on expDate string (YYYY-MM-DD)
    function getExpirationStatus(expDateStr) {
        const today = new Date();
        today.setHours(0, 0, 0, 0);
        const expDate = new Date(expDateStr);
        expDate.setHours(0, 0, 0, 0);
        
        if (expDate < today) return "expired";
        const diffTime = expDate - today;
        const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));
        if (diffDays <= 30) return "warning";
        return "stable";
    }

    // Get stock level based on quantity
    function getStockLevel(quantity) {
        if (quantity <= 0) return "out of stock";
        if (quantity <= 10) return "low stock";
        return "in stock";
    }

    // Filter available drugs: only "in stock" AND "stable" expiration status
    function getAvailableDrugs() {
        return masterDrugList.filter(drug => {
            const stockLevel = getStockLevel(drug.quantity);
            const expStatus = getExpirationStatus(drug.expDate);
            return stockLevel === "in stock" && expStatus === "stable";
        });
    }

    // Search within available drugs
    let currentAvailableList = [];
    
    function getFilteredAvailableDrugs() {
        const searchTerm = document.getElementById('searchAvailableInput')?.value.toLowerCase().trim() || '';
        const available = getAvailableDrugs();
        if (!searchTerm) return available;
        
        return available.filter(drug => 
            drug.drugName.toLowerCase().includes(searchTerm) ||
            drug.drugId.toLowerCase().includes(searchTerm) ||
            drug.dosage.toLowerCase().includes(searchTerm) ||
            drug.expDate.includes(searchTerm)
        );
    }

    const ITEMS_PER_PAGE = 4;
    let currentPage = 1;
    let currentSort = { column: 'drugName', direction: 'asc' };

    // Sorting logic
    function applySorting(list, sortConfig) {
        const { column, direction } = sortConfig;
        return [...list].sort((a, b) => {
            let valA, valB;
            switch(column) {
                case 'drugName': valA = a.drugName.toLowerCase(); valB = b.drugName.toLowerCase(); break;
                case 'drugId': valA = a.drugId; valB = b.drugId; break;
                case 'dosage': valA = a.dosage; valB = b.dosage; break;
                case 'quantity': valA = a.quantity; valB = b.quantity; break;
                case 'stockLevel': 
                    const order = { 'in stock': 1 };
                    valA = order[getStockLevel(a.quantity)] || 0;
                    valB = order[getStockLevel(b.quantity)] || 0;
                    break;
                case 'expDate': valA = new Date(a.expDate); valB = new Date(b.expDate); break;
                case 'expStatus':
                    const statusOrder = { 'stable': 1 };
                    valA = statusOrder[getExpirationStatus(a.expDate)] || 0;
                    valB = statusOrder[getExpirationStatus(b.expDate)] || 0;
                    break;
                default: valA = a.drugName; valB = b.drugName;
            }
            if (valA < valB) return direction === 'asc' ? -1 : 1;
            if (valA > valB) return direction === 'asc' ? 1 : -1;
            return 0;
        });
    }

    // Pagination controls rendering
    function renderPaginationControls() {
        const container = document.getElementById('paginationControlsTop');
        if (!container) return;
        const totalItems = currentAvailableList.length;
        const totalPages = Math.max(1, Math.ceil(totalItems / ITEMS_PER_PAGE));
        
        let html = `<button class="pagination-btn" id="prevPageBtn" ${currentPage === 1 ? 'disabled' : ''}><i class="fa-solid fa-chevron-left"></i> Prev</button>`;
        const maxVisible = 5;
        let startPage = Math.max(1, currentPage - Math.floor(maxVisible / 2));
        let endPage = Math.min(totalPages, startPage + maxVisible - 1);
        if (endPage - startPage + 1 < maxVisible) startPage = Math.max(1, endPage - maxVisible + 1);
        
        for (let i = startPage; i <= endPage; i++) {
            html += `<button class="pagination-btn page-number ${i === currentPage ? 'active-page' : ''}" data-page="${i}">${i}</button>`;
        }
        html += `<button class="pagination-btn" id="nextPageBtn" ${currentPage === totalPages ? 'disabled' : ''}>Next <i class="fa-solid fa-chevron-right"></i></button>`;
        container.innerHTML = html;
        
        document.getElementById('prevPageBtn')?.addEventListener('click', () => goToPage(currentPage - 1));
        document.getElementById('nextPageBtn')?.addEventListener('click', () => goToPage(currentPage + 1));
        document.querySelectorAll('.page-number').forEach(btn => {
            btn.addEventListener('click', () => {
                const page = parseInt(btn.dataset.page);
                if (!isNaN(page)) goToPage(page);
            });
        });
    }

    function goToPage(page) {
        const totalPages = Math.max(1, Math.ceil(currentAvailableList.length / ITEMS_PER_PAGE));
        if (page < 1 || page > totalPages) return;
        currentPage = page;
        renderAvailableTable();
    }

    // Helper to get drug icon
    function getDrugIconClass(drugName) {
        const name = drugName.toLowerCase();
        if (name.includes('paracetamol')) return 'fa-tablets';
        if (name.includes('ibuprofen')) return 'fa-capsules';
        if (name.includes('amoxicillin')) return 'fa-prescription-bottle';
        if (name.includes('cetirizine')) return 'fa-allergies';
        if (name.includes('metformin')) return 'fa-syringe';
        if (name.includes('aspirin')) return 'fa-pills';
        if (name.includes('salbutamol')) return 'fa-lungs';
        return 'fa-capsules';
    }

    function escapeHtml(str) {
        if (!str) return '';
        return str.replace(/[&<>]/g, m => ({ '&': '&amp;', '<': '&lt;', '>': '&gt;' }[m]));
    }

    // Main table rendering
    function renderAvailableTable() {
        const tbody = document.getElementById('availableTableBody');
        if (!tbody) return;

        let filtered = getFilteredAvailableDrugs();
        filtered = applySorting(filtered, currentSort);
        currentAvailableList = filtered;
        
        // Update total counter
        document.getElementById('totalCount').innerText = currentAvailableList.length;
        
        const totalPages = Math.max(1, Math.ceil(filtered.length / ITEMS_PER_PAGE));
        if (currentPage > totalPages) currentPage = totalPages;
        if (currentPage < 1) currentPage = 1;
        
        const startIdx = (currentPage - 1) * ITEMS_PER_PAGE;
        const pageItems = filtered.slice(startIdx, startIdx + ITEMS_PER_PAGE);
        
        if (pageItems.length === 0) {
            tbody.innerHTML = `<tr><td colspan="8" class="text-center py-5"><div class="empty-state"><i class="fa-solid fa-capsules fa-3x mb-3 opacity-50"></i><p class="mb-0">No available drugs found.</p><small class="text-muted">All drugs are either out of stock or expired.</small></div></td></tr>`;
            renderPaginationControls();
            return;
        }
        
        tbody.innerHTML = pageItems.map(drug => {
            const drugIcon = getDrugIconClass(drug.drugName);
            const stockLevel = getStockLevel(drug.quantity);
            const expStatus = getExpirationStatus(drug.expDate);
            const formattedExpDate = drug.expDate;
            
            return `<tr data-id="${drug.id}">
                <td>
                    <div class="drug-info-wrapper">
                        <div class="drug-icon"><i class="fa-solid ${drugIcon}"></i></div>
                        <span class="drug-name">${escapeHtml(drug.drugName)}</span>
                    </div>
                </td>
                <td><span class="lab-id-style" style="font-family: monospace;">${escapeHtml(drug.drugId)}</span></td>
                <td>${escapeHtml(drug.dosage)}</td>
                <td><strong>${drug.quantity}</strong> units</td>
                <td><span class="stock-badge"><i class="fa-solid fa-check-circle"></i> ${stockLevel}</span></td>
                <td>${escapeHtml(formattedExpDate)}</td>
                <td><span class="exp-status-badge"><i class="fa-solid fa-calendar-check"></i> ${expStatus}</span></td>
                <td style="text-align: center;">
                    <button class="btn-view-drug" onclick="openViewModal('${drug.id}')">
                        <i class="fa-solid fa-eye"></i> View
                    </button>
                </td>
             </tr>`;
        }).join('');
        
        renderPaginationControls();
        updateSortIcons();
    }
    
    function updateSortIcons() {
        document.querySelectorAll('.sortable-header').forEach(th => {
            const col = th.getAttribute('data-sort');
            const iconSpan = th.querySelector('.sort-icon');
            if (iconSpan) {
                if (currentSort.column === col) {
                    iconSpan.innerHTML = currentSort.direction === 'asc' ? '<i class="fa-solid fa-arrow-up-wide-short"></i>' : '<i class="fa-solid fa-arrow-down-wide-short"></i>';
                } else {
                    iconSpan.innerHTML = '<i class="fa-solid fa-arrow-down-wide-short"></i>';
                }
            }
        });
    }
    
    function refreshTable() {
        currentPage = 1;
        renderAvailableTable();
    }
    
    // SORT event listeners
    function initSorting() {
        document.querySelectorAll('.sortable-header').forEach(header => {
            header.addEventListener('click', () => {
                const column = header.getAttribute('data-sort');
                if (currentSort.column === column) {
                    currentSort.direction = currentSort.direction === 'asc' ? 'desc' : 'asc';
                } else {
                    currentSort.column = column;
                    currentSort.direction = 'asc';
                }
                currentPage = 1;
                renderAvailableTable();
            });
        });
    }
    
    // Search listener
    function setupSearchListener() {
        const searchInput = document.getElementById('searchAvailableInput');
        if (searchInput) {
            searchInput.addEventListener('input', () => {
                currentPage = 1;
                renderAvailableTable();
            });
        }
    }
    
    // ---------- VIEW MODAL LOGIC ----------
    let viewModalInstance;
    
    window.openViewModal = function(drugId) {
        const drug = masterDrugList.find(d => d.id === drugId);
        if (!drug) return;
        
        const stockLevel = getStockLevel(drug.quantity);
        const expStatus = getExpirationStatus(drug.expDate);
        
        document.getElementById('modalDrugName').innerText = drug.drugName;
        document.getElementById('modalDrugId').innerText = drug.drugId;
        document.getElementById('modalDosage').innerText = drug.dosage;
        document.getElementById('modalQuantity').innerText = `${drug.quantity} units`;
        document.getElementById('modalStockLevel').innerHTML = `<span class="stock-badge"><i class="fa-solid fa-check-circle"></i> ${stockLevel}</span>`;
        document.getElementById('modalExpDate').innerText = drug.expDate;
        document.getElementById('modalExpStatus').innerHTML = `<span class="exp-status-badge"><i class="fa-solid fa-calendar-check"></i> ${expStatus}</span>`;
        
        viewModalInstance.show();
    };
    
    // Initialize
    document.addEventListener('DOMContentLoaded', () => {
        viewModalInstance = new bootstrap.Modal(document.getElementById('viewDrugModal'), { backdrop: 'static', keyboard: false });
        setupSearchListener();
        initSorting();
        renderAvailableTable();
    });

        /* IMPORTANT SCRIPT */
    if (window.self === window.top) {
        const currentPagePath = window.location.pathname.split("/").pop();
        if (currentPagePath && !currentPagePath.includes('nursedashboard.php')) {
             window.location.href = "nursedashboard.php?page=nurseinventory.php&subpage=" + currentPagePath;
        }
    }
</script>
</body>
</html>