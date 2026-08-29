<?php
/**
 * Patient Dashboard — Turtle Maarks Hearing Health
 */
$page_title       = 'Patient Dashboard — Turtle Maarks Hearing Health';
$page_description = 'Turtle Maarks patient dashboard: active appointments, orders, and hearing records.';
$active_nav       = '';
include __DIR__ . '/includes/header.php';
?>

<section class="py-5 bg-light">
    <div class="container">
      <div class="row g-4">
        
        <!-- Sidebar Menu -->
        <div class="col-lg-3">
          <div class="card rounded-4 border p-3 bg-white shadow-xs">
            <div class="text-center pb-3 border-bottom mb-3">
              <div class="bg-light rounded-circle d-inline-flex p-3 mb-2 text-navy">
                <i class="bi bi-person-fill fs-2"></i>
              </div>
              <h6 class="fw-bold text-navy mb-0">Anand Kumar</h6>
              <span class="small text-muted">Patient ID: TM-PAT-1082</span>
            </div>

            <div class="d-flex flex-column gap-1 small">
              <a href="account-dashboard.php" class="p-2 rounded-3 bg-light text-orange fw-bold"><i class="bi bi-grid-fill me-2"></i> Overview Dashboard</a>
              <a href="account-orders.php" class="p-2 rounded-3 text-navy"><i class="bi bi-bag-check me-2"></i> My Device Orders</a>
              <a href="account-appointments.php" class="p-2 rounded-3 text-navy"><i class="bi bi-calendar2-check me-2"></i> Clinical Appointments</a>
              <a href="account-profile.php" class="p-2 rounded-3 text-navy"><i class="bi bi-file-earmark-medical me-2"></i> Audiogram & Profile</a>
              <a href="index.php" class="p-2 rounded-3 text-danger"><i class="bi bi-box-arrow-right me-2"></i> Sign Out</a>
            </div>
          </div>
        </div>

        <!-- Main Dashboard View -->
        <div class="col-lg-9">
          <!-- Stats Row -->
          <div class="row g-3 mb-4">
            <div class="col-sm-4">
              <div class="p-3 bg-white rounded-4 border shadow-xs">
                <span class="small text-muted">Active Trial Device</span>
                <h5 class="fw-bold text-navy mb-0">Phonak Infinio</h5>
                <span class="badge bg-success-subtle text-success mt-1">Trial Day 3 of 7</span>
              </div>
            </div>
            <div class="col-sm-4">
              <div class="p-3 bg-white rounded-4 border shadow-xs">
                <span class="small text-muted">Upcoming Appointment</span>
                <h5 class="fw-bold text-navy mb-0">Tomorrow, 11:00 AM</h5>
                <span class="badge bg-primary-subtle text-primary mt-1">PTA Fine-Tuning</span>
              </div>
            </div>
            <div class="col-sm-4">
              <div class="p-3 bg-white rounded-4 border shadow-xs">
                <span class="small text-muted">Assigned Doctor</span>
                <h5 class="fw-bold text-navy mb-0">Dr. Ritu Verma</h5>
                <span class="badge bg-light text-navy border mt-1">RCI Audiologist</span>
              </div>
            </div>
          </div>

          <!-- Active Care Card -->
          <div class="card rounded-4 border p-4 bg-white shadow-xs mb-4">
            <div class="d-flex justify-content-between align-items-center mb-3">
              <h6 class="fw-bold text-navy mb-0">Recent Hearing Health Timeline</h6>
              <a href="account-appointments.php" class="small text-orange fw-bold">View History</a>
            </div>

            <div class="border-start border-2 border-orange ps-3 ms-2">
              <div class="mb-3">
                <span class="badge bg-light text-muted border small">2 days ago</span>
                <strong class="text-navy d-block small">Pure Tone Audiometry (PTA) Completed</strong>
                <p class="small text-secondary mb-0">Moderate sensorineural hearing loss (48 dB) detected in right ear. Left ear within normal limits.</p>
              </div>
              <div>
                <span class="badge bg-light text-muted border small">Today</span>
                <strong class="text-navy d-block small">Phonak Audéo Infinio 7-Day Trial Started</strong>
                <p class="small text-secondary mb-0">Device programmed and delivered with wireless TV streamer.</p>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </section>

<?php include __DIR__ . '/includes/footer.php'; ?>
