<?php
include("functions.php");
$action = "store";
$notice = "Nouvelle categorie";
if (isset($_GET['id'])) {
    $categorie = find($_GET['id'], "categorie");
    $action = "update";
    $notice = "Modification de la  categorie " . $categorie['nom'];
}


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
        <div class="alert alert-info"><?= $notice ?></div>
        <form action="controller_categorie.php?action=<?= $action ?>" method="post">
            <?php
            if (isset($categorie)) {
            ?>
                <input type="hidden" name="id" value="<?= $categorie['id'] ?>">
            <?php } ?>
            <div class="form-group">
                <label for="nom">nom</label>
                <input type="text" class="form-control" name="nom" id="nom" value="<?= (isset($categorie) ? $categorie['nom'] : "") ?>">
            </div>

            <button>Valider</button>

        </form>

    </div>




    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>

</html>