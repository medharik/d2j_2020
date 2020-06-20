<?php
define('BASE_URL', 'http://localhost:83/d2j_2020/poo_mvc/');

?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Sportify 1.0</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">

            <li class="nav-item">
                <a class="nav-link" href="<?= BASE_URL ?>users/">Comptes utilisateurs</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= BASE_URL ?>abonnes/index.php">Abonnés </a>
            </li>

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Paiements
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="<?= BASE_URL ?>paiements/index.php">Liste des paiements </a>
                    <a class="dropdown-item" href="<?= BASE_URL ?>paiements/alertes.php">Alertes de paiement</a>

                </div>
            </li>

        </ul>

    </div>
</nav>