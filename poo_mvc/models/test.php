<?php
include("imetier.class.php");
include("idao.class.php");
include("user.class.php");
Idao::connect();
$d = new Idao();
//table :users (id,login ,passe )
$data = ['login' => 'alami', 'passe' => 1234, 'pseudo' => 'ali'];
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
User::store($data);
