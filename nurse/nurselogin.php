<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="0">
    <title>Staff Portal | PUPBC CareLink</title>
    
    <!-- Bootstrap & Fonts -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">

    <style>
        :root {
            --pup-maroon: #9C0C20;
            --medical-blue: #475867;
            --clay-bg: #f0f0f0;
            --clay-shadow: 8px 8px 16px #d1d9e6, -8px -8px 16px #ffffff;
            --clay-inset: inset 4px 4px 8px #d1d9e6, inset -4px -4px 8px #ffffff;
            
            /* Breakpoint variables */
            --tablet-breakpoint: 992px;
            --mobile-breakpoint: 768px;
            --small-mobile-breakpoint: 480px;
        }

        body {
            font-family: 'Poppins', sans-serif;
            height: 100vh;
            display: flex; align-items: center; justify-content: center;
            margin: 0;
            overflow: hidden;
            position: relative;
            background: #000;
        }

        /* Mirrored & Blurred Background using your requested Image */
        body::before {
            content: "";
            position: absolute;
            top: 0; left: 0; right: 0; bottom: 0;
            background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.7)), 
                        url('https://media.istockphoto.com/id/1501183871/photo/doctors-registering-patients-at-the-hospital.jpg?s=612x612&w=0&k=20&c=mnjpoSNO69dNWp11zMmbmMx5S0ch4cG_d-8sMvKzKwI=');
            background-size: cover;
            background-position: center;
            filter: blur(10px);
            transform: scale(1.1);
            z-index: -1;
        }

        .login-container {
            width: 100%; max-width: 1100px;
            height: 650px;
            background: transparent;
            border-radius: 40px;
            display: grid; grid-template-columns: 1.2fr 1fr;
            overflow: hidden;
            box-shadow: 0 25px 50px rgba(0,0,0,0.4);
            position: relative;
            backdrop-filter: blur(5px);
        }

        /* TABLET DIMENSIONS (769px - 992px) */
        @media screen and (max-width: 992px) and (min-width: 769px) {
            .login-container {
                max-width: 90%;
                height: auto;
                min-height: 550px;
                grid-template-columns: 1fr 0.9fr;
                border-radius: 30px;
            }
            
            .brand-side {
                padding: 2rem;
            }
            
            .brand-side h1 {
                font-size: 2rem !important;
            }
            
            .brand-side p {
                font-size: 0.85rem;
            }
            
            .brand-side .d-flex {
                margin-bottom: 0.5rem !important;
            }
            
            .brand-side i {
                font-size: 1rem !important;
            }
            
            .brand-side span {
                font-size: 0.8rem;
            }
            
            .form-side {
                padding: 2rem;
            }
            
            .login-header h2 {
                font-size: 1.5rem;
            }
            
            .login-header p {
                font-size: 0.8rem;
                margin-bottom: 1.5rem;
            }
            
            .input-box {
                padding: 5px 15px;
            }
            
            .input-box input {
                font-size: 0.85rem;
                padding: 10px 0;
            }
            
            .btn-doctor {
                padding: 12px;
                font-size: 0.9rem;
            }
            
            .checkbox-label-text {
                font-size: 0.7rem;
            }
        }
        
        /* MOBILE DIMENSIONS (≤768px) */
        @media screen and (max-width: 768px) {
            body {
                overflow-y: auto;
                height: auto;
                min-height: 100vh;
                align-items: flex-start;
                padding: 15px;
            }
            
            .login-container {
                grid-template-columns: 1fr;
                height: auto;
                max-width: 100%;
                border-radius: 20px;
                margin: 20px 0;
            }
            
            .brand-side {
                order: 1;
                padding: 1.5rem;
                text-align: center;
                border-radius: 20px 20px 0 0;
            }
            
            .brand-side h1 {
                font-size: 1.5rem !important;
            }
            
            .brand-side p {
                font-size: 0.8rem;
            }
            
            .brand-side .d-flex {
                justify-content: center;
                margin-bottom: 0.5rem !important;
            }
            
            .brand-side i {
                font-size: 0.9rem !important;
                margin-right: 0.5rem !important;
            }
            
            .brand-side span {
                font-size: 0.75rem;
            }
            
            .form-side {
                order: 2;
                padding: 1.5rem;
                border-radius: 0 0 20px 20px;
            }
            
            .login-header h2 {
                font-size: 1.3rem;
                text-align: center;
            }
            
            .login-header p {
                font-size: 0.75rem;
                text-align: center;
                margin-bottom: 1.5rem;
            }
            
            .input-box {
                padding: 5px 15px;
                margin-bottom: 12px;
            }
            
            .input-box input {
                font-size: 0.85rem;
                padding: 10px 0;
            }
            
            .input-box i {
                font-size: 0.85rem;
            }
            
            .btn-doctor {
                padding: 12px;
                font-size: 0.85rem;
            }
            
            .form-footer {
                font-size: 0.75rem;
            }
            
            .btn-back-footer {
                font-size: 0.7rem;
            }
            
            .checkbox-label-text {
                font-size: 0.7rem;
            }
            
            .forgot-link {
                font-size: 0.7rem;
            }
            
            .d-flex.justify-content-between {
                margin-bottom: 1rem !important;
                padding: 0 0.5rem;
            }
        }
        
        /* SMALL MOBILE DIMENSIONS (≤480px) */
        @media screen and (max-width: 480px) {
            body {
                padding: 10px;
            }
            
            .brand-side {
                padding: 1rem;
            }
            
            .brand-side h1 {
                font-size: 1.5rem !important;
            }
            
            .brand-side p {
                font-size: 0.7rem;
            }
            
            .brand-side span {
                font-size: 0.65rem;
            }
            
            .brand-side i {
                font-size: 0.8rem !important;
            }
            
            .form-side {
                padding: 1rem;
            }
            
            .login-header h2 {
                font-size: 1.1rem;
            }
            
            .login-header p {
                font-size: 0.65rem;
            }
            
            .input-box {
                padding: 3px 12px;
            }
            
            .input-box input {
                font-size: 0.8rem;
                padding: 8px 0;
            }
            
            .input-box i {
                font-size: 0.75rem;
            }
            
            .btn-doctor {
                padding: 10px;
                font-size: 0.75rem;
            }
            
            .checkbox-label-text {
                font-size: 0.65rem;
            }
            
            .forgot-link {
                font-size: 0.65rem;
            }
            
            .form-footer {
                font-size: 0.65rem;
            }
            
            .btn-back-footer {
                font-size: 0.6rem;
            }
            
            .checkmark {
                width: 14px;
                height: 14px;
            }
            
            .custom-checkbox .checkmark:after {
                width: 4px;
                height: 7px;
            }
        }
        
        /* LANDSCAPE MODE FOR MOBILE */
        @media screen and (max-width: 768px) and (orientation: landscape) {
            body {
                padding: 10px;
            }
            
            .login-container {
                margin: 10px 0;
            }
            
            .brand-side {
                padding: 1rem;
            }
            
            .form-side {
                padding: 1rem;
            }
            
            .brand-side h1 {
                font-size: 1.2rem !important;
            }
            
            .login-header h2 {
                font-size: 1.1rem;
            }
            
            .input-box {
                margin-bottom: 8px;
            }
            
            .btn-doctor {
                margin-top: 0;
            }
        }

        /* BRAND SIDE - Updated content based on Document Objectives */
        .brand-side {
            background: linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.6)), 
                        url('https://media.istockphoto.com/id/1501183871/photo/doctors-registering-patients-at-the-hospital.jpg?s=612x612&w=0&k=20&c=mnjpoSNO69dNWp11zMmbmMx5S0ch4cG_d-8sMvKzKwI=');
            background-size: cover;
            background-position: center;
            padding: 4rem;
            display: flex; flex-direction: column; justify-content: center;
            color: white;
        }

        /* FORM SIDE */
        .form-side {
            padding: 3rem 4rem;
            background: rgba(253, 253, 253, 0.95);
            display: flex; flex-direction: column; justify-content: center;
        }

        .login-header h2 { font-weight: 700; color: var(--medical-blue); margin-bottom: 0.5rem; }
        .login-header p { color: #666; font-size: 0.85rem; margin-bottom: 2rem; }

        /* Claymorphism Inputs */
        .input-box {
            background: var(--clay-bg);
            border-radius: 20px;
            padding: 5px 20px;
            box-shadow: var(--clay-inset);
            display: flex; 
            align-items: center;
            justify-content: space-between;
            margin-bottom: 15px;
            border: 2px solid transparent;
            transition: 0.3s;
        }
        .input-box:focus-within { border-color: var(--medical-blue); }
        .input-box i { 
            color: var(--medical-blue); 
            margin-left: 15px; 
            opacity: 0.6;
            cursor: pointer;
            transition: opacity 0.2s ease;
        }
        .input-box i:hover {
            opacity: 1;
        }
        .input-box input {
            background: transparent; border: none; outline: none;
            width: 100%; padding: 12px 0; font-size: 0.9rem;
            color: var(--medical-blue);
        }

        /* Password toggle icon specific styling */
        .password-toggle-icon {
            cursor: pointer;
            margin-left: 15px;
            opacity: 0.6;
            transition: opacity 0.2s;
            font-size: 1rem;
            color: var(--medical-blue);
        }
        .password-toggle-icon:hover {
            opacity: 1;
            transform: scale(1.05);
        }

        /* Custom Checkbox Styling - Removes default blue color and matches medical-blue theme */
        .custom-checkbox {
            display: flex;
            align-items: center;
            cursor: pointer;
            user-select: none;
        }
        
        .custom-checkbox input {
            position: absolute;
            opacity: 0;
            cursor: pointer;
            height: 0;
            width: 0;
        }
        
        .checkmark {
            position: relative;
            display: inline-block;
            width: 18px;
            height: 18px;
            background: var(--clay-bg);
            border-radius: 5px;
            margin-right: 10px;
            box-shadow: inset 2px 2px 5px #d1d9e6, inset -2px -2px 5px #ffffff;
            transition: all 0.2s ease;
            cursor: pointer;
        }
        
        .custom-checkbox:hover input ~ .checkmark {
            box-shadow: inset 1px 1px 3px #d1d9e6, inset -1px -1px 3px #ffffff;
        }
        
        .custom-checkbox input:checked ~ .checkmark {
            background: var(--medical-blue);
            box-shadow: 2px 2px 5px #d1d9e6, -2px -2px 5px #ffffff;
        }
        
        .checkmark:after {
            content: "";
            position: absolute;
            display: none;
        }
        
        .custom-checkbox input:checked ~ .checkmark:after {
            display: block;
        }
        
        /* Centered check mark - perfect alignment */
        .custom-checkbox .checkmark:after {
            left: 50%;
            top: 50%;
            width: 5px;
            height: 9px;
            border: solid white;
            border-width: 0 2px 2px 0;
            transform: translate(-50%, -60%) rotate(45deg);
            position: absolute;
        }
        
        .checkbox-label-text {
            font-size: 0.75rem;
            color: #6c757d;
            cursor: pointer;
        }

        .btn-doctor {
            background: var(--medical-blue);
            color: white; border: none; border-radius: 20px;
            padding: 15px; width: 100%; font-weight: 600;
            box-shadow: 0 10px 20px rgba(71, 88, 103, 0.2);
            transition: 0.3s; margin-top: 5px;
        }
        .btn-doctor:hover { transform: translateY(-3px); background: #35424d; }

        .form-footer { margin-top: 1.5rem; text-align: center; font-size: 0.85rem; color: #888; }
        .form-footer a { color: var(--pup-maroon); text-decoration: none; font-weight: 600; }
        
        .btn-back-footer {
            display: inline-block; margin-top: 1rem;
            color: var(--medical-blue) !important;
            font-size: 0.8rem; transition: 0.3s; opacity: 0.8;
            text-decoration: none;
        }
        .btn-back-footer:hover {
            opacity: 1;
            transform: translateX(-3px);
            color: var(--pup-maroon) !important;
        }
        
        .forgot-link {
            transition: 0.2s;
        }
        .forgot-link:hover {
            text-decoration: underline !important;
            opacity: 0.8;
        }

        /* Modal Styling - Claymorphism design consistent with login portal */
        .modal-clay .modal-content {
            background: rgba(253, 253, 253, 0.98);
            backdrop-filter: blur(8px);
            border: none;
            border-radius: 30px;
            box-shadow: 0 20px 35px rgba(0,0,0,0.25), var(--clay-shadow);
            font-family: 'Poppins', sans-serif;
            overflow: hidden;
        }
        .modal-clay .modal-header {
            border-bottom: 1px solid rgba(71,88,103,0.2);
            background: rgba(71,88,103,0.05);
            padding: 1.2rem 1.8rem;
        }
        .modal-clay .modal-header .modal-title {
            font-weight: 700;
            color: var(--medical-blue);
            letter-spacing: -0.2px;
        }
        .modal-clay .modal-body {
            padding: 1.8rem;
            color: #2c3e50;
            font-weight: 500;
            font-size: 1rem;
            text-align: center;
        }
        .modal-clay .modal-footer {
            border-top: 1px solid rgba(71,88,103,0.15);
            padding: 1rem 1.8rem;
            justify-content: center;
        }
        .modal-clay .btn-modal-close {
            background: var(--medical-blue);
            color: white;
            border-radius: 40px;
            padding: 0.5rem 1.8rem;
            font-weight: 600;
            border: none;
            transition: 0.2s;
            box-shadow: 0 5px 10px rgba(71,88,103,0.2);
        }
        .modal-clay .btn-modal-close:hover {
            background: #35424d;
            transform: translateY(-2px);
        }
        /* success icon style inside modal */
        .modal-icon {
            font-size: 3rem;
            margin-bottom: 0.5rem;
        }
        .modal-icon.text-danger i { color: #dc3545; }
        .modal-icon.text-success i { color: #198754; }
        
        /* loading overlay (optional while reading JSON) */
        .loading-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0,0,0,0.6);
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 2000;
            backdrop-filter: blur(4px);
        }
        .loading-spinner {
            background: white;
            padding: 20px 30px;
            border-radius: 40px;
            font-weight: 600;
            color: var(--medical-blue);
            box-shadow: var(--clay-shadow);
        }
    </style>
</head>
<body>

<div class="login-container">
    <div class="brand-side">
        <h1 class="fw-bold">Medical<br>Portal</h1>
        <p class="lead opacity-75">Health Information System & Triage Management</p>
        
        <div class="mt-4">
            <div class="d-flex align-items-center mb-3">
                <i class="fa-solid fa-file-medical me-3 fs-4"></i>
                <span>EHR & Health Record Management</span>
            </div>
            <div class="d-flex align-items-center mb-3">
                <i class="fa-solid fa-heart-pulse me-3 fs-4"></i>
                <span>Real-time Triage Urgency Monitoring</span>
            </div>
            <div class="d-flex align-items-center mb-3">
                <i class="fa-solid fa-qrcode me-3 fs-4"></i>
                <span>QR-Integrated Patient Identification</span>
            </div>
        </div>
    </div>

    <div class="form-side" id="appRoot">
        <!-- Login Panel - clean -->
        <div id="loginPanel">
            <div class="login-header">
                <h2>Staff Login</h2>
                <p>Authorized Clinic Personnel Access Only</p>
            </div>

            <form id="staffLoginForm">
                <label class="small fw-bold mb-1 ms-2" style="color: var(--medical-blue);">EMPLOYEE ID (STAFF ID)</label>
                <div class="input-box">
                    <input type="text" id="employeeId" placeholder="e.g. 2026-01234-RN-0" required>
                    <i class="fa-solid fa-id-card"></i>
                </div>

                <label class="small fw-bold mb-1 ms-2" style="color: var(--medical-blue);">PASSWORD</label>
                <div class="input-box">
                    <input type="password" id="passwordField" placeholder="••••••••" required>
                    <i class="fa-regular fa-eye-slash password-toggle-icon" id="togglePassword"></i>
                </div>

                <div class="d-flex justify-content-between align-items-center mb-4 px-2">
                    <label class="custom-checkbox">
                        <input type="checkbox" id="rememberDoctor">
                        <span class="checkmark"></span>
                        <span class="checkbox-label-text">Remember me</span>
                    </label>
                    <a href="nurseforgotpass.php" class="small text-decoration-none forgot-link" style="color: var(--medical-blue); font-weight: 600;">Forgot Password?</a>
                </div>

                <button type="submit" class="btn-doctor">
                    ACCESS SYSTEM <i class="fa-solid fa-right-to-bracket ms-2"></i>
                </button>
            </form>

            <div class="form-footer">
                New medical staff? <br>
                <a href="nurseregister.php">Register Here</a>
                <br>
                <a href="../portal/portalmain.php" class="btn-back-footer">
                    <i class="fa-solid fa-arrow-left-long"></i> Back to Portal
                </a>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap Modal -->
<div class="modal fade" id="messageModal" tabindex="-1" aria-hidden="true" data-bs-backdrop="static">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content modal-clay">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitle">Notification</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="modalBodyContent">
                <div class="modal-icon" id="modalIcon"></div>
                <div id="modalText"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn-modal-close" data-bs-dismiss="modal">Got it</button>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    (function() {
        // ========== GLOBAL REFERENCES ==========
        let modalInstance = null;
        const modalElement = document.getElementById('messageModal');
        
        // Store nurses data fetched from the external JSON file "nurseregisterexample.json"
        let nursesRegistry = [];   // will hold array of nurse objects from the JSON
        
        // REMEMBER ME keys
        const REMEMBER_KEY = "pupbc_remembered_creds_nurse";
        
        function initModal() {
            if (modalElement && !modalInstance) {
                modalInstance = new bootstrap.Modal(modalElement, {
                    backdrop: 'static',
                    keyboard: true
                });
            }
        }
        
        function showModalMessage(title, message, isError = true) {
            initModal();
            const modalTitleElem = document.getElementById('modalTitle');
            const modalIconDiv = document.getElementById('modalIcon');
            const modalTextElem = document.getElementById('modalText');
            
            if (modalTitleElem) modalTitleElem.innerText = title || (isError ? 'Access Error' : 'Information');
            if (modalIconDiv) {
                if (isError) {
                    modalIconDiv.innerHTML = '<i class="fa-solid fa-circle-exclamation" style="font-size: 3rem; color: #dc3545;"></i>';
                } else {
                    modalIconDiv.innerHTML = '<i class="fa-solid fa-circle-check" style="font-size: 3rem; color: #198754;"></i>';
                }
            }
            if (modalTextElem) modalTextElem.innerText = message;
            if (modalInstance) modalInstance.show();
        }
        
        // ========== LOAD NURSES FROM EXTERNAL JSON (nurseregisterexample.json) ==========
        async function loadNursesFromJsonFile() {
            // Show a subtle loading state (disable form briefly)
            const submitBtn = document.querySelector('.btn-doctor');
            const originalBtnText = submitBtn ? submitBtn.innerHTML : '';
            if (submitBtn) {
                submitBtn.disabled = true;
                submitBtn.innerHTML = '<i class="fa-solid fa-spinner fa-pulse"></i> Loading credentials...';
            }
            
            try {
                // Fetch the external JSON file that contains all registered nurses
                const response = await fetch('nurseregisterexample.json');
                if (!response.ok) {
                    throw new Error(`HTTP ${response.status}: Could not load nurse registry file.`);
                }
                const data = await response.json();
                if (Array.isArray(data) && data.length > 0) {
                    nursesRegistry = data;
                    console.log(`Loaded ${nursesRegistry.length} nurse record(s) from nurseregisterexample.json`);
                } else {
                    console.warn('JSON file empty or invalid format');
                    nursesRegistry = [];
                }
            } catch (err) {
                console.error('Failed to load nurseregisterexample.json:', err);
                showModalMessage('Data Error', 'Unable to load staff registry. Please ensure "nurseregisterexample.json" exists and is valid. Contact support.', true);
                nursesRegistry = [];
            } finally {
                if (submitBtn) {
                    submitBtn.disabled = false;
                    submitBtn.innerHTML = originalBtnText;
                }
            }
        }
        
        // ========== VALIDATE LOGIN AGAINST FETCHED NURSES DATA ==========
        function findNurseByStaffId(staffId) {
            if (!nursesRegistry.length) return null;
            return nursesRegistry.find(nurse => nurse.staffId && nurse.staffId.toLowerCase() === staffId.toLowerCase());
        }
        
        function validateLoginWithExternalData(staffId, password) {
            if (!staffId || !password) return false;
            const nurse = findNurseByStaffId(staffId);
            if (nurse && nurse.password === password) {
                const userInfo = {
                    staffId: nurse.staffId,
                    fullName: `${nurse.firstName || ''} ${nurse.lastName || ''}`.trim() || nurse.staffId,
                    email: nurse.email,
                    role: nurse.role || 'Medical Staff',
                    registeredAt: nurse.registeredAt
                };
                sessionStorage.setItem("loggedInUser", JSON.stringify(userInfo));
                return true;
            }
            return false;
        }
        
        // ========== REMEMBER ME functions ==========
        function saveRememberedCredentials(staffId, password, isChecked) {
            if (isChecked && staffId && password) {
                const creds = { staffId: staffId, password: password, timestamp: Date.now() };
                localStorage.setItem(REMEMBER_KEY, JSON.stringify(creds));
            } else {
                localStorage.removeItem(REMEMBER_KEY);
            }
        }
        
        function applyRememberedCredentials() {
            const savedCredsRaw = localStorage.getItem(REMEMBER_KEY);
            if (savedCredsRaw) {
                try {
                    const creds = JSON.parse(savedCredsRaw);
                    if (creds.staffId && creds.password) {
                        const empIdInput = document.getElementById('employeeId');
                        const pwdInput = document.getElementById('passwordField');
                        const rememberCheckbox = document.getElementById('rememberDoctor');
                        if (empIdInput && pwdInput && rememberCheckbox) {
                            empIdInput.value = creds.staffId;
                            pwdInput.value = creds.password;
                            rememberCheckbox.checked = true;
                        }
                    }
                } catch(e) { /* ignore */ }
            } else {
                const rememberCheckbox = document.getElementById('rememberDoctor');
                if (rememberCheckbox) rememberCheckbox.checked = false;
            }
        }
        
        function clearRememberedCredentials() {
            localStorage.removeItem(REMEMBER_KEY);
            const rememberCheckbox = document.getElementById('rememberDoctor');
            if (rememberCheckbox) rememberCheckbox.checked = false;
        }
        
        // ========== PASSWORD TOGGLE ==========
        const togglePassword = document.getElementById('togglePassword');
        const passwordField = document.getElementById('passwordField');
        if (togglePassword && passwordField) {
            togglePassword.addEventListener('click', () => {
                const type = passwordField.type === 'password' ? 'text' : 'password';
                passwordField.type = type;
                togglePassword.classList.toggle('fa-eye-slash');
                togglePassword.classList.toggle('fa-eye');
            });
        }
        
        // ========== HELPER: Time interval effect only for "Verifying..." part ==========
        // This function creates a visual time interval on the "Verifying..." text inside the button.
        // It adds an animated ellipsis that updates every 400ms to simulate active verification,
        // while preserving the rest of the UI and button styling.
        let verificationInterval = null;
        
        function startVerificationAnimation(buttonElement, originalHtmlPrefix) {
            // Clear any existing interval to avoid overlapping
            if (verificationInterval) clearInterval(verificationInterval);
            let dotCount = 0;
            // Store base text "Verifying" without dots
            const baseText = "Verifying";
            verificationInterval = setInterval(() => {
                if (!buttonElement || buttonElement.disabled === false) {
                    // If button becomes enabled again somehow, stop animation
                    if (verificationInterval) clearInterval(verificationInterval);
                    verificationInterval = null;
                    return;
                }
                let dots = '.'.repeat(dotCount % 4);
                // Update innerHTML: keep spinner icon + base text + changing dots
                buttonElement.innerHTML = `<i class="fa-solid fa-spinner fa-pulse"></i> ${baseText}${dots}`;
                dotCount++;
            }, 400);
        }
        
        function stopVerificationAnimation(buttonElement, originalButtonHtml) {
            if (verificationInterval) {
                clearInterval(verificationInterval);
                verificationInterval = null;
            }
            if (buttonElement) {
                buttonElement.innerHTML = originalButtonHtml;
            }
        }
        
        // ========== LOGIN SUBMIT HANDLER (using external JSON + time interval on "Verifying...") ==========
        const loginForm = document.getElementById('staffLoginForm');
        if (loginForm) {
            loginForm.addEventListener('submit', async (e) => {
                e.preventDefault();
                
                const submitBtn = loginForm.querySelector('.btn-doctor');
                // Store original button HTML for later reset
                const originalBtnHtml = submitBtn ? submitBtn.innerHTML : '';
                
                // Disable button and start animation interval on "Verifying" part (only that text gets dynamic dots)
                if (submitBtn) {
                    submitBtn.disabled = true;
                    // Clear previous spinner default html and start custom interval animation for "Verifying..."
                    // We set inner HTML with spinner icon and "Verifying" without dots initially, interval will manage dots
                    submitBtn.innerHTML = `<i class="fa-solid fa-spinner fa-pulse"></i> Verifying`;
                    startVerificationAnimation(submitBtn, originalBtnHtml);
                }
                
                const staffId = document.getElementById('employeeId').value.trim();
                const password = document.getElementById('passwordField').value;
                const rememberCheckbox = document.getElementById('rememberDoctor');
                const isRememberChecked = rememberCheckbox ? rememberCheckbox.checked : false;
                
                if (!staffId || !password) {
                    // Stop verification animation, revert button
                    if (submitBtn) {
                        stopVerificationAnimation(submitBtn, originalBtnHtml);
                        submitBtn.disabled = false;
                    }
                    showModalMessage("Missing Credentials", "Please enter both Staff ID and Password.", true);
                    return;
                }
                
                // Ensure JSON data is loaded (if not yet loaded, try loading again)
                if (nursesRegistry.length === 0) {
                    await loadNursesFromJsonFile();
                }
                
                // Simulate a minimal async delay to show the verification effect naturally (optional but enhances UX)
                // The time interval already runs while we validate. We'll do validation then process.
                // Validate against the fetched registry
                const isValid = validateLoginWithExternalData(staffId, password);
                
                // Small artificial delay to allow the verifying animation to be visible (makes interval feel authentic)
                // This ensures the user sees "Verifying.." for a short moment even on fast local validation.
                await new Promise(resolve => setTimeout(resolve, 3000));
                
                if (isValid) {
                    if (isRememberChecked) {
                        saveRememberedCredentials(staffId, password, true);
                    } else {
                        clearRememberedCredentials();
                    }
                    // Stop animation before redirect
                    if (submitBtn) stopVerificationAnimation(submitBtn, originalBtnHtml);
                    window.location.href = "dashboard/nursedashboard.php";
                } else {
                    // Stop animation, restore button fully
                    if (submitBtn) {
                        stopVerificationAnimation(submitBtn, originalBtnHtml);
                        submitBtn.disabled = false;
                    }
                    if (nursesRegistry.length === 0) {
                        showModalMessage("Login Failed", "No nurse records found. Please ensure 'nurseregisterexample.json' is valid and contains registrations.", true);
                    } else {
                        showModalMessage("Login Failed", "Invalid Staff ID or Password. Please check your credentials.", true);
                    }
                }
            });
        }
        
        // ========== REMEMBER ME behavior when unchecked ==========
        const rememberMeCheckbox = document.getElementById('rememberDoctor');
        if (rememberMeCheckbox) {
            rememberMeCheckbox.addEventListener('change', function() {
                if (!this.checked) {
                    localStorage.removeItem(REMEMBER_KEY);
                }
            });
        }
        
        // ========== ON PAGE LOAD ==========
        async function initializePage() {
            await loadNursesFromJsonFile();
            applyRememberedCredentials();
            initModal();
            if (nursesRegistry.length > 0) {
                console.log(`✅ Ready: ${nursesRegistry.length} nurse(s) loaded from nurseregisterexample.json. Use any valid staffId/password from the file.`);
            } else {
                console.warn("⚠️ No nurse records found. Please check nurseregisterexample.json file.");
            }
        }
        
        initializePage();
        
        // Clean legacy accounts if any
        if (localStorage.getItem("pupbc_staff_accounts")) {
            localStorage.removeItem("pupbc_staff_accounts");
        }
    })();
</script>

<style>
    .input-box .password-toggle-icon {
        margin-left: 15px;
        font-size: 1rem;
        color: var(--medical-blue);
        opacity: 0.6;
        transition: all 0.2s;
        cursor: pointer;
    }
    .input-box .password-toggle-icon:hover {
        opacity: 1;
        transform: scale(1.05);
    }
    .custom-checkbox {
        margin: 0;
        padding: 0;
    }
    .checkmark {
        background: var(--clay-bg);
        border-radius: 5px;
    }
    .btn-doctor, .input-box, .custom-checkbox {
        transition: all 0.2s ease;
    }
    a {
        cursor: pointer;
        text-decoration: none;
    }
    a[href="nurseforgotpass.php"]:hover, a[href="nurseregister.php"]:hover {
        text-decoration: underline;
    }
    .form-side {
        position: relative;
    }
    @media (max-width: 768px) {
        .form-side {
            padding: 1.5rem;
        }
        .modal-clay .modal-body {
            font-size: 0.9rem;
        }
    }
    button:disabled {
        opacity: 0.7;
        cursor: not-allowed;
    }
    /* Ensure the button text transition for verifying interval looks smooth */
    .btn-doctor i.fa-spinner {
        margin-right: 6px;
    }
</style>
</body>
</html>