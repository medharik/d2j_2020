<?php 
include("produit.class.php");

$produit_serialise=file_get_contents("produit");

echo $produit_serialise."<br>";

$produit=unserialize($produit_serialise);

$produit->afficher();




?>