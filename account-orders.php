<?php
/**
 * My Orders — Turtle Maarks Patient Portal
 */
$page_title       = 'My Orders — Turtle Maarks Patient Portal';
$page_description = 'Track your hearing aid orders, calibration status, and download GST tax invoices.';
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
              <a href="account-orders.php" class="p-2 rounded-3 bg-light text-orange fw-bold"><i class="bi bi-bag-check me-2"></i> My Device Orders</a>
              <a href="account-appointments.php" class="p-2 rounded-3 text-navy"><i class="bi bi-calendar2-check me-2"></i> Clinical Appointments</a>
              <a href="account-profile.php" class="p-2 rounded-3 text-navy"><i class="bi bi-file-earmark-medical me-2"></i> Audiogram & Profile</a>
              <a href="index.php" class="p-2 rounded-3 text-danger"><i class="bi bi-box-arrow-right me-2"></i> Sign Out</a>
            </div>
          </div>
        </div>

        <!-- Main Orders List -->
        <div class="col-lg-9">
          <div class="card rounded-4 border p-4 bg-white shadow-xs">
            <h5 class="fw-bold text-navy mb-3">Recent Orders & Warranties</h5>

            <!-- Order Card 1 -->
            <div class="border rounded-3 p-3 mb-3">
              <div class="d-flex flex-wrap justify-content-between align-items-center border-bottom pb-2 mb-2 small">
                <div>
                  <strong class="text-navy">Order ID: TM-ORD-92841</strong>
                  <span class="text-muted ms-2">Placed on Aug 24, 2026</span>
                </div>
                <span class="badge bg-success-subtle text-success">Fitted & Calibrated</span>
              </div>
              <div class="d-flex align-items-center gap-3 py-2">
                <img src="assets/images/hearing-aid/ric.webp" alt="Phonak Infinio" style="width: 50px; height: 50px; object-fit: contain;">
                <div class="flex-grow-1">
                  <h6 class="fw-bold text-navy mb-0">Phonak Audéo Infinio Ultra 90</h6>
                  <span class="small text-muted">Pair (Left & Right Ear) • 4 Years Official Warranty</span>
                </div>
                <strong class="text-navy">₹2,85,000</strong>
              </div>
              <div class="d-flex justify-content-end gap-2 border-top pt-2 mt-2">
                <a href="order-tracking.php" class="tm-btn tm-btn-outline-navy tm-btn-sm"><i class="bi bi-truck"></i> Track Status</a>
                <button class="tm-btn tm-btn-primary tm-btn-sm" onclick="window.print()"><i class="bi bi-download"></i> Tax Invoice</button>
              </div>
            </div>

          </div>
        </div>

      </div>
    </div>
  </section>

<?php include __DIR__ . '/includes/footer.php'; ?>
