<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="0">
    <title>New Patient Register | PUPBC CareLink | Clean Layout</title>
    
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
            --new-badge: #2c7a47;
            --new-bg: #e0f2e9;
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

        /* ===== NEW LAYOUT: Search bar area (above counter/pagination) ===== */
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

        /* Counter + Pagination row (side by side) */
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
            color: var(--new-badge);
            font-size: 1rem;
        }

        .pagination-wrapper {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            background: transparent;
            flex-wrap: wrap;
            justify-content: flex-end;
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

        /* HORIZONTAL SEPARATOR LINE - positioned below counter/pagination row */
        .separator-line {
            border-bottom: var(--border-subtle);
            margin-bottom: 16px;
        }

        /* status badge for "new" */
        .status-badge-new {
            background: var(--new-bg);
            color: var(--new-badge);
            padding: 5px 12px;
            border-radius: 6px;
            font-size: 0.75rem;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }

        /* TABLE STYLES - column headers now have the separator line */
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

        /* Added style for ID label */
        .id-label {
            font-weight: 500;
            color: var(--medical-blue);
            margin-right: 4px;
        }

        .email-cell, .dept-course, .service-cell, .date-cell {
            font-size: 0.82rem;
        }

        /* Confirm Button */
        .btn-confirm-register {
            background: rgba(40, 167, 69, 0.12);
            color: var(--success-green);
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

        .btn-confirm-register:hover {
            background: var(--success-green);
            color: white;
            transform: translateY(-1px);
            box-shadow: 0 4px 10px rgba(40, 167, 69, 0.2);
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
        @media (max-width: 576px) {
            .modal.top-aligned-modal .modal-dialog {
                margin: 0.5rem 0.75rem;
            }
        }

        @media (max-width: 1200px) {
            .table-custom td, .table-custom th {
                padding: 10px 8px;
            }
            .btn-confirm-register {
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
        <!-- SEARCH BAR SECTION - now stacked above counter/pagination (no bottom border here) -->
        <div class="search-section">
            <div class="search-wrapper">
                <i class="fas fa-search search-icon"></i>
                <input type="text" class="search-box" id="searchPatientInput" placeholder="Search new patients...">
            </div>
        </div>

        <!-- COUNTER + PAGINATION ROW (side by side) -->
        <div class="counter-pagination-row">
            <div class="total-counter" id="totalNewCounter">
                <i class="fa-solid fa-user-plus"></i> 
                Total New Registered Patients: <span id="totalCount">0</span>
            </div>
            <div class="pagination-wrapper" id="paginationControlsTop">
                <!-- pagination buttons will be injected here (Prev, numbers, Next) -->
            </div>
        </div>

        <!-- HORIZONTAL SEPARATOR LINE - placed right below the counter/pagination row -->
        <div class="separator-line"></div>

        <!-- TABLE CONTAINER -->
        <div class="table-responsive-custom">
            <table class="table table-custom">
                <thead>
                    <tr>
                        <th>Patient Details</th>
                        <th>Email of Patient</th>
                        <th>Course & Year</th>
                        <th>Service Type</th>
                        <th>Register Date</th>
                        <th>Status</th>
                        <th style="width: 130px; text-align: center;">Action</th>
                    </tr>
                </thead>
                <tbody id="newPatientTableBody">
                    <!-- dynamic rows - 5 maximum per page -->
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- CONFIRM MODAL -->
<div class="modal fade top-aligned-modal" id="confirmRegisterModal" tabindex="-1" aria-hidden="true" data-bs-backdrop="static">
    <div class="modal-dialog modal-dialog-centered modal-sm">
        <div class="modal-content" style="border-radius: 16px;">
            <div class="modal-header" style="background: var(--success-green); color: white; border-radius: 16px 16px 0 0;">
                <h5 class="modal-title"><i class="fa-solid fa-check-circle me-2"></i>Confirm Registration</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body" style="padding: 1.5rem;">
                <p class="mb-0">Confirm registration for <strong id="confirmPatientName"></strong>?</p>
                <small class="text-muted">This will move patient from new registration to active records.</small>
            </div>
            <div class="modal-footer" style="border-top: none;">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-success" id="finalConfirmBtn">Confirm</button>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    // ============================================================
    // NEW PATIENT REGISTER — MAXIMUM 5 ROWS PER TABLE (ITEMS_PER_PAGE = 5)
    // LAYOUT: Search bar at top, then Counter + Pagination row, then separator line, then table
    // ENHANCED: Added "ID: " prefix before patient ID numbers in the table
    // ENHANCED: Search bar now properly searches ID numbers (e.g., typing "2026" finds all patients with 2026 in ID)
    // ============================================================
    
    let newPatientList = [
        { id: "reg1", patientName: "Maria Santos", patientId: "2026-00123-PT-0", email: "maria.santos@example.com", department: "BSIT", courseYear: "3-1", serviceType: "Online Register", registerDate: "02/15/26", status: "new" },
        { id: "reg2", patientName: "John Dela Cruz", patientId: "2026-00124-PT-1", email: "john.dc@example.com", department: "BSCS", courseYear: "2-2", serviceType: "Kiosk Register", registerDate: "02/16/26", status: "new" },
        { id: "reg3", patientName: "Reyna Lopez", patientId: "2026-00125-PT-2", email: "reyna.lopez@example.com", department: "BSN", courseYear: "4-1", serviceType: "Online Register", registerDate: "02/16/26", status: "new" },
        { id: "reg4", patientName: "Eduardo Gomez", patientId: "2026-00126-PT-3", email: "edu.gomez@example.com", department: "BSCE", courseYear: "3-2", serviceType: "Online Register", registerDate: "02/17/26", status: "new" },
        { id: "reg5", patientName: "Francesca Cruz", patientId: "2026-00127-PT-4", email: "frances.cruz@example.com", department: "BSBA", courseYear: "2-1", serviceType: "Kiosk Register", registerDate: "02/18/26", status: "new" },
        { id: "reg6", patientName: "Liam Mercado", patientId: "2026-00128-PT-5", email: "liam.merc@example.com", department: "BSIT", courseYear: "1-3", serviceType: "Online Register", registerDate: "02/19/26", status: "new" },
        { id: "reg7", patientName: "Sophia Ramirez", patientId: "2026-00129-PT-6", email: "sophia.ram@example.com", department: "BS Psychology", courseYear: "3-1", serviceType: "Kiosk Register", registerDate: "02/20/26", status: "new" },
        { id: "reg8", patientName: "Andrei Villanueva", patientId: "2026-00130-PT-7", email: "andrei.v@example.com", department: "BSCS", courseYear: "4-2", serviceType: "Online Register", registerDate: "02/20/26", status: "new" },
        { id: "reg9", patientName: "Gianna Rivera", patientId: "2026-00131-PT-8", email: "gianna.riv@example.com", department: "BSN", courseYear: "2-2", serviceType: "Online Register", registerDate: "02/21/26", status: "new" },
        { id: "reg10", patientName: "Paolo Mendoza", patientId: "2026-00132-PT-9", email: "paolo.mend@example.com", department: "BSIT", courseYear: "3-3", serviceType: "Kiosk Register", registerDate: "02/21/26", status: "new" },
        { id: "reg11", patientName: "Isabella Flores", patientId: "2026-00133-PT-10", email: "bella.flores@example.com", department: "BSN", courseYear: "4-2", serviceType: "Online Register", registerDate: "02/22/26", status: "new" },
        { id: "reg12", patientName: "Carlos Reyes", patientId: "2026-00134-PT-11", email: "carlos.reyes@example.com", department: "BSCE", courseYear: "3-1", serviceType: "Kiosk Register", registerDate: "02/22/26", status: "new" },
        { id: "reg13", patientName: "Megan Torres", patientId: "2026-00135-PT-12", email: "megan.torres@example.com", department: "BSIT", courseYear: "2-2", serviceType: "Online Register", registerDate: "02/23/26", status: "new" },
        { id: "reg14", patientName: "Justin Bautista", patientId: "2026-00136-PT-13", email: "justin.b@example.com", department: "BSBA", courseYear: "1-4", serviceType: "Online Register", registerDate: "02/23/26", status: "new" }
    ];

    // 5 rows per page (maximum row per table list)
    const ITEMS_PER_PAGE = 4;
    
    let currentPage = 1;
    let currentFilteredList = [];
    
    let confirmModalInstance;
    let currentActionId = null;
    let currentActionName = "";

    // Helper functions
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

    // ENHANCED SEARCH FUNCTION: Now properly searches patientId numbers (including partial matches like "2026")
    function getFilteredNewPatients() {
        const searchTerm = document.getElementById('searchPatientInput')?.value.toLowerCase().trim() || '';
        let filtered = [...newPatientList];
        
        if (searchTerm) {
            filtered = filtered.filter(pat => {
                // Search across all relevant fields
                const matchesName = pat.patientName.toLowerCase().includes(searchTerm);
                const matchesId = pat.patientId.toLowerCase().includes(searchTerm);
                const matchesEmail = pat.email.toLowerCase().includes(searchTerm);
                const matchesDept = pat.department.toLowerCase().includes(searchTerm);
                const matchesCourseYear = pat.courseYear && pat.courseYear.toLowerCase().includes(searchTerm);
                const matchesService = pat.serviceType.toLowerCase().includes(searchTerm);
                const matchesDate = pat.registerDate.includes(searchTerm);
                
                return matchesName || matchesId || matchesEmail || matchesDept || matchesCourseYear || matchesService || matchesDate;
            });
        }
        return filtered;
    }

    // Render pagination controls at TOP (aligned with total counter)
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
        renderNewPatientTable();
    }

    function renderNewPatientTable() {
        const tbody = document.getElementById('newPatientTableBody');
        if (!tbody) return;
        
        const filtered = getFilteredNewPatients();
        currentFilteredList = filtered;
        const totalPages = Math.max(1, Math.ceil(filtered.length / ITEMS_PER_PAGE));
        if (currentPage > totalPages) currentPage = totalPages;
        if (currentPage < 1) currentPage = 1;
        
        const startIdx = (currentPage - 1) * ITEMS_PER_PAGE;
        const pageItems = filtered.slice(startIdx, startIdx + ITEMS_PER_PAGE);
        
        // update total new count (shows total in original list, not filtered)
        document.getElementById('totalCount').innerText = newPatientList.length;
        
        if (pageItems.length === 0) {
            tbody.innerHTML = `<tr><td colspan="7" class="text-center py-5"><div class="empty-state"><i class="fa-solid fa-user-plus fa-3x mb-3 opacity-50"></i><p class="mb-0">No new patient registrations.</p><small class="text-muted">All registrations have been confirmed.</small></div></td></tr>`;
            renderPaginationControls();
            return;
        }
        
        tbody.innerHTML = pageItems.map(pat => {
            const initials = getInitials(pat.patientName);
            const avatarBg = getAvatarColor(pat.patientName);
            const safeName = escapeHtml(pat.patientName).replace(/'/g, "&#39;");
            const courseDept = `${escapeHtml(pat.department)}, ${escapeHtml(pat.courseYear)}`;
            // Display patient ID with "ID: " prefix
            const displayPatientId = `<span class="id-label">ID:</span> ${escapeHtml(pat.patientId)}`;
            return `<tr data-id="${pat.id}">
                <td>
                    <div class="student-info-wrapper">
                        <div class="profile-avatar" style="background: ${avatarBg};">${escapeHtml(initials)}</div>
                        <div class="student-text">
                            <span class="patient-name">${escapeHtml(pat.patientName)}</span>
                            <span class="patient-id-text">${displayPatientId}</span>
                        </div>
                    </div>
                </td>
                <td class="email-cell"><i class="fa-regular fa-envelope me-1" style="font-size:0.75rem;"></i> ${escapeHtml(pat.email)}</td>
                <td class="dept-course">${courseDept}</td>
                <td class="service-cell">
                    ${pat.serviceType === 'Online Register' ? '<i class="fa-solid fa-globe me-1" style="font-size:0.7rem;"></i>' : '<i class="fa-solid fa-desktop me-1" style="font-size:0.7rem;"></i>'} 
                    ${escapeHtml(pat.serviceType)}
                </td>
                <td class="date-cell">${escapeHtml(pat.registerDate)}</td>
                <td><span class="status-badge-new"><i class="fa-regular fa-bell"></i> New</span></td>
                <td style="text-align: center;">
                    <button class="btn-confirm-register" onclick="openConfirmModal('${pat.id}', '${safeName}')">
                        <i class="fa-solid fa-check-circle"></i> Confirm
                    </button>
                </td>
            </tr>`;
        }).join('');
        
        renderPaginationControls();
    }

    function refreshTable() {
        currentPage = 1;
        renderNewPatientTable();
    }

    // MODAL handlers
    window.openConfirmModal = function(id, name) {
        currentActionId = id;
        currentActionName = name;
        document.getElementById('confirmPatientName').innerText = name;
        confirmModalInstance.show();
    };

    function executeConfirmRegistration() {
        if (currentActionId) {
            const index = newPatientList.findIndex(p => p.id === currentActionId);
            if (index !== -1 && newPatientList[index].status === 'new') {
                newPatientList.splice(index, 1);
                refreshTable();
                showToastMessage(`Registration confirmed for ${currentActionName}.`, 'success');
            } else {
                showToastMessage("Patient already processed.", 'info');
            }
            confirmModalInstance.hide();
            currentActionId = null;
        }
    }

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
        const searchInput = document.getElementById('searchPatientInput');
        if (searchInput) {
            searchInput.addEventListener('input', () => {
                currentPage = 1;
                renderNewPatientTable();
            });
        }
    }

    document.addEventListener('DOMContentLoaded', function() {
        confirmModalInstance = new bootstrap.Modal(document.getElementById('confirmRegisterModal'), { backdrop: 'static', keyboard: false });
        document.getElementById('finalConfirmBtn').addEventListener('click', executeConfirmRegistration);
        setupEventListeners();
        renderNewPatientTable();
    });

    /* IMPORTANT SCRIPT MUST BE PRESERVED */
    if (window.self === window.top) {
        const currentPagePath = window.location.pathname.split("/").pop();
        if (currentPagePath && !currentPagePath.includes('nursedashboard.php')) {
            window.location.href = "nursedashboard.php?page=nursepatient.php&subpage=" + currentPagePath;
        }
    }
</script>
</body>
</html>