<?php
include_once("functions.php");
$produits = all();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>liste des produits</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>

<body oncontextmenu="return false">
    <?php include("_menu.php"); ?>
    <div class="container">
        <div class="text-right">
            <a href="create.php" class="btn btn-sm btn-primary my-1">Nouveau</a>
        </div>
        <div class="alert alert-info">liste des produits</div>


        <table class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>libelle</th>
                    <th>prix</th>
                    <th>actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($produits as $p) { ?>
                    <tr>
                        <th><?php echo $p['id']; ?></th>
                        <th><?= $p['libelle']; ?></th>
                        <th><?= $p['prix']; ?></th>
                        <th>
                            <div class="btn-group">

                                <a onclick="return confirm('voulew vous vraiment supprimer cet element?')" href="delete.php?id=<?php echo $p['id']; ?>" class="btn btn-sm btn-danger">S</a>
                                <a href="edit.php?id=<?php echo $p['id']; ?>" class="btn btn-sm btn-warning">M</a>
                                <a href="show.php?id=<?php echo $p['id']; ?>" class="btn btn-sm btn-info ">C</a>
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