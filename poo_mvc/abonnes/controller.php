<?php
include("../vendor/autoload.php");

use App\Idao;
use App\Abonne;

Idao::connect();
extract($_GET); //$id, $action
extract($_POST);
switch ($action) {
    case 'store':
        $data = $_POST;
        if (!empty($_FILES['photo']['name'])) {
            $chemin =     Abonne::uploader($_FILES['photo'], "images");
            $data['photo'] = $chemin;
        }
        Abonne::store($data);
        break;
    case 'delete':
        $abonne = Abonne::find($id);
        $chemin = $abonne->photo;
        unlink($chemin);
        Abonne::delete($id);

        break;
    case 'update':
        $data = $_POST;
        if (!empty($_FILES['photo']['name'])) {
            $chemin =     Abonne::uploader($_FILES['photo'], "images");
            $data['photo'] = $chemin;
        }
        Abonne::update($data, $id);
        break;
    default:
        # code...
        break;
}
header("location:index.php?op=$action");
