<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="0">
    <title>Urgent Appointments | PUPBC CareLink</title>
    
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
            --urgent-badge: #c0392b;
            --urgent-bg: #fee2e2;
            --success-green: #28a745;
            --appointment-id-bg: rgba(71, 88, 103, 0.08);
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
            color: var(--urgent-badge);
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

        /* Separator line */
        .separator-line {
            border-bottom: var(--border-subtle);
            margin-bottom: 16px;
        }

        /* Status badge for urgent */
        .status-badge-urgent {
            background: var(--urgent-bg);
            color: var(--urgent-badge);
            padding: 5px 12px;
            border-radius: 6px;
            font-size: 0.75rem;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }
        
        /* Appointment ID badge style with icon matching student cancel class */
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
            white-space: nowrap;
        }

        .appointment-id-badge i {
            margin-right: 0px;
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

        /* Assist Button */
        .btn-assist-urgent {
            background: rgba(192, 57, 43, 0.12);
            color: var(--urgent-badge);
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

        .btn-assist-urgent:hover {
            background: var(--urgent-badge);
            color: white;
            transform: translateY(-1px);
            box-shadow: 0 4px 10px rgba(192, 57, 43, 0.2);
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
            padding-bottom: 0px;
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

        @media (max-width: 1200px) {
            .table-custom td, .table-custom th {
                padding: 10px 8px;
            }
            .btn-assist-urgent {
                padding: 5px 12px;
                font-size: 0.7rem;
            }
            .profile-avatar {
                width: 34px;
                height: 34px;
                font-size: 0.8rem;
            }
            .appointment-id-badge {
                font-size: 0.7rem;
                padding: 3px 8px;
            }
            .appointment-id-badge i {
                font-size: 0.65rem;
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
                <input type="text" class="search-box" id="searchUrgentInput" placeholder="Search urgent appointments...">
            </div>
        </div>

        <!-- COUNTER + PAGINATION ROW -->
        <div class="counter-pagination-row">
            <div class="total-counter" id="totalUrgentCounter">
                <i class="fa-solid fa-truck-medical"></i> 
                Total Urgent Requests: <span id="totalCount">0</span>
            </div>
            <div class="pagination-wrapper" id="paginationControlsTop">
                <!-- pagination injected -->
            </div>
        </div>

        <!-- HORIZONTAL SEPARATOR LINE -->
        <div class="separator-line"></div>

        <!-- TABLE CONTAINER - NEW COLUMN ADDED: Appointment ID between Email of Students and Service Type -->
        <div class="table-responsive-custom">
            <table class="table table-custom">
                <thead>
                    <tr>
                        <th>Student Details</th>
                        <th>Email of Students</th>
                        <th>Appointment ID</th>
                        <th>Service Type</th>
                        <th>Status</th>
                        <th>Appointment Time</th>
                        <th style="width: 130px; text-align: center;">Action</th>
                    </tr>
                </thead>
                <tbody id="urgentTableBody">
                    <!-- dynamic rows - 4 per page -->
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- ASSIST MODAL (popup with details and Assist Now button) -->
<div class="modal fade top-aligned-modal" id="assistUrgentModal" tabindex="-1" aria-hidden="true" data-bs-backdrop="static">
    <div class="modal-dialog modal-dialog-centered modal-md">
        <div class="modal-content" style="border-radius: 20px;">
            <div class="modal-header" style="background: var(--urgent-badge); color: white; border-radius: 20px 20px 0 0;">
                <h5 class="modal-title"><i class="fa-solid fa-hand-holding-heart me-2"></i>Urgent Assistance</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body" style="padding: 1.5rem;">
                <div class="detail-row">
                    <div class="detail-label">Patient Name:</div>
                    <div class="detail-value" id="modalPatientName">-</div>
                </div>
                <div class="detail-row">
                    <div class="detail-label">Student ID:</div>
                    <div class="detail-value" id="modalPatientId">-</div>
                </div>
                <div class="detail-row">
                    <div class="detail-label">Email Address:</div>
                    <div class="detail-value" id="modalEmail">-</div>
                </div>
                <div class="detail-row">
                    <div class="detail-label">Appointment ID:</div>
                    <div class="detail-value" id="modalAppointmentId">-</div>
                </div>
                <div class="detail-row">
                    <div class="detail-label">Service Type:</div>
                    <div class="detail-value" id="modalService">-</div>
                </div>
                <div class="detail-row">
                    <div class="detail-label">Appointment Time:</div>
                    <div class="detail-value" id="modalTime">-</div>
                </div>
                <div class="detail-row">
                    <div class="detail-label">Assigned Nurse:</div>
                    <div class="detail-value" id="modalNurse">-</div>
                </div>
                <div class="mt-3 pt-2 text-muted small bg-light p-2 rounded">
                    <i class="fa-regular fa-clock me-1"></i> This is an urgent request requiring immediate attention.
                </div>
            </div>
            <div class="modal-footer" style="border-top: none; justify-content: space-between;">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-danger" id="finalAssistBtn"><i class="fa-solid fa-stethoscope me-1"></i> Assist Now</button>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    // ============================================================
    // NURSE URGENT APPOINTMENTS - With NEW Appointment ID Column
    // - Added "Appointment ID" column between student email and service type
    // - Each row includes APT-XXXX-XXX format with icon (same as student cancel class)
    // - Sample IDs: APT-2604-334, APT-2606-335, APT-2607-336, etc.
    // - Maintains 4 rows per page, search, counter, pagination at top
    // - After assisting, urgent request removed from list
    // ============================================================
    
    // Sample dataset: urgent appointments with appointment IDs (similar style to cancel class)
    let urgentAppointmentsList = [
        { id: "urg1", appointmentId: "APT-2604-334", time: "08:30 AM", patientName: "Mark Anthony Sy", patientId: "STUD-2024-0552", email: "mark.sy@example.com", service: "Emergency Check-up", status: "Urgent", nurseAssigned: "Nurse Andrea Cruz" },
        { id: "urg2", appointmentId: "APT-2606-335", time: "09:45 AM", patientName: "Maria Clara", patientId: "STUD-2023-1023", email: "maria.clara@example.com", service: "Severe Headache", status: "Urgent", nurseAssigned: "Nurse Mark Rivera" },
        { id: "urg3", appointmentId: "APT-2607-336", time: "11:00 AM", patientName: "Jose Rizal", patientId: "STUD-2023-0881", email: "jose.rizal@example.com", service: "High Fever", status: "Urgent", nurseAssigned: "Nurse Sofia Gomez" },
        { id: "urg4", appointmentId: "APT-2608-337", time: "01:15 PM", patientName: "Andres Bonifacio", patientId: "STUD-2022-0456", email: "andres.bonifacio@example.com", service: "Chest Pain", status: "Urgent", nurseAssigned: "Nurse Liam Mercado" },
        { id: "urg5", appointmentId: "APT-2609-338", time: "02:30 PM", patientName: "Gabriela Silang", patientId: "STUD-2024-0789", email: "gabriela.silang@example.com", service: "Allergic Reaction", status: "Urgent", nurseAssigned: "Nurse Andrea Cruz" },
        { id: "urg6", appointmentId: "APT-2610-339", time: "03:45 PM", patientName: "Emilio Aguinaldo", patientId: "STUD-2023-1123", email: "emilio.aguinaldo@example.com", service: "Sprained Ankle", status: "Urgent", nurseAssigned: "Nurse Ethan James" },
        { id: "urg7", appointmentId: "APT-2611-340", time: "04:10 PM", patientName: "Melchora Aquino", patientId: "STUD-2022-0987", email: "melchora.aquino@example.com", service: "Difficulty Breathing", status: "Urgent", nurseAssigned: "Nurse Mark Rivera" },
        { id: "urg8", appointmentId: "APT-2612-341", time: "05:00 PM", patientName: "Lapu-Lapu", patientId: "STUD-2024-0011", email: "lapu.lapu@example.com", service: "Wound Dressing", status: "Urgent", nurseAssigned: "Nurse Sofia Gomez" },
        { id: "urg9", appointmentId: "APT-2613-342", time: "07:20 AM", patientName: "Francisco Balagtas", patientId: "STUD-2024-0999", email: "balagtas@example.com", service: "Migraine", status: "Urgent", nurseAssigned: "Nurse Liam Mercado" },
        { id: "urg10", appointmentId: "APT-2614-343", time: "10:00 AM", patientName: "Gregoria de Jesus", patientId: "STUD-2023-0777", email: "gregoria@example.com", service: "Nausea & Vomiting", status: "Urgent", nurseAssigned: "Nurse Andrea Cruz" },
        { id: "urg11", appointmentId: "APT-2615-344", time: "12:30 PM", patientName: "Antonio Luna", patientId: "STUD-2025-0345", email: "antonio.luna@example.com", service: "Burn Injury", status: "Urgent", nurseAssigned: "Nurse Ethan James" },
        { id: "urg12", appointmentId: "APT-2616-345", time: "03:00 PM", patientName: "Teresa Magbanua", patientId: "STUD-2023-0567", email: "teresa.m@example.com", service: "High Blood Pressure", status: "Urgent", nurseAssigned: "Nurse Mark Rivera" }
    ];

    const ITEMS_PER_PAGE = 4;   // Maximum 4 rows per page as requested
    let currentPage = 1;
    let currentFilteredList = [];
    
    let assistModalInstance;
    let currentActionId = null;
    let currentUrgentRequest = null;

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

    // Get all urgent appointments (status is "Urgent" only)
    function getUrgentOnly() {
        return urgentAppointmentsList.filter(apt => apt.status === 'Urgent');
    }

    // Get filtered based on search (patient name, ID, email, service, appointmentId)
    function getFilteredUrgent() {
        const searchTerm = document.getElementById('searchUrgentInput')?.value.toLowerCase().trim() || '';
        const urgent = getUrgentOnly();
        if (!searchTerm) return [...urgent];
        return urgent.filter(apt => 
            apt.patientName.toLowerCase().includes(searchTerm) || 
            apt.patientId.toLowerCase().includes(searchTerm) ||
            (apt.email && apt.email.toLowerCase().includes(searchTerm)) ||
            apt.service.toLowerCase().includes(searchTerm) ||
            apt.time.toLowerCase().includes(searchTerm) ||
            apt.appointmentId.toLowerCase().includes(searchTerm)
        );
    }

    // Render pagination controls at top
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
        renderUrgentTable();
    }

    // Main table renderer with NEW Appointment ID column
    function renderUrgentTable() {
        const tbody = document.getElementById('urgentTableBody');
        if (!tbody) return;
        
        const filtered = getFilteredUrgent();
        currentFilteredList = filtered;
        const totalPages = Math.max(1, Math.ceil(filtered.length / ITEMS_PER_PAGE));
        if (currentPage > totalPages) currentPage = totalPages;
        if (currentPage < 1) currentPage = 1;
        
        const startIdx = (currentPage - 1) * ITEMS_PER_PAGE;
        const pageItems = filtered.slice(startIdx, startIdx + ITEMS_PER_PAGE);
        
        // Update total urgent counter (original urgent count only)
        const totalUrgent = getUrgentOnly().length;
        document.getElementById('totalCount').innerText = totalUrgent;
        
        if (pageItems.length === 0) {
            tbody.innerHTML = `<td><td colspan="7" class="text-center py-5"><div class="empty-state"><i class="fa-solid fa-truck-medical fa-3x mb-3 opacity-50"></i><p class="mb-0">No urgent appointment requests.</p><small class="text-muted">All urgent cases have been assisted.</small></div></td></tr>`;
            renderPaginationControls();
            return;
        }
        
        // Table columns: Student Details | Email | Appointment ID (NEW) | Service Type | Status | Appointment Time | Action
        tbody.innerHTML = pageItems.map(apt => {
            const initials = getInitials(apt.patientName);
            const avatarBg = getAvatarColor(apt.patientName);
            const emailDisplay = apt.email ? escapeHtml(apt.email) : '—';
            const safePatientName = escapeHtml(apt.patientName).replace(/'/g, "&#39;");
            const displayPatientId = `<span class="id-label">ID:</span> ${escapeHtml(apt.patientId)}`;
            const appointmentIdSafe = escapeHtml(apt.appointmentId);
            
            return `<tr data-id="${apt.id}">
                <td>
                    <div class="student-info-wrapper">
                        <div class="profile-avatar" style="background: ${avatarBg};">${escapeHtml(initials)}</div>
                        <div class="student-text">
                            <span class="patient-name">${escapeHtml(apt.patientName)}</span>
                            <span class="patient-id-text">${displayPatientId}</span>
                        </div>
                    </div>
                </td>
                <td class="email-cell"><i class="fa-regular fa-envelope me-1" style="font-size:0.75rem;"></i> ${emailDisplay}</td>
                <td><span class="appointment-id-badge"><i class="fa-solid fa-receipt"></i> ${appointmentIdSafe}</span></td>
                <td>${escapeHtml(apt.service)}</td>
                <td><span class="status-badge-urgent"><i class="fa-solid fa-exclamation-triangle me-1"></i>Urgent</span></td>
                <td><span class="fw-bold">${escapeHtml(apt.time)}</span></td>
                <td style="text-align: center;">
                    <button class="btn-assist-urgent" onclick="openAssistModal('${apt.id}', '${safePatientName}')">
                        <i class="fa-solid fa-hand-holding-medical"></i> Assist
                    </button>
                </td>
               </tr>`;
        }).join('');
        
        renderPaginationControls();
    }

    function refreshTable() {
        currentPage = 1;
        renderUrgentTable();
    }
    
    // Global function for opening the Assist modal
    window.openAssistModal = function(id, safeName) {
        const urgentItem = urgentAppointmentsList.find(item => item.id === id && item.status === 'Urgent');
        if (!urgentItem) return;
        
        currentActionId = id;
        currentUrgentRequest = urgentItem;
        
        // Fill modal with details including Appointment ID
        document.getElementById('modalPatientName').innerText = urgentItem.patientName;
        document.getElementById('modalPatientId').innerText = urgentItem.patientId;
        document.getElementById('modalEmail').innerText = urgentItem.email;
        document.getElementById('modalAppointmentId').innerText = urgentItem.appointmentId;
        document.getElementById('modalService').innerText = urgentItem.service;
        document.getElementById('modalTime').innerText = urgentItem.time;
        document.getElementById('modalNurse').innerText = urgentItem.nurseAssigned || "Nurse on duty";
        
        assistModalInstance.show();
    };
    
    // Execute Assist Now: remove the urgent request from list
    function executeAssistNow() {
        if (currentActionId) {
            const index = urgentAppointmentsList.findIndex(item => item.id === currentActionId && item.status === 'Urgent');
            if (index !== -1) {
                const canceledAptId = urgentAppointmentsList[index].appointmentId;
                urgentAppointmentsList.splice(index, 1);
                refreshTable();
                showToastMessage(`Assistance completed for ${currentUrgentRequest?.patientName} (${canceledAptId}). Urgent request resolved.`, 'success');
            } else {
                showToastMessage("This request has already been processed.", 'info');
            }
            assistModalInstance.hide();
            currentActionId = null;
            currentUrgentRequest = null;
        }
    }
    
    // Toast notification system
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
        const searchInput = document.getElementById('searchUrgentInput');
        if (searchInput) {
            searchInput.addEventListener('input', () => {
                currentPage = 1;
                renderUrgentTable();
            });
        }
    }
    
    document.addEventListener('DOMContentLoaded', function() {
        assistModalInstance = new bootstrap.Modal(document.getElementById('assistUrgentModal'), { backdrop: 'static', keyboard: false });
        document.getElementById('finalAssistBtn').addEventListener('click', executeAssistNow);
        setupEventListeners();
        renderUrgentTable();
    });
    
    /* IMPORTANT SCRIPT BECAUSE THIS IS EMBEDDED CLASS OF MY IFRAME DASHBOARD */
    if (window.self === window.top) {
        const currentPagePath = window.location.pathname.split("/").pop();
        if (currentPagePath && !currentPagePath.includes('nursedashboard.php')) {
            window.location.href = "nursedashboard.php?page=nurseappointment.php&subpage=" + currentPagePath;
        }
    }
</script>
</body>
</html>