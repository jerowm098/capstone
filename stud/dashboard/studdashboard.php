<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="0">
    <title>Student Dashboard | PUPBC CareLink</title>
    
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
        /* [SECTION 1] HAMBURGER MENU BUTTON - MOBILE & TABLET */
        /* ============================================ */
        .hamburger-btn {
            display: none;
            position: fixed;
            top: 12px;
            left: 15px;
            z-index: 1001;
            background: var(--pup-maroon);
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
            background: #b81c34;
            transform: scale(1.02);
        }

        /* ============================================ */
        /* [SECTION 2] SIDEBAR OVERLAY FOR MOBILE */
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

        /* ============================================ */
        /* [SECTION 3] SIDEBAR DESIGN - MATCHING NURSE DASHBOARD */
        /* ============================================ */
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

        /* ============================================ */
        /* [SECTION 4] PUP LOGO SECTION - LIFTED WITH TRANSFORM */
        /* ============================================ */
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
            color: var(--pup-maroon);
            font-size: 1.1rem;
            line-height: 1.2;
            margin: 0;
        }

        /* ============================================ */
        /* [SECTION 5] VERTICAL SCROLL PANE WITH SCROLLBAR AT EDGE */
        /* ============================================ */
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
            color: var(--pup-maroon);
            font-size: 2rem;
            border: 3px solid white;
        }

        /* Custom scrollbar styling */
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
            background: var(--pup-maroon);
        }
        
        .nav-tabs-custom {
            scrollbar-width: auto;
            scrollbar-color: #bdc3c7 #e9ecef;
        }

        /* ============================================ */
        /* [SECTION 6] NAVIGATION LINK STYLES */
        /* ============================================ */
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
            background: rgba(156, 12, 32, 0.08);
            color: var(--pup-maroon);
        }

        .nav-link-custom.active {
            background: var(--pup-maroon) !important;
            color: white !important;
            box-shadow: 0 8px 15px rgba(156, 12, 32, 0.3);
        }

        /* ============================================ */
        /* [SECTION 7] MAIN CONTENT LAYOUT */
        /* ============================================ */
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
        
        /* Spacer for hamburger on mobile */
        .header-spacer {
            display: none;
            width: 48px;
        }
        
        .dynamic-header-title {
            font-size: 1.4rem;
            font-weight: 600;
            color: var(--pup-maroon);
            margin: 0;
            letter-spacing: -0.3px;
            position: relative;
            padding-left: 0;
        }
        
        .dynamic-header-title i {
            margin-right: 10px;
            font-size: 1.3rem;
            color: var(--pup-maroon);
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
            color: var(--pup-maroon);
            margin: 0;
            white-space: nowrap;
            letter-spacing: -0.2px;
        }

        .header-actions {
            display: flex;
            align-items: center;
        }

        /* ============================================ */
        /* [SECTION 8] PROFILE DROPDOWN COMPONENT */
        /* ============================================ */
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
            color: var(--pup-maroon);
            font-size: 1.5rem;
            box-shadow: 0 2px 8px rgba(0,0,0,0.08);
            border: 2px solid white;
            cursor: pointer;
        }
        
        .profile-indicator {
            position: absolute;
            bottom: -2px;
            right: -4px;
            background: var(--pup-maroon);
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
        
        .profile-indicator i {
            font-size: 8px;
            margin-top: 1px;
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
            color: var(--pup-maroon);
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
            color: var(--pup-maroon);
        }
        
        .dropdown-option:hover i {
            color: var(--pup-maroon);
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
            background: #f8fafb;
        }

        .small-text-muted {
            font-size: 0.75rem;
            color: #6c757d;
        }

        /* ============================================ */
        /* [SECTION 9] LAPTOP DIMENSIONS (1024px - 1366px) */
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
        /* [SECTION 10] MOBILE & TABLET RESPONSIVE (max-width: 1023px) */
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
        
        /* ============================================ */
        /* [SECTION 11] SMALL MOBILE DEVICES (max-width: 480px) */
        /* ============================================ */
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
        
        /* ============================================ */
        /* [SECTION 12] IPAD AND TABLET LANDSCAPE */
        /* ============================================ */
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

<!-- ============================================ -->
<!-- [COMPONENT 1] HAMBURGER MENU BUTTON -->
<!-- ============================================ -->
<button class="hamburger-btn" id="hamburgerBtn">
    <i class="fa-solid fa-bars"></i>
</button>

<!-- ============================================ -->
<!-- [COMPONENT 2] SIDEBAR OVERLAY -->
<!-- ============================================ -->
<div class="sidebar-overlay" id="sidebarOverlay"></div>

<!-- ============================================ -->
<!-- [COMPONENT 3] SIDEBAR NAVIGATION -->
<!-- ============================================ -->
<div class="sidebar" id="sidebar">
    <!-- Brand / PUP Logo Section - LIFTED WITH transform: translateY(-8px) -->
    <div class="sidebar-brand">
        <div class="brand-logo">
            <img src="../../assets/cliniclogohalf.png" alt="PUP Logo" onerror="this.src='https://via.placeholder.com/45?text=PUP'">
        </div>
        <h5 class="brand-name">PUPBC<br>CareLink</h5>
    </div>

    <!-- Vertical Scroll Pane with Profile Section Inside -->
    <nav class="nav-tabs-custom" id="sidebar-nav">
        <div class="profile-section-scroll">
            <div class="profile-img-placeholder">
                <i class="fa-solid fa-user"></i>
            </div>
            <h6 class="fw-bold mb-0">Student Name</h6>
            <small class="text-muted small-text-muted">2023-00000-BN-0</small>
        </div>

        <!-- Navigation Menu Items -->
        <a href="studoverview.php" target="content-frame" class="nav-link-custom active" data-header-title="Dashboard">
            <i class="fa-solid fa-house"></i> Overview
        </a>
        <a href="studprofile.php" target="content-frame" class="nav-link-custom" data-header-title="Profile Management">
            <i class="fa-solid fa-id-card"></i> Profile
        </a>
        <a href="studappointments.php" target="content-frame" class="nav-link-custom" data-header-title="Appointment Management">
            <i class="fa-solid fa-calendar-check"></i> Appointments
        </a>
        <a href="studmedicalrecords.php" target="content-frame" class="nav-link-custom" data-header-title="Medical Records Management">
            <i class="fa-solid fa-file-medical"></i> Medical Records
        </a>
    </nav>
</div>

<!-- ============================================ -->
<!-- [COMPONENT 4] MAIN CONTENT AREA -->
<!-- ============================================ -->
<div class="main-content">
    <header class="dashboard-header">
        <div class="header-spacer"></div>
        <div class="dynamic-header-title" id="dynamicHeaderTitle">
            <i class="fa-solid fa-chalkboard-user"></i> 
            <span id="headerTitleText">Dashboard</span>
        </div>
        
        <div class="header-right-group">
            <div class="welcome-text">
                Welcome to Student Portal!
            </div>
            
            <div class="header-actions">
                <div class="profile-dropdown" id="profileDropdown">
                    <div class="header-profile-icon" id="profileIconBtn">
                        <i class="fa-solid fa-user"></i>
                        <span class="profile-indicator">
                            <i class="fa-solid fa-chevron-down"></i>
                        </span>
                    </div>
                    
                    <div class="dropdown-menu-custom">
                        <div class="dropdown-user-info">
                            <div class="user-avatar-sm">
                                <i class="fa-solid fa-user"></i>
                            </div>
                            <div class="user-name">Student Name</div>
                            <div class="user-role">2023-00000-BN-0 • Student</div>
                        </div>
                        <div class="dropdown-options">
                            <a href="studprofile.php" target="content-frame" class="dropdown-option" id="profileOptionLink">
                                <i class="fa-solid fa-id-card"></i>
                                <span>Settings</span>
                            </a>
                            <a href="../studlogin.php" class="dropdown-option logout-option" id="logoutOptionBtn">
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

    <iframe src="studoverview.php" name="content-frame" id="content-frame"></iframe>
</div>

<script>
    // ============================================================
    // [SCRIPT 1] DOM ELEMENT REFERENCES
    // Captures all interactive HTML elements for manipulation
    // ============================================================
    const navLinks = document.querySelectorAll('.nav-link-custom');
    const iframe = document.getElementById('content-frame');
    const profileDropdown = document.getElementById('profileDropdown');
    const profileIconBtn = document.getElementById('profileIconBtn');
    const dropdownBackdrop = document.getElementById('dropdownBackdrop');
    const profileOptionLink = document.getElementById('profileOptionLink');
    
    const headerTitleTextSpan = document.getElementById('headerTitleText');
    const dynamicHeaderTitleDiv = document.getElementById('dynamicHeaderTitle');
    
    // Hamburger elements
    const hamburgerBtn = document.getElementById('hamburgerBtn');
    const sidebar = document.getElementById('sidebar');
    const sidebarOverlay = document.getElementById('sidebarOverlay');
    
    // ============================================================
    // [SCRIPT 2] HAMBURGER MENU TOGGLE (RESPONSIVE FEATURE)
    // ============================================================
    function toggleSidebar() {
        sidebar.classList.toggle('open');
        sidebarOverlay.classList.toggle('active');
        // Prevent body scroll when sidebar is open on mobile
        if (sidebar.classList.contains('open')) {
            document.body.style.overflow = 'hidden';
        } else {
            document.body.style.overflow = '';
        }
    }
    
    function closeSidebar() {
        sidebar.classList.remove('open');
        sidebarOverlay.classList.remove('active');
        document.body.style.overflow = '';
    }
    
    if (hamburgerBtn) {
        hamburgerBtn.addEventListener('click', toggleSidebar);
    }
    
    if (sidebarOverlay) {
        sidebarOverlay.addEventListener('click', closeSidebar);
    }
    
    // Close sidebar on window resize if screen becomes larger than mobile breakpoint
    window.addEventListener('resize', function() {
        if (window.innerWidth > 1023) {
            closeSidebar();
            document.body.style.overflow = '';
        }
    });
    
    // Close sidebar when a nav link is clicked (mobile only)
    navLinks.forEach(link => {
        link.addEventListener('click', function() {
            if (window.innerWidth <= 1023) {
                closeSidebar();
            }
        });
    });
    
    // ============================================================
    // [SCRIPT 3] DYNAMIC HEADER TITLE UPDATER
    // Changes the header title and icon based on active sidebar menu item
    // ============================================================
    function updateHeaderTitle() {
        const activeLink = document.querySelector('.nav-link-custom.active');
        if (activeLink && activeLink.hasAttribute('data-header-title')) {
            const title = activeLink.getAttribute('data-header-title');
            if (headerTitleTextSpan) {
                headerTitleTextSpan.textContent = title;
            }
            const iconElem = dynamicHeaderTitleDiv ? dynamicHeaderTitleDiv.querySelector('i') : null;
            if (iconElem && activeLink) {
                const activeIcon = activeLink.querySelector('i');
                if (activeIcon) {
                    const iconClass = activeIcon.className;
                    iconElem.className = iconClass;
                } else {
                    iconElem.className = "fa-solid fa-chalkboard-user";
                }
            }
        } else {
            if (headerTitleTextSpan) headerTitleTextSpan.textContent = "Dashboard";
        }
    }
    
    // ============================================================
    // [SCRIPT 4] PROFILE DROPDOWN TOGGLE
    // Opens/closes the profile dropdown menu when clicking the profile icon
    // ============================================================
    function toggleDropdown(event) {
        if (event) event.stopPropagation();
        profileDropdown.classList.toggle('active');
        if (profileDropdown.classList.contains('active')) {
            dropdownBackdrop.classList.add('active');
        } else {
            dropdownBackdrop.classList.remove('active');
        }
    }
    
    function closeDropdown() {
        profileDropdown.classList.remove('active');
        dropdownBackdrop.classList.remove('active');
    }
    
    if (profileIconBtn) {
        profileIconBtn.addEventListener('click', toggleDropdown);
    }
    
    if (dropdownBackdrop) {
        dropdownBackdrop.addEventListener('click', function() {
            closeDropdown();
        });
    }
    
    // ============================================================
    // [SCRIPT 5] ESCAPE KEY HANDLER
    // ============================================================
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape' && profileDropdown.classList.contains('active')) {
            closeDropdown();
        }
    });
    
    // ============================================================
    // [SCRIPT 6] SETTINGS OPTION CLICK HANDLER
    // ============================================================
    if (profileOptionLink) {
        profileOptionLink.addEventListener('click', function(e) {
            e.preventDefault();
            const targetPage = this.getAttribute('href');
            if (targetPage) {
                iframe.src = targetPage + (targetPage.includes('?') ? '&' : '?') + getCacheBuster();
                navLinks.forEach(link => {
                    if (link.getAttribute('href') === targetPage) {
                        navLinks.forEach(nav => nav.classList.remove('active'));
                        link.classList.add('active');
                        updateHeaderTitle();
                    }
                });
                updateBrowserURL(targetPage);
            }
            closeDropdown();
        });
    }
    
    // ============================================================
    // [SCRIPT 7] LOGOUT OPTION HANDLER
    // ============================================================
    const logoutOptionBtn = document.getElementById('logoutOptionBtn');
    if (logoutOptionBtn) {
        logoutOptionBtn.addEventListener('click', function(e) {
            closeDropdown();
        });
    }
    
    // ============================================================
    // [SCRIPT 8] CACHE BUSTER GENERATOR
    // ============================================================
    function getCacheBuster() {
        return "v=" + new Date().getTime();
    }
    
    // ============================================================
    // [SCRIPT 9] BROWSER URL UPDATER
    // ============================================================
    function updateBrowserURL(pageName, subpage = null) {
        let newURL = window.location.origin + window.location.pathname + '?page=' + pageName;
        if (subpage) {
            newURL += '&subpage=' + subpage;
        }
        window.history.replaceState({ path: newURL }, '', newURL);
    }
    
    // ============================================================
    // [SCRIPT 10] NAVIGATION LINK CLICK HANDLERS
    // ============================================================
    navLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            const targetPage = this.getAttribute('href');
            
            iframe.src = targetPage + (targetPage.includes('?') ? '&' : '?') + getCacheBuster();
            
            navLinks.forEach(nav => nav.classList.remove('active'));
            this.classList.add('active');
            
            updateHeaderTitle();
            updateBrowserURL(targetPage);
            closeDropdown();
        });
    });
    
    // ============================================================
    // [SCRIPT 11] IFRAME LOAD LISTENER
    // ============================================================
    iframe.addEventListener('load', function() {
        updateHeaderTitle();
    });
    
    // ============================================================
    // [SCRIPT 12] WINDOW LOAD HANDLER (INITIALIZATION)
    // ============================================================
    window.onload = function() {
        const urlParams = new URLSearchParams(window.location.search);
        let targetPage = urlParams.get('page');
        const subpage = urlParams.get('subpage');
        
        if (!targetPage) {
            targetPage = "studoverview.php";
        }
        
        let finalSrc = targetPage;
        if (targetPage === "studprofile.php" && subpage) {
            finalSrc = targetPage + "?subpage=" + subpage;
        }
        
        iframe.src = finalSrc + (finalSrc.includes('?') ? '&' : '?') + getCacheBuster();
        
        let activeFound = false;
        navLinks.forEach(link => {
            if (link.getAttribute('href') === targetPage) {
                navLinks.forEach(nav => nav.classList.remove('active'));
                link.classList.add('active');
                activeFound = true;
            }
        });
        
        if (!activeFound && navLinks.length > 0) {
            navLinks.forEach(nav => nav.classList.remove('active'));
            navLinks[0].classList.add('active');
        }
        
        updateHeaderTitle();
        updateBrowserURL(targetPage, subpage);
        closeDropdown();
    };
    
    // ============================================================
    // [SCRIPT 13] CLICK OUTSIDE DROPDOWN CLOSER
    // ============================================================
    document.addEventListener('click', function(event) {
        if (profileDropdown && !profileDropdown.contains(event.target) && profileDropdown.classList.contains('active')) {
            if (profileIconBtn && !profileIconBtn.contains(event.target)) {
                closeDropdown();
            }
        }
    });
    
    // ============================================================
    // [SCRIPT 14] DELAYED HEADER TITLE SYNC
    // ============================================================
    setTimeout(() => {
        updateHeaderTitle();
    }, 50);
</script>

</body>
</html>