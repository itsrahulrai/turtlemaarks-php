<?php
/**
 * Patient Dashboard — Turtle Maarks Hearing Health
 */
$page_title       = 'Patient Dashboard — Turtle Maarks Hearing Health';
$page_description = 'Turtle Maarks patient dashboard: active appointments, orders, and hearing records.';
$active_nav       = '';
include __DIR__ . '/includes/header.php';
?>

  <!-- HERO BANNER -->
  <section class="tm-page-hero text-center position-relative">
    <div class="container">
      <nav aria-label="breadcrumb" class="d-inline-flex mb-2">
        <div class="tm-breadcrumb-pill">
          <a href="<?= e(url('index.php')) ?>"><i class="bi bi-house-door"></i> Home</a>
          <span class="tm-breadcrumb-sep"><i class="bi bi-chevron-right"></i></span>
          <span class="tm-breadcrumb-current" aria-current="page">Patient Account</span>
        </div>
      </nav>
      <h1 class="display-6 fw-bold text-white mb-1 font-heading">Patient Dashboard</h1>
      <p class="text-white-50 mx-auto small mb-0" style="max-width: 580px;">Manage your appointments, hearing device orders, and audiogram records.</p>
    </div>
  </section>

  <section class="py-5 bg-light">
    <div class="container">
      <div class="row g-4">
        
        <!-- Shared Sidebar Component -->
        <?php 
        $active_tab = 'dashboard';
        include __DIR__ . '/includes/account-sidebar.php'; 
        ?>

        <!-- Main Dashboard View -->
        <div class="col-lg-9">
          
          <!-- Patient Welcome Banner (Modern Executive Card) -->
          <div class="card rounded-4 border-0 p-4 text-white mb-4 shadow-sm position-relative overflow-hidden" style="background: linear-gradient(135deg, #071324 0%, #0B1E36 50%, #0E2442 100%); border: 1px solid rgba(255, 255, 255, 0.08) !important;">
            <div class="position-relative z-1">
              <div class="d-flex flex-wrap justify-content-between align-items-center gap-3">
                <div>
                  <div class="d-flex flex-wrap align-items-center gap-2 mb-2">
                    <span class="badge bg-success-subtle text-success rounded-pill px-3 py-1 extra-small fw-semibold">
                      <i class="bi bi-patch-check-fill me-1"></i> RCI Verified Patient
                    </span>
                    <span class="badge bg-white bg-opacity-10 text-white-50 rounded-pill px-3 py-1 extra-small">
                      <i class="bi bi-person-badge me-1"></i> TM-PAT-1082
                    </span>
                  </div>

                  <h3 class="fw-bold text-white mb-1 font-heading">Welcome Back, Anand Kumar</h3>
                  <p class="text-white-50 small mb-0" style="max-width: 560px;">
                    Track your diagnostic hearing reports, upcoming clinical appointments, and hearing device warranties.
                  </p>
                </div>

                <div class="d-flex flex-wrap gap-2">
                  <a href="<?= e(url('book-appointment.php')) ?>" class="tm-btn tm-btn-primary tm-btn-sm shadow-sm">
                    <i class="bi bi-calendar-plus me-1"></i> Book Visit
                  </a>
                  <a href="<?= e(url('account-appointments.php')) ?>" class="tm-btn tm-btn-outline tm-btn-sm text-white border-white-50">
                    <i class="bi bi-ticket-perforated me-1"></i> Clinic Pass
                  </a>
                </div>
              </div>
            </div>
          </div>

          <!-- 4 Core Health & Order Stat Cards -->
          <div class="row g-3 mb-4">
            <div class="col-sm-6 col-xl-3">
              <div class="tm-account-stat-card">
                <div class="d-flex align-items-center justify-content-between mb-2">
                  <span class="small text-muted fw-medium">Active Device</span>
                  <div class="tm-account-stat-icon bg-orange-subtle text-orange">
                    <i class="bi bi-earbuds"></i>
                  </div>
                </div>
                <h6 class="fw-bold text-navy mb-0 font-heading">Phonak Infinio</h6>
                <div class="d-flex align-items-center gap-1 mt-1">
                  <span class="badge bg-success-subtle text-success extra-small">Trial Day 3 of 7</span>
                </div>
              </div>
            </div>

            <div class="col-sm-6 col-xl-3">
              <div class="tm-account-stat-card">
                <div class="d-flex align-items-center justify-content-between mb-2">
                  <span class="small text-muted fw-medium">Next Visit</span>
                  <div class="tm-account-stat-icon bg-primary-subtle text-primary">
                    <i class="bi bi-calendar2-check"></i>
                  </div>
                </div>
                <h6 class="fw-bold text-navy mb-0 font-heading">Tomorrow, 11 AM</h6>
                <div class="d-flex align-items-center gap-1 mt-1">
                  <span class="badge bg-primary-subtle text-primary extra-small">Sound Booth 2</span>
                </div>
              </div>
            </div>

            <div class="col-sm-6 col-xl-3">
              <div class="tm-account-stat-card">
                <div class="d-flex align-items-center justify-content-between mb-2">
                  <span class="small text-muted fw-medium">Orders &amp; Bills</span>
                  <div class="tm-account-stat-icon bg-success-subtle text-success">
                    <i class="bi bi-receipt"></i>
                  </div>
                </div>
                <h6 class="fw-bold text-navy mb-0 font-heading">2 Orders</h6>
                <div class="d-flex align-items-center gap-1 mt-1">
                  <span class="badge bg-light text-navy border extra-small">1 Calibrated &bull; 1 Done</span>
                </div>
              </div>
            </div>

            <div class="col-sm-6 col-xl-3">
              <div class="tm-account-stat-card">
                <div class="d-flex align-items-center justify-content-between mb-2">
                  <span class="small text-muted fw-medium">PTA Hearing Loss</span>
                  <div class="tm-account-stat-icon bg-danger-subtle text-danger">
                    <i class="bi bi-activity"></i>
                  </div>
                </div>
                <h6 class="fw-bold text-navy mb-0 font-heading">R: 48dB | L: 25dB</h6>
                <div class="d-flex align-items-center gap-1 mt-1">
                  <span class="badge bg-warning-subtle text-warning extra-small">Moderate Loss</span>
                </div>
              </div>
            </div>
          </div>

          <!-- Upcoming Appointment Spotlight Banner -->
          <div class="card rounded-4 border p-4 bg-white shadow-xs mb-4">
            <div class="d-flex flex-wrap justify-content-between align-items-center border-bottom pb-3 mb-3">
              <div>
                <span class="badge bg-primary-subtle text-primary fw-bold px-2 py-1 small mb-1">
                  <i class="bi bi-clock-history me-1"></i> Upcoming Confirmed Appointment
                </span>
                <h5 class="fw-bold text-navy mb-0 font-heading">Comprehensive Hearing Test &amp; Fine-Tuning</h5>
              </div>
              <div class="text-end">
                <span class="badge bg-success text-white px-3 py-2 fw-semibold">Confirmed Slot</span>
              </div>
            </div>

            <div class="row g-3 align-items-center">
              <div class="col-md-7">
                <div class="d-flex flex-column gap-2 small">
                  <div class="d-flex align-items-center gap-2">
                    <i class="bi bi-calendar-event text-orange fs-5"></i>
                    <div>
                      <strong class="text-navy">Tomorrow, August 31, 2026</strong>
                      <span class="text-muted ms-1">(11:00 AM – 11:45 AM IST)</span>
                    </div>
                  </div>
                  <div class="d-flex align-items-center gap-2">
                    <i class="bi bi-person-badge text-primary fs-5"></i>
                    <div>
                      <strong class="text-navy">Dr. Ritu Verma</strong>
                      <span class="text-muted ms-1">(Chief Clinical Audiologist, RCI Reg. A-49102)</span>
                    </div>
                  </div>
                  <div class="d-flex align-items-center gap-2">
                    <i class="bi bi-geo-alt-fill text-danger fs-5"></i>
                    <span class="text-secondary">Suite 1509, 15th Floor, Gaur City Mall, Greater Noida West</span>
                  </div>
                </div>
              </div>
              <div class="col-md-5 text-md-end">
                <div class="d-flex flex-column flex-sm-row justify-content-md-end gap-2">
                  <a href="<?= e(url('account-appointments.php')) ?>" class="tm-btn tm-btn-primary tm-btn-sm">
                    <i class="bi bi-ticket-perforated me-1"></i> View Slip &amp; Pass
                  </a>
                  <a href="https://maps.google.com/?q=Gaur+City+Mall+Greater+Noida" target="_blank" class="tm-btn tm-btn-outline tm-btn-sm">
                    <i class="bi bi-map me-1"></i> Directions
                  </a>
                </div>
              </div>
            </div>
          </div>

          <!-- Active Hearing Aid Calibration & Fulfillment Stepper -->
          <div class="card rounded-4 border p-4 bg-white shadow-xs mb-4">
            <div class="d-flex flex-wrap justify-content-between align-items-center border-bottom pb-3 mb-3">
              <div>
                <span class="small text-muted">Active Fulfillment Order: <strong class="text-navy">TM-ORD-92841</strong></span>
                <h6 class="fw-bold text-navy mb-0 font-heading">Phonak Audéo Infinio Ultra 90 (Pair, Rechargeable)</h6>
              </div>
              <a href="<?= e(url('account-orders.php')) ?>" class="small text-orange fw-bold text-decoration-none">
                View Tax Invoice &amp; Details <i class="bi bi-arrow-right"></i>
              </a>
            </div>

            <!-- 4-Step Tracker -->
            <div class="row text-center g-2 pt-2">
              <div class="col-3">
                <div class="badge bg-success text-white rounded-circle p-2 p-sm-3 mb-2 shadow-xs"><i class="bi bi-check-lg fs-5"></i></div>
                <div class="small fw-bold text-navy">Order Placed</div>
                <span class="text-muted extra-small d-block">Aug 24, 10:30 AM</span>
              </div>
              <div class="col-3">
                <div class="badge bg-success text-white rounded-circle p-2 p-sm-3 mb-2 shadow-xs"><i class="bi bi-soundwave fs-5"></i></div>
                <div class="small fw-bold text-navy">PTA Calibration</div>
                <span class="text-muted extra-small d-block">Calibrated to 48dB</span>
              </div>
              <div class="col-3">
                <div class="badge bg-orange text-white rounded-circle p-2 p-sm-3 mb-2 shadow-xs"><i class="bi bi-truck fs-5"></i></div>
                <div class="small fw-bold text-orange">Fitting &amp; Trial</div>
                <span class="text-muted extra-small d-block">Active 7-Day Trial</span>
              </div>
              <div class="col-3">
                <div class="badge bg-light text-muted border rounded-circle p-2 p-sm-3 mb-2"><i class="bi bi-patch-check fs-5"></i></div>
                <div class="small text-muted">Final Warranty</div>
                <span class="text-muted extra-small d-block">4-Year Card</span>
              </div>
            </div>
          </div>

          <!-- Medical Care Notes & Audiologist Advice -->
          <div class="row g-3">
            <div class="col-md-6">
              <div class="card rounded-4 border p-4 bg-white shadow-xs h-100">
                <div class="d-flex align-items-center gap-2 mb-3">
                  <div class="bg-primary-subtle text-primary rounded-circle p-2 d-inline-flex"><i class="bi bi-file-medical-fill fs-5"></i></div>
                  <h6 class="fw-bold text-navy mb-0 font-heading">Audiologist Clinical Advice</h6>
                </div>
                <p class="small text-secondary mb-3">
                  <em>&ldquo;Patient Anand Kumar shows noticeable high-frequency clarity improvement with adaptive noise reduction. Wear the device for at least 6–8 hours daily during the trial period.&rdquo;</em>
                </p>
                <div class="border-top pt-2 d-flex justify-content-between align-items-center small text-muted">
                  <span>Dr. Ritu Verma (RCI Audiologist)</span>
                  <span class="badge bg-light text-navy border">Verified</span>
                </div>
              </div>
            </div>

            <div class="col-md-6">
              <div class="card rounded-4 border p-4 bg-white shadow-xs h-100">
                <div class="d-flex align-items-center gap-2 mb-3">
                  <div class="bg-success-subtle text-success rounded-circle p-2 d-inline-flex"><i class="bi bi-file-earmark-arrow-down-fill fs-5"></i></div>
                  <h6 class="fw-bold text-navy mb-0 font-heading">Latest Medical Reports</h6>
                </div>
                <div class="d-flex align-items-center justify-content-between p-2 bg-light rounded-3 mb-2 small">
                  <div class="d-flex align-items-center gap-2">
                    <i class="bi bi-file-earmark-pdf-fill text-danger fs-4"></i>
                    <div>
                      <strong class="text-navy d-block">PTA_Audiogram_Aug2026.pdf</strong>
                      <span class="text-muted extra-small">Doctor Verified &bull; 1.4 MB</span>
                    </div>
                  </div>
                  <a href="<?= e(url('account-profile.php')) ?>" class="btn btn-sm btn-outline-secondary py-1 px-2">View</a>
                </div>
                <div class="text-end mt-2">
                  <a href="<?= e(url('account-profile.php')) ?>" class="extra-small text-orange fw-bold text-decoration-none">Upload New Medical Files &rarr;</a>
                </div>
              </div>
            </div>
          </div>

        </div>

      </div>
    </div>
  </section>

<?php include __DIR__ . '/includes/footer.php'; ?>
