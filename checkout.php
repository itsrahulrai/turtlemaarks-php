<?php
/**
 * Checkout — Turtle Maarks Hearing Health
 */
$page_title       = 'Checkout — Turtle Maarks Hearing Health';
$page_description = 'Secure patient checkout for hearing aid orders and diagnostic appointments.';
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
          <a href="<?= e(url('cart.php')) ?>">Cart</a>
          <span class="tm-breadcrumb-sep"><i class="bi bi-chevron-right"></i></span>
          <span class="tm-breadcrumb-current" aria-current="page">Checkout</span>
        </div>
      </nav>
      <h1 class="display-6 fw-bold text-white mb-1 font-heading">Secure Checkout</h1>
      <p class="text-white-50 mx-auto small mb-0" style="max-width: 580px;">Complete your patient details and choose your delivery or in-clinic fitting preference.</p>
    </div>
  </section>

  <section class="py-5 bg-light">
    <div class="container">
      <div class="row g-4">
        
        <!-- Checkout Form (Left) -->
        <div class="col-lg-8">
          <div class="card rounded-4 border p-4 p-md-5 bg-white shadow-xs">

            <h5 class="fw-bold text-navy mb-4"><i class="bi bi-person-lines-fill text-orange me-2"></i> Patient & Delivery Information</h5>
              <form onsubmit="event.preventDefault(); tmHandleCheckout();">

                <div class="row g-3 mb-4">

                  <div class="col-md-6">
                    <label class="form-label small fw-bold text-navy">
                      Patient / Buyer Full Name *
                    </label>
                    <input
                      type="text"
                      class="form-control"
                      required
                      placeholder="e.g. Ramesh Chandra"
                    >
                  </div>

                  <div class="col-md-6">
                    <label class="form-label small fw-bold text-navy">
                      WhatsApp / Mobile Number *
                    </label>
                    <input
                      type="tel"
                      class="form-control"
                      required
                      placeholder="10-digit mobile number"
                    >
                  </div>

                  <div class="col-md-6">
                    <label class="form-label small fw-bold text-navy">
                      Email Address *
                    </label>
                    <input
                      type="email"
                      class="form-control"
                      required
                      placeholder="name@example.com"
                    >
                  </div>

                  <!-- City / Area -->
                  <div class="col-md-6">
                    <label class="form-label small fw-bold text-navy">
                      City / Area *
                    </label>
                    <input
                      type="text"
                      class="form-control"
                      required
                      value="Greater Noida West / Noida"
                    >
                  </div>


                  <!-- Address Line 1 -->
                  <div class="col-12">
                    <label class="form-label small fw-bold text-navy">
                      Address Line 1 *
                      <span class="text-muted fw-normal">
                        (House/Flat No., Building Name)
                      </span>
                    </label>

                    <input
                      type="text"
                      class="form-control"
                      required
                      placeholder="e.g. Flat 402, Riviera Tower, Gaur City 2"
                    >
                  </div>


                  <!-- Address Line 2 -->
                  <div class="col-12">
                    <label class="form-label small fw-bold text-navy">
                      Address Line 2
                      <span class="text-muted fw-normal">
                        (Sector / Society / Landmark — Optional)
                      </span>
                    </label>

                    <input
                      type="text"
                      class="form-control"
                      placeholder="e.g. Near Lotus Pond, Sector 16C, Greater Noida West"
                    >
                  </div>


                  <!-- State -->
                  <div class="col-md-6">
                    <label class="form-label small fw-bold text-navy">
                      State *
                    </label>

                    <input
                      type="text"
                      class="form-control"
                      required
                      value="Uttar Pradesh"
                      placeholder="e.g. Uttar Pradesh"
                    >
                  </div>


                  <!-- PIN Code -->
                  <div class="col-md-6">
                    <label class="form-label small fw-bold text-navy">
                      PIN Code *
                    </label>

                    <input
                      type="text"
                      class="form-control"
                      required
                      inputmode="numeric"
                      pattern="[0-9]{6}"
                      maxlength="6"
                      placeholder="e.g. 201306"
                    >
                  </div>

                </div>


                <!-- PAYMENT METHOD -->
                <h5 class="fw-bold text-navy mb-3">
                  <i class="bi bi-credit-card-2-front-fill text-orange me-2"></i>
                  Payment Method
                </h5>

                <div class="d-flex flex-column gap-3 mb-4">

                  <!-- Razorpay -->
                  <div
                    class="p-3 border rounded-3 d-flex align-items-start gap-3 tm-pay-card"
                    id="payCardRazorpay"
                    onclick="tmSelectPayment('payRazorpay', this)"
                    style="cursor:pointer; border-color:#FF6B00 !important; background:#FFF8F3;"
                  >

                    <input
                      type="radio"
                      name="paymentOption"
                      id="payRazorpay"
                      checked
                      class="form-check-input mt-1 flex-shrink-0"
                    >

                    <label
                      for="payRazorpay"
                      class="mb-0 w-100"
                      style="cursor:pointer;"
                    >

                      <div class="d-flex align-items-center justify-content-between flex-wrap gap-2 mb-1">

                        <span class="fw-bold text-navy small">
                          <i class="bi bi-lightning-charge-fill text-warning me-1"></i>
                          Pay Online via Razorpay
                        </span>

                        <div class="d-flex gap-1 flex-wrap">

                          <span
                            class="badge bg-light border text-secondary fw-semibold"
                            style="font-size:0.67rem;"
                          >
                            UPI
                          </span>

                          <span
                            class="badge bg-light border text-secondary fw-semibold"
                            style="font-size:0.67rem;"
                          >
                            Cards
                          </span>

                          <span
                            class="badge bg-light border text-secondary fw-semibold"
                            style="font-size:0.67rem;"
                          >
                            Net Banking
                          </span>

                          <span
                            class="badge bg-light border text-secondary fw-semibold"
                            style="font-size:0.67rem;"
                          >
                            EMI
                          </span>

                        </div>

                      </div>

                      <div class="small text-muted fw-normal">
                        Secure 256-bit encrypted gateway. Instant confirmation & GST invoice.
                      </div>

                    </label>
                  </div>


                  <!-- Cash on Delivery -->
                  <div
                    class="p-3 border rounded-3 bg-white d-flex align-items-start gap-3 tm-pay-card"
                    id="payCardCOD"
                    onclick="tmSelectPayment('payCOD', this)"
                    style="cursor:pointer;"
                  >

                    <input
                      type="radio"
                      name="paymentOption"
                      id="payCOD"
                      class="form-check-input mt-1 flex-shrink-0"
                    >

                    <label
                      for="payCOD"
                      class="mb-0 w-100"
                      style="cursor:pointer;"
                    >

                      <div class="d-flex align-items-center justify-content-between flex-wrap gap-2 mb-1">

                        <span class="fw-bold text-navy small">
                          <i class="bi bi-cash-stack text-success me-1"></i>
                          Cash on Delivery
                        </span>

                        <span
                          class="badge bg-success-subtle text-success border border-success-subtle"
                          style="font-size:0.67rem;"
                        >
                          No Advance Required
                        </span>

                      </div>

                      <div class="small text-muted fw-normal">
                        Pay cash or UPI at your doorstep when our audiologist arrives.
                        Device trial before payment.
                      </div>

                    </label>
                  </div>

                </div>


                <!-- PLACE ORDER -->
                <button
                  type="submit"
                  class="tm-btn tm-btn-primary tm-btn-lg w-100"
                >
                  <i class="bi bi-check2-circle me-1"></i>
                  Place Order
                </button>

              </form>
          </div>
        </div>

        <!-- Summary (Right) -->
        <div class="col-lg-4">
          <div class="card rounded-4 border p-4 bg-white shadow-xs sticky-top tm-checkout-summary-card" style="top: 85px;">
            <h5 class="fw-bold text-navy mb-3">Order Items</h5>
            <div id="tmCheckoutItemsList" class="mb-3 border-bottom pb-2"></div>
            <div class="d-flex justify-content-between mb-2 small text-secondary">
              <span>Subtotal:</span>
              <strong class="text-navy" id="tmCheckoutSubtotal">₹0</strong>
            </div>
            <div class="d-flex justify-content-between mb-2 small text-secondary">
              <span>Home Delivery &amp; Fitting:</span>
              <strong class="text-success">FREE</strong>
            </div>
            <div class="d-flex justify-content-between mb-3 border-top pt-3 fs-5">
              <span class="fw-bold text-navy">Total Payable:</span>
              <span class="fw-bold text-orange" id="tmCheckoutGrandTotal">₹0</span>
            </div>
            <div class="small text-muted bg-light p-3 rounded-3">
              <i class="bi bi-shield-check text-success me-1"></i> Includes Official Manufacturer Warranty, Calibration Slip &amp; GST Invoice.
            </div>
          </div>
        </div>

      </div>
    </div>
  </section>

<?php ob_start(); ?>
<script>
    function tmSelectPayment(radioId, card) {
      document.querySelectorAll('.tm-pay-card').forEach(c => {
        c.style.borderColor = '';
        c.style.background = '#FFFFFF';
      });
      document.getElementById(radioId).checked = true;
      card.style.borderColor = '#FF6B00';
      card.style.background = '#FFF8F3';
    }

    /* Load saved address on page load */
    function tmLoadSavedAddress() {
      const saved = localStorage.getItem('tm_delivery_address');
      if (saved) {
        try {
          const addr = JSON.parse(saved);
          // Remove old hardcoded clinic address if still cached
          if ((addr.line1 || '').toLowerCase().includes('gaur city mall') ||
              (addr.line1 || '').toLowerCase().includes('clinic')) {
            localStorage.removeItem('tm_delivery_address');
            return;
          }
          tmDisplaySavedAddress(addr);
        } catch(e) {
          localStorage.removeItem('tm_delivery_address');
        }
      }
    }

    function tmHandleCheckout() {
      const method = document.querySelector('input[name="paymentOption"]:checked').id;
      if (method === 'payRazorpay') {
        // TODO: Integrate Razorpay SDK here → rzp.open();
        alert('Razorpay payment gateway will be loaded here.\nPlease add your Razorpay key_id to activate.');
        return;
      }
      window.location.href = 'order-confirmation.php';
    }

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
