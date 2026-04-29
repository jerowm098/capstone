<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <title>CareLink Express | Kiosk Appointment – Schedule Your Visit</title>
    
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
            --consult-sky: #38bdf8;
            --consult-sky-dark: #0ea5e9;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* CRITICAL: LOCK VIEWPORT — rigid, no scrollbar shifting, no overflow */
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

        /* MAIN UI CARD — fixed dimensions */
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

        /* Navbar */
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

        /* Horizontal separators */
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
            bottom: 80px;
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
            backdrop-filter: blur(8px);
            background: rgba(0, 0, 0, 0.45);
            color: white;
            border: 1.5px solid rgba(255, 255, 255, 0.7);
            min-width: 180px;
            white-space: nowrap;
        }

        /* Hero text - COMPACT (reduced top position) */
        .appointment-hero {
            position: absolute;
            left: 50%;
            transform: translateX(-50%);
            top: 140px;
            width: auto;
            max-width: 900px;
            z-index: 10;
            text-align: center;
            background: transparent;
        }

        .appointment-hero h1 { 
            font-size: 3rem; 
            font-weight: 800; 
            color: #ffffff; 
            line-height: 1.1; 
            margin-bottom: 6px;
            text-shadow: 0 2px 15px rgba(0,0,0,0.6);
        }
        
        .appointment-hero p { 
            font-size: 1.25rem; 
            color: rgba(255,255,255,0.96); 
            margin-bottom: 0;
            text-shadow: 0 1px 8px rgba(0,0,0,0.5);
            font-weight: 500;
        }

        /* CONTENT WRAPPER — COMPACT, maximizes space but prevents overflow */
        .step-content-wrapper {
            position: absolute;
            top: 215px;
            bottom: 115px;
            left: 100px;
            right: 100px;
            z-index: 12;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: flex-start;
            overflow-y: auto;
            overflow-x: hidden;
            scrollbar-width: thin;
            padding: 8px 8px 12px 8px;
        }
        
        .step-content-wrapper::-webkit-scrollbar {
            width: 4px;
        }
        .step-content-wrapper::-webkit-scrollbar-track {
            background: rgba(0,0,0,0.2);
            border-radius: 10px;
        }
        .step-content-wrapper::-webkit-scrollbar-thumb {
            background: #38bdf8;
            border-radius: 10px;
        }

        /* Step card - COMPACT padding and sizes */
        .step-card {
            width: 100%;
            max-width: 760px;
            background: rgba(20, 30, 45, 0.8);
            backdrop-filter: blur(14px);
            border-radius: 28px;
            padding: 20px 24px;
            border: 1px solid rgba(255,255,255,0.35);
            box-shadow: 0 15px 30px -10px rgba(0, 0, 0, 0.5);
            color: white;
        }

        .step-title {
            font-size: 1.4rem;
            font-weight: 700;
            margin-bottom: 1rem;
            border-left: 4px solid #38bdf8;
            padding-left: 14px;
        }

        /* Step indicator badges - smaller */
        .step-indicator {
            display: flex;
            justify-content: center;
            gap: 10px;
            margin-bottom: 18px;
        }
        .step-badge {
            background: rgba(255,255,255,0.2);
            padding: 4px 14px;
            border-radius: 40px;
            font-size: 0.7rem;
            font-weight: 600;
            backdrop-filter: blur(4px);
        }
        .step-badge.active {
            background: #38bdf8;
            color: #0f172a;
        }

        /* Date grid - more compact */
        .dates-grid {
            display: grid;
            grid-template-columns: repeat(7, 1fr);
            gap: 8px;
            margin: 16px 0 12px;
        }
        .date-btn {
            background: rgba(255,255,255,0.12);
            border: 1px solid rgba(255,255,255,0.4);
            border-radius: 40px;
            padding: 8px 0;
            font-weight: 600;
            font-size: 0.85rem;
            text-align: center;
            cursor: pointer;
            color: white;
            transition: 0.15s;
        }
        .date-btn.selected {
            background: #38bdf8;
            border-color: white;
            color: #111;
        }
        .date-btn:hover:not(.selected) {
            background: rgba(56,189,248,0.6);
        }

        /* Time slots - compact chips */
        .times-grid {
            display: flex;
            flex-wrap: wrap;
            gap: 12px;
            margin: 16px 0;
            justify-content: center;
        }
        .time-slot-card {
            background: rgba(255,255,255,0.12);
            border: 1px solid rgba(255,255,255,0.5);
            border-radius: 40px;
            padding: 8px 24px;
            font-weight: 600;
            font-size: 0.9rem;
            cursor: pointer;
            color: white;
            min-width: 110px;
            text-align: center;
        }
        .time-slot-card.selected {
            background: #38bdf8;
            color: #0a0a0a;
            border-color: white;
        }

        /* Reasons and personnel grids - compact */
        .reasons-grid, .personnel-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 12px;
            margin: 16px 0;
        }
        .reason-card, .personnel-card {
            background: rgba(255,255,255,0.12);
            border: 1px solid rgba(255,255,255,0.45);
            border-radius: 40px;
            padding: 10px 8px;
            text-align: center;
            font-weight: 500;
            font-size: 0.85rem;
            cursor: pointer;
            transition: 0.15s;
        }
        .reason-card.selected, .personnel-card.selected {
            background: #38bdf8;
            color: #0c0c1f;
            border-color: white;
        }

        /* Buttons - compact but prominent */
        .proceed-btn, .confirm-btn {
            background: #38bdf8;
            border: none;
            padding: 10px 20px;
            border-radius: 50px;
            font-weight: 700;
            font-size: 1rem;
            color: #11212e;
            transition: 0.15s;
            margin-top: 16px;
            width: 100%;
        }
        .proceed-btn:hover, .confirm-btn:hover {
            background: #0ea5e9;
            color: white;
        }

        .action-row {
            display: flex;
            gap: 14px;
            margin-top: 16px;
        }
        .action-row .proceed-btn {
            margin-top: 0;
            flex: 1;
        }
        .back-btn {
            background: #475569;
        }
        .back-btn:hover {
            background: #334155;
        }

        /* Month text */
        .month-label {
            font-size: 1rem;
            font-weight: 600;
            margin-bottom: 8px;
            text-align: center;
            letter-spacing: 0.5px;
        }

        /* GO BACK & FAQ - consistent */
        .go-back-wrapper {
            position: absolute;
            bottom: 24px;
            left: 130px;
            z-index: 15;
        }
        .go-back-btn {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            backdrop-filter: blur(4px);
            padding: 6px 22px;
            border-radius: 60px;
            font-size: 0.85rem;
            font-weight: 600;
            color: #f1f5f9;
            text-decoration: none;
            border: 1px solid rgba(255,255,255,0.35);
            cursor: pointer;
        }
        .faq-link-wrapper {
            position: absolute;
            bottom: 24px;
            right: 130px;
            z-index: 15;
        }
        .faq-simple-link {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            backdrop-filter: blur(4px);
            padding: 6px 22px;
            border-radius: 60px;
            font-size: 0.85rem;
            font-weight: 500;
            color: #e2e8f0;
            text-decoration: none;
            border: 1px solid rgba(255,255,255,0.25);
        }
        .faq-simple-link:hover, .go-back-btn:hover {
            background: rgba(0, 0, 0, 0.65);
            color: white;
        }

        /* Responsive adjustments */
        @media (max-width: 1200px) {
            .portal-card { width: 95%; height: 90vh; }
            .navbar-custom, .logo-separator-wrapper, .bottom-separator-wrapper { left: 50px; right: 50px; }
            .step-content-wrapper { left: 50px; right: 50px; top: 215px; }
            .go-back-wrapper { left: 80px; }
            .faq-link-wrapper { right: 80px; }
        }
        @media (max-width: 850px) {
            .step-card { padding: 16px 18px; max-width: 90%; }
            .dates-grid { gap: 6px; }
            .date-btn { padding: 6px 0; font-size: 0.75rem; }
            .times-grid { gap: 10px; }
            .time-slot-card { padding: 6px 16px; min-width: 90px; font-size: 0.8rem; }
            .reasons-grid, .personnel-grid { grid-template-columns: 1fr; gap: 8px; }
            .appointment-hero h1 { font-size: 2.4rem; }
            .appointment-hero p { font-size: 1rem; }
        }
        @media (max-width: 650px) {
            .step-content-wrapper { top: 210px; bottom: 105px; }
            .appointment-hero { top: 125px; }
        }
    </style>
</head>
<body>

<div class="portal-card" id="card">
    <div class="card-overlay"></div>
    
    <nav class="navbar-custom">
        <div class="logo-area">
            <img src="../../assets/cliniclogohalf.png" alt="PUP Logo" onerror="this.src='https://placehold.co/60x45/9C0C20/white?text=PUP'">
            <span>PUPBC CareLink</span>
        </div>
        <div class="login-area">
            <div class="time-container-permanent" id="liveClockDisplay">
                <i class="bi bi-clock me-2" style="font-size: 0.9rem;"></i>
                <span id="clockTimeText">--:--:-- --</span>
            </div>
        </div>
    </nav>
    
    <div class="logo-separator-wrapper"><div class="brand-separator"></div></div>
    <div class="bottom-separator-wrapper"><div class="brand-separator"></div></div>

    <div class="appointment-hero">
        <h1>Clinic Appointment</h1>
        <p>Make an appointment</p>
    </div>

    <div class="step-content-wrapper" id="stepContainer"></div>
    
    <div class="go-back-wrapper">
        <a href="#" class="go-back-btn" id="goBackButton"><i class="fas fa-arrow-left"></i> Go Back</a>
    </div>
    <div class="faq-link-wrapper">
        <a href="faq.php" class="faq-simple-link" id="faqSimpleLink"><i class="fas fa-question-circle"></i> Need more help? <strong>FAQs</strong></a>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    // LIVE CLOCK
    function updateLiveClock() {
        const clockSpan = document.getElementById('clockTimeText');
        if (!clockSpan) return;
        const now = new Date();
        let hours = now.getHours();
        const minutes = now.getMinutes();
        const seconds = now.getSeconds();
        const ampm = hours >= 12 ? 'PM' : 'AM';
        hours = hours % 12 || 12;
        clockSpan.innerText = `${hours.toString().padStart(2,'0')}:${minutes.toString().padStart(2,'0')}:${seconds.toString().padStart(2,'0')} ${ampm}`;
    }
    updateLiveClock();
    setInterval(updateLiveClock, 1000);
    
    // Background image
    const bgURL = "https://5.imimg.com/data5/SELLER/Default/2023/6/316157293/TP/IJ/GK/5863015/healthcare-kiosk-solutions-1000x1000.jpg";
    document.body.style.backgroundImage = `url('${bgURL}')`;
    const cardEl = document.getElementById('card');
    if (cardEl) cardEl.style.backgroundImage = `url('${bgURL}')`;
    
    // Lock layout shift for modals
    (function lockBody() {
        const origSwal = Swal.fire;
        Swal.fire = function(...args) {
            document.documentElement.style.overflow = 'hidden';
            document.body.style.overflow = 'hidden';
            let cfg = args[0] || {};
            if (typeof cfg === 'object') { cfg.scrollbarPadding = false; cfg.heightAuto = false; }
            else { args[0] = { ...(args[0] || {}), scrollbarPadding: false, heightAuto: false }; }
            const res = origSwal.apply(this, args);
            if (res && res.finally) res.finally(() => { document.documentElement.style.overflow = 'hidden'; });
            return res;
        };
        document.documentElement.style.overflow = 'hidden';
        document.body.style.overflow = 'hidden';
    })();
    
    // Appointment state
    let currentStep = 1;
    let appointmentData = {
        selectedDate: null,
        selectedTimeSlot: null,
        selectedReason: null,
        selectedPersonnel: null
    };
    
    const stepContainer = document.getElementById('stepContainer');
    
    function getMonthYear() {
        const d = new Date();
        return d.toLocaleString('default', { month: 'long', year: 'numeric' });
    }
    
    function getDaysInCurrentMonth() {
        return new Date(new Date().getFullYear(), new Date().getMonth() + 1, 0).getDate();
    }
    
    function renderStep() {
        if (!stepContainer) return;
        
        if (currentStep === 1) {
            const daysCount = getDaysInCurrentMonth();
            let datesHtml = '';
            for (let i = 1; i <= daysCount; i++) {
                const selectedClass = (appointmentData.selectedDate === i) ? 'selected' : '';
                datesHtml += `<div class="date-btn ${selectedClass}" data-date="${i}">${i}</div>`;
            }
            stepContainer.innerHTML = `
                <div class="step-card">
                    <div class="step-indicator">
                        <span class="step-badge active">1. Date</span>
                        <span class="step-badge">2. Time</span>
                        <span class="step-badge">3. Reason</span>
                        <span class="step-badge">4. Personnel</span>
                    </div>
                    <div class="step-title">📅 Select Date</div>
                    <div class="month-label">${getMonthYear()}</div>
                    <div class="dates-grid" id="datesGrid">${datesHtml}</div>
                    <button class="proceed-btn" id="proceedStep1">Proceed →</button>
                </div>
            `;
            document.querySelectorAll('.date-btn').forEach(btn => {
                btn.addEventListener('click', () => {
                    document.querySelectorAll('.date-btn').forEach(b => b.classList.remove('selected'));
                    btn.classList.add('selected');
                    appointmentData.selectedDate = parseInt(btn.getAttribute('data-date'));
                });
            });
            document.getElementById('proceedStep1')?.addEventListener('click', () => {
                if (!appointmentData.selectedDate) {
                    Swal.fire({ title: 'Select Date', text: 'Please choose a date.', icon: 'warning', confirmButtonColor: '#38bdf8' });
                    return;
                }
                currentStep = 2;
                renderStep();
            });
        } 
        else if (currentStep === 2) {
            const slots = ['9:00 AM', '10:00 AM', '11:00 AM', '1:00 PM', '2:00 PM', '3:00 PM', '4:00 PM'];
            let slotsHtml = '';
            slots.forEach(slot => {
                const selectedClass = (appointmentData.selectedTimeSlot === slot) ? 'selected' : '';
                slotsHtml += `<div class="time-slot-card ${selectedClass}" data-time="${slot}">${slot}</div>`;
            });
            stepContainer.innerHTML = `
                <div class="step-card">
                    <div class="step-indicator">
                        <span class="step-badge">1. Date</span>
                        <span class="step-badge active">2. Time Slot</span>
                        <span class="step-badge">3. Reason</span>
                        <span class="step-badge">4. Personnel</span>
                    </div>
                    <div class="step-title">⏰ Choose Time</div>
                    <div class="times-grid" id="timesGrid">${slotsHtml}</div>
                    <div class="action-row">
                        <button class="proceed-btn back-btn" id="backStep2">← Back</button>
                        <button class="proceed-btn" id="proceedStep2">Next →</button>
                    </div>
                </div>
            `;
            document.querySelectorAll('.time-slot-card').forEach(btn => {
                btn.addEventListener('click', () => {
                    document.querySelectorAll('.time-slot-card').forEach(b => b.classList.remove('selected'));
                    btn.classList.add('selected');
                    appointmentData.selectedTimeSlot = btn.getAttribute('data-time');
                });
            });
            document.getElementById('backStep2')?.addEventListener('click', () => { currentStep = 1; renderStep(); });
            document.getElementById('proceedStep2')?.addEventListener('click', () => {
                if (!appointmentData.selectedTimeSlot) {
                    Swal.fire({ title: 'Select Time', text: 'Please pick a time slot.', icon: 'warning' });
                    return;
                }
                currentStep = 3;
                renderStep();
            });
        }
        else if (currentStep === 3) {
            const reasons = ['Check-up', 'Medical Clearance', 'Follow-up', 'Lab Results', 'Vaccination', 'Others'];
            let reasonsHtml = '';
            reasons.forEach(r => {
                const selectedClass = (appointmentData.selectedReason === r) ? 'selected' : '';
                reasonsHtml += `<div class="reason-card ${selectedClass}" data-reason="${r}">${r}</div>`;
            });
            stepContainer.innerHTML = `
                <div class="step-card">
                    <div class="step-indicator">
                        <span class="step-badge">1. Date</span>
                        <span class="step-badge">2. Time</span>
                        <span class="step-badge active">3. Purpose</span>
                        <span class="step-badge">4. Personnel</span>
                    </div>
                    <div class="step-title">📋 Reason for visit</div>
                    <div class="reasons-grid" id="reasonsGrid">${reasonsHtml}</div>
                    <div class="action-row">
                        <button class="proceed-btn back-btn" id="backStep3">← Back</button>
                        <button class="proceed-btn" id="proceedStep3">Next →</button>
                    </div>
                </div>
            `;
            document.querySelectorAll('.reason-card').forEach(card => {
                card.addEventListener('click', () => {
                    document.querySelectorAll('.reason-card').forEach(c => c.classList.remove('selected'));
                    card.classList.add('selected');
                    appointmentData.selectedReason = card.getAttribute('data-reason');
                });
            });
            document.getElementById('backStep3')?.addEventListener('click', () => { currentStep = 2; renderStep(); });
            document.getElementById('proceedStep3')?.addEventListener('click', () => {
                if (!appointmentData.selectedReason) {
                    Swal.fire({ title: 'Select Reason', text: 'Please choose a reason for visit.', icon: 'warning' });
                    return;
                }
                currentStep = 4;
                renderStep();
            });
        }
        else if (currentStep === 4) {
            const personnelList = ['Nurse Maria Santos', 'Nurse James Cruz', 'Dr. Anna Reyes', 'Health Assoc. Kim'];
            let personnelHtml = '';
            personnelList.forEach(p => {
                const selectedClass = (appointmentData.selectedPersonnel === p) ? 'selected' : '';
                personnelHtml += `<div class="personnel-card ${selectedClass}" data-person="${p}">${p}</div>`;
            });
            stepContainer.innerHTML = `
                <div class="step-card">
                    <div class="step-indicator">
                        <span class="step-badge">1. Date</span>
                        <span class="step-badge">2. Time</span>
                        <span class="step-badge">3. Reason</span>
                        <span class="step-badge active">4. Personnel</span>
                    </div>
                    <div class="step-title">👩‍⚕️ Assigned Personnel</div>
                    <div class="personnel-grid" id="personnelGrid">${personnelHtml}</div>
                    <div class="action-row">
                        <button class="proceed-btn back-btn" id="backStep4">← Back</button>
                        <button class="confirm-btn" id="confirmAppointmentBtn">✅ Confirm</button>
                    </div>
                </div>
            `;
            document.querySelectorAll('.personnel-card').forEach(card => {
                card.addEventListener('click', () => {
                    document.querySelectorAll('.personnel-card').forEach(c => c.classList.remove('selected'));
                    card.classList.add('selected');
                    appointmentData.selectedPersonnel = card.getAttribute('data-person');
                });
            });
            document.getElementById('backStep4')?.addEventListener('click', () => { currentStep = 3; renderStep(); });
            document.getElementById('confirmAppointmentBtn')?.addEventListener('click', () => {
                if (!appointmentData.selectedPersonnel) {
                    Swal.fire({ title: 'Select Personnel', text: 'Please choose a staff member.', icon: 'warning' });
                    return;
                }
                Swal.fire({
                    title: 'Appointment Confirmed!',
                    html: `<strong>Date:</strong> ${appointmentData.selectedDate}<br>
                           <strong>Time:</strong> ${appointmentData.selectedTimeSlot}<br>
                           <strong>Reason:</strong> ${appointmentData.selectedReason}<br>
                           <strong>Personnel:</strong> ${appointmentData.selectedPersonnel}<br><br>
                           Your appointment is scheduled.`,
                    icon: 'success',
                    confirmButtonText: 'Done',
                    confirmButtonColor: '#38bdf8'
                }).then(() => {
                    // Reset after confirmation
                    appointmentData = { selectedDate: null, selectedTimeSlot: null, selectedReason: null, selectedPersonnel: null };
                    currentStep = 1;
                    renderStep();
                });
            });
        }
    }
    
    renderStep();
    
    // Go Back handler
    const goBackBtn = document.getElementById('goBackButton');
    if (goBackBtn) {
        const newGoBack = goBackBtn.cloneNode(true);
        goBackBtn.parentNode.replaceChild(newGoBack, goBackBtn);
        newGoBack.addEventListener('click', (e) => {
            e.preventDefault();
            if (currentStep > 1) {
                currentStep--;
                renderStep();
            } else {
                if (window.history.length > 1) window.history.back();
                else Swal.fire({ title: 'Info', text: 'No previous page.', icon: 'info', timer: 1200 });
            }
        });
    }
    
    // FAQ link handler
    const faqLink = document.getElementById('faqSimpleLink');
    if (faqLink) faqLink.addEventListener('click', (e) => { console.log('FAQ clicked from appointment'); });
    
    console.log("✅ Kiosk appointment – COMPACT version, step forms perfectly fitted, no overflow, balanced margins.");
</script>
</body>
</html>