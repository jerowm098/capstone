document.addEventListener('DOMContentLoaded', function() {
    
    // --- 1. REUSABLE FUNCTION PARA SA PAGBABAWAL NG SPACES ---
    function restrictSpaces(inputField) {
        if (!inputField) return;
        inputField.addEventListener('keydown', function(e) {
            if (e.key === " " || e.keyCode === 32) e.preventDefault();
        });
        inputField.addEventListener('input', function() {
            this.value = this.value.replace(/\s/g, '');
        });
    }

    // --- 2. I-APPLY ANG RESTRICTION ---
    restrictSpaces(document.getElementById('emailInput'));
    restrictSpaces(document.getElementById('oldPassword'));
    restrictSpaces(document.getElementById('newPassword'));
    restrictSpaces(document.getElementById('confirmPassword')); // DAGDAG ITO

    // --- 3. EYE TOGGLE FUNCTIONS ---
    function setupToggle(buttonId, inputId, iconId) {
        const toggleBtn = document.getElementById(buttonId);
        const passInput = document.getElementById(inputId);
        const icon = document.getElementById(iconId);

        if (toggleBtn && passInput && icon) {
            toggleBtn.addEventListener('click', function() {
                const isPassword = passInput.type === "password";
                passInput.type = isPassword ? "text" : "password";
                icon.classList.toggle('bi-eye', isPassword);
                icon.classList.toggle('bi-eye-slash', !isPassword);
            });
        }
    }

    setupToggle('toggleOldPassword', 'oldPassword', 'iconOld');
    setupToggle('toggleNewPassword', 'newPassword', 'iconNew');
    setupToggle('toggleConfirmPassword', 'confirmPassword', 'iconConfirm'); // DAGDAG ITO
});

/* --- 4. UPDATE PASSWORD SUBMISSION --- */
const updateForm = document.getElementById('updatePasswordForm');
if (updateForm) {
    updateForm.addEventListener('submit', function(e) {
        e.preventDefault();

        const email = document.getElementById('emailInput').value;
        const oldPassword = document.getElementById('oldPassword').value;
        const newPassword = document.getElementById('newPassword').value;
        const confirmPassword = document.getElementById('confirmPassword').value; // DAGDAG ITO

        // Basic Validation
        if (newPassword.length < 6) {
            return Swal.fire('Error', 'New password must be at least 6 characters.', 'warning');
        }

        // --- ETO UNG CHECK KUNG MATCH ---
        if (newPassword !== confirmPassword) {
            return Swal.fire({
                title: 'Mismatch!',
                text: 'New password and confirm password do not match.',
                icon: 'error',
                confirmButtonColor: '#000000'
            });
        }

        // Ipadala ang data sa PHP
        fetch('forgotpass_update-auth.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({ email, oldPassword, newPassword })
        })
        .then(res => res.json())
        .then(data => {
            if (data.status === 'success') {
                Swal.fire({
                    title: 'Success!',
                    text: data.message,
                    icon: 'success',
                    confirmButtonColor: '#000000',
                    heightAuto: false, 
                    scrollbarPadding: false 
                }).then(() => {
                    window.location.href = '../login/loginhtml.php';
                });
            } else {
                Swal.fire('Error', data.message, 'error');
            }
        })
        .catch(err => {
            console.error('Error:', err);
            Swal.fire('Error', 'Something went wrong.', 'error');
        });
    });
}