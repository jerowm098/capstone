<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kiosk Registration | CareLink</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    
    <style>
        body { background-color: #f8f9fa; }
        .kiosk-card { border-radius: 20px; border: none; }
        
        .numpad-btn {
            width: 100%;
            height: 70px;
            font-size: 1.5rem;
            font-weight: bold;
            margin-bottom: 10px;
            border-radius: 10px;
        }

        /* Pinaganda ang input para magmukhang digital mask */
        #studentNumInput {
            letter-spacing: 4px;
            font-family: 'Courier New', Courier, monospace;
            font-weight: bold;
            background-color: #ffffff !important;
            text-align: center;
            font-size: 1.8rem;
            border: 2px solid #dee2e6;
            color: #212529;
        }

        /* Style para sa placeholder effect */
        #studentNumInput::placeholder {
            color: #adb5bd;
            letter-spacing: 4px;
        }
    </style>
</head>
<body>

<div class="container-fluid vh-100 d-flex align-items-center justify-content-center">
    <div class="container bg-white shadow-lg kiosk-card p-5">
        
        <div class="kiosk-header text-center mb-5">
            <h1 class="fw-bold text-dark">STUDENT REGISTRATION</h1>
            <p class="text-muted fs-5">Tap the box to enter your Student Number</p>
        </div>

        <div class="row g-5">
            <div class="col-md-6 border-end">
                <form id="registrationForm">
                    <div class="mb-4">
                        <label class="form-label fw-bold">Student Number</label>
                        <input type="text" id="studentNumInput" class="form-control form-control-lg" 
                               placeholder="____-_____-BN-_" required 
                               data-bs-toggle="modal" data-bs-target="#numpadModal" readonly>
                    </div>
                    
                    <div class="mb-4">
                        <label class="form-label fw-bold">Reason for Visit</label>
                        <select class="form-select form-select-lg" required>
                            <option value="" selected disabled>Select symptoms...</option>
                            <option>Headache (Masakit ang ulo)</option>
                            <option>Stomachache (Masakit ang tiyan)</option>
                            <option>Fever (Lagnat)</option>
                            <option>Injury (Sugat/Bali)</option>
                            <option>Dental Concern (Masakit ang ngipin)</option>
                        </select>
                    </div>
                    
                    <button type="submit" class="btn btn-dark btn-lg w-100 py-3 fw-bold">
                        <i class="bi bi-qr-code-scan me-2"></i> GENERATE QR & QUEUE
                    </button>
                </form>
            </div>
            
            <div class="col-md-6 d-flex flex-column align-items-center justify-content-center text-center">
                <div id="qrContainer" class="d-none">
                    <div id="qrCodePlaceholder" class="p-4 border bg-white mb-3 shadow-sm">
                        <img src="https://api.qrserver.com/v1/create-qr-code/?size=250x250&data=Success" alt="QR Code" style="width:250px;">
                    </div>
                    <h2 class="fw-bold text-success">SUCCESS!</h2>
                    <p class="text-danger fw-bold fs-5 mt-2">Resetting in <span id="timer">15</span>s</p>
                </div>
                
                <div id="noQrPlaceholder" class="text-muted">
                    <i class="bi bi-person-vcard-fill" style="font-size: 8rem; opacity: 0.1;"></i>
                    <p class="fs-5">Your details will be processed once submitted.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade numpad-modal" id="numpadModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm">
        <div class="modal-content shadow-lg border-0">
            <div class="modal-header border-0 pb-0">
                <h6 class="modal-title fw-bold">Enter ID Number</h6>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-4 text-center">
                <div class="row g-2">
                    <?php for($i=1; $i<=9; $i++): ?>
                        <div class="col-4">
                            <button class="btn btn-outline-dark numpad-btn shadow-sm" onclick="addNum('<?= $i ?>')"><?= $i ?></button>
                        </div>
                    <?php endfor; ?>
                    <div class="col-4">
                        <button class="btn btn-light text-danger numpad-btn shadow-sm" onclick="clearInput()"><i class="bi bi-backspace-fill"></i></button>
                    </div>
                    <div class="col-4">
                        <button class="btn btn-outline-dark numpad-btn shadow-sm" onclick="addNum('0')">0</button>
                    </div>
                    <div class="col-4">
                        <button class="btn btn-success numpad-btn shadow-sm" data-bs-dismiss="modal"><i class="bi bi-check-circle-fill"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

<script>
    const input = document.getElementById('studentNumInput');

    function updateDisplay(digits) {
        // Ito ang magic part: Pinagsasama ang tinype na digits at yung underscores
        let mask = "____-_____-BN-_";
        let result = "";
        let digitIdx = 0;

        for (let i = 0; i < mask.length; i++) {
            if (mask[i] === "_") {
                if (digitIdx < digits.length) {
                    result += digits[digitIdx];
                    digitIdx++;
                } else {
                    result += "_";
                }
            } else {
                result += mask[i];
            }
        }
        
        // Kung walang tinype, ipakita yung placeholder
        input.value = (digits.length > 0) ? result : "";
    }

    function addNum(num) {
        let currentDigits = input.getAttribute('data-raw-digits') || "";
        if (currentDigits.length < 10) {
            let newDigits = currentDigits + num;
            input.setAttribute('data-raw-digits', newDigits);
            updateDisplay(newDigits);
        }
    }

    function clearInput() {
        let currentDigits = input.getAttribute('data-raw-digits') || "";
        if (currentDigits.length > 0) {
            let newDigits = currentDigits.slice(0, -1);
            input.setAttribute('data-raw-digits', newDigits);
            updateDisplay(newDigits);
        }
    }

    document.getElementById('registrationForm').addEventListener('submit', function(e) {
        e.preventDefault();
        let rawDigits = input.getAttribute('data-raw-digits') || "";
        
        if(rawDigits.length < 10) {
            alert("Please complete the Student Number (10 digits).");
            return;
        }

        document.getElementById('qrContainer').classList.remove('d-none');
        document.getElementById('noQrPlaceholder').classList.add('d-none');
        
        let timeLeft = 15;
        const timerElement = document.getElementById('timer');
        const countdown = setInterval(() => {
            timeLeft--;
            timerElement.innerText = timeLeft;
            if(timeLeft <= 0) {
                clearInterval(countdown);
                location.reload();
            }
        }, 1000);
    });
</script>

</body>
</html>