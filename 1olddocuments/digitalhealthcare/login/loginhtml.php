
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <link rel="stylesheet" href="login.css">
    <title>Login | Digital Healthcare</title>
</head>
<body>
<div id="page-content" class="animate__animated animate__fadeIn">
    <div class="container-fluid vh-100">
        <div class="row vh-100">
            
            <div class="col-md-6 d-none d-md-block p-0">
                <div class="login-image"></div>
            </div>

            <div class="col-md-6 d-flex align-items-center bg-white">
                <div class="login-form-container mx-auto">
                    
                    <div class="mb-5 text-center text-md-start">
                        <a class="navbar-brand fw-bold text-dark fs-3" href="../index/index.html">HEALTH<span class="text-secondary">CARE</span></a>
                        <h2 class="fw-bold mt-4">Welcome Back</h2>
                        <p class="text-muted">Please enter your details to access your portal.</p>
                    </div>

                    <form id="loginForm" class="needs-validation" novalidate autocomplete="off">
        
                        <div class="mb-4"> 
    <div class="floating-group position-relative">
        <input type="email" name="email" id="loginEmail" class="form-control custom-input" placeholder=" " required>
        <label class="floating-label">EMAIL ADDRESS</label>
        <i class="bi bi-envelope position-absolute top-50 end-0 translate-middle-y me-3 text-muted"></i>
    </div>
    <div class="invalid-feedback small">Please enter your registered email.</div>
</div>

<div class="mb-3">
    <div class="floating-group position-relative">
        <input type="password" name="password" id="loginPassword" class="form-control custom-input" placeholder=" " required>
        <label class="floating-label">PASSWORD</label>
        <i class="bi bi-eye-slash position-absolute top-50 end-0 translate-middle-y me-3 text-muted" id="toggleLoginPassword" style="cursor: pointer;"></i>
    </div>
    <div class="invalid-feedback small">Password is required.</div>
</div>

                        <div class="d-flex justify-content-between mb-4">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="remember">
                                <label class="form-check-label small" for="remember">Remember me</label>
                            </div>
                            <a href="../forgotpass/forgot-passwordhtml.php" class="text-dark small fw-bold text-decoration-none">Forgot password?</a>
                        </div>

                        <button type="submit" class="btn btn-dark w-100 py-2 mb-4">LOGIN</button>

                        <div class="text-center">
                            <p class="small text-muted">New user? <a href="../createaccount/create-accounthtml.php?startAnim=1" class="text-dark fw-bold text-decoration-none">Create an account</a></p>
                        </div>
                    </form>

                    <div class="mt-5 text-center">
                        <a href="../portal/chooseportal.php" class="text-muted small text-decoration-none">← Choose Portal</a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>



<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="login.js"></script>



</body>
</html>