<?php

if (empty($_POST["nom"])&&empty($_POST["user"])&&empty($_POST["mdp"])){
  ?>
  <form class="form" action="index.php" method="post">
    <label class="label">Nom de la base de données</label> <input type="text" name="nom"><br />
    <input type="submit" value="Créer ou se connecter">
  </form>
  <?php
}
?>
