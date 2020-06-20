<?php

/**
 * 
 */

namespace App;

trait Helper
{


    // public abstract function date_diff($d1, $d2);



    public static function uploader($infos = array(), $dossier = "images")

    {
        $tmp = $infos['tmp_name'];
        $nom = $infos['name'];
        $size = filesize($tmp);

        if (!is_dir($dossier)) {
            mkdir($dossier, 777, true);
        }

        $parts = pathinfo($nom);
        $ext = strtolower($parts['extension']);

        //unicite
        $new_name = md5(time() . rand(0, 999999)) . ".$ext";
        $destination = "$dossier/$new_name";
        $autorises = ['jpg', 'png', 'gif', 'jpeg'];
        if (!in_array($ext, $autorises)) {
            die("type de fichier non autorisé");
        } else if ($size > 8 * 1024 * 1024) {
            die("la taille maximale autorisee est " . round(8 * 1024 * 1024 / (1024 * 1024), 2) . "Mo");
        } else if (!move_uploaded_file($tmp, $destination)) {

            die("Une erreur est survenue lors de l'upload de ce fichier");
        };

        return $destination;
    }
}
