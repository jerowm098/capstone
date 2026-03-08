<?php include 'view-00-mainprofile.php'; ?>
<link rel="stylesheet" href="view-03.3-managepatient.css">

<div class="container-fluid animate__animated animate__fadeIn">
    <div class="d-flex justify-content-between align-items-end mb-4">
        <div>
            <h2 class="fw-bold m-0">Patient Management</h2>
            <p class="text-muted small m-0">View, search, and manage all registered patients.</p>
        </div>
        <button class="btn btn-dark shadow-sm px-4" onclick="loadTab('view-03.2-addpatient.php')">
            <i class="bi bi-plus-lg me-2"></i>Add New Patient
        </button>
    </div>

    <div class="card border-0 shadow-sm mb-4">
        <div class="card-body p-3">
            <div class="row g-3">
                <div class="col-md-5 search-container">
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-search text-muted"></i></span>
                        <input type="text" id="patientSearch" class="form-control" placeholder="Search by name, ID, or location...">
                    </div>
                </div>
                <div class="col-md-3">
                    <select class="form-select" id="filterType">
                        <option value="">All Patient Types</option>
                        <option value="New">New Patient</option>
                        <option value="Returning">Returning</option>
                        <option value="Emergency">Emergency</option>
                    </select>
                </div>
                <div class="col-md-4 text-md-end">
                    <button class="btn btn-outline-secondary px-3 me-2"><i class="bi bi-funnel"></i></button>
                    <button class="btn btn-outline-secondary px-3"><i class="bi bi-printer"></i> Export</button>
                </div>
            </div>
        </div>
    </div>

    <div class="card border-0 shadow-sm overflow-hidden">
        <div class="table-responsive">
            <table class="table patient-table mb-0">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Patient Info</th>
                        <th>Location</th>
                        <th>Type</th>
                        <th>Ailment</th>
                        <th>Last Payment</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody id="patientTableBody">
                    <tr>
                        <td class="text-muted fw-bold">1</td>
                        <td>
                            <div class="d-flex align-items-center">
                                <div class="bg-light rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 40px; height: 40px;">
                                    <span class="fw-bold text-primary">JD</span>
                                </div>
                                <div>
                                    <div class="fw-bold text-dark">Dela Cruz, Juan</div>
                                    <div class="text-muted" style="font-size: 0.75rem;">25 yrs old • Male</div>
                                </div>
                            </div>
                        </td>
                        <td><i class="bi bi-geo-alt me-1 text-muted"></i> Cavite City</td>
                        <td><span class="badge-patient-type type-new">New</span></td>
                        <td class="text-secondary small">Hypertension</td>
                        <td>
                            <div class="fw-bold text-success">₱ 500.00</div>
                            <div class="text-muted small" style="font-size: 0.7rem;">Paid via Cash</div>
                        </td>
                        <td class="text-center">
                            <div class="d-flex justify-content-center gap-2">
                                <button class="btn-action btn-payment-send shadow-sm" title="Send Payment Request">
                                    <i class="bi bi-send-fill"></i>
                                </button>
                                <button class="btn btn-light btn-action shadow-sm text-dark" title="View Profile">
                                    <i class="bi bi-eye"></i>
                                </button>
                                <button class="btn btn-light btn-action shadow-sm text-danger" title="Edit">
                                    <i class="bi bi-pencil"></i>
                                </button>
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <td class="text-muted fw-bold">2</td>
                        <td>
                            <div class="d-flex align-items-center">
                                <div class="bg-light rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 40px; height: 40px;">
                                    <span class="fw-bold text-danger">MS</span>
                                </div>
                                <div>
                                    <div class="fw-bold text-dark">Santos, Maria</div>
                                    <div class="text-muted" style="font-size: 0.75rem;">30 yrs old • Female</div>
                                </div>
                            </div>
                        </td>
                        <td><i class="bi bi-geo-alt me-1 text-muted"></i> Manila</td>
                        <td><span class="badge-patient-type type-emergency">Emergency</span></td>
                        <td class="text-secondary small">Severe Fever</td>
                        <td>
                            <div class="fw-bold text-danger">₱ 1,200.00</div>
                            <div class="text-muted small" style="font-size: 0.7rem;">Pending</div>
                        </td>
                        <td class="text-center">
                            <div class="d-flex justify-content-center gap-2">
                                <button class="btn-action btn-payment-send shadow-sm" title="Send Payment Request">
                                    <i class="bi bi-send-fill"></i>
                                </button>
                                <button class="btn btn-light btn-action shadow-sm text-dark">
                                    <i class="bi bi-eye"></i>
                                </button>
                                <button class="btn btn-light btn-action shadow-sm text-danger">
                                    <i class="bi bi-pencil"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        
        <div class="card-footer bg-white border-0 p-3">
            <div class="d-flex justify-content-between align-items-center">
                <small class="text-muted">Showing 1 to 2 of 150 patients</small>
                <nav>
                    <ul class="pagination pagination-sm m-0">
                        <li class="page-item disabled"><a class="page-link" href="#">Prev</a></li>
                        <li class="page-item active"><a class="page-link bg-dark border-dark" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#">Next</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>