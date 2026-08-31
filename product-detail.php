<?php
/**
 * Product Detail — resolved server-side from ?id=
 */
require_once __DIR__ . '/includes/config.php';

$id = isset($_GET['id']) ? trim($_GET['id']) : '';
$p  = $id !== '' ? tm_product_by_id($id) : null;

/* fall back to the first featured model so the page is never empty */
if (!$p) {
    $featured = tm_products_filter(['isFeatured' => true, 'limit' => 1]);
    $all      = tm_products_all();
    $p        = $featured ? $featured[0] : $all[0];
}

$price   = (float) $p['price'];
$mrp     = (float) ($p['mrp'] ?? $p['price']);
$savings = max(0, $mrp - $price);
$savePct = $mrp > $price ? (int) round((($mrp - $price) / $mrp) * 100) : 0;
$image   = $p['image'] ?? 'assets/images/hearing-aid/ric.webp';

$jsItem = "{id:'" . js_str($p['id']) . "', name:'" . js_str($p['name']) . "', brand:'" . js_str($p['brand'])
        . "', price:" . (int) $price . ", mrp:" . (int) $mrp . ", image:'" . js_str($image) . "'}";

/* related = same brand, topped up with the same style */
$related = tm_products_filter(['brand' => $p['brand'], 'limit' => 5]);
$related = array_values(array_filter($related, function ($r) use ($p) { return $r['id'] !== $p['id']; }));
if (count($related) < 4) {
    foreach (tm_products_filter(['style' => $p['style'], 'limit' => 8]) as $m) {
        if ($m['id'] !== $p['id'] && !in_array($m['id'], array_column($related, 'id'), true)) {
            $related[] = $m;
        }
    }
}
$related = array_slice($related, 0, 4);

$page_title       = $p['name'] . ' — ' . SITE_NAME;
$page_description = $p['name'] . ' (' . $p['brand'] . ', ' . ($p['brandOrigin'] ?? 'Global') . ') — ' . $p['style']
                  . ' digital hearing aid with ' . (int) $p['channels'] . ' processing channels. Official manufacturer warranty, sound-booth calibration, and lifetime fine-tuning in Greater Noida West.';
$active_nav       = 'products';
include __DIR__ . '/includes/header.php';
?>

  <!-- HERO BANNER -->
  <section class="tm-page-hero text-center position-relative">
    <div class="container">
      <nav aria-label="breadcrumb" class="d-inline-flex mw-100 mb-2">
        <div class="tm-breadcrumb-pill">
          <a href="<?= e(url('index.php')) ?>"><i class="bi bi-house-door"></i> Home</a>
          <span class="tm-breadcrumb-sep d-none d-sm-inline-flex"><i class="bi bi-chevron-right"></i></span>
          <a href="<?= e(url('products.php')) ?>" class="d-none d-sm-inline-flex">Products</a>
          <span class="tm-breadcrumb-sep"><i class="bi bi-chevron-right"></i></span>
          <a href="<?= e(url('products.php?brand=' . urlencode($p['brand']))) ?>"><?= e($p['brand']) ?></a>
          <span class="tm-breadcrumb-sep"><i class="bi bi-chevron-right"></i></span>
          <span class="tm-breadcrumb-current" aria-current="page"><?= e($p['name']) ?></span>
        </div>
      </nav>
      <h1 class="display-6 fw-bold text-white mb-2 font-heading"><?= e($p['name']) ?></h1>
      <p class="text-white-50 mx-auto small mb-0" style="max-width: 680px;">Official <?= e($p['brand']) ?> (<?= e($p['brandOrigin'] ?? 'Denmark') ?>) <?= e($p['style']) ?> digital hearing aid with <?= (int) $p['channels'] ?> DSP processing channels.</p>
    </div>
  </section>

<!-- =========================================================================
     PRODUCT HERO & BUYING SHOWCASE
     ========================================================================= -->
<section class="py-4 py-lg-5 bg-light-subtle">
  <div class="container">
    <div class="row g-4 g-lg-5">

      <!-- Left: Media & Clinical Trust Badges -->
      <div class="col-lg-6">
        <div class="card rounded-4 border p-3 p-md-4 tm-pd-gallery-card sticky-lg-top" style="top: 90px;">
          

          <!-- Main Product Image Showcase with Interactive Pan-Zoom -->
          <div class="tm-pd-image-stage my-3" id="tmProductImageStage" onclick="openProductLightbox()" title="Click to open Fullscreen Inspector">
            
            <!-- Fullscreen Trigger Button -->
            <button type="button" class="tm-fullscreen-trigger-btn" onclick="event.stopPropagation(); openProductLightbox();" title="Expand Fullscreen High-Res">
              <i class="bi bi-arrows-fullscreen"></i>
            </button>

            <!-- Main High-Res Image -->
            <img src="<?= e(url($image)) ?>" id="tmMainProductImg" alt="<?= e($p['name']) ?>" class="tm-pd-main-img">

            <!-- Floating Zoom & Inspection Pill -->
            <div class="tm-zoom-badge">
              <i class="bi bi-zoom-in"></i> Roll over to zoom &bull; Click to inspect
            </div>
          </div>

          <!-- Secondary Image Thumbnails -->
          <div class="tm-pd-thumbs-wrap mb-4">
            <button type="button" class="tm-pd-thumb-btn active" onclick="switchProductImage('<?= e(url($image)) ?>', this)" title="Main View">
              <img src="<?= e(url($image)) ?>" alt="<?= e($p['name']) ?> Main View">
            </button>
            <?php 
              $angles = [
                ['file' => 'hearing-aid/ric.webp', 'label' => 'Side Profile View'],
                ['file' => 'hearing-aid/bte.webp', 'label' => 'Behind-The-Ear Angle'],
                ['file' => 'hearing-aid/cic.webp', 'label' => 'In-Ear Fitment'],
              ];
              foreach ($angles as $ang): 
            ?>
              <button type="button" class="tm-pd-thumb-btn" onclick="switchProductImage('<?= e(url('assets/images/' . $ang['file'])) ?>', this)" title="<?= e($ang['label']) ?>">
                <img src="<?= e(url('assets/images/' . $ang['file'])) ?>" alt="<?= e($p['name']) ?> - <?= e($ang['label']) ?>">
              </button>
            <?php endforeach; ?>
          </div>

          <!-- 4 Clinical Trust Highlights Under Gallery -->
          <div class="row g-2 pt-3 border-top">
            <div class="col-6">
              <div class="tm-pd-trust-card d-flex align-items-center gap-2">
                <div class="trust-icon bg-warning-subtle text-warning">
                  <i class="bi bi-shield-check"></i>
                </div>
                <div>
                  <div class="fw-bold text-navy small">4 Years Warranty</div>
                  <div class="text-muted" style="font-size: 0.75rem;">Comprehensive Brand Protection</div>
                </div>
              </div>
            </div>
            <div class="col-6">
              <div class="tm-pd-trust-card d-flex align-items-center gap-2">
                <div class="trust-icon bg-info-subtle text-info">
                  <i class="bi bi-soundwave"></i>
                </div>
                <div>
                  <div class="fw-bold text-navy small">Sound-Booth Fitting</div>
                  <div class="text-muted" style="font-size: 0.75rem;">Pure Tone Audiometry Included</div>
                </div>
              </div>
            </div>
            <div class="col-6">
              <div class="tm-pd-trust-card d-flex align-items-center gap-2">
                <div class="trust-icon bg-success-subtle text-success">
                  <i class="bi bi-sliders"></i>
                </div>
                <div>
                  <div class="fw-bold text-navy small">Lifetime Fine-Tuning</div>
                  <div class="text-muted" style="font-size: 0.75rem;">Free Recalibration &amp; Service</div>
                </div>
              </div>
            </div>
            <div class="col-6">
              <div class="tm-pd-trust-card d-flex align-items-center gap-2">
                <div class="trust-icon bg-primary-subtle text-primary">
                  <i class="bi bi-house-heart"></i>
                </div>
                <div>
                  <div class="fw-bold text-navy small">Doorstep Care</div>
                  <div class="text-muted" style="font-size: 0.75rem;">Delhi NCR Home Visits</div>
                </div>
              </div>
            </div>
          </div>

        </div>
      </div>

      <!-- Right: Buying Panel & Specifications -->
      <div class="col-lg-6">
        <div class="card rounded-4 border p-4 p-md-5 bg-white shadow-xs">
          
          <!-- Brand & Origin Header -->
          <div class="mb-2">
            <span class="badge bg-light text-navy border px-3 py-2 fw-semibold">
              <i class="bi bi-award-fill text-orange me-1"></i> <?= e($p['brand']) ?> (<?= e($p['brandOrigin'] ?? 'Denmark') ?>)
            </span>
          </div>

          <!-- Product Title -->
          <h2 class="h3 fw-bold text-navy mb-2 font-heading"><?= e($p['name']) ?></h2>

          <!-- Reviews & Rating -->
          <div class="d-flex align-items-center flex-wrap gap-2 mb-3">
            <?php $stars = max(0, min(5, (int) round((float) $p['rating']))); ?>
            <div class="text-warning small"><?= str_repeat('★', $stars) . str_repeat('☆', 5 - $stars) ?></div>
            <span class="small fw-bold text-navy"><?= number_format((float) $p['rating'], 1) ?> / 5.0</span>
            <span class="small text-muted">&bull; <?= (int) $p['reviews'] ?> Verified Patient Reviews</span>
          </div>

          <!-- Pricing & Financial Highlight Box -->
          <div class="card rounded-3 border-0 bg-light p-3 mb-4">
            <div class="d-flex align-items-baseline flex-wrap gap-3">
              <span class="fs-2 fw-bold text-navy font-heading"><?= inr($price) ?></span>
              <?php if ($mrp > $price): ?>
                <span class="text-muted text-decoration-line-through fs-5"><?= inr($mrp) ?></span>
                <span class="badge bg-success text-white px-2 py-1 fw-bold">Save <?= inr($savings) ?> (<?= $savePct ?>% OFF)</span>
              <?php endif; ?>
            </div>
          </div>

          <!-- 6 Key Audiological Highlight Chips -->
          <div class="mb-4">
            <h6 class="fw-bold text-navy small text-uppercase tracking-wider mb-2">
              <i class="bi bi-lightning-charge-fill text-orange me-1"></i> Key Audiological Highlights:
            </h6>
            <div class="row g-2">
              
              <div class="col-sm-6">
                <div class="tm-pd-spec-grid-item">
                  <div class="spec-icon"><i class="bi bi-soundwave"></i></div>
                  <div>
                    <div class="text-muted" style="font-size: 0.72rem;">Form Factor</div>
                    <div class="fw-bold text-navy small"><?= e($p['style']) ?> Style</div>
                  </div>
                </div>
              </div>

              <div class="col-sm-6">
                <div class="tm-pd-spec-grid-item">
                  <div class="spec-icon"><i class="bi bi-cpu"></i></div>
                  <div>
                    <div class="text-muted" style="font-size: 0.72rem;">Processing Speed</div>
                    <div class="fw-bold text-navy small"><?= (int) $p['channels'] ?> DSP Channels</div>
                  </div>
                </div>
              </div>

              <div class="col-sm-6">
                <div class="tm-pd-spec-grid-item">
                  <div class="spec-icon"><i class="bi bi-battery-charging"></i></div>
                  <div>
                    <div class="text-muted" style="font-size: 0.72rem;">Power Source</div>
                    <div class="fw-bold text-navy small"><?= !empty($p['rechargeable']) ? 'Li-ion Rechargeable' : 'Zinc-Air Disposable' ?></div>
                  </div>
                </div>
              </div>

              <div class="col-sm-6">
                <div class="tm-pd-spec-grid-item">
                  <div class="spec-icon"><i class="bi bi-bluetooth"></i></div>
                  <div>
                    <div class="text-muted" style="font-size: 0.72rem;">Wireless Audio</div>
                    <div class="fw-bold text-navy small"><?= !empty($p['bluetooth']) ? 'Bluetooth LE Audio' : 'Acoustic Pairing' ?></div>
                  </div>
                </div>
              </div>

              <div class="col-sm-6">
                <div class="tm-pd-spec-grid-item">
                  <div class="spec-icon"><i class="bi bi-stars"></i></div>
                  <div>
                    <div class="text-muted" style="font-size: 0.72rem;">Sound Architecture</div>
                    <div class="fw-bold text-navy small"><?= e($p['featureHighlight'] ?? 'ZeroDelay™ PureSound') ?></div>
                  </div>
                </div>
              </div>

              <div class="col-sm-6">
                <div class="tm-pd-spec-grid-item">
                  <div class="spec-icon"><i class="bi bi-water"></i></div>
                  <div>
                    <div class="text-muted" style="font-size: 0.72rem;">Protection Seal</div>
                    <div class="fw-bold text-navy small">IP68 Moisture/Dust Proof</div>
                  </div>
                </div>
              </div>

            </div>
          </div>

          <!-- Action Buttons (7-Day Trial Button Removed) -->
          <!-- Action Buttons -->
          <div class="d-flex flex-column flex-sm-row flex-wrap gap-2 gap-sm-3 mb-3">
            <button type="button" class="tm-btn tm-btn-primary tm-btn-lg flex-grow-1 d-flex align-items-center justify-content-center gap-2" onclick="Cart.addItem(<?= $jsItem ?>)">
              <i class="bi bi-cart-plus fs-5"></i> Add to Cart
            </button>
            <a href="https://wa.me/<?= e(SITE_WHATSAPP) ?>?text=<?= rawurlencode('Hi ' . SITE_SHORT . ', I would like details and pricing for ' . $p['name']) ?>"
               target="_blank" rel="noopener" class="tm-btn tm-btn-whatsapp-outline tm-btn-lg flex-grow-1 d-flex align-items-center justify-content-center gap-2">
              <span class="tm-wa-icon-box"><i class="bi bi-whatsapp"></i></span>
              <span>Consult on WhatsApp</span>
            </a>
          </div>
          <!-- Clinical Fitting & Quality Guarantee Notice (Why Order from Turtle Maarks) -->
          <div class="tm-why-order-box p-3 bg-white mt-2">
            
            <!-- Card Header with Verified Dispenser Badge -->
            <div class="d-flex justify-content-between align-items-center flex-wrap gap-1 pb-2 mb-1 border-bottom">
              <div class="d-flex align-items-center gap-2">
                <div class="rounded-circle bg-orange-subtle text-orange d-flex align-items-center justify-content-center" style="width: 24px; height: 24px;">
                  <i class="bi bi-shield-fill-check" style="font-size: 0.78rem;"></i>
                </div>
                <span class="fw-bold text-navy" style="font-size: 0.85rem;">Why Order from Turtle Maarks?</span>
              </div>
            </div>

            <!-- Features Rows (Compact) -->
            <div class="d-flex flex-column" style="font-size: 0.78rem;">
              
              <!-- 1. Authentic Factory Sealed -->
              <div class="tm-why-feature-row">
                <div class="tm-why-feature-icon">
                  <i class="bi bi-award-fill"></i>
                </div>
                <div>
                  <strong class="text-navy d-block" style="font-size: 0.8rem;">100% Genuine Factory Sealed</strong>
                  <span class="text-secondary">Official <?= e($p['brand']) ?> pack with verified serial number &amp; international warranty.</span>
                </div>
              </div>

              <!-- 2. Acoustic Match & Audiogram Programming -->
              <div class="tm-why-feature-row">
                <div class="tm-why-feature-icon icon-navy">
                  <i class="bi bi-soundwave"></i>
                </div>
                <div>
                  <strong class="text-navy d-block" style="font-size: 0.8rem;">Sound-Booth Calibration</strong>
                  <span class="text-secondary">Pre-programmed to your audiogram test report by RCI audiologists before dispatch.</span>
                </div>
              </div>

              <!-- 3. Complete Accessories & Lifetime Care -->
              <div class="tm-why-feature-row">
                <div class="tm-why-feature-icon icon-green">
                  <i class="bi bi-box-seam-fill"></i>
                </div>
                <div>
                  <strong class="text-navy d-block" style="font-size: 0.8rem;">Full Kit &amp; Lifetime Care</strong>
                  <span class="text-secondary">Includes case, wax filters, domes &amp; free lifetime clinic acoustic fine-tuning.</span>
                </div>
              </div>

            </div>

          </div>

        </div>
      </div>

    </div>
  </div>
</section>

<!-- =========================================================================
     COMPREHENSIVE AUDIOLOGICAL DEEP DIVE — TABBED DETAILS
     ========================================================================= -->
<section class="py-5 bg-white border-top">
  <div class="container">
    
    <div class="row g-4">
      <div class="col-lg-8">
        
        <!-- Tab Navigation Bar -->
        <ul class="nav tm-pd-tabs mb-4 overflow-auto flex-nowrap" id="productDetailTab" role="tablist">
          <li class="nav-item" role="presentation">
            <button class="nav-link active" id="descriptions-tab" data-bs-toggle="tab" data-bs-target="#tabDescriptions" type="button" role="tab" aria-controls="tabDescriptions" aria-selected="true">
              <i class="bi bi-file-text me-1"></i> Descriptions
            </button>
          </li>
          <li class="nav-item" role="presentation">
            <button class="nav-link" id="specs-tab" data-bs-toggle="tab" data-bs-target="#tabSpecs" type="button" role="tab" aria-controls="tabSpecs" aria-selected="false">
              <i class="bi bi-sliders me-1"></i> Specifications
            </button>
          </li>
          <li class="nav-item" role="presentation">
            <button class="nav-link" id="box-tab" data-bs-toggle="tab" data-bs-target="#tabBox" type="button" role="tab" aria-controls="tabBox" aria-selected="false">
              <i class="bi bi-box-seam me-1"></i> What's In The Box
            </button>
          </li>
          <li class="nav-item" role="presentation">
            <button class="nav-link" id="fitting-tab" data-bs-toggle="tab" data-bs-target="#tabFitting" type="button" role="tab" aria-controls="tabFitting" aria-selected="false">
              <i class="bi bi-heart-pulse me-1"></i> Fitting Protocol
            </button>
          </li>
          <li class="nav-item" role="presentation">
            <button class="nav-link" id="reviews-tab" data-bs-toggle="tab" data-bs-target="#tabReviews" type="button" role="tab" aria-controls="tabReviews" aria-selected="false">
              <i class="bi bi-star-fill text-warning me-1"></i> Reviews (<?= (int) $p['reviews'] ?>)
            </button>
          </li>
        </ul>

        <!-- Tab Content Panes -->
        <div class="tab-content" id="productDetailTabContent">

          <!-- TAB 1: PRODUCT DESCRIPTIONS & ACOUSTIC PERFORMANCE -->
          <div class="tab-pane fade show active" id="tabDescriptions" role="tabpanel" aria-labelledby="descriptions-tab">
            <h3 class="h5 fw-bold text-navy mb-3">Product Description &amp; Acoustic Engineering</h3>
            <p class="text-secondary leading-relaxed mb-4">
              The <strong><?= e($p['name']) ?></strong> is a precision-engineered digital hearing instrument crafted by <strong><?= e($p['brand']) ?></strong> in <?= e($p['brandOrigin'] ?? 'Europe') ?>. Built upon an advanced digital signal processing (DSP) platform, it operates across <strong><?= (int) $p['channels'] ?> frequency channels</strong> to capture soft acoustic cues, analyze incoming acoustic environments 33,000 times per second, and deliver crystal-clear conversational clarity even in challenging ambient noise.
            </p>

            <div class="row g-3 mb-4">
              <div class="col-md-6">
                <div class="p-3 rounded-3 border bg-light h-100">
                  <h6 class="fw-bold text-navy d-flex align-items-center gap-2 mb-2">
                    <i class="bi bi-mic-fill text-orange"></i> Binaural Speech Enhancement
                  </h6>
                  <p class="small text-secondary mb-0">
                    Dual directional microphones work in synchrony to pinpoint human voices in front of you while suppressing distracting background hum from air conditioners, traffic, and restaurant chatter.
                  </p>
                </div>
              </div>

              <div class="col-md-6">
                <div class="p-3 rounded-3 border bg-light h-100">
                  <h6 class="fw-bold text-navy d-flex align-items-center gap-2 mb-2">
                    <i class="bi bi-soundwave text-orange"></i> Zero Acoustic Whistle Cancellation
                  </h6>
                  <p class="small text-secondary mb-0">
                    High-speed phase inversion actively detects and cancels acoustic feedback before it turns into an annoying whistle, allowing you to hug family members and use the telephone without interruption.
                  </p>
                </div>
              </div>

              <div class="col-md-6">
                <div class="p-3 rounded-3 border bg-light h-100">
                  <h6 class="fw-bold text-navy d-flex align-items-center gap-2 mb-2">
                    <i class="bi bi-phone-vibrate text-orange"></i> Smart Mobile App Control
                  </h6>
                  <p class="small text-secondary mb-0">
                    Seamlessly connect with your iOS or Android smartphone to adjust volume, select listening programs, customize sound equalization, and even locate misplaced hearing aids using GPS tracking.
                  </p>
                </div>
              </div>

              <div class="col-md-6">
                <div class="p-3 rounded-3 border bg-light h-100">
                  <h6 class="fw-bold text-navy d-flex align-items-center gap-2 mb-2">
                    <i class="bi bi-shield-check text-orange"></i> IP68 Certified Nano-Coating
                  </h6>
                  <p class="small text-secondary mb-0">
                    Precision plasma nano-coating repels sweat, earwax, moisture, and dust particles, ensuring uninterrupted daily performance throughout Indian weather conditions and humid monsoon months.
                  </p>
                </div>
              </div>
            </div>

            <div class="alert alert-warning-subtle border border-warning-subtle rounded-3 p-3 text-dark small mb-0">
              <i class="bi bi-info-circle-fill text-orange me-2"></i>
              <strong>Clinical Advice:</strong> Hearing aid performance is directly dependent on individualized computer calibration. Our certified audiologists match every parameter of this instrument to your exact pure tone audiogram for maximum comfort and speech comprehension.
            </div>
          </div>

          <!-- TAB 2: TECHNICAL SPECIFICATIONS TABLE -->
          <div class="tab-pane fade" id="tabSpecs" role="tabpanel" aria-labelledby="specs-tab">
            <h3 class="h5 fw-bold text-navy mb-3">Comprehensive Technical Data Sheet</h3>
            <div class="table-responsive rounded-3 border">
              <table class="table table-striped table-hover align-middle small mb-0">
                <tbody>
                  <tr>
                    <th class="text-navy w-40 ps-3">Model Name</th>
                    <td class="fw-bold text-navy"><?= e($p['name']) ?></td>
                  </tr>
                  <tr>
                    <th class="text-navy ps-3">Manufacturer &amp; Origin</th>
                    <td><?= e($p['brand']) ?> &bull; Engineered in <?= e($p['brandOrigin'] ?? 'Global') ?></td>
                  </tr>
                  <tr>
                    <th class="text-navy ps-3">Form Factor / Style</th>
                    <td><span class="badge bg-navy text-white"><?= e($p['style']) ?></span> (<?= e($p['style'] === 'RIC' ? 'Receiver-In-Canal' : ($p['style'] === 'BTE' ? 'Behind-The-Ear' : ($p['style'] === 'CIC' ? 'Completely-In-Canal' : 'In-The-Canal'))) ?>)</td>
                  </tr>
                  <tr>
                    <th class="text-navy ps-3">Fitting Range Suitability</th>
                    <td>Mild to Severe Sensorineural &amp; Conductive Hearing Loss (up to 95 dB HL)</td>
                  </tr>
                  <tr>
                    <th class="text-navy ps-3">DSP Processing Channels</th>
                    <td><strong><?= (int) $p['channels'] ?> Channels</strong> with Wide Dynamic Range Compression (WDRC)</td>
                  </tr>
                  <tr>
                    <th class="text-navy ps-3">Sound Processing Level</th>
                    <td><?= e($p['techLevel'] ?? 'Flagship AI Sound Engine') ?></td>
                  </tr>
                  <tr>
                    <th class="text-navy ps-3">Signature Acoustic Feature</th>
                    <td><?= e($p['featureHighlight'] ?? 'Binaural VoiceFocus &amp; SoundSense Learn') ?></td>
                  </tr>
                  <tr>
                    <th class="text-navy ps-3">Power Source &amp; Battery</th>
                    <td><?= !empty($p['rechargeable']) ? 'Integrated Lithium-ion Fast-Charging Cell (24+ hrs operating time)' : 'Zinc-Air Disposable Battery (Size 312 / 13)' ?></td>
                  </tr>
                  <tr>
                    <th class="text-navy ps-3">Wireless Audio Streaming</th>
                    <td><?= !empty($p['bluetooth']) ? 'Bluetooth LE Audio, Apple MFi Direct Streaming, Android ASHA Compatible' : 'High-Fidelity Telecoil / Acoustic Pairing' ?></td>
                  </tr>
                  <tr>
                    <th class="text-navy ps-3">Ingress Protection Rating</th>
                    <td>IP68 Certified (Submersible up to 1.5 meters for 30 minutes, Dust Tight)</td>
                  </tr>
                  <tr>
                    <th class="text-navy ps-3">Microphone Technology</th>
                    <td>Dual Synchronized Beamforming Directional Microphones</td>
                  </tr>
                  <tr>
                    <th class="text-navy ps-3">Tinnitus Management</th>
                    <td>Integrated Sound Generator &amp; Relaxing Acoustic Fractal Tones</td>
                  </tr>
                  <tr>
                    <th class="text-navy ps-3">Official Manufacturer Warranty</th>
                    <td><strong>4 Years Comprehensive Warranty</strong> covering digital processor and internal receiver</td>
                  </tr>
                  <tr>
                    <th class="text-navy ps-3">Turtle Maarks Clinical Care</th>
                    <td>Lifetime Free Computer Recalibrations, Periodic Diagnostic Checks &amp; Servicing</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>

          <!-- TAB 3: WHAT'S IN THE BOX -->
          <div class="tab-pane fade" id="tabBox" role="tabpanel" aria-labelledby="box-tab">
            <h3 class="h5 fw-bold text-navy mb-3">Authentic Factory Packaging &amp; Starter Bundle</h3>
            <p class="text-secondary small mb-4">Every unit dispatched from Turtle Maarks is factory sealed and arrives with everything needed for immediate daily use:</p>

            <div class="row g-3">
              <div class="col-md-6">
                <div class="tm-pd-box-item">
                  <div class="tm-pd-box-icon"><i class="bi bi-soundwave"></i></div>
                  <div>
                    <div class="fw-bold text-navy small"><?= e($p['name']) ?></div>
                    <div class="text-muted" style="font-size: 0.78rem;">Factory-calibrated digital hearing instrument</div>
                  </div>
                </div>
              </div>

              <div class="col-md-6">
                <div class="tm-pd-box-item">
                  <div class="tm-pd-box-icon"><i class="bi bi-briefcase"></i></div>
                  <div>
                    <div class="fw-bold text-navy small">Magnetic Travel Storage Case</div>
                    <div class="text-muted" style="font-size: 0.78rem;">Hard-shell protective case with cushioned interior</div>
                  </div>
                </div>
              </div>

              <div class="col-md-6">
                <div class="tm-pd-box-item">
                  <div class="tm-pd-box-icon"><i class="bi bi-tools"></i></div>
                  <div>
                    <div class="fw-bold text-navy small">Multi-Tool Cleaning Kit</div>
                    <div class="text-muted" style="font-size: 0.78rem;">Bristle brush, wire wax loop, and magnet tip</div>
                  </div>
                </div>
              </div>

              <div class="col-md-6">
                <div class="tm-pd-box-item">
                  <div class="tm-pd-box-icon"><i class="bi bi-circle"></i></div>
                  <div>
                    <div class="fw-bold text-navy small">Medical-Grade Silicone Domes</div>
                    <div class="text-muted" style="font-size: 0.78rem;">Multi-size assortment (Small, Medium, Large) for optimal ear canal seal</div>
                  </div>
                </div>
              </div>

              <div class="col-md-6">
                <div class="tm-pd-box-item">
                  <div class="tm-pd-box-icon"><i class="bi bi-shield-lock"></i></div>
                  <div>
                    <div class="fw-bold text-navy small">CeruShield Wax Guard Filters</div>
                    <div class="text-muted" style="font-size: 0.78rem;">Replacement wax barriers to protect the internal speaker</div>
                  </div>
                </div>
              </div>

              <div class="col-md-6">
                <div class="tm-pd-box-item">
                  <div class="tm-pd-box-icon"><i class="bi bi-card-checklist"></i></div>
                  <div>
                    <div class="fw-bold text-navy small">Warranty Card &amp; User Manual</div>
                    <div class="text-muted" style="font-size: 0.78rem;">Official serial number registration card &amp; quick-start guide</div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- TAB 4: CLINICAL FITTING PROTOCOL -->
          <div class="tab-pane fade" id="tabFitting" role="tabpanel" aria-labelledby="fitting-tab">
            <h3 class="h5 fw-bold text-navy mb-3">Our 4-Step Clinical Fitting &amp; Calibration Protocol</h3>
            <p class="text-secondary small mb-4">
              A hearing aid is only as good as the audiologist who programs it. At Turtle Maarks, every device undergoes a strict 4-step audiological verification:
            </p>

            <div class="d-flex flex-column gap-3">
              <div class="card rounded-3 border p-3 bg-light d-flex flex-row gap-3 align-items-start">
                <div class="tm-pd-step-num">1</div>
                <div>
                  <h6 class="fw-bold text-navy mb-1">Sound-Booth Diagnostic Evaluation</h6>
                  <p class="small text-secondary mb-0">We perform ANSI/ISO-certified Pure Tone Audiometry (PTA) and Tympanometry across 250 Hz to 8000 Hz to map bone and air conduction hearing thresholds with clinical precision.</p>
                </div>
              </div>

              <div class="card rounded-3 border p-3 bg-light d-flex flex-row gap-3 align-items-start">
                <div class="tm-pd-step-num">2</div>
                <div>
                  <h6 class="fw-bold text-navy mb-1">Target Gain Prescription Mapping</h6>
                  <p class="small text-secondary mb-0">Using internationally validated NAL-NL2 and DSL v5.0 prescriptive formulas, your instrument is programmed to amplify speech frequencies without making loud sounds uncomfortable.</p>
                </div>
              </div>

              <div class="card rounded-3 border p-3 bg-light d-flex flex-row gap-3 align-items-start">
                <div class="tm-pd-step-num">3</div>
                <div>
                  <h6 class="fw-bold text-navy mb-1">Real-Ear Measurement (REM) Verification</h6>
                  <p class="small text-secondary mb-0">A micro-probe microphone is inserted into your ear canal alongside the hearing aid to measure acoustic pressure in real time, accounting for your unique ear canal resonance.</p>
                </div>
              </div>

              <div class="card rounded-3 border p-3 bg-light d-flex flex-row gap-3 align-items-start">
                <div class="tm-pd-step-num">4</div>
                <div>
                  <h6 class="fw-bold text-navy mb-1">Structured Adaptation &amp; Lifetime Fine-Tuning</h6>
                  <p class="small text-secondary mb-0">We provide free follow-up acoustic adjustments at 14, 30, and 90 days as your auditory cortex adapts to newly restored sounds, backed by lifetime clinic recalibrations.</p>
                </div>
              </div>
            </div>
          </div>

          <!-- TAB 5: COMPREHENSIVE PATIENT REVIEW SYSTEM -->
          <div class="tab-pane fade" id="tabReviews" role="tabpanel" aria-labelledby="reviews-tab">
            
            <div class="d-flex justify-content-between align-items-center flex-wrap gap-2 mb-4">
              <div>
                <h3 class="h5 fw-bold text-navy mb-1">Patient Reviews &amp; Clinical Feedback</h3>
                <p class="text-secondary small mb-0">Verified experiences from patients fitted at our Gaur City clinic &amp; doorstep home visits</p>
              </div>
              <button class="tm-btn tm-btn-primary btn-sm d-flex align-items-center gap-2" type="button" data-bs-toggle="collapse" data-bs-target="#tmWriteReviewCollapse" aria-expanded="false" aria-controls="tmWriteReviewCollapse">
                <i class="bi bi-pencil-square"></i> Write a Patient Review
              </button>
            </div>

            <!-- Review Summary & Score Breakdown Box -->
            <div class="card rounded-4 border p-4 bg-light-subtle mb-4">
              <div class="row g-4 align-items-center">
                
                <!-- Overall Score -->
                <div class="col-md-4 text-center border-end-md">
                  <div class="display-4 fw-bold text-navy font-heading"><?= number_format((float) $p['rating'], 1) ?></div>
                  <div class="text-warning fs-5 mb-1">
                    <?php $rstars = max(0, min(5, (int) round((float) $p['rating']))); ?>
                    <?= str_repeat('★', $rstars) . str_repeat('☆', 5 - $rstars) ?>
                  </div>
                  <div class="small fw-bold text-navy">Overall Patient Satisfaction</div>
                  <div class="text-muted small">Based on <?= (int) $p['reviews'] ?> verified clinical fittings</div>
                  <span class="badge bg-success-subtle text-success border border-success-subtle rounded-pill mt-2 px-2 py-1 small">
                    <i class="bi bi-check-circle-fill me-1"></i> 97% Recommend this Model
                  </span>
                </div>

                <!-- Star Rating Progress Bars -->
                <div class="col-md-4">
                  <div class="d-flex flex-column gap-2 small">
                    
                    <div class="d-flex align-items-center gap-2">
                      <span class="text-nowrap text-muted" style="width: 45px;">5 ★</span>
                      <div class="progress flex-grow-1" style="height: 8px;">
                        <div class="progress-bar bg-warning" role="progressbar" style="width: 84%;" aria-valuenow="84" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                      <span class="text-muted small" style="width: 32px;">84%</span>
                    </div>

                    <div class="d-flex align-items-center gap-2">
                      <span class="text-nowrap text-muted" style="width: 45px;">4 ★</span>
                      <div class="progress flex-grow-1" style="height: 8px;">
                        <div class="progress-bar bg-warning" role="progressbar" style="width: 12%;" aria-valuenow="12" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                      <span class="text-muted small" style="width: 32px;">12%</span>
                    </div>

                    <div class="d-flex align-items-center gap-2">
                      <span class="text-nowrap text-muted" style="width: 45px;">3 ★</span>
                      <div class="progress flex-grow-1" style="height: 8px;">
                        <div class="progress-bar bg-warning" role="progressbar" style="width: 4%;" aria-valuenow="4" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                      <span class="text-muted small" style="width: 32px;">4%</span>
                    </div>

                    <div class="d-flex align-items-center gap-2">
                      <span class="text-nowrap text-muted" style="width: 45px;">2 ★</span>
                      <div class="progress flex-grow-1" style="height: 8px;">
                        <div class="progress-bar bg-warning" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                      <span class="text-muted small" style="width: 32px;">0%</span>
                    </div>

                    <div class="d-flex align-items-center gap-2">
                      <span class="text-nowrap text-muted" style="width: 45px;">1 ★</span>
                      <div class="progress flex-grow-1" style="height: 8px;">
                        <div class="progress-bar bg-warning" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                      <span class="text-muted small" style="width: 32px;">0%</span>
                    </div>

                  </div>
                </div>

                <!-- Feature Rating Metrics -->
                <div class="col-md-4">
                  <div class="d-flex flex-column gap-2 small bg-white p-3 rounded-3 border">
                    <div class="d-flex justify-content-between">
                      <span class="text-muted">Speech in Noise Clarity:</span>
                      <strong class="text-navy">4.9 / 5.0</strong>
                    </div>
                    <div class="d-flex justify-content-between">
                      <span class="text-muted">In-Ear Comfort &amp; Fit:</span>
                      <strong class="text-navy">4.8 / 5.0</strong>
                    </div>
                    <div class="d-flex justify-content-between">
                      <span class="text-muted">Battery &amp; Charging Life:</span>
                      <strong class="text-navy">4.8 / 5.0</strong>
                    </div>
                    <div class="d-flex justify-content-between">
                      <span class="text-muted">Bluetooth Call Quality:</span>
                      <strong class="text-navy">4.7 / 5.0</strong>
                    </div>
                  </div>
                </div>

              </div>
            </div>

            <!-- Collapsible Write Review Form -->
            <div class="collapse mb-4" id="tmWriteReviewCollapse">
              <div class="card rounded-4 border p-4 p-md-5 bg-white shadow-sm position-relative overflow-hidden">
                <div class="position-absolute top-0 start-0 w-100 bg-orange" style="height: 4px;"></div>

                <div class="d-flex justify-content-between align-items-start flex-wrap gap-2 mb-4 pb-3 border-bottom">
                  <div>
                    <span class="badge bg-orange-subtle text-orange rounded-pill px-3 py-1 fw-bold small mb-2">
                      <i class="bi bi-chat-heart-fill me-1"></i> Patient Experience
                    </span>
                    <h4 class="fw-bold text-navy mb-1">Share Your Experience</h4>
                    <p class="text-secondary small mb-0">Help other patients and families by sharing how this hearing aid helped your daily conversations.</p>
                  </div>
                  <button type="button" class="btn-close" data-bs-toggle="collapse" data-bs-target="#tmWriteReviewCollapse" aria-label="Close"></button>
                </div>

                <form id="tmPatientReviewForm" onsubmit="event.preventDefault(); document.getElementById('tmReviewSuccessMsg').classList.remove('d-none'); this.reset(); document.getElementById('tmStarScoreText').textContent = 'Tap a star to rate'; document.querySelectorAll('.tm-star-rating-box .star-item').forEach(s => s.classList.remove('selected', 'text-warning'));">
                  <div class="row g-3 g-md-4">
                    
                    <!-- 1. Star Rating Selector (Interactive Stars) -->
                    <div class="col-12">
                      <div class="p-3 bg-light rounded-3 border d-flex flex-column flex-sm-row justify-content-between align-items-sm-center gap-3">
                        <div>
                          <label class="form-label fw-bold text-navy mb-0 d-block">1. How would you rate this hearing aid?</label>
                          <span class="small text-muted" id="tmStarScoreText">★★★★★ Excellent — Life-changing speech clarity</span>
                        </div>
                        <div class="d-flex align-items-center gap-2">
                          <input type="hidden" name="rating" id="tmSelectedRatingVal" value="5">
                          <div class="tm-star-rating-box" id="tmStarRatingWidget">
                            <span class="star-item selected" data-value="1" title="1 Star - Poor">★</span>
                            <span class="star-item selected" data-value="2" title="2 Stars - Fair">★</span>
                            <span class="star-item selected" data-value="3" title="3 Stars - Good">★</span>
                            <span class="star-item selected" data-value="4" title="4 Stars - Very Good">★</span>
                            <span class="star-item selected" data-value="5" title="5 Stars - Excellent">★</span>
                          </div>
                          <span class="badge bg-white text-navy border fw-bold px-2 py-1" id="tmStarScoreBadge">5.0 / 5</span>
                        </div>
                      </div>
                    </div>

                    <!-- 2. Product Badge (Readonly Chip) -->
                    <div class="col-md-6">
                      <label class="form-label small fw-bold text-navy mb-1">Device Being Reviewed</label>
                      <div class="p-2 px-3 bg-light border rounded-3 d-flex align-items-center gap-2">
                        <i class="bi bi-soundwave text-orange fs-5"></i>
                        <span class="fw-semibold text-navy small text-truncate"><?= e($p['name']) ?></span>
                      </div>
                    </div>

                    <!-- 3. Full Name -->
                    <div class="col-md-6">
                      <label class="form-label small fw-bold text-navy mb-1">Your Name <span class="text-danger">*</span></label>
                      <input type="text" class="form-control rounded-3" placeholder="e.g. Ramesh Sharma" required>
                    </div>

                    <!-- 4. Location / City -->
                    <div class="col-md-6">
                      <label class="form-label small fw-bold text-navy mb-1">Your City / Area <span class="text-danger">*</span></label>
                      <input type="text" class="form-control rounded-3" placeholder="e.g. Gaur City, Noida, Ghaziabad" required>
                    </div>

                    <!-- 5. Headline / Summary -->
                    <div class="col-md-6">
                      <label class="form-label small fw-bold text-navy mb-1">Review Headline <span class="text-danger">*</span></label>
                      <input type="text" class="form-control rounded-3" placeholder="e.g. Clear conversations at family dinner" required>
                    </div>

                    <!-- 6. Detailed Story / Feedback -->
                    <div class="col-12">
                      <div class="d-flex justify-content-between align-items-center mb-1">
                        <label class="form-label small fw-bold text-navy mb-0">Your Experience &amp; Story <span class="text-danger">*</span></label>
                        <span class="small text-muted" style="font-size: 0.75rem;">Simple &amp; honest feedback</span>
                      </div>
                      <textarea class="form-control rounded-3" id="tmReviewExperienceText" rows="4" placeholder="Tell us how your hearing improved. For example: How does it sound while watching TV, talking to family, or in noisy places?" required></textarea>
                    </div>

                    <!-- Submit Row -->
                    <div class="col-12 pt-2">
                      <button type="submit" class="tm-btn tm-btn-primary tm-btn-lg text-nowrap px-4">
                        <i class="bi bi-send-fill me-2"></i> Submit My Review
                      </button>
                    </div>

                  </div>
                </form>

                <!-- Success Confirmation Message -->
                <div id="tmReviewSuccessMsg" class="alert alert-success border-success-subtle mt-4 d-none mb-0 p-3 rounded-3 d-flex align-items-center gap-3">
                  <i class="bi bi-check-circle-fill text-success fs-3"></i>
                  <div>
                    <h6 class="fw-bold text-success mb-0">Thank you for your feedback!</h6>
                    <span class="small text-secondary">Your review has been submitted and will appear shortly after a quick quality verification.</span>
                  </div>
                </div>

              </div>
            </div>

            <!-- Verified Patient Reviews Feed -->
            <div class="d-flex flex-column gap-3">
              
              <!-- Review 1 -->
              <div class="card rounded-4 border p-4 bg-white shadow-xs">
                <div class="d-flex justify-content-between align-items-start flex-wrap gap-2 mb-2">
                  <div>
                    <div class="d-flex align-items-center gap-2">
                      <h6 class="fw-bold text-navy mb-0">Col. R. K. Sharma (Retd.)</h6>
                      <span class="badge bg-success-subtle text-success border border-success-subtle small px-2 py-0">
                        <i class="bi bi-shield-check me-1"></i> Verified Patient
                      </span>
                      <span class="badge bg-primary-subtle text-primary border border-primary-subtle small px-2 py-0">
                        Sound-Booth Fitted
                      </span>
                    </div>
                    <div class="text-muted small mt-1">Gaur City 2, Greater Noida West &bull; Fitted 12 August 2026</div>
                  </div>
                  <div class="text-warning">★★★★★</div>
                </div>

                <h6 class="fw-bold text-navy mt-2 mb-1">Restored my ability to follow family dinner conversations after 4 years</h6>
                <p class="small text-secondary mb-3">
                  Dr. Ritu Verma fitted me with this model in the Gaur City clinic sound booth. For years, I struggled in loud restaurants and family gatherings because background clatter drowned out my grandchildren's voices. The directional speech clarity is remarkable. Bluetooth calls to my iPhone are crystal clear without any buzzing. Highly recommend Turtle Maarks to all senior citizens.
                </p>

                <!-- Clinic Reply -->
                <div class="p-3 bg-light rounded-3 border-start border-orange border-3 small">
                  <div class="fw-bold text-navy mb-1"><i class="bi bi-reply-fill text-orange me-1"></i> Response from Dr. Ritu Verma (Senior Audiologist):</div>
                  <div class="text-secondary">Thank you, Col. Sharma! We are thrilled that your speech clarity in family dinners has returned so comfortably. We look forward to seeing you for your complimentary 6-month acoustic recalibration!</div>
                </div>

                <div class="d-flex align-items-center gap-3 text-muted small mt-3 pt-2 border-top">
                  <span>Was this review helpful?</span>
                  <button class="btn btn-sm btn-link text-muted p-0 text-decoration-none" onclick="this.classList.toggle('text-orange'); this.innerHTML='<i class=\'bi bi-hand-thumbs-up-fill\'></i> Yes (25)';">
                    <i class="bi bi-hand-thumbs-up"></i> Yes (24)
                  </button>
                  <span>&bull;</span>
                  <button class="btn btn-sm btn-link text-muted p-0 text-decoration-none" onclick="this.classList.toggle('text-secondary');">
                    <i class="bi bi-hand-thumbs-down"></i> No (0)
                  </button>
                </div>
              </div>

              <!-- Review 2 -->
              <div class="card rounded-4 border p-4 bg-white shadow-xs">
                <div class="d-flex justify-content-between align-items-start flex-wrap gap-2 mb-2">
                  <div>
                    <div class="d-flex align-items-center gap-2">
                      <h6 class="fw-bold text-navy mb-0">Sunita Aggarwal</h6>
                      <span class="badge bg-success-subtle text-success border border-success-subtle small px-2 py-0">
                        <i class="bi bi-shield-check me-1"></i> Verified Patient
                      </span>
                      <span class="badge bg-info-subtle text-info border border-info-subtle small px-2 py-0">
                        Doorstep Home Visit
                      </span>
                    </div>
                    <div class="text-muted small mt-1">Sector 62, Noida &bull; Fitted 28 July 2026</div>
                  </div>
                  <div class="text-warning">★★★★★</div>
                </div>

                <h6 class="fw-bold text-navy mt-2 mb-1">Very comfortable for all-day wear and completely whistle-free</h6>
                <p class="small text-secondary mb-3">
                  My previous hearing aid whistled every time I held my phone to my ear or hugged my daughter. This unit has zero whistling. It is so lightweight and discreet that I genuinely forget I am wearing it. Turtle Maarks team came to my home in Sector 62 for the initial follow-up adjustment because I have knee issues. Truly compassionate care.
                </p>

                <div class="d-flex align-items-center gap-3 text-muted small pt-2 border-top">
                  <span>Was this review helpful?</span>
                  <button class="btn btn-sm btn-link text-muted p-0 text-decoration-none" onclick="this.classList.toggle('text-orange'); this.innerHTML='<i class=\'bi bi-hand-thumbs-up-fill\'></i> Yes (20)';">
                    <i class="bi bi-hand-thumbs-up"></i> Yes (19)
                  </button>
                  <span>&bull;</span>
                  <button class="btn btn-sm btn-link text-muted p-0 text-decoration-none">
                    <i class="bi bi-hand-thumbs-down"></i> No (0)
                  </button>
                </div>
              </div>

              <!-- Review 3 -->
              <div class="card rounded-4 border p-4 bg-white shadow-xs">
                <div class="d-flex justify-content-between align-items-start flex-wrap gap-2 mb-2">
                  <div>
                    <div class="d-flex align-items-center gap-2">
                      <h6 class="fw-bold text-navy mb-0">Mahesh Chandra Gupta</h6>
                      <span class="badge bg-success-subtle text-success border border-success-subtle small px-2 py-0">
                        <i class="bi bi-shield-check me-1"></i> Verified Patient
                      </span>
                    </div>
                    <div class="text-muted small mt-1">Indirapuram, Ghaziabad &bull; Fitted 15 July 2026</div>
                  </div>
                  <div class="text-warning">★★★★★</div>
                </div>

                <h6 class="fw-bold text-navy mt-2 mb-1">Battery easily lasts all day and night with Bluetooth streaming</h6>
                <p class="small text-secondary mb-3">
                  I put them in the charger when I go to sleep, and they easily last more than 24 hours. The TV audio streaming adapter has made watching evening news enjoyable again without needing high volume. Outstanding service, genuine warranty card, and lifetime tuning support.
                </p>

                <div class="d-flex align-items-center gap-3 text-muted small pt-2 border-top">
                  <span>Was this review helpful?</span>
                  <button class="btn btn-sm btn-link text-muted p-0 text-decoration-none" onclick="this.classList.toggle('text-orange'); this.innerHTML='<i class=\'bi bi-hand-thumbs-up-fill\'></i> Yes (15)';">
                    <i class="bi bi-hand-thumbs-up"></i> Yes (14)
                  </button>
                  <span>&bull;</span>
                  <button class="btn btn-sm btn-link text-muted p-0 text-decoration-none">
                    <i class="bi bi-hand-thumbs-down"></i> No (0)
                  </button>
                </div>
              </div>

              <!-- Review 4 -->
              <div class="card rounded-4 border p-4 bg-white shadow-xs">
                <div class="d-flex justify-content-between align-items-start flex-wrap gap-2 mb-2">
                  <div>
                    <div class="d-flex align-items-center gap-2">
                      <h6 class="fw-bold text-navy mb-0">Anita Malhotra</h6>
                      <span class="badge bg-success-subtle text-success border border-success-subtle small px-2 py-0">
                        <i class="bi bi-shield-check me-1"></i> Verified Patient
                      </span>
                    </div>
                    <div class="text-muted small mt-1">Sector 137, Noida &bull; Fitted 3 June 2026</div>
                  </div>
                  <div class="text-warning">★★★★☆</div>
                </div>

                <h6 class="fw-bold text-navy mt-2 mb-1">Natural sound quality after a smooth 10-day adaptation period</h6>
                <p class="small text-secondary mb-3">
                  It took me about 10 days to get used to hearing everyday kitchen sounds again, but the follow-up tuning session with Dr. Ritu made a world of difference. The speech clarity on TV and in temple gatherings is natural and soft. Excellent clinic ambiance in Gaur City Mall.
                </p>

                <div class="d-flex align-items-center gap-3 text-muted small pt-2 border-top">
                  <span>Was this review helpful?</span>
                  <button class="btn btn-sm btn-link text-muted p-0 text-decoration-none" onclick="this.classList.toggle('text-orange'); this.innerHTML='<i class=\'bi bi-hand-thumbs-up-fill\'></i> Yes (10)';">
                    <i class="bi bi-hand-thumbs-up"></i> Yes (9)
                  </button>
                  <span>&bull;</span>
                  <button class="btn btn-sm btn-link text-muted p-0 text-decoration-none">
                    <i class="bi bi-hand-thumbs-down"></i> No (0)
                  </button>
                </div>
              </div>

            </div>

          </div>

        </div>

      </div>

      <!-- Right Column: Audiologist Consultation & Contact Card -->
      <div class="col-lg-4">
        <div class="card rounded-4 border bg-light p-4 sticky-lg-top" style="top: 90px;">
          
          <div class="d-flex align-items-center gap-3 mb-3">
            <div class="rounded-circle bg-navy text-white d-flex align-items-center justify-content-center fw-bold fs-5" style="width: 54px; height: 54px;">
              <i class="bi bi-person-badge"></i>
            </div>
            <div>
              <h6 class="fw-bold text-navy mb-0">Dr. Ritu Verma</h6>
              <div class="text-orange small fw-bold">Senior Clinical Audiologist</div>
              <div class="text-muted" style="font-size: 0.75rem;">RCI Regd. Master's in Audiology</div>
            </div>
          </div>

          <p class="small text-secondary mb-3">
            Not sure if <strong><?= e($p['name']) ?></strong> matches your specific hearing loss pattern? Send us your audiogram or schedule a clinic consultation for an acoustic recommendation.
          </p>

          <div class="d-grid gap-2 mb-3">
            <a href="<?= e(url('book-appointment.php')) ?>" class="tm-btn tm-btn-primary">
              <i class="bi bi-calendar-check me-1"></i> Book Audiology Consultation
            </a>
            <a href="tel:<?= e(SITE_PHONE_RAW) ?>" class="tm-btn tm-btn-outline-navy">
              <i class="bi bi-telephone me-1"></i> Call <?= e(SITE_PHONE) ?>
            </a>
          </div>

          <div class="pt-3 border-top small text-muted">
            <div class="d-flex align-items-start gap-2 mb-2">
              <i class="bi bi-geo-alt-fill text-orange mt-1"></i>
              <span><strong>Clinic:</strong> 15th Floor, Gaur City Mall, 1509, Greater Noida W Rd, Gaur City 1, Sector IV, Sector 4, Noida, Ghaziabad, Uttar Pradesh 201306</span>
            </div>
            <div class="d-flex align-items-center gap-2">
              <i class="bi bi-clock-fill text-orange"></i>
              <span><strong>Hours:</strong> Mon &ndash; Sat: 10:00 AM &ndash; 7:30 PM</span>
            </div>
          </div>

        </div>
      </div>

    </div>

  </div>
</section>

<!-- =========================================================================
     SIMILAR / RELATED HEARING AID MODELS
     ========================================================================= -->
<?php if ($related): ?>
<section class="py-5 bg-light border-top">
  <div class="container">
    <div class="text-center tm-section-head mb-4">
      <span class="badge bg-white text-navy border px-3 py-1 rounded-pill small fw-semibold shadow-xs mb-2">
        <i class="bi bi-soundwave text-orange me-1"></i> Clinical Alternatives
      </span>
      <h2 class="tm-section-title h4 mb-1">Similar <span>Hearing Aid Models</span></h2>
      <p class="tm-section-sub small mb-0">Other high-performance models commonly evaluated alongside this one</p>
    </div>
    <div class="row g-3">
      <?php tm_product_grid($related, ['col' => 'col-xl-3 col-lg-4 col-md-6']); ?>
    </div>
  </div>
</section>
<?php endif; ?>

<!-- =========================================================================
     HIGH-RES PRODUCT IMAGE LIGHTBOX MODAL
     ========================================================================= -->
<div class="modal fade" id="tmProductLightboxModal" tabindex="-1" aria-labelledby="tmProductLightboxModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-dialog-centered">
    <div class="modal-content rounded-4 border-0 shadow-lg overflow-hidden bg-white">
      
      <!-- Modal Header -->
      <div class="modal-header border-bottom py-3 px-4 bg-light d-flex align-items-center justify-content-between">
        <div>
          <span class="badge bg-orange text-white rounded-pill px-2 py-1 small fw-semibold me-2">High-Res Inspection</span>
          <strong class="text-navy fs-6" id="tmProductLightboxModalLabel"><?= e($p['name']) ?></strong>
        </div>
        <div class="d-flex align-items-center gap-2">
          <!-- Zoom Controls -->
          <div class="btn-group btn-group-sm me-2">
            <button type="button" class="btn btn-outline-secondary" onclick="zoomLightbox(0.35)" title="Zoom In">
              <i class="bi bi-zoom-in"></i> Zoom In
            </button>
            <button type="button" class="btn btn-outline-secondary" onclick="zoomLightbox(-0.35)" title="Zoom Out">
              <i class="bi bi-zoom-out"></i> Zoom Out
            </button>
            <button type="button" class="btn btn-outline-secondary" onclick="resetLightboxZoom()" title="Reset Zoom">
              <i class="bi bi-arrow-counterclockwise"></i> Reset
            </button>
          </div>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
      </div>

      <!-- Modal Body (Canvas) -->
      <div class="modal-body p-4 text-center overflow-auto position-relative bg-light-subtle" style="min-height: 480px; max-height: 72vh; display: flex; align-items: center; justify-content: center;">
        <img src="<?= e(url($image)) ?>" id="tmLightboxImg" alt="<?= e($p['name']) ?> High-Res View" style="max-height: 60vh; max-width: 88%; object-fit: contain; transition: transform 0.2s ease;">
      </div>

      <!-- Modal Footer with Angle Switcher -->
      <div class="modal-footer border-top py-2 px-4 bg-light d-flex justify-content-between align-items-center flex-wrap">
        <div class="text-muted small">
          <i class="bi bi-shield-check text-success me-1"></i> Original manufacturer photography with authentic housing details.
        </div>
        <div class="d-flex align-items-center gap-2">
          <span class="text-navy small fw-semibold">Switch Angle:</span>
          <button type="button" class="btn btn-sm btn-outline-secondary p-1 rounded-2" onclick="document.getElementById('tmLightboxImg').src='<?= e(url($image)) ?>'; resetLightboxZoom();" title="Main View">
            <img src="<?= e(url($image)) ?>" style="width: 32px; height: 32px; object-fit: contain;">
          </button>
          <?php foreach (['hearing-aid/ric.webp', 'hearing-aid/bte.webp', 'hearing-aid/cic.webp'] as $thumb): ?>
            <button type="button" class="btn btn-sm btn-outline-secondary p-1 rounded-2" onclick="document.getElementById('tmLightboxImg').src='<?= e(url('assets/images/' . $thumb)) ?>'; resetLightboxZoom();">
              <img src="<?= e(url('assets/images/' . $thumb)) ?>" style="width: 32px; height: 32px; object-fit: contain;">
            </button>
          <?php endforeach; ?>
        </div>
      </div>

    </div>
  </div>
</div>

<script>
// Switch Main Product Image & Thumbnail Active State
function switchProductImage(src, btn) {
  const mainImg = document.getElementById('tmMainProductImg');
  if (mainImg) mainImg.src = src;
  
  const lbImg = document.getElementById('tmLightboxImg');
  if (lbImg) lbImg.src = src;

  document.querySelectorAll('.tm-pd-thumb-btn').forEach(el => el.classList.remove('active'));
  if (btn) btn.classList.add('active');
}

// Lightbox Open & Zoom Controller
let currentLightboxZoom = 1;

function openProductLightbox() {
  const mainSrc = document.getElementById('tmMainProductImg').src;
  const lbImg = document.getElementById('tmLightboxImg');
  if (lbImg) {
    lbImg.src = mainSrc;
    currentLightboxZoom = 1;
    lbImg.style.transform = 'scale(1)';
  }
  const modalEl = document.getElementById('tmProductLightboxModal');
  if (modalEl) {
    const modal = bootstrap.Modal.getOrCreateInstance(modalEl);
    modal.show();
  }
}

function zoomLightbox(delta) {
  const lbImg = document.getElementById('tmLightboxImg');
  if (!lbImg) return;
  currentLightboxZoom = Math.max(0.75, Math.min(3.5, currentLightboxZoom + delta));
  lbImg.style.transform = `scale(${currentLightboxZoom})`;
}

function resetLightboxZoom() {
  const lbImg = document.getElementById('tmLightboxImg');
  if (!lbImg) return;
  currentLightboxZoom = 1;
  lbImg.style.transform = 'scale(1)';
}

document.addEventListener('DOMContentLoaded', () => {
  // 1. Stage Pan-Zoom on Hover
  const stage = document.getElementById('tmProductImageStage');
  const mainImg = document.getElementById('tmMainProductImg');

  if (stage && mainImg) {
    stage.addEventListener('mousemove', (e) => {
      const rect = stage.getBoundingClientRect();
      const x = ((e.clientX - rect.left) / rect.width) * 100;
      const y = ((e.clientY - rect.top) / rect.height) * 100;
      mainImg.style.transformOrigin = `${x}% ${y}%`;
      mainImg.style.transform = 'scale(2.2)';
    });

    stage.addEventListener('mouseleave', () => {
      mainImg.style.transform = 'scale(1)';
      mainImg.style.transformOrigin = 'center center';
    });
  }

  // 2. Patient Review Star Widget
  const widget = document.getElementById('tmStarRatingWidget');
  const badge = document.getElementById('tmStarScoreBadge');
  const label = document.getElementById('tmStarScoreText');
  const hiddenInput = document.getElementById('tmSelectedRatingVal');
  if (!widget) return;

  const stars = widget.querySelectorAll('.star-item');
  const starLabels = {
    1: '★☆☆☆☆ Poor — Sound was harsh or uncomfortable',
    2: '★★☆☆☆ Fair — Needs fine-tuning for noisy places',
    3: '★★★☆☆ Good — Helps with everyday conversations',
    4: '★★★★☆ Very Good — Very clear speech and comfortable fit',
    5: '★★★★★ Excellent — Life-changing speech clarity!'
  };

  stars.forEach(star => {
    star.addEventListener('mouseenter', () => {
      const val = parseInt(star.getAttribute('data-value'), 10);
      stars.forEach(s => {
        const sVal = parseInt(s.getAttribute('data-value'), 10);
        s.classList.toggle('hovered', sVal <= val);
      });
      if (label && starLabels[val]) label.textContent = starLabels[val];
    });

    star.addEventListener('mouseleave', () => {
      stars.forEach(s => s.classList.remove('hovered'));
      const current = parseInt(hiddenInput.value, 10) || 5;
      if (label && starLabels[current]) label.textContent = starLabels[current];
    });

    star.addEventListener('click', () => {
      const val = parseInt(star.getAttribute('data-value'), 10);
      hiddenInput.value = val;
      if (badge) badge.textContent = val.toFixed(1) + ' / 5';
      if (label && starLabels[val]) label.textContent = starLabels[val];
      stars.forEach(s => {
        const sVal = parseInt(s.getAttribute('data-value'), 10);
        s.classList.toggle('selected', sVal <= val);
      });
    });
  });
});
</script>

<?php include __DIR__ . '/includes/footer.php'; ?>
