<?php
/**
 * Turtle Maarks Hearing Health — Modern Hearing Aids & Audiology Clinic
 */
$page_title       = 'Turtle Maarks Hearing Health — Modern Hearing Aids & Audiology Clinic';
$page_description = 'Authorized clinic for Phonak, Oticon, ReSound, Signia, Starkey, Widex digital hearing aids & sound-booth diagnostic hearing tests in Greater Noida West & Noida.';
$active_nav       = 'home';
$page_js          = ['assets/js/appointment.js'];
include __DIR__ . '/includes/header.php';
?>

  <!-- ============ FULL-WIDTH HERO IMAGE BANNER ============ -->
  <section class="tm-hero-image-banner p-0 m-0 w-100">
    <a href="book-appointment.php" class="d-block w-100" title="Book Hearing Health Consultation">
      <img src="assets/images/banners/b7.png" alt="Turtle Maarks Hearing Health — Authorized Clinic for Phonak, Oticon, ReSound, Signia, Starkey, Widex" class="w-100 d-block tm-hero-banner-img">
    </a>
  </section>

    <!-- =========================================================================
       4-STEP APPOINTMENT BOOKING SECTION (INTERACTIVE SCHEDULER)
       ========================================================================= -->
  <section class="py-5 tm-home-booking-section border-top border-bottom" id="bookAppointmentSection">
    <div class="container">
      
      <!-- Section Header -->
      <div class="text-center max-w-700 mx-auto mb-4">
        <span class="tm-pill tm-pill-orange mb-2"><i class="bi bi-calendar2-check-fill"></i> Instant Doctor Slot Reservation</span>
        <h2 class="tm-section-title mb-1">Book Your <span>Appointment</span></h2>
        <p class="tm-section-sub mb-0">Follow our quick 4-step booking wizard to reserve your in-clinic consultation or doorstep senior home visit.</p>
      </div>

      <div class="row justify-content-center">
        <div class="col-xl-11">
          <div class="tm-booking-card-main">
            
            <!-- Top Stepper Navigation Bar -->
            <div class="tm-booking-stepper-bar">
              <div class="tm-booking-step-tab active" onclick="HomeBookingWizard.goToStep(1)">
                <span class="tm-step-badge">1</span>
                <span class="fw-bold small">1. Select Service</span>
              </div>
              <div class="text-white-50 small d-none d-sm-block"><i class="bi bi-chevron-right"></i></div>
              <div class="tm-booking-step-tab" onclick="HomeBookingWizard.goToStep(2)">
                <span class="tm-step-badge">2</span>
                <span class="fw-bold small">2. Select Location</span>
              </div>
              <div class="text-white-50 small d-none d-sm-block"><i class="bi bi-chevron-right"></i></div>
              <div class="tm-booking-step-tab" onclick="HomeBookingWizard.goToStep(3)">
                <span class="tm-step-badge">3</span>
                <span class="fw-bold small">3. Select Audiologist</span>
              </div>
              <div class="text-white-50 small d-none d-sm-block"><i class="bi bi-chevron-right"></i></div>
              <div class="tm-booking-step-tab" onclick="HomeBookingWizard.goToStep(4)">
                <span class="tm-step-badge">4</span>
                <span class="fw-bold small">4. Date & Time</span>
              </div>
            </div>

            <!-- Card Body Content: Left Step Forms (Col-lg-8) + Right Live Summary (Col-lg-4) -->
            <div class="row g-0">
              <div class="col-lg-8 p-4 p-md-5">
                
                <!-- STEP 1: SELECT SERVICE -->
                <div id="tmBookingStepPane1" class="tm-booking-step-pane">
                  <div class="d-flex justify-content-between align-items-center mb-1">
                    <h5 class="fw-bold text-navy mb-0">Step 1: Select Service</h5>
                    <span class="badge bg-orange-subtle text-orange small">Step 1 of 4</span>
                  </div>
                  <p class="text-secondary small mb-4">Choose from hearing evaluations, trials, consultations, therapy, or servicing.</p>

                  <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3 mb-4">
                    <!-- Service 1: Hearing Test -->
                    <div class="col">
                      <div class="tm-booking-option-card tm-booking-service-card selected" data-service-title="Hearing Test" data-service-desc="PTA, Tympanometry & Sound-Booth Diagnostics">
                        <span class="tm-booking-option-check"><i class="bi bi-check-lg"></i></span>
                        <div class="tm-booking-opt-icon"><i class="bi bi-soundwave"></i></div>
                        <h6 class="fw-bold text-navy mb-1">Hearing Test</h6>
                        <p class="text-secondary small mb-0">PTA & Tymp diagnostic sound-booth evaluation</p>
                      </div>
                    </div>

                    <!-- Service 2: Audiologist Consultation -->
                    <div class="col">
                      <div class="tm-booking-option-card tm-booking-service-card" data-service-title="Audiologist Consultation" data-service-desc="Clinical Audiological Advice & Audiogram Review">
                        <span class="tm-booking-option-check"><i class="bi bi-check-lg"></i></span>
                        <div class="tm-booking-opt-icon"><i class="bi bi-person-badge-fill"></i></div>
                        <h6 class="fw-bold text-navy mb-1">Audiologist Consultation</h6>
                        <p class="text-secondary small mb-0">Clinical advice & personalized hearing counsel</p>
                      </div>
                    </div>

                    <!-- Service 3: Speech Therapy -->
                    <div class="col">
                      <div class="tm-booking-option-card tm-booking-service-card" data-service-title="Speech Therapy" data-service-desc="Speech Pathology for Kids & Adults">
                        <span class="tm-booking-option-check"><i class="bi bi-check-lg"></i></span>
                        <div class="tm-booking-opt-icon"><i class="bi bi-chat-heart-fill"></i></div>
                        <h6 class="fw-bold text-navy mb-1">Speech Therapy</h6>
                        <p class="text-secondary small mb-0">Pediatric speech delay & adult speech recovery</p>
                      </div>
                    </div>

                    <!-- Service 4: Hearing Aid Trial -->
                    <div class="col">
                      <div class="tm-booking-option-card tm-booking-service-card" data-service-title="Hearing Aid Trial" data-service-desc="7-Day Free Trial of Digital Hearing Aids">
                        <span class="tm-booking-option-check"><i class="bi bi-check-lg"></i></span>
                        <div class="tm-booking-opt-icon"><i class="bi bi-earbuds"></i></div>
                        <h6 class="fw-bold text-navy mb-1">Hearing Aid Trial</h6>
                        <p class="text-secondary small mb-0">7-day free digital trial with Phonak, Oticon & Widex</p>
                      </div>
                    </div>

                    <!-- Service 5: Repair -->
                    <div class="col">
                      <div class="tm-booking-option-card tm-booking-service-card" data-service-title="Repair & Servicing" data-service-desc="Cleaning, Moisture Removal, Recalibration & Parts">
                        <span class="tm-booking-option-check"><i class="bi bi-check-lg"></i></span>
                        <div class="tm-booking-opt-icon"><i class="bi bi-tools"></i></div>
                        <h6 class="fw-bold text-navy mb-1">Repair</h6>
                        <p class="text-secondary small mb-0">Ultrasonic cleaning, tuning & genuine spare parts</p>
                      </div>
                    </div>

                    <!-- Service 6: Home Visit -->
                    <div class="col">
                      <div class="tm-booking-option-card tm-booking-service-card" data-service-title="Home Visit" data-service-desc="Doorstep Audiology for Seniors & Elderly">
                        <span class="tm-booking-option-check"><i class="bi bi-check-lg"></i></span>
                        <div class="tm-booking-opt-icon"><i class="bi bi-house-door-fill"></i></div>
                        <h6 class="fw-bold text-navy mb-1">Home Visit</h6>
                        <p class="text-secondary small mb-0">Doorstep audiologist visit for senior citizens</p>
                      </div>
                    </div>
                  </div>

                  <div class="d-flex justify-content-end">
                    <button type="button" class="tm-btn tm-btn-primary px-4" onclick="HomeBookingWizard.nextStep()">
                      Continue to Location <i class="bi bi-arrow-right ms-1"></i>
                    </button>
                  </div>
                </div>

                <!-- STEP 2: SELECT LOCATION -->
                <div id="tmBookingStepPane2" class="tm-booking-step-pane" style="display: none;">
                  <div class="d-flex justify-content-between align-items-center mb-1">
                    <h5 class="fw-bold text-navy mb-0">Step 2: Select Location</h5>
                    <span class="badge bg-orange-subtle text-orange small">Step 2 of 4</span>
                  </div>
                  <p class="text-secondary small mb-4">Choose in-clinic sound-booth testing or a convenient doorstep home visit.</p>

                  <div class="row g-3 mb-4">
                    <!-- Location 1: Clinic -->
                    <div class="col-md-6">
                      <div class="tm-booking-option-card tm-booking-location-card selected" data-location-title="Clinic Visit (Gaur City Centre)" data-location-type="clinic">
                        <span class="tm-booking-option-check"><i class="bi bi-check-lg"></i></span>
                        <div class="tm-booking-opt-icon"><i class="bi bi-building"></i></div>
                        <h6 class="fw-bold text-navy mb-1">Clinic Visit</h6>
                        <p class="text-secondary small mb-2">Turtle Maarks Hearing Centre, Gaur City, Greater Noida West</p>
                        <div class="small text-muted mb-1"><i class="bi bi-check-circle-fill text-success me-1"></i> Calibrated Sound-Treated Booth</div>
                        <div class="small text-muted"><i class="bi bi-check-circle-fill text-success me-1"></i> Full Range of 50+ Trial Hearing Aids</div>
                      </div>
                    </div>

                    <!-- Location 2: Home Visit -->
                    <div class="col-md-6">
                      <div class="tm-booking-option-card tm-booking-location-card" data-location-title="Home Visit (Greater Noida West & Noida)" data-location-type="home">
                        <span class="tm-booking-option-check"><i class="bi bi-check-lg"></i></span>
                        <div class="tm-booking-opt-icon"><i class="bi bi-house-heart-fill"></i></div>
                        <h6 class="fw-bold text-navy mb-1">Home Visit</h6>
                        <p class="text-secondary small mb-2">Doorstep audiologist visit across Greater Noida West & Noida</p>
                        <div class="small text-muted mb-1"><i class="bi bi-check-circle-fill text-success me-1"></i> Portable Calibrated Audiometry Kit</div>
                        <div class="small text-muted"><i class="bi bi-check-circle-fill text-success me-1"></i> 100% Free for Senior Citizens</div>
                      </div>
                    </div>
                  </div>

                  <div class="d-flex justify-content-between">
                    <button type="button" class="tm-btn tm-btn-outline-navy px-4" onclick="HomeBookingWizard.prevStep()">
                      <i class="bi bi-arrow-left me-1"></i> Back
                    </button>
                    <button type="button" class="tm-btn tm-btn-primary px-4" onclick="HomeBookingWizard.nextStep()">
                      Continue to Audiologist <i class="bi bi-arrow-right ms-1"></i>
                    </button>
                  </div>
                </div>

                <!-- STEP 3: SELECT AUDIOLOGIST -->
                <div id="tmBookingStepPane3" class="tm-booking-step-pane" style="display: none;">
                  <div class="d-flex justify-content-between align-items-center mb-1">
                    <h5 class="fw-bold text-navy mb-0">Step 3: Select Audiologist</h5>
                    <span class="badge bg-orange-subtle text-orange small">Step 3 of 4</span>
                  </div>
                  <p class="text-secondary small mb-4">Choose an RCI-registered audiologist or select any available clinician for the fastest slot.</p>

                  <div class="row g-3 mb-4">
                    <!-- Doctor 1: Any Available -->
                    <div class="col-md-6">
                      <div class="tm-booking-option-card tm-booking-doctor-card selected" data-doctor-name="Any Available Senior Audiologist">
                        <span class="tm-booking-option-check"><i class="bi bi-check-lg"></i></span>
                        <div class="d-flex align-items-center gap-3 mb-2">
                          <div class="tm-booking-opt-icon mb-0"><i class="bi bi-lightning-charge-fill text-warning"></i></div>
                          <div>
                            <h6 class="fw-bold text-navy mb-0">Any Available Audiologist</h6>
                            <span class="badge bg-success-subtle text-success small">Fastest Slot Booking</span>
                          </div>
                        </div>
                        <p class="text-secondary small mb-0">Allocates the earliest available RCI-certified senior clinician.</p>
                      </div>
                    </div>

                    <!-- Doctor 2: Dr. Ritu Verma -->
                    <div class="col-md-6">
                      <div class="tm-booking-option-card tm-booking-doctor-card" data-doctor-name="Dr. Ritu Verma, MASLP">
                        <span class="tm-booking-option-check"><i class="bi bi-check-lg"></i></span>
                        <div class="d-flex align-items-center gap-3 mb-2">
                          <img src="assets/images/about-us.jpg" alt="Dr. Ritu Verma" class="rounded-circle border" style="width: 44px; height: 44px; object-fit: cover;">
                          <div>
                            <h6 class="fw-bold text-navy mb-0">Dr. Ritu Verma, MASLP</h6>
                            <span class="small text-orange fw-bold">Senior Clinical Audiologist (14+ Yrs)</span>
                          </div>
                        </div>
                        <p class="text-secondary small mb-0">Adult audiology, Real-Ear Measurement & digital programming expert.</p>
                      </div>
                    </div>

                    <!-- Doctor 3: Dr. Saurabh Mishra -->
                    <div class="col-md-6">
                      <div class="tm-booking-option-card tm-booking-doctor-card" data-doctor-name="Dr. Saurabh Mishra, BASLP">
                        <span class="tm-booking-option-check"><i class="bi bi-check-lg"></i></span>
                        <div class="d-flex align-items-center gap-3 mb-2">
                          <img src="assets/images/team/team-02.webp" alt="Dr. Saurabh Mishra" class="rounded-circle border" style="width: 44px; height: 44px; object-fit: cover;">
                          <div>
                            <h6 class="fw-bold text-navy mb-0">Dr. Saurabh Mishra, BASLP</h6>
                            <span class="small text-orange fw-bold">Pediatric & Electrophysiology (10+ Yrs)</span>
                          </div>
                        </div>
                        <p class="text-secondary small mb-0">BERA/ABR, OAE testing & pediatric hearing assessment specialist.</p>
                      </div>
                    </div>

                    <!-- Doctor 4: Dr. Meenakshi Sundaram -->
                    <div class="col-md-6">
                      <div class="tm-booking-option-card tm-booking-doctor-card" data-doctor-name="Dr. Meenakshi Sundaram, MASLP">
                        <span class="tm-booking-option-check"><i class="bi bi-check-lg"></i></span>
                        <div class="d-flex align-items-center gap-3 mb-2">
                          <img src="assets/images/ear-model.jpg" alt="Dr. Meenakshi Sundaram" class="rounded-circle border" style="width: 44px; height: 44px; object-fit: cover;">
                          <div>
                            <h6 class="fw-bold text-navy mb-0">Dr. Meenakshi Sundaram, MASLP</h6>
                            <span class="small text-orange fw-bold">Speech-Language Pathologist (12+ Yrs)</span>
                          </div>
                        </div>
                        <p class="text-secondary small mb-0">Speech therapy, child language delay & tinnitus acoustic therapy.</p>
                      </div>
                    </div>
                  </div>

                  <div class="d-flex justify-content-between">
                    <button type="button" class="tm-btn tm-btn-outline-navy px-4" onclick="HomeBookingWizard.prevStep()">
                      <i class="bi bi-arrow-left me-1"></i> Back
                    </button>
                    <button type="button" class="tm-btn tm-btn-primary px-4" onclick="HomeBookingWizard.nextStep()">
                      Continue to Date & Time <i class="bi bi-arrow-right ms-1"></i>
                    </button>
                  </div>
                </div>

                <!-- STEP 4: SELECT DATE & TIME + PATIENT DETAILS -->
                <div id="tmBookingStepPane4" class="tm-booking-step-pane" style="display: none;">
                  <div class="d-flex justify-content-between align-items-center mb-1">
                    <h5 class="fw-bold text-navy mb-0">Step 4: Select Date & Time</h5>
                    <span class="badge bg-orange-subtle text-orange small">Step 4 of 4</span>
                  </div>
                  <p class="text-secondary small mb-3">Choose your slot and provide patient contact details for instant confirmation.</p>

                  <!-- Date Selector Strip -->
                  <label class="fw-bold text-navy small mb-2 d-block"><i class="bi bi-calendar-event text-orange me-1"></i> Select Date:</label>
                  <div id="tmHomeBookingDateStrip" class="d-flex gap-2 overflow-auto pb-2 mb-3">
                    <!-- Rendered dynamically by HomeBookingWizard.generateDatePills() -->
                  </div>

                  <!-- Time Slots -->
                  <label class="fw-bold text-navy small mb-2 d-block"><i class="bi bi-clock text-orange me-1"></i> Select Time Slot:</label>
                  <div class="row row-cols-2 row-cols-sm-4 g-2 mb-4">
                    <div class="col"><button type="button" class="w-100 tm-time-slot-btn tm-booking-time-btn selected" data-time-slot="10:00 AM - 11:00 AM">10:00 AM</button></div>
                    <div class="col"><button type="button" class="w-100 tm-time-slot-btn tm-booking-time-btn" data-time-slot="11:30 AM - 12:30 PM">11:30 AM</button></div>
                    <div class="col"><button type="button" class="w-100 tm-time-slot-btn tm-booking-time-btn" data-time-slot="12:30 PM - 01:30 PM">12:30 PM</button></div>
                    <div class="col"><button type="button" class="w-100 tm-time-slot-btn tm-booking-time-btn" data-time-slot="02:00 PM - 03:00 PM">02:00 PM</button></div>
                    <div class="col"><button type="button" class="w-100 tm-time-slot-btn tm-booking-time-btn" data-time-slot="03:30 PM - 04:30 PM">03:30 PM</button></div>
                    <div class="col"><button type="button" class="w-100 tm-time-slot-btn tm-booking-time-btn" data-time-slot="05:00 PM - 06:00 PM">05:00 PM</button></div>
                    <div class="col"><button type="button" class="w-100 tm-time-slot-btn tm-booking-time-btn" data-time-slot="06:30 PM - 07:30 PM">06:30 PM</button></div>
                    <div class="col"><button type="button" class="w-100 tm-time-slot-btn tm-booking-time-btn" data-time-slot="07:30 PM - 08:00 PM">07:30 PM</button></div>
                  </div>

                  <!-- Patient Information Fields -->
                  <div class="p-3 bg-light rounded-3 border mb-4">
                    <h6 class="fw-bold text-navy mb-2 small"><i class="bi bi-person-fill text-orange me-1"></i> Patient Contact Information:</h6>
                    <div class="row g-2">
                      <div class="col-md-6">
                        <label class="form-label small text-muted mb-1">Patient Full Name *</label>
                        <input type="text" id="tmHomePatientName" class="form-control form-control-sm" placeholder="e.g. Ramesh Sharma" required>
                      </div>
                      <div class="col-md-6">
                        <label class="form-label small text-muted mb-1">Mobile / WhatsApp Number *</label>
                        <input type="tel" id="tmHomePatientPhone" class="form-control form-control-sm" placeholder="e.g. 9876543210" required>
                      </div>
                      <div class="col-12">
                        <label class="form-label small text-muted mb-1">Special Notes / Symptoms (Optional)</label>
                        <input type="text" id="tmHomePatientNotes" class="form-control form-control-sm" placeholder="e.g. Tinnitus in left ear, senior citizen home visit requested...">
                      </div>
                    </div>
                  </div>

                  <div class="d-flex justify-content-between">
                    <button type="button" class="tm-btn tm-btn-outline-navy px-4" onclick="HomeBookingWizard.prevStep()">
                      <i class="bi bi-arrow-left me-1"></i> Back
                    </button>
                    <button type="button" class="tm-btn tm-btn-primary px-4 fw-bold" onclick="HomeBookingWizard.confirmAppointment()">
                      Confirm Appointment <i class="bi bi-check-circle-fill ms-1"></i>
                    </button>
                  </div>
                </div>

              </div>

              <!-- RIGHT: LIVE BOOKING SUMMARY PREVIEW (Col-lg-4) -->
              <div class="col-lg-4">
                <div class="tm-booking-summary-pane">
                  <div class="d-flex align-items-center gap-2 mb-3">
                    <i class="bi bi-clipboard2-check text-orange fs-5"></i>
                    <h6 class="fw-bold text-navy mb-0">Live Booking Summary</h6>
                  </div>

                  <div class="tm-summary-row">
                    <span class="text-muted">Service:</span>
                    <strong class="text-navy" id="tmLiveSummaryService">Hearing Test</strong>
                  </div>

                  <div class="tm-summary-row">
                    <span class="text-muted">Location:</span>
                    <strong class="text-navy text-end ps-2" id="tmLiveSummaryLocation">Clinic Visit</strong>
                  </div>

                  <div class="tm-summary-row">
                    <span class="text-muted">Audiologist:</span>
                    <strong class="text-navy text-end ps-2" id="tmLiveSummaryDoctor">Any Available</strong>
                  </div>

                  <div class="tm-summary-row">
                    <span class="text-muted">Date & Time:</span>
                    <strong class="text-orange text-end ps-2" id="tmLiveSummaryDateTime">Today • 10:00 AM</strong>
                  </div>

                  <div class="mt-4 p-3 bg-white rounded-3 border">
                    <div class="d-flex align-items-center gap-2 mb-2">
                      <i class="bi bi-patch-check-fill text-success fs-5"></i>
                      <span class="fw-bold text-navy small">Guaranteed Benefits</span>
                    </div>
                    <ul class="list-unstyled small text-secondary mb-0">
                      <li class="mb-1">✓ Zero waiting time at clinic</li>
                      <li class="mb-1">✓ Same-day audiometry diagnostic report</li>
                      <li class="mb-1">✓ 7-day free trial on recommended aids</li>
                      <li>✓ 100% Free home visit for senior citizens</li>
                    </ul>
                  </div>

                  <div class="mt-auto pt-4 text-center">
                    <div class="small text-muted mb-1">Need immediate doctor guidance?</div>
                    <a href="tel:+918130495476" class="text-navy fw-bold small text-decoration-none">
                      <i class="bi bi-telephone-fill text-orange me-1"></i> +91 8130495476
                    </a>
                  </div>

                </div>
              </div>

            </div>

          </div>
        </div>
      </div>

    </div>
  </section>


  <!-- 1. EXPLORE BY FORM FACTOR & CATEGORY -->
  <section class="py-5 bg-white">
    <div class="container">
      <div class="d-flex justify-content-between align-items-end tm-section-head mb-4">
        <div>
          <span class="tm-pill tm-pill-orange mb-2"><i class="bi bi-grid-fill"></i> Hearing Solutions by Form Factor</span>
          <h2 class="tm-section-title mb-1">Explore by <span>Category</span></h2>
          <p class="tm-section-sub mb-0">Choose by form factor, clinical invisibility, high-power output, or care essentials</p>
        </div>
        <a href="products.php" class="tm-btn tm-btn-outline-navy tm-btn-sm d-none d-sm-inline-flex">View All Models <i class="bi bi-arrow-right"></i></a>
      </div>

      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-6 g-3">
        <!-- RIC -->
        <div class="col">
          <a href="products.php?style=RIC" class="tm-cat-card-lux tm-cat-theme-orange">
            <span class="tm-cat-badge-top">Bestseller</span>
            <div class="tm-cat-media-lux">
              <img src="assets/images/hearing-aid/ric.webp" alt="RIC Receiver-in-Canal Hearing Aids" class="tm-cat-img-full">
            </div>
            <div class="tm-cat-content-lux">
              <h6 class="tm-cat-title-lux">RIC (Receiver-in-Canal)</h6>
              <p class="tm-cat-desc-lux">Natural open-fit acoustics, Bluetooth calling & AI sound</p>
              <div class="tm-cat-footer-lux">
                <span class="tm-cat-count-badge">14 Models</span>
                <span class="tm-cat-arrow-btn"><i class="bi bi-arrow-right"></i></span>
              </div>
            </div>
          </a>
        </div>

        <!-- 100% Invisible IIC -->
        <div class="col">
          <a href="products.php?style=IIC" class="tm-cat-card-lux tm-cat-theme-cyan">
            <span class="tm-cat-badge-top">Invisible</span>
            <div class="tm-cat-media-lux">
              <img src="assets/images/hearing-aid/iic.webp" alt="100% Invisible In-Canal Hearing Aids" class="tm-cat-img-full">
            </div>
            <div class="tm-cat-content-lux">
              <h6 class="tm-cat-title-lux">100% Invisible (IIC)</h6>
              <p class="tm-cat-desc-lux">Deep canal placement, zero outside visibility</p>
              <div class="tm-cat-footer-lux">
                <span class="tm-cat-count-badge">8 Models</span>
                <span class="tm-cat-arrow-btn"><i class="bi bi-arrow-right"></i></span>
              </div>
            </div>
          </a>
        </div>

        <!-- CIC Custom -->
        <div class="col">
          <a href="products.php?style=CIC" class="tm-cat-card-lux tm-cat-theme-indigo">
            <span class="tm-cat-badge-top">Custom Fit</span>
            <div class="tm-cat-media-lux">
              <img src="assets/images/hearing-aid/cic.webp" alt="CIC Completely-in-Canal Hearing Aids" class="tm-cat-img-full">
            </div>
            <div class="tm-cat-content-lux">
              <h6 class="tm-cat-title-lux">CIC (Completely-in-Canal)</h6>
              <p class="tm-cat-desc-lux">Custom molded to your ear shape for all-day comfort</p>
              <div class="tm-cat-footer-lux">
                <span class="tm-cat-count-badge">10 Models</span>
                <span class="tm-cat-arrow-btn"><i class="bi bi-arrow-right"></i></span>
              </div>
            </div>
          </a>
        </div>

        <!-- BTE Super Power -->
        <div class="col">
          <a href="products.php?style=BTE" class="tm-cat-card-lux tm-cat-theme-rose">
            <span class="tm-cat-badge-top">Super Power</span>
            <div class="tm-cat-media-lux">
              <img src="assets/images/hearing-aid/bte.webp" alt="BTE Behind-the-Ear Power Hearing Aids" class="tm-cat-img-full">
            </div>
            <div class="tm-cat-content-lux">
              <h6 class="tm-cat-title-lux">BTE Behind-the-Ear</h6>
              <p class="tm-cat-desc-lux">Maximum amplification power for severe hearing loss</p>
              <div class="tm-cat-footer-lux">
                <span class="tm-cat-count-badge">12 Models</span>
                <span class="tm-cat-arrow-btn"><i class="bi bi-arrow-right"></i></span>
              </div>
            </div>
          </a>
        </div>

        <!-- ITC Rechargeable -->
        <div class="col">
          <a href="products.php?style=ITC" class="tm-cat-card-lux tm-cat-theme-emerald">
            <span class="tm-cat-badge-top">Easy Grip</span>
            <div class="tm-cat-media-lux">
              <img src="assets/images/hearing-aid/itc.webp" alt="ITC In-the-Canal Hearing Aids" class="tm-cat-img-full">
            </div>
            <div class="tm-cat-content-lux">
              <h6 class="tm-cat-title-lux">ITC (In-the-Canal)</h6>
              <p class="tm-cat-desc-lux">Convenient push-button controls & dual directional mics</p>
              <div class="tm-cat-footer-lux">
                <span class="tm-cat-count-badge">6 Models</span>
                <span class="tm-cat-arrow-btn"><i class="bi bi-arrow-right"></i></span>
              </div>
            </div>
          </a>
        </div>

        <!-- Batteries & Accessories -->
        <div class="col">
          <a href="products.php?category=chargers" class="tm-cat-card-lux tm-cat-theme-amber">
            <span class="tm-cat-badge-top">Essentials</span>
            <div class="tm-cat-media-lux">
              <img src="assets/images/batteries.webp" alt="Hearing Aid Batteries & Accessories" class="tm-cat-img-full">
            </div>
            <div class="tm-cat-content-lux">
              <h6 class="tm-cat-title-lux">Batteries & Care</h6>
              <p class="tm-cat-desc-lux">Rayovac Zinc-Air batteries (10, 312, 13, 675) & wax guards</p>
              <div class="tm-cat-footer-lux">
                <span class="tm-cat-count-badge">All Sizes</span>
                <span class="tm-cat-arrow-btn"><i class="bi bi-arrow-right"></i></span>
              </div>
            </div>
          </a>
        </div>
      </div>
    </div>
  </section>

  <!-- 2. CURATED FEATURED SHOWCASE (TABBED SINGLE-CODE ENGINE) -->
  <section class="py-5 tm-popular-section-bg border-top border-bottom">
    <div class="container">
      <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-end tm-section-head mb-4 gap-3">
        <div>
          <span class="tm-pill tm-pill-orange mb-2"><i class="bi bi-stars"></i> Curated Flagships</span>
          <h2 class="tm-section-title mb-1">Featured <span>Digital Hearing Aids</span></h2>
          <p class="tm-section-sub mb-0">Rechargeable models with AI neural noise suppression & Bluetooth streaming</p>
        </div>

        <!-- Filter Navigation Pills -->
        <div class="tm-filter-tabs-nav">
          <button class="tm-filter-tab-btn active" data-tm-filter-tab="popular"><i class="bi bi-fire text-orange"></i> Popular Flagships</button>
          <button class="tm-filter-tab-btn" data-tm-filter-tab="invisible"><i class="bi bi-eye-slash"></i> 100% Invisible</button>
          <button class="tm-filter-tab-btn" data-tm-filter-tab="rechargeable"><i class="bi bi-battery-charging text-success"></i> Rechargeable RIC</button>
          <button class="tm-filter-tab-btn" data-tm-filter-tab="bte"><i class="bi bi-soundwave"></i> Super Power BTE</button>
          <button class="tm-filter-tab-btn" data-tm-filter-tab="accessories"><i class="bi bi-plug"></i> Chargers & Care</button>
        </div>
      </div>

      <!-- Unified Card Grid (Single Code Component Engine) -->
      <div id="tmInteractiveFeaturedGrid" data-tm-products="popular" data-tm-limit="8" data-tm-col="col-xl-3 col-lg-4 col-md-6 mb-3" class="row g-3">
        <?php tm_product_grid(tm_products_filter(['isPopular' => true, 'limit' => 8]), ['col' => 'col-xl-3 col-lg-4 col-md-6 mb-3']); ?>
      </div>

      <div class="text-center mt-4">
        <a href="products.php" class="tm-btn tm-btn-primary px-4 py-2">
          View Complete 50+ Models Catalog <i class="bi bi-arrow-right ms-1"></i>
        </a>
      </div>
    </div>
  </section>

  <!-- 3. INTERACTIVE BRAND ECOSYSTEM SHOWCASE -->
  <section class="py-5 bg-white border-bottom">
    <div class="container">
      
      <!-- Section Header -->
      <div class="text-center max-w-700 mx-auto mb-4">
        <span class="tm-pill tm-pill-orange mb-2"><i class="bi bi-patch-check-fill text-success"></i> 100% Authorized Dispenser</span>
        <h2 class="tm-section-title mb-2">Explore by <span class="text-orange">Authorized Brands</span></h2>
        <p class="tm-section-sub mb-0">Official dispensers for world-leading Swiss, Danish, German, American & Canadian hearing technology.</p>
      </div>

      <!-- Brand Switcher Logo Tabs (Image-Only Luxury Badges) -->
      <div class="tm-brand-tabs-strip justify-content-lg-center mb-4">
        <div class="tm-brand-tab-card active" data-tm-brand-tab="Phonak" title="Phonak Hearing Aids">
          <img src="assets/images/brand/phonak.webp" alt="Phonak">
        </div>
        <div class="tm-brand-tab-card" data-tm-brand-tab="Oticon" title="Oticon Hearing Aids">
          <img src="assets/images/brand/oticon.webp" alt="Oticon">
        </div>
        <div class="tm-brand-tab-card" data-tm-brand-tab="Signia" title="Signia Hearing Aids">
          <img src="assets/images/brand/signia.webp" alt="Signia">
        </div>
        <div class="tm-brand-tab-card" data-tm-brand-tab="Widex" title="Widex Hearing Aids">
          <img src="assets/images/brand/widex.webp" alt="Widex">
        </div>
        <div class="tm-brand-tab-card" data-tm-brand-tab="ReSound" title="ReSound Hearing Aids">
          <img src="assets/images/brand/resound.webp" alt="ReSound">
        </div>
        <div class="tm-brand-tab-card" data-tm-brand-tab="Starkey" title="Starkey Hearing Aids">
          <img src="assets/images/brand/starkey.webp" alt="Starkey">
        </div>
        <div class="tm-brand-tab-card" data-tm-brand-tab="Unitron" title="Unitron Hearing Aids">
          <img src="assets/images/brand/unitron.webp" alt="Unitron">
        </div>
      </div>

      <!-- Active Brand Information Banner -->
      <div class="tm-brand-hero-pill mb-4">
        <div class="d-flex flex-wrap align-items-center gap-2">
          <h4 class="fw-bold text-navy mb-0" id="tmActiveBrandName">Phonak</h4>
          <span class="badge bg-primary-subtle text-primary border rounded-pill px-3 py-1 small" id="tmActiveBrandOrigin">🇨🇭 Stäfa, Switzerland</span>
          <span class="text-secondary small d-none d-md-inline" id="tmActiveBrandUsp">• Pioneers in Real-Time AI Sound Processing & DeepSonic™ Neural Chips</span>
        </div>
        <div>
          <a href="products.php?brand=Phonak" id="tmBrandViewAllBtn" class="tm-btn tm-btn-outline-navy btn-sm text-nowrap">
            Explore All Phonak Models <i class="bi bi-arrow-right ms-1"></i>
          </a>
        </div>
      </div>

      <!-- Brand Products Grid (Single Code Component Engine) -->
      <div id="tmBrandShowcaseGrid" data-tm-products="brand:Phonak" data-tm-limit="4" data-tm-col="col-xl-3 col-lg-4 col-md-6 mb-3" class="row g-3">
        <?php tm_product_grid(tm_products_filter(['brand' => 'Phonak', 'limit' => 4]), ['col' => 'col-xl-3 col-lg-4 col-md-6 mb-3']); ?>
      </div>

      <!-- Advertisement Banner -->
      <div class="mt-4 pt-2">
        <a href="book-appointment.php" class="d-block overflow-hidden rounded-4 shadow-sm border tm-ad-banner-link" title="Book Free Consultation">
          <img src="assets/images/banners/adds.png" alt="Turtle Maarks Hearing Health — Good Hearing, Stronger Connections" class="w-100 d-block tm-ad-banner-img" loading="lazy">
        </a>
      </div>

    </div>
  </section>

  <!-- =========================================================================
       4.5. INTERACTIVE HEARING AID FINDER (MAJOR CONVERSION SECTION - 2-PART LAYOUT)
       ========================================================================= -->
  <section class="py-5 tm-finder-section border-top border-bottom" id="hearing-aid-finder">
    <div class="container">
      
      <!-- Section Header (Clean & Impressive) -->
      <div class="text-center max-w-750 mx-auto mb-4">
        <div class="tm-finder-header-badge mb-2">
          <i class="bi bi-stars"></i> Smart Hearing Match Tool
        </div>
        <h2 class="tm-section-title mb-2">
          Not Sure Which <span>Hearing Aid</span> Is Right For You?
        </h2>
        <p class="tm-section-sub mb-0 max-w-650 mx-auto">
          Answer a few simple questions and discover hearing solutions suited to your hearing needs, lifestyle and budget.
        </p>
      </div>

      <!-- Main 2-Part Grid Container -->
      <div class="row g-4 align-items-stretch justify-content-center">
        
        <!-- LEFT PART: INTERACTIVE 5-STEP HIGH-CONVERSION QUIZ CARD -->
        <div class="col-lg-7 col-xl-7 d-flex">
          <div class="tm-finder-quiz-card p-3 p-md-4 w-100 d-flex flex-column justify-content-between">
            
            <!-- Stepper Header -->
            <div class="mb-3 pb-1">
              <div class="tm-step-pills-wrap mb-2">
                
                <!-- Step 1 Node -->
                <button type="button" class="tm-step-pill-node active" id="tmStepNode1" onclick="goToFinderStep(1)" title="Hearing Situation">
                  <span class="node-circle"><i class="bi bi-ear"></i></span>
                  <span class="node-title">1. Hearing</span>
                </button>

                <!-- Step 2 Node -->
                <button type="button" class="tm-step-pill-node" id="tmStepNode2" onclick="goToFinderStep(2)" title="Daily Lifestyle">
                  <span class="node-circle"><i class="bi bi-person-walking"></i></span>
                  <span class="node-title">2. Lifestyle</span>
                </button>

                <!-- Step 3 Node -->
                <button type="button" class="tm-step-pill-node" id="tmStepNode3" onclick="goToFinderStep(3)" title="Device Style">
                  <span class="node-circle"><i class="bi bi-sliders"></i></span>
                  <span class="node-title">3. Style</span>
                </button>

                <!-- Step 4 Node -->
                <button type="button" class="tm-step-pill-node" id="tmStepNode4" onclick="goToFinderStep(4)" title="Budget Range">
                  <span class="node-circle"><i class="bi bi-wallet2"></i></span>
                  <span class="node-title">4. Budget</span>
                </button>

                <!-- Step 5 Node -->
                <button type="button" class="tm-step-pill-node" id="tmStepNode5" onclick="goToFinderStep(5)" title="Your Matches">
                  <span class="node-circle"><i class="bi bi-patch-check-fill"></i></span>
                  <span class="node-title">5. Matches</span>
                </button>

              </div>

              <!-- Animated Progress Bar -->
              <div class="tm-quiz-progress">
                <div class="tm-quiz-progress-bar" id="tmFinderProgressBar" style="width: 20%;"></div>
              </div>
            </div>

            <!-- =============================================================
                 STEP 1: TELL US ABOUT YOUR HEARING
                 ============================================================= -->
            <div class="tm-quiz-step-pane active flex-grow-1" id="finderStepPane1">
              <div class="mb-2">
                <span class="badge bg-primary-subtle text-primary rounded-pill px-2 py-1 extra-small mb-1 fw-semibold" style="font-size: 0.7rem;">Step 1 of 4</span>
                <h5 class="fw-bold text-navy mb-0 font-heading fs-6">Tell us about your hearing situation</h5>
                <p class="text-secondary extra-small mb-0">What best describes what you or your loved one experiences?</p>
              </div>

              <div class="row g-2 mb-3">
                <div class="col-sm-6">
                  <div class="tm-quiz-option-card selected" onclick="selectFinderOption(1, this, 'mild')">
                    <div class="opt-icon-box"><i class="bi bi-volume-up"></i></div>
                    <div>
                      <h6 class="fw-bold text-navy mb-0 small">Mild Difficulty</h6>
                      <p class="text-secondary extra-small mb-0">Struggling in background noise &amp; TV.</p>
                    </div>
                    <div class="opt-radio-badge"></div>
                  </div>
                </div>

                <div class="col-sm-6">
                  <div class="tm-quiz-option-card" onclick="selectFinderOption(1, this, 'moderate')">
                    <div class="opt-icon-box"><i class="bi bi-telephone-inbound"></i></div>
                    <div>
                      <h6 class="fw-bold text-navy mb-0 small">Moderate Loss</h6>
                      <p class="text-secondary extra-small mb-0">Missing phone &amp; group talks.</p>
                    </div>
                    <div class="opt-radio-badge"></div>
                  </div>
                </div>

                <div class="col-sm-6">
                  <div class="tm-quiz-option-card" onclick="selectFinderOption(1, this, 'severe')">
                    <div class="opt-icon-box"><i class="bi bi-soundwave"></i></div>
                    <div>
                      <h6 class="fw-bold text-navy mb-0 small">Severe Loss</h6>
                      <p class="text-secondary extra-small mb-0">Needs high power amplification.</p>
                    </div>
                    <div class="opt-radio-badge"></div>
                  </div>
                </div>

                <div class="col-sm-6">
                  <div class="tm-quiz-option-card" onclick="selectFinderOption(1, this, 'tinnitus')">
                    <div class="opt-icon-box"><i class="bi bi-bell-slash"></i></div>
                    <div>
                      <h6 class="fw-bold text-navy mb-0 small">Tinnitus / Ringing</h6>
                      <p class="text-secondary extra-small mb-0">Persistent ear buzzing sounds.</p>
                    </div>
                    <div class="opt-radio-badge"></div>
                  </div>
                </div>
              </div>

              <div class="d-flex justify-content-between align-items-center border-top pt-2 mt-auto">
                <span class="text-muted extra-small"><i class="bi bi-shield-lock-fill text-success me-1"></i> 100% Free &amp; Unbiased</span>
                <button type="button" class="tm-btn tm-btn-primary tm-btn-sm" onclick="goToFinderStep(2)">
                  Next: Lifestyle <i class="bi bi-arrow-right ms-1"></i>
                </button>
              </div>
            </div>

            <!-- =============================================================
                 STEP 2: CHOOSE YOUR LIFESTYLE
                 ============================================================= -->
            <div class="tm-quiz-step-pane flex-grow-1" id="finderStepPane2">
              <div class="mb-2">
                <span class="badge bg-primary-subtle text-primary rounded-pill px-2 py-1 extra-small mb-1 fw-semibold" style="font-size: 0.7rem;">Step 2 of 4</span>
                <h5 class="fw-bold text-navy mb-0 font-heading fs-6">Choose your primary daily lifestyle</h5>
                <p class="text-secondary extra-small mb-0">Where do you spend most of your active weekly hours?</p>
              </div>

              <div class="row g-2 mb-3">
                <div class="col-sm-6">
                  <div class="tm-quiz-option-card selected" onclick="selectFinderOption(2, this, 'active')">
                    <div class="opt-icon-box"><i class="bi bi-compass"></i></div>
                    <div>
                      <h6 class="fw-bold text-navy mb-0 small">Active &amp; Social</h6>
                      <p class="text-secondary extra-small mb-0">Travel, restaurants &amp; outdoor events.</p>
                    </div>
                    <div class="opt-radio-badge"></div>
                  </div>
                </div>

                <div class="col-sm-6">
                  <div class="tm-quiz-option-card" onclick="selectFinderOption(2, this, 'work')">
                    <div class="opt-icon-box"><i class="bi bi-briefcase"></i></div>
                    <div>
                      <h6 class="fw-bold text-navy mb-0 small">Work &amp; Meetings</h6>
                      <p class="text-secondary extra-small mb-0">Office boardrooms &amp; video calls.</p>
                    </div>
                    <div class="opt-radio-badge"></div>
                  </div>
                </div>

                <div class="col-sm-6">
                  <div class="tm-quiz-option-card" onclick="selectFinderOption(2, this, 'home')">
                    <div class="opt-icon-box"><i class="bi bi-house-heart"></i></div>
                    <div>
                      <h6 class="fw-bold text-navy mb-0 small">Quiet &amp; Home</h6>
                      <p class="text-secondary extra-small mb-0">Family talks &amp; TV relaxation.</p>
                    </div>
                    <div class="opt-radio-badge"></div>
                  </div>
                </div>

                <div class="col-sm-6">
                  <div class="tm-quiz-option-card" onclick="selectFinderOption(2, this, 'senior')">
                    <div class="opt-icon-box"><i class="bi bi-heart-pulse"></i></div>
                    <div>
                      <h6 class="fw-bold text-navy mb-0 small">Senior / Easy Care</h6>
                      <p class="text-secondary extra-small mb-0">Drop-in charging &amp; auto-clarity.</p>
                    </div>
                    <div class="opt-radio-badge"></div>
                  </div>
                </div>
              </div>

              <div class="d-flex justify-content-between align-items-center border-top pt-2 mt-auto">
                <button type="button" class="btn btn-outline-secondary btn-sm py-1" onclick="goToFinderStep(1)">
                  <i class="bi bi-arrow-left me-1"></i> Back
                </button>
                <button type="button" class="tm-btn tm-btn-primary tm-btn-sm" onclick="goToFinderStep(3)">
                  Next: Style <i class="bi bi-arrow-right ms-1"></i>
                </button>
              </div>
            </div>

            <!-- =============================================================
                 STEP 3: SELECT YOUR PREFERENCES
                 ============================================================= -->
            <div class="tm-quiz-step-pane flex-grow-1" id="finderStepPane3">
              <div class="mb-2">
                <span class="badge bg-primary-subtle text-primary rounded-pill px-2 py-1 extra-small mb-1 fw-semibold" style="font-size: 0.7rem;">Step 3 of 4</span>
                <h5 class="fw-bold text-navy mb-0 font-heading fs-6">Select your style &amp; feature preferences</h5>
                <p class="text-secondary extra-small mb-0">What is most important in terms of appearance &amp; connectivity?</p>
              </div>

              <div class="row g-2 mb-3">
                <div class="col-sm-6">
                  <div class="tm-quiz-option-card selected" onclick="selectFinderOption(3, this, 'invisible')">
                    <div class="opt-icon-box"><i class="bi bi-eye-slash"></i></div>
                    <div>
                      <h6 class="fw-bold text-navy mb-0 small">100% Invisible (IIC/CIC)</h6>
                      <p class="text-secondary extra-small mb-0">Completely hidden inside the canal.</p>
                    </div>
                    <div class="opt-radio-badge"></div>
                  </div>
                </div>

                <div class="col-sm-6">
                  <div class="tm-quiz-option-card" onclick="selectFinderOption(3, this, 'ric')">
                    <div class="opt-icon-box"><i class="bi bi-earbuds"></i></div>
                    <div>
                      <h6 class="fw-bold text-navy mb-0 small">Discreet RIC</h6>
                      <p class="text-secondary extra-small mb-0">Slim wire &amp; natural airflow.</p>
                    </div>
                    <div class="opt-radio-badge"></div>
                  </div>
                </div>

                <div class="col-sm-6">
                  <div class="tm-quiz-option-card" onclick="selectFinderOption(3, this, 'rechargeable')">
                    <div class="opt-icon-box"><i class="bi bi-battery-charging"></i></div>
                    <div>
                      <h6 class="fw-bold text-navy mb-0 small">Rechargeable Battery</h6>
                      <p class="text-secondary extra-small mb-0">30+ hours overnight charging case.</p>
                    </div>
                    <div class="opt-radio-badge"></div>
                  </div>
                </div>

                <div class="col-sm-6">
                  <div class="tm-quiz-option-card" onclick="selectFinderOption(3, this, 'bluetooth')">
                    <div class="opt-icon-box"><i class="bi bi-bluetooth"></i></div>
                    <div>
                      <h6 class="fw-bold text-navy mb-0 small">Bluetooth Calls</h6>
                      <p class="text-secondary extra-small mb-0">Direct audio from iPhone &amp; Android.</p>
                    </div>
                    <div class="opt-radio-badge"></div>
                  </div>
                </div>
              </div>

              <div class="d-flex justify-content-between align-items-center border-top pt-2 mt-auto">
                <button type="button" class="btn btn-outline-secondary btn-sm py-1" onclick="goToFinderStep(2)">
                  <i class="bi bi-arrow-left me-1"></i> Back
                </button>
                <button type="button" class="tm-btn tm-btn-primary tm-btn-sm" onclick="goToFinderStep(4)">
                  Next: Budget <i class="bi bi-arrow-right ms-1"></i>
                </button>
              </div>
            </div>

            <!-- =============================================================
                 STEP 4: CHOOSE YOUR BUDGET
                 ============================================================= -->
            <div class="tm-quiz-step-pane flex-grow-1" id="finderStepPane4">
              <div class="mb-2">
                <span class="badge bg-primary-subtle text-primary rounded-pill px-2 py-1 extra-small mb-1 fw-semibold" style="font-size: 0.7rem;">Step 4 of 4</span>
                <h5 class="fw-bold text-navy mb-0 font-heading fs-6">Choose your preferred budget range</h5>
                <p class="text-secondary extra-small mb-0">Includes fitting, lifetime sound tuning &amp; warranty.</p>
              </div>

              <div class="row g-2 mb-3">
                <div class="col-sm-4">
                  <div class="tm-quiz-option-card" onclick="selectFinderOption(4, this, 'economy')">
                    <div class="opt-icon-box"><i class="bi bi-tag"></i></div>
                    <div>
                      <span class="badge bg-light text-navy border extra-small mb-1" style="font-size: 0.65rem;">Essential</span>
                      <h6 class="fw-bold text-navy mb-0 small">₹18.5k – ₹45k</h6>
                      <p class="text-secondary extra-small mb-0" style="font-size: 0.68rem;">Clear digital speech.</p>
                    </div>
                    <div class="opt-radio-badge"></div>
                  </div>
                </div>

                <div class="col-sm-4">
                  <div class="tm-quiz-option-card selected" onclick="selectFinderOption(4, this, 'advanced')">
                    <div class="opt-icon-box"><i class="bi bi-award"></i></div>
                    <div>
                      <span class="badge bg-orange text-white extra-small mb-1" style="font-size: 0.65rem;">Popular</span>
                      <h6 class="fw-bold text-navy mb-0 small">₹50k – ₹1.2L</h6>
                      <p class="text-secondary extra-small mb-0" style="font-size: 0.68rem;">Rechargeable &amp; BT.</p>
                    </div>
                    <div class="opt-radio-badge"></div>
                  </div>
                </div>

                <div class="col-sm-4">
                  <div class="tm-quiz-option-card" onclick="selectFinderOption(4, this, 'premium')">
                    <div class="opt-icon-box"><i class="bi bi-cpu"></i></div>
                    <div>
                      <span class="badge bg-primary-subtle text-primary extra-small mb-1" style="font-size: 0.65rem;">AI Flagship</span>
                      <h6 class="fw-bold text-navy mb-0 small">₹1.3L – ₹3.5L+</h6>
                      <p class="text-secondary extra-small mb-0" style="font-size: 0.68rem;">Neural AI chip.</p>
                    </div>
                    <div class="opt-radio-badge"></div>
                  </div>
                </div>
              </div>

              <div class="d-flex justify-content-between align-items-center border-top pt-2 mt-auto">
                <button type="button" class="btn btn-outline-secondary btn-sm py-1" onclick="goToFinderStep(3)">
                  <i class="bi bi-arrow-left me-1"></i> Back
                </button>
                <button type="button" class="tm-btn tm-btn-primary tm-btn-sm shadow-sm" onclick="generateFinderResults()">
                  Find My Hearing Aid <i class="bi bi-arrow-right ms-1"></i>
                </button>
              </div>
            </div>

            <!-- =============================================================
                 STEP 5: GET PERSONALIZED RECOMMENDATIONS (RESULTS)
                 ============================================================= -->
            <div class="tm-quiz-step-pane flex-grow-1" id="finderStepPane5">
              <div class="mb-2">
                <span class="badge bg-success-subtle text-success rounded-pill px-2 py-1 extra-small mb-1 fw-semibold" style="font-size: 0.7rem;">
                  <i class="bi bi-check2-circle me-1"></i> 3 Tailored Matches Found
                </span>
                <h5 class="fw-bold text-navy mb-0 font-heading fs-6">Your Personalized Hearing Solutions</h5>
                <p class="text-secondary extra-small mb-0">Curated specifically based on your selected preferences.</p>
              </div>

              <!-- Top Primary Match Card -->
              <div class="tm-finder-result-box mb-2 p-3">
                <div class="row align-items-center g-2">
                  <div class="col-sm-3 text-center">
                    <div class="p-1 bg-white rounded-3 shadow-sm d-inline-block">
                      <img id="resPrimaryImg" src="assets/images/hearing-aid/ric.webp" alt="Primary Match" style="max-height: 75px;" class="img-fluid">
                    </div>
                    <div class="mt-1">
                      <span class="badge bg-orange text-white px-2 py-1 extra-small fw-bold" style="font-size: 0.65rem;">
                        <i class="bi bi-fire me-1"></i> <span id="resPrimaryMatchScore">98% Match</span>
                      </span>
                    </div>
                  </div>

                  <div class="col-sm-6">
                    <div class="badge bg-white bg-opacity-10 text-white-75 rounded-pill px-2 py-1 extra-small mb-1" style="font-size: 0.65rem;" id="resPrimaryBrandTag">
                      🇨🇭 Phonak &bull; Switzerland
                    </div>
                    <h6 class="fw-bold text-white mb-1 font-heading" id="resPrimaryTitle">Phonak Audéo Infinio Ultra 90</h6>
                    <p class="text-white-70 extra-small mb-1" style="font-size: 0.72rem; line-height: 1.3;" id="resPrimaryDesc">
                      Powered by the DEEPSONIC™ real-time neural chip with AutoSense OS 6.0. Instant speech clarity with universal Bluetooth.
                    </p>
                    
                    <div class="d-flex flex-wrap gap-1 extra-small" style="font-size: 0.68rem;" id="resPrimaryFeatures">
                      <span class="badge bg-white bg-opacity-10 text-white"><i class="bi bi-cpu me-1"></i> AI Chip</span>
                      <span class="badge bg-white bg-opacity-10 text-white"><i class="bi bi-battery-charging me-1"></i> 30h</span>
                      <span class="badge bg-white bg-opacity-10 text-white"><i class="bi bi-bluetooth me-1"></i> BT</span>
                      <span class="badge bg-white bg-opacity-10 text-white"><i class="bi bi-shield-check me-1"></i> 4Y</span>
                    </div>
                  </div>

                  <div class="col-sm-3 text-sm-end border-start-sm border-white border-opacity-10">
                    <div class="extra-small text-white-50" style="font-size: 0.68rem;">Starting From</div>
                    <div class="fs-6 fw-bold text-orange mb-1" id="resPrimaryPrice">₹85,000</div>
                    <div class="d-grid gap-1">
                      <a href="<?= e(url('book-appointment.php')) ?>" class="tm-btn tm-btn-primary tm-btn-sm text-center py-1 extra-small" style="font-size: 0.75rem;">
                        <i class="bi bi-calendar-check me-1"></i> Free Trial
                      </a>
                      <a id="resPrimaryWaBtn" href="https://wa.me/<?= e(SITE_WHATSAPP) ?>?text=Hi%20Turtle%20Maarks,%20I%20completed%20the%20Hearing%20Aid%20Finder%20quiz%20and%20got%20matched%20with%20Phonak%20Audéo%20Infinio.%20Please%20guide%20me." target="_blank" rel="noopener" class="tm-btn tm-btn-success tm-btn-sm text-center py-1 extra-small" style="font-size: 0.75rem;">
                        <i class="bi bi-whatsapp me-1"></i> WhatsApp
                      </a>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Secondary Alternative Matches -->
              <div class="row g-2 mb-2">
                <div class="col-sm-6">
                  <div class="card rounded-3 border p-2 bg-light h-100">
                    <div class="d-flex align-items-center gap-2">
                      <img src="assets/images/hearing-aid/iic.webp" alt="Signia Silk Charge&Go" style="width: 38px; height: 38px; object-fit: contain;">
                      <div class="flex-grow-1">
                        <span class="badge bg-light text-navy border extra-small" style="font-size: 0.62rem;">94% Match</span>
                        <h6 class="fw-bold text-navy mb-0 extra-small mt-0">Signia Silk IX</h6>
                        <span class="text-muted extra-small" style="font-size: 0.68rem;">From ₹68,000 &bull; Invisible</span>
                      </div>
                      <a href="<?= e(url('book-appointment.php')) ?>" class="text-orange fw-bold extra-small text-decoration-none">Trial &rarr;</a>
                    </div>
                  </div>
                </div>

                <div class="col-sm-6">
                  <div class="card rounded-3 border p-2 bg-light h-100">
                    <div class="d-flex align-items-center gap-2">
                      <img src="assets/images/hearing-aid/bte.webp" alt="Oticon Intent" style="width: 38px; height: 38px; object-fit: contain;">
                      <div class="flex-grow-1">
                        <span class="badge bg-light text-navy border extra-small" style="font-size: 0.62rem;">92% Match</span>
                        <h6 class="fw-bold text-navy mb-0 extra-small mt-0">Oticon Intent</h6>
                        <span class="text-muted extra-small" style="font-size: 0.68rem;">From ₹92,000 &bull; 4D Sensor</span>
                      </div>
                      <a href="<?= e(url('book-appointment.php')) ?>" class="text-orange fw-bold extra-small text-decoration-none">Trial &rarr;</a>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Retake & Consultation Footer -->
              <div class="d-flex flex-wrap justify-content-between align-items-center gap-2 border-top pt-2 mt-auto">
                <button type="button" class="btn btn-outline-secondary btn-sm py-0 px-2 extra-small" onclick="goToFinderStep(1)" style="font-size: 0.72rem;">
                  <i class="bi bi-arrow-counterclockwise me-1"></i> Retake
                </button>
                <div class="extra-small text-muted" style="font-size: 0.72rem;">
                  <i class="bi bi-info-circle text-primary me-1"></i> Doctor Help: <strong class="text-navy"><?= e(SITE_PHONE) ?></strong>
                </div>
              </div>

            </div>

          </div>
        </div>

        <!-- RIGHT PART: FULLY VISIBLE HIGH-RES POSTER BANNER -->
        <div class="col-lg-5 col-xl-5 d-flex">
          <div class="tm-finder-poster-wrap w-100 d-flex align-items-center justify-content-center bg-white p-2 p-md-3">
            <img src="assets/images/banners/personalized-hearing.png" 
                 alt="Not Sure Which Hearing Aid Is Right For You? — Personalized Hearing Aid Finder" 
                 class="tm-finder-poster-img rounded-3 shadow-xs" 
                 loading="lazy">
          </div>
        </div>

      </div>

    </div>
  </section>

  <!-- JavaScript for Interactive Hearing Aid Finder -->
  <script>
    const finderChoices = {
      hearing: 'mild',
      lifestyle: 'active',
      preference: 'invisible',
      budget: 'advanced'
    };

    function selectFinderOption(step, element, value) {
      const parentPane = document.getElementById('finderStepPane' + step);
      if (parentPane) {
        parentPane.querySelectorAll('.tm-quiz-option-card').forEach(function(card) {
          card.classList.remove('selected');
        });
      }
      if (element) {
        element.classList.add('selected');
      }

      if (step === 1) finderChoices.hearing = value;
      if (step === 2) finderChoices.lifestyle = value;
      if (step === 3) finderChoices.preference = value;
      if (step === 4) finderChoices.budget = value;
    }

    function goToFinderStep(stepNum) {
      stepNum = parseInt(stepNum, 10);
      if (isNaN(stepNum) || stepNum < 1 || stepNum > 5) stepNum = 1;

      // Hide all panes & update stepper nodes
      for (let i = 1; i <= 5; i++) {
        const pane = document.getElementById('finderStepPane' + i);
        const node = document.getElementById('tmStepNode' + i);
        if (pane) {
          pane.classList.remove('active');
        }
        if (node) {
          node.classList.remove('active');
          if (i < stepNum) {
            node.classList.add('completed');
          } else {
            node.classList.remove('completed');
          }
        }
      }

      // Show targeted pane
      const targetPane = document.getElementById('finderStepPane' + stepNum);
      const targetNode = document.getElementById('tmStepNode' + stepNum);
      if (targetPane) {
        targetPane.classList.add('active');
      }
      if (targetNode) {
        targetNode.classList.add('active');
      }

      // Update progress bar
      const progressPercent = (stepNum / 5) * 100;
      const progBar = document.getElementById('tmFinderProgressBar');
      if (progBar) {
        progBar.style.width = progressPercent + '%';
      }

      // If at step 5, compute recommendations
      if (stepNum === 5) {
        renderFinderResultsData();
      }
    }

    function generateFinderResults() {
      goToFinderStep(5);
    }

    function renderFinderResultsData() {
      const titleElem = document.getElementById('resPrimaryTitle');
      const descElem = document.getElementById('resPrimaryDesc');
      const priceElem = document.getElementById('resPrimaryPrice');
      const brandElem = document.getElementById('resPrimaryBrandTag');
      const imgElem = document.getElementById('resPrimaryImg');
      const waElem = document.getElementById('resPrimaryWaBtn');

      let recTitle = 'Phonak Audéo Infinio Ultra 90';
      let recDesc = 'Powered by the DEEPSONIC™ real-time neural chip with AutoSense OS 6.0. Instant speech clarity with universal Bluetooth.';
      let recPrice = '₹85,000';
      let recBrand = '🇨🇭 Phonak • Switzerland';
      let recImg = 'assets/images/hearing-aid/ric.webp';

      if (finderChoices.preference === 'invisible' || finderChoices.hearing === 'mild') {
        recTitle = 'Signia Silk Charge&Go IX';
        recDesc = '100% Invisible in-the-canal with Binaural OneMic directionality and instant-fit silicone click sleeves.';
        recPrice = '₹68,000';
        recBrand = '🇩🇪 Signia • Germany';
        recImg = 'assets/images/hearing-aid/iic.webp';
      } else if (finderChoices.lifestyle === 'senior' || finderChoices.preference === 'rechargeable') {
        recTitle = 'Oticon Intent 1 (BrainHearing™)';
        recDesc = 'Uses 4D Sensor technology to adapt seamlessly to your body movement and listening intentions with magnetic charging.';
        recPrice = '₹92,000';
        recBrand = '🇩🇰 Oticon • Denmark';
        recImg = 'assets/images/hearing-aid/ric.webp';
      } else if (finderChoices.budget === 'economy') {
        recTitle = 'ReSound Key 3 / 4 Digital';
        recDesc = 'Essential natural sound quality and direct audio streaming from Apple and Android devices with robust moisture protection.';
        recPrice = '₹32,500';
        recBrand = '🇩🇰 ReSound • Denmark';
        recImg = 'assets/images/hearing-aid/ric.webp';
      }

      if (titleElem) titleElem.innerText = recTitle;
      if (descElem) descElem.innerText = recDesc;
      if (priceElem) priceElem.innerHTML = recPrice;
      if (brandElem) brandElem.innerText = recBrand;
      if (imgElem) imgElem.src = recImg;

      if (waElem) {
        const msg = encodeURIComponent(`Hi Turtle Maarks Clinic, I completed your Hearing Aid Finder quiz (Hearing: ${finderChoices.hearing}, Lifestyle: ${finderChoices.lifestyle}, Style: ${finderChoices.preference}, Budget: ${finderChoices.budget}) and matched with ${recTitle}. Please help me book a free trial.`);
        waElem.href = `https://wa.me/<?= e(SITE_WHATSAPP) ?>?text=${msg}`;
      }
    }
  </script>

  <!-- 5. SOUND-BOOTH DIAGNOSTIC HEARING SERVICES -->
  <section class="py-5 bg-light">
    <div class="container">
      <div class="d-flex justify-content-between align-items-end tm-section-head mb-4">
        <div>
          <span class="tm-pill tm-pill-teal mb-2"><i class="bi bi-soundwave"></i> Sound-Booth Precision Diagnostics</span>
          <h2 class="tm-section-title mb-1">Diagnostic <span>Hearing Tests</span></h2>
          <p class="tm-section-sub mb-0">Calibrated audiometer assessments with instant certified clinical reports</p>
        </div>
        <a href="diagnostic-services.php" class="tm-btn tm-btn-outline-navy tm-btn-sm d-none d-sm-inline-flex">All Tests <i class="bi bi-arrow-right"></i></a>
      </div>

      <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-3">
        <!-- Test 1: PTA -->
        <div class="col">
          <div class="tm-diag-card">
            <div>
              <div class="tm-diag-icon"><i class="bi bi-soundwave"></i></div>
              <h6 class="fw-bold text-navy mb-1">PTA (Pure Tone Audiometry)</h6>
              <p class="text-secondary small mb-3">Air & bone conduction threshold testing across 250Hz - 8kHz frequency spectrum.</p>
            </div>
            <div>
              <div class="d-flex justify-content-between align-items-baseline mb-2">
                <span class="fw-bold text-navy fs-5">₹1,200</span>
                <span class="small text-muted"><i class="bi bi-clock"></i> 30 Mins</span>
              </div>
              <div class="d-grid gap-1">
                <button class="tm-btn tm-btn-primary tm-btn-sm" onclick="Cart.addItem({id:'diag-pta', name:'PTA Pure Tone Audiometry', brand:'Turtle Maarks', price:1200, type:'Diagnostic Test', image:'assets/images/services/pta.webp'})">Add to Cart</button>
                <a href="book-appointment.php" class="tm-btn tm-btn-outline-navy tm-btn-sm">Book Slot</a>
              </div>
            </div>
          </div>
        </div>

        <!-- Test 2: Tympanometry -->
        <div class="col">
          <div class="tm-diag-card">
            <div>
              <div class="tm-diag-icon"><i class="bi bi-activity"></i></div>
              <h6 class="fw-bold text-navy mb-1">Tympanometry (Tymp)</h6>
              <p class="text-secondary small mb-3">Middle ear pressure, acoustic reflex, fluid presence, and eardrum compliance check.</p>
            </div>
            <div>
              <div class="d-flex justify-content-between align-items-baseline mb-2">
                <span class="fw-bold text-navy fs-5">₹800</span>
                <span class="small text-muted"><i class="bi bi-clock"></i> 15 Mins</span>
              </div>
              <div class="d-grid gap-1">
                <button class="tm-btn tm-btn-primary tm-btn-sm" onclick="Cart.addItem({id:'diag-tymp', name:'Tympanometry (Tymp)', brand:'Turtle Maarks', price:800, type:'Diagnostic Test', image:'assets/images/services/tymp.webp'})">Add to Cart</button>
                <a href="book-appointment.php" class="tm-btn tm-btn-outline-navy tm-btn-sm">Book Slot</a>
              </div>
            </div>
          </div>
        </div>

        <!-- Test 3: BERA -->
        <div class="col">
          <div class="tm-diag-card">
            <div>
              <div class="tm-diag-icon"><i class="bi bi-cpu"></i></div>
              <h6 class="fw-bold text-navy mb-1">BERA / ABR Test</h6>
              <p class="text-secondary small mb-3">Auditory Brainstem Response neuro-electrical test for infants and auditory nerve evaluation.</p>
            </div>
            <div>
              <div class="d-flex justify-content-between align-items-baseline mb-2">
                <span class="fw-bold text-navy fs-5">₹3,500</span>
                <span class="small text-muted"><i class="bi bi-clock"></i> 60 Mins</span>
              </div>
              <div class="d-grid gap-1">
                <button class="tm-btn tm-btn-primary tm-btn-sm" onclick="Cart.addItem({id:'diag-bera', name:'BERA Brainstem Evoked Response', brand:'Turtle Maarks', price:3500, type:'Diagnostic Test', image:'assets/images/services/bera.webp'})">Add to Cart</button>
                <a href="book-appointment.php" class="tm-btn tm-btn-outline-navy tm-btn-sm">Book Slot</a>
              </div>
            </div>
          </div>
        </div>

        <!-- Test 4: OAE -->
        <div class="col">
          <div class="tm-diag-card">
            <div>
              <div class="tm-diag-icon"><i class="bi bi-earbuds"></i></div>
              <h6 class="fw-bold text-navy mb-1">OAE Screening</h6>
              <p class="text-secondary small mb-3">Otoacoustic Emission test measuring outer cochlear hair-cell function for newborns & adults.</p>
            </div>
            <div>
              <div class="d-flex justify-content-between align-items-baseline mb-2">
                <span class="fw-bold text-navy fs-5">₹1,500</span>
                <span class="small text-muted"><i class="bi bi-clock"></i> 20 Mins</span>
              </div>
              <div class="d-grid gap-1">
                <button class="tm-btn tm-btn-primary tm-btn-sm" onclick="Cart.addItem({id:'diag-oae', name:'OAE Otoacoustic Emission', brand:'Turtle Maarks', price:1500, type:'Diagnostic Test', image:'assets/images/services/oae.webp'})">Add to Cart</button>
                <a href="book-appointment.php" class="tm-btn tm-btn-outline-navy tm-btn-sm">Book Slot</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- 6. CLINICAL LEADERSHIP / MEET OUR SENIOR AUDIOLOGISTS -->
  <section class="py-5 bg-white position-relative">
    <div class="container">
      
      <!-- Section Header -->
      <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-end tm-section-head mb-4 gap-3">
        <div>
          <span class="tm-pill tm-pill-orange mb-2"><i class="bi bi-patch-check-fill"></i> Clinical Leadership</span>
          <h2 class="tm-section-title mb-1">Meet Our <span>Senior Audiologists</span></h2>
          <p class="tm-section-sub mb-0">RCI-registered hearing rehabilitation specialists, diagnostic electrophysiologists, and speech therapists</p>
        </div>
        <div class="d-flex align-items-center gap-2">
          <span class="badge bg-light text-navy border px-3 py-2 rounded-pill small fw-bold d-none d-lg-inline-flex">
            <i class="bi bi-shield-fill-check text-success me-1"></i> 100% RCI Registered Team
          </span>
          <a href="about.php" class="tm-btn tm-btn-outline-navy tm-btn-sm">Clinical Profile <i class="bi bi-arrow-right"></i></a>
        </div>
      </div>

      <!-- Doctor Cards Grid -->
      <div class="row g-4">
        
        <!-- Doctor 1: Dr. Ritu Verma -->
        <div class="col-lg-4 col-md-6">
          <div class="tm-doctor-card">
            
            <!-- Photo Media Frame -->
            <div class="tm-doctor-media">
              <img src="assets/images/doctor-single.png" alt="Dr. Ritu Verma - Senior Clinical Audiologist" loading="lazy">
              <div class="tm-doctor-media-overlay">
                <div class="tm-doctor-media-top">
                  <span class="tm-doctor-badge-rci"><i class="bi bi-patch-check-fill"></i> RCI: A14829</span>
                  <span class="tm-doctor-badge-exp"><i class="bi bi-star-fill text-warning me-1"></i> 14+ Yrs Exp</span>
                </div>
                <div class="tm-doctor-media-bottom">
                  <span class="badge bg-success-subtle text-success border border-success-subtle rounded-pill small px-2">
                    <span class="tm-live-pulse" style="width:6px;height:6px;"></span> In-Clinic Today
                  </span>
                  <span class="badge bg-white-20 text-white rounded-pill px-2 py-1 small">
                    AIISH Alum
                  </span>
                </div>
              </div>
            </div>

            <!-- Doctor Body Content -->
            <div class="tm-doctor-body">
              <h4 class="tm-doctor-name">Dr. Ritu Verma</h4>
              <div class="tm-doctor-title">Senior Clinical Audiologist &amp; MASLP</div>
              
              <div class="tm-doctor-meta-strip">
                <span><i class="bi bi-mortarboard-fill text-orange me-1"></i> MASLP (Audiology)</span>
                <span class="fw-semibold text-navy"><i class="bi bi-geo-alt-fill text-danger me-1"></i> Gaur City Mall</span>
              </div>

              <p class="tm-doctor-bio">
                Specializes in Real-Ear Measurement (REM), high-precision computer fine-tuning, and severe-to-profound sensorineural hearing rehabilitation for adults and seniors.
              </p>
              
              <div class="tm-doctor-specialties">
                <span class="tm-doctor-spec-chip">Adult Audiology</span>
                <span class="tm-doctor-spec-chip">REM Fitting</span>
                <span class="tm-doctor-spec-chip">Phonak / Oticon Expert</span>
                <span class="tm-doctor-spec-chip">Tinnitus Masking</span>
              </div>

              <div class="tm-doctor-avail">
                <i class="bi bi-calendar2-check text-orange"></i> Available for: Sound Booth &amp; VIP Home Visit
              </div>
            </div>

          </div>
        </div>

        <!-- Doctor 2: Dr. Sumit Kumar Singh -->
        <div class="col-lg-4 col-md-6">
          <div class="tm-doctor-card">
            
            <!-- Photo Media Frame -->
            <div class="tm-doctor-media">
              <img src="assets/images/team/team-02.webp" alt="Dr. Sumit Kumar Singh - Lead Audiologist & Fitting Specialist" loading="lazy">
              <div class="tm-doctor-media-overlay">
                <div class="tm-doctor-media-top">
                  <span class="tm-doctor-badge-rci"><i class="bi bi-patch-check-fill"></i> RCI: A28193</span>
                  <span class="tm-doctor-badge-exp"><i class="bi bi-star-fill text-warning me-1"></i> 10+ Yrs Exp</span>
                </div>
                <div class="tm-doctor-media-bottom">
                  <span class="badge bg-success-subtle text-success border border-success-subtle rounded-pill small px-2">
                    <span class="tm-live-pulse" style="width:6px;height:6px;"></span> Fitting Specialist
                  </span>
                  <span class="badge bg-white-20 text-white rounded-pill px-2 py-1 small">
                    Signia / Widex Pro
                  </span>
                </div>
              </div>
            </div>

            <!-- Doctor Body Content -->
            <div class="tm-doctor-body">
              <h4 class="tm-doctor-name">Dr. Sumit Kumar Singh</h4>
              <div class="tm-doctor-title">Senior Audiologist &amp; Device Specialist</div>
              
              <div class="tm-doctor-meta-strip">
                <span><i class="bi bi-mortarboard-fill text-orange me-1"></i> BASLP (Audiology)</span>
                <span class="fw-semibold text-navy"><i class="bi bi-geo-alt-fill text-danger me-1"></i> Clinic &amp; Doorstep</span>
              </div>

              <p class="tm-doctor-bio">
                Recognized leader in digital hearing aid acoustics, deep canal Invisible (IIC/CIC) ear-mould fabrication, and lifestyle adaptation for active working professionals.
              </p>
              
              <div class="tm-doctor-specialties">
                <span class="tm-doctor-spec-chip">IIC / CIC Invisible</span>
                <span class="tm-doctor-spec-chip">Pure Tone (PTA)</span>
                <span class="tm-doctor-spec-chip">Signia / Widex</span>
                <span class="tm-doctor-spec-chip">Bluetooth Hearables</span>
              </div>

              <div class="tm-doctor-avail">
                <i class="bi bi-calendar2-check text-orange"></i> Available for: Clinic &amp; Home Free Trial
              </div>
            </div>

          </div>
        </div>

        <!-- Doctor 3: Dr. Saurabh Mishra -->
        <div class="col-lg-4 col-md-6">
          <div class="tm-doctor-card">
            
            <!-- Photo Media Frame -->
            <div class="tm-doctor-media">
              <img src="assets/images/team/team-03.webp" alt="Dr. Saurabh Mishra - Pediatric Audiologist & Electrophysiologist" loading="lazy">
              <div class="tm-doctor-media-overlay">
                <div class="tm-doctor-media-top">
                  <span class="tm-doctor-badge-rci"><i class="bi bi-patch-check-fill"></i> RCI: A19482</span>
                  <span class="tm-doctor-badge-exp"><i class="bi bi-star-fill text-warning me-1"></i> 12+ Yrs Exp</span>
                </div>
                <div class="tm-doctor-media-bottom">
                  <span class="badge bg-success-subtle text-success border border-success-subtle rounded-pill small px-2">
                    <span class="tm-live-pulse" style="width:6px;height:6px;"></span> Pediatric Unit
                  </span>
                  <span class="badge bg-white-20 text-white rounded-pill px-2 py-1 small">
                    BERA / OAE Lead
                  </span>
                </div>
              </div>
            </div>

            <!-- Doctor Body Content -->
            <div class="tm-doctor-body">
              <h4 class="tm-doctor-name">Dr. Saurabh Mishra</h4>
              <div class="tm-doctor-title">Pediatric Audiologist &amp; Speech Pathologist</div>
              
              <div class="tm-doctor-meta-strip">
                <span><i class="bi bi-mortarboard-fill text-orange me-1"></i> MASLP (Speech &amp; Hearing)</span>
                <span class="fw-semibold text-navy"><i class="bi bi-geo-alt-fill text-danger me-1"></i> Diagnostic Lab</span>
              </div>

              <p class="tm-doctor-bio">
                Expert in infant &amp; child hearing assessment (BERA/ABR, OAE), middle ear Tympanometry, speech delay rehabilitation, and chronic tinnitus notch therapy protocols.
              </p>
              
              <div class="tm-doctor-specialties">
                <span class="tm-doctor-spec-chip">BERA / ABR Test</span>
                <span class="tm-doctor-spec-chip">OAE Screening</span>
                <span class="tm-doctor-spec-chip">Child Speech Delay</span>
                <span class="tm-doctor-spec-chip">Tympanometry</span>
              </div>

              <div class="tm-doctor-avail">
                <i class="bi bi-calendar2-check text-orange"></i> Available for: Diagnostic Suite &amp; Speech Therapy
              </div>
            </div>

          </div>
        </div>

      </div>

      <!-- Bottom Reassurance Strip -->
      <div class="mt-4 p-3 p-md-4 rounded-4 border bg-light d-flex flex-column flex-md-row align-items-center justify-content-between gap-3 shadow-xs">
        <div class="d-flex align-items-center gap-3">
          <div class="rounded-circle bg-orange text-white d-flex align-items-center justify-content-center flex-shrink-0" style="width: 48px; height: 48px; font-size: 1.35rem;">
            <i class="bi bi-headset"></i>
          </div>
          <div>
            <h6 class="fw-bold text-navy mb-0">Unsure which specialist or test is right for you?</h6>
            <span class="small text-secondary">Our clinic coordinator will assess your symptoms and connect you with the appropriate doctor.</span>
          </div>
        </div>
        <div class="d-flex gap-2 text-nowrap">
          <a href="tel:<?= e(SITE_PHONE_RAW) ?>" class="tm-btn tm-btn-outline-navy btn-sm">
            <i class="bi bi-telephone-fill me-1"></i> Call <?= e(SITE_PHONE) ?>
          </a>
          <a href="https://wa.me/<?= e(SITE_WHATSAPP) ?>?text=<?= urlencode('Hello, I need help selecting the right hearing doctor.') ?>" target="_blank" rel="noopener" class="btn btn-sm btn-success rounded-pill px-3 d-flex align-items-center gap-1">
            <i class="bi bi-whatsapp"></i> Quick Advice
          </a>
        </div>
      </div>

    </div>
  </section>

  <!-- =========================================================================
       8. TRANSFORMING LIVES THROUGH CLEAR SOUND (OFFICIAL YOUTUBE VIDEOS STAGE)
       ========================================================================= -->
  <section class="tm-luxury-reels-stage border-top border-bottom" id="patientStoriesSection">
    <div class="container position-relative z-2">
      
      <!-- Luxury Section Header with YouTube Badge -->
      <div class="text-center max-w-700 mx-auto mb-4">
        <a href="https://www.youtube.com/@TurtleMaarksHearingHealth" target="_blank" class="tm-pill tm-pill-orange mb-2 text-decoration-none shadow-xs d-inline-flex align-items-center gap-2">
          <i class="bi bi-youtube text-danger fs-6"></i> Official YouTube Channel @TurtleMaarksHearingHealth
        </a>
        <h2 class="tm-section-title mb-2">Transforming Lives <span class="text-orange">Through Clear Sound</span></h2>
        <p class="tm-section-sub mb-3">Watch real patient stories, doctor consultations, and hearing transformations directly from our official clinic recordings.</p>
        
        <!-- Trust & Rating Metrics Capsule -->
        <div class="d-inline-flex flex-wrap align-items-center justify-content-center gap-2 gap-md-3 px-4 py-2 rounded-pill bg-white border shadow-xs small">
          <span class="fw-bold text-navy"><i class="bi bi-star-fill text-warning me-1"></i>4.9 Rating (480+ Reviews)</span>
          <span class="text-muted d-none d-md-inline">•</span>
          <span class="fw-bold text-orange">10,000+ Fitted</span>
        </div>
      </div>

      <!-- 4 Premier Cinematic Video Cards Grid -->
      <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-4 g-4 mb-4">
        
        <!-- Video Card 1: Wg Cdr SK Bhatia Shaurya Chakra -->
        <div class="col">
          <div class="tm-cinematic-card" onclick="openYouTubePatientVideo('vrF2ciqFfrg')">
            <div class="tm-cinematic-media">
              <img src="assets/images/youtube/yt_vrF2ciqFfrg.jpg" alt="Wg Cdr SK Bhatia Testimonial" class="tm-cinematic-thumb">
              <div class="tm-cinematic-overlay"></div>
              
              <div class="tm-cinematic-badges">
                <span class="tm-badge-yt"><i class="bi bi-youtube"></i> Patient Story</span>
                <span class="tm-badge-duration"><i class="bi bi-play-circle-fill me-1"></i> 3:12</span>
              </div>

              <div class="tm-cinematic-play">
                <i class="bi bi-play-fill"></i>
              </div>
            </div>

            <div class="tm-cinematic-body">
              <div class="tm-cinematic-topic"><i class="bi bi-patch-check-fill text-success"></i> Veteran Testimonial</div>
              <h5 class="tm-cinematic-title">Clear Speech Restored for Veteran</h5>
              <div class="tm-cinematic-speaker">Wg Cdr S.K. Bhatia (Shaurya Chakra) shares his journey of natural hearing clarity.</div>
              
              <div class="tm-cinematic-footer">
                <span class="tm-cinematic-loc"><i class="bi bi-geo-alt-fill text-orange"></i> Noida Clinic</span>
                <span class="tm-cinematic-action">Watch Story <i class="bi bi-arrow-right"></i></span>
              </div>
            </div>
          </div>
        </div>

        <!-- Video Card 2: Better Hearing for Better Social Life -->
        <div class="col">
          <div class="tm-cinematic-card" onclick="openYouTubePatientVideo('juOmFzxFBMg')">
            <div class="tm-cinematic-media">
              <img src="assets/images/youtube/yt_juOmFzxFBMg.jpg" alt="Better Hearing for Better Social Life" class="tm-cinematic-thumb">
              <div class="tm-cinematic-overlay"></div>
              
              <div class="tm-cinematic-badges">
                <span class="tm-badge-yt"><i class="bi bi-youtube"></i> Social Life</span>
                <span class="tm-badge-duration"><i class="bi bi-play-circle-fill me-1"></i> 1:15</span>
              </div>

              <div class="tm-cinematic-play">
                <i class="bi bi-play-fill"></i>
              </div>
            </div>

            <div class="tm-cinematic-body">
              <div class="tm-cinematic-topic"><i class="bi bi-patch-check-fill text-success"></i> Life Transformation</div>
              <h5 class="tm-cinematic-title">Better Hearing for Better Social Life</h5>
              <div class="tm-cinematic-speaker">Overcoming hearing loss to reconnect with family conversations and gatherings.</div>
              
              <div class="tm-cinematic-footer">
                <span class="tm-cinematic-loc"><i class="bi bi-geo-alt-fill text-orange"></i> Greater Noida</span>
                <span class="tm-cinematic-action">Watch Story <i class="bi bi-arrow-right"></i></span>
              </div>
            </div>
          </div>
        </div>

        <!-- Video Card 3: Do you feel People speak with slow voice? -->
        <div class="col">
          <div class="tm-cinematic-card" onclick="openYouTubePatientVideo('vkNae-Vqu0U')">
            <div class="tm-cinematic-media">
              <img src="assets/images/youtube/yt_vkNae-Vqu0U.jpg" alt="Recognizing Early Hearing Loss" class="tm-cinematic-thumb">
              <div class="tm-cinematic-overlay"></div>
              
              <div class="tm-cinematic-badges">
                <span class="tm-badge-yt"><i class="bi bi-youtube"></i> Doctor Advice</span>
                <span class="tm-badge-duration"><i class="bi bi-play-circle-fill me-1"></i> 1:45</span>
              </div>

              <div class="tm-cinematic-play">
                <i class="bi bi-play-fill"></i>
              </div>
            </div>

            <div class="tm-cinematic-body">
              <div class="tm-cinematic-topic"><i class="bi bi-patch-check-fill text-success"></i> Clinical Guidance</div>
              <h5 class="tm-cinematic-title">Do Voices Sound Whispered?</h5>
              <div class="tm-cinematic-speaker">Doctor explains early symptoms of frequency loss & importance of timely PTA tests.</div>
              
              <div class="tm-cinematic-footer">
                <span class="tm-cinematic-loc"><i class="bi bi-geo-alt-fill text-orange"></i> Gaur City Clinic</span>
                <span class="tm-cinematic-action">Watch Story <i class="bi bi-arrow-right"></i></span>
              </div>
            </div>
          </div>
        </div>

        <!-- Video Card 4: 1 in 5 People in India Has Hearing Loss -->
        <div class="col">
          <div class="tm-cinematic-card" onclick="openYouTubePatientVideo('gL8awpcAedw')">
            <div class="tm-cinematic-media">
              <img src="assets/images/youtube/yt_gL8awpcAedw.jpg" alt="Hearing Loss Awareness India" class="tm-cinematic-thumb">
              <div class="tm-cinematic-overlay"></div>
              
              <div class="tm-cinematic-badges">
                <span class="tm-badge-yt"><i class="bi bi-youtube"></i> Awareness</span>
                <span class="tm-badge-duration"><i class="bi bi-play-circle-fill me-1"></i> 1:30</span>
              </div>

              <div class="tm-cinematic-play">
                <i class="bi bi-play-fill"></i>
              </div>
            </div>

            <div class="tm-cinematic-body">
              <div class="tm-cinematic-topic"><i class="bi bi-patch-check-fill text-success"></i> Expert Insights</div>
              <h5 class="tm-cinematic-title">1 in 5 in India Has Hearing Loss</h5>
              <div class="tm-cinematic-speaker">Medical insights on invisible hearing aids, AI noise reduction & free home trials.</div>
              
              <div class="tm-cinematic-footer">
                <span class="tm-cinematic-loc"><i class="bi bi-geo-alt-fill text-orange"></i> Noida & G. Noida</span>
                <span class="tm-cinematic-action">Watch Story <i class="bi bi-arrow-right"></i></span>
              </div>
            </div>
          </div>
        </div>

      </div>

      <!-- YouTube Channel Subscribe & Extra Videos Banner -->
      <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 p-3 rounded-3 bg-white border shadow-xs mb-4 mx-auto" style="max-width: 880px;">
        <div class="d-flex align-items-center gap-3">
          <div class="rounded-circle bg-danger-subtle text-danger p-2 d-flex align-items-center justify-content-center" style="width: 44px; height: 44px;">
            <i class="bi bi-youtube fs-4"></i>
          </div>
          <div>
            <div class="fw-bold text-navy small">More Videos on Official YouTube Channel</div>
            <div class="text-secondary small">Official Theme Song • Gratification Ceremony • Patient Joy</div>
          </div>
        </div>
        <a href="https://www.youtube.com/@TurtleMaarksHearingHealth" target="_blank" class="tm-btn tm-btn-outline-navy btn-sm">
          <i class="bi bi-box-arrow-up-right me-1"></i> Visit YouTube Channel
        </a>
      </div>
    </div>
  </section>

  <!-- YOUTUBE PATIENT VIDEO PLAYER MODAL -->
  <div class="modal fade" id="tmYouTubeModal" tabindex="-1" aria-labelledby="tmYouTubeTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content rounded-4 border-0 shadow-2xl overflow-hidden bg-navy text-white">
        <div class="modal-header border-0 pb-0 px-4 pt-4 d-flex justify-content-between align-items-center">
          <div class="d-flex align-items-center gap-2">
            <span class="badge bg-danger text-white rounded-pill px-3 py-1 small" id="tmYouTubeBadge">
              <i class="bi bi-youtube me-1"></i> Patient Testimonial
            </span>
            <span class="text-white-50 small" id="tmYouTubeSpeaker">Wg Cdr S.K. Bhatia</span>
          </div>
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        
        <div class="modal-body p-3 p-md-4">
          <!-- 16:9 Responsive Video Iframe Wrapper -->
          <div class="ratio ratio-16x9 rounded-3 overflow-hidden shadow-lg mb-3 bg-black">
            <iframe id="tmYouTubeIframe" src="" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
          </div>

          <h5 class="fw-bold text-white mb-2" id="tmYouTubeTitle">Patient Hearing Transformation</h5>
          <p class="text-white-50 small mb-3" id="tmYouTubeDesc">Watch real patient stories and hearing transformations with Turtle Maarks.</p>

          <!-- Conversion Actions Inside Modal -->
          <div class="d-flex flex-wrap gap-2 justify-content-between align-items-center pt-2 border-top border-white-10">
            <div class="small text-white-50">
              <i class="bi bi-shield-check text-success me-1"></i> 7-Day Zero-Risk Free Trial Available
            </div>
            <div class="d-flex gap-2">
              <a href="https://wa.me/918130495476" target="_blank" class="tm-btn tm-btn-success btn-sm" id="tmYouTubeWaBtn">
                <i class="bi bi-whatsapp me-1"></i> Ask Doctor on WhatsApp
              </a>
              <a href="book-appointment.php" class="tm-btn tm-btn-primary btn-sm">
                <i class="bi bi-calendar2-check me-1"></i> Book Free Trial
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- 9. FREQUENTLY ASKED QUESTIONS -->
  <section class="py-5 bg-light border-top position-relative">
    <div class="container">
      
      <div class="row g-4 g-lg-5">
        
        <!-- Left: Section Head & Doctor Help Card -->
        <div class="col-lg-4">
          <div class="tm-faq-support-card">
            
            <span class="tm-pill tm-pill-orange mb-2"><i class="bi bi-question-circle-fill"></i> Clear Answers</span>
            <h2 class="tm-section-title mb-2">Frequently Asked <span class="text-orange">Questions</span></h2>
            <p class="text-secondary small mb-4">
              Everything you need to know about hearing aid options, pricing, features, and brand warranties.

            </p>

            <div class="card rounded-3 border bg-light-subtle p-3 mb-3">
              <div class="d-flex align-items-center gap-3 mb-2">
                <div class="rounded-circle bg-orange text-white d-flex align-items-center justify-content-center flex-shrink-0" style="width: 44px; height: 44px; font-size: 1.25rem;">
                  <i class="bi bi-person-heart"></i>
                </div>
                <div>
                  <h6 class="fw-bold text-navy mb-0">Have a Question?</h6>
                  <span class="text-muted small">Talk to our Audiologist</span>
                </div>
              </div>
              <p class="small text-secondary mb-3">
                Get honest, medical-grade guidance about your audiogram report or hearing devices.
              </p>

              <div class="d-grid gap-2">
                <a href="https://wa.me/<?= e(SITE_WHATSAPP) ?>?text=<?= urlencode('Hello Doctor, I have a question regarding hearing aids and testing.') ?>" target="_blank" rel="noopener" class="btn btn-sm btn-success rounded-pill d-flex align-items-center justify-content-center gap-2 py-2 fw-semibold">
                  <i class="bi bi-whatsapp"></i> WhatsApp
                </a>
                <a href="tel:<?= e(SITE_PHONE_RAW) ?>" class="tm-btn tm-btn-outline-navy btn-sm justify-content-center py-2">
                  <i class="bi bi-telephone-fill me-1"></i> Call <?= e(SITE_PHONE) ?>
                </a>
              </div>
            </div>

            <!-- Trust Points -->
            <div class="pt-2">
              <div class="d-flex align-items-center gap-2 small text-secondary mb-2">
                <i class="bi bi-patch-check-fill text-success fs-6"></i>
                <span>RCI-Certified Audiologists</span>
              </div>
              <div class="d-flex align-items-center gap-2 small text-secondary mb-2">
                <i class="bi bi-award-fill text-orange fs-6"></i>
                <span>100% Genuine International Warranty</span>
              </div>
            </div>

          </div>
        </div>

        <!-- Right: Modern Accordion Items -->
        <div class="col-lg-8">
          <div class="accordion" id="tmModernFaq">
            
            <!-- FAQ 1 -->
            <div class="tm-faq-item">
              <h2 class="accordion-header" id="headingFaq1">
                <button class="tm-faq-btn" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFaq1" aria-expanded="true" aria-controls="collapseFaq1">
                  <span class="d-flex align-items-center">
                    <span class="tm-faq-num">01</span>
                    <span>How do I know which hearing aid model is right for my hearing loss?</span>
                  </span>
                  <span class="tm-faq-icon-circle"><i class="bi bi-chevron-down"></i></span>
                </button>
              </h2>
              <div id="collapseFaq1" class="accordion-collapse collapse show" aria-labelledby="headingFaq1" data-bs-parent="#tmModernFaq">
                <div class="tm-faq-body">
                  Our RCI-certified audiologist conducts a comprehensive Pure Tone Audiometry (PTA) test in our calibrated sound-treated booth. Based on your exact audiogram frequency loss, ear canal anatomy, and lifestyle requirements (business meetings, active outdoors, or quiet home environment), we program and trial suitable digital models from premier global manufacturers including <strong>Phonak, Oticon, Signia, Widex, ReSound, and Starkey</strong>.
                </div>
              </div>
            </div>

            <!-- FAQ 2 -->
            <div class="tm-faq-item">
              <h2 class="accordion-header" id="headingFaq2">
                <button class="tm-faq-btn collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFaq2" aria-expanded="false" aria-controls="collapseFaq2">
                  <span class="d-flex align-items-center">
                    <span class="tm-faq-num">02</span>
                    <span>Can I take a free hearing aid trial before making a financial commitment?</span>
                  </span>
                  <span class="tm-faq-icon-circle"><i class="bi bi-chevron-down"></i></span>
                </button>
              </h2>
              <div id="collapseFaq2" class="accordion-collapse collapse" aria-labelledby="headingFaq2" data-bs-parent="#tmModernFaq">
                <div class="tm-faq-body">
                  Yes! Turtle Maarks provides a complimentary <strong>7-Day Free Trial</strong> program. You can wear the programmed digital hearing aids in your real-life environment—at home, watching television, during dining conversations, and on phone calls—to evaluate true speech clarity before making any final purchase decision.
                </div>
              </div>
            </div>

            <!-- FAQ 3 -->
            <div class="tm-faq-item">
              <h2 class="accordion-header" id="headingFaq3">
                <button class="tm-faq-btn collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFaq3" aria-expanded="false" aria-controls="collapseFaq3">
                  <span class="d-flex align-items-center">
                    <span class="tm-faq-num">03</span>
                    <span>What is the price range of digital hearing aids in India?</span>
                  </span>
                  <span class="tm-faq-icon-circle"><i class="bi bi-chevron-down"></i></span>
                </button>
              </h2>
              <div id="collapseFaq3" class="accordion-collapse collapse" aria-labelledby="headingFaq3" data-bs-parent="#tmModernFaq">
                <div class="tm-faq-body">
                  Digital hearing aids range from basic digital models (₹18,500 – ₹35,000) for quiet home use, to advanced mid-tier rechargeable models (₹45,000 – ₹1,25,000) with Bluetooth streaming, up to premium AI-driven deep neural network devices (₹1,50,000+) designed for complex noisy environments. We offer 0% interest EMI options and transparent brand price matching.
                </div>
              </div>
            </div>

            <!-- FAQ 4 -->
            <div class="tm-faq-item">
              <h2 class="accordion-header" id="headingFaq4">
                <button class="tm-faq-btn collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFaq4" aria-expanded="false" aria-controls="collapseFaq4">
                  <span class="d-flex align-items-center">
                    <span class="tm-faq-num">04</span>
                    <span>Do you provide doorstep home visits in Greater Noida West & Noida?</span>
                  </span>
                  <span class="tm-faq-icon-circle"><i class="bi bi-chevron-down"></i></span>
                </button>
              </h2>
              <div id="collapseFaq4" class="accordion-collapse collapse" aria-labelledby="headingFaq4" data-bs-parent="#tmModernFaq">
                <div class="tm-faq-body">
                  Yes, our senior audiologists provide doorstep consultations for elderly and mobility-impaired patients across Greater Noida West, Gaur City 1 & 2, Sector 4, Sector 50, 76, 121, 137, and Noida. We bring calibrated portable audiometers and trial hearing instruments straight to your living room.
                </div>
              </div>
            </div>

            <!-- FAQ 5 -->
            <div class="tm-faq-item">
              <h2 class="accordion-header" id="headingFaq5">
                <button class="tm-faq-btn collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFaq5" aria-expanded="false" aria-controls="collapseFaq5">
                  <span class="d-flex align-items-center">
                    <span class="tm-faq-num">05</span>
                    <span>What warranty and aftercare support is included with the hearing aids?</span>
                  </span>
                  <span class="tm-faq-icon-circle"><i class="bi bi-chevron-down"></i></span>
                </button>
              </h2>
              <div id="collapseFaq5" class="accordion-collapse collapse" aria-labelledby="headingFaq5" data-bs-parent="#tmModernFaq">
                <div class="tm-faq-body">
                  All instruments purchased through Turtle Maarks come backed by <strong>2 to 4 years of 100% authentic international manufacturer warranty</strong>. Furthermore, you receive <strong>lifetime free acoustic fine-tuning</strong>, firmware updates, hearing profile recalibrations, and routine vacuum dehumidification at our clinic.
                </div>
              </div>
            </div>

            <!-- FAQ 6 -->
            <div class="tm-faq-item">
              <h2 class="accordion-header" id="headingFaq6">
                <button class="tm-faq-btn collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFaq6" aria-expanded="false" aria-controls="collapseFaq6">
                  <span class="d-flex align-items-center">
                    <span class="tm-faq-num">06</span>
                    <span>How long does a comprehensive hearing test take, and is it painful?</span>
                  </span>
                  <span class="tm-faq-icon-circle"><i class="bi bi-chevron-down"></i></span>
                </button>
              </h2>
              <div id="collapseFaq6" class="accordion-collapse collapse" aria-labelledby="headingFaq6" data-bs-parent="#tmModernFaq">
                <div class="tm-faq-body">
                  The test is 100% non-invasive, completely painless, and takes approximately 30 to 45 minutes. It includes video otoscopic inspection of your ear canal, Pure Tone Audiometry (PTA) in our soundproof booth, and Tympanometry to check eardrum mobility. You receive your official medical audiogram report immediately upon completion.
                </div>
              </div>
            </div>

          </div>
        </div>

      </div>

    </div>
  </section>

  <!-- 10. LATEST BLOGS & ARTICLES -->
  <section class="py-5 bg-white border-top position-relative">
    <div class="container">
      <div class="d-flex flex-column flex-md-row align-items-md-end justify-content-between mb-4 gap-3">
        <div class="tm-section-head mb-0">
          <span class="tm-pill tm-pill-orange mb-2"><i class="bi bi-journal-text"></i> Hearing Health Journal</span>
          <h2 class="tm-section-title mb-1">Latest Insights & <span>Expert Guides</span></h2>
          <p class="tm-section-sub mb-0">Evidence-based audiological advice, hearing aid technology updates, and practical ear wellness tips</p>
        </div>
        <div class="d-none d-md-block">
          <a href="blogs.php" class="tm-btn tm-btn-outline-navy btn-sm">
            Explore All Insights <i class="bi bi-arrow-right ms-1"></i>
          </a>
        </div>
      </div>

      <!-- 4 Blog Cards Grid -->
      <div class="row g-4 row-cols-1 row-cols-md-2 row-cols-xl-4">
        
        <!-- Blog 1: Hearing Aid Selection Guide -->
        <div class="col">
          <article class="tm-blog-card shadow-xs">
            <div class="tm-blog-img-wrap">
              <img src="assets/images/services/hearing-aid-clinic-in-noida-extension.png" alt="How to Choose the Right Hearing Aid" loading="lazy">
              <span class="tm-blog-badge tm-blog-badge-orange">Buying Guide</span>
              <span class="tm-blog-read-time"><i class="bi bi-clock me-1"></i> 5 min read</span>
            </div>
            <div class="tm-blog-body">
              <div class="tm-blog-meta">
                <span class="tm-blog-meta-item"><i class="bi bi-calendar3 text-orange"></i> Aug 24, 2026</span>
                <span class="tm-blog-meta-item text-secondary">•</span>
                <span class="tm-blog-meta-item"><i class="bi bi-patch-check-fill text-success"></i> Turtle Maarks</span>
              </div>
              <h3 class="tm-blog-title">
                <a href="blog-detail.php?id=1" class="stretched-link">How to Choose the Right Hearing Aid: 2026 Digital Buyer Guide</a>
              </h3>
              <p class="tm-blog-desc">
                Discover the key differences between Invisible (IIC/CIC), Receiver-in-Canal (RIC), and Behind-the-Ear (BTE) models with AI-powered speech clarity.
              </p>
            </div>
            <div class="tm-blog-footer">
              <span class="tm-blog-link">
                Read Guide <i class="bi bi-arrow-right"></i>
              </span>
              <span class="tm-blog-author-avatar" title="Verified Audiologist"><i class="bi bi-person-fill"></i></span>
            </div>
          </article>
        </div>

        <!-- Blog 2: Pure Tone Audiometry & Diagnostics -->
        <div class="col">
          <article class="tm-blog-card shadow-xs">
            <div class="tm-blog-img-wrap">
              <img src="assets/images/services/hearing-test-in-noida-extension.png" alt="Understanding Pure Tone Audiometry & Speech Tests" loading="lazy">
              <span class="tm-blog-badge tm-blog-badge-navy">Diagnostics</span>
              <span class="tm-blog-read-time"><i class="bi bi-clock me-1"></i> 4 min read</span>
            </div>
            <div class="tm-blog-body">
              <div class="tm-blog-meta">
                <span class="tm-blog-meta-item"><i class="bi bi-calendar3 text-orange"></i> Aug 18, 2026</span>
                <span class="tm-blog-meta-item text-secondary">•</span>
                <span class="tm-blog-meta-item"><i class="bi bi-patch-check-fill text-success"></i> Turtle Maarks</span>
              </div>
              <h3 class="tm-blog-title">
                <a href="blog-detail.php?id=2" class="stretched-link">Understanding Pure Tone Audiometry (PTA) & Speech Tests</a>
              </h3>
              <p class="tm-blog-desc">
                Learn what actually happens inside a sound-treated booth during diagnostic testing and how to accurately interpret your frequency audiogram report.
              </p>
            </div>
            <div class="tm-blog-footer">
              <span class="tm-blog-link">
                Read Guide <i class="bi bi-arrow-right"></i>
              </span>
              <span class="tm-blog-author-avatar" title="Diagnostic Specialist"><i class="bi bi-person-fill"></i></span>
            </div>
          </article>
        </div>

        <!-- Blog 3: Age-Related Hearing Loss & Senior Care -->
        <div class="col">
          <article class="tm-blog-card shadow-xs">
            <div class="tm-blog-img-wrap">
              <img src="assets/images/services/audiologist-in-gaur-city.png" alt="5 Early Signs of Age-Related Hearing Loss" loading="lazy">
              <span class="tm-blog-badge tm-blog-badge-teal">Senior Care</span>
              <span class="tm-blog-read-time"><i class="bi bi-clock me-1"></i> 4 min read</span>
            </div>
            <div class="tm-blog-body">
              <div class="tm-blog-meta">
                <span class="tm-blog-meta-item"><i class="bi bi-calendar3 text-orange"></i> Aug 10, 2026</span>
                <span class="tm-blog-meta-item text-secondary">•</span>
                <span class="tm-blog-meta-item"><i class="bi bi-patch-check-fill text-success"></i> Turtle Maarks</span>
              </div>
              <h3 class="tm-blog-title">
                <a href="blog-detail.php?id=3" class="stretched-link">5 Early Signs of Age-Related Hearing Loss You Shouldn't Ignore</a>
              </h3>
              <p class="tm-blog-desc">
                Early intervention prevents cognitive fatigue and social isolation. Spot the subtle warning signs in daily conversation and learn about free home visits.
              </p>
            </div>
            <div class="tm-blog-footer">
              <span class="tm-blog-link">
                Read Guide <i class="bi bi-arrow-right"></i>
              </span>
              <span class="tm-blog-author-avatar" title="Senior Care Audiologist"><i class="bi bi-person-fill"></i></span>
            </div>
          </article>
        </div>

        <!-- Blog 4: Tinnitus & Sound Therapy -->
        <div class="col">
          <article class="tm-blog-card shadow-xs">
            <div class="tm-blog-img-wrap">
              <img src="assets/images/ear-model.jpg" alt="Managing Tinnitus: Sound Therapy & Modern Relief" loading="lazy">
              <span class="tm-blog-badge tm-blog-badge-green">Therapy</span>
              <span class="tm-blog-read-time"><i class="bi bi-clock me-1"></i> 6 min read</span>
            </div>
            <div class="tm-blog-body">
              <div class="tm-blog-meta">
                <span class="tm-blog-meta-item"><i class="bi bi-calendar3 text-orange"></i> Jul 29, 2026</span>
                <span class="tm-blog-meta-item text-secondary">•</span>
                <span class="tm-blog-meta-item"><i class="bi bi-patch-check-fill text-success"></i> Turtle Maarks</span>
              </div>
              <h3 class="tm-blog-title">
                <a href="blog-detail.php?id=4" class="stretched-link">Managing Tinnitus: Modern Sound Therapy & Digital Relief</a>
              </h3>
              <p class="tm-blog-desc">
                Effective clinical protocols and specialized notch therapy sound masking built into digital hearing aids to quiet persistent ringing in the ears.
              </p>
            </div>
            <div class="tm-blog-footer">
              <span class="tm-blog-link">
                Read Guide <i class="bi bi-arrow-right"></i>
              </span>
              <span class="tm-blog-author-avatar" title="Tinnitus Specialist"><i class="bi bi-person-fill"></i></span>
            </div>
          </article>
        </div>

      </div>

    </div>
  </section>

<?php include __DIR__ . '/includes/footer.php'; ?>
