<?php include 'view-00-mainprofile.php'; ?>
<!doctype html>
<html lang="en">

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
    
   

   
    

    
    <title>Dashboard | Digital Healthcare</title>
</head>
<body>

<div class="d-flex" id="wrapper">
    <div class="bg-dark border-end" id="sidebar-wrapper">
        <div class="sidebar-heading text-white fw-bold fs-4 p-4">
            HEALTH<span class="text-secondary">CARE</span>
        </div>

        <div class="list-group list-group-flush nav nav-pills flex-column px-3" id="v-pills-tab" role="tablist">
            <div class="sidebar-section-label text-uppercase text-muted fw-bold mb-2 mt-3" style="font-size: 0.7rem; letter-spacing: 1px;">
                Main
            </div>



            <button class="nav-link mb-2 text-start" 
                    id="v-pills-dashboard-tab" 
                    data-bs-toggle="pill" 
                    data-bs-target="#v-pills-dashboard"
                    data-tab="v-pills-dashboard"
                    type="button" 
                    role="tab" 
                    aria-controls="v-pills-dashboard" 
                    aria-selected="true">
                <i class="bi bi-speedometer2 me-2"></i> Dashboard
            </button>

            <button class="nav-link mb-2 text-start" 
                    id="v-pills-appointments-tab" 
                    data-bs-toggle="pill" 
                    data-bs-target="#v-pills-appointments" 
                    type="button" 
                    role="tab" 
                    aria-controls="v-pills-appointments" 
                    aria-selected="false">
                <i class="bi bi-calendar-event me-2"></i> Appointments
            </button>


            <div class="sidebar-section-label text-uppercase text-muted fw-bold mb-2 mt-3" style="font-size: 0.7rem; letter-spacing: 1px;">
                Account
            </div>

            <button class="nav-link mb-0 text-start d-flex justify-content-between align-items-center w-100" 
                    data-bs-toggle="collapse" 
                    data-bs-target="#profileSubmenu" 
                    aria-expanded="false" 
                    type="button">
                <span><i class="bi bi-person-circle me-2"></i> Profile Management</span>
                <i class="bi bi-chevron-down small"></i>
            </button>

            <div class="collapse ps-3" id="profileSubmenu">
                <div class="list-group list-group-flush">
                    
                    <button class="nav-link mb-1 text-start small border-0 bg-transparent" 
                            id="v-pills-profile-tab" 
                            data-bs-toggle="pill" 
                            data-bs-target="#v-pills-profile" 
                            type="button" 
                            role="tab">
                        <i class="bi bi-eye me-2"></i> View Profile
                    </button>

                    <button class="nav-link mb-1 text-start small border-0 bg-transparent" 
                            id="v-pills-edit-profile-tab" 
                            data-bs-toggle="pill" 
                            data-bs-target="#v-pills-edit-profile" 
                            data-tab="v-pills-edit-profile"
                            type="button" 
                            role="tab">
                        <i class="bi bi-pencil me-2"></i> Edit Profile
                    </button>

                    <button class="nav-link mb-2 text-start small border-0 bg-transparent" 
                            id="v-pills-find-profile-tab" 
                            data-bs-toggle="pill" 
                            data-bs-target="#v-pills-find-profile" 
                            type="button" 
                            role="tab">
                        <i class="bi bi-search me-2"></i> Find Profile
                    </button>

                </div>
            </div>










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
    <!-- <h2 class="fw-bold m-0" style="font-size: 1.5rem;">Dashboard</h2> -->
</div>

        <div class="d-flex align-items-center">
            <div class="me-3">
                <div class="rounded-circle d-flex align-items-center justify-content-center border shadow-sm" 
                     style="width: 50px; height: 50px; background-color: #f8f9fa; overflow: hidden;">
                    <img src="<?php echo $avatar_url; ?>" class="rounded-circle" width="50" height="50">
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
        <div class="tab-content" id="v-pills-tabContent">

            <div class="tab-pane fade show" id="v-pills-dashboard" role="tabpanel" aria-labelledby="v-pills-dashboard-tab">
                <h2 class="fw-bold mb-4 main-tab-title">Dashboard Overview</h2>
                <div class="row g-4 mb-4">
                    <div class="col-lg-9">
                        <div class="row g-4">
                            <div class="col-md-4">
                                <div class="card stat-card border-0 shadow-sm p-4">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div><h2 class="stat-number">1,240</h2><p class="stat-label">Total Patients</p></div>
                                        <div class="stat-icon-circle"><i class="bi bi-people"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card stat-card border-0 shadow-sm p-4">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div><h2 class="stat-number">24</h2><p class="stat-label">Appointments</p></div>
                                        <div class="stat-icon-circle"><i class="bi bi-calendar-check"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card stat-card border-0 shadow-sm p-4">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div><h2 class="stat-number">$2,840</h2><p class="stat-label">Today's Revenue</p></div>
                                        <div class="stat-icon-circle"><i class="bi bi-currency-dollar"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card stat-card border-0 shadow-sm p-4">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div><h2 class="stat-number">28</h2><p class="stat-label">Lab Reports</p></div>
                                        <div class="stat-icon-circle"><i class="bi bi-file-earmark-medical"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card stat-card border-0 shadow-sm p-4">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div><h2 class="stat-number">14</h2><p class="stat-label">Pending Consults</p></div>
                                        <div class="stat-icon-circle"><i class="bi bi-camera-video"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card stat-card border-0 shadow-sm p-4">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div><h2 class="stat-number text-danger">2</h2><p class="stat-label">Critical Alerts</p></div>
                                        <div class="stat-icon-circle bg-light-danger"><i class="bi bi-exclamation-triangle text-danger"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3">
                        <div class="card border-0 shadow-sm notification-fixed-card h-100">
                            <div class="card-header bg-white border-0 py-3 d-flex justify-content-between align-items-center">
                                <span class="fw-bold small text-uppercase"><i class="bi bi-bell me-2"></i>Notifications</span>
                                <span class="badge bg-danger rounded-pill" style="font-size: 0.6rem;">2 New</span>
                            </div>
                            <div class="card-body p-0">
                                <div class="p-4 border-bottom border-light"> 
                                    <div class="d-flex">
                                        <div class="text-primary me-3"><i class="bi bi-calendar-check fs-4"></i></div>
                                        <div>
                                            <p class="mb-1 small fw-bold" style="font-size: 0.9rem;">New Appointment</p>
                                            <small class="text-muted d-block">Juan Dela Cruz - 2:00 PM</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="p-4 border-bottom border-light">
                                    <div class="d-flex">
                                        <div class="text-success me-3"><i class="bi bi-capsule fs-4"></i></div>
                                        <div>
                                            <p class="mb-1 small fw-bold" style="font-size: 0.9rem;">Stock Low</p>
                                            <small class="text-muted d-block">Amoxicillin < 50 units</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer bg-white border-0 text-center py-3 mt-auto">
                                <a href="#" class="text-decoration-none fw-bold small">View All Notifications</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row g-4">
                    <div class="col-12">
                        <div class="card border-0 shadow-sm">
                            <div class="card-header bg-white py-3 border-0 d-flex justify-content-between align-items-center">
                                <h5 class="fw-bold mb-0 text-dark">Recent Patient Activity</h5>
                                <button class="btn btn-sm btn-outline-dark border-0">View All</button>
                            </div>
                            <div class="table-responsive px-4 pb-4">
                                <table class="table table-hover align-middle mb-0">
                                    <thead class="table-light">
                                        <tr class="small text-uppercase text-muted">
                                            <th>Patient Name</th>
                                            <th>Date & Time</th>
                                            <th>Service</th>
                                            <th>Payment</th>
                                            <th>Status</th>
                                            <th class="text-end">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="bg-primary rounded-circle me-2 d-flex align-items-center justify-content-center text-white" style="width: 32px; height: 32px; font-size: 12px;">SJ</div>
                                                    <span class="fw-bold">Sarah Jenkins</span>
                                                </div>
                                            </td>
                                            <td>Oct 24, 2023 | 09:30 AM</td>
                                            <td>Cardiology Consultation</td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <i class="bi bi-phone text-primary me-2"></i> <span class="badge bg-light-success text-success border">Paid (GCash)</span>
                                                </div>
                                            </td>
                                            <td><span class="badge bg-light-success text-success px-3">Completed</span></td>
                                            <td class="text-end"><button class="btn btn-sm btn-light"><i class="bi bi-eye"></i></button></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="bg-secondary rounded-circle me-2 d-flex align-items-center justify-content-center text-white" style="width: 32px; height: 32px; font-size: 12px;">JD</div>
                                                    <span class="fw-bold">John Doe</span>
                                                </div>
                                            </td>
                                            <td>Oct 24, 2023 | 10:15 AM</td>
                                            <td>General Check-up</td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <i class="bi bi-bank text-secondary me-2"></i> <span class="badge bg-light-danger text-danger border">Unpaid</span>
                                                </div>
                                            </td>
                                            <td><span class="badge bg-light-warning text-warning px-3">Pending</span></td>
                                            <td class="text-end"><button class="btn btn-sm btn-light"><i class="bi bi-eye"></i></button></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="bg-info rounded-circle me-2 d-flex align-items-center justify-content-center text-white" style="width: 32px; height: 32px; font-size: 12px;">MC</div>
                                                    <span class="fw-bold">Maria Clara</span>
                                                </div>
                                            </td>
                                            <td>Oct 24, 2023 | 11:00 AM</td>
                                            <td>Laboratory Test</td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <i class="bi bi-cash-stack text-success me-2"></i> <span class="badge bg-light-success text-success border">Paid (Cash)</span>
                                                </div>
                                            </td>
                                            <td><span class="badge bg-light-info text-info px-3">In Progress</span></td>
                                            <td class="text-end"><button class="btn btn-sm btn-light"><i class="bi bi-eye"></i></button></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="tab-pane fade" id="v-pills-appointments" role="tabpanel" aria-labelledby="v-pills-appointments-tab">
                <div class="container-fluid py-4">
                    <div class="row">
                        <div class="col-md-5">
                            <div class="card shadow-sm border-0">
                                <div class="card-header bg-maroon text-white">
                                    <h5 class="card-title mb-0"><i class="fas fa-calendar-plus me-2"></i>Schedule a Visit</h5>
                                </div>
                                <div class="card-body">
                                    <form action="save_appointment.php" method="POST">
                                        <div class="mb-3">
                                            <label class="form-label fw-bold">Preferred Date</label>
                                            <input type="date" class="form-control" name="appointment_date" required>
                                            <small class="text-muted">Standard clinic hours only.</small>
                                        </div>
                                        
                                        <div class="mb-3">
                                            <label class="form-label fw-bold">Preferred Time Slot</label>
                                            <select class="form-select" name="time_slot" required>
                                                <option value="" selected disabled>Choose time...</option>
                                                <option>08:00 AM - 09:00 AM</option>
                                                <option>09:00 AM - 10:00 AM</option>
                                                <option>01:00 PM - 02:00 PM</option>
                                                <option>02:00 PM - 03:00 PM</option>
                                            </select>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label fw-bold">Purpose of Visit</label>
                                            <textarea class="form-control" name="purpose" rows="3" placeholder="e.g., Medical Certificate, Follow-up, Consultation" required></textarea>
                                            <small class="text-info font-italic">Note: Urgent cases should proceed directly to the Triage Kiosk.</small>
                                        </div>

                                        <div class="d-grid">
                                            <button type="submit" class="btn btn-maroon text-white">Request Appointment</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-7">
                            <div class="card shadow-sm border-0">
                                <div class="card-header bg-light d-flex justify-content-between align-items-center">
                                    <h5 class="mb-0 text-maroon">Your Appointments</h5>
                                    <span class="badge rounded-pill bg-maroon text-white">View History</span>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-hover align-middle">
                                            <thead class="table-light">
                                                <tr>
                                                    <th>Date</th>
                                                    <th>Time</th>
                                                    <th>Purpose</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>Oct 24, 2025</td>
                                                    <td>09:00 AM</td>
                                                    <td>Physical Exam</td>
                                                    <td><span class="badge bg-success">Confirmed</span></td>
                                                    <td>
                                                        <button class="btn btn-sm btn-outline-dark"><i class="fas fa-qrcode"></i></button>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Nov 12, 2025</td>
                                                    <td>01:30 PM</td>
                                                    <td>Consultation</td>
                                                    <td><span class="badge bg-secondary">Completed</span></td>
                                                    <td>
                                                        <button class="btn btn-sm btn-light" disabled><i class="fas fa-check"></i></button>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="alert alert-info mt-3 small">
                                        <i class="fas fa-info-circle"></i> <strong>Tip:</strong> Present your system-generated QR code to the clinic staff for instant record retrieval.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>





            <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h2 class="fw-bold mb-0">Account Profile</h2>
                        <button class="btn btn-primary btn-sm px-3 text-white" data-bs-toggle="pill" data-bs-target="#v-pills-edit-profile">
                            <i class="bi bi-pencil-square me-1"></i> Edit Profile
                        </button>
                </div>
                
                <div class="card border-0 shadow-sm p-4">
                    <div class="row">
                        <div class="col-md-2 text-center">
                            <img src="<?php echo $avatar_url; ?>" 
                            id="profilePreview"
                            class="rounded-circle img-fluid mb-3 border p-1 bg-light" 
                            alt="Doctor"
                            style="width: 180px; height: 180px; object-fit: cover;">
                            <button type="button" class="btn btn-sm btn-outline-dark w-100 mb-2" id="btnEditPhoto">
                                <i class="bi bi-camera me-1"></i> Edit photo
                            </button>
                            <input type="file" id="fileInput" class="d-none" accept="image/*">
                        </div>

                        <div class="col-md-10">
                            <div class="d-flex justify-content-between align-items-start">
                                <div>
                                    <!-- <h5 class="mb-1">Dr. James Wilson</h5> -->
                                    <h5 class="mb-1"><?php echo $title . " " . $fname . " " . $lname; ?></h5>
                                    <!-- <p class="text-muted">Cardiologist | MD, PhD</p> -->
                                    <p class="text-muted"><?php echo $expertise; ?></p>
                                </div>
                                <span class="badge bg-success-soft text-success border border-success px-3">Active</span>
                            </div>
                            <hr>
            
                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <label class="small fw-bold text-muted text-uppercase d-block">Email</label>
                                    <p class="mb-0"><?php echo $email; ?></p>
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label class="small fw-bold text-muted text-uppercase d-block">Phone</label>
                                    <p class="mb-0">
                                        <?php 
                                            // If the number doesn't start with '+', add it. 
                                            // If it already has it, just show it.
                                            echo (str_contains($phone, '+')) ? $phone : "+63 " . $phone; 
                                        ?>
                                    </p>
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label class="small fw-bold text-muted text-uppercase d-block">Birthday</label>
                                    <p class="mb-0">
                                        <?php echo $birthday; ?>
                                    </p>
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label class="small fw-bold text-muted text-uppercase d-block">Gender</label>
                                    <p class="mb-0 text-capitalize"><?php echo $gender; ?></p>
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label class="small fw-bold text-muted text-uppercase d-block">Age</label>
                                    <p class="mb-0">
                                        <?php echo ($age !== "N/A") ? $age . " Years Old" : "Not Set"; ?>
                                    </p>
                                </div>

                                <!-- <div class="col-12 mb-3">
                                    <label class="small fw-bold text-muted text-uppercase d-block">Profile Bio</label>
                                    <p class="text-secondary mb-0">A dedicated Cardiologist with over 12 years of experience in clinical practice and cardiovascular research. Specializing in preventive heart care and advanced diagnostic imaging.</p>
                                </div> -->

                                <div class="col-12 mb-3">
                                    <label class="small fw-bold text-muted text-uppercase d-block">Profile Bio</label>
                                    <p class="text-secondary mb-0">
                                        A registered healthcare professional specializing in <?php echo $expertise; ?>. 
                                        <br>with over 12 years of experience in clinical practice.
                                        <br>Dedicated to providing high-quality patient care and medical excellence.
                                    </p>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="small fw-bold text-muted text-uppercase d-block">Clinic Address</label>
                                    <p class="text-secondary mb-0">
                                        <i class="bi bi-geo-alt-fill me-1 text-danger"></i> 
                                        123 Medical Plaza, Suite 405, <br>
                                        Central District, City Metropolis, 10110
                                    </p>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="small fw-bold text-muted text-uppercase d-block">Education & Certificates</label>
                                    <ul class="list-unstyled small text-secondary mb-0">
                                        <li><i class="bi bi-patch-check-fill me-2 text-primary"></i>MD - Harvard Medical School</li>
                                        <li><i class="bi bi-patch-check-fill me-2 text-primary"></i>PhD - Cardiology, Johns Hopkins</li>
                                        <li><i class="bi bi-patch-check-fill me-2 text-primary"></i>Board Certified Interventional Cardiologist</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="tab-pane fade" id="v-pills-edit-profile" role="tabpanel">
                <h2 class="fw-bold mb-4">Edit Profile</h2>

                <div class="card border-0 shadow-sm p-4">
                    <form id="editProfileForm" action="../update-profile.php" method="POST" autocomplete="off">
                        <div class="row">
                            <div class="col-lg-7 pe-lg-5">
                                <h5 class="fw-bold mb-4"><i class="bi bi-person-lines-fill me-2"></i>Personal Information</h5>
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label class="form-label small fw-bold text-muted text-uppercase">First Name</label>
                                        <div class="input-group custom-input-group">
                                            <span class="input-group-text"><i class="bi bi-person text-muted"></i></span>
                                            <input type="text" id="fname" name="fname" class="form-control" placeholder="First Name" value="<?php echo htmlspecialchars($raw_fname); ?>" required>
                                        </div>
                                        <span id="hint-fname" class="input-hint text-muted">Enter to Change First Name</span>
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label small fw-bold text-muted text-uppercase">Last Name</label>
                                        <div class="input-group custom-input-group">
                                            <span class="input-group-text"><i class="bi bi-person-fill text-muted"></i></span>
                                            <input type="text" id="lname" name="lname" class="form-control" placeholder="Last Name" value="<?php echo htmlspecialchars($raw_lname); ?>" required>
                                        </div>
                                        <span id="hint-lname" class="input-hint text-muted">Enter to Change Last Name</span>
                                    </div>

                                    <div class="col-md-12">
                                        <label class="form-label small fw-bold text-muted text-uppercase">Contact Number</label>
                                        <div class="input-group custom-input-group">
                                            <span class="input-group-text bg-light fw-bold" style="font-size: 0.8rem;">+639</span>
                                            <input type="tel" id="contact_num" name="contact_num" class="form-control" placeholder="123456789" maxlength="9" value="<?php echo htmlspecialchars(substr($phone, -9)); ?>" required>
                                            <span class="input-group-text"><i class="bi bi-phone text-muted"></i></span>
                                        </div>
                                        <span id="hint-contact" class="input-hint text-muted">Enter 9 digits</span>
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label small fw-bold text-muted text-uppercase">Gender</label>
                                        <select name="gender" class="form-select custom-select" required>
                                            <option value="Male" <?php echo (strtolower($gender) === 'male') ? 'selected' : ''; ?>>Male</option>
                                            <option value="Female" <?php echo (strtolower($gender) === 'female') ? 'selected' : ''; ?>>Female</option>
                                        </select>
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label small fw-bold text-muted text-uppercase">Expertise</label>
                                        <select name="expertise" class="form-select custom-select" required>
                                            <?php 
                                            $options = ["Cardiologist", "Pediatrician", "Neurologist", "General Physician", "Surgeon"];
                                            foreach ($options as $opt) {
                                                $selected = (strtolower($raw_expertise) == strtolower($opt)) ? "selected" : "";
                                                echo "<option value=\"$opt\" $selected>$opt</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>

                                    <div class="col-md-12">
                                        <label class="form-label small fw-bold text-muted text-uppercase">Email Address</label>
                                        <div class="input-group custom-input-group">
                                            <span class="input-group-text"><i class="bi bi-envelope text-muted"></i></span>
                                            <input type="email" id="email" name="email" class="form-control" value="<?php echo htmlspecialchars($email); ?>" required>
                                        </div>
                                        <span id="hint-email" class="input-hint text-muted">Example: user@gmail.com</span>
                                    </div>

                                    <div class="col-12">
                                        <label class="form-label small fw-bold text-muted text-uppercase">Birthday</label>
                                        <div class="row g-2">
                                            <div class="col-4">
                                                <select class="form-select custom-select" name="birth_month" required>
                                                    <?php
                                                    $months = ["01"=>"January", "02"=>"February", "03"=>"March", "04"=>"April", "05"=>"May", "06"=>"June", "07"=>"July", "08"=>"August", "09"=>"September", "10"=>"October", "11"=>"November", "12"=>"December"];
                                                    foreach ($months as $val => $mName) {
                                                        $sel = ($bMonth == $val || $bMonth == $mName) ? "selected" : "";
                                                        echo "<option value=\"$val\" $sel>$mName</option>";
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="col-4">
                                                <input type="number" name="birth_day" class="form-control custom-input" placeholder="Day" value="<?php echo htmlspecialchars($bDay); ?>" required min="1" max="31">
                                            </div>
                                            <div class="col-4">
                                                <input type="number" name="birth_year" class="form-control custom-input" placeholder="Year" value="<?php echo htmlspecialchars($bYear); ?>" required min="1900" max="2026">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-1 d-none d-lg-flex justify-content-center">
                                <div style="border-left: 1px solid #dee2e6; height: 100%;"></div>
                            </div>

                            <div class="col-lg-4 mt-4 mt-lg-0">
                                <h5 class="fw-bold mb-4"><i class="bi bi-shield-lock-fill me-2"></i>Security</h5>
                                
                                <div class="row g-3">
                                    <div class="col-12">
                                        <label class="form-label small fw-bold text-muted text-uppercase">Old Password</label>
                                        <div class="input-group custom-input-group">
                                            <span class="input-group-text border-0"><i class="bi bi-shield-lock text-muted"></i></span>
                                            <input type="text" name="old_password" class="form-control border-0 bg-white" value="<?php echo htmlspecialchars($db_password); ?>" readonly>
                                        </div>
                                        <span class="input-hint text-muted">Current password in database (Visible)</span>
                                    </div>

                                    <div class="col-12 mt-4">
                                        <label class="form-label small fw-bold text-muted text-uppercase">New Password</label>
                                        <div class="input-group custom-input-group">
                                            <span class="input-group-text border-0"><i class="bi bi-key text-muted"></i></span>
                                            <input type="password" id="newPassword" name="new_password" class="form-control border-0" placeholder="New password">
                                            <button class="btn btn-outline-secondary border-0 toggle-password" type="button"><i class="bi bi-eye-slash"></i></button>
                                        </div>
                                        <span id="hint-password" class="input-hint text-muted">Min. 6 characters</span>
                                    </div>

                                    <div class="col-12 mt-4">
                                        <label class="form-label small fw-bold text-muted text-uppercase">Confirm Password</label>
                                        <div class="input-group custom-input-group">
                                            <span class="input-group-text border-0"><i class="bi bi-key-fill text-muted"></i></span>
                                            <input type="password" id="confirmPassword" class="form-control border-0" placeholder="Confirm new password">
                                            <button class="btn btn-outline-secondary border-0 toggle-password" type="button"><i class="bi bi-eye-slash"></i></button>
                                        </div>
                                        <span id="hint-confirm" class="input-hint text-muted">Passwords must match</span>
                                    </div>
                                    
                                    <div class="col-12 mt-3">
                                        <div class="alert alert-info py-2 px-3 border-0 shadow-sm" style="font-size: 0.75rem;">
                                            <i class="bi bi-info-circle-fill me-1"></i> Leave password fields blank if you don't want to change it.
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 text-end mt-5 pt-3 border-top">
                                <button type="button" class="btn btn-light px-4 me-2" onclick="window.location.reload();">Cancel</button>
                                <button type="submit" id="saveBtn" class="btn btn-dark px-5">SAVE CHANGES</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>



            <div class="tab-pane fade" id="v-pills-find-profile" role="tabpanel">
                <div class="container-fluid px-4 py-1">
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <div>
                                <h2 class="fw-bold m-0">User Directory</h2>
                                <small class="text-muted">Manage and view medical professional profiles</small>
                            </div>
                            <span class="badge bg-dark px-3 py-2" id="totalUsersBadge">Total Users: 0</span>
                        </div>

                        <div class="card border-0 shadow-sm mb-4">
                            <div class="card-body p-3">
                                <form id="searchForm" class="row g-2">
                                    <div class="col-md-12">
                                        <div class="input-group">
                                            <span class="input-group-text bg-white border-end-0"><i class="bi bi-search text-muted"></i></span>
                                            <input type="text" name="search" id="searchInput" class="form-control border-start-0 py-2" 
                                                placeholder="Search by name or email..." autocomplete="off">
                                        </div>
                                    </div>
                                </form>
                                <div id="searchStatus" class="mt-2 small text-muted"></div>
                            </div>
                        </div>

                        <div class="card border-0 shadow-sm d-flex flex-column" style="min-height: auto;">
                            <div class="table-responsive flex-grow-1">
                                <table class="table table-hover align-middle mb-0 user-directory-table">
                                    <thead class="bg-light">
                                        <tr>
                                            <th class="ps-4 col-name">Name</th>
                                            <th class="col-email">Email</th>
                                            <th class="col-contact">Contact</th>
                                            <th class="col-expertise text-center">Expertise</th>
                                            <th class="col-joined">Joined Date</th>
                                            <th class="text-center col-action">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="userTableBody">
                                        </tbody>
                                </table>
                            </div>
                            <div class="card-footer bg-white border-0 py-3" id="paginationContainer">
                                <div class="d-flex justify-content-center">
                                    </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal fade" id="viewUserModal" tabindex="-1" aria-labelledby="viewUserModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content border-0 shadow">
                                <div class="modal-header bg-dark text-white">
                                    <h5 class="modal-title fw-bold" id="viewUserModalLabel">User Profile Details</h5>
                                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body p-4">
                                    <div class="text-center mb-4">
                                        <div id="v-avatar" class="rounded-circle bg-secondary text-white d-inline-flex align-items-center justify-content-center" 
                                            style="width: 80px; height: 80px; font-size: 2rem; font-weight: bold;">
                                        </div>
                                    </div>
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item d-flex justify-content-between">
                                            <strong>Full Name:</strong> <span id="v-name" class="text-muted"></span>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between">
                                            <strong>Email:</strong> <span id="v-email" class="text-muted"></span>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between">
                                            <strong>Contact:</strong> <span id="v-phone" class="text-muted"></span>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between">
                                            <strong>Expertise:</strong> <span id="v-expertise" class="text-muted"></span>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between">
                                            <strong>Gender:</strong> <span id="v-gender" class="text-muted"></span>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between">
                                            <strong>Birthday:</strong> <span id="v-birthday" class="text-muted"></span>
                                        </li>
                                    </ul>
                                </div>
                                <div class="modal-footer border-0">
                                    <button type="button" class="btn btn-light border w-100" data-bs-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>

            </div>



        </div>
    </div>
</div>




<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="view-00-mainprofile.js"></script>


</body>
</html>