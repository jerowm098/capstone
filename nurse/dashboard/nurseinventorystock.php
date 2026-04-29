<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="0">
    <title>Nurse Inventory Stock | PUPBC CareLink</title>
    
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
            --warning-yellow: #e67e22;
            --danger-red: #c0392b;
            --info-badge: #eaf2f8;
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

        /* Stock level badges */
        .stock-badge {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 5px 12px;
            border-radius: 30px;
            font-weight: 600;
            font-size: 0.7rem;
            background: #f0f0f0;
            color: #2c3e50;
        }
        .stock-instock {
            background: #e3f7ec;
            color: #2e7d32;
        }
        .stock-lowstock {
            background: #fff3e0;
            color: #e67e22;
        }
        .stock-outofstock {
            background: #ffe6e5;
            color: #c0392b;
        }

        /* Register Button */
        .btn-register-drug {
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
        .btn-register-drug:hover {
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
            width: 110px;
            font-weight: 600;
            color: var(--text-muted);
            font-size: 0.8rem;
        }
        .detail-value {
            flex: 1;
            font-weight: 500;
            color: var(--brand-primary);
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
                <input type="text" class="search-box" id="searchDrugInput" placeholder="Search drugs...">
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
            <table class="table table-custom" id="inventoryTable">
                <thead>
                    <tr>
                        <th class="sortable-header" data-sort="drugName">Drug Details <span class="sort-icon"><i class="fa-solid fa-arrow-down-wide-short"></i></span></th>
                        <th class="sortable-header" data-sort="drugId">Drug ID <span class="sort-icon"><i class="fa-solid fa-arrow-down-wide-short"></i></span></th>
                        <th class="sortable-header" data-sort="dosage">Dosage <span class="sort-icon"><i class="fa-solid fa-arrow-down-wide-short"></i></span></th>
                        <th class="sortable-header" data-sort="quantity">Drug Quantity <span class="sort-icon"><i class="fa-solid fa-arrow-down-wide-short"></i></span></th>
                        <th class="sortable-header" data-sort="stockLevel">Stock Level <span class="sort-icon"><i class="fa-solid fa-arrow-down-wide-short"></i></span></th>
                        <th style="width: 110px; text-align: center;">Action</th>
                    </tr>
                </thead>
                <tbody id="inventoryTableBody">
                    <!-- dynamic rows: 4 per page -->
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- REGISTER DRUG MODAL (Add new drug) -->
<div class="modal fade top-aligned-modal" id="registerDrugModal" tabindex="-1" aria-hidden="true" data-bs-backdrop="static">
    <div class="modal-dialog modal-dialog-centered modal-md">
        <div class="modal-content">
            <div class="modal-header" style="background: var(--brand-primary); color: white; border-radius: 20px 20px 0 0;">
                <h5 class="modal-title"><i class="fa-solid fa-prescription-bottle me-2"></i>Register New Drug</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body" style="padding: 1.5rem;">
                <div class="mb-3">
                    <label class="form-label fw-semibold">Drug Name *</label>
                    <input type="text" class="form-control" id="regDrugName" placeholder="e.g., Paracetamol">
                </div>
                <div class="mb-3">
                    <label class="form-label fw-semibold">Drug ID *</label>
                    <input type="text" class="form-control" id="regDrugId" placeholder="e.g., 2026-00123-RX-0">
                </div>
                <div class="mb-3">
                    <label class="form-label fw-semibold">Dosage *</label>
                    <input type="text" class="form-control" id="regDosage" placeholder="e.g., 500mg">
                </div>
                <div class="mb-3">
                    <label class="form-label fw-semibold">Quantity *</label>
                    <input type="number" class="form-control" id="regQuantity" placeholder="e.g., 120">
                </div>
            </div>
            <div class="modal-footer" style="border-top: none;">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" id="confirmRegisterBtn" style="background: var(--medical-blue);"><i class="fa-solid fa-check-circle me-1"></i> Register Drug</button>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    // ============================================================
    // NURSE INVENTORY STOCK MANAGEMENT
    // Features: Total counter, search, sortable columns (click header)
    // Table columns: Drug Details (icon + name), Drug ID, Dosage, Drug Quantity, Stock Level, Action (Register)
    // Pagination: max 4 items per page, fixed pagination position
    // Register modal: adds new drug with auto stock level logic.
    // ============================================================

    let drugInventory = [
        { id: "drug1", drugName: "Paracetamol", drugId: "2026-00001-RX-0", dosage: "500mg", quantity: 245, stockLevel: "in stock" },
        { id: "drug2", drugName: "Ibuprofen", drugId: "2026-00002-RX-0", dosage: "400mg", quantity: 12, stockLevel: "low stock" },
        { id: "drug3", drugName: "Amoxicillin", drugId: "2026-00003-RX-0", dosage: "250mg", quantity: 0, stockLevel: "out of stock" },
        { id: "drug4", drugName: "Cetirizine", drugId: "2026-00004-RX-0", dosage: "10mg", quantity: 87, stockLevel: "in stock" },
        { id: "drug5", drugName: "Metformin", drugId: "2026-00005-RX-0", dosage: "850mg", quantity: 32, stockLevel: "in stock" },
        { id: "drug6", drugName: "Loperamide", drugId: "2026-00006-RX-0", dosage: "2mg", quantity: 8, stockLevel: "low stock" },
        { id: "drug7", drugName: "Aspirin", drugId: "2026-00007-RX-0", dosage: "100mg", quantity: 120, stockLevel: "in stock" },
        { id: "drug8", drugName: "Omeprazole", drugId: "2026-00008-RX-0", dosage: "20mg", quantity: 0, stockLevel: "out of stock" },
        { id: "drug9", drugName: "Salbutamol", drugId: "2026-00009-RX-0", dosage: "100mcg", quantity: 54, stockLevel: "in stock" },
        { id: "drug10", drugName: "Losartan", drugId: "2026-00010-RX-0", dosage: "50mg", quantity: 3, stockLevel: "low stock" },
        { id: "drug11", drugName: "Ciprofloxacin", drugId: "2026-00011-RX-0", dosage: "500mg", quantity: 210, stockLevel: "in stock" }
    ];

    const ITEMS_PER_PAGE = 4;
    let currentPage = 1;
    let currentFilteredList = [];
    let currentSort = { column: 'drugName', direction: 'asc' }; // default sort by drug name asc
    
    // Helper: determine stock level based on quantity
    function getStockLevelFromQuantity(qty) {
        if (qty <= 0) return "out of stock";
        if (qty <= 10) return "low stock";
        return "in stock";
    }

    // update stock level for all drugs (safety)
    function refreshStockLevels() {
        drugInventory.forEach(drug => {
            drug.stockLevel = getStockLevelFromQuantity(drug.quantity);
        });
    }

    // Filter + Search
    function getFilteredDrugs() {
        const searchTerm = document.getElementById('searchDrugInput')?.value.toLowerCase().trim() || '';
        if (!searchTerm) return [...drugInventory];
        
        return drugInventory.filter(drug => 
            drug.drugName.toLowerCase().includes(searchTerm) ||
            drug.drugId.toLowerCase().includes(searchTerm) ||
            drug.dosage.toLowerCase().includes(searchTerm) ||
            drug.stockLevel.toLowerCase().includes(searchTerm) ||
            drug.quantity.toString().includes(searchTerm)
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
                case 'stockLevel': 
                    const order = { 'in stock': 1, 'low stock': 2, 'out of stock': 3 };
                    valA = order[a.stockLevel] || 0;
                    valB = order[b.stockLevel] || 0;
                    break;
                default: valA = a.drugName; valB = b.drugName;
            }
            if (valA < valB) return direction === 'asc' ? -1 : 1;
            if (valA > valB) return direction === 'asc' ? 1 : -1;
            return 0;
        });
    }

    // Pagination controls rendering (fixed height)
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
        renderInventoryTable();
    }

    // Helper to get drug icon based on drug name (simple FontAwesome mapping)
    function getDrugIconClass(drugName) {
        const name = drugName.toLowerCase();
        if (name.includes('paracetamol') || name.includes('acetaminophen')) return 'fa-tablets';
        if (name.includes('ibuprofen')) return 'fa-capsules';
        if (name.includes('amoxicillin')) return 'fa-prescription-bottle';
        if (name.includes('cetirizine')) return 'fa-allergies';
        if (name.includes('metformin')) return 'fa-syringe';
        if (name.includes('aspirin')) return 'fa-pills';
        if (name.includes('salbutamol')) return 'fa-lungs';
        return 'fa-capsules';
    }

    // Stock badge HTML
    function getStockBadgeHtml(stockLevel) {
        let icon = '';
        let cls = '';
        if (stockLevel === 'in stock') {
            cls = 'stock-instock';
            icon = '<i class="fa-solid fa-check-circle"></i>';
        } else if (stockLevel === 'low stock') {
            cls = 'stock-lowstock';
            icon = '<i class="fa-solid fa-exclamation-triangle"></i>';
        } else {
            cls = 'stock-outofstock';
            icon = '<i class="fa-solid fa-ban"></i>';
        }
        return `<span class="stock-badge ${cls}">${icon} ${stockLevel.charAt(0).toUpperCase() + stockLevel.slice(1)}</span>`;
    }

    // Main table rendering
    function renderInventoryTable() {
        const tbody = document.getElementById('inventoryTableBody');
        if (!tbody) return;

        // 1. Filter
        let filtered = getFilteredDrugs();
        // 2. Apply sorting
        filtered = applySorting(filtered, currentSort);
        currentFilteredList = filtered;
        
        // update total drug counter (original full list length)
        document.getElementById('totalCount').innerText = drugInventory.length;
        
        const totalPages = Math.max(1, Math.ceil(filtered.length / ITEMS_PER_PAGE));
        if (currentPage > totalPages) currentPage = totalPages;
        if (currentPage < 1) currentPage = 1;
        
        const startIdx = (currentPage - 1) * ITEMS_PER_PAGE;
        const pageItems = filtered.slice(startIdx, startIdx + ITEMS_PER_PAGE);
        
        if (pageItems.length === 0) {
            tbody.innerHTML = `<tr><td colspan="6" class="text-center py-5"><div class="empty-state"><i class="fa-solid fa-capsules fa-3x mb-3 opacity-50"></i><p class="mb-0">No drugs found in inventory.</p><small class="text-muted">Click "Register" to add new medication.</small></div></td></tr>`;
            renderPaginationControls();
            return;
        }
        
        tbody.innerHTML = pageItems.map(drug => {
            const drugIcon = getDrugIconClass(drug.drugName);
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
                <td>${getStockBadgeHtml(drug.stockLevel)}</td>
                <td style="text-align: center;">
                    <button class="btn-register-drug" onclick="openRegisterModalForDrug('${drug.id}')">
                        <i class="fa-solid fa-pen-to-square"></i> Register
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
    
    function escapeHtml(str) {
        if (!str) return '';
        return str.replace(/[&<>]/g, m => ({ '&': '&amp;', '<': '&lt;', '>': '&gt;' }[m]));
    }
    
    function refreshTable() {
        currentPage = 1;
        renderInventoryTable();
    }
    
    // SORT event listeners
    function initSorting() {
        document.querySelectorAll('.sortable-header').forEach(header => {
            header.addEventListener('click', () => {
                const column = header.getAttribute('data-sort');
                if (currentSort.column === column) {
                    // toggle direction
                    currentSort.direction = currentSort.direction === 'asc' ? 'desc' : 'asc';
                } else {
                    currentSort.column = column;
                    currentSort.direction = 'asc';
                }
                currentPage = 1;
                renderInventoryTable();
            });
        });
    }
    
    // Search listener
    function setupSearchListener() {
        const searchInput = document.getElementById('searchDrugInput');
        if (searchInput) {
            searchInput.addEventListener('input', () => {
                currentPage = 1;
                renderInventoryTable();
            });
        }
    }
    
    // ---------- REGISTER MODAL (add new drug) ----------
    let registerModalInstance;
    let editingDrugId = null; // not used for editing but for consistency, we can add new drug always
    
    window.openRegisterModalForDrug = function(drugId) {
        // For simplicity, register a brand new drug (not editing existing)
        // Clear form fields
        document.getElementById('regDrugName').value = '';
        document.getElementById('regDrugId').value = '';
        document.getElementById('regDosage').value = '';
        document.getElementById('regQuantity').value = '';
        editingDrugId = null;
        registerModalInstance.show();
    };
    
    function addNewDrugFromModal() {
        const drugName = document.getElementById('regDrugName').value.trim();
        const drugId = document.getElementById('regDrugId').value.trim();
        const dosage = document.getElementById('regDosage').value.trim();
        let quantity = parseInt(document.getElementById('regQuantity').value, 10);
        
        if (!drugName || !drugId || !dosage || isNaN(quantity) || quantity < 0) {
            showToastMessage("Please fill all fields correctly (quantity must be a number).", "danger");
            return;
        }
        if (quantity < 0) quantity = 0;
        
        const stockLevel = getStockLevelFromQuantity(quantity);
        const newId = `drug_${Date.now()}_${Math.floor(Math.random() * 10000)}`;
        const newDrug = {
            id: newId,
            drugName: drugName,
            drugId: drugId,
            dosage: dosage,
            quantity: quantity,
            stockLevel: stockLevel
        };
        drugInventory.push(newDrug);
        refreshStockLevels();
        refreshTable();
        registerModalInstance.hide();
        showToastMessage(`Drug "${drugName}" registered successfully.`, "success");
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
    
    // Additional global "Register" from table also opens modal (could also be used to register new only)
    // On document load
    document.addEventListener('DOMContentLoaded', () => {
        registerModalInstance = new bootstrap.Modal(document.getElementById('registerDrugModal'), { backdrop: 'static', keyboard: false });
        document.getElementById('confirmRegisterBtn').addEventListener('click', addNewDrugFromModal);
        setupSearchListener();
        initSorting();
        refreshStockLevels();   // ensure initial stock levels based on quantity
        renderInventoryTable();
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