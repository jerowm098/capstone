
<?php
// This line connects this specific tab to your data logic
// It ensures $fname, $lname, $title, etc., are defined here
include 'view-00-mainprofile.php';
?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="fw-bold mb-0">Account Profile</h2>
    <button class="btn btn-primary btn-sm px-3 nav-link text-white" data-file="includes/sidenavbar2/view-02.1-editprofiletabhtml.php">
        <i class="bi bi-pencil-square me-1"></i> Edit Profile
    </button>
</div>

<div class="card border-0 shadow-sm p-4">
    <div class="row">

       <!--  <div class="col-md-2 text-center">
            <img src="https://images.unsplash.com/photo-1612349317150-e413f6a5b16d?auto=format&fit=crop&w=200&h=200&q=80" 
                 class="rounded-circle img-fluid mb-3 border p-1" alt="Doctor">
            <button class="btn btn-sm btn-outline-dark w-100">Edit Photo</button>
        </div> -->

<div class="col-md-2 text-center">
    <img src="<?php echo $avatar_url; ?>" 
         id="profilePreview"
         class="rounded-circle img-fluid mb-3 border p-1 bg-light" 
         alt="Doctor"
         style="width: 180px; height: 180px; object-fit: cover;">
         
    <button type="button" class="btn btn-sm btn-outline-dark w-100 mb-2" id="btnEditPhoto">
        <i class="bi bi-camera me-1"></i> Edit Photo
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