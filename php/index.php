<?php
require_once __DIR__ . '/vendor/autoload.php';

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

function includeContent($data) {
    // Use HTML Purifier to allow safe HTML markup while stripping JavaScript
    // and other dangerous content (XSS prevention).
    $config = HTMLPurifier_Config::createDefault();
    $purifier = new HTMLPurifier($config);
    echo $purifier->purify($data);
}

$file = isset($_REQUEST['file']) ? $_REQUEST['file'] : null;
parseRequest($file);

$data = isset($_REQUEST['data']) ? $_REQUEST['data'] : null;
includeContent($data);
