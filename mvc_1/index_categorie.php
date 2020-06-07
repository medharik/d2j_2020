<?php
if (!isset($_SESSION)) {
    session_start();
}
if (!isset($_SESSION)) {
    session_start();
}
if (!isset($_SESSION)) {
    session_start();
}
if (!isset($_SESSION)) {
    session_start();
}

session_start();
include_once("functions.php");
$categories = all("categorie");
$message = "";
$classe = "d-none";
if (isset($_GET['op'])) {
    extract($_GET);
    switch ($op) {

        case 'update':
            $message = "Modification effectuee avec succes ";
            $classe = "alert-warning";
            break;
        case 'store':
            $message = "Ajout effectue avec succes ";
            $classe = "alert-info";
            break;
        case 'delete':
            $message = "Suppression effectuee avec succes ";
            $classe = "alert-danger";
            break;

        default:
            $message = "une erreur est survenue lors du televersement du fichier ";
            $classe = "alert-danger";


            break;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>liste des categories</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>

<body oncontextmenu="return true">
    <?php include("_menu.php"); ?>
    <div class="container">

        <div class="alert <?= $classe ?>">
            <?= $message ?>
        </div>


        <div class="text-right">
            <a href="_form.php" class="btn btn-sm btn-primary my-1">Nouveau</a>
        </div>
        <div class="alert alert-info">liste des categories</div>


        <table class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nom</th>
                    <th>Produits</th>
                    <th>actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($categories as $p) { ?>
                    <tr>
                        <th><?php echo $p['id']; ?></th>
                        <th><?= htmlentities($p['nom']); ?></th>
                        <th><?php

                            $produits =  all("produit", "categorie_id=" . $p['id']);
                            echo "il y a " . count($produits) . " produit(s)";
                            foreach ($produits as $e) {
                            ?>
                                <span class="badge badge-primary">
                                    <?= $e['libelle'] ?>
                                </span>
                            <?php } ?>
                        </th>

                        <th>
                            <div class="btn-group">

                                <a onclick="return confirm('voulew vous vraiment supprimer cet element?')" href="controller_categorie.php?id=<?php echo $p['id']; ?>&action=delete" class="btn btn-sm btn-danger">S</a>
                                <a href="_form.php?id=<?php echo $p['id']; ?>" class="btn btn-sm btn-warning">M</a>
                                <a href="show_categorie.php?id=<?php echo $p['id']; ?>" class="btn btn-sm btn-info ">C</a>
                        </th>

    </div>
    </tr>
<?php } ?>
</tbody>
</table>
</div>




<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>

</html>