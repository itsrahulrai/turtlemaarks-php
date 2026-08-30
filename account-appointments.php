<?php
/**
 * My Appointments — Turtle Maarks Patient Portal
 */
$page_title       = 'My Appointments — Turtle Maarks Patient Portal';
$page_description = 'View and manage scheduled audiology appointments, hearing tests, and clinic visits.';
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
          <span class="tm-breadcrumb-current" aria-current="page">Appointments</span>
        </div>
      </nav>
      <h1 class="display-6 fw-bold text-white mb-1 font-heading">My Clinical Appointments</h1>
      <p class="text-white-50 mx-auto small mb-0" style="max-width: 580px;">View, reschedule, and track your scheduled diagnostic tests and consultations.</p>
    </div>
  </section>

<?php
// Complete Appointment History Repository
$past_appointments = [
    [
        'id'          => 'TM-APT-78104',
        'date_title'  => 'August 22, 2026, 03:00 PM',
        'date'        => 'Aug 22, 2026',
        'slot'        => '03:00 PM – 03:30 PM',
        'reporting'   => '02:45 PM',
        'service'     => 'Pure Tone Audiometry (PTA) Diagnostic Baseline Assessment',
        'doctor'      => 'Dr. Ritu Verma (Chief Clinical Audiologist)',
        'cabin'       => 'Soundproof Suite 1',
        'fee'         => '₹1,200 (Paid)',
        'status_badge'=> 'bg-success-subtle text-success',
        'status_text' => 'Completed &bull; Audiogram Verified',
        'details'     => 'Result: Right Ear 48dB Moderate Loss, Left Ear Normal (25dB)'
    ],
    [
        'id'          => 'TM-APT-65291',
        'date_title'  => 'July 10, 2026, 11:30 AM',
        'date'        => 'July 10, 2026',
        'slot'        => '11:30 AM – 11:45 AM',
        'reporting'   => '11:15 AM',
        'service'     => 'HD Video Otoscopy & Ear Canal Examination',
        'doctor'      => 'Dr. Ritu Verma (Chief Clinical Audiologist)',
        'cabin'       => 'Consultation Chamber 1',
        'fee'         => 'Free (Clinical Package)',
        'status_badge'=> 'bg-success-subtle text-success',
        'status_text' => 'Completed',
        'details'     => 'Cerumen wax debris removed safely; tympanic membrane healthy.'
    ],
    [
        'id'          => 'TM-APT-51928',
        'date_title'  => 'May 15, 2026, 04:00 PM',
        'date'        => 'May 15, 2026',
        'slot'        => '04:00 PM – 04:35 PM',
        'reporting'   => '03:45 PM',
        'service'     => 'Speech Recognition Threshold (SRT) & Speech Discrimination Assessment',
        'doctor'      => 'Dr. Ritu Verma (Chief Clinical Audiologist)',
        'cabin'       => 'Soundproof Suite 2',
        'fee'         => '₹1,500 (Paid)',
        'status_badge'=> 'bg-light text-navy border',
        'status_text' => 'Completed',
        'details'     => 'Word recognition score evaluated at 84% with binaural amplification.'
    ],
    [
        'id'          => 'TM-APT-40182',
        'date_title'  => 'March 02, 2026, 10:30 AM',
        'date'        => 'March 02, 2026',
        'slot'        => '10:30 AM – 11:15 AM',
        'reporting'   => '10:15 AM',
        'service'     => 'Annual Comprehensive Audiology Health Check & Tinnitus Mapping',
        'doctor'      => 'Dr. Ritu Verma (Chief Clinical Audiologist)',
        'cabin'       => 'Consultation Chamber 2',
        'fee'         => 'Free (Senior Citizen Scheme)',
        'status_badge'=> 'bg-light text-muted border',
        'status_text' => 'Completed',
        'details'     => 'Bilateral high-frequency pitch matching completed.'
    ],
    [
        'id'          => 'TM-APT-31089',
        'date_title'  => 'December 18, 2025, 02:00 PM',
        'date'        => 'Dec 18, 2025',
        'slot'        => '02:00 PM – 02:40 PM',
        'reporting'   => '01:45 PM',
        'service'     => 'Hearing Aid Real-Ear Measurement (REM) & Acoustic Fine Tuning',
        'doctor'      => 'Dr. Ritu Verma (Chief Clinical Audiologist)',
        'cabin'       => 'Soundproof Suite 1',
        'fee'         => 'Free (Post-Fitting Follow-up)',
        'status_badge'=> 'bg-light text-muted border',
        'status_text' => 'Completed',
        'details'     => 'Target speech clarity curve optimized for noisy restaurant environments.'
    ]
];

// Pagination logic for past appointments (2 items per page)
$apt_per_page       = 2;
$total_past_apts    = count($past_appointments);
$total_apt_pages    = max(1, (int) ceil($total_past_apts / $apt_per_page));
$current_apt_page   = max(1, min($total_apt_pages, (int) ($_GET['page'] ?? 1)));
$apt_offset         = ($current_apt_page - 1) * $apt_per_page;
$display_past_apts  = array_slice($past_appointments, $apt_offset, $apt_per_page);
?>

  <section class="py-5 bg-light">
    <div class="container">
      <div class="row g-4">
        
        <!-- Shared Sidebar Component -->
        <?php 
        $active_tab = 'appointments';
        include __DIR__ . '/includes/account-sidebar.php'; 
        ?>

        <!-- Appointments List -->
        <div class="col-lg-9">
          
          <!-- Header Card -->
          <div class="card rounded-4 border p-4 bg-white shadow-xs mb-4">
            <div class="d-flex flex-wrap justify-content-between align-items-center gap-3">
              <div>
                <h5 class="fw-bold text-navy mb-1 font-heading">Clinical Appointments &amp; Passes</h5>
                <p class="text-secondary small mb-0">Manage scheduled in-clinic sound booth visits, doctor consultations, and download clinic passes.</p>
              </div>
              <a href="<?= e(url('book-appointment.php')) ?>" class="tm-btn tm-btn-primary tm-btn-sm shadow-sm">
                <i class="bi bi-calendar-plus me-1"></i> Book New Appointment
              </a>
            </div>
          </div>

          <!-- UPCOMING APPOINTMENT (HIGHLIGHTED) -->
          <div class="card rounded-4 border border-primary border-opacity-25 p-4 bg-white shadow-sm mb-4 position-relative overflow-hidden">
            <div class="position-absolute top-0 end-0 bg-primary text-white px-4 py-1 small fw-bold rounded-bottom-start shadow-xs" style="font-size: 0.75rem;">
              UPCOMING VISIT
            </div>

            <div class="d-flex flex-wrap justify-content-between align-items-center border-bottom pb-3 mb-3">
              <div>
                <span class="badge bg-success-subtle text-success fw-bold px-3 py-1 small mb-1">
                  <i class="bi bi-check-circle-fill me-1"></i> Confirmed Slot &bull; Token #04
                </span>
                <div class="small text-muted">
                  Booking ID: <strong class="text-navy">TM-APT-89421</strong>
                </div>
              </div>
            </div>

            <!-- Main Appointment Details -->
            <div class="row g-3 mb-4">
              <div class="col-md-6">
                <h6 class="fw-bold text-navy mb-2 font-heading">
                  Comprehensive Hearing Assessment &amp; 7-Day Free Trial Fitting
                </h6>
                <div class="d-flex flex-column gap-2 small text-secondary">
                  <div>
                    <i class="bi bi-calendar-check-fill text-orange me-2"></i>
                    <strong>Date:</strong> Tomorrow, Monday, August 31, 2026
                  </div>
                  <div>
                    <i class="bi bi-clock-fill text-orange me-2"></i>
                    <strong>Time Slot:</strong> 11:00 AM – 11:45 AM (Reporting: 10:45 AM)
                  </div>
                  <div>
                    <i class="bi bi-person-badge-fill text-primary me-2"></i>
                    <strong>Doctor:</strong> Dr. Ritu Verma (Chief Clinical Audiologist)
                  </div>
                  <div>
                    <i class="bi bi-door-open-fill text-navy me-2"></i>
                    <strong>Chamber:</strong> Soundproof Audiometry Suite 2
                  </div>
                </div>
              </div>

              <div class="col-md-6">
                <div class="p-3 bg-light rounded-3 border small">
                  <div class="fw-bold text-navy mb-1"><i class="bi bi-geo-alt-fill text-danger me-1"></i> Clinic Venue:</div>
                  <div class="text-secondary mb-2">
                    Turtle Maarks Hearing Clinic, 15th Floor, Suite 1509, Gaur City Mall, Greater Noida West, UP 201306
                  </div>
                  <div class="d-flex align-items-center gap-2 extra-small text-muted border-top pt-2">
                    <i class="bi bi-info-circle text-primary"></i>
                    <span>Please bring any previous ENT prescriptions or audiogram sheets.</span>
                  </div>
                </div>
              </div>
            </div>

            <!-- Action Buttons -->
            <div class="d-flex flex-wrap justify-content-between align-items-center gap-2 border-top pt-3">
              <span class="badge bg-light text-navy border px-2 py-1 extra-small">
                <i class="bi bi-tag-fill text-success me-1"></i> Consultation Fee: <strong>100% Free</strong>
              </span>

              <div class="d-flex flex-wrap gap-2">
                <button type="button" class="tm-btn tm-btn-primary tm-btn-sm" onclick="openSlipModal('TM-APT-89421', 'Comprehensive Hearing Assessment & 7-Day Trial Fitting', 'Aug 31, 2026', '11:00 AM – 11:45 AM', '10:45 AM', 'Dr. Ritu Verma', 'Soundproof Suite 2', 'Free / Patient Program')">
                  <i class="bi bi-ticket-perforated-fill me-1"></i> View &amp; Print Appointment Slip
                </button>
                <a href="https://maps.google.com/?q=Gaur+City+Mall+Greater+Noida" target="_blank" class="tm-btn tm-btn-outline tm-btn-sm">
                  <i class="bi bi-map-fill me-1"></i> Directions
                </a>
                <button type="button" class="btn btn-outline-secondary btn-sm" onclick="alert('Reschedule request registered. Our clinic receptionist will contact you via WhatsApp / Call within 30 minutes.');">
                  <i class="bi bi-arrow-repeat me-1"></i> Reschedule
                </button>
              </div>
            </div>
          </div>

          <!-- PAST APPOINTMENTS SECTION -->
          <div class="card rounded-4 border p-4 bg-white shadow-xs">
            <div class="d-flex flex-wrap justify-content-between align-items-center mb-3">
              <h6 class="fw-bold text-navy mb-0 font-heading">
                <i class="bi bi-clock-history text-orange me-2"></i> Past Consultation History
              </h6>
              <span class="badge bg-light text-navy border small">
                Showing <?= count($display_past_apts) ?> of <?= $total_past_apts ?> Records
              </span>
            </div>

            <!-- Dynamic Past Appointments Listing -->
            <?php foreach ($display_past_apts as $apt): ?>
            <div class="border rounded-3 p-3 mb-3">
              <div class="d-flex flex-wrap justify-content-between align-items-center border-bottom pb-2 mb-2 gap-2 small">
                <div>
                  <strong class="text-navy"><?= e($apt['id']) ?></strong> &bull; <span class="text-muted"><?= e($apt['date_title']) ?></span>
                </div>
                <span class="badge <?= $apt['status_badge'] ?>"><?= $apt['status_text'] ?></span>
              </div>
              <div class="row align-items-center g-2">
                <div class="col-md-8">
                  <div class="fw-semibold text-navy small"><?= e($apt['service']) ?></div>
                  <div class="extra-small text-muted">Consultant: <?= e($apt['doctor']) ?> &bull; <?= e($apt['details']) ?></div>
                </div>
                <div class="col-md-4 text-md-end">
                  <button type="button" class="tm-btn tm-btn-outline tm-btn-sm py-1" onclick="openSlipModal('<?= e($apt['id']) ?>', '<?= js_str($apt['service']) ?>', '<?= e($apt['date']) ?>', '<?= e($apt['slot']) ?>', '<?= e($apt['reporting']) ?>', '<?= js_str($apt['doctor']) ?>', '<?= js_str($apt['cabin']) ?>', '<?= js_str($apt['fee']) ?>')">
                    <i class="bi bi-ticket-detailed me-1"></i> View Slip
                  </button>
                </div>
              </div>
            </div>
            <?php endforeach; ?>

            <!-- PAGINATION (SAME STYLE AS BLOGS PAGE) -->
            <?php if ($total_apt_pages > 1): ?>
            <nav aria-label="Appointments Pagination" class="d-flex justify-content-center mt-4">
              <ul class="tm-pagination shadow-xs rounded-3 p-1 bg-white border">
                
                <!-- Previous Button -->
                <li class="page-item <?= ($current_apt_page <= 1) ? 'disabled' : '' ?>">
                  <a class="page-link" href="<?= ($current_apt_page <= 1) ? '#' : 'account-appointments.php?page=' . ($current_apt_page - 1) ?>" aria-label="Previous">
                    <i class="bi bi-chevron-left"></i>
                  </a>
                </li>

                <!-- Numbered Pages -->
                <?php for ($p = 1; $p <= $total_apt_pages; $p++): ?>
                  <li class="page-item <?= ($p === $current_apt_page) ? 'active' : '' ?>">
                    <a class="page-link" href="account-appointments.php?page=<?= $p ?>"><?= $p ?></a>
                  </li>
                <?php endfor; ?>

                <!-- Next Button -->
                <li class="page-item <?= ($current_apt_page >= $total_apt_pages) ? 'disabled' : '' ?>">
                  <a class="page-link" href="<?= ($current_apt_page >= $total_apt_pages) ? '#' : 'account-appointments.php?page=' . ($current_apt_page + 1) ?>" aria-label="Next">
                    <i class="bi bi-chevron-right"></i>
                  </a>
                </li>

              </ul>
            </nav>
            <?php endif; ?>

          </div>

        </div>

      </div>
    </div>
  </section>

  <!-- =========================================================================
       OFFICIAL APPOINTMENT SLIP / CLINIC PASS MODAL
       ========================================================================= -->
  <div class="modal fade" id="slipModal" tabindex="-1" aria-labelledby="slipModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
      <div class="modal-content border-0 rounded-4 shadow-lg">
        
        <div class="modal-header border-0 pb-0 no-print">
          <h6 class="modal-title fw-bold text-navy" id="slipModalLabel">
            <i class="bi bi-ticket-perforated-fill text-orange me-1"></i> Official Patient Appointment Slip
          </h6>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <div class="modal-body p-4 p-md-5">
          <div class="tm-appointment-slip" id="slipPrintArea">
            <i class="bi bi-heart-pulse-fill tm-slip-watermark"></i>

            <!-- Slip Header -->
            <div class="d-flex flex-wrap justify-content-between align-items-center border-bottom border-2 pb-3 mb-3">
              <div>
                <img src="assets/images/logo.png" alt="Turtle Maarks" style="height: 44px;" class="mb-1">
                <div class="fw-bold text-navy fs-6">TURTLE MAARKS HEARING HEALTH CLINIC</div>
                <div class="extra-small text-muted">15th Floor, Suite 1509, Gaur City Mall, Greater Noida West &bull; +91 8130495476</div>
              </div>
              <div class="text-md-end mt-2 mt-md-0">
                <div class="badge bg-orange text-white px-3 py-2 fs-6">CLINICAL PASS</div>
                <div class="small text-muted mt-1">Ref: <strong id="slipId" class="text-navy">TM-APT-89421</strong></div>
              </div>
            </div>

            <!-- Patient and QR Info Row -->
            <div class="row g-3 align-items-center mb-4 p-3 bg-light rounded-3 border">
              <div class="col-sm-8">
                <div class="row g-2 small">
                  <div class="col-6">
                    <span class="text-muted extra-small d-block">Patient Name:</span>
                    <strong class="text-navy fs-6">Anand Kumar</strong>
                  </div>
                  <div class="col-6">
                    <span class="text-muted extra-small d-block">Patient ID:</span>
                    <strong class="text-navy">TM-PAT-1082</strong>
                  </div>
                  <div class="col-6">
                    <span class="text-muted extra-small d-block">Age / Gender:</span>
                    <span class="text-navy">62 Yrs &bull; Male (Senior Citizen)</span>
                  </div>
                  <div class="col-6">
                    <span class="text-muted extra-small d-block">Mobile:</span>
                    <span class="text-navy">+91 9876543210</span>
                  </div>
                </div>
              </div>
              <div class="col-sm-4 text-center text-sm-end">
                <div class="tm-qr-box d-inline-flex">
                  <i class="bi bi-qr-code text-navy" style="font-size: 3.2rem;"></i>
                  <span class="extra-small text-muted" style="font-size: 0.65rem;">SCAN AT DESK</span>
                </div>
              </div>
            </div>

            <!-- Consultation Details Table -->
            <div class="card border rounded-3 p-3 mb-3 bg-white">
              <h6 class="fw-bold text-navy mb-2 border-bottom pb-2 small text-uppercase">Consultation Schedule</h6>
              <div class="row g-3 small">
                <div class="col-md-6">
                  <span class="text-muted extra-small d-block">Clinical Service:</span>
                  <strong id="slipService" class="text-navy">Comprehensive Hearing Assessment &amp; Trial Fitting</strong>
                </div>
                <div class="col-md-6">
                  <span class="text-muted extra-small d-block">Assigned Specialist:</span>
                  <strong id="slipDoctor" class="text-navy">Dr. Ritu Verma (RCI Audiologist)</strong>
                </div>
                <div class="col-sm-4">
                  <span class="text-muted extra-small d-block">Appointment Date:</span>
                  <strong id="slipDate" class="text-orange">Aug 31, 2026</strong>
                </div>
                <div class="col-sm-4">
                  <span class="text-muted extra-small d-block">Consultation Slot:</span>
                  <strong id="slipSlot" class="text-navy">11:00 AM – 11:45 AM</strong>
                </div>
                <div class="col-sm-4">
                  <span class="text-muted extra-small d-block">Reporting Time:</span>
                  <strong id="slipReporting" class="text-danger">10:45 AM (15m prior)</strong>
                </div>
                <div class="col-sm-6">
                  <span class="text-muted extra-small d-block">Chamber / Sound Suite:</span>
                  <span id="slipCabin" class="text-navy fw-semibold">Soundproof Suite 2</span>
                </div>
                <div class="col-sm-6">
                  <span class="text-muted extra-small d-block">Consultation Fee:</span>
                  <span id="slipFee" class="badge bg-success-subtle text-success">100% Free / Trial</span>
                </div>
              </div>
            </div>

            <!-- Instructions & Guidelines -->
            <div class="p-3 bg-light-subtle border rounded-3 small">
              <div class="fw-bold text-navy mb-1"><i class="bi bi-shield-check text-success me-1"></i> Patient Instructions for Hearing Evaluation:</div>
              <ul class="mb-0 ps-3 extra-small text-muted" style="font-size: 0.78rem;">
                <li>Please report 15 minutes before the scheduled time slot for baseline blood pressure check and registration.</li>
                <li>Avoid loud sound exposures (earphones/concerts) for 12 hours prior to the Pure Tone Audiometry test.</li>
                <li>Wheelchair access is available from Gaur City Mall Parking Elevators direct to 15th Floor.</li>
              </ul>
            </div>

            <!-- Footer Stamp -->
            <div class="d-flex justify-content-between align-items-center pt-3 mt-3 border-top extra-small text-muted">
              <span>Authorized System Generated Pass &bull; Turtle Maarks Clinical Registry</span>
              <span class="fw-semibold text-navy">Desk Reception: +91 8130495476</span>
            </div>

          </div>
        </div>

        <div class="modal-footer border-top bg-light no-print">
          <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
          <button type="button" class="tm-btn tm-btn-primary tm-btn-sm" onclick="window.print()">
            <i class="bi bi-printer-fill me-1"></i> Print / Save Slip
          </button>
        </div>

      </div>
    </div>
  </div>

  <!-- JavaScript for dynamic slip population -->
  <script>
    function openSlipModal(refId, service, date, slot, reporting, doctor, cabin, fee) {
      document.getElementById('slipId').innerText = refId;
      document.getElementById('slipService').innerText = service;
      document.getElementById('slipDate').innerText = date;
      document.getElementById('slipSlot').innerText = slot;
      document.getElementById('slipReporting').innerText = reporting;
      document.getElementById('slipDoctor').innerText = doctor;
      document.getElementById('slipCabin').innerText = cabin;
      document.getElementById('slipFee').innerText = fee;

      const modal = new bootstrap.Modal(document.getElementById('slipModal'));
      modal.show();
    }
  </script>

<?php include __DIR__ . '/includes/footer.php'; ?>
