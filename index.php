<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="style.css" />
		<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
		<script src="script.js"></script>
    <title>Créer une table</title>
  </head>
  <body>
  <?php
  session_start();

      ini_set('display_errors','off');
      if(empty($_POST["nom"])&&empty($_POST["table"])&&($_SESSION["isConnect"]==false)){
        include("formulaireConnexion.php");
      }

       else if(empty($_POST["table"])) // formulaire
      {
        if(!empty($_POST["nom"])){
          $_SESSION["dbname"]=$_POST["nom"];
        }
        require("connexionBD.php");
        connexion($_SESSION["dbname"]);
        if($_SESSION["isConnect"]==true)
        {
          echo "Vous êtes connecté à la base de données : ".$_SESSION["dbname"]; ?>
          <a href="deconnexion.php">Deconnexion</a>
          <?php
          include("schemaComplet.php");
          ?><br \><br \>
          <a href="formulaireCreation.php">Ajouter des tables</a>
          <a href="">Ajouter une colonne</a>
          <a href="">Supprimer une colonne</a>
          <a href="choixTable.php">Voir les détails d'une table</a>
          <a href="suppression.php">Supprimer une table</a><?php
        }
  }
  ?>
  </body>
</html>
