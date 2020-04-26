<?php 
$age=20;
$m=$age<18;
//  gettype($m);
// var_dump($m);

$cnx=null;

if($cnx){
echo  "cnx est $cnx<br>";
}else{
    echo "false";
}
// false <=> : 0, 0.0, [], array(),null, "",'', FALSE
// true <=> [1,2,3], 45,'test',"0.0",...
function bool_value($valeur){
    echo "<br>";
    return (bool) $valeur;
}
$t=[1,2,3];
// 0==0.0 , 0==false => true 
// 0===0.0 , 0===FALSE => false  (=== => on compare le type est la valeur )
 echo  bool_value($t==FALSE);
  echo "<hr>";
$a=10;
$b=1;
$i=1;
// 1 <=> true
//0 <=> false
// && <=> *
// || <=> +


// $r=($a>=10) && ($b===1.0) ||  ++$i<=2 ;
// var_dump($r);
// var_dump($i);
// $age=100;
// echo   ($age>18) ? "Majeur": (($age==18)? "ANNIV":"MINEUR") ;

// echo $age > 18 && "<h2>Majeur....</h2>";
$trouve=false;
for($i=0;$i<6 && !$trouve;$i++){
echo "<br>pour i =$i:<br>";
    if($i%3==2)  {
    echo  "A<br>";
    break;
}
$trouve=($i===1);

    if($i===1){
        echo "B<br>";
continue;// passer a next  (AMOR)
    }
    echo "C<br>";

}

// 0%3 = 0
// 1%3=1 
// 2%3 = 2
// 3%3 =0
// 4%3=1
// 5%3= 2
// 6%3=0

//i=0 => c 
//i=1 => B
//i=2 => A
//
$t=[1,4,5];
foreach($t as $c=>$v ){
echo "<br>$c : $v";
}
?>