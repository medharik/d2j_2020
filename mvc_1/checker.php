<?php
require("functions.php");
extract($_POST); //$login,$passe
verifier($login, $passe, "login.php?cn=no");
header("location:index.php");
