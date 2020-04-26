<?php 

$stock=[
    ['libelle'=>'hp dv 5','prix'=>9000,'qte'=>40],
    ['libelle'=>'dell  d 5','prix'=>10000,'qte'=>0],
    ['libelle'=>'sony vaio 5','prix'=>12000,'qte'=>12],
    ['libelle'=>'sony vaio 2','prix'=>7000,'qte'=>8],
    ['libelle'=>'sony vaio 7','prix'=>8000,'qte'=>8],


];
echo $stock[2]['libelle'];
 
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
<table class="table table-striped">
    <thead>
        <tr>
            <th>Num</th>
            <th>Libelle</th>
            <th>prix</th>
            <th>Qte en stock</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
    </tbody>
</table>

</body>
</html>