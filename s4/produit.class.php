<?php 
class Produit{

    public $libelle;
    public $prix;
    function __construct($libelle="",$prix=0){
$this->libelle=$libelle;
$this->prix=$prix;

    }
public function afficher(){
    echo $this->libelle." ".$this->prix;
}





}


?>