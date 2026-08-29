<?php
/**
 * Checkout — Turtle Maarks Hearing Health
 */
$page_title       = 'Checkout — Turtle Maarks Hearing Health';
$page_description = 'Secure patient checkout for hearing aid orders and diagnostic appointments.';
$active_nav       = '';
include __DIR__ . '/includes/header.php';
?>

<section class="py-5 bg-light">
    <div class="container">
      <div class="row g-4">
        
        <!-- Checkout Form (Left) -->
        <div class="col-lg-8">
          <div class="card rounded-4 border p-4 p-md-5 bg-white shadow-xs">
            <h5 class="fw-bold text-navy mb-4"><i class="bi bi-person-lines-fill text-orange me-2"></i> Patient & Delivery Information</h5>

            <form onsubmit="event.preventDefault(); window.location.href='order-confirmation.php';">
              <div class="row g-3 mb-4">
                <div class="col-md-6">
                  <label class="form-label small fw-bold text-navy">Patient / Buyer Full Name *</label>
                  <input type="text" class="form-control" required placeholder="e.g. Ramesh Chandra">
                </div>
                <div class="col-md-6">
                  <label class="form-label small fw-bold text-navy">WhatsApp / Mobile Number *</label>
                  <input type="tel" class="form-control" required placeholder="10-digit mobile number">
                </div>
                <div class="col-md-6">
                  <label class="form-label small fw-bold text-navy">Email Address *</label>
                  <input type="email" class="form-control" required placeholder="name@example.com">
                </div>
                <div class="col-md-6">
                  <label class="form-label small fw-bold text-navy">City / Area *</label>
                  <input type="text" class="form-control" required value="Greater Noida West / Noida">
                </div>
                <div class="col-12">
                  <label class="form-label small fw-bold text-navy">Delivery / Residence Address *</label>
                  <textarea class="form-control" rows="2" required placeholder="Flat/House No., Society / Sector, Landmark..."></textarea>
                </div>
              </div>

              <h5 class="fw-bold text-navy mb-3"><i class="bi bi-credit-card-2-front-fill text-orange me-2"></i> Payment & Fitting Preference</h5>
              <div class="d-flex flex-column gap-2 mb-4">
                <div class="p-3 border rounded-3 bg-light d-flex align-items-center gap-3">
                  <input type="radio" name="paymentOption" id="payClinic" checked class="form-check-input">
                  <label for="payClinic" class="small fw-bold text-navy mb-0 cursor-pointer">
                    Pay at Clinic / On Delivery (Cash, UPI, Cards, 0% EMI)
                    <div class="small text-muted fw-normal">Verify device fit with audiologist before finalizing payment</div>
                  </label>
                </div>
                <div class="p-3 border rounded-3 bg-light d-flex align-items-center gap-3">
                  <input type="radio" name="paymentOption" id="payOnline" class="form-check-input">
                  <label for="payOnline" class="small fw-bold text-navy mb-0 cursor-pointer">
                    Instant Online Payment (UPI, Net Banking, Credit / Debit Card)
                    <div class="small text-muted fw-normal">Instant digital confirmation and automated tax invoice</div>
                  </label>
                </div>
              </div>

              <button type="submit" class="tm-btn tm-btn-primary tm-btn-lg w-100"><i class="bi bi-check2-circle"></i> Place Order & Confirm Fitting</button>
            </form>
          </div>
        </div>

        <!-- Summary (Right) -->
        <div class="col-lg-4">
          <div class="card rounded-4 border p-4 bg-white shadow-xs sticky-top" style="top: 85px;">
            <h5 class="fw-bold text-navy mb-3">Order Items</h5>
            <div id="tmCheckoutItemsList" class="mb-3 border-bottom pb-2"></div>
            <div class="d-flex justify-content-between mb-2 small text-secondary">
              <span>Subtotal:</span>
              <strong class="text-navy" id="tmCheckoutSubtotal">₹0</strong>
            </div>
            <div class="d-flex justify-content-between mb-2 small text-secondary">
              <span>Home Delivery & Fitting:</span>
              <strong class="text-success">FREE</strong>
            </div>
            <div class="d-flex justify-content-between mb-3 border-top pt-3 fs-5">
              <span class="fw-bold text-navy">Total Payable:</span>
              <span class="fw-bold text-orange" id="tmCheckoutGrandTotal">₹0</span>
            </div>
            <div class="small text-muted bg-light p-3 rounded-3">
              <i class="bi bi-shield-check text-success me-1"></i> Includes Official Manufacturer Warranty, Calibration Slip & GST Invoice.
            </div>
          </div>
        </div>

      </div>
    </div>
  </section>

<?php ob_start(); ?>
<script>
    document.addEventListener('DOMContentLoaded', () => {
      const totals = Cart.calculateTotals();
      const subEl = document.getElementById('tmCheckoutSubtotal');
      const grandEl = document.getElementById('tmCheckoutGrandTotal');
      const listEl = document.getElementById('tmCheckoutItemsList');
      if (subEl) subEl.textContent = '₹' + totals.subtotal.toLocaleString('en-IN');
      if (grandEl) grandEl.textContent = '₹' + totals.grandTotal.toLocaleString('en-IN');
      
      if (listEl) {
        const cart = Cart.getCart();
        if (cart.length === 0) {
          listEl.innerHTML = '<div class="small text-muted">No products in cart.</div>';
        } else {
          listEl.innerHTML = cart.map(item => `
            <div class="d-flex justify-content-between align-items-center mb-2 small">
              <div>
                <strong class="text-navy">${item.name}</strong>
                <div class="text-muted" style="font-size:0.75rem;">Qty: ${item.qty} × ₹${item.price.toLocaleString('en-IN')}</div>
              </div>
              <span class="fw-bold text-navy">₹${(item.price * item.qty).toLocaleString('en-IN')}</span>
            </div>
          `).join('');
        }
      }
    });
  </script>
<?php $page_inline_js = ob_get_clean(); ?>
<?php include __DIR__ . '/includes/footer.php'; ?>
