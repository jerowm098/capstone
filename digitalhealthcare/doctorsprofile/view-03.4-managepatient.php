<?php include 'view-00-mainprofile.php'; ?>
<link rel="stylesheet" href="view-03.4-consultation.css">

<div class="container-fluid animate__animated animate__fadeIn">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold m-0 text-dark">Active Consultation</h2>
            <p class="text-muted small m-0">Currently examining patient for diagnosis and treatment.</p>
        </div>
        <div class="text-end">
            <span class="badge bg-primary px-3 py-2 shadow-sm">SESSION ID: CNS-<?php echo date('is'); ?></span>
        </div>
    </div>

    <div class="card border-0 shadow-sm consult-header p-4 mb-4">
        <div class="row align-items-center">
            <div class="col-md-5 border-end">
                <div class="d-flex align-items-center">
                    <div class="rounded-circle bg-primary text-white d-flex align-items-center justify-content-center me-3" style="width: 60px; height: 60px; font-size: 1.5rem; font-weight: bold;">
                        JD
                    </div>
                    <div>
                        <h4 class="fw-bold m-0">Juan Dela Cruz</h4>
                        <div class="d-flex gap-2 mt-1">
                            <span class="connection-badge"><i class="bi bi-calendar-event me-1"></i>25 yrs old</span>
                            <span class="connection-badge"><i class="bi bi-gender-ambiguous me-1"></i>Male</span>
                            <span class="connection-badge text-primary"><i class="bi bi-person-badge me-1"></i>PAT-2024-001</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-7 ps-md-4">
                <div class="row">
                    <div class="col-6">
                        <small class="text-muted text-uppercase fw-bold d-block" style="font-size: 0.65rem;">Primary Ailment</small>
                        <p class="fw-bold text-danger m-0">Severe Hypertension</p>
                    </div>
                    <div class="col-6 text-end">
                        <button class="btn btn-outline-dark btn-sm" onclick="loadTab('view-03.3-managepatient.php')">
                            <i class="bi bi-folder2-open me-1"></i> Open Full Records
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row g-3">
        <div class="col-md-3">
            <button class="btn btn-consult btn-history w-100 shadow-sm" onclick="showConsultModal('history')">
                <i class="bi bi-clock-history"></i>
                <span class="fw-bold">Medical History</span>
                <small class="opacity-75">View past conditions</small>
            </button>
        </div>

        <div class="col-md-3">
            <button class="btn btn-consult btn-exam w-100 shadow-sm" onclick="showConsultModal('exam')">
                <i class="bi bi-heart-pulse"></i>
                <span class="fw-bold">Physical Exam</span>
                <small class="opacity-75">Vitals & observations</small>
            </button>
        </div>

        <div class="col-md-3">
            <button class="btn btn-consult btn-diagnose w-100 shadow-sm" onclick="showConsultModal('diagnose')">
                <i class="bi bi-clipboard2-pulse"></i>
                <span class="fw-bold">Diagnosis</span>
                <small class="opacity-75">Findings & assessments</small>
            </button>
        </div>

        <div class="col-md-3">
            <button class="btn btn-consult btn-prescribe w-100 shadow-sm" onclick="showConsultModal('prescribe')">
                <i class="bi bi-capsule"></i>
                <span class="fw-bold">Prescription</span>
                <small class="opacity-75">Medication & dosage</small>
            </button>
        </div>
    </div>

    <div class="mt-4">
        <div class="card border-0 shadow-sm bg-light">
            <div class="card-body py-3 d-flex justify-content-between align-items-center">
                <div class="d-flex align-items-center">
                    <div class="bg-white p-2 rounded me-3 shadow-sm text-primary">
                        <i class="bi bi-graph-up-arrow fs-5"></i>
                    </div>
                    <div>
                        <p class="m-0 small fw-bold">Impact on Patient Insights</p>
                        <small class="text-muted">Saving this session will automatically update the <strong>Patient Insights (View-03.1)</strong> analytics.</small>
                    </div>
                </div>
                <button class="btn btn-dark px-4 fw-bold shadow">FINISH & SAVE SESSION</button>
            </div>
        </div>
    </div>
</div>