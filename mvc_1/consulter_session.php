<?php
if (!isset($_SESSION)) {
    session_start();
}

echo $_SESSION['nom'], "<br>";
echo $_SESSION['prenom'];
