<?php
include("functions.php");

//je recupere l'id depuis le lien
$id = (int) $_GET['id'];
$categorie = find($id, "categorie");
$produits = all("produit", "categorie_id=$id");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>modele</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>

<body>
    <?php include("_menu.php"); ?>
    <div class="container">
        <div class="alert alert-info">consultation de : <?= $categorie['nom'] ?></div>
        <ul>
            <li>nom : <?= $categorie['nom'] ?></li>


        </ul>
        <a href="javascript:history.go(-1)" class="btn btn-success">retour</a>
        <hr>
        <div class="row">
            <?php foreach ($produits as $p) { ?>
                <div class="col-md-4 text-center shadow-sm">
                    <img src="<?= $p['chemin'] ?>" class="img-fluid">
                    <h4><?= $p['libelle'] ?></h4>
                    <h5><?= $p['prix'] ?>DHS</h5>
                    <a href="show.php?id=<?= $p['id'] ?>" class="btn -btn-sm btn-info">Details</a>
                </div>
            <?php } ?>
        </div>
    </div>





    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>

</html>