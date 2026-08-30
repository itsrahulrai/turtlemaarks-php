<?php
/**
 * HD Video Otoscopy Ear Canal & Eardrum Examination — Turtle Maarks
 */
$page_title       = 'HD Video Otoscopy Ear Canal & Eardrum Examination — Turtle Maarks';
$page_description = 'High-definition 1080p fiberoptic ear canal and tympanic membrane examination in Greater Noida West with live patient display screen.';
$active_nav       = 'services';
include __DIR__ . '/includes/header.php';
?>

  <!-- SERVICE HERO -->
  <section class="tm-service-hero">
    <div class="container">
      <!-- Unified Frosted Breadcrumb Pill -->
      <nav aria-label="breadcrumb" class="d-inline-flex mb-2">
        <div class="tm-breadcrumb-pill">
          <a href="<?= e(url('index.php')) ?>"><i class="bi bi-house-door"></i> Home</a>
          <span class="tm-breadcrumb-sep"><i class="bi bi-chevron-right"></i></span>
          <a href="<?= e(url('services.php')) ?>">Services</a>
          <span class="tm-breadcrumb-sep"><i class="bi bi-chevron-right"></i></span>
          <span class="tm-breadcrumb-current" aria-current="page">Video Otoscopy</span>
        </div>
      </nav>

      <div class="row align-items-center g-4">
        <div class="col-lg-8">
          <h1 class="display-6 fw-bold text-white mb-2 font-heading">HD Video Otoscopy Ear Canal &amp; Eardrum Exam</h1>
          <p class="text-white-50 mb-3" style="max-width: 680px;">See inside your own ear canal in real time. Our high-resolution medical fiberoptic otoscope inspects for impacted earwax, fungal infection, moisture, eardrum redness, and perforations.</p>
          <div class="d-flex flex-wrap gap-3 text-white-50 small">
            <div><i class="bi bi-clock-fill text-orange"></i> <strong>Duration:</strong> 15 Mins Quick Exam</div>
            <div><i class="bi bi-tag-fill text-orange"></i> <strong>Fee:</strong> ₹500 (Free with Hearing Aid Trials)</div>
            <div><i class="bi bi-display text-orange"></i> <strong>Output:</strong> 1080p Live Screen + Digital Report</div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- MAIN SERVICE CONTENT & BOOKING SIDEBAR -->
  <section class="py-5 bg-light">
    <div class="container">
      <div class="row g-4">
        
        <!-- Left: Clinical Content -->
        <div class="col-lg-8">
          
          <div class="card rounded-4 border p-4 bg-white shadow-xs mb-4">
            <h4 class="fw-bold text-navy mb-3">Live Visual Ear Canal Transparency</h4>
            <p class="text-secondary">Traditional handheld otoscopes only allow the doctor to look inside your ear. At <strong>Turtle Maarks Hearing Health</strong>, our video otoscope features an ultra-slim medical fiberoptic camera that transmits a live 1080p high-definition image to a large monitor right in front of you.</p>
            <p class="text-secondary mb-0">You and your family can clearly see the ear canal walls, whether wax is obstructing sound transmission, and verify that the tympanic membrane (eardrum) is intact and healthy.</p>
          </div>

          <!-- 3-Step Process -->
          <div class="card rounded-4 border p-4 bg-white shadow-xs mb-4">
            <h4 class="fw-bold text-navy mb-4">The 15-Minute Exam Experience</h4>
            
            <div class="tm-service-process-step">
              <div class="tm-service-step-num">1</div>
              <h6 class="fw-bold text-navy mb-1">Sanitized Micro-Speculum Placement</h6>
              <p class="small text-secondary mb-0">A single-use disposable soft tip is attached to the camera probe to ensure absolute clinical hygiene and zero discomfort.</p>
            </div>

            <div class="tm-service-process-step">
              <div class="tm-service-step-num">2</div>
              <h6 class="fw-bold text-navy mb-1">Live 1080p Screen Inspection</h6>
              <p class="small text-secondary mb-0">The doctor guides the probe down the ear canal while you watch on screen. We capture high-res snapshots for your medical records.</p>
            </div>

            <div class="tm-service-process-step">
              <div class="tm-service-step-num">3</div>
              <h6 class="fw-bold text-navy mb-1">Clinical Assessment & Next Steps</h6>
              <p class="small text-secondary mb-0">If impacted wax or foreign body is detected, we advise appropriate microsuction or proceed immediately to audiometric hearing tests.</p>
            </div>
          </div>

          <!-- Common Findings -->
          <div class="card rounded-4 border p-4 bg-white shadow-xs mb-4">
            <h4 class="fw-bold text-navy mb-3">Conditions Detected on Video Otoscopy</h4>
            <div class="row row-cols-1 row-cols-md-2 g-3">
              <div class="col">
                <div class="p-3 bg-light rounded-3 border h-100">
                  <h6 class="fw-bold text-navy mb-1"><i class="bi bi-shield-exclamation text-orange me-1"></i> Impacted Cerumen (Earwax)</h6>
                  <p class="small text-secondary mb-0">Dense wax plugs that can cause temporary 15-30 dB conductive hearing loss and ear fullness.</p>
                </div>
              </div>
              <div class="col">
                <div class="p-3 bg-light rounded-3 border h-100">
                  <h6 class="fw-bold text-navy mb-1"><i class="bi bi-bandaid text-orange me-1"></i> Tympanic Perforation (Eardrum Hole)</h6>
                  <p class="small text-secondary mb-0">Checking eardrum structural integrity before recommending hearing aid receiver types or water exposure.</p>
                </div>
              </div>
              <div class="col">
                <div class="p-3 bg-light rounded-3 border h-100">
                  <h6 class="fw-bold text-navy mb-1"><i class="bi bi-droplet text-orange me-1"></i> Otitis Externa & Infection</h6>
                  <p class="small text-secondary mb-0">Detecting canal swelling, fungus, or bacterial redness for timely ENT referral.</p>
                </div>
              </div>
              <div class="col">
                <div class="p-3 bg-light rounded-3 border h-100">
                  <h6 class="fw-bold text-navy mb-1"><i class="bi bi-check2-all text-orange me-1"></i> Hearing Aid Receiver Fit Verification</h6>
                  <p class="small text-secondary mb-0">Ensuring custom ear moulds or RIC domes seat deeply at the correct acoustic angle without touching sensitive canal bends.</p>
                </div>
              </div>
            </div>
          </div>

        </div>

        <!-- Right: Interactive Sticky Booking Card -->
        <div class="col-lg-4">
          <div class="tm-booking-sidebar-card">
            <div class="d-flex justify-content-between align-items-center mb-3">
              <h5 class="fw-bold text-navy mb-0">Book Otoscopy Slot</h5>
              <span class="badge bg-primary-subtle text-primary fw-bold">₹500 / Exam</span>
            </div>

            <form onsubmit="event.preventDefault(); showToast('Slot Booked!', 'Your HD Video Otoscopy slot has been confirmed.', 'success'); this.reset();">
              
              <div class="mb-3">
                <label class="form-label small fw-bold text-navy mb-1">1. Choose Date</label>
                <input type="date" class="form-control" required id="bookingDate">
              </div>

              <div class="mb-3">
                <label class="form-label small fw-bold text-navy mb-1">2. Choose Time Slot</label>
                <div class="tm-slot-grid">
                  <button type="button" class="tm-slot-btn active" onclick="selectSlotSidebar(this)">10:00 AM</button>
                  <button type="button" class="tm-slot-btn" onclick="selectSlotSidebar(this)">11:45 AM</button>
                  <button type="button" class="tm-slot-btn" onclick="selectSlotSidebar(this)">01:15 PM</button>
                  <button type="button" class="tm-slot-btn" onclick="selectSlotSidebar(this)">03:45 PM</button>
                  <button type="button" class="tm-slot-btn" onclick="selectSlotSidebar(this)">05:15 PM</button>
                  <button type="button" class="tm-slot-btn" onclick="selectSlotSidebar(this)">06:45 PM</button>
                </div>
              </div>

              <div class="mb-3">
                <label class="form-label small fw-bold text-navy mb-1">3. Patient Full Name</label>
                <input type="text" class="form-control" placeholder="Enter patient name" required>
              </div>

              <div class="mb-3">
                <label class="form-label small fw-bold text-navy mb-1">4. Mobile Number</label>
                <input type="tel" pattern="[0-9]{10}" class="form-control" placeholder="10-digit mobile number" required>
              </div>

              <div class="mb-3">
                <label class="form-label small fw-bold text-navy mb-1">5. Primary Symptom</label>
                <select class="form-select">
                  <option>Ear Blockage / Heavy Wax Feeling</option>
                  <option>Ear Pain / Itching / Moisture</option>
                  <option>Routine Checkup before Hearing Aid Fitting</option>
                  <option>Eardrum Status Verification</option>
                </select>
              </div>

              <button type="submit" class="tm-btn tm-btn-primary w-100 py-2 mb-3">
                <i class="bi bi-calendar2-check-fill"></i> Confirm Exam Slot
              </button>
            </form>

            <div class="border-top pt-3 text-center">
              <div class="small text-muted mb-2">Need immediate assistance?</div>
              <div class="d-flex gap-2">
                <a href="tel:+918130495476" class="tm-btn tm-btn-outline-navy w-100 tm-btn-sm"><i class="bi bi-telephone-fill"></i> Call Doctor</a>
                <a href="https://wa.me/918130495476" target="_blank" class="tm-btn tm-btn-outline-navy w-100 tm-btn-sm" style="color: #25D366; border-color: #25D366;"><i class="bi bi-whatsapp"></i> WhatsApp</a>
              </div>
            </div>

          </div>
        </div>

      </div>
    </div>
  </section>

  <script>
    function selectSlotSidebar(btn) {
      btn.parentElement.querySelectorAll('.tm-slot-btn').forEach(b => b.classList.remove('active'));
      btn.classList.add('active');
    }
    const today = new Date().toISOString().split('T')[0];
    const dateInput = document.getElementById('bookingDate');
    if (dateInput) {
      dateInput.value = today;
      dateInput.min = today;
    }
  </script>

<?php include __DIR__ . '/includes/footer.php'; ?>
