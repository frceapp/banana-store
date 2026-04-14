<?php

// Suppress PHP 8.4 Deprecation warnings from older vendor packages
error_reporting(E_ALL & ~E_DEPRECATED & ~E_USER_DEPRECATED);
ini_set('display_errors', '0');

// Forward all requests to the normal Laravel entry point
require __DIR__ . '/../public/index.php';
