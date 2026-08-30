<?php
/**
 * Compare Hearing Aids — Turtle Maarks Hearing Health
 */
$page_title       = 'Compare Hearing Aids — Turtle Maarks Hearing Health';
$page_description = 'Side-by-side comparison of digital hearing aids: channels, battery type, Bluetooth streaming, style, and warranty.';
$active_nav       = 'products';
include __DIR__ . '/includes/header.php';
?>

  <!-- HERO BANNER -->
  <section class="tm-page-hero text-center position-relative">
    <div class="container">
      <nav aria-label="breadcrumb" class="d-inline-flex mb-2">
        <div class="tm-breadcrumb-pill">
          <a href="<?= e(url('index.php')) ?>"><i class="bi bi-house-door"></i> Home</a>
          <span class="tm-breadcrumb-sep"><i class="bi bi-chevron-right"></i></span>
          <a href="<?= e(url('products.php')) ?>">Hearing Aids</a>
          <span class="tm-breadcrumb-sep"><i class="bi bi-chevron-right"></i></span>
          <span class="tm-breadcrumb-current" aria-current="page">Compare</span>
        </div>
      </nav>
      <h1 class="display-6 fw-bold text-white mb-2 font-heading">Side-by-Side Model Comparison</h1>
      <p class="text-white-50 mx-auto small mb-0" style="max-width: 580px;">Compare up to 4 hearing aid models across 15+ audiological and physical specifications.</p>
    </div>
  </section>

  <!-- COMPARE MATRIX CONTAINER -->
  <section class="py-5 bg-light">
    <div class="container" id="tmComparePageWrap">
      <!-- Generated dynamically by compare.js -->
    </div>
  </section>

<?php include __DIR__ . '/includes/footer.php'; ?>
