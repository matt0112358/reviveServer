<?php
/**
 * Railway Proxy Fix
 * This file fixes HTTPS detection when behind Railway's reverse proxy
 */

// Force HTTPS detection for Railway environment
// Railway always provides HTTPS to users, even if backend sees HTTP
if (isset($_SERVER['HTTP_X_FORWARDED_PROTO'])) {
    if ($_SERVER['HTTP_X_FORWARDED_PROTO'] === 'https') {
        $_SERVER['HTTPS'] = 'on';
        $_SERVER['SERVER_PORT'] = 443;
    }
} else {
    // If no forwarded proto header, assume HTTPS on Railway
    // This is safe because Railway provides the public URL via HTTPS
    $_SERVER['HTTPS'] = 'on';
    $_SERVER['SERVER_PORT'] = 443;
}

// Handle X-Forwarded-For for correct IP detection
if (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    $ips = explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']);
    $_SERVER['REMOTE_ADDR'] = trim($ips[0]);
}

// Prevent redirect loops by ensuring consistent protocol detection
putenv('HTTPS=on');
