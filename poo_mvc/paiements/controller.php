<?php
include("../vendor/autoload.php");

use App\Idao;
use App\Paiement;

Idao::connect();
extract($_GET); //$id, $action
extract($_POST);
switch ($action) {
    case 'store':
        Paiement::store($_POST);
        break;
    case 'delete':
        Paiement::delete($id);
        break;
    case 'update':
        Paiement::update($_POST, $id);
        break;

    default:
        # code...
        break;
}
header("location:index.php?op=$action");
