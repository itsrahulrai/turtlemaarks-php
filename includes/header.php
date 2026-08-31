<?php
/**
 * REUSABLE SITE HEADER
 * Every page starts with:
 *   $page_title       = '...';           // <title>
 *   $page_description = '...';           // meta description
 *   $active_nav       = 'products';      // highlights the nav item
 *   $body_class       = '';              // optional
 *   $page_css         = [];              // optional extra stylesheets
 *   include __DIR__ . '/includes/header.php';
 */

require_once __DIR__ . '/config.php';

$page_title       = $page_title       ?? SITE_NAME . ' — ' . SITE_TAGLINE;
$page_description = $page_description ?? 'Authorized clinic for Phonak, Oticon, ReSound, Signia, Starkey, Widex digital hearing aids & sound-booth diagnostic hearing tests in Greater Noida West & Noida.';
$active_nav       = $active_nav       ?? '';
$body_class       = $body_class       ?? '';
$page_css         = $page_css         ?? [];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="theme-color" content="#0b2545">
  <title><?= e($page_title) ?></title>
  <meta name="description" content="<?= e($page_description) ?>">
  <link rel="icon" type="image/png" href="<?= e(url(SITE_FAVICON)) ?>">

  <!-- Google Fonts (Raleway — Modern, Elegant & Sophisticated) -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

  <!-- Bootstrap 5.3 CSS & Icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

  <!-- Design tokens & custom styles -->
  <?php foreach ($TM_CORE_CSS as $css): ?>
  <?php $fpath = __DIR__ . '/../' . $css; ?>
  <link rel="stylesheet" href="<?= e(url($css)) ?><?= file_exists($fpath) ? '?v=' . filemtime($fpath) : '' ?>">
  <?php endforeach; ?>
  <?php foreach ($page_css as $css): ?>
  <?php $fpath = __DIR__ . '/../' . $css; ?>
  <link rel="stylesheet" href="<?= e(url($css)) ?><?= file_exists($fpath) ? '?v=' . filemtime($fpath) : '' ?>">
  <?php endforeach; ?>
</head>
<body<?= $body_class ? ' class="' . e($body_class) . '"' : '' ?>>

  <!-- ============ TOP UTILITY BAR ============ -->
  <div class="tm-topbar">
    <div class="container">
      <div class="d-flex justify-content-between align-items-center">
        <!-- Left: Clinic Direct Channels -->
        <div class="d-flex align-items-center gap-2 gap-md-3">
          <a href="tel:<?= e(SITE_PHONE_RAW) ?>" class="tm-topbar-pill tm-topbar-pill-phone" title="Call Clinic Helpline">
            <span class="tm-topbar-pill-icon"><i class="bi bi-telephone-fill"></i></span>
            <span class="tm-topbar-pill-label d-none d-lg-inline"></span>
            <span class="tm-topbar-pill-val"><?= e(SITE_PHONE) ?></span>
          </a>
          <a href="mailto:<?= e(SITE_EMAIL) ?>" class="tm-topbar-pill tm-topbar-pill-mail d-none d-md-inline-flex" title="Email Clinic Team">
            <span class="tm-topbar-pill-icon"><i class="bi bi-envelope-fill"></i></span>
            <span class="tm-topbar-pill-val"><?= e(SITE_EMAIL) ?></span>
          </a>
        </div>

        <!-- Right: Clinic Live Status & Branded Social Circles -->
        <div class="d-flex align-items-center gap-2 gap-md-3">
          <div class="tm-topbar-timing d-none d-sm-inline-flex align-items-center">
            <span class="tm-live-indicator"><span class="tm-live-pulse"></span></span>
            <span><?= e(SITE_HOURS_SHORT) ?></span>
          </div>
          <span class="tm-topbar-sep d-none d-sm-inline-block"></span>
          <div class="d-flex align-items-center gap-2">
            <?php foreach ($TM_SOCIAL as $s): ?>
            <a href="<?= e($s['url']) ?>" target="_blank" rel="noopener" class="tm-ref-social-btn <?= e($s['class'] ?? '') ?>" title="<?= e($s['title']) ?>" aria-label="<?= e($s['title']) ?>"><i class="bi <?= e($s['icon']) ?>"></i></a>
            <?php endforeach; ?>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- ============ STICKY NAVBAR ============ -->
  <header class="tm-header">
    <div class="container">
      <nav class="navbar navbar-expand-lg py-2">
        <a class="navbar-brand d-flex align-items-center" href="<?= e(url('index.php')) ?>">
          <img src="<?= e(url(SITE_LOGO)) ?>" alt="<?= e(SITE_NAME) ?>" class="tm-brand-logo">
        </a>

        <button class="navbar-toggler border-0 shadow-none p-0" type="button" data-bs-toggle="offcanvas" data-bs-target="#tmMobileNav" aria-label="Toggle navigation">
          <i class="bi bi-list fs-2 text-navy"></i>
        </button>

        <div class="collapse navbar-collapse justify-content-center d-none d-lg-flex">
          <ul class="navbar-nav align-items-center gap-1">
            <?php foreach ($TM_NAV as $item): ?>
              <?php if (empty($item['children'])): ?>
                <li class="nav-item">
                  <a class="nav-link tm-nav-link <?= nav_active($item['key']) ?>" href="<?= e(url($item['url'])) ?>"><?= e($item['label']) ?></a>
                </li>
              <?php else: ?>
                <li class="nav-item dropdown">
                  <a class="nav-link tm-nav-link dropdown-toggle <?= nav_active($item['key']) ?>" href="<?= e(url($item['url'])) ?>" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <?= e($item['label']) ?>
                  </a>
                  <ul class="dropdown-menu tm-dropdown-menu">
                    <?php foreach ($item['children'] as $child): ?>
                      <?php if (!empty($child['divider'])): ?>
                        <li><hr class="dropdown-divider border-white-10 my-1"></li>
                      <?php else: ?>
                        <li>
                          <a class="dropdown-item tm-dropdown-item <?= !empty($child['highlight']) ? 'text-orange fw-bold' : '' ?>" href="<?= e(url($child['url'])) ?>">
                            <?php if (!empty($child['icon'])): ?><i class="bi <?= e($child['icon']) ?> <?= empty($child['highlight']) ? 'text-warning' : '' ?> me-1"></i><?php endif; ?><?= e($child['label']) ?>
                          </a>
                        </li>
                      <?php endif; ?>
                    <?php endforeach; ?>
                  </ul>
                </li>
              <?php endif; ?>
            <?php endforeach; ?>
          </ul>
        </div>

        <div class="d-none d-lg-flex align-items-center gap-2">
          <a href="<?= e(url('wishlist.php')) ?>" class="tm-icon-btn" title="Wishlist"><i class="bi bi-heart"></i><span class="tm-badge-count tm-wishlist-badge-count" style="display:none;">0</span></a>
          <button type="button" class="tm-icon-btn" data-bs-toggle="offcanvas" data-bs-target="#tmCartDrawer" title="Cart"><i class="bi bi-bag"></i><span class="tm-badge-count tm-cart-badge-count" style="display:none;">0</span></button>
          <a href="<?= e(url('login.php')) ?>" class="tm-icon-btn" title="Patient Portal"><i class="bi bi-person"></i></a>
          <a href="<?= e(url('book-appointment.php')) ?>" class="tm-btn-appointment ms-1" title="Book Doctor Appointment">
            <i class="bi bi-calendar2-check"></i>
            <span>Appointment</span>
          </a>
        </div>
      </nav>
    </div>
  </header>

  <!-- ============ MOBILE OFFCANVAS NAV ============ -->
  <div class="offcanvas offcanvas-start" tabindex="-1" id="tmMobileNav">
    <div class="offcanvas-header border-bottom">
      <img src="<?= e(url(SITE_LOGO)) ?>" alt="<?= e(SITE_SHORT) ?>" style="height: 52px; width: auto; object-fit: contain;">
      <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
      <ul class="navbar-nav mb-4">
        <?php foreach ($TM_NAV as $i => $item): ?>
          <?php if (empty($item['children'])): ?>
            <li class="nav-item"><a class="nav-link fw-bold text-navy py-2" href="<?= e(url($item['url'])) ?>"><?= e($item['label']) ?></a></li>
          <?php else: ?>
            <li class="nav-item">
              <a class="nav-link fw-bold text-navy py-2 d-flex justify-content-between align-items-center" data-bs-toggle="collapse" href="#tmMobileSub<?= $i ?>" role="button" aria-expanded="false">
                <?= e($item['label']) ?> <i class="bi bi-chevron-down small"></i>
              </a>
              <div class="collapse ps-3" id="tmMobileSub<?= $i ?>">
                <ul class="list-unstyled small py-1">
                  <?php foreach ($item['children'] as $child): ?>
                    <?php if (empty($child['divider'])): ?>
                      <li>
                        <a class="nav-link py-1 <?= !empty($child['highlight']) ? 'text-orange fw-bold' : 'text-secondary' ?>" href="<?= e(url($child['url'])) ?>">
                          <?= empty($child['highlight']) ? '• ' : '' ?><?= e($child['label']) ?><?= !empty($child['highlight']) ? ' →' : '' ?>
                        </a>
                      </li>
                    <?php endif; ?>
                  <?php endforeach; ?>
                </ul>
              </div>
            </li>
          <?php endif; ?>
        <?php endforeach; ?>
        <li class="nav-item"><a class="nav-link fw-bold text-navy py-2" href="<?= e(url('wishlist.php')) ?>">Wishlist</a></li>
        <li class="nav-item"><a class="nav-link fw-bold text-navy py-2" href="<?= e(url('login.php')) ?>"><i class="bi bi-person me-1"></i> Login</a></li>
      </ul>
      <div class="d-grid gap-2">
        <a href="<?= e(url('book-appointment.php')) ?>" class="tm-btn-appointment w-100 justify-content-center py-2 fs-6">
          <i class="bi bi-calendar2-check"></i>
          <span>Appointment</span>
        </a>
        <a href="<?= e(url('cart.php')) ?>" class="tm-btn tm-btn-outline-navy w-100">View Cart</a>
      </div>
      <div class="d-flex gap-2 mt-3 pt-3 border-top">
        <?php foreach ($TM_SOCIAL as $s): ?>
        <a href="<?= e($s['url']) ?>" target="_blank" rel="noopener" class="tm-ref-social-btn <?= e($s['class'] ?? '') ?>" title="<?= e($s['title']) ?>" aria-label="<?= e($s['title']) ?>"><i class="bi <?= e($s['icon']) ?>"></i></a>
        <?php endforeach; ?>
      </div>
    </div>
  </div>

  <main id="tmMainContent">
