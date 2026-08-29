<?php
/**
 * Saved Wishlist — Turtle Maarks Hearing Health
 */
$page_title       = 'Saved Wishlist — Turtle Maarks Hearing Health';
$page_description = 'View your saved hearing aids and accessories on Turtle Maarks.';
$active_nav       = 'products';
include __DIR__ . '/includes/header.php';
?>

<section class="py-4 bg-navy text-white text-center position-relative">
    <div class="container">
      <h1 class="h3 fw-bold text-white mb-1">My Saved Wishlist</h1>
      <p class="text-white-50 small mb-0">Your bookmarked hearing aids and diagnostic services.</p>
    </div>
  </section>

  <!-- WISHLIST GRID -->
  <section class="py-5 bg-light">
    <div class="container">
      <div class="row g-3" id="tmWishlistGrid">
        <!-- Rendered dynamically by wishlist.js -->
      </div>
    </div>
  </section>

<?php include __DIR__ . '/includes/footer.php'; ?>
