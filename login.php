<?php
/**
 * Patient Login — Turtle Maarks Hearing Health
 */
$page_title       = 'Patient Login — Turtle Maarks Hearing Health';
$page_description = 'Access your Turtle Maarks patient portal, audiogram reports, appointments, and warranty cards.';
$active_nav       = '';
include __DIR__ . '/includes/header.php';
?>

<section class="py-5 bg-light">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-6 col-lg-5">
          <div class="card rounded-4 border p-4 p-md-5 bg-white shadow-sm">
            <h4 class="fw-bold text-navy mb-1">Patient Sign In</h4>
            <p class="text-secondary small mb-4">View your audiogram records, orders, and appointment schedules.</p>

            <form onsubmit="event.preventDefault(); window.location.href='account-dashboard.php';">
              <div class="mb-3">
                <label class="form-label small fw-bold text-navy">Mobile Number or Email</label>
                <input type="text" class="form-control" required placeholder="e.g. 9876543210 or name@example.com">
              </div>
              <div class="mb-3">
                <div class="d-flex justify-content-between">
                  <label class="form-label small fw-bold text-navy">Password</label>
                  <a href="#" class="small text-orange">Forgot?</a>
                </div>
                <input type="password" class="form-control" required placeholder="••••••••">
              </div>
              <button type="submit" class="tm-btn tm-btn-primary tm-btn-lg w-100 mb-3"><i class="bi bi-box-arrow-in-right"></i> Sign In to Account</button>
            </form>

            <div class="text-center small text-muted border-top pt-3">
              Don't have an account? <a href="register.php" class="fw-bold text-orange">Register Here</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

<?php include __DIR__ . '/includes/footer.php'; ?>
