<?php
function parseRequest($file) {
    // Whitelist of includable pages keyed by a safe identifier.
    $allowed = [
        'home'  => __DIR__ . '/pages/home.php',
        'about' => __DIR__ . '/pages/about.php',
    ];
    if ($file !== null && isset($allowed[$file])) {
        include $allowed[$file];
    }
}

$file = isset($_REQUEST['file']) ? $_REQUEST['file'] : null;
parseRequest($file);
