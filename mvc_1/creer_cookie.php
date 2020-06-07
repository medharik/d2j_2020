<?php
// Cookies :  informations  (persistantes) entregistrees par un composant web chez le client (exemple : donnees techniques , retargeting (reciblage))
setcookie('date_visite', date('d-m-Y'), time() + 30 * 24 * 60 * 60, "/", true, true);
//session : mecanisme permettant de gerer les donnees de chaque utilisteur cote serveur 
// (zone memoire cote serveur pour chaque client =$_SESSION)
