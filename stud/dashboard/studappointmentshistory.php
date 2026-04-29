<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="0">
    <title>Appointment History | Student Dashboard | PUPBC CareLink</title>
    
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
            --success-bg-soft: rgba(40, 167, 69, 0.1);
            --info-blue: #0d6efd;
            --info-bg-soft: rgba(13, 110, 253, 0.1);
            --danger-red: #dc3545;
            --danger-bg-soft: rgba(220, 53, 69, 0.1);
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

        /* status badge for "completed" */
        .status-badge-completed {
            background: var(--success-bg-soft);
            color: #1e7e34;
            padding: 5px 12px;
            border-radius: 6px;
            font-size: 0.75rem;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }

        /* Appointment ID badge style with icon - matching cancel appointments class */
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

        /* Action Buttons: View (eye) + Delete (trash) */
        .action-buttons {
            display: flex;
            gap: 12px;
            justify-content: center;
            align-items: center;
        }
        .btn-view-history {
            background: var(--info-bg-soft);
            color: var(--info-blue);
            border: none;
            width: 32px;
            height: 32px;
            border-radius: 8px;
            transition: all 0.2s ease;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: 0.9rem;
        }
        .btn-view-history:hover {
            background: var(--info-blue);
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 4px 10px rgba(13, 110, 253, 0.2);
        }
        .btn-delete-history {
            background: var(--danger-bg-soft);
            color: var(--danger-red);
            border: none;
            width: 32px;
            height: 32px;
            border-radius: 8px;
            transition: all 0.2s ease;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: 0.9rem;
        }
        .btn-delete-history:hover {
            background: var(--danger-red);
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 4px 10px rgba(220, 53, 69, 0.2);
        }

        .empty-state {
            text-align: center;
            padding: 2.5rem;
            color: var(--text-muted);
        }

        /* MODAL - WIDE 2-COLUMN LAYOUT */
        .modal.top-aligned-modal .modal-dialog {
            margin-top: 0.5rem !important;
            margin-bottom: 0;
            align-items: flex-start !important;
            max-width: 600px !important;
            width: 90%;
        }
        .modal.top-aligned-modal .modal-dialog {
            display: flex;
            align-items: flex-start;
            min-height: calc(100% - 0.5rem);
        }
        .modal.top-aligned-modal .modal-content {
            box-shadow: 0 12px 28px rgba(0, 0, 0, 0.15);
            border-radius: 24px;
            border: none;
            overflow: hidden;
        }
        .modal-header.bg-completed {
            background: var(--success-green);
            color: white;
            padding: 1rem 1.5rem;
            border-bottom: none;
        }
        .modal-body.two-column-body {
            padding: 1.8rem 1.8rem;
            background: #fefefe;
        }
        .details-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1.5rem 2rem;
        }
        .detail-card {
            background: #ffffff;
            border-radius: 16px;
            padding: 0.5rem 0;
        }
        .detail-field {
            margin-bottom: 0.9rem;
            border-bottom: 1px solid #eef2f8;
            padding-bottom: 0.73rem;
        }
        .detail-field:last-child {
            border-bottom: none;
            margin-bottom: 0;
            padding-bottom: 0;
        }
        .detail-label {
            font-weight: 600;
            font-size: 0.7rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            color: var(--text-muted);
            margin-bottom: 0.3rem;
            display: flex;
            align-items: center;
            gap: 6px;
        }
        .detail-value {
            font-weight: 500;
            color: var(--brand-primary);
            font-size: 0.9rem;
            word-break: break-word;
        }
        .badge-completed-modal {
            background: var(--success-bg-soft);
            color: #1e7e34;
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 0.75rem;
            font-weight: 600;
            display: inline-block;
        }
        .modal-footer {
            border-top: 1px solid #eef2f8;
            padding: 1rem 1.5rem;
            background: white;
        }
        @media (max-width: 768px) {
            .details-grid {
                grid-template-columns: 1fr;
                gap: 0.8rem;
            }
            .modal.top-aligned-modal .modal-dialog {
                max-width: 95% !important;
                margin: 0.5rem auto;
            }
            .modal-body.two-column-body {
                padding: 1.2rem;
            }
        }
        @media (max-width: 1200px) {
            .table-custom td, .table-custom th {
                padding: 10px 8px;
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
            .action-buttons {
                gap: 8px;
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
                <input type="text" class="search-box" id="searchHistoryInput" placeholder="Search history...">
            </div>
        </div>

        <!-- COUNTER + PAGINATION ROW (fixed position) -->
        <div class="counter-pagination-row">
            <div class="total-counter" id="totalHistoryCounter">
                <i class="fa-solid fa-calendar-check"></i> 
                Completed Appointments: <span id="totalCount">0</span>
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
                        <th style="width: 100px; text-align: center;">Action</th>
                    </tr>
                </thead>
                <tbody id="historyTableBody">
                    <!-- dynamic rows: max 4 per page -->
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- WIDE MODAL WITH 2-COLUMN LAYOUT FOR VIEWING APPOINTMENT DETAILS -->
<div class="modal fade top-aligned-modal" id="viewDetailsModal" tabindex="-1" aria-hidden="true" data-bs-backdrop="static">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-completed">
                <h5 class="modal-title"><i class="fa-solid fa-receipt me-2"></i>Appointment Details (Completed)</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body two-column-body">
                <div class="details-grid">
                    <!-- LEFT COLUMN -->
                    <div class="detail-card">
                        <div class="detail-field">
                            <div class="detail-label">Full Name (Nurse)</div>
                            <div class="detail-value" id="viewNurseName">-</div>
                        </div>
                        <div class="detail-field">
                            <div class="detail-label">Nurse ID / Employee #</div>
                            <div class="detail-value" id="viewNurseId">-</div>
                        </div>
                        <div class="detail-field">
                            <div class="detail-label">Email Address</div>
                            <div class="detail-value" id="viewNurseEmail">-</div>
                        </div>
                        <div class="detail-field">
                            <div class="detail-label">Medical Service</div>
                            <div class="detail-value" id="viewService">-</div>
                        </div>
                    </div>
                    <!-- RIGHT COLUMN -->
                    <div class="detail-card">
                        <div class="detail-field">
                            <div class="detail-label">Appointment Schedule</div>
                            <div class="detail-value" id="viewTime">-</div>
                        </div>
                        <div class="detail-field">
                            <div class="detail-label">Session Status</div>
                            <div class="detail-value"><span class="badge-completed-modal"><i class="fa-regular fa-circle-check me-1"></i> Completed</span></div>
                        </div>
                        <div class="detail-field">
                            <div class="detail-label">Date Completed</div>
                            <div class="detail-value" id="viewCompletedDate">-</div>
                        </div>
                        <div class="detail-field">
                            <div class="detail-label">Consultation Notes</div>
                            <div class="detail-value" id="viewConsultationNotes">Vital signs recorded, treatment provided as per assessment. Patient cleared.</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fa-solid fa-xmark me-1"></i>Close</button>
                <button type="button" class="btn btn-primary" id="printSummaryBtn" style="background: var(--medical-blue); border: none;"><i class="fa-solid fa-print me-1"></i> Print Summary</button>
            </div>
        </div>
    </div>
</div>

<!-- MODAL FOR DELETE CONFIRMATION -->
<div class="modal fade top-aligned-modal" id="deleteConfirmModal" tabindex="-1" aria-hidden="true" data-bs-backdrop="static">
    <div class="modal-dialog modal-dialog-centered modal-sm">
        <div class="modal-content" style="border-radius: 16px;">
            <div class="modal-header" style="background: var(--danger-red); color: white; border-radius: 16px 16px 0 0;">
                <h5 class="modal-title"><i class="fa-solid fa-trash-alt me-2"></i>Delete Record</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body" style="padding: 1.5rem;">
                <p class="mb-0">Are you sure you want to permanently delete this completed appointment record with <strong id="deleteNurseName"></strong>?</p>
                <small class="text-muted">This action cannot be undone. The record will be removed from history.</small>
            </div>
            <div class="modal-footer" style="border-top: none;">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-danger" id="confirmDeleteBtn">Yes, Delete</button>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    // ============================================================
    // STUDENT APPOINTMENTS HISTORY MANAGEMENT
    // Features:
    // - NEW COLUMN: Appointment ID (between Nurse Email and Service Type) with icon (fa-receipt)
    // - Sample IDs: APT-2604-334, APT-2606-335, APT-2607-336, etc.
    // - Only completed appointments (status = "Completed")
    // - Maximum 4 items per page, pagination fixed position
    // - Search bar filters across all columns including Appointment ID
    // - View button: WIDE modal with 2-column layout
    // - Delete button: removes appointment from history permanently
    // ============================================================

    // Sample dataset: Completed appointments history with Appointment IDs
    let completedHistoryList = [
        { 
            id: "hist_001", 
            appointmentId: "APT-2604-334",
            nurse: { name: "Emily Rodriguez", id: "NUR-2024-0123-EMP", email: "emily.rodriguez@pupbc.edu.ph" },
            service: "Lab Result Review",
            time: "09:30 AM",
            status: "Completed",
            completedDate: "March 15, 2025",
            notes: "Blood work reviewed, results normal. Patient advised to maintain healthy diet."
        },
        { 
            id: "hist_002", 
            appointmentId: "APT-2606-335",
            nurse: { name: "Michael Tan", id: "NUR-2023-0889-EMP", email: "michael.tan@pupbc.edu.ph" },
            service: "Medical Certificate",
            time: "11:00 AM",
            status: "Completed",
            completedDate: "March 16, 2025",
            notes: "Medical certificate issued for 3 days rest. No fever observed."
        },
        { 
            id: "hist_003", 
            appointmentId: "APT-2607-336",
            nurse: { name: "Sarah Gomez", id: "NUR-2025-0456-EMP", email: "sarah.gomez@pupbc.edu.ph" },
            service: "Vaccination",
            time: "01:15 PM",
            status: "Completed",
            completedDate: "March 14, 2025",
            notes: "Flu vaccine administered. No adverse reactions. Next dose scheduled."
        },
        { 
            id: "hist_004", 
            appointmentId: "APT-2608-337",
            nurse: { name: "James Rivera", id: "NUR-2024-0771-EMP", email: "james.rivera@pupbc.edu.ph" },
            service: "Difficulty Breathing",
            time: "02:45 PM",
            status: "Completed",
            completedDate: "March 12, 2025",
            notes: "Nebulizer treatment given. Oxygen saturation improved to 98%."
        },
        { 
            id: "hist_005", 
            appointmentId: "APT-2609-338",
            nurse: { name: "Patricia Lim", id: "NUR-2022-0992-EMP", email: "patricia.lim@pupbc.edu.ph" },
            service: "Dizziness",
            time: "08:45 AM",
            status: "Completed",
            completedDate: "March 10, 2025",
            notes: "Hydration therapy advised. Blood pressure normalized."
        },
        { 
            id: "hist_006", 
            appointmentId: "APT-2610-339",
            nurse: { name: "Christopher Cruz", id: "NUR-2023-1123-EMP", email: "christopher.cruz@pupbc.edu.ph" },
            service: "Regular Check-up",
            time: "10:30 AM",
            status: "Completed",
            completedDate: "March 09, 2025",
            notes: "Routine physical: all vitals stable. No concerns."
        },
        { 
            id: "hist_007", 
            appointmentId: "APT-2611-340",
            nurse: { name: "Diana Reyes", id: "NUR-2024-0334-EMP", email: "diana.reyes@pupbc.edu.ph" },
            service: "Lab Result Review",
            time: "03:00 PM",
            status: "Completed",
            completedDate: "March 08, 2025",
            notes: "Cholesterol levels elevated. Dietary recommendations given."
        },
        { 
            id: "hist_008", 
            appointmentId: "APT-2612-341",
            nurse: { name: "Lawrence Mendoza", id: "NUR-2025-0667-EMP", email: "lawrence.mendoza@pupbc.edu.ph" },
            service: "Vaccination",
            time: "12:20 PM",
            status: "Completed",
            completedDate: "March 07, 2025",
            notes: "HPV vaccine first dose. Post-vaccination monitoring done."
        },
        { 
            id: "hist_009", 
            appointmentId: "APT-2613-342",
            nurse: { name: "Isabella Flores", id: "NUR-2023-0555-EMP", email: "isabella.flores@pupbc.edu.ph" },
            service: "Medical Certificate",
            time: "04:10 PM",
            status: "Completed",
            completedDate: "March 06, 2025",
            notes: "Fit to work certificate issued after full recovery."
        },
        { 
            id: "hist_010", 
            appointmentId: "APT-2614-343",
            nurse: { name: "Ricardo Santiago", id: "NUR-2024-0988-EMP", email: "ricardo.santiago@pupbc.edu.ph" },
            service: "Difficulty Breathing",
            time: "07:30 AM",
            status: "Completed",
            completedDate: "March 05, 2025",
            notes: "Allergy-induced asthma. Prescribed antihistamine."
        },
        { 
            id: "hist_011", 
            appointmentId: "APT-2615-344",
            nurse: { name: "Maria Santos", id: "NUR-2024-0456-EMP", email: "maria.santos@pupbc.edu.ph" },
            service: "Blood Pressure Check",
            time: "09:00 AM",
            status: "Completed",
            completedDate: "March 04, 2025",
            notes: "BP: 120/80. Maintain low-sodium diet."
        }
    ];

    const ITEMS_PER_PAGE = 4;
    let currentPage = 1;
    let currentFilteredList = [];
    let deleteModalInstance = null;
    let viewModalInstance = null;
    let currentDeleteId = null;
    let currentDeleteNurseName = "";

    function getInitials(name) {
        if (!name) return "N";
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

    function getFilteredHistory() {
        const searchTerm = document.getElementById('searchHistoryInput')?.value.toLowerCase().trim() || '';
        if (!searchTerm) return [...completedHistoryList];
        return completedHistoryList.filter(apt => 
            apt.nurse.name.toLowerCase().includes(searchTerm) ||
            apt.nurse.email.toLowerCase().includes(searchTerm) ||
            apt.service.toLowerCase().includes(searchTerm) ||
            apt.time.toLowerCase().includes(searchTerm) ||
            apt.nurse.id.toLowerCase().includes(searchTerm) ||
            apt.appointmentId.toLowerCase().includes(searchTerm)
        );
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
            btn.addEventListener('click', () => goToPage(parseInt(btn.dataset.page)));
        });
    }

    function goToPage(page) {
        const totalPages = Math.max(1, Math.ceil(currentFilteredList.length / ITEMS_PER_PAGE));
        if (page < 1 || page > totalPages) return;
        currentPage = page;
        renderHistoryTable();
    }

    window.openViewModal = function(id) {
        const appointment = completedHistoryList.find(apt => apt.id === id);
        if (appointment) {
            document.getElementById('viewNurseName').innerText = appointment.nurse.name;
            document.getElementById('viewNurseId').innerText = appointment.nurse.id;
            document.getElementById('viewNurseEmail').innerText = appointment.nurse.email;
            document.getElementById('viewService').innerText = appointment.service;
            document.getElementById('viewTime').innerText = appointment.time;
            document.getElementById('viewCompletedDate').innerText = appointment.completedDate || "N/A";
            const notes = appointment.notes || "No additional notes recorded for this consultation.";
            document.getElementById('viewConsultationNotes').innerHTML = escapeHtml(notes);
            viewModalInstance.show();
        }
    };

    window.openDeleteModal = function(id, nurseName) {
        currentDeleteId = id;
        currentDeleteNurseName = nurseName;
        document.getElementById('deleteNurseName').innerText = nurseName;
        deleteModalInstance.show();
    };

    function executeDelete() {
        if (currentDeleteId) {
            const index = completedHistoryList.findIndex(apt => apt.id === currentDeleteId);
            if (index !== -1) {
                completedHistoryList.splice(index, 1);
                refreshHistoryTable();
                showToastMessage(`Appointment record with ${currentDeleteNurseName} has been deleted from history.`, 'danger');
            }
            deleteModalInstance.hide();
            currentDeleteId = null;
            currentDeleteNurseName = "";
        }
    }

    function refreshHistoryTable() {
        currentPage = 1;
        renderHistoryTable();
    }

    function renderHistoryTable() {
        const tbody = document.getElementById('historyTableBody');
        if (!tbody) return;
        const filtered = getFilteredHistory();
        currentFilteredList = filtered;
        const totalPages = Math.max(1, Math.ceil(filtered.length / ITEMS_PER_PAGE));
        if (currentPage > totalPages) currentPage = totalPages;
        if (currentPage < 1) currentPage = 1;
        const startIdx = (currentPage - 1) * ITEMS_PER_PAGE;
        const pageItems = filtered.slice(startIdx, startIdx + ITEMS_PER_PAGE);
        document.getElementById('totalCount').innerText = completedHistoryList.length;
        if (pageItems.length === 0) {
            tbody.innerHTML = `<tr><td colspan="7" class="text-center py-5"><div class="empty-state"><i class="fa-solid fa-calendar-times fa-3x mb-3 opacity-50"></i><p class="mb-0">No completed appointments found.</p><small class="text-muted">History is empty or no matches.</small></div></td></tr>`;
            renderPaginationControls();
            return;
        }
        tbody.innerHTML = pageItems.map(apt => {
            const initials = getInitials(apt.nurse.name);
            const avatarBg = getAvatarColor(apt.nurse.name);
            const nurseNameSafe = escapeHtml(apt.nurse.name);
            const nurseIdSafe = escapeHtml(apt.nurse.id);
            const nurseEmailSafe = escapeHtml(apt.nurse.email);
            const appointmentIdSafe = escapeHtml(apt.appointmentId);
            const serviceSafe = escapeHtml(apt.service);
            const timeSafe = escapeHtml(apt.time);
            return `<tr data-id="${apt.id}">
                <td><div class="nurse-info-wrapper"><div class="nurse-avatar" style="background: ${avatarBg};">${escapeHtml(initials)}</div><div class="nurse-text"><span class="nurse-name">${nurseNameSafe}</span><span class="nurse-id-text"><span class="id-label">ID:</span> ${nurseIdSafe}</span></div></div></td>
                <td>${nurseEmailSafe}</td>
                <td><span class="appointment-id-badge"><i class="fa-solid fa-receipt me-1"></i>${appointmentIdSafe}</span></td>
                <td>${serviceSafe}</td>
                <td><span class="fw-bold">${timeSafe}</span></td>
                <td><span class="status-badge-completed">Completed</span></td>
                <td style="text-align: center;"><div class="action-buttons"><button class="btn-view-history" onclick="openViewModal('${apt.id}')" title="View Details"><i class="fa-solid fa-eye"></i></button><button class="btn-delete-history" onclick="openDeleteModal('${apt.id}', '${nurseNameSafe.replace(/'/g, "\\'")}')" title="Delete Record"><i class="fa-solid fa-trash-can"></i></button></div></td>
            </tr>`;
        }).join('');
        renderPaginationControls();
    }

    function showToastMessage(message, type) {
        const toast = document.createElement('div');
        toast.className = 'position-fixed bottom-0 end-0 p-3';
        toast.style.zIndex = '9999';
        const icon = type === 'success' ? 'fa-check-circle' : (type === 'danger' ? 'fa-trash-alt' : 'fa-info-circle');
        const bgClass = type === 'success' ? 'bg-success' : (type === 'danger' ? 'bg-danger' : 'bg-info');
        toast.innerHTML = `<div class="toast align-items-center text-white ${bgClass} border-0" role="alert" data-bs-autohide="true" data-bs-delay="2000"><div class="d-flex"><div class="toast-body"><i class="fa-solid ${icon} me-2"></i>${message}</div><button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"></button></div></div>`;
        document.body.appendChild(toast);
        const bsToast = new bootstrap.Toast(toast.querySelector('.toast'), { autohide: true, delay: 2200 });
        bsToast.show();
        toast.addEventListener('hidden.bs.toast', () => toast.remove());
    }

    document.getElementById('printSummaryBtn')?.addEventListener('click', () => {
        const modalContent = document.querySelector('#viewDetailsModal .modal-body');
        const originalTitle = document.title;
        document.title = "Appointment Summary";
        const printWindow = window.open('', '_blank');
        printWindow.document.write('<html><head><title>Appointment Summary</title><link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"><link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet"><style>body{padding:20px; font-family: Poppins;}</style></head><body>');
        printWindow.document.write('<div class="container">' + modalContent.cloneNode(true).innerHTML + '</div>');
        printWindow.document.write('</body></html>');
        printWindow.document.close();
        printWindow.print();
        document.title = originalTitle;
    });

    function setupEventListeners() {
        const searchInput = document.getElementById('searchHistoryInput');
        if (searchInput) searchInput.addEventListener('input', () => { currentPage = 1; renderHistoryTable(); });
    }

    document.addEventListener('DOMContentLoaded', function() {
        deleteModalInstance = new bootstrap.Modal(document.getElementById('deleteConfirmModal'), { backdrop: 'static', keyboard: false });
        viewModalInstance = new bootstrap.Modal(document.getElementById('viewDetailsModal'), { backdrop: 'static', keyboard: false });
        document.getElementById('confirmDeleteBtn')?.addEventListener('click', executeDelete);
        setupEventListeners();
        renderHistoryTable();
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