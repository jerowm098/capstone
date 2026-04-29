<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="0">
    <title>Student Login | PUPBC CareLink</title>
    
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
            
            /* Breakpoint variables - matching nurse portal */
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

        /* Mirrored & Blurred Background - consistent with nurse portal style */
        body::before {
            content: "";
            position: absolute;
            top: 0; left: 0; right: 0; bottom: 0;
            background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.7)), 
                        url('https://images.unsplash.com/photo-1576091160550-2173dba999ef?auto=format&fit=crop&w=1200');
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

        /* ========== RESPONSIVE DIMENSIONS - MATCHING NURSE PORTAL ========== */
        
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
            
            .btn-login {
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
            
            /* Brand side moves to top on mobile */
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
            
            /* Form side moves to bottom on mobile */
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
            
            .btn-login {
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
            
            /* Adjust spacing for better mobile touch targets */
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
            
            .btn-login {
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
            
            .btn-login {
                margin-top: 0;
            }
        }

        /* BRAND SIDE - Using student-appropriate imagery & colors (PUP maroon theme) */
        .brand-side {
            background: linear-gradient(rgba(156, 12, 32, 0.85), rgba(0, 0, 0, 0.4)), 
                        url('https://images.unsplash.com/photo-1576091160550-2173dba999ef?auto=format&fit=crop&w=1200');
            background-size: cover;
            background-position: center;
            padding: 4rem;
            display: flex; flex-direction: column; justify-content: center;
            color: white;
        }

        /* FORM SIDE - Clean, light background */
        .form-side {
            padding: 3rem 4rem;
            background: rgba(253, 253, 253, 0.95);
            display: flex; flex-direction: column; justify-content: center;
        }

        .login-header h2 { font-weight: 700; color: var(--pup-maroon); margin-bottom: 0.5rem; }
        .login-header p { color: var(--medical-blue); font-size: 0.85rem; margin-bottom: 2rem; }

        /* Claymorphism Inputs - matching nurse portal style */
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
        .input-box:focus-within { border-color: var(--pup-maroon); }
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

        /* Password toggle icon styling - matches nurse portal */
        .password-toggle-icon {
            cursor: pointer;
            margin-left: 15px;
            opacity: 0.6;
            transition: opacity 0.2s, transform 0.2s;
            font-size: 1rem;
            color: var(--medical-blue);
        }
        .password-toggle-icon:hover {
            opacity: 1;
            transform: scale(1.05);
        }

        /* Custom Checkbox Styling - EXACTLY matching nurse portal (medical-blue theme) */
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
        
        /* Centered check mark - perfect alignment (matching nurse portal) */
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
        .checkbox-label-text:hover {
            color: var(--medical-blue);
            transition: color 0.2s;
        }

        /* Student-specific button using PUP maroon (differentiates from nurse portal) */
        .btn-login {
            background: var(--pup-maroon);
            color: white; border: none; border-radius: 20px;
            padding: 15px; width: 100%; font-weight: 600;
            box-shadow: 0 10px 20px rgba(156, 12, 32, 0.2);
            transition: 0.3s; margin-top: 5px;
        }
        .btn-login:hover { 
            transform: translateY(-3px); 
            box-shadow: 0 15px 30px rgba(156, 12, 32, 0.3);
            background: #7a0a1a;
        }

        .form-footer { margin-top: 1.5rem; text-align: center; font-size: 0.85rem; color: #888; }
        .form-footer a { color: var(--pup-maroon); text-decoration: none; font-weight: 600; transition: 0.2s; }
        .form-footer a:hover { text-decoration: underline; opacity: 0.85; }
        
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
            text-decoration: none;
        }
        
        /* Forgot password link hover effect */
        .forgot-link {
            transition: 0.2s;
            text-decoration: none;
        }
        .forgot-link:hover {
            text-decoration: underline !important;
            opacity: 0.8;
        }
        
        /* Ensure consistent spacing */
        .d-flex.justify-content-between {
            gap: 1rem;
        }
    </style>
</head>
<body>

<div class="login-container">
    <div class="brand-side">
        <h1 class="fw-bold">PUPBC<br>CareLink</h1>
        <p class="lead opacity-75">Centralized Health Information System for the PUP Biñan Community.</p>
        
        <div class="mt-4">
            <div class="d-flex align-items-center mb-3">
                <i class="fa-solid fa-id-card-clip me-3 fs-4"></i>
                <span>Secure Digital Identification</span>
            </div>
            <div class="d-flex align-items-center mb-3">
                <i class="fa-solid fa-notes-medical me-3 fs-4"></i>
                <span>Electronic Health Records</span>
            </div>
            <div class="d-flex align-items-center mb-3">
                <i class="fa-solid fa-hospital-user me-3 fs-4"></i>
                <span>Self-Service Patient Triage</span>
            </div>
        </div>
    </div>

    <div class="form-side">
        <div class="login-header">
            <h2>Student Portal</h2>
            <p>Log in with your credentials to access clinic services.</p>
        </div>

        <form action="dashboard/studdashboard.php" method="GET" id="loginForm">
            <label class="small fw-bold mb-1 ms-2" style="color: var(--medical-blue);">STUDENT ID NUMBER</label>
            <div class="input-box">
                <input type="text" id="studentId" placeholder="e.g. 2023-00000-BN-0" required>
                <i class="fa-solid fa-id-card"></i>
            </div>

            <label class="small fw-bold mb-1 ms-2" style="color: var(--medical-blue);">PASSWORD</label>
            <div class="input-box">
                <input type="password" id="passwordField" placeholder="••••••••" required>
                <i class="fa-regular fa-eye-slash password-toggle-icon" id="togglePassword"></i>
            </div>

            <div class="d-flex justify-content-between align-items-center mb-4 px-2">
                <!-- Custom checkbox - exactly matching nurse portal style -->
                <label class="custom-checkbox">
                    <input type="checkbox" id="rememberStudent">
                    <span class="checkmark"></span>
                    <span class="checkbox-label-text">Keep me logged in</span>
                </label>
                <a href="#" class="small forgot-link" style="color: var(--pup-maroon); font-weight: 600;">Forgot Password?</a>
            </div>

            <button type="submit" class="btn-login">
                Sign In to Portal <i class="fa-solid fa-right-to-bracket ms-2"></i>
            </button>
        </form>

        <div class="form-footer">
            New to the system? <br>
            <a href="studregister.php">Register Here</a>
            <br>
            <a href="../portal/portalmain.php" class="btn-back-footer">
                <i class="fa-solid fa-arrow-left-long"></i> Back to Main Portal
            </a>
        </div>
    </div>
</div>

<script>
    (function() {
        // Password toggle functionality - matching nurse portal exactly
        const passwordField = document.getElementById('passwordField');
        const togglePassword = document.getElementById('togglePassword');
        
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
        
        // Event listener for password toggle
        if (togglePassword) {
            togglePassword.addEventListener('click', function() {
                toggleVisibility(passwordField, togglePassword);
            });
        }
        
        // Form validation and "Keep me logged in" handling (matching nurse portal structure)
        const form = document.getElementById('loginForm');
        if (form) {
            form.addEventListener('submit', function(e) {
                const studentId = document.getElementById('studentId');
                const password = passwordField;
                
                if (studentId && studentId.value.trim() === "") {
                    e.preventDefault();
                    alert("Please enter your Student ID Number.");
                    return false;
                }
                
                if (password && password.value.trim() === "") {
                    e.preventDefault();
                    alert("Please enter your password.");
                    return false;
                }
                
                // Handle "Keep me logged in" checkbox functionality
                const rememberCheckbox = document.getElementById('rememberStudent');
                if (rememberCheckbox && rememberCheckbox.checked) {
                    localStorage.setItem('studentRememberMe', 'true');
                    // Optional: store student ID prefix for demo (non-sensitive)
                    localStorage.setItem('studentIdPrefill', studentId.value.trim());
                } else {
                    localStorage.removeItem('studentRememberMe');
                    localStorage.removeItem('studentIdPrefill');
                }
                
                // Allow form submission to studdashboard.php
                return true;
            });
        }
        
        // Pre-check the "Keep me logged in" checkbox if previously selected
        const rememberCheckbox = document.getElementById('rememberStudent');
        if (rememberCheckbox && localStorage.getItem('studentRememberMe') === 'true') {
            rememberCheckbox.checked = true;
            // Optional: prefill student ID for convenience
            const studentIdInput = document.getElementById('studentId');
            const savedId = localStorage.getItem('studentIdPrefill');
            if (studentIdInput && savedId && studentIdInput.value === "") {
                studentIdInput.value = savedId;
            }
        }
    })();
</script>

<!-- Additional refinements to ensure perfect match with nurse portal dimensions & behavior -->
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
    
    /* Ensure no conflicting checkbox styles */
    .form-check {
        display: none;
    }
    
    .custom-checkbox {
        margin: 0;
        padding: 0;
    }
    
    .checkmark {
        background: var(--clay-bg);
        border-radius: 5px;
    }
    
    /* Focus ring enhancement for accessibility */
    .custom-checkbox input:focus ~ .checkmark {
        box-shadow: inset 2px 2px 5px #d1d9e6, inset -2px -2px 5px #ffffff, 0 0 0 2px rgba(156, 12, 32, 0.3);
    }
    
    /* Button active state */
    .btn-login:active {
        transform: translateY(1px);
    }
    
    /* Smooth transitions for all interactive elements */
    .btn-login, .btn-back-footer, .forgot-link, .custom-checkbox, .password-toggle-icon {
        transition: all 0.2s ease-in-out;
    }
    
    /* Ensure the container doesn't overflow on very small devices */
    @media screen and (max-width: 360px) {
        .brand-side, .form-side {
            padding: 1rem 0.75rem;
        }
        
        .login-header h2 {
            font-size: 1rem;
        }
        
        .input-box {
            padding: 3px 10px;
        }
    }
    
    /* Maintain consistent height for tablet landscape */
    @media screen and (min-width: 769px) and (max-width: 992px) and (orientation: landscape) {
        .login-container {
            min-height: 500px;
        }
    }
</style>
</body>
</html>