<div class="container-fluid py-4">
    <div class="row">
        <div class="col-md-5">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-maroon text-white">
                    <h5 class="card-title mb-0"><i class="fas fa-calendar-plus me-2"></i>Schedule a Visit</h5>
                </div>
                <div class="card-body">
                    <form action="save_appointment.php" method="POST">
                        <div class="mb-3">
                            <label class="form-label fw-bold">Preferred Date</label>
                            <input type="date" class="form-control" name="appointment_date" required>
                            <small class="text-muted">Standard clinic hours only.</small>
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label fw-bold">Preferred Time Slot</label>
                            <select class="form-select" name="time_slot" required>
                                <option value="" selected disabled>Choose time...</option>
                                <option>08:00 AM - 09:00 AM</option>
                                <option>09:00 AM - 10:00 AM</option>
                                <option>01:00 PM - 02:00 PM</option>
                                <option>02:00 PM - 03:00 PM</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Purpose of Visit</label>
                            <textarea class="form-control" name="purpose" rows="3" placeholder="e.g., Medical Certificate, Follow-up, Consultation" required></textarea>
                            <small class="text-info font-italic">Note: Urgent cases should proceed directly to the Triage Kiosk.</small>
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-maroon text-white">Request Appointment</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-7">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-light d-flex justify-content-between align-items-center">
                    <h5 class="mb-0 text-maroon">Your Appointments</h5>
                    <span class="badge rounded-pill bg-maroon text-white">View History</span>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover align-middle">
                            <thead class="table-light">
                                <tr>
                                    <th>Date</th>
                                    <th>Time</th>
                                    <th>Purpose</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Oct 24, 2025</td>
                                    <td>09:00 AM</td>
                                    <td>Physical Exam</td>
                                    <td><span class="badge bg-success">Confirmed</span></td>
                                    <td>
                                        <button class="btn btn-sm btn-outline-dark"><i class="fas fa-qrcode"></i></button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Nov 12, 2025</td>
                                    <td>01:30 PM</td>
                                    <td>Consultation</td>
                                    <td><span class="badge bg-secondary">Completed</span></td>
                                    <td>
                                        <button class="btn btn-sm btn-light" disabled><i class="fas fa-check"></i></button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="alert alert-info mt-3 small">
                        <i class="fas fa-info-circle"></i> <strong>Tip:</strong> Present your system-generated QR code to the clinic staff for instant record retrieval.
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>