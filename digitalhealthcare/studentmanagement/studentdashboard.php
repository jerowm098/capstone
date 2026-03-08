<?php
session_start();

// Proteksyon
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header("Location: studentloginhtml.php");
    exit();
}

$student_id = $_SESSION['student_id'];
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <title>Student Dashboard | Healthcare</title>
    
    <style>
        body { background-color: #f8f9fa; display: block; padding: 0; margin: 0; }
        .navbar-brand { font-size: 1.5rem; letter-spacing: -1px; }
        .dashboard-container { max-width: 1200px; margin: 30px auto; background: #fff; border-radius: 15px; box-shadow: 0 10px 30px rgba(0,0,0,0.05); overflow: hidden; }
        .sidebar { background-color: #fff; border-right: 1px solid #eee; padding: 30px 20px; min-height: 80vh; }
        .nav-pills .nav-link { color: #333; font-weight: 500; padding: 12px 20px; border-radius: 8px; margin-bottom: 10px; transition: all 0.3s; }
        .nav-pills .nav-link.active { background-color: #000 !important; color: #fff !important; }
        .content-area { padding: 40px; }
        .profile-label { font-size: 0.8rem; color: #6c757d; text-transform: uppercase; letter-spacing: 0.5px; }
        .profile-value { font-weight: 600; border-bottom: 1px solid #eee; padding-bottom: 8px; margin-bottom: 20px; color: #222; }
        .booking-header { background-color: #f9f9f9; border: 1px solid #eee; border-radius: 10px; padding: 15px; margin-bottom: 25px; }
        /* Style para sa "Others" input */
        #otherReasonContainer { display: none; margin-top: 10px; }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand fw-bold" href="#">HEALTH<span class="text-secondary">CARE</span></a>
        <div class="d-flex text-white small align-items-center">
            <span class="me-3"><i class="bi bi-person-circle me-1"></i> Welcome, <?php echo htmlspecialchars($student_id); ?></span>
            <a href="studentloginhtml.php" class="btn btn-outline-light btn-sm px-3 ms-2">Logout</a>
        </div>
    </div>
</nav>

<div class="container">
    <div class="dashboard-container">
        <div class="row g-0"> 
            <div class="col-md-3 sidebar">
                <h6 class="fw-bold mb-4 px-2 text-muted text-uppercase">Student Portal</h6>
                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <button class="nav-link active text-start" id="v-pills-profile-tab" data-bs-toggle="pill" data-bs-target="#v-pills-profile" type="button" role="tab">
                        <i class="bi bi-person-badge me-2"></i> View Profile
                    </button>
                    <button class="nav-link text-start" id="v-pills-appointment-tab" data-bs-toggle="pill" data-bs-target="#v-pills-appointment" type="button" role="tab">
                        <i class="bi bi-calendar-plus me-2"></i> Book Appointment
                    </button>
                </div>
            </div>

            <div class="col-md-9 content-area">
                <div class="tab-content" id="v-pills-tabContent">

<!-- VIEW PROFILE TAB -->

<div class="tab-pane fade show active" id="v-pills-profile" role="tabpanel">
    <h4 class="fw-bold mb-4">Student Comprehensive Profile</h4>

    <ul class="nav nav-tabs mb-4" id="profileSubTabs" role="tablist">
        <li class="nav-item">
            <button class="nav-link active fw-bold text-dark" id="personal-tab" data-bs-toggle="tab" data-bs-target="#personal-content" type="button" role="tab"><i class="bi bi-person-lines-fill me-2"></i>Personal</button>
        </li>
        <li class="nav-item">
            <button class="nav-link fw-bold text-dark" id="medical-tab" data-bs-toggle="tab" data-bs-target="#medical-content" type="button" role="tab"><i class="bi bi-heart-pulse me-2"></i>Medical</button>
        </li>
        <li class="nav-item">
            <button class="nav-link fw-bold text-dark" id="records-tab" data-bs-toggle="tab" data-bs-target="#records-content" type="button" role="tab"><i class="bi bi-file-earmark-medical me-2"></i>Health Records</button>
        </li>
        <li class="nav-item">
            <button class="nav-link fw-bold text-dark" id="billing-tab" data-bs-toggle="tab" data-bs-target="#billing-content" type="button" role="tab"><i class="bi bi-credit-card me-2"></i>Billing</button>
        </li>
    </ul>

    <div class="tab-content" id="profileSubTabsContent">
        
        <div class="tab-pane fade show active" id="personal-content" role="tabpanel">
            <div class="row mt-4 align-items-center">
                <div class="col-md-5 text-center border-end">
                    <div class="mb-3">
                        <img src="https://ui-avatars.com/api/?name=Juan+Dela+Cruz&background=000&color=fff&size=128" 
                             alt="Student Photo" 
                             class="rounded-circle shadow-sm border" 
                             style="width: 140px; height: 140px; object-fit: cover;">
                    </div>
                    
                    <h5 class="fw-bold mb-1">Juan Dela Cruz</h5>
                    
                    <p class="text-muted small mb-1">
                        20 Years Old | <span class="fw-bold text-primary"><?php echo htmlspecialchars($student_id); ?></span>
                    </p>
                    
                    <p class="badge bg-light text-dark border mb-4">
                        BS Information Technology - 3rd Year
                    </p>

                    <div class="d-flex justify-content-center gap-2 mb-4">
                        <button class="btn btn-dark btn-sm px-3 rounded-pill">
                            <i class="bi bi-pencil-square me-2"></i>Edit Profile
                        </button>
                        <button class="btn btn-outline-secondary btn-sm px-3 rounded-pill">
                            <i class="bi bi-shield-lock me-2"></i>Password
                        </button>
                    </div>
                </div>

                <div class="col-md-7 ps-md-5">
                    <div class="profile-label">Full Name</div>
                    <div class="profile-value">Juan Dela Cruz</div>

                    <div class="profile-label">Contact Number</div>
                    <div class="profile-value">0917-123-4567</div>

                    <div class="profile-label">Email Address</div>
                    <div class="profile-value">juan.delacruz@school.edu.ph</div>

                    <div class="profile-label">Gender</div>
                    <div class="profile-value">Male</div>

                    <div class="alert alert-warning border-0 rounded-3 mt-3">
                        <i class="bi bi-exclamation-triangle-fill me-2"></i>
                        <small><strong>Emergency Contact:</strong> Maria Dela Cruz (Mother) — 0912 345 6789</small>
                    </div>
                </div>
            </div>
        </div>

<div class="tab-pane fade" id="medical-content" role="tabpanel">
    <div class="row g-3 mt-2">
        <div class="col-md-4">
            <div class="card border-0 bg-light rounded-3 mb-3">
                <div class="card-body">
                    <h6 class="fw-bold small text-uppercase text-danger mb-3"><i class="bi bi-exclamation-octagon me-2"></i>Allergies</h6>
                    <ul class="small mb-0 ps-3">
                        <li>Penicillin</li>
                        <li>Peanuts / Nuts</li>
                        <li class="text-muted italic">Dust Mites (Mild)</li>
                    </ul>
                </div>
            </div>

            <div class="card border-0 bg-light rounded-3 mb-3">
                <div class="card-body">
                    <h6 class="fw-bold small text-uppercase text-primary mb-3"><i class="bi bi-capsule me-2"></i>Current Medications</h6>
                    <ul class="small mb-0 ps-3">
                        <li>Salbutamol (Inhaler) - As needed</li>
                        <li>Vitamin C - Daily</li>
                    </ul>
                </div>
            </div>

            <div class="card border-0 bg-light rounded-3">
                <div class="card-body">
                    <h6 class="fw-bold small text-uppercase text-muted mb-3"><i class="bi bi-Activity me-2"></i>Past Surgeries</h6>
                    <p class="small mb-0 ps-2">Appendectomy (2018)</p>
                    <p class="small mb-0 ps-2">Wisdom Tooth Extraction (2021)</p>
                </div>
            </div>
        </div>

        <div class="col-md-8">
            <div class="row g-3">
                <div class="col-12">
                    <div class="p-3 border rounded-3 bg-white shadow-sm">
                        <h6 class="fw-bold small text-uppercase mb-3">Latest Vitals (Last Check-up)</h6>
                        <div class="row text-center">
                            <div class="col-3">
                                <div class="small text-muted">Height</div>
                                <div class="fw-bold">175 cm</div>
                            </div>
                            <div class="col-3 border-start">
                                <div class="small text-muted">Weight</div>
                                <div class="fw-bold">68 kg</div>
                            </div>
                            <div class="col-3 border-start">
                                <div class="small text-muted">Blood Type</div>
                                <div class="fw-bold text-danger">O+</div>
                            </div>
                            <div class="col-3 border-start">
                                <div class="small text-muted">BMI</div>
                                <div class="fw-bold text-success">22.2 (Normal)</div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <h6 class="fw-bold small text-uppercase mb-2 mt-2">Family Medical History</h6>
                    <div class="list-group list-group-flush border rounded-3">
                        <div class="list-group-item small d-flex justify-content-between">
                            <span>Hypertension</span>
                            <span class="badge bg-light text-dark border">Father Side</span>
                        </div>
                        <div class="list-group-item small d-flex justify-content-between">
                            <span>Diabetes</span>
                            <span class="badge bg-light text-dark border">Mother Side</span>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <h6 class="fw-bold small text-uppercase mb-2 mt-2">Immunization Record</h6>
                    <div class="list-group list-group-flush border rounded-3">
                        <div class="list-group-item small py-1">
                            <i class="bi bi-check-circle-fill text-success me-2"></i>COVID-19 (Fully Vaccinated)
                        </div>
                        <div class="list-group-item small py-1">
                            <i class="bi bi-check-circle-fill text-success me-2"></i>Hepatitis B
                        </div>
                        <div class="list-group-item small py-1">
                            <i class="bi bi-info-circle-fill text-warning me-2"></i>Flu Vaccine (Expired)
                        </div>
                    </div>
                </div>

                <div class="col-12">
                    <div class="alert alert-info border-0 mb-0">
                        <h6 class="fw-bold small text-uppercase"><i class="bi bi-info-circle me-2"></i>Lifestyle & Habits</h6>
                        <p class="small mb-0">Non-smoker, Social drinker, Exercises 2-3 times a week (Basketball).</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

        <div class="tab-pane fade" id="records-content" role="tabpanel">
            <div class="mt-4">
                <h6 class="fw-bold"><i class="bi bi-chat-left-text me-2"></i>Doctor's Notes & Instructions</h6>
                <div class="border-start border-4 border-info ps-3 py-2 mb-4 bg-light">
                    <small class="text-muted">Oct 24, 2023 - Dr. Smith</small>
                    <p class="mb-0 italic">"Increase water intake and rest for 3 days. Monitor temperature every 4 hours."</p>
                </div>

                <h6 class="fw-bold"><i class="bi bi-flask me-2"></i>Test & Diagnostic Results</h6>
                <table class="table table-sm small mb-4">
                    <thead class="table-light">
                        <tr>
                            <th>Date</th>
                            <th>Test Type</th>
                            <th>Result</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Nov 05, 2023</td>
                            <td>CBC / Blood Test</td>
                            <td><span class="text-success">Normal</span></td>
                            <td><a href="#" class="btn btn-sm btn-link p-0 text-decoration-none">View PDF</a></td>
                        </tr>
                        <tr>
                            <td>Sept 10, 2023</td>
                            <td>Chest X-Ray</td>
                            <td><span class="text-success">Clear</span></td>
                            <td><a href="#" class="btn btn-sm btn-link p-0 text-decoration-none">View Image</a></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="tab-pane fade" id="billing-content" role="tabpanel">
            <div class="table-responsive mt-4">
                <h6 class="fw-bold">Payment History</h6>
                <table class="table table-hover align-middle small">
                    <thead class="table-light">
                        <tr>
                            <th>Invoice #</th>
                            <th>Date</th>
                            <th>Service</th>
                            <th>Amount</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>#INV-1002</td>
                            <td>Oct 24, 2023</td>
                            <td>Consultation Fee</td>
                            <td>₱500.00</td>
                            <td><span class="badge bg-success">Paid</span></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

    </div> 
</div>
<!-- END OF VIEW PROFILE TAB -->


<!-- APPOINTMENT TAB -->
<div class="tab-pane fade" id="v-pills-appointment" role="tabpanel">
    <h4 class="fw-bold mb-4">Appointments</h4>

    <ul class="nav nav-tabs mb-4" id="appointmentSubTabs" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active fw-bold text-dark" id="new-app-tab" data-bs-toggle="tab" data-bs-target="#new-app-content" type="button" role="tab">
                <i class="bi bi-calendar-plus me-2"></i>New Appointment
            </button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link fw-bold text-dark" id="history-app-tab" data-bs-toggle="tab" data-bs-target="#history-app-content" type="button" role="tab">
                <i class="bi bi-clock-history me-2"></i>Appointment History
            </button>
        </li>
    </ul>

    <div class="tab-content" id="appointmentSubTabsContent">
        
        <div class="tab-pane fade show active" id="new-app-content" role="tabpanel">
            <div class="booking-header small mb-4 p-3 bg-light rounded-3 border-start border-4 border-dark">
                <span class="text-muted small text-uppercase fw-bold">Currently Booking for:</span><br>
                <span class="fw-bold text-dark fs-5">Juan Dela Cruz</span> 
                <span class="badge bg-dark ms-2"><?php echo htmlspecialchars($student_id); ?></span>
            </div>

            <form action="process_appointment.php" method="POST">
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label fw-bold small text-muted">Type of Visit</label>
                        <select class="form-select" name="visit_type" required>
                            <option value="Walk-in">Walk-in</option>
                            <option value="Online Appointment">Online Appointment</option>
                            <option value="OJT">OJT Medical</option>
                            <option value="Emergency">Emergency</option>
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-bold small text-muted">Available Service</label>
                        <select class="form-select" id="serviceSelect" name="doctor_type" required onchange="updateReasons()">
                            <option value="" selected disabled>Choose a service...</option>
                            <option value="General Physician">General Physician</option>
                            <option value="Dental">Dental</option>
                            <option value="Medical Certificate">Medical Certificate</option>
                        </select>
                    </div>

                    <div class="col-md-12">
                        <label class="form-label fw-bold small text-muted">Reason for Visit</label>
                        <select class="form-select" id="reasonSelect" name="reason" required onchange="checkOtherReason()">
                            <option value="" selected disabled>Select a service first...</option>
                        </select>
                        <div id="otherReasonContainer" style="display:none;">
                            <input type="text" class="form-control mt-2" id="otherReasonInput" name="reason_other" placeholder="Please specify your reason">
                        </div>
                    </div>

                    <div class="col-md-12">
                        <label class="form-label fw-bold small text-muted">Additional Notes</label>
                        <textarea class="form-control" name="description" rows="3" placeholder="Describe your concern..."></textarea>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-bold small text-muted">Payment Method</label>
                        <select class="form-select" name="payment_method" required>
                            <option value="Cash">Cash</option>
                            <option value="GCash">GCash</option>
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-bold small text-muted">Payment Type</label>
                        <select class="form-select" name="payment_type" required>
                            <option value="Full Payment">Full Payment</option>
                            <option value="Half Payment">Half Payment</option>
                        </select>
                    </div>

                    <div class="col-md-12 mt-4">
                        <button type="submit" class="btn btn-dark w-100 py-3 fw-bold shadow-sm">
                            Submit Appointment Request
                        </button>
                    </div>
                </div>
            </form>
        </div>

        <div class="tab-pane fade" id="history-app-content" role="tabpanel">
            <div class="table-responsive mt-2">
                <table class="table table-hover align-middle">
                    <thead class="table-light">
                        <tr class="small text-uppercase text-muted">
                            <th>Date & Time</th>
                            <th>Service</th>
                            <th>Reason</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody class="small">
                        <tr>
                            <td>
                                <div class="fw-bold">Oct 24, 2023</div>
                                <div class="text-muted small">09:00 AM</div>
                            </td>
                            <td>General Physician</td>
                            <td>Routine Checkup</td>
                            <td><span class="badge bg-success rounded-pill">Completed</span></td>
                            <td><button class="btn btn-sm btn-outline-dark"><i class="bi bi-eye"></i></button></td>
                        </tr>
                        <tr>
                            <td>
                                <div class="fw-bold">Nov 12, 2023</div>
                                <div class="text-muted small">02:30 PM</div>
                            </td>
                            <td>Dental</td>
                            <td>Tooth Extraction</td>
                            <td><span class="badge bg-warning text-dark rounded-pill">Pending</span></td>
                            <td><button class="btn btn-sm btn-outline-danger"><i class="bi bi-x-lg"></i></button></td>
                        </tr>
                        <tr>
                            <td>
                                <div class="fw-bold">Sept 05, 2023</div>
                                <div class="text-muted small">10:00 AM</div>
                            </td>
                            <td>Medical Certificate</td>
                            <td>Sick Leave</td>
                            <td><span class="badge bg-secondary rounded-pill">Cancelled</span></td>
                            <td><button class="btn btn-sm btn-outline-dark" disabled><i class="bi bi-eye"></i></button></td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="card border-0 bg-light mt-4">
                <div class="card-body d-flex justify-content-around text-center">
                    <div>
                        <h6 class="text-muted small fw-bold uppercase">Total Visits</h6>
                        <h4 class="fw-bold mb-0">12</h4>
                    </div>
                    <div class="border-start ps-4">
                        <h6 class="text-muted small fw-bold uppercase">Last Visit</h6>
                        <h4 class="fw-bold mb-0">Oct 24</h4>
                    </div>
                </div>
            </div>
        </div>

    </div> </div>
<!-- END OF APPOINTMENT TAB -->
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // Data list para sa bawat service
    const reasonData = {
        "General Physician": [
            "Fever / Flu",
            "Abdominal Pain",
            "Cough and Cold",
            "Headache / Migraine",
            "Physical Consultation",
            "Others"
        ],
        "Dental": [
            "Toothache",
            "Tooth Extraction",
            "Dental Cleaning (Prophylaxis)",
            "Gum Swelling",
            "Dental Check-up",
            "Others"
        ],
        "Medical Certificate": [
            "OJT Medical Requirement",
            "Sick Leave Clearance",
            "Athletic / Sports Meet",
            "Employment Requirement",
            "School Admission",
            "Others"
        ]
    };

    function updateReasons() {
        const serviceSelect = document.getElementById("serviceSelect");
        const reasonSelect = document.getElementById("reasonSelect");
        const otherContainer = document.getElementById("otherReasonContainer");
        const selectedService = serviceSelect.value;

        // Linisin ang kasalukuyang options
        reasonSelect.innerHTML = '<option value="" selected disabled>-- Select Reason --</option>';
        otherContainer.style.display = "none";

        if (reasonData[selectedService]) {
            reasonData[selectedService].forEach(reason => {
                const option = document.createElement("option");
                option.value = reason;
                option.text = reason;
                reasonSelect.add(option);
            });
        }
    }

    function checkOtherReason() {
        const reasonSelect = document.getElementById("reasonSelect");
        const otherContainer = document.getElementById("otherReasonContainer");
        const otherInput = document.getElementById("otherReasonInput");

        if (reasonSelect.value === "Others") {
            otherContainer.style.display = "block";
            otherInput.required = true;
            otherInput.focus();
        } else {
            otherContainer.style.display = "none";
            otherInput.required = false;
        }
    }
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>