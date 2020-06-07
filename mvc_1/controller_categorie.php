<?php
include("functions.php");
extract($_POST);
extract($_GET); //$action=store ou delete ou update

switch ($action) {
    case "store":
        store_categorie($nom);
        break;
    case "update":
        update_categorie($nom, $id);
        break;
    case "delete":

        delete($id, "categorie");

        break;
}


header("location:index_categorie.php?op=$action");
