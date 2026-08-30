<?php
/**
 * Clinical Services — Turtle Maarks Hearing Health
 */
$page_title       = 'Clinical Services — Turtle Maarks Hearing Health';
$page_description = 'Clinical audiology services in Greater Noida West: Hearing Aid Trials, Speech Therapy, Senior Home Visits, Ear Moulds, and Tinnitus Management.';
$active_nav       = 'services';
include __DIR__ . '/includes/header.php';
?>

  <!-- HERO BANNER -->
  <section class="tm-page-hero text-center position-relative">
    <div class="container">
      <nav aria-label="breadcrumb" class="d-inline-flex mb-2">
        <div class="tm-breadcrumb-pill">
          <a href="<?= e(url('index.php')) ?>"><i class="bi bi-house-door"></i> Home</a>
          <span class="tm-breadcrumb-sep"><i class="bi bi-chevron-right"></i></span>
          <span class="tm-breadcrumb-current" aria-current="page">Clinical Services</span>
        </div>
      </nav>
      <h1 class="display-6 fw-bold text-white mb-2 font-heading">Our Clinical Services &amp; Time Slots</h1>
      <p class="text-white-50 mx-auto small mb-0" style="max-width: 650px;">Choose a clinical audiology or speech rehabilitation service below and select your preferred consultation time slot for instant appointment confirmation.</p>
    </div>
  </section>

  <!-- SERVICES FILTER & LISTING -->
  <section class="py-5 bg-light">
    <div class="container">
      
      <!-- Quick Assurance Bar -->
      <div class="row g-3 mb-4">
        <div class="col-md-4">
          <div class="d-flex align-items-center gap-3 bg-white p-3 rounded-3 border">
            <div class="fs-3 text-orange"><i class="bi bi-clock-history"></i></div>
            <div>
              <div class="fw-bold text-navy small">Zero Waiting Time</div>
              <div class="text-muted" style="font-size: 0.75rem;">Guaranteed prompt entry at your chosen time slot.</div>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="d-flex align-items-center gap-3 bg-white p-3 rounded-3 border">
            <div class="fs-3 text-orange"><i class="bi bi-patch-check-fill"></i></div>
            <div>
              <div class="fw-bold text-navy small">RCI Audiologists</div>
              <div class="text-muted" style="font-size: 0.75rem;">Senior specialists with 10+ years hospital experience.</div>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="d-flex align-items-center gap-3 bg-white p-3 rounded-3 border">
            <div class="fs-3 text-orange"><i class="bi bi-house-heart-fill"></i></div>
            <div>
              <div class="fw-bold text-navy small">Doorstep Option</div>
              <div class="text-muted" style="font-size: 0.75rem;">Free home visits available for senior citizens in Noida.</div>
            </div>
          </div>
        </div>
      </div>

      <!-- Services Grid -->
      <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
        
        <!-- Service 1: Hearing Aid Trial & Fitting -->
        <div class="col">
          <div class="tm-service-card-premium">
            <div class="tm-service-card-img-wrap">
              <img src="assets/images/services/hearing-aid-clinic-in-noida-extension.png" alt="Hearing Aid Trial & Fitting">
              <span class="tm-service-card-badge"><i class="bi bi-clock"></i> 45 Mins</span>
              <span class="tm-service-card-price-badge">FREE TRIAL</span>
            </div>
            <div class="tm-service-card-body">
              <h5 class="fw-bold text-navy mb-1">Hearing Aid Trial & Fitting</h5>
              <p class="small text-secondary mb-3">7-day risk-free real-ear measurement (REM) trial with Phonak, Oticon, Signia, Widex & ReSound devices.</p>
              
              <ul class="list-unstyled small text-muted mb-3">
                <li><i class="bi bi-check2-circle text-success me-1"></i> Audiogram computerized mapping</li>
                <li><i class="bi bi-check2-circle text-success me-1"></i> Multi-brand comparison in clinic</li>
                <li><i class="bi bi-check2-circle text-success me-1"></i> 7-day home trial device issuance</li>
              </ul>

              <!-- Live Time Slot Selector -->
              <div class="tm-slot-picker-wrap">
                <div class="tm-slot-label">
                  <span><i class="bi bi-calendar2-check text-orange me-1"></i> Select Time Slot:</span>
                  <span class="badge bg-success-subtle text-success">Today / Tomorrow</span>
                </div>
                <div class="tm-slot-grid mb-3">
                  <button type="button" class="tm-slot-btn active" onclick="selectSlot(this, 'Hearing Aid Trial', '10:30 AM')">10:30 AM</button>
                  <button type="button" class="tm-slot-btn" onclick="selectSlot(this, 'Hearing Aid Trial', '12:00 PM')">12:00 PM</button>
                  <button type="button" class="tm-slot-btn" onclick="selectSlot(this, 'Hearing Aid Trial', '02:30 PM')">02:30 PM</button>
                  <button type="button" class="tm-slot-btn" onclick="selectSlot(this, 'Hearing Aid Trial', '04:30 PM')">04:30 PM</button>
                  <button type="button" class="tm-slot-btn" onclick="selectSlot(this, 'Hearing Aid Trial', '06:00 PM')">06:00 PM</button>
                  <button type="button" class="tm-slot-btn" onclick="selectSlot(this, 'Hearing Aid Trial', '07:00 PM')">07:00 PM</button>
                </div>
                <div class="d-grid gap-2">
                  <button class="tm-btn tm-btn-primary tm-btn-sm" onclick="openBookingModal('Hearing Aid Trial & Fitting', 'Free Consultation', '10:30 AM')">
                    <i class="bi bi-bookmark-check-fill"></i> Book This Slot
                  </button>
                  <a href="service-hearing-aid-trial.php" class="tm-btn tm-btn-outline-navy tm-btn-sm">
                    View Full Clinical Details <i class="bi bi-arrow-right"></i>
                  </a>
                </div>
              </div>

            </div>
          </div>
        </div>

        <!-- Service 2: Specialized Speech Therapy -->
        <div class="col">
          <div class="tm-service-card-premium">
            <div class="tm-service-card-img-wrap">
              <img src="assets/images/services/audiologist-in-gaur-city.png" alt="Specialized Speech Therapy">
              <span class="tm-service-card-badge"><i class="bi bi-clock"></i> 45 Mins</span>
              <span class="tm-service-card-price-badge">₹1,000 / Session</span>
            </div>
            <div class="tm-service-card-body">
              <h5 class="fw-bold text-navy mb-1">Specialized Speech Therapy</h5>
              <p class="small text-secondary mb-3">Custom pediatric and adult speech-language rehabilitation for speech delay, stammering, articulation & post-stroke recovery.</p>
              
              <ul class="list-unstyled small text-muted mb-3">
                <li><i class="bi bi-check2-circle text-success me-1"></i> Certified Speech-Language Pathologist</li>
                <li><i class="bi bi-check2-circle text-success me-1"></i> Child-friendly sensory therapy room</li>
                <li><i class="bi bi-check2-circle text-success me-1"></i> Monthly progress milestone tracking</li>
              </ul>

              <!-- Live Time Slot Selector -->
              <div class="tm-slot-picker-wrap">
                <div class="tm-slot-label">
                  <span><i class="bi bi-calendar2-check text-orange me-1"></i> Select Time Slot:</span>
                  <span class="badge bg-success-subtle text-success">Available</span>
                </div>
                <div class="tm-slot-grid mb-3">
                  <button type="button" class="tm-slot-btn active" onclick="selectSlot(this, 'Speech Therapy', '11:00 AM')">11:00 AM</button>
                  <button type="button" class="tm-slot-btn" onclick="selectSlot(this, 'Speech Therapy', '01:00 PM')">01:00 PM</button>
                  <button type="button" class="tm-slot-btn" onclick="selectSlot(this, 'Speech Therapy', '03:30 PM')">03:30 PM</button>
                  <button type="button" class="tm-slot-btn" onclick="selectSlot(this, 'Speech Therapy', '05:00 PM')">05:00 PM</button>
                  <button type="button" class="tm-slot-btn" onclick="selectSlot(this, 'Speech Therapy', '06:30 PM')">06:30 PM</button>
                  <button type="button" class="tm-slot-btn" onclick="selectSlot(this, 'Speech Therapy', '07:15 PM')">07:15 PM</button>
                </div>
                <div class="d-grid gap-2">
                  <button class="tm-btn tm-btn-primary tm-btn-sm" onclick="openBookingModal('Specialized Speech Therapy', '₹1,000 / Session', '11:00 AM')">
                    <i class="bi bi-bookmark-check-fill"></i> Book This Slot
                  </button>
                  <a href="service-speech-therapy.php" class="tm-btn tm-btn-outline-navy tm-btn-sm">
                    View Full Clinical Details <i class="bi bi-arrow-right"></i>
                  </a>
                </div>
              </div>

            </div>
          </div>
        </div>

        <!-- Service 3: Senior Citizen Home Visit -->
        <div class="col">
          <div class="tm-service-card-premium">
            <div class="tm-service-card-img-wrap">
              <img src="assets/images/services/hearing-test-in-noida-extension.png" alt="Senior Citizen Home Visit">
              <span class="tm-service-card-badge"><i class="bi bi-clock"></i> 60 Mins</span>
              <span class="tm-service-card-price-badge">FREE SERVICE</span>
            </div>
            <div class="tm-service-card-body">
              <h5 class="fw-bold text-navy mb-1">Senior Citizen Home Visit</h5>
              <p class="small text-secondary mb-3">Doorstep audiometric evaluation and hearing aid fitting across Greater Noida West, Gaur City & Noida for elderly citizens.</p>
              
              <ul class="list-unstyled small text-muted mb-3">
                <li><i class="bi bi-check2-circle text-success me-1"></i> Portable calibrated audiometer</li>
                <li><i class="bi bi-check2-circle text-success me-1"></i> Ear canal inspection & hearing test</li>
                <li><i class="bi bi-check2-circle text-success me-1"></i> No travel needed for elderly patients</li>
              </ul>

              <!-- Live Time Slot Selector -->
              <div class="tm-slot-picker-wrap">
                <div class="tm-slot-label">
                  <span><i class="bi bi-calendar2-check text-orange me-1"></i> Select Time Slot:</span>
                  <span class="badge bg-success-subtle text-success">Doorstep</span>
                </div>
                <div class="tm-slot-grid mb-3">
                  <button type="button" class="tm-slot-btn active" onclick="selectSlot(this, 'Senior Home Visit', '11:00 AM - 01:00 PM')">Morning</button>
                  <button type="button" class="tm-slot-btn" onclick="selectSlot(this, 'Senior Home Visit', '03:00 PM - 05:00 PM')">Afternoon</button>
                  <button type="button" class="tm-slot-btn" onclick="selectSlot(this, 'Senior Home Visit', '05:30 PM - 07:30 PM')">Evening</button>
                </div>
                <div class="d-grid gap-2">
                  <button class="tm-btn tm-btn-primary tm-btn-sm" onclick="openBookingModal('Senior Citizen Home Visit', 'Free Doorstep Service', '11:00 AM - 01:00 PM')">
                    <i class="bi bi-bookmark-check-fill"></i> Request Home Slot
                  </button>
                  <a href="service-home-visit.php" class="tm-btn tm-btn-outline-navy tm-btn-sm">
                    View Full Clinical Details <i class="bi bi-arrow-right"></i>
                  </a>
                </div>
              </div>

            </div>
          </div>
        </div>

        <!-- Service 4: Custom Silicone Ear Moulds -->
        <div class="col">
          <div class="tm-service-card-premium">
            <div class="tm-service-card-img-wrap">
              <img src="assets/images/services/horizon-hearing-aid-clinic-in-noida-extension.png" alt="Custom Silicone Ear Moulds">
              <span class="tm-service-card-badge"><i class="bi bi-clock"></i> 20 Mins</span>
              <span class="tm-service-card-price-badge">₹900 / Mould</span>
            </div>
            <div class="tm-service-card-body">
              <h5 class="fw-bold text-navy mb-1">Custom Silicone Ear Moulds</h5>
              <p class="small text-secondary mb-3">Precision 3D silicone ear impressions for BTE hearing aids, noise protection, musicians' in-ear monitors & swimming earplugs.</p>
              
              <ul class="list-unstyled small text-muted mb-3">
                <li><i class="bi bi-check2-circle text-success me-1"></i> Medical-grade hypoallergenic silicone</li>
                <li><i class="bi bi-check2-circle text-success me-1"></i> Custom anatomical ear contouring</li>
                <li><i class="bi bi-check2-circle text-success me-1"></i> Acoustic feedback prevention seal</li>
              </ul>

              <!-- Live Time Slot Selector -->
              <div class="tm-slot-picker-wrap">
                <div class="tm-slot-label">
                  <span><i class="bi bi-calendar2-check text-orange me-1"></i> Select Time Slot:</span>
                  <span class="badge bg-success-subtle text-success">Quick Fit</span>
                </div>
                <div class="tm-slot-grid mb-3">
                  <button type="button" class="tm-slot-btn active" onclick="selectSlot(this, 'Ear Mould Impression', '10:00 AM')">10:00 AM</button>
                  <button type="button" class="tm-slot-btn" onclick="selectSlot(this, 'Ear Mould Impression', '12:30 PM')">12:30 PM</button>
                  <button type="button" class="tm-slot-btn" onclick="selectSlot(this, 'Ear Mould Impression', '03:00 PM')">03:00 PM</button>
                  <button type="button" class="tm-slot-btn" onclick="selectSlot(this, 'Ear Mould Impression', '05:30 PM')">05:30 PM</button>
                  <button type="button" class="tm-slot-btn" onclick="selectSlot(this, 'Ear Mould Impression', '06:45 PM')">06:45 PM</button>
                </div>
                <div class="d-grid gap-2">
                  <button class="tm-btn tm-btn-primary tm-btn-sm" onclick="openBookingModal('Custom Silicone Ear Moulds', '₹900 / Mould', '10:00 AM')">
                    <i class="bi bi-bookmark-check-fill"></i> Book This Slot
                  </button>
                  <a href="service-ear-moulds.php" class="tm-btn tm-btn-outline-navy tm-btn-sm">
                    View Full Clinical Details <i class="bi bi-arrow-right"></i>
                  </a>
                </div>
              </div>

            </div>
          </div>
        </div>

        <!-- Service 5: Tinnitus Masking Therapy -->
        <div class="col">
          <div class="tm-service-card-premium">
            <div class="tm-service-card-img-wrap">
              <img src="assets/images/services/widex-hearing-aid-clinic-in-noida-extension.png" alt="Tinnitus Masking Therapy">
              <span class="tm-service-card-badge"><i class="bi bi-clock"></i> 45 Mins</span>
              <span class="tm-service-card-price-badge">₹1,500 / Session</span>
            </div>
            <div class="tm-service-card-body">
              <h5 class="fw-bold text-navy mb-1">Tinnitus Retraining & Masking</h5>
              <p class="small text-secondary mb-3">Specialized sound therapy, acoustic pitch-matching, and habituation counseling to soothe chronic ringing, buzzing, or humming in ears.</p>
              
              <ul class="list-unstyled small text-muted mb-3">
                <li><i class="bi bi-check2-circle text-success me-1"></i> Tinnitus frequency & loudness match</li>
                <li><i class="bi bi-check2-circle text-success me-1"></i> Notch therapy sound programming</li>
                <li><i class="bi bi-check2-circle text-success me-1"></i> Auditory relaxation protocols</li>
              </ul>

              <!-- Live Time Slot Selector -->
              <div class="tm-slot-picker-wrap">
                <div class="tm-slot-label">
                  <span><i class="bi bi-calendar2-check text-orange me-1"></i> Select Time Slot:</span>
                  <span class="badge bg-success-subtle text-success">Audiology</span>
                </div>
                <div class="tm-slot-grid mb-3">
                  <button type="button" class="tm-slot-btn active" onclick="selectSlot(this, 'Tinnitus Therapy', '11:30 AM')">11:30 AM</button>
                  <button type="button" class="tm-slot-btn" onclick="selectSlot(this, 'Tinnitus Therapy', '02:00 PM')">02:00 PM</button>
                  <button type="button" class="tm-slot-btn" onclick="selectSlot(this, 'Tinnitus Therapy', '04:00 PM')">04:00 PM</button>
                  <button type="button" class="tm-slot-btn" onclick="selectSlot(this, 'Tinnitus Therapy', '06:30 PM')">06:30 PM</button>
                </div>
                <div class="d-grid gap-2">
                  <button class="tm-btn tm-btn-primary tm-btn-sm" onclick="openBookingModal('Tinnitus Retraining Therapy', '₹1,500 / Session', '11:30 AM')">
                    <i class="bi bi-bookmark-check-fill"></i> Book This Slot
                  </button>
                  <a href="service-tinnitus-therapy.php" class="tm-btn tm-btn-outline-navy tm-btn-sm">
                    View Full Clinical Details <i class="bi bi-arrow-right"></i>
                  </a>
                </div>
              </div>

            </div>
          </div>
        </div>

        <!-- Service 6: Video Otoscopy Ear Exam -->
        <div class="col">
          <div class="tm-service-card-premium">
            <div class="tm-service-card-img-wrap">
              <img src="assets/images/services/oticon-hearing-aid-clinic-in-noida-extension.png" alt="Video Otoscopy Ear Exam">
              <span class="tm-service-card-badge"><i class="bi bi-clock"></i> 15 Mins</span>
              <span class="tm-service-card-price-badge">₹500 / Exam</span>
            </div>
            <div class="tm-service-card-body">
              <h5 class="fw-bold text-navy mb-1">HD Video Otoscopy Exam</h5>
              <p class="small text-secondary mb-3">High-resolution fiberoptic examination of the ear canal and tympanic membrane (eardrum) projected live onto an HD patient display.</p>
              
              <ul class="list-unstyled small text-muted mb-3">
                <li><i class="bi bi-check2-circle text-success me-1"></i> Live 1080p fiberoptic ear inspection</li>
                <li><i class="bi bi-check2-circle text-success me-1"></i> Wax buildup & perforation check</li>
                <li><i class="bi bi-check2-circle text-success me-1"></i> High-definition digital snapshots</li>
              </ul>

              <!-- Live Time Slot Selector -->
              <div class="tm-slot-picker-wrap">
                <div class="tm-slot-label">
                  <span><i class="bi bi-calendar2-check text-orange me-1"></i> Select Time Slot:</span>
                  <span class="badge bg-success-subtle text-success">Fast Track</span>
                </div>
                <div class="tm-slot-grid mb-3">
                  <button type="button" class="tm-slot-btn active" onclick="selectSlot(this, 'Video Otoscopy', '10:00 AM')">10:00 AM</button>
                  <button type="button" class="tm-slot-btn" onclick="selectSlot(this, 'Video Otoscopy', '11:45 AM')">11:45 AM</button>
                  <button type="button" class="tm-slot-btn" onclick="selectSlot(this, 'Video Otoscopy', '01:15 PM')">01:15 PM</button>
                  <button type="button" class="tm-slot-btn" onclick="selectSlot(this, 'Video Otoscopy', '03:45 PM')">03:45 PM</button>
                  <button type="button" class="tm-slot-btn" onclick="selectSlot(this, 'Video Otoscopy', '05:15 PM')">05:15 PM</button>
                  <button type="button" class="tm-slot-btn" onclick="selectSlot(this, 'Video Otoscopy', '06:45 PM')">06:45 PM</button>
                </div>
                <div class="d-grid gap-2">
                  <button class="tm-btn tm-btn-primary tm-btn-sm" onclick="openBookingModal('HD Video Otoscopy Exam', '₹500', '10:00 AM')">
                    <i class="bi bi-bookmark-check-fill"></i> Book This Slot
                  </button>
                  <a href="service-video-otoscopy.php" class="tm-btn tm-btn-outline-navy tm-btn-sm">
                    View Full Clinical Details <i class="bi bi-arrow-right"></i>
                  </a>
                </div>
              </div>

            </div>
          </div>
        </div>

      </div>
    </div>
  </section>

  <!-- INSTANT TIME-SLOT BOOKING MODAL -->
  <div class="modal fade" id="tmServiceSlotModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content rounded-4 border-0 shadow-lg">
        <div class="modal-header bg-navy text-white border-0 py-3">
          <div>
            <h6 class="modal-title fw-bold text-white mb-0" id="modalServiceTitle">Book Clinical Service</h6>
            <span class="small text-white-50" id="modalServicePrice">Free Consultation</span>
          </div>
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body p-4">
          <form onsubmit="handleSlotBooking(event)">
            <div class="mb-3">
              <label class="form-label small fw-bold text-navy mb-1">Selected Time Slot</label>
              <div class="input-group">
                <span class="input-group-text bg-light"><i class="bi bi-clock-fill text-orange"></i></span>
                <input type="text" id="modalSlotInput" class="form-control fw-bold text-navy" readonly>
              </div>
            </div>

            <div class="mb-3">
              <label class="form-label small fw-bold text-navy mb-1">Preferred Date</label>
              <input type="date" id="modalDateInput" class="form-control" required>
            </div>

            <div class="mb-3">
              <label class="form-label small fw-bold text-navy mb-1">Patient Full Name</label>
              <input type="text" class="form-control" placeholder="Enter patient name" required>
            </div>

            <div class="mb-3">
              <label class="form-label small fw-bold text-navy mb-1">10-Digit Mobile Number</label>
              <input type="tel" pattern="[0-9]{10}" class="form-control" placeholder="e.g. 9876543210" required>
            </div>

            <div class="mb-4">
              <label class="form-label small fw-bold text-navy mb-1">Preferred Clinic / Visit Option</label>
              <select class="form-select">
                <option selected>Greater Noida West Clinic (Gaur City)</option>
                <option>Senior Citizen Home Visit (Doorstep)</option>
              </select>
            </div>

            <button type="submit" class="tm-btn tm-btn-primary w-100 py-2">
              <i class="bi bi-check-circle-fill"></i> Confirm Appointment Slot
            </button>
          </form>
        </div>
      </div>
    </div>
  </div>

  <script>
    function selectSlot(btn, service, slot) {
      const parent = btn.closest('.tm-slot-grid');
      parent.querySelectorAll('.tm-slot-btn').forEach(b => b.classList.remove('active'));
      btn.classList.add('active');
    }

    function openBookingModal(serviceName, price, slot) {
      document.getElementById('modalServiceTitle').textContent = serviceName;
      document.getElementById('modalServicePrice').textContent = price;
      document.getElementById('modalSlotInput').value = slot;
      
      // Default to today
      const today = new Date().toISOString().split('T')[0];
      document.getElementById('modalDateInput').value = today;
      document.getElementById('modalDateInput').min = today;

      const modal = new bootstrap.Modal(document.getElementById('tmServiceSlotModal'));
      modal.show();
    }

    function handleSlotBooking(e) {
      e.preventDefault();
      const service = document.getElementById('modalServiceTitle').textContent;
      const slot = document.getElementById('modalSlotInput').value;
      const modalEl = document.getElementById('tmServiceSlotModal');
      const modal = bootstrap.Modal.getInstance(modalEl);
      modal.hide();

      showToast('Appointment Confirmed!', `Your slot for ${service} at ${slot} has been reserved. Our doctor will call you shortly.`, 'success');
      e.target.reset();
    }
  </script>

<?php include __DIR__ . '/includes/footer.php'; ?>
