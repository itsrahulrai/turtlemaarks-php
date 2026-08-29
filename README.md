# Turtle Maarks Hearing Health — PHP Build

Converted from the static HTML build to PHP with a reusable header, footer and
product-card component. No database and no framework — plain PHP includes, so it
drops onto any shared host (Hostinger, cPanel, etc.) with PHP 7.4+.

---

## Folder structure

```
/
├── .htaccess                  301s old .html URLs -> .php, gzip, caching
├── includes/
│   ├── config.php             brand, contact, nav menu, footer links, asset lists
│   ├── functions.php          e(), url(), inr(), product queries, card/grid renderers
│   ├── header.php             <head> + topbar + sticky navbar + mobile offcanvas
│   ├── footer.php             footer + floating buttons + search modal + cart drawer + scripts
│   ├── product-card.php       THE product card markup (single source)
│   └── data/products.php      all 34 products as a PHP array
├── assets/
│   ├── css/   variables.css, custom.css, responsive.css
│   ├── js/    main, products, cart, wishlist, compare, filter, gallery, appointment
│   └── images/
└── *.php                      31 pages
```

---

## Page template

Every page follows the same shape:

```php
<?php
$page_title       = 'Page Title — Turtle Maarks Hearing Health';
$page_description = 'Meta description for this page.';
$active_nav       = 'products';                  // home|about|services|products|gallery|contact
$page_js          = ['assets/js/filter.js'];     // optional, extra JS files
include __DIR__ . '/includes/header.php';
?>

  <!-- page content -->

<?php ob_start(); ?>
<script>
  /* optional page-specific JS — runs after all core scripts */
</script>
<?php $page_inline_js = ob_get_clean(); ?>
<?php include __DIR__ . '/includes/footer.php'; ?>
```

To add a new page, copy any existing one, change the four variables, replace the
content. Nothing else needs touching.

---

## Editing global content

Everything site-wide lives in `includes/config.php`:

| What | Constant / array |
|---|---|
| Phone, WhatsApp, email, address, timings | `SITE_PHONE`, `SITE_WHATSAPP`, `SITE_EMAIL`, `SITE_ADDRESS`, `SITE_HOURS_*` |
| Logo & favicon | `SITE_LOGO`, `SITE_FAVICON` |
| Main menu (desktop + mobile + dropdown) | `$TM_NAV` |
| Footer link columns | `$TM_FOOTER_QUICK`, `$TM_FOOTER_TESTS` |
| Social icons | `$TM_SOCIAL` |
| CSS / JS loaded everywhere | `$TM_CORE_CSS`, `$TM_CORE_JS` |

Change a phone number in one place and it updates the topbar, footer, floating
call button, WhatsApp links and every CTA across all 31 pages.

`BASE_URL` is empty by default, which produces relative URLs — works in a
subfolder and on localhost. Set it to `https://yourdomain.com/` for absolute URLs.

---

## The product card

`includes/product-card.php` is the only place the card markup exists. Render it with:

```php
<?php tm_product_card($product, ['col' => 'col-xl-3 col-lg-4 col-md-6']); ?>
```

or a whole grid (handles the empty state for you):

```php
<div class="row g-3">
  <?php tm_product_grid(tm_products_filter(['brand' => 'Phonak', 'limit' => 4])); ?>
</div>
```

`assets/js/products.js -> renderCard()` holds a byte-for-byte twin of that markup.
It is used **only** for live re-renders — filters, sort, search-as-you-type,
wishlist and compare. **If you change the card, change both files.**

### Product queries

```php
tm_products_all();                      // everything
tm_product_by_id('p7');                 // one product or null
tm_products_filter([
  'brand'            => 'Oticon',       // string or array
  'style'            => ['RIC','CIC'],
  'category'         => 'hearing-aids', // hearing-aids | chargers | batteries
  'isPopular'        => true,
  'isFeatured'       => true,
  'rechargeableOnly' => true,
  'bluetoothOnly'    => true,
  'minPrice'         => 50000,
  'maxPrice'         => 300000,
  'search'           => 'phonak',
  'sort'             => 'price-asc',    // price-asc|price-desc|rating|name
  'limit'            => 8,
]);
tm_product_brands();                    // ['Phonak' => 5, 'Oticon' => 4, ...]
tm_product_styles();
```

### Adding a product

Add an entry to `includes/data/products.php`, then mirror it in the
`TURTLE_PRODUCTS` array in `assets/js/products.js` so client-side filtering
sees it too. Both arrays use identical keys.

When you move to a database, replace the body of `tm_products_all()` in
`includes/functions.php` with a query — every page and card keeps working.

---

## Server-rendered pages

These build their content in PHP rather than waiting on JavaScript, so they work
with JS disabled and are indexable by Google:

- `index.php` — popular models grid, brand showcase grid
- `products.php` — full catalogue, honours `?brand= ?style= ?category= ?q= ?sort=`
- `product-category.php` — rechargeable models
- `product-detail.php?id=p7` — title, meta, price, spec table, related models
  (falls back to a featured model on a bad id)
- `search.php?q=widex` — real GET form, server-rendered results, JS adds live refinement

---

## Responsive notes

- Products filter sidebar uses Bootstrap `offcanvas-lg`: a slide-in "Filters"
  panel below 992px, a static sticky column above. Single DOM, no duplicate IDs.
- Product detail stacks its action buttons under 576px, scrolls the breadcrumb
  horizontally, and only sticks the image column at `lg` and up.
- Mobile offcanvas nav is generated from `$TM_NAV` and includes wishlist,
  patient portal and social links.
- Breakpoints handled in `assets/css/responsive.css`: 1400 / 1200 / 992 / 768 / 576px.

---

## Deploying

1. Upload the whole folder to `public_html/`.
2. Ensure PHP 7.4+ is selected in the hosting panel.
3. Confirm `mod_rewrite` is on so the `.html` → `.php` 301s in `.htaccess` fire.
4. Optionally set `BASE_URL` in `includes/config.php` to your live domain.

Local testing:

```bash
php -S localhost:8000
```

---

## Still client-side (localStorage)

Cart, wishlist and compare still run entirely in the browser via
`assets/js/cart.js`, `wishlist.js` and `compare.js`. The login, register,
checkout, order and appointment pages are UI only — they post nowhere yet.
Wiring those to MySQL/PDO is the natural next step; the PHP structure is
already in place for it.
