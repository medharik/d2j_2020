<?php 
define ('MAX',100);
// $stock=[
//     ['libelle'=>'hp dv 5','prix'=>9000,'qte'=>40,'image'=>'https://i.picsum.photos/id/231/200/300.jpg'.rand(1,4)],
//     ['libelle'=>'dell  d 5','prix'=>10000,'qte'=>0,'image'=>'http://lorempixel.com/400/200/sports/'.rand(1,4)],
//     ['libelle'=>'sony vaio 5','prix'=>12000,'qte'=>12,'image'=>'http://lorempixel.com/400/200/sports/'.rand(1,4)],
//     ['libelle'=>'sony vaio 7','prix'=>8000,'qte'=>8,'image'=>'http://lorempixel.com/400/200/sports/'.rand(1,4)],
//     ['libelle'=>'sony vaio 2','prix'=>7000,'qte'=>8,'image'=>'http://lorempixel.com/400/200/sports/'.rand(1,4)]    
// ];
$stock=[];
for($i=0;$i<MAX;$i++){
$stock[]= ['libelle'=>'produit '.random_int(1,9999),'prix'=>rand(10,99999),'qte'=>random_int(0,100),'image'=>'https://i.picsum.photos/id/'.random_int(1,300).'/200/200.jpg'];
}




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
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
</head>
<body>
<!--table>((thead>tr>th*4)+(tbody>tr>td*4))-->
<div class="container">
<table class="table table-striped">
    <thead>
        <tr>
            <th>Num</th>
            <th>Photo</th>
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
            <td><?=$c+1?></td>
            <td><img src="<?=$p['image']?>" ></td>
            <td class="text-<?=$classe?>"><?= $p['libelle'] ;?></td>
            <td><?= $p['prix'] ;?></td>
            <td  class="<?=($p['qte']>10) ? "text-success":"text-danger" ?>"  ><span class="badge badge-<?=$classe?>"> <?=$p['qte']?></span> </td>
        </tr>
<?php } ?>
    </tbody>
</table>

</div>
<script src="https://code.jquery.com/jquery-3.5.0.min.js" integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ=" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js">
</script>
<script>
$(document).ready( function () {
    $('.table').DataTable();
    
} );
</script>
</body>
</html>