<?php
/**
 * Direct installer access - bypasses redirect logic
 */

// Load proxy fix first
require_once __DIR__ . '/proxy-fix.php';

// Redirect directly to installer
header('Location: /www/admin/install.php');
exit;
