<?php
/**
 * Patient Profile & Audiogram Records — Turtle Maarks
 */
$page_title       = 'Patient Profile & Audiogram Records — Turtle Maarks';
$page_description = 'Manage your medical profile and upload previous Pure Tone Audiogram (PTA) reports.';
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
          <span class="tm-breadcrumb-current" aria-current="page">Profile &amp; Audiograms</span>
        </div>
      </nav>
      <h1 class="display-6 fw-bold text-white mb-1 font-heading">Patient Profile &amp; Audiograms</h1>
      <p class="text-white-50 mx-auto small mb-0" style="max-width: 580px;">Manage your medical profile and upload previous Pure Tone Audiogram (PTA) reports.</p>
    </div>
  </section>

  <section class="py-5 bg-light">
    <div class="container">
      <div class="row g-4">
        
        <!-- Shared Sidebar Component -->
        <?php 
        $active_tab = 'profile';
        include __DIR__ . '/includes/account-sidebar.php'; 
        ?>

        <!-- Main Profile & Medical Content -->
        <div class="col-lg-9">
          
          <!-- Profile Header Card -->
          <div class="card rounded-4 border p-4 bg-white shadow-xs mb-4">
            <div class="d-flex flex-wrap justify-content-between align-items-center gap-3">
              <div>
                <h5 class="fw-bold text-navy mb-1 font-heading">Patient Profile &amp; Medical Records</h5>
                <p class="text-secondary small mb-0">Update personal demographics, emergency contacts, audiogram reports, and security settings.</p>
              </div>
              <span class="badge bg-success-subtle text-success p-2 px-3 small">
                <i class="bi bi-shield-check me-1"></i> Patient Record ID: <strong>TM-PAT-1082</strong>
              </span>
            </div>
          </div>

          <!-- SECTION 1: PERSONAL DEMOGRAPHICS & EMERGENCY CONTACT -->
          <div class="card rounded-4 border p-4 bg-white shadow-xs mb-4">
            <h6 class="fw-bold text-navy mb-3 font-heading border-bottom pb-2">
              <i class="bi bi-person-lines-fill text-orange me-2"></i> 1. Personal Demographics &amp; Contact
            </h6>

            <form onsubmit="event.preventDefault(); alert('Profile information updated successfully!');">
              <div class="row g-3">
                <div class="col-md-6">
                  <label class="form-label small fw-bold text-navy">Full Patient Name *</label>
                  <input type="text" class="form-control" value="Anand Kumar" required>
                </div>
                <div class="col-md-3">
                  <label class="form-label small fw-bold text-navy">Age (Years) *</label>
                  <input type="number" class="form-control" value="62" required>
                </div>
                <div class="col-md-3">
                  <label class="form-label small fw-bold text-navy">Gender *</label>
                  <select class="form-select">
                    <option value="Male" selected>Male</option>
                    <option value="Female">Female</option>
                    <option value="Other">Other</option>
                  </select>
                </div>

                <div class="col-md-6">
                  <label class="form-label small fw-bold text-navy">WhatsApp / Mobile Phone *</label>
                  <div class="input-group">
                    <span class="input-group-text bg-light text-muted small">+91</span>
                    <input type="tel" class="form-control" value="9876543210" required>
                  </div>
                </div>

                <div class="col-md-6">
                  <label class="form-label small fw-bold text-navy">Email Address *</label>
                  <input type="email" class="form-control" value="anand.kumar@example.com" required>
                </div>

                <div class="col-12">
                  <label class="form-label small fw-bold text-navy">Residential Address (For Senior Citizen Home Visits) *</label>
                  <input type="text" class="form-control" value="Flat 1402, Tower 4, Gaur Saundaryam, Techzone 4, Greater Noida West, UP 201306" required>
                </div>

                <div class="col-md-6">
                  <label class="form-label small fw-bold text-navy">Emergency Contact Person Name</label>
                  <input type="text" class="form-control" value="Rohan Kumar (Son)">
                </div>

                <div class="col-md-6">
                  <label class="form-label small fw-bold text-navy">Emergency Contact Phone</label>
                  <input type="tel" class="form-control" value="+91 9811223344">
                </div>

                <div class="col-12 text-end pt-2">
                  <button type="submit" class="tm-btn tm-btn-primary tm-btn-sm">
                    <i class="bi bi-check2-circle me-1"></i> Save Demographics
                  </button>
                </div>
              </div>
            </form>
          </div>

          <!-- SECTION 2: AUDIOGRAM DATA & MEDICAL TEST REPOSITORY -->
          <div class="card rounded-4 border p-4 bg-white shadow-xs mb-4">
            <h6 class="fw-bold text-navy mb-3 font-heading border-bottom pb-2">
              <i class="bi bi-file-earmark-medical-fill text-primary me-2"></i> 2. Audiogram Reports &amp; Verified Medical Files
            </h6>

            <!-- Audiogram Frequency Summary -->
            <div class="p-3 bg-light rounded-3 border mb-4">
              <div class="d-flex justify-content-between align-items-center mb-2">
                <span class="fw-bold text-navy small"><i class="bi bi-activity text-danger me-1"></i> Latest Pure Tone Threshold Summary (PTA - Aug 2026):</span>
                <span class="badge bg-light text-navy border small">ANSI Calibrated</span>
              </div>
              <div class="table-responsive">
                <table class="table table-sm table-bordered bg-white text-center mb-0 extra-small" style="font-size: 0.8rem;">
                  <thead class="table-light">
                    <tr>
                      <th class="text-start">Ear / Frequency</th>
                      <th>250 Hz</th>
                      <th>500 Hz</th>
                      <th>1000 Hz</th>
                      <th>2000 Hz</th>
                      <th>4000 Hz</th>
                      <th>8000 Hz</th>
                      <th>Clinical Diagnosis</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td class="text-start fw-bold text-danger"><i class="bi bi-circle-fill text-danger me-1"></i> Right Ear (Red)</td>
                      <td>30 dB</td>
                      <td>40 dB</td>
                      <td>45 dB</td>
                      <td>50 dB</td>
                      <td>55 dB</td>
                      <td>60 dB</td>
                      <td><span class="badge bg-warning-subtle text-warning">Moderate SNHL (48dB)</span></td>
                    </tr>
                    <tr>
                      <td class="text-start fw-bold text-primary"><i class="bi bi-x-lg text-primary me-1"></i> Left Ear (Blue)</td>
                      <td>20 dB</td>
                      <td>20 dB</td>
                      <td>25 dB</td>
                      <td>25 dB</td>
                      <td>30 dB</td>
                      <td>30 dB</td>
                      <td><span class="badge bg-success-subtle text-success">Normal Limits (25dB)</span></td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>

            <!-- Upload Zone -->
            <div class="p-4 border-2 border-dashed rounded-3 text-center bg-light mb-4 cursor-pointer" onclick="document.getElementById('audiogramFileInput').click()">
              <i class="bi bi-cloud-arrow-up-fill text-orange fs-1 d-block mb-1"></i>
              <strong class="text-navy small d-block">Click or Drag to Upload Medical / ENT Prescription</strong>
              <span class="text-muted extra-small">Supports PDF, JPEG, PNG scans up to 15MB. Verified by clinic audiologist within 2 hours.</span>
              <input type="file" id="audiogramFileInput" class="d-none" onchange="alert('Medical report file attached! Our clinical audiologist will review it before your session.');">
            </div>

            <!-- Uploaded Files List -->
            <h6 class="small fw-bold text-navy mb-2">Stored Verified Reports:</h6>
            <div class="d-flex flex-column gap-2">
              
              <!-- Report 1 -->
              <div class="p-3 border rounded-3 bg-white d-flex flex-wrap justify-content-between align-items-center gap-2">
                <div class="d-flex align-items-center gap-3">
                  <i class="bi bi-file-earmark-pdf-fill text-danger fs-3"></i>
                  <div>
                    <strong class="text-navy d-block small">Pure_Tone_Audiogram_Report_Aug2026.pdf</strong>
                    <span class="text-muted extra-small">Uploaded Aug 22, 2026 &bull; 1.4 MB &bull; Signed by Dr. Ritu Verma</span>
                  </div>
                </div>
                <div class="d-flex gap-2">
                  <button class="btn btn-sm btn-outline-primary" onclick="alert('Viewing doctor-certified audiogram sheet...');">
                    <i class="bi bi-eye me-1"></i> Preview
                  </button>
                  <button class="btn btn-sm btn-outline-secondary" onclick="alert('Downloading PDF to your device...');">
                    <i class="bi bi-download"></i>
                  </button>
                </div>
              </div>

              <!-- Report 2 -->
              <div class="p-3 border rounded-3 bg-white d-flex flex-wrap justify-content-between align-items-center gap-2">
                <div class="d-flex align-items-center gap-3">
                  <i class="bi bi-file-earmark-pdf-fill text-danger fs-3"></i>
                  <div>
                    <strong class="text-navy d-block small">Phonak_Infinio_4Yr_Warranty_Card.pdf</strong>
                    <span class="text-muted extra-small">Uploaded Aug 24, 2026 &bull; 850 KB &bull; Official Manufacturer Certificate</span>
                  </div>
                </div>
                <div class="d-flex gap-2">
                  <button class="btn btn-sm btn-outline-primary" onclick="alert('Viewing official warranty certificate...');">
                    <i class="bi bi-eye me-1"></i> Preview
                  </button>
                  <button class="btn btn-sm btn-outline-secondary" onclick="alert('Downloading warranty card...');">
                    <i class="bi bi-download"></i>
                  </button>
                </div>
              </div>

            </div>
          </div>

          <!-- SECTION 3: SECURITY & NOTIFICATION PREFERENCES -->
          <div class="card rounded-4 border p-4 bg-white shadow-xs">
            <h6 class="fw-bold text-navy mb-3 font-heading border-bottom pb-2">
              <i class="bi bi-shield-lock-fill text-success me-2"></i> 3. Security, Password &amp; Notifications
            </h6>

            <form onsubmit="event.preventDefault(); alert('Security settings and password updated successfully!');">
              <div class="row g-3 mb-3">
                <div class="col-md-4">
                  <label class="form-label small fw-bold text-navy">Current Password</label>
                  <input type="password" class="form-control" placeholder="••••••••">
                </div>
                <div class="col-md-4">
                  <label class="form-label small fw-bold text-navy">New Password</label>
                  <input type="password" class="form-control" placeholder="At least 6 characters">
                </div>
                <div class="col-md-4">
                  <label class="form-label small fw-bold text-navy">Confirm New Password</label>
                  <input type="password" class="form-control" placeholder="••••••••">
                </div>
              </div>

              <div class="p-3 bg-light rounded-3 mb-3">
                <div class="fw-bold text-navy small mb-2">Notification Preferences:</div>
                <div class="d-flex flex-column gap-2">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="prefWhatsapp" checked>
                    <label class="form-check-label small text-navy" for="prefWhatsapp">
                      Receive WhatsApp appointment reminders &amp; slot updates
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="prefInvoice" checked>
                    <label class="form-check-label small text-navy" for="prefInvoice">
                      Email copies of GST tax invoices and audiogram PDF reports
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="prefBattery" checked>
                    <label class="form-check-label small text-navy" for="prefBattery">
                      Quarterly reminders for hearing aid vacuum cleaning &amp; wax filter check
                    </label>
                  </div>
                </div>
              </div>

              <div class="text-end">
                <button type="submit" class="tm-btn tm-btn-primary tm-btn-sm">
                  <i class="bi bi-save me-1"></i> Update Security &amp; Preferences
                </button>
              </div>
            </form>
          </div>

        </div>

      </div>
    </div>
  </section>

<?php include __DIR__ . '/includes/footer.php'; ?>
