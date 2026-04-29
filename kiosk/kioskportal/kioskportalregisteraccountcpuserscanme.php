<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
    <title>CareLink CP User Registration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            padding: 20px;
        }
        .registration-container {
            max-width: 500px;
            margin: 0 auto;
            background: white;
            border-radius: 20px;
            padding: 30px;
            box-shadow: 0 20px 60px rgba(0,0,0,0.3);
        }
        .header {
            text-align: center;
            margin-bottom: 30px;
        }
        .header i {
            font-size: 60px;
            color: #9C0C20;
        }
        .form-group {
            margin-bottom: 20px;
        }
        label {
            font-weight: 600;
            margin-bottom: 8px;
            display: block;
            color: #333;
        }
        input, select {
            width: 100%;
            padding: 12px;
            border: 2px solid #e0e0e0;
            border-radius: 10px;
            font-size: 16px;
            transition: border-color 0.3s;
        }
        input:focus, select:focus {
            outline: none;
            border-color: #9C0C20;
        }
        .btn-register {
            width: 100%;
            padding: 14px;
            background: #9C0C20;
            color: white;
            border: none;
            border-radius: 10px;
            font-size: 18px;
            font-weight: 600;
            cursor: pointer;
            transition: transform 0.2s, background 0.2s;
        }
        .btn-register:hover {
            background: #7a0919;
            transform: translateY(-2px);
        }
        .info-note {
            text-align: center;
            margin-top: 20px;
            font-size: 12px;
            color: #666;
        }
    </style>
</head>
<body>
    <div class="registration-container">
        <div class="header">
            <i class="fas fa-user-plus"></i>
            <h2 class="mt-3">CP User Registration</h2>
            <p class="text-muted">Create your CareLink Account</p>
        </div>
        
        <form id="registrationForm">
            <div class="form-group">
                <label><i class="fas fa-user"></i> Full Name</label>
                <input type="text" id="fullName" required placeholder="Juan Dela Cruz">
            </div>
            
            <div class="form-group">
                <label><i class="fas fa-envelope"></i> Email Address</label>
                <input type="email" id="email" required placeholder="juan@example.com">
            </div>
            
            <div class="form-group">
                <label><i class="fas fa-phone"></i> Mobile Number</label>
                <input type="tel" id="mobile" required placeholder="09171234567">
            </div>
            
            <div class="form-group">
                <label><i class="fas fa-calendar"></i> Birth Date</label>
                <input type="date" id="birthDate" required>
            </div>
            
            <div class="form-group">
                <label><i class="fas fa-map-marker-alt"></i> Address</label>
                <input type="text" id="address" required placeholder="Your complete address">
            </div>
            
            <div class="form-group">
                <label><i class="fas fa-lock"></i> Create Password</label>
                <input type="password" id="password" required placeholder="Minimum 8 characters">
            </div>
            
            <button type="submit" class="btn-register">
                <i class="fas fa-check-circle"></i> Complete Registration
            </button>
        </form>
        
        <div class="info-note">
            <i class="fas fa-shield-alt"></i> Your data is encrypted and secure
        </div>
    </div>

    <script>
        document.getElementById('registrationForm').addEventListener('submit', async (e) => {
            e.preventDefault();
            
            // Get form data
            const formData = {
                fullName: document.getElementById('fullName').value,
                email: document.getElementById('email').value,
                mobile: document.getElementById('mobile').value,
                birthDate: document.getElementById('birthDate').value,
                address: document.getElementById('address').value,
                password: document.getElementById('password').value,
                source: 'kiosk_qr_scan',
                timestamp: new Date().toISOString()
            };
            
            // Basic validation
            if (formData.password.length < 8) {
                Swal.fire('Error', 'Password must be at least 8 characters', 'error');
                return;
            }
            
            // Show loading
            Swal.fire({
                title: 'Registering...',
                text: 'Please wait while we create your account',
                allowOutsideClick: false,
                didOpen: () => Swal.showLoading()
            });
            
            // Simulate API call (replace with actual backend)
            setTimeout(() => {
                // Store in localStorage for demo
                const users = JSON.parse(localStorage.getItem('carelink_users') || '[]');
                users.push(formData);
                localStorage.setItem('carelink_users', JSON.stringify(users));
                
                Swal.fire({
                    title: 'Registration Successful!',
                    html: `Welcome ${formData.fullName}!<br>Your CP User account has been created.<br><br>
                           <small>Check your email for verification link</small>`,
                    icon: 'success',
                    confirmButtonText: 'Continue'
                }).then(() => {
                    // Redirect or close
                    window.location.href = 'https://carelink.pup.edu.ph/dashboard';
                });
            }, 2000);
        });
    </script>
</body>
</html>