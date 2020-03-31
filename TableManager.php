<?php
session_start();
function getTable($db,$dbname){

  $sql='SELECT column_name, table_name
        FROM INFORMATION_SCHEMA.KEY_COLUMN_USAGE
        WHERE CONSTRAINT_NAME = "PRIMARY" AND TABLE_SCHEMA="'.$dbname.'"';
  $resu = $db->query($sql);

  return $resu;
}
 $resu = getTable(mysqli_connect("localhost", "root", "","base"),$_SESSION["dbname"]);
 $listeTable = array();
 $listeColonne = array();
 while ($ligne = $resu->fetch_row()) {
   $listeTable[] = $ligne[0];
   $listeColonne[] = $ligne[1];
 }


 //echo $resu[1];
?>
<select>
<?php
 for($i = 0; $i < sizeof($listeTable);$i++)
{ ?>
  <option value="<?php echo $listeTable[$i]."(".$listeColonne[$i].")"?>"> <?php echo $listeTable[$i]." - ".$listeColonne[$i]; ?></option>
  <?php
}
?>
</select>
