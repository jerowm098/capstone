<?php
include 'view-00-mainprofile.php';
?>



<h2 class="fw-bold mb-4">Edit Profile</h2>

<div class="card border-0 shadow-sm p-4">
    <form id="editProfileForm" action="update-profile.php" method="POST" autocomplete="off">
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

<script>
// --- 1. Toggle Password Visibility ---
document.querySelectorAll('.toggle-password').forEach(button => {
    button.addEventListener('click', function() {
        const input = this.parentElement.querySelector('input');
        const icon = this.querySelector('i');
        input.type = (input.type === 'password') ? 'text' : 'password';
        icon.classList.toggle('bi-eye-slash');
        icon.classList.toggle('bi-eye');
    });
});

// --- 2. Live Hint Logic ---
const fnameInput = document.getElementById('fname');
const lnameInput = document.getElementById('lname');
const newPass = document.getElementById('newPassword');
const confPass = document.getElementById('confirmPassword');
const contactNum = document.getElementById('contact_num');
const emailField = document.getElementById('email');

const hintFname = document.getElementById('hint-fname');
const hintLname = document.getElementById('hint-lname');
const hintPass = document.getElementById('hint-password');
const hintConf = document.getElementById('hint-confirm');
const hintContact = document.getElementById('hint-contact');
const hintEmail = document.getElementById('hint-email');

// Function para sa Name Validation (Bawal numbers)
function validateName(input, hint) {
    // I-remove ang kahit anong number habang nagta-type
    input.value = input.value.replace(/[0-9]/g, ''); 
    
    if (input.value.trim().length < 2) {
        hint.textContent = "Name too short";
        hint.className = "input-hint text-danger";
    } else {
        hint.textContent = "Looks good!";
        hint.className = "input-hint text-success";
    }
}

fnameInput.addEventListener('input', () => validateName(fnameInput, hintFname));
lnameInput.addEventListener('input', () => validateName(lnameInput, hintLname));

// Password Validation
newPass.addEventListener('input', () => {
    if (newPass.value.length > 0 && newPass.value.length < 6) {
        hintPass.textContent = "Too short (min 6)";
        hintPass.className = "input-hint text-danger";
    } else if (newPass.value.length >= 6) {
        hintPass.textContent = "Strong enough";
        hintPass.className = "input-hint text-success";
    } else {
        hintPass.textContent = "Min. 6 characters";
        hintPass.className = "input-hint text-muted";
    }
    validateMatch();
});

confPass.addEventListener('input', validateMatch);

function validateMatch() {
    if (confPass.value === "") {
        hintConf.textContent = "Passwords must match";
        hintConf.className = "input-hint text-muted";
    } else if (confPass.value === newPass.value) {
        hintConf.textContent = "Passwords match!";
        hintConf.className = "input-hint text-success";
    } else {
        hintConf.textContent = "Passwords do not match";
        hintConf.className = "input-hint text-danger";
    }
}

// Contact Number Validation
contactNum.addEventListener('input', () => {
    contactNum.value = contactNum.value.replace(/[^0-9]/g, ''); 
    if (contactNum.value.length === 9) {
        hintContact.textContent = "Valid number format";
        hintContact.className = "input-hint text-success";
    } else {
        hintContact.textContent = "Enter exactly 9 digits";
        hintContact.className = "input-hint text-danger";
    }
});

// Email Validation
emailField.addEventListener('input', () => {
    const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (re.test(emailField.value)) {
        hintEmail.textContent = "Valid email address";
        hintEmail.className = "input-hint text-success";
    } else {
        hintEmail.textContent = "Invalid email format";
        hintEmail.className = "input-hint text-danger";
    }
});

// --- 3. Final Form Validation before Submit ---
document.getElementById('editProfileForm').addEventListener('submit', function(e) {
    if (newPass.value.length > 0 && newPass.value.length < 6) {
        e.preventDefault();
        alert("New password must be at least 6 characters.");
    } else if (newPass.value !== confPass.value) {
        e.preventDefault();
        alert("Passwords do not match!");
    }
});
</script>