<?php
/**
 * Compare Hearing Aids — Redirect to products catalog
 */
require_once __DIR__ . '/includes/config.php';
header('Location: ' . url('products.php'), true, 301);
exit;
