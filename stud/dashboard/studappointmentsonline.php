<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="0">
    <title>Make an Online Appointment | PUPBC CareLink</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- QR Code Library -->
    <script src="https://cdn.jsdelivr.net/npm/qrcodejs@1.0.0/qrcode.min.js"></script>

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
            --danger-red: #dc3545;
            --warning-yellow: #ffc107;
            --triage-green-bg: #d4edda;
            --triage-green-text: #155724;
            --triage-yellow-bg: #fff3cd;
            --triage-yellow-text: #856404;
            --triage-red-bg: #f8d7da;
            --triage-red-text: #721c24;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: transparent;
            color: var(--text-main);
            margin: 0;
            padding: 0;
        }

        /* TOAST NOTIFICATION (upper-right corner, same style as cancel module) */
        .toast-notification {
            position: fixed;
            top: 20px;
            right: 20px;
            z-index: 9999;
            min-width: 320px;
            max-width: 420px;
            opacity: 0;
            visibility: hidden;
            transition: opacity 0.3s ease, visibility 0.3s ease;
        }
        .toast-notification.show {
            opacity: 1;
            visibility: visible;
        }
        .toast-notification .toast-custom {
            background: white;
            border-radius: 12px;
            box-shadow: 0 8px 24px rgba(0,0,0,0.15);
           /*  border-left: 4px solid var(--success-green); */
            overflow: hidden;
        }
        .toast-notification .toast-custom.warning-toast {
            border-left-color: var(--cancel-orange, #e67e22);
        }
        .toast-notification .toast-body-custom {
            padding: 14px 18px;
            display: flex;
            align-items: center;
            gap: 12px;
            font-size: 0.85rem;
            font-weight: 500;
            color: var(--text-main);
        }
        .toast-notification .toast-body-custom i {
            font-size: 1.3rem;
        }
        .toast-notification .toast-body-custom .success-icon {
            color: var(--success-green);
        }
        .toast-notification .toast-body-custom .warning-icon {
            color: var(--cancel-orange, #e67e22);
        }
        .toast-close-btn {
            margin-left: auto;
            background: none;
            border: none;
            font-size: 1rem;
            cursor: pointer;
            color: var(--text-muted);
            transition: 0.2s;
        }
        .toast-close-btn:hover {
            color: var(--text-main);
        }

        .appointments-wrapper {
            width: 100%;
            background: transparent;
        }

        .form-content {
            padding: var(--standard-padding);
        }

        /* Header Title */
        .form-header {
            margin-bottom: 1.8rem;
            border-bottom: var(--border-subtle);
            padding-bottom: 0.75rem;
        }
        .form-header h2 {
            font-size: 1.6rem;
            font-weight: 600;
            color: var(--brand-primary);
            margin: 0;
            display: flex;
            align-items: center;
            gap: 12px;
        }
        .form-header h2 i {
            color: var(--medical-blue-light);
            font-size: 1.7rem;
        }
        .form-header p {
            color: var(--text-muted);
            font-size: 0.85rem;
            margin-top: 6px;
            margin-bottom: 0;
        }

        /* Three column grid layout */
        .booking-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 1.8rem;
            align-items: start;
        }

        /* Form Card Containers */
        .form-card {
            background: var(--white);
            border-radius: 20px;
            border: var(--border-subtle);
            overflow: hidden;
            transition: all 0.2s ease;
            box-shadow: 0 2px 8px rgba(0,0,0,0.02);
        }
        .card-header-custom {
            background: var(--medical-blue-soft);
            padding: 1rem 1.4rem;
            border-bottom: var(--border-subtle);
        }
        .card-header-custom h3 {
            font-size: 1rem;
            font-weight: 600;
            margin: 0;
            color: var(--medical-blue-dark);
            letter-spacing: -0.2px;
            display: flex;
            align-items: center;
            gap: 8px;
        }
        .card-header-custom h3 i {
            color: var(--medical-blue-light);
            font-size: 1.1rem;
        }
        .card-body-custom {
            padding: 1.4rem;
        }

        .form-label {
            font-size: 0.75rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.3px;
            color: var(--text-muted);
            margin-bottom: 0.3rem;
        }
        .form-control, .form-select {
            background: var(--clay-bg);
            border: 1px solid rgba(0,0,0,0.05);
            border-radius: 12px;
            padding: 0.55rem 0.9rem;
            font-size: 0.85rem;
            font-family: 'Poppins', sans-serif;
            color: var(--text-main);
            transition: 0.2s;
        }
        .form-control:focus, .form-select:focus {
            outline: none;
            border-color: var(--medical-blue-light);
            background: var(--white);
            box-shadow: 0 0 0 2px rgba(71,88,103,0.1);
        }
        .dynamic-reason-field {
            margin-top: 0.8rem;
        }
        .auto-triage-container {
            margin-top: 1rem;
            background: var(--medical-blue-soft);
            border-radius: 16px;
            padding: 0.9rem;
            text-align: center;
        }
        .triage-badge-display {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 6px 18px;
            border-radius: 40px;
            font-size: 0.8rem;
            font-weight: 600;
        }
        .triage-badge-display i {
            font-size: 0.85rem;
        }
        .triage-green {
            background: var(--triage-green-bg);
            color: var(--triage-green-text);
            /* border-left: 3px solid #28a745; */
        }
        .triage-yellow {
            background: var(--triage-yellow-bg);
            color: var(--triage-yellow-text);
            /* border-left: 3px solid #ffc107; */
        }
        .triage-red {
            background: var(--triage-red-bg);
            color: var(--triage-red-text);
            /* border-left: 3px solid #dc3545; */
        }
        .triage-info-text {
            font-size: 0.7rem;
            color: var(--text-muted);
            margin-top: 6px;
        }

        .qr-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
        }
        #qrcode {
            background: white;
            padding: 10px;
            border-radius: 20px;
            border: var(--border-subtle);
            display: inline-flex;
            margin-bottom: 1rem;
        }
        .ticket-details {
            background: var(--medical-blue-soft);
            border-radius: 18px;
            padding: 1rem;
            width: 100%;
            margin-top: 0.5rem;
        }
        .ticket-detail-item {
            display: flex;
            justify-content: space-between;
            font-size: 0.8rem;
            padding: 6px 0;
            border-bottom: 1px dashed rgba(0,0,0,0.05);
        }
        .ticket-detail-item:last-child {
            border-bottom: none;
        }
        .ticket-label {
            font-weight: 500;
            color: var(--text-muted);
        }
        .ticket-value {
            font-weight: 600;
            color: var(--brand-primary);
        }
        .btn-confirm {
            background: var(--medical-blue);
            border: none;
            border-radius: 40px;
            padding: 10px 0;
            font-weight: 600;
            font-size: 0.85rem;
            width: 100%;
            margin-top: 1.2rem;
            color: white;
            transition: 0.2s;
        }
        .btn-confirm:hover {
            background: var(--medical-blue-dark);
            transform: translateY(-1px);
        }
        .alert-message {
            font-size: 0.7rem;
            margin-top: 8px;
            color: var(--danger-red);
        }

        @media (max-width: 992px) {
            .booking-grid {
                grid-template-columns: 1fr;
                gap: 1.2rem;
            }
            .form-content {
                padding: 1rem;
            }
            .toast-notification {
                top: 10px;
                right: 10px;
                left: 10px;
                min-width: auto;
                max-width: calc(100% - 20px);
            }
        }
    </style>
</head>
<body>
<!-- UPPER-RIGHT TOAST NOTIFICATION (same style as cancel module) -->
<div id="toastNotification" class="toast-notification">
    <div class="toast-custom" id="toastInner">
        <div class="toast-body-custom" id="toastMessageContent">
            <i class="fa-solid fa-circle-check success-icon" id="toastIcon"></i>
            <span id="toastMessageText">Appointment confirmed!</span>
            <button class="toast-close-btn" id="closeToastBtn"><i class="fa-solid fa-xmark"></i></button>
        </div>
    </div>
</div>

<div class="appointments-wrapper">
    <div class="form-content">
        <!-- HEADER / TITLE -->
        <div class="form-header">
            <h2>Make an Online Appointment</h2>
            <p>Fill out the form below to schedule your consultation. Triage level is automatically determined based on your selected medical service.</p>
        </div>

        <!-- THREE COLUMN LAYOUT -->
        <div class="booking-grid">
            <!-- COLUMN 1: AVAILABLE NURSE SECTION -->
            <div class="form-card">
                <div class="card-header-custom">
                    <h3><i class="fa-solid fa-user-nurse"></i> Available Nurse</h3>
                </div>
                <div class="card-body-custom">
                    <div class="mb-3">
                        <label class="form-label"><i class="fa-regular fa-calendar me-1"></i> Appointment Date</label>
                        <input type="date" class="form-control" id="appointmentDate">
                    </div>
                    <div class="mb-3">
                        <label class="form-label"><i class="fa-solid fa-stethoscope"></i> Available Doctor / Nurse Today</label>
                        <select class="form-select" id="availableNurse">
                            <option value="Emily Rodriguez (Nurse Practitioner)">Emily Rodriguez (Nurse Practitioner)</option>
                            <option value="Michael Tan (Staff Nurse)">Michael Tan (Staff Nurse)</option>
                            <option value="Sarah Gomez (Senior Nurse)">Sarah Gomez (Senior Nurse)</option>
                            <option value="James Rivera (Clinic Nurse)">James Rivera (Clinic Nurse)</option>
                            <option value="Patricia Lim (Head Nurse)">Patricia Lim (Head Nurse)</option>
                        </select>
                    </div>
                    <div class="mb-2">
                        <label class="form-label"><i class="fa-regular fa-clock"></i> Vacant Time Slot</label>
                        <select class="form-select" id="timeSlot">
                            <option value="08:30 AM">08:30 AM</option>
                            <option value="09:45 AM">09:45 AM</option>
                            <option value="11:00 AM">11:00 AM</option>
                            <option value="01:15 PM">01:15 PM</option>
                            <option value="02:30 PM">02:30 PM</option>
                            <option value="03:45 PM">03:45 PM</option>
                        </select>
                    </div>
                </div>
            </div>

            <!-- COLUMN 2: SERVICE TYPE & DYNAMIC OPTIONS + AUTO TRIAGE -->
            <div class="form-card">
                <div class="card-header-custom">
                    <h3><i class="fa-solid fa-briefcase-medical"></i> Service Type</h3>
                </div>
                <div class="card-body-custom">
                    <div class="mb-3">
                        <label class="form-label">Medical Service</label>
                        <select class="form-select" id="serviceType">
                            <option value="medical_certificate">Medical Certificate</option>
                            <option value="follow_checkup">Follow Check-up</option>
                            <option value="vaccination">Vaccination</option>
                            <option value="lab_result_review">Lab Result Review</option>
                            <option value="emergency">Emergency</option>
                        </select>
                    </div>
                    <div class="dynamic-reason-field" id="reasonContainer">
                        <label class="form-label" id="reasonLabel">Reason / Specific Concern</label>
                        <select class="form-select" id="reasonSelect"></select>
                    </div>
                    
                    <div class="auto-triage-container">
                        <div class="d-flex justify-content-between align-items-center mb-1">
                            <span class="form-label mb-0"><i class="fa-solid fa-shield-haltered"></i> Triage Level (Auto-assigned)</span>
                        </div>
                        <div id="triageDisplayBadge" class="triage-badge-display triage-green">
                            <i class="fa-regular fa-circle-check"></i> Green (Not Urgent)
                        </div>
                        <div class="triage-info-text" id="triageReasonText">
                            Medical certificates are classified as non-urgent.
                        </div>
                        <input type="hidden" id="triageLevel" value="green">
                    </div>
                </div>
            </div>

            <!-- COLUMN 3: QR CODE + TICKET DETAILS + CONFIRM BUTTON -->
            <div class="form-card">
                <div class="card-header-custom">
                    <h3><i class="fa-solid fa-qrcode"></i> Your QR Code & Ticket</h3>
                </div>
                <div class="card-body-custom">
                    <div class="qr-container">
                        <div id="qrcode"></div>
                        <div class="ticket-details">
                            <div class="ticket-detail-item">
                                <span class="ticket-label"><i class="fa-regular fa-hashtag"></i> Appointment ID #:</span>
                                <span class="ticket-value" id="appointmentNumber">APT-2401-001</span>
                            </div>
                            <div class="ticket-detail-item">
                                <span class="ticket-label"><i class="fa-regular fa-user"></i> Patient Name:</span>
                                <span class="ticket-value" id="displayName">Maria R. Santos</span>
                            </div>
                            <div class="ticket-detail-item">
                                <span class="ticket-label"><i class="fa-solid fa-chart-line"></i> Queue Number:</span>
                                <span class="ticket-value" id="queueNumber">Q-102</span>
                            </div>
                            <div class="ticket-detail-item">
                                <span class="ticket-label"><i class="fa-solid fa-gauge-high"></i> Triage:</span>
                                <span class="ticket-value" id="ticketTriageLabel">Green</span>
                            </div>
                        </div>
                        <button class="btn-confirm" id="confirmAppointmentBtn">
                            <i class="fa-regular fa-calendar-check me-2"></i> Confirm Appointment
                        </button>
                        <div id="confirmMessage" class="alert-message"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    // ============================================================
    // MAKE ONLINE APPOINTMENT (studappointmentsonline.php)
    // AUTO TRIAGE LOGIC: depends on service type (NO manual selection)
    // NEW: Upper-right toast notification for confirmations (matches cancel module style)
    // Displays: "✓ Appointment confirmed! Your ticket #APT-XXXX-XXX has been scheduled. Triage: GREEN."
    // ============================================================

    // Reason mapping for each service type
    const reasonOptionsMap = {
        follow_checkup: [
            { value: "difficulty_breathing", label: "Difficulty Breathing" },
            { value: "cough", label: "Cough" },
            { value: "cold", label: "Cold" },
            { value: "fever", label: "Fever" },
            { value: "more", label: "More (General Discomfort)" }
        ],
        medical_certificate: [
            { value: "ojt", label: "OJT Requirement" },
            { value: "sports", label: "Sports Clearance" },
            { value: "absence_justification", label: "Absence Justification" },
            { value: "fit_to_school", label: "Fit to School" }
        ],
        vaccination: [
            { value: "flu_vaccine", label: "Flu Vaccine" },
            { value: "hpv_vaccine", label: "HPV Vaccine" },
            { value: "hepatitis_b", label: "Hepatitis B" },
            { value: "covid_booster", label: "COVID-19 Booster" },
            { value: "other_vaccine", label: "Other Vaccine Inquiry" }
        ],
        lab_result_review: [
            { value: "xray_chest", label: "X-ray (Chest)" },
            { value: "urinalysis", label: "Urinalysis" },
            { value: "blood_chemistry", label: "Blood Chemistry" },
            { value: "cbc", label: "Complete Blood Count (CBC)" },
            { value: "fecalysis", label: "Fecalysis" }
        ],
        emergency: [
            { value: "chest_pain", label: "Chest Pain" },
            { value: "severe_allergy", label: "Severe Allergic Reaction" },
            { value: "unconsciousness", label: "Unconsciousness" },
            { value: "bleeding", label: "Severe Bleeding" },
            { value: "other_emergency", label: "Other Emergency Case" }
        ]
    };

    let currentQueue = Math.floor(Math.random() * 50) + 101;
    
    function generateAppointmentNumber() {
        const now = new Date();
        const yy = now.getFullYear().toString().slice(-2);
        const mm = (now.getMonth() + 1).toString().padStart(2,'0');
        const rand = Math.floor(Math.random() * 999).toString().padStart(3,'0');
        return `APT-${yy}${mm}-${rand}`;
    }
    
    function generateQueueNumber() {
        currentQueue = (currentQueue % 150) + 101;
        return `Q-${currentQueue}`;
    }

    let studentProfile = { name: "Maria R. Santos", id: "2024-12345" };

    function getTriageFromService(serviceType) {
        switch(serviceType) {
            case 'medical_certificate':
                return { level: 'green', label: 'Green (Not Urgent)', description: 'Medical certificates are classified as non-urgent documentation.' };
            case 'follow_checkup':
            case 'vaccination':
            case 'lab_result_review':
                return { level: 'yellow', label: 'Yellow (Medium Urgent)', description: 'Routine medical services requiring timely but non-emergency attention.' };
            case 'emergency':
                return { level: 'red', label: 'Red (Urgent)', description: 'Emergency cases require immediate medical priority.' };
            default:
                return { level: 'green', label: 'Green (Not Urgent)', description: 'General consultation.' };
        }
    }

    function updateTriageDisplay() {
        const serviceType = document.getElementById('serviceType').value;
        const triageInfo = getTriageFromService(serviceType);
        const triageLevel = triageInfo.level;
        const triageLabel = triageInfo.label;
        const triageDesc = triageInfo.description;
        
        document.getElementById('triageLevel').value = triageLevel;
        const badgeDiv = document.getElementById('triageDisplayBadge');
        const reasonTextSpan = document.getElementById('triageReasonText');
        badgeDiv.classList.remove('triage-green', 'triage-yellow', 'triage-red');
        if (triageLevel === 'green') {
            badgeDiv.classList.add('triage-green');
            badgeDiv.innerHTML = `<i class="fa-regular fa-circle-check"></i> ${triageLabel}`;
        } else if (triageLevel === 'yellow') {
            badgeDiv.classList.add('triage-yellow');
            badgeDiv.innerHTML = `<i class="fa-solid fa-clock"></i> ${triageLabel}`;
        } else if (triageLevel === 'red') {
            badgeDiv.classList.add('triage-red');
            badgeDiv.innerHTML = `<i class="fa-solid fa-triangle-exclamation"></i> ${triageLabel}`;
        }
        reasonTextSpan.innerText = triageDesc;
        
        const ticketTriageSpan = document.getElementById('ticketTriageLabel');
        if (ticketTriageSpan) {
            let shortLabel = triageLevel === 'green' ? 'Green (Not Urgent)' : (triageLevel === 'yellow' ? 'Yellow (Medium Urgent)' : 'Red (Urgent)');
            ticketTriageSpan.innerText = shortLabel;
        }
    }

    function updateTicketAndQR() {
        const aptNum = generateAppointmentNumber();
        const queueVal = generateQueueNumber();
        document.getElementById('appointmentNumber').innerText = aptNum;
        document.getElementById('queueNumber').innerText = queueVal;
        document.getElementById('displayName').innerText = studentProfile.name;
        
        const nurseSelected = document.getElementById('availableNurse').value;
        const serviceSelect = document.getElementById('serviceType');
        const serviceText = serviceSelect.options[serviceSelect.selectedIndex]?.text || "Consultation";
        const dateVal = document.getElementById('appointmentDate').value;
        const timeVal = document.getElementById('timeSlot').value;
        const reasonSelectElem = document.getElementById('reasonSelect');
        const reasonText = reasonSelectElem.options[reasonSelectElem.selectedIndex]?.text || "General";
        const triageValue = document.getElementById('triageLevel').value.toUpperCase();
        
        const qrData = `Appointment: ${aptNum} | Patient: ${studentProfile.name} | Service: ${serviceText} | Date: ${dateVal} ${timeVal} | Reason: ${reasonText} | Triage: ${triageValue} | Nurse: ${nurseSelected}`;
        
        const qrContainer = document.getElementById('qrcode');
        qrContainer.innerHTML = "";
        new QRCode(qrContainer, {
            text: qrData,
            width: 128,
            height: 128,
            colorDark: "#28313a",
            colorLight: "#ffffff",
            correctLevel: QRCode.CorrectLevel.M
        });
    }
    
    function updateReasonDropdown() {
        const serviceType = document.getElementById('serviceType').value;
        const reasonOptions = reasonOptionsMap[serviceType] || reasonOptionsMap.follow_checkup;
        const reasonSelect = document.getElementById('reasonSelect');
        reasonSelect.innerHTML = '';
        reasonOptions.forEach(opt => {
            const option = document.createElement('option');
            option.value = opt.value;
            option.textContent = opt.label;
            reasonSelect.appendChild(option);
        });
        const reasonLabel = document.getElementById('reasonLabel');
        if (serviceType === 'follow_checkup') reasonLabel.innerText = 'Reason for Follow-up';
        else if (serviceType === 'medical_certificate') reasonLabel.innerText = 'Certificate Purpose';
        else if (serviceType === 'vaccination') reasonLabel.innerText = 'Vaccination Type';
        else if (serviceType === 'lab_result_review') reasonLabel.innerText = 'Lab Test / Review';
        else if (serviceType === 'emergency') reasonLabel.innerText = 'Emergency Concern';
        else reasonLabel.innerText = 'Reason / Specific Concern';
        
        updateTriageDisplay();
        updateTicketAndQR();
    }

    // ============================================================
    // TOAST NOTIFICATION (UPPER RIGHT CORNER) - matches cancel module style
    // ============================================================
    function showToastNotification(message, isSuccess = true) {
        const toastContainer = document.getElementById('toastNotification');
        const toastInner = document.getElementById('toastInner');
        const toastIcon = document.getElementById('toastIcon');
        const toastMessageSpan = document.getElementById('toastMessageText');
        
        if (!toastContainer) return;
        
        // Clear any existing timeout
        if (window.toastTimeout) clearTimeout(window.toastTimeout);
        
        // Set icon and style based on type
        if (isSuccess) {
            toastIcon.className = "fa-solid fa-circle-check success-icon";
            toastInner.classList.remove('warning-toast');
            toastInner.classList.add('toast-custom');
        } else {
            toastIcon.className = "fa-solid fa-circle-exclamation warning-icon";
            toastInner.classList.add('warning-toast');
        }
        
        toastMessageSpan.innerText = message;
        
        // Show toast
        toastContainer.classList.add('show');
        
        // Auto-hide after 3.5 seconds
        window.toastTimeout = setTimeout(() => {
            toastContainer.classList.remove('show');
        }, 3500);
    }
    
    // Close toast manually
    document.getElementById('closeToastBtn')?.addEventListener('click', function() {
        const toastContainer = document.getElementById('toastNotification');
        if (toastContainer) {
            toastContainer.classList.remove('show');
            if (window.toastTimeout) clearTimeout(window.toastTimeout);
        }
    });

    // ============================================================
    // CONFIRM APPOINTMENT - with upper-right toast notification
    // Replaces old inline alert message with toast (matches cancel style)
    // ============================================================
    function confirmAppointment() {
        const aptNumberSpan = document.getElementById('appointmentNumber').innerText;
        const patientName = studentProfile.name;
        const nurseVal = document.getElementById('availableNurse').value;
        const dateVal = document.getElementById('appointmentDate').value;
        const timeVal = document.getElementById('timeSlot').value;
        const serviceSelect = document.getElementById('serviceType');
        const serviceText = serviceSelect.options[serviceSelect.selectedIndex]?.text;
        const reasonSelectElem = document.getElementById('reasonSelect');
        const reasonText = reasonSelectElem.options[reasonSelectElem.selectedIndex]?.text;
        const triageLevelElem = document.getElementById('triageLevel');
        const triageLevel = triageLevelElem ? triageLevelElem.value : 'green';
        
        if (!dateVal) {
            // Show error via toast (warning style)
            showToastNotification("⚠️ Please select a valid appointment date.", false);
            return;
        }
        
        // Prepare appointment data
        const newAppointment = {
            id: "apt_" + Date.now(),
            appointmentNumber: aptNumberSpan,
            patient: patientName,
            nurse: nurseVal,
            date: dateVal,
            time: timeVal,
            service: serviceText,
            reason: reasonText,
            triage: triageLevel,
            status: "Upcoming",
            createdAt: new Date().toISOString()
        };
        
        let pendingAppointments = JSON.parse(localStorage.getItem('pupbc_pending_appointments') || '[]');
        pendingAppointments.push(newAppointment);
        localStorage.setItem('pupbc_pending_appointments', JSON.stringify(pendingAppointments));
        
        // Format triage label for display
        let triageDisplayLabel = '';
        if (triageLevel === 'green') triageDisplayLabel = 'GREEN';
        else if (triageLevel === 'yellow') triageDisplayLabel = 'YELLOW';
        else triageDisplayLabel = 'RED';
        
        // Create notification message exactly matching style of cancel module but for confirmation
        // Example: "✓ Appointment confirmed! Your ticket #APT-2604-460 has been scheduled. Triage: GREEN."
        const toastMessage = `✓ Appointment confirmed! Your ticket #${aptNumberSpan} has been scheduled. Triage: ${triageDisplayLabel}.`;
        
        // Show upper-right toast notification
        showToastNotification(toastMessage, true);
        
        // Optional: refresh QR and ticket details for next potential booking (but keep current display)
        // Small delay to update QR with fresh data for next confirmation if needed
        setTimeout(() => {
            updateTicketAndQR();
        }, 500);
    }

    function bindFormUpdates() {
        const inputs = ['appointmentDate', 'availableNurse', 'timeSlot'];
        inputs.forEach(id => {
            const el = document.getElementById(id);
            if (el) el.addEventListener('change', () => updateTicketAndQR());
        });
        document.getElementById('reasonSelect')?.addEventListener('change', () => updateTicketAndQR());
        document.getElementById('appointmentDate')?.addEventListener('change', () => updateTicketAndQR());
    }

    // initialization
    document.addEventListener('DOMContentLoaded', () => {
        const dateInput = document.getElementById('appointmentDate');
        if (!dateInput.value) {
            const tomorrow = new Date();
            tomorrow.setDate(tomorrow.getDate() + 1);
            dateInput.value = tomorrow.toISOString().split('T')[0];
        }
        
        updateReasonDropdown();
        
        const serviceTypeEl = document.getElementById('serviceType');
        serviceTypeEl.addEventListener('change', () => {
            updateReasonDropdown();
            updateTriageDisplay();
            updateTicketAndQR();
        });
        
        updateTriageDisplay();
        bindFormUpdates();
        updateTicketAndQR();
        
        const confirmBtn = document.getElementById('confirmAppointmentBtn');
        confirmBtn.addEventListener('click', confirmAppointment);
        
        // Remove old inline message div functionality if needed (but keep for fallback)
        const msgDiv = document.getElementById('confirmMessage');
        if (msgDiv) msgDiv.style.display = 'none';
    });
    
    if (window.self === window.top) {
        const currentPagePath = window.location.pathname.split("/").pop();
        if (currentPagePath && !currentPagePath.includes('studdashboard.php')) {
            window.location.href = "studdashboard.php?page=studappointments.php&subpage=" + currentPagePath;
        }
    }
</script>
</body>
</html>