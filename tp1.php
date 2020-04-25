<?php 
// les variables :
// typage dynamique  
$age=25;
$nom = "AHMADI $age ";
$prenom='Ahmed $age';
$taille =2.1;
$date=null;
$test=[];
echo "age est $age ans ";// String en "" => interprete  la viariable
echo 'age est $age ans ';//'String en ' => n'interprete pas la variable
// exercice : 
$a=20;
echo $a;//20 
echo "<br>";
$b=$a;//passage par valeur 
echo $a ;//20
echo "<br>";

echo $b;//20
echo "<br>";

$a=90;
echo $a;//90
echo "<br>";

echo $b;//20
echo "<br>";

$age=30;
$majeur=$age>18;
var_dump($majeur);// type + contenu
echo "<br>";
// passage par reference , par adresse 
$c=&$a;// $c recoit l'adresse de $a (pointe vers a ) : $a est $c pointent vers la memoire
echo "old c : $c";echo "<br>";

$a=10;
echo  "c est $c , a est $a ";echo "<br>";
$c=1000;
echo "a est $a<br>";
echo $b;echo "<br>";
$majorite=($majeur)? "Majeur":"Mineur";
echo  $majorite;
//OPERATEUR LOGIQUE : ==, ===,short cut , ....
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>intro PHP</title>
</head>
<body>

<?php echo "<h4>Bienvenue $nom $prenom</h4>"; ?>
<?php echo '<h4>Bienvenue $nom $prenom</h4>'; ?>
<?php echo '<h4>Bienvenue '.$nom.' '. $prenom.'</h4>' ?>
<h4>Bienvenue <?php echo $nom  ?>  <?php echo $prenom?> </h4>
<h4>Bienvenue <?= $nom  ?>  <?= $prenom?> </h4>

    
</body>
</html>

