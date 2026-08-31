<?php
/**
 * CANONICAL PRODUCT CARD — the single card markup used site-wide.
 * Never echo product markup anywhere else; call tm_product_card($p) instead.
 *
 * Expected in scope:  $p (product array), $col (column classes), $wrap (bool)
 * Its JS twin (identical markup) lives in assets/js/products.js -> renderCard()
 * and is used only where cards are re-rendered live (filters, search, wishlist).
 */

$col  = $col  ?? 'col-xl-3 col-lg-4 col-md-6';
$wrap = isset($wrap) ? $wrap : true;

$price = (float) $p['price'];
$mrp   = (float) ($p['mrp'] ?? $p['price']);

$savings    = max(0, $mrp - $price);
$savePct    = $mrp > $price ? (int) round((($mrp - $price) / $mrp) * 100) : 0;
$badgeText  = !empty($p['badge']) ? $p['badge'] : ($savePct > 0 ? $savePct . '% OFF' : 'Authorized');
$image      = !empty($p['image']) ? $p['image'] : 'assets/images/hearing-aid/ric.webp';
$detailUrl  = url('product-detail.php?id=' . urlencode($p['id']));
$trialUrl   = url('book-appointment.php?model=' . urlencode($p['name']));

/* payloads for the JS cart / wishlist controllers */
$jsItem = "{id:'" . js_str($p['id']) . "', name:'" . js_str($p['name']) . "', brand:'" . js_str($p['brand'] ?? SITE_SHORT)
        . "', price:" . (int) $price . ", mrp:" . (int) $mrp . ", image:'" . js_str($image) . "'}";
?>
<?php if ($wrap): ?><div class="<?= e($col) ?>"><?php endif; ?>
  <div class="tm-product-card" data-product-id="<?= e($p['id']) ?>">

    <!-- Media, badge & floating actions -->
    <div class="tm-product-media">
      <span class="tm-product-save-badge"><?= e($badgeText) ?></span>

      <div class="tm-product-actions-group">
        <button type="button" class="tm-product-action-btn"
                data-wishlist-id="<?= e($p['id']) ?>"
                onclick="Wishlist.toggle(<?= $jsItem ?>)"
                title="Add to Wishlist" aria-label="Wishlist">
          <i class="bi bi-heart"></i>
        </button>
      </div>

      <a href="<?= e($detailUrl) ?>" class="tm-product-img-wrap d-flex align-items-center justify-content-center">
        <img src="<?= e(url($image)) ?>" alt="<?= e($p['name']) ?>" class="tm-product-img" loading="lazy">
      </a>
    </div>

    <!-- Body -->
    <div class="tm-product-body">

      <div class="tm-product-brand-tag">
        <span class="tm-brand-name">
          <i class="bi bi-shield-check text-orange me-1"></i><?= e($p['brand']) ?>
          <span class="tm-origin-text">• <?= e($p['brandOrigin'] ?? 'Global') ?></span>
        </span>
        <span class="tm-rating-chip">
          <i class="bi bi-star-fill text-warning"></i> <?= number_format((float) ($p['rating'] ?? 4.9), 1) ?>
          <span class="text-muted tm-reviews-count">(<?= (int) ($p['reviews'] ?? 20) ?>)</span>
        </span>
      </div>

      <h6 class="tm-product-title">
        <a href="<?= e($detailUrl) ?>" title="<?= e($p['name']) ?>"><?= e($p['name']) ?></a>
      </h6>

      <div class="tm-product-specs-chips">
        <?php if (!empty($p['style'])): ?>
          <span class="tm-spec-chip tm-spec-style"><i class="bi bi-soundwave"></i> <?= e($p['style']) ?></span>
        <?php endif; ?>
        <?php if (!empty($p['rechargeable'])): ?>
          <span class="tm-spec-chip tm-spec-recharge"><i class="bi bi-battery-charging text-success"></i> Rechargeable</span>
        <?php endif; ?>
        <?php if (!empty($p['bluetooth'])): ?>
          <span class="tm-spec-chip tm-spec-bt"><i class="bi bi-bluetooth text-primary"></i> Bluetooth</span>
        <?php endif; ?>
        <?php if (!empty($p['channels'])): ?>
          <span class="tm-spec-chip tm-spec-channels"><i class="bi bi-cpu"></i> <?= (int) $p['channels'] ?> Ch</span>
        <?php endif; ?>
        <?php if (!empty($p['featureHighlight'])): ?>
          <span class="tm-spec-chip tm-spec-feature"><?= e($p['featureHighlight']) ?></span>
        <?php endif; ?>
      </div>

      <div class="tm-product-price-row">
        <div>
          <div class="tm-product-sale-price"><?= inr($price) ?></div>
          <?php if ($mrp > $price): ?>
            <div class="tm-product-mrp">MRP: <?= inr($mrp) ?></div>
          <?php endif; ?>
        </div>
        <button type="button" class="tm-product-btn-cart" onclick="Cart.addItem(<?= $jsItem ?>)" title="Add to Cart">
          <i class="bi bi-cart-plus-fill"></i> Add to Cart
        </button>
      </div>

      <?php if (!empty($options['isWishlistPage'])): ?>
        <div class="tm-product-wishlist-actions mt-2 pt-2 border-top">
          <button type="button" class="tm-btn tm-btn-sm tm-btn-outline-danger w-100 d-flex align-items-center justify-content-center gap-1"
                  onclick="Wishlist.toggle(<?= $jsItem ?>)" title="Remove product from Wishlist">
            <i class="bi bi-trash3"></i> Remove from Wishlist
          </button>
        </div>
      <?php endif; ?>

    </div>
  </div>
<?php if ($wrap): ?></div><?php endif; ?>
