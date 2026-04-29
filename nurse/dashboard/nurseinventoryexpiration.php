<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="0">
    <title>Inventory Expiration | PUPBC CareLink</title>
    
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
            --expired-bg: #fee2e2;
            --expired-text: #c0392b;
            --stable-bg: #e3f7ec;
            --stable-text: #2e7d32;
            --warning-bg: #fff3e0;
            --warning-text: #e67e22;
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
            color: var(--medical-blue);
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

        /* Expiration status badges */
        .exp-status-badge {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 5px 12px;
            border-radius: 30px;
            font-weight: 600;
            font-size: 0.7rem;
        }
        .status-expired {
            background: var(--expired-bg);
            color: var(--expired-text);
        }
        .status-stable {
            background: var(--stable-bg);
            color: var(--stable-text);
        }
        .status-warning {
            background: var(--warning-bg);
            color: var(--warning-text);
        }

        /* Release Button */
        .btn-release-drug {
            background: rgba(192, 57, 43, 0.1);
            color: var(--expired-text);
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
        .btn-release-drug:hover {
            background: var(--expired-text);
            color: white;
            transform: translateY(-1px);
            box-shadow: 0 4px 10px rgba(192, 57, 43, 0.2);
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
            margin-bottom: 0;
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
            width: 120px;
            font-weight: 600;
            color: var(--text-muted);
            font-size: 0.8rem;
        }
        .detail-value {
            flex: 1;
            font-weight: 500;
            color: var(--brand-primary);
        }
        .warning-note {
            background: var(--warning-bg);
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
                <input type="text" class="search-box" id="searchExpirationInput" placeholder="Search drugs...">
            </div>
        </div>

        <!-- COUNTER + PAGINATION (fixed row) -->
        <div class="counter-pagination-row">
            <div class="total-counter" id="totalDrugCounter">
                <i class="fa-solid fa-capsules"></i> 
                Total Drugs: <span id="totalCount">0</span>
            </div>
            <div class="pagination-wrapper" id="paginationControlsTop">
                <!-- pagination injected -->
            </div>
        </div>

        <div class="separator-line"></div>

        <!-- TABLE CONTAINER with sortable columns -->
        <div class="table-responsive-custom">
            <table class="table table-custom" id="expirationTable">
                <thead>
                    <tr>
                        <th class="sortable-header" data-sort="drugName">Drug Details <span class="sort-icon"><i class="fa-solid fa-arrow-down-wide-short"></i></span></th>
                        <th class="sortable-header" data-sort="drugId">Drug ID <span class="sort-icon"><i class="fa-solid fa-arrow-down-wide-short"></i></span></th>
                        <th class="sortable-header" data-sort="dosage">Dosage <span class="sort-icon"><i class="fa-solid fa-arrow-down-wide-short"></i></span></th>
                        <th class="sortable-header" data-sort="quantity">Drug Quantity <span class="sort-icon"><i class="fa-solid fa-arrow-down-wide-short"></i></span></th>
                        <th class="sortable-header" data-sort="expDate">Expiration Date <span class="sort-icon"><i class="fa-solid fa-arrow-down-wide-short"></i></span></th>
                        <th class="sortable-header" data-sort="expStatus">Expiration Status <span class="sort-icon"><i class="fa-solid fa-arrow-down-wide-short"></i></span></th>
                        <th style="width: 110px; text-align: center;">Action</th>
                    </tr>
                </thead>
                <tbody id="expirationTableBody">
                    <!-- dynamic rows: 4 per page -->
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- RELEASE MODAL (confirm release/disposal of expired drug) -->
<div class="modal fade top-aligned-modal" id="releaseDrugModal" tabindex="-1" aria-hidden="true" data-bs-backdrop="static">
    <div class="modal-dialog modal-dialog-centered modal-md">
        <div class="modal-content">
            <div class="modal-header" style="background: var(--expired-text); color: white; border-radius: 20px 20px 0 0;">
                <h5 class="modal-title"><i class="fa-solid fa-trash-can me-2"></i>Release Expired Drug</h5>
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
                    <div class="detail-label">Current Quantity:</div>
                    <div class="detail-value" id="modalQuantity">-</div>
                </div>
                <div class="detail-row">
                    <div class="detail-label">Expiration Date:</div>
                    <div class="detail-value" id="modalExpDate">-</div>
                </div>
                <div class="detail-row">
                    <div class="detail-label">Status:</div>
                    <div class="detail-value" id="modalExpStatus">-</div>
                </div>
                <div class="warning-note mt-3">
                    <i class="fa-solid fa-triangle-exclamation me-2"></i>
                    <strong>Release Action:</strong> This will permanently remove the expired drug from the inventory. This action cannot be undone.
                </div>
            </div>
            <div class="modal-footer" style="border-top: none; justify-content: space-between;">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-danger" id="confirmReleaseBtn"><i class="fa-solid fa-box-open me-1"></i> Confirm Release</button>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    // ============================================================
    // NURSE INVENTORY EXPIRATION MANAGEMENT
    // Features: Total counter, search, sortable columns
    // Columns: Drug Details (icon+name), Drug ID, Dosage, Quantity, Expiration Date, Expiration Status, Action (Release button)
    // Expiration Status Logic: 
    //   - "expired" if expiration date is today or in the past
    //   - "warning" if within 30 days from today (approaching expiry)
    //   - "stable" if more than 30 days away
    // Release action: Permanently removes the drug from inventory.
    // Pagination: max 4 items per page, fixed positioning.
    // ============================================================

    // Sample drug inventory with expiration dates
    let drugExpirationList = [
        { id: "exp1", drugName: "Paracetamol", drugId: "2026-00001-RX-0", dosage: "500mg", quantity: 245, expDate: "2026-12-15" },
        { id: "exp2", drugName: "Ibuprofen", drugId: "2026-00002-RX-0", dosage: "400mg", quantity: 12, expDate: "2026-05-10" },
        { id: "exp3", drugName: "Amoxicillin", drugId: "2026-00003-RX-0", dosage: "250mg", quantity: 0, expDate: "2025-11-20" },
        { id: "exp4", drugName: "Cetirizine", drugId: "2026-00004-RX-0", dosage: "10mg", quantity: 87, expDate: "2027-01-30" },
        { id: "exp5", drugName: "Metformin", drugId: "2026-00005-RX-0", dosage: "850mg", quantity: 32, expDate: "2026-04-28" },
        { id: "exp6", drugName: "Loperamide", drugId: "2026-00006-RX-0", dosage: "2mg", quantity: 8, expDate: "2025-12-01" },
        { id: "exp7", drugName: "Aspirin", drugId: "2026-00007-RX-0", dosage: "100mg", quantity: 120, expDate: "2026-08-14" },
        { id: "exp8", drugName: "Omeprazole", drugId: "2026-00008-RX-0", dosage: "20mg", quantity: 45, expDate: "2026-04-05" },
        { id: "exp9", drugName: "Salbutamol", drugId: "2026-00009-RX-0", dosage: "100mcg", quantity: 54, expDate: "2027-02-18" },
        { id: "exp10", drugName: "Losartan", drugId: "2026-00010-RX-0", dosage: "50mg", quantity: 3, expDate: "2026-03-20" },
        { id: "exp11", drugName: "Ciprofloxacin", drugId: "2026-00011-RX-0", dosage: "500mg", quantity: 210, expDate: "2026-09-12" },
        { id: "exp12", drugName: "Diazepam", drugId: "2026-00012-RX-0", dosage: "5mg", quantity: 15, expDate: "2025-10-10" }
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

    // Refresh statuses for all drugs
    function refreshAllExpirationStatuses() {
        drugExpirationList.forEach(drug => {
            drug.expStatus = getExpirationStatus(drug.expDate);
        });
    }

    // Get status badge HTML
    function getExpStatusBadgeHtml(status) {
        if (status === "expired") {
            return `<span class="exp-status-badge status-expired"><i class="fa-solid fa-skull-crossbones"></i> Expired</span>`;
        } else if (status === "warning") {
            return `<span class="exp-status-badge status-warning"><i class="fa-solid fa-clock"></i> Approaching Expiry</span>`;
        } else {
            return `<span class="exp-status-badge status-stable"><i class="fa-solid fa-check-circle"></i> Stable</span>`;
        }
    }

    const ITEMS_PER_PAGE = 4;
    let currentPage = 1;
    let currentFilteredList = [];
    let currentSort = { column: 'drugName', direction: 'asc' };

    // Filter + Search
    function getFilteredDrugs() {
        const searchTerm = document.getElementById('searchExpirationInput')?.value.toLowerCase().trim() || '';
        if (!searchTerm) return [...drugExpirationList];
        
        return drugExpirationList.filter(drug => 
            drug.drugName.toLowerCase().includes(searchTerm) ||
            drug.drugId.toLowerCase().includes(searchTerm) ||
            drug.dosage.toLowerCase().includes(searchTerm) ||
            drug.expDate.includes(searchTerm) ||
            drug.expStatus.toLowerCase().includes(searchTerm)
        );
    }

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
                case 'expDate': valA = new Date(a.expDate); valB = new Date(b.expDate); break;
                case 'expStatus': 
                    const order = { 'expired': 1, 'warning': 2, 'stable': 3 };
                    valA = order[a.expStatus] || 0;
                    valB = order[b.expStatus] || 0;
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
        const totalItems = currentFilteredList.length;
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
        const totalPages = Math.max(1, Math.ceil(currentFilteredList.length / ITEMS_PER_PAGE));
        if (page < 1 || page > totalPages) return;
        currentPage = page;
        renderExpirationTable();
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
    function renderExpirationTable() {
        const tbody = document.getElementById('expirationTableBody');
        if (!tbody) return;

        // Refresh expiration statuses dynamically based on current date
        refreshAllExpirationStatuses();
        
        let filtered = getFilteredDrugs();
        filtered = applySorting(filtered, currentSort);
        currentFilteredList = filtered;
        
        // Update total drug counter (original full list length)
        document.getElementById('totalCount').innerText = drugExpirationList.length;
        
        const totalPages = Math.max(1, Math.ceil(filtered.length / ITEMS_PER_PAGE));
        if (currentPage > totalPages) currentPage = totalPages;
        if (currentPage < 1) currentPage = 1;
        
        const startIdx = (currentPage - 1) * ITEMS_PER_PAGE;
        const pageItems = filtered.slice(startIdx, startIdx + ITEMS_PER_PAGE);
        
        if (pageItems.length === 0) {
            tbody.innerHTML = `<tr><td colspan="7" class="text-center py-5"><div class="empty-state"><i class="fa-solid fa-capsules fa-3x mb-3 opacity-50"></i><p class="mb-0">No drugs found in expiration inventory.</p><small class="text-muted">All drugs are up to date.</small></div></td></tr>`;
            renderPaginationControls();
            return;
        }
        
        tbody.innerHTML = pageItems.map(drug => {
            const drugIcon = getDrugIconClass(drug.drugName);
            const statusBadge = getExpStatusBadgeHtml(drug.expStatus);
            const formattedExpDate = drug.expDate;
            // Only show release button for expired drugs (optional: show for all but we follow requirement)
            // Requirement: "release" button for expiration of drug. We'll show for all but action differs.
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
                <td>${escapeHtml(formattedExpDate)}</td>
                <td>${statusBadge}</td>
                <td style="text-align: center;">
                    <button class="btn-release-drug" onclick="openReleaseModal('${drug.id}')">
                        <i class="fa-solid fa-box-open"></i> Release
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
        renderExpirationTable();
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
                renderExpirationTable();
            });
        });
    }
    
    // Search listener
    function setupSearchListener() {
        const searchInput = document.getElementById('searchExpirationInput');
        if (searchInput) {
            searchInput.addEventListener('input', () => {
                currentPage = 1;
                renderExpirationTable();
            });
        }
    }
    
    // ---------- RELEASE MODAL LOGIC (removes drug permanently) ----------
    let releaseModalInstance;
    let currentReleaseDrug = null;
    
    window.openReleaseModal = function(drugId) {
        const drug = drugExpirationList.find(d => d.id === drugId);
        if (!drug) return;
        currentReleaseDrug = drug;
        
        // Fill modal with details
        document.getElementById('modalDrugName').innerText = drug.drugName;
        document.getElementById('modalDrugId').innerText = drug.drugId;
        document.getElementById('modalDosage').innerText = drug.dosage;
        document.getElementById('modalQuantity').innerText = `${drug.quantity} units`;
        document.getElementById('modalExpDate').innerText = drug.expDate;
        let statusText = "";
        if (drug.expStatus === "expired") statusText = "Expired";
        else if (drug.expStatus === "warning") statusText = "Approaching Expiry";
        else statusText = "Stable";
        document.getElementById('modalExpStatus').innerHTML = `<span class="exp-status-badge ${drug.expStatus === 'expired' ? 'status-expired' : (drug.expStatus === 'warning' ? 'status-warning' : 'status-stable')}">${statusText}</span>`;
        
        releaseModalInstance.show();
    };
    
    function executeRelease() {
        if (!currentReleaseDrug) return;
        
        // Remove drug permanently from inventory
        const index = drugExpirationList.findIndex(d => d.id === currentReleaseDrug.id);
        if (index !== -1) {
            drugExpirationList.splice(index, 1);
            refreshTable();
            showToastMessage(`Drug "${currentReleaseDrug.drugName}" has been released from inventory.`, "success");
        }
        
        releaseModalInstance.hide();
        currentReleaseDrug = null;
    }
    
    function showToastMessage(message, type) {
        const toast = document.createElement('div');
        toast.className = 'position-fixed bottom-0 end-0 p-3';
        toast.style.zIndex = '9999';
        let bgClass = 'bg-success';
        let icon = 'fa-check-circle';
        if (type === 'danger') { bgClass = 'bg-danger'; icon = 'fa-exclamation-circle'; }
        if (type === 'info') { bgClass = 'bg-info'; icon = 'fa-info-circle'; }
        toast.innerHTML = `
            <div class="toast align-items-center text-white ${bgClass} border-0" role="alert" aria-live="assertive" aria-atomic="true" data-bs-autohide="true" data-bs-delay="2000">
                <div class="d-flex">
                    <div class="toast-body">
                        <i class="fa-solid ${icon} me-2"></i>
                        ${message}
                    </div>
                    <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"></button>
                </div>
            </div>
        `;
        document.body.appendChild(toast);
        const bsToast = new bootstrap.Toast(toast.querySelector('.toast'), { autohide: true, delay: 2000 });
        bsToast.show();
        toast.addEventListener('hidden.bs.toast', () => toast.remove());
    }
    
    // Initialize
    document.addEventListener('DOMContentLoaded', () => {
        releaseModalInstance = new bootstrap.Modal(document.getElementById('releaseDrugModal'), { backdrop: 'static', keyboard: false });
        document.getElementById('confirmReleaseBtn').addEventListener('click', executeRelease);
        setupSearchListener();
        initSorting();
        refreshAllExpirationStatuses();
        renderExpirationTable();
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