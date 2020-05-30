<?php
include("functions.php");
// store("h'p compaq", 7000);
// store("sony vaio", 8000);
// store("acer a4", 7000.90);
// store("toshiba t670", 7000);


// delete(2);
// update("dell d5", 7000, 1);
// $resultat = all();
// print_r($resultat);
$produit = find(1);
print_r($produit);
echo $produit['libelle'];
