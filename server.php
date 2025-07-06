<?php
/**
 * Router para el servidor embebido de PHP,
 * que hace de “fallback” a `public/index.php`
 */

$uri = urldecode(
    parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)
);

// Si existe un fichero real en public/, lo sirve directamente
if ($uri !== '/' && file_exists(__DIR__ . '/public' . $uri)) {
    return false; // deja que PHP lo entregue
}

// En cualquier otro caso, arranca Laravel
require __DIR__ . '/public/index.php';
