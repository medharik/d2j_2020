<?php
require("functions.php");
extract($_POST); //creer des variables ayant le meme name (ds form) et contenant les valeurs ds form
update($libelle, $prix, $id);
header("location:index.php?op=update");
