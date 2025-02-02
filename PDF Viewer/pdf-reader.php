<?php

$file = 'DEPLIANT-FIFM-2024.pdf';

if (file_exists($file)) {
    header('Content-Type: application/pdf'); 
    header('Content-Disposition: inline; filename="' . $file . '"'); 
    header('Content-Transfer-Encoding: binary'); 
    header('Accept-Ranges: bytes'); 

    readfile($file);
    exit;
} else {
    echo "Erreur : Le fichier PDF n'existe pas.";
}
?>
