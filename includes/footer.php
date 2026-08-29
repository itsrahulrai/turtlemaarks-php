<?php
/**
 * REUSABLE SITE FOOTER
 * Every page ends with:
 *   $page_js         = ['assets/js/filter.js'];   // optional extra files
 *   $page_inline_js  = '<script>...</script>';    // optional page script
 *   include __DIR__ . '/includes/footer.php';
 */

$page_js        = $page_js        ?? [];
$page_inline_js = $page_inline_js ?? '';
?>
  </main>

  <!-- ============ FOOTER ============ -->
  <footer class="tm-footer">
    
    <!-- MAIN 5-COLUMN FOOTER (MATCHING REFERENCE DESIGN) -->
    <div class="tm-footer-ref-main">
      <div class="container">
        <div class="row g-4 g-lg-0 tm-ref-row">

          <!-- Column 1: Brand, Tagline & Social -->
          <div class="col-lg-3 col-md-6 tm-ref-col tm-ref-col-brand">
            <a href="<?= e(url('index.php')) ?>" class="d-inline-block mb-3">
              <img src="<?= e(url(SITE_LOGO)) ?>" alt="<?= e(SITE_SHORT) ?>" class="tm-ref-logo">
            </a>
            <p class="tm-ref-brand-desc">
              <?= e(SITE_NAME) ?> &mdash; Premier audiology clinic in Greater Noida West dedicated to digital hearing restoration, sound-booth diagnostics, and speech therapy.
            </p>
            <div class="tm-ref-red-line"></div>
            <div class="tm-ref-follow-label">FOLLOW US</div>
            <div class="d-flex align-items-center gap-2 tm-ref-social-row">
              <a href="https://www.facebook.com/turtlemaarks/" target="_blank" rel="noopener" class="tm-ref-social-btn tm-ref-soc-fb" title="Facebook" aria-label="Facebook">
                <i class="bi bi-facebook"></i>
              </a>
              <a href="https://www.instagram.com/turtlemaarks_hearinghealth/" target="_blank" rel="noopener" class="tm-ref-social-btn tm-ref-soc-ig" title="Instagram" aria-label="Instagram">
                <i class="bi bi-instagram"></i>
              </a>
              <a href="https://in.linkedin.com/company/turtle-maarks-hearing-health" target="_blank" rel="noopener" class="tm-ref-social-btn tm-ref-soc-li" title="LinkedIn" aria-label="LinkedIn">
                <i class="bi bi-linkedin"></i>
              </a>
              <a href="https://wa.me/<?= e(SITE_WHATSAPP) ?>" target="_blank" rel="noopener" class="tm-ref-social-btn tm-ref-soc-wa" title="WhatsApp" aria-label="WhatsApp">
                <i class="bi bi-whatsapp"></i>
              </a>
              <a href="https://www.youtube.com/@TurtleMaarksHearingHealth" target="_blank" rel="noopener" class="tm-ref-social-btn tm-ref-soc-yt" title="YouTube" aria-label="YouTube">
                <i class="bi bi-youtube"></i>
              </a>
            </div>
          </div>

          <!-- Column 2: Company -->
          <div class="col-lg-2 col-md-6 col-6 tm-ref-col">
            <div class="tm-ref-heading-wrap">
              <h6 class="tm-ref-heading">Company</h6>
              <div class="tm-ref-heading-line"></div>
            </div>
            <ul class="tm-ref-chevron-list">
              <li><a href="<?= e(url('index.php')) ?>"><span class="tm-ref-chevron">&gt;</span> Home</a></li>
              <li><a href="<?= e(url('about.php')) ?>"><span class="tm-ref-chevron">&gt;</span> About Us</a></li>
              <li><a href="<?= e(url('gallery.php')) ?>"><span class="tm-ref-chevron">&gt;</span> Clinic Tour</a></li>
              <li><a href="<?= e(url('blogs.php')) ?>"><span class="tm-ref-chevron">&gt;</span> Health Blogs</a></li>
              <li><a href="<?= e(url('order-tracking.php')) ?>"><span class="tm-ref-chevron">&gt;</span> Order Tracking</a></li>
              <li><a href="<?= e(url('book-appointment.php')) ?>"><span class="tm-ref-chevron">&gt;</span> Book Appointment</a></li>
              <li><a href="<?= e(url('repair.php')) ?>"><span class="tm-ref-chevron">&gt;</span> Repair &amp; Servicing</a></li>
              <li><a href="<?= e(url('contact.php')) ?>"><span class="tm-ref-chevron">&gt;</span> Contact Us</a></li>
            </ul>
          </div>

          <!-- Column 3: Our Services -->
          <div class="col-lg-2 col-md-6 col-6 tm-ref-col">
            <div class="tm-ref-heading-wrap">
              <h6 class="tm-ref-heading">Our Services</h6>
              <div class="tm-ref-heading-line"></div>
            </div>
            <ul class="tm-ref-chevron-list">
              <li><a href="<?= e(url('diagnostic-services.php#pta')) ?>"><span class="tm-ref-chevron">&gt;</span> Pure Tone Audiometry (PTA)</a></li>
              <li><a href="<?= e(url('diagnostic-services.php#tympanometry')) ?>"><span class="tm-ref-chevron">&gt;</span> Tympanometry (Tymp)</a></li>
              <li><a href="<?= e(url('diagnostic-services.php#bera')) ?>"><span class="tm-ref-chevron">&gt;</span> BERA / ABR Audiometry</a></li>
              <li><a href="<?= e(url('diagnostic-services.php#oae')) ?>"><span class="tm-ref-chevron">&gt;</span> OAE Hearing Screening</a></li>
              <li><a href="<?= e(url('service-speech-therapy.php')) ?>"><span class="tm-ref-chevron">&gt;</span> Speech &amp; Language Therapy</a></li>
              <li><a href="<?= e(url('service-home-visit.php')) ?>"><span class="tm-ref-chevron">&gt;</span> Senior Citizen Home Visit</a></li>
            </ul>
            <a href="<?= e(url('diagnostic-services.php')) ?>" class="tm-ref-view-all">
              View All Services &rarr;
            </a>
          </div>

          <!-- Column 4: Products (Formerly Hearing Aids) -->
          <div class="col-lg-2 col-md-6 col-6 tm-ref-col">
            <div class="tm-ref-heading-wrap">
              <h6 class="tm-ref-heading">Products</h6>
              <div class="tm-ref-heading-line"></div>
            </div>
            <ul class="tm-ref-chevron-list">
              <li><a href="<?= e(url('products.php?style=RIC')) ?>"><span class="tm-ref-chevron">&gt;</span> Receiver-in-Canal (RIC)</a></li>
              <li><a href="<?= e(url('products.php?style=CIC')) ?>"><span class="tm-ref-chevron">&gt;</span> Invisible In-Canal (CIC)</a></li>
              <li><a href="<?= e(url('products.php?style=BTE')) ?>"><span class="tm-ref-chevron">&gt;</span> Behind-The-Ear (BTE)</a></li>
              <li><a href="<?= e(url('product-category.php')) ?>"><span class="tm-ref-chevron">&gt;</span> Rechargeable Models</a></li>
              <li><a href="<?= e(url('products.php')) ?>"><span class="tm-ref-chevron">&gt;</span> Bluetooth &amp; AI Aids</a></li>
              <li><a href="<?= e(url('products.php')) ?>"><span class="tm-ref-chevron">&gt;</span> Batteries &amp; Accessories</a></li>
            </ul>
            <a href="<?= e(url('products.php')) ?>" class="tm-ref-view-all">
              View All Products &rarr;
            </a>
          </div>

          <!-- Column 5: Contact Us (With Soft Icon Cards) -->
          <div class="col-lg-3 col-md-6 tm-ref-col tm-ref-col-contact">
            <div class="tm-ref-heading-wrap">
              <h6 class="tm-ref-heading">Contact Us</h6>
              <div class="tm-ref-heading-line"></div>
            </div>
            
            <div class="tm-ref-contact-blocks">
              <!-- Clinic Address -->
              <div class="tm-ref-contact-item">
                <div class="tm-ref-contact-icon">
                  <i class="bi bi-geo-alt"></i>
                </div>
                <div class="tm-ref-contact-body">
                  <div class="tm-ref-contact-title">Clinic (Delhi NCR, India)</div>
                  <div class="tm-ref-contact-detail"><?= e(SITE_ADDRESS) ?></div>
                </div>
              </div>

              <!-- Email Us -->
              <div class="tm-ref-contact-item">
                <div class="tm-ref-contact-icon">
                  <i class="bi bi-envelope"></i>
                </div>
                <div class="tm-ref-contact-body">
                  <div class="tm-ref-contact-title">Email Us</div>
                  <a href="mailto:<?= e(SITE_EMAIL) ?>" class="tm-ref-contact-link"><?= e(SITE_EMAIL) ?></a>
                </div>
              </div>

              <!-- Call Us -->
              <div class="tm-ref-contact-item">
                <div class="tm-ref-contact-icon">
                  <i class="bi bi-telephone"></i>
                </div>
                <div class="tm-ref-contact-body">
                  <div class="tm-ref-contact-title">Call Us</div>
                  <a href="tel:<?= e(SITE_PHONE_RAW) ?>" class="tm-ref-contact-link"><?= e(SITE_PHONE) ?></a>
                  <div class="tm-ref-contact-sub"><?= SITE_HOURS_SHORT ?></div>
                </div>
              </div>
            </div>

          </div>

        </div>
      </div>
    </div>

    <!-- BLACK BOTTOM BAR (MATCHING IMAGE 2) -->
    <div class="tm-ref-bottom-bar">
      <div class="container">
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-center gap-2">
          
          <!-- Copyright Left -->
          <div class="tm-ref-bottom-copy text-center text-md-start">
            &copy; <?= date('Y') ?> <strong><?= e(SITE_NAME) ?></strong>. All Rights Reserved.
          </div>

          <!-- Legal Links Right -->
          <div class="tm-ref-bottom-links d-flex flex-wrap align-items-center justify-content-center gap-2">
            <a href="#tmPrivacyModal" data-bs-toggle="modal">Privacy Policy</a>
            <span class="tm-ref-pipe">|</span>
            <a href="#tmTermsModal" data-bs-toggle="modal">Terms &amp; Conditions</a>
            <span class="tm-ref-pipe">|</span>
            <a href="#tmWarrantyModal" data-bs-toggle="modal">Refund &amp; Cancellation</a>
            <span class="tm-ref-pipe">|</span>
            <a href="#tmWarrantyModal" data-bs-toggle="modal">Shipping &amp; Delivery</a>
            <span class="tm-ref-pipe">|</span>
            <a href="<?= e(url('contact.php')) ?>">Sitemap</a>
          </div>

        </div>
      </div>
    </div>

  </footer>

  <!-- ============ POLICY QUICK MODALS ============ -->
  <!-- 1. Privacy Modal -->
  <div class="modal fade" id="tmPrivacyModal" tabindex="-1" aria-labelledby="tmPrivacyModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
      <div class="modal-content rounded-4 border-0 shadow-lg">
        <div class="modal-header border-bottom">
          <h5 class="modal-title fw-bold text-navy" id="tmPrivacyModalLabel">
            <i class="bi bi-shield-lock-fill text-orange me-2"></i> Patient Privacy Policy
          </h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body p-4 small text-secondary">
          <h6 class="fw-bold text-navy">1. Patient Medical Information</h6>
          <p>At <?= e(SITE_NAME) ?>, patient confidentiality is paramount. All audiograms, diagnostic records, and fitting data are securely archived strictly for clinical evaluation and follow-up adjustments.</p>
          <h6 class="fw-bold text-navy mt-3">2. Order &amp; Contact Details</h6>
          <p>Contact details submitted for home visit booking or online orders are used solely to fulfill your requests, process warranty registrations with manufacturers, and provide SMS/WhatsApp booking reminders.</p>
          <h6 class="fw-bold text-navy mt-3">3. Data Security &amp; No-Third-Party Sharing</h6>
          <p>We do not sell, trade, or distribute your personal or medical data to third-party telemarketers. All online payment data is encrypted with 256-bit SSL technology.</p>
        </div>
        <div class="modal-footer border-top py-2">
          <button type="button" class="btn btn-sm tm-btn-primary" data-bs-dismiss="modal">I Understand</button>
        </div>
      </div>
    </div>
  </div>

  <!-- 2. Terms of Service Modal -->
  <div class="modal fade" id="tmTermsModal" tabindex="-1" aria-labelledby="tmTermsModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
      <div class="modal-content rounded-4 border-0 shadow-lg">
        <div class="modal-header border-bottom">
          <h5 class="modal-title fw-bold text-navy" id="tmTermsModalLabel">
            <i class="bi bi-file-earmark-text-fill text-orange me-2"></i> Terms of Service
          </h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body p-4 small text-secondary">
          <h6 class="fw-bold text-navy">1. Diagnostic Testing Appointments</h6>
          <p>Appointment slots for PTA, Tympanometry, BERA, and OAE tests are allocated to ensure ample sound-booth time. Please arrive 10 minutes before your scheduled slot.</p>
          <h6 class="fw-bold text-navy mt-3">2. Pricing &amp; Manufacturer Warranty</h6>
          <p>All hearing aid prices are inclusive of manufacturer warranty (1 to 4 years depending on tier), official brand accessories, and lifetime acoustic fine-tuning at our clinic.</p>
          <h6 class="fw-bold text-navy mt-3">3. Home Visits for Senior Citizens</h6>
          <p>Home visits are available across Noida, Greater Noida, and Delhi NCR for senior citizens and mobility-restricted patients upon prior confirmation.</p>
        </div>
        <div class="modal-footer border-top py-2">
          <button type="button" class="btn btn-sm tm-btn-primary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

  <!-- 3. Warranty & Return Policy Modal -->
  <div class="modal fade" id="tmWarrantyModal" tabindex="-1" aria-labelledby="tmWarrantyModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
      <div class="modal-content rounded-4 border-0 shadow-lg">
        <div class="modal-header border-bottom">
          <h5 class="modal-title fw-bold text-navy" id="tmWarrantyModalLabel">
            <i class="bi bi-award-fill text-orange me-2"></i> Warranty &amp; Return Policy
          </h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body p-4 small text-secondary">
          <h6 class="fw-bold text-navy">1. Official Manufacturer Warranty</h6>
          <p>Every hearing instrument from Phonak, Oticon, Signia, ReSound, and Widex purchased at Turtle Maarks carries authentic international manufacturer warranty covering internal digital amplifier, microphone, and receiver defects.</p>
          <h6 class="fw-bold text-navy mt-3">2. 7-Day Free Home Trial Period</h6>
          <p>We provide a 7-day real-world trial for eligible models so patients can test speech clarity in dining rooms, TV watching, and outdoor family environments before final decision.</p>
          <h6 class="fw-bold text-navy mt-3">3. Lifetime Fine-Tuning &amp; Servicing</h6>
          <p>Purchased devices qualify for unlimited computer-based fine-tuning, firmware updates, hearing profile recalibrations, and routine vacuum dehumidification at our clinic.</p>
        </div>
        <div class="modal-footer border-top py-2">
          <button type="button" class="btn btn-sm tm-btn-primary" data-bs-dismiss="modal">Got It</button>
        </div>
      </div>
    </div>
  </div>

  <!-- ============ FLOATING ACTION BUTTONS ============ -->
  <div class="tm-floating-pill-wrap">
    <a href="https://wa.me/<?= e(SITE_WHATSAPP) ?>" target="_blank" rel="noopener" class="tm-floating-btn" title="WhatsApp Support">
      <i class="bi bi-whatsapp fs-6"></i> WhatsApp
    </a>
    <a href="tel:<?= e(SITE_PHONE_RAW) ?>" class="tm-floating-btn tm-floating-btn-call" title="Call Doctor Helpline">
      <i class="bi bi-telephone-fill fs-6"></i> Call Doctor
    </a>
  </div>

  <!-- ============ CART DRAWER ============ -->
  <div class="offcanvas offcanvas-end tm-cart-drawer" tabindex="-1" id="tmCartDrawer">
    <div class="offcanvas-header border-bottom">
      <div class="d-flex align-items-center gap-2">
        <i class="bi bi-bag-check fs-5 text-orange"></i>
        <h6 class="fw-bold text-navy mb-0">Shopping Cart (<span id="tmCartDrawerCount">0</span>)</h6>
      </div>
      <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body d-flex flex-column">
      <div id="tmCartDrawerItems" class="flex-grow-1 overflow-auto"></div>
      <div class="border-top pt-3 mt-auto">
        <div class="d-flex justify-content-between mb-3 fs-5">
          <span class="fw-bold text-navy">Total:</span>
          <span class="fw-bold text-orange" id="tmCartDrawerGrandTotal">₹0</span>
        </div>
        <div class="d-grid gap-2">
          <a href="<?= e(url('checkout.php')) ?>" class="tm-btn tm-btn-primary">Checkout</a>
          <a href="<?= e(url('cart.php')) ?>" class="tm-btn tm-btn-outline-navy">View Full Cart</a>
        </div>
      </div>
    </div>
  </div>

  <!-- ============ APPOINTMENT SUCCESS MODAL ============ -->
  <div class="modal fade" id="tmAppointmentSuccessModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content rounded-4 border-0 shadow-lg">
        <div class="modal-body p-4 text-center">
          <div class="rounded-circle bg-success-subtle text-success d-inline-flex align-items-center justify-content-center p-3 mb-3" style="width: 70px; height: 70px;">
            <i class="bi bi-check-circle-fill fs-1"></i>
          </div>
          <h4 class="fw-bold text-navy mb-1">Appointment Confirmed!</h4>
          <p class="text-secondary small mb-3">Your appointment slot has been successfully scheduled. An SMS &amp; WhatsApp confirmation has been initiated.</p>

          <div class="card rounded-3 border bg-light p-3 text-start small mb-4">
            <div class="d-flex justify-content-between mb-2"><span class="text-muted">Booking Reference:</span><strong class="text-orange" id="tmModalBookingRef">TM-APT-XXXX</strong></div>
            <div class="d-flex justify-content-between mb-2"><span class="text-muted">Patient Name:</span><strong class="text-navy" id="tmModalPatientName">Patient</strong></div>
            <div class="d-flex justify-content-between mb-2"><span class="text-muted">Service:</span><strong class="text-navy" id="tmModalService">Hearing Test</strong></div>
            <div class="d-flex justify-content-between mb-2"><span class="text-muted">Location:</span><strong class="text-navy" id="tmModalLocation">Clinic</strong></div>
            <div class="d-flex justify-content-between mb-2"><span class="text-muted">Audiologist:</span><strong class="text-navy" id="tmModalDoctor">Dr. Ritu Verma</strong></div>
            <div class="d-flex justify-content-between mb-0"><span class="text-muted">Date &amp; Time:</span><strong class="text-navy" id="tmModalDateTime">Today</strong></div>
          </div>

          <div class="d-grid gap-2">
            <a href="#" id="tmModalWhatsAppShareBtn" target="_blank" rel="noopener" class="tm-btn tm-btn-primary">
              <i class="bi bi-whatsapp me-1"></i> Send Details to WhatsApp
            </a>
            <button type="button" class="tm-btn tm-btn-outline-navy" onclick="window.print()">
              <i class="bi bi-printer me-1"></i> Print Slip
            </button>
            <button type="button" class="btn btn-link text-muted btn-sm" data-bs-dismiss="modal">Close Window</button>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- ============ SCRIPTS ============ -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <?php foreach ($TM_CORE_JS as $js): ?>
  <script src="<?= e(url($js)) ?>"></script>
  <?php endforeach; ?>
  <?php foreach ($page_js as $js): ?>
  <script src="<?= e(url($js)) ?>"></script>
  <?php endforeach; ?>

<?= $page_inline_js ?>

</body>
</html>
