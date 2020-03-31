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
  <title>Selectionner une table</title>
</head>
<body>
  <a href="index.php">< Retour</a>
  <h2 class="center">Veuillez choisir la table dont vous souhaitez consulter les détails :</h2>

  <?php
  session_start();
  require("connexionBD.php");
  $db = connexion($_SESSION["dbname"]);

  function getTable($db){

    $sql='SHOW TABLES';
    $resu = $db->query($sql);

    return $resu;
  }

  $nom=$_SESSION["dbname"];
  $db = mysqli_connect("localhost", "root", "","$nom");
  $resu = getTable($db);
  $listeTable = array();
  while ($ligne = $resu->fetch_row()) {
    $listeTable[] = $ligne[0];
  }

  if (empty($_POST["table"])){
    ?>
    <form action="#" id="insert" method="post">
      Table : <select name="table" id="table">
        <option selected=""></option>
        <?php
        for($i = 0; $i < sizeof($listeTable);$i++){
          ?>
          <option><?php echo $listeTable[$i] ?>
          </option>
        <?php } ?>
      </select>
      <br /><br />
      <input type="submit" value="Valider"/>
    </form>
    <br />
    <?php
  } else {
    ?><h3 class="center">Détail de la table <?php echo $_POST["table"];?></h3><?php
    include("gets.php");
    include("schemaStructure.php");
  }?>
</body>
</html>
