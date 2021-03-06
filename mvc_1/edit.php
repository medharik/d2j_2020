<?php require("functions.php");
$id = (int) $_GET['id'];
$produit = find($id);
$categories = all("categorie");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edition de <?= $produit['id'] ?></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>

<body>
    <?php include("_menu.php"); ?>
    <div class="container">


        <div class="alert alert-info">Modification du produit</div>
        <form action="controller.php?action=update" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?= $produit['id'] ?>">
            <div class="form-group">
                <label for="libelle">libelle</label>
                <input type="text" class="form-control" name="libelle" id="libelle" value="<?= $produit['libelle'] ?>">
            </div>
            <div class="form-group">
                <label for="prix">prix</label>
                <input type="text" class="form-control" name="prix" id="prix" value="<?= $produit['prix'] ?>">
            </div>
            <div class="form-group">
                <label for="categorie_id">categorie</label>
                <select type="text" class="form-control" name="categorie_id" id="categorie_id">
                    <?php
                    foreach ($categories as $c) :
                    ?>
                        <option <?php if ($c['id'] == $produit['categorie_id']) echo  "selected"; ?> value="<?= $c['id'] ?>"><?= $c['nom'] ?></option>
                    <?php endforeach ?>
                </select>
            </div>
            <div class="form-group">
                <label for="chemin">chemin</label>
                <input type="file" class="form-control" name="chemin" id="chemin" required>
            </div>

            <button>Valider</button>

        </form>
    </div>




    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>

</html>