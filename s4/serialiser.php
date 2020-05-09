<?php 
// Serialisation :  Objects => flux binaire ( pour : networking+ persitence) =>  deserialisation flux binaire => Objects
include ("produit.class.php");
$p=new Produit("hp dv 6",8000);
$p->afficher();


$produit_serialise=serialize($p);
file_put_contents("produit",$produit_serialise);

?>