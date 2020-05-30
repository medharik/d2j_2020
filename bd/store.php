 <?php
include("functions.php");
// $_POST = ['libelle'=>'hp','prix'=>9000] : variable implicite
// $libelle = $_POST['libelle'];
// $prix = $_POST['prix'];
extract($_POST);//creer des variables (auto) initialisees par les valeurs tableaux
// $_REQUEST['libelle']
// $_GET['libelle']
store($libelle, $prix);
//redirection vers index.php
header("location:index.php");
