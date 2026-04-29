<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="studentcreateaccountstyle.css">
    <title>Create Account | Healthcare</title>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>

<div class="container d-flex justify-content-center">
    <div class="create-card">
        
        <div class="logo-section text-center">
            <a class="navbar-brand text-dark fs-4 fw-bold" href="indexhtml.php">
                HEALTH<span class="text-secondary">CARE</span>
            </a>
            <h2 class="fw-bold">Create Student Account</h2>
            <p class="text-muted small">Fill in your details to complete registration.</p>
        </div>

        <div class="row g-0 align-items-start"> <div class="col-md-7 pe-md-4">
                <form onsubmit="handleRegistration(event)">
                    <div class="mb-2">
                        <label class="form-label">Official Student ID</label>
                        <input type="text" class="form-control" placeholder="2019-00123-BN-0" required>
                    </div>

                    <div class="row g-2 mb-2">
                        <div class="col-6">
                            <label class="form-label">First Name</label>
                            <input type="text" class="form-control" placeholder="Juan" required>
                        </div>
                        <div class="col-6">
                            <label class="form-label">Last Name</label>
                            <input type="text" class="form-control" placeholder="Dela Cruz" required>
                        </div>
                    </div>

                    <div class="row g-2 mb-2">
                        <div class="col-5">
                            <label class="form-label">Birthday</label>
                            <input type="date" class="form-control" id="birthday" onchange="calculateAge()" required>
                        </div>
                        <div class="col-3">
                            <label class="form-label">Age</label>
                            <input type="number" class="form-control" id="age" placeholder="0" readonly>
                        </div>
                        <div class="col-4">
                            <label class="form-label">Gender</label>
                            <select class="form-select" required>
                                <option value="" selected disabled>Select</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>
                    </div>

                    <div class="agreement-section mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="agree" required>
                            <label class="form-check-label small text-muted" for="agree" style="font-size: 0.75rem;">
                                I hereby certify that the information provided is true and correct.
                            </label>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-create w-100 shadow-sm">Create My Account</button>

                    <div class="text-center mt-2">
                        <small class="text-muted">Already have an account? <a href="studentloginhtml.php" class="login-link text-dark fw-bold">Login</a></small>
                    </div>
                </form>
            </div>

            <div class="col-md-5 mt-md-0 mt-4">
                <div class="qr-side-container text-center border-start ps-3">
                    <label class="form-label fw-bold mb-2 text-uppercase small" style="letter-spacing: 1px;">Patient ID</label>
                    <div id="qrcode"></div>
                    <div class="id-badge" id="displayID">STU-0000</div>
                    <input type="hidden" name="student_id_auto" id="hiddenID">
                    
                    <div class="password-display-section mt-3 w-100">
                        <label class="form-label fw-bold small text-uppercase mb-1">Generated Password</label>
                        <div class="input-group input-group-sm">
                            <span class="input-group-text bg-light border-end-0"><i class="bi bi-lock-fill"></i></span>
                            <input type="text" class="form-control bg-light border-start-0 text-center fw-bold" id="generatedPassword" readonly>
                        </div>
                        <p class="text-danger mb-0 mt-1 fw-bold" style="font-size: 0.7rem;">Save this password!</p>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<script>
    function calculateAge() {
        const birthDateInput = document.getElementById('birthday').value;
        if (!birthDateInput) return;
        const birthDate = new Date(birthDateInput);
        const today = new Date();
        let age = today.getFullYear() - birthDate.getFullYear();
        const monthDiff = today.getMonth() - birthDate.getMonth();
        if (monthDiff < 0 || (monthDiff === 0 && today.getDate() < birthDate.getDate())) { age--; }
        document.getElementById('age').value = age;
    }
</script>

<script src="studentcreateaccounthtml.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>