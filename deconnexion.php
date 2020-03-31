<?php
session_start();
echo "Deconnexion";
$_SESSION["isConnect"]=false;
echo $_SESSION["isConnect"];
header("refresh:1;url=index.php");

?>
