<?php
/**
 * Shopping Cart — Turtle Maarks Hearing Health
 */
$page_title       = 'Shopping Cart — Turtle Maarks Hearing Health';
$page_description = 'View and manage items in your Turtle Maarks shopping cart. Apply discount promo codes and proceed to secure checkout.';
$active_nav       = '';
include __DIR__ . '/includes/header.php';
?>

<section class="py-4 bg-navy text-white text-center position-relative">
    <div class="container">
      <h1 class="h3 fw-bold text-white mb-1">Your Shopping Cart</h1>
      <p class="text-white-50 small mb-3">Review selected hearing devices, diagnostic services, and accessories.</p>
      
      <!-- Stepper Indicator -->
      <div class="tm-cart-step-nav mb-0">
        <div class="tm-cart-step-item active">
          <span class="tm-cart-step-num">1</span>
          <span>Review Cart</span>
        </div>
        <i class="bi bi-chevron-right text-white-50 small"></i>
        <div class="tm-cart-step-item">
          <span class="tm-cart-step-num">2</span>
          <span>Delivery & Fitting</span>
        </div>
        <i class="bi bi-chevron-right text-white-50 small"></i>
        <div class="tm-cart-step-item">
          <span class="tm-cart-step-num">3</span>
          <span>Confirmation</span>
        </div>
      </div>
    </div>
  </section>

  <!-- CART PAGE CONTENT -->
  <section class="py-4 bg-light">
    <div class="container" id="tmCartPageWrap">
      
      <!-- Free Delivery / Trial Milestone Alert -->
      <div class="tm-cart-free-shipping-box d-flex align-items-center justify-content-between flex-wrap gap-2">
        <div class="d-flex align-items-center gap-2">
          <i class="bi bi-check-circle-fill text-success fs-5"></i>
          <div>
            <div class="fw-bold text-navy small">Free Senior Home Fitting & Doctor Fine-Tuning Unlocked!</div>
            <div class="text-muted" style="font-size: 0.775rem;">Your order qualifies for complimentary doorstep audiologist assessment in Noida & NCR.</div>
          </div>
        </div>
        <span class="badge bg-success-subtle text-success border border-success-subtle py-1 px-2 fw-bold">FREE DELIVERY</span>
      </div>

      <div class="row g-4">
        
        <!-- Cart Table (Left) -->
        <div class="col-lg-8">
          <div class="card rounded-3 border p-3 p-md-4 bg-white shadow-xs">
            <div class="d-flex justify-content-between align-items-center mb-3">
              <h5 class="fw-bold text-navy mb-0">Selected Hearing Products & Services</h5>
              <span class="text-muted small"><i class="bi bi-shield-check text-success me-1"></i> Genuine Certified Devices</span>
            </div>

            <div class="table-responsive">
              <table class="table tm-cart-table align-middle">
                <thead>
                  <tr>
                    <th>Item Details</th>
                    <th>Unit Price</th>
                    <th>Quantity</th>
                    <th>Subtotal</th>
                    <th class="text-end">Remove</th>
                  </tr>
                </thead>
                <tbody id="tmCartPageTableBody">
                  <!-- Rendered dynamically by cart.js -->
                </tbody>
              </table>
            </div>

            <!-- Coupon Input & Quick Promos -->
            <div class="border-top pt-3 mt-3">
              <div class="row g-3 align-items-center justify-content-between">
                <div class="col-md-7">
                  <label class="form-label small fw-bold text-navy mb-1">Have a Doctor Referral or Promo Code?</label>
                  <div class="input-group input-group-sm">
                    <input type="text" id="tmCartCouponInput" class="form-control" placeholder="Enter code (e.g. HEAR20)">
                    <button class="btn btn-dark tm-btn-sm" onclick="Cart.applyCoupon(document.getElementById('tmCartCouponInput').value)">Apply Code</button>
                  </div>
                  <div class="d-flex align-items-center gap-2 mt-2">
                    <span class="small text-muted" style="font-size: 0.75rem;">Quick Apply:</span>
                    <span class="tm-promo-tag-pill" onclick="Cart.applyCoupon('HEAR20')">HEAR20 (20% OFF)</span>
                    <span class="tm-promo-tag-pill" onclick="Cart.applyCoupon('WELCOME10')">WELCOME10 (10% OFF)</span>
                  </div>
                </div>
                <div class="col-md-5 text-md-end">
                  <a href="products.php" class="tm-btn tm-btn-outline-navy tm-btn-sm"><i class="bi bi-plus-circle"></i> Add More Items</a>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Order Summary (Right) -->
        <div class="col-lg-4">
          <div class="tm-cart-summary-card sticky-top" style="top: 85px;">
            <h5 class="fw-bold text-navy mb-3 pb-2 border-bottom">Order Summary</h5>
            
            <div class="d-flex justify-content-between mb-2 small">
              <span class="text-secondary">Cart Subtotal:</span>
              <strong class="text-navy" id="tmCartSummarySubtotal">₹0</strong>
            </div>

            <div class="d-flex justify-content-between mb-2 small">
              <span class="text-secondary">Promotional Discount:</span>
              <strong class="text-success" id="tmCartSummaryDiscount">₹0</strong>
            </div>

            <div class="d-flex justify-content-between mb-2 small">
              <span class="text-secondary">Doorstep Fitting & Visit:</span>
              <strong class="text-success">FREE (Included)</strong>
            </div>

            <div class="d-flex justify-content-between mb-2 small">
              <span class="text-secondary">GST / Taxes:</span>
              <strong class="text-muted">Included in Price</strong>
            </div>

            <div class="d-flex justify-content-between mb-3 border-top pt-3 fs-5">
              <span class="fw-bold text-navy">Grand Total:</span>
              <span class="fw-bold text-orange" id="tmCartSummaryGrandTotal">₹0</span>
            </div>

            <a href="checkout.php" class="tm-btn tm-btn-primary w-100 py-2 fs-6 mb-3">
              <i class="bi bi-lock-fill me-1"></i> Proceed to Checkout
            </a>

            <!-- Clinical Guarantees -->
            <div class="bg-light rounded p-3 small text-secondary border">
              <div class="d-flex align-items-center gap-2 mb-2">
                <i class="bi bi-patch-check-fill text-orange"></i>
                <span>100% Genuine Brand Warranty (2-4 Yrs)</span>
              </div>
              <div class="d-flex align-items-center gap-2 mb-2">
                <i class="bi bi-people-fill text-orange"></i>
                <span>RCI Licensed Audiologist Fine-Tuning</span>
              </div>
              <div class="d-flex align-items-center gap-2">
                <i class="bi bi-arrow-repeat text-orange"></i>
                <span>7-Day Hassle-Free Trial Guarantee</span>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </section>

<?php include __DIR__ . '/includes/footer.php'; ?>
