<?php
/**
 * Patient Sign Out / Logout — Turtle Maarks Hearing Health
 */
require_once __DIR__ . '/includes/config.php';

// In a full session application, session_destroy() would be invoked here.
// Redirect back to login page with signout notice
header('Location: ' . url('login.php?logged_out=1'));
exit;

