<?php
/**
 * Rechargeable Hearing Aids Category — Turtle Maarks
 */
$page_title       = 'Rechargeable Hearing Aids Category — Turtle Maarks';
$page_description = 'Explore lithium-ion rechargeable hearing aids with 30-hour battery life and portable fast chargers from Phonak, Oticon, ReSound, Signia, and Widex.';
$active_nav       = 'products';
include __DIR__ . '/includes/header.php';
?>

<section class="py-4 bg-navy text-white text-center position-relative">
    <div class="container py-2">
      <span class="tm-pill tm-pill-orange mb-2"><i class="bi bi-battery-charging"></i> Lithium-Ion Fast Charging</span>
      <h1 class="h3 fw-bold text-white mb-1">Rechargeable Hearing Aids</h1>
      <p class="text-white-50 small mb-0">Never change batteries again. Enjoy 24 to 30 hours of continuous speech clarity per 3-hour charge.</p>
    </div>
  </section>

  <!-- PRODUCTS GRID -->
  <section class="py-5 bg-light">
    <div class="container">
      <div class="row g-4" data-tm-products="rechargeable" data-tm-limit="8">
        <?php tm_product_grid(tm_products_filter(['rechargeableOnly' => true, 'limit' => 8]), ['col' => 'col-xl-3 col-lg-4 col-md-6']); ?>
      </div>
    </div>
  </section>

<?php include __DIR__ . '/includes/footer.php'; ?>
