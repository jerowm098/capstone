<?php include 'view-00-mainprofile.php'; ?>
<!doctype html>
<html lang="en">
<!-- <html lang="en" data-theme="dark"> -->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    

    <link rel="stylesheet" href="view-00-mainprofile.css">

    <link rel="stylesheet" href="view-01-tabdashboard.css">
    <link rel="stylesheet" href="view-02.1-tabeditprofile.css">
    <link rel="stylesheet" href="view-02.2-tabfindprofile.css">
    <link rel="stylesheet" href="view-03-tabpatient.css">
    
   

   
    

    <!-- <link rel="stylesheet" href="view-03-tabemployee.css"> -->

    
    <title>Dashboard | Digital Healthcare</title>
</head>
<body>

<div class="d-flex" id="wrapper">
    <div class="bg-dark border-end" id="sidebar-wrapper">
        <div class="sidebar-heading text-white fw-bold fs-4 p-4">
            HEALTH<span class="text-secondary">CARE</span>
        </div>

        <div class="list-group list-group-flush nav nav-pills flex-column px-3">

            <div class="sidebar-section-label text-uppercase text-muted fw-bold mb-2 mt-3" style="font-size: 0.7rem; letter-spacing: 1px;">
                    Main
                </div>


            <button class="nav-link mb-2 text-start" data-file="view-01-tabdashboard.html">
                <i class="bi bi-speedometer2 me-2"></i> Dashboard
            </button>
            <!-- <button class="nav-link mb-2 text-start" data-file="view-02-tabprofile.html">
                <i class="bi bi-person-circle me-2"></i> Profile
            </button> -->

            <button class="nav-link mb-2 text-start" data-file="view-02-appointmenthtml.php">
    <i class="bi bi-calendar-event me-2"></i> Appointments
</button>

            <div class="sidebar-section-label text-uppercase text-muted fw-bold mb-2 mt-3" style="font-size: 0.7rem; letter-spacing: 1px;">
        Doctor Management
    </div>
            <div class="nav-item">
                <button class="nav-link w-100 mb-1 text-start d-flex justify-content-between align-items-center" 
                        data-bs-toggle="collapse" 
                        data-bs-target="#profileSubmenu">
                    <span><i class="bi bi-person-circle me-2"></i> Profile <!-- Doctor Management --></span>
                    <i class="bi bi-chevron-down small"></i>
                </button>
                
                <div class="collapse px-3" id="profileSubmenu">
                    <button class="nav-link mb-2 text-start small w-100" data-file="view-02-viewprofiletabhtml.php">
                        <i class="bi bi-eye me-2"></i> View Profile
                    </button>
                    <button class="nav-link mb-2 text-start small w-100" data-file="view-02.1-editprofiletabhtml.php">
                        <i class="bi bi-pencil-square me-2"></i> Edit Profile
                    </button>
                    <button class="nav-link mb-2 text-start small w-100" data-file="view-02.2-findprofiletabhtml.php">
                        <i class="bi bi-people me-2"></i> Find Profile
                    </button>
                </div>
            </div>

<!-- KAPAG MAY EMPLOYEE -->
            <!-- <button class="nav-link mb-2 text-start" data-file="view-03-tabemployee.html">
                <i class="bi bi-person-badge-fill me-2"></i> Employee
            </button>
            <button class="nav-link mb-2 text-start" data-file="view-04-tabpatient.html">
                <i class="bi bi-person-plus me-2"></i> Patient
            </button>
            <button class="nav-link mb-2 text-start" data-file="view-05-tabconsultation.html">
                <i class="bi bi-chat-dots me-2"></i> Consultation
            </button>
            <button class="nav-link mb-2 text-start" data-file="view-06-tablaboratory.html">
                <i class="bi bi-search me-2"></i> Laboratory
            </button>
            <button class="nav-link mb-2 text-start" data-file="view-07-tabpharmacy.html">
                <i class="bi bi-capsule me-2"></i> Pharmacy
            </button>
            <button class="nav-link mb-2 text-start" data-file="view-08-tabaccounts.html">
                <i class="bi bi-wallet2 me-2"></i> Accounts
            </button>
            <button class="nav-link mb-2 text-start" data-file="view-09-tabreports.html">
                <i class="bi bi-bar-chart-line me-2"></i> Reports
            </button> -->

<!-- KAPAG MAY EMPLOYEE -->


            <!-- <button class="nav-link mb-2 text-start" data-file="view-03-tabpatienthtml.php">
                <i class="bi bi-person-plus me-2"></i> Patient
            </button> -->
<div class="sidebar-section-label text-uppercase text-muted fw-bold mb-2 mt-3" style="font-size: 0.7rem; letter-spacing: 1px;">
        Patient Management
    </div>
            <div class="nav-item">
                <button class="nav-link w-100 mb-1 text-start d-flex justify-content-between align-items-center" 
                        data-bs-toggle="collapse" 
                        data-bs-target="#patientSubmenu">
                    <span><i class="bi bi-person-plus me-2"></i> Patient</span>
                    <i class="bi bi-chevron-down small"></i>
                </button>
                
                <div class="collapse px-3" id="patientSubmenu">
                    <button class="nav-link mb-2 text-start small w-100" data-file="view-03-tabpatienthtml.php">
                        <i class="bi bi-search me-2"></i> View Patient
                    </button>
                    <button class="nav-link mb-2 text-start small w-100" data-file="view-03.2-addpatient.php">
                        <i class="bi bi-person-add me-2"></i> Add Patient
                    </button>
                    <button class="nav-link mb-2 text-start small w-100" data-file="view-03.3-managepatient.php">
                        <i class="bi bi-card-list me-2"></i> Manage Patient
                    </button>
                    <button class="nav-link mb-2 text-start small w-100" data-file="view-03.4-managepatient.php">
                        <i class="bi bi-chat-dots me-2"></i> Patient Consultation
                    </button>
                </div>
            </div>


            <button class="nav-link mb-2 text-start" data-file="view-04-tabconsultation.html">
                <i class="bi bi-chat-dots me-2"></i> Consultation
            </button>
            <button class="nav-link mb-2 text-start" data-file="view-05-tablaboratory.html">
                <i class="bi bi-search me-2"></i> Laboratory
            </button>
            <button class="nav-link mb-2 text-start" data-file="view-06-tabpharmacy.html">
                <i class="bi bi-capsule me-2"></i> Pharmacy
            </button>
            <button class="nav-link mb-2 text-start" data-file="view-07-tabaccounts.html">
                <i class="bi bi-wallet2 me-2"></i> Accounts
            </button>
            <button class="nav-link mb-2 text-start" data-file="view-08-tabreports.html">
                <i class="bi bi-bar-chart-line me-2"></i> Reports
            </button>

            <hr class="text-secondary">
            <a href="../login/loginhtml.php" class="nav-link text-danger text-start" id="logout-link">
                <i class="bi bi-box-arrow-left me-2"></i> Logout
            </a>
        </div>
    </div>

    <div id="page-content-wrapper" class="w-100">
    <nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom py-2 px-4">
    <div class="container-fluid d-flex justify-content-between align-items-center">
        
        <div id="nav-header-target">
            </div>

        <div class="d-flex align-items-center">
            <div class="me-3">
                <div class="rounded-circle d-flex align-items-center justify-content-center border shadow-sm" 
                     style="width: 50px; height: 50px; background-color: #f8f9fa; overflow: hidden;">
                    <!-- <img src="<?php echo $avatar_url; ?>" alt="Profile" style="width: 100%; height: 100%; object-fit: cover;">
                     --><img src="<?php echo $avatar_url; ?>" class="rounded-circle" width="50" height="50">
                </div>
            </div>
            
            <div class="d-flex flex-column text-end">
                <span class="fw-bold text-dark m-0" style="line-height: 1.2; font-size: 0.95rem;">
                    Welcome back, <?php echo $title . " " . $fname . " " . $lname; ?>
                </span>
                <small class="text-muted fw-bold" style="font-size: 0.75rem;">
                    <?php echo $expertise; ?>
                </small>
            </div>
        </div>
        
    </div>
</nav>

    <div class="container-fluid p-4" id="content-area">
        </div>
</div>
</div>



<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="view-00-mainprofile.js"></script>
</body>
</html>