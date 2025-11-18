<?php
// Railway Environment Test
echo "<h1>Railway Environment Debug</h1>";
echo "<pre>";
echo "Protocol Detection:\n";
echo "  \$_SERVER['HTTPS']: " . (isset($_SERVER['HTTPS']) ? $_SERVER['HTTPS'] : 'NOT SET') . "\n";
echo "  \$_SERVER['SERVER_PORT']: " . (isset($_SERVER['SERVER_PORT']) ? $_SERVER['SERVER_PORT'] : 'NOT SET') . "\n";
echo "  \$_SERVER['HTTP_X_FORWARDED_PROTO']: " . (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) ? $_SERVER['HTTP_X_FORWARDED_PROTO'] : 'NOT SET') . "\n";
echo "  \$_SERVER['HTTP_X_FORWARDED_FOR']: " . (isset($_SERVER['HTTP_X_FORWARDED_FOR']) ? $_SERVER['HTTP_X_FORWARDED_FOR'] : 'NOT SET') . "\n";
echo "\n";

echo "Request Info:\n";
echo "  \$_SERVER['REQUEST_URI']: " . (isset($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] : 'NOT SET') . "\n";
echo "  \$_SERVER['REQUEST_METHOD']: " . (isset($_SERVER['REQUEST_METHOD']) ? $_SERVER['REQUEST_METHOD'] : 'NOT SET') . "\n";
echo "  \$_SERVER['HTTP_HOST']: " . (isset($_SERVER['HTTP_HOST']) ? $_SERVER['HTTP_HOST'] : 'NOT SET') . "\n";
echo "\n";

echo "Writable Directories:\n";
echo "  var/: " . (is_writable(__DIR__ . '/var') ? 'WRITABLE' : 'NOT WRITABLE') . "\n";
echo "  var/ exists: " . (file_exists(__DIR__ . '/var') ? 'YES' : 'NO') . "\n";
echo "</pre>";
