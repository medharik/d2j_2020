<?php

use App\Idao;
use App\User;

include("../vendor/autoload.php");
Idao::connect();

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $user =  User::find($_GET['id']);
    $notice = "Consultation de l'utilisateur : " . $user->pseudo;
} else {
    header("location:index.php");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>sportify </title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>

<body>
    <?php include("../_menu.php"); ?>
    <div class="container">
        <div class="alert alert-info"><?= $notice ?></div>
        <div class="row">
            <div class="col-md-6 shadow p-2 mx-auto my-1">
                <ul class="list-group">
                    <li class="list-group-item active text-center">
                        <h3> <?= $user->pseudo ?></h3>
                    </li>
                    <li class="list-group-item">Login : <?= $user->login ?></li>
                    <li class="list-group-item">Mot de passe : <?= $user->passe ?></li>
                    <li class="list-group-item">ROle : <?= $user->role ?></li>
                </ul>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>

</html>