<?php

use App\Idao;
use App\User;

include("../vendor/autoload.php");
Idao::connect();
$action = "store";
$notice = "nouvel utilisateur";
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $user =  User::find($_GET['id']);
    $notice = "Modification de l'utilisateur : " . $user->pseudo;
    $action = "update";
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
                <form action="controller.php?action=<?= $action ?>" method="post">
                    <?php
                    if (isset($user)) {
                    ?>
                        <input type="hidden" name="id" value=<?= $user->id ?>>
                    <?php } ?>
                    <div class="form-group"><label for="login">login</label>
                        <input type="text" required class="form-control" name="login" id="login" value="<?= (isset($user)) ? $user->login : '' ?>"></div>
                    <div class="form-group"><label for="passe"> mot de passe</label>
                        <input type="password" required class="form-control" name="passe" id="passe" pattern="^sport[0-9]{4,}" value="<?= (isset($user)) ? $user->passe : '' ?>"></div>
                    <div class="form-group"><label for="pseudo"> pseudo</label>
                        <input type="text" class="form-control" name="pseudo" id="pseudo" autocomplete="off" value="<?= (isset($user)) ? $user->pseudo : '' ?>"></div>
                    <div class="form-group"><label for="role"> Role : </label>
                        <label for="admin">admin</label><input type="radio" name="role" id="admin" value="admin" <?= (isset($user) && $user->role == "admin") ? "checked" : '' ?>>
                        <label for="agent">agent</label><input type="radio" name="role" id="agent" value="agent" <?= (isset($user) && $user->role == "agent") ? "checked" : '' ?>>
                    </div>
                    <button type="submit">Valider</button>
                </form>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>

</html>