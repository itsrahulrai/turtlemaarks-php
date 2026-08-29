<?php
/**
 * Diagnostic Audiology Services — Turtle Maarks Hearing Health
 */
$page_title       = 'Diagnostic Audiology Services — Turtle Maarks Hearing Health';
$page_description = 'Certified diagnostic hearing tests in Noida Extension: Pure Tone Audiometry (PTA), Tympanometry, BERA/ABR, and OAE with same-day reports.';
$active_nav       = 'services';
include __DIR__ . '/includes/header.php';
?>

<section class="py-5 bg-navy text-white text-center position-relative">
    <div class="container py-2">
      <span class="tm-pill tm-pill-orange mb-2"><i class="bi bi-activity"></i> Clinical Electrophysiology & Audiometry</span>
      <h1 class="display-6 fw-bold text-white mb-2">Diagnostic Hearing Tests</h1>
      <p class="text-white-50 mx-auto small mb-0" style="max-width: 620px;">Gold-standard hearing assessments conducted in calibrated ANSI-certified sound booths with same-day reports.</p>
    </div>
  </section>

  <!-- TESTS GRID -->
  <section class="py-5 bg-light">
    <div class="container">
      <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4">
        
        <!-- PTA -->
        <div class="col" id="pta">
          <div class="tm-diag-card">
            <div>
              <div class="tm-diag-icon"><i class="bi bi-soundwave"></i></div>
              <h5 class="fw-bold text-navy mb-1">PTA (Pure Tone Audiometry)</h5>
              <p class="text-secondary small mb-3">Clinical benchmark test measuring air and bone conduction thresholds across 250Hz - 8000Hz.</p>
              <ul class="list-unstyled small text-muted mb-3">
                <li><i class="bi bi-check2 text-success me-1"></i> Air & Bone Conduction</li>
                <li><i class="bi bi-check2 text-success me-1"></i> Sound-Treated Booth</li>
                <li><i class="bi bi-check2 text-success me-1"></i> Doctor Verified Report</li>
              </ul>
            </div>
            <div>
              <div class="d-flex justify-content-between align-items-baseline mb-3 border-top pt-2">
                <span class="fw-bold text-navy fs-4">₹1,200</span>
                <span class="badge bg-light text-muted border">30 Mins</span>
              </div>
              <div class="d-grid gap-2">
                <button class="tm-btn tm-btn-primary tm-btn-sm" onclick="Cart.addItem({id:'diag-pta', name:'PTA Pure Tone Audiometry', brand:'Turtle Maarks', price:1200, type:'Diagnostic Test', image:'assets/images/services/pta.webp'})">
                  <i class="bi bi-cart-plus"></i> Add to Cart
                </button>
                <a href="book-appointment.php" class="tm-btn tm-btn-outline-navy tm-btn-sm">Book Appointment</a>
              </div>
            </div>
          </div>
        </div>

        <!-- Tymp -->
        <div class="col" id="tympanometry">
          <div class="tm-diag-card">
            <div>
              <div class="tm-diag-icon"><i class="bi bi-activity"></i></div>
              <h5 class="fw-bold text-navy mb-1">Tymp (Tympanometry)</h5>
              <p class="text-secondary small mb-3">Objective assessment of middle ear pressure, eardrum mobility, and Eustachian tube function.</p>
              <ul class="list-unstyled small text-muted mb-3">
                <li><i class="bi bi-check2 text-success me-1"></i> Middle Ear Pressure</li>
                <li><i class="bi bi-check2 text-success me-1"></i> Fluid/Infection Check</li>
                <li><i class="bi bi-check2 text-success me-1"></i> Instant 5-Min Result</li>
              </ul>
            </div>
            <div>
              <div class="d-flex justify-content-between align-items-baseline mb-3 border-top pt-2">
                <span class="fw-bold text-navy fs-4">₹800</span>
                <span class="badge bg-light text-muted border">15 Mins</span>
              </div>
              <div class="d-grid gap-2">
                <button class="tm-btn tm-btn-primary tm-btn-sm" onclick="Cart.addItem({id:'diag-tymp', name:'Tympanometry (Tymp)', brand:'Turtle Maarks', price:800, type:'Diagnostic Test', image:'assets/images/services/tymp.webp'})">
                  <i class="bi bi-cart-plus"></i> Add to Cart
                </button>
                <a href="book-appointment.php" class="tm-btn tm-btn-outline-navy tm-btn-sm">Book Appointment</a>
              </div>
            </div>
          </div>
        </div>

        <!-- BERA -->
        <div class="col" id="bera">
          <div class="tm-diag-card">
            <div>
              <div class="tm-diag-icon"><i class="bi bi-cpu"></i></div>
              <h5 class="fw-bold text-navy mb-1">BERA (Brain Evoked Response Audiometry)</h5>
              <p class="text-secondary small mb-3">Brainstem evoked response audiometry for objective neural thresholds and pediatric screening.</p>
              <ul class="list-unstyled small text-muted mb-3">
                <li><i class="bi bi-check2 text-success me-1"></i> Objective Electrophysiology</li>
                <li><i class="bi bi-check2 text-success me-1"></i> Ideal for Infants & Toddlers</li>
                <li><i class="bi bi-check2 text-success me-1"></i> Neurological Pathway Map</li>
              </ul>
            </div>
            <div>
              <div class="d-flex justify-content-between align-items-baseline mb-3 border-top pt-2">
                <span class="fw-bold text-navy fs-4">₹3,500</span>
                <span class="badge bg-light text-muted border">60 Mins</span>
              </div>
              <div class="d-grid gap-2">
                <button class="tm-btn tm-btn-primary tm-btn-sm" onclick="Cart.addItem({id:'diag-bera', name:'BERA Brainstem Evoked Response', brand:'Turtle Maarks', price:3500, type:'Diagnostic Test', image:'assets/images/services/bera.webp'})">
                  <i class="bi bi-cart-plus"></i> Add to Cart
                </button>
                <a href="book-appointment.php" class="tm-btn tm-btn-outline-navy tm-btn-sm">Book Appointment</a>
              </div>
            </div>
          </div>
        </div>

        <!-- OAE -->
        <div class="col" id="oae">
          <div class="tm-diag-card">
            <div>
              <div class="tm-diag-icon"><i class="bi bi-earbuds"></i></div>
              <h5 class="fw-bold text-navy mb-1">OAE (Oto Acoustic Emission)</h5>
              <p class="text-secondary small mb-3">Evaluates cochlear outer hair-cell function inside the inner ear. Painless universal screening.</p>
              <ul class="list-unstyled small text-muted mb-3">
                <li><i class="bi bi-check2 text-success me-1"></i> Inner Ear Cochlea Check</li>
                <li><i class="bi bi-check2 text-success me-1"></i> Newborn Hearing Screening</li>
                <li><i class="bi bi-check2 text-success me-1"></i> Quick & Painless</li>
              </ul>
            </div>
            <div>
              <div class="d-flex justify-content-between align-items-baseline mb-3 border-top pt-2">
                <span class="fw-bold text-navy fs-4">₹1,500</span>
                <span class="badge bg-light text-muted border">20 Mins</span>
              </div>
              <div class="d-grid gap-2">
                <button class="tm-btn tm-btn-primary tm-btn-sm" onclick="Cart.addItem({id:'diag-oae', name:'OAE Otoacoustic Emission', brand:'Turtle Maarks', price:1500, type:'Diagnostic Test', image:'assets/images/services/oae.webp'})">
                  <i class="bi bi-cart-plus"></i> Add to Cart
                </button>
                <a href="book-appointment.php" class="tm-btn tm-btn-outline-navy tm-btn-sm">Book Appointment</a>
              </div>
            </div>
        </div>

      </div>
    </div>
  </section>

<?php include __DIR__ . '/includes/footer.php'; ?>
