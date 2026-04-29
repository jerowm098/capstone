<?php include 'view-00-mainprofile.php'; ?>

<link rel="stylesheet" href="view-03.2-addpatient.css">

<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold m-0">Registration <span class="text-muted fw-light">| Add New Patient</span></h2>
        <!-- <button class="btn btn-outline-dark btn-sm" onclick="loadTab('view-03-tabpatienthtml.php')">
            <i class="bi bi-arrow-left me-1"></i> Back to List
        </button> -->
    </div>

    <div class="card border-0 shadow-sm p-4">
        <form id="addPatientForm" autocomplete="off">
            <div class="row">
                <div class="col-lg-7 pe-lg-5">
                    <h5 class="fw-bold mb-4 text-primary">
                        <i class="bi bi-person-vcard me-2"></i>Personal Information
                    </h5>
                    
                    <div class="row g-3">
                        <div class="col-md-12">
                            <label class="form-label small fw-bold text-muted text-uppercase">Full Name</label>
                            <div class="input-group custom-input-group">
                                <span class="input-group-text"><i class="bi bi-person"></i></span>
                                <input type="text" name="p_name" class="form-control" placeholder="Last Name, First Name Middle Name" required>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label small fw-bold text-muted text-uppercase">Date of Birth</label>
                            <input type="date" name="p_dob" id="p_dob" class="form-control custom-input" required onchange="calculateAge()">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label small fw-bold text-muted text-uppercase">Age</label>
                            <input type="number" name="p_age" id="p_age" class="form-control bg-light" placeholder="0" readonly>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label small fw-bold text-muted text-uppercase">Gender</label>
                            <select name="p_gender" class="form-select custom-select" required>
                                <option value="" selected disabled>Select Gender</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                                <option value="Other">Other</option>
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label small fw-bold text-muted text-uppercase">Mobile Number</label>
                            <div class="input-group custom-input-group">
                                <span class="input-group-text">+63</span>
                                <input type="tel" name="p_mobile" class="form-control" placeholder="9123456789" maxlength="10">
                            </div>
                        </div>

                        <div class="col-md-12">
                            <label class="form-label small fw-bold text-muted text-uppercase">Complete Address</label>
                            <textarea name="p_address" class="form-control" rows="2" placeholder="House No., Street, Brgy, City"></textarea>
                        </div>
                    </div>
                </div>

                <div class="col-lg-1 d-none d-lg-flex justify-content-center">
                    <div style="border-left: 1px dashed #dee2e6; height: 100%;"></div>
                </div>

                <div class="col-lg-4 mt-4 mt-lg-0">
                    <h5 class="fw-bold mb-4 text-danger">
                        <i class="bi bi-clipboard2-pulse me-2"></i>Case Details
                    </h5>

                    <div class="row g-3">
                        <div class="col-12">
                            <label class="form-label small fw-bold text-muted text-uppercase">Patient ID / Number</label>
                            <input type="text" name="p_number" class="form-control fw-bold text-primary bg-light" value="PAT-<?php echo date('Ymd'); ?>-<?php echo rand(10,99); ?>" readonly>
                        </div>

                        <div class="col-12">
                            <label class="form-label small fw-bold text-muted text-uppercase">Patient Type</label>
                            <select name="p_type" class="form-select custom-select" required>
                                <option value="New">New Patient</option>
                                <option value="Returning">Returning</option>
                                <option value="Emergency">Emergency</option>
                            </select>
                        </div>

                        <div class="col-12">
                            <label class="form-label small fw-bold text-muted text-uppercase">Primary Ailment / Complaint</label>
                            <div class="input-group custom-input-group">
                                <span class="input-group-text"><i class="bi bi-thermometer-half"></i></span>
                                <input type="text" name="p_ailment" class="form-control" placeholder="e.g. Hypertension, Fever">
                            </div>
                        </div>

                        <div class="col-12 mt-4 pt-3 border-top">
                             <div class="d-flex justify-content-between align-items-center mb-2">
                                <label class="form-label small fw-bold text-muted text-uppercase m-0">Initial Payment</label>
                                <span class="badge bg-success">Required</span>
                             </div>
                             <div class="input-group mb-3">
                                <span class="input-group-text">₱</span>
                                <input type="number" name="p_payment" class="form-control form-control-lg fw-bold text-success" placeholder="0.00">
                             </div>
                             <small class="text-muted italic" style="font-size: 0.7rem;">Clicking save will automatically generate a billing record.</small>
                        </div>
                    </div>
                </div>

                <div class="col-12 text-end mt-5 pt-3 border-top">
                    <button type="reset" class="btn btn-light px-4 me-2">Clear Fields</button>
                    <button type="submit" class="btn btn-dark px-5 shadow">REGISTER PATIENT</button>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
// Auto-calculate Age based on DOB
function calculateAge() {
    const dob = document.getElementById('p_dob').value;
    if(!dob) return;
    const today = new Date();
    const birthDate = new Date(dob);
    let age = today.getFullYear() - birthDate.getFullYear();
    const m = today.getMonth() - birthDate.getMonth();
    if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
        age--;
    }
    document.getElementById('p_age').value = age;
}
</script>