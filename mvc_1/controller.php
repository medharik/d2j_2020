<?php
include("functions.php");
extract($_POST);
extract($_GET); //$action=store ou delete ou update

switch ($action) {
    case "store":

        if (!empty($_FILES['chemin']['name'])) {
            $chemin =   uploader($_FILES['chemin'], "uploads");
            store($libelle, $prix, $chemin);
        }
        // echo  $chemin;
        else {
            header("location:index.php?op=erreur");
            die();
        }

        break;
    case "update":
        if (!empty($_FILES['chemin']['name'])) {
            $chemin =   uploader($_FILES['chemin'], "uploads");
            $produit = find($id);
            if (is_file($produit['chemin'])) {
                unlink($produit['chemin']);
            }
            update($libelle, $prix, $id, $chemin);
        } else {
            update($libelle, $prix, $id);
        }
        break;
    case "delete":
        $produit = find($id);
        if (is_file($produit['chemin'])) {
            unlink($produit['chemin']);
        }
        delete($id);

        break;
}


header("location:index.php?op=$action");
