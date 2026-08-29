<?php
/**
 * Appointment Confirmation — Turtle Maarks Hearing Health
 */
$page_title       = 'Appointment Confirmation — Turtle Maarks Hearing Health';
$page_description = 'Your audiology clinic appointment slip with Turtle Maarks.';
$active_nav       = '';
include __DIR__ . '/includes/header.php';
?>

<section class="py-5 bg-light">
    <div class="container text-center">
      <div class="card rounded-4 border p-4 p-md-5 bg-white shadow-sm mx-auto" style="max-width: 640px;">
        <div class="bg-success-subtle text-success rounded-circle d-inline-flex p-3 mb-3">
          <i class="bi bi-calendar-check-fill fs-1"></i>
        </div>
        <h3 class="fw-bold text-navy mb-1">Appointment Confirmed</h3>
        <p class="text-secondary small mb-4">Your clinical consultation slot has been reserved with our RCI-certified audiologist.</p>

        <div class="card rounded-3 border bg-light p-3 text-start small mb-4">
          <div class="d-flex justify-content-between mb-2">
            <span class="text-muted">Booking Reference:</span>
            <strong class="text-orange">TM-APT-89421</strong>
          </div>
          <div class="d-flex justify-content-between mb-2">
            <span class="text-muted">Location:</span>
            <strong class="text-navy">Turtle Maarks Clinic, Gaur City, Greater Noida West</strong>
          </div>
          <div class="d-flex justify-content-between mb-0">
            <span class="text-muted">Doctor Contact:</span>
            <strong class="text-navy">+91 8130495476</strong>
          </div>
        </div>

        <div class="d-flex justify-content-center gap-2">
          <button class="tm-btn tm-btn-primary tm-btn-sm" onclick="window.print()"><i class="bi bi-printer"></i> Print Slip</button>
          <a href="index.php" class="tm-btn tm-btn-outline-navy tm-btn-sm">Return to Home</a>
        </div>
      </div>
    </div>
  </section>

<?php include __DIR__ . '/includes/footer.php'; ?>
