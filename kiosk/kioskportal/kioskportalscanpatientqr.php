<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <title>CareLink Express | Scan Patient QR — Kiosk Access</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;800&display=swap" rel="stylesheet">

    <!-- SweetAlert2 + QR Scanner library -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://unpkg.com/html5-qrcode@2.3.8/html5-qrcode.min.js"></script>

    <style>
        :root {
            --pup-maroon: #9C0C20;
            --pup-maroon-dark: #7a0919;
            --scan-accent: #0ea5e9;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* LOCK VIEWPORT — no scrolling, rigid layout */
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

        /* MAIN CARD — fixed dimensions */
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

        /* NAVBAR + LOGO + TIME */
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
            z-index: 100;
        }

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
            border-radius: 4px;
        }

        .logo-area { 
            display: flex; 
            align-items: center; 
            gap: 12px; 
            justify-content: flex-start; 
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
            min-width: 180px;
            white-space: nowrap;
        }

        .time-container-permanent span {
            display: inline-block;
            font-weight: 600;
            letter-spacing: 0.5px;
        }

        /* MIDDLE SECTION — FIXED SPACING, NO SHRINK/EXPAND */
        .scanner-middle-container {
            position: absolute;
            top: 130px;
            bottom: 130px;
            left: 100px;
            right: 100px;
            z-index: 15;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            gap: 20px;
            overflow: visible;
        }

        /* HEADER STYLE (icon + text side by side) */
        .scan-header {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 18px;
            flex-wrap: nowrap;
            background: transparent;
            padding: 0;
            margin: 0;
        }
        
        .scan-header i {
            font-size: 3.4rem;
            color: #ffffff;
            filter: drop-shadow(0 6px 12px rgba(0,0,0,0.5));
            text-shadow: 0 0 6px rgba(56,189,248,0.6);
        }
        
        .scan-header h1 {
            font-size: 2.8rem;
            font-weight: 800;
            color: white;
            margin: 0;
            text-shadow: 0 2px 12px rgba(0,0,0,0.6);
            letter-spacing: -0.5px;
            background: transparent;
            white-space: nowrap;
        }
        
        /* paragraph styling */
        .scan-sub {
            font-size: 1.25rem;
            font-weight: 500;
            color: rgba(255,255,255,0.96);
            text-align: center;
            text-shadow: 0 1px 6px rgba(0,0,0,0.5);
            margin: 0;
            background: transparent;
            letter-spacing: 0.3px;
        }
        
        /* QR READER CONTAINER — FIXED SIZE, NO SHRINKING/EXPANDING */
        .qr-reader-wrapper {
            width: 420px;
            height: 420px;
            background: rgba(0, 0, 0, 0.7);
            border-radius: 28px;
            padding: 12px;
            backdrop-filter: blur(4px);
            border: 2px solid rgba(255,255,240,0.6);
            box-shadow: 0 20px 35px -10px black;
            margin: 0 auto;
            position: relative;
            overflow: hidden;
        }
        
        #qr-reader {
            width: 100%;
            height: 100%;
            border-radius: 20px;
            overflow: hidden;
            background: #000;
        }
        
        #qr-reader video {
            width: 100% !important;
            height: 100% !important;
            object-fit: cover;
            border-radius: 18px;
        }
        
        /* Override any dynamic resizing from html5-qrcode library */
        #qr-reader__dashboard_section_csr span,
        #qr-reader__dashboard_section_fps span {
            font-size: 12px;
        }
        
        .scan-status {
            margin-top: 8px;
            font-size: 0.85rem;
            color: #e2e8f0;
            text-align: center;
            background: rgba(0,0,0,0.5);
            border-radius: 60px;
            padding: 6px 18px;
            display: inline-block;
            backdrop-filter: blur(3px);
            font-weight: 500;
        }
        
        /* ========== REFINED BUTTONS: MATCH KIOSKPORTALPAGE STYLE (no bg-color, transparent with blur, consistent padding/size) ========== */
        /* GO BACK BUTTON — matches reference: transparent background, subtle border, blur, same dimensions as FAQ button */
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
            background: rgba(0, 0, 0, 0.3);   /* semi-transparent dark, matches reference style */
            padding: 8px 24px;
            border-radius: 60px;
            font-family: 'Poppins', sans-serif;
            font-size: 0.9rem;
            font-weight: 600;
            color: #f1f5f9;
            text-decoration: none;
            border: 1px solid rgba(255,255,255,0.35);
            cursor: pointer;
            transition: 0.2s;
            letter-spacing: 0.3px;
            box-shadow: 0 2px 6px rgba(0,0,0,0.2);
        }
        
        .go-back-btn i { 
            font-size: 1.1rem; 
            color: #e2e8f0;
        }
        
        .go-back-btn:hover { 
            background: rgba(0, 0, 0, 0.75); 
            color: white; 
            border-color: rgba(255,255,255,0.7); 
        }
        
        /* FAQ LINK — perfectly symmetrical, same base style as go-back, no solid background, just blurred transparent */
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
            background: rgba(0, 0, 0, 0.3);   /* identical to go-back button background — transparent black, no solid color */
            padding: 8px 24px;
            border-radius: 60px;
            font-family: 'Poppins', sans-serif;
            font-size: 0.9rem;
            font-weight: 500;
            color: #e2e8f0;
            text-decoration: none;
            border: 1px solid rgba(255,255,255,0.25);
            transition: 0.2s;
            letter-spacing: 0.3px;
            box-shadow: 0 2px 6px rgba(0,0,0,0.2);
        }
        
        .faq-simple-link i { 
            font-size: 1rem; 
            color: #2dd4bf; 
        }
        
        .faq-simple-link:hover { 
            background: rgba(0, 0, 0, 0.55); 
            color: white; 
            border-color: white; 
        }
        
        /* Responsive — keep scanner size consistent, align buttons follow portal style */
        @media (max-width: 1100px) {
            .portal-card { width: 95%; height: 90vh; }
            .navbar-custom { left: 50px; right: 50px; }
            .logo-separator-wrapper { left: 50px; right: 50px; }
            .bottom-separator-wrapper { left: 50px; right: 50px; }
            .scanner-middle-container { left: 50px; right: 50px; top: 130px; bottom: 130px; }
            .scan-header h1 { font-size: 2.4rem; white-space: normal; text-align: center; }
            .scan-header i { font-size: 2.8rem; }
            .scan-sub { font-size: 1.1rem; }
            .qr-reader-wrapper { width: 370px; height: 370px; }
            .faq-link-wrapper { right: 70px; bottom: 28px; }
            .go-back-wrapper { left: 70px; bottom: 28px; }
        }
        
        @media (max-width: 850px) {
            .navbar-custom { left: 40px; right: 40px; }
            .logo-separator-wrapper { left: 40px; right: 40px; top: 95px; }
            .bottom-separator-wrapper { left: 40px; right: 40px; bottom: 90px; }
            .scanner-middle-container { left: 40px; right: 40px; top: 125px; bottom: 125px; gap: 16px; }
            .scan-header h1 { font-size: 2rem; white-space: normal; text-align: center; }
            .scan-header i { font-size: 2.5rem; }
            .scan-sub { font-size: 1rem; }
            .qr-reader-wrapper { width: 330px; height: 330px; }
            .faq-link-wrapper { right: 50px; bottom: 22px; }
            .go-back-wrapper { left: 50px; bottom: 22px; }
            .go-back-btn, .faq-simple-link { padding: 6px 20px; font-size: 0.85rem; }
        }
        
        @media (max-width: 650px) {
            .qr-reader-wrapper { width: 290px; height: 290px; }
            .scan-header h1 { font-size: 1.7rem; }
            .scan-header i { font-size: 2rem; }
            .scanner-middle-container { gap: 14px; }
        }
        
        @media (max-width: 580px) {
            .navbar-custom { left: 25px; right: 25px; flex-direction: column; align-items: stretch; top: 15px; }
            .login-area { justify-content: center; }
            .logo-separator-wrapper { left: 25px; right: 25px; top: 105px; }
            .bottom-separator-wrapper { left: 25px; right: 25px; bottom: 100px; }
            .scanner-middle-container { left: 25px; right: 25px; top: 145px; bottom: 125px; }
            .qr-reader-wrapper { width: 260px; height: 260px; padding: 8px; }
            .faq-link-wrapper { right: 25px; bottom: 20px; }
            .go-back-wrapper { left: 25px; bottom: 20px; }
            .time-container-permanent { min-width: 150px; font-size: 0.75rem; height: 42px; }
            .scan-header h1 { font-size: 1.5rem; }
            .go-back-btn, .faq-simple-link { padding: 6px 16px; font-size: 0.8rem; gap: 6px; }
        }
        
        /* Prevent any layout shift or scrollbar */
        .swal2-popup { font-family: 'Poppins', sans-serif !important; border-radius: 28px !important; }
        body.swal2-shown { overflow: hidden !important; padding-right: 0px !important; }
        
        /* Force camera container stability - no dynamic resize */
        #qr-reader video, #qr-reader img {
            max-width: 100%;
            max-height: 100%;
            object-fit: cover;
        }
    </style>
</head>
<body>

<div class="portal-card" id="card">
    <div class="card-overlay"></div>
    
    <!-- Navbar: Logo + Live time -->
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
    
    <!-- Top & Bottom separators -->
    <div class="logo-separator-wrapper">
        <div class="brand-separator"></div>
    </div>
    <div class="bottom-separator-wrapper">
        <div class="brand-separator"></div>
    </div>

    <!-- MIDDLE CONTENT: fixed scanner size, no excess spacing -->
    <div class="scanner-middle-container">
        <div class="scan-header">
            <i class="fas fa-qrcode"></i>
            <h1>SCAN PATIENT QR TO LOGIN</h1>
        </div>
        <div class="scan-sub">
            Align your patient QR code inside the frame
        </div>
        
        <!-- QR scanner with fixed dimensions -->
        <div class="qr-reader-wrapper">
            <div id="qr-reader" style="width:100%; height:100%;"></div>
        </div>
        <div class="scan-status" id="scanStatusMsg">
            <i class="fas fa-camera"></i> Camera ready — position QR code
        </div>
    </div>

    <!-- Go Back button (updated visual: transparent/glass effect, matches reference kioskportalpage) -->
    <div class="go-back-wrapper">
        <a href="kioskportalpage.php" class="go-back-btn" id="goBackButton">
            <i class="fas fa-arrow-left"></i> Go Back
        </a>
    </div>

    <!-- FAQ Link (updated: same style as Go Back, no solid background, identical radius/spacing) -->
    <div class="faq-link-wrapper">
        <a href="faq.php" class="faq-simple-link" id="faqSimpleLink">
            <i class="fas fa-question-circle"></i> Need more help? <strong>FAQs</strong>
        </a>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    // ========== LIVE CLOCK ==========
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
    
    // ========== LAYOUT SHIFT FIX for SweetAlert ==========
    (function eliminateLayoutShift() {
        const originalSwalFire = Swal.fire;
        const lockBody = () => {
            document.documentElement.style.overflow = 'hidden';
            document.body.style.overflow = 'hidden';
            document.body.style.paddingRight = '0px';
            document.body.style.marginRight = '0px';
        };
        const unlockBody = () => {
            document.documentElement.style.overflow = 'hidden';
            document.body.style.overflow = 'hidden';
        };
        Swal.fire = function(...args) {
            lockBody();
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
                result.finally(() => unlockBody());
            }
            return result;
        };
        const observer = new MutationObserver(() => {
            if (document.body.style.paddingRight !== '0px') document.body.style.paddingRight = '0px';
        });
        observer.observe(document.body, { attributes: true });
        lockBody();
    })();
    
    // Background image
    const backgroundImageURL = "https://5.imimg.com/data5/SELLER/Default/2023/6/316157293/TP/IJ/GK/5863015/healthcare-kiosk-solutions-1000x1000.jpg";
    const card = document.getElementById('card');
    document.body.style.backgroundImage = `url('${backgroundImageURL}')`;
    if (card) card.style.backgroundImage = `url('${backgroundImageURL}')`;
    
    // ========== QR CODE SCANNER – FIXED SIZE, NO SHRINK/EXPAND ==========
    let html5QrCode = null;
    let scanningActive = false;
    const qrReaderDiv = document.getElementById('qr-reader');
    const statusSpan = document.getElementById('scanStatusMsg');
    
    // Process scanned QR and show welcome popup
    function processScannedQRCode(decodedText) {
        if (!scanningActive) return;
        scanningActive = false;
        if (html5QrCode) {
            html5QrCode.stop().catch(err => console.warn("stop error", err));
        }
        
        let patientName = "Valued Patient";
        let patientId = decodedText;
        
        // Smart parsing: support multiple QR formats
        if (decodedText.includes('::')) {
            const parts = decodedText.split('::');
            if (parts.length >= 3) {
                patientId = parts[1];
                patientName = parts[2];
            } else if (parts.length === 2) {
                patientId = parts[0];
                patientName = parts[1];
            }
        } else if (decodedText.includes('|')) {
            const parts = decodedText.split('|');
            if (parts.length >= 2) {
                patientId = parts[0];
                patientName = parts[1];
            }
        } else if (decodedText.toLowerCase().includes('id:')) {
            const idMatch = decodedText.match(/ID:\s*([A-Z0-9\-]+)/i);
            const nameMatch = decodedText.match(/Name:\s*([A-Za-z\s]+)/i);
            if (idMatch) patientId = idMatch[1];
            if (nameMatch) patientName = nameMatch[1];
        }
        
        // Show welcome message exactly as requested: "welcome Juan, id of 2026-00123-RN-0"
        const welcomeMsg = `Welcome ${patientName}, ID: ${patientId}`;
        const altMsg = `Scanned ID ${patientId}, welcome ${patientName}`;
        
        Swal.fire({
            title: '✅ Patient Verified',
            html: `<div style="font-size:1.3rem; font-weight:700; margin-bottom:12px;">${welcomeMsg}</div><div style="font-size:1rem;">${altMsg}</div>`,
            icon: 'success',
            confirmButtonText: 'Continue to Dashboard →',
            confirmButtonColor: '#0ea5e9',
            backdrop: `rgba(0,0,0,0.85)`,
            allowOutsideClick: false,
            scrollbarPadding: false,
            customClass: { popup: 'swal2-popup-fixed' }
        }).then((result) => {
            if (result.isConfirmed) {
                // Redirect to placeholder dashboard
                window.location.href = "patient-dashboard-placeholder.php";
            }
        });
        
        if(statusSpan) statusSpan.innerHTML = `<i class="fas fa-check-circle"></i> QR scanned: ${patientId.substring(0, 20)}`;
    }
    
    function startScanner() {
        if (!qrReaderDiv) return;
        if (html5QrCode) {
            html5QrCode.clear().catch(e=>console.log);
        }
        
        html5QrCode = new Html5Qrcode("qr-reader");
        // Fixed exact dimensions - no automatic resizing
        const config = {
            fps: 10,
            qrbox: { width: 280, height: 280 },
            aspectRatio: 1.0,
            showTorchButtonIfSupported: false,
            disableFlip: false,
            rememberLastUsedCamera: true,
            supportedScanTypes: 0x1 // QR code only
        };
        
        scanningActive = true;
        html5QrCode.start({ facingMode: "environment" }, config, 
            (decodedText) => {
                if (scanningActive) {
                    processScannedQRCode(decodedText);
                }
            },
            (errorMessage) => {
                // Silent scan attempts, no UI flicker
            }
        ).catch((err) => {
            console.error("Camera start error", err);
            if(statusSpan) statusSpan.innerHTML = `<i class="fas fa-exclamation-triangle"></i> Camera access error. Please check permissions.`;
            scanningActive = false;
            Swal.fire({
                title: 'Camera Required',
                text: 'Unable to access camera. Ensure permissions are granted to scan QR codes.',
                icon: 'warning',
                confirmButtonText: 'OK',
                backdrop: true
            });
        });
        
        // Force stable styling to prevent any library-induced resizing
        setTimeout(() => {
            const videoElement = document.querySelector('#qr-reader video');
            if (videoElement) {
                videoElement.style.width = '100%';
                videoElement.style.height = '100%';
                videoElement.style.objectFit = 'cover';
            }
        }, 200);
    }
    
    // Start scanner on load with small delay to ensure DOM stability
    window.addEventListener('load', () => {
        setTimeout(() => {
            startScanner();
        }, 300);
    });
    
    // ========== GO BACK BUTTON (matches reference style and behavior) ==========
    const goBackBtn = document.getElementById('goBackButton');
    if (goBackBtn) {
        const freshGoBack = goBackBtn.cloneNode(true);
        goBackBtn.parentNode.replaceChild(freshGoBack, goBackBtn);
        freshGoBack.addEventListener('click', (e) => {
            e.preventDefault();
            if (html5QrCode && scanningActive) {
                html5QrCode.stop().catch(()=>{});
                scanningActive = false;
            }
            if (window.history.length > 1) {
                window.history.back();
            } else {
                Swal.fire({
                    title: 'Navigate Back',
                    text: 'Returning to dashboard.',
                    icon: 'info',
                    timer: 1000,
                    showConfirmButton: false,
                    backdrop: true
                }).then(() => {
                    window.location.href = 'kioskdashboardpage.php';
                });
            }
        });
    }
    
    // ========== FAQ link : ensures smooth navigation and retains clean glass style ==========
    const faqLink = document.getElementById('faqSimpleLink');
    if (faqLink) {
        faqLink.addEventListener('click', (e) => {
            // Clean camera before navigating
            if (html5QrCode && scanningActive) {
                html5QrCode.stop().catch(()=>{});
                scanningActive = false;
            }
        });
    }
    
    console.log("✅ SCAN QR PAGE – Refined buttons: background rgba(0,0,0,0.3) + blur, consistent padding, no solid black background, matched exactly to kioskportalpage style. Go Back & FAQ buttons have identical sizing, border-radius, glassmorphism effect.");
</script>
</body>
</html>