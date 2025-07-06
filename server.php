<?php
/**
 * server.php — Router para el PHP built‑in server
 *   - Si la URL corresponde a un archivo real en public/, lo sirve
 *   - En otro caso, carga public/index.php (Laravel)
 */

$uri = urldecode(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
$public = __DIR__ . '/public';

// Si existe un archivo real en public/, que lo sirva
if ($uri !== '/' && file_exists($public . $uri)) {
    return false;
}

// En otro caso, arranca Laravel
require $public . '/index.php';
