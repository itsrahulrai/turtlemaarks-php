<?php
/**
 * TURTLE MAARKS — SHARED HELPER FUNCTIONS
 * Escaping, URLs, currency, product repository queries and the
 * canonical product-card renderer (reused by every page).
 */

/* ---------------------------------------------------------------
 | OUTPUT / URL HELPERS
 --------------------------------------------------------------- */

/** HTML-escape */
function e($value)
{
    return htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8');
}

/** Escape for use inside a single-quoted JS string in an inline handler */
function js_str($value)
{
    return htmlspecialchars(
        str_replace(["\\", "'", "\r", "\n"], ["\\\\", "\\'", '', ' '], (string) $value),
        ENT_QUOTES,
        'UTF-8'
    );
}

/** Build a site URL from a relative path */
function url($path = '')
{
    return BASE_URL . ltrim($path, '/');
}

/** Build an asset URL */
function asset($path)
{
    return BASE_URL . 'assets/' . ltrim($path, '/');
}

/** Current script filename, e.g. "products.php" */
function current_page()
{
    return basename($_SERVER['SCRIPT_NAME'] ?? 'index.php');
}

/** "active" class when $key matches the page's $active_nav */
function nav_active($key)
{
    global $active_nav;
    return (isset($active_nav) && $active_nav === $key) ? 'active' : '';
}

/** Indian-format currency, e.g. ₹2,85,000 */
function inr($amount, $symbol = true)
{
    $amount  = (float) $amount;
    $rounded = round($amount);
    $str     = (string) abs($rounded);

    if (strlen($str) > 3) {
        $last3 = substr($str, -3);
        $rest  = substr($str, 0, -3);
        $rest  = preg_replace('/\B(?=(\d{2})+(?!\d))/', ',', $rest);
        $str   = $rest . ',' . $last3;
    }

    $sign = $rounded < 0 ? '-' : '';
    return ($symbol ? '₹' : '') . $sign . $str;
}

/* ---------------------------------------------------------------
 | PRODUCT REPOSITORY  (data lives in includes/data/products.php)
 --------------------------------------------------------------- */

function tm_products_all()
{
    global $TM_PRODUCTS;
    return $TM_PRODUCTS;
}

function tm_product_by_id($id)
{
    foreach (tm_products_all() as $p) {
        if ($p['id'] === $id) {
            return $p;
        }
    }
    return null;
}

/**
 * Filter the catalogue.
 * Supported keys: brand, style, category, isPopular, isFeatured,
 * rechargeableOnly, bluetoothOnly, minPrice, maxPrice, search, sort, limit
 */
function tm_products_filter(array $c = [])
{
    $list = tm_products_all();

    if (!empty($c['brand'])) {
        $brands = array_map('strtolower', (array) $c['brand']);
        $list = array_filter($list, function ($p) use ($brands) {
            return in_array(strtolower($p['brand']), $brands, true);
        });
    }

    if (!empty($c['category'])) {
        $cats = array_map('strtolower', (array) $c['category']);
        $list = array_filter($list, function ($p) use ($cats) {
            $cat = strtolower($p['category'] ?? '');
            if (in_array($cat, $cats, true)) {
                return true;
            }
            if (in_array('rechargeable', $cats, true) && !empty($p['rechargeable'])) {
                return true;
            }
            if (in_array('bluetooth', $cats, true) && !empty($p['bluetooth'])) {
                return true;
            }
            if (in_array('accessories', $cats, true) && ($cat === 'accessories' || $cat === 'batteries' || ($p['style'] ?? '') === 'Accessory')) {
                return true;
            }
            return false;
        });
    }

    if (!empty($c['subcategory']) || !empty($c['style'])) {
        $subs = array_merge((array) ($c['subcategory'] ?? []), (array) ($c['style'] ?? []));
        $subs = array_map('strtolower', $subs);
        $list = array_filter($list, function ($p) use ($subs) {
            $style = strtolower($p['style'] ?? '');
            if (in_array($style, $subs, true)) {
                return true;
            }
            if (in_array('itc', $subs, true) && ($style === 'itc' || $style === 'ite')) {
                return true;
            }
            if (in_array('accessory', $subs, true) && ($style === 'accessory' || ($p['category'] ?? '') === 'accessories' || ($p['category'] ?? '') === 'batteries')) {
                return true;
            }
            return false;
        });
    }

    if (!empty($c['isPopular'])) {
        $list = array_filter($list, function ($p) { return !empty($p['isPopular']); });
    }

    if (!empty($c['isFeatured'])) {
        $list = array_filter($list, function ($p) { return !empty($p['isFeatured']); });
    }

    if (!empty($c['rechargeableOnly'])) {
        $list = array_filter($list, function ($p) { return !empty($p['rechargeable']); });
    }

    if (!empty($c['bluetoothOnly'])) {
        $list = array_filter($list, function ($p) { return !empty($p['bluetooth']); });
    }

    if (isset($c['minPrice'])) {
        $min = (float) $c['minPrice'];
        $list = array_filter($list, function ($p) use ($min) { return $p['price'] >= $min; });
    }

    if (isset($c['maxPrice'])) {
        $max = (float) $c['maxPrice'];
        $list = array_filter($list, function ($p) use ($max) { return $p['price'] <= $max; });
    }

    if (!empty($c['search'])) {
        $q = strtolower(trim($c['search']));
        $list = array_filter($list, function ($p) use ($q) {
            $hay = strtolower(
                $p['name'] . ' ' . $p['brand'] . ' ' . $p['style'] . ' ' .
                ($p['techLevel'] ?? '') . ' ' . ($p['featureHighlight'] ?? '')
            );
            return strpos($hay, $q) !== false;
        });
    }

    $list = array_values($list);

    switch ($c['sort'] ?? '') {
        case 'price-asc':
            usort($list, function ($a, $b) { return $a['price'] <=> $b['price']; });
            break;
        case 'price-desc':
            usort($list, function ($a, $b) { return $b['price'] <=> $a['price']; });
            break;
        case 'rating':
            usort($list, function ($a, $b) { return $b['rating'] <=> $a['rating']; });
            break;
        case 'name':
            usort($list, function ($a, $b) { return strcmp($a['name'], $b['name']); });
            break;
    }

    if (!empty($c['limit'])) {
        $list = array_slice($list, 0, (int) $c['limit']);
    }

    return $list;
}

/** Distinct brand list with counts */
function tm_product_brands()
{
    $out = [];
    foreach (tm_products_all() as $p) {
        $out[$p['brand']] = ($out[$p['brand']] ?? 0) + 1;
    }
    return $out;
}

/** Distinct style list with counts */
function tm_product_styles()
{
    $out = [];
    foreach (tm_products_all() as $p) {
        $out[$p['style']] = ($out[$p['style']] ?? 0) + 1;
    }
    return $out;
}

/* ---------------------------------------------------------------
 | CANONICAL PRODUCT CARD  (ONE markup, reused everywhere)
 --------------------------------------------------------------- */

/**
 * Render one product card.
 * @param array $p       product row
 * @param array $options ['col' => bootstrap column classes, 'wrap' => bool]
 */
function tm_product_card($p, array $options = [])
{
    if (empty($p)) {
        return;
    }
    $col  = $options['col']  ?? 'col-xl-3 col-lg-4 col-md-6';
    $wrap = $options['wrap'] ?? true;
    include __DIR__ . '/product-card.php';
}

/**
 * Render a full grid of product cards (with empty state).
 */
function tm_product_grid($products, array $options = [])
{
    if (empty($products)) {
        echo '<div class="col-12 text-center py-5">'
           . '<i class="bi bi-search text-muted fs-1 mb-2 d-block"></i>'
           . '<h5 class="fw-bold text-navy">No products matching this selection</h5>'
           . '<p class="text-secondary small mb-0">Please try another filter or category.</p>'
           . '</div>';
        return;
    }
    foreach ($products as $p) {
        tm_product_card($p, $options);
    }
}
