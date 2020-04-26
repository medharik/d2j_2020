<?php 
//tableau : ensemble  de donnnees (hash)
$t=["test 1",1200,0.5, new DateTime()];
//$tableau indexe (numerote de zero)
$ti=['A',"B","test",19];
$ti[4]=" 4 eme case";
$ti[]="push ";// ajout a la fin du tableau 
$ti[10]="test 10";
$ti[]="test 11 ";
// echo $ti[20]."<br>";
var_dump($ti);
echo "<hr>";
// tableau associatif (key=>value , name=> value)
$ta=['nom'=>'Alami','prenom'=> 'ali','age'=>37,0=>300];
$ta['salaire']=7000;
$ta['nom']='Alaoui';
$ta[]=9000;
$ta['cle1']=10000;
$ta[]=11000;

print_r($ta);


?>