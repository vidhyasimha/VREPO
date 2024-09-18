<?php
if ($argc != 3) {
    die("Usage: php install.php <software> <version>\n");
}

$software = strtolower($argv[1]);
$version = $argv[2];

if (!in_array($software, ['apache', 'php'])) {
    die("Unsupported software. Use 'apache' or 'php'.\n");
}

$install_script = __DIR__ . "/scripts/{$software}_install.php";

if (!file_exists($install_script)) {
    die("Installation script for {$software} not found.\n");
}

require_once __DIR__ . '/scripts/common_functions.php';
require_once $install_script;

if (function_exists('install')) {
    if (install($version)) {
        echo "{$software} version {$version} installed successfully.\n";
    } else {
        echo "Failed to install {$software} version {$version}.\n";
    }
} else {
    echo "Installation function not found for {$software}.\n";
}
