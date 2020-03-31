
<a href="index.php">< Retour</a>
<?php


require("connexionBD.php");
$db = connexion($_SESSION["dbname"]);

// taille du tableau de données
if(empty($_POST["taille"])){
  $taille=1; // taille minimale (sans ajout dynamique de colonnes)
}else{
  $taille = $_POST["taille"]; // taille récupérée avec l'indice dans les fonctions php
}

$foreign="";
$primary="";
$countPrimary=0;

for ($i=1;$i<=$taille;$i++){
  if(!empty($_POST["primary$i"])) // Vérification si la colonne est une clé primaire
  {
    $countPrimary=$countPrimary+1;
  }
}

// création de la table dans la base de données
$sql= "CREATE TABLE ".$_POST["table"]." ( ";
for ($i=1;$i<=$taille-1;$i++) // boucler taille - 1 fois : NOM TYPE
{
  if(!empty($_POST["col$i"])) // vérification des colonnes non-vides (ou supprimées)
  {
    $sql.=$_POST["col$i"]." "; // affichage nom de colonne

    if($_POST["nom$i"]=="char" || $_POST["nom$i"]=="varchar") // vérification si le type saisie nécessite une valeur
    {
      $sql.=$_POST["nom$i"]."(".$_POST["type$i"].") "; //  CHAR(n) ou VARCHAR(n)
    }
    else
    {
      $sql.=$_POST["nom$i"]; // TYPE
    }
    if(!empty($_POST["primary$i"])) // Vérification si la colonne est une clé primaire
    {
      if($countPrimary>1){
        $primary.=$_POST["col$i"].", ";
      }
      else {
        $primary.=$_POST["col$i"];
      }
      $countPrimary = $countPrimary - 1;

    }
    if(!empty($_POST["foreign$i"])) // Vérification si la colonne est une clé étrangère
    {
      $foreign.=", FOREIGN KEY (".$_POST["col$i"].") REFERENCES ".$_POST["foreign_table$i"];
    }
    $sql.=", ";
  }
}
  // dernière colonne de la table - dernière ligne à rentrer pour la requête (cas de la virgule)
  if(!empty($_POST["col$taille"]))
  {
    $sql.=$_POST["col$taille"]." "; // Affichage du nom de la colonne

    if($_POST["nom$taille"]=="char" || $_POST["nom$taille"]=="varchar") // Vérification du type nécéssitant une valeur associée
    {

      $sql.=$_POST["nom$taille"]."(".$_POST["type$taille"].")"; // Affiche Char(n) ou Varchar(n)
    }
    else
    {
      $sql.=$_POST["nom$taille"]; // Affiche le type
    }
    if(!empty($_POST["primary$taille"])) // Vérification s'il s'agit d'une clé primaire
    {
      $primary.=$_POST["col$taille"];
    }
    if(!empty($_POST["foreign$taille"])) // Vérification s'il s'agit d'une clé étrangère
    {
      $foreign.=", FOREIGN KEY (".$_POST["col$taille"].") REFERENCES ".$_POST["foreign_table$taille"];
    }
  }

  $sql.=$foreign;
  if($primary!="")
  {
    $sql.=", PRIMARY KEY (".$primary.")";
  }
  $sql.=" )";

  echo "Requête exécutée : <br /> <br />".$sql;
  $resu = $db->query($sql); // exécution de la requête
  ?> <br /> <br /> <?php
  include("schemaComplet.php");
?>
<br /> <br />
<a href="">Ajouter une colonne</a>
<a href="">Supprimer une colonne</a>
<a href="choixTable.php">Voir les détails d'une table</a>
