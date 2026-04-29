<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="0">
    <title>Nurse Dashboard | PUPBC CareLink</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">

    <style>
        :root {
            --pup-maroon: #9C0C20;
            --medical-blue: #475867;
            --clay-bg: #f8f9fa;
            --clay-shadow: 6px 6px 12px #d1d9e6, -6px -6px 12px #ffffff;
            --sidebar-width: 280px;
            --sidebar-collapsed-width: 0px;
            --header-height: 60px;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f0f2f5;
            margin: 0;
            display: flex;
            height: 100vh;
            overflow: hidden;
            position: relative;
        }

        /* ============================================ */
        /* HAMBURGER MENU BUTTON - MOBILE & TABLET */
        /* ============================================ */
        .hamburger-btn {
            display: none;
            position: fixed;
            top: 12px;
            left: 15px;
            z-index: 1001;
            background: var(--medical-blue);
            border: none;
            color: white;
            width: 42px;
            height: 42px;
            border-radius: 12px;
            font-size: 1.4rem;
            cursor: pointer;
            box-shadow: 0 4px 12px rgba(0,0,0,0.15);
            transition: all 0.3s ease;
            align-items: center;
            justify-content: center;
        }

        .hamburger-btn:hover {
            background: #5a6a7a;
            transform: scale(1.02);
        }

        /* ============================================ */
        /* SIDEBAR OVERLAY FOR MOBILE */
        /* ============================================ */
        .sidebar-overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0,0,0,0.5);
            z-index: 998;
            backdrop-filter: blur(2px);
            transition: all 0.3s ease;
        }

        .sidebar-overlay.active {
            display: block;
        }

        /* --- SIDEBAR DESIGN --- */
        .sidebar {
            width: var(--sidebar-width);
            height: 100vh;
            background: white;
            box-shadow: 4px 0 20px rgba(0,0,0,0.05);
            display: flex;
            flex-direction: column;
            padding: 1rem 1.5rem;
            z-index: 1000;
            position: relative;
            overflow: hidden;
            transition: transform 0.3s ease-in-out;
        }

        /* --- PUP LOGO SECTION --- */
        .sidebar-brand {
            display: flex;
            align-items: center;
            gap: 12px;
            padding-bottom: 0.25rem;
            margin-bottom: 0;
            border-bottom: none;
            flex-shrink: 0;
            transform: translateY(-8px);
        }

        .brand-logo img {
            width: 45px;
            height: 45px;
            object-fit: contain;
        }

        .brand-name {
            font-weight: 700;
            color: var(--medical-blue);
            font-size: 1.1rem;
            line-height: 1.2;
            margin: 0;
        }
        
        /* --- VERTICAL SCROLL PANE --- */
        .nav-tabs-custom { 
            display: flex;
            flex-direction: column;
            gap: 8px;
            flex-grow: 1;
            overflow-y: auto;
            overflow-x: hidden;
            margin-right: -1.5rem;
            padding-right: 1.5rem;
            scrollbar-gutter: stable;
            margin-top: -0.38rem;
            padding-top: 20px;
        }
        
        .profile-section-scroll {
            text-align: center;
            margin-bottom: 0.2rem;
            padding-top: 0.2rem;
            padding-bottom: 0.5rem;
            flex-shrink: 0;
        }

        .profile-img-placeholder {
            width: 80px;
            height: 80px;
            background: var(--clay-bg);
            border-radius: 50%;
            margin: 0 auto 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: var(--clay-shadow);
            color: var(--medical-blue);
            font-size: 2rem;
            border: 3px solid white;
        }

        .nav-tabs-custom::-webkit-scrollbar {
            width: 15px;
            background-color: #f0f2f5;
            border-radius: 10px;
        }
        
        .nav-tabs-custom::-webkit-scrollbar-track {
            background: #e9ecef;
            border-radius: 10px;
        }
        
        .nav-tabs-custom::-webkit-scrollbar-thumb {
            background: #bdc3c7;
            border-radius: 10px;
            transition: all 0.2s;
        }
        
        .nav-tabs-custom::-webkit-scrollbar-thumb:hover {
            background: var(--medical-blue);
        }
        
        .nav-tabs-custom {
            scrollbar-width: auto;
            scrollbar-color: #bdc3c7 #e9ecef;
        }

        .nav-link-custom {
            padding: 12px 20px;
            border-radius: 15px;
            color: #555;
            text-decoration: none;
            transition: 0.3s;
            display: flex;
            align-items: center;
            font-weight: 500;
            margin-right: 0;
            margin-left: 0;
        }

        .nav-link-custom i { width: 30px; font-size: 1.1rem; }

        .nav-link-custom:hover {
            background: rgba(71, 88, 103, 0.08);
            color: var(--medical-blue);
        }

        .nav-link-custom.active {
            background: var(--medical-blue) !important;
            color: white !important;
            box-shadow: 0 8px 15px rgba(71, 88, 103, 0.3);
        }

        /* --- MAIN CONTENT LAYOUT --- */
        .main-content {
            flex-grow: 1;
            display: flex;
            flex-direction: column;
            background: #fdfdfd;
            transition: all 0.3s ease;
        }

        .dashboard-header {
            padding: 0.3rem 1.5rem;
            background: white;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 10px rgba(0,0,0,0.02);
            min-height: var(--header-height);
            border-bottom: 1px solid rgba(71, 88, 103, 0.1);
        }
        
        /* Spacer for hamburger on mobile - keeps header content aligned */
        .header-spacer {
            display: none;
            width: 48px;
        }
        
        .dynamic-header-title {
            font-size: 1.4rem;
            font-weight: 600;
            color: var(--medical-blue);
            margin: 0;
            letter-spacing: -0.3px;
            position: relative;
            padding-left: 0;
        }
        
        .dynamic-header-title i {
            margin-right: 10px;
            font-size: 1.3rem;
            color: var(--medical-blue);
            opacity: 0.85;
        }
        
        .header-right-group {
            display: flex;
            align-items: center;
            gap: 20px;
        }
        
        .welcome-text {
            font-size: 1.1rem;
            font-weight: 600;
            color: var(--medical-blue);
            margin: 0;
            white-space: nowrap;
            letter-spacing: -0.2px;
        }

        .header-actions {
            display: flex;
            align-items: center;
        }

        .profile-dropdown {
            position: relative;
            cursor: pointer;
        }

        .header-profile-icon {
            position: relative;
            width: 48px;
            height: 48px;
            background: var(--clay-bg);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--medical-blue);
            font-size: 1.5rem;
            box-shadow: 0 2px 8px rgba(0,0,0,0.08);
            border: 2px solid white;
            cursor: pointer;
        }
        
        .profile-indicator {
            position: absolute;
            bottom: -2px;
            right: -4px;
            background: var(--medical-blue);
            color: white;
            width: 18px;
            height: 18px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 8px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.2);
            border: 2px solid white;
        }
        
        .dropdown-menu-custom {
            position: absolute;
            top: calc(100% + 12px);
            right: 0;
            background: white;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.12);
            min-width: 260px;
            opacity: 0;
            visibility: hidden;
            transform: translateY(-10px);
            transition: all 0.2s ease;
            z-index: 1000;
            border: 1px solid #eef2f6;
            overflow: hidden;
        }
        
        .profile-dropdown.active .dropdown-menu-custom {
            opacity: 1;
            visibility: visible;
            transform: translateY(0);
        }
        
        .dropdown-user-info {
            padding: 18px 20px;
            background: #fafcff;
            border-bottom: 1px solid #edf2f7;
            text-align: center;
        }
        
        .dropdown-user-info .user-avatar-sm {
            width: 56px;
            height: 56px;
            background: var(--clay-bg);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 12px;
            color: var(--medical-blue);
            font-size: 1.8rem;
            box-shadow: var(--clay-shadow);
        }
        
        .dropdown-user-info .user-name {
            font-weight: 700;
            color: #2c3e4e;
            margin-bottom: 4px;
            font-size: 1rem;
        }
        
        .dropdown-user-info .user-role {
            font-size: 0.75rem;
            color: #7f8c8d;
            letter-spacing: 0.3px;
        }
        
        .dropdown-options {
            padding: 8px 0;
        }
        
        .dropdown-option {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px 20px;
            color: #4a5568;
            text-decoration: none;
            transition: all 0.2s;
            font-weight: 500;
            font-size: 0.9rem;
            cursor: pointer;
        }
        
        .dropdown-option i {
            width: 24px;
            font-size: 1.1rem;
            color: #7f8c8d;
        }
        
        .dropdown-option:hover {
            background: #f7fafc;
            color: var(--medical-blue);
        }
        
        .dropdown-option.logout-option {
            color: #e53e3e;
            border-top: 1px solid #edf2f7;
            margin-top: 4px;
        }
        
        .dropdown-option.logout-option i {
            color: #e53e3e;
        }
        
        .dropdown-option.logout-option:hover {
            background: #fff5f5;
            color: #c53030;
        }
        
        .dropdown-backdrop {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            z-index: 999;
            display: none;
        }
        
        .profile-dropdown.active ~ .dropdown-backdrop,
        .dropdown-backdrop.active {
            display: block;
        }

        #content-frame {
            width: 100%;
            flex-grow: 1;
            border: none;
            background: transparent;
        }

        .small-text-muted {
            font-size: 0.75rem;
            color: #6c757d;
        }

        /* ============================================ */
        /* LAPTOP DIMENSIONS (1024px - 1366px) */
        /* ============================================ */
        @media (min-width: 1024px) and (max-width: 1366px) {
            .sidebar {
                width: 260px;
                padding: 0.8rem 1.2rem;
            }
            
            .brand-logo img {
                width: 40px;
                height: 40px;
            }
            
            .brand-name {
                font-size: 1rem;
            }
            
            .profile-img-placeholder {
                width: 70px;
                height: 70px;
                font-size: 1.7rem;
            }
            
            .nav-link-custom {
                padding: 10px 16px;
                font-size: 0.9rem;
            }
            
            .nav-link-custom i {
                width: 26px;
                font-size: 1rem;
            }
            
            .dynamic-header-title {
                font-size: 1.2rem;
            }
            
            .welcome-text {
                font-size: 0.95rem;
            }
            
            .header-profile-icon {
                width: 42px;
                height: 42px;
                font-size: 1.3rem;
            }
        }

        /* ============================================ */
        /* MOBILE & TABLET RESPONSIVE (max-width: 1023px) */
        /* ============================================ */
        @media (max-width: 1023px) {
            body {
                overflow-x: hidden;
            }
            
            .hamburger-btn {
                display: flex;
                width: 38px;
                height: 38px;
                top: 9px;
                left: 12px;
                font-size: 1.2rem;
            }

            .header-spacer {
                display: block;
            }
            
            /* Sidebar slides in from left */
            .sidebar {
                position: fixed;
                left: 0;
                top: 0;
                transform: translateX(-100%);
                width: 280px;
                height: 100vh;
                z-index: 1002;
                box-shadow: none;
                transition: transform 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            }
            
            .sidebar.open {
                transform: translateX(0);
                box-shadow: 4px 0 30px rgba(0,0,0,0.15);
            }
            
            /* Main content takes full width */
            .main-content {
                width: 100%;
                margin-left: 0;
            }
            
            .dashboard-header {
                padding-left: 70px;
                padding-right: 1rem;
                min-height: 55px;
            }
            
            .dynamic-header-title {
                font-size: 1rem;
            }
            
            .dynamic-header-title i {
                font-size: 0.9rem;
                margin-right: 6px;
            }
            
            .welcome-text {
                font-size: 0.8rem;
                white-space: normal;
                text-align: right;
                max-width: 130px;
            }
            
            .header-right-group {
                gap: 10px;
            }
            
            .header-profile-icon {
                width: 40px;
                height: 40px;
                font-size: 1.2rem;
            }
            
            .profile-indicator {
                width: 16px;
                height: 16px;
                bottom: -3px;
                right: -4px;
            }
            
            .profile-indicator i {
                font-size: 7px;
            }
            
            .dropdown-menu-custom {
                min-width: 220px;
                right: -10px;
            }
            
            .nav-tabs-custom {
                margin-right: -1rem;
                padding-right: 1rem;
            }
            
            /* Adjust scrollbar for mobile */
            .nav-tabs-custom::-webkit-scrollbar {
                width: 10px;
            }
        }
        
        /* Small mobile devices (max-width: 480px) */
        @media (max-width: 480px) {
            .dashboard-header {
                padding-left: 60px;
                padding-right: 0.8rem;
            }
            
            .hamburger-btn {
                width: 38px;
                height: 38px;
                top: 9px;
                left: 12px;
                font-size: 1.2rem;
            }
            
            .dynamic-header-title {
                font-size: 0.85rem;
            }
            
            .dynamic-header-title i {
                font-size: 0.75rem;
            }
            
            .welcome-text {
                font-size: 0.65rem;
                max-width: 100px;
            }
            
            .header-right-group {
                gap: 6px;
            }
            
            .header-profile-icon {
                width: 36px;
                height: 36px;
                font-size: 1rem;
            }
            
            .sidebar {
                width: 260px;
                padding: 0.8rem 1rem;
            }
            
            .brand-logo img {
                width: 36px;
                height: 36px;
            }
            
            .brand-name {
                font-size: 0.9rem;
            }
            
            .profile-img-placeholder {
                width: 65px;
                height: 65px;
                font-size: 1.5rem;
            }
            
            .profile-section-scroll h6 {
                font-size: 0.85rem;
            }
            
            .nav-link-custom {
                padding: 10px 14px;
                font-size: 0.85rem;
            }
            
            .nav-link-custom i {
                width: 24px;
                font-size: 0.9rem;
            }
        }
        
        /* iPad and tablet landscape */
        @media (min-width: 768px) and (max-width: 1023px) {
            .dashboard-header {
                padding-left: 75px;
            }
            
            .dynamic-header-title {
                font-size: 1.2rem;
            }
            
            .welcome-text {
                font-size: 0.95rem;
                max-width: none;
            }
            
            .sidebar {
                width: 280px;
            }
        }
    </style>
</head>
<body>

<!-- HAMBURGER MENU BUTTON -->
<button class="hamburger-btn" id="hamburgerBtn">
    <i class="fa-solid fa-bars"></i>
</button>

<!-- SIDEBAR OVERLAY -->
<div class="sidebar-overlay" id="sidebarOverlay"></div>

<div class="sidebar" id="sidebar">
    <!-- Brand / PUP Logo Section -->
    <div class="sidebar-brand">
        <div class="brand-logo">
            <img src="../../assets/cliniclogohalf.png" alt="PUP Logo" onerror="this.src='https://via.placeholder.com/45?text=PUP'">
        </div>
        <h5 class="brand-name">PUPBC<br>CareLink</h5>
    </div>

    <nav class="nav-tabs-custom" id="sidebar-nav">
        <div class="profile-section-scroll">
            <div class="profile-img-placeholder">
                <i class="fa-solid fa-user-nurse"></i>
            </div>
            <h6 class="fw-bold mb-0">Nurse Name</h6>
            <small class="text-muted small-text-muted">NURSE-2026-001</small>
        </div>

        <a href="nurseoverview.php" target="content-frame" class="nav-link-custom active" data-header-title="Dashboard">
            <i class="fa-solid fa-house"></i> Overview
        </a>
        <a href="nurseprofile.php" target="content-frame" class="nav-link-custom" data-header-title="Profile Management">
            <i class="fa-solid fa-id-card"></i> Profile
        </a>
        <a href="nurseappointment.php" target="content-frame" class="nav-link-custom" data-header-title="Appointment Management">
            <i class="fa-solid fa-calendar-check"></i> Appointments
        </a>
        <a href="nursepersonnel.php" target="content-frame" class="nav-link-custom" data-header-title="Clinic and Staff Management">
            <i class="fa-solid fa-user-gear"></i> Staff Directory
        </a>
        <a href="nursepatient.php" target="content-frame" class="nav-link-custom" data-header-title="Student and Patient Management">
            <i class="fa-solid fa-hospital-user"></i> Patient Directory
        </a>
        <a href="nurselaboratory.php" target="content-frame" class="nav-link-custom" data-header-title="Laboratory Management">
            <i class="fa-solid fa-flask-vial"></i> Laboratory
        </a>
        <a href="nursepharmaceutical.php" target="content-frame" class="nav-link-custom" data-header-title="Medicine Management">
            <i class="fa-solid fa-pills"></i> Pharmaceutical
        </a>
        <a href="nurseinventory.php" target="content-frame" class="nav-link-custom" data-header-title="Inventory Management">
            <i class="fa-solid fa-boxes-stacked"></i> Inventory
        </a>
        <a href="nursereports.php" target="content-frame" class="nav-link-custom" data-header-title="Reports & Analytics">
            <i class="fa-solid fa-file-invoice-dollar"></i> Reports
        </a>
    </nav>
</div>

<div class="main-content">
    <header class="dashboard-header">
        <div class="header-spacer"></div>
        <div class="dynamic-header-title" id="dynamicHeaderTitle">
            <i class="fa-solid fa-chalkboard-user"></i> 
            <span id="headerTitleText">Dashboard</span>
        </div>
        
        <div class="header-right-group">
            <div class="welcome-text">
                Welcome to Nurse Portal!
            </div>
            
            <div class="header-actions">
                <div class="profile-dropdown" id="profileDropdown">
                    <div class="header-profile-icon" id="profileIconBtn">
                        <i class="fa-solid fa-user-nurse"></i>
                        <span class="profile-indicator">
                            <i class="fa-solid fa-chevron-down"></i>
                        </span>
                    </div>
                    
                    <div class="dropdown-menu-custom">
                        <div class="dropdown-user-info">
                            <div class="user-avatar-sm">
                                <i class="fa-solid fa-user-nurse"></i>
                            </div>
                            <div class="user-name">Nurse Sarah Johnson</div>
                            <div class="user-role">NURSE-2026-001 • Staff Nurse</div>
                        </div>
                        <div class="dropdown-options">
                            <a href="nurseprofile.php" target="content-frame" class="dropdown-option" id="profileOptionLink">
                                <i class="fa-solid fa-id-card"></i>
                                <span>Settings</span>
                            </a>
                            <a href="../nurselogin.php" class="dropdown-option logout-option" id="logoutOptionBtn">
                                <i class="fa-solid fa-right-from-bracket"></i>
                                <span>Sign Out</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="dropdown-backdrop" id="dropdownBackdrop"></div>
            </div>
        </div>
    </header>

    <iframe src="nurseoverview.php" name="content-frame" id="content-frame"></iframe>
</div>

<script>
    // =========================================================================
    // NURSE DASHBOARD - COMPLETE JAVASCRIPT MODULES (15+ FUNCTIONS)
    // Each function is numbered and titled for clarity. All original code preserved.
    // =========================================================================

    // =========================================================================
    // [FUNCTION 01] - DOM Element References Initialization
    // Purpose: Captures all critical DOM elements used across dashboard scripts
    // =========================================================================
    (function initDOMReferences() {
        window.DOM = {
            navLinks: document.querySelectorAll('.nav-link-custom'),
            iframe: document.getElementById('content-frame'),
            profileDropdown: document.getElementById('profileDropdown'),
            profileIconBtn: document.getElementById('profileIconBtn'),
            dropdownBackdrop: document.getElementById('dropdownBackdrop'),
            profileOptionLink: document.getElementById('profileOptionLink'),
            headerTitleTextSpan: document.getElementById('headerTitleText'),
            dynamicHeaderTitleDiv: document.getElementById('dynamicHeaderTitle'),
            hamburgerBtn: document.getElementById('hamburgerBtn'),
            sidebar: document.getElementById('sidebar'),
            sidebarOverlay: document.getElementById('sidebarOverlay'),
            logoutOptionBtn: document.getElementById('logoutOptionBtn')
        };
    })();

    // =========================================================================
    // [FUNCTION 02] - Mobile Sidebar Toggle Handler
    // Purpose: Opens/closes the sidebar navigation on mobile devices
    // =========================================================================
    function toggleSidebar() {
        const sidebar = DOM.sidebar;
        const overlay = DOM.sidebarOverlay;
        sidebar.classList.toggle('open');
        overlay.classList.toggle('active');
        if (sidebar.classList.contains('open')) {
            document.body.style.overflow = 'hidden';
        } else {
            document.body.style.overflow = '';
        }
    }

    // =========================================================================
    // [FUNCTION 03] - Mobile Sidebar Closer
    // Purpose: Closes sidebar and removes body scroll lock
    // =========================================================================
    function closeSidebar() {
        const sidebar = DOM.sidebar;
        const overlay = DOM.sidebarOverlay;
        if (sidebar) sidebar.classList.remove('open');
        if (overlay) overlay.classList.remove('active');
        document.body.style.overflow = '';
    }

    // =========================================================================
    // [FUNCTION 04] - Responsive Sidebar Event Binder (Hamburger + Overlay + Resize)
    // Purpose: Attaches all sidebar-related event listeners for mobile/responsive behavior
    // =========================================================================
    function bindSidebarEvents() {
        if (DOM.hamburgerBtn) {
            DOM.hamburgerBtn.addEventListener('click', toggleSidebar);
        }
        if (DOM.sidebarOverlay) {
            DOM.sidebarOverlay.addEventListener('click', closeSidebar);
        }
        window.addEventListener('resize', function() {
            if (window.innerWidth > 1023) {
                closeSidebar();
                document.body.style.overflow = '';
            }
        });
        if (DOM.navLinks) {
            DOM.navLinks.forEach(link => {
                link.addEventListener('click', function() {
                    if (window.innerWidth <= 1023) {
                        closeSidebar();
                    }
                });
            });
        }
    }

    // =========================================================================
    // [FUNCTION 05] - Dynamic Header Title Updater
    // Purpose: Updates the main header title and icon based on active navigation link
    // =========================================================================
    function updateHeaderTitle() {
        const activeLink = document.querySelector('.nav-link-custom.active');
        const headerTitleSpan = DOM.headerTitleTextSpan;
        const headerDiv = DOM.dynamicHeaderTitleDiv;
        if (activeLink && activeLink.hasAttribute('data-header-title') && headerTitleSpan) {
            const title = activeLink.getAttribute('data-header-title');
            headerTitleSpan.textContent = title;
            const iconElem = headerDiv ? headerDiv.querySelector('i') : null;
            if (iconElem && activeLink) {
                const activeIcon = activeLink.querySelector('i');
                if (activeIcon) {
                    iconElem.className = activeIcon.className;
                } else {
                    iconElem.className = "fa-solid fa-chalkboard-user";
                }
            }
        } else if (headerTitleSpan) {
            headerTitleSpan.textContent = "Dashboard";
        }
    }

    // =========================================================================
    // [FUNCTION 06] - Profile Dropdown Toggler
    // Purpose: Opens/closes the user profile dropdown menu
    // =========================================================================
    function toggleDropdown(event) {
        if (event) event.stopPropagation();
        const dropdown = DOM.profileDropdown;
        const backdrop = DOM.dropdownBackdrop;
        if (dropdown) {
            dropdown.classList.toggle('active');
            if (dropdown.classList.contains('active') && backdrop) {
                backdrop.classList.add('active');
            } else if (backdrop) {
                backdrop.classList.remove('active');
            }
        }
    }

    // =========================================================================
    // [FUNCTION 07] - Profile Dropdown Closer
    // Purpose: Closes the profile dropdown programmatically
    // =========================================================================
    function closeDropdown() {
        const dropdown = DOM.profileDropdown;
        const backdrop = DOM.dropdownBackdrop;
        if (dropdown) dropdown.classList.remove('active');
        if (backdrop) backdrop.classList.remove('active');
    }

    // =========================================================================
    // [FUNCTION 08] - Cache Buster Generator
    // Purpose: Prevents iframe caching by appending unique timestamp to URLs
    // =========================================================================
    function getCacheBuster() {
        return "v=" + new Date().getTime();
    }

    // =========================================================================
    // [FUNCTION 09] - Browser URL State Updater (History API)
    // Purpose: Updates URL without page reload to preserve navigation state
    // =========================================================================
    function updateBrowserURL(pageName, subpage = null) {
        let newURL = window.location.origin + window.location.pathname + '?page=' + pageName;
        if (subpage) {
            newURL += '&subpage=' + subpage;
        }
        window.history.replaceState({ path: newURL }, '', newURL);
    }

    // =========================================================================
    // [FUNCTION 10] - Navigation Link Click Handler
    // Purpose: Loads target page in iframe, updates active link, title, and URL
    // =========================================================================
    function bindNavigationLinks() {
        if (!DOM.navLinks) return;
        DOM.navLinks.forEach(link => {
            link.addEventListener('click', function(e) {
                e.preventDefault();
                const targetPage = this.getAttribute('href');
                if (DOM.iframe) {
                    DOM.iframe.src = targetPage + (targetPage.includes('?') ? '&' : '?') + getCacheBuster();
                }
                DOM.navLinks.forEach(nav => nav.classList.remove('active'));
                this.classList.add('active');
                updateHeaderTitle();
                updateBrowserURL(targetPage);
                closeDropdown();
            });
        });
    }

    // =========================================================================
    // [FUNCTION 11] - Iframe Load Event Handler
    // Purpose: Ensures header title updates after iframe content loads
    // =========================================================================
    function bindIframeLoadEvent() {
        if (DOM.iframe) {
            DOM.iframe.addEventListener('load', function() {
                updateHeaderTitle();
            });
        }
    }

    // =========================================================================
    // [FUNCTION 12] - Profile Dropdown Event Binder (Icon + Backdrop + Escape Key)
    // Purpose: Attaches all profile dropdown interactions
    // =========================================================================
    function bindProfileDropdownEvents() {
        if (DOM.profileIconBtn) {
            DOM.profileIconBtn.addEventListener('click', toggleDropdown);
        }
        if (DOM.dropdownBackdrop) {
            DOM.dropdownBackdrop.addEventListener('click', function() {
                closeDropdown();
            });
        }
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape' && DOM.profileDropdown && DOM.profileDropdown.classList.contains('active')) {
                closeDropdown();
            }
        });
        document.addEventListener('click', function(event) {
            if (DOM.profileDropdown && !DOM.profileDropdown.contains(event.target) && 
                DOM.profileDropdown.classList.contains('active')) {
                if (DOM.profileIconBtn && !DOM.profileIconBtn.contains(event.target)) {
                    closeDropdown();
                }
            }
        });
    }

    // =========================================================================
    // [FUNCTION 13] - Profile Settings Link Handler (Inside Dropdown)
    // Purpose: Handles settings/profile link click from dropdown menu
    // =========================================================================
    function bindProfileOptionLink() {
        if (DOM.profileOptionLink) {
            DOM.profileOptionLink.addEventListener('click', function(e) {
                e.preventDefault();
                const targetPage = this.getAttribute('href');
                if (targetPage && DOM.iframe) {
                    DOM.iframe.src = targetPage + (targetPage.includes('?') ? '&' : '?') + getCacheBuster();
                    if (DOM.navLinks) {
                        DOM.navLinks.forEach(link => {
                            if (link.getAttribute('href') === targetPage) {
                                DOM.navLinks.forEach(nav => nav.classList.remove('active'));
                                link.classList.add('active');
                                updateHeaderTitle();
                            }
                        });
                    }
                    updateBrowserURL(targetPage);
                }
                closeDropdown();
            });
        }
    }

    // =========================================================================
    // [FUNCTION 14] - Logout Button Handler
    // Purpose: Handles logout action (closes dropdown, preserves original navigation)
    // =========================================================================
    function bindLogoutButton() {
        if (DOM.logoutOptionBtn) {
            DOM.logoutOptionBtn.addEventListener('click', function(e) {
                closeDropdown();
                // Original behavior preserved: link will navigate naturally to nurselogin.php
            });
        }
    }

    // =========================================================================
    // [FUNCTION 15] - Page Load Initialization (URL Params & Default State)
    // Purpose: Restores state from URL parameters, sets initial iframe source
    // =========================================================================
    function initializePageFromURL() {
        const urlParams = new URLSearchParams(window.location.search);
        let targetPage = urlParams.get('page');
        const subpage = urlParams.get('subpage');
        
        if (!targetPage) {
            targetPage = "nurseoverview.php";
        }
        
        let finalSrc = targetPage;
        if (targetPage === "nurseinventory.php" && subpage) {
            finalSrc = targetPage + "?subpage=" + subpage;
        }
        
        if (DOM.iframe) {
            DOM.iframe.src = finalSrc + (finalSrc.includes('?') ? '&' : '?') + getCacheBuster();
        }
        
        let activeFound = false;
        if (DOM.navLinks) {
            DOM.navLinks.forEach(link => {
                if (link.getAttribute('href') === targetPage) {
                    DOM.navLinks.forEach(nav => nav.classList.remove('active'));
                    link.classList.add('active');
                    activeFound = true;
                }
            });
            if (!activeFound && DOM.navLinks.length > 0) {
                DOM.navLinks.forEach(nav => nav.classList.remove('active'));
                DOM.navLinks[0].classList.add('active');
            }
        }
        
        updateHeaderTitle();
        updateBrowserURL(targetPage, subpage);
        closeDropdown();
    }

    // =========================================================================
    // [FUNCTION 16] - Master Initialization (Bootstraps All Modules)
    // Purpose: Calls all initialization functions to fully set up dashboard
    // =========================================================================
    function bootstrapDashboard() {
        bindSidebarEvents();
        bindNavigationLinks();
        bindIframeLoadEvent();
        bindProfileDropdownEvents();
        bindProfileOptionLink();
        bindLogoutButton();
        initializePageFromURL();
        setTimeout(() => {
            updateHeaderTitle();
        }, 50);
    }

    // =========================================================================
    // [SCRIPT EXECUTION] - Start the dashboard when window is fully loaded
    // =========================================================================
    window.onload = function() {
        bootstrapDashboard();
    };
</script>

</body>
</html>