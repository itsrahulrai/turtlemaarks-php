<?php
/**
 * TURTLE MAARKS HEARING HEALTH
 * Global site configuration — single source of truth for brand, contact,
 * navigation and asset paths. Included by includes/header.php on every page.
 */

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

/* ---------------------------------------------------------------
 | BRAND / SITE
 --------------------------------------------------------------- */
define('SITE_NAME',      'Turtle Maarks Hearing Health');
define('SITE_SHORT',     'Turtle Maarks');
define('SITE_TAGLINE',   'Modern Hearing Aids & Audiology Clinic');
define('SITE_LOGO',      'assets/images/logo.png');
define('SITE_FAVICON',   'assets/images/favicon.png');

/* Leave empty for relative paths (works in any sub-folder / localhost).
   Set to e.g. 'https://turtlemaarks.com/' for absolute URLs. */
define('BASE_URL', '');

/* ---------------------------------------------------------------
 | CONTACT
 --------------------------------------------------------------- */
define('SITE_PHONE',        '+91 8130495476');
define('SITE_PHONE_RAW',    '+918130495476');
define('SITE_WHATSAPP',     '918130495476');
define('SITE_EMAIL',        'turtlemaarks@gmail.com');
define('SITE_ADDRESS',      '15th Floor, Gaur City Mall, 1509, Greater Noida W Rd, Gaur City 1, Sector IV, Sector 4, Noida, Ghaziabad, Uttar Pradesh 201306');
define('SITE_HOURS_SHORT',  'Mon-Sat: 10AM-7:30PM');
define('SITE_HOURS_DAYS',   'Monday &ndash; Saturday');
define('SITE_HOURS_TIME',   '10:00 AM &ndash; 7:30 PM');
define('SITE_HOURS_SUNDAY', 'By Prior Appointment');

/* ---------------------------------------------------------------
 | SOCIAL LINKS
 --------------------------------------------------------------- */
$TM_SOCIAL = [
    ['icon' => 'bi-facebook',  'url' => 'https://www.facebook.com/turtlemaarks/', 'title' => 'Facebook', 'class' => 'tm-ref-soc-fb'],
    ['icon' => 'bi-instagram', 'url' => 'https://www.instagram.com/turtlemaarks_hearinghealth/', 'title' => 'Instagram', 'class' => 'tm-ref-soc-ig'],
    ['icon' => 'bi-linkedin',  'url' => 'https://in.linkedin.com/company/turtle-maarks-hearing-health', 'title' => 'LinkedIn', 'class' => 'tm-ref-soc-li'],
    ['icon' => 'bi-whatsapp',  'url' => 'https://wa.me/' . SITE_WHATSAPP, 'title' => 'WhatsApp', 'class' => 'tm-ref-soc-wa'],
    ['icon' => 'bi-youtube',   'url' => 'https://www.youtube.com/@TurtleMaarksHearingHealth', 'title' => 'YouTube', 'class' => 'tm-ref-soc-yt'],
];

/* ---------------------------------------------------------------
 | PRIMARY NAVIGATION  (reused by desktop navbar + mobile offcanvas)
 | key = value used by each page in $active_nav
 --------------------------------------------------------------- */
$TM_NAV = [
    ['key' => 'home',     'label' => 'Home',       'url' => 'index.php'],
    ['key' => 'about',    'label' => 'About Us',   'url' => 'about.php'],
    [
        'key'      => 'services',
        'label'    => 'Services',
        'url'      => 'services.php',
        'children' => [
            ['label' => 'PTA (Pure Tone Audiometry)',           'url' => 'diagnostic-services.php#pta'],
            ['label' => 'Tymp (Tympanometry)',                  'url' => 'diagnostic-services.php#tympanometry'],
            ['label' => 'BERA (Brain Evoked Response Audiometry)', 'url' => 'diagnostic-services.php#bera'],
            ['label' => 'OAE (Oto Acoustic Emission)',          'url' => 'diagnostic-services.php#oae'],
            ['divider' => true],
            ['label' => 'All Clinical Services', 'url' => 'services.php', 'icon' => 'bi-grid'],
            ['label' => 'View All Diagnostic Tests', 'url' => 'diagnostic-services.php', 'icon' => 'bi-arrow-right-circle', 'highlight' => true],
        ],
    ],
    ['key' => 'products', 'label' => 'Products',   'url' => 'products.php'],
    ['key' => 'gallery',  'label' => 'Gallery',    'url' => 'gallery.php'],
    ['key' => 'blogs',    'label' => 'Blogs',      'url' => 'blogs.php'],
    ['key' => 'contact',  'label' => 'Contact Us', 'url' => 'contact.php'],
];

/* ---------------------------------------------------------------
 | FOOTER LINK COLUMNS
 --------------------------------------------------------------- */
$TM_FOOTER_QUICK = [
    ['label' => 'Home',             'url' => 'index.php'],
    ['label' => 'About Us',         'url' => 'about.php'],
    ['label' => 'Hearing Aids',     'url' => 'products.php'],
    ['label' => 'Diagnostic Tests', 'url' => 'diagnostic-services.php'],
    ['label' => 'Health Blogs',     'url' => 'blogs.php'],
    ['label' => 'Contact Us',       'url' => 'contact.php'],
];

$TM_FOOTER_PRODUCTS = [
    ['label' => 'Receiver-in-Canal (RIC)',    'url' => 'products.php?style=RIC', 'badge' => 'Popular'],
    ['label' => 'Invisible In-Canal (CIC/IIC)', 'url' => 'products.php?style=CIC', 'badge' => 'Discreet'],
    ['label' => 'Behind-The-Ear (BTE)',       'url' => 'products.php?style=BTE'],
    ['label' => 'Rechargeable Hearing Aids',  'url' => 'product-category.php',   'badge' => 'Best Seller'],
    ['label' => 'Bluetooth & AI Models',      'url' => 'products.php'],
    ['label' => 'Batteries & Accessories',    'url' => 'products.php'],
];

$TM_FOOTER_SERVICES = [
    ['label' => 'Pure Tone Audiometry (PTA)', 'url' => 'diagnostic-services.php#pta'],
    ['label' => 'Tympanometry (Tymp)',        'url' => 'diagnostic-services.php#tympanometry'],
    ['label' => 'BERA / ABR Diagnostic Test', 'url' => 'diagnostic-services.php#bera'],
    ['label' => 'OAE Newborn Screening',      'url' => 'diagnostic-services.php#oae'],
    ['label' => 'Speech & Language Therapy',  'url' => 'service-speech-therapy.php'],
    ['label' => 'Senior Citizen Home Visit',  'url' => 'service-home-visit.php', 'badge' => 'Doorstep'],
    ['label' => 'Free 7-Day Hearing Trial',   'url' => 'service-hearing-aid-trial.php', 'badge' => 'Free'],
];

$TM_FOOTER_SUPPORT = [
    ['label' => 'Track Your Order / Booking', 'url' => 'order-tracking.php', 'icon' => 'bi-geo'],
    ['label' => 'Book Clinic Appointment',    'url' => 'book-appointment.php', 'icon' => 'bi-calendar-check'],
    ['label' => 'Hearing Aid Repair & Care',  'url' => 'repair.php', 'icon' => 'bi-tools'],
    ['label' => 'Compare Hearing Devices',    'url' => 'compare.php', 'icon' => 'bi-arrow-left-right'],
    ['label' => 'My Cart & Wishlist',         'url' => 'cart.php', 'icon' => 'bi-bag'],
    ['label' => 'Clinic Gallery & Tour',       'url' => 'gallery.php', 'icon' => 'bi-images'],
    ['label' => 'Find Clinic on Google Maps', 'url' => 'contact.php#map', 'icon' => 'bi-map'],
];

$TM_FOOTER_BRANDS = [
    ['name' => 'Phonak',   'country' => 'Switzerland', 'url' => 'products.php'],
    ['name' => 'Oticon',   'country' => 'Denmark',     'url' => 'products.php'],
    ['name' => 'ReSound',  'country' => 'Denmark',     'url' => 'products.php'],
    ['name' => 'Signia',   'country' => 'Germany',     'url' => 'products.php'],
    ['name' => 'Widex',    'country' => 'Denmark',     'url' => 'products.php'],
    ['name' => 'Starkey',  'country' => 'USA',         'url' => 'products.php'],
    ['name' => 'Unitron',  'country' => 'Canada',      'url' => 'products.php'],
];

$TM_FOOTER_TESTS = [
    ['label' => 'Pure Tone Audiometry (PTA)', 'url' => 'diagnostic-services.php#pta'],
    ['label' => 'Tympanometry (Tymp)',        'url' => 'diagnostic-services.php#tympanometry'],
    ['label' => 'BERA / ABR Test',            'url' => 'diagnostic-services.php#bera'],
    ['label' => 'OAE Screening',              'url' => 'diagnostic-services.php#oae'],
    ['label' => 'Senior Citizen Home Visit',  'url' => 'book-appointment.php'],
];

/* ---------------------------------------------------------------
 | CORE ASSETS
 --------------------------------------------------------------- */
$TM_CORE_CSS = [
    'assets/css/variables.css',
    'assets/css/custom.css',
    'assets/css/responsive.css',
];

$TM_CORE_JS = [
    'assets/js/main.js',
    'assets/js/products.js',
    'assets/js/cart.js',
    'assets/js/wishlist.js',
    'assets/js/compare.js',
];

require_once __DIR__ . '/functions.php';
require_once __DIR__ . '/data/products.php';
require_once __DIR__ . '/data/blogs.php';
