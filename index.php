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
          <h1 class="center">Création d'une table dans la base de données</h1>
  <?php

          $taille=1;
          ?>
          <form action="#" method="post">
            <div class="center">
              <label>Table</label><br /><br />
              <input type="text" name="table" size="30"placeholder="Entrer le nom de la table"><br />
              <br /><br />
              <label>Colonnes </label>  <img id='button' src="images/more.png" ><br /><br />

        </div>
        <div class="contains">
          <div class="flex" id="info1">
            <div class="colonne">
              <div class=typevalues>
              <select id="select1" name="nom1" size="1">
                    <option value="int">INT</option>
                    <option value="char">CHAR</option>
                    <option value="varchar">VARCHAR</option>
                    <option value="date">DATE</option>
                    <option value="datetime">DATETIME</option>
              </select><div style="display: inline" class="option1"></div>
            </div>
              <input type="text" name="col1" id="col1" class="col" size="30" placeholder="Entrer le nom de la colonne">
            </div>
              <div class="check">
                <div class="primary">
                  <input type="checkbox" class="primarycheck1"
                   name="primary1" value="primary">
                  <label>Clé primaire</label>
                </div>
                <div class="foreign">
                  <input type="checkbox" class="foreigncheck1"
                   name="foreign1" value="foreign">
                  <label>Clé étrangère</label>
                </div>
              </div>
            <div id="data1" class="data"></div>
            <img id='supp1' class="btnsupp" src="images/criss-cross.png">

          </div>
        </div>
        <input type="submit" value="Valider">
      </form>
      <?php
        }


  }
  else // une fois la table validée --> PHP
  {
      include("createTable.php"); // requete
  }
  ?>
  </body>
</html>
