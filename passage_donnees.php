<?php 
// // ini_set("max_execution_time",900000);
// ini_get('max_execution_time');
//post_max_size
// upload_max_filesize
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
<?php
include("_css.html");
?>
</head>
<body>
<div class="container">
 <div class="row">
<div class="col-md-6 shadow p-2 mx-auto">
<form action="reception.php?a=store" method="post" id="f1">
   <div class="form-group">
       <label for="login">Login </label>
       <input autocomplete="off" type="text" class="form-control" name="login" id="login">
    </div>
   <div class="form-group">
       <label for="passe">Mot de passe  </label>
       <input type="password" class="form-control" name="passe" id="passe">
    </div>
<button   class="btn btn-sm btn-primary col-md-4 mx-auto d-block">Valider</button>
<button  type="reset"  class="btn btn-sm btn-primary col-md-4 mx-auto d-block">RAZ</button>
<button type="button" onclick="tester()">Afficher</button>
</form>
<hr>
</div>

</div>

<div class="text-center">

<a href="reception.php?marque=hp compaq "><img src="https://placehold.it/300" alt="">DELL</a>
<a href="reception.php?marque=dell"><img src="https://placehold.it/300" alt="">HP</a>

</div>



</div>


<script>


function tester(){

let l= document.getElementById('login');
let p= document.getElementById('passe');
let f= document.getElementById('f1');
alert('login est login '+login.value);
if(p.value=="1234"){
    f.action="https://google.fr";
    f.submit();
}

}


</script>    
</body>
</html>