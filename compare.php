<?php
/**
 * Compare Hearing Aids — Turtle Maarks Hearing Health
 */
$page_title       = 'Compare Hearing Aids — Turtle Maarks Hearing Health';
$page_description = 'Side-by-side comparison of digital hearing aids: channels, battery type, Bluetooth streaming, style, and warranty.';
$active_nav       = 'products';
include __DIR__ . '/includes/header.php';
?>

<section class="py-4 bg-navy text-white text-center position-relative">
    <div class="container">
      <h1 class="h3 fw-bold text-white mb-1">Side-by-Side Model Comparison</h1>
      <p class="text-white-50 small mb-0">Compare up to 4 hearing aid models across 15+ audiological and physical specifications.</p>
    </div>
  </section>

  <!-- COMPARE MATRIX CONTAINER -->
  <section class="py-5 bg-light">
    <div class="container" id="tmComparePageWrap">
      <!-- Generated dynamically by compare.js -->
    </div>
  </section>

<?php include __DIR__ . '/includes/footer.php'; ?>
