  <?php
  include("functions.php");

  $id = (int) $_GET['id']; // recupere l'id ds le lien : ?id=9
  // extract($_GET);
  delete($id);
  header("location:index.php?op=delete");
