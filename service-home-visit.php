<?php
/**
 * Senior Citizen Free Doorstep Audiology & Hearing Test — Turtle Maarks
 */
$page_title       = 'Senior Citizen Free Doorstep Audiology & Hearing Test — Turtle Maarks';
$page_description = 'Free home visits for elderly citizens in Greater Noida West & Noida Extension with portable audiometry testing and doorstep hearing aid trials.';
$active_nav       = 'services';
include __DIR__ . '/includes/header.php';
?>

<div class="py-2 bg-white border-bottom small">
    <div class="container">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-0">
          <li class="breadcrumb-item"><a href="index.php" class="text-decoration-none text-muted">Home</a></li>
          <li class="breadcrumb-item"><a href="services.php" class="text-decoration-none text-muted">Services</a></li>
          <li class="breadcrumb-item active text-navy fw-bold" aria-current="page">Senior Citizen Home Visit</li>
        </ol>
      </nav>
    </div>
  </div>

  <!-- SERVICE HERO -->
  <section class="tm-service-hero">
    <div class="container">
      <div class="row align-items-center g-4">
        <div class="col-lg-8">
          <span class="tm-pill tm-pill-orange mb-2"><i class="bi bi-house-heart-fill"></i> Elderly Care Initiative</span>
          <h1 class="display-6 fw-bold text-white mb-2">Senior Citizen Free Doorstep Audiology Visit</h1>
          <p class="text-white-50 mb-3" style="max-width: 680px;">No need for elderly parents to travel in traffic. Our certified audiologist visits your residence with portable diagnostic audiometers, ear video otoscopes, and multi-brand trial hearing aids.</p>
          <div class="d-flex flex-wrap gap-3 text-white-50 small">
            <div><i class="bi bi-clock-fill text-orange"></i> <strong>Duration:</strong> 60 Mins Complete Visit</div>
            <div><i class="bi bi-geo-alt-fill text-orange"></i> <strong>Coverage:</strong> Gaur City, Greater Noida West & Noida</div>
            <div><i class="bi bi-check2-circle text-orange"></i> <strong>Fee:</strong> Free Clinical Home Visit</div>
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
            <h4 class="fw-bold text-navy mb-3">Healthcare That Comes to Your Living Room</h4>
            <p class="text-secondary">Mobility issues, joint pain, or busy schedules should never delay hearing health. <strong>Turtle Maarks Hearing Health</strong> operates a dedicated Mobile Audiology Unit equipped with medical-grade portable sound level analyzers and hearing test gear.</p>
            <p class="text-secondary mb-0">Our doctor conducts the full audiometric hearing test, inspects ear canal health, explains the audiogram graph to the family in plain Hindi/English, and fits trial digital devices on the spot.</p>
          </div>

          <!-- 4-Step Process -->
          <div class="card rounded-4 border p-4 bg-white shadow-xs mb-4">
            <h4 class="fw-bold text-navy mb-4">What Happens During the Home Visit?</h4>
            
            <div class="tm-service-process-step">
              <div class="tm-service-step-num">1</div>
              <h6 class="fw-bold text-navy mb-1">On-Time Doctor Arrival at Your Home</h6>
              <p class="small text-secondary mb-0">Our RCI audiologist arrives at your chosen slot with sanitized portable medical equipment.</p>
            </div>

            <div class="tm-service-process-step">
              <div class="tm-service-step-num">2</div>
              <h6 class="fw-bold text-navy mb-1">Video Otoscopy & Ear Canal Check</h6>
              <p class="small text-secondary mb-0">Visual inspection to rule out earwax blockage, moisture, or eardrum perforation.</p>
            </div>

            <div class="tm-service-process-step">
              <div class="tm-service-step-num">3</div>
              <h6 class="fw-bold text-navy mb-1">Portable Pure Tone Audiometry Test</h6>
              <p class="small text-secondary mb-0">Calibrated headphone testing in a quiet room of your house to chart the patient's frequency threshold.</p>
            </div>

            <div class="tm-service-process-step">
              <div class="tm-service-step-num">4</div>
              <h6 class="fw-bold text-navy mb-1">Instant Hearing Aid Fitting & Trial</h6>
              <p class="small text-secondary mb-0">The patient immediately tries Phonak, Oticon, or Signia devices and experiences instant conversational clarity.</p>
            </div>
          </div>

          <!-- Benefits -->
          <div class="card rounded-4 border p-4 bg-white shadow-xs mb-4">
            <h4 class="fw-bold text-navy mb-3">Why Families Trust Our Doorstep Care</h4>
            <ul class="list-unstyled d-flex flex-column gap-2 mb-0">
              <li class="d-flex align-items-start gap-2">
                <i class="bi bi-shield-check text-success fs-5"></i>
                <span class="small text-secondary"><strong>Zero Stress for Seniors:</strong> Comfortably seated in their familiar home environment without waiting in clinic lobbies.</span>
              </li>
              <li class="d-flex align-items-start gap-2">
                <i class="bi bi-shield-check text-success fs-5"></i>
                <span class="small text-secondary"><strong>Family Involvement:</strong> Children and spouses can directly observe the test, listen to the doctor's counsel, and learn how to handle batteries/chargers.</span>
              </li>
              <li class="d-flex align-items-start gap-2">
                <i class="bi bi-shield-check text-success fs-5"></i>
                <span class="small text-secondary"><strong>Full Post-Fitting Support:</strong> Lifetime tuning and filter changes also provided at home whenever needed.</span>
              </li>
            </ul>
          </div>

        </div>

        <!-- Right: Interactive Sticky Booking Card -->
        <div class="col-lg-4">
          <div class="tm-booking-sidebar-card">
            <div class="d-flex justify-content-between align-items-center mb-3">
              <h5 class="fw-bold text-navy mb-0">Request Home Visit</h5>
              <span class="badge bg-success-subtle text-success fw-bold">FREE VISIT</span>
            </div>

            <form onsubmit="event.preventDefault(); showToast('Home Visit Requested!', 'Our audiologist will call you to confirm your address and gate pass details.', 'success'); this.reset();">
              
              <div class="mb-3">
                <label class="form-label small fw-bold text-navy mb-1">1. Choose Date</label>
                <input type="date" class="form-control" required id="bookingDate">
              </div>

              <div class="mb-3">
                <label class="form-label small fw-bold text-navy mb-1">2. Choose Time Slot</label>
                <div class="tm-slot-grid" style="grid-template-columns: repeat(1, 1fr);">
                  <button type="button" class="tm-slot-btn active text-start px-3 py-2 mb-1" onclick="selectSlotSidebar(this)">
                    <i class="bi bi-sun text-orange me-1"></i> Morning: 11:00 AM - 01:00 PM
                  </button>
                  <button type="button" class="tm-slot-btn text-start px-3 py-2 mb-1" onclick="selectSlotSidebar(this)">
                    <i class="bi bi-cloud-sun text-orange me-1"></i> Afternoon: 03:00 PM - 05:00 PM
                  </button>
                  <button type="button" class="tm-slot-btn text-start px-3 py-2" onclick="selectSlotSidebar(this)">
                    <i class="bi bi-moon-stars text-orange me-1"></i> Evening: 05:30 PM - 07:30 PM
                  </button>
                </div>
              </div>

              <div class="mb-3">
                <label class="form-label small fw-bold text-navy mb-1">3. Senior Patient Name</label>
                <input type="text" class="form-control" placeholder="Patient name" required>
              </div>

              <div class="mb-3">
                <label class="form-label small fw-bold text-navy mb-1">4. Contact Phone Number</label>
                <input type="tel" pattern="[0-9]{10}" class="form-control" placeholder="10-digit mobile number" required>
              </div>

              <div class="mb-3">
                <label class="form-label small fw-bold text-navy mb-1">5. Society / Residence Address</label>
                <textarea class="form-control" rows="2" placeholder="e.g. Flat 802, Tower B, Gaur City 2, Greater Noida West" required></textarea>
              </div>

              <button type="submit" class="tm-btn tm-btn-primary w-100 py-2 mb-3">
                <i class="bi bi-house-door-fill"></i> Confirm Home Visit Slot
              </button>
            </form>

            <div class="border-top pt-3 text-center">
              <div class="small text-muted mb-2">Speak directly with our coordinator:</div>
              <div class="d-flex gap-2">
                <a href="tel:+918130495476" class="tm-btn tm-btn-outline-navy w-100 tm-btn-sm"><i class="bi bi-telephone-fill"></i> Call Helpline</a>
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
