<?php
/**
 * Digital Hearing Aids Catalog — Turtle Maarks Hearing Health
 */
$page_title       = 'Digital Hearing Aids Catalog — Turtle Maarks Hearing Health';
$page_description = 'Explore digital hearing aids from Phonak, Oticon, ReSound, Signia, Starkey, Widex. Filter by brand, style (RIC, CIC, BTE), and price in Noida Extension.';
$active_nav       = 'products';
$page_js          = ['assets/js/filter.js'];

require_once __DIR__ . '/includes/config.php';

/* Server-side catalogue: honours ?brand= ?style= ?category= ?q= ?sort= so the
   grid is populated (and indexable) even before filter.js takes over. */
$tm_criteria = [];
if (!empty($_GET['brand']))       { $tm_criteria['brand']       = (array) $_GET['brand']; }
if (!empty($_GET['style']))       { $tm_criteria['style']       = (array) $_GET['style']; }
if (!empty($_GET['subcategory'])) { $tm_criteria['subcategory'] = (array) $_GET['subcategory']; }
if (!empty($_GET['category']))    { $tm_criteria['category']    = (array) $_GET['category']; }
if (!empty($_GET['q']))           { $tm_criteria['search']      = $_GET['q']; }
if (!empty($_GET['sort']))        { $tm_criteria['sort']        = $_GET['sort']; }

$tm_catalogue = tm_products_filter($tm_criteria);
$tm_total     = count(tm_products_all());

// Pagination settings (9 products per page — 3x3 grid)
$per_page        = 9;
$total_matching  = count($tm_catalogue);
$total_pages     = max(1, (int) ceil($total_matching / $per_page));
$current_page    = max(1, min($total_pages, (int) ($_GET['page'] ?? 1)));
$offset          = ($current_page - 1) * $per_page;
$paged_catalogue = array_slice($tm_catalogue, $offset, $per_page);

// Helper for product page URL preservation
function product_page_url($page_num) {
    $params = $_GET;
    $params['page'] = $page_num;
    return 'products.php?' . http_build_query($params);
}

include __DIR__ . '/includes/header.php';
?>

  <!-- HERO BANNER -->
  <section class="tm-page-hero text-center position-relative">
    <div class="container">
      <nav aria-label="breadcrumb" class="d-inline-flex mb-2">
        <div class="tm-breadcrumb-pill">
          <a href="<?= e(url('index.php')) ?>"><i class="bi bi-house-door"></i> Home</a>
          <span class="tm-breadcrumb-sep"><i class="bi bi-chevron-right"></i></span>
          <span class="tm-breadcrumb-current" aria-current="page">Hearing Aids</span>
        </div>
      </nav>
      <h1 class="display-6 fw-bold text-white mb-2 font-heading">Digital Hearing Aids</h1>
      <p class="text-white-50 mx-auto small mb-0" style="max-width: 620px;">Compare 50+ models with official warranty, 7-day free trial, and lifetime acoustic fine-tuning.</p>
    </div>
  </section>

  <!-- CATALOG & FILTER WRAPPER -->
  <section class="py-4 bg-light">
    <div class="container">
      <div class="row g-4">
        
        <!-- Filter Sidebar — slides in as an offcanvas below lg, static column above -->
        <div class="col-lg-3">
          <div class="offcanvas-lg offcanvas-start" tabindex="-1" id="tmFilterPanel" aria-labelledby="tmFilterPanelLabel">
            <div class="offcanvas-header border-bottom">
              <h6 class="offcanvas-title fw-bold text-navy mb-0" id="tmFilterPanelLabel">Filter Hearing Aids</h6>
              <button type="button" class="btn-close" data-bs-dismiss="offcanvas" data-bs-target="#tmFilterPanel" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body p-3 p-lg-0">
          <div class="card rounded-4 border p-4 bg-white shadow-xs sticky-lg-top w-100" style="top: 85px;">
            <div class="d-flex justify-content-between align-items-center mb-3 pb-2 border-bottom">
              <h6 class="fw-bold text-navy mb-0"><i class="bi bi-funnel text-orange me-1"></i> Filter By</h6>
              <button class="btn btn-sm btn-link text-orange p-0 small" id="tmClearFiltersBtn">Reset All</button>
            </div>

            <!-- 1. Category Filter -->
            <div class="mb-4">
              <label class="form-label small fw-bold text-navy text-uppercase tracking-wider d-flex justify-content-between align-items-center mb-2">
                <span><i class="bi bi-grid-fill text-orange me-1"></i> Category</span>
              </label>
              <div class="d-flex flex-column gap-2 small">
                <div class="form-check d-flex align-items-center justify-content-between">
                  <div>
                    <input class="form-check-input filter-category-checkbox" type="checkbox" value="hearing-aids" id="catHearingAids">
                    <label class="form-check-label" for="catHearingAids">Digital Hearing Aids</label>
                  </div>
                  <span class="badge bg-light text-muted border rounded-pill">57</span>
                </div>
                <div class="form-check d-flex align-items-center justify-content-between">
                  <div>
                    <input class="form-check-input filter-category-checkbox" type="checkbox" value="rechargeable" id="catRechargeable">
                    <label class="form-check-label" for="catRechargeable">Rechargeable Models</label>
                  </div>
                  <span class="badge bg-light text-muted border rounded-pill">14</span>
                </div>
                <div class="form-check d-flex align-items-center justify-content-between">
                  <div>
                    <input class="form-check-input filter-category-checkbox" type="checkbox" value="bluetooth" id="catBluetooth">
                    <label class="form-check-label" for="catBluetooth">Bluetooth / Wireless</label>
                  </div>
                  <span class="badge bg-light text-muted border rounded-pill">56</span>
                </div>
                <div class="form-check d-flex align-items-center justify-content-between">
                  <div>
                    <input class="form-check-input filter-category-checkbox" type="checkbox" value="accessories" id="catAccessories">
                    <label class="form-check-label" for="catAccessories">Accessories &amp; Care</label>
                  </div>
                  <span class="badge bg-light text-muted border rounded-pill">2</span>
                </div>
              </div>
            </div>

            <!-- 2. Subcategory Filter -->
            <div class="mb-4">
              <label class="form-label small fw-bold text-navy text-uppercase tracking-wider d-flex justify-content-between align-items-center mb-2">
                <span><i class="bi bi-diagram-3-fill text-orange me-1"></i> Subcategory</span>
              </label>
              <div class="d-flex flex-column gap-2 small">
                <div class="form-check d-flex align-items-center justify-content-between">
                  <div>
                    <input class="form-check-input filter-subcategory-checkbox" type="checkbox" value="RIC" id="subRic">
                    <label class="form-check-label" for="subRic">Receiver-In-Canal (RIC)</label>
                  </div>
                  <span class="badge bg-light text-muted border rounded-pill">13</span>
                </div>
                <div class="form-check d-flex align-items-center justify-content-between">
                  <div>
                    <input class="form-check-input filter-subcategory-checkbox" type="checkbox" value="BTE" id="subBte">
                    <label class="form-check-label" for="subBte">Behind-The-Ear (BTE)</label>
                  </div>
                  <span class="badge bg-light text-muted border rounded-pill">37</span>
                </div>
                <div class="form-check d-flex align-items-center justify-content-between">
                  <div>
                    <input class="form-check-input filter-subcategory-checkbox" type="checkbox" value="CIC" id="subCic">
                    <label class="form-check-label" for="subCic">Completely-In-Canal (CIC)</label>
                  </div>
                  <span class="badge bg-light text-muted border rounded-pill">3</span>
                </div>
                <div class="form-check d-flex align-items-center justify-content-between">
                  <div>
                    <input class="form-check-input filter-subcategory-checkbox" type="checkbox" value="IIC" id="subIic">
                    <label class="form-check-label" for="subIic">100% Invisible (IIC)</label>
                  </div>
                  <span class="badge bg-light text-muted border rounded-pill">2</span>
                </div>
                <div class="form-check d-flex align-items-center justify-content-between">
                  <div>
                    <input class="form-check-input filter-subcategory-checkbox" type="checkbox" value="ITC" id="subItc">
                    <label class="form-check-label" for="subItc">In-The-Canal (ITC / ITE)</label>
                  </div>
                  <span class="badge bg-light text-muted border rounded-pill">4</span>
                </div>
                <div class="form-check d-flex align-items-center justify-content-between">
                  <div>
                    <input class="form-check-input filter-subcategory-checkbox" type="checkbox" value="Accessory" id="subAcc">
                    <label class="form-check-label" for="subAcc">Chargers &amp; Care Kits</label>
                  </div>
                  <span class="badge bg-light text-muted border rounded-pill">2</span>
                </div>
              </div>
            </div>

            <!-- 3. Manufacturer Brands Filter -->
            <div class="mb-4">
              <label class="form-label small fw-bold text-navy text-uppercase tracking-wider mb-2">
                <i class="bi bi-patch-check-fill text-orange me-1"></i>  Brand
              </label>
              <div class="d-flex flex-column gap-2 small">
                <div class="form-check">
                  <input class="form-check-input filter-brand-checkbox" type="checkbox" value="Widex" id="bWidex">
                  <label class="form-check-label" for="bWidex">Widex (Denmark)</label>
                </div>
                <div class="form-check">
                  <input class="form-check-input filter-brand-checkbox" type="checkbox" value="Starkey" id="bStarkey">
                  <label class="form-check-label" for="bStarkey">Starkey (USA)</label>
                </div>
                <div class="form-check">
                  <input class="form-check-input filter-brand-checkbox" type="checkbox" value="Unitron" id="bUnitron">
                  <label class="form-check-label" for="bUnitron">Unitron (Canada)</label>
                </div>
                <div class="form-check">
                  <input class="form-check-input filter-brand-checkbox" type="checkbox" value="Phonak" id="bPhonak">
                  <label class="form-check-label" for="bPhonak">Phonak (Switzerland)</label>
                </div>
                <div class="form-check">
                  <input class="form-check-input filter-brand-checkbox" type="checkbox" value="ReSound" id="bResound">
                  <label class="form-check-label" for="bResound">GN ReSound (Denmark)</label>
                </div>
                <div class="form-check">
                  <input class="form-check-input filter-brand-checkbox" type="checkbox" value="Signia" id="bSignia">
                  <label class="form-check-label" for="bSignia">Signia (Germany)</label>
                </div>
                <div class="form-check">
                  <input class="form-check-input filter-brand-checkbox" type="checkbox" value="Oticon" id="bOticon">
                  <label class="form-check-label" for="bOticon">Oticon (Denmark)</label>
                </div>
              </div>
            </div>

            <!-- Price Slider -->
            <div class="mb-3">
              <label class="form-label small fw-bold text-navy text-uppercase tracking-wider">Max Price Range</label>
              <input type="range" class="form-range" min="15000" max="500000" step="5000" id="tmPriceRangeInput" value="500000">
              <div class="d-flex justify-content-between small text-muted">
                <span>₹15,000</span>
                <span class="fw-bold text-navy" id="tmPriceRangeDisplay">₹5,00,000</span>
              </div>
            </div>
          </div>
            </div>
          </div>
        </div>

        <!-- Products Grid (Right) -->
        <div class="col-lg-9">
          <!-- Filter Controls Bar -->
          <div class="card rounded-3 border p-3 bg-white mb-3 shadow-xs d-flex flex-column flex-sm-row gap-2 justify-content-between align-items-sm-center">
            <div class="d-flex align-items-center gap-2">
              <button class="tm-btn tm-btn-outline-navy btn-sm d-lg-none" type="button" data-bs-toggle="offcanvas" data-bs-target="#tmFilterPanel" aria-controls="tmFilterPanel">
                <i class="bi bi-funnel"></i> Filters
              </button>
              <span class="small text-muted fw-bold" id="tmProductsMatchCount">
                Showing <strong><?= $total_matching > 0 ? ($offset + 1) : 0 ?> &ndash; <?= min($offset + $per_page, $total_matching) ?></strong> of <strong><?= $total_matching ?></strong> models (Page <strong><?= $current_page ?></strong> of <strong><?= $total_pages ?></strong>)
              </span>
            </div>
            <div class="d-flex align-items-center gap-2">
              <span class="small text-muted d-none d-sm-inline">Sort:</span>
              <select class="form-select form-select-sm" id="tmSortSelect" style="width: 170px;">
                <option value="featured">Featured First</option>
                <option value="price-low">Price: Low to High</option>
                <option value="price-high">Price: High to Low</option>
                <option value="rating">Highest Rated</option>
              </select>
            </div>
          </div>

          <!-- Dynamic Products Grid -->
          <div class="row g-3" id="tmProductsGrid">
            <?php tm_product_grid($paged_catalogue, ['col' => 'col-xl-4 col-lg-4 col-md-6']); ?>
          </div>

          <!-- PAGINATION CONTROLS (DESIGNED SAME LIKE BLOGS PAGE) -->
          <div id="tmProductsPaginationWrap">
            <?php if ($total_pages > 1): ?>
              <nav aria-label="Product pagination" class="d-flex justify-content-center mt-4 mb-4">
                <ul class="tm-pagination shadow-xs rounded-3 p-1 bg-white border">
                  
                  <!-- Previous Button -->
                  <li class="page-item <?= ($current_page <= 1) ? 'disabled' : '' ?>">
                    <a class="page-link" href="<?= e(product_page_url($current_page - 1)) ?>" aria-label="Previous">
                      <i class="bi bi-chevron-left"></i>
                    </a>
                  </li>

                  <!-- Numbered Pages -->
                  <?php for ($p = 1; $p <= $total_pages; $p++): ?>
                    <li class="page-item <?= ($p === $current_page) ? 'active' : '' ?>">
                      <a class="page-link" href="<?= e(product_page_url($p)) ?>"><?= $p ?></a>
                    </li>
                  <?php endfor; ?>

                  <!-- Next Button -->
                  <li class="page-item <?= ($current_page >= $total_pages) ? 'disabled' : '' ?>">
                    <a class="page-link" href="<?= e(product_page_url($current_page + 1)) ?>" aria-label="Next">
                      <i class="bi bi-chevron-right"></i>
                    </a>
                  </li>

                </ul>
              </nav>
            <?php endif; ?>
          </div>
        </div>

      </div>
    </div>
  </section>

<?php include __DIR__ . '/includes/footer.php'; ?>
