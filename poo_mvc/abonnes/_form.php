<?php

use App\Idao;
use App\Abonne;

include("../vendor/autoload.php");
Idao::connect();
$action = "store";
$notice = "nouvel abonné";
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $abonne =  Abonne::find($_GET['id']);
    $notice = "Modification de l'abonné : " . $abonne->nomprenom;
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
                <form action="controller.php?action=<?= $action ?>" method="post" enctype="multipart/form-data">
                    <?php
                    if (isset($abonne)) {
                    ?>
                        <input type="hidden" name="id" value=<?= $abonne->id ?>>
                    <?php } ?>
                    <div class="form-group"><label for="nomprenom">Nom & prenom</label>
                        <input type="text" required class="form-control" name="nomprenom" id="nomprenom" value="<?= (isset($abonne)) ? $abonne->nomprenom : '' ?>"></div>
                    <div class="form-group"><label for="inscrit_le"> Date d'inscription</label>
                        <input type="date" required class="form-control" name="inscrit_le" id="inscrit_le" pattern="^sport[0-9]{4,}" value="<?= (isset($abonne)) ? $abonne->inscrit_le : '' ?>"></div>
                    <div class="form-group"><label for="photo"> Photo : </label>
                        <input type="file" class="form-control" name="photo" id="photo"></div>
                    <div class="form-group">
                        <label for="genre"> Genre : </label>
                        <label for="homme">Homme</label><input type="radio" name="genre" id="homme" value="homme" <?= (isset($abonne) && $abonne->genre == "homme") ? "checked" : '' ?>>
                        <label for="femme">Femme</label><input type="radio" name="genre" id="femme" value="femme" <?= (isset($abonne) && $abonne->genre == "femme") ? "checked" : '' ?>>
                    </div>
                    <div class="form-group"><label for="email">Email</label>
                        <input type="email" required class="form-control" name="email" id="email" value="<?= (isset($abonne)) ? $abonne->email : '' ?>"></div>

                    <div class="form-group"><label for="tel">tel</label>
                        <input type="tel" required class="form-control" name="tel" id="tel" value="<?= (isset($abonne)) ? $abonne->tel : '' ?>"></div>
                    <div class="form-group"><label for="adresse">adresse</label>
                        <textarea type="text" required class="form-control" name="adresse" id="adresse"><?= (isset($abonne)) ? $abonne->adresse : '' ?></textarea>


                        <button type="submit" class="btn btn-primary">Valider</button>
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