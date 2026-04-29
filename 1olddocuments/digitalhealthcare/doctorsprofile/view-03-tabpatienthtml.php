<?php include 'view-00-mainprofile.php'; ?>
<link rel="stylesheet" href="view-03.4-patientinsights.css">

<div class="container-fluid animate__animated animate__fadeIn">
    <div class="mb-4">
        <h2 class="fw-bold m-0">Patient Insights</h2>
        <p class="text-muted small">Comprehensive overview of clinic patient demographics and records.</p>
    </div>

    <div class="row g-3 mb-4">
        <div class="col-md-3">
            <div class="card border-0 shadow-sm p-3 border-start border-primary border-4">
                <small class="text-muted fw-bold text-uppercase" style="font-size: 0.65rem;">Total Registered</small>
                <h3 class="fw-bold m-0">1,250</h3>
                <small class="text-success"><i class="bi bi-arrow-up"></i> 12% from last month</small>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card border-0 shadow-sm p-3 border-start border-success border-4">
                <small class="text-muted fw-bold text-uppercase" style="font-size: 0.65rem;">Active Cases</small>
                <h3 class="fw-bold m-0">48</h3>
                <small class="text-muted">Currently in consultation</small>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card border-0 shadow-sm p-3 border-start border-warning border-4">
                <small class="text-muted fw-bold text-uppercase" style="font-size: 0.65rem;">Returning Patients</small>
                <h3 class="fw-bold m-0">85%</h3>
                <small class="text-muted">Loyalty rate</small>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card border-0 shadow-sm p-3 border-start border-danger border-4">
                <small class="text-muted fw-bold text-uppercase" style="font-size: 0.65rem;">Emergency Visits</small>
                <h3 class="fw-bold m-0">12</h3>
                <small class="text-danger">Today</small>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-7">
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-header bg-white border-0 py-3">
                    <h6 class="fw-bold m-0"><i class="bi bi-bar-chart-fill me-2 text-primary"></i>Common Ailments Summary</h6>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <div class="d-flex justify-content-between mb-1">
                            <span class="small fw-bold">Hypertension</span>
                            <span class="small text-muted">450 Patients</span>
                        </div>
                        <div class="progress" style="height: 8px;">
                            <div class="progress-bar bg-primary" style="width: 75%"></div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="d-flex justify-content-between mb-1">
                            <span class="small fw-bold">Diabetes</span>
                            <span class="small text-muted">320 Patients</span>
                        </div>
                        <div class="progress" style="height: 8px;">
                            <div class="progress-bar bg-info" style="width: 55%"></div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="d-flex justify-content-between mb-1">
                            <span class="small fw-bold">Fever / Flu</span>
                            <span class="small text-muted">180 Patients</span>
                        </div>
                        <div class="progress" style="height: 8px;">
                            <div class="progress-bar bg-warning" style="width: 30%"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-5">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white border-0 py-3 d-flex justify-content-between align-items-center">
                    <h6 class="fw-bold m-0">Recently Added</h6>
                    <button class="btn btn-sm btn-link text-decoration-none p-0" onclick="loadTab('view-03.3-managepatient.php')">View All</button>
                </div>
                <div class="card-body p-0">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item d-flex align-items-center border-0 py-3">
                            <div class="rounded-circle bg-light p-2 me-3">JD</div>
                            <div class="flex-grow-1">
                                <h6 class="mb-0 fw-bold small">Juan Dela Cruz</h6>
                                <small class="text-muted">Added 2 hours ago</small>
                            </div>
                            <span class="badge bg-light text-dark">New</span>
                        </li>
                        <li class="list-group-item d-flex align-items-center border-0 py-3">
                            <div class="rounded-circle bg-light p-2 me-3">MS</div>
                            <div class="flex-grow-1">
                                <h6 class="mb-0 fw-bold small">Maria Santos</h6>
                                <small class="text-muted">Added 5 hours ago</small>
                            </div>
                            <span class="badge bg-light text-dark">Emergency</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>