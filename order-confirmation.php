<?php
/**
 * Order Confirmation — Turtle Maarks Hearing Health
 */
$page_title       = 'Order Confirmation — Turtle Maarks Hearing Health';
$page_description = 'Order confirmation and fulfillment tracker for your Turtle Maarks hearing aid order.';
$active_nav       = '';
include __DIR__ . '/includes/header.php';
?>

<section class="py-5 bg-light">
    <div class="container text-center">
      <div class="card rounded-4 border p-4 p-md-5 bg-white shadow-sm mx-auto" style="max-width: 640px;">
        <div class="bg-success-subtle text-success rounded-circle d-inline-flex p-3 mb-3">
          <i class="bi bi-check2-circle fs-1"></i>
        </div>
        <h3 class="fw-bold text-navy mb-1">Thank You! Order Confirmed</h3>
        <p class="text-secondary small mb-4">Your order reference has been logged. Our certified audiologist is preparing your calibration parameters.</p>

        <div class="card rounded-3 border bg-light p-3 text-start small mb-4">
          <div class="d-flex justify-content-between mb-2">
            <span class="text-muted">Order ID:</span>
            <strong class="text-orange" id="tmOrderId">TM-ORD-92841</strong>
          </div>
          <div class="d-flex justify-content-between mb-2">
            <span class="text-muted">Estimated Delivery & Fitting:</span>
            <strong class="text-navy">Within 24 - 48 Hours</strong>
          </div>
          <div class="d-flex justify-content-between mb-0">
            <span class="text-muted">Assigned Doctor:</span>
            <strong class="text-navy">Dr. Ritu Verma (RCI Audiologist)</strong>
          </div>
        </div>

        <div class="d-flex justify-content-center gap-2">
          <button class="tm-btn tm-btn-primary tm-btn-sm" onclick="window.print()"><i class="bi bi-printer"></i> Print Invoice</button>
          <a href="order-tracking.php" class="tm-btn tm-btn-navy tm-btn-sm"><i class="bi bi-truck"></i> Track Order</a>
          <a href="index.php" class="tm-btn tm-btn-outline-navy tm-btn-sm">Return to Home</a>
        </div>
      </div>
    </div>
  </section>

<?php ob_start(); ?>
<script>
    // Clear cart on successful order confirmation
    localStorage.removeItem('turtle_cart');
    localStorage.removeItem('turtle_coupon');
    if (typeof updateGlobalBadges === 'function') updateGlobalBadges();
  </script>
<?php $page_inline_js = ob_get_clean(); ?>
<?php include __DIR__ . '/includes/footer.php'; ?>
