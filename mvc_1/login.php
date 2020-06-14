<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>

<body>

    <div class="container">
        <div class="alert alert-info">Authentification</div>
        <div class="row">
            <div class="col-md-6 mx-auto shadow p-2">
                <?php
                if (isset($_GET['cn']) && $_GET['cn'] == 'no') {
                ?>
                    <div class="alert alert-danger">Login/ mot de passe incorrectes</div>
                <?php } ?>

                <form action="checker.php" method="post">
                    <div class="form-group"><label for="login">Login</label><input autocomplete="off" type="text" class="form-control" name="login" id="login"></div>
                    <div class="form-group"><label for="passe">Mot de passe</label>
                        <input type="password" class="form-control" name="passe" id="passe"></div>
                    <button class="btn btn-sm btn-primary">Connexion</button>
                </form>
            </div>
        </div>

    </div>




    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>

</html>