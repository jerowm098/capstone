// 1. Function para mag-generate ng Random 6-char Password
function generateRandomPassword() {
    const chars = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
    let password = "";
    for (let i = 0; i < 6; i++) {
        password += chars.charAt(Math.floor(Math.random() * chars.length));
    }
    // Ilagay ang password sa input field
    const passwordField = document.getElementById('generatedPassword');
    if(passwordField) {
        passwordField.value = password;
    }
    return password;
}

// 2. Main function para sa Registration Details (ID + Password + QR)
function generateRegistrationDetails() {
    // A. Generate Password muna para sigurado tayong may laman na ang field
    const password = generateRandomPassword();

    // B. Generate Random ID
    const randomID = Math.floor(1000 + Math.random() * 9000);
    const finalID = "STU-" + randomID;
    
    // I-display ang ID sa UI
    document.getElementById('displayID').innerText = finalID;
    document.getElementById('hiddenID').value = finalID;

    // C. Generate QR Code (Dito na ipapasok ang ID at Password)
    const qrContainer = document.getElementById("qrcode");
    qrContainer.innerHTML = ""; // Linisin muna
    
    new QRCode(qrContainer, {
        text: `${finalID}|${password}`, // Format: ID|PASSWORD
        width: 150,
        height: 150,
        colorDark : "#000000",
        colorLight : "#ffffff",
        correctLevel : QRCode.CorrectLevel.H
    });
}

// 3. Download Function
function downloadQR() {
    const qrCanvas = document.querySelector('#qrcode canvas');
    if (qrCanvas) {
        const studentID = document.getElementById('hiddenID').value;
        const image = qrCanvas.toDataURL("image/png");
        const link = document.createElement('a');
        link.href = image;
        link.download = `QR-ID-${studentID}.png`;
        link.click();
    }
}

// 4. Submit Handler (SweetAlert)
function handleRegistration(event) {
    event.preventDefault(); 
    
    const studentID = document.getElementById('hiddenID').value;
    const password = document.getElementById('generatedPassword').value;

    Swal.fire({
        title: 'Account Created!',
        html: `ID: <b>${studentID}</b><br>Pass: <b>${password}</b><br><br>Download your QR code to login easily.`,
        icon: 'success',
        showCancelButton: true,
        confirmButtonColor: '#000',
        confirmButtonText: '<i class="bi bi-download"></i> Download QR',
    }).then((result) => {
        if (result.isConfirmed) {
            downloadQR();
        }
    });
}

// 5. I-run lahat pagka-load ng window
window.onload = generateRegistrationDetails;