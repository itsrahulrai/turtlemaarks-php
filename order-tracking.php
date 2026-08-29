<?php
/**
 * Track Order & Calibration — Turtle Maarks Hearing Health
 */
$page_title       = 'Track Order & Calibration — Turtle Maarks Hearing Health';
$page_description = 'Live order fulfillment and audiologist calibration tracker for your digital hearing aids.';
$active_nav       = '';
include __DIR__ . '/includes/header.php';
?>

<section class="py-5 bg-light">
    <div class="container">
      <div class="card rounded-4 border p-4 p-md-5 bg-white shadow-xs mx-auto" style="max-width: 760px;">
        <div class="d-flex justify-content-between align-items-center border-bottom pb-3 mb-4">
          <div>
            <h5 class="fw-bold text-navy mb-0">Order Tracking: TM-ORD-92841</h5>
            <span class="small text-muted">Device: Phonak Audéo Infinio Ultra 90</span>
          </div>
          <span class="badge bg-success-subtle text-success py-2 px-3">On Schedule</span>
        </div>

        <!-- 4-Stage Tracker -->
        <div class="row text-center g-2 mb-4">
          <div class="col-3">
            <div class="badge bg-success text-white rounded-circle p-3 mb-2"><i class="bi bi-check2"></i></div>
            <div class="small fw-bold text-navy">Order Placed</div>
            <span class="text-muted" style="font-size: 0.7rem;">Aug 24, 10:30 AM</span>
          </div>
          <div class="col-3">
            <div class="badge bg-success text-white rounded-circle p-3 mb-2"><i class="bi bi-check2"></i></div>
            <div class="small fw-bold text-navy">PTA Calibration</div>
            <span class="text-muted" style="font-size: 0.7rem;">Aug 24, 02:15 PM</span>
          </div>
          <div class="col-3">
            <div class="badge bg-orange text-white rounded-circle p-3 mb-2"><i class="bi bi-truck"></i></div>
            <div class="small fw-bold text-orange">Out for Fitting</div>
            <span class="text-muted" style="font-size: 0.7rem;">Today, 11:00 AM</span>
          </div>
          <div class="col-3">
            <div class="badge bg-light text-muted border rounded-circle p-3 mb-2"><i class="bi bi-house-check"></i></div>
            <div class="small text-muted">Delivered & Verified</div>
            <span class="text-muted" style="font-size: 0.7rem;">Pending</span>
          </div>
        </div>

        <div class="p-3 bg-light rounded-3 small">
          <strong class="text-navy d-block mb-1">Assigned Audiologist:</strong>
          <p class="text-secondary mb-0">Dr. Ritu Verma is scheduled to conduct the Real-Ear Measurement (REM) verification and fine-tuning at your residence in Gaur City 2 today.</p>
        </div>
      </div>
    </div>
  </section>

<?php include __DIR__ . '/includes/footer.php'; ?>
