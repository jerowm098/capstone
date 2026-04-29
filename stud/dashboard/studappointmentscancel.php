<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="0">
    <title>Cancel Appointments | Student Dashboard | PUPBC CareLink</title>
    
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
            --danger-red: #dc3545;
            --cancel-orange: #e67e22;
            --cancel-bg-soft: rgba(230, 126, 34, 0.1);
            --success-green: #28a745;
            --appointment-id-bg: rgba(71, 88, 103, 0.05);
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

        /* Counter + Pagination row (side by side) */
        .counter-pagination-row {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            justify-content: space-between;
            gap: 15px;
            margin-bottom: 16px;
            min-height: 56px;
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
            color: var(--cancel-orange);
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

        /* SEPARATOR LINE */
        .separator-line {
            border-bottom: var(--border-subtle);
            margin-bottom: 16px;
        }

        /* status badge for "pending" only */
        .status-badge-pending {
            background: #fff4e5;
            color: #b7791f;
            padding: 5px 12px;
            border-radius: 6px;
            font-size: 0.75rem;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }

        /* Appointment ID badge style */
        .appointment-id-badge {
            background: var(--appointment-id-bg);
            color: var(--medical-blue-dark);
            font-family: 'Monaco', 'Courier New', monospace;
            font-size: 0.75rem;
            font-weight: 600;
            padding: 4px 10px;
            border-radius: 20px;
            display: inline-block;
            letter-spacing: 0.3px;
            border: 1px solid rgba(71, 88, 103, 0.15);
        }

        .appointment-id-badge i {
            margin-right: 6px;
            font-size: 0.7rem;
            color: var(--medical-blue-light);
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

        /* Nurse avatar style */
        .nurse-avatar {
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
        }

        .nurse-info-wrapper {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .nurse-text {
            display: flex;
            flex-direction: column;
        }

        .nurse-name {
            font-weight: 600;
            color: var(--brand-primary);
            display: block;
            font-size: 0.88rem;
        }

        .nurse-id-text {
            font-size: 0.72rem;
            color: var(--text-muted);
        }

        .id-label {
            font-weight: 500;
            color: var(--medical-blue);
            margin-right: 4px;
        }

        /* Cancel Button */
        .btn-cancel-appointment {
            padding: 6px 16px;
            border-radius: 10px;
            border: none;
            background: var(--cancel-bg-soft);
            color: var(--cancel-orange);
            font-weight: 600;
            font-size: 0.75rem;
            transition: all 0.2s ease;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            font-family: 'Poppins', sans-serif;
            height: 33px;
        }

        .btn-cancel-appointment i {
            font-size: 0.8rem;
        }

        .btn-cancel-appointment:hover {
            background: var(--cancel-orange);
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(230, 126, 34, 0.3);
        }

        .empty-state {
            text-align: center;
            padding: 2.5rem;
            color: var(--text-muted);
        }

        /* MODAL */
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
            .btn-cancel-appointment {
                padding: 5px 12px;
                font-size: 0.7rem;
            }
            .nurse-avatar {
                width: 34px;
                height: 34px;
                font-size: 0.8rem;
            }
            .appointment-id-badge {
                font-size: 0.7rem;
                padding: 3px 8px;
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
                <input type="text" class="search-box" id="searchAppointmentsInput" placeholder="Search appointments...">
            </div>
        </div>

        <!-- COUNTER + PAGINATION ROW (side by side, fixed position) -->
        <div class="counter-pagination-row">
            <div class="total-counter" id="totalAppointmentsCounter">
                <i class="fa-solid fa-calendar-check"></i> 
                Total Appointments: <span id="totalCount">0</span>
            </div>
            <div class="pagination-wrapper" id="paginationControlsTop">
                <!-- pagination buttons injected here -->
            </div>
        </div>

        <!-- HORIZONTAL SEPARATOR LINE -->
        <div class="separator-line"></div>

        <!-- TABLE CONTAINER - NEW COLUMN ADDED: Appointment ID between Nurse Email and Service Type -->
        <div class="table-responsive-custom">
            <table class="table table-custom">
                <thead>
                    <tr>
                        <th>Nurse Details</th>
                        <th>Nurse Email</th>
                        <th>Appointment ID</th>
                        <th>Service Type</th>
                        <th>Appointment Time</th>
                        <th>Status</th>
                        <th style="width: 120px; text-align: center;">Action</th>
                    </tr>
                </thead>
                <tbody id="appointmentsTableBody">
                    <!-- dynamic rows: max 4 per page -->
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- MODAL FOR CANCEL CONFIRMATION -->
<div class="modal fade top-aligned-modal" id="cancelConfirmModal" tabindex="-1" aria-hidden="true" data-bs-backdrop="static">
    <div class="modal-dialog modal-dialog-centered modal-sm">
        <div class="modal-content" style="border-radius: 16px;">
            <div class="modal-header" style="background: var(--cancel-orange); color: white; border-radius: 16px 16px 0 0;">
                <h5 class="modal-title"><i class="fa-solid fa-calendar-xmark me-2"></i>Cancel Appointment</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body" style="padding: 1.5rem;">
                <p class="mb-0">Are you sure you want to cancel this appointment with <strong id="cancelNurseName"></strong>?</p>
                <small class="text-muted">This action cannot be undone. Appointment will be removed from your list.</small>
            </div>
            <div class="modal-footer" style="border-top: none;">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Go Back</button>
                <button type="button" class="btn btn-danger" id="confirmCancelBtn">Yes, Cancel</button>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    // ============================================================
    // STUDENT APPOINTMENTS CANCEL MANAGEMENT (studappointmentscancel.php)
    // Features:
    // - NEW COLUMN: Appointment ID (between Nurse Email and Service Type)
    // - Sample IDs: APT-2604-334, APT-2606-335, APT-2607-336, etc.
    // - Maximum 4 items per page, pagination fixed position
    // - Search bar filters across all visible columns including Appointment ID
    // - Cancel button removes appointment from list
    // ============================================================

    // Sample dataset with Appointment IDs added
    let studentAppointmentsList = [
        { 
            id: "apt_001", 
            appointmentId: "APT-2604-334",
            nurse: { name: "Emily Rodriguez", id: "NUR-2024-0123-EMP", email: "emily.rodriguez@pupbc.edu.ph" },
            service: "Lab Result Review",
            time: "09:30 AM",
            status: "Pending"
        },
  /*       { 
            id: "apt_002", 
            appointmentId: "APT-2606-335",
            nurse: { name: "Michael Tan", id: "NUR-2023-0889-EMP", email: "michael.tan@pupbc.edu.ph" },
            service: "Medical Certificate",
            time: "11:00 AM",
            status: "Pending"
        },
        { 
            id: "apt_003", 
            appointmentId: "APT-2607-336",
            nurse: { name: "Sarah Gomez", id: "NUR-2025-0456-EMP", email: "sarah.gomez@pupbc.edu.ph" },
            service: "Vaccination",
            time: "01:15 PM",
            status: "Pending"
        },
        { 
            id: "apt_004", 
            appointmentId: "APT-2608-337",
            nurse: { name: "James Rivera", id: "NUR-2024-0771-EMP", email: "james.rivera@pupbc.edu.ph" },
            service: "Difficulty Breathing",
            time: "02:45 PM",
            status: "Pending"
        },
        { 
            id: "apt_005", 
            appointmentId: "APT-2609-338",
            nurse: { name: "Patricia Lim", id: "NUR-2022-0992-EMP", email: "patricia.lim@pupbc.edu.ph" },
            service: "Dizziness",
            time: "08:45 AM",
            status: "Pending"
        },
        { 
            id: "apt_006", 
            appointmentId: "APT-2610-339",
            nurse: { name: "Christopher Cruz", id: "NUR-2023-1123-EMP", email: "christopher.cruz@pupbc.edu.ph" },
            service: "Regular Check-up",
            time: "10:30 AM",
            status: "Pending"
        },
        { 
            id: "apt_007", 
            appointmentId: "APT-2611-340",
            nurse: { name: "Diana Reyes", id: "NUR-2024-0334-EMP", email: "diana.reyes@pupbc.edu.ph" },
            service: "Lab Result Review",
            time: "03:00 PM",
            status: "Pending"
        },
        { 
            id: "apt_008", 
            appointmentId: "APT-2612-341",
            nurse: { name: "Lawrence Mendoza", id: "NUR-2025-0667-EMP", email: "lawrence.mendoza@pupbc.edu.ph" },
            service: "Vaccination",
            time: "12:20 PM",
            status: "Pending"
        },
        { 
            id: "apt_009", 
            appointmentId: "APT-2613-342",
            nurse: { name: "Isabella Flores", id: "NUR-2023-0555-EMP", email: "isabella.flores@pupbc.edu.ph" },
            service: "Medical Certificate",
            time: "04:10 PM",
            status: "Pending"
        },
        { 
            id: "apt_010", 
            appointmentId: "APT-2614-343",
            nurse: { name: "Ricardo Santiago", id: "NUR-2024-0988-EMP", email: "ricardo.santiago@pupbc.edu.ph" },
            service: "Difficulty Breathing",
            time: "07:30 AM",
            status: "Pending"
        } */
    ];

    const ITEMS_PER_PAGE = 4;   // Maximum 4 rows per page
    let currentPage = 1;
    let currentFilteredList = [];
    let cancelModalInstance = null;
    let currentCancelId = null;
    let currentCancelNurseName = "";

    // Helper: Generate initials for nurse avatar
    function getInitials(name) {
        if (!name) return "N";
        const parts = name.trim().split(/\s+/);
        if (parts.length === 1) return parts[0].charAt(0).toUpperCase();
        return parts[0].charAt(0).toUpperCase() + parts[parts.length - 1].charAt(0).toUpperCase();
    }

    // Helper: Avatar color based on nurse name
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

    // Get filtered appointments based on search input (search across all fields including Appointment ID)
    function getFilteredAppointments() {
        const searchTerm = document.getElementById('searchAppointmentsInput')?.value.toLowerCase().trim() || '';
        if (!searchTerm) return [...studentAppointmentsList];
        
        return studentAppointmentsList.filter(apt => 
            apt.nurse.name.toLowerCase().includes(searchTerm) ||
            apt.nurse.email.toLowerCase().includes(searchTerm) ||
            apt.service.toLowerCase().includes(searchTerm) ||
            apt.time.toLowerCase().includes(searchTerm) ||
            apt.nurse.id.toLowerCase().includes(searchTerm) ||
            apt.appointmentId.toLowerCase().includes(searchTerm)
        );
    }

    // Render pagination controls at TOP (fixed position)
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
        renderAppointmentsTable();
    }

    // Main render function: includes new Appointment ID column
    function renderAppointmentsTable() {
        const tbody = document.getElementById('appointmentsTableBody');
        if (!tbody) return;
        
        const filtered = getFilteredAppointments();
        currentFilteredList = filtered;
        const totalPages = Math.max(1, Math.ceil(filtered.length / ITEMS_PER_PAGE));
        
        // Adjust currentPage if out of bounds
        if (currentPage > totalPages) currentPage = totalPages;
        if (currentPage < 1) currentPage = 1;
        
        const startIdx = (currentPage - 1) * ITEMS_PER_PAGE;
        const pageItems = filtered.slice(startIdx, startIdx + ITEMS_PER_PAGE);
        
        // Update total appointments counter
        document.getElementById('totalCount').innerText = studentAppointmentsList.length;
        
        // Empty state handling
        if (pageItems.length === 0) {
            tbody.innerHTML = `<tr><td colspan="7" class="text-center py-5"><div class="empty-state"><i class="fa-solid fa-calendar-times fa-3x mb-3 opacity-50"></i><p class="mb-0">No pending appointments found.</p><small class="text-muted">Your appointment list is empty or no matches.</small></div></td></tr>`;
            renderPaginationControls();
            return;
        }
        
        // Generate rows: Nurse Details | Nurse Email | Appointment ID (NEW) | Service Type | Time | Status | Cancel button
        tbody.innerHTML = pageItems.map(apt => {
            const initials = getInitials(apt.nurse.name);
            const avatarBg = getAvatarColor(apt.nurse.name);
            const nurseNameSafe = escapeHtml(apt.nurse.name);
            const nurseIdSafe = escapeHtml(apt.nurse.id);
            const nurseEmailSafe = escapeHtml(apt.nurse.email);
            const appointmentIdSafe = escapeHtml(apt.appointmentId);
            const serviceSafe = escapeHtml(apt.service);
            const timeSafe = escapeHtml(apt.time);
            const nurseIdDisplay = `<span class="id-label">ID:</span> ${nurseIdSafe}`;
            
            return `<tr data-id="${apt.id}">
                <td>
                    <div class="nurse-info-wrapper">
                        <div class="nurse-avatar" style="background: ${avatarBg};">${escapeHtml(initials)}</div>
                        <div class="nurse-text">
                            <span class="nurse-name">${nurseNameSafe}</span>
                            <span class="nurse-id-text">${nurseIdDisplay}</span>
                        </div>
                    </div>
                </td>
                <td>${nurseEmailSafe}</td>
                <td><span class="appointment-id-badge"><i class="fa-solid fa-receipt me-1"></i>${appointmentIdSafe}</span></td>
                <td>${serviceSafe}</td>
                <td><span class="fw-bold">${timeSafe}</span></td>
                <td><span class="status-badge-pending"><i class="fa-solid fa-clock me-1"></i>Pending</span></td>
                <td style="text-align: center;">
                    <button class="btn-cancel-appointment" onclick="openCancelModal('${apt.id}', '${nurseNameSafe.replace(/'/g, "\\'")}')" title="Cancel Appointment">
                        <i class="fa-solid fa-ban"></i> Cancel
                    </button>
                </td>
            </tr>`;
        }).join('');
        
        renderPaginationControls();
    }

    // Refresh table after modifications
    function refreshTable() {
        currentPage = 1;
        renderAppointmentsTable();
    }

    // Cancel modal logic
    window.openCancelModal = function(id, nurseName) {
        currentCancelId = id;
        currentCancelNurseName = nurseName;
        document.getElementById('cancelNurseName').innerText = nurseName;
        cancelModalInstance.show();
    };

    function executeCancel() {
        if (currentCancelId) {
            const index = studentAppointmentsList.findIndex(apt => apt.id === currentCancelId);
            if (index !== -1) {
                const cancelledAppointment = studentAppointmentsList[index];
                const appointmentIdDisplay = cancelledAppointment.appointmentId;
                studentAppointmentsList.splice(index, 1);
                refreshTable();
                showToastMessage(`Appointment ${appointmentIdDisplay} with ${currentCancelNurseName} has been cancelled.`, 'warning');
            }
            cancelModalInstance.hide();
            currentCancelId = null;
            currentCancelNurseName = "";
        }
    }

    // Toast notification helper
    function showToastMessage(message, type) {
        const toast = document.createElement('div');
        toast.className = 'position-fixed bottom-0 end-0 p-3';
        toast.style.zIndex = '9999';
        const icon = type === 'success' ? 'fa-check-circle' : (type === 'warning' ? 'fa-exclamation-triangle' : 'fa-info-circle');
        const bgClass = type === 'success' ? 'bg-success' : (type === 'warning' ? 'bg-warning' : 'bg-info');
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
        const bsToast = new bootstrap.Toast(toast.querySelector('.toast'), { autohide: true, delay: 2200 });
        bsToast.show();
        toast.addEventListener('hidden.bs.toast', () => toast.remove());
    }

    // Setup search input event listener
    function setupEventListeners() {
        const searchInput = document.getElementById('searchAppointmentsInput');
        if (searchInput) {
            searchInput.addEventListener('input', () => {
                currentPage = 1;
                renderAppointmentsTable();
            });
        }
    }

    // Initialize on DOM load
    document.addEventListener('DOMContentLoaded', function() {
        cancelModalInstance = new bootstrap.Modal(document.getElementById('cancelConfirmModal'), { backdrop: 'static', keyboard: false });
        
        const confirmBtn = document.getElementById('confirmCancelBtn');
        if (confirmBtn) confirmBtn.addEventListener('click', executeCancel);
        
        setupEventListeners();
        renderAppointmentsTable();
    });

    /* IMPORTANT SCRIPT BECAUSE THIS IS EMBEDDED CLASS OF IFRAME DASHBOARD */
    if (window.self === window.top) {
        const currentPagePath = window.location.pathname.split("/").pop();
        if (currentPagePath && !currentPagePath.includes('studdashboard.php')) {
            window.location.href = "studdashboard.php?page=studappointments.php&subpage=" + currentPagePath;
        }
    }
</script>
</body>
</html>