<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <link rel="stylesheet" href="create-account.css">
    <title>Create Account | Digital Healthcare</title>
</head>
<body>
<div id="page-content" class="animate__animated animate__fadeIn">
    <div class="container-fluid vh-100 p-0">
        <div class="row g-0 vh-100">
            <div class="col-md-6 d-flex align-items-center bg-white p-4 p-lg-5">
                <div class="signup-container mx-auto">
                    <div class="mb-3"> <a class="navbar-brand fw-bold text-dark fs-3" href="../index/indexhtml.php">HEALTH<span class="text-secondary">CARE</span></a>
                        <h2 class="fw-bold mt-2">Join Our Community</h2>
                        </div>

                    <form id="signupForm" class="needs-validation" novalidate autocomplete="off">
                        <div class="row mb-3">
                            <div class="col-md-6 position-relative">
                                <label class="form-label small fw-bold">FIRST NAME</label>
                                <div class="input-group has-validation">
                                    <input type="text" id="firstName" name="fname" class="form-control border-end-0" placeholder="ex. Juan" required>
                                    <span class="input-group-text bg-transparent border-start-0"><i class="bi bi-person text-muted"></i></span>
                                </div>
                                <div id="hint-firstName" class="input-hint">Required (no numbers)</div>
                            </div>

                            <div class="col-md-6 position-relative">
                                <label class="form-label small fw-bold">LAST NAME</label>
                                <div class="input-group has-validation">
                                    <input type="text" id="lastName" name="lname" class="form-control border-end-0" placeholder="ex. Dela Cruz" required>
                                    <span class="input-group-text bg-transparent border-start-0"><i class="bi bi-person-fill text-muted"></i></span>
                                </div>
                                <div id="hint-lastName" class="input-hint">Required family name</div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-8 position-relative">
                            <label class="form-label small fw-bold">CONTACT NUMBER</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0" style="font-size: 0.9rem; font-weight: bold;">+639</span>
                                
                                <input type="tel" id="contactNum" name="contactNum" 
                                    class="form-control border-start-0" 
                                    placeholder="XXXXXXXXX" 
                                    maxlength="9" 
                                    oninput="this.value = this.value.replace(/[^0-9]/g, '')" 
                                    required>
                                    
                                <span class="input-group-text bg-transparent border-start-0"><i class="bi bi-phone text-muted"></i></span>
                            </div>
                            <div id="hint-contact" class="input-hint">Please enter the remaining 9 digits</div>
                        </div>

                            <div class="col-md-4 position-relative">
                                <label class="form-label small fw-bold">GENDER</label>
                                <div class="input-group">
                                    <select id="gender" name="gender" class="form-select" style="border-radius: 4px;" required>
                                        <option value="" selected disabled hidden>Select</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    </select>
                                </div>
                                <div id="hint-gender" class="input-hint">Select gender</div>
                            </div>
                        </div>

                        <!-- <div class="mb-3 position-relative">
                            <label class="form-label small fw-bold text-uppercase">Email Address</label>
                            <div class="input-group">
                                <input type="email" id="email" name="email" class="form-control border-end-0" placeholder="name@gmail.com" required>
                                <span class="input-group-text bg-transparent border-start-0"><i class="bi bi-envelope text-muted"></i></span>
                            </div>
                            <div id="hint-email" class="input-hint">Gmail, Yahoo, or Outlook only</div>
                        </div> -->

                        <div class="row mb-3">
                            <div class="col-md-7 position-relative">
                                <label class="form-label small fw-bold text-uppercase">Email Address</label>
                                <div class="input-group">
                                    <input type="email" id="email" name="email" class="form-control border-end-0" placeholder="name@gmail.com" required>
                                    <span class="input-group-text bg-transparent border-start-0"><i class="bi bi-envelope text-muted"></i></span>
                                </div>
                                <div id="hint-email" class="input-hint">Gmail, Yahoo, or Outlook only</div>
                            </div>

                            <div class="col-md-5 position-relative">
                                <label class="form-label small fw-bold text-uppercase">Expertise</label>
                                <div class="input-group">
                                    <select id="expertise" name="expertise" class="form-select" style="border-radius: 4px;" required>
                                        <option value="" selected disabled hidden>Select</option>
                                        <option value="Cardiologist">Cardiologist</option>
                                        <option value="Pediatrician">Pediatrician</option>
                                        <option value="Neurologist">Neurologist</option>
                                        <option value="General Physician">General Physician</option>
                                        <option value="Neurologist">Surgeon</option>
                                    </select>
                                </div>
                                <div id="hint-expertise" class="input-hint">Select your specialization</div>
                            </div>
                        </div>



                        <div class="row mb-3">
                            <div class="col-md-6 position-relative">
                                <label class="form-label small fw-bold">PASSWORD</label>
                                <div class="input-group">
                                    <input type="password" id="mainPassword" name="password" class="form-control border-end-0" placeholder="••••••••" required>
                                    <span class="input-group-text bg-transparent border-start-0" style="cursor: pointer;">
                                        <i class="bi bi-eye-slash text-muted" id="toggleMainPassword"></i>
                                    </span>
                                </div>
                                <div id="hint-password" class="input-hint">Min. 6 characters</div>
                            </div>

                            <div class="col-md-6 position-relative">
                                <label class="form-label small fw-bold">CONFIRM PASSWORD</label>
                                <div class="input-group">
                                    <input type="password" id="confirmPassword" class="form-control border-end-0" placeholder="••••••••" required>
                                    <span class="input-group-text bg-transparent border-start-0" style="cursor: pointer;">
                                        <i class="bi bi-eye-slash text-muted" id="toggleConfirmPassword"></i>
                                    </span>
                                </div>
                                <div id="hint-confirm" class="input-hint">Match your password</div>
                            </div>
                        </div>

                        <label class="form-label small fw-bold">BIRTHDAY</label>
                        <div class="row g-2 mb-3">
                            <div class="col-4 position-relative">
                                <select class="form-select" id="birthMonth" name="birthMonth" required>
                                    <option value="" selected disabled hidden>Month</option>
                                    <option value="01">Jan</option>
                                    <option value="02">Feb</option>
                                    <option value="03">Mar</option>
                                    <option value="04">Apr</option>
                                    <option value="05">May</option>
                                    <option value="06">Jun</option>
                                    <option value="07">Jul</option>
                                    <option value="08">Aug</option>
                                    <option value="09">Sep</option>
                                    <option value="10">Oct</option>
                                    <option value="11">Nov</option>
                                    <option value="12">Dec</option>
                                </select>
                                <div id="hint-birthMonth" class="input-hint">Required</div>
                            </div>

                            <div class="col-4 position-relative">
                                <input type="number" id="birthDay" class="form-control" placeholder="Day" required>
                                <div id="hint-birthDay" class="input-hint">1-31</div>
                            </div>

                            <div class="col-4 position-relative">
                                <input type="number" id="birthYear" class="form-control" placeholder="Year" required>
                                <div id="hint-birthYear" class="input-hint">1900-2026</div>
                            </div>
                        </div>

                        <div class="form-check mb-3 position-relative">
                            <input class="form-check-input" type="checkbox" id="policyCheck" required>
                            <label class="form-check-label small text-muted" for="policyCheck">
                                I agree to the <a href="#" class="text-dark fw-bold">Terms of Service</a>.
                            </label>
                            <div id="hint-policy" class="input-hint">Please agree to terms</div>
                        </div>

                        <button type="submit" class="btn btn-dark w-100 py-2 mb-2">CREATE ACCOUNT</button>
                        <div class="text-center">
                            <p class="small mb-0">Already have an account? <a href="../login/loginhtml.php?startAnim=1" class="text-dark fw-bold text-decoration-none">Log In</a></p>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-6 d-none d-md-block p-0">
                <div class="signup-image"></div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="create-account.js"></script>
</body>
</html>