<?php
function copyRenamed($source_dir, $target_dir, $files_list) {
    foreach ($files_list as $key_old => $key_new) {
        $oldfoldr = $source_dir . '/' . $key_old;
        $newfoldr = $target_dir . '/' . $key_new;
        copy($oldfoldr, $newfoldr);

    }
}