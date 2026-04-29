<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="0">
    <title>Processing List | PUPBC CareLink</title>
    
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
            --processing-badge: #e67e22;
            --processing-bg: #ffe8d6;
            --success-green: #28a745;
            --info-blue: #3498db;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: transparent;
            color: var(--text-main);
            margin: 0;
            padding: 0;
        }

        .appointments-wrapper {
            width: 100%;
            background: transparent;
        }

        .form-content {
            padding: var(--standard-padding);
        }

        /* SEARCH SECTION */
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

        /* Counter + Pagination row */
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
            color: var(--processing-badge);
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

        .separator-line {
            border-bottom: var(--border-subtle);
            margin-bottom: 16px;
        }

        /* Status badge for processing */
        .status-badge-processing {
            background: var(--processing-bg);
            color: var(--processing-badge);
            padding: 5px 12px;
            border-radius: 6px;
            font-size: 0.75rem;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            gap: 6px;
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

        .profile-avatar {
            width: 38px;
            height: 38px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 600;
            font-size: 0.9rem;
            color: white;
            background: var(--medical-blue);
            flex-shrink: 0;
            box-shadow: 0 2px 6px rgba(0,0,0,0.08);
            transition: transform 0.2s ease;
        }
        .profile-avatar:hover {
            transform: scale(1.05);
        }

        .student-info-wrapper {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .student-text {
            display: flex;
            flex-direction: column;
        }

        .patient-name {
            font-weight: 600;
            color: var(--brand-primary);
            display: block;
            font-size: 0.88rem;
        }

        .patient-id-text {
            font-size: 0.72rem;
            color: var(--text-muted);
        }

        .id-label {
            font-weight: 500;
            color: var(--medical-blue);
            margin-right: 4px;
        }

        .processing-id-style {
            font-family: monospace;
            font-weight: 600;
            letter-spacing: 0.3px;
            color: var(--medical-blue-dark);
            background: var(--medical-blue-soft);
            display: inline-block;
            padding: 4px 10px;
            border-radius: 20px;
            font-size: 0.75rem;
        }

        /* Action Button - Processing Button */
        .btn-process-action {
            background: rgba(52, 152, 219, 0.12);
            color: var(--info-blue);
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

        .btn-process-action:hover {
            background: var(--info-blue);
            color: white;
            transform: translateY(-1px);
            box-shadow: 0 4px 10px rgba(52, 152, 219, 0.2);
        }

        .empty-state {
            text-align: center;
            padding: 2.5rem;
            color: var(--text-muted);
        }

        /* MODAL top-aligned */
        .modal.top-aligned-modal .modal-dialog {
            margin-top: 0.5rem !important;
            margin-bottom: 0;
            align-items: flex-start !important;
        }
        .modal.top-aligned-modal .modal-dialog {
            display: flex;
            align-items: flex-start;
            min-height: calc(100% - 0.5rem);
        }
        .modal.top-aligned-modal .modal-content {
            box-shadow: 0 12px 28px rgba(0, 0, 0, 0.15);
            border-radius: 20px;
            border: none;
        }

        /* Modal details grid */
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

        @media (max-width: 1200px) {
            .table-custom td, .table-custom th {
                padding: 10px 8px;
            }
            .btn-process-action {
                padding: 5px 12px;
                font-size: 0.7rem;
            }
            .profile-avatar {
                width: 34px;
                height: 34px;
                font-size: 0.8rem;
            }
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
            .pagination-btn {
                padding: 0.3rem 0.7rem;
                font-size: 0.7rem;
            }
        }
    </style>
</head>
<body>

<div class="appointments-wrapper">
    <div class="form-content">
        <!-- SEARCH BAR SECTION -->
        <div class="search-section">
            <div class="search-wrapper">
                <i class="fas fa-search search-icon"></i>
                <input type="text" class="search-box" id="searchProcessingInput" placeholder="Search processing requests...">
            </div>
        </div>

        <!-- COUNTER + PAGINATION ROW -->
        <div class="counter-pagination-row">
            <div class="total-counter" id="totalProcessingCounter">
                <i class="fa-solid fa-spinner"></i> 
                Total Processing: <span id="totalCount">0</span>
            </div>
            <div class="pagination-wrapper" id="paginationControlsTop">
                <!-- pagination injected -->
            </div>
        </div>

        <!-- HORIZONTAL SEPARATOR LINE -->
        <div class="separator-line"></div>

        <!-- TABLE CONTAINER -->
        <div class="table-responsive-custom">
            <table class="table table-custom">
                <thead>
                    <tr>
                        <th>Patient Details</th>
                        <th>Request ID</th>
                        <th>Course & Department</th>
                        <th>Service Type</th>
                        <th>Assigned Staff</th>
                        <th>Status</th>
                        <th style="width: 130px; text-align: center;">Action</th>
                    </tr>
                </thead>
                <tbody id="processingTableBody">
                    <!-- dynamic rows max 4 per page -->
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- PROCESSING MODAL (popup with details and Complete Process button) -->
<div class="modal fade top-aligned-modal" id="processModal" tabindex="-1" aria-hidden="true" data-bs-backdrop="static">
    <div class="modal-dialog modal-dialog-centered modal-md">
        <div class="modal-content" style="border-radius: 20px;">
            <div class="modal-header" style="background: var(--processing-badge); color: white; border-radius: 20px 20px 0 0;">
                <h5 class="modal-title"><i class="fa-solid fa-gear me-2"></i>Processing Details</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body" style="padding: 1.5rem;">
                <div class="detail-row">
                    <div class="detail-label">Patient Name:</div>
                    <div class="detail-value" id="modalPatientName">-</div>
                </div>
                <div class="detail-row">
                    <div class="detail-label">Patient ID:</div>
                    <div class="detail-value" id="modalPatientId">-</div>
                </div>
                <div class="detail-row">
                    <div class="detail-label">Request ID:</div>
                    <div class="detail-value" id="modalRequestId">-</div>
                </div>
                <div class="detail-row">
                    <div class="detail-label">Course & Dept:</div>
                    <div class="detail-value" id="modalCourseDept">-</div>
                </div>
                <div class="detail-row">
                    <div class="detail-label">Service Type:</div>
                    <div class="detail-value" id="modalServiceType">-</div>
                </div>
                <div class="detail-row">
                    <div class="detail-label">Assigned Staff:</div>
                    <div class="detail-value" id="modalAssignedStaff">-</div>
                </div>
                <div class="mt-3 pt-2 text-muted small">
                    <i class="fa-regular fa-clock"></i> This request is currently being processed.
                </div>
            </div>
            <div class="modal-footer" style="border-top: none; justify-content: space-between;">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-warning" id="finalProcessBtn"><i class="fa-solid fa-check me-1"></i> Complete Process</button>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    // ============================================================
    // PROCESSING APPLICATION LIST
    // Max 4 items per page. Status = "Processing", Action button opens modal with "Complete Process"
    // ============================================================
    
    // Sample dataset: processing requests
    let processingList = [
        { id: "proc1", patientName: "Maria Santos", patientId: "2026-00123-PT-0", requestId: "#LAB-00001-PT-0", department: "BSIT", courseYear: "3-1", serviceType: "Lab Test Review", assignedStaff: "Dr. Rivera", status: "processing" },
        { id: "proc2", patientName: "John Dela Cruz", patientId: "2026-00124-PT-1", requestId: "#LAB-00002-PT-0", department: "BSCS", courseYear: "2-2", serviceType: "Medical Certificate", assignedStaff: "Nurse Andrea", status: "processing" },
        { id: "proc3", patientName: "Reyna Lopez", patientId: "2026-00125-PT-2", requestId: "#LAB-00003-PT-0", department: "BSN", courseYear: "4-1", serviceType: "Physical Exam", assignedStaff: "Dr. Mendoza", status: "processing" },
        { id: "proc4", patientName: "Eduardo Gomez", patientId: "2026-00126-PT-3", requestId: "#LAB-00004-PT-0", department: "BSCE", courseYear: "3-2", serviceType: "Vaccination", assignedStaff: "Nurse Clara", status: "processing" },
        { id: "proc5", patientName: "Francesca Cruz", patientId: "2026-00127-PT-4", requestId: "#LAB-00005-PT-0", department: "BSBA", courseYear: "2-1", serviceType: "Lab Test Review", assignedStaff: "Dr. Rivera", status: "processing" },
        { id: "proc6", patientName: "Liam Mercado", patientId: "2026-00128-PT-5", requestId: "#LAB-00006-PT-0", department: "BSIT", courseYear: "1-3", serviceType: "Medical Certificate", assignedStaff: "Nurse Andrea", status: "processing" },
        { id: "proc7", patientName: "Sophia Ramirez", patientId: "2026-00129-PT-6", requestId: "#LAB-00007-PT-0", department: "BS Psychology", courseYear: "3-1", serviceType: "Physical Exam", assignedStaff: "Dr. Mendoza", status: "processing" },
        { id: "proc8", patientName: "Andrei Villanueva", patientId: "2026-00130-PT-7", requestId: "LAB-00008-PT-0", department: "BSCS", courseYear: "4-2", serviceType: "Vaccination", assignedStaff: "Nurse Clara", status: "processing" },
        { id: "proc9", patientName: "Gianna Rivera", patientId: "2026-00131-PT-8", requestId: "#LAB-00009-PT-0", department: "BSN", courseYear: "2-2", serviceType: "Lab Test Review", assignedStaff: "Dr. Rivera", status: "processing" },
        { id: "proc10", patientName: "Paolo Mendoza", patientId: "2026-00132-PT-9", requestId: "#LAB-00010-PT-0", department: "BSIT", courseYear: "3-3", serviceType: "Medical Certificate", assignedStaff: "Nurse Andrea", status: "processing" },
        { id: "proc11", patientName: "Isabella Flores", patientId: "2026-00133-PT-10", requestId: "#LAB-00011-PT-0", department: "BSN", courseYear: "4-2", serviceType: "Physical Exam", assignedStaff: "Dr. Mendoza", status: "processing" },
        { id: "proc12", patientName: "Carlos Reyes", patientId: "2026-00134-PT-11", requestId: "#LAB-00012-PT-0", department: "BSCE", courseYear: "3-1", serviceType: "Vaccination", assignedStaff: "Nurse Clara", status: "processing" }
    ];

    const ITEMS_PER_PAGE = 4;
    let currentPage = 1;
    let currentFilteredList = [];
    
    let processModalInstance;
    let currentActionId = null;
    let currentRequest = null;

    // Helper: get initials for avatar
    function getInitials(name) {
        if (!name) return "?";
        const parts = name.trim().split(/\s+/);
        if (parts.length === 1) return parts[0].charAt(0).toUpperCase();
        return parts[0].charAt(0).toUpperCase() + parts[parts.length - 1].charAt(0).toUpperCase();
    }

    function getAvatarColor(name) {
        let hash = 0;
        for (let i = 0; i < name.length; i++) hash = name.charCodeAt(i) + ((hash << 5) - hash);
        const colors = ['#4a6fa5', '#6c5b7b', '#c06c6c', '#2c7a47', '#d97706', '#7c3aed', '#db2777', '#0891b2'];
        return colors[Math.abs(hash) % colors.length];
    }

    function escapeHtml(str) {
        if (!str) return '';
        return str.replace(/[&<>]/g, m => ({ '&': '&amp;', '<': '&lt;', '>': '&gt;' }[m]));
    }

    // Filter logic based on search
    function getFilteredProcessing() {
        const searchTerm = document.getElementById('searchProcessingInput')?.value.toLowerCase().trim() || '';
        if (!searchTerm) return [...processingList];
        
        return processingList.filter(item => {
            return item.patientName.toLowerCase().includes(searchTerm) ||
                   item.patientId.toLowerCase().includes(searchTerm) ||
                   item.requestId.toLowerCase().includes(searchTerm) ||
                   item.serviceType.toLowerCase().includes(searchTerm) ||
                   item.department.toLowerCase().includes(searchTerm) ||
                   item.courseYear.toLowerCase().includes(searchTerm) ||
                   item.assignedStaff.toLowerCase().includes(searchTerm);
        });
    }

    // Pagination controls
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
        
        const prevBtn = document.getElementById('prevPageBtn');
        const nextBtn = document.getElementById('nextPageBtn');
        if (prevBtn) prevBtn.addEventListener('click', () => goToPage(currentPage - 1));
        if (nextBtn) nextBtn.addEventListener('click', () => goToPage(currentPage + 1));
        
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
        renderProcessingTable();
    }

    // Main table renderer
    function renderProcessingTable() {
        const tbody = document.getElementById('processingTableBody');
        if (!tbody) return;
        
        const filtered = getFilteredProcessing();
        currentFilteredList = filtered;
        const totalPages = Math.max(1, Math.ceil(filtered.length / ITEMS_PER_PAGE));
        if (currentPage > totalPages) currentPage = totalPages;
        if (currentPage < 1) currentPage = 1;
        
        const startIdx = (currentPage - 1) * ITEMS_PER_PAGE;
        const pageItems = filtered.slice(startIdx, startIdx + ITEMS_PER_PAGE);
        
        // Update total counter (original full list count)
        document.getElementById('totalCount').innerText = processingList.length;
        
        if (pageItems.length === 0) {
            tbody.innerHTML = `<tr><td colspan="7" class="text-center py-5"><div class="empty-state"><i class="fa-solid fa-spinner fa-3x mb-3 opacity-50"></i><p class="mb-0">No processing requests.</p><small class="text-muted">All processes have been completed.</small></div></td></tr>`;
            renderPaginationControls();
            return;
        }
        
        tbody.innerHTML = pageItems.map(item => {
            const initials = getInitials(item.patientName);
            const avatarBg = getAvatarColor(item.patientName);
            const safeName = escapeHtml(item.patientName).replace(/'/g, "&#39;");
            const courseDept = `${escapeHtml(item.department)}, ${escapeHtml(item.courseYear)}`;
            const displayPatientId = `<span class="id-label">ID:</span> ${escapeHtml(item.patientId)}`;
            
            return `<tr data-id="${item.id}">
                <td>
                    <div class="student-info-wrapper">
                        <div class="profile-avatar" style="background: ${avatarBg};">${escapeHtml(initials)}</div>
                        <div class="student-text">
                            <span class="patient-name">${escapeHtml(item.patientName)}</span>
                            <span class="patient-id-text">${displayPatientId}</span>
                        </div>
                    </div>
                </td>
                <td><span class="processing-id-style"> ${escapeHtml(item.requestId)}</span></td>
                <td class="dept-course">${courseDept}</td>
                <td class="service-cell">${escapeHtml(item.serviceType)}</td>
                <td>${escapeHtml(item.assignedStaff)}</td>
                <td><span class="status-badge-processing"><i class="fa-solid fa-rotate-right"></i> Processing</span></td>
                <td style="text-align: center;">
                    <button class="btn-process-action" onclick="openProcessModal('${item.id}', '${safeName}')">
                        <i class="fa-solid fa-play"></i> Process
                    </button>
                </td>
            </tr>`;
        }).join('');
        
        renderPaginationControls();
    }

    function refreshTable() {
        currentPage = 1;
        renderProcessingTable();
    }
    
    // Global function for modal opening
    window.openProcessModal = function(id, safeName) {
        const requestItem = processingList.find(item => item.id === id);
        if (!requestItem) return;
        
        currentActionId = id;
        currentRequest = requestItem;
        
        // Fill modal with details
        document.getElementById('modalPatientName').innerText = requestItem.patientName;
        document.getElementById('modalPatientId').innerText = requestItem.patientId;
        document.getElementById('modalRequestId').innerText = requestItem.requestId;
        document.getElementById('modalCourseDept').innerText = `${requestItem.department}, ${requestItem.courseYear}`;
        document.getElementById('modalServiceType').innerText = requestItem.serviceType;
        document.getElementById('modalAssignedStaff').innerText = requestItem.assignedStaff;
        
        processModalInstance.show();
    };
    
    // Execute complete process: remove the request from list (process completed)
    function executeCompleteProcess() {
        if (currentActionId) {
            const index = processingList.findIndex(item => item.id === currentActionId);
            if (index !== -1) {
                processingList.splice(index, 1);
                refreshTable();
                showToastMessage(`Process completed for ${currentRequest?.patientName}. Request finalized.`, 'success');
            } else {
                showToastMessage("Request already processed.", 'info');
            }
            processModalInstance.hide();
            currentActionId = null;
            currentRequest = null;
        }
    }
    
    // Toast notification
    function showToastMessage(message, type) {
        const toast = document.createElement('div');
        toast.className = 'position-fixed bottom-0 end-0 p-3';
        toast.style.zIndex = '9999';
        let bgClass = 'bg-success';
        let icon = 'fa-check-circle';
        if (type === 'info') { bgClass = 'bg-info'; icon = 'fa-info-circle'; }
        if (type === 'danger') { bgClass = 'bg-danger'; icon = 'fa-exclamation-circle'; }
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
    
    function setupEventListeners() {
        const searchInput = document.getElementById('searchProcessingInput');
        if (searchInput) {
            searchInput.addEventListener('input', () => {
                currentPage = 1;
                renderProcessingTable();
            });
        }
    }
    
    document.addEventListener('DOMContentLoaded', function() {
        processModalInstance = new bootstrap.Modal(document.getElementById('processModal'), { backdrop: 'static', keyboard: false });
        document.getElementById('finalProcessBtn').addEventListener('click', executeCompleteProcess);
        setupEventListeners();
        renderProcessingTable();
    });
    
    /* IMPORTANT SCRIPT */
    if (window.self === window.top) {
        const currentPagePath = window.location.pathname.split("/").pop();
        if (currentPagePath && !currentPagePath.includes('nursedashboard.php')) {
             window.location.href = "nursedashboard.php?page=nurselaboratory.php&subpage=" + currentPagePath;
        }
    }
</script>
</body>
</html>