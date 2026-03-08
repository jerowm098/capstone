<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="studentloginstyle.css">
    <title>Student Login | Healthcare</title>
    <script src="https://unpkg.com/html5-qrcode"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>

<div class="login-card">
    <div class="logo-section">
        <a class="navbar-brand text-dark fw-bold" href="indexhtml.php">
            HEALTH<span class="text-secondary">CARE</span>
        </a>
    </div>

    <div class="welcome-msg text-center">
        <h2 class="fw-bold">Student Portal</h2>
        <p class="text-muted">Login with ID or upload QR code.</p>
    </div>

    <div class="mb-3 text-center">
        <input type="file" id="qr-input" accept="image/*" style="display:none">
        <button type="button" class="btn btn-outline-dark btn-sm fw-bold w-100 py-2" onclick="document.getElementById('qr-input').click()">
            <i class="bi bi-upload me-2"></i> UPLOAD QR TO LOGIN
        </button>
    </div>

    <div class="divider-text">
        <span>OR LOGIN MANUALLY</span>
    </div>

    <form action="process_login.php" method="POST">
        <div class="mb-2">
            <label for="username" class="form-label">Patient ID</label>
            <input type="text" class="form-control" id="username" name="username" placeholder="e.g. STU-0000" required>
        </div>

        <div class="mb-2">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="••••••••" required>
        </div>

        <div class="login-options">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="rememberMe">
                <label class="form-check-label text-muted" for="rememberMe" style="font-size: 0.75rem;">Remember me</label>
            </div>
            <a href="#" class="forgot-link small">Forgot password?</a>
        </div>

        <button type="submit" class="btn btn-login shadow-sm">Login to Portal</button>

        <div class="register-text text-center">
            Don't have an account? <a href="studentcreateaccounthtml.php" class="text-dark fw-bold text-decoration-none">Create Account</a>
        </div>
    </form>

    <div class="text-center mt-3">
        <a href="../portal/chooseportal.php" class="text-decoration-none text-muted small">
            <i class="bi bi-arrow-left"></i> Change Portal
        </a>
    </div>
</div>

<div id="reader" style="display:none"></div>

<script>
    const html5QrCode = new Html5Qrcode("reader");
    const fileInput = document.getElementById('qr-input');

    fileInput.addEventListener('change', e => {
        if (e.target.files.length === 0) return;
        const imageFile = e.target.files[0];
        
        Swal.fire({
            title: 'Scanning QR Code...',
            allowOutsideClick: false,
            didOpen: () => { Swal.showLoading(); }
        });

        html5QrCode.scanFile(imageFile, true)
            .then(decodedText => {
                const data = decodedText.split('|');
                if (data.length >= 1) {
                    document.getElementById('username').value = data[0];
                    if(data[1]) document.getElementById('password').value = data[1];
                    
                    Swal.fire({
                        icon: 'success',
                        title: 'QR Recognized!',
                        text: 'Credentials filled automatically.',
                        timer: 1500,
                        showConfirmButton: false
                    });
                }
            })
            .catch(err => {
                Swal.fire({
                    icon: 'error',
                    title: 'Scan Failed',
                    text: 'Valid QR code not found.'
                });
            });
    });
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>