<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="forgot-password.css">
    <title>Reset Password | Digital Healthcare</title>
</head>
<body class="d-flex align-items-center justify-content-center vh-100 bg-light">

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5 col-lg-4">
            <div class="card border-0 shadow-lg p-4 bg-white">
                
                <div class="text-center mb-4"> 
                    <a class="navbar-brand fw-bold text-dark fs-3 d-block mb-2" href="../index/indexhtml.php">HEALTH<span class="text-secondary">CARE</span></a>
                    <h4 class="fw-bold">Update Password</h4>
                    <p class="text-muted small">Please enter your account details below.</p>
                </div>

                <form id="updatePasswordForm" autocomplete="off">
    <div class="input-group mb-3">
        <div class="form-floating flex-grow-1">
            <input type="email" id="emailInput" class="form-control" placeholder="name@gmail.com" required>
            <label for="emailInput">Email Address</label>
        </div>
        <span class="input-group-text bg-transparent">
            <i class="bi bi-envelope text-muted"></i>
        </span>
    </div>

    <div class="input-group mb-3">
        <div class="form-floating flex-grow-1">
            <input type="password" id="oldPassword" class="form-control" placeholder="Old Password" required>
            <label for="oldPassword">Old Password</label>
        </div>
        <span class="input-group-text bg-transparent" id="toggleOldPassword" style="cursor: pointer;">
            <i class="bi bi-eye-slash text-muted" id="iconOld"></i>
        </span>
    </div>

    <div class="input-group mb-4">
        <div class="form-floating flex-grow-1">
            <input type="password" id="newPassword" class="form-control" placeholder="New Password" required>
            <label for="newPassword">New Password</label>
        </div>
        <span class="input-group-text bg-transparent" id="toggleNewPassword" style="cursor: pointer;">
            <i class="bi bi-eye-slash text-muted" id="iconNew"></i>
        </span>
    </div>

    <div class="input-group mb-4">
        <div class="form-floating flex-grow-1">
            <input type="password" id="confirmPassword" class="form-control" placeholder="Confirm Password" required>
            <label for="confirmPassword">Confirm New Password</label>
        </div>
        <span class="input-group-text bg-transparent" id="toggleConfirmPassword" style="cursor: pointer;">
            <i class="bi bi-eye-slash text-muted" id="iconConfirm"></i>
        </span>
    </div>

    <button type="submit" class="btn btn-dark w-100 py-3 mb-3 fw-bold">UPDATE PASSWORD</button>
    
    <div class="text-center">
        <a href="../login/loginhtml.php" class="text-decoration-none text-muted small">
            Return to <span class="text-dark fw-bold">Login</span>
        </a>
    </div>
</form>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="forgot-password.js"></script>
</body>
</html>