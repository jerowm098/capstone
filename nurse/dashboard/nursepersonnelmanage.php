<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="0">
    <title>Personnel Management | PUPBC CareLink | Clean Layout</title>
    
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
            --success-green: #28a745;
            --warning-orange: #f39c12;
            --inactive-gray: #8f9eb2;
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

        /* Status badges */
        .status-badge {
            padding: 5px 12px;
            border-radius: 6px;
            font-size: 0.75rem;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }
        .status-active { background: #e3f7ec; color: #1e7b3c; }
        .status-inactive { background: #f1f2f4; color: #5a6e7c; }

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

        .staff-info-wrapper {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .staff-text {
            display: flex;
            flex-direction: column;
        }

        .staff-name {
            font-weight: 600;
            color: var(--brand-primary);
            display: block;
            font-size: 0.88rem;
        }

        .staff-id-text {
            font-size: 0.72rem;
            color: var(--text-muted);
        }

        .id-label {
            font-weight: 500;
            color: var(--medical-blue);
            margin-right: 4px;
        }

        .email-cell {
            font-size: 0.82rem;
        }

        /* Action Buttons */
        .action-buttons {
            display: flex;
            gap: 10px;
            justify-content: center;
            align-items: center;
        }

        .action-edit-btn {
            width: 34px;
            height: 34px;
            border-radius: 8px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border: none;
            transition: all 0.2s ease;
            cursor: pointer;
            background: rgba(71, 88, 103, 0.12);
            color: var(--medical-blue);
            font-size: 1rem;
        }

        .action-edit-btn:hover {
            background: var(--medical-blue);
            color: white;
            transform: scale(1.05);
            box-shadow: 0 4px 12px rgba(71, 88, 103, 0.2);
        }

        .action-delete-btn {
            width: 34px;
            height: 34px;
            border-radius: 8px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border: none;
            transition: all 0.2s ease;
            cursor: pointer;
            background: rgba(220, 53, 69, 0.12);
            color: var(--danger-red);
            font-size: 1rem;
        }

        .action-delete-btn:hover {
            background: var(--danger-red);
            color: white;
            transform: scale(1.05);
            box-shadow: 0 4px 12px rgba(220, 53, 69, 0.3);
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

        /* 2-COLUMN LAYOUT FOR MODAL FORM */
        .modal-form-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1rem 1.25rem;
        }
        .full-width-field {
            grid-column: span 2;
        }
        .modal-body-custom {
            padding: 1.5rem;
        }
        .form-label-custom {
            font-weight: 600;
            font-size: 0.85rem;
            margin-bottom: 0.4rem;
            color: var(--brand-primary);
            display: block;
        }
        .required-star {
            color: var(--danger-red);
            margin-left: 2px;
        }

        @media (max-width: 1200px) {
            .table-custom td, .table-custom th {
                padding: 10px 8px;
            }
            .action-edit-btn, .action-delete-btn {
                width: 30px;
                height: 30px;
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
            .pagination-btn {
                padding: 0.3rem 0.7rem;
                font-size: 0.7rem;
            }
            .modal-form-grid {
                grid-template-columns: 1fr;
                gap: 0.9rem;
            }
            .full-width-field {
                grid-column: span 1;
            }
        }
    </style>
</head>
<body>

<div class="appointments-wrapper">
    <div class="form-content">
        <!-- SEARCH BAR SECTION - above counter/pagination -->
        <div class="search-section">
            <div class="search-wrapper">
                <i class="fas fa-search search-icon"></i>
                <input type="text" class="search-box" id="searchStaffInput" placeholder="Search by name, email, role...">
            </div>
        </div>

        <!-- COUNTER + PAGINATION ROW (side by side) -->
        <div class="counter-pagination-row">
            <div class="total-counter" id="totalStaffCounter">
                <i class="fa-solid fa-user-nurse"></i> 
                Total Personnel: <span id="totalCount">0</span>
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
                        <th>Staff Details</th>
                        <th>Email</th>
                        <th>Service Role</th>
                        <th>Shift</th>
                        <th>Status</th>
                        <th style="width: 110px; text-align: center;">Actions</th>
                    </tr>
                </thead>
                <tbody id="staffTableBody">
                    <!-- dynamic rows - 4 maximum per page -->
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- EDIT MODAL - 2 Column Layout for editing staff -->
<div class="modal fade top-aligned-modal" id="editStaffModal" tabindex="-1" aria-hidden="true" data-bs-backdrop="static">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content" style="border-radius: 24px;">
            <div class="modal-header" style="background: var(--brand-primary); color: white; border-radius: 24px 24px 0 0;">
                <h5 class="modal-title"><i class="fa-regular fa-pen-to-square me-2"></i>Edit Personnel Details</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body modal-body-custom">
                <input type="hidden" id="editStaffId">
                <div class="modal-form-grid">
                    <div>
                        <label class="form-label-custom">Full Name <span class="required-star">*</span></label>
                        <input type="text" class="form-control" id="editStaffName" placeholder="Full name" style="border-radius: 12px;">
                    </div>
                    <div>
                        <label class="form-label-custom">Staff ID <span class="required-star">*</span></label>
                        <input type="text" class="form-control" id="editStaffIdNumber" placeholder="e.g., 2025-00123" style="border-radius: 12px;">
                    </div>
                    <div>
                        <label class="form-label-custom">Email <span class="required-star">*</span></label>
                        <input type="email" class="form-control" id="editEmail" placeholder="staff@pupbc.edu.ph" style="border-radius: 12px;">
                    </div>
                    <div>
                        <label class="form-label-custom">Service Role</label>
                        <select class="form-select" id="editRole" style="border-radius: 12px;">
                            <option value="Clinic Physician">Clinic Physician</option>
                            <option value="Physician">Physician</option>
                            <option value="Senior Nurse">Senior Nurse</option>
                            <option value="Staff Nurse">Staff Nurse</option>
                            <option value="Dental Assistant">Dental Assistant</option>
                        </select>
                    </div>
                    <div>
                        <label class="form-label-custom">Shift</label>
                        <select class="form-select" id="editShift" style="border-radius: 12px;">
                            <option value="Morning (7AM-4PM)">Morning (7AM-4PM)</option>
                            <option value="Afternoon (1PM-10PM)">Afternoon (1PM-10PM)</option>
                            <option value="Night (10PM-7AM)">Night (10PM-7AM)</option>
                        </select>
                    </div>
                    <div>
                        <label class="form-label-custom">Status</label>
                        <select class="form-select" id="editStatus" style="border-radius: 12px;">
                            <option value="Active">Active</option>
                            <option value="Inactive">Inactive</option>
                        </select>
                    </div>
                </div>
                <div class="mt-3 text-muted small"><i class="fas fa-info-circle"></i> Update staff information.</div>
            </div>
            <div class="modal-footer" style="border-top: none; padding: 0.5rem 1.5rem 1.5rem 1.5rem;">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" style="border-radius: 30px;">Cancel</button>
                <button type="button" class="btn btn-primary" id="saveEditBtn" style="background: var(--medical-blue); border-radius: 30px; padding: 0.5rem 1.8rem;">Save Changes</button>
            </div>
        </div>
    </div>
</div>

<!-- DELETE CONFIRMATION MODAL -->
<div class="modal fade top-aligned-modal" id="deleteConfirmModal" tabindex="-1" aria-hidden="true" data-bs-backdrop="static">
    <div class="modal-dialog modal-dialog-centered modal-sm">
        <div class="modal-content" style="border-radius: 16px;">
            <div class="modal-header" style="background: var(--danger-red); color: white; border-radius: 16px 16px 0 0;">
                <h5 class="modal-title"><i class="fa-regular fa-trash-can me-2"></i>Remove Personnel</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body" style="padding: 1.5rem;">
                <p class="mb-0">Permanently delete <strong id="deleteStaffName"></strong> from records?</p>
                <small class="text-muted">This action cannot be undone.</small>
            </div>
            <div class="modal-footer" style="border-top: none;">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-danger" id="confirmDeleteBtn">Delete</button>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    // ============================================================
    // PERSONNEL MANAGEMENT — MAXIMUM 4 ROWS PER TABLE (ITEMS_PER_PAGE = 4)
    // NEW LAYOUT: Search bar at top, then Counter + Pagination row, then separator line, then table
    // PAGINATION NOW AT THE TOP (katabi ng counter) — same style as New Patient Register
    // ============================================================
    
    let personnelList = [
        { id: "p1", staffName: "Dr. Maria Santos", staffId: "2025-00123-NURSE-0", email: "maria.santos@pupbc.edu.ph", role: "Clinic Physician", shift: "Morning (7AM-4PM)", status: "Active" },
        { id: "p2", staffName: "Dr. John Paul Reyes", staffId: "2025-00456-NURSE-1", email: "jp.reyes@pupbc.edu.ph", role: "Senior Nurse", shift: "Night (10PM-7AM)", status: "Active" },
        { id: "p3", staffName: "Dr. Anna Marie Flores", staffId: "2025-00789-NURSE-2", email: "anna.flores@pupbc.edu.ph", role: "Dental Assistant", shift: "Afternoon (1PM-10PM)", status: "Inactive" },
        { id: "p4", staffName: "Dr. Carlos Mendez", staffId: "2025-00112-NURSE-3", email: "carlos.mendez@pupbc.edu.ph", role: "Staff Nurse", shift: "Morning (7AM-4PM)", status: "Active" },
        { id: "p5", staffName: "Dr. Elena Rivera", staffId: "2025-00987-NURSE-4", email: "elena.rivera@pupbc.edu.ph", role: "Physician", shift: "Morning (7AM-4PM)", status: "Inactive" },
        { id: "p6", staffName: "Dr. Ramon Dela Cruz", staffId: "2025-00345-NURSE-5", email: "ramon.delacruz@pupbc.edu.ph", role: "Senior Nurse", shift: "Night (10PM-7AM)", status: "Active" },
        { id: "p7", staffName: "Dr. Patricia Lim", staffId: "2025-00678-NURSE-6", email: "patricia.lim@pupbc.edu.ph", role: "Clinic Physician", shift: "Afternoon (1PM-10PM)", status: "Active" },
        { id: "p8", staffName: "Dr. Gregory Santiago", staffId: "2025-00234-NURSE-7", email: "greg.santiago@pupbc.edu.ph", role: "Staff Nurse", shift: "Morning (7AM-4PM)", status: "Inactive" },
        { id: "p9", staffName: "Dr. Luzviminda Castro", staffId: "2025-00876-NURSE-8", email: "luz.castro@pupbc.edu.ph", role: "Dental Assistant", shift: "Afternoon (1PM-10PM)", status: "Active" },
        { id: "p10", staffName: "Dr. Ferdinand Gonzales", staffId: "2025-00543-NURSE-9", email: "ferd.gonzales@pupbc.edu.ph", role: "Physician", shift: "Night (10PM-7AM)", status: "Active" },
        { id: "p11", staffName: "Dr. Isabella Cruz", staffId: "2025-01123-NURSE-10", email: "isabella.cruz@pupbc.edu.ph", role: "Senior Nurse", shift: "Morning (7AM-4PM)", status: "Inactive" },
        { id: "p12", staffName: "Dr. Rogelio Bautista", staffId: "2025-01234-NURSE-11", email: "rogelio.bautista@pupbc.edu.ph", role: "Clinic Physician", shift: "Night (10PM-7AM)", status: "Active" }
    ];

    // 4 rows per page
    const ITEMS_PER_PAGE = 4;
    
    let currentPage = 1;
    let currentFilteredList = [];
    
    let editModalInstance, deleteModalInstance;
    let currentDeleteId = null;

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

    // Get filtered personnel based on search input
    function getFilteredPersonnel() {
        const searchTerm = document.getElementById('searchStaffInput')?.value.toLowerCase().trim() || '';
        if (!searchTerm) return [...personnelList];
        return personnelList.filter(staff => 
            staff.staffName.toLowerCase().includes(searchTerm) || 
            staff.staffId.toLowerCase().includes(searchTerm) ||
            staff.email.toLowerCase().includes(searchTerm) ||
            staff.role.toLowerCase().includes(searchTerm) ||
            staff.shift.toLowerCase().includes(searchTerm)
        );
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
        renderStaffTable();
    }

    function renderStaffTable() {
        const tbody = document.getElementById('staffTableBody');
        if (!tbody) return;
        
        const filtered = getFilteredPersonnel();
        currentFilteredList = filtered;
        const totalPages = Math.max(1, Math.ceil(filtered.length / ITEMS_PER_PAGE));
        if (currentPage > totalPages) currentPage = totalPages;
        if (currentPage < 1) currentPage = 1;
        
        const startIdx = (currentPage - 1) * ITEMS_PER_PAGE;
        const pageItems = filtered.slice(startIdx, startIdx + ITEMS_PER_PAGE);
        
        // update total personnel count
        const totalPersonnelCount = personnelList.length;
        document.getElementById('totalCount').innerText = totalPersonnelCount;
        
        if (pageItems.length === 0) {
            tbody.innerHTML = `<tr><td colspan="6" class="text-center py-5"><div class="empty-state"><i class="fa-solid fa-user-slash fa-3x mb-3 opacity-50"></i><p class="mb-0">No personnel records found.</p><small class="text-muted">Adjust search or add new staff.</small></div></td></tr>`;
            renderPaginationControls();
            return;
        }
        
        tbody.innerHTML = pageItems.map(staff => {
            const initials = getInitials(staff.staffName);
            const avatarBg = getAvatarColor(staff.staffName);
            const safeStaffName = escapeHtml(staff.staffName).replace(/'/g, "&#39;");
            const statusClass = staff.status === 'Active' ? 'status-active' : 'status-inactive';
            const statusIcon = staff.status === 'Active' ? '<i class="fa-solid fa-circle-check"></i>' : '<i class="fa-solid fa-circle-minus"></i>';
            const displayStaffId = `<span class="id-label">ID:</span> ${escapeHtml(staff.staffId)}`;
            return `<tr data-id="${staff.id}">
                <td>
                    <div class="staff-info-wrapper">
                        <div class="profile-avatar" style="background: ${avatarBg};">${escapeHtml(initials)}</div>
                        <div class="staff-text">
                            <span class="staff-name">${escapeHtml(staff.staffName)}</span>
                            <span class="staff-id-text">${displayStaffId}</span>
                        </div>
                    </div>
                </td>
                <td class="email-cell"><i class="fa-regular fa-envelope me-1" style="font-size:0.75rem;"></i> ${escapeHtml(staff.email)}</td>
                <td><span class="fw-medium">${escapeHtml(staff.role)}</span></td>
                <td><span class="badge bg-light text-dark p-2" style="font-weight:500; background:#f0f2f4!important;">${escapeHtml(staff.shift)}</span></td>
                <td><span class="status-badge ${statusClass}">${statusIcon} ${staff.status}</span></td>
                <td style="text-align: center;">
                    <div class="action-buttons">
                        <button class="action-edit-btn" onclick="openEditModal('${staff.id}')" title="Edit Personnel"><i class="fa-regular fa-pen-to-square"></i></button>
                        <button class="action-delete-btn" onclick="openDeleteModal('${staff.id}', '${safeStaffName}')" title="Delete Personnel"><i class="fa-regular fa-trash-can"></i></button>
                    </div>
                </td>
             </tr>`;
        }).join('');
        
        renderPaginationControls();
    }

    function refreshTable() { 
        currentPage = 1; 
        renderStaffTable(); 
    }

    // Open edit modal with pre-filled data
    window.openEditModal = function(id) {
        const staff = personnelList.find(s => s.id === id);
        if (!staff) return;
        document.getElementById('editStaffId').value = staff.id;
        document.getElementById('editStaffName').value = staff.staffName;
        document.getElementById('editStaffIdNumber').value = staff.staffId;
        document.getElementById('editEmail').value = staff.email;
        document.getElementById('editRole').value = staff.role;
        document.getElementById('editShift').value = staff.shift;
        document.getElementById('editStatus').value = staff.status;
        editModalInstance.show();
    };

    // Save edited changes
    function saveEditChanges() {
        const id = document.getElementById('editStaffId').value;
        const staffName = document.getElementById('editStaffName').value.trim();
        const staffId = document.getElementById('editStaffIdNumber').value.trim();
        const email = document.getElementById('editEmail').value.trim();
        const role = document.getElementById('editRole').value;
        const shift = document.getElementById('editShift').value;
        const status = document.getElementById('editStatus').value;
        
        if (!staffName || !staffId || !email) {
            showToastMessage("Please fill in all required fields (Name, ID, Email).", "danger");
            return;
        }
        if (!email.includes('@')) {
            showToastMessage("Please enter a valid email address.", "danger");
            return;
        }
        
        const index = personnelList.findIndex(s => s.id === id);
        if (index !== -1) {
            personnelList[index] = { 
                ...personnelList[index], 
                staffName, 
                staffId, 
                email, 
                role, 
                shift, 
                status 
            };
            refreshTable();
            editModalInstance.hide();
            showToastMessage(`Staff "${staffName}" updated successfully.`, "success");
        }
    }

    // Open delete confirmation modal
    window.openDeleteModal = function(id, name) {
        currentDeleteId = id;
        document.getElementById('deleteStaffName').innerText = name;
        deleteModalInstance.show();
    };
    
    function executeDelete() {
        if (currentDeleteId) {
            const deletedStaff = personnelList.find(s => s.id === currentDeleteId);
            personnelList = personnelList.filter(s => s.id !== currentDeleteId);
            refreshTable();
            deleteModalInstance.hide();
            currentDeleteId = null;
            showToastMessage(`${deletedStaff?.staffName || "Staff"} removed from records.`, "danger");
        }
    }

    // Toast notification
    function showToastMessage(message, type) {
        const toast = document.createElement('div');
        toast.className = 'position-fixed bottom-0 end-0 p-3';
        toast.style.zIndex = '9999';
        const icon = type === 'success' ? 'fa-check-circle' : 'fa-trash-can';
        const bgClass = type === 'success' ? 'bg-success' : 'bg-danger';
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
        const searchInput = document.getElementById('searchStaffInput');
        if (searchInput) {
            searchInput.addEventListener('input', () => {
                currentPage = 1;
                renderStaffTable();
            });
        }
    }

    document.addEventListener('DOMContentLoaded', function() {
        // Initialize modals
        editModalInstance = new bootstrap.Modal(document.getElementById('editStaffModal'), { backdrop: 'static', keyboard: false });
        deleteModalInstance = new bootstrap.Modal(document.getElementById('deleteConfirmModal'), { backdrop: 'static', keyboard: false });
        
        document.getElementById('saveEditBtn').addEventListener('click', saveEditChanges);
        document.getElementById('confirmDeleteBtn').addEventListener('click', executeDelete);
        
        setupEventListeners();
        renderStaffTable();
    });

    /* IMPORTANT SCRIPT */
    if (window.self === window.top) {
        const currentPagePath = window.location.pathname.split("/").pop();
        if (currentPagePath && !currentPagePath.includes('nursedashboard.php')) {
            window.location.href = "nursedashboard.php?page=nursepersonnel.php&subpage=" + currentPagePath;
        }
    }
</script>
</body>
</html>