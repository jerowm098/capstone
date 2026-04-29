let isSubmitted = false; // Default ay false dahil fresh pa ang page

/* --- 1. PAGE LOAD & ANIMATIONS --- */
window.addEventListener('DOMContentLoaded', () => {
    const urlParams = new URLSearchParams(window.location.search);
    if (urlParams.has('startAnim')) {
        const img = document.querySelector('.signup-image');
        const content = document.querySelector('.signup-container');
        if (img) img.classList.add('animate-left');
        if (content) content.classList.add('animate-right');
        window.history.replaceState({}, document.title, window.location.pathname);
    }
});

/* --- 2. GLOBAL CONFIGURATION --- */
const fields = [
    { id: 'firstName', hintId: 'hint-firstName', type: 'fname', msg: 'Enter first name' },
    { id: 'lastName', hintId: 'hint-lastName', type: 'lname', msg: 'Enter last name' },
    { id: 'contactNum', hintId: 'hint-contact', type: 'contact', msg: 'Enter 9-digit number' }, // Idagdag ito
    { id: 'email', hintId: 'hint-email', type: 'email', msg: 'Enter valid email' },
    { id: 'expertise', hintId: 'hint-expertise', type: 'select', msg: 'Select expertise' },
    { id: 'gender', hintId: 'hint-gender', type: 'select', msg: 'Select gender' }, // Idagdag ito
    { id: 'mainPassword', hintId: 'hint-password', type: 'password', msg: 'Min. 6 characters' },
    { id: 'confirmPassword', hintId: 'hint-confirm', type: 'confirm', msg: 'Please Confirm Password' },
    { id: 'birthMonth', hintId: 'hint-birthMonth', type: 'select', msg: 'Select month' },
    { id: 'birthDay', hintId: 'hint-birthDay', type: 'day', msg: '1-31' },
    { id: 'birthYear', hintId: 'hint-birthYear', type: 'year', msg: '1900-2026' },
    { id: 'policyCheck', hintId: 'hint-policy', type: 'checkbox', msg: 'Please agree to terms' } // Isinama ang checkbox
];

/* --- 3. UI UPDATE ENGINE --- */
function updateUI(input, hint, isValid, message) {
    const container = input.closest('.input-group') || input.closest('.form-check') || input;
    hint.textContent = message;
    hint.classList.add('hint-visible');
    
    if (isValid) {
        container.classList.remove('is-invalid-live');
        container.classList.add('is-valid-live');
        hint.style.color = "#198754"; // Green
        input.setCustomValidity("");
    } else {
        container.classList.remove('is-valid-live');
        container.classList.add('is-invalid-live');
        hint.style.color = "#dc3545"; // Red
        input.setCustomValidity("Invalid");
    }
}

function resetUI(input, hint, msg) {
    const container = input.closest('.input-group') || input.closest('.form-check') || input;
    container.classList.remove('is-valid-live', 'is-invalid-live');
    hint.textContent = msg;
    hint.style.color = "#666";
}

function hideAllHints() {
    fields.forEach(f => {
        const h = document.getElementById(f.hintId);
        if (h) h.classList.remove('hint-visible');
    });
}

/* --- 4. VALIDATION LOGIC --- */
/* --- 4. VALIDATION LOGIC --- */
function validateInput(input, hint, field) {
    if (!input || !hint) return false;

    let isValid = false;
    let currentMsg = field.msg;

    // Special Logic para sa Checkbox
    if (field.type === 'checkbox') {
        isValid = input.checked;
        if (isValid) {
            updateUI(input, hint, true, "Agreed to the Terms");
        } else {
            if (isSubmitted) {
                updateUI(input, hint, false, "Please agree to terms");
            } else {
                resetUI(input, hint, field.msg);
                hint.classList.add('hint-visible');
            }
        }
        return isValid;
    }

    // Anti-space (except names)
    if (!['fname', 'lname'].includes(field.type)) {
        input.value = input.value.replace(/\s/g, '');
    }

    let val = input.value.trim();

    if (val === "") {
        resetUI(input, hint, field.msg);
        return false;
    }

    switch (field.type) {
        case 'contact': // INAYOS NA CONTACT LOGIC
            const contactRegex = /^\d{9}$/;
            isValid = contactRegex.test(val);
            currentMsg = isValid ? "Valid Number" : "Enter exactly 9 digits";
            break;

        case 'email':
            const emailRegex = /^[a-zA-Z0-9._%+-]+@(gmail|yahoo|outlook|hotmail)\.(com|gov)$/i;
            isValid = emailRegex.test(val);
            const domainMatch = val.match(/@([a-z0-9.-]+)$/i);
            const domainName = domainMatch ? domainMatch[1] : "";
            if (isValid) {
                currentMsg = `${domainName} is valid!`;
            } else {
                if (!val.includes('@')) currentMsg = 'Missing "@" symbol';
                else if (!val.match(/\.(com|gov)$/)) currentMsg = 'Only .com and .gov are allowed';
                else currentMsg = "Use Gmail, Yahoo, Outlook, or Hotmail";
            }
            break;

        case 'password':
            isValid = val.length >= 6;
            currentMsg = isValid ? "Password strength: Good" : `Min. 6 characters (Current: ${val.length})`;
            break;

        case 'confirm':
            const mainPass = document.getElementById('mainPassword').value;
            isValid = val === mainPass && val !== "";
            currentMsg = isValid ? `Passwords match` : `Passwords do not match`;
            break;

        case 'day':
            if (input.value.length > 2) input.value = input.value.slice(0, 2);
            const d = parseInt(input.value);
            isValid = !isNaN(d) && d >= 1 && d <= 31;
            currentMsg = isValid ? "OK" : "1-31 only";
            break;

        case 'year':
            if (input.value.length > 4) input.value = input.value.slice(0, 4);
            const y = parseInt(input.value);
            isValid = !isNaN(y) && y >= 1900 && y <= 2026 && input.value.length === 4;
            currentMsg = isValid ? "OK" : "1900-2026 only";
            break;

        case 'select':
            isValid = val !== "";
            currentMsg = isValid ? "Selected" : "Required";
            break;

        default: // fname, lname
            input.value = input.value.replace(/[^a-zA-Z\s\-]/g, '');
            val = input.value.trim();
            isValid = val.length >= 2;
            currentMsg = isValid ? "Valid name" : "Too short";
    }

    updateUI(input, hint, isValid, currentMsg);
    return isValid;
}




/* --- 5. INITIALIZE LISTENERS --- */
document.addEventListener('DOMContentLoaded', () => {
    setupPasswordToggle('mainPassword', 'toggleMainPassword');
    setupPasswordToggle('confirmPassword', 'toggleConfirmPassword');

    fields.forEach(field => {
        const input = document.getElementById(field.id);
        const hint = document.getElementById(field.hintId);

        if (input && hint) {
            // Para sa normal inputs (keydown prevention)
            if (input.type !== 'checkbox') {
                input.addEventListener('keydown', (e) => {
                    if ((e.key === " " || e.keyCode === 32) && !['fname', 'lname'].includes(field.type)) {
                        e.preventDefault();
                    }
                });
            }

            // Focus (Scenario 1)
/* --- FOCUS --- */
input.addEventListener('focus', () => {
    hint.classList.add('hint-visible');
    const container = input.closest('.input-group') || input.closest('.form-check') || input;
    
    // Gawing normal ang box na clinick
    container.classList.remove('is-invalid-live', 'is-valid-live');
    hint.textContent = field.msg;
    hint.style.color = "#666"; 
});

            // Input/Change (Scenario 2)
            const eventType = field.type === 'checkbox' ? 'change' : 'input';
            input.addEventListener(eventType, () => {
                validateInput(input, hint, field);
                
                if (field.id === 'mainPassword') {
                    const confirmInput = document.getElementById('confirmPassword');
                    const confirmHint = document.getElementById('hint-confirm');
                    const confirmField = fields.find(f => f.id === 'confirmPassword');
                    if (confirmInput && confirmInput.value !== "") {
                        validateInput(confirmInput, confirmHint, confirmField);
                    }
                }
            });

/* --- HANAPIN ANG BLUR LISTENER AT PALITAN NG GANITO --- */
input.addEventListener('blur', () => {
    const container = input.closest('.input-group') || input.closest('.form-check') || input;

    // PARA SA CHECKBOX:
    if (field.type === 'checkbox') {
        // Kung hindi siya naka-check at lumipat ka ng box...
        if (!input.checked) {
            if (isSubmitted) {
                // I-maintain ang pagka-pula kung nakapag-submit na dati
                container.classList.add('is-invalid-live');
                hint.classList.add('hint-visible');
            } else {
                // ITAGO ANG HINT kapag lumipat sa ibang box (Fresh state)
                hint.classList.remove('hint-visible');
            }
        }
        // Kung naka-check naman, hayaan lang siyang GREEN (huwag itago)
        return; 
    }

    // PARA SA NORMAL TEXT FIELDS: (Same logic as before)
    const val = input.value.trim();
    if (val === "") {
        if (isSubmitted) {
            container.classList.add('is-invalid-live');
            hint.textContent = "This field is required!";
            hint.style.color = "#dc3545";
            hint.classList.add('hint-visible');
        } else {
            hint.classList.remove('hint-visible');
            container.classList.remove('is-invalid-live', 'is-valid-live');
        }
    } else {
        validateInput(input, hint, field);
    }
});
        }
    });
});

/* --- 6. UTILITIES --- */
function setupPasswordToggle(inputId, iconId) {
    const icon = document.getElementById(iconId);
    const input = document.getElementById(inputId);
    if (icon && input) {
        icon.parentElement.addEventListener('click', () => {
            const isPass = input.type === "password";
            input.type = isPass ? "text" : "password";
            icon.classList.toggle("bi-eye-slash", !isPass);
            icon.classList.toggle("bi-eye", isPass);
        });
    }
}

/* --- 7. FORM SUBMISSION (Scenario 3) --- */
const signupForm = document.getElementById('signupForm');
if (signupForm) {
    signupForm.addEventListener('submit', function (event) {
        event.preventDefault();

        // INTEGRATION START: Dito natin gagawing TRUE ang flag
        isSubmitted = true;

        let isFormValid = true;

        fields.forEach(field => {
            const input = document.getElementById(field.id);
            const hint = document.getElementById(field.hintId);
            
            // Re-validate lahat para lumabas ang red hints sa blank fields
            if (!validateInput(input, hint, field)) {
                isFormValid = false;
                // Force update UI para sa blank o unchecked fields
                if ((field.type !== 'checkbox' && input.value === "") || (field.type === 'checkbox' && !input.checked)) {
                    updateUI(input, hint, false, "This field is required!");
                }
            }
        });

        if (!isFormValid) {
            Swal.fire({ 
                title: 'Oops!', 
                text: 'Please fill up all required fields correctly.', 
                icon: 'warning', 
                confirmButtonColor: '#000' 
            });
            return;
        }

        const userData = {
            fname: document.getElementById('firstName').value,
            lname: document.getElementById('lastName').value,
            // Pinagdikit natin ang prefix at ang 9-digits input
            contact: "+639" + document.getElementById('contactNum').value, // Dapat match dito sa PHP
            gender: document.getElementById('gender').value,
            email: document.getElementById('email').value,
            expertise: document.getElementById('expertise').value, // <--- ADD THIS LINE
            password: document.getElementById('mainPassword').value,
            bMonth: document.getElementById('birthMonth').value,
            bDay: document.getElementById('birthDay').value,
            bYear: document.getElementById('birthYear').value,
            policy: document.getElementById('policyCheck').checked
        };

        fetch('create-account.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify(userData)
        })
        .then(res => res.json())
        .then(data => {
            if (data.status === 'success') {
                Swal.fire({ title: 'Success!', text: 'Account Created!', icon: 'success', confirmButtonColor: '#000' })
                .then(() => window.location.href = '../login/loginhtml.php');
            } else {
                Swal.fire({ title: 'Error!', text: data.message, icon: 'error' });
            }
        })
        .catch(err => {
            console.error('Error:', err);
            Swal.fire({ title: 'Error!', text: 'Connection failed', icon: 'error' });
        });
    });
}


