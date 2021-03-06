<?php
include("../vendor/autoload.php");

use App\Idao;
use App\User;

Idao::connect();
extract($_GET); //$id, $action
extract($_POST);
switch ($action) {
    case 'store':
        User::store($_POST);
        break;
    case 'delete':
        User::delete($id);
        break;
    case 'update':
        User::update($_POST, $id);
        break;

    default:
        # code...
        break;
}
header("location:index.php?op=$action");
