<?php
function copy_files($source_dir, $dest_dir) {
    if (!is_dir($source_dir)) {
        return false;
    }
    
    if (!is_dir($dest_dir)) {
        mkdir($dest_dir, 0755, true);
    }
    
    $dir = opendir($source_dir);
    while (($file = readdir($dir)) !== false) {
        if ($file != '.' && $file != '..') {
            $src = $source_dir . '/' . $file;
            $dst = $dest_dir . '/' . $file;
            if (is_dir($src)) {
                copy_files($src, $dst);
            } else {
                copy($src, $dst);
            }
        }
    }
    closedir($dir);
    return true;
}

function extract_tarball($tarball, $destination) {
    $command = "tar -xzf {$tarball} -C {$destination}";
    exec($command, $output, $return_var);
    return $return_var === 0;
}
