<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <title>CareLink Express | Register New Patient — CareLink Registration</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;800&display=swap" rel="stylesheet">

    <!-- SweetAlert2 - Locked layout, no flicker/scrollbar -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style>
        :root {
            --pup-maroon: #9C0C20;
            --pup-maroon-dark: #7a0919;
            --portal-sky: #38bdf8;
            --cp-navy: #0f2b4d;      /* Dark navy blue for CP user */
            --cp-navy-dark: #0a1e36;
            --noncp-teal: #0f766e;    /* Dark teal for non-CP user */
            --noncp-teal-dark: #0a5c55;
            --faq-teal: #14b8a6;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* CRITICAL: LOCK VIEWPORT — rigid, no scrollbar shifting */
        html, body {
            height: 100%;
            overflow: hidden;
            margin: 0;
            padding: 0;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            width: 100%;
        }

        body {
            font-family: 'Poppins', sans-serif;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #000; 
            position: relative;
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }

        /* Blur background overlay */
        body::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: inherit;
            background-size: cover;
            background-position: center;
            filter: blur(8px) brightness(0.45);
            transform: scale(1.02);
            z-index: -2;
        }

        body::after {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.25);
            z-index: -1;
        }

        /* MAIN UI CARD — fixed dimensions, no reflow */
        .portal-card {
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            border-radius: 20px;
            width: 1300px;
            height: 850px;
            box-shadow: 0 30px 60px rgba(0, 0, 0, 0.6), 0 0 0 1px rgba(255,255,255,0.2) inset;
            display: flex;
            flex-direction: column;
            position: relative;
            overflow: hidden;
            z-index: 10;
            border: 2px solid rgba(255, 255, 255, 0.92);
            flex-shrink: 0;
        }
        
        /* Dark overlay for text contrast */
        .card-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(125deg, rgba(0, 0, 0, 0.5) 0%, rgba(0, 0, 0, 0.65) 100%);
            z-index: 1;
            border-radius: inherit;
            pointer-events: none;
        }

        /* Glass navbar — transparent */
        .navbar-custom {
            position: absolute;
            top: 20px;
            left: 100px;
            right: 100px;
            padding: 15px 40px 15px 40px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: transparent;
            backdrop-filter: none;
            z-index: 100;
        }

        /* Horizontal separator wrappers (top + bottom) */
        .logo-separator-wrapper {
            position: absolute;
            top: 95px;
            left: 100px;
            right: 100px;
            z-index: 99;
            pointer-events: none;
        }
        
        .bottom-separator-wrapper {
            position: absolute;
            bottom: 90px;
            left: 100px;
            right: 100px;
            z-index: 99;
            pointer-events: none;
        }
        
        .brand-separator {
            width: 100%;
            height: 2px;
            background: linear-gradient(90deg, 
                rgba(255,255,255,0) 0%, 
                rgba(255,255,255,0.7) 15%, 
                rgba(255,215,0,0.9) 50%, 
                rgba(255,255,255,0.7) 85%, 
                rgba(255,255,255,0) 100%);
            box-shadow: 0 1px 4px rgba(0,0,0,0.2);
            border-radius: 4px;
        }

        .logo-area { 
            display: flex; 
            align-items: center; 
            gap: 12px; 
            justify-content: flex-start; 
            position: relative;
        }
        
        .logo-area img { 
            height: 45px; 
            filter: drop-shadow(0 2px 4px rgba(0,0,0,0.2)); 
        }
        
        .logo-area span { 
            font-weight: 800; 
            font-size: 1.5rem; 
            color: white; 
            text-shadow: 0 2px 5px rgba(0,0,0,0.3);
            letter-spacing: 0.5px;
        }

        .login-area { 
            display: flex; 
            justify-content: flex-end; 
            align-items: center; 
            gap: 15px; 
        }

        /* LIVE CLOCK (fixed width) */
        .time-container-permanent {
            height: 48px;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 0 20px;
            border-radius: 10px;
            font-weight: 600;
            font-size: 1rem;
            font-family: 'Poppins', monospace;
            letter-spacing: 1px;
            backdrop-filter: blur(8px);
            background: rgba(0, 0, 0, 0.45);
            color: white;
            border: 1.5px solid rgba(255, 255, 255, 0.7);
            backdrop-filter: blur(6px);
            box-shadow: 0 2px 8px rgba(0,0,0,0.2);
            min-width: 180px;
            width: auto;
            white-space: nowrap;
            text-shadow: 0 1px 2px rgba(0,0,0,0.3);
            cursor: default;
        }
        
        .time-container-permanent span {
            display: inline-block;
            font-weight: 600;
            letter-spacing: 0.5px;
        }

        /* MIDDLE CONTENT AREA - MAXIMIZED between separators 
           Now uses flex column to push cards further downward while maintaining alignment */
        .register-middle-area {
            position: absolute;
            top: 135px;          /* below upper separator (95px + buffer) */
            bottom: 135px;       /* above bottom separator (90px base + safety) */
            left: 100px;
            right: 100px;
            z-index: 15;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            gap: 32px;
            overflow: visible;
        }

        /* HEADER SECTION: icon + title (inline-flex, no background) */
        .register-header {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 18px;
            background: transparent;
            margin: 0;
            padding: 0;
            width: auto;
        }
        
        .register-header i {
            font-size: 3rem;
            color: #ffffff;
            filter: drop-shadow(0 6px 12px rgba(0,0,0,0.5));
        }
        
        .register-header h1 {
            font-size: 2.6rem;
            font-weight: 800;
            color: white;
            margin: 0;
            text-shadow: 0 2px 12px rgba(0,0,0,0.6);
            white-space: nowrap;
            letter-spacing: -0.3px;
        }
        
        /* PARAGRAPH - now 2 lines with center justify */
        .register-sub {
            font-size: 1.25rem;
            font-weight: 500;
            color: rgba(255,255,255,0.98);
            text-align: center;
            text-shadow: 0 1px 8px rgba(0,0,0,0.6);
            margin: 0;
            width: auto;
            max-width: 720px;
            line-height: 1.4;
            letter-spacing: 0.3px;
        }
        
        /* STAT CARDS container - moved downward by adjusting margin-top, placed after paragraph 
           and centered using flex gap exactly like original dashboard's stat-card-buttons */
        .registration-stat-cards {
            display: flex;
            flex-wrap: wrap;
            gap: 32px;
            justify-content: center;
            align-items: center;
            width: 100%;
            margin-top: 20px;      /* pushes cards further down while preserving vertical spacing */
        }
        
        /* Kiosk stat button style (preserved from original dashboard .kiosk-btn) */
        .kiosk-reg-btn {
            flex: 1;
            min-width: 280px;
            max-width: 360px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            gap: 22px;
            padding: 44px 20px 44px 20px;
            border-radius: 18px;
            font-size: 1.7rem;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 1.2px;
            text-decoration: none;
            transition: all 0.2s ease;
            border: none;
            box-shadow: 0 20px 30px -12px rgba(0, 0, 0, 0.4), 0 4px 8px rgba(0,0,0,0.2);
            cursor: pointer;
            backdrop-filter: blur(2px);
            color: white;
            text-shadow: 0 2px 3px rgba(0,0,0,0.3);
        }
        
        .kiosk-reg-btn i {
            font-size: 4rem;
            margin: 0;
            filter: drop-shadow(0 6px 12px rgba(0, 0, 0, 0.4)) drop-shadow(0 2px 4px rgba(0,0,0,0.2));
            transition: all 0.2s ease;
            display: inline-block;
        }
        
        .kiosk-reg-btn span {
            font-size: 1.4rem;
            font-weight: 800;
            letter-spacing: 1px;
            text-align: center;
            display: block;
            line-height: 1.3;
        }
        
        /* CP User button: Dark Navy Blue */
        .btn-cp-user {
            background: linear-gradient(135deg, #0f2b4d, #071a30);
            border-bottom: 6px solid #030d1a;
        }
        
        /* Non-CP User button: Dark Teal */
        .btn-noncp-user {
            background: linear-gradient(135deg, #0f766e, #0a5c55);
            border-bottom: 6px solid #06423d;
        }
        
        /* Hover effects (preserved from original) */
        .btn-cp-user:hover {
            background: linear-gradient(135deg, #0a1e38, #041220);
            border-bottom-color: #02070f;
            box-shadow: 0 16px 24px -10px rgba(0, 0, 0, 0.35);
        }
        
        .btn-noncp-user:hover {
            background: linear-gradient(135deg, #0b5e57, #06423d);
            border-bottom-color: #042c28;
            box-shadow: 0 16px 24px -10px rgba(0, 0, 0, 0.35);
        }
        
        .kiosk-reg-btn:hover i {
            transform: scale(1.02);
            filter: drop-shadow(0 6px 10px rgba(0, 0, 0, 0.4));
        }
        
        .kiosk-reg-btn:active {
            transform: scale(0.98);
            border-bottom-width: 2px;
            box-shadow: 0 8px 12px -6px rgba(0, 0, 0, 0.4);
        }
        
        /* GO BACK BUTTON (preserved exact same style/position) */
        .go-back-wrapper {
            position: absolute;
            bottom: 38px;
            left: 130px;
            z-index: 15;
            pointer-events: auto;
        }
        
        .go-back-btn {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            backdrop-filter: blur(4px);
            padding: 8px 24px;
            border-radius: 60px;
            font-family: 'Poppins', sans-serif;
            font-size: 0.9rem;
            font-weight: 600;
            color: #f1f5f9;
            text-decoration: none;
            border: 1px solid rgba(255,255,255,0.35);
            letter-spacing: 0.3px;
            cursor: pointer;
            box-shadow: 0 2px 6px rgba(0,0,0,0.2);
            background: rgba(0, 0, 0, 0.3);
        }
        
        .go-back-btn i {
            font-size: 1.1rem;
            color: #e2e8f0;
        }
        
        .go-back-btn:hover {
            background: rgba(0, 0, 0, 0.75);
            color: white;
            border-color: rgba(255,255,255,0.7);
            text-decoration: none;
        }
        
        /* FAQ link (preserved exact styling) */
        .faq-link-wrapper {
            position: absolute;
            bottom: 38px;
            right: 130px;
            z-index: 15;
            pointer-events: auto;
        }
        
        .faq-simple-link {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            backdrop-filter: blur(4px);
            padding: 8px 24px;
            border-radius: 60px;
            font-family: 'Poppins', sans-serif;
            font-size: 0.9rem;
            font-weight: 500;
            color: #e2e8f0;
            text-decoration: none;
            transition: all 0.2s ease;
            border: 1px solid rgba(255,255,255,0.25);
            letter-spacing: 0.3px;
            background: rgba(0, 0, 0, 0.3);
        }
        
        .faq-simple-link i {
            font-size: 1rem;
            color: #2dd4bf;
        }
        
        .faq-simple-link:hover {
            background: rgba(0, 0, 0, 0.55);
            color: white;
            border-color: white;
            text-decoration: none;
        }
        
        /* Responsive adjustments (mirroring original dashboard) */
        @media (max-width: 1100px) {
            .portal-card { width: 95%; height: 90vh; }
            .navbar-custom { left: 50px; right: 50px; }
            .logo-separator-wrapper { left: 50px; right: 50px; top: 95px; }
            .bottom-separator-wrapper { left: 50px; right: 50px; bottom: 90px; }
            .register-middle-area { left: 50px; right: 50px; top: 130px; bottom: 130px; gap: 28px; }
            .register-header h1 { font-size: 2.2rem; white-space: normal; text-align: center; }
            .register-header i { font-size: 2.6rem; }
            .register-sub { font-size: 1.15rem; max-width: 600px; }
            .kiosk-reg-btn { min-width: 260px; padding: 36px 18px; gap: 18px; }
            .kiosk-reg-btn i { font-size: 3.6rem; }
            .kiosk-reg-btn span { font-size: 1.2rem; }
            .faq-link-wrapper { bottom: 28px; right: 70px; }
            .go-back-wrapper { bottom: 28px; left: 70px; }
            .time-container-permanent { min-width: 170px; font-size: 0.9rem; }
        }
        
        @media (max-width: 850px) {
            .navbar-custom { left: 40px; right: 40px; flex-wrap: wrap; gap: 12px; }
            .logo-separator-wrapper { left: 40px; right: 40px; top: 95px; }
            .bottom-separator-wrapper { left: 40px; right: 40px; bottom: 85px; }
            .register-middle-area { left: 40px; right: 40px; top: 135px; bottom: 135px; gap: 25px; }
            .register-header h1 { font-size: 1.9rem; }
            .register-header i { font-size: 2.3rem; }
            .register-sub { font-size: 1rem; max-width: 500px; }
            .kiosk-reg-btn { padding: 32px 15px; min-width: 240px; }
            .kiosk-reg-btn i { font-size: 3.3rem; }
            .faq-link-wrapper { bottom: 22px; right: 50px; }
            .go-back-wrapper { bottom: 22px; left: 50px; }
        }
        
        @media (max-width: 580px) {
            .navbar-custom { left: 25px; right: 25px; flex-direction: column; align-items: stretch; }
            .logo-separator-wrapper { left: 25px; right: 25px; top: 105px; }
            .bottom-separator-wrapper { left: 25px; right: 25px; bottom: 100px; }
            .login-area { justify-content: center; }
            .register-middle-area { left: 25px; right: 25px; top: 160px; bottom: 170px; gap: 20px; }
            .register-header h1 { font-size: 1.7rem; text-align: center; }
            .register-header i { font-size: 2rem; }
            .register-sub { font-size: 0.9rem; max-width: 90%; }
            .registration-stat-cards { flex-direction: column; gap: 20px; margin-top: 10px; }
            .kiosk-reg-btn { width: 100%; max-width: 320px; padding: 28px 12px; }
            .kiosk-reg-btn i { font-size: 3rem; }
            .faq-link-wrapper { bottom: 22px; right: 25px; }
            .go-back-wrapper { bottom: 22px; left: 25px; }
            .faq-simple-link, .go-back-btn { font-size: 0.8rem; padding: 6px 18px; }
            .time-container-permanent { min-width: 150px; font-size: 0.75rem; height: 42px; }
        }
        
        @media (max-width: 480px) {
            .register-header h1 { font-size: 1.5rem; }
            .register-header i { font-size: 1.8rem; }
            .register-sub { font-size: 0.85rem; }
            .kiosk-reg-btn i { font-size: 2.8rem; }
            .kiosk-reg-btn span { font-size: 1rem; }
        }
        
        /* Gentle pulse on registration cards (matching original dashboard animation) */
        @keyframes gentlePulseReg {
            0% { box-shadow: 0 20px 30px -12px rgba(0, 0, 0, 0.4); }
            100% { box-shadow: 0 22px 38px -10px rgba(0, 0, 0, 0.55); }
        }
        .kiosk-reg-btn {
            animation: gentlePulseReg 1.8s infinite alternate ease-in-out;
        }
        .kiosk-reg-btn:hover {
            animation: none;
        }
        
        /* Subtle heartbeat icon (consistent with original style) */
        @keyframes subtleBeatReg {
            0% { transform: scale(1); }
            45% { transform: scale(1.06); }
            55% { transform: scale(1.06); }
            100% { transform: scale(1); }
        }
        .kiosk-reg-btn i {
            animation: subtleBeatReg 1.4s ease-in-out infinite;
            transform-origin: center;
        }
        .kiosk-reg-btn:hover i {
            animation: none;
        }
        
        /* SweetAlert overrides */
        .swal2-popup {
            font-family: 'Poppins', sans-serif !important;
            border-radius: 28px !important;
        }
        body.swal2-shown {
            overflow: hidden !important;
            padding-right: 0px !important;
            margin-right: 0px !important;
        }
        .swal2-container {
            overflow-y: auto !important;
        }
        .swal2-backdrop-show {
            backdrop-filter: blur(3px);
            background-color: rgba(0, 0, 0, 0.7);
        }
    </style>
</head>
<body>

<div class="portal-card" id="card">
    <div class="card-overlay"></div>
    
    <!-- Navbar: Logo + live time (identical to original) -->
    <nav class="navbar-custom">
        <div class="logo-area">
            <img src="../../assets/cliniclogohalf.png" alt="Logo" onerror="this.src='https://placehold.co/60x45/9C0C20/white?text=CL'">
            <span>PUPBC CareLink</span>
        </div>
        <div class="login-area">
            <div class="time-container-permanent" id="liveClockDisplay">
                <i class="bi bi-clock me-2" style="font-size: 0.9rem;"></i>
                <span id="clockTimeText">--:--:-- --</span>
            </div>
        </div>
    </nav>
    
    <!-- Top & Bottom separators (preserved exactly) -->
    <div class="logo-separator-wrapper">
        <div class="brand-separator"></div>
    </div>
    <div class="bottom-separator-wrapper">
        <div class="brand-separator"></div>
    </div>
    
    <!-- MIDDLE CONTENT: Header icon+title, 2-line centered paragraph, stat cards moved downward -->
    <div class="register-middle-area">
        <!-- HEADER with icon on left side (exactly as requested) -->
        <div class="register-header">
            <i class="fas fa-user-plus"></i>
            <h1>REGISTER NEW PATIENT FOR ACCESS</h1>
        </div>
        
        <!-- PARAGRAPH: now 2 lines with center alignment (justify via text-align:center) -->
        <div class="register-sub">
            please identify your carelink account type<br>to start registration
        </div>
        
        <!-- TWO STAT CARDS: positioned downward with increased margin-top to match desired spacing -->
        <div class="registration-stat-cards">
            <!-- 1) I am a CP user - Dark Navy Blue -->
            <div class="kiosk-reg-btn btn-cp-user" id="cpUserBtn">
                <i class="fas fa-id-badge"></i>
                <span>I AM A<br>CP USER</span>
            </div>
            <!-- 2) I am a non-CP user - Dark Teal -->
            <div class="kiosk-reg-btn btn-noncp-user" id="nonCpUserBtn">
                <i class="fas fa-users"></i>
                <span>I AM A<br>NON-CP USER</span>
            </div>
        </div>
    </div>
    
    <!-- GO BACK BUTTON (preserved) -->
    <div class="go-back-wrapper">
        <a href="kioskportalpage.php" class="go-back-btn" id="goBackButton">
            <i class="fas fa-arrow-left"></i> Go Back
        </a>
    </div>
    
    <!-- FAQ LINK (preserved) -->
    <div class="faq-link-wrapper">
        <a href="faq.php" class="faq-simple-link" id="faqSimpleLink">
            <i class="fas fa-question-circle"></i> Need more help? <strong>FAQs</strong>
        </a>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    // ========== LIVE CLOCK (exact same mechanism) ==========
    function updateLiveClock() {
        const clockSpan = document.getElementById('clockTimeText');
        if (!clockSpan) return;
        const now = new Date();
        let hours = now.getHours();
        const minutes = now.getMinutes();
        const seconds = now.getSeconds();
        const ampm = hours >= 12 ? 'PM' : 'AM';
        hours = hours % 12;
        hours = hours ? hours : 12;
        const formattedHours = hours.toString().padStart(2, '0');
        const formattedMinutes = minutes.toString().padStart(2, '0');
        const formattedSeconds = seconds.toString().padStart(2, '0');
        clockSpan.innerText = `${formattedHours}:${formattedMinutes}:${formattedSeconds} ${ampm}`;
    }
    updateLiveClock();
    setInterval(updateLiveClock, 1000);
    
    // ========== BACKGROUND IMAGE (preserved) ==========
    const backgroundImageURL = "https://5.imimg.com/data5/SELLER/Default/2023/6/316157293/TP/IJ/GK/5863015/healthcare-kiosk-solutions-1000x1000.jpg";
    const card = document.getElementById('card');
    document.body.style.backgroundImage = `url('${backgroundImageURL}')`;
    if (card) card.style.backgroundImage = `url('${backgroundImageURL}')`;
    
    // ========== REGISTRATION HANDLERS for two stat cards ==========
    function handleRegistrationFlow(userType) {
        Swal.fire({
            title: `${userType} Registration`,
            text: `You are initiating registration as ${userType}. This will guide you through the CareLink account creation process.`,
            icon: 'info',
            confirmButtonText: 'Continue Registration',
            confirmButtonColor: '#0ea5e9',
            backdrop: `rgba(0,0,0,0.85)`,
            allowOutsideClick: false,
            showCancelButton: true,
            cancelButtonText: 'Go Back',
            cancelButtonColor: '#6c757d'
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire({
                    title: '🚀 Redirecting',
                    text: `Opening ${userType} registration form...`,
                    icon: 'success',
                    timer: 1300,
                    showConfirmButton: false,
                    backdrop: `rgba(0,0,0,0.7)`
                }).then(() => {
                    // In production, link to specific registration flows
                    if (userType === 'CP User') {
                        window.location.href = 'kioskportalregisteraccountcpuser.php';
                    } else {
                        window.location.href = 'kioskportalregisteraccountnoncpuser.php';
                    }
                });
            }
        });
    }
    
    // Clean button event handling with clone to avoid duplicate listeners (preserved approach)
    const cpBtn = document.getElementById('cpUserBtn');
    if (cpBtn) {
        const freshCp = cpBtn.cloneNode(true);
        cpBtn.parentNode.replaceChild(freshCp, cpBtn);
        freshCp.id = 'cpUserBtn';
        freshCp.addEventListener('click', (e) => {
            e.preventDefault();
            handleRegistrationFlow('CP User');
        });
    }
    
    const nonCpBtn = document.getElementById('nonCpUserBtn');
    if (nonCpBtn) {
        const freshNonCp = nonCpBtn.cloneNode(true);
        nonCpBtn.parentNode.replaceChild(freshNonCp, nonCpBtn);
        freshNonCp.id = 'nonCpUserBtn';
        freshNonCp.addEventListener('click', (e) => {
            e.preventDefault();
            handleRegistrationFlow('Non-CP User');
        });
    }
    
    // ========== GO BACK BUTTON (preserved functionality) ==========
    const goBackElement = document.getElementById('goBackButton');
    if (goBackElement) {
        const freshGoBack = goBackElement.cloneNode(true);
        goBackElement.parentNode.replaceChild(freshGoBack, goBackElement);
        freshGoBack.id = 'goBackButton';
        freshGoBack.addEventListener('click', (e) => {
            e.preventDefault();
            if (window.history.length > 1) {
                window.history.back();
            } else {
                Swal.fire({
                    title: `Navigation`,
                    text: `Returning to kiosk portal.`,
                    icon: 'info',
                    timer: 1000,
                    showConfirmButton: false,
                    backdrop: `rgba(0,0,0,0.7)`
                }).then(() => {
                    window.location.href = 'kioskportalpage.php';
                });
            }
        });
    }
    
    // ========== FAQ LINK PRESERVED ==========
    const faqSimpleLink = document.getElementById('faqSimpleLink');
    if (faqSimpleLink) {
        faqSimpleLink.addEventListener('click', (e) => {
            console.log("Navigate to FAQ page");
        });
    }
    
    // ========== LAYOUT SHIFT ELIMINATION (exact same method as original) ==========
    (function eliminateLayoutShiftCompletely() {
        const originalSwalFire = Swal.fire;
        const lockBodyForModal = () => {
            document.documentElement.style.overflow = 'hidden';
            document.body.style.overflow = 'hidden';
            document.body.style.paddingRight = '0px';
            document.body.style.marginRight = '0px';
            document.body.style.width = '100%';
            document.body.style.position = 'relative';
        };
        const unlockBodyForModal = () => {
            document.documentElement.style.overflow = 'hidden';
            document.body.style.overflow = 'hidden';
            document.body.style.paddingRight = '0px';
            document.body.style.marginRight = '0px';
        };
        Swal.fire = function(...args) {
            lockBodyForModal();
            let config = args[0] || {};
            if (typeof config === 'object') {
                config.scrollbarPadding = false;
                config.heightAuto = false;
                config.backdrop = true;
                config.allowOutsideClick = false;
            } else {
                args[0] = { ...(args[0] || {}), scrollbarPadding: false, heightAuto: false };
            }
            const result = originalSwalFire.apply(this, args);
            if (result && typeof result.then === 'function') {
                result.finally(() => unlockBodyForModal());
            }
            return result;
        };
        const observer = new MutationObserver((mutations) => {
            mutations.forEach((mutation) => {
                if (mutation.attributeName === 'style' && document.body.style.paddingRight !== '0px') {
                    document.body.style.paddingRight = '0px';
                }
                if (mutation.attributeName === 'class' && document.body.classList.contains('swal2-shown')) {
                    document.body.style.paddingRight = '0px';
                    document.body.style.marginRight = '0px';
                    document.body.style.overflow = 'hidden';
                }
            });
        });
        observer.observe(document.body,     { attributes: true });
        lockBodyForModal();
    })();
    
    console.log("✅ REGISTER PAGE UPDATED — Paragraph now 2 lines with center alignment (justify). Stat cards moved downward with margin-top while preserving original dashboard alignment. All other elements (logo, time, separators, go back, FAQ) unchanged.");
</script>
</body>
</html>