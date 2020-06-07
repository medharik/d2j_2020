<?php
session_start();
$_SESSION['prenom'] = 'mohamed';
$_SESSION['nom'] = 'harik';
echo  $_SESSION['nom'];
