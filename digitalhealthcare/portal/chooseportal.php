<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../index/indexstyle.css">
    <title>Choose Portal | Healthcare</title>
<style>
    .portal-container {
        height: 100vh;
        overflow: hidden;
    }
    .portal-image {
        background-image: url('https://i.ytimg.com/vi/RAvOGYuZRA4/maxresdefault.jpg');
        background-size: cover;
        background-position: center;
    }
    .portal-content {
        display: flex;
        flex-direction: column;
        justify-content: center;
        padding: 4rem;
    }

/* --- Common Portal Button Style --- */
    .btn-portal {
        padding: 18px;
        font-weight: 600;
        margin-bottom: 1.2rem;
        border-radius: 10px;
        transition: all 0.3s ease;
        border: 2px solid #000; 
        text-decoration: none;
        
        /* Ito ang "Initial State" - Parehong Black */
        background-color: #000;
        color: #fff !important;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    /* Ito ang "Hover State" - Parehong mag-i-invert sa White */
    .btn-portal:hover {
        background-color: #fff !important;
        color: #000 !important;
        transform: translateY(-3px);
        box-shadow: 0 10px 20px rgba(0,0,0,0.1);
    }

    /* 1. Student Portal (Black to White Invert) */
    .btn-student {
        background-color: #000;
        color: #fff !important;
    }
    .btn-student:hover {
        background-color: #fff !important;
        color: #000 !important;
        transform: translateY(-3px);
        box-shadow: 0 10px 20px rgba(0,0,0,0.1);
    }

    /* 2. Doctor Portal (White to Black Invert) */
    .btn-doctor {
        background-color: #fff;
        color: #000 !important;
    }
    .btn-doctor:hover {
        background-color: #000 !important;
        color: #fff !important;
        transform: translateY(-3px);
        box-shadow: 0 10px 20px rgba(0,0,0,0.1);
    }

    .agreement-text {
        font-size: 0.8rem;
        color: #6c757d;
        margin-top: 2rem;
        line-height: 1.5;
    }
    .fade-in-content {
        animation: fadeIn 0.8s ease-in-out;
    }
    @keyframes fadeIn {
        from { opacity: 0; transform: translateX(20px); }
        to { opacity: 1; transform: translateX(0); }
    }
</style>
</head>
<body>

<div class="container-fluid p-0">
    <div class="row g-0 portal-container">
        
        <div class="col-md-8 d-none d-md-block portal-image">
            <div class="h-100 w-100" style="background: rgba(0,0,0,0.05);"></div>
        </div>

        <div class="col-md-4 bg-white portal-content fade-in-content">
            
            <div class="mb-5">
                <a class="navbar-brand fw-bold text-dark fs-2" href="indexhtml.php">HEALTH<span class="text-secondary">CARE</span></a>
            </div>

            <div class="mb-4">
                <h2 class="fw-bold text-dark">Welcome Back</h2>
                <p class="text-muted fs-5">Please choose which management portal you would like to access today.</p>
            </div>

            <div class="d-grid gap-2">
                <a href="../studentmanagement/studentloginhtml.php" class="btn btn-dark btn-portal shadow-sm d-flex align-items-center justify-content-center">
                    <i class="bi bi-person-workspace me-3 fs-4"></i> 
                    <div class="text-start">
                        <span class="d-block">Student Portal</span>
                        <small style="font-weight: 400; font-size: 0.7rem; opacity: 0.8;">Management & Records</small>
                    </div>
                </a>
                
                <a href="../login/loginhtml.php" class="btn btn-outline-dark btn-portal d-flex align-items-center justify-content-center">
                    <i class="bi bi-hospital me-3 fs-4"></i>
                    <div class="text-start">
                        <span class="d-block">Doctor Portal</span>
                        <small style="font-weight: 400; font-size: 0.7rem;">Clinical & Consultations</small>
                    </div>
                </a>
            </div>

            <p class="agreement-text">
                By using this platform, you acknowledge that you have read and agreed to our 
                <a href="#" class="text-dark fw-bold">Terms of Service</a> and 
                <a href="#" class="text-dark fw-bold">Privacy Agreement</a>.
            </p>

            <div class="mt-5">
                <a href="../index/indexhtml.php" class="text-decoration-none text-muted small hover-dark">
                    <i class="bi bi-arrow-left"></i> Return to Homepage
                </a>
            </div>

        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>