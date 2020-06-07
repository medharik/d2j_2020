<?php
if (count($_COOKIE) == 0) {
    echo "cookie desabled";
}
if (isset($_COOKIE['date_visite'])) {
    echo "votre derniere  date de visite est " . $_COOKIE['date_visite'];
}
