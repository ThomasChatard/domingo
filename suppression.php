<style>

*{
  font-family: sans-serif;
}

h1{
  text-align: center;

}

td, th {
	border : 1px;
	border-style:solid;
	border-color:black;
	width:20%;
	height: 30px;
}

table{
	border-collapse: collapse;
	margin: auto;
	text-align: center;
}

#btn{
  text-decoration: none;
  border: 1px solid grey;
  background-color: grey;
  color:white;
  padding: 3px;
  margin-left: 20px;
  margin-right : 30px;
}


</style>
<a id="btn" href="index.php">< Retour</a>
<h1>Suppression d'une table</h1>
<?php

session_start();
function getTableSupp($db){

  $sql='SHOW TABLES';
  $resu = $db->query($sql);

  return $resu;
}

$nom=$_SESSION["dbname"];
$db = mysqli_connect("localhost", "root", "","$nom");
 $resu = getTableSupp($db);
 $listeTable = array();
 while ($ligne = $resu->fetch_row()) {
   $listeTable[] = $ligne[0];
 }

if(empty($_GET["drop_table"]))
{
  ?>
  <table>
    <tr>
      <th> Tables </th>
      <th> </th>
    </tr>
    <?php
     for($i = 0; $i < sizeof($listeTable);$i++)
    { ?>
      <tr>
        <td> <?php echo $listeTable[$i] ?> </td>
        <td><a href="suppression.php?&drop_table=<?php echo  $listeTable[$i] ?>"> <img style="width:30px" src="images/criss-cross.png"></a></td>
	    </tr>
      <?php
    }
    ?>
  </table>
  <?php
}
else
{
  echo "Table supprimée";
  $sql = 'DROP TABLE '.$_GET["drop_table"];
  $resu = $db->query($sql);
  header("refresh:1;url=suppression.php");
}
?>
