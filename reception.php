<?php 
// variables superglobales (implicite)
//variables crees et gerees automatiquement pas PHP  , selon le context
// var_dump($_POST);

if(isset($_POST['login']) && isset($_POST['passe'])){
    $login=$_POST['login'];
    $passe=$_POST['passe'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php  include ("_css.html");?>
    <title></title>
</head>
<body>
    <div class="alert alert-info">
   Login = <?=$login?>, mot de passe : <?=$passe?>, a est : <?=$a?>
    </div>
    <h4>Marque est <?=$_GET['marque'];?></h4>
</body>
</html>