<?php
/**
 * Railway Proxy Fix
 * This file fixes HTTPS detection when behind Railway's reverse proxy
 */

// Set HTTPS environment variable if X-Forwarded-Proto is https
if (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] === 'https') {
    $_SERVER['HTTPS'] = 'on';
    $_SERVER['SERVER_PORT'] = 443;
}

// Handle X-Forwarded-For for correct IP detection
if (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    $ips = explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']);
    $_SERVER['REMOTE_ADDR'] = trim($ips[0]);
}
