<?php
function install($version) {
    $source_dir = __DIR__ . "/../php/{$version}";
    $dest_dir = "/opt/php-{$version}";
    $tarball = "{$source_dir}/php-{$version}.tar.gz";
    
    if (!is_dir($source_dir)) {
        echo "PHP version {$version} not found.\n";
        return false;
    }
    
    if (!file_exists($tarball)) {
        echo "PHP tarball for version {$version} not found.\n";
        return false;
    }
    
    // Extract PHP
    if (!extract_tarball($tarball, $dest_dir)) {
        echo "Failed to extract PHP tarball.\n";
        return false;
    }
    
    // Copy configuration
    if (!copy_files("{$source_dir}/config", "{$dest_dir}/etc")) {
        echo "Failed to copy PHP configuration.\n";
        return false;
    }
    
    // Copy extensions
    if (!copy_files("{$source_dir}/extensions", "{$dest_dir}/ext")) {
        echo "Failed to copy PHP extensions.\n";
        return false;
    }
    
    echo "PHP {$version} installed successfully.\n";
    return true;
}
