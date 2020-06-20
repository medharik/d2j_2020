<?php

use App\Abonne;
use App\Idao;
use App\Paiement;
use App\User;

include("../vendor/autoload.php");
Idao::connect();
$action = "store";
$notice = "nouveau paiement";
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $paiement =  Paiement::find($_GET['id']);
    $notice = "Modification de l'paiement : " . $paiement->id;
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
                    if (isset($paiement)) {
                    ?>
                        <input type="hidden" name="id" value=<?= $paiement->id ?>>
                    <?php } ?>
                    <div class="form-group"><label for="user_id">Utilsateur </label>

                        <select type="text" required class="form-control" name="user_id" id="user_id" value="<?= (isset($paiement)) ? $paiement->user_id : '' ?>">
                            <?php $users = User::all();
                            foreach ($users as $u) : ?>
                                <option value="<?= $u->id ?>"><?= $u->pseudo ?></option>
                            <?php endforeach ?>
                        </select>

                    </div>
                    <div class="form-group"><label for="abonne_id"> abonne_id</label>
                        <select type="text" required class="form-control" name="abonne_id" id="abonne_id" value="<?= (isset($paiement)) ? $paiement->abonne_id : '' ?>">
                            <?php $abonnes = Abonne::all();
                            foreach ($abonnes as $u) : ?>
                                <option value="<?= $u->id ?>"><?= $u->nomprenom ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div class="form-group"><label for="date_de"> Date Debut : </label>
                        <input type="date" class="form-control" name="date_de" id="date_de" autocomplete="off" value="<?= (isset($paiement)) ? $paiement->date_de : '' ?>"></div>
                    <div class="form-group"><label for="date_a"> Date Fin : </label>
                        <input type="date" class="form-control" name="date_a" id="date_a" autocomplete="off" value="<?= (isset($paiement)) ? $paiement->date_a : '' ?>"></div>
                    <div class="form-group"><label for="tarif_mois"> Tarif par mois : </label>
                        <input type="number" class="form-control" name="tarif_mois" id="tarif_mois" autocomplete="off" value="<?= (isset($paiement)) ? $paiement->tarif_mois : '' ?>"></div>

                    <div class="form-group"><label for="remise"> Remise : </label>
                        <input type="number" class="form-control" name="remise" id="remise" autocomplete="off" value="<?= (isset($paiement)) ? $paiement->remise : '' ?>"></div>

                    <div class="form-group"><label for="montant"> Montant : </label>
                        <input type="number" class="form-control" name="montant" id="montant" autocomplete="off" value="<?= (isset($paiement)) ? $paiement->montant : '' ?>"></div>

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