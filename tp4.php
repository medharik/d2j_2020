<?php 

$stock=[
   ['libelle'=>'hp dv 5','prix'=>9000,'qte'=>40],
   ['libelle'=>'dell  d 5','prix'=>10000,'qte'=>0],
    ['libelle'=>'sony vaio 5','prix'=>12000,'qte'=>12],
    ['libelle'=>'sony vaio 7','prix'=>8000,'qte'=>8],
    ['libelle'=>'sony vaio 2','prix'=>7000,'qte'=>8],
];
// echo $stock[2]['libelle'];
// 0<qte<10 => rouge , 0 => "rupture de stock ", $qte> 10 => vert   
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tp : tableau </title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
<!--table>((thead>tr>th*4)+(tbody>tr>td*4))-->
<div class="container">
<table class="table table-striped">
    <thead>
        <tr>
            <th>Photo</th>
            <th>Num</th>
            <th>Libelle</th>
            <th>prix</th>
            <th>Qte en stock</th>
        </tr>
    </thead>
    <tbody>
<?php foreach($stock as $c=>$p) { ?>
    <?php 
            if($p['qte']>15){//stock ok
                $classe="success";
               
            }else if($p['qte']>10){// stock alert (entre 10 et =15)
                $classe="info";
                
            }else if($p['qte']==0){// rupture de stock
                $classe="danger";

            }else{ //stock critique  <10 
                $classe="warning";
            }
            
            ?>
        <tr>
            <td></td>
            <td><?=$c+1?></td>
            <td class="text-<?=$classe?>"><?= $p['libelle'] ;?></td>
            <td><?= $p['prix'] ;?></td>
            <?php 
            
            
            ?>
   
            <td  class="<?=($p['qte']>10) ? "text-success":"text-danger" ?>"  ><span class="badge badge-<?=$classe?>"> <?=$p['qte']?></span> <td>
        </tr>
<?php } ?>
    </tbody>
</table>

</div>

</body>
</html>