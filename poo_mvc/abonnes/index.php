<?php

use App\Abonne;
use App\Idao;
use App\User;

include("../vendor/autoload.php");
Idao::connect();
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
        <div class="alert alert-info">Liste des Abonnes</div>
        <div class="text-right">
            <a href="_form.php" class="btn btn-primary">Nouveau</a>
        </div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>genre</th>
                    <th>nom & prenom</th>
                    <th>Date d'inscription </th>
                    <th>Photo</th>
                    <th>Email</th>

                    <th>Tel</th>
                    <th>adresse</th>
                    <th>Ca</th>
                    <th>action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $abonnes = Abonne::all();
                //   var_dump($abonnes);
                foreach ($abonnes as $u) : ?>
                    <tr>
                        <td><?= $u->id ?></td>
                        <td><?= $u->genre ?></td>
                        <td><?= $u->nomprenom ?></td>

                        <td> <?= $u->inscrit_le ?></td>
                        <td><img src="<?= $u->photo ?>" alt="<?= $u->nomprenom ?>" class="img-fluid img-thumbnail" width="150"></td>
                        <td><?= $u->email ?></td>
                        <td><?= $u->tel ?></td>
                        <td><?= $u->adresse ?></td>
                        <td><?php
                            $ps = $u->paiements();
                            $ca = 0;
                            foreach ($ps as $p) $ca += $p->montant;

                            echo $ca;

                            ?></td>
                        <td nowrap>
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
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>

</html>