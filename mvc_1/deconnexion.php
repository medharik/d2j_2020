<?php
// session_name('d2j');
session_start();
unset($_SESSION);
session_destroy();
setcookie('PHPSESSID', "", time() - 45000, '/');
header("location:login.php");
