<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="0">
    <title>Nurse Report Summary | PUPBC CareLink | Service ID Integration</title>
    
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
            --completed-green: #2c7a47;
            --completed-bg: #e0f2e9;
            --view-btn-bg: #eef2ff;
            --view-btn-color: #1e3a8a;
            --service-id-bg: #f1f5f9;
            --service-id-color: #0f172a;
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

        /* Search section */
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
            transition: all 0.2s ease;
        }
        .total-counter i {
            color: var(--completed-green);
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

        .separator-line {
            border-bottom: var(--border-subtle);
            margin-bottom: 16px;
        }

        /* SORTABLE HEADER */
        .sortable-header {
            cursor: pointer;
            user-select: none;
            transition: background 0.2s;
            position: relative;
        }
        .sortable-header:hover {
            background: rgba(71, 88, 103, 0.05);
        }
        .sort-icon {
            margin-left: 6px;
            font-size: 0.7rem;
            opacity: 0.6;
            display: inline-block;
        }
        .sortable-header.asc .sort-icon .fa-sort-up { opacity: 1; color: var(--brand-primary); }
        .sortable-header.desc .sort-icon .fa-sort-down { opacity: 1; color: var(--brand-primary); }
        .sort-icon i {
            vertical-align: middle;
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

        /* Smaller font for email and service type columns */
        .email-cell-reduced {
            font-size: 0.8rem;
        }
        .service-cell-reduced {
            font-size: 0.8rem;
        }
        
        /* Service ID Badge styling */
        .service-id-badge {
            background: var(--service-id-bg);
            color: var(--service-id-color);
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
        .service-id-badge i {
            margin-right: 0px;
            font-size: 0.7rem;
            color: var(--medical-blue-light);
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

        /* Status badge completed */
        .status-badge-completed {
            background: var(--completed-bg);
            color: var(--completed-green);
            padding: 5px 12px;
            border-radius: 6px;
            font-size: 0.75rem;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }

        /* View button */
        .btn-view-details {
            background: var(--view-btn-bg);
            color: var(--view-btn-color);
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
        .btn-view-details:hover {
            background: var(--view-btn-color);
            color: white;
            transform: translateY(-1px);
            box-shadow: 0 4px 10px rgba(30, 58, 138, 0.2);
        }

        .empty-state {
            text-align: center;
            padding: 2.5rem;
            color: var(--text-muted);
        }

        /* Modal top-aligned */
        .modal.top-aligned-modal .modal-dialog {
            margin-top: 0.5rem !important;
            margin-bottom: 0;
            align-items: flex-start !important;
        }
        .modal.top-aligned-modal .modal-content {
            border-radius: 20px;
            border: none;
        }

        @media (max-width: 1200px) {
            .table-custom td, .table-custom th {
                padding: 10px 8px;
            }
            .profile-avatar {
                width: 34px;
                height: 34px;
                font-size: 0.8rem;
            }
            .service-id-badge {
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
        }
    </style>
</head>
<body>

<div class="appointments-wrapper">
    <div class="form-content">
        <!-- SEARCH SECTION -->
        <div class="search-section">
            <div class="search-wrapper">
                <i class="fas fa-search search-icon"></i>
                <input type="text" class="search-box" id="searchLogsInput" placeholder="Search logs...">
            </div>
        </div>

        <!-- COUNTER + PAGINATION ROW -->
        <div class="counter-pagination-row">
            <div class="total-counter" id="totalLogsCounter">
                <i class="fa-solid fa-clipboard-list"></i> 
                Total Completed Logs: <span id="totalCount">0</span>
            </div>
            <div class="pagination-wrapper" id="paginationControlsTop"></div>
        </div>

        <!-- SEPARATOR LINE -->
        <div class="separator-line"></div>

        <!-- TABLE CONTAINER: Replaced Completion Time column with Service ID -->
        <div class="table-responsive-custom">
            <table class="table table-custom" id="reportTable">
                <thead>
                    <tr>
                        <th class="sortable-header" data-sort="patientName">Patient Details <span class="sort-icon"><i class="fa-solid fa-sort-up"></i><i class="fa-solid fa-sort-down"></i></span></th>
                        <th class="sortable-header" data-sort="email">Patient Email <span class="sort-icon"><i class="fa-solid fa-sort-up"></i><i class="fa-solid fa-sort-down"></i></span></th>
                        <th class="sortable-header" data-sort="courseYear">Course & Year <span class="sort-icon"><i class="fa-solid fa-sort-up"></i><i class="fa-solid fa-sort-down"></i></span></th>
                        <th class="sortable-header" data-sort="serviceType">Service Type <span class="sort-icon"><i class="fa-solid fa-sort-up"></i><i class="fa-solid fa-sort-down"></i></span></th>
                        <th class="sortable-header" data-sort="serviceId">Service ID <span class="sort-icon"><i class="fa-solid fa-sort-up"></i><i class="fa-solid fa-sort-down"></i></span></th>
                        <th class="sortable-header" data-sort="status">Status <span class="sort-icon"><i class="fa-solid fa-sort-up"></i><i class="fa-solid fa-sort-down"></i></span></th>
                        <th style="width: 100px; text-align: center;">Action</th>
                    </tr>
                </thead>
                <tbody id="reportTableBody">
                    <!-- dynamic rows, max 4 per page -->
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- VIEW DETAILS MODAL -->
<div class="modal fade top-aligned-modal" id="viewDetailsModal" tabindex="-1" aria-hidden="true" data-bs-backdrop="static">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content" style="border-radius: 20px;">
            <div class="modal-header" style="background: var(--brand-primary); color: white; border-radius: 20px 20px 0 0;">
                <h5 class="modal-title"><i class="fa-solid fa-file-lines me-2"></i>Completed Session Details</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body" id="modalDetailsContent" style="padding: 1.5rem;"></div>
            <div class="modal-footer" style="border-top: none;">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    // --------------------------------------------------------------
    // NURSE SUMMARY REPORTS - DYNAMIC SERVICE ID GENERATION
    // Replaced "Completion Time" column with "Service ID"
    // Service ID logic:
    // - Appointment-related (consultation, regular check-up, follow-up, dental, vaccination, etc.) -> APT-YYMM-XXX
    // - Laboratory/Medical-related (lab result review, medication refill, prescribe medication, urinalysis, x-ray, etc.) -> LAB-YYMM-XXX
    // Each record gets a unique generated ID based on its service type keywords.
    // --------------------------------------------------------------
    
    // Base dataset (original logs without completionTime, now with serviceId dynamically generated)
    let rawCompletedLogs = [
        { id: "log1", patientName: "Maria Santos", patientId: "2019-00001-PT-0", email: "maria.santos@example.com", department: "BSIT", courseYear: "3-1", serviceType: "General Consultation", status: "completed" },
        { id: "log2", patientName: "John Dela Cruz", patientId: "2019-00002-PT-1", email: "john.dc@example.com", department: "BSCS", courseYear: "2-2", serviceType: "Medication Refill", status: "completed" },
        { id: "log3", patientName: "Reyna Lopez", patientId: "2019-00003-PT-2", email: "reyna.lopez@example.com", department: "BSN", courseYear: "4-1", serviceType: "Prescribe Medication", status: "completed" },
        { id: "log4", patientName: "Eduardo Gomez", patientId: "2019-00004-PT-3", email: "edu.gomez@example.com", department: "BSCE", courseYear: "3-2", serviceType: "Assist Consultation", status: "completed" },
        { id: "log5", patientName: "Francesca Cruz", patientId: "2019-00005-PT-4", email: "frances.cruz@example.com", department: "BSBA", courseYear: "2-1", serviceType: "Regular Check-up", status: "completed" },
        { id: "log6", patientName: "Liam Mercado", patientId: "2019-00006-PT-5", email: "liam.merc@example.com", department: "BSIT", courseYear: "1-3", serviceType: "Lab Result Review", status: "completed" },
        { id: "log7", patientName: "Sophia Ramirez", patientId: "2019-00007-PT-6", email: "sophia.ram@example.com", department: "BS Psychology", courseYear: "3-1", serviceType: "Follow-up", status: "completed" },
        { id: "log8", patientName: "Andrei Villanueva", patientId: "2019-00008-PT-7", email: "andrei.v@example.com", department: "BSCS", courseYear: "4-2", serviceType: "General Consultation", status: "completed" },
        { id: "log9", patientName: "Gianna Rivera", patientId: "2019-00009-PT-8", email: "gianna.riv@example.com", department: "BSN", courseYear: "2-2", serviceType: "Vaccination", status: "completed" },
        { id: "log10", patientName: "Paolo Mendoza", patientId: "2019-00010-PT-9", email: "paolo.mend@example.com", department: "BSIT", courseYear: "3-3", serviceType: "Urinalysis", status: "completed" },
        { id: "log11", patientName: "Isabella Flores", patientId: "2019-00011-PT-10", email: "bella.flores@example.com", department: "BSN", courseYear: "4-2", serviceType: "X-Ray (Chest)", status: "completed" },
        { id: "log12", patientName: "Carlos Reyes", patientId: "2019-00012-PT-11", email: "carlos.reyes@example.com", department: "BSCE", courseYear: "3-1", serviceType: "Stool Examination", status: "completed" },
        { id: "log13", patientName: "Megan Torres", patientId: "2019-00013-PT-12", email: "megan.torres@example.com", department: "BSIT", courseYear: "2-2", serviceType: "Dental Consultation", status: "completed" },
        { id: "log14", patientName: "Justin Bautista", patientId: "2019-00014-PT-13", email: "justin.b@example.com", department: "BSBA", courseYear: "1-4", serviceType: "Medication Refill", status: "completed" }
    ];

    // Helper: Determine Service ID prefix based on service type keywords
    function getServiceIdPrefix(serviceType) {
        const lowerService = serviceType.toLowerCase();
        // Appointment-related keywords (Consultation, Check-up, Follow-up, Dental, Vaccination, Assist Consultation, Regular Check-up)
        const appointmentKeywords = ['consultation', 'check-up', 'regular check', 'follow-up', 'dental', 'vaccination', 'assist consultation', 'regular checkup'];
        // Laboratory / Medical procedure keywords
        const labKeywords = ['lab result', 'medication refill', 'prescribe medication', 'prescribe', 'urinalysis', 'stool', 'x-ray', 'chest x-ray', 'lab', 'medication'];
        
        let isAppointment = appointmentKeywords.some(keyword => lowerService.includes(keyword));
        let isLab = labKeywords.some(keyword => lowerService.includes(keyword));
        
        // Prioritize lab if both ambiguous? but we follow logic: if matches lab specifically -> LAB, else if matches appointment -> APT
        if (isLab) return "LAB";
        if (isAppointment) return "APT";
        // Default fallback: APT for generic services
        return "APT";
    }
    
    // Generate a consistent Service ID for each log based on its index and service type
    // Format: PREFIX-YYMM-XXX where YYMM = 2604 (April 2026), and XXX incremental unique number
    // To keep IDs readable and based on real data: we generate deterministic sequential numbers per category.
    // For demonstration we use a stable mapping: for each log we generate ID using prefix + base date (2604) + custom 3-digit code based on id hash.
    function generateServiceId(log, idx) {
        const prefix = getServiceIdPrefix(log.serviceType);
        // Use a consistent date code: 2604 representing April 2026 (can be dynamic but stable)
        const dateCode = "2604";
        // Generate unique 3-digit number: using index + 330 as base offset to create variety (APT-2604-334, LAB-2603-336 style)
        let sequenceNum = (idx + 331) % 1000;
        let threeDigit = sequenceNum.toString().padStart(3, '0');
        // For variety and realism, adjust for some logs: ensures different numbers as example
        if (log.id === "log1") threeDigit = "334";
        if (log.id === "log2") threeDigit = "335";
        if (log.id === "log3") threeDigit = "336";
        if (log.id === "log4") threeDigit = "337";
        if (log.id === "log5") threeDigit = "338";
        if (log.id === "log6") threeDigit = "339";
        if (log.id === "log7") threeDigit = "340";
        if (log.id === "log8") threeDigit = "341";
        if (log.id === "log9") threeDigit = "342";
        if (log.id === "log10") threeDigit = "343";
        if (log.id === "log11") threeDigit = "344";
        if (log.id === "log12") threeDigit = "345";
        if (log.id === "log13") threeDigit = "346";
        if (log.id === "log14") threeDigit = "347";
        
        return `${prefix}-${dateCode}-${threeDigit}`;
    }
    
    // Build full logs list with generated serviceId
    let completedLogsList = rawCompletedLogs.map((log, index) => ({
        ...log,
        serviceId: generateServiceId(log, index)
    }));
    
    const ITEMS_PER_PAGE = 4;
    let currentPage = 1;
    let currentDisplayList = [...completedLogsList];
    let currentSort = { field: "patientName", direction: "asc" };
    
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
    
    function sortList(list, field, direction) {
        const sorted = [...list];
        sorted.sort((a, b) => {
            let valA = a[field];
            let valB = b[field];
            if (field === 'patientName') valA = a.patientName.toLowerCase();
            if (field === 'patientName') valB = b.patientName.toLowerCase();
            if (field === 'email') valA = a.email.toLowerCase();
            if (field === 'email') valB = b.email.toLowerCase();
            if (field === 'courseYear') valA = a.courseYear;
            if (field === 'courseYear') valB = b.courseYear;
            if (field === 'serviceType') valA = a.serviceType;
            if (field === 'serviceType') valB = b.serviceType;
            if (field === 'serviceId') valA = a.serviceId;
            if (field === 'serviceId') valB = b.serviceId;
            if (field === 'status') valA = a.status;
            if (field === 'status') valB = b.status;
            if (valA < valB) return direction === 'asc' ? -1 : 1;
            if (valA > valB) return direction === 'asc' ? 1 : -1;
            return 0;
        });
        return sorted;
    }
    
    function getFilteredList() {
        const searchTerm = document.getElementById('searchLogsInput')?.value.toLowerCase().trim() || '';
        let filtered = [...completedLogsList];
        if (searchTerm) {
            filtered = filtered.filter(log => {
                const fullInfo = `${log.patientName} ${log.patientId} ${log.email} ${log.department} ${log.courseYear} ${log.serviceType} ${log.serviceId}`.toLowerCase();
                return fullInfo.includes(searchTerm);
            });
        }
        return sortList(filtered, currentSort.field, currentSort.direction);
    }
    
    function updateTotalCounterFunctionality() {
        const masterTotal = completedLogsList.length;
        const filteredTotal = currentDisplayList.length;
        const totalSpan = document.getElementById('totalCount');
        if (totalSpan) {
            if (filteredTotal !== masterTotal) {
                totalSpan.innerHTML = `${masterTotal} <span style="font-size:0.7rem; background:rgba(0,0,0,0.08); padding:2px 6px; border-radius:20px;">filtered: ${filteredTotal}</span>`;
            } else {
                totalSpan.innerHTML = `${masterTotal}`;
            }
        }
        const counterContainer = document.getElementById('totalLogsCounter');
        if (counterContainer) {
            if (filteredTotal !== masterTotal) {
                counterContainer.title = `Total master logs: ${masterTotal} | Current filtered: ${filteredTotal}`;
            } else {
                counterContainer.title = `Total completed logs: ${masterTotal}`;
            }
        }
    }
    
    function renderTableBody() {
        const tbody = document.getElementById('reportTableBody');
        if (!tbody) return;
        const startIdx = (currentPage - 1) * ITEMS_PER_PAGE;
        const pageItems = currentDisplayList.slice(startIdx, startIdx + ITEMS_PER_PAGE);
        
        if (pageItems.length === 0) {
            tbody.innerHTML = `<td><td colspan="7" class="text-center py-5"><div class="empty-state"><i class="fa-solid fa-chart-simple fa-3x mb-3 opacity-50"></i><p class="mb-0">No completed logs found.</p><small class="text-muted">Try adjusting your search.</small></div></td></tr>`;
            return;
        }
        
        tbody.innerHTML = pageItems.map(log => {
            const initials = getInitials(log.patientName);
            const avatarBg = getAvatarColor(log.patientName);
            const displayPatientId = `<span class="id-label">ID:</span> ${escapeHtml(log.patientId)}`;
            const courseDept = `${escapeHtml(log.department)}, ${escapeHtml(log.courseYear)}`;
            const safeName = escapeHtml(log.patientName).replace(/'/g, "&#39;");
            const serviceIdDisplay = `<span class="service-id-badge"><i class="fa-solid fa-receipt"></i> ${escapeHtml(log.serviceId)}</span>`;
            
            return `<tr data-id="${log.id}">
                <td>
                    <div class="student-info-wrapper">
                        <div class="profile-avatar" style="background: ${avatarBg};">${escapeHtml(initials)}</div>
                        <div class="student-text">
                            <span class="patient-name">${escapeHtml(log.patientName)}</span>
                            <span class="patient-id-text">${displayPatientId}</span>
                        </div>
                    </div>
                </td>
                <td class="email-cell-reduced">${escapeHtml(log.email)}</td>
                <td>${courseDept}</td>
                <td class="service-cell-reduced">${escapeHtml(log.serviceType)}</td>
                <td>${serviceIdDisplay}</td>
                <td><span class="status-badge-completed"><i class="fa-regular fa-circle-check"></i> Completed</span></td>
                <td style="text-align: center;">
                    <button class="btn-view-details" onclick="openViewModal('${log.id}')"><i class="fa-regular fa-eye"></i> View</button>
                </td>
             </tr>`;
        }).join('');
    }
    
    function renderPaginationControls() {
        const container = document.getElementById('paginationControlsTop');
        if (!container) return;
        const totalItems = currentDisplayList.length;
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
        const totalPages = Math.max(1, Math.ceil(currentDisplayList.length / ITEMS_PER_PAGE));
        if (page < 1 || page > totalPages) return;
        currentPage = page;
        renderTableBody();
        renderPaginationControls();
    }
    
    function refreshDisplay() {
        currentDisplayList = getFilteredList();
        const totalPages = Math.max(1, Math.ceil(currentDisplayList.length / ITEMS_PER_PAGE));
        if (currentPage > totalPages) currentPage = totalPages;
        if (currentPage < 1) currentPage = 1;
        updateTotalCounterFunctionality();
        renderTableBody();
        renderPaginationControls();
    }
    
    function initSorting() {
        const headers = document.querySelectorAll('.sortable-header');
        headers.forEach(header => {
            header.addEventListener('click', () => {
                const sortField = header.getAttribute('data-sort');
                if (!sortField) return;
                let newDirection = 'asc';
                if (currentSort.field === sortField && currentSort.direction === 'asc') newDirection = 'desc';
                currentSort = { field: sortField, direction: newDirection };
                headers.forEach(h => h.classList.remove('asc', 'desc'));
                header.classList.add(newDirection);
                const iconSpan = header.querySelector('.sort-icon');
                if (iconSpan) {
                    if (newDirection === 'asc') iconSpan.innerHTML = '<i class="fa-solid fa-sort-up" style="opacity:1;"></i><i class="fa-solid fa-sort-down" style="opacity:0.3;"></i>';
                    else iconSpan.innerHTML = '<i class="fa-solid fa-sort-up" style="opacity:0.3;"></i><i class="fa-solid fa-sort-down" style="opacity:1;"></i>';
                }
                currentDisplayList = getFilteredList();
                currentPage = 1;
                renderTableBody();
                renderPaginationControls();
                updateTotalCounterFunctionality();
            });
        });
    }
    
    let viewModal;
    window.openViewModal = function(logId) {
        const record = completedLogsList.find(l => l.id === logId);
        if (!record) return;
        const modalBody = document.getElementById('modalDetailsContent');
        modalBody.innerHTML = `
            <div class="mb-3 pb-2 border-bottom"><strong><i class="fa-regular fa-user"></i> Patient:</strong> ${escapeHtml(record.patientName)}</div>
            <div class="mb-3 pb-2 border-bottom"><strong><i class="fa-regular fa-id-card"></i> Patient ID:</strong> ${escapeHtml(record.patientId)}</div>
            <div class="mb-3 pb-2 border-bottom"><strong><i class="fa-regular fa-envelope"></i> Email:</strong> ${escapeHtml(record.email)}</div>
            <div class="mb-3 pb-2 border-bottom"><strong><i class="fa-regular fa-building"></i> Course & Dept:</strong> ${escapeHtml(record.department)} (${escapeHtml(record.courseYear)})</div>
            <div class="mb-3 pb-2 border-bottom"><strong><i class="fa-solid fa-stethoscope"></i> Service:</strong> ${escapeHtml(record.serviceType)}</div>
            <div class="mb-3 pb-2 border-bottom"><strong><i class="fa-regular fa-receipt"></i> Service ID:</strong> ${escapeHtml(record.serviceId)}</div>
            <div><strong><i class="fa-regular fa-circle-check"></i> Status:</strong> <span class="badge bg-success">Completed</span></div>
        `;
        viewModal.show();
    };
    
    function setupEventListeners() {
        const searchInput = document.getElementById('searchLogsInput');
        if (searchInput) {
            searchInput.addEventListener('input', () => {
                currentPage = 1;
                refreshDisplay();
            });
        }
    }
    
    document.addEventListener('DOMContentLoaded', () => {
        viewModal = new bootstrap.Modal(document.getElementById('viewDetailsModal'), { backdrop: true });
        setupEventListeners();
        currentDisplayList = sortList(completedLogsList, currentSort.field, currentSort.direction);
        refreshDisplay();
        initSorting();
        // Set default sort indicator on Patient Details
        const defaultHeader = document.querySelector('.sortable-header[data-sort="patientName"]');
        if (defaultHeader) defaultHeader.classList.add('asc');
    });
    
    if (window.self === window.top) {
        const currentPagePath = window.location.pathname.split("/").pop();
        if (currentPagePath && !currentPagePath.includes('nursedashboard.php')) {
             window.location.href = "nursedashboard.php?page=nursereports.php&subpage=" + currentPagePath;
        }
    }
</script>
</body>
</html>