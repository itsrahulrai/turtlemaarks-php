<?php
/**
 * TURTLE MAARKS HEARING HEALTH — BLOG ARTICLE DETAIL PAGE
 * Full clinical article viewer with category sidebar, author bio, social sharing, and related posts.
 */

require_once __DIR__ . '/includes/config.php';

// Get target article by ID or slug
$blog_param = $_GET['id'] ?? ($_GET['slug'] ?? 1);
$blog       = tm_blog_find($blog_param);

if (!$blog) {
    header('Location: blogs.php');
    exit;
}

$page_title       = e($blog['title']) . ' — Turtle Maarks Hearing Health';
$page_description = e($blog['excerpt']);
$active_nav       = 'blogs';

// Sidebar data
$categories   = tm_blog_categories();
$recent_posts = tm_blogs_recent(4, $blog['id']);

// Calculate Previous and Next Articles
$all_blogs   = tm_blogs_all();
$current_idx = 0;
foreach ($all_blogs as $idx => $b) {
    if ($b['id'] === $blog['id']) {
        $current_idx = $idx;
        break;
    }
}
$prev_blog = ($current_idx > 0) ? $all_blogs[$current_idx - 1] : null;
$next_blog = ($current_idx < count($all_blogs) - 1) ? $all_blogs[$current_idx + 1] : null;

// Related blogs (same category or nearby)
$related_blogs = [];
foreach ($all_blogs as $b) {
    if ($b['id'] !== $blog['id'] && $b['category'] === $blog['category']) {
        $related_blogs[] = $b;
    }
    if (count($related_blogs) >= 2) {
        break;
    }
}
// Fallback if no same category
if (count($related_blogs) < 2) {
    foreach ($all_blogs as $b) {
        if ($b['id'] !== $blog['id'] && !in_array($b, $related_blogs, true)) {
            $related_blogs[] = $b;
        }
        if (count($related_blogs) >= 2) {
            break;
        }
    }
}

// Current page full URL for sharing
$current_url = url('blog-detail.php?id=' . $blog['id']);
$share_text  = urlencode($blog['title'] . ' - ' . $current_url);

include __DIR__ . '/includes/header.php';
?>

  <!-- BREADCRUMB STRIP -->
  <div class="py-2 bg-white border-bottom small">
    <div class="container">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-0">
          <li class="breadcrumb-item"><a href="<?= e(url('index.php')) ?>" class="text-decoration-none text-muted">Home</a></li>
          <li class="breadcrumb-item"><a href="<?= e(url('blogs.php')) ?>" class="text-decoration-none text-muted">Blogs</a></li>
          <li class="breadcrumb-item"><a href="<?= e(url('blogs.php?category=' . urlencode($blog['category']))) ?>" class="text-decoration-none text-muted"><?= e($blog['category']) ?></a></li>
          <li class="breadcrumb-item active text-navy fw-bold text-truncate" style="max-width: 280px;" aria-current="page"><?= e($blog['title']) ?></li>
        </ol>
      </nav>
    </div>
  </div>

  <!-- ARTICLE HEADER HERO -->
  <section class="py-4 py-lg-5 bg-navy text-white position-relative">
    <div class="container">
      <div class="row">
        <div class="col-lg-9 mx-auto text-center">
          <div class="d-flex flex-wrap align-items-center justify-content-center gap-2 mb-3">
            <span class="badge <?= e($blog['badge_class']) ?> rounded-pill px-3 py-2 small fw-bold">
              <i class="bi bi-tag-fill me-1"></i> <?= e($blog['category']) ?>
            </span>
            <span class="badge bg-white-10 text-white-50 rounded-pill px-3 py-2 small">
              <i class="bi bi-clock me-1"></i> <?= e($blog['read_time']) ?>
            </span>
          </div>

          <h1 class="display-6 fw-bold text-white mb-3 lh-sm"><?= e($blog['title']) ?></h1>

          <div class="d-flex flex-wrap align-items-center justify-content-center gap-3 text-white-50 small">
            <div><i class="bi bi-calendar3 text-orange me-1"></i> <?= e($blog['date']) ?></div>
            <span class="text-white-20">•</span>
            <div><i class="bi bi-person-check-fill text-success me-1"></i> <?= e($blog['author']) ?> <span class="text-white-50">(<?= e($blog['author_role']) ?>)</span></div>
            <span class="text-white-20">•</span>
            <div><i class="bi bi-shield-check text-info me-1"></i> Medically Verified</div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- MAIN ARTICLE & SIDEBAR LAYOUT -->
  <section class="py-5 bg-light">
    <div class="container">
      <div class="row g-4 g-xl-5">
        
        <!-- LEFT: MAIN ARTICLE CONTENT -->
        <div class="col-lg-8">
          <article class="tm-blog-detail-article p-3 p-md-4 p-lg-5 mb-4">
            
            <!-- Featured Image -->
            <div class="rounded-4 overflow-hidden mb-4 border shadow-xs bg-navy">
              <img src="<?= e(url($blog['image'])) ?>" alt="<?= e($blog['title']) ?>" class="tm-blog-detail-hero-img">
            </div>

            <!-- Lead Excerpt -->
            <p class="lead fw-semibold text-navy mb-4" style="font-size: 1.075rem; line-height: 1.7;">
              <?= e($blog['excerpt']) ?>
            </p>

            <hr class="border-light-subtle my-4">

            <!-- Body Content -->
            <div class="tm-blog-content">
              <?= $blog['content'] ?>
            </div>

            <!-- Tags Cloud -->
            <?php if (!empty($blog['tags'])): ?>
              <div class="pt-4 mt-4 border-top">
                <div class="d-flex flex-wrap align-items-center gap-1">
                  <span class="fw-bold text-navy small me-2"><i class="bi bi-tags-fill text-orange me-1"></i> Topics:</span>
                  <?php foreach ($blog['tags'] as $tag): ?>
                    <a href="<?= e(url('blogs.php?q=' . urlencode($tag))) ?>" class="tm-blog-tag-pill">
                      #<?= e($tag) ?>
                    </a>
                  <?php endforeach; ?>
                </div>
              </div>
            <?php endif; ?>

            <!-- Social Share Row -->
            <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 pt-3 mt-3 border-top bg-light p-3 rounded-3">
              <span class="small fw-bold text-navy"><i class="bi bi-share-fill text-orange me-1"></i> Share This Guide:</span>
              <div class="d-flex gap-2">
                <a href="https://api.whatsapp.com/send?text=<?= $share_text ?>" target="_blank" rel="noopener" class="btn btn-sm btn-success rounded-pill px-3" title="Share on WhatsApp">
                  <i class="bi bi-whatsapp me-1"></i> WhatsApp
                </a>
                <a href="https://www.facebook.com/sharer/sharer.php?u=<?= urlencode($current_url) ?>" target="_blank" rel="noopener" class="btn btn-sm btn-primary rounded-pill px-3" title="Share on Facebook">
                  <i class="bi bi-facebook me-1"></i> Share
                </a>
                <a href="https://www.linkedin.com/sharing/share-offsite/?url=<?= urlencode($current_url) ?>" target="_blank" rel="noopener" class="btn btn-sm btn-outline-navy rounded-pill px-3" title="Share on LinkedIn">
                  <i class="bi bi-linkedin me-1"></i> LinkedIn
                </a>
                <button type="button" class="btn btn-sm btn-light border rounded-pill px-3" onclick="navigator.clipboard.writeText('<?= js_str($current_url) ?>'); alert('Link copied to clipboard!');" title="Copy Link">
                  <i class="bi bi-link-45deg"></i>
                </button>
              </div>
            </div>

            <!-- Doctor Author Bio Card -->
            <div class="tm-blog-author-card mt-4">
              <div class="d-flex flex-column flex-sm-row align-items-sm-center gap-3">
                <div class="rounded-circle bg-orange text-white d-flex align-items-center justify-content-center fs-3 fw-bold flex-shrink-0" style="width: 64px; height: 64px;">
                  <i class="bi bi-person-badge"></i>
                </div>
                <div class="flex-grow-1">
                  <div class="d-flex align-items-center gap-2 mb-1">
                    <h5 class="fw-bold text-navy mb-0"><?= e($blog['author']) ?></h5>
                    <span class="badge bg-success-subtle text-success border border-success-subtle rounded-pill small px-2">Verified Audiologist</span>
                  </div>
                  <div class="text-orange small fw-semibold mb-2"><?= e($blog['author_role']) ?> &bull; Turtle Maarks Hearing Health</div>
                  <p class="small text-secondary mb-0">Specializing in digital hearing aid fitting, Real-Ear Measurement (REM), Pure Tone Audiometry, and personalized hearing rehabilitation in Greater Noida West & Noida.</p>
                </div>
                <div class="text-sm-end">
                  <a href="<?= e(url('book-appointment.php')) ?>" class="tm-btn tm-btn-primary btn-sm text-nowrap">
                    Consult Doctor
                  </a>
                </div>
              </div>
            </div>

            <!-- Previous & Next Article Navigation -->
            <div class="row g-3 pt-4 mt-3 border-top">
              <div class="col-sm-6">
                <?php if ($prev_blog): ?>
                  <a href="<?= e(url('blog-detail.php?id=' . $prev_blog['id'])) ?>" class="card p-3 rounded-3 border bg-white h-100 text-decoration-none shadow-xs text-start">
                    <span class="small text-muted mb-1"><i class="bi bi-arrow-left me-1"></i> Previous Article</span>
                    <strong class="text-navy small line-clamp-2"><?= e($prev_blog['title']) ?></strong>
                  </a>
                <?php endif; ?>
              </div>
              <div class="col-sm-6 text-sm-end">
                <?php if ($next_blog): ?>
                  <a href="<?= e(url('blog-detail.php?id=' . $next_blog['id'])) ?>" class="card p-3 rounded-3 border bg-white h-100 text-decoration-none shadow-xs text-sm-end">
                    <span class="small text-muted mb-1">Next Article <i class="bi bi-arrow-right ms-1"></i></span>
                    <strong class="text-navy small line-clamp-2"><?= e($next_blog['title']) ?></strong>
                  </a>
                <?php endif; ?>
              </div>
            </div>

          </article>

          <!-- RELATED ARTICLES SECTION -->
          <?php if (!empty($related_blogs)): ?>
            <div class="mb-4">
              <div class="d-flex align-items-center justify-content-between mb-3">
                <h4 class="fw-bold text-navy mb-0">Related Guides &amp; Insights</h4>
                <a href="<?= e(url('blogs.php')) ?>" class="small text-orange fw-bold">View All Articles &rarr;</a>
              </div>
              <div class="row g-3">
                <?php foreach ($related_blogs as $rel): ?>
                  <div class="col-md-6">
                    <article class="tm-blog-card shadow-xs h-100">
                      <div class="tm-blog-img-wrap" style="height: 160px;">
                        <img src="<?= e(url($rel['image'])) ?>" alt="<?= e($rel['title']) ?>" loading="lazy">
                        <span class="tm-blog-badge <?= e($rel['badge_class']) ?>"><?= e($rel['category']) ?></span>
                        <span class="tm-blog-read-time"><i class="bi bi-clock me-1"></i> <?= e($rel['read_time']) ?></span>
                      </div>
                      <div class="tm-blog-body p-3">
                        <div class="tm-blog-meta mb-2">
                          <span class="tm-blog-meta-item"><i class="bi bi-calendar3 text-orange"></i> <?= e($rel['date']) ?></span>
                        </div>
                        <h6 class="tm-blog-title mb-2">
                          <a href="<?= e(url('blog-detail.php?id=' . $rel['id'])) ?>" class="stretched-link"><?= e($rel['title']) ?></a>
                        </h6>
                        <p class="tm-blog-desc small mb-0">
                          <?= e($rel['excerpt']) ?>
                        </p>
                      </div>
                    </article>
                  </div>
                <?php endforeach; ?>
              </div>
            </div>
          <?php endif; ?>

        </div>

        <!-- RIGHT: STICKY SIDEBAR -->
        <div class="col-lg-4">
          <aside class="tm-blog-sidebar">
            
            <!-- WIDGET 1: ALL BLOG CATEGORIES (REQUESTED BY USER) -->
            <div class="tm-sidebar-widget">
              <h5 class="tm-sidebar-widget-title">
                <i class="bi bi-folder2-open text-orange"></i>
                <span>Blog Categories</span>
              </h5>
              
              <ul class="tm-sidebar-cat-list">
                <!-- All Categories Link -->
                <li class="tm-sidebar-cat-item">
                  <a href="<?= e(url('blogs.php')) ?>">
                    <span class="d-flex align-items-center gap-2">
                      <i class="bi bi-grid-fill text-muted"></i>
                      <span>All Articles</span>
                    </span>
                    <span class="tm-sidebar-cat-count"><?= count($all_blogs) ?></span>
                  </a>
                </li>
                <!-- Category Items -->
                <?php foreach ($categories as $catItem): ?>
                  <?php $isCurrent = ($catItem['name'] === $blog['category']); ?>
                  <li class="tm-sidebar-cat-item <?= $isCurrent ? 'active' : '' ?>">
                    <a href="<?= e(url('blogs.php?category=' . urlencode($catItem['name']))) ?>">
                      <span class="d-flex align-items-center gap-2">
                        <i class="bi <?= e($catItem['icon']) ?> <?= $isCurrent ? 'text-orange' : 'text-muted' ?>"></i>
                        <span><?= e($catItem['name']) ?></span>
                      </span>
                      <span class="tm-sidebar-cat-count"><?= $catItem['count'] ?></span>
                    </a>
                  </li>
                <?php endforeach; ?>
              </ul>
            </div>

            <!-- WIDGET 2: RECENT ARTICLES -->
            <div class="tm-sidebar-widget">
              <h5 class="tm-sidebar-widget-title">
                <i class="bi bi-clock-history text-orange"></i>
                <span>Recent Insights</span>
              </h5>
              
              <div class="d-flex flex-column">
                <?php foreach ($recent_posts as $recent): ?>
                  <a href="<?= e(url('blog-detail.php?id=' . $recent['id'])) ?>" class="tm-sidebar-recent-item">
                    <img src="<?= e(url($recent['image'])) ?>" alt="<?= e($recent['title']) ?>" class="tm-sidebar-recent-thumb">
                    <div>
                      <div class="tm-sidebar-recent-title"><?= e($recent['title']) ?></div>
                      <div class="tm-sidebar-recent-date">
                        <i class="bi bi-calendar3 me-1"></i> <?= e($recent['date']) ?> &bull; <?= e($recent['read_time']) ?>
                      </div>
                    </div>
                  </a>
                <?php endforeach; ?>
              </div>
            </div>

            <!-- WIDGET 3: AWESOME VISIT OUR CLINIC CARD -->
            <div class="tm-clinic-card-awesome">
              
             

              <!-- Card Body Content -->
              <div class="tm-clinic-card-body">
                
                <div class="d-flex align-items-center justify-content-between mb-2">
                  <h5 class="fw-bold text-navy mb-0">Visit Our Clinic</h5>
                </div>

                <div class="fw-bold text-navy small mb-3">
                  Turtle Maarks Hearing Health <i class="bi bi-patch-check-fill text-orange"></i>
                </div>

                <!-- Address Row -->
                <div class="tm-clinic-info-row">
                  <div class="tm-clinic-icon-box">
                    <i class="bi bi-geo-alt-fill"></i>
                  </div>
                  <div class="small">
                    <strong class="text-navy d-block mb-1">Gaur City Mall (15th Floor, Suite 1509)</strong>
                    <span class="text-secondary lh-sm d-block">15th Floor, Gaur City Mall, 1509, Greater Noida W Rd, Gaur City 1, Sector IV, Sector 4, Noida, Ghaziabad, Uttar Pradesh 201306</span>
                  </div>
                </div>

          

                <!-- Call to Actions -->
                <div class="d-grid gap-2">
                  <a href="https://maps.google.com/?q=15th+Floor,+Gaur+City+Mall,+1509,+Greater+Noida+W+Rd,+Gaur+City+1,+Sector+IV,+Sector+4,+Noida,+Ghaziabad,+Uttar+Pradesh+201306" target="_blank" rel="noopener" class="tm-btn tm-btn-primary btn-sm justify-content-center">
                    <i class="bi bi-pin-map-fill me-1"></i> Get Directions on Google Maps
                  </a>
                  <div class="d-flex gap-2">
                    <a href="tel:<?= e(SITE_PHONE_RAW) ?>" class="tm-btn tm-btn-outline-navy btn-sm flex-fill justify-content-center">
                      <i class="bi bi-telephone-fill me-1"></i> Call Clinic
                    </a>
                    <a href="https://wa.me/<?= e(SITE_WHATSAPP) ?>?text=<?= urlencode('Hello Doctor, I would like to visit the Turtle Maarks clinic at Gaur City Mall.') ?>" target="_blank" rel="noopener" class="btn btn-sm btn-success rounded-3 flex-fill justify-content-center d-flex align-items-center gap-1">
                      <i class="bi bi-whatsapp"></i> WhatsApp
                    </a>
                  </div>
                </div>

              </div>
            </div>

          </aside>
        </div>

      </div>
    </div>
  </section>

<?php include __DIR__ . '/includes/footer.php'; ?>
