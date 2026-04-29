<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="0">
    <title>Student Registration | PUPBC CareLink</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">

    <style>
        :root {
            --pup-maroon: #9C0C20;
            --medical-blue: #475867;
            --clay-bg: #f0f0f0;
            --clay-shadow: 8px 8px 16px #d1d9e6, -8px -8px 16px #ffffff;
            --clay-inset: inset 4px 4px 8px #d1d9e6, inset -4px -4px 8px #ffffff;
            
            /* Tablet breakpoint */
            --tablet-width: 768px;
            /* Mobile breakpoint */
            --mobile-width: 480px;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0;
            padding: 20px;
            position: relative;
            background: #000;
        }

        body::before {
            content: "";
            position: fixed;
            top: 0; left: 0; right: 0; bottom: 0;
            background: linear-gradient(rgba(0, 0, 0, 0.55), rgba(0, 0, 0, 0.55)), 
                        url('https://images.unsplash.com/photo-1576091160550-2173dba999ef?auto=format&fit=crop&w=1200');
            background-size: cover;
            background-position: center;
            filter: blur(10px);
            transform: scale(1.1);
            z-index: -1;
        }

        .registration-container {
            width: 100%;
            max-width: 1100px;
            height: 650px;
            background: transparent;
            border-radius: 40px;
            /* Same as nurse/staff class: form side wider on left (1.2fr), brand side on right (1fr) */
            display: grid;
            grid-template-columns: 1.2fr 1fr;
            overflow: hidden;
            box-shadow: 0 25px 50px rgba(0,0,0,0.4);
            position: relative;
            backdrop-filter: blur(5px);
        }

        /* TABLET DIMENSIONS (same as nurse registration) */
        @media screen and (max-width: 992px) and (min-width: 769px) {
            .registration-container {
                max-width: 90%;
                height: auto;
                min-height: 600px;
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
                font-size: 0.9rem;
            }
            
            .form-side {
                padding: 2rem;
            }
            
            .input-row {
                gap: 12px;
            }
            
            .email-role-row {
                gap: 12px;
            }
            
            .registration-header h2 {
                font-size: 1.5rem;
            }
            
            .registration-header p {
                font-size: 0.8rem;
            }
            
            .btn-register {
                padding: 12px;
                font-size: 0.9rem;
            }
        }
        
        /* MOBILE DIMENSIONS (matching nurse/staff registration exactly) */
        @media screen and (max-width: 768px) {
            body {
                overflow-y: auto;
                height: auto;
                min-height: 100vh;
                align-items: flex-start;
                padding: 20px;
            }
            
            .registration-container {
                grid-template-columns: 1fr;
                height: auto;
                max-width: 100%;
                border-radius: 20px;
                flex-direction: column;
            }
            
            /* Brand side moves to top on mobile */
            .brand-side {
                order: 1 !important;
                padding: 2rem 1.5rem;
                text-align: center;
                border-radius: 20px 20px 0 0;
            }
            
            .brand-side h1 {
                font-size: 1.8rem !important;
            }
            
            .brand-side p {
                font-size: 0.85rem;
            }
            
            .brand-side .d-flex {
                justify-content: center;
            }
            
            /* Form side moves to bottom on mobile */
            .form-side {
                order: 2 !important;
                padding: 1.5rem;
                border-radius: 0 0 20px 20px;
            }
            
            .registration-header h2 {
                font-size: 1.3rem;
            }
            
            .registration-header p {
                font-size: 0.75rem;
                margin-bottom: 1rem;
            }
            
            /* Stack rows vertically on mobile */
            .input-row {
                grid-template-columns: 1fr;
                gap: 0px;
            }
            
            .email-role-row {
                grid-template-columns: 1fr;
                gap: 0px;
            }
            
            .field-label {
                font-size: 0.65rem;
                margin-top: 10px;
            }
            
            .input-box {
                padding: 2px 15px;
                margin-bottom: 12px;
            }
            
            .input-box input, 
            .input-box select {
                font-size: 0.8rem;
                padding: 8px 0;
            }
            
            .btn-register {
                padding: 12px;
                font-size: 0.85rem;
                margin-top: 15px;
            }
            
            .form-footer {
                margin-top: 1rem;
                font-size: 0.75rem;
            }
            
            .btn-back-footer {
                font-size: 0.7rem;
            }
            
            /* Adjust brand side icons for mobile */
            .brand-side .mt-4 {
                margin-top: 1rem !important;
            }
            
            .brand-side .d-flex {
                margin-bottom: 0.5rem !important;
            }
            
            .brand-side i {
                font-size: 0.9rem;
            }
            
            .brand-side span {
                font-size: 0.8rem;
            }
        }
        
        /* SMALL MOBILE DIMENSIONS (<=480px) matching nurse class */
        @media screen and (max-width: 480px) {
            body {
                padding: 10px;
            }
            
            .brand-side {
                padding: 1.5rem 1rem;
            }
            
            .brand-side h1 {
                font-size: 1.5rem !important;
            }
            
            .brand-side p {
                font-size: 0.75rem;
            }
            
            .form-side {
                padding: 1rem;
            }
            
            .registration-header h2 {
                font-size: 1.1rem;
            }
            
            .registration-header p {
                font-size: 0.7rem;
            }
            
            .field-label {
                font-size: 0.6rem;
                margin-left: 8px;
            }
            
            .input-box {
                padding: 2px 12px;
                margin-bottom: 10px;
            }
            
            .input-box i {
                font-size: 0.8rem;
            }
            
            .input-box input, 
            .input-box select {
                font-size: 0.75rem;
                padding: 6px 0;
            }
            
            .btn-register {
                padding: 10px;
                font-size: 0.8rem;
            }
            
            .form-footer {
                font-size: 0.7rem;
            }
            
            .brand-side .d-flex {
                font-size: 0.7rem;
            }
            
            .brand-side i {
                font-size: 0.8rem;
                margin-right: 0.5rem !important;
            }
        }

        /* BRAND SIDE (now on RIGHT - same as staff class) */
        .brand-side {
            background: linear-gradient(rgba(156, 12, 32, 0.88), rgba(0, 0, 0, 0.55)), 
                        url('https://images.unsplash.com/photo-1576091160550-2173dba999ef?auto=format&fit=crop&w=1200');
            background-size: cover;
            background-position: center;
            padding: 4rem;
            display: flex;
            flex-direction: column;
            justify-content: center;
            color: white;
            order: 2; /* Forces brand side to the right (matching nurse layout) */
        }

        /* FORM SIDE (now on LEFT - matching nurse registration) */
        .form-side {
            padding: 3rem 4rem;
            background: rgba(253, 253, 253, 0.96);
            display: flex;
            flex-direction: column;
            justify-content: center;
            order: 1; /* Forces form side to the left */
        }

        /* CENTERED HEADER consistent with staff design */
        .registration-header h2 { 
            font-weight: 700; 
            color: var(--pup-maroon); 
            margin-bottom: 0.5rem; 
            text-align: center; 
        }
        .registration-header p { 
            color: var(--medical-blue); 
            font-size: 0.9rem; 
            margin-bottom: 2rem; 
            text-align: center; 
        }

        .input-box {
            background: var(--clay-bg);
            border-radius: 20px;
            padding: 2px 20px;
            box-shadow: var(--clay-inset);
            display: flex; 
            align-items: center;
            justify-content: space-between;
            margin-bottom: 15px;
            border: 2px solid transparent;
            transition: 0.3s;
        }
        .input-box:focus-within { border-color: var(--pup-maroon); }
        .input-box i { 
            color: var(--medical-blue); 
            margin-left: 10px; 
            opacity: 0.6; 
            font-size: 0.9rem;
            cursor: pointer;
            transition: opacity 0.2s ease;
        }
        .input-box i:hover {
            opacity: 1;
        }
        .input-box input, 
        .input-box select {
            background: transparent; 
            border: none; 
            outline: none;
            width: 100%; 
            padding: 10px 0;
            font-size: 0.85rem;
            color: var(--medical-blue);
            font-family: 'Poppins', sans-serif;
            cursor: pointer;
        }
        
        /* Custom dropdown styling */
        .input-box select {
            appearance: none;
            background: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="%23475867" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="6 9 12 15 18 9"></polyline></svg>') no-repeat right center;
            background-size: 14px;
            padding-right: 30px;
            text-indent: 0;
        }
        
        .input-box select option {
            padding: 8px;
            font-family: 'Poppins', sans-serif;
            padding-left: 12px;
            padding-right: 12px;
        }
        
        /* Hide the placeholder option from dropdown list */
        select option[hidden] {
            display: none !important;
        }

        /* Side-by-Side Grid (matching nurse class) */
        .input-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 15px;
        }

        /* Row for email + patient type */
        .email-role-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 15px;
            margin-bottom: 0;
        }

        .btn-register {
            background: var(--pup-maroon);
            color: white;
            border: none;
            border-radius: 20px;
            padding: 15px;
            width: 100%;
            font-weight: 600;
            box-shadow: 0 10px 20px rgba(156, 12, 32, 0.2);
            transition: 0.3s;
            margin-top: 10px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }
        .btn-register:hover { 
            transform: translateY(-3px); 
            background: #7a0a1a;
            box-shadow: 0 15px 30px rgba(156, 12, 32, 0.3); 
        }

        .form-footer { 
            margin-top: 1.5rem; 
            text-align: center; 
            font-size: 0.85rem; 
            color: #888; 
        }
        .form-footer a { 
            color: var(--pup-maroon); 
            text-decoration: none; 
            font-weight: 600; 
        }
        
        .btn-back-footer {
            display: inline-block;
            margin-top: 1rem;
            color: var(--medical-blue) !important;
            font-size: 0.8rem;
            transition: 0.3s;
            opacity: 0.8;
            text-decoration: none;
        }
        .btn-back-footer:hover { 
            opacity: 1; 
            transform: translateX(-3px); 
            color: var(--pup-maroon) !important; 
        }

        /* Field labels */
        .field-label {
            font-size: 0.7rem;
            font-weight: 700;
            letter-spacing: 0.5px;
            color: var(--medical-blue);
            margin-bottom: 5px;
            margin-left: 12px;
            display: block;
        }

        /* Additional padding fix for consistent alignment */
        .input-box {
            padding-left: 18px;
            padding-right: 18px;
        }
        .input-box select,
        .input-box input {
            padding-left: 4px;
        }
        .input-box i {
            flex-shrink: 0;
        }
        
        /* Toggle password eye icon specific styling */
        .password-toggle-icon {
            cursor: pointer;
            margin-left: 10px;
            opacity: 0.6;
            transition: opacity 0.2s;
            font-size: 0.9rem;
            color: var(--medical-blue);
        }
        .password-toggle-icon:hover {
            opacity: 1;
        }
        
        /* Override small label style to match consistent design */
        .small-label-override {
            font-size: 0.7rem;
            font-weight: 700;
            letter-spacing: 0.5px;
            color: var(--medical-blue);
            margin-bottom: 5px;
            margin-left: 12px;
            display: block;
        }
        
        /* Ensure select placeholder color matches nurse class */
        .input-box select:invalid {
            color: #8e9aaf;
        }
        
        /* Fine-tune password toggle icon positioning */
        .input-box .password-toggle-icon {
            margin-left: 10px;
            font-size: 0.9rem;
            color: var(--medical-blue);
            opacity: 0.7;
            transition: all 0.2s;
            cursor: pointer;
        }
        .input-box .password-toggle-icon:hover {
            opacity: 1;
            transform: scale(1.05);
        }
        .input-box input[type="password"], 
        .input-box input[type="text"] {
            padding-right: 5px;
        }
        .input-box i:not(.password-toggle-icon) {
            opacity: 0.6;
        }
        .input-box {
            gap: 8px;
        }
    </style>
</head>
<body>

<div class="registration-container">
    <div class="form-side">
        <div class="registration-header">
            <h2>Student Registration</h2>
            <p>Enroll your details to access the PUP Health Portal</p>
        </div>

        <form action="studlogin.php" method="POST" id="studentRegForm">
            <!-- First Row: First Name + Last Name -->
            <div class="input-row">
                <div>
                    <label class="field-label">FIRST NAME</label>
                    <div class="input-box">
                        <input type="text" id="firstName" placeholder="e.g. Juan" required>
                    </div>
                </div>
                <div>
                    <label class="field-label">LAST NAME</label>
                    <div class="input-box">
                        <input type="text" id="lastName" placeholder="e.g. Dela Cruz" required>
                    </div>
                </div>
            </div>

            <!-- Row: Email + Patient Type (side by side) -->
            <div class="email-role-row">
                <div>
                    <label class="field-label">WEBMAIL EMAIL</label>
                    <div class="input-box">
                        <input type="email" id="emailField" placeholder="student@pup.edu.ph" required>
                        <i class="fa-solid fa-envelope"></i>
                    </div>
                </div>
                <div>
                    <label class="field-label">PATIENT TYPE</label>
                    <div class="input-box">
                        <select name="patient_type" id="patientTypeSelect" required>
                            <!-- Hidden placeholder option: not visible in dropdown list but shown initially -->
                            <option value="" disabled selected hidden>Select your role</option>
                            <option value="student_patient">Student Patient</option>
                            <option value="faculty_patient">Student</option>
                            <option value="staff_patient">Patient</option>
                        </select>
                        <i class="fa-solid fa-user-injured"></i>
                    </div>
                </div>
            </div>

            <!-- Password Row: with toggle icons (matching nurse/staff toggle style) -->
            <div class="input-row" style="margin-top: 5px;">
                <div>
                    <label class="field-label">PASSWORD</label>
                    <div class="input-box">
                        <input type="password" id="studPasswordField" placeholder="••••••••" required>
                        <i class="fa-regular fa-eye-slash password-toggle-icon" id="toggleStudPassword"></i>
                    </div>
                </div>
                <div>
                    <label class="field-label">CONFIRM PASSWORD</label>
                    <div class="input-box">
                        <input type="password" id="studConfirmField" placeholder="••••••••" required>
                        <i class="fa-regular fa-eye-slash password-toggle-icon" id="toggleStudConfirm"></i>
                    </div>
                </div>
            </div>

            <button type="submit" class="btn-register">
                Register Profile <i class="fa-solid fa-user-plus ms-2"></i>
            </button>
        </form>

        <div class="form-footer">
            Already have a health profile? <br>
            <a href="studlogin.php">Login Here</a>
            <br>
            <a href="../portal/portalmain.php" class="btn-back-footer">
                <i class="fa-solid fa-arrow-left-long"></i> Back to Portal
            </a>
        </div>
    </div>

    <div class="brand-side">
        <h1 class="display-4 fw-bold">Student<br>CareLink</h1>
        <p class="lead opacity-75">Your digital health journey starts here.</p>
        <div class="mt-4">
            <div class="d-flex align-items-center mb-3">
                <i class="fa-solid fa-id-card me-3"></i>
                <span>Secure Student Enrollment</span>
            </div>
            <div class="d-flex align-items-center">
                <i class="fa-solid fa-shield-heart me-3"></i>
                <span>Data Privacy Protected</span>
            </div>
        </div>
    </div>
</div>

<script>
    (function() {
        // Password toggle functionality for student registration form (matching nurse class)
        const passwordField = document.getElementById('studPasswordField');
        const togglePassword = document.getElementById('toggleStudPassword');
        
        const confirmField = document.getElementById('studConfirmField');
        const toggleConfirm = document.getElementById('toggleStudConfirm');
        
        // Helper function to toggle visibility
        function toggleVisibility(inputField, toggleIcon) {
            if (inputField.type === 'password') {
                inputField.type = 'text';
                toggleIcon.classList.remove('fa-eye-slash');
                toggleIcon.classList.add('fa-eye');
            } else {
                inputField.type = 'password';
                toggleIcon.classList.remove('fa-eye');
                toggleIcon.classList.add('fa-eye-slash');
            }
        }
        
        // Event listener for password field
        if (togglePassword) {
            togglePassword.addEventListener('click', function() {
                toggleVisibility(passwordField, togglePassword);
            });
        }
        
        // Event listener for confirm password field
        if (toggleConfirm) {
            toggleConfirm.addEventListener('click', function() {
                toggleVisibility(confirmField, toggleConfirm);
            });
        }
        
        // Form validation: password match, strength, and patient type selection
        const form = document.getElementById('studentRegForm');
        const patientTypeSelect = document.getElementById('patientTypeSelect');
        const firstNameInput = document.getElementById('firstName');
        const lastNameInput = document.getElementById('lastName');
        const emailInput = document.getElementById('emailField');
        
        if (form) {
            form.addEventListener('submit', function(e) {
                // Check if passwords match
                const password = passwordField ? passwordField.value : '';
                const confirm = confirmField ? confirmField.value : '';
                
                if (password !== confirm) {
                    e.preventDefault();
                    alert("Passwords do not match. Please confirm your password.");
                    return false;
                }
                
                // Check password strength: at least 6 characters (same as nurse class)
                if (password.length < 6) {
                    e.preventDefault();
                    alert("Password must be at least 6 characters long for security.");
                    return false;
                }
                
                // Validate patient type selection (not empty)
                if (patientTypeSelect && patientTypeSelect.value === "") {
                    e.preventDefault();
                    alert("Please select a valid patient type.");
                    return false;
                }
                
                // Validate first name and last name not empty
                if (firstNameInput && firstNameInput.value.trim() === "") {
                    e.preventDefault();
                    alert("Please enter your first name.");
                    return false;
                }
                
                if (lastNameInput && lastNameInput.value.trim() === "") {
                    e.preventDefault();
                    alert("Please enter your last name.");
                    return false;
                }
                
                // Basic email validation (simple)
                if (emailInput && emailInput.value.trim() !== "") {
                    const emailPattern = /^[^\s@]+@([^\s@]+\.)+[^\s@]+$/;
                    if (!emailPattern.test(emailInput.value.trim())) {
                        e.preventDefault();
                        alert("Please enter a valid email address (e.g., student@pup.edu.ph).");
                        return false;
                    }
                } else {
                    e.preventDefault();
                    alert("Email address is required.");
                    return false;
                }
                
                // All valid, form will submit to studlogin.html as original action
                return true;
            });
        }
        
        // Additional micro-interaction: ensure hidden placeholder option does not appear in dropdown
        if (patientTypeSelect) {
            // The hidden attribute ensures "Select your role" does not appear in dropdown list
            // Perfect UX matching the staff registration style
        }
        
        // Optional: add focus ripple effect consistency (just to match interactivity)
        const inputBoxes = document.querySelectorAll('.input-box');
        inputBoxes.forEach(box => {
            const input = box.querySelector('input, select');
            if (input) {
                input.addEventListener('focus', () => {
                    box.style.borderColor = 'var(--pup-maroon)';
                });
                input.addEventListener('blur', () => {
                    box.style.borderColor = 'transparent';
                });
            }
        });
    })();
</script>
</body>
</html>