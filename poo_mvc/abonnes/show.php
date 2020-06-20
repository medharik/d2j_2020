<?php

use App\Idao;
use App\Abonne;
use App\Paiement;

include("../vendor/autoload.php");
Idao::connect();

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $abonne =  Abonne::find($_GET['id']);

    $notice = "Consultation de l'abonné : " . $abonne->nomprenom;
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
            <div class="col-md-4 shadow p-2 mx-auto my-1">
                <img src="<?= $abonne->photo ?>" alt="" class="img-fluid">
            </div>
            <div class="col-md-7 offset-1 shadow p-2 mx-auto my-1">
                <ul class="list-group">
                    <li class="list-group-item active text-center">
                        <h3> <?= $abonne->nomprenom ?></h3>
                    </li>
                    <li class="list-group-item">Nom & prenom : <?= $abonne->nomprenom ?></li>
                    <li class="list-group-item">Inscript le : <?= $abonne->inscrit_le ?></li>
                    <li class="list-group-item">Email : <?= $abonne->email ?></li>
                    <li class="list-group-item">Tel : <?= $abonne->tel ?></li>
                </ul>
            </div>

        </div>

        <button onclick="history.back()" class="btn btn-success btn-sm">Retour</button>
        <div class="row">

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Abonne </th>
                        <th>User </th>
                        <th> Date de </th>
                        <th>Date fin</th>
                        <th>Nombre de mois</th>
                        <th>Tarif / mois</th>
                        <th>remise </th>
                        <th>montant </th>
                        <th>action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                    $paiements = $abonne->paiements();
                    foreach ($paiements as $u) : ?>
                        <tr>
                            <td><?= $u->id ?></td>
                            <td><?= $u->abonne()->nomprenom;

                                ?></td>
                            <td><?= $u->user()->pseudo; ?></td>
                            <td> <?= $u->date_de ?></td>
                            <td><?= $u->date_a ?></td>
                            <td>....</td>
                            <td><?= $u->tarif_mois ?></td>
                            <td><?= $u->remise ?></td>
                            <td><?= $u->montant ?></td>
                            <td>
                                <div class="button-group">
                                    <a onclick="return confirm('voulez vous vraiement supprimer cet element?')" href="controller.php?action=delete&id=<?= $u->id ?>" class="btn btn-sm btn-danger">Supprimer</a>
                                    <a href="_form.php?id=<?= $u->id ?>" class="btn btn-sm btn-warning">Modifier</a>
                                    <a href="show.php?id=<?= $u->id ?>" class="btn btn-sm btn-info">Consulter</a>
                                </div>

                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>


        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>

</html>