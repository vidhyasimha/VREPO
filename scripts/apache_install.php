<?php
function install($version) {
    $source_dir = __DIR__ . "/../apache/{$version}";
    $dest_dir = "/opt/apache-{$version}";
    $tarball = "{$source_dir}/apache-{$version}.tar.gz";
    
    if (!is_dir($source_dir)) {
        echo "Apache version {$version} not found.\n";
        return false;
    }
    
    if (!file_exists($tarball)) {
        echo "Apache tarball for version {$version} not found.\n";
        return false;
    }
    
    // Extract Apache
    if (!extract_tarball($tarball, $dest_dir)) {
        echo "Failed to extract Apache tarball.\n";
        return false;
    }
    
    // Copy configuration
    if (!copy_files("{$source_dir}/config", "{$dest_dir}/conf")) {
        echo "Failed to copy Apache configuration.\n";
        return false;
    }
    
    // Copy modules
    if (!copy_files("{$source_dir}/modules", "{$dest_dir}/modules")) {
        echo "Failed to copy Apache modules.\n";
        return false;
    }
    
    echo "Apache {$version} installed successfully.\n";
    return true;
}
