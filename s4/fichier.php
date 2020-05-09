<?php 
//generateur 
$dossier="dossier/yassine/";
if(!is_dir($dossier)){
    mkdir($dossier,0777,true);
}
$nom_fichier=$dossier."test5.txt";
if(!is_file($nom_fichier)){
 $file=fopen($nom_fichier,'w');
 for($i=0;$i<10000000;$i++){
     fwrite($file,"lorem ipsum set  dolor amet $i\n");
    }
    fclose($file);
}

// $tab_fichier=file($nom_fichier);
// Generateur : 

function generer_basic(){
    yield  'a'=>"yassine";
    yield "Hicham";
    yield "Sara";
}
// $g=generer_basic();
// //  $g->next();
// // echo $g->current();
// // $g->next();
// // echo $g->current();
// // var_dump($g);
// foreach( $g as $c=>$v ){
// echo "$c est $v<br>";
// }


function generer($nom){
   $file= fopen($nom,'r');
while(!feof($file)){
 yield fgets($file);
}
    
}
$g=generer($nom_fichier);
foreach($g as $l){
    echo nl2br($l);
}
?>