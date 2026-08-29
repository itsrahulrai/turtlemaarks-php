<?php
/**
 * Patient Profile & Audiogram Records — Turtle Maarks
 */
$page_title       = 'Patient Profile & Audiogram Records — Turtle Maarks';
$page_description = 'Manage your medical profile and upload previous Pure Tone Audiogram (PTA) reports.';
$active_nav       = '';
include __DIR__ . '/includes/header.php';
?>

<section class="py-5 bg-light">
    <div class="container">
      <div class="row g-4">
        
        <!-- Sidebar -->
        <div class="col-lg-3">
          <div class="card rounded-4 border p-3 bg-white shadow-xs">
            <div class="text-center pb-3 border-bottom mb-3">
              <div class="bg-light rounded-circle d-inline-flex p-3 mb-2 text-navy">
                <i class="bi bi-person-fill fs-2"></i>
              </div>
              <h6 class="fw-bold text-navy mb-0">Anand Kumar</h6>
              <span class="small text-muted">Patient ID: TM-PAT-1082</span>
            </div>
            <div class="d-flex flex-column gap-1 small">
              <a href="account-dashboard.php" class="p-2 rounded-3 text-navy"><i class="bi bi-grid-fill me-2"></i> Overview Dashboard</a>
              <a href="account-orders.php" class="p-2 rounded-3 text-navy"><i class="bi bi-bag-check me-2"></i> My Device Orders</a>
              <a href="account-appointments.php" class="p-2 rounded-3 text-navy"><i class="bi bi-calendar2-check me-2"></i> Clinical Appointments</a>
              <a href="account-profile.php" class="p-2 rounded-3 bg-light text-orange fw-bold"><i class="bi bi-file-earmark-medical me-2"></i> Audiogram & Profile</a>
              <a href="index.php" class="p-2 rounded-3 text-danger"><i class="bi bi-box-arrow-right me-2"></i> Sign Out</a>
            </div>
          </div>
        </div>

        <!-- Main Form & Audiogram -->
        <div class="col-lg-9">
          <div class="card rounded-4 border p-4 bg-white shadow-xs mb-4">
            <h5 class="fw-bold text-navy mb-3">Patient Profile Information</h5>
            <form onsubmit="event.preventDefault(); showToast('Profile Updated', 'Patient details successfully saved.', 'success');">
              <div class="row g-3">
                <div class="col-md-6">
                  <label class="form-label small fw-bold text-navy">Patient Name</label>
                  <input type="text" class="form-control form-control-sm" value="Anand Kumar">
                </div>
                <div class="col-md-6">
                  <label class="form-label small fw-bold text-navy">Mobile Phone</label>
                  <input type="tel" class="form-control form-control-sm" value="+91 9876543210">
                </div>
                <div class="col-md-6">
                  <label class="form-label small fw-bold text-navy">Email Address</label>
                  <input type="email" class="form-control form-control-sm" value="anand.kumar@example.com">
                </div>
                <div class="col-md-6">
                  <label class="form-label small fw-bold text-navy">Age</label>
                  <input type="number" class="form-control form-control-sm" value="62">
                </div>
                <div class="col-12">
                  <button type="submit" class="tm-btn tm-btn-primary tm-btn-sm"><i class="bi bi-check2"></i> Save Changes</button>
                </div>
              </div>
            </form>
          </div>

          <!-- Audiogram Upload Section -->
          <div class="card rounded-4 border p-4 bg-white shadow-xs">
            <h5 class="fw-bold text-navy mb-1">Audiogram Reports & Medical Files</h5>
            <p class="text-secondary small mb-3">Upload your previous audiometry or ENT prescription reports (PDF, JPG, PNG).</p>

            <div class="p-4 border-2 border-dashed rounded-3 text-center bg-light mb-3 cursor-pointer" onclick="document.getElementById('audiogramFileInput').click()">
              <i class="bi bi-cloud-arrow-up-fill text-orange fs-2 d-block mb-1"></i>
              <strong class="text-navy small d-block">Click to Upload Audiogram Report</strong>
              <span class="text-muted small">Supports PDF, PNG, JPEG up to 15MB</span>
              <input type="file" id="audiogramFileInput" class="d-none" onchange="showToast('File Uploaded', 'Audiogram report added to your patient record.', 'success')">
            </div>

            <div class="border rounded-3 p-3 d-flex justify-content-between align-items-center small">
              <div class="d-flex align-items-center gap-2">
                <i class="bi bi-file-earmark-pdf-fill text-danger fs-4"></i>
                <div>
                  <strong class="text-navy d-block">Audiogram_Report_Aug2026.pdf</strong>
                  <span class="text-muted">Pure Tone Audiogram (PTA) • 1.4 MB</span>
                </div>
              </div>
              <button class="btn btn-sm btn-outline-secondary"><i class="bi bi-download"></i> View</button>
            </div>
          </div>

        </div>

      </div>
    </div>
  </section>

<?php include __DIR__ . '/includes/footer.php'; ?>
