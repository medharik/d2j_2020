<?php
// spl_autoload_register(function ($classe) {
//     include(strtolower($classe) . ".class.php");
//     //     echo strtolower($classe) . ".class.php", "<br>";
// });
include "../vendor/autoload.php";

use App\Abonne;
use App\Idao;
use App\User;

Idao::connect();
Abonne::all();
$d = new Idao();

//table :users (id,login ,passe )
$data = ['login' => 'admin', 'passe' => 123456, 'pseudo' => 'ali2'];
// // insert into users(login,passe) values(?,?)
// $keys = array_keys($data); //$Keys=['login','passe'];
// $str_keys = join(",", $keys); // login,passe
// //$data => [?,?,?]
// $inter = function ($valeur) {
//     return "?";
// };
// $in = array_map($inter, $keys);
// $p_intero = join(',', $in); //?,?,?
// $sql = "insert into users ($str_keys) values($p_intero)";
// echo $sql;
$result = Abonne::all();
var_dump($result);
