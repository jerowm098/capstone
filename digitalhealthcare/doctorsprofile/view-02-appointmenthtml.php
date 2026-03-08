<h2 class="fw-bold mb-4 main-tab-title">Appointment Management</h2>

<div class="row g-4 mb-4">
    <div class="col-12">
        <div class="card border-0 shadow-sm border-start border-primary border-4">
            <div class="card-header bg-white py-3 border-0">
                <h6 class="fw-bold mb-0 text-primary"><i class="bi bi-clock-history me-2"></i>Pending Booking Requests</h6>
            </div>
            <div class="table-responsive px-4 pb-3">
                <table class="table align-middle">
                    <thead class="small text-uppercase text-muted">
                        <tr>
                            <th>Student Name</th>
                            <th>Type</th>
                            <th>Reason</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <div class="fw-bold">Juan Dela Cruz</div>
                                <small class="text-muted">Age: 20</small>
                            </td>
                            <td><span class="badge bg-info text-dark">OJT</span></td>
                            <td>Requirement for Medical Clearance</td>
                            <td class="text-center">
                                <button class="btn btn-sm btn-success me-1"><i class="bi bi-check-lg"></i> Confirm</button>
                                <button class="btn btn-sm btn-outline-danger"><i class="bi bi-x-lg"></i> Cancel</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="row g-4">
    <div class="col-12">
        <div class="card border-0 shadow-sm">
            <div class="card-header bg-white py-3 border-0 d-flex justify-content-between align-items-center">
                <h5 class="fw-bold mb-0 text-dark">Appointment Schedule</h5>
                <div class="d-flex gap-2">
                    <input type="text" class="form-control form-control-sm" placeholder="Search name...">
                    <button class="btn btn-sm btn-primary">Filter</button>
                </div>
            </div>
            <div class="table-responsive px-4 pb-4">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr class="small text-uppercase text-muted">
                            <th>Student Name</th>
                            <th>Age</th>
                            <th>Category</th>
                            <th>Reason</th>
                            <th>Status</th>
                            <th class="text-end">Details</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><span class="fw-bold">Maria Clara</span></td>
                            <td>21</td>
                            <td><span class="badge border text-danger border-danger">Emergency</span></td>
                            <td>Sudden fainting spell</td>
                            <td><span class="badge bg-light-success text-success px-3">Confirmed</span></td>
                            <td class="text-end"><button class="btn btn-sm btn-light"><i class="bi bi-eye"></i></button></td>
                        </tr>
                        <tr>
                            <td><span class="fw-bold">John Doe</span></td>
                            <td>22</td>
                            <td><span class="badge border text-secondary border-secondary">Walk-in</span></td>
                            <td>General Consultation</td>
                            <td><span class="badge bg-light-success text-success px-3">Confirmed</span></td>
                            <td class="text-end"><button class="btn btn-sm btn-light"><i class="bi bi-eye"></i></button></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>