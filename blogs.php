<?php
/**
 * Turtle Maarks Hearing Health — Blogs & Educational Articles
 * Clean, modern layout with category filtering and pagination.
 */
$page_title       = 'Hearing Health Blogs & Audiology Guides — Turtle Maarks';
$page_description = 'Expert audiology articles, hearing aid buying guides, diagnostic testing walkthroughs, and ear care advice from certified audiologists in Noida Extension.';
$active_nav       = 'blogs';

require_once __DIR__ . '/includes/config.php';

// Load all articles from repository
$all_blogs = tm_blogs_all();

// Category icons and counts
$category_counts = ['All' => count($all_blogs)];
foreach ($all_blogs as $b) {
    $c = $b['category'];
    $category_counts[$c] = ($category_counts[$c] ?? 0) + 1;
}

$category_icons = [
    'All'          => 'bi-grid-fill',
    'Buying Guide' => 'bi-bag-check-fill',
    'Diagnostics'  => 'bi-activity',
    'Senior Care'  => 'bi-heart-pulse-fill',
    'Therapy'      => 'bi-soundwave',
    'Technology'   => 'bi-cpu-fill',
    'Wellness'     => 'bi-shield-check',
];

// Available categories for filtering
$categories = ['All', 'Buying Guide', 'Diagnostics', 'Senior Care', 'Therapy', 'Technology', 'Wellness'];

// Current Filter & Sort Parameters
$selected_category = trim($_GET['category'] ?? 'All');
$search_query      = trim($_GET['q'] ?? '');
$sort_order        = trim($_GET['sort'] ?? 'newest');

// Filter data
$filtered_blogs = array_filter($all_blogs, function ($item) use ($selected_category, $search_query) {
    if ($selected_category !== 'All' && strcasecmp($item['category'], $selected_category) !== 0) {
        return false;
    }
    if (!empty($search_query)) {
        $q = mb_strtolower($search_query);
        $title_match = mb_stripos($item['title'], $q) !== false;
        $desc_match  = mb_stripos($item['excerpt'], $q) !== false;
        $cat_match   = mb_stripos($item['category'], $q) !== false;
        if (!$title_match && !$desc_match && !$cat_match) {
            return false;
        }
    }
    return true;
});

// Re-index array
$filtered_blogs = array_values($filtered_blogs);

// Sort data
if ($sort_order === 'oldest') {
    $filtered_blogs = array_reverse($filtered_blogs);
} elseif ($sort_order === 'read_time') {
    usort($filtered_blogs, function ($a, $b) {
        $ta = (int) filter_var($a['read_time'], FILTER_SANITIZE_NUMBER_INT);
        $tb = (int) filter_var($b['read_time'], FILTER_SANITIZE_NUMBER_INT);
        return $ta <=> $tb;
    });
}

$total_articles = count($filtered_blogs);

// Pagination settings (6 cards per page)
$per_page     = 6;
$total_pages  = max(1, (int) ceil($total_articles / $per_page));
$current_page = max(1, min($total_pages, (int) ($_GET['page'] ?? 1)));
$offset       = ($current_page - 1) * $per_page;
$display_blogs = array_slice($filtered_blogs, $offset, $per_page);

// Helper function for pagination & filter links
function blog_page_url($page_num, $cat, $q, $sort = 'newest') {
    $params = ['page' => $page_num];
    if ($cat !== 'All') {
        $params['category'] = $cat;
    }
    if (!empty($q)) {
        $params['q'] = $q;
    }
    if ($sort !== 'newest') {
        $params['sort'] = $sort;
    }
    return 'blogs.php?' . http_build_query($params);
}

include __DIR__ . '/includes/header.php';
?>

  <!-- HERO BANNER -->
  <section class="py-5 pb-5 bg-navy text-white text-center position-relative">
    <div class="container py-2 pb-3">
      <span class="tm-pill tm-pill-orange mb-2"><i class="bi bi-journal-medical"></i> Educational Journal</span>
      <h1 class="display-6 fw-bold text-white mb-2">Hearing Health &amp; Audiology Blogs</h1>
      <p class="text-white-50 mx-auto small mb-0" style="max-width: 680px;">
        Evidence-based guides, hearing aid buying comparisons, clinical diagnostics insights, and practical ear care advice from certified audiologists.
      </p>
    </div>
  </section>

  <!-- MAIN BLOG CONTENT & PAGINATION -->
  <section class="pb-5 bg-light">
    <div class="container">
      
      <!-- ELEVATED MODERN FILTER & SEARCH CARD -->
      <div class="tm-blog-filter-card">
        
        <!-- Top Toolbar: Search & Sort -->
        <div class="row g-3 align-items-center justify-content-between mb-3">
          
          <div class="col-lg-5 col-md-6">
            <!-- Modern Search Box -->
            <form action="blogs.php" method="GET" class="tm-blog-search-wrap">
              <?php if ($selected_category !== 'All'): ?>
                <input type="hidden" name="category" value="<?= e($selected_category) ?>">
              <?php endif; ?>
              <?php if ($sort_order !== 'newest'): ?>
                <input type="hidden" name="sort" value="<?= e($sort_order) ?>">
              <?php endif; ?>
              <i class="bi bi-search tm-blog-search-icon"></i>
              <input type="text" name="q" class="form-control tm-blog-search-input" placeholder="Search guides, tests, hearing aids..." value="<?= e($search_query) ?>">
              <?php if (!empty($search_query)): ?>
                <?php 
                  $clear_q_url = 'blogs.php?' . http_build_query(array_merge(
                      $selected_category !== 'All' ? ['category' => $selected_category] : [],
                      $sort_order !== 'newest' ? ['sort' => $sort_order] : []
                  ));
                ?>
                <a href="<?= e($clear_q_url) ?>" class="tm-blog-search-clear" title="Clear Search">
                  <i class="bi bi-x-circle-fill"></i>
                </a>
              <?php endif; ?>
            </form>
          </div>

          <div class="col-lg-7 col-md-6">
            <div class="d-flex align-items-center justify-content-md-end gap-3 flex-wrap">
              <!-- Quick Sort Dropdown -->
              <div class="d-flex align-items-center gap-2">
                <label for="blogSortSelect" class="small text-muted fw-bold text-nowrap"><i class="bi bi-sort-down text-orange me-1"></i> Sort:</label>
                <select id="blogSortSelect" class="form-select form-select-sm rounded-3 border-light-subtle shadow-xs text-navy" style="width: auto; min-width: 160px;" onchange="window.location.href=this.value">
                  <?php 
                    $sort_base = array_merge(
                        $selected_category !== 'All' ? ['category' => $selected_category] : [],
                        !empty($search_query) ? ['q' => $search_query] : []
                    );
                  ?>
                  <option value="blogs.php?<?= http_build_query(array_merge($sort_base, ['sort' => 'newest'])) ?>" <?= $sort_order === 'newest' ? 'selected' : '' ?>>Latest Articles</option>
                  <option value="blogs.php?<?= http_build_query(array_merge($sort_base, ['sort' => 'oldest'])) ?>" <?= $sort_order === 'oldest' ? 'selected' : '' ?>>Oldest Articles</option>
                  <option value="blogs.php?<?= http_build_query(array_merge($sort_base, ['sort' => 'read_time'])) ?>" <?= $sort_order === 'read_time' ? 'selected' : '' ?>>Shortest Read</option>
                </select>
              </div>

              <!-- Quick Reset Link (if active filters exist) -->
              <?php if ($selected_category !== 'All' || !empty($search_query) || $sort_order !== 'newest'): ?>
                <a href="blogs.php" class="btn btn-sm btn-outline-danger rounded-pill px-3 py-1 text-nowrap d-inline-flex align-items-center gap-1">
                  <i class="bi bi-arrow-counterclockwise"></i> Reset Filters
                </a>
              <?php endif; ?>
            </div>
          </div>

        </div>

        <!-- Category Filter Pills Bar -->
        <div class="pt-2">
          <div class="tm-filter-scroll">
            <?php foreach ($categories as $cat): ?>
              <?php 
                $isActive = ($selected_category === $cat);
                $icon = $category_icons[$cat] ?? 'bi-tag-fill';
                $count = $category_counts[$cat] ?? 0;
                $cat_url = 'blogs.php?' . http_build_query(array_merge(
                    $cat !== 'All' ? ['category' => $cat] : [],
                    !empty($search_query) ? ['q' => $search_query] : [],
                    $sort_order !== 'newest' ? ['sort' => $sort_order] : []
                ));
              ?>
              <a href="<?= e($cat_url) ?>" class="tm-filter-pill-btn <?= $isActive ? 'active' : '' ?>">
                <i class="bi <?= e($icon) ?>"></i>
                <span><?= e($cat) ?></span>
                <span class="tm-filter-count"><?= $count ?></span>
              </a>
            <?php endforeach; ?>
          </div>
        </div>

        <!-- Active Filter Indicator Tags (if filtered) -->
        <?php if ($selected_category !== 'All' || !empty($search_query)): ?>
          <div class="tm-active-chips-strip">
            <span class="small text-muted fw-bold">Active filters:</span>
            <?php if ($selected_category !== 'All'): ?>
              <?php 
                $remove_cat_url = 'blogs.php?' . http_build_query(array_merge(
                    !empty($search_query) ? ['q' => $search_query] : [],
                    $sort_order !== 'newest' ? ['sort' => $sort_order] : []
                ));
              ?>
              <span class="tm-active-chip">
                <span>Category: <strong><?= e($selected_category) ?></strong></span>
                <a href="<?= e($remove_cat_url) ?>" title="Remove Category Filter"><i class="bi bi-x-circle-fill"></i></a>
              </span>
            <?php endif; ?>

            <?php if (!empty($search_query)): ?>
              <?php 
                $remove_q_url = 'blogs.php?' . http_build_query(array_merge(
                    $selected_category !== 'All' ? ['category' => $selected_category] : [],
                    $sort_order !== 'newest' ? ['sort' => $sort_order] : []
                ));
              ?>
              <span class="tm-active-chip">
                <span>Search: &ldquo;<strong><?= e($search_query) ?></strong>&rdquo;</span>
                <a href="<?= e($remove_q_url) ?>" title="Remove Search Query"><i class="bi bi-x-circle-fill"></i></a>
              </span>
            <?php endif; ?>
          </div>
        <?php endif; ?>

      </div>

      <!-- Results Count Bar -->
      <div class="d-flex align-items-center justify-content-between mb-4">
        <div class="small text-secondary">
          Showing <strong><?= $total_articles > 0 ? ($offset + 1) : 0 ?> &ndash; <?= min($offset + $per_page, $total_articles) ?></strong> of <strong><?= $total_articles ?></strong> articles
          <?php if ($selected_category !== 'All'): ?>
            in <span class="badge bg-navy text-white rounded-pill ms-1"><?= e($selected_category) ?></span>
          <?php endif; ?>
          <?php if (!empty($search_query)): ?>
            matching &ldquo;<em><?= e($search_query) ?></em>&rdquo;
          <?php endif; ?>
        </div>
        <div class="small text-muted d-none d-sm-block">
          Page <strong><?= $current_page ?></strong> of <strong><?= $total_pages ?></strong>
        </div>
      </div>

      <!-- Blog Cards Grid (3 Columns on Large Screens) -->
      <?php if (empty($display_blogs)): ?>
        <div class="text-center py-5 bg-white rounded-4 border shadow-xs">
          <div class="rounded-circle bg-light p-3 d-inline-flex mb-3">
            <i class="bi bi-search text-orange fs-2"></i>
          </div>
          <h5 class="fw-bold text-navy mb-2">No Articles Found</h5>
          <p class="text-muted small mb-3">No blogs matched your search or selected filter category.</p>
          <a href="blogs.php" class="tm-btn tm-btn-primary btn-sm">Clear All Filters</a>
        </div>
      <?php else: ?>
        <div class="row g-4 row-cols-1 row-cols-md-2 row-cols-lg-3 mb-5">
          <?php foreach ($display_blogs as $blog): ?>
            <div class="col">
              <article class="tm-blog-card shadow-xs">
                <div class="tm-blog-img-wrap">
                  <img src="<?= e(url($blog['image'])) ?>" alt="<?= e($blog['title']) ?>" loading="lazy">
                  <span class="tm-blog-badge <?= e($blog['badge_class']) ?>"><?= e($blog['category']) ?></span>
                  <span class="tm-blog-read-time"><i class="bi bi-clock me-1"></i> <?= e($blog['read_time']) ?></span>
                </div>
                <div class="tm-blog-body">
                  <div class="tm-blog-meta">
                    <span class="tm-blog-meta-item"><i class="bi bi-calendar3 text-orange"></i> <?= e($blog['date']) ?></span>
                    <span class="tm-blog-meta-item text-secondary">•</span>
                    <span class="tm-blog-meta-item"><i class="bi bi-patch-check-fill text-success"></i> <?= e($blog['author']) ?></span>
                  </div>
                  <h3 class="tm-blog-title">
                    <a href="<?= e(url('blog-detail.php?id=' . $blog['id'])) ?>" class="stretched-link"><?= e($blog['title']) ?></a>
                  </h3>
                  <p class="tm-blog-desc">
                    <?= e($blog['excerpt']) ?>
                  </p>
                </div>
                <div class="tm-blog-footer">
                  <span class="tm-blog-link">
                    Read Guide <i class="bi bi-arrow-right"></i>
                  </span>
                  <span class="tm-blog-author-avatar" title="Verified Audiologist"><i class="bi bi-person-fill"></i></span>
                </div>
              </article>
            </div>
          <?php endforeach; ?>
        </div>
      <?php endif; ?>

      <!-- PAGINATION CONTROLS -->
      <?php if ($total_pages > 1): ?>
        <nav aria-label="Blog pagination" class="d-flex justify-content-center mb-5">
          <ul class="tm-pagination shadow-xs rounded-3 p-1 bg-white border">
            
            <!-- Previous Button -->
            <li class="page-item <?= ($current_page <= 1) ? 'disabled' : '' ?>">
              <a class="page-link" href="<?= blog_page_url($current_page - 1, $selected_category, $search_query, $sort_order) ?>" aria-label="Previous">
                <i class="bi bi-chevron-left"></i>
              </a>
            </li>

            <!-- Numbered Pages -->
            <?php for ($p = 1; $p <= $total_pages; $p++): ?>
              <li class="page-item <?= ($p === $current_page) ? 'active' : '' ?>">
                <a class="page-link" href="<?= blog_page_url($p, $selected_category, $search_query, $sort_order) ?>"><?= $p ?></a>
              </li>
            <?php endfor; ?>

            <!-- Next Button -->
            <li class="page-item <?= ($current_page >= $total_pages) ? 'disabled' : '' ?>">
              <a class="page-link" href="<?= blog_page_url($current_page + 1, $selected_category, $search_query, $sort_order) ?>" aria-label="Next">
                <i class="bi bi-chevron-right"></i>
              </a>
            </li>

          </ul>
        </nav>
      <?php endif; ?>

      <!-- Bottom Interactive Help & Consultation Banner -->
      <div class="card rounded-3 border bg-white shadow-sm p-4 text-center text-md-start" style="border-color: #FED7AA !important;">
        <div class="row align-items-center g-3">
          <div class="col-md-8">
            <div class="d-flex align-items-center gap-2 mb-1 justify-content-center justify-content-md-start">
              <span class="rounded-circle bg-orange-subtle text-orange p-2 d-inline-flex align-items-center justify-content-center" style="width: 38px; height: 38px;">
                <i class="bi bi-chat-dots-fill"></i>
              </span>
              <h5 class="fw-bold text-navy mb-0">Need Personalized Guidance for Your Hearing Health?</h5>
            </div>
            <p class="text-secondary small mb-0 ps-md-5">
              Connect directly with an RCI-certified audiologist. We provide free hearing consultations, audiogram reviews, and 7-day trials with zero obligations.
            </p>
          </div>
          <div class="col-md-4 text-md-end d-flex gap-2 justify-content-center justify-content-md-end flex-wrap">
            <a href="https://wa.me/<?= e(SITE_WHATSAPP) ?>" target="_blank" rel="noopener" class="tm-btn tm-btn-success btn-sm">
              <i class="bi bi-whatsapp me-1"></i> WhatsApp Doctor
            </a>
            <a href="book-appointment.php" class="tm-btn tm-btn-primary btn-sm">
              <i class="bi bi-calendar2-check me-1"></i> Book Free Trial
            </a>
          </div>
        </div>
      </div>

    </div>
  </section>

<?php include __DIR__ . '/includes/footer.php'; ?>

