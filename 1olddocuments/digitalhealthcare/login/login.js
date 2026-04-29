/* --- 1. PAGE LOAD ANIMATIONS --- */
window.addEventListener('DOMContentLoaded', () => {
    const urlParams = new URLSearchParams(window.location.search);
    if (urlParams.has('startAnim')) {
        const img = document.querySelector('.login-image');
        const content = document.querySelector('.login-form-container');
        if (img) img.classList.add('animate-left');
        if (content) content.classList.add('animate-right');
        window.history.replaceState({}, document.title, window.location.pathname);
    }
});

/* --- 2. PASSWORD VISIBILITY --- */
const toggleBtn = document.getElementById('toggleLoginPassword');
if (toggleBtn) {
    toggleBtn.addEventListener('click', function() {
        const passInput = document.getElementById('loginPassword');
        const isPass = passInput.type === "password";
        passInput.type = isPass ? "text" : "password";
        this.classList.toggle("bi-eye", isPass);
        this.classList.toggle("bi-eye-slash", !isPass);
    });
}

/* --- 3. INPUT RESTRICTIONS (NEW: NO SPACES) --- */
const loginEmailInput = document.getElementById('loginEmail');
const loginPasswordInput = document.getElementById('loginPassword');

const blockSpaces = (e) => {
    if (e.key === " " || e.keyCode === 32) {
        e.preventDefault();
        return false;
    }
};

const cleanSpaces = (inputField) => {
    inputField.value = inputField.value.replace(/\s/g, '');
};

if (loginEmailInput) {
    loginEmailInput.addEventListener('keydown', blockSpaces);
    loginEmailInput.addEventListener('input', function() { cleanSpaces(this); });
}

if (loginPasswordInput) {
    loginPasswordInput.addEventListener('keydown', blockSpaces);
    loginPasswordInput.addEventListener('input', function() { cleanSpaces(this); });
}

/* --- 4. LOGIN SUBMISSION (POP-UP ERRORS ONLY) --- */
const loginForm = document.getElementById('loginForm');
if (loginForm) {
    loginForm.addEventListener('submit', function (event) {
        event.preventDefault();

        const email = document.getElementById('loginEmail').value.trim();
        const password = document.getElementById('loginPassword').value.trim();
        
        // --- REMEMBER ME CHECK ---
        const remember = document.getElementById('remember').checked;

        // --- VALIDATION POP-UPS ---
        if (email === "" && password === "") {
            return showError('Opps!', 'Please input all fields');
        }
        if (email === "" && password !== "") {
            return showError('Email Required', 'Please enter your email address<br>to continue.');
        }
        if (email !== "" && password === "") {
            return showError('Password Required', 'Please enter your password<br>to access your account.');
        }
        if (!email.includes("@") || !email.includes(".com")) {
            return showError('Invalid Email', 'Please enter a valid email address<br>(e.g. name@gmail.com)');
        }
        if (password.length < 6) {
            return showError('Password Too Short', 'Password must be at least 6 characters.');
        }

        // --- FETCH API (DATABASE CHECK) ---
        fetch('loginauth.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({ email, password, remember }) 
        })
        .then(res => res.json())
        .then(data => {
            if (data.status === 'success') {
                
                /* --- REMEMBER ME LOGIC (EMAIL & PASSWORD) --- */
                const rememberCheckbox = document.getElementById('remember');
                
                if (rememberCheckbox && rememberCheckbox.checked) {
                    localStorage.setItem('rememberedEmail', email);
                    localStorage.setItem('rememberedPassword', password); // Dinagdag ang password
                } else {
                    localStorage.removeItem('rememberedEmail');
                    localStorage.removeItem('rememberedPassword'); // Burahin kung uncheck
                }

                Swal.fire({
                    title: 'Welcome Back!',
                    text: 'Redirecting to your profile...',
                    icon: 'success',
                    timer: 1500,
                    showConfirmButton: false
                }).then(() => { window.location.href = '../doctorsprofile/view-00-mainprofilehtml.php'; });
            } else {
                showError('Login Failed', data.message);
            }
        })
        .catch(err => {
            console.error('Error:', err);
            showError('Connection Error', 'Something went wrong. Please try again.');
        });
    });
}

/* --- UTILITY: SWAL ERROR HELPER --- */
function showError(title, message) {
    Swal.fire({
        title: title,
        html: message,
        icon: 'warning',
        confirmButtonColor: '#000000'
    });
}

/* --- 5. PAGE TRANSITIONS --- */
document.querySelectorAll('a[href="../createaccount/create-accounthtml.php"]').forEach(link => {
    link.addEventListener('click', function(e) {
        e.preventDefault();
        const formContainer = document.querySelector('.login-form-container');
        formContainer.style.transition = "transform 0.4s ease, opacity 0.3s ease";
        formContainer.style.transform = "translateX(-50px)";
        formContainer.style.opacity = "0";
        setTimeout(() => { window.location.href = this.href; }, 400);
    });
});

/* --- 6. REMEMBER ME FEATURE (PAGE LOAD) --- */
window.addEventListener('DOMContentLoaded', () => {
    const savedEmail = localStorage.getItem('rememberedEmail');
    const savedPassword = localStorage.getItem('rememberedPassword'); // Load saved password
    const emailInput = document.getElementById('loginEmail');
    const passwordInput = document.getElementById('loginPassword');
    const rememberCheckbox = document.getElementById('remember');

    if (savedEmail && emailInput) {
        emailInput.value = savedEmail;
        if (rememberCheckbox) rememberCheckbox.checked = true;
    }
    
    // Auto-fill password kung merong nakasave
    if (savedPassword && passwordInput) {
        passwordInput.value = savedPassword;
    }
});




