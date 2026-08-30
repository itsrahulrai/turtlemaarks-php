<?php
/**
 * My Orders — Turtle Maarks Patient Portal
 */
$page_title       = 'My Orders — Turtle Maarks Patient Portal';
$page_description = 'Track your hearing aid orders, calibration status, and download GST tax invoices.';
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
          <a href="<?= e(url('account-dashboard.php')) ?>">Account</a>
          <span class="tm-breadcrumb-sep"><i class="bi bi-chevron-right"></i></span>
          <span class="tm-breadcrumb-current" aria-current="page">Orders</span>
        </div>
      </nav>
      <h1 class="display-6 fw-bold text-white mb-1 font-heading">My Hearing Device Orders</h1>
      <p class="text-white-50 mx-auto small mb-0" style="max-width: 580px;">Track your hearing aid orders, calibration status, and download warranty invoices.</p>
    </div>
  </section>

<?php
// Complete Orders Repository
$all_orders = [
    [
        'id'                 => 'TM-ORD-92841',
        'date'               => 'August 24, 2026',
        'status_badge'       => 'bg-success-subtle text-success',
        'status_icon'        => 'bi-patch-check-fill',
        'status_text'        => 'Calibrated & Active 7-Day Trial',
        'title'              => 'Phonak Audéo Infinio Ultra 90 (Binaural Pair)',
        'style'              => 'Receiver-In-Canal (RIC) • 24 Channels AutoSense OS 6.0 • Champagne',
        'image'              => 'assets/images/hearing-aid/ric.webp',
        'price'              => '2,85,000',
        'pay_status'         => 'Paid (UPI / EMI)',
        'sn'                 => 'PH-9928192 / PH-9928193',
        'warranty'           => '4 Years Global Warranty',
        'cal_target'         => 'R: 48dB Moderate Loss',
        'doctor'             => 'Dr. Ritu Verma (RCI)',
        'delivery'           => 'Doorstep Home Fitting',
        'address'            => 'Flat 1402, Gaur Saundaryam, Greater Noida West 201306',
        'pay_method'         => 'Paid via Online EMI (HDFC/Razorpay)',
        'warranty_condition' => '4 Years Global Warranty (Till Aug 2030)',
        'is_device'          => true
    ],
    [
        'id'                 => 'TM-ORD-88120',
        'date'               => 'August 20, 2026',
        'status_badge'       => 'bg-primary-subtle text-primary',
        'status_icon'        => 'bi-check-circle-fill',
        'status_text'        => 'Completed • Verified Report',
        'title'              => 'Pure Tone Audiometry (PTA) & Tympanometry Diagnostic Assessment',
        'style'              => 'Soundproof Booth Evaluation • Air & Bone Conduction (250Hz - 8000Hz)',
        'icon'               => 'bi-soundwave',
        'price'              => '1,200',
        'pay_status'         => 'Paid (UPI)',
        'sn'                 => 'DIAG-PTA-88120',
        'warranty'           => 'Same Day Verification',
        'cal_target'         => 'Diagnostic Baseline Test',
        'doctor'             => 'Dr. Ritu Verma (RCI)',
        'delivery'           => 'Clinic Sound Suite 1',
        'address'            => 'Suite 1509, Gaur City Mall, Greater Noida West',
        'pay_method'         => 'Paid via UPI (GooglePay)',
        'warranty_condition' => 'Doctor Verified Diagnostic Report',
        'is_device'          => false
    ],
    [
        'id'                 => 'TM-ORD-74190',
        'date'               => 'July 12, 2026',
        'status_badge'       => 'bg-light text-navy border',
        'status_icon'        => 'bi-box-seam',
        'status_text'        => 'Delivered & Fitted',
        'title'              => 'German Hypoallergenic Biocompatible Soft Silicone Custom Ear Moulds (Pair)',
        'style'              => 'Custom Anatomical Impressions • Anti-Feedback Acoustic Seal • Hypoallergenic German Silicone',
        'icon'               => 'bi-palette-fill',
        'price'              => '1,700',
        'pay_status'         => 'Paid (Cash)',
        'sn'                 => 'MOULD-SIL-74190',
        'warranty'           => '1 Year Structural Fit Guarantee',
        'cal_target'         => 'Custom Anatomical Seal',
        'doctor'             => 'Dr. Ritu Verma (RCI)',
        'delivery'           => 'Clinic Lab Fitting',
        'address'            => 'Suite 1509, Gaur City Mall, Greater Noida West',
        'pay_method'         => 'Paid in Cash at Clinic Reception',
        'warranty_condition' => '1 Year Structural Fit Guarantee',
        'is_device'          => false
    ],
    [
        'id'                 => 'TM-ORD-61028',
        'date'               => 'May 18, 2026',
        'status_badge'       => 'bg-light text-muted border',
        'status_icon'        => 'bi-archive-fill',
        'status_text'        => 'Completed',
        'title'              => 'Rayovac Extra Advanced Hearing Aid Batteries (Pack of 60 - Size 312)',
        'style'              => 'Zinc-Air Long Life 1.45V Cell • Mercury Free Formula • Sealed Fresh Pack',
        'image'              => 'assets/images/hearing-aid/battery.webp',
        'icon'               => 'bi-battery-charging',
        'price'              => '1,800',
        'pay_status'         => 'Paid (Online Card)',
        'sn'                 => 'ACC-BAT-61028',
        'warranty'           => 'Manufacturer Shelf Life (2029)',
        'cal_target'         => 'Hearing Aid Power Accessories',
        'doctor'             => 'Clinic Reception Dispenser',
        'delivery'           => 'Standard Courier Delivery',
        'address'            => 'Flat 1402, Gaur Saundaryam, Greater Noida West 201306',
        'pay_method'         => 'Paid via Debit Card (Razorpay)',
        'warranty_condition' => '100% Genuine Sealed Stock',
        'is_device'          => true
    ],
    [
        'id'                 => 'TM-ORD-52914',
        'date'               => 'March 04, 2026',
        'status_badge'       => 'bg-light text-muted border',
        'status_icon'        => 'bi-tools',
        'status_text'        => 'Completed Service',
        'title'              => 'Deep Ultrasonic Dehumidification & Acoustic Reprogramming Service',
        'style'              => 'Electronic Vacuum Moisture Extraction • Wax Guard Replacement • Mic Port Clearing',
        'icon'               => 'bi-tools',
        'price'              => '600',
        'pay_status'         => 'Paid (UPI)',
        'sn'                 => 'SRV-REP-52914',
        'warranty'           => '90-Day Service Guarantee',
        'cal_target'         => 'Multi-Brand Lab Diagnostics',
        'doctor'             => 'Lab Technician R. Sharma',
        'delivery'           => 'In-Clinic Service Lab',
        'address'            => 'Suite 1509, Gaur City Mall, Greater Noida West',
        'pay_method'         => 'Paid via UPI (PhonePe)',
        'warranty_condition' => '90-Day Post-Service Lab Guarantee',
        'is_device'          => false
    ]
];

// Pagination logic (3 orders per page)
$per_page       = 3;
$total_orders   = count($all_orders);
$total_pages    = max(1, (int) ceil($total_orders / $per_page));
$current_page   = max(1, min($total_pages, (int) ($_GET['page'] ?? 1)));
$offset         = ($current_page - 1) * $per_page;
$display_orders = array_slice($all_orders, $offset, $per_page);
?>

  <section class="py-5 bg-light">
    <div class="container">
      <div class="row g-4">
        
        <!-- Shared Sidebar Component -->
        <?php 
        $active_tab = 'orders';
        include __DIR__ . '/includes/account-sidebar.php'; 
        ?>

        <!-- Main Orders List -->
        <div class="col-lg-9">
          
          <!-- Orders Header & Summary -->
          <div class="card rounded-4 border p-4 bg-white shadow-xs mb-4">
            <div class="d-flex flex-wrap justify-content-between align-items-center gap-3">
              <div>
                <h5 class="fw-bold text-navy mb-1 font-heading">My Hearing Device Orders &amp; Invoices</h5>
                <p class="text-secondary small mb-0">View complete order details, serial numbers, warranty cards, and GST tax invoices.</p>
              </div>
              <div class="d-flex gap-2">
                <span class="badge bg-light text-navy border p-2 px-3 small fw-semibold">
                  <i class="bi bi-shield-check text-success me-1"></i> Showing <?= count($display_orders) ?> of <?= $total_orders ?> Orders
                </span>
              </div>
            </div>
          </div>

          <!-- Dynamic Orders Listing -->
          <?php foreach ($display_orders as $ord): ?>
          <div class="card rounded-4 border p-4 bg-white shadow-xs mb-4">
            
            <!-- Order Header Bar -->
            <div class="d-flex flex-wrap justify-content-between align-items-center border-bottom pb-3 mb-3 gap-2">
              <div>
                <span class="badge <?= $ord['status_badge'] ?> fw-bold px-3 py-1 small mb-1">
                  <i class="bi <?= $ord['status_icon'] ?> me-1"></i> <?= e($ord['status_text']) ?>
                </span>
                <div class="small text-muted">
                  Order ID: <strong class="text-navy"><?= e($ord['id']) ?></strong> &bull; Placed on <span class="text-navy fw-medium"><?= e($ord['date']) ?></span>
                </div>
              </div>
              <div class="text-end">
                <span class="text-muted extra-small d-block">Grand Total</span>
                <span class="fs-5 fw-bold text-navy">₹<?= e($ord['price']) ?></span>
              </div>
            </div>

            <!-- Product Main Row -->
            <div class="row g-3 align-items-center mb-3">
              <div class="col-md-2 col-sm-3 text-center">
                <div class="p-2 bg-light rounded-3 border d-inline-block">
                  <?php if (!empty($ord['image'])): ?>
                    <img src="<?= e($ord['image']) ?>" alt="<?= e($ord['title']) ?>" style="max-width: 65px; height: auto;" class="img-fluid">
                  <?php else: ?>
                    <i class="bi <?= e($ord['icon'] ?? 'bi-box-seam') ?> text-orange fs-2 p-2"></i>
                  <?php endif; ?>
                </div>
              </div>
              <div class="col-md-7 col-sm-9">
                <h6 class="fw-bold text-navy mb-1 font-heading"><?= e($ord['title']) ?></h6>
                <div class="small text-muted mb-2"><?= e($ord['style']) ?></div>
                <div class="d-flex flex-wrap gap-2 extra-small">
                  <span class="badge bg-light text-navy border"><i class="bi bi-qr-code me-1"></i> Ref/SN: <?= e($ord['sn']) ?></span>
                  <span class="badge bg-primary-subtle text-primary"><i class="bi bi-award-fill me-1"></i> <?= e($ord['warranty']) ?></span>
                </div>
              </div>
              <div class="col-md-3 text-md-end">
                <span class="badge bg-success text-white py-1 px-2 small"><i class="bi bi-check-circle me-1"></i> <?= e($ord['pay_status']) ?></span>
              </div>
            </div>

            <!-- Order Full Breakdown Grid -->
            <div class="p-3 bg-light rounded-3 mb-3 small">
              <div class="row g-2">
                <div class="col-sm-6 col-md-3">
                  <span class="text-muted extra-small d-block">Target / Category</span>
                  <strong class="text-navy"><?= e($ord['cal_target']) ?></strong>
                </div>
                <div class="col-sm-6 col-md-3">
                  <span class="text-muted extra-small d-block">Assigned Specialist</span>
                  <strong class="text-navy"><?= e($ord['doctor']) ?></strong>
                </div>
                <div class="col-sm-6 col-md-3">
                  <span class="text-muted extra-small d-block">Fulfillment Mode</span>
                  <strong class="text-navy"><?= e($ord['delivery']) ?></strong>
                </div>
                <div class="col-sm-6 col-md-3">
                  <span class="text-muted extra-small d-block">Warranty Policy</span>
                  <strong class="text-success"><?= e($ord['warranty_condition']) ?></strong>
                </div>
              </div>
            </div>

            <!-- Action Buttons -->
            <div class="d-flex flex-wrap justify-content-between align-items-center gap-2 border-top pt-3">
              <div class="extra-small text-muted">
                <i class="bi bi-geo-alt text-danger me-1"></i> Delivery / Clinic: <?= e($ord['address']) ?>
              </div>
              <div class="d-flex gap-2">
                <?php if ($ord['is_device']): ?>
                <a href="<?= e(url('order-tracking.php')) ?>" class="tm-btn tm-btn-outline tm-btn-sm">
                  <i class="bi bi-truck me-1"></i> Track Status
                </a>
                <?php endif; ?>
                <button type="button" class="tm-btn tm-btn-primary tm-btn-sm" onclick="openInvoiceModal('<?= e($ord['id']) ?>', '<?= js_str($ord['title']) ?>', '<?= e($ord['price']) ?>', '<?= e($ord['date']) ?>', '<?= js_str($ord['pay_method']) ?>', '<?= js_str($ord['sn']) ?>', '<?= js_str($ord['warranty_condition']) ?>')">
                  <i class="bi bi-receipt-cutoff me-1"></i> View &amp; Print Tax Invoice
                </button>
              </div>
            </div>

          </div>
          <?php endforeach; ?>

          <!-- PAGINATION (SAME STYLE AS BLOGS PAGE) -->
          <?php if ($total_pages > 1): ?>
          <nav aria-label="Orders Pagination" class="d-flex justify-content-center mt-4">
            <ul class="tm-pagination shadow-xs rounded-3 p-1 bg-white border">
              
              <!-- Previous Button -->
              <li class="page-item <?= ($current_page <= 1) ? 'disabled' : '' ?>">
                <a class="page-link" href="<?= ($current_page <= 1) ? '#' : 'account-orders.php?page=' . ($current_page - 1) ?>" aria-label="Previous">
                  <i class="bi bi-chevron-left"></i>
                </a>
              </li>

              <!-- Numbered Pages -->
              <?php for ($p = 1; $p <= $total_pages; $p++): ?>
                <li class="page-item <?= ($p === $current_page) ? 'active' : '' ?>">
                  <a class="page-link" href="account-orders.php?page=<?= $p ?>"><?= $p ?></a>
                </li>
              <?php endfor; ?>

              <!-- Next Button -->
              <li class="page-item <?= ($current_page >= $total_pages) ? 'disabled' : '' ?>">
                <a class="page-link" href="<?= ($current_page >= $total_pages) ? '#' : 'account-orders.php?page=' . ($current_page + 1) ?>" aria-label="Next">
                  <i class="bi bi-chevron-right"></i>
                </a>
              </li>

            </ul>
          </nav>
          <?php endif; ?>

        </div>

      </div>
    </div>
  </section>

  <!-- =========================================================================
       OFFICIAL CLINICAL GST TAX INVOICE MODAL
       ========================================================================= -->
  <div class="modal fade" id="invoiceModal" tabindex="-1" aria-labelledby="invoiceModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
      <div class="modal-content border-0 rounded-4 shadow-lg">
        
        <div class="modal-header border-0 pb-0 no-print">
          <h6 class="modal-title fw-bold text-navy" id="invoiceModalLabel">
            <i class="bi bi-file-earmark-spreadsheet-fill text-orange me-1"></i> Official Clinical GST Tax Invoice
          </h6>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <div class="modal-body p-4 p-md-5">
          <div class="tm-invoice-sheet" id="invoicePrintArea">
            
            <!-- Invoice Clinic Header -->
            <div class="tm-invoice-header d-flex flex-wrap justify-content-between align-items-start gap-3">
              <div>
                <img src="assets/images/logo.png" alt="Turtle Maarks" style="height: 48px;" class="mb-2">
                <div class="fw-bold text-navy fs-6">TURTLE MAARKS HEARING HEALTH CLINIC</div>
                <div class="extra-small text-muted" style="max-width: 320px; font-size: 0.78rem;">
                  15th Floor, Suite 1509, Gaur City Mall, Greater Noida W Rd, Sector 4, Greater Noida West, UP 201306<br>
                  <strong>Tel:</strong> +91 8130495476 &bull; <strong>Email:</strong> turtlemaarks@gmail.com
                </div>
                <div class="extra-small text-secondary mt-1">
                  <strong>GSTIN:</strong> 09AAACT9281C1Z4 &bull; <strong>RCI Reg:</strong> RCI/AUD/2014/9912
                </div>
              </div>

              <div class="text-md-end">
                <span class="badge bg-navy text-white px-3 py-1 fs-6 mb-2">TAX INVOICE</span>
                <div class="small"><strong>Invoice No:</strong> <span id="invModalId" class="text-orange fw-bold">TM-ORD-92841</span></div>
                <div class="small"><strong>Date:</strong> <span id="invModalDate">Aug 24, 2026</span></div>
                <div class="small"><strong>Payment Status:</strong> <span class="badge bg-success-subtle text-success">PAID / VERIFIED</span></div>
              </div>
            </div>

            <!-- Bill To & Patient Info -->
            <div class="row g-3 mb-4 p-3 bg-light rounded-3 border">
              <div class="col-sm-6">
                <div class="extra-small text-muted text-uppercase fw-bold mb-1">Billed To (Patient):</div>
                <div class="fw-bold text-navy">Anand Kumar</div>
                <div class="small text-muted">Patient ID: TM-PAT-1082 &bull; Age: 62 Yrs</div>
                <div class="small text-muted">Flat 1402, Gaur Saundaryam, Greater Noida West, UP 201306</div>
                <div class="small text-muted">Phone: +91 9876543210 &bull; Email: anand.kumar@example.com</div>
              </div>
              <div class="col-sm-6">
                <div class="extra-small text-muted text-uppercase fw-bold mb-1">Clinical Details &amp; Payment:</div>
                <div class="small"><strong>Consultant:</strong> Dr. Ritu Verma (RCI Audiologist)</div>
                <div class="small"><strong>Payment Mode:</strong> <span id="invModalPayMethod">Credit Card EMI</span></div>
                <div class="small"><strong>Device S/N:</strong> <span id="invModalSn">PH-9928192 / PH-9928193</span></div>
                <div class="small"><strong>Warranty:</strong> <span id="invModalWarranty" class="text-success fw-semibold">4 Years Global Warranty</span></div>
              </div>
            </div>

            <!-- Line Items Table -->
            <div class="table-responsive mb-4">
              <table class="table tm-invoice-table mb-0">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Description of Goods / Clinical Services</th>
                    <th>HSN / SAC</th>
                    <th class="text-center">Qty</th>
                    <th class="text-end">Rate (₹)</th>
                    <th class="text-end">Amount (₹)</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>1</td>
                    <td>
                      <strong id="invModalItemName" class="text-navy">Phonak Audéo Infinio Ultra 90 (Binaural Pair)</strong>
                      <div class="extra-small text-muted">Includes Computerized Real-Ear Measurement (REM) calibration, lifetime fine-tuning &amp; cleaning.</div>
                    </td>
                    <td>9021</td>
                    <td class="text-center">1</td>
                    <td class="text-end" id="invModalRate">2,85,000</td>
                    <td class="text-end fw-bold text-navy" id="invModalAmount">2,85,000</td>
                  </tr>
                </tbody>
                <tfoot>
                  <tr>
                    <td colspan="4" class="border-0"></td>
                    <td class="text-end fw-bold">Subtotal:</td>
                    <td class="text-end fw-bold" id="invModalSubtotal">₹2,85,000</td>
                  </tr>
                  <tr>
                    <td colspan="4" class="border-0"></td>
                    <td class="text-end text-muted small">GST (Hearing Aids Exempt):</td>
                    <td class="text-end text-muted small">₹0.00</td>
                  </tr>
                  <tr class="border-top border-2 border-navy">
                    <td colspan="4" class="border-0">
                      <div class="tm-invoice-stamp">
                        <i class="bi bi-check2-all"></i> Official Verified &bull; Paid
                      </div>
                    </td>
                    <td class="text-end fs-6 fw-bold text-navy">Total (INR):</td>
                    <td class="text-end fs-5 fw-bold text-navy" id="invModalGrandTotal">₹2,85,000</td>
                  </tr>
                </tfoot>
              </table>
            </div>

            <!-- Invoice Footer & Signature -->
            <div class="row align-items-end pt-3 border-top">
              <div class="col-sm-7">
                <div class="extra-small text-muted" style="font-size: 0.75rem;">
                  <strong>Terms &amp; Warranty Conditions:</strong><br>
                  1. Official manufacturer warranty covers internal acoustic receiver, mic, and digital DSP chip.<br>
                  2. Lifetime free sound-booth acoustic reprogramming and vacuum dehumidification at Turtle Maarks clinic.<br>
                  3. This is a computer-generated official clinic tax invoice.
                </div>
              </div>
              <div class="col-sm-5 text-sm-end mt-3 mt-sm-0">
                <div class="small fw-bold text-navy">For TURTLE MAARKS HEARING CLINIC</div>
                <div class="my-2" style="font-family: 'Brush Script MT', cursive; font-size: 1.5rem; color: #0B1E36;">
                  Dr. Ritu Verma
                </div>
                <div class="extra-small text-muted">Authorized Clinical Signatory (RCI Certified)</div>
              </div>
            </div>

          </div>
        </div>

        <div class="modal-footer border-top bg-light no-print">
          <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
          <button type="button" class="tm-btn tm-btn-primary tm-btn-sm" onclick="window.print()">
            <i class="bi bi-printer-fill me-1"></i> Print / Save as PDF
          </button>
        </div>

      </div>
    </div>
  </div>

  <!-- JavaScript for dynamic invoice population -->
  <script>
    function openInvoiceModal(orderId, itemName, price, date, payMethod, sn, warranty) {
      document.getElementById('invModalId').innerText = orderId;
      document.getElementById('invModalDate').innerText = date;
      document.getElementById('invModalItemName').innerText = itemName;
      document.getElementById('invModalRate').innerText = price;
      document.getElementById('invModalAmount').innerText = price;
      document.getElementById('invModalSubtotal').innerText = '₹' + price;
      document.getElementById('invModalGrandTotal').innerText = '₹' + price;
      document.getElementById('invModalPayMethod').innerText = payMethod;
      document.getElementById('invModalSn').innerText = sn;
      document.getElementById('invModalWarranty').innerText = warranty;

      const modal = new bootstrap.Modal(document.getElementById('invoiceModal'));
      modal.show();
    }
  </script>

<?php include __DIR__ . '/includes/footer.php'; ?>
