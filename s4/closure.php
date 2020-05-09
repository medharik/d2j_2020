<?php 
//closure => fonction lambda => fonction anonyme
// => role principal : peuvent servir de fonctions de callback (rappel) ou fonction locale
$tab1=["hicham","sara","yasser","amal"];// => tab_resultat=[6,4,6,4]
$fontion1=function($x){ return strlen($x);};
// var_dump($f);
$tab_resultat=array_map($fontion1,$tab1);
// print_r($tab_resultat);
usort($tab1,function($x,$y){
return $x<=>$y;
});
// java stream
var_dump($tab1);
// 20<=>1;//1
"ali"<=>"zineb";//-1
"test"<=>"test"//0


?>