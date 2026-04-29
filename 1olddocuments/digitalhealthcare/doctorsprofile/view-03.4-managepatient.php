<?php include 'view-00-mainprofile.php'; ?>
<link rel="stylesheet" href="view-03.4-consultation.css">

<div class="container-fluid py-4">
    <div class="row">
        <div class="col-md-4">
            <div class="card shadow-sm mb-4">
                <div class="card-header bg-maroon text-white">
                    <h5 class="card-title mb-0">Student Profile</h5>
                </div>
                <div class="card-body">
                    <div class="text-center mb-3">
                        <div id="qr-reader-results" class="p-3 border rounded bg-light">
                            <i class="fas fa-user-circle fa-4x text-secondary"></i>
                            <h6 class="mt-2" id="student-name">Scanning Patient...</h6>
                        </div>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item d-flex justify-content-between">
                            <span>Student ID:</span> <strong id="student-id">--</strong>
                        </li>
                        <li class="list-group-item">
                            <span class="text-danger fw-bold"><i class="fas fa-exclamation-triangle"></i> Allergies:</span>
                            <p id="allergy-list" class="mb-0 text-muted small">None disclosed</p>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="card shadow-sm">
                <div class="card-header bg-light">
                    <h6 class="mb-0">Current Triage Queue</h6>
                </div>
                <div class="list-group list-group-flush scrollable-queue" style="max-height: 300px; overflow-y: auto;">
                    <div class="list-group-item list-group-item-action">
                        <div class="d-flex w-100 justify-content-between">
                            <small class="fw-bold">10:05 AM</small>
                            <span class="badge bg-warning text-dark">Urgent</span>
                        </div>
                        <p class="mb-1 small text-truncate">Symptom: Severe Headache</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-header bg-white d-flex justify-content-between align-items-center">
                    <h5 class="mb-0 text-maroon">Medical Consultation</h5>
                    <span class="badge bg-info">Session Active</span>
                </div>
                <div class="card-body">
                    <form action="process_consultation.php" method="POST">
                        <div class="mb-4 p-3 bg-light rounded border-start border-4 border-info">
                            <h6><i class="fas fa-clipboard-check"></i> Initial Triage Data</h6>
                            <div class="row g-2 mt-1">
                                <div class="col-sm-4"><small>Vital Signs:</small> <div class="fw-bold">BP: 120/80</div></div>
                                <div class="col-sm-8"><small>Reason for Visit:</small> <div class="fw-bold">Fever and Chills</div></div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Diagnosis</label>
                            <input type="text" class="form-control" name="diagnosis" placeholder="Enter primary diagnosis" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Clinical Notes</label>
                            <textarea class="form-control" name="consultation_notes" rows="4" placeholder="Detail the medical assessment..."></textarea>
                        </div>

                        <div class="row mb-4">
                            <div class="col-md-6">
                                <label class="form-label fw-bold">Prescribed Medicine</label>
                                <select class="form-select" name="medication_id">
                                    <option selected>Select from inventory...</option>
                                    <option value="1">Paracetamol (500mg)</option>
                                    <option value="2">Ibuprofen (200mg)</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-bold">Intervention</label>
                                <input type="text" class="form-control" name="intervention" placeholder="e.g., Bed rest, Wound dressing">
                            </div>
                        </div>

                        <div class="d-grid gap-2 d-md-flex justify-content-md-end border-top pt-3">
                            <button type="reset" class="btn btn-outline-secondary px-4">Clear</button>
                            <button type="submit" class="btn btn-maroon px-5 text-white">Save Record</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>