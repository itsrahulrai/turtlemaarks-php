<?php
/**
 * My Appointments — Turtle Maarks Patient Portal
 */
$page_title       = 'My Appointments — Turtle Maarks Patient Portal';
$page_description = 'View and manage scheduled audiology appointments, hearing tests, and clinic visits.';
$active_nav       = '';
include __DIR__ . '/includes/header.php';
?>

<section class="py-5 bg-light">
    <div class="container">
      <div class="row g-4">
        
        <!-- Sidebar -->
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
              <a href="account-dashboard.php" class="p-2 rounded-3 text-navy"><i class="bi bi-grid-fill me-2"></i> Overview Dashboard</a>
              <a href="account-orders.php" class="p-2 rounded-3 text-navy"><i class="bi bi-bag-check me-2"></i> My Device Orders</a>
              <a href="account-appointments.php" class="p-2 rounded-3 bg-light text-orange fw-bold"><i class="bi bi-calendar2-check me-2"></i> Clinical Appointments</a>
              <a href="account-profile.php" class="p-2 rounded-3 text-navy"><i class="bi bi-file-earmark-medical me-2"></i> Audiogram & Profile</a>
              <a href="index.php" class="p-2 rounded-3 text-danger"><i class="bi bi-box-arrow-right me-2"></i> Sign Out</a>
            </div>
          </div>
        </div>

        <!-- Appointments List -->
        <div class="col-lg-9">
          <div class="card rounded-4 border p-4 bg-white shadow-xs">
            <h5 class="fw-bold text-navy mb-3">My Scheduled Appointments</h5>

            <!-- Appointment 1 -->
            <div class="border rounded-3 p-3 mb-3">
              <div class="d-flex justify-content-between align-items-center border-bottom pb-2 mb-2 small">
                <div>
                  <strong class="text-navy">Booking Ref: TM-APT-89421</strong>
                  <span class="badge bg-primary-subtle text-primary ms-2">Confirmed Slot</span>
                </div>
                <span class="text-muted">Tomorrow, 11:00 AM - 11:45 AM</span>
              </div>
              <h6 class="fw-bold text-navy mb-1">Comprehensive Hearing Evaluation & Free Trial</h6>
              <p class="small text-secondary mb-2">Location: Turtle Maarks Clinic, Gaur City, Greater Noida West</p>
              <div class="d-flex gap-2 justify-content-end border-top pt-2">
                <button class="tm-btn tm-btn-outline-navy tm-btn-sm" onclick="showToast('Reschedule Requested', 'Our coordinator will call you to pick a new date.', 'info')">Reschedule</button>
                <a href="https://wa.me/918130495476" target="_blank" class="tm-btn tm-btn-primary tm-btn-sm"><i class="bi bi-whatsapp"></i> Chat with Clinic</a>
              </div>
            </div>

          </div>
        </div>

      </div>
    </div>
  </section>

<?php include __DIR__ . '/includes/footer.php'; ?>
