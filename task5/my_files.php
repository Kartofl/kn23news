<?php
function listFiles($loc) {
    $docsPath = $uploadsPath . "docs/";
    $uploadsPath = "uploads/";
    $imagesPath = $uploadsPath . "images/";



    if (!file_exists($uploadsPath)) {
        mkdir($uploadsPath);
    }

    if (!file_exists($docsPath)) {
        mkdir($docsPath);
    }

    if (!file_exists($imagesPath)) {
        mkdir($imagesPath);
    }



    $files = scandir($loc);
    foreach ($files as $file) {
        if ($file != '.' && $file != '..') {
            $path = $loc . "/". $file;
            
            if (is_dir($path)) {
                listFiles($path);
            } else {
                echo $path . "<br>";
            }
        }
    }
}







