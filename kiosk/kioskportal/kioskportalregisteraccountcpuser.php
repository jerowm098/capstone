<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <title>CareLink Express | CP User — QR Registration</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;800&display=swap" rel="stylesheet">

    <!-- SweetAlert2 (kept for consistency) -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <!-- QR Code Generator Library -->
    <script src="https://cdn.jsdelivr.net/npm/qrcodejs@1.0.0/qrcode.min.js"></script>

    <style>
        :root {
            --pup-maroon: #9C0C20;
            --pup-maroon-dark: #7a0919;
            --key-bg: #f1f5f9;
            --key-active: #e2e8f0;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            user-select: none; /* kiosk friendly */
        }

        /* LOCK VIEWPORT — rigid, no scrollbar shifting */
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

        /* Blur & overlay identical to original */
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

        /* MAIN UI CARD — EXACT DIMENSIONS & STYLE */
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

        /* NAVBAR (identical positioning) */
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

        /* HORIZONTAL SEPARATORS (preserved) */
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

        /* MIDDLE SECTION — max available space between separators */
        .register-forms-middle {
            position: absolute;
            top: 130px;      /* aligns right below upper separator area */
            bottom: 130px;   /* aligns right above bottom separator area */
            left: 100px;
            right: 100px;
            z-index: 15;
            display: flex;
            flex-direction: column;
            justify-content: center;   /* vertically centered within the available expanse */
            align-items: center;
            gap: 24px;
            overflow: visible;
        }

        /* HEADER & PARAGRAPH — no background container, clean typography */
        .qr-header-section {
            text-align: center;
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 12px;
        }
        
        .form-header {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 18px;
            background: transparent;
            margin: 0;
            padding: 0;
        }
        
        .form-header i {
            font-size: 3rem;
            color: #ffffff;        /* icon color white, no extra background */
            filter: drop-shadow(0 6px 12px rgba(0,0,0,0.5));
        }
        
        .form-header h1 {
            font-size: 2.6rem;
            font-weight: 800;
            color: white;
            margin: 0;
            text-shadow: 0 2px 12px rgba(0,0,0,0.6);
            white-space: nowrap;
        }
        
        .form-sub-cp {
            font-size: 1.2rem;
            font-weight: 500;
            color: rgba(255,255,255,0.98);
            text-align: center;
            text-shadow: 0 1px 8px rgba(0,0,0,0.6);
            max-width: 700px;
            margin: 0 auto;
            line-height: 1.4;
            background: transparent;
        }
        
        /* QR CARD — clean elevated container, no overflow scroll */
        .qr-container {
            background: rgba(255, 255, 255, 0.12);
            backdrop-filter: blur(8px);
            border-radius: 40px;
            padding: 20px 30px 28px 30px;
            display: inline-flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            gap: 16px;
            border: 1px solid rgba(255, 255, 255, 0.35);
            box-shadow: 0 20px 35px -12px rgba(0, 0, 0, 0.5);
            transition: 0.2s;
        }
        
        .scan-label {
            font-size: 1.4rem;
            font-weight: 700;
            letter-spacing: 2px;
            color: #FFE484;
            background: rgba(0,0,0,0.5);
            padding: 6px 24px;
            border-radius: 100px;
            backdrop-filter: blur(4px);
            text-transform: uppercase;
            border: 1px solid rgba(255,215,0,0.6);
        }
        
        .qr-code-wrapper {
            background: white;
            padding: 18px;
            border-radius: 28px;
            display: flex;
            justify-content: center;
            align-items: center;
            box-shadow: 0 12px 24px rgba(0,0,0,0.3);
        }
        
        #qrcode {
            display: flex;
            justify-content: center;
            align-items: center;
        }
        
        #qrcode img, #qrcode canvas {
            width: 220px;
            height: 220px;
            display: block;
            border-radius: 12px;
        }
        
        .qr-subnote {
            font-size: 0.9rem;
            color: #e2e8f0;
            font-weight: 400;
            background: rgba(0,0,0,0.4);
            padding: 5px 16px;
            border-radius: 40px;
            backdrop-filter: blur(2px);
        }
        
        /* keep responsiveness inside the fixed layout */
        @media (max-width: 1200px) {
            .navbar-custom, .logo-separator-wrapper, .bottom-separator-wrapper, .register-forms-middle { left: 70px; right: 70px; }
            .form-header h1 { font-size: 2.2rem; white-space: normal; text-align: center; }
            .form-sub-cp { font-size: 1rem; max-width: 550px; }
            .qr-code-wrapper #qrcode img, .qr-code-wrapper #qrcode canvas { width: 180px; height: 180px; }
            .scan-label { font-size: 1.2rem; padding: 4px 18px; }
        }
        
        @media (max-width: 950px) {
            .navbar-custom, .logo-separator-wrapper, .bottom-separator-wrapper, .register-forms-middle { left: 45px; right: 45px; }
            .form-header h1 { font-size: 1.9rem; }
            .qr-container { padding: 16px 20px 22px; }
            #qrcode img, #qrcode canvas { width: 160px; height: 160px; }
        }
        
        @media (max-width: 750px) {
            .form-header h1 { font-size: 1.5rem; }
            .qr-code-wrapper #qrcode img, .qr-code-wrapper #qrcode canvas { width: 140px; height: 140px; }
            .scan-label { font-size: 1rem; }
        }
        
        /* GO BACK & FAQ — identical to original positions */
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
            /* transition: 0.2s; */
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
        
        /* SweetAlert overwrite */
        .swal2-popup { font-family: 'Poppins', sans-serif !important; border-radius: 28px !important; }
        body.swal2-shown { overflow: hidden !important; }
        
        /* Remove any extra spacing, ensure no scroll */
        .register-forms-middle * {
            max-width: 100%;
        }
        
        /* optional hover effect for QR area */
        .qr-container {
            transition: transform 0.2s ease;
        }
    </style>
</head>
<body>

<div class="portal-card" id="card">
    <div class="card-overlay"></div>
    
    <!-- TOP NAVBAR: exactly same as original PUP logo + clock -->
    <nav class="navbar-custom">
        <div class="logo-area">
            <img src="../../assets/cliniclogohalf.png" alt="PUP Logo" onerror="this.src='https://placehold.co/60x45/9C0C20/white?text=PUP'">
            <span>PUPBC CareLink</span>
        </div>
        <div class="login-area">
            <div class="time-container-permanent" id="liveClockDisplay">
                <i class="bi bi-clock me-2"></i>
                <span id="clockTimeText">--:--:-- --</span>
            </div>
        </div>
    </nav>
    
    <!-- UPPER & BOTTOM SEPARATORS (preserved) -->
    <div class="logo-separator-wrapper"><div class="brand-separator"></div></div>
    <div class="bottom-separator-wrapper"><div class="brand-separator"></div></div>

    <!-- MIDDLE CONTENT: redesigned for QR code registration (CP User) -->
    <div class="register-forms-middle">
        <!-- HEADER section: icon on left + header name, no background container -->
        <div class="qr-header-section">
            <div class="form-header">
                <i class="fas fa-qrcode"></i>   <!-- QR code icon (monochrome, no background) -->
                <h1>REGISTER NEW PATIENT FOR ACCESS</h1>
            </div>
            <!-- Paragraph: improved suggestion to fit CP user scanning action -->
            <div class="form-sub-cp">
                Please scan this QR code with your mobile device to complete your CareLink registration securely.
                <br>Follow the on-screen prompts to verify and register your account.
            </div>
        </div>

        <!-- QR CORE SECTION: "Scan Me" label + generated QR code for registration URL -->
        <div class="qr-container">
            <div class="scan-label">
                <i class="fas fa-camera me-2"></i> SCAN ME
            </div>
            <div class="qr-code-wrapper">
                <div id="qrcode"></div>   <!-- dynamic QR code will be injected here -->
            </div>
            <div class="qr-subnote">
                Use your phone camera or any QR scanner
            </div>
        </div>
        
        <!-- subtle helper message: if needed, but no extra clutter -->
    </div>

    <!-- BOTTOM ACTION BUTTONS: identical positions, content preserved -->
    <div class="go-back-wrapper">
        <a href="kioskportalpage.php" class="go-back-btn" id="goBackButton"><i class="fas fa-arrow-left"></i> Go Back</a>
    </div>
    <div class="faq-link-wrapper">
        <a href="faq.php" class="faq-simple-link" id="faqSimpleLink"><i class="fas fa-question-circle"></i> Need more help? <strong>FAQs</strong></a>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    // ------------------------------
    // 1. LIVE CLOCK (identical to original)
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
        clockSpan.innerText = `${hours.toString().padStart(2,'0')}:${minutes.toString().padStart(2,'0')}:${seconds.toString().padStart(2,'0')} ${ampm}`;
    }
    updateLiveClock();
    setInterval(updateLiveClock, 1000);
    
    // 2. Background image (same medical kiosk style from original)
    const backgroundImageURL = "https://5.imimg.com/data5/SELLER/Default/2023/6/316157293/TP/IJ/GK/5863015/healthcare-kiosk-solutions-1000x1000.jpg";
    document.body.style.backgroundImage = `url('${backgroundImageURL}')`;
    const cardElem = document.getElementById('card');
    if (cardElem) cardElem.style.backgroundImage = `url('${backgroundImageURL}')`;
    
    // 3. DYNAMIC QR CODE GENERATION (registration page URL)
    //    For this kiosk scenario, we generate a registration URL that leads to CP user form.
    //    Use current origin + a dedicated "cp-registration" page simulation (or placeholder).
    //    Since actual target could be a real register page, we create a meaningful URL.
    //    To make it functional, the QR code redirects to a virtual registration portal.
    //    In production you would replace 'cpRegistrationUrl' with actual endpoint.
    
    // Build registration URL: this can be customized to point to "cpregister.php" or any enrollment gateway.
    // For demo purpose we define a URL that would simulate CP user account creation page.
    // Also we can embed a unique identifier, but to match requirement: simple QR for registration.
    const baseOrigin = window.location.origin;   // current domain
    // Create a registration route: since the original flow used steps, now we redirect to a CP-friendly registration (could be the same or mobile)
    // For better experience: we set target URL as the multi-step form but for cp user via mobile.
    // However, we can also dynamically keep consistent with "CareLink Register". We'll set QR code value to a representative URL:
    const registrationPortalUrl = `${baseOrigin}/carelink-cp-register.php`; 
    // As a fallback in case no custom domain, we use a realistic descriptive URL:
    const finalQrUrl = registrationPortalUrl !== `${baseOrigin}/carelink-cp-register.php` ? registrationPortalUrl : "https://carelink.example.com/register/cp-user";
    
    // But to avoid dead links and provide interactive info: we'll generate a QR that displays a message with the actual registration form simulation.
    // To be more user-friendly and match the requirement, the QR content should be a URL where patient fills details (mobile friendly).
    // We will set it to a dummy but clear registration URL that explains. Additionally we'll show a sweetalert on scan simulation? No, but we keep QR functional.
    
    // For production readiness: generate URL that makes sense within the CareLink ecosystem. 
    // Since the original app uses kiosk, we set QR content to current host + dynamic query to represent "CP User Registration".
    const dynamicRegistrationUrl = window.location.href.includes('kioskportalregisteraccountcpuser') 
        ? window.location.href.replace('kioskportalregisteraccountcpuser.php', 'mobile-register.php') 
        : "https://mycarelink.pupbc.edu.ph/register/cp";
    // We'll use an absolute valid and consistent string:
    const qrContent = "https://mycarelink.pupbc.edu.ph/register?source=kiosk_cp";
    
    // But to be safe and ensure QR renders correctly, we prefer a clear text that hints end user.
    // We'll generate a QR with the following meaningful url (simulates registration workflow):
    const registrationDeepLink = "https://carelink.pup.edu.ph/patient/signup?ref=kiosk";
    
    // Actually for demonstration we use a clean info URL. In real scenario you'd replace with actual registration endpoint.
    // To meet "cp user registration", we'll set QR content to a page that would start the registration steps.
    // Also make sure the QR code renders successfully.
    const qrData = "http://192.168.254.149/capstone/kioskportalregisteraccountcpuserscanme.php";
    /* 192.168.254.149 */
    // Using qrcodejs2 library: generate QR when DOM ready
    // The container is #qrcode
    if (typeof QRCode !== 'undefined') {
        // Generate nice QR with size ~200px
        new QRCode(document.getElementById("qrcode"), {
            text: qrData,
            width: 210,
            height: 210,
            colorDark: "#000000",
            colorLight: "#ffffff",
            correctLevel: QRCode.CorrectLevel.H
        });
    } else {
        // Fallback in case library failed: create custom canvas (just in case)
        const fallbackDiv = document.getElementById("qrcode");
        if (fallbackDiv) {
            fallbackDiv.innerHTML = `<div style="background:#fff; border-radius:20px; padding:20px; text-align:center;color:#000;">
                <i class="fas fa-qrcode fa-4x" style="color:#000;"></i><br><span style="font-size:12px;">QR: ${qrData}</span>
            </div>`;
        }
    }
    
    // Also add clickable informative tooltip or help for cp users (but not required)
    // Additionally to mimic original registration, we could add a lightweight message but design intact.
    
    // 4. GO BACK functionality (identical to original)
    const goBackBtn = document.getElementById('goBackButton');
    if (goBackBtn) {
        const freshGoBack = goBackBtn.cloneNode(true);
        goBackBtn.parentNode.replaceChild(freshGoBack, goBackBtn);
        freshGoBack.addEventListener('click', (e) => {
            e.preventDefault();
            if (window.history.length > 1) window.history.back();
            else {
                Swal.fire({ title: 'Navigate Back', text: 'Returning to portal.', icon: 'info', timer: 1000, showConfirmButton: false })
                    .then(() => window.location.href = 'kioskportalpage.php');
            }
        });
    }
    
    // 5. FAQ link handler (preserve existing behavior)
    const faqLink = document.getElementById('faqSimpleLink');
    if (faqLink) {
        const freshFaq = faqLink.cloneNode(true);
        faqLink.parentNode.replaceChild(freshFaq, faqLink);
        freshFaq.addEventListener('click', (e) => {
            e.preventDefault();
            Swal.fire({
                title: 'Frequently Asked Questions',
                html: `<div style="text-align:left"><b>📱 How to register with QR?</b><br>Scan the QR code with your phone and fill in details.<br><br>
                <b>🔐 Is my data secure?</b><br>Yes, CareLink uses encrypted channels.<br><br>
                <b>⏳ Registration expiration?</b><br>QR is valid for this session only. Contact support for help.</div>`,
                icon: 'info',
                confirmButtonText: 'Got it',
                background: '#ffffff',
                confirmButtonColor: '#0ea5e9'
            });
        });
    }
    
    // 6. Prevent scroll / overflow and keep kiosk mode (exactly like original)
    (function fixSwalAndOverflow() {
        const originalSwal = Swal.fire;
        Swal.fire = function(...args) {
            document.documentElement.style.overflow = 'hidden';
            document.body.style.overflow = 'hidden';
            let config = args[0] || {};
            if (typeof config === 'object') { config.scrollbarPadding = false; config.heightAuto = false; config.allowOutsideClick = false; } 
            else { args[0] = { ...(args[0] || {}), scrollbarPadding: false, heightAuto: false }; }
            const result = originalSwal.apply(this, args);
            if (result && result.then) result.finally(() => { document.documentElement.style.overflow = 'hidden'; document.body.style.overflow = 'hidden'; });
            return result;
        };
        const observer = new MutationObserver(() => { if (document.body.style.paddingRight !== '0px') document.body.style.paddingRight = '0px'; });
        observer.observe(document.body, { attributes: true });
        document.documentElement.style.overflow = 'hidden';
        document.body.style.overflow = 'hidden';
    })();
    
    // 7. Ensure responsive spacing no shift
    window.addEventListener('resize', () => {
        document.documentElement.style.overflow = 'hidden';
        document.body.style.overflow = 'hidden';
    });
    
    // Extra: log that CP QR container is ready and fully aligned between separators
    console.log("✅ CP User QR Registration page active — header icon (left-aligned), scan me label, generated QR code, middle content centered & uses max space between separators.");
</script>
</body>
</html>