<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="0">
    <title>Medical Records | PUPBC CareLink | Patient Health History</title>
    
    <!-- Ensure Font Awesome 6 is loaded correctly (fixes broken print icon) -->
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
            --registered-green: #2c7a47;
            --registered-bg: #e0f2e9;
            --view-purple: #6f42c1;
            --view-bg: rgba(111, 66, 193, 0.1);
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

        /* ===== LAYOUT: Search bar area (above counter/pagination) ===== */
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
            color: var(--registered-green);
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

        /* status badge for "registered" */
        .status-badge-registered {
            background: var(--registered-bg);
            color: var(--registered-green);
            padding: 5px 12px;
            border-radius: 6px;
            font-size: 0.75rem;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }

        /* ===== VIEW RECORDS BUTTON ===== */
        .action-buttons {
            display: flex;
            gap: 10px;
            justify-content: center;
            align-items: center;
        }

        .action-view-btn {
            width: 38px;
            height: 38px;
            border-radius: 8px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border: none;
            transition: all 0.2s ease;
            cursor: pointer;
            background: var(--view-bg);
            color: var(--view-purple);
            font-size: 1rem;
        }

        .action-view-btn:hover {
            background: var(--view-purple);
            color: white;
            transform: scale(1.05);
            box-shadow: 0 4px 12px rgba(111, 66, 193, 0.3);
        }

        .action-view-btn:active {
            transform: scale(0.95);
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

        .empty-state {
            text-align: center;
            padding: 2.5rem;
            color: var(--text-muted);
        }

        /* MEDICAL RECORDS MODAL */
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
        .modal-header-records {
            background: var(--view-purple);
            color: white;
            border-radius: 20px 20px 0 0;
        }
        .form-label {
            font-weight: 500;
            font-size: 0.8rem;
            margin-bottom: 0.3rem;
        }
        .records-section {
            background: var(--medical-blue-soft);
            border-radius: 14px;
            padding: 1rem;
            margin-bottom: 1rem;
        }
        .records-title {
            font-weight: 600;
            font-size: 0.85rem;
            color: var(--brand-primary);
            margin-bottom: 0.75rem;
            border-left: 3px solid var(--view-purple);
            padding-left: 10px;
        }
        .record-item {
            font-size: 0.8rem;
            padding: 6px 0;
            border-bottom: 1px dashed rgba(0,0,0,0.05);
        }
        .record-item:last-child {
            border-bottom: none;
        }
        .record-label {
            font-weight: 500;
            color: var(--medical-blue);
            width: 110px;
            display: inline-block;
        }
        .record-value {
            color: var(--text-main);
        }

        @media (max-width: 1200px) {
            .table-custom td, .table-custom th {
                padding: 10px 8px;
            }
            .action-view-btn {
                width: 32px;
                height: 32px;
                font-size: 0.85rem;
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
            .action-buttons {
                gap: 6px;
            }
            .action-view-btn {
                width: 30px;
                height: 30px;
                font-size: 0.8rem;
            }
            .pagination-btn {
                padding: 0.3rem 0.7rem;
                font-size: 0.7rem;
            }
            .record-label {
                width: 90px;
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
                <input type="text" class="search-box" id="searchPatientInput" placeholder="Search patient records...">
            </div>
        </div>

        <!-- COUNTER + PAGINATION ROW -->
        <div class="counter-pagination-row">
            <div class="total-counter" id="totalRecordsCounter">
                <i class="fa-solid fa-notes-medical"></i> 
                Total Medical Records: <span id="totalCount">0</span>
            </div>
            <div class="pagination-wrapper" id="paginationControlsTop">
                <!-- pagination injected here -->
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
                        <th>Email of Patient</th>
                        <th>Course & Year</th>
                        <th>Service Type</th>
                        <th>Register Date</th>
                        <th>Status</th>
                        <th style="width: 110px; text-align: center;">Action</th>
                    </tr>
                </thead>
                <tbody id="patientTableBody">
                    <!-- dynamic rows: Registered patients with View Records button -->
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- VIEW MEDICAL RECORDS MODAL (pop-up form) -->
<div class="modal fade top-aligned-modal" id="viewRecordsModal" tabindex="-1" aria-hidden="true" data-bs-backdrop="static">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content" style="border-radius: 24px;">
            <div class="modal-header modal-header-records">
                <h5 class="modal-title"><i class="fa-solid fa-folder-open me-2"></i>Patient Medical Records</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body" style="padding: 1.5rem; max-height: 70vh; overflow-y: auto;">
                <!-- Patient Basic Info Section -->
                <div class="records-section" style="background: var(--medical-blue-soft);">
                    <div class="records-title"><i class="fa-regular fa-user me-2"></i>Patient Information</div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="record-item"><span class="record-label">Full Name:</span> <span class="record-value" id="viewPatientName">-</span></div>
                            <div class="record-item"><span class="record-label">Patient ID:</span> <span class="record-value" id="viewPatientId">-</span></div>
                            <div class="record-item"><span class="record-label">Email:</span> <span class="record-value" id="viewEmail">-</span></div>
                        </div>
                        <div class="col-md-6">
                            <div class="record-item"><span class="record-label">Department:</span> <span class="record-value" id="viewDepartment">-</span></div>
                            <div class="record-item"><span class="record-label">Course Year:</span> <span class="record-value" id="viewCourseYear">-</span></div>
                            <div class="record-item"><span class="record-label">Register Date:</span> <span class="record-value" id="viewRegisterDate">-</span></div>
                        </div>
                    </div>
                </div>

                <!-- Medical History Section -->
                <div class="records-section">
                    <div class="records-title"><i class="fa-solid fa-notes-medical me-2"></i>Medical History</div>
                    <div class="record-item"><span class="record-label">Blood Type:</span> <span class="record-value" id="viewBloodType">O+ (on file)</span></div>
                    <div class="record-item"><span class="record-label">Allergies:</span> <span class="record-value" id="viewAllergies">None reported</span></div>
                    <div class="record-item"><span class="record-label">Chronic Conditions:</span> <span class="record-value" id="viewConditions">No chronic conditions</span></div>
                    <div class="record-item"><span class="record-label">Past Surgeries:</span> <span class="record-value" id="viewSurgeries">None</span></div>
                    <div class="record-item"><span class="record-label">Current Medications:</span> <span class="record-value" id="viewMedications">None</span></div>
                </div>

                <!-- Recent Visits / Appointments -->
                <div class="records-section">
                    <div class="records-title"><i class="fa-regular fa-calendar-check me-2"></i>Recent Visits</div>
                    <div id="recentVisitsList">
                        <div class="record-item"><span class="record-label">Last Visit:</span> <span class="record-value" id="lastVisit">March 5, 2026</span></div>
                        <div class="record-item"><span class="record-label">Total Visits:</span> <span class="record-value" id="totalVisits">3</span></div>
                        <div class="record-item"><span class="record-label">Next Follow-up:</span> <span class="record-value" id="nextFollowup">Pending schedule</span></div>
                    </div>
                </div>

                <div class="text-muted small mt-2"><i class="fa-regular fa-clock me-1"></i>Records last updated: March 2026</div>
            </div>
            <div class="modal-footer" style="border-top: none; padding: 1rem 1.5rem 1.5rem;">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" style="border-radius: 30px;">Close</button>
                <!-- Print button with properly working Font Awesome icon (fa-print) -->
                <button type="button" class="btn btn-primary" id="printRecordBtn" style="background: var(--medical-blue); border-radius: 30px;"><i class="fa-solid fa-print me-1"></i>Print Record</button>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    // ============================================================
    // MEDICAL RECORDS (nursepatientrecords.php)
    // Fixed: Print button icon now displays correctly (fa-solid fa-print)
    // Same design as manage patients but Action = View Records modal
    // Status remains "Registered", added medical history data per patient
    // ============================================================
    
    let patientRecordsList = [
        { id: "rec1", patientName: "Maria Santos", patientId: "2026-00123-PT-0", email: "maria.santos@example.com", department: "BSIT", courseYear: "3-1", serviceType: "Online Register", registerDate: "02/15/26", status: "registered", bloodType: "A+", allergies: "Penicillin", conditions: "Asthma", medications: "Albuterol PRN", visits: 5, lastVisit: "Feb 28, 2026" },
        { id: "rec2", patientName: "John Dela Cruz", patientId: "2026-00124-PT-1", email: "john.dc@example.com", department: "BSCS", courseYear: "2-2", serviceType: "Kiosk Register", registerDate: "02/16/26", status: "registered", bloodType: "O+", allergies: "None", conditions: "None", medications: "None", visits: 2, lastVisit: "Mar 2, 2026" },
        { id: "rec3", patientName: "Reyna Lopez", patientId: "2026-00125-PT-2", email: "reyna.lopez@example.com", department: "BSN", courseYear: "4-1", serviceType: "Online Register", registerDate: "02/16/26", status: "registered", bloodType: "B+", allergies: "Seafood", conditions: "Hypertension", medications: "Losartan", visits: 4, lastVisit: "Mar 10, 2026" },
        { id: "rec4", patientName: "Eduardo Gomez", patientId: "2026-00126-PT-3", email: "edu.gomez@example.com", department: "BSCE", courseYear: "3-2", serviceType: "Online Register", registerDate: "02/17/26", status: "registered", bloodType: "AB+", allergies: "Dust", conditions: "Allergic Rhinitis", medications: "Cetirizine", visits: 3, lastVisit: "Feb 20, 2026" },
        { id: "rec5", patientName: "Francesca Cruz", patientId: "2026-00127-PT-4", email: "frances.cruz@example.com", department: "BSBA", courseYear: "2-1", serviceType: "Kiosk Register", registerDate: "02/18/26", status: "registered", bloodType: "O-", allergies: "None", conditions: "None", medications: "None", visits: 1, lastVisit: "Mar 1, 2026" },
        { id: "rec6", patientName: "Liam Mercado", patientId: "2026-00128-PT-5", email: "liam.merc@example.com", department: "BSIT", courseYear: "1-3", serviceType: "Online Register", registerDate: "02/19/26", status: "registered", bloodType: "A-", allergies: "Peanuts", conditions: "Eczema", medications: "Topical cream", visits: 2, lastVisit: "Feb 25, 2026" },
        { id: "rec7", patientName: "Sophia Ramirez", patientId: "2026-00129-PT-6", email: "sophia.ram@example.com", department: "BS Psychology", courseYear: "3-1", serviceType: "Kiosk Register", registerDate: "02/20/26", status: "registered", bloodType: "B-", allergies: "Latex", conditions: "None", medications: "None", visits: 3, lastVisit: "Mar 8, 2026" },
        { id: "rec8", patientName: "Andrei Villanueva", patientId: "2026-00130-PT-7", email: "andrei.v@example.com", department: "BSCS", courseYear: "4-2", serviceType: "Online Register", registerDate: "02/20/26", status: "registered", bloodType: "O+", allergies: "None", conditions: "Migraine", medications: "Ibuprofen", visits: 6, lastVisit: "Mar 12, 2026" },
        { id: "rec9", patientName: "Gianna Rivera", patientId: "2026-00131-PT-8", email: "gianna.riv@example.com", department: "BSN", courseYear: "2-2", serviceType: "Online Register", registerDate: "02/21/26", status: "registered", bloodType: "A+", allergies: "Sulfa", conditions: "None", medications: "None", visits: 2, lastVisit: "Feb 18, 2026" },
        { id: "rec10", patientName: "Paolo Mendoza", patientId: "2026-00132-PT-9", email: "paolo.mend@example.com", department: "BSIT", courseYear: "3-3", serviceType: "Kiosk Register", registerDate: "02/21/26", status: "registered", bloodType: "AB-", allergies: "None", conditions: "Gerd", medications: "Omeprazole", visits: 4, lastVisit: "Mar 5, 2026" },
        { id: "rec11", patientName: "Isabella Flores", patientId: "2026-00133-PT-10", email: "bella.flores@example.com", department: "BSN", courseYear: "4-2", serviceType: "Online Register", registerDate: "02/22/26", status: "registered", bloodType: "B+", allergies: "Dairy", conditions: "None", medications: "None", visits: 1, lastVisit: "Feb 22, 2026" },
        { id: "rec12", patientName: "Carlos Reyes", patientId: "2026-00134-PT-11", email: "carlos.reyes@example.com", department: "BSCE", courseYear: "3-1", serviceType: "Kiosk Register", registerDate: "02/22/26", status: "registered", bloodType: "O+", allergies: "None", conditions: "Diabetes Type 2", medications: "Metformin", visits: 7, lastVisit: "Mar 9, 2026" }
    ];

    const ITEMS_PER_PAGE = 4;
    let currentPage = 1;
    let currentFilteredList = [];
    let viewRecordsModal;
    let currentViewPatient = null;

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

    function getFilteredPatients() {
        const searchTerm = document.getElementById('searchPatientInput')?.value.toLowerCase().trim() || '';
        let filtered = [...patientRecordsList];
        if (searchTerm) {
            filtered = filtered.filter(pat => 
                pat.patientName.toLowerCase().includes(searchTerm) ||
                pat.patientId.toLowerCase().includes(searchTerm) ||
                pat.email.toLowerCase().includes(searchTerm) ||
                pat.department.toLowerCase().includes(searchTerm) ||
                (pat.courseYear && pat.courseYear.toLowerCase().includes(searchTerm)) ||
                pat.serviceType.toLowerCase().includes(searchTerm) ||
                pat.registerDate.includes(searchTerm)
            );
        }
        return filtered;
    }

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
        renderPatientTable();
    }

    function renderPatientTable() {
        const tbody = document.getElementById('patientTableBody');
        if (!tbody) return;
        const filtered = getFilteredPatients();
        currentFilteredList = filtered;
        const totalPages = Math.max(1, Math.ceil(filtered.length / ITEMS_PER_PAGE));
        if (currentPage > totalPages) currentPage = totalPages;
        if (currentPage < 1) currentPage = 1;
        const startIdx = (currentPage - 1) * ITEMS_PER_PAGE;
        const pageItems = filtered.slice(startIdx, startIdx + ITEMS_PER_PAGE);
        document.getElementById('totalCount').innerText = patientRecordsList.length;
        
        if (pageItems.length === 0) {
            tbody.innerHTML = `<td><td colspan="7" class="text-center py-5"><div class="empty-state"><i class="fa-solid fa-notes-medical fa-3x mb-3 opacity-50"></i><p class="mb-0">No medical records found.</p><small class="text-muted">Registered patients will appear here.</small></div></td></tr>`;
            renderPaginationControls();
            return;
        }
        
        tbody.innerHTML = pageItems.map(pat => {
            const initials = getInitials(pat.patientName);
            const avatarBg = getAvatarColor(pat.patientName);
            const safeId = escapeHtml(pat.id);
            const courseDept = `${escapeHtml(pat.department)}, ${escapeHtml(pat.courseYear)}`;
            const displayPatientId = `<span class="id-label">ID:</span> ${escapeHtml(pat.patientId)}`;
            return `<tr data-id="${pat.id}">
                <td><div class="student-info-wrapper"><div class="profile-avatar" style="background: ${avatarBg};">${escapeHtml(initials)}</div><div class="student-text"><span class="patient-name">${escapeHtml(pat.patientName)}</span><span class="patient-id-text">${displayPatientId}</span></div></div></td>
                <td class="email-cell"><i class="fa-regular fa-envelope me-1"></i> ${escapeHtml(pat.email)}</td>
                <td class="dept-course">${courseDept}</td>
                <td class="service-cell">${pat.serviceType === 'Online Register' ? '<i class="fa-solid fa-globe me-1"></i>' : '<i class="fa-solid fa-desktop me-1"></i>'} ${escapeHtml(pat.serviceType)}</td>
                <td class="date-cell">${escapeHtml(pat.registerDate)}</td>
                <td><span class="status-badge-registered"><i class="fa-regular fa-circle-check"></i> Registered</span></td>
                <td style="text-align: center;">
                    <div class="action-buttons">
                        <button class="action-view-btn" onclick="openViewRecordsModal('${safeId}')" title="View Medical Records"><i class="fa-regular fa-folder-open"></i></button>
                    </div>
                </td>
             </tr>`;
        }).join('');
        renderPaginationControls();
    }

    function refreshTable() {
        currentPage = 1;
        renderPatientTable();
    }

    // OPEN VIEW RECORDS MODAL - populate with patient data and medical history
    window.openViewRecordsModal = function(patientId) {
        const patient = patientRecordsList.find(p => p.id === patientId);
        if (!patient) return;
        currentViewPatient = patient;
        
        document.getElementById('viewPatientName').innerText = patient.patientName;
        document.getElementById('viewPatientId').innerText = patient.patientId;
        document.getElementById('viewEmail').innerText = patient.email;
        document.getElementById('viewDepartment').innerText = patient.department;
        document.getElementById('viewCourseYear').innerText = patient.courseYear;
        document.getElementById('viewRegisterDate').innerText = patient.registerDate;
        document.getElementById('viewBloodType').innerText = patient.bloodType || "O+ (on file)";
        document.getElementById('viewAllergies').innerText = patient.allergies || "None reported";
        document.getElementById('viewConditions').innerText = patient.conditions || "No chronic conditions";
        document.getElementById('viewSurgeries').innerText = patient.surgeries || "None";
        document.getElementById('viewMedications').innerText = patient.medications || "None";
        document.getElementById('lastVisit').innerText = patient.lastVisit || "No recent visits";
        document.getElementById('totalVisits').innerText = patient.visits?.toString() || "0";
        document.getElementById('nextFollowup').innerText = patient.nextFollowup || "Pending schedule";
        
        viewRecordsModal.show();
    };

    // Print record functionality - uses proper HTML structure
    function printMedicalRecord() {
        if (!currentViewPatient) {
            // Fallback alert if no patient selected
            alert("No patient record selected to print.");
            return;
        }
        const printWindow = window.open('', '_blank');
        printWindow.document.write(`
            <html>
            <head><title>Medical Record - ${currentViewPatient.patientName}</title>
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
            <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
            <style>body { padding: 2rem; font-family: 'Poppins', sans-serif; } .header { border-bottom: 2px solid #475867; margin-bottom: 1.5rem; } .section { margin-bottom: 1.5rem; } .label { font-weight: 600; } .print-container { max-width: 800px; margin: 0 auto; }</style>
            </head>
            <body>
            <div class="print-container">
                <div class="header"><h3>PUPBC CareLink - Medical Record</h3><p>Generated: ${new Date().toLocaleString()}</p></div>
                <div class="section"><h5>Patient Information</h5><p><strong>Name:</strong> ${escapeHtml(currentViewPatient.patientName)}<br><strong>ID:</strong> ${escapeHtml(currentViewPatient.patientId)}<br><strong>Email:</strong> ${escapeHtml(currentViewPatient.email)}<br><strong>Department:</strong> ${escapeHtml(currentViewPatient.department)}<br><strong>Course Year:</strong> ${escapeHtml(currentViewPatient.courseYear)}</p></div>
                <div class="section"><h5>Medical History</h5><p><strong>Blood Type:</strong> ${escapeHtml(currentViewPatient.bloodType || 'O+')}<br><strong>Allergies:</strong> ${escapeHtml(currentViewPatient.allergies || 'None')}<br><strong>Conditions:</strong> ${escapeHtml(currentViewPatient.conditions || 'None')}<br><strong>Medications:</strong> ${escapeHtml(currentViewPatient.medications || 'None')}<br><strong>Last Visit:</strong> ${escapeHtml(currentViewPatient.lastVisit || 'N/A')}<br><strong>Total Visits:</strong> ${currentViewPatient.visits || 0}</p></div>
            </div>
            </body></html>
        `);
        printWindow.document.close();
        printWindow.print();
    }

    function setupEventListeners() {
        const searchInput = document.getElementById('searchPatientInput');
        if (searchInput) {
            searchInput.addEventListener('input', () => { currentPage = 1; renderPatientTable(); });
        }
        const printBtn = document.getElementById('printRecordBtn');
        if (printBtn) {
            printBtn.addEventListener('click', printMedicalRecord);
        }
    }

    document.addEventListener('DOMContentLoaded', function() {
        viewRecordsModal = new bootstrap.Modal(document.getElementById('viewRecordsModal'), { backdrop: 'static', keyboard: false });
        setupEventListeners();
        renderPatientTable();
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