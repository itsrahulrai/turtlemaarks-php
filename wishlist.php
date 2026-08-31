<?php
/**
 * Saved Wishlist — Turtle Maarks Hearing Health
 */
$page_title       = 'Saved Wishlist — Turtle Maarks Hearing Health';
$page_description = 'View your saved hearing aids and accessories on Turtle Maarks.';
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
          <span class="tm-breadcrumb-current" aria-current="page">Saved Wishlist</span>
        </div>
      </nav>
      <h1 class="display-6 fw-bold text-white mb-2 font-heading">My Saved Wishlist</h1>
      <p class="text-white-50 mx-auto small mb-0" style="max-width: 580px;">Your bookmarked hearing aids and diagnostic clinical services.</p>
    </div>
  </section>

  <!-- WISHLIST GRID -->
  <section class="py-5 bg-light">
    <div class="container">
      <div class="d-flex flex-column flex-sm-row justify-content-between align-items-sm-center mb-4 gap-2 pb-2 border-bottom" id="tmWishlistHeader" style="display: none !important;">
        <div>
          <h4 class="fw-bold text-navy mb-0" id="tmWishlistCountHeading">Saved Products</h4>
          <span class="text-muted small">Manage your saved hearing aids and clinical accessories</span>
        </div>
        <button type="button" class="tm-btn tm-btn-outline-danger tm-btn-sm" onclick="Wishlist.clear()">
          <i class="bi bi-trash3 me-1"></i> Clear Wishlist
        </button>
      </div>

      <div class="row g-3" id="tmWishlistGrid">
        <!-- Rendered dynamically by wishlist.js -->
      </div>
    </div>
  </section>

<?php include __DIR__ . '/includes/footer.php'; ?>
