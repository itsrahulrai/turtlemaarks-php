<?php
/**
 * Patient Registration — Turtle Maarks Hearing Health
 */
$page_title       = 'Patient Registration — Turtle Maarks Hearing Health';
$page_description = 'Create a new patient account on Turtle Maarks Hearing Health portal.';
$active_nav       = '';
include __DIR__ . '/includes/header.php';
?>

<section class="py-5 bg-light">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-6 col-lg-5">
          <div class="card rounded-4 border p-4 p-md-5 bg-white shadow-sm">
            <h4 class="fw-bold text-navy mb-1">Create Patient Account</h4>
            <p class="text-secondary small mb-4">Track your hearing rehabilitation journey and digital audiograms.</p>

            <form onsubmit="event.preventDefault(); window.location.href='account-dashboard.php';">
              <div class="mb-3">
                <label class="form-label small fw-bold text-navy">Full Name *</label>
                <input type="text" class="form-control" required placeholder="e.g. Anand Kumar">
              </div>
              <div class="mb-3">
                <label class="form-label small fw-bold text-navy">WhatsApp Mobile Number *</label>
                <input type="tel" class="form-control" required placeholder="10-digit mobile number">
              </div>
              <div class="mb-3">
                <label class="form-label small fw-bold text-navy">Email Address *</label>
                <input type="email" class="form-control" required placeholder="name@example.com">
              </div>
              <div class="mb-3">
                <label class="form-label small fw-bold text-navy">Create Password *</label>
                <input type="password" class="form-control" required placeholder="At least 6 characters">
              </div>
              <button type="submit" class="tm-btn tm-btn-primary tm-btn-lg w-100 mb-3"><i class="bi bi-person-plus-fill"></i> Register Account</button>
            </form>

            <div class="text-center small text-muted border-top pt-3">
              Already have an account? <a href="login.php" class="fw-bold text-orange">Sign In</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

<?php include __DIR__ . '/includes/footer.php'; ?>
